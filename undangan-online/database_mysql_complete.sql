-- =================================================
-- DATABASE SQL LENGKAP UNTUK UNDANGAN ONLINE
-- =================================================

-- Set charset and collation
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- =================================================
-- CREATE DATABASE
-- =================================================
CREATE DATABASE IF NOT EXISTS `undangan_online` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `undangan_online`;

-- =================================================
-- TABLE: users
-- =================================================
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `avatar` varchar(255) DEFAULT NULL,
  `wallet_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- TABLE: templates
-- =================================================
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `preview_images` json DEFAULT NULL,
  `demo_data` json DEFAULT NULL,
  `html_structure` longtext NOT NULL,
  `css_styles` longtext NOT NULL,
  `customizable_fields` json DEFAULT NULL,
  `color_schemes` json DEFAULT NULL,
  `font_options` json DEFAULT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `downloads_count` int(11) NOT NULL DEFAULT 0,
  `rating` decimal(3,1) DEFAULT NULL,
  `reviews_count` int(11) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `templates_created_by_foreign` (`created_by`),
  CONSTRAINT `templates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- TABLE: invitations
-- =================================================
DROP TABLE IF EXISTS `invitations`;
CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `invitation_data` json NOT NULL,
  `custom_styles` json DEFAULT NULL,
  `custom_domain` varchar(255) DEFAULT NULL,
  `rsvp_responses` json DEFAULT NULL,
  `guest_list` json DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `rsvp_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `guest_book_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `music_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `background_music` varchar(255) DEFAULT NULL,
  `gallery_images` json DEFAULT NULL,
  `love_story` text DEFAULT NULL,
  `event_details` json NOT NULL,
  `views_count` int(11) NOT NULL DEFAULT 0,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invitations_slug_unique` (`slug`),
  KEY `invitations_user_id_status_index` (`user_id`,`status`),
  KEY `invitations_template_id_foreign` (`template_id`),
  CONSTRAINT `invitations_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- TABLE: orders
-- =================================================
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'IDR',
  `status` enum('pending','paid','failed','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `payment_method` enum('bank_transfer','credit_card','e_wallet','qris') DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `order_details` json DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_status_index` (`user_id`,`status`),
  KEY `orders_template_id_foreign` (`template_id`),
  CONSTRAINT `orders_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- TABLE: custom_requests
-- =================================================
DROP TABLE IF EXISTS `custom_requests`;
CREATE TABLE `custom_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `requirements` json NOT NULL,
  `reference_images` json DEFAULT NULL,
  `budget_min` decimal(10,2) DEFAULT NULL,
  `budget_max` decimal(10,2) DEFAULT NULL,
  `quoted_price` decimal(10,2) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'medium',
  `status` enum('pending','reviewed','quoted','accepted','in_progress','completed','delivered','cancelled','rejected') NOT NULL DEFAULT 'pending',
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_notes` text DEFAULT NULL,
  `progress_updates` json DEFAULT NULL,
  `deliverables` json DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `custom_requests_request_number_unique` (`request_number`),
  KEY `custom_requests_user_id_status_index` (`user_id`,`status`),
  KEY `custom_requests_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `custom_requests_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  CONSTRAINT `custom_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- TABLE: payments
-- =================================================
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paymentable_type` varchar(255) NOT NULL,
  `paymentable_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'IDR',
  `payment_method` enum('bank_transfer','credit_card','debit_card','e_wallet','qris','virtual_account') NOT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `status` enum('pending','processing','success','failed','cancelled','expired','refunded') NOT NULL DEFAULT 'pending',
  `gateway_response` json DEFAULT NULL,
  `receipt_url` varchar(255) DEFAULT NULL,
  `failure_reason` text DEFAULT NULL,
  `fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_payment_id_unique` (`payment_id`),
  KEY `payments_user_id_status_index` (`user_id`,`status`),
  KEY `payments_paymentable_type_paymentable_id_index` (`paymentable_type`,`paymentable_id`),
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- ADDITIONAL TABLES
-- =================================================

-- Table: cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: cache_locks  
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =================================================
-- INSERT SAMPLE DATA
-- =================================================

-- Insert Admin User
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `role`, `avatar`, `wallet_balance`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@undanganonline.com', NOW(), '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+62812345678', 'Jakarta, Indonesia', 'admin', NULL, 0.00, 1, NULL, NOW(), NOW()),
(2, 'Test User', 'test@example.com', NOW(), '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+62812345679', 'Bandung, Indonesia', 'customer', NULL, 50000.00, 1, NULL, NOW(), NOW());

-- Insert Sample Templates
INSERT INTO `templates` (`id`, `name`, `description`, `category`, `price`, `preview_images`, `demo_data`, `html_structure`, `css_styles`, `customizable_fields`, `color_schemes`, `font_options`, `is_premium`, `is_active`, `downloads_count`, `rating`, `reviews_count`, `tags`, `created_by`, `created_at`, `updated_at`) VALUES

(1, 'Elegant Rose Gold', 'Template undangan pernikahan elegan dengan sentuhan rose gold yang mewah. Cocok untuk pasangan yang menginginkan undangan dengan kesan modern dan glamor.', 'pernikahan', 75000.00, 
'["/images/templates/elegant-rose-gold-1.jpg", "/images/templates/elegant-rose-gold-2.jpg", "/images/templates/elegant-rose-gold-3.jpg"]',
'{"bride_name": "Sarah Amelia", "groom_name": "Ahmad Fauzi", "event_date": "2024-08-15", "event_time": "10:00", "venue_name": "Ballroom Hotel Mulia", "venue_address": "Jl. Asia Afrika No. 8, Jakarta Pusat"}',
'<div class="invitation-container elegant-theme"><section class="hero-section"><div class="ornament-top"></div><h1 class="couple-names">{{bride_name}} & {{groom_name}}</h1><p class="wedding-date">{{event_date}}</p><div class="ornament-bottom"></div></section><section class="details-section"><h2>Undangan Pernikahan</h2><div class="parents-info"><p>Anak dari:</p><p>{{parents_bride}} & {{parents_groom}}</p></div><div class="event-details"><h3>Akad Nikah</h3><p class="time">{{event_time}}</p><p class="venue">{{venue_name}}</p><p class="address">{{venue_address}}</p></div></section><section class="gallery-section"><h2>Our Gallery</h2><div class="gallery-grid">{{gallery_images}}</div></section><section class="rsvp-section"><h2>RSVP</h2><div class="rsvp-form">{{rsvp_form}}</div></section></div>',
'.elegant-theme { font-family: "Playfair Display", serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); } .hero-section { text-align: center; padding: 80px 20px; background: url("ornament-bg.png") center/cover; } .couple-names { font-size: 3.5rem; color: #E8B4B8; margin: 20px 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.1); } .wedding-date { font-size: 1.5rem; color: #C9A96E; font-style: italic; } .details-section { padding: 60px 20px; background: white; margin: 20px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }',
'["bride_name", "groom_name", "parents_names", "event_date", "event_time", "venue_name", "venue_address", "dress_code", "rsvp_info", "gallery_images", "love_story"]',
'[{"name": "Rose Gold Classic", "primary": "#E8B4B8", "secondary": "#C9A96E", "accent": "#F4D5AE"}, {"name": "Blush Pink", "primary": "#F7D5D3", "secondary": "#E8A5A0", "accent": "#D4756B"}, {"name": "Champagne Gold", "primary": "#F7E7CE", "secondary": "#E6D5AA", "accent": "#D4C299"}]',
'[{"name": "Playfair Display", "value": "Playfair Display"}, {"name": "Dancing Script", "value": "Dancing Script"}, {"name": "Crimson Text", "value": "Crimson Text"}]',
1, 1, 245, 4.8, 67, 'pernikahan, elegan, rose gold, modern, mewah', NULL, NOW(), NOW()),

(2, 'Minimalist Modern', 'Template undangan dengan design minimalis dan modern. Sempurna untuk pasangan yang menyukai kesederhanaan dengan sentuhan contemporary.', 'pernikahan', 50000.00,
'["/images/templates/minimalist-modern-1.jpg", "/images/templates/minimalist-modern-2.jpg"]',
'{"bride_name": "Rina Sari", "groom_name": "David Chen", "event_date": "2024-09-20", "event_time": "11:00", "venue_name": "The Ritz-Carlton", "venue_address": "Jl. Dr. Ide Anak Agung Gde Agung, Jakarta Selatan"}',
'<div class="invitation-container minimalist-theme"><section class="hero-section"><h1 class="couple-names">{{bride_name}} <span>&</span> {{groom_name}}</h1><p class="quote">{{quote}}</p><div class="date-time"><p class="date">{{event_date}}</p><p class="time">{{event_time}}</p></div></section><section class="venue-section"><h2>Venue</h2><p class="venue-name">{{venue_name}}</p><p class="venue-address">{{venue_address}}</p><button class="map-button">View on Map</button></section></div>',
'.minimalist-theme { font-family: "Poppins", sans-serif; color: #2C3E50; line-height: 1.6; } .hero-section { text-align: center; padding: 100px 20px; background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)); } .couple-names { font-size: 2.5rem; font-weight: 300; margin-bottom: 30px; } .couple-names span { font-style: italic; font-size: 2rem; }',
'["bride_name", "groom_name", "event_date", "event_time", "venue_name", "venue_address", "quote", "gallery_images"]',
'[{"name": "Classic Black & White", "primary": "#000000", "secondary": "#FFFFFF", "accent": "#F5F5F5"}, {"name": "Sage Green", "primary": "#9CAF88", "secondary": "#F8F9FA", "accent": "#E8F5E8"}, {"name": "Navy Blue", "primary": "#2C3E50", "secondary": "#ECF0F1", "accent": "#3498DB"}]',
'[{"name": "Poppins", "value": "Poppins"}, {"name": "Inter", "value": "Inter"}, {"name": "Roboto", "value": "Roboto"}]',
1, 1, 189, 4.6, 43, 'pernikahan, minimalis, modern, simple, clean', NULL, NOW(), NOW()),

(3, 'Classic Vintage', 'Template undangan dengan nuansa vintage klasik. Memberikan kesan romantic dan timeless untuk pernikahan yang berkesan.', 'pernikahan', 0.00,
'["/images/templates/classic-vintage-1.jpg", "/images/templates/classic-vintage-2.jpg"]',
'{"bride_name": "Putri Maharani", "groom_name": "Raden Wijaya", "event_date": "2024-10-05", "event_time": "14:00", "venue_name": "Gedung Kesenian Jakarta", "venue_address": "Jl. Gedung Kesenian No. 1, Jakarta Pusat"}',
'<div class="invitation-container vintage-theme"><div class="vintage-border"><section class="header-section"><div class="vintage-ornament"></div><h1>{{bride_name}} & {{groom_name}}</h1><p class="subtitle">Together with their families</p></section><section class="ceremony-details"><h2>Request the pleasure of your company</h2><p class="date">{{event_date}}</p><p class="venue">{{venue_name}}</p><p class="address">{{venue_address}}</p></section></div></div>',
'.vintage-theme { font-family: "Crimson Text", serif; background: #F5E6D3; color: #8B4513; } .vintage-border { border: 5px solid #8B4513; margin: 20px; padding: 40px; background: white; } .header-section h1 { font-size: 2.8rem; text-align: center; margin: 20px 0; }',
'["bride_name", "groom_name", "parents_names", "event_date", "event_time", "venue_name", "venue_address", "blessing_info"]',
'[{"name": "Vintage Cream", "primary": "#F5E6D3", "secondary": "#8B4513", "accent": "#DEB887"}, {"name": "Antique Gold", "primary": "#FFD700", "secondary": "#B8860B", "accent": "#FFF8DC"}]',
'[{"name": "Crimson Text", "value": "Crimson Text"}, {"name": "Playfair Display", "value": "Playfair Display"}]',
0, 1, 567, 4.5, 128, 'pernikahan, vintage, klasik, romantic, timeless', NULL, NOW(), NOW()),

(4, 'Birthday Party Fun', 'Template undangan ulang tahun yang colorful dan menyenangkan. Perfect untuk merayakan momen spesial dengan keluarga dan teman.', 'ulang_tahun', 25000.00,
'["/images/templates/birthday-fun-1.jpg", "/images/templates/birthday-fun-2.jpg"]',
'{"name": "Andi Pratama", "age": "25", "event_date": "2024-07-30", "event_time": "19:00", "venue_name": "Sky Lounge Jakarta", "venue_address": "Jl. Sudirman No. 52, Jakarta Pusat"}',
'<div class="invitation-container birthday-theme"><section class="party-header"><div class="confetti"></div><h1>🎉 Birthday Party! 🎉</h1><h2>{{name}} is turning {{age}}!</h2><p class="celebration-text">Join us for a fun celebration!</p></section><section class="party-details"><div class="detail-card"><h3>📅 When</h3><p>{{event_date}} at {{event_time}}</p></div><div class="detail-card"><h3>📍 Where</h3><p>{{venue_name}}</p><p>{{venue_address}}</p></div></section></div>',
'.birthday-theme { font-family: "Comic Neue", cursive; background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #FFE66D); color: white; } .party-header { text-align: center; padding: 60px 20px; } .party-header h1 { font-size: 3rem; margin-bottom: 20px; animation: bounce 2s infinite; }',
'["name", "age", "event_date", "event_time", "venue_name", "venue_address", "theme", "dress_code"]',
'[{"name": "Rainbow Bright", "primary": "#FF6B6B", "secondary": "#4ECDC4", "accent": "#FFE66D"}, {"name": "Pastel Party", "primary": "#FF9FF3", "secondary": "#54A0FF", "accent": "#5F27CD"}, {"name": "Neon Glow", "primary": "#00D2D3", "secondary": "#FF9F43", "accent": "#EE5A24"}]',
'[{"name": "Comic Neue", "value": "Comic Neue"}, {"name": "Fredoka One", "value": "Fredoka One"}, {"name": "Baloo", "value": "Baloo"}]',
1, 1, 156, 4.7, 34, 'ulang tahun, fun, colorful, party, celebration', NULL, NOW(), NOW()),

(5, 'Graduation Ceremony', 'Template undangan wisuda yang formal dan berkesan. Sesuai untuk merayakan pencapaian akademik yang membanggakan.', 'wisuda', 35000.00,
'["/images/templates/graduation-1.jpg", "/images/templates/graduation-2.jpg"]',
'{"graduate_name": "Maya Sari", "degree": "Sarjana Ekonomi", "university": "Universitas Indonesia", "event_date": "2024-08-25", "event_time": "09:00", "venue_name": "Balai Sidang UI", "venue_address": "Depok, Jawa Barat"}',
'<div class="invitation-container graduation-theme"><section class="grad-header"><div class="cap-icon">🎓</div><h1>Graduation Ceremony</h1><h2>{{graduate_name}}</h2><p class="degree">{{degree}}</p><p class="university">{{university}}</p></section><section class="ceremony-info"><h3>Join us in celebrating this achievement</h3><p class="date">{{event_date}} at {{event_time}}</p><p class="venue">{{venue_name}}</p><p class="address">{{venue_address}}</p></section></div>',
'.graduation-theme { font-family: "Times New Roman", serif; background: #1E3A8A; color: white; } .grad-header { text-align: center; padding: 80px 20px; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)); } .cap-icon { font-size: 4rem; margin-bottom: 20px; }',
'["graduate_name", "degree", "university", "gpa", "event_date", "event_time", "venue_name", "venue_address", "family_message"]',
'[{"name": "Academic Navy", "primary": "#1E3A8A", "secondary": "#DBEAFE", "accent": "#FBBF24"}, {"name": "Classic Black", "primary": "#000000", "secondary": "#F3F4F6", "accent": "#D97706"}]',
'[{"name": "Times New Roman", "value": "Times New Roman"}, {"name": "Georgia", "value": "Georgia"}, {"name": "Crimson Text", "value": "Crimson Text"}]',
1, 1, 89, 4.4, 21, 'wisuda, graduation, formal, academic, achievement', NULL, NOW(), NOW()),

(6, 'Baby Shower Cute', 'Template undangan baby shower yang cute dan adorable. Perfect untuk merayakan kedatangan buah hati.', 'baby_shower', 30000.00,
'["/images/templates/baby-shower-1.jpg", "/images/templates/baby-shower-2.jpg"]',
'{"mother_name": "Siti Nurhaliza", "father_name": "Bambang Sutrisno", "baby_gender": "Laki-laki", "event_date": "2024-09-10", "event_time": "15:00", "venue_name": "Rumah Keluarga", "venue_address": "Jl. Cempaka No. 15, Jakarta Timur"}',
'<div class="invitation-container baby-shower-theme"><section class="baby-header"><h1>👶 Baby Shower 👶</h1><p class="parents">For {{mother_name}} & {{father_name}}</p><p class="baby-info">Expecting a {{baby_gender}}</p></section><section class="shower-details"><h3>Join us for a special celebration</h3><p class="date">{{event_date}} at {{event_time}}</p><p class="venue">{{venue_name}}</p><p class="address">{{venue_address}}</p></section></div>',
'.baby-shower-theme { font-family: "Quicksand", sans-serif; background: linear-gradient(135deg, #87CEEB 0%, #F0F8FF 100%); color: #4682B4; } .baby-header { text-align: center; padding: 60px 20px; } .baby-header h1 { font-size: 2.5rem; margin-bottom: 20px; }',
'["mother_name", "father_name", "baby_gender", "due_date", "event_date", "event_time", "venue_name", "venue_address", "registry_info"]',
'[{"name": "Baby Blue", "primary": "#87CEEB", "secondary": "#F0F8FF", "accent": "#FFB6C1"}, {"name": "Baby Pink", "primary": "#FFB6C1", "secondary": "#FFF0F5", "accent": "#87CEEB"}, {"name": "Neutral Yellow", "primary": "#FFFFE0", "secondary": "#FFFACD", "accent": "#F0E68C"}]',
'[{"name": "Quicksand", "value": "Quicksand"}, {"name": "Nunito", "value": "Nunito"}, {"name": "Comfortaa", "value": "Comfortaa"}]',
1, 1, 112, 4.6, 28, 'baby shower, cute, adorable, pregnancy, celebration', NULL, NOW(), NOW());

-- Sample Invitations
INSERT INTO `invitations` (`id`, `user_id`, `template_id`, `title`, `slug`, `invitation_data`, `custom_styles`, `custom_domain`, `rsvp_responses`, `guest_list`, `is_public`, `rsvp_enabled`, `guest_book_enabled`, `music_enabled`, `background_music`, `gallery_images`, `love_story`, `event_details`, `views_count`, `status`, `published_at`, `event_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sarah & Ahmad Wedding', 'sarah-ahmad-wedding-2024', 
'{"bride_name": "Sarah Amelia", "groom_name": "Ahmad Fauzi", "parents_bride": "Bapak & Ibu Sutrisno", "parents_groom": "Bapak & Ibu Rahman", "event_date": "15 Agustus 2024", "event_time": "10:00 WIB", "venue_name": "Ballroom Hotel Mulia", "venue_address": "Jl. Asia Afrika No. 8, Jakarta Pusat"}',
NULL, NULL, 
'[{"name": "John Doe", "response": "hadir", "guests": 2, "message": "Congratulations!"}, {"name": "Jane Smith", "response": "tidak_hadir", "guests": 0, "message": "Sorry can\'t make it"}]',
'[{"name": "John Doe", "phone": "+62812345678", "category": "family"}, {"name": "Jane Smith", "phone": "+62812345679", "category": "friend"}]',
1, 1, 1, 1, NULL, 
'["/storage/gallery/wedding1.jpg", "/storage/gallery/wedding2.jpg"]',
'Kami bertemu di kampus pada tahun 2020, dan sejak saat itu kami tahu bahwa kami adalah jodoh. Setelah 4 tahun bersama, kami memutuskan untuk melanjutkan ke jenjang yang lebih serius.',
'{"akad": {"date": "15 Agustus 2024", "time": "10:00 WIB", "venue": "Masjid Al-Ikhlas"}, "resepsi": {"date": "15 Agustus 2024", "time": "18:00 WIB", "venue": "Ballroom Hotel Mulia"}}',
127, 'published', NOW(), '2024-08-15 10:00:00', NOW(), NOW());

-- Sample Orders
INSERT INTO `orders` (`id`, `order_number`, `user_id`, `template_id`, `amount`, `discount`, `total_amount`, `currency`, `status`, `payment_method`, `payment_proof`, `order_details`, `notes`, `paid_at`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 'ORD-20240719-ABC123', 2, 1, 75000.00, 0.00, 75000.00, 'IDR', 'paid', 'bank_transfer', '/storage/proofs/payment1.jpg', 
'{"template_name": "Elegant Rose Gold", "license": "single_use", "support": "basic"}', 
'Pembayaran melalui transfer bank BCA', NOW(), NULL, NOW(), NOW());

-- =================================================
-- SET AUTO INCREMENT
-- =================================================
ALTER TABLE `users` AUTO_INCREMENT = 3;
ALTER TABLE `templates` AUTO_INCREMENT = 7;
ALTER TABLE `invitations` AUTO_INCREMENT = 2;
ALTER TABLE `orders` AUTO_INCREMENT = 2;
ALTER TABLE `custom_requests` AUTO_INCREMENT = 1;
ALTER TABLE `payments` AUTO_INCREMENT = 1;

-- =================================================
-- ENABLE FOREIGN KEY CHECKS
-- =================================================
SET FOREIGN_KEY_CHECKS = 1;

-- =================================================
-- COMPLETED! DATABASE READY TO USE
-- =================================================