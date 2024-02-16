-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 04:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_helm_amar`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_logs`
--

CREATE TABLE `dashboard_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard_logs`
--

INSERT INTO `dashboard_logs` (`id`, `username`, `action`, `timestamp`) VALUES
(1, 'amar', 'Viewed Dashboard', '2023-12-12 10:34:37'),
(2, 'amar', 'Viewed Dashboard', '2023-12-12 10:34:37'),
(3, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:13'),
(4, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:13'),
(5, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:14'),
(6, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:14'),
(7, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:14'),
(8, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:15'),
(9, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:33'),
(10, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:33'),
(11, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:34'),
(12, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:34'),
(13, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:43'),
(14, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:43'),
(15, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:47'),
(16, 'amar', 'Viewed Dashboard', '2023-12-12 10:40:47'),
(17, 'amar', 'Viewed Dashboard', '2023-12-12 10:44:08'),
(18, 'amar', 'Viewed Dashboard', '2023-12-12 10:44:08'),
(19, 'amar', 'Viewed Dashboard', '2023-12-12 10:44:17'),
(20, 'amar', 'Viewed Dashboard', '2023-12-12 10:44:17'),
(21, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:16'),
(22, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:16'),
(23, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:18'),
(24, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:18'),
(25, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:27'),
(26, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:27'),
(27, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:31'),
(28, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:31'),
(29, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:32'),
(30, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:33'),
(31, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:33'),
(32, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:33'),
(33, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:34'),
(34, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:34'),
(35, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:34'),
(36, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:34'),
(37, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:35'),
(38, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:35'),
(39, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:35'),
(40, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:35'),
(41, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:36'),
(42, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:36'),
(43, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:36'),
(44, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:36'),
(45, 'amar', 'Logged Out', '2023-12-12 10:46:38'),
(46, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:58'),
(47, 'amar', 'Viewed Dashboard', '2023-12-12 10:46:58'),
(48, 'amar', 'Viewed Dashboard', '2023-12-12 10:47:56'),
(49, 'amar', 'Viewed Dashboard', '2023-12-12 10:47:56'),
(50, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:33'),
(51, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:33'),
(52, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:34'),
(53, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:34'),
(54, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:45'),
(55, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:45'),
(56, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:50'),
(57, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:50'),
(58, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:53'),
(59, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:53'),
(60, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:56'),
(61, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:56'),
(62, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:58'),
(63, 'amar', 'Viewed Dashboard', '2023-12-12 10:50:58'),
(64, 'amar', 'Viewed Dashboard', '2023-12-12 11:01:22'),
(65, 'amar', 'Viewed Dashboard', '2023-12-12 11:01:22'),
(66, 'amar', 'Viewed Dashboard', '2023-12-12 11:01:36'),
(67, 'amar', 'Viewed Dashboard', '2023-12-12 11:01:36'),
(68, 'amar', 'Logged Out', '2023-12-12 11:02:08'),
(69, 'amar', 'Viewed Dashboard', '2023-12-12 11:02:32'),
(70, 'amar', 'Viewed Dashboard', '2023-12-12 11:02:32'),
(71, 'amar', 'Logged Out', '2023-12-12 11:02:33'),
(72, 'amar', 'Viewed Dashboard', '2023-12-12 11:02:47'),
(73, 'amar', 'Viewed Dashboard', '2023-12-12 11:02:47'),
(74, 'amar', 'Logged Out', '2023-12-12 11:02:49'),
(75, 'amar', 'Viewed Dashboard', '2023-12-12 11:03:00'),
(76, 'amar', 'Viewed Dashboard', '2023-12-12 11:03:00'),
(77, 'amar', 'Logged Out', '2023-12-12 11:04:24'),
(78, 'amar', 'Viewed Dashboard', '2023-12-12 11:34:47'),
(79, 'amar', 'Viewed Dashboard', '2023-12-12 11:34:47'),
(80, 'amar', 'Viewed Dashboard', '2023-12-21 19:52:47'),
(81, 'amar', 'Viewed Dashboard', '2023-12-21 19:52:47'),
(82, 'amar', 'Viewed Dashboard', '2023-12-21 19:52:54'),
(83, 'amar', 'Viewed Dashboard', '2023-12-21 19:52:54'),
(84, 'amar', 'Viewed Dashboard', '2023-12-21 19:54:09'),
(85, 'amar', 'Viewed Dashboard', '2023-12-21 19:54:09'),
(86, 'amar', 'Viewed Dashboard', '2023-12-21 19:54:12'),
(87, 'amar', 'Viewed Dashboard', '2023-12-21 19:54:12'),
(88, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:13'),
(89, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:13'),
(90, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:20'),
(91, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:20'),
(92, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:20'),
(93, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:24'),
(94, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:24'),
(95, 'amar', 'Viewed Dashboard', '2023-12-21 19:58:24'),
(96, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:11'),
(97, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:12'),
(98, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:15'),
(99, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:15'),
(100, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:15'),
(101, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:20'),
(102, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:20'),
(103, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:20'),
(104, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:27'),
(105, 'amar', 'Viewed Dashboard', '2023-12-21 20:00:27'),
(106, 'amar', 'Viewed Dashboard', '2023-12-21 20:05:40'),
(107, 'amar', 'Viewed Dashboard', '2023-12-21 20:05:40'),
(108, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:25'),
(109, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:25'),
(110, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:32'),
(111, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:32'),
(112, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:36'),
(113, 'amar', 'Viewed Dashboard', '2023-12-21 20:14:36'),
(114, 'amar', 'Viewed Dashboard', '2023-12-21 20:16:19'),
(115, 'amar', 'Viewed Dashboard', '2023-12-21 20:16:19'),
(116, 'amar', 'Viewed Dashboard', '2023-12-21 20:16:52'),
(117, 'amar', 'Viewed Dashboard', '2023-12-21 20:16:52'),
(118, 'amar', 'Viewed Dashboard', '2023-12-21 20:16:53'),
(119, 'amar', 'Viewed Dashboard', '2023-12-21 20:18:51'),
(120, 'amar', 'Viewed Dashboard', '2023-12-21 20:18:51'),
(121, 'amar', 'Viewed Dashboard', '2023-12-21 20:23:14'),
(122, 'amar', 'Viewed Dashboard', '2023-12-21 20:23:14'),
(123, 'amar', 'Viewed Dashboard', '2023-12-21 20:23:14'),
(124, 'amar', 'Viewed Dashboard', '2023-12-21 20:24:02'),
(125, 'amar', 'Viewed Dashboard', '2023-12-21 20:24:02'),
(126, 'amar', 'Viewed Dashboard', '2023-12-21 20:24:03'),
(127, 'amar', 'Logged Out', '2023-12-21 20:25:42'),
(128, 'amar', 'Viewed Dashboard', '2023-12-21 20:25:59'),
(129, 'amar', 'Viewed Dashboard', '2023-12-21 20:25:59'),
(130, 'amar', 'Viewed Dashboard', '2023-12-21 20:26:34'),
(131, 'amar', 'Viewed Dashboard', '2023-12-21 20:26:34'),
(132, 'amar', 'Viewed Dashboard', '2023-12-21 20:26:34'),
(133, 'amar', 'Viewed Dashboard', '2023-12-21 20:27:19'),
(134, 'amar', 'Viewed Dashboard', '2023-12-21 20:27:19'),
(135, 'amar', 'Viewed Dashboard', '2023-12-21 20:27:38'),
(136, 'amar', 'Viewed Dashboard', '2023-12-21 20:27:38'),
(137, 'amar', 'Viewed Dashboard', '2023-12-21 20:27:38'),
(138, 'amar', 'Viewed Dashboard', '2023-12-21 20:28:27'),
(139, 'amar', 'Viewed Dashboard', '2023-12-21 20:28:27'),
(140, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:17'),
(141, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:17'),
(142, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:20'),
(143, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:20'),
(144, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:23'),
(145, 'amar', 'Viewed Dashboard', '2023-12-21 20:29:23'),
(146, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:21'),
(147, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:21'),
(148, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:23'),
(149, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:23'),
(150, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:25'),
(151, 'amar', 'Viewed Dashboard', '2023-12-21 20:30:26'),
(152, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:48'),
(153, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:49'),
(154, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:51'),
(155, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:51'),
(156, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:54'),
(157, 'amar', 'Viewed Dashboard', '2023-12-21 20:32:54'),
(158, 'amar', 'Viewed Dashboard', '2023-12-21 20:35:15'),
(159, 'amar', 'Viewed Dashboard', '2023-12-21 20:35:15'),
(160, 'amar', 'Viewed Dashboard', '2023-12-21 20:35:15'),
(161, 'amar', 'Viewed Dashboard', '2023-12-21 20:43:51'),
(162, 'amar', 'Viewed Dashboard', '2023-12-21 20:43:52'),
(163, 'amar', 'Viewed Dashboard', '2023-12-21 20:43:56'),
(164, 'amar', 'Viewed Dashboard', '2023-12-21 20:43:56'),
(165, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:06'),
(166, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:06'),
(167, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:09'),
(168, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:09'),
(169, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:12'),
(170, 'amar', 'Viewed Dashboard', '2023-12-21 20:44:12'),
(171, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:46'),
(172, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:46'),
(173, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:46'),
(174, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:49'),
(175, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:49'),
(176, 'amar', 'Viewed Dashboard', '2023-12-21 20:45:49'),
(177, 'amar', 'Viewed Dashboard', '2023-12-21 20:46:31'),
(178, 'amar', 'Viewed Dashboard', '2023-12-21 20:46:31'),
(179, 'amar', 'Viewed Dashboard', '2023-12-21 20:46:31'),
(180, 'amar', 'Viewed Dashboard', '2023-12-21 20:53:09'),
(181, 'amar', 'Viewed Dashboard', '2023-12-21 20:53:09'),
(182, 'amar', 'Viewed Dashboard', '2023-12-21 20:53:09'),
(183, 'amar', 'Viewed Dashboard', '2023-12-21 21:01:43'),
(184, 'amar', 'Viewed Dashboard', '2023-12-21 21:01:44'),
(185, 'amar', 'Viewed Dashboard', '2023-12-21 21:02:06'),
(186, 'amar', 'Viewed Dashboard', '2023-12-21 21:02:06'),
(187, 'amar', 'Viewed Dashboard', '2023-12-21 21:02:06'),
(188, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:20'),
(189, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:20'),
(190, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:25'),
(191, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:25'),
(192, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:28'),
(193, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:29'),
(194, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:45'),
(195, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:45'),
(196, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:46'),
(197, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:50'),
(198, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:50'),
(199, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:50'),
(200, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:52'),
(201, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:52'),
(202, 'amar', 'Viewed Dashboard', '2023-12-21 21:04:53'),
(203, 'amar', 'Viewed Dashboard', '2023-12-21 21:07:50'),
(204, 'amar', 'Viewed Dashboard', '2023-12-21 21:07:50'),
(205, 'amar', 'Viewed Dashboard', '2023-12-21 21:07:50'),
(206, 'amar', 'Viewed Dashboard', '2023-12-21 21:09:58'),
(207, 'amar', 'Viewed Dashboard', '2023-12-21 21:09:58'),
(208, 'amar', 'Viewed Dashboard', '2023-12-21 21:10:10'),
(209, 'amar', 'Viewed Dashboard', '2023-12-21 21:10:10'),
(210, 'amar', 'Viewed Dashboard', '2023-12-21 21:10:12'),
(211, 'amar', 'Viewed Dashboard', '2023-12-21 21:10:12'),
(212, 'amar', 'Viewed Dashboard', '2023-12-21 21:13:43'),
(213, 'amar', 'Viewed Dashboard', '2023-12-21 21:13:43'),
(214, 'amar', 'Viewed Dashboard', '2023-12-21 21:15:08'),
(215, 'amar', 'Viewed Dashboard', '2023-12-21 21:15:09'),
(216, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:32'),
(217, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:32'),
(218, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:47'),
(219, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:48'),
(220, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:51'),
(221, 'amar', 'Viewed Dashboard', '2023-12-21 22:11:51'),
(222, 'amar', 'Viewed Dashboard', '2023-12-21 22:12:15'),
(223, 'amar', 'Viewed Dashboard', '2023-12-21 22:12:15'),
(224, 'amar', 'Viewed Dashboard', '2023-12-21 22:14:47'),
(225, 'amar', 'Viewed Dashboard', '2023-12-21 22:14:47'),
(226, 'amar', 'Viewed Dashboard', '2023-12-21 22:15:32'),
(227, 'amar', 'Viewed Dashboard', '2023-12-21 22:15:32'),
(228, 'amar', 'Viewed Dashboard', '2023-12-21 22:16:52'),
(229, 'amar', 'Viewed Dashboard', '2023-12-21 22:16:52'),
(230, 'amar', 'Logged Out', '2023-12-21 22:17:10'),
(231, 'amar', 'Viewed Dashboard', '2023-12-21 22:17:37'),
(232, 'amar', 'Viewed Dashboard', '2023-12-21 22:17:37'),
(233, 'amar', 'Viewed Dashboard', '2023-12-21 22:17:45'),
(234, 'amar', 'Viewed Dashboard', '2023-12-21 22:17:45'),
(235, 'amar', 'Viewed Dashboard', '2023-12-21 22:17:46'),
(236, 'amar', 'Viewed Dashboard', '2023-12-21 22:22:20'),
(237, 'amar', 'Viewed Dashboard', '2023-12-21 22:22:21'),
(238, 'amar', 'Viewed Dashboard', '2023-12-21 22:22:26'),
(239, 'amar', 'Viewed Dashboard', '2023-12-21 22:22:26'),
(240, 'amar', 'Viewed Dashboard', '2023-12-21 22:22:26'),
(241, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:24'),
(242, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:25'),
(243, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:30'),
(244, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:30'),
(245, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:36'),
(246, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:36'),
(247, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:37'),
(248, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:37'),
(249, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:38'),
(250, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:38'),
(251, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:39'),
(252, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:39'),
(253, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:40'),
(254, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:40'),
(255, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:45'),
(256, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:45'),
(257, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:46'),
(258, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:55'),
(259, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:55'),
(260, 'amar', 'Viewed Dashboard', '2023-12-21 22:24:56'),
(261, 'amar', 'Viewed Dashboard', '2023-12-21 22:25:22'),
(262, 'amar', 'Viewed Dashboard', '2023-12-21 22:25:22'),
(263, 'amar', 'Viewed Dashboard', '2023-12-21 22:25:24'),
(264, 'amar', 'Viewed Dashboard', '2023-12-21 22:25:24'),
(265, 'amar', 'Viewed Dashboard', '2023-12-21 22:26:29'),
(266, 'amar', 'Viewed Dashboard', '2023-12-21 22:26:30'),
(267, 'amar', 'Viewed Dashboard', '2023-12-21 22:26:31'),
(268, 'amar', 'Viewed Dashboard', '2023-12-21 22:26:32'),
(269, 'amar', 'Logged Out', '2023-12-21 22:28:27'),
(270, 'amar', 'Viewed Dashboard', '2023-12-21 22:28:58'),
(271, 'amar', 'Viewed Dashboard', '2023-12-21 22:28:58'),
(272, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:04'),
(273, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:05'),
(274, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:05'),
(275, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:11'),
(276, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:12'),
(277, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:13'),
(278, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:13'),
(279, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:15'),
(280, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:15'),
(281, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:33'),
(282, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:34'),
(283, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:39'),
(284, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:39'),
(285, 'amar', 'Viewed Dashboard', '2023-12-21 22:29:39'),
(286, 'amar', 'Viewed Dashboard', '2023-12-21 22:30:08'),
(287, 'amar', 'Viewed Dashboard', '2023-12-21 22:30:08'),
(288, 'amar', 'Viewed Dashboard', '2023-12-21 22:30:11'),
(289, 'amar', 'Viewed Dashboard', '2023-12-21 22:30:11'),
(290, 'amar', 'Viewed Dashboard', '2023-12-21 22:32:59'),
(291, 'amar', 'Viewed Dashboard', '2023-12-21 22:33:00'),
(292, 'amar', 'Viewed Dashboard', '2023-12-21 22:33:28'),
(293, 'amar', 'Viewed Dashboard', '2023-12-21 22:33:28'),
(294, 'amar', 'Viewed Dashboard', '2023-12-21 22:33:53'),
(295, 'amar', 'Viewed Dashboard', '2023-12-21 22:33:54'),
(296, 'amar', 'Viewed Dashboard', '2023-12-21 22:34:29'),
(297, 'amar', 'Viewed Dashboard', '2023-12-21 22:34:29'),
(298, 'amar', 'Viewed Dashboard', '2023-12-21 22:34:52'),
(299, 'amar', 'Viewed Dashboard', '2023-12-21 22:34:53'),
(300, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:09'),
(301, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:09'),
(302, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:30'),
(303, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:31'),
(304, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:56'),
(305, 'amar', 'Viewed Dashboard', '2023-12-21 22:35:56'),
(306, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:20'),
(307, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:20'),
(308, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:36'),
(309, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:37'),
(310, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:50'),
(311, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:50'),
(312, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:53'),
(313, 'amar', 'Viewed Dashboard', '2023-12-21 22:36:54'),
(314, 'amar', 'Viewed Dashboard', '2023-12-21 22:37:08'),
(315, 'amar', 'Viewed Dashboard', '2023-12-21 22:37:08'),
(316, 'amar', 'Logged Out', '2023-12-21 22:37:13'),
(317, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:42'),
(318, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:42'),
(319, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:47'),
(320, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:47'),
(321, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:47'),
(322, 'amar', 'Logged Out', '2023-12-22 17:47:48'),
(323, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:55'),
(324, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:55'),
(325, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:57'),
(326, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:57'),
(327, 'amar', 'Viewed Dashboard', '2023-12-22 17:47:58'),
(328, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:13'),
(329, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:13'),
(330, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:13'),
(331, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:38'),
(332, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:38'),
(333, 'amar', 'Viewed Dashboard', '2023-12-22 17:49:39'),
(334, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:00'),
(335, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:00'),
(336, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:00'),
(337, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:25'),
(338, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:25'),
(339, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:25'),
(340, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:41'),
(341, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:41'),
(342, 'amar', 'Viewed Dashboard', '2023-12-22 17:50:41'),
(343, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:07'),
(344, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:07'),
(345, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:07'),
(346, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:24'),
(347, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:24'),
(348, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:24'),
(349, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:39'),
(350, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:39'),
(351, 'amar', 'Viewed Dashboard', '2023-12-22 17:51:40'),
(352, 'amar', 'Logged Out', '2023-12-22 17:51:55'),
(353, 'budi', 'Logged Out', '2023-12-22 17:55:34'),
(354, 'amar', 'Viewed Dashboard', '2023-12-24 09:19:46'),
(355, 'amar', 'Viewed Dashboard', '2023-12-24 09:19:46'),
(356, 'amar', 'Logged Out', '2023-12-24 09:19:50'),
(357, 'budi', 'Logged Out', '2023-12-24 09:20:03'),
(358, 'amar', 'Viewed Dashboard', '2023-12-24 11:52:20'),
(359, 'amar', 'Viewed Dashboard', '2023-12-24 11:52:20'),
(360, 'amar', 'Viewed Dashboard', '2023-12-24 11:55:52'),
(361, 'amar', 'Viewed Dashboard', '2023-12-24 11:55:52'),
(362, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:05'),
(363, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:05'),
(364, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:10'),
(365, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:10'),
(366, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:23'),
(367, 'amar', 'Viewed Dashboard', '2023-12-24 11:57:23'),
(368, 'amar', 'Viewed Dashboard', '2023-12-24 11:58:07'),
(369, 'amar', 'Viewed Dashboard', '2023-12-24 11:58:07'),
(370, 'amar', 'Viewed Dashboard', '2023-12-24 11:58:34'),
(371, 'amar', 'Viewed Dashboard', '2023-12-24 11:58:34'),
(372, 'amar', 'Viewed Dashboard', '2023-12-24 11:59:35'),
(373, 'amar', 'Viewed Dashboard', '2023-12-24 11:59:35'),
(374, 'amar', 'Viewed Dashboard', '2023-12-24 11:59:56'),
(375, 'amar', 'Viewed Dashboard', '2023-12-24 11:59:56'),
(376, 'amar', 'Viewed Dashboard', '2023-12-24 12:00:48'),
(377, 'amar', 'Viewed Dashboard', '2023-12-24 12:00:48'),
(378, 'amar', 'Viewed Dashboard', '2023-12-24 12:01:05'),
(379, 'amar', 'Viewed Dashboard', '2023-12-24 12:01:05'),
(380, 'amar', 'Viewed Dashboard', '2023-12-24 12:03:42'),
(381, 'amar', 'Viewed Dashboard', '2023-12-24 12:03:42'),
(382, 'amar', 'Viewed Dashboard', '2023-12-24 12:04:29'),
(383, 'amar', 'Viewed Dashboard', '2023-12-24 12:04:29'),
(384, 'amar', 'Viewed Dashboard', '2023-12-24 12:06:26'),
(385, 'amar', 'Viewed Dashboard', '2023-12-24 12:06:27'),
(386, 'amar', 'Viewed Dashboard', '2023-12-24 12:08:05'),
(387, 'amar', 'Viewed Dashboard', '2023-12-24 12:08:05'),
(388, 'amar', 'Viewed Dashboard', '2023-12-24 12:08:09'),
(389, 'amar', 'Viewed Dashboard', '2023-12-24 12:08:09'),
(390, 'amar', 'Viewed Dashboard', '2023-12-24 12:09:40'),
(391, 'amar', 'Viewed Dashboard', '2023-12-24 12:09:40'),
(392, 'amar', 'Viewed Dashboard', '2023-12-24 12:10:13'),
(393, 'amar', 'Viewed Dashboard', '2023-12-24 12:10:13'),
(394, 'amar', 'Viewed Dashboard', '2023-12-24 12:12:27'),
(395, 'amar', 'Viewed Dashboard', '2023-12-24 12:12:28'),
(396, 'amar', 'Viewed Dashboard', '2023-12-24 12:15:47'),
(397, 'amar', 'Viewed Dashboard', '2023-12-24 12:15:47'),
(398, 'amar', 'Viewed Dashboard', '2023-12-24 12:16:09'),
(399, 'amar', 'Viewed Dashboard', '2023-12-24 12:16:09'),
(400, 'amar', 'Viewed Dashboard', '2023-12-24 12:17:57'),
(401, 'amar', 'Viewed Dashboard', '2023-12-24 12:17:57'),
(402, 'amar', 'Viewed Dashboard', '2023-12-24 12:17:58'),
(403, 'amar', 'Viewed Dashboard', '2023-12-24 12:18:18'),
(404, 'amar', 'Viewed Dashboard', '2023-12-24 12:18:18'),
(405, 'amar', 'Viewed Dashboard', '2023-12-24 12:18:18'),
(406, 'amar', 'Viewed Dashboard', '2023-12-24 12:21:10'),
(407, 'amar', 'Viewed Dashboard', '2023-12-24 12:21:11'),
(408, 'amar', 'Viewed Dashboard', '2023-12-24 12:22:42'),
(409, 'amar', 'Viewed Dashboard', '2023-12-24 12:22:43'),
(410, 'amar', 'Viewed Dashboard', '2023-12-24 12:23:08'),
(411, 'amar', 'Viewed Dashboard', '2023-12-24 12:23:09'),
(412, 'amar', 'Viewed Dashboard', '2023-12-24 12:23:29'),
(413, 'amar', 'Viewed Dashboard', '2023-12-24 12:23:29'),
(414, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:14'),
(415, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:15'),
(416, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:40'),
(417, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:40'),
(418, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:55'),
(419, 'amar', 'Viewed Dashboard', '2023-12-24 12:24:55'),
(420, 'amar', 'Viewed Dashboard', '2023-12-24 12:29:05'),
(421, 'amar', 'Viewed Dashboard', '2023-12-24 12:29:05'),
(422, 'amar', 'Viewed Dashboard', '2023-12-24 12:30:20'),
(423, 'amar', 'Viewed Dashboard', '2023-12-24 12:30:20'),
(424, 'amar', 'Viewed Dashboard', '2023-12-24 12:30:25'),
(425, 'amar', 'Viewed Dashboard', '2023-12-24 12:30:26'),
(426, 'amar', 'Viewed Dashboard', '2023-12-24 12:33:03'),
(427, 'amar', 'Viewed Dashboard', '2023-12-24 12:33:04'),
(428, 'amar', 'Viewed Dashboard', '2023-12-24 12:33:36'),
(429, 'amar', 'Viewed Dashboard', '2023-12-24 12:33:36'),
(430, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:12'),
(431, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:13'),
(432, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:21'),
(433, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:22'),
(434, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:33'),
(435, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:33'),
(436, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:48'),
(437, 'amar', 'Viewed Dashboard', '2023-12-24 12:34:49'),
(438, 'amar', 'Viewed Dashboard', '2023-12-24 12:35:55'),
(439, 'amar', 'Viewed Dashboard', '2023-12-24 12:35:55'),
(440, 'amar', 'Viewed Dashboard', '2023-12-24 12:36:24'),
(441, 'amar', 'Viewed Dashboard', '2023-12-24 12:36:25'),
(442, 'amar', 'Viewed Dashboard', '2023-12-24 12:36:59'),
(443, 'amar', 'Viewed Dashboard', '2023-12-24 12:36:59'),
(444, 'amar', 'Viewed Dashboard', '2023-12-24 12:37:33'),
(445, 'amar', 'Viewed Dashboard', '2023-12-24 12:37:34'),
(446, 'amar', 'Viewed Dashboard', '2023-12-24 12:39:14'),
(447, 'amar', 'Viewed Dashboard', '2023-12-24 12:39:15'),
(448, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:18'),
(449, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:18'),
(450, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:43'),
(451, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:44'),
(452, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:49'),
(453, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:49'),
(454, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:52'),
(455, 'amar', 'Viewed Dashboard', '2023-12-24 12:40:52'),
(456, 'amar', 'Viewed Dashboard', '2023-12-24 12:41:24'),
(457, 'amar', 'Viewed Dashboard', '2023-12-24 12:41:24'),
(458, 'amar', 'Viewed Dashboard', '2023-12-24 12:41:46'),
(459, 'amar', 'Viewed Dashboard', '2023-12-24 12:41:46'),
(460, 'amar', 'Viewed Dashboard', '2023-12-24 12:42:16'),
(461, 'amar', 'Viewed Dashboard', '2023-12-24 12:42:17'),
(462, 'amar', 'Viewed Dashboard', '2023-12-24 12:42:42'),
(463, 'amar', 'Viewed Dashboard', '2023-12-24 12:42:43'),
(464, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:13'),
(465, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:13'),
(466, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:23'),
(467, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:23'),
(468, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:50'),
(469, 'amar', 'Viewed Dashboard', '2023-12-24 12:43:50'),
(470, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:03'),
(471, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:04'),
(472, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:27'),
(473, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:28'),
(474, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:29'),
(475, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:29'),
(476, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:37'),
(477, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:38'),
(478, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:59'),
(479, 'amar', 'Viewed Dashboard', '2023-12-24 12:44:59'),
(480, 'amar', 'Viewed Dashboard', '2023-12-24 12:45:12'),
(481, 'amar', 'Viewed Dashboard', '2023-12-24 12:45:12'),
(482, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:01'),
(483, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:01'),
(484, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:16'),
(485, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:16'),
(486, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:18'),
(487, 'amar', 'Viewed Dashboard', '2023-12-24 12:46:18'),
(488, 'amar', 'Viewed Dashboard', '2023-12-24 12:47:59'),
(489, 'amar', 'Viewed Dashboard', '2023-12-24 12:47:59'),
(490, 'amar', 'Viewed Dashboard', '2023-12-24 12:48:19'),
(491, 'amar', 'Viewed Dashboard', '2023-12-24 12:48:19'),
(492, 'amar', 'Viewed Dashboard', '2023-12-24 12:48:41'),
(493, 'amar', 'Viewed Dashboard', '2023-12-24 12:48:41'),
(494, 'amar', 'Logged Out', '2023-12-24 12:48:49'),
(495, 'amar', 'Viewed Dashboard', '2023-12-24 13:05:02'),
(496, 'amar', 'Viewed Dashboard', '2023-12-24 13:05:02'),
(497, 'amar', 'Logged Out', '2023-12-24 13:05:22'),
(498, 'amar', 'Viewed Dashboard', '2023-12-24 14:07:29'),
(499, 'amar', 'Viewed Dashboard', '2023-12-24 14:07:29'),
(500, 'amar', 'Viewed Dashboard', '2023-12-24 14:08:00'),
(501, 'amar', 'Viewed Dashboard', '2023-12-24 14:08:00'),
(502, 'amar', 'Viewed Dashboard', '2023-12-24 14:10:29'),
(503, 'amar', 'Viewed Dashboard', '2023-12-24 14:10:29'),
(504, 'amar', 'Logged Out', '2023-12-24 14:10:35'),
(505, 'budi', 'Logged Out', '2023-12-24 19:26:29'),
(506, 'amar', 'Viewed Dashboard', '2023-12-24 19:26:38'),
(507, 'amar', 'Viewed Dashboard', '2023-12-24 19:26:38'),
(508, 'amar', 'Viewed Dashboard', '2023-12-24 19:27:14'),
(509, 'amar', 'Viewed Dashboard', '2023-12-24 19:27:14'),
(510, 'amar', 'Logged Out', '2023-12-24 19:27:18'),
(511, 'amar', 'Viewed Dashboard', '2023-12-24 21:37:19'),
(512, 'amar', 'Viewed Dashboard', '2023-12-24 21:37:19'),
(513, 'amar', 'Viewed Dashboard', '2023-12-24 21:37:25'),
(514, 'amar', 'Viewed Dashboard', '2023-12-24 21:37:25'),
(515, 'amar', 'Logged Out', '2023-12-24 21:37:26'),
(516, 'budi', 'Logged Out', '2023-12-24 22:58:44'),
(517, 'amar', 'Viewed Dashboard', '2023-12-24 22:58:54'),
(518, 'amar', 'Viewed Dashboard', '2023-12-24 22:58:54'),
(519, 'amar', 'Viewed Dashboard', '2023-12-24 22:59:32'),
(520, 'amar', 'Viewed Dashboard', '2023-12-24 22:59:32'),
(521, 'amar', 'Logged Out', '2023-12-24 22:59:33'),
(522, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:22'),
(523, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:22'),
(524, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:33'),
(525, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:33'),
(526, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:37'),
(527, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:37'),
(528, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:44'),
(529, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:44'),
(530, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:48'),
(531, 'amar', 'Viewed Dashboard', '2023-12-24 23:21:48'),
(532, 'amar', 'Logged Out', '2023-12-24 23:44:12'),
(533, 'amar', 'Viewed Dashboard', '2023-12-24 23:44:23'),
(534, 'amar', 'Viewed Dashboard', '2023-12-24 23:44:23'),
(535, 'amar', 'Viewed Dashboard', '2023-12-24 23:44:44'),
(536, 'amar', 'Viewed Dashboard', '2023-12-24 23:44:44'),
(537, 'amar', 'Viewed Dashboard', '2023-12-24 23:46:41'),
(538, 'amar', 'Viewed Dashboard', '2023-12-24 23:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `bukti_pembayaran_path` varchar(255) DEFAULT NULL,
  `total_belanja` decimal(10,2) DEFAULT NULL,
  `waktu_pemesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `bukti_pembayaran` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `alamat_tujuan`, `note`, `bukti_pembayaran_path`, `total_belanja`, `waktu_pemesanan`, `bukti_pembayaran`) VALUES
(25, 'amar', 'margonda', 'packing kayu', NULL, '300000.00', '2023-12-24 23:20:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `deskripsi`, `gambar_path`, `created_at`, `updated_at`) VALUES
(18, 'helm-1', '100000.00', 10, 'helm-1\r\n', 'uploads/helm-1.jpg', '2023-12-22 17:49:13', '2023-12-24 12:41:24'),
(19, 'helm-2', '100000.00', 10, 'helm-2', 'uploads/helm-2.jpg', '2023-12-22 17:49:38', '2023-12-22 17:49:38'),
(20, 'helm-3', '100000.00', 10, 'helm-3', 'uploads/helm-3.jpg', '2023-12-22 17:50:00', '2023-12-22 17:50:00'),
(21, 'helm-4', '100000.00', 10, 'helm-4', 'uploads/helm-4.jpg', '2023-12-22 17:50:25', '2023-12-22 17:50:25'),
(22, 'helm-5', '100000.00', 10, 'helm-5', 'uploads/helm-5.jpg', '2023-12-22 17:50:41', '2023-12-22 17:50:41'),
(23, 'helm-6', '100000.00', 10, 'helm-6', 'uploads/helm-6.jpg', '2023-12-22 17:51:07', '2023-12-22 17:51:07'),
(24, 'helm-7', '100000.00', 10, 'helm-7', 'uploads/helm-7.jpg', '2023-12-22 17:51:24', '2023-12-22 17:51:24'),
(25, 'helm-8', '100000.00', 10, 'helm-8', 'uploads/helm-8.jpg', '2023-12-22 17:51:39', '2023-12-22 17:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', '$2y$10$5TOnX5SwmtsGloQugY6zFu058hAN/xYoPBdztiKMysP6p3nalEVeC', '2023-12-12 10:17:20', '2023-12-12 10:17:20', 'user'),
(2, 'amar', '$2y$10$yEmYTCswEnAlnR1ds8DpP.y8gUUsernY0oQNZ.hNHvPe3H/xZkXa2', '2023-12-12 10:24:15', '2023-12-12 10:55:33', 'admin'),
(3, 'budi', '$2y$10$88gsSRmjwx6SzpAvlBS08ua7LD1LwDXsdBfMojGlGs3X5qlHGcf8G', '2023-12-12 11:00:11', '2023-12-12 11:00:11', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_logs`
--
ALTER TABLE `dashboard_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_logs`
--
ALTER TABLE `dashboard_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
