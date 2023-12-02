-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 08:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `changes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`changes`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `salary` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `office`, `age`, `startdate`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Betsy Schamberger', 'employee', 'main', '44', '1990-02-26', 3569.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(2, 'Dr. Stanley Hoppe I', 'employee', 'main', '43', '1988-11-26', 4918.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(3, 'Rosalyn Hilll', 'employee', 'main', '44', '2009-02-25', 2777.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(4, 'Prof. Bobbie Roberts', 'employee', 'main', '31', '1993-11-06', 2046.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(5, 'Declan Pagac', 'employee', 'main', '40', '1996-12-16', 4050.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(6, 'Zachary Kreiger', 'employee', 'main', '29', '2001-04-15', 3485.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(7, 'Jaylin Kuhn III', 'employee', 'main', '49', '1996-10-13', 3963.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(8, 'Magdalen Hagenes', 'employee', 'main', '24', '1983-12-08', 2826.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(9, 'Prof. Emmalee Langosh V', 'employee', 'main', '37', '1991-05-18', 4472.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(10, 'Moises Jacobi', 'employee', 'main', '45', '2022-07-21', 3111.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(11, 'Dr. Antoinette Pouros Sr.', 'employee', 'main', '26', '1990-03-11', 3370.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(12, 'Mr. Maynard Bartell', 'employee', 'main', '42', '2010-07-19', 3637.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(13, 'Cleve Hartmann', 'employee', 'main', '30', '2008-06-23', 4909.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(14, 'Otto Doyle', 'employee', 'main', '49', '2020-04-11', 3579.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(15, 'Mr. Dante Torp II', 'employee', 'main', '23', '2018-08-04', 4078.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(16, 'Scarlett Beahan', 'employee', 'main', '37', '2002-11-14', 4328.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(17, 'Dr. Shanie Monahan V', 'employee', 'main', '50', '2007-05-04', 3572.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(18, 'Brisa Deckow', 'employee', 'main', '41', '2011-10-25', 4969.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(19, 'Corene Gerlach', 'employee', 'main', '25', '2005-12-14', 4824.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(20, 'Dr. Raul Padberg', 'employee', 'main', '45', '2014-10-13', 4072.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(21, 'Mr. Elias Schmidt DDS', 'employee', 'main', '41', '1979-11-06', 4696.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(22, 'Marquise Funk III', 'employee', 'main', '47', '1981-11-19', 4354.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(23, 'Kyle Reinger', 'employee', 'main', '46', '1993-03-13', 4122.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(24, 'Dr. Dean Konopelski', 'employee', 'main', '28', '2021-04-08', 3405.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(25, 'Scot Hirthe', 'employee', 'main', '23', '1989-08-22', 4164.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(26, 'Quincy Block', 'employee', 'main', '41', '1973-11-30', 4678.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(27, 'Mr. Chauncey Romaguera MD', 'employee', 'main', '36', '2009-07-17', 3949.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(28, 'Breanne Runolfsson', 'employee', 'main', '40', '1981-09-18', 2630.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(29, 'Kimberly Wintheiser MD', 'employee', 'main', '26', '1982-11-14', 4811.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(30, 'Prince DuBuque', 'employee', 'main', '30', '1992-10-15', 4502.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_08_11_063828_create_employees_table', 1),
(5, '2023_08_11_064734_create_stores_table', 1),
(6, '2023_08_11_065123_create_products_table', 1),
(7, '2023_08_11_100225_create_permission_models_table', 1),
(8, '2023_08_11_101643_create_user_has_permissions_table', 1),
(9, '2023_08_16_100731_create_roles_table', 1),
(10, '2023_08_16_102339_create_role_has_permissions_table', 1),
(11, '2023_08_16_102514_create_user_has_roles_table', 1),
(12, '2023_08_19_192108_create_activity_logs_table', 1);

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
-- Table structure for table `permission_tables`
--

CREATE TABLE `permission_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_tables`
--

INSERT INTO `permission_tables` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
(1, 'Products', 'products', NULL, NULL),
(2, 'Stores', 'stores', NULL, NULL),
(3, 'User', 'user', NULL, NULL),
(4, 'Employee', 'employee', NULL, NULL),
(5, 'Permission Table', 'permission-table', NULL, NULL),
(6, 'User Permeations', 'user-permeations', NULL, NULL),
(8, 'Role Permeations', 'role-permeations', '2023-11-30 13:22:44', '2023-11-30 13:22:44'),
(9, 'Roles', 'roles', '2023-11-30 13:26:11', '2023-11-30 13:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'quia maiores accusamus expedita error', 'Natus qui et sit nulla. Rerum nemo earum ipsa est minus et error. Expedita ut doloribus et doloremque deserunt possimus veniam. Alias est ex et enim et. Quia tempora quas quo perspiciatis nobis totam et. Nihil nemo eveniet voluptatibus illum nihil. Tempora enim voluptatibus eos.', 170, 929.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(2, 'dignissimos minus dicta id esse', 'Aliquid qui cum nemo voluptatem. Est similique voluptas nulla eos earum tempora earum. Quia minus cum quis omnis fuga excepturi. Non soluta et dignissimos mollitia ipsum accusamus nemo facere.', 113, 814.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(3, 'asperiores laudantium est quas minus', 'Placeat consequatur eum recusandae omnis. A voluptatem beatae consequuntur rem ut perferendis vel. Repudiandae adipisci et sed laborum laboriosam. Eaque vel quia et pariatur molestias dicta. Dolores laudantium alias non sunt deleniti qui nulla. Ipsa nobis fugit dolor debitis quae. Adipisci fugit qui nesciunt molestiae veniam.', 147, 694.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(4, 'odit et et labore labore', 'Sint debitis voluptatum atque. Harum quasi voluptatibus eos aliquid magnam. Necessitatibus possimus aut omnis sapiente. Modi quasi est ut doloremque consequatur. Ullam est temporibus consectetur eius minus laudantium est. Illo qui et repellendus accusamus.', 123, 903.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(5, 'aliquam dolores at minima omnis', 'Voluptas maiores nisi alias sapiente. Quia maiores facilis vero dolor deleniti cumque. Sint rerum velit exercitationem accusantium voluptas aut. Asperiores mollitia qui sapiente. Quia distinctio tenetur quia corporis voluptatum id. Saepe harum voluptatem consectetur nisi accusantium. Consequatur ut fugiat ducimus omnis dolorem.', 189, 798.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(6, 'qui ad nisi nam incidunt', 'Autem voluptas quae officiis. Sit veniam a quia at sunt ut. Soluta ut consectetur fuga. Dolor officiis sint eligendi voluptates laboriosam vero. Ut consectetur aut quaerat velit maxime natus molestiae tenetur. Vero dicta blanditiis qui voluptas est odio. Vel iure quas eum quibusdam et blanditiis quis.', 187, 609.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(7, 'porro doloremque sequi delectus quis', 'Adipisci sit et praesentium iusto est et qui. Hic rerum recusandae excepturi quis qui aut est sed. Accusamus nulla culpa et eos deleniti. Aut ea quibusdam ut cupiditate corrupti.', 139, 675.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(8, 'delectus vitae ducimus minus quo', 'Sed odit non nobis possimus temporibus voluptate aut. Ipsam ea sapiente eligendi porro id tempore. Sed iure odit vero quidem ex quos nesciunt. Omnis corporis beatae omnis. Quisquam saepe alias libero totam veritatis.', 117, 888.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(9, 'hic illum alias est quia', 'Vitae at esse enim quasi ut facere. Libero tempora itaque minima omnis commodi nihil dolores et. Facere quos nobis sint veniam cum inventore. Quia dolores harum inventore quidem pariatur velit ad.', 148, 801.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(10, 'eos ipsum quasi aut esse', 'Aliquam mollitia sit aut non corporis est. Sed deleniti minus voluptate sapiente similique consequuntur. Ipsa unde sint laudantium ducimus sit rerum recusandae eaque. Facilis id excepturi culpa sunt temporibus. Perspiciatis repellendus esse quam enim id. Voluptas eaque autem vel et velit aut aut corrupti. Sunt et reprehenderit ea.', 175, 865.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(11, 'et minima et quae laboriosam', 'Quo soluta perferendis enim doloremque maiores. Voluptatem est quas hic tempora exercitationem laboriosam numquam tenetur. Voluptatum magni excepturi eaque omnis totam voluptas. Vel neque iure et voluptas id veritatis numquam. Ipsum quis quae molestiae ut. Perferendis ipsam ut fuga. Minima nemo autem ut soluta autem debitis.', 183, 866.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(12, 'ut quo ex cumque quis', 'Ut dolore culpa quidem fugiat. Omnis est est libero perspiciatis. Praesentium ea aperiam modi. Delectus totam eligendi sunt dolor.', 134, 583.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(13, 'autem error dolor id placeat', 'Ab sunt qui sit veritatis quam sit optio omnis. Magni ut deserunt corporis cupiditate aliquid maiores. Magni consequatur non omnis quia recusandae et. Optio eos dolor neque consequuntur qui. Quas maiores eos similique quo optio.', 105, 611.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(14, 'earum libero nostrum et ipsam', 'Minus qui velit doloribus debitis. Ea corporis ea maiores est asperiores consequuntur. Reiciendis nemo labore sunt est. Qui illo dolor dolorum sed quisquam consequatur voluptas. Dolore tempora magnam quo natus ratione.', 129, 787.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(15, 'et quo repudiandae voluptate magni', 'Deserunt nihil qui et animi vitae nobis. Quisquam et modi dolor inventore eveniet possimus perspiciatis. Reprehenderit in et dolores minima quis sit nihil. Deserunt voluptate rerum vitae nam possimus odio nisi. Enim sunt eum distinctio omnis. Possimus perferendis commodi maiores aut non.', 186, 644.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(16, 'dolor amet in voluptas nam', 'Molestiae doloribus error pariatur. Est quibusdam dolor doloribus iste eum possimus reiciendis. Animi omnis sunt vitae soluta enim dolorem. Eius placeat earum labore.', 141, 923.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(17, 'hic quod officia unde fuga', 'Dicta facere nemo iusto est distinctio sunt qui ut. Et dolorum atque eum sit enim modi. Quae sunt perspiciatis quia omnis et et. Molestiae qui doloribus voluptas vel dolor reprehenderit explicabo. Aut ea sed suscipit facilis ipsam dolor ducimus recusandae.', 109, 679.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(18, 'vel ut excepturi non itaque', 'Aut rerum est similique omnis. Consequatur et quo deleniti dolorem eaque. Molestiae porro omnis repudiandae error. Culpa ut eaque quidem aliquam maiores enim sed.', 200, 766.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(19, 'enim illo dolore et dolores', 'Nemo delectus deserunt ut ut. Rem sunt atque itaque repellendus illum dignissimos ratione. Autem est deleniti unde fugiat et sit. Aspernatur voluptatem voluptatibus amet ducimus est tempora repellendus.', 192, 743.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(20, 'facere veritatis at sed qui', 'Quidem laudantium pariatur voluptates aliquid accusamus qui eum. Quo fuga voluptates voluptatem nisi numquam provident nulla. Minus reiciendis tenetur quia vel consequuntur beatae. Fuga earum at deleniti quia autem ut.', 169, 608.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(21, 'architecto ratione enim officiis aut', 'Earum vel suscipit accusantium. Dolore quaerat sit ipsa aliquam. Qui repellat ducimus quia harum animi fuga sit. Aut dolore quis eum dolores. Aut perspiciatis hic non et ad voluptas. Velit ea vitae a alias reprehenderit voluptate.', 163, 796.00, '2023-11-30 12:48:22', '2023-11-30 12:48:22'),
(22, 'aliquam sit modi nesciunt laboriosam', 'Est alias laborum doloribus quia quo nulla. Velit vitae a quia a et ut. Veniam possimus sunt quas voluptatibus sunt ratione. Et eum et ipsum non. Debitis dolorem quidem cum a animi ut ipsam. Quos voluptas velit facere est.', 142, 710.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(23, 'ut sed dolores veritatis sed', 'Corrupti quidem nemo doloremque velit. Sunt ullam sint vel. Repellendus dolore saepe magni excepturi. Placeat animi reiciendis dolorem quae iusto sed eum. In consectetur quia ut enim molestiae nemo. Aliquid omnis iure dolores.', 184, 995.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(24, 'perspiciatis repudiandae sapiente quo ratione', 'Voluptates suscipit repellat animi. Ut modi ut praesentium et voluptatem quam. Molestiae iste corrupti itaque sequi qui. Ipsum eligendi est nihil quidem.', 129, 980.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(25, 'provident exercitationem reprehenderit consectetur illo', 'Perspiciatis quidem iure deserunt molestiae delectus. Nemo quas ut consectetur voluptatem eum quia sit ea. Quos vero est odit provident. Mollitia sed ullam hic voluptate. Velit consequatur et et quia sed voluptatem corporis id. Suscipit impedit error laborum neque et esse. Asperiores tempora et temporibus cupiditate porro.', 141, 810.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(26, 'et excepturi magni molestias corrupti', 'Asperiores quo omnis qui repellat officiis tenetur. Sed ab accusantium maiores sequi. Expedita et voluptas mollitia optio et enim qui. Dolor omnis perferendis reprehenderit mollitia. Architecto sit itaque assumenda corrupti. Ut est ipsa delectus ea ad aliquid recusandae corrupti. Modi commodi qui ex nisi a libero.', 152, 747.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(27, 'ad tempore modi harum culpa', 'Eum aperiam facere excepturi sed. Qui blanditiis molestias nesciunt consequatur porro aut dolor. Ad omnis sunt nulla aut temporibus perferendis quisquam. Et suscipit ea provident nisi enim illum quis atque.', 118, 675.00, '2023-11-30 12:48:23', '2023-11-30 12:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL),
(3, 'Manager', 'manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_table_id` bigint(20) UNSIGNED NOT NULL,
  `permission_key` varchar(255) DEFAULT NULL,
  `index` tinyint(1) NOT NULL DEFAULT 0,
  `show` tinyint(1) NOT NULL DEFAULT 0,
  `store` tinyint(1) NOT NULL DEFAULT 0,
  `create` tinyint(1) NOT NULL DEFAULT 0,
  `update` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `destroy` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `role_id`, `permission_table_id`, `permission_key`, `index`, `show`, `store`, `create`, `update`, `edit`, `destroy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'products', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(8, 2, 1, 'products', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(9, 2, 2, 'stores', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(10, 2, 3, 'user', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(11, 2, 4, 'employee', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(12, 2, 5, 'permission-table', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(13, 2, 6, 'user-permeations', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(14, 2, 6, 'role-permeations', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(15, 3, 1, 'products', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(43, 3, 2, 'stores', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(44, 3, 3, 'user', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(45, 3, 4, 'employee', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(46, 1, 2, 'stores', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(47, 1, 3, 'user', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(48, 1, 4, 'employee', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(49, 1, 5, 'permission-table', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(50, 1, 6, 'user-permeations', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(51, 1, 8, 'role-permeations', 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(52, 1, 9, 'roles', 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Alva King', '9554 Terry Island Apt. 874\nPort Turner, WV 67123-9591', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(2, 'Clemens McLaughlin', '220 Jewel Union Apt. 338\nWest Garrettown, OK 40361', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(3, 'Logan Fahey', '0416 Guido Locks\nLehnermouth, WV 55975-1191', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(4, 'Daron Mills', '4671 Zoe Circle\nWest Brook, WV 88658-2053', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(5, 'Trent Altenwerth', '843 Margaret Circle\nBashirianview, CT 74364-9008', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(6, 'Mavis McLaughlin II', '126 Parisian Expressway Suite 634\nEast Adelinehaven, LA 01970', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(7, 'Prof. Elenor Hayes', '41221 Kub Route\nLake Arturo, IN 07968', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(8, 'Axel Morar', '3110 Sharon Curve\nNew Jameyton, MO 26908', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(9, 'Mrs. Araceli Dicki II', '07609 Fisher Cape Suite 862\nPort Waldo, CO 72258-3304', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(10, 'Ms. Maurine Bernhard PhD', '0348 Lorena Skyway\nNew Donna, NH 33414', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(11, 'Craig Ortiz', '5421 Smitham Pines Suite 224\nShieldsside, AZ 61169-5026', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(12, 'Dr. Forest Gorczany', '920 Dane Islands\nBreitenbergfort, IN 83618', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(13, 'Mrs. Vickie Konopelski MD', '1660 Verdie Causeway\nCheyanneland, AL 24509-1918', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(14, 'Dr. Jonathon Kuvalis I', '75923 Shemar Manor Suite 570\nDasiashire, IL 77209', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(15, 'Ron Rau', '916 Doug Fall Suite 971\nFarrellside, IL 16135-7571', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(16, 'Mrs. Raegan Kris DVM', '748 Shields Port Apt. 256\nEast Moshe, WI 20605-9894', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(17, 'Cheyanne Zieme I', '39925 Willie Via Suite 697\nSelenaborough, ND 70998-4333', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(18, 'Erna McLaughlin', '7747 Fae Pike Suite 745\nSouth Rodgertown, OK 61775', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(19, 'Miss Lenore Breitenberg', '274 Klocko Isle\nWest Cecelia, LA 21669', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(20, 'Prof. Henderson Sporer III', '81653 Trantow Rapids Suite 041\nWest Lloydside, PA 20769-1862', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(21, 'Lavada Maggio', '507 Layne Rue Apt. 614\nLake Andreanne, FL 56324-7615', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(22, 'Thea Kub', '1702 Effertz Extension Apt. 885\nLake Alyceton, NH 87055', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(23, 'Terrell Hand III', '507 DuBuque Cliffs\nLarsonshire, DC 15574-8185', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(24, 'Rita Bashirian', '55817 Wuckert Land\nWest Jerad, IA 96783-3524', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(25, 'Jermain Fay', '7020 Morar Bridge\nNew Beatrice, OK 87089', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(26, 'Virginie Fisher', '353 Darwin Expressway\nPort Thereseside, LA 60726-9270', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(27, 'Prudence Barrows V', '8787 Rachel Well\nPort Janisborough, CT 53853-1156', '2023-11-30 12:48:23', '2023-11-30 12:48:23'),
(28, 'Ms. Magnolia Wuckert II', '65037 Leannon Flat\nEast Gabriellehaven, NC 40315', '2023-11-30 12:48:23', '2023-11-30 12:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@mail.com', '2023-11-30 12:48:22', '$2y$10$VvjG67HMG1VVu2flsc6FhO5NFlKMfg1mktD9m2eJmPgVSIhpdPp8q', NULL, NULL, NULL),
(2, 'Admin2', 'admin2', 'admin2@mail.com', '2023-11-30 12:48:22', '$2y$10$9TNcRrbY4zIwtv7qhpRayel6A7b9WzKSOHPzCg7VMaPYw4KiY/Ic2', NULL, NULL, NULL),
(3, 'Manager', 'manager', 'manager@mail.com', '2023-11-30 12:48:22', '$2y$10$80q4p253Qb78JQIA9V2/K.0ihg/bm6a2QNzMiG5VkBuQc3dg5EGGm', NULL, NULL, NULL),
(4, 'Sellman', 'Sellman', 'sellman@mail.com', '2023-11-30 12:48:22', '$2y$10$Hd0VZtmkBZ4i1CevcUyk4u/7Zxf0yRFvXZjTfd7hFFn/nm1BaaEcG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_table_id` bigint(20) UNSIGNED NOT NULL,
  `permission_key` varchar(255) DEFAULT NULL,
  `index` tinyint(1) NOT NULL DEFAULT 0,
  `show` tinyint(1) NOT NULL DEFAULT 0,
  `store` tinyint(1) NOT NULL DEFAULT 0,
  `create` tinyint(1) NOT NULL DEFAULT 0,
  `update` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `destroy` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_permissions`
--

INSERT INTO `user_has_permissions` (`id`, `user_id`, `permission_table_id`, `permission_key`, `index`, `show`, `store`, `create`, `update`, `edit`, `destroy`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'products', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(2, 3, 2, 'stores', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(3, 3, 3, 'user', 1, 1, 0, 0, 0, 0, 0, NULL, NULL),
(4, 3, 6, 'user-permeations', 1, 1, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `permission_tables`
--
ALTER TABLE `permission_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_permissions_role_id_index` (`role_id`),
  ADD KEY `role_has_permissions_permission_table_id_index` (`permission_table_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_permissions_user_id_index` (`user_id`),
  ADD KEY `user_has_permissions_permission_table_id_index` (`permission_table_id`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_roles_user_id_index` (`user_id`),
  ADD KEY `user_has_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permission_tables`
--
ALTER TABLE `permission_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_table_id_foreign` FOREIGN KEY (`permission_table_id`) REFERENCES `permission_tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_table_id_foreign` FOREIGN KEY (`permission_table_id`) REFERENCES `permission_tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
