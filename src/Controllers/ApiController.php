<?php
namespace App\Controllers;

use App\Database;
use App\Cache;
use PDO;
use Exception;

class ApiController
{
    private function jsonResponse(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }

    private function getRequestData(): array
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        // 1. Try JSON input if header specifies application/json
        if (stripos($contentType, 'application/json') !== false) {
            $raw = file_get_contents('php://input');
            $data = json_decode($raw, true);
            if (is_array($data) && !empty($data)) {
                return $data;
            }
        }
        
        // 2. Fallback check for raw JSON payload even if header wasn't sent
        $raw = file_get_contents('php://input');
        if (!empty($raw)) {
            $data = json_decode($raw, true);
            if (is_array($data) && !empty($data)) {
                return $data;
            }
        }
        
        // 3. Fallback to standard POST/Form-Data
        return is_array($_POST) ? $_POST : [];
    }

    public function register(): void
    {
        $data = $this->getRequestData();

        $fullName = trim($data['full_name'] ?? $data['name'] ?? '');
        $email    = trim($data['email'] ?? '');
        $phone    = trim($data['phone'] ?? $data['telephone'] ?? '+254 700 000 000');
        $company  = trim($data['company'] ?? $data['organisation'] ?? $data['organization'] ?? '');
        $jobTitle = trim($data['job_title'] ?? $data['designation'] ?? $data['title'] ?? '');
        $industry = trim($data['industry'] ?? $data['sector'] ?? 'Executive Leadership');
        $country  = trim($data['country'] ?? '');
        $category = trim($data['category'] ?? 'Delegate');

        if (!$fullName || !$email || !$company || !$jobTitle || !$country) {
            $this->jsonResponse([
                'success' => false,
                'status'  => 'error',
                'message' => 'Please provide all required executive credentials (Full Name, Corporate Email, Enterprise, Title, Country).'
            ], 422);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->jsonResponse([
                'success' => false,
                'status'  => 'error',
                'message' => 'Please provide a valid corporate email address.'
            ], 422);
        }

        try {
            $pdo = Database::getConnection();

            // Generate high-prestige unique VIP pass code
            $hash = strtoupper(substr(md5(uniqid($email . time(), true)), 0, 6));
            $prefix = ($category === 'Speaker') ? 'SPK' : (($category === 'Sponsor' || $category === 'Strategic Partner') ? 'PTR' : 'VIP');
            $passCode = "AEFS-27-{$prefix}-{$hash}";

            $stmt = $pdo->prepare("
                INSERT INTO registrations (pass_code, full_name, email, phone, company, job_title, industry, country, category, status)
                VALUES (:pass_code, :full_name, :email, :phone, :company, :job_title, :industry, :country, :category, 'Confirmed')
            ");

            $stmt->execute([
                ':pass_code'  => $passCode,
                ':full_name'  => $fullName,
                ':email'      => $email,
                ':phone'      => $phone,
                ':company'    => $company,
                ':job_title'  => $jobTitle,
                ':industry'   => $industry,
                ':country'    => $country,
                ':category'   => $category
            ]);

            // Clear registration cache if any
            Cache::getInstance()->forget('page_register');

            $regPayload = [
                'pass_code'   => $passCode,
                'full_name'   => $fullName,
                'company'     => $company,
                'job_title'   => $jobTitle,
                'category'    => $category,
                'country'     => $country,
                'venue'       => 'JW Marriott Hotel, Nairobi, Kenya',
                'dates'       => 'March 24 - 26, 2027',
                'status'      => 'Confirmed',
                'ics_download'=> true
            ];

            $this->jsonResponse([
                'success'      => true,
                'status'       => 'success',
                'message'      => 'Your executive registration has been confirmed.',
                'registration' => $regPayload,
                'data'         => $regPayload
            ], 201);
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            $this->jsonResponse([
                'success' => false,
                'status'  => 'error',
                'message' => 'A system error occurred while generating your pass. Please try again.'
            ], 500);
        }
    }

    public function partnerInquiry(): void
    {
        $data = $this->getRequestData();

        $company      = trim($data['company'] ?? '');
        $contactName  = trim($data['contact_name'] ?? '');
        $email        = trim($data['email'] ?? '');
        $phone        = trim($data['phone'] ?? '');
        $tierInterest = trim($data['tier_interest'] ?? 'Strategic Corporate Partner');
        $budgetRange  = trim($data['budget_range'] ?? 'Undisclosed');
        $message      = trim($data['message'] ?? '');

        if (!$company || !$contactName || !$email) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'Please provide company name, executive contact, and corporate email.'
            ], 422);
        }

        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("
                INSERT INTO partner_inquiries (company, contact_name, email, phone, tier_interest, budget_range, message)
                VALUES (:company, :contact_name, :email, :phone, :tier_interest, :budget_range, :message)
            ");
            $stmt->execute([
                ':company'       => $company,
                ':contact_name'  => $contactName,
                ':email'         => $email,
                ':phone'         => $phone,
                ':tier_interest' => $tierInterest,
                ':budget_range'  => $budgetRange,
                ':message'       => $message
            ]);

            $this->jsonResponse([
                'success' => true,
                'message' => 'Thank you. The Summit Corporate Secretariat will transmit the confidential partnership dossier to your office within 24 business hours.',
                'dossier_url' => '#download-dossier'
            ]);
        } catch (Exception $e) {
            $this->jsonResponse(['success' => false, 'message' => 'Unable to submit partner inquiry.'], 500);
        }
    }

    public function speakerApplication(): void
    {
        $data = $this->getRequestData();

        $fullName      = trim($data['full_name'] ?? '');
        $email         = trim($data['email'] ?? '');
        $phone         = trim($data['phone'] ?? '');
        $organisation  = trim($data['organisation'] ?? '');
        $designation   = trim($data['designation'] ?? '');
        $category      = trim($data['category'] ?? 'Corporate & Institutional Leaders');
        $proposedTopic = trim($data['proposed_topic'] ?? '');
        $bio           = trim($data['bio'] ?? '');

        if (!$fullName || !$email || !$organisation || !$designation || !$proposedTopic) {
            $this->jsonResponse(['success' => false, 'message' => 'Please complete all required fields.'], 422);
        }

        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("
                INSERT INTO speaker_applications (full_name, email, phone, organisation, designation, category, proposed_topic, bio)
                VALUES (:full_name, :email, :phone, :organisation, :designation, :category, :proposed_topic, :bio)
            ");
            $stmt->execute([
                ':full_name'      => $fullName,
                ':email'          => $email,
                ':phone'          => $phone,
                ':organisation'   => $organisation,
                ':designation'    => $designation,
                ':category'       => $category,
                ':proposed_topic' => $proposedTopic,
                ':bio'            => $bio
            ]);

            $this->jsonResponse([
                'success' => true,
                'message' => 'Your expression of interest has been received by the Plenary Advisory Board.'
            ]);
        } catch (Exception $e) {
            $this->jsonResponse(['success' => false, 'message' => 'Submission failed.'], 500);
        }
    }

    public function contactMessage(): void
    {
        $data = $this->getRequestData();

        $fullName     = trim($data['full_name'] ?? '');
        $email        = trim($data['email'] ?? '');
        $organisation = trim($data['organisation'] ?? '');
        $subject      = trim($data['subject'] ?? 'General Enquiry');
        $message      = trim($data['message'] ?? '');

        if (!$fullName || !$email || !$message) {
            $this->jsonResponse(['success' => false, 'message' => 'Please provide your name, email, and message.'], 422);
        }

        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("
                INSERT INTO contact_messages (full_name, email, organisation, subject, message)
                VALUES (:full_name, :email, :organisation, :subject, :message)
            ");
            $stmt->execute([
                ':full_name'     => $fullName,
                ':email'         => $email,
                ':organisation'  => $organisation,
                ':subject'       => $subject,
                ':message'       => $message
            ]);

            $this->jsonResponse([
                'success' => true,
                'message' => 'Your enquiry has been dispatched to the executive organizing team.'
            ]);
        } catch (Exception $e) {
            $this->jsonResponse(['success' => false, 'message' => 'Submission failed.'], 500);
        }
    }

    public function getSpeakers(): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM speakers ORDER BY is_keynote DESC, sort_order ASC");
        $speakers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->jsonResponse([
            'success' => true,
            'count' => count($speakers),
            'speakers' => $speakers
        ]);
    }

    public function systemStatus(): void
    {
        $cache = Cache::getInstance();
        $pdo = Database::getConnection();

        $stmt = $pdo->query("SELECT count(*) as count FROM registrations");
        $regCount = $stmt->fetchColumn();

        $this->jsonResponse([
            'summit' => 'The African Executive Feature Summit 2027',
            'status' => 'ONLINE',
            'cache_driver' => $cache->getDriverName(),
            'redis_connected' => $cache->isRedisConnected(),
            'database_status' => 'PDO Connected',
            'total_registrations' => (int)$regCount,
            'timestamp' => date('c')
        ]);
    }
}
