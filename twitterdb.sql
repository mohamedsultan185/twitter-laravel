-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 06:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitterdb`
--

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
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `followed_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `followed_id`, `created_at`, `updated_at`, `accepted`) VALUES
(59, 14, 3, NULL, NULL, 0),
(60, 14, 2, NULL, NULL, 1),
(73, 18, 2, NULL, NULL, 1),
(74, 2, 18, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'sultan', '2023-08-26 21:26:28', '2023-08-26 21:26:28'),
(2, 'mosoltan', '2023-08-26 21:26:28', '2023-08-26 21:26:28'),
(3, 'noone', '2023-08-26 21:26:28', '2023-08-26 21:26:28'),
(4, 'moooooo', '2023-08-26 21:28:58', '2023-08-26 21:28:58'),
(25, 'ali', '2023-08-27 14:19:29', '2023-08-27 14:19:29'),
(26, 'batata', '2023-08-27 14:55:21', '2023-08-27 14:55:21'),
(27, 'sulan', '2023-08-27 15:08:01', '2023-08-27 15:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `hashtag_tweet`
--

CREATE TABLE `hashtag_tweet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hashtag_id` bigint(20) UNSIGNED NOT NULL,
  `tweet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtag_tweet`
--

INSERT INTO `hashtag_tweet` (`id`, `hashtag_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(34, 1, 82, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tweet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(64, 2, 92, '2023-09-05 19:24:24', '2023-09-05 19:24:24'),
(65, 18, 92, '2023-09-05 19:25:25', '2023-09-05 19:25:25'),
(66, 18, 91, '2023-09-05 19:28:01', '2023-09-05 19:28:01'),
(67, 18, 95, '2023-09-05 20:49:54', '2023-09-05 20:49:54'),
(68, 18, 97, '2023-09-05 20:50:05', '2023-09-05 20:50:05'),
(69, 18, 96, '2023-09-05 21:01:05', '2023-09-05 21:01:05'),
(70, 2, 98, '2023-09-06 04:25:12', '2023-09-06 04:25:12'),
(71, 18, 103, '2023-09-06 04:50:49', '2023-09-06 04:50:49'),
(72, 18, 98, '2023-09-06 04:51:51', '2023-09-06 04:51:51');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_10_132424_create_tweets_table', 1),
(6, '2023_08_10_132521_create_follows_table', 1),
(7, '2023_08_10_132607_create_likes_table', 1),
(8, '2023_08_10_132634_create_retweets_table', 1),
(9, '2023_08_17_084510_add_accepted_to_follows_table', 2),
(11, '2023_08_20_072609_add_keys_to_tweets', 3),
(15, '2023_08_24_073743_create_photos_table', 4),
(16, '2023_08_24_092859_removeimage-table-tweets', 5),
(20, '2023_08_24_093233_remove_image_column_from_tweets', 6),
(23, '2023_08_24_124857_type_image_column_from_photos', 7),
(24, '2023_08_26_135700_create_hashtags_table', 8),
(25, '2023_08_26_140401_create_hashtag_tweet_table', 9),
(26, '2023_09_04_072017_create_notifications_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('048f45a6-cc96-4c28-8024-ffa1914776fe', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":97,\"user_name\":null,\"tweet_content\":\"fsdgsdfgsfdgsf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:50:05', '2023-09-05 20:50:05'),
('06e91c96-e400-4893-b173-f4c0d9d24fdb', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":95,\"user_name\":null,\"tweet_content\":\"adfdsfdsfdsfdsdddddddddddd\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:49:58', '2023-09-05 20:49:58'),
('0a3a18f1-163d-49a6-bf7f-e013ce631938', 'App\\Notifications\\LikeNotification', 'App\\Models\\User', 2, '{\"type\":\"like\",\"user_name\":\"mohamed\",\"message\":\"liked your post.\"}', NULL, '2023-09-06 21:27:07', '2023-09-06 21:27:07'),
('0c36fb2c-9584-4759-8edc-c4d7c06889ef', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":90,\"user_name\":null,\"tweet_content\":\"5ljjjjkkjkj\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:03:48', '2023-09-05 19:03:48'),
('13aaa405-a564-4b27-a3fb-a4a5dc287424', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":102,\"user_name\":\"Sultan\",\"tweet_content\":\"smjjjjjjjj\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:31:08', '2023-09-06 04:31:08'),
('16a80004-c757-43f0-8c2b-e952f6606d33', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"type\":\"tweet\",\"tweet_id\":123,\"user_name\":null,\"tweet_content\":\"ssssss\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:05:30', '2023-09-06 21:05:30'),
('18d3f307-ec28-4e57-b012-e9edef989412', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":93,\"user_name\":null,\"tweet_content\":\"sdffgsdffdgfdsfsfdsd\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:10:28', '2023-09-05 20:10:28'),
('1c92dc3b-295c-4aa4-a806-dd86ad2e78db', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":99,\"user_name\":\"Sultan\",\"tweet_content\":\"sultaaaaaaa\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:24:10', '2023-09-06 04:24:10'),
('22ead3ee-a827-430e-946b-136ac3ec7bd8', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":77,\"tweet_content\":\"ksdfkjdskfjksdjfksdjkfjsdkfjsdkfjsdkfjksdjfksdjk\"}', NULL, '2023-09-04 14:38:30', '2023-09-04 14:38:30'),
('2ae6246b-5812-4c59-9200-2cc83d820ea4', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":95,\"user_name\":null,\"tweet_content\":\"adfdsfdsfdsfdsdddddddddddd\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:49:54', '2023-09-05 20:49:54'),
('336a00de-13c2-4641-bca8-2842e3ac4d85', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":91,\"user_name\":null,\"tweet_content\":\"121212121\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:03:52', '2023-09-05 19:03:52'),
('345bfe3e-558f-4aee-bfda-628c425c0c05', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"type\":\"tweet\",\"tweet_id\":124,\"user_name\":null,\"tweet_content\":\"sssssss\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:09:28', '2023-09-06 21:09:28'),
('3bc6cfd0-264c-4f94-a764-fa35457d7443', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":83,\"user_name\":null,\"tweet_content\":\"sdfggfdsdfghgfddfghh\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 18:56:07', '2023-09-05 18:56:07'),
('4123bcf3-551b-4f6b-a0c2-97dc48832e78', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":92,\"user_name\":null,\"tweet_content\":\"\\u0634\\u0633\\u064a\\u0628\\u0634\\u0628\\u0633\\u064a\\u0628\\u0633\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:19:31', '2023-09-05 19:19:31'),
('42c0a7d1-e267-446a-be0f-6c8fc4bff9ca', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":125,\"user_name\":\"Sultan\",\"tweet_content\":\"ali\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:16:03', '2023-09-06 21:16:03'),
('4847c846-ae9b-4aa2-bb29-fce887ce2371', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":93,\"user_name\":null,\"tweet_content\":\"sdffgsdffdgfdsfsfdsd\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:10:49', '2023-09-05 20:10:49'),
('56ccc313-6bab-4d11-8464-c973d721ee29', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":79,\"user_name\":{\"id\":2,\"name\":\"Sultan\",\"username\":\"racabal\",\"email\":\"paxomuqe@mailinator.com\",\"email_verified_at\":null,\"image\":\"1692881295.png\",\"phone\":\"+1 (257) 566-5971\",\"birthday\":\"2003-11-05\",\"deleted_at\":null,\"created_at\":\"2023-08-16T06:06:34.000000Z\",\"updated_at\":\"2023-08-24T14:03:06.000000Z\"},\"tweet_content\":\"SDSFDSFSDFDSFD\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 14:20:55', '2023-09-05 14:20:55'),
('643a4f5c-15a8-4a6f-8d14-29e5fe751df8', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":101,\"user_name\":\"Sultan\",\"tweet_content\":\"smjjjjjjjj\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:27:23', '2023-09-06 04:27:23'),
('6697f064-4036-477b-987e-20a3b953b1e2', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":78,\"tweet_content\":\"sultan\"}', '0000-00-00 00:00:00', '2023-09-04 14:41:52', '2023-09-04 14:46:06'),
('7f93db0d-cd45-4a50-820e-758bae49f4c6', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":98,\"user_name\":\"Sultan\",\"tweet_content\":\"jsdfhifidfisdhfisdhfisdhfisdhfsdihf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:22:31', '2023-09-06 04:22:31'),
('82dea8d0-efe5-4397-a5ea-24c2cb27d113', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"type\":\"tweet\",\"tweet_id\":125,\"user_name\":\"Sultan\",\"tweet_content\":\"ali\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:16:04', '2023-09-06 21:16:04'),
('88acec25-3a1b-41e0-9f7b-412928b2c726', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":126,\"user_name\":\"Sultan\",\"tweet_content\":\"dasdasdasdasdasda\",\"message\":\"Sultan has posted a new tweet:\"}', NULL, '2023-09-06 21:19:07', '2023-09-06 21:19:07'),
('8adfb0a8-24c3-4116-86da-8392a1bd7dfe', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":105,\"user_name\":\"Sultan\",\"tweet_content\":\"solyaaashkfdhjfjdjfhj\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:49:13', '2023-09-06 04:49:13'),
('94ccd2fe-84f0-46a1-af5b-d6add50fd1dd', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 2, '{\"type\":\"tweet\",\"tweet_id\":128,\"user_name\":\"mohamed\",\"tweet_content\":\"asdadsadas\",\"message\":\"mohamed has posted a new tweet : \"}', NULL, '2023-09-06 22:24:52', '2023-09-06 22:24:52'),
('98969cc4-9a8f-4473-b4ef-cd9bbf3a7262', 'App\\Notifications\\RetweetNotification', 'App\\Models\\User', 2, '{\"type\":\"retweet\",\"user_name\":\"mohamed\",\"message\":\"retweet your post.\"}', NULL, '2023-09-06 21:30:12', '2023-09-06 21:30:12'),
('98f3fe86-32c8-4929-b011-3074dac95b9d', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":104,\"user_name\":\"Sultan\",\"tweet_content\":\"hiiiiiiiiiii\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:42:40', '2023-09-06 04:42:40'),
('9b9ff34e-36dc-4066-9b54-36ca5147caae', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":97,\"user_name\":null,\"tweet_content\":\"fsdgsdfgsfdgsf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:39:17', '2023-09-05 20:39:17'),
('a16e4fed-12db-4368-b737-993a15247d51', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":97,\"user_name\":null,\"tweet_content\":\"fsdgsdfgsfdgsf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:50:09', '2023-09-05 20:50:09'),
('a241210f-c6ef-4310-8e42-74bb26695915', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":91,\"user_name\":null,\"tweet_content\":\"121212121\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:03:52', '2023-09-05 19:03:52'),
('a26fcd45-5651-475f-8996-9d8f4204d0a0', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":78,\"tweet_content\":\"sultan\"}', NULL, '2023-09-04 14:41:52', '2023-09-04 14:41:52'),
('a324e83f-89c1-4783-8343-d22f9c2adb1b', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 2, '{\"tweet_id\":122,\"user_name\":null,\"tweet_content\":\"asdasdadas\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:04:31', '2023-09-06 21:04:31'),
('a48bcfaa-72cc-4377-93c8-b5ed5a62db66', 'App\\Notifications\\LikeNotification', 'App\\Models\\User', 2, '{\"type\":\"like\",\"user_name\":\"mohamed\",\"message\":\"liked your post.\"}', NULL, '2023-09-06 21:28:10', '2023-09-06 21:28:10'),
('aa06e140-001e-4d56-9e29-a30de210bd8a', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":90,\"user_name\":null,\"tweet_content\":\"5ljjjjkkjkj\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:03:48', '2023-09-05 19:03:48'),
('b1c0f15b-2d9f-4129-9a98-c3ab8dc8c921', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":124,\"user_name\":null,\"tweet_content\":\"sssssss\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:09:27', '2023-09-06 21:09:27'),
('b39409b7-172d-45db-9392-046374fe0c45', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":121,\"user_name\":null,\"tweet_content\":\"dsfdsfsdf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:04:17', '2023-09-06 21:04:17'),
('b667db48-b8f3-4627-b486-2afba9ce432e', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":80,\"user_name\":\"Sultan\",\"tweet_content\":\"sdadasdasadsad\",\"message\":\"Your notification message here\",\"0\":\"\"}', NULL, '2023-09-05 17:04:15', '2023-09-05 17:04:15'),
('b758cccc-aff7-40c0-8e69-a9286f772259', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":123,\"user_name\":null,\"tweet_content\":\"ssssss\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:05:30', '2023-09-06 21:05:30'),
('b932c7f0-6e74-4192-b8e6-b23ecdf10bb0', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"tweet_id\":92,\"user_name\":null,\"tweet_content\":\"\\u0634\\u0633\\u064a\\u0628\\u0634\\u0628\\u0633\\u064a\\u0628\\u0633\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 19:19:31', '2023-09-05 19:19:31'),
('c0040ba1-5655-4c17-9a5a-39270fba9a8f', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":97,\"user_name\":null,\"tweet_content\":\"fsdgsdfgsfdgsf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 20:39:21', '2023-09-05 20:39:21'),
('d5b52864-5072-4142-82d3-9c3422687d12', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"type\":\"tweet\",\"tweet_id\":126,\"user_name\":\"Sultan\",\"tweet_content\":\"dasdasdasdasdasda\",\"message\":\"Sultan has posted a new tweet:\"}', NULL, '2023-09-06 21:19:08', '2023-09-06 21:19:08'),
('dd64b07b-5c60-4316-92a7-c69ffbe47d0c', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":77,\"tweet_content\":\"ksdfkjdskfjksdjfksdjkfjsdkfjsdkfjsdkfjksdjfksdjk\"}', '2023-09-04 14:46:06', '2023-09-04 14:38:30', '2023-09-04 14:46:06'),
('e29f9766-3ffe-4974-96e0-c1932496b1c5', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":80,\"user_name\":\"Sultan\",\"tweet_content\":\"sdadasdasadsad\",\"message\":\"Your notification message here\",\"0\":\"\"}', NULL, '2023-09-05 17:04:15', '2023-09-05 17:04:15'),
('e3338ce8-75e4-4195-87f9-ea4210d1eb67', 'App\\Notifications\\LikeNotification', 'App\\Models\\User', 2, '{\"type\":\"like\",\"user_name\":\"mohamed\",\"message\":\"liked your post.\"}', NULL, '2023-09-05 21:01:10', '2023-09-05 21:01:10'),
('f2dfdcf0-40b8-457e-8bda-5718c1a7b0fb', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 14, '{\"type\":\"tweet\",\"tweet_id\":103,\"user_name\":\"Sultan\",\"tweet_content\":\"mosultan\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 04:34:10', '2023-09-06 04:34:10'),
('f35942a3-b163-471d-9b26-e4c1b6c2c680', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":121,\"user_name\":null,\"tweet_content\":\"dsfdsfsdf\",\"message\":\"Your notification message here\"}', NULL, '2023-09-06 21:04:17', '2023-09-06 21:04:17'),
('ff7ac38a-69ba-4019-b450-6e7149b51945', 'App\\Notifications\\NewTweetNotification', 'App\\Models\\User', 18, '{\"tweet_id\":79,\"user_name\":{\"id\":2,\"name\":\"Sultan\",\"username\":\"racabal\",\"email\":\"paxomuqe@mailinator.com\",\"email_verified_at\":null,\"image\":\"1692881295.png\",\"phone\":\"+1 (257) 566-5971\",\"birthday\":\"2003-11-05\",\"deleted_at\":null,\"created_at\":\"2023-08-16T06:06:34.000000Z\",\"updated_at\":\"2023-08-24T14:03:06.000000Z\"},\"tweet_content\":\"SDSFDSFSDFDSFD\",\"message\":\"Your notification message here\"}', NULL, '2023-09-05 14:20:56', '2023-09-05 14:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image_path`, `imageable_type`, `imageable_id`, `created_at`, `updated_at`, `type`) VALUES
(1, '1692870075_40d473100540787.5f0b4b80cf471.jpg', 'App\\Models\\Tweet', 53, '2023-08-24 16:41:15', '2023-08-24 16:41:15', NULL),
(2, '1692870086_40d473100540787.5f0b4b80cf471.jpg', 'App\\Models\\Tweet', 54, '2023-08-24 16:41:26', '2023-08-24 16:41:26', NULL),
(3, '1692870086_5C9D35A3-ABAE-4591-B12E-4640E28E6D8E (1).png', 'App\\Models\\Tweet', 54, '2023-08-24 16:41:26', '2023-08-24 16:41:26', NULL),
(4, '1692870086_Capture1.PNG', 'App\\Models\\Tweet', 54, '2023-08-24 16:41:26', '2023-08-24 16:41:26', NULL),
(5, '1692870086_Capture.PNG', 'App\\Models\\Tweet', 54, '2023-08-24 16:41:26', '2023-08-24 16:41:26', NULL),
(6, '1692870243_40d473100540787.5f0b4b80cf471.jpg', 'App\\Models\\Tweet', 55, '2023-08-24 16:44:03', '2023-08-24 16:44:03', NULL),
(7, '1692870243_5C9D35A3-ABAE-4591-B12E-4640E28E6D8E (1).png', 'App\\Models\\Tweet', 55, '2023-08-24 16:44:03', '2023-08-24 16:44:03', NULL),
(8, '1692870243_Capture1.PNG', 'App\\Models\\Tweet', 55, '2023-08-24 16:44:03', '2023-08-24 16:44:03', NULL),
(9, '1692870243_Capture.PNG', 'App\\Models\\Tweet', 55, '2023-08-24 16:44:03', '2023-08-24 16:44:03', NULL),
(10, '1692870261_40d473100540787.5f0b4b80cf471.jpg', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(11, '1692870261_5C9D35A3-ABAE-4591-B12E-4640E28E6D8E (1).png', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(12, '1692870261_Capture1.PNG', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(13, '1692870261_Capture.PNG', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(14, '1692870261_unauthorized-person.png', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(15, '1692870261_logout.png', 'App\\Models\\Tweet', 56, '2023-08-24 16:44:21', '2023-08-24 16:44:21', NULL),
(16, '1692880152_coddver.jpg', 'App\\Models\\User', 2, '2023-08-24 19:07:35', '2023-08-24 19:29:12', NULL),
(17, '1692885786_cover.jpg', 'App\\Models\\User', 2, '2023-08-24 20:12:04', '2023-08-24 21:03:06', 'cover'),
(18, '1692885786.jpeg', 'App\\Models\\User', 2, '2023-08-24 20:16:27', '2023-08-24 21:03:06', 'profile'),
(19, '1693123594_Capture5.PNG', 'App\\Models\\Tweet', 75, '2023-08-27 15:06:34', '2023-08-27 15:06:34', NULL),
(20, '1693123681_php.png', 'App\\Models\\Tweet', 76, '2023-08-27 15:08:01', '2023-08-27 15:08:01', NULL),
(21, '1693123681_images (1).jfif', 'App\\Models\\Tweet', 76, '2023-08-27 15:08:01', '2023-08-27 15:08:01', NULL),
(22, '1693830672.jpg', 'App\\Models\\User', 18, '2023-09-04 19:31:12', '2023-09-04 19:31:12', 'profile'),
(23, '1693908908_Capture11111111.PNG', 'App\\Models\\Tweet', 81, '2023-09-05 17:15:08', '2023-09-05 17:15:08', NULL),
(24, '1693908908_Capture34567.PNG', 'App\\Models\\Tweet', 81, '2023-09-05 17:15:08', '2023-09-05 17:15:08', NULL),
(25, '1693909008_cover.PNG', 'App\\Models\\User', 18, '2023-09-05 17:16:48', '2023-09-05 17:16:48', 'cover'),
(26, '1693919450_Capture12356754.PNG', 'App\\Models\\Tweet', 93, '2023-09-05 20:10:50', '2023-09-05 20:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retweets`
--

CREATE TABLE `retweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tweet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retweets`
--

INSERT INTO `retweets` (`id`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(78, 2, 92, '2023-09-05 19:24:27', '2023-09-05 19:24:27'),
(79, 18, 126, '2023-09-06 21:27:03', '2023-09-06 21:27:03'),
(80, 18, 125, '2023-09-06 21:28:06', '2023-09-06 21:28:06'),
(81, 18, 124, '2023-09-06 21:30:08', '2023-09-06 21:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `retweet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_to_tweet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `content`, `retweet_id`, `reply_to_tweet_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(38, 'qwertyuiop', NULL, NULL, 2, NULL, '2023-08-24 13:45:10', '2023-08-24 13:45:10'),
(55, 'mosultan', NULL, NULL, 2, NULL, '2023-08-24 16:44:03', '2023-08-24 16:44:03'),
(56, 'sultan', NULL, NULL, 2, NULL, '2023-08-24 16:44:21', '2023-08-24 16:44:21'),
(57, 'sdsfgsadasdasdasd', NULL, NULL, 2, NULL, '2023-08-24 17:15:31', '2023-08-24 17:15:31'),
(58, 'sdsfsdfsdf', NULL, NULL, 2, NULL, '2023-08-24 17:16:01', '2023-08-24 17:16:01'),
(59, 'efewfeewfwefewf', NULL, NULL, 2, NULL, '2023-08-24 17:17:17', '2023-08-24 17:17:17'),
(60, 'dfdddddddddddddd', NULL, NULL, 2, NULL, '2023-08-24 17:17:29', '2023-08-24 17:17:29'),
(61, 'fsdafsdafas', NULL, NULL, 2, NULL, '2023-08-24 17:18:15', '2023-08-24 17:18:15'),
(62, 'sadasdasdasda', NULL, NULL, 2, NULL, '2023-08-24 17:18:59', '2023-08-24 17:18:59'),
(80, 'sdadasdasadsad', NULL, NULL, 2, NULL, '2023-09-05 17:04:15', '2023-09-05 17:04:15'),
(81, 'sdfsdfsdfsd', NULL, NULL, 18, NULL, '2023-09-05 17:15:08', '2023-09-05 17:15:08'),
(82, 'dafsdfsfsfsd #sultan', NULL, NULL, 18, NULL, '2023-09-05 17:15:34', '2023-09-05 17:15:34'),
(83, 'sdfggfdsdfghgfddfghh', NULL, NULL, 2, NULL, '2023-09-05 18:56:06', '2023-09-05 18:56:06'),
(84, 'sdfggfdsdfghgfddfghh', NULL, NULL, 2, NULL, '2023-09-05 18:59:03', '2023-09-05 18:59:03'),
(85, 'sdfggfdsddfghgfddfghh', NULL, NULL, 2, NULL, '2023-09-05 18:59:10', '2023-09-05 18:59:10'),
(86, 'sdfggfdsddfghgfddfghh', NULL, NULL, 2, NULL, '2023-09-05 19:00:13', '2023-09-05 19:00:13'),
(87, 'sdfggfdsddfghgdfddfghh', NULL, NULL, 2, NULL, '2023-09-05 19:00:18', '2023-09-05 19:00:18'),
(88, 'adkdfdshksdkdjkdhdhkdhkddhkdh', NULL, NULL, 2, NULL, '2023-09-05 19:00:30', '2023-09-05 19:00:30'),
(89, '5ljjjjkkjkj', NULL, NULL, 2, NULL, '2023-09-05 19:02:26', '2023-09-05 19:02:26'),
(90, '5ljjjjkkjkj', NULL, NULL, 2, NULL, '2023-09-05 19:03:48', '2023-09-05 19:03:48'),
(91, '121212121', NULL, NULL, 2, NULL, '2023-09-05 19:03:52', '2023-09-05 19:03:52'),
(92, 'شسيبشبسيبس', NULL, NULL, 2, NULL, '2023-09-05 19:19:31', '2023-09-05 19:19:31'),
(93, 'sdffgsdffdgfdsfsfdsd', NULL, NULL, 2, NULL, '2023-09-05 20:10:28', '2023-09-05 20:10:28'),
(94, 'dasfsdfsdfsddss', NULL, NULL, 2, NULL, '2023-09-05 20:11:27', '2023-09-05 20:11:27'),
(95, 'adfdsfdsfdsfdsdddddddddddd', NULL, NULL, 2, NULL, '2023-09-05 20:25:01', '2023-09-05 20:25:01'),
(96, 'sultaaaa', NULL, NULL, 2, NULL, '2023-09-05 20:28:30', '2023-09-05 20:28:30'),
(97, 'fsdgsdfgsfdgsf', NULL, NULL, 2, NULL, '2023-09-05 20:39:17', '2023-09-05 20:39:17'),
(98, 'jsdfhifidfisdhfisdhfisdhfisdhfsdihf', NULL, NULL, 2, NULL, '2023-09-06 04:22:29', '2023-09-06 04:22:29'),
(99, 'sultaaaaaaa', NULL, NULL, 2, NULL, '2023-09-06 04:24:10', '2023-09-06 04:24:10'),
(100, 'sddshhsjh', NULL, NULL, 18, NULL, '2023-09-06 04:26:13', '2023-09-06 04:26:13'),
(101, 'smjjjjjjjj', NULL, NULL, 2, NULL, '2023-09-06 04:27:23', '2023-09-06 04:27:23'),
(102, 'smjjjjjjjj', NULL, NULL, 2, NULL, '2023-09-06 04:31:08', '2023-09-06 04:31:08'),
(103, 'mosultan', NULL, NULL, 2, NULL, '2023-09-06 04:34:10', '2023-09-06 04:34:10'),
(104, 'hiiiiiiiiiii', NULL, NULL, 2, NULL, '2023-09-06 04:42:37', '2023-09-06 04:42:37'),
(105, 'solyaaashkfdhjfjdjfhj', NULL, NULL, 2, NULL, '2023-09-06 04:49:12', '2023-09-06 04:49:12'),
(106, 'jsjjsjsjsjjsjsjsjjjjjjj', NULL, NULL, 2, NULL, '2023-09-06 20:42:14', '2023-09-06 20:42:14'),
(107, 'jsjjsjsjsjjsjsjsjjjjjjj', NULL, NULL, 2, NULL, '2023-09-06 20:46:35', '2023-09-06 20:46:35'),
(108, 'jsjjsjsjsjjsjsjsjjjjjjj', NULL, NULL, 2, NULL, '2023-09-06 20:47:21', '2023-09-06 20:47:21'),
(109, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:47:44', '2023-09-06 20:47:44'),
(110, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:49:04', '2023-09-06 20:49:04'),
(111, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:49:23', '2023-09-06 20:49:23'),
(112, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:49:28', '2023-09-06 20:49:28'),
(113, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:49:40', '2023-09-06 20:49:40'),
(114, 'ssssssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:50:35', '2023-09-06 20:50:35'),
(115, 'sadasdasdasd', NULL, NULL, 2, NULL, '2023-09-06 20:53:30', '2023-09-06 20:53:30'),
(116, 'sadasdasdsa', NULL, NULL, 18, NULL, '2023-09-06 20:55:52', '2023-09-06 20:55:52'),
(117, 'ssssssssss', NULL, NULL, 2, NULL, '2023-09-06 20:58:04', '2023-09-06 20:58:04'),
(118, '123456543423', NULL, NULL, 18, NULL, '2023-09-06 20:58:29', '2023-09-06 20:58:29'),
(119, 'asdasdadas', NULL, NULL, 18, NULL, '2023-09-06 21:00:04', '2023-09-06 21:00:04'),
(120, 'سسسس', NULL, NULL, 2, NULL, '2023-09-06 21:02:34', '2023-09-06 21:02:34'),
(121, 'dsfdsfsdf', NULL, NULL, 2, NULL, '2023-09-06 21:04:17', '2023-09-06 21:04:17'),
(122, 'asdasdadas', NULL, NULL, 18, NULL, '2023-09-06 21:04:31', '2023-09-06 21:04:31'),
(123, 'ssssss', NULL, NULL, 2, NULL, '2023-09-06 21:05:30', '2023-09-06 21:05:30'),
(124, 'sssssss', NULL, NULL, 2, NULL, '2023-09-06 21:09:23', '2023-09-06 21:09:23'),
(125, 'ali', NULL, NULL, 2, NULL, '2023-09-06 21:15:59', '2023-09-06 21:15:59'),
(126, 'dasdasdasdasdasda', NULL, NULL, 2, NULL, '2023-09-06 21:19:03', '2023-09-06 21:19:03'),
(127, 'asddadasdasdasd', NULL, 126, 2, NULL, '2023-09-06 22:01:25', '2023-09-06 22:01:25'),
(128, 'asdadsadas', NULL, NULL, 18, NULL, '2023-09-06 22:24:48', '2023-09-06 22:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `image`, `phone`, `birthday`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Sultan', 'racabal', 'paxomuqe@mailinator.com', NULL, '$2y$10$zPsUxggCe3/Je100YNTKM.po9vyXQ68ObOeyVHnjouLk/MlzR/9OC', '1692881295.png', '+1 (257) 566-5971', '2003-11-05', NULL, 'tddYliVdvrOq6CtFA3XBZL2rbBn9ghTzNeku0zAROcok6nbLsWDPHUtGQGs3', '2023-08-16 13:06:34', '2023-09-06 20:59:48'),
(3, 'Wyatt Block V', 'madeline27', 'columbus.hartmann@example.org', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '757.719.2655', NULL, NULL, 'HWVoJIpyMj', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(4, 'Aglae Cremin', 'gilbert89', 'hartmann.reilly@example.net', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1-407-689-9124', NULL, NULL, '2IP8CCUVcK', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(5, 'Dylan Rempel II', 'ykuhic', 'neal.stehr@example.com', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '424-483-3313', NULL, NULL, 'mlnbGLTS9L', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(6, 'Sandy Hackett', 'jett.eichmann', 'lempi.nitzsche@example.net', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+12548788165', NULL, NULL, 'eEf37hz4r8', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(7, 'Van Kris', 'sister30', 'savanah.keebler@example.com', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1.272.249.0632', NULL, NULL, 'R4H5e66IvN', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(8, 'Rebeca Leannon III', 'estevan27', 'bechtelar.vernon@example.org', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+16022354557', NULL, NULL, 'IQXRanodKG', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(9, 'Gail Cruickshank', 'aufderhar.albert', 'ialtenwerth@example.org', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '315.276.7504', NULL, NULL, '1oWd9GHvM1', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(10, 'Lucienne Bailey', 'damaris42', 'awunsch@example.net', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1.351.631.0478', NULL, NULL, 'WbwIWfqMNr', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(11, 'Maximus Pacocha', 'schiller.durward', 'kmuller@example.net', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '458.468.4885', NULL, NULL, 'hOQL7W8guq', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(12, 'Stephen Hermann', 'catherine.jacobi', 'dbalistreri@example.org', '2023-08-17 14:09:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '936.352.2530', NULL, NULL, '6Q26wLVYET', '2023-08-17 14:09:03', '2023-08-17 14:09:03'),
(13, 'Octavius Massey', 'cidis', 'bobeloquk@mailinator.com', NULL, '$2y$10$kAiGujhWoAXuNtqRxWiqe.E1Rg8aZo.59UtwQHKdwH7ygL9a4s6D.', NULL, '+1 (854) 239-2118', '2003-11-10', NULL, NULL, '2023-08-17 17:04:04', '2023-08-17 17:04:04'),
(14, 'Faith Delaney', 'xyxuh', 'hipiwucu@mailinator.com', NULL, '$2y$10$Y12FA7i9uof7rdsBs.ffAOS1xU0plgWGo6SaKr3hcYY8n2kqzMU3S', NULL, '+1 (977) 444-6858', '1981-02-22', NULL, NULL, '2023-08-17 19:01:55', '2023-08-17 20:59:10'),
(15, 'Leo Britt', 'mikub', 'qutawukydi@mailinator.com', NULL, '$2y$10$/gORyfVT2RorekG1P1Hd6eFagnfv4NeLNL4G6cZ9e.cYEO.J8.xcm', NULL, '+1 (631) 194-2501', '1996-10-19', NULL, NULL, '2023-08-22 13:56:25', '2023-08-22 13:56:25'),
(16, 'Alvin Reeves', 'kuzedyhi', 'vabywuz@mailinator.com', NULL, '$2y$10$TiJMzoAC9d7F6wb3qi3V0.8ksIzK0wWSald9zU5sAyngG9s.9g4TW', NULL, '+1 (423) 699-8468', '1997-12-28', NULL, NULL, '2023-08-22 16:07:37', '2023-08-22 16:59:29'),
(17, 'sultaaaaa', 'sjjsjsjsjSjsj', 'kssisiisisi@gmail.com', NULL, '$2y$10$CizZGsOU6EphubD4DFFpauofPrrUQEPw6iDnACyhk/qmI.xpQf/yK', NULL, '01064512043', '2023-08-22', NULL, NULL, '2023-08-22 16:10:54', '2023-08-22 16:10:54'),
(18, 'mohamed', 'ali', 'soltan11@gmail.com', NULL, '$2y$10$tVS4QO0N4MbPAic7DsMakOfDRJGyDo5paIUtNMAO/G0KZxoRT3Ru2', NULL, '01064512043', '2023-08-23', NULL, NULL, '2023-08-23 16:03:18', '2023-08-23 16:42:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_follower_id_foreign` (`follower_id`),
  ADD KEY `follows_followed_id_foreign` (`followed_id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hashtag_tweet`
--
ALTER TABLE `hashtag_tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hashtag_tweet_hashtag_id_foreign` (`hashtag_id`),
  ADD KEY `hashtag_tweet_tweet_id_foreign` (`tweet_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_tweet_id_foreign` (`tweet_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `retweets`
--
ALTER TABLE `retweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retweets_user_id_foreign` (`user_id`),
  ADD KEY `retweets_tweet_id_foreign` (`tweet_id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tweets_user_id_foreign` (`user_id`),
  ADD KEY `tweets_retweet_id_foreign` (`retweet_id`),
  ADD KEY `tweets_reply_to_tweet_id_foreign` (`reply_to_tweet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hashtag_tweet`
--
ALTER TABLE `hashtag_tweet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `retweets`
--
ALTER TABLE `retweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_followed_id_foreign` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hashtag_tweet`
--
ALTER TABLE `hashtag_tweet`
  ADD CONSTRAINT `hashtag_tweet_hashtag_id_foreign` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hashtag_tweet_tweet_id_foreign` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_tweet_id_foreign` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `retweets`
--
ALTER TABLE `retweets`
  ADD CONSTRAINT `retweets_tweet_id_foreign` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `retweets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_reply_to_tweet_id_foreign` FOREIGN KEY (`reply_to_tweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tweets_retweet_id_foreign` FOREIGN KEY (`retweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tweets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
