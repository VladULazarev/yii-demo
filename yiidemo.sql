-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2022 at 06:55 PM
-- Server version: 5.7.27-30
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiidemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` tinyint(1) NOT NULL DEFAULT '0',
  `post_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `slug`, `title`, `tags`, `excerpt`, `content`, `banner_img`, `banner`, `post_img`, `thumb_img`, `created_at`, `meta_title`, `meta_descr`) VALUES
(1, 2, 'augue-ullamcorper', 'Augue Ullamcorper Cras Congue Sed ', 'Fashion, Beauty, Clothes', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-08.jpg', 0, 'blog-post-08.jpg', 'blog-thumb-08.jpg', '2022-10-05 15:27:43', 'Augue Ullamcorper Cras Congue Sed ', 'Description of Augue Ullamcorper Cras Congue Sed '),
(2, 2, 'leo-nec', 'Leo Nec Magna Donec Tincidunt ', 'Fashion, Beauty, Clothes', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-07.jpg', 1, 'blog-post-07.jpg', 'blog-thumb-07.jpg', '2022-10-06 15:27:43', 'Leo Nec Magna Donec Tincidunt ', 'Description of Leo Nec Magna Donec Tincidunt '),
(3, 1, 'suspendisse-nec', 'Suspendisse nec aliquet ligula', 'Life, Style', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-06.jpg', 0, 'blog-post-06.jpg', 'blog-thumb-06.jpg', '2022-10-07 15:27:43', 'Suspendisse nec aliquet ligula', 'Description of Suspendisse nec aliquet ligula'),
(4, 1, 'cras-congue', 'Cras congue sed augue id ullamcorper', 'Life, Style', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-05.jpg', 0, 'blog-post-05.jpg', 'blog-thumb-05.jpg', '2022-10-08 15:27:43', 'Cras congue sed augue id ullamcorper', 'Description of Cras congue sed augue id ullamcorper'),
(5, 3, 'responsive-and-mobile', 'Responsive and Mobile Ready Layouts', 'Nature, View, Beauty', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-01.jpg', 0, 'blog-post-01.jpg', 'blog-thumb-01.jpg', '2022-10-05 15:27:43', 'Responsive and Mobile Ready Layouts', 'Description of Responsive and Mobile Ready Layouts'),
(6, 3, 'donec-tincidunt', 'Donec Tincidunt Leo Nec Magna', 'Nature, View, Beauty', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-02.jpg', 1, 'blog-post-02.jpg', 'blog-thumb-02.jpg', '2022-10-09 15:27:43', 'Donec Tincidunt Leo Nec Magna', 'Description Of Donec Tincidunt Leo Nec Magna'),
(7, 1, 'etiam-id-diam', 'Etiam Id Diam Vitae Lorem Dictum', 'Life, Style', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-04.jpg', 1, 'blog-post-04.jpg', 'blog-thumb-04.jpg', '2022-10-03 15:27:43', 'Etiam Id Diam Vitae Lorem Dictum', 'Description Of Etiam Id Diam Vitae Lorem Dictum'),
(8, 3, 'best-template', 'Best Template Website for HTML CSS', 'Nature, View, Beauty', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-03.jpg', 1, 'blog-post-03.jpg', 'blog-thumb-03.jpg', '2022-10-05 15:27:43', 'Best Template Website for HTML CSS', 'Description Of Best Template Website for HTML CSS'),
(9, 2, 'aenean-elit', 'Aenean elit nunc gravida vauris sit amet', 'Fashion, Beauty, Clothes', 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo...', '<p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.<br><br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed dotempor incididunt ut. labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', 'banner-item-09.jpg', 1, 'blog-post-09.jpg', 'blog-thumb-09.jpg', '2022-10-05 15:27:43', 'Aenean elit nunc gravida', 'Description of Aenean elit nunc gravida');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `meta_title`, `meta_descr`) VALUES
(1, 'Lifestyle', 'lifestyle', 'Category about the Lifestyle', 'Description of the Lifestyle category'),
(2, 'Fashion', 'fashion', 'Category about the Fashion', 'Description of the Fashion category'),
(3, 'Nature', 'nature', 'Category about the Nature', 'Description of the Nature category');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `post_id` mediumint(8) UNSIGNED NOT NULL,
  `author_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_ip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `author_name`, `status`, `comment_text`, `comment_ip`, `created_at`) VALUES
(1, 9, 'Koon Dow', 1, 'Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '123', '2022-10-05 20:53:34'),
(2, 9, 'Woo Dow', 1, 'Et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus.', '456', '2022-10-07 12:32:31'),
(3, 8, 'Loo Dow', 1, 'Uis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis.', '789', '2022-10-09 20:53:37'),
(4, 9, 'Loom Dow', 1, 'Justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '321', '2022-10-02 20:53:37'),
(5, 6, 'Thirteen Man', 1, 'Diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '654', '2022-10-01 20:53:34'),
(6, 6, 'Noof Dow', 1, 'Et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus.', '987', '2022-10-03 12:32:31'),
(7, 4, 'Joo Dow', 1, 'Uis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis.', '147', '2022-10-04 20:53:37'),
(8, 5, 'Soom Dow', 1, 'Justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '258', '2022-10-06 20:53:37'),
(9, 4, 'Charles Kate', 1, 'Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '369', '2022-09-30 20:53:34'),
(10, 3, 'Dom Dow', 1, 'Et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus.', '214', '2022-09-29 12:32:31'),
(11, 3, 'Tom Dow', 1, 'Uis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis.', '357', '2022-09-28 20:53:37'),
(12, 8, 'Belisimo Mama', 1, 'Justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '698', '2022-09-14 20:53:37'),
(13, 7, 'Doom Dow', 1, 'Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '165', '2022-09-18 20:53:34'),
(14, 2, 'Boom Dow', 1, 'Et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus.', '648', '2022-09-14 12:32:31'),
(15, 9, 'Jane Dow', 1, 'Uis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis.', '316', '2022-09-06 20:53:37'),
(16, 8, 'Jimmy Dow', 1, 'Justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.', '592', '2022-10-03 20:53:37'),
(17, 8, 'Tony Dow', 1, 'Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo', '127.0.0.1', '2022-10-11 14:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_ip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
