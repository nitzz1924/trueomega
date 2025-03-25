-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 02:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trueomega`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `regularprice` varchar(255) DEFAULT NULL,
  `saleprice` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `galleryImages` varchar(255) DEFAULT NULL,
  `thumbnailImages` varchar(255) DEFAULT NULL,
  `productstatus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`id`, `productname`, `category`, `regularprice`, `saleprice`, `description`, `galleryImages`, `thumbnailImages`, `productstatus`, `created_at`, `updated_at`) VALUES
(15, 'AEROSHELL ASG64 (3-KG-TIN)', 'Chemicals', '900', '850', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'unpublished', '2025-03-06 07:31:44', '2025-03-25 04:41:01'),
(16, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Chemicals', '300', '200', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'unpublished', '2025-03-06 07:31:44', '2025-03-25 04:41:10'),
(17, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Chemicals', '565', '442', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:41:26'),
(18, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Chemicals', '1000', '987', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:41:35'),
(19, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Chemicals', '4200', '3500', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088050_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:41:48'),
(20, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Washers', '80', '75', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:41:59'),
(21, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Washers', '6000', '5000', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:42:07'),
(22, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Cleaners', '320', '260', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-25 04:42:19'),
(23, 'AEROSHELL ASG64 (3-KG-TIN) Second', 'Cleaners', '500', '450', 'AeroShell Grease 64 is a high-performance lubricant, combining the reliability of AeroShell Grease 33 with 5% molybdenum disulphide for extreme pressure properties. This long-lasting grease ensures optimal lubrication for heavily loaded, sliding steel surfaces, enhancing component longevity and reducing maintenance costs.', '[\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\"]', '1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', 'published', '2025-03-06 07:31:44', '2025-03-24 06:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blogname` varchar(255) DEFAULT NULL,
  `blogcategories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`blogcategories`)),
  `blogthumbnail` varchar(255) DEFAULT NULL,
  `blogdescription` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blogname`, `blogcategories`, `blogthumbnail`, `blogdescription`, `created_at`, `updated_at`) VALUES
(7, 'How to Showcase Your Property for Maximum Buyer Appeal', '[\"Business\",\"Computer Software\",\"Fashion\"]', '1737013391_2.png', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>When selling your property, the first impression can make all the difference. Buyers often form opinions within seconds of viewing a home, whether in person or online. To maximize your property’s appeal, it’s essential to present it in the best possible light. Here are some actionable tips to help you showcase your property and attract the right buyers.</p><p><br></p><h4>1. <strong>Enhance Curb Appeal</strong></h4><p>The exterior of your property sets the tone for what’s inside. Make sure it leaves a lasting impression.</p><ul><li><strong>Landscaping:</strong> Keep the lawn trimmed, bushes manicured, and pathways clear. Add fresh mulch, seasonal flowers, or potted plants for a welcoming touch.</li><li><strong>Exterior Maintenance:</strong> Repaint faded walls, fix broken fences, and ensure the gutters are clean.</li><li><strong>Lighting:</strong> Install outdoor lighting to highlight your home’s features and provide a safe, inviting feel during evening viewings.</li></ul><p><br></p><h4>2. <strong>Declutter and Depersonalize</strong></h4><p>Buyers want to envision themselves in the space. Decluttering and depersonalizing your home can make it easier for them to do so.</p><ul><li><strong>Declutter:</strong> Remove excess furniture and items that make the space look cramped.</li><li><strong>Depersonalize:</strong> Take down personal photos, mementos, and unique decor. Neutral spaces appeal to a broader audience.</li><li><strong>Storage:</strong> Organize closets and cabinets. Buyers will likely peek inside, and neat storage suggests the home is well-maintained.</li></ul><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -33px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2025-01-15 07:33:12', '2025-01-23 10:17:27'),
(10, 'Simple Tips to Increase the Value of Your Property', '[\"Business\",\"Health\"]', '1737614935_blog.jpg', '<p>Selling your property can be both exciting and challenging. Whether you’re planning to put it on the market or simply looking to increase its long-term value, making smart improvements can significantly enhance its appeal. Here are seven practical tips to boost your property’s value and attract potential buyers.</p><p><br></p><h3><strong>1. Refresh the Paintwork</strong></h3><p>A fresh coat of paint can transform your property, giving it a clean and modern look.</p><ul><li><strong>Neutral Colors</strong>: Opt for neutral tones like beige, gray, or white to appeal to a broader audience.</li><li><strong>Accent Walls</strong>: Add character to your living space with a single, subtle accent wall.</li></ul><p><br></p><h3><strong>2. Improve Energy Efficiency</strong></h3><p>Energy-efficient homes are in high demand. Implementing these changes can save future buyers money while increasing your property’s value:</p><ul><li><strong>LED Lighting</strong>: Replace outdated bulbs with energy-efficient LED options.</li><li><strong>Insulation</strong>: Ensure your walls and attic are properly insulated to reduce energy consumption.</li><li><strong>Smart Thermostats</strong>: Install a smart thermostat for more efficient heating and cooling.</li></ul><p><br></p><h3><strong>3. Upgrade the Kitchen</strong></h3><p>The kitchen is often the heart of the home. Upgrades here can provide the best return on investment.</p><ul><li>Replace old cabinet handles with sleek, modern designs.</li><li>Add a stylish backsplash to enhance the space’s appeal.</li><li>Consider upgrading appliances to energy-efficient models.</li></ul><p><br></p><h3><strong>4. Beautify the Bathrooms</strong></h3><p>Modernizing your bathrooms can make a huge difference.</p><ul><li>Install new fixtures such as faucets, showerheads, and towel racks.</li><li>Replace outdated mirrors with elegant, framed alternatives.</li><li>Upgrade lighting to add a touch of luxury.</li></ul>', '2025-01-23 01:18:55', '2025-01-23 01:18:55'),
(12, 'How to Showcase Your Property for Maximum Buyer Appeal', '[\"Business\",\"Computer Software\",\"Fashion\"]', '1737013391_2.png', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>When selling your property, the first impression can make all the difference. Buyers often form opinions within seconds of viewing a home, whether in person or online. To maximize your property’s appeal, it’s essential to present it in the best possible light. Here are some actionable tips to help you showcase your property and attract the right buyers.</p><p><br></p><h4>1. <strong>Enhance Curb Appeal</strong></h4><p>The exterior of your property sets the tone for what’s inside. Make sure it leaves a lasting impression.</p><ul><li><strong>Landscaping:</strong> Keep the lawn trimmed, bushes manicured, and pathways clear. Add fresh mulch, seasonal flowers, or potted plants for a welcoming touch.</li><li><strong>Exterior Maintenance:</strong> Repaint faded walls, fix broken fences, and ensure the gutters are clean.</li><li><strong>Lighting:</strong> Install outdoor lighting to highlight your home’s features and provide a safe, inviting feel during evening viewings.</li></ul><p><br></p><h4>2. <strong>Declutter and Depersonalize</strong></h4><p>Buyers want to envision themselves in the space. Decluttering and depersonalizing your home can make it easier for them to do so.</p><ul><li><strong>Declutter:</strong> Remove excess furniture and items that make the space look cramped.</li><li><strong>Depersonalize:</strong> Take down personal photos, mementos, and unique decor. Neutral spaces appeal to a broader audience.</li><li><strong>Storage:</strong> Organize closets and cabinets. Buyers will likely peek inside, and neat storage suggests the home is well-maintained.</li></ul><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -33px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2025-01-15 07:33:12', '2025-01-23 10:17:27'),
(13, 'How to Showcase Your Property for Maximum Buyer Appeal', '[\"Business\",\"Computer Software\",\"Fashion\"]', '1737013391_2.png', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>When selling your property, the first impression can make all the difference. Buyers often form opinions within seconds of viewing a home, whether in person or online. To maximize your property’s appeal, it’s essential to present it in the best possible light. Here are some actionable tips to help you showcase your property and attract the right buyers.</p><p><br></p><h4>1. <strong>Enhance Curb Appeal</strong></h4><p>The exterior of your property sets the tone for what’s inside. Make sure it leaves a lasting impression.</p><ul><li><strong>Landscaping:</strong> Keep the lawn trimmed, bushes manicured, and pathways clear. Add fresh mulch, seasonal flowers, or potted plants for a welcoming touch.</li><li><strong>Exterior Maintenance:</strong> Repaint faded walls, fix broken fences, and ensure the gutters are clean.</li><li><strong>Lighting:</strong> Install outdoor lighting to highlight your home’s features and provide a safe, inviting feel during evening viewings.</li></ul><p><br></p><h4>2. <strong>Declutter and Depersonalize</strong></h4><p>Buyers want to envision themselves in the space. Decluttering and depersonalizing your home can make it easier for them to do so.</p><ul><li><strong>Declutter:</strong> Remove excess furniture and items that make the space look cramped.</li><li><strong>Depersonalize:</strong> Take down personal photos, mementos, and unique decor. Neutral spaces appeal to a broader audience.</li><li><strong>Storage:</strong> Organize closets and cabinets. Buyers will likely peek inside, and neat storage suggests the home is well-maintained.</li></ul><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -33px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2025-01-15 07:33:12', '2025-01-23 10:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('8944f453e124ebd47c963edc5bb4d779', 'i:2;', 1742886694),
('8944f453e124ebd47c963edc5bb4d779:timer', 'i:1742886694;', 1742886694);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Master',
  `categoryimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `label`, `type`, `categoryimage`, `created_at`, `updated_at`) VALUES
(44, 'Product Categories', 'Master', '', '2025-03-01 00:46:50', '2025-03-04 04:54:16'),
(49, 'Chemicals', 'Product Categories', '1742550967_bez-imeni-1-65.jpg', '2025-03-04 05:01:18', '2025-03-21 04:26:07'),
(50, 'Cleaners', 'Product Categories', '1742550996_bez-imeni-1-65.jpg', '2025-03-04 05:01:34', '2025-03-21 04:26:36'),
(51, 'Washers', 'Product Categories', '1742550943_e885ae8cbd58d449e96a0fdee55f47b21e14b1be.jpeg', '2025-03-04 05:01:46', '2025-03-21 04:25:43'),
(52, 'Blog Categories', 'Master', '', '2025-03-25 01:48:20', '2025-03-25 01:48:20'),
(53, 'Business', 'Blog Categories', '', '2025-03-25 01:48:28', '2025-03-25 01:48:28'),
(54, 'Health', 'Blog Categories', '', '2025-03-25 01:48:36', '2025-03-25 01:48:36'),
(55, 'Computer Software', 'Blog Categories', '', '2025-03-25 01:48:53', '2025-03-25 01:48:53'),
(56, 'Fashion', 'Blog Categories', '', '2025-03-25 01:49:03', '2025-03-25 01:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_02_080358_add_two_factor_columns_to_users_table', 1),
(5, '2025_01_02_080436_create_personal_access_tokens_table', 1),
(6, '2025_01_09_070838_add_website_link_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\RegisterUser', 4, 'AuthToken', 'c66de47a3a37dd288023acbce8a9b689fe675ab3ea78510aa8f76634c8d1ead3', '[\"*\"]', '2025-02-27 07:50:00', NULL, '2025-02-06 01:18:37', '2025-02-27 07:50:00'),
(2, 'App\\Models\\RegisterUser', 4, 'AuthToken', '2fefbabb846b97adfe982636046d943ae0a733d0542cb3df0576616fb35a36d8', '[\"*\"]', NULL, NULL, '2025-02-06 05:26:40', '2025-02-06 05:26:40'),
(3, 'App\\Models\\RegisterUser', 4, 'AuthToken', 'faa67e6120bf28184d0ba3ddd2890d0a5c0a0f623dcd38431afe59155ea62d5e', '[\"*\"]', NULL, NULL, '2025-02-06 05:51:29', '2025-02-06 05:51:29'),
(4, 'App\\Models\\RegisterUser', 11, 'AuthToken', 'c2570152b33048f47492068383c1e72143978c8f3e9f177b17b7e39163797cd8', '[\"*\"]', NULL, NULL, '2025-02-06 06:08:10', '2025-02-06 06:08:10'),
(5, 'App\\Models\\RegisterUser', 11, 'AuthToken', 'dbf7c19a1eb71fa44fc1dea553a69ce4dd95f17b0a3091d924b1ed4a88324f5d', '[\"*\"]', '2025-02-06 06:56:50', NULL, '2025-02-06 06:49:32', '2025-02-06 06:56:50'),
(6, 'App\\Models\\RegisterUser', 4, 'AuthToken', 'ef5497a9641d058e851133de819223cf08889f233047b2954507184720ecf1c6', '[\"*\"]', NULL, NULL, '2025-02-08 00:29:59', '2025-02-08 00:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `policy_pages`
--

CREATE TABLE `policy_pages` (
  `id` int(11) NOT NULL,
  `pagename` varchar(255) DEFAULT NULL,
  `pagediscription` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy_pages`
--

INSERT INTO `policy_pages` (`id`, `pagename`, `pagediscription`, `created_at`, `updated_at`) VALUES
(6, 'privacy-policy', '<h3><strong>Privacy Policy</strong></h3><p><strong>Last Updated: [Date]</strong></p><p><br></p><p>Welcome to [Your Website Name]! Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information.</p><p><br></p><h4><strong>1. Information We Collect</strong></h4><p>We may collect personal information such as your name, email, and phone number when you interact with our website.</p><p><br></p><h4><strong>2. How We Use Your Information</strong></h4><p>We use your information to:</p><ul><li>Improve our website and services</li><li>Respond to inquiries</li><li>Send promotional emails (if subscribed)</li></ul><p><br></p><h4><strong>3. Cookies and Tracking</strong></h4><p>We may use cookies to enhance user experience and analyze website traffic. You can disable cookies in your browser settings.</p><p><br></p><h4><strong>4. Data Security</strong></h4><p>We take reasonable steps to protect your information, but we cannot guarantee complete security.</p><p><br></p><h4><strong>5. Third-Party Links</strong></h4><p>Our website may contain links to third-party sites. We are not responsible for their privacy practices.</p><p><br></p><h4><strong>6. Changes to This Policy</strong></h4><p>We may update this Privacy Policy from time to time. Any changes will be posted on this page.</p><p><br></p><h4><strong>7. Contact Us</strong></h4><p>If you have any questions about this policy, please contact us at <strong>[Your Email]</strong>.</p>', '2025-03-22 01:56:43', '2025-03-22 01:59:43'),
(7, 'shipping-policy', '<h3><strong>Shipping Policy</strong></h3><p><strong>Last Updated: [Date]</strong></p><p><strong><span class=\"ql-cursor\">﻿</span></strong></p><p>At <strong>[Your Website Name]</strong>, we strive to deliver your orders in a timely and efficient manner.</p><p><br></p><h4><strong>1. Shipping Locations</strong></h4><p>We currently ship to [List of Countries/Regions] and are working to expand our reach.</p><p><br></p><h4><strong>2. Processing Time</strong></h4><p>Orders are processed within <strong>[X] business days</strong> after payment confirmation. Processing times may vary during holidays or peak seasons.</p><p><br></p><h4><strong>3. Shipping Methods &amp; Delivery Time</strong></h4><p>We offer the following shipping options:</p><ul><li><strong>Standard Shipping</strong>: Estimated delivery in <strong>[X-Y] days</strong></li><li><strong>Express Shipping</strong>: Estimated delivery in <strong>[X] days</strong> (extra charges apply)</li></ul><p><br></p><h4><strong>4. Shipping Charges</strong></h4><p>Shipping costs are calculated at checkout based on your location and selected shipping method. Free shipping may be available on orders above <strong>[X] amount</strong>.</p>', '2025-03-22 01:57:27', '2025-03-22 01:59:00'),
(8, 'refund-policy', '<h3><strong>Refund Policy</strong></h3><p><strong>Last Updated: [Date]</strong></p><p>Thank you for shopping at <strong>[Your Website Name]</strong>. If you are not completely satisfied with your purchase, we\'re here to help.</p><h3><strong>1. Refund Eligibility</strong></h3><ul><li>Items must be returned within <strong>[X] days</strong> of purchase.</li><li>The product must be unused and in the same condition as received.</li><li>Proof of purchase is required for all refunds.</li></ul><h3><strong>2. Non-Refundable Items</strong></h3><ul><li>Digital products or downloadable content.</li><li>Gift cards or promotional items.</li><li>Customized or personalized products.</li></ul><h3><strong>3. Refund Process</strong></h3><ul><li>Contact our support team at <strong>[support@email.com]</strong> to initiate a refund.</li><li>Once we receive your returned item, we will inspect it and notify you about the status.</li><li>Approved refunds will be processed within <strong>[X] days</strong>, and the amount will be credited to your original payment method.</li></ul><h3><strong>4. Late or Missing Refunds</strong></h3><p>If you haven’t received a refund within the expected time, please check with your bank or payment provider. If the issue persists, contact us at <strong>[support@email.com]</strong>.</p><p>For further assistance, feel free to reach out to us.</p><p>📞 <strong>Contact:</strong> [Your Contact Info]</p><p> 📍 <strong>Address:</strong> [Your Business Address]</p><p>Let me know if you need any modifications! 🚀</p>', '2025-03-22 02:40:19', '2025-03-22 02:40:19'),
(9, 'terms-and-conditions', '<h3><strong>Terms &amp; Conditions</strong></h3><p><strong>Last Updated: [Date]</strong></p><p><strong>Welcome to [Your Website Name]</strong>! By accessing or using our website, you agree to comply with and be bound by the following terms and conditions.</p><h3><strong>1. Acceptance of Terms</strong></h3><p>By using our website, you accept these terms. If you do not agree, please do not use our services.</p><h3><strong>2. Use of Website</strong></h3><ul><li>You must be at least <strong>[X] years old</strong> to use this website.</li><li>You agree not to use the website for any illegal or unauthorized purpose.</li><li>We reserve the right to terminate or restrict access if you violate these terms.</li></ul><h3><strong>3. Intellectual Property</strong></h3><p>All content, logos, and materials on this website are the property of <strong>[Your Website Name]</strong> and may not be used without permission.</p><h3><strong>4. Limitation of Liability</strong></h3><p>We are not responsible for any direct, indirect, or incidental damages resulting from the use of our website.</p><h3><strong>5. Changes to Terms</strong></h3><p>We may update these Terms &amp; Conditions at any time. Continued use of our website means you accept any changes.</p><p>📞 <strong>Contact:</strong> [Your Contact Info]</p><p> 📍 <strong>Address:</strong> [Your Business Address]</p><p>Let me know if you need any modifications! 🚀</p>', '2025-03-22 02:41:30', '2025-03-22 02:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `register_companies`
--

CREATE TABLE `register_companies` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companylogo` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `officeaddress` text DEFAULT NULL,
  `registrationimage` varchar(255) DEFAULT NULL,
  `pancardimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_companies`
--

INSERT INTO `register_companies` (`id`, `companyname`, `companylogo`, `city`, `state`, `country`, `pincode`, `contactnumber`, `email`, `officeaddress`, `registrationimage`, `pancardimage`, `created_at`, `updated_at`) VALUES
(2, 'True Omega', '1740809527_omegafinallogo.png', 'Ajmer', 'Rajasthan', 'India', '305001', '0000000000', 'true@gmail.com', 'Demo Address', '1736320860_music.png', '1736320860_music.png', '2025-01-08 01:51:00', '2025-03-01 00:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `sponserid` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_document` varchar(255) DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `verification_status` varchar(255) DEFAULT '0',
  `userstatus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `name`, `mobile`, `email`, `password`, `sponserid`, `company_name`, `company_document`, `profile_photo_path`, `verification_status`, `userstatus`, `created_at`, `updated_at`) VALUES
(1001, 'noisyboy', '5555555555', 'true@gmail.com', '$2y$12$tVnfrOxmTYu6T2F1cPJPEOF9FoffV5D.P0A3Vzh3uWSm9xDuUEEUG', '1001', NULL, NULL, 'Anurag09.jpg', '1', 'enabled', '2025-03-01 04:09:51', '2025-03-25 10:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productid` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `ratings` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reviewtxt` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `productid`, `userid`, `ratings`, `name`, `email`, `reviewtxt`, `created_at`, `updated_at`) VALUES
(6, '18', '1001', '4', 'admin', 'true@gmail.com', 'This product is okay', '2025-03-25 06:34:34', '2025-03-25 12:16:04'),
(7, '18', '1001', '4', 'Anshul', 'ans@gmail.com', 'This Product is Excellent', '2025-03-25 06:49:56', '2025-03-25 06:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LCAJXC39YwnLEWZOG5GfsVi5UbPDEyIRfbixNSuf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUMxREZmeU9IUGpoM2sybzMyY0ZjWHF2RVVmeEdzNlVxRlRBandzRCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlci9yZWdpc3RyYXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742907808);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `fulladdress` varchar(255) DEFAULT NULL,
  `old_password` varchar(255) DEFAULT NULL,
  `new_password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `website_link`, `fulladdress`, `old_password`, `new_password`, `confirm_password`, `created_at`, `updated_at`) VALUES
(1, 'ALOKRISH PVT LTD', 'true@gmail.com', NULL, '$2y$12$uVAfvTIVFxvUGl7sQBT5XeXNnyUtEVkFs78M8zvqHFaJFl8GzOuta', NULL, NULL, NULL, NULL, NULL, '1740809706_faviomega.png', 'www.investorlands.com', 'Ajmer, Rajasthan, India.', NULL, NULL, NULL, '2025-01-02 02:38:23', '2025-03-01 00:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `mainslideriamges` varchar(255) DEFAULT NULL,
  `offersliderimages` varchar(255) DEFAULT NULL,
  `firstofferimage` varchar(255) DEFAULT NULL,
  `secondofferimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `mainslideriamges`, `offersliderimages`, `firstofferimage`, `secondofferimage`, `created_at`, `updated_at`) VALUES
(7, '[\"assets\\/images\\/Media\\/71a8b2ffe0b594a5c1b3c28090384fd7.jpg\",\"assets\\/images\\/Media\\/043a1c71577f6249b071679bce73d008.jpg\"]', '[\"assets\\/images\\/Media\\/adb0e2c465ae2a4b7698a8901fdbb177.png\",\"assets\\/images\\/Media\\/e8258e5140317ff36c7f8225a3bf9590.jpg\",\"assets\\/images\\/Media\\/cb79f8fa58b91d3af6c9c991f63962d3.jfif\"]', 'aviationlogin.jpg', '1742534407_your1site-software-company-syria-dubai-slider-1.jpg', '2025-03-20 23:50:07', '2025-03-21 10:05:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policy_pages`
--
ALTER TABLE `policy_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_companies`
--
ALTER TABLE `register_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policy_pages`
--
ALTER TABLE `policy_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `register_companies`
--
ALTER TABLE `register_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
