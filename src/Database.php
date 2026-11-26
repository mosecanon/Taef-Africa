<?php
namespace App;

use PDO;
use Exception;

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../config/database.php';
            $default = $config['default'];
            $connConfig = $config['connections'][$default];

            try {
                if ($default === 'sqlite') {
                    $dbPath = $connConfig['database'];
                    $dir = dirname($dbPath);
                    if (!is_dir($dir)) {
                        mkdir($dir, 0755, true);
                    }
                    $isNew = !file_exists($dbPath);

                    self::$instance = new PDO('sqlite:' . $dbPath, null, null, $connConfig['options']);

                    if ($isNew || filesize($dbPath) === 0) {
                        self::initializeSchema(self::$instance);
                    }
                } else {
                    $dsn = sprintf(
                        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                        $connConfig['host'],
                        $connConfig['port'],
                        $connConfig['database'],
                        $connConfig['charset']
                    );
                    self::$instance = new PDO($dsn, $connConfig['username'], $connConfig['password'], $connConfig['options']);
                }
            } catch (Exception $e) {
                error_log("Database connection failure: " . $e->getMessage());
                throw new Exception("Database Connection Error: " . $e->getMessage());
            }
        }

        return self::$instance;
    }

    private static function initializeSchema(PDO $pdo): void
    {
        $schemaFile = __DIR__ . '/../database/schema.sql';
        if (file_exists($schemaFile)) {
            $sql = file_get_contents($schemaFile);
            $pdo->exec($sql);
            self::seedInitialData($pdo);
        }
    }

    private static function seedInitialData(PDO $pdo): void
    {
        // Seed initial confirmed speakers based on the Summit document and uploaded VIP visuals
        $speakers = [
            [
                'full_name' => 'Mbali Sebapu',
                'designation' => 'Founder & Group CEO',
                'organisation' => 'Hermosa Flor Holdings',
                'country' => 'South Africa',
                'country_code' => 'ZA',
                'category' => 'Business Founders & Entrepreneurs',
                'topic' => 'Building Continental Brand Equity and High-Growth Consumer Enterprises',
                'bio' => 'Celebrated entrepreneur and visionary corporate leader redefining the African beauty and luxury retail ecosystem, pioneering cross-border distribution and sustainable manufacturing.',
                'photo_url' => 'assets/images/vip-delegate-poster.jpg',
                'is_keynote' => 1,
                'sort_order' => 1
            ],
            [
                'full_name' => 'Dr. Kwame Mensah',
                'designation' => 'Executive Vice Chairman',
                'organisation' => 'Pan-African Infrastructure Fund',
                'country' => 'Ghana',
                'country_code' => 'GH',
                'category' => 'Corporate & Institutional Leaders',
                'topic' => 'Financing Continental Energy Transition and AfCFTA Trade Corridors',
                'bio' => 'Senior economic strategist with over two decades of experience structuring sovereign infrastructure syndications, deep-sea logistics ports, and regional rail networks.',
                'photo_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'is_keynote' => 1,
                'sort_order' => 2
            ],
            [
                'full_name' => 'Amina Wambui',
                'designation' => 'Chief Technology Officer',
                'organisation' => 'Apex Sovereign AI Labs',
                'country' => 'Kenya',
                'country_code' => 'KE',
                'category' => 'Technology & Digital Transformation Leaders',
                'topic' => 'Deploying Sovereign AI Infrastructure & Localized LLMs for African Enterprise',
                'bio' => 'Pioneering artificial intelligence researcher and systems architect engineering large-scale foundational models adapted to African linguistic and financial structures.',
                'photo_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'is_keynote' => 1,
                'sort_order' => 3
            ],
            [
                'full_name' => 'Farouk El-Sayed',
                'designation' => 'Managing Partner',
                'organisation' => 'Nile Frontier Capital',
                'country' => 'Egypt',
                'country_code' => 'EG',
                'category' => 'Investors & Financial Leaders',
                'topic' => 'The Next Era of Pan-African Private Equity: Cross-Border Buyouts & Valuations',
                'bio' => 'Oversees a $500M buyout portfolio across North, West, and East Africa focusing on industrial manufacturing, agritech logistics, and digital banking platforms.',
                'photo_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'is_keynote' => 0,
                'sort_order' => 4
            ],
            [
                'full_name' => 'Ngozi Okonjo-Adeyemi',
                'designation' => 'Head of Trade Policy & Regional Integration',
                'organisation' => 'AfCFTA Strategic Advisory Council',
                'country' => 'Nigeria',
                'country_code' => 'NG',
                'category' => 'Industry Experts & Innovators',
                'topic' => 'Unlocking the $3.4T Single Market: Overcoming Border Friction & Digital Tariff Systems',
                'bio' => 'Renowned international trade economist spearheading digital customs harmonization and intra-African tariff reduction agreements across 54 member states.',
                'photo_url' => 'https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=600&q=80',
                'is_keynote' => 1,
                'sort_order' => 5
            ],
            [
                'full_name' => 'Jean-Luc Habimana',
                'designation' => 'Co-Founder & Managing Director',
                'organisation' => 'Kigali Quantum Robotics',
                'country' => 'Rwanda',
                'country_code' => 'RW',
                'category' => 'Emerging African Leaders',
                'topic' => 'Next-Gen Robotics & Autonomous Supply Chains for High-Density African Hubs',
                'bio' => 'Forbes 30 Under 30 honoree building hardware automation systems and autonomous logistics drones servicing rural hospitals and distributed agricultural hubs.',
                'photo_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'is_keynote' => 0,
                'sort_order' => 6
            ]
        ];

        $stmt = $pdo->prepare("
            INSERT INTO speakers (full_name, designation, organisation, country, country_code, category, topic, bio, photo_url, is_keynote, sort_order)
            VALUES (:full_name, :designation, :organisation, :country, :country_code, :category, :topic, :bio, :photo_url, :is_keynote, :sort_order)
        ");

        foreach ($speakers as $spk) {
            $stmt->execute($spk);
        }
    }
}
