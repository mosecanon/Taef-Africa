-- =============================================================================
-- The African Executive Feature Summit 2027
-- Production MySQL Database Schema & Initial Seed Data
-- Character Set: utf8mb4 | Collation: utf8mb4_unicode_ci | Engine: InnoDB
-- =============================================================================

CREATE DATABASE IF NOT EXISTS `african_executive_summit`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `african_executive_summit`;

-- -----------------------------------------------------------------------------
-- Table: registrations
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `registrations`;
CREATE TABLE `registrations` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `pass_code` VARCHAR(32) NOT NULL,
    `full_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(50) NOT NULL DEFAULT '',
    `company` VARCHAR(150) NOT NULL DEFAULT '',
    `job_title` VARCHAR(150) NOT NULL DEFAULT '',
    `industry` VARCHAR(100) NOT NULL DEFAULT '',
    `country` VARCHAR(100) NOT NULL DEFAULT '',
    `category` VARCHAR(50) NOT NULL DEFAULT 'Delegate',
    `status` VARCHAR(30) NOT NULL DEFAULT 'Confirmed',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_registrations_pass_code` (`pass_code`),
    KEY `idx_registrations_email` (`email`),
    KEY `idx_registrations_category` (`category`),
    KEY `idx_registrations_status` (`status`),
    KEY `idx_registrations_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: partner_inquiries
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `partner_inquiries`;
CREATE TABLE `partner_inquiries` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(150) NOT NULL,
    `contact_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(50) NOT NULL,
    `tier_interest` VARCHAR(100) NOT NULL,
    `budget_range` VARCHAR(50) DEFAULT NULL,
    `message` TEXT DEFAULT NULL,
    `status` VARCHAR(30) NOT NULL DEFAULT 'New',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_partner_inquiries_email` (`email`),
    KEY `idx_partner_inquiries_status` (`status`),
    KEY `idx_partner_inquiries_tier` (`tier_interest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: speaker_applications
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `speaker_applications`;
CREATE TABLE `speaker_applications` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(50) NOT NULL,
    `organisation` VARCHAR(150) NOT NULL,
    `designation` VARCHAR(150) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `proposed_topic` VARCHAR(255) NOT NULL,
    `bio` TEXT NOT NULL,
    `status` VARCHAR(30) NOT NULL DEFAULT 'Pending',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_speaker_applications_email` (`email`),
    KEY `idx_speaker_applications_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: contact_messages
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `organisation` VARCHAR(150) DEFAULT NULL,
    `subject` VARCHAR(200) NOT NULL,
    `message` TEXT NOT NULL,
    `status` VARCHAR(30) NOT NULL DEFAULT 'Unread',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_contact_messages_email` (`email`),
    KEY `idx_contact_messages_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: speakers
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `speakers`;
CREATE TABLE `speakers` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(150) NOT NULL,
    `designation` VARCHAR(150) NOT NULL,
    `organisation` VARCHAR(150) NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    `country_code` VARCHAR(10) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `topic` VARCHAR(255) NOT NULL,
    `bio` TEXT NOT NULL,
    `photo_url` VARCHAR(255) NOT NULL,
    `is_keynote` TINYINT(1) NOT NULL DEFAULT 0,
    `sort_order` INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    KEY `idx_speakers_keynote` (`is_keynote`),
    KEY `idx_speakers_sort_order` (`sort_order`),
    KEY `idx_speakers_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: admin_users
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(80) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password_hash` VARCHAR(255) NOT NULL,
    `role` VARCHAR(50) NOT NULL DEFAULT 'superadmin',
    `last_login` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_admin_users_username` (`username`),
    UNIQUE KEY `idx_admin_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- Table: sessions
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `speaker_id` INT UNSIGNED DEFAULT NULL,
    `track_id` VARCHAR(50) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `stage` VARCHAR(100) NOT NULL DEFAULT 'Main Plenary Hall',
    `day_date` VARCHAR(30) NOT NULL DEFAULT 'Day 1 ~ March 24, 2027',
    `start_time` VARCHAR(20) NOT NULL DEFAULT '10:00 AM',
    `end_time` VARCHAR(20) NOT NULL DEFAULT '11:00 AM',
    `format` VARCHAR(50) NOT NULL DEFAULT 'Keynote Address',
    `status` VARCHAR(30) NOT NULL DEFAULT 'Scheduled',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_sessions_speaker_id` (`speaker_id`),
    KEY `idx_sessions_track_id` (`track_id`),
    KEY `idx_sessions_day_date` (`day_date`),
    CONSTRAINT `fk_sessions_speaker` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================================================
-- INITIAL SEED DATA (Mirrors the SQLite Dataset)
-- =============================================================================

-- 1. Confirmed Summit Speakers
INSERT INTO `speakers` (`id`, `full_name`, `designation`, `organisation`, `country`, `country_code`, `category`, `topic`, `bio`, `photo_url`, `is_keynote`, `sort_order`)
VALUES
(
    8,
    'Hon. Aden Duale',
    'Cabinet Secretary, Health (Chief Guest)',
    'Government of Kenya',
    'Kenya',
    'KE',
    'Corporate & Institutional Leaders',
    'Opening Ministerial Plenary: Sovereign Infrastructure, Continental Health Systems & Economic Resilience',
    'Distinguished Cabinet Secretary of Kenya serving as the official Summit Chief Guest, delivering the inaugural ministerial address on continental resilience, cross-border health technology, and pan-African collaboration.',
    'assets/images/chief-guest-aden-duale.jpg',
    1,
    0
),
(
    1,
    'Mbali Sebapu',
    'Founder & Group CEO',
    'Hermosa Flor Holdings',
    'South Africa',
    'ZA',
    'Business Founders & Entrepreneurs',
    'Building Continental Brand Equity and High-Growth Consumer Enterprises',
    'Celebrated entrepreneur and visionary corporate leader redefining the African beauty and luxury retail ecosystem, pioneering cross-border distribution and sustainable manufacturing.',
    'assets/images/vip-delegate-poster.jpg',
    1,
    1
),
(
    2,
    'Dr. Kwame Mensah',
    'Executive Vice Chairman',
    'Pan-African Infrastructure Fund',
    'Ghana',
    'GH',
    'Corporate & Institutional Leaders',
    'Financing Continental Energy Transition and AfCFTA Trade Corridors',
    'Senior economic strategist with over two decades of experience structuring sovereign infrastructure syndications, deep-sea logistics ports, and regional rail networks.',
    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
    1,
    2
),
(
    3,
    'Amina Wambui',
    'Chief Technology Officer',
    'Apex Sovereign AI Labs',
    'Kenya',
    'KE',
    'Technology & Digital Transformation Leaders',
    'Deploying Sovereign AI Infrastructure & Localized LLMs for African Enterprise',
    'Pioneering artificial intelligence researcher and systems architect engineering large-scale foundational models adapted to African linguistic and financial structures.',
    'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
    1,
    3
),
(
    4,
    'Farouk El-Sayed',
    'Managing Partner',
    'Nile Frontier Capital',
    'Egypt',
    'EG',
    'Investors & Financial Leaders',
    'The Next Era of Pan-African Private Equity: Cross-Border Buyouts & Valuations',
    'Oversees a $500M buyout portfolio across North, West, and East Africa focusing on industrial manufacturing, agritech logistics, and digital banking platforms.',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
    0,
    4
),
(
    5,
    'Ngozi Okonjo-Adeyemi',
    'Head of Trade Policy & Regional Integration',
    'AfCFTA Strategic Advisory Council',
    'Nigeria',
    'NG',
    'Industry Experts & Innovators',
    'Unlocking the $3.4T Single Market: Overcoming Border Friction & Digital Tariff Systems',
    'Renowned international trade economist spearheading digital customs harmonization and intra-African tariff reduction agreements across 54 member states.',
    'https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=600&q=80',
    1,
    5
),
(
    6,
    'Jean-Luc Habimana',
    'Co-Founder & Managing Director',
    'Kigali Quantum Robotics',
    'Rwanda',
    'RW',
    'Emerging African Leaders',
    'Next-Gen Robotics & Autonomous Supply Chains for High-Density African Hubs',
    'Forbes 30 Under 30 honoree building hardware automation systems and autonomous logistics drones servicing rural hospitals and distributed agricultural hubs.',
    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
    0,
    6
),
(
    7,
    'Dr. Sarah Mensah',
    'Executive Director',
    'Pan-African Sovereign Fintech',
    'Pan-African',
    'AF',
    'Technology & Digital Transformation Leaders',
    'Decentralized Cross-Border Remittances',
    'Renowned fintech economist and central banking advisor.',
    'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
    0,
    10
) ON DUPLICATE KEY UPDATE `full_name`=`full_name`;

-- 2. Summit Plenary Sessions
INSERT INTO `sessions` (`id`, `speaker_id`, `track_id`, `title`, `stage`, `day_date`, `start_time`, `end_time`, `format`, `status`)
VALUES
(
    1,
    1,
    'leadership',
    'Plenary Opening Address: The Architecture of African Enterprise',
    'Main Plenary Hall ~ JW Marriott',
    'Day 1 ~ March 24, 2027',
    '09:30 AM',
    '10:30 AM',
    'Keynote Address',
    'Scheduled'
),
(
    2,
    3,
    'innovation-tech',
    'Deploying Sovereign AI Infrastructure & Enterprise Foundations',
    'Nairobi Frontier Stage',
    'Day 1 ~ March 24, 2027',
    '11:00 AM',
    '12:15 PM',
    'Executive Panel',
    'Scheduled'
),
(
    3,
    5,
    'investment-trade',
    'Unlocking the $3.4T Single Market: Cross-Border Tariff Harmonization',
    'AfCFTA Bilateral Room',
    'Day 2 ~ March 25, 2027',
    '02:00 PM',
    '03:30 PM',
    'Closed-Door Deal Roundtable',
    'Scheduled'
) ON DUPLICATE KEY UPDATE `title`=`title`;
