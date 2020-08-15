-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2020 at 10:19 AM
-- Server version: 5.5.34
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discussion1`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CHANNEL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CHANNEL_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CHANNEL_ADMIN_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CHANNEL_STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `CHANNEL_ID`, `CHANNEL_NAME`, `CHANNEL_ADMIN_ID`, `CHANNEL_STATUS`, `created_at`, `updated_at`) VALUES
(1, 'e0e4445d-473e-4b02-aa84-e66bb8c0edcf', 'JAVA', '5f33b307-77d2-4a11-aa60-dac3236c873a', '1', '2020-08-08 19:55:27', '2020-08-09 12:22:33'),
(2, '195b8387-3cfb-46af-8df1-f46a21b65edd', 'JAVA', '5f33b307-77d2-4a11-aa60-dac3236c873a', '1', '2020-08-08 20:12:50', '2020-08-09 12:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_08_08_125825_create_users_table', 1),
(2, '2020_08_08_125826_create_channels_table', 1),
(3, '2020_08_08_130641_create_subcribers_table', 1),
(4, '2020_08_08_130732_create_posts_table', 1),
(5, '2020_08_08_130931_create_replies_table', 1),
(6, '2020_08_08_131027_create_post_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `POST_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_TEXT` longtext COLLATE utf8_unicode_ci NOT NULL,
  `POST_CHANNEL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_USER_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_STATUS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `POST_ID`, `POST_NAME`, `POST_TEXT`, `POST_CHANNEL_ID`, `POST_USER_ID`, `POST_STATUS`, `created_at`, `updated_at`) VALUES
(1, '805929ac-f67e-44ab-a628-7a48ae228cc9', 'Hello Word', 'Test', 'e0e4445d-473e-4b02-aa84-e66bb8c0edcf', '02eae5dc-9e5d-4ab5-827c-12623225238f', 1, '2020-08-09 13:18:12', '2020-08-09 13:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE IF NOT EXISTS `post_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `POST_LIKE_USER_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_LIKE_POST_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `post_likes`
--


-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `REPLY_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `POST_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REPLY_TEXT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REPLY_USER_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REPLY_STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `REPLY_ID`, `POST_ID`, `REPLY_TEXT`, `REPLY_USER_ID`, `REPLY_STATUS`, `created_at`, `updated_at`) VALUES
(1, '9033ff83-50f3-4bc4-8185-2e6bcf7abe23', '805929ac-f67e-44ab-a628-7a48ae228cc9', 'Test Text 1', '02eae5dc-9e5d-4ab5-827c-12623225238f', '1', '2020-08-09 13:42:22', '2020-08-09 13:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE IF NOT EXISTS `subcribers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SUBSCRIBER_USERID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SUBSCRIBER_CHANNEL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `SUBSCRIBER_USERID`, `SUBSCRIBER_CHANNEL_ID`, `created_at`, `updated_at`) VALUES
(4, '02eae5dc-9e5d-4ab5-827c-12623225238f', 'e0e4445d-473e-4b02-aa84-e66bb8c0edcf', '2020-08-09 12:59:11', '2020-08-09 12:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `USER_FIRST_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `USER_LAST_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `USER_EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `USER_PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `USER_TYPE` int(11) NOT NULL,
  `USER_STATUS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `USER_ID`, `USER_FIRST_NAME`, `USER_LAST_NAME`, `USER_EMAIL`, `USER_PASSWORD`, `USER_TYPE`, `USER_STATUS`, `created_at`, `updated_at`) VALUES
(1, '5f33b307-77d2-4a11-aa60-dac3236c873a', 'Anurag', 'Test', 'signhanuragv@gmail.com', '$2y$10$3L/icsea6yQx7wVwFEwgrOqz4DboREWKvEW1CddqwdQwOgng1zeV2', 0, 1, '2020-08-08 20:35:39', '2020-08-09 12:06:46'),
(3, '02eae5dc-9e5d-4ab5-827c-12623225238f', 'Anurag', 'Test', 'anurag@gmail.com', '$2y$10$2o8wnNwm2rms6NWA8NXCduDJ3uxAeQpqapy53E0Plqy5WAi4PQKSO', 0, 1, '2020-08-09 12:15:29', '2020-08-09 12:15:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
