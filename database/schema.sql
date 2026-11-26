-- =============================================================================
-- The African Executive Feature Summit 2027 Database Schema
-- =============================================================================

CREATE TABLE IF NOT EXISTS registrations (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    pass_code VARCHAR(32) UNIQUE NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    company VARCHAR(150) NOT NULL,
    job_title VARCHAR(150) NOT NULL,
    industry VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL DEFAULT 'Delegate',
    status VARCHAR(30) NOT NULL DEFAULT 'Confirmed',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS partner_inquiries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    company VARCHAR(150) NOT NULL,
    contact_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    tier_interest VARCHAR(100) NOT NULL,
    budget_range VARCHAR(50),
    message TEXT,
    status VARCHAR(30) NOT NULL DEFAULT 'New',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS speaker_applications (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    organisation VARCHAR(150) NOT NULL,
    designation VARCHAR(150) NOT NULL,
    category VARCHAR(100) NOT NULL,
    proposed_topic VARCHAR(255) NOT NULL,
    bio TEXT NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'Pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    organisation VARCHAR(150),
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'Unread',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS speakers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(150) NOT NULL,
    designation VARCHAR(150) NOT NULL,
    organisation VARCHAR(150) NOT NULL,
    country VARCHAR(100) NOT NULL,
    country_code VARCHAR(10) NOT NULL,
    category VARCHAR(100) NOT NULL,
    topic VARCHAR(255) NOT NULL,
    bio TEXT NOT NULL,
    photo_url VARCHAR(255) NOT NULL,
    is_keynote INTEGER DEFAULT 0,
    sort_order INTEGER DEFAULT 0
);

CREATE TABLE IF NOT EXISTS admin_users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(80) UNIQUE NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'superadmin',
    last_login DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS sessions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    speaker_id INTEGER,
    track_id VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    stage VARCHAR(100) NOT NULL DEFAULT 'Main Plenary Hall',
    day_date VARCHAR(30) NOT NULL DEFAULT 'Day 1 ~ March 24, 2027',
    start_time VARCHAR(20) NOT NULL DEFAULT '10:00 AM',
    end_time VARCHAR(20) NOT NULL DEFAULT '11:00 AM',
    format VARCHAR(50) NOT NULL DEFAULT 'Keynote Address',
    status VARCHAR(30) NOT NULL DEFAULT 'Scheduled',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
