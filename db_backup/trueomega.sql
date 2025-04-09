-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 03:18 PM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

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
(56, 'Fashion', 'Blog Categories', '', '2025-03-25 01:49:03', '2025-03-25 01:49:03'),
(57, 'Order Status', 'Master', '', '2025-04-09 02:03:47', '2025-04-09 02:03:47'),
(58, 'Completed', 'Order Status', '', '2025-04-09 02:04:10', '2025-04-09 02:04:10'),
(59, 'Processing', 'Order Status', '', '2025-04-09 02:04:18', '2025-04-09 02:04:18'),
(60, 'Cancelled', 'Order Status', '', '2025-04-09 02:04:27', '2025-04-09 02:04:27'),
(61, 'On Hold', 'Order Status', '', '2025-04-09 02:04:34', '2025-04-09 02:04:34'),
(62, 'Refund', 'Order Status', '', '2025-04-09 02:04:41', '2025-04-09 02:04:41');

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
-- Table structure for table `my_carts`
--

CREATE TABLE `my_carts` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `productid` varchar(255) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productimage` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_carts`
--

INSERT INTO `my_carts` (`id`, `userid`, `productid`, `productname`, `productimage`, `price`, `status`, `quantity`, `created_at`, `updated_at`) VALUES
(49, '1001', '18', 'AEROSHELL ASG64 (3-KG-TIN) Second', '1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', '987', 'purchased', '2', '2025-04-04 02:54:54', '2025-04-05 02:55:22'),
(52, '1001', '20', 'AEROSHELL ASG64 (3-KG-TIN) Second', '1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg', '75', 'purchased', '2', '2025-04-04 04:39:12', '2025-04-05 02:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `grandtotal` varchar(255) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderstatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `billing_address`, `shipping_address`, `grandtotal`, `products`, `created_at`, `updated_at`, `orderstatus`) VALUES
(3, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-05 02:55:22', '2025-04-09 02:53:35', 'Completed'),
(4, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Completed'),
(5, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Completed'),
(6, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Processing'),
(7, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Processing'),
(8, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Cancelled'),
(9, '1001', '{\"b-first-name\":\"Kishan\",\"b-last-name\":\"Gopal\",\"b-company-name\":\"rrrrrrrrrrrr\",\"b-country\":\"India\",\"b-street-address\":\"kerya ki dhani markerwali\",\"b-apartment\":\"makerwali road ajmer\",\"b-city\":\"ajmer\",\"b-state\":\"Rajasthan\",\"b-postcode\":\"305004\",\"b-phone\":\"4444444444\",\"b-email\":\"rrrrrrrrrrrrrrrrrrr\",\"b-order-notes\":\"rrrrrrrrrrrrrrrrrrrrrrr\"}', '{\"s-first-name\":\"Kishan\",\"s-last-name\":\"Gopal\",\"s-company-name\":\"tttttttttttttttt\",\"s-country\":\"American Samoa\",\"s-street-address\":\"kerya ki dhani markerwali\",\"s-apartment\":\"makerwali road ajmer\",\"s-state\":\"Rajasthan\",\"s-city\":\"ajmer\",\"s-postcode\":\"305004\",\"s-order-notes\":\"tttttttttttttttttt\"}', '2124', '[{\"id\":49,\"userid\":\"1001\",\"productid\":\"18\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088006_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"987\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T08:24:54.000000Z\",\"updated_at\":\"2025-04-05T13:54:51.000000Z\"},{\"id\":52,\"userid\":\"1001\",\"productid\":\"20\",\"productname\":\"AEROSHELL ASG64 (3-KG-TIN) Second\",\"productimage\":\"1741088099_aeroshell-asg64-3-kg-tin-1000x1000-1-700x700.jpg\",\"price\":\"75\",\"status\":null,\"quantity\":\"2\",\"created_at\":\"2025-04-04T10:09:12.000000Z\",\"updated_at\":\"2025-04-05T13:54:53.000000Z\"}]', '2025-04-09 02:55:22', '2025-04-09 02:53:35', 'Cancelled');

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
  `gstpercentage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_companies`
--

INSERT INTO `register_companies` (`id`, `companyname`, `companylogo`, `city`, `state`, `country`, `pincode`, `contactnumber`, `email`, `officeaddress`, `registrationimage`, `pancardimage`, `gstpercentage`, `created_at`, `updated_at`) VALUES
(2, 'True Omega', '1740809527_omegafinallogo.png', 'Ajmer', 'Rajasthan', 'India', '305001', '0000000000', 'true@gmail.com', 'Demo Address', '1736320860_music.png', '1736320860_music.png', '5', '2025-01-08 01:51:00', '2025-04-09 01:59:27');

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
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `name`, `mobile`, `email`, `password`, `sponserid`, `company_name`, `company_document`, `profile_photo_path`, `verification_status`, `userstatus`, `remember_token`, `created_at`, `updated_at`) VALUES
(1001, 'noisyboy', '5555555555', 'true@gmail.com', '$2y$12$tVnfrOxmTYu6T2F1cPJPEOF9FoffV5D.P0A3Vzh3uWSm9xDuUEEUG', '1001', NULL, NULL, 'Anurag09.jpg', '1', 'enabled', '394680ce103720d6fc29cdc4a6c6f5e9bb4b2ef56bd659a8fe9cb1b1936eb6cd', '2025-03-01 04:09:51', '2025-04-05 00:29:18');

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
('CZLwo93iLuDC3t8CF24vTEo5hB376QAV1INMlAmz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT1RPa0dIRElsYmtrcEV5UkxIa2xvNG15cjFKRDllVU1mTVRzRzZkcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHVWQWZ2VElWRnh2VUdsN3NRQlQ1WGVYTm55VXRFVmtGczc4TTh6dnFIRmFKRmw4R3pPdXRhIjt9', 1744204260);

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `my_carts`
--
ALTER TABLE `my_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `my_carts`
--
ALTER TABLE `my_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
