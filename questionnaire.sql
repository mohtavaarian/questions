-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2021 at 12:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionnaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `urls` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `summary` text COLLATE utf8_persian_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `urls` (`urls`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `urls`, `summary`, `created_date`) VALUES
(38, 'فرم پرسشنامه فرداد', 'fardad-form', 'فرم پرسشنامه استخدامی فرداد', '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `responses` varchar(1600) COLLATE utf8_persian_ci NOT NULL,
  `query_key` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `formID` int(11) NOT NULL,
  `how` int(11) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `query`, `responses`, `query_key`, `formID`, `how`, `created_date`) VALUES
(18, 'کدام گزینه نادرست است؟', 'ری اکت یک فریمورک است\r\nری اکت یک کتابخانه است', 'ری اکت یک کتابخانه است', 38, 1, '2021-04-18'),
(17, 'انواع سئو کدام اند؟', 'سئو کلاه سفید\r\nسئو کلاه سیاه\r\nسئو کلاه خاکستری\r\nسئو بنفش\r\nسئو کلاه صورتی', '', 38, 0, '2021-04-18'),
(16, 'نام شما چیست؟', '', '', 38, 2, '2021-04-18'),
(20, 'سئو در لغت یعنی چه؟', 'بهینه سازی شبکه های اجتماعی\r\nبهینه سازی موتورهای جستجو\r\nطراحی استراتژی سایت', 'بهینه سازی موتورهای جستجو', 38, 3, '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `phone` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
