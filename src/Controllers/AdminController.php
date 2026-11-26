<?php
namespace App\Controllers;

use App\Database;
use App\Cache;
use App\Router;
use PDO;
use Exception;

class AdminController
{
    private PDO $pdo;
    private Cache $cache;
    private array $config;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->pdo = Database::getConnection();
        $this->cache = Cache::getInstance();
        $this->config = require __DIR__ . '/../../config/app.php';
    }

    private function isAuthenticated(): bool
    {
        return !empty($_SESSION['admin_user']);
    }

    private function requireAuth(): void
    {
        if (!$this->isAuthenticated()) {
            header('Location: ' . Router::url('/admin/login'));
            exit;
        }
    }

    private function jsonResponse(array $data, int $code = 200): void
    {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function login(): void
    {
        if ($this->isAuthenticated()) {
            header('Location: ' . Router::url('/admin'));
            exit;
        }

        $config = $this->config;
        $pageTitle = "Executive Secretariat Sign In | AEFS 2027 Admin";
        include __DIR__ . '/../../views/admin/login.php';
    }

    public function authenticate(): void
    {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true) ?: $_POST;

        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if (!$username || !$password) {
            $this->jsonResponse(['success' => false, 'message' => 'Please provide username and password.'], 422);
        }

        $stmt = $this->pdo->prepare("SELECT * FROM admin_users WHERE username = :u LIMIT 1");
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid executive credentials.'], 401);
        }

        // Set session
        $_SESSION['admin_user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        // Update last login
        $upd = $this->pdo->prepare("UPDATE admin_users SET last_login = CURRENT_TIMESTAMP WHERE id = :id");
        $upd->execute([':id' => $user['id']]);

        $this->jsonResponse([
            'success' => true,
            'message' => 'Authentication successful. Redirecting to console...',
            'redirect' => Router::url('/admin')
        ]);
    }

    public function logout(): void
    {
        unset($_SESSION['admin_user']);
        session_destroy();
        header('Location: ' . Router::url('/admin/login'));
        exit;
    }

    public function dashboard(): void
    {
        $this->requireAuth();

        // Aggregate statistics
        $regTotal = (int)$this->pdo->query("SELECT count(*) FROM registrations")->fetchColumn();
        $spkTotal = (int)$this->pdo->query("SELECT count(*) FROM speakers")->fetchColumn();
        $pitchesPending = (int)$this->pdo->query("SELECT count(*) FROM speaker_applications WHERE status = 'Pending'")->fetchColumn();
        $partnerCount = (int)$this->pdo->query("SELECT count(*) FROM partner_inquiries")->fetchColumn();
        $unreadMessages = (int)$this->pdo->query("SELECT count(*) FROM contact_messages WHERE status = 'Unread'")->fetchColumn();

        // Recent registrations
        $recentRegs = $this->pdo->query("SELECT * FROM registrations ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

        // Recent speaker pitches
        $recentPitches = $this->pdo->query("SELECT * FROM speaker_applications ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

        $currentUser = $_SESSION['admin_user'];
        $config = $this->config;
        $activeTab = 'dashboard';
        $cacheDriver = $this->cache->getDriverName();
        $isRedis = $this->cache->isRedisConnected();

        include __DIR__ . '/../../views/admin/dashboard.php';
    }

    public function speakers(): void
    {
        $this->requireAuth();

        $speakers = $this->pdo->query("SELECT * FROM speakers ORDER BY is_keynote DESC, sort_order ASC")->fetchAll(PDO::FETCH_ASSOC);
        $applications = $this->pdo->query("SELECT * FROM speaker_applications ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        $sessions = $this->pdo->query("SELECT s.*, sp.full_name as speaker_name FROM sessions s LEFT JOIN speakers sp ON s.speaker_id = sp.id ORDER BY s.day_date ASC, s.start_time ASC")->fetchAll(PDO::FETCH_ASSOC);

        $currentUser = $_SESSION['admin_user'];
        $config = $this->config;
        $activeTab = 'speakers';

        include __DIR__ . '/../../views/admin/speakers.php';
    }

    public function approveSpeaker(): void
    {
        $this->requireAuth();

        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true) ?: $_POST;
        $appId = (int)($data['application_id'] ?? 0);

        if (!$appId) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid application ID.'], 422);
        }

        $stmt = $this->pdo->prepare("SELECT * FROM speaker_applications WHERE id = :id");
        $stmt->execute([':id' => $appId]);
        $app = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$app) {
            $this->jsonResponse(['success' => false, 'message' => 'Application not found.'], 404);
        }

        // Insert into speakers table
        $ins = $this->pdo->prepare("
            INSERT INTO speakers (full_name, designation, organisation, country, country_code, category, topic, bio, photo_url, is_keynote, sort_order)
            VALUES (:full_name, :designation, :organisation, :country, 'AF', :category, :topic, :bio, :photo_url, 0, 10)
        ");

        $ins->execute([
            ':full_name'    => $app['full_name'],
            ':designation'  => $app['designation'],
            ':organisation' => $app['organisation'],
            ':country'      => 'Pan-African',
            ':category'     => $app['category'],
            ':topic'        => $app['proposed_topic'],
            ':bio'          => $app['bio'],
            ':photo_url'    => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80'
        ]);

        $newSpeakerId = $this->pdo->lastInsertId();

        // Update application status
        $upd = $this->pdo->prepare("UPDATE speaker_applications SET status = 'Approved' WHERE id = :id");
        $upd->execute([':id' => $appId]);

        // Invalidate public page caches
        $this->cache->forget('page_speakers');
        $this->cache->forget('page_home');

        $this->jsonResponse([
            'success' => true,
            'message' => "Speaker {$app['full_name']} approved and synced to public plenary faculty.",
            'speaker_id' => $newSpeakerId
        ]);
    }

    public function registrations(): void
    {
        $this->requireAuth();

        $query = trim($_GET['q'] ?? '');
        $cat = trim($_GET['category'] ?? '');

        $sql = "SELECT * FROM registrations WHERE 1=1";
        $params = [];

        if ($query) {
            $sql .= " AND (full_name LIKE :q OR company LIKE :q OR email LIKE :q OR pass_code LIKE :q)";
            $params[':q'] = "%{$query}%";
        }
        if ($cat) {
            $sql .= " AND category = :cat";
            $params[':cat'] = $cat;
        }

        $sql .= " ORDER BY id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $currentUser = $_SESSION['admin_user'];
        $config = $this->config;
        $activeTab = 'registrations';

        include __DIR__ . '/../../views/admin/registrations.php';
    }

    public function exportRegistrationsCsv(): void
    {
        $this->requireAuth();

        $stmt = $this->pdo->query("SELECT * FROM registrations ORDER BY id ASC");
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=AEFS_2027_Accredited_Delegates_' . date('Y-m-d') . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Pass Code', 'Full Name', 'Email', 'Telephone', 'Organisation', 'Designation', 'Industry', 'Country', 'Category', 'Status', 'Registered At']);

        foreach ($records as $r) {
            fputcsv($output, [
                $r['id'],
                $r['pass_code'],
                $r['full_name'],
                $r['email'],
                $r['phone'],
                $r['company'],
                $r['job_title'],
                $r['industry'],
                $r['country'],
                $r['category'],
                $r['status'],
                $r['created_at']
            ]);
        }

        fclose($output);
        exit;
    }

    public function partners(): void
    {
        $this->requireAuth();

        $inquiries = $this->pdo->query("SELECT * FROM partner_inquiries ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

        $currentUser = $_SESSION['admin_user'];
        $config = $this->config;
        $activeTab = 'partners';

        include __DIR__ . '/../../views/admin/partners.php';
    }

    public function purgeCache(): void
    {
        $this->requireAuth();
        $this->cache->flush();

        $this->jsonResponse([
            'success' => true,
            'message' => 'Cache purged successfully. All page views will re-render fresh.'
        ]);
    }
}
