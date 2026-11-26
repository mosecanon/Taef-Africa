<?php
namespace App\Controllers;

use App\Cache;
use App\Database;
use App\Router;
use PDO;

class PageController
{
    private Cache $cache;
    private array $config;

    public function __construct()
    {
        $this->cache = Cache::getInstance();
        $this->config = require __DIR__ . '/../../config/app.php';
    }

    private function renderWithCache(string $cacheKey, string $viewFile, array $data = []): void
    {
        $cache = $this->cache;
        $driver = $cache->getDriverName();
        $cachedHtml = $cache->get($cacheKey);

        if ($cachedHtml !== null) {
            header("X-Cache: HIT");
            header("X-Cache-Driver: " . $driver);
            echo $cachedHtml;
            return;
        }

        // Cache Miss: Render view and capture buffer
        header("X-Cache: MISS");
        header("X-Cache-Driver: " . $driver);

        // Extract variables for views
        $config = $this->config;
        extract($data);

        ob_start();
        include __DIR__ . '/../../views/layout/header.php';
        include __DIR__ . '/../../views/pages/' . $viewFile . '.php';
        include __DIR__ . '/../../views/layout/footer.php';
        $output = ob_get_clean();

        // Store in Predis cache for 5 minutes
        $cache->set($cacheKey, $output, 300);

        echo $output;
    }

    public function home(): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM speakers WHERE is_keynote = 1 ORDER BY sort_order ASC LIMIT 4");
        $keynoteSpeakers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->renderWithCache('page_home', 'home', [
            'pageTitle' => "The African Executive Feature Summit 2027 | Shaping Africa's Future",
            'metaDesc' => "The preeminent continental gathering for corporate CEOs, founders, institutional investors, and policymakers. March 2027 at JW Marriott, Nairobi, Kenya.",
            'activeNav' => 'Home',
            'speakers' => $keynoteSpeakers,
            'tracks' => $this->config['conversation_tracks'],
            'pillars' => $this->config['pillars']
        ]);
    }

    public function about(): void
    {
        $this->renderWithCache('page_about', 'about', [
            'pageTitle' => "About The Summit | Platform for Collective Progress",
            'metaDesc' => "Discover the vision, mission, and the 6 defining continental conversation tracks shaping the 2027 African Executive Feature Summit in Nairobi.",
            'activeNav' => 'About',
            'tracks' => $this->config['conversation_tracks']
        ]);
    }

    public function speakers(): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM speakers ORDER BY is_keynote DESC, sort_order ASC");
        $allSpeakers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->renderWithCache('page_speakers', 'speakers', [
            'pageTitle' => "Distinguished Speakers & Thought Leaders | AEFS 2027",
            'metaDesc' => "Meet the visionaries, corporate executives, innovators, and institutional leaders taking the plenary stage in Nairobi.",
            'activeNav' => 'Speakers',
            'speakers' => $allSpeakers,
            'categories' => $this->config['speaker_categories']
        ]);
    }

    public function partnerships(): void
    {
        $this->renderWithCache('page_partnerships', 'partnerships', [
            'pageTitle' => "Strategic Partnerships & Corporate Sponsorship | AEFS 2027",
            'metaDesc' => "Position your institution at the center of African commerce. Explore Title, Platinum, Sector, and Knowledge partnership tiers.",
            'activeNav' => 'Partnerships',
            'tiers' => $this->config['partnership_tiers']
        ]);
    }

    public function register(): void
    {
        // Registration page has interactive client form, but static shell can be cached
        $this->renderWithCache('page_register', 'register', [
            'pageTitle' => "Executive Concierge Registration | AEFS 2027",
            'metaDesc' => "Secure your invitation to The African Executive Feature Summit 2027. Exclusive pass generation for C-suite leaders, founders, and investors.",
            'activeNav' => 'Register'
        ]);
    }

    public function contact(): void
    {
        $this->renderWithCache('page_contact', 'contact', [
            'pageTitle' => "Contact Summit Concierge | Nairobi, Kenya",
            'metaDesc' => "Connect with the organizing committee for general enquiries, sponsorship dossiers, speaker participation, and VIP reservations.",
            'activeNav' => 'Contact'
        ]);
    }
}
