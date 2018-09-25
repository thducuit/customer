-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 25, 2018 lúc 11:36 PM
-- Phiên bản máy phục vụ: 5.6.38
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demoalert_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `gallery` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `order`, `status`, `gallery`, `created_at`, `updated_at`) VALUES
(3, 'Hosting Website', 1, 1, 'cloud.svg', '2018-05-17 02:25:56', '2018-07-13 02:00:01'),
(4, 'Domain Name', 1, 1, 'world-wide-web.svg', '2018-05-31 01:52:21', '2018-05-31 01:52:21'),
(5, 'Email Google', 1, 1, 'email.svg', '2018-05-31 01:53:16', '2018-05-31 01:53:16'),
(8, 'Cloud Server', 1, 1, 'cloud-computing.svg', '2018-07-13 01:53:30', '2018-07-13 01:53:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `key`, `value`) VALUES
(1, 'cc', 'thducuit@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `type` enum('error','sent','success') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'error',
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nhat ky he thong';

--
-- Đang đổ dữ liệu cho bảng `log`
--

INSERT INTO `log` (`id`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-21 03:39:15', '2018-05-21 03:39:15'),
(2, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-21 03:39:20', '2018-05-21 03:39:20'),
(3, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-22 20:00:16', '2018-05-22 20:00:16'),
(4, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-22 20:00:20', '2018-05-22 20:00:20'),
(5, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-25 20:00:55', '2018-05-25 20:00:55'),
(6, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-26 20:00:30', '2018-05-26 20:00:30'),
(7, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-27 20:00:16', '2018-05-27 20:00:16'),
(8, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-27 20:00:19', '2018-05-27 20:00:19'),
(9, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-28 20:01:27', '2018-05-28 20:01:27'),
(10, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-28 20:01:31', '2018-05-28 20:01:31'),
(11, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-29 20:00:35', '2018-05-29 20:00:35'),
(12, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-29 20:00:38', '2018-05-29 20:00:38'),
(13, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-30 20:00:19', '2018-05-30 20:00:19'),
(14, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-05-30 20:00:22', '2018-05-30 20:00:22'),
(15, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-01 20:00:06', '2018-06-01 20:00:06'),
(16, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-01 20:00:09', '2018-06-01 20:00:09'),
(17, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-02 20:00:08', '2018-06-02 20:00:08'),
(18, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-02 20:00:11', '2018-06-02 20:00:11'),
(19, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-03 20:00:11', '2018-06-03 20:00:11'),
(20, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-03 20:00:13', '2018-06-03 20:00:13'),
(21, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-03 20:00:17', '2018-06-03 20:00:17'),
(22, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-04 20:00:08', '2018-06-04 20:00:08'),
(23, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-04 20:00:11', '2018-06-04 20:00:11'),
(24, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-05 20:00:06', '2018-06-05 20:00:06'),
(25, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-05 20:00:09', '2018-06-05 20:00:09'),
(26, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-06 20:00:06', '2018-06-06 20:00:06'),
(27, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-06 20:00:12', '2018-06-06 20:00:12'),
(28, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-06 20:00:15', '2018-06-06 20:00:15'),
(29, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-06 20:00:18', '2018-06-06 20:00:18'),
(30, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-07 20:00:06', '2018-06-07 20:00:06'),
(31, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-07 20:00:09', '2018-06-07 20:00:09'),
(32, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-07 20:00:11', '2018-06-07 20:00:11'),
(33, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-07 20:00:14', '2018-06-07 20:00:14'),
(34, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-08 20:00:07', '2018-06-08 20:00:07'),
(35, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-08 20:00:10', '2018-06-08 20:00:10'),
(36, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-08 20:00:13', '2018-06-08 20:00:13'),
(37, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-08 20:00:17', '2018-06-08 20:00:17'),
(38, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-09 20:00:06', '2018-06-09 20:00:06'),
(39, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-09 20:00:09', '2018-06-09 20:00:09'),
(40, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-09 20:00:12', '2018-06-09 20:00:12'),
(41, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-09 20:00:15', '2018-06-09 20:00:15'),
(42, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-10 20:00:06', '2018-06-10 20:00:06'),
(43, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-10 20:00:09', '2018-06-10 20:00:09'),
(44, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-10 20:00:13', '2018-06-10 20:00:13'),
(45, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-10 20:00:15', '2018-06-10 20:00:15'),
(46, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-11 20:00:08', '2018-06-11 20:00:08'),
(47, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-11 20:00:11', '2018-06-11 20:00:11'),
(48, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-11 20:00:15', '2018-06-11 20:00:15'),
(49, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-11 20:00:18', '2018-06-11 20:00:18'),
(50, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-12 20:00:08', '2018-06-12 20:00:08'),
(51, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-12 20:00:11', '2018-06-12 20:00:11'),
(52, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-12 20:00:14', '2018-06-12 20:00:14'),
(53, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-13 20:00:05', '2018-06-13 20:00:05'),
(54, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-13 20:00:09', '2018-06-13 20:00:09'),
(55, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-13 20:00:14', '2018-06-13 20:00:14'),
(56, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-13 20:00:19', '2018-06-13 20:00:19'),
(57, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-14 20:00:08', '2018-06-14 20:00:08'),
(58, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-14 20:00:10', '2018-06-14 20:00:10'),
(59, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-14 20:00:14', '2018-06-14 20:00:14'),
(60, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-14 20:00:17', '2018-06-14 20:00:17'),
(61, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-14 20:00:21', '2018-06-14 20:00:21'),
(62, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-15 20:00:18', '2018-06-15 20:00:18'),
(63, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-15 20:00:21', '2018-06-15 20:00:21'),
(64, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-15 20:00:25', '2018-06-15 20:00:25'),
(65, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-15 20:00:28', '2018-06-15 20:00:28'),
(66, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-15 20:00:36', '2018-06-15 20:00:36'),
(67, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-16 20:00:06', '2018-06-16 20:00:06'),
(68, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-16 20:00:10', '2018-06-16 20:00:10'),
(69, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-16 20:00:13', '2018-06-16 20:00:13'),
(70, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-16 20:00:16', '2018-06-16 20:00:16'),
(71, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-16 20:00:19', '2018-06-16 20:00:19'),
(72, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-17 20:00:07', '2018-06-17 20:00:07'),
(73, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-17 20:00:10', '2018-06-17 20:00:10'),
(74, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-17 20:00:13', '2018-06-17 20:00:13'),
(75, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-17 20:00:16', '2018-06-17 20:00:16'),
(76, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-17 20:00:19', '2018-06-17 20:00:19'),
(77, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-18 20:00:08', '2018-06-18 20:00:08'),
(78, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-18 20:00:11', '2018-06-18 20:00:11'),
(79, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-18 20:00:14', '2018-06-18 20:00:14'),
(80, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-18 20:00:16', '2018-06-18 20:00:16'),
(81, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-18 20:00:20', '2018-06-18 20:00:20'),
(82, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-19 20:00:07', '2018-06-19 20:00:07'),
(83, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-19 20:00:10', '2018-06-19 20:00:10'),
(84, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-19 20:00:13', '2018-06-19 20:00:13'),
(85, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-19 20:00:16', '2018-06-19 20:00:16'),
(86, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-19 20:00:19', '2018-06-19 20:00:19'),
(87, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-20 20:00:09', '2018-06-20 20:00:09'),
(88, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-20 20:00:12', '2018-06-20 20:00:12'),
(89, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-20 20:00:15', '2018-06-20 20:00:15'),
(90, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-20 20:00:22', '2018-06-20 20:00:22'),
(91, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-20 20:00:25', '2018-06-20 20:00:25'),
(92, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-21 20:00:08', '2018-06-21 20:00:08'),
(93, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-21 20:00:11', '2018-06-21 20:00:11'),
(94, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-21 20:00:14', '2018-06-21 20:00:14'),
(95, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-21 20:00:17', '2018-06-21 20:00:17'),
(96, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-21 20:00:20', '2018-06-21 20:00:20'),
(97, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:07', '2018-06-22 20:00:07'),
(98, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:10', '2018-06-22 20:00:10'),
(99, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:13', '2018-06-22 20:00:13'),
(100, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:16', '2018-06-22 20:00:16'),
(101, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:19', '2018-06-22 20:00:19'),
(102, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-22 20:00:22', '2018-06-22 20:00:22'),
(103, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-23 20:00:08', '2018-06-23 20:00:08'),
(104, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-23 20:00:11', '2018-06-23 20:00:11'),
(105, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-23 20:00:14', '2018-06-23 20:00:14'),
(106, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-23 20:00:17', '2018-06-23 20:00:17'),
(107, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-23 20:00:20', '2018-06-23 20:00:20'),
(108, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:10', '2018-06-24 20:00:10'),
(109, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:13', '2018-06-24 20:00:13'),
(110, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:16', '2018-06-24 20:00:16'),
(111, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:19', '2018-06-24 20:00:19'),
(112, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:22', '2018-06-24 20:00:22'),
(113, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-24 20:00:25', '2018-06-24 20:00:25'),
(114, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-25 20:00:07', '2018-06-25 20:00:07'),
(115, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-25 20:00:10', '2018-06-25 20:00:10'),
(116, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-25 20:00:13', '2018-06-25 20:00:13'),
(117, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-25 20:00:16', '2018-06-25 20:00:16'),
(118, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-25 20:00:19', '2018-06-25 20:00:19'),
(119, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:07', '2018-06-26 20:00:07'),
(120, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:10', '2018-06-26 20:00:10'),
(121, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:12', '2018-06-26 20:00:12'),
(122, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:15', '2018-06-26 20:00:15'),
(123, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:18', '2018-06-26 20:00:18'),
(124, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-26 20:00:21', '2018-06-26 20:00:21'),
(125, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-27 20:00:07', '2018-06-27 20:00:07'),
(126, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-27 20:00:10', '2018-06-27 20:00:10'),
(127, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-27 20:00:13', '2018-06-27 20:00:13'),
(128, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-27 20:00:16', '2018-06-27 20:00:16'),
(129, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-27 20:00:19', '2018-06-27 20:00:19'),
(130, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-28 20:00:08', '2018-06-28 20:00:08'),
(131, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-28 20:00:10', '2018-06-28 20:00:10'),
(132, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-28 20:00:14', '2018-06-28 20:00:14'),
(133, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-28 20:00:17', '2018-06-28 20:00:17'),
(134, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-28 20:00:19', '2018-06-28 20:00:19'),
(135, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:07', '2018-06-29 20:00:07'),
(136, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:10', '2018-06-29 20:00:10'),
(137, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:22', '2018-06-29 20:00:22'),
(138, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:25', '2018-06-29 20:00:25'),
(139, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:29', '2018-06-29 20:00:29'),
(140, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-29 20:00:32', '2018-06-29 20:00:32'),
(141, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:07', '2018-06-30 20:00:07'),
(142, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:10', '2018-06-30 20:00:10'),
(143, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:13', '2018-06-30 20:00:13'),
(144, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:16', '2018-06-30 20:00:16'),
(145, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:19', '2018-06-30 20:00:19'),
(146, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-06-30 20:00:22', '2018-06-30 20:00:22'),
(147, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:06', '2018-07-01 20:00:06'),
(148, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:09', '2018-07-01 20:00:09'),
(149, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:12', '2018-07-01 20:00:12'),
(150, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:15', '2018-07-01 20:00:15'),
(151, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:18', '2018-07-01 20:00:18'),
(152, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-01 20:00:21', '2018-07-01 20:00:21'),
(153, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:09', '2018-07-02 20:00:09'),
(154, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:12', '2018-07-02 20:00:12'),
(155, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:15', '2018-07-02 20:00:15'),
(156, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:18', '2018-07-02 20:00:18'),
(157, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:21', '2018-07-02 20:00:21'),
(158, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-02 20:00:24', '2018-07-02 20:00:24'),
(159, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:07', '2018-07-03 20:00:07'),
(160, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:10', '2018-07-03 20:00:10'),
(161, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:13', '2018-07-03 20:00:13'),
(162, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:16', '2018-07-03 20:00:16'),
(163, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:19', '2018-07-03 20:00:19'),
(164, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn', '2018-07-03 20:00:22', '2018-07-03 20:00:22'),
(165, 'sent', 'Email [sắp hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-04 00:30:58', '2018-07-04 00:30:58'),
(166, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-04 03:02:35', '2018-07-04 03:02:35'),
(167, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-04 03:04:34', '2018-07-04 03:04:34'),
(168, 'sent', 'Email [sắp hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-04 03:04:42', '2018-07-04 03:04:42'),
(169, 'sent', 'Email [sắp hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-09 23:57:51', '2018-07-09 23:57:51'),
(170, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-10 00:08:19', '2018-07-10 00:08:19'),
(171, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-10 00:11:11', '2018-07-10 00:11:11'),
(172, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [0]', '2018-07-13 20:00:06', '2018-07-13 20:00:06'),
(173, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-07-14 20:00:08', '2018-07-14 20:00:08'),
(174, 'sent', 'Email [sắp hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-07-20 00:06:36', '2018-07-20 00:06:36'),
(175, 'sent', 'Email [sắp hết hạn] sent to: support@tqdesign.vn', '2018-07-20 00:25:20', '2018-07-20 00:25:20'),
(176, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-07-31 20:00:08', '2018-07-31 20:00:08'),
(177, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-08-02 20:00:07', '2018-08-02 20:00:07'),
(178, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [3]', '2018-08-04 20:00:06', '2018-08-04 20:00:06'),
(179, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-08-06 20:00:08', '2018-08-06 20:00:08'),
(180, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-08-08 01:04:25', '2018-08-08 01:04:25'),
(181, 'sent', 'Email [đã hết hạn] sent to: nam.nguyen@tqdesign.vn', '2018-08-08 01:07:12', '2018-08-08 01:07:12'),
(182, 'sent', 'Email [thducuit@gmail.com] sent task success', '2018-08-09 20:24:05', '2018-08-09 20:24:05'),
(183, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-08-14 17:00:06', '2018-08-14 17:00:06'),
(184, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-08-26 17:00:06', '2018-08-26 17:00:06'),
(185, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-08-29 17:00:05', '2018-08-29 17:00:05'),
(186, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-08-29 17:00:08', '2018-08-29 17:00:08'),
(187, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-08-29 17:00:11', '2018-08-29 17:00:11'),
(188, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-08-31 17:00:06', '2018-08-31 17:00:06'),
(189, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [3]', '2018-09-02 17:00:06', '2018-09-02 17:00:06'),
(190, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [0]', '2018-09-05 17:00:06', '2018-09-05 17:00:06'),
(191, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-09-06 17:00:06', '2018-09-06 17:00:06'),
(192, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-09-08 17:00:06', '2018-09-08 17:00:06'),
(193, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-09-08 17:00:09', '2018-09-08 17:00:09'),
(194, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [3]', '2018-09-10 17:00:05', '2018-09-10 17:00:05'),
(195, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-09-11 17:00:05', '2018-09-11 17:00:05'),
(196, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-09-11 17:00:08', '2018-09-11 17:00:08'),
(197, 'sent', 'Email [ĐÃ HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [0]', '2018-09-13 17:00:07', '2018-09-13 17:00:07'),
(198, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-09-18 17:00:06', '2018-09-18 17:00:06'),
(199, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-09-20 17:00:05', '2018-09-20 17:00:05'),
(200, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-09-21 17:00:06', '2018-09-21 17:00:06'),
(201, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [7]', '2018-09-21 17:00:09', '2018-09-21 17:00:09'),
(202, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-09-21 17:00:12', '2018-09-21 17:00:12'),
(203, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [3]', '2018-09-22 17:00:06', '2018-09-22 17:00:06'),
(204, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-09-23 17:00:06', '2018-09-23 17:00:06'),
(205, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [5]', '2018-09-23 17:00:09', '2018-09-23 17:00:09'),
(206, 'sent', 'Email [SẮP HẾT HẠN] sent to: nam.nguyen@tqdesign.vn day(s) left [30]', '2018-09-24 17:00:06', '2018-09-24 17:00:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail_tasks`
--

CREATE TABLE `mail_tasks` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0:begin;1:done;2:doing',
  `template_id` int(11) DEFAULT NULL,
  `category_ids` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `mail_tasks`
--

INSERT INTO `mail_tasks` (`id`, `status`, `template_id`, `category_ids`, `cc`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '9', '', '2018-08-10 03:24:05', '2018-08-09 20:24:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL,
  `customer` varchar(200) CHARACTER SET utf8 NOT NULL,
  `services` varchar(200) CHARACTER SET utf8 NOT NULL,
  `datecreated` date NOT NULL,
  `dateexpired` date NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` varchar(20) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `management`
--

INSERT INTO `management` (`id`, `customer`, `services`, `datecreated`, `dateexpired`, `order`, `status`, `note`, `price`, `contact`, `email`, `phone`, `category_id`, `created_at`, `updated_at`) VALUES
(308, 'Cty CP Thủy Sản Cửu Long', 'cuulongseapro.vn', '2017-11-13', '2018-11-13', 6, 0, '', '6,400,000', 'Chị Nghị Chức', 'support@tqdesign.vn', '074 3 85 3390', 3, '2018-07-09 21:12:47', '2018-08-15 20:26:16'),
(309, 'Cty CP Thủy Sản Cửu Long', 'cuulongseapro.vn', '2018-05-13', '2019-05-13', 5, 0, '', '800,000', 'Chị Nghị Chức', 'nam.nguyen@tqdesign.vn', '074 3 85 3390', 4, '2018-07-10 00:07:54', '2018-08-15 20:24:10'),
(311, 'Cty TNHH GIẢI PHÁP THẾ GIỚI SỐ', 'isolution.vn', '2018-02-25', '2019-02-25', 12, 0, '', '720,000', 'Chị Vy', 'nam.nguyen@tqdesign.vn', '08 3 51 52 127 - 0909 4567 08', 4, '2018-07-13 00:28:21', '2018-08-15 20:27:34'),
(312, 'Cty CP Thủy Sản Số 5', 'vietrosco.vn', '2018-06-18', '2019-06-18', 11, 0, '', '880,000', 'Anh Trí', 'nam.nguyen@tqdesign.vn,thducuit@gmail.com', '3974 0141', 4, '2018-07-13 00:31:52', '2018-08-15 20:27:34'),
(313, 'Cty Quảng Cáo Tân Hoàng Phố', 'tanhoangpho.com', '2018-03-11', '2019-03-11', 17, 0, '', '250,000	', 'Anh Tâm', 'nam.nguyen@tqdesign.vn', '08. 38161001 - 0903 684 037', 4, '2018-07-13 00:33:38', '2018-08-15 21:51:27'),
(314, 'Cty Mike Garment', 'Hosting mail', '2018-05-25', '2019-05-25', 53, 0, '', '1,692,000', 'Chị Lan', 'nam.nguyen@tqdesign.vn', '0938 231351 (Ms - Lan) - 08 3785 2382', 5, '2018-07-13 00:38:31', '2018-08-15 22:06:41'),
(315, 'Tổng Công Ty CP DV TỔNG HỢP DẦU KHÍ', 'petrosetco.com.vn', '2018-01-12', '2019-01-12', 1, 0, '', '14,600,000', 'Anh Tú	', 'nam.nguyen@tqdesign.vn', '3911 7777 - 0903699567', 3, '2018-07-13 00:39:43', '2018-08-15 19:50:30'),
(316, 'CTY TNHH CON ĐƯỜNG GIÁO DỤC', 'edupath.org.vn', '2016-11-08', '2018-11-08', 85, 0, '', '5,000,000', 'Anh Kiệt	', 'nam.nguyen@tqdesign.vn', '3820 8086 - 0906735788', 3, '2018-07-13 00:42:04', '2018-08-15 23:43:36'),
(317, 'Cty CP Bao Bì Nhựa Tân Tiến', 'tapack.com.vn	', '2018-03-05', '2019-03-05', 3, 0, '', '4,000,000', 'Anh Thái', 'nam.nguyen@tqdesign.vn', '0984175275', 3, '2018-07-13 00:43:25', '2018-08-15 20:23:32'),
(318, 'Khách sạn Phương Bắc (Northern Hotel)', 'northernhotel.com.vn', '2018-05-06', '2019-05-06', 7, 0, '', '4,300,000', 'Anh Quyền', 'nam.nguyen@tqdesign.vn', '38251.751 - 38251.752 - 0989 333 017', 3, '2018-07-13 00:44:42', '2018-08-15 20:27:34'),
(319, 'TQ Tecom', 'tqdesign.vn', '2017-08-17', '2018-08-17', 73, 1, '', '480,000', 'Anh Chính', 'nam.nguyen@tqdesign.vn', '0944354496', 4, '2018-07-13 00:46:16', '2018-08-16 01:06:36'),
(320, 'Cty CP Bao bì nhựa Tân Tiến', 'tapack.com.vn', '2006-03-31', '2021-03-31', 4, 0, '', '800,000', 'Anh Thái', 'nam.nguyen@tqdesign.vn', '0984 175 275 - 3816 0777 - 3816 3050', 4, '2018-07-13 00:47:55', '2018-08-15 20:23:32'),
(321, 'Cty CP Bao Bì Nhựa Tân Tiến', 'tapack.com', '2015-10-21', '2024-10-21', 2, 0, '', '800,000', 'Anh Thái', 'nam.nguyen@tqdesign.vn', '0984 175 275 - 3816 0777 - 3816 3050', 4, '2018-07-13 00:49:34', '2018-08-15 20:23:32'),
(322, 'Cty CP XD TM DV THANH DŨNG', 'khoacua.com', '2017-07-01', '2019-07-01', 52, 0, '', '1,090,909', 'Anh Hoàng', 'nam.nguyen@tqdesign.vn', '0903 803 656', 3, '2018-07-13 00:51:31', '2018-08-15 22:01:06'),
(323, 'Cty TNHH XD & San Lấp Nền Trung Dũng', 'trungdung.vn', '2018-08-07', '2019-08-09', 9, 0, '', '4,500,000', 'Anh Nhân', 'nam.nguyen@tqdesign.vn', '0908 113 898', 3, '2018-07-13 00:53:06', '2018-08-15 20:26:16'),
(324, 'TQ Tecom', 'themax.vn', '2018-06-26', '2019-06-26', 56, 0, '', '480,000	', 'Anh Nam', 'nam.nguyen@tqdesign.vn', '096936855', 4, '2018-07-13 00:57:04', '2018-08-15 22:07:09'),
(325, 'Cty CỔ PHẦN PHÁT TRIỂN NHÀ PHONG PHÚ - DAEWON - THỦ ĐỨC', 'phongphuland.vn', '2017-07-23', '2019-07-23', 55, 0, '', '800,000', 'Chị Hiền', 'nam.nguyen@tqdesign.vn', '0916 413 925', 4, '2018-07-13 00:59:11', '2018-08-15 22:07:09'),
(326, 'Công ty Cổ phần VINAFREIGHT', 'vinafreight.com', '2018-01-21', '2019-01-21', 42, 0, '', '4,000,000', 'Anh Huy Khang', 'nam.nguyen@tqdesign.vn', '01213 48 7799 - 08 3 844 6409 – 3 844 6410', 3, '2018-07-13 01:00:28', '2018-08-15 22:03:16'),
(327, 'Trường Mầm non Khánh Hội', 'mamnonkhanhhoi.edu.vn', '2017-10-10', '2018-10-10', 43, 1, '', '4,000,000', 'Anh Tin', 'nam.nguyen@tqdesign.vn', '0167 9474056', 3, '2018-07-13 01:01:57', '2018-09-08 17:00:01'),
(328, 'Cty Cổ Phần XNK Thủy Sản Cửu Long', 'www.clpangafish.com.vn', '2018-01-16', '2020-01-16', 44, 0, '', '67,340,000', 'Chị Hòa', 'nam.nguyen@tqdesign.vn', '0903 692 979 - 0673 764959 (ext 120)', 5, '2018-07-13 01:03:11', '2018-08-15 22:03:16'),
(329, 'Công ty Soyon', 'soyon.co', '2018-05-23', '2019-05-23', 45, 0, '', '4,800,000', 'Chị Nhi', 'nam.nguyen@tqdesign.vn', '0963 219 214 (Ms Nhi)', 3, '2018-07-13 01:05:23', '2018-08-15 22:03:16'),
(330, 'Cty CP Đầu Tư & Kinh Doanh BĐS Trí Minh', 'megavillage.com.vn', '2018-04-01', '2019-04-01', 15, 0, '', '5,000,000', 'Anh Long', 'nam.nguyen@tqdesign.vn', '0938 030 177 (Long) - 08 3820 8858', 3, '2018-07-13 01:06:25', '2018-08-15 21:50:52'),
(331, 'Cty TNHH GuyoMarch Việt Nam', 'ganador.asia	', '2017-11-12', '2018-11-12', 20, 0, '', '4,000,000', 'Anh Thịnh', 'nam.nguyen@tqdesign.vn', '0908070613', 3, '2018-07-13 01:07:42', '2018-08-15 21:51:27'),
(332, 'Cty CP May - Diêm Sài Gòn', 'goldview-tnr.com.vn', '2017-06-01', '2018-06-01', 999, 2, '', '4,000,000', 'Anh Dương', 'nam.nguyen@tqdesign.vn', '0937127076 (Anh Dương) - 0906 350 979 (Anh Phương)', 3, '2018-07-13 01:09:50', '2018-08-16 01:49:20'),
(333, 'Cty CP TV - TM - DV - DX Đại Tín', 'daitingroup.com', '2017-07-08', '2018-07-08', 74, 2, '', '2,100,000', 'Anh Nam', 'nam.nguyen@tqdesign.vn', '0918 183356', 3, '2018-07-13 01:11:16', '2018-08-15 23:42:38'),
(334, 'Cty CP Đầu Tư Địa Ốc Khang An', 'khangan.com', '2018-06-18', '2019-06-18', 45, 0, '', '5,640,000', 'Anh Hiểu', 'nam.nguyen@tqdesign.vn', '0968 353 368 - 35 144 751 (Mr. Hiểu)', 3, '2018-07-13 01:14:45', '2018-08-15 21:59:34'),
(335, 'Cty CP Đầu Tư GoHome', 'gohome.com.vn	', '2018-06-15', '2019-06-15', 54, 0, '', '1,100,000', 'Anh Lâm', 'nam.nguyen@tqdesign.vn', '0937008811', 4, '2018-07-13 01:17:03', '2018-08-15 22:06:41'),
(336, 'Cty CP TV - TM - DV - DX Đại Tín', 'daitingroup.com', '2017-07-08', '2018-07-08', 75, 2, '', '250,000', 'Anh Nam', 'nam.nguyen@tqdesign.vn', '0918 183356', 4, '2018-07-13 01:18:36', '2018-08-15 23:42:38'),
(337, 'Cty CP Địa Ốc Phú Long', 'dragonhill.vn	', '2018-07-17', '2019-07-17', 26, 0, '', '4,000,000', 'Chị Thúy', 'nam.nguyen@tqdesign.vn', '0902 428 678', 3, '2018-07-13 01:23:26', '2018-08-15 21:53:13'),
(338, 'SMI-VN TRAVEL COMPANY LIMITED', 'wendytour.com.vn	', '2018-06-14', '2019-06-14', 16, 0, '', '4,000,000', 'Anh Hoàng', 'nam.nguyen@tqdesign.vn', '0903 395 211 - 08 3914 2525', 3, '2018-07-13 01:24:40', '2018-08-15 21:51:27'),
(339, 'Cty TNHH Đầu Tư Xây Dựng PHÚ MỸ - QUY NHƠN PMIC', 'simonahome.vn', '2017-11-24', '2018-11-24', 18, 0, '', '4,000,000', 'Chị Tuyết', 'nam.nguyen@tqdesign.vn', '0903697870 (Chị Tuyết) - 0931808400 (Thiện IT)', 3, '2018-07-13 01:25:53', '2018-08-15 21:51:27'),
(340, 'Cty TNHH GuyoMarch Việt Nam', 'blisk.asia', '2017-11-03', '2018-11-03', 21, 0, '', '4,000,000', 'Anh Thịnh', 'nam.nguyen@tqdesign.vn', '0908070613', 3, '2018-07-13 01:39:08', '2018-08-15 21:51:27'),
(341, 'Cty TNHH GuyoMarch Việt Nam', 'qalian.asia', '2017-11-03', '2018-11-03', 22, 0, '', '4,000,000', 'Anh Thịnh', 'nam.nguyen@tqdesign.vn', '0908 070613', 3, '2018-07-13 01:40:17', '2018-08-15 21:51:27'),
(342, 'Cty HoREA', 'hoichoviethome.com', '2017-04-05', '2018-04-05', 76, 2, '', '5,000,000', 'Anh Quý', 'nam.nguyen@tqdesign.vn', '0907 457 156 (A.Quý) - 0918 183356 (A.Nam)', 3, '2018-07-13 01:41:46', '2018-08-15 23:42:38'),
(343, 'Cty TNHH GuyoMarch Việt Nam', 'ocialis.asia', '2018-04-11', '2019-04-11', 23, 0, '', '4,000,000', 'Anh Thịnh', 'nam.nguyen@tqdesign.vn', '0908070613 (Thịnh)', 3, '2018-07-13 01:44:51', '2018-08-15 21:36:09'),
(344, 'CÔNG TY CP TƯ VẤN - XÂY DỰNG VÀ DỊCH VỤ THƯƠNG MẠI THIÊN MINH', 'thienminhcorp.com.vn', '2018-07-13', '2019-07-13', 48, 0, '', '4,000,000', 'Anh Tiến', 'nam.nguyen@tqdesign.vn', '090 690 4656 (Anh Tiến) - 0906 892 792 (Anh Đông) - 028. 38 30 38 83 (Ext:303)', 3, '2018-07-13 01:45:52', '2018-08-15 22:01:06'),
(345, 'Cty TNHH MTV MODE HOTEL & REALTY', 'stayhotel.com.vn', '2017-08-11', '2019-08-11', 25, 0, '', '4,000,000', 'Chị Hương', 'nam.nguyen@tqdesign.vn', '0918 396 074', 3, '2018-07-13 01:46:52', '2018-08-15 21:52:21'),
(346, 'TQ Design', 'Cloud VPS Window (103.15.50.219) - Mắt Bảo', '2016-06-20', '2018-11-28', 999, 0, '', '1,100,000', 'TQ Design', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 02:03:49', '2018-08-16 01:49:20'),
(347, 'Cty Nielsen', 'Duy trì, theo dõi, backup Ứng dụng WebApp (http://prowtech.themax.vn)', '2017-09-30', '2018-09-30', 999, 1, '', '14,982,000', 'Anh Tùng', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 02:05:31', '2018-08-29 17:00:01'),
(348, 'Cty Nielsen', 'Duy trì, theo dõi, support, backup Ứng dụng Web (http://unza.themax.vn)', '2017-09-30', '2018-09-30', 79, 1, '', '74,520,000', 'Chị Thanh', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 02:10:05', '2018-08-29 17:00:05'),
(349, 'Cty TNHH ĐẦU TƯ VÀ KINH DOANH BẤT ĐỘNG SẢN SONG LẬP', 'melosagarden.com.vn', '2017-11-03', '2018-11-03', 14, 0, '', '6,200,000', 'Chị Nguyên', 'nam.nguyrn@tqdesign.vn', '016 777 090 17', 3, '2018-07-13 02:11:22', '2018-08-15 21:50:52'),
(350, 'CÔNG TY CỔ PHẦN ĐẦU TƯ PHƯƠNG VIỆT', 'thepegasuite.vn', '2017-11-12', '2018-11-12', 49, 0, '', '4,000,000', 'Chị Hòa', 'nam.nguyen@tqdesign.vn', '0989 70 18 17', 3, '2018-07-13 02:20:43', '2018-08-15 22:01:06'),
(351, 'CÔNG TY CỔ PHẦN XÂY LẮP THƯƠNG MẠI CHÁNH PHÚC', 'chanhphuc.com', '2017-11-30', '2018-11-30', 50, 0, '', '4,000,000', 'Chị Mão', 'nam.nguyen@tqdesign.vn', '0937 787 564', 3, '2018-07-13 02:21:49', '2018-08-15 22:01:06'),
(352, 'CÔNG TY CỔ PHẦN THỦY SẢN HÀ NỘI – CẦN THƠ', 'hacaseafood.com', '2018-03-16', '2019-03-16', 51, 0, '', '4,000,000', 'Chị Trinh', 'nam.nguyen@tqdesign.vn', '0939 362 949', 3, '2018-07-13 02:22:55', '2018-08-15 22:01:06'),
(353, 'Cty Cổ Phần Kỹ Thuật Xây Dựng Phú Mỹ - PMEC', 'pmec.com.vn', '2017-11-02', '2018-11-02', 19, 0, '', '4,000,000', 'Chị Tuyết', 'nam.nguyen@tqdesign.vn', '0903697870 (Chị Tuyết) - 0931808400 (Thiện IT)', 3, '2018-07-13 02:38:41', '2018-08-15 21:51:27'),
(354, 'Cty Cổ Phần Đầu Tư Nam Long', 'waterpoint.com.vn', '2018-04-20', '2019-04-20', 8, 0, '', '8,400,000', 'Chị Thường', 'nam.nguyen@tqdesign.vn', '(08) 3752 8967', 3, '2018-07-13 02:47:50', '2018-08-15 20:27:34'),
(355, 'CÔNG TY TNHH ĐẦU TƯ THÀNH PHÚC', 'jamila.com.vn', '2018-04-20', '2019-04-20', 13, 0, '', '4,000,000', 'Chị Nguyên', 'nam.nguyen@tqdesign.vn', '016 777 090 17', 3, '2018-07-13 02:49:27', '2018-08-15 21:50:52'),
(356, 'Cty TNHH MTV MODE HOTEL & REALTY', 'stayhotel.com.vn', '2018-05-23', '2019-05-23', 24, 0, '', '700,000', 'Chị Hương', 'nam.nguyen@tqdesign.vn', '0918 396 074', 4, '2018-07-13 02:50:59', '2018-08-15 20:21:40'),
(357, 'Cty CP May - Diêm Sài Gòn', 'goldview.themax.vn', '2017-07-15', '2018-07-15', 64, 2, '', '4,000,000', 'Anh Dương', 'nam.nguyen@tqdesign.vn', '0937127076 (Anh Dương) - 0906 350 979 (Anh Phương', 3, '2018-07-13 02:53:04', '2018-08-15 22:08:54'),
(358, 'Cty TNHH THƯƠNG MẠI DỊCH VỤ XÂY LẮP ĐIỆN HIỆP PHÁT	', 'dienhiepphat.net', '2018-05-31', '2019-05-31', 10, 0, '', '4,000,000', 'Anh Nghĩa', 'nam.nguyen@tqdesign.vn', '0937 690 123', 3, '2018-07-13 02:54:04', '2018-08-15 21:39:02'),
(359, 'TQ Design (Cloud server 8 - CSD0006/17/Viettel-CHT)', 'unza.themax.vn - Viettel', '2017-09-07', '2018-09-07', 80, 2, '', '10,098,000', 'TQ Design', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 03:15:48', '2018-09-05 17:00:01'),
(360, 'TQ Tecom', 'Cloud Server Window (125.212.253.145) - Viettel', '2017-07-05', '2019-07-05', 81, 0, '', '5,610,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 03:24:28', '2018-08-15 23:43:36'),
(361, 'Han Soo Academy & Beauty Clinic', 'depdedoidoi.vn', '2017-08-07', '2019-08-07', 60, 0, '', '4,000,000', 'Anh Vinh', 'nam.nguyen@tqdesign.vn', '0904444242 (Vinh) - 0903098300 (Tuân)', 3, '2018-07-13 03:31:24', '2018-08-15 22:08:25'),
(362, 'Cty CP Địa Ốc Phú Long', 'dragonriversidecity.com', '2018-08-03', '2019-08-15', 26, 0, '', '4,000,000', 'Chị Thúy', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 03:32:31', '2018-08-15 22:05:43'),
(363, 'Công ty TNHH dịch vụ tư vấn đầu tư Gia Long', 'greentown.com.vn', '2017-07-13', '2018-07-13', 62, 2, '', '4,000,000', 'TQ Design', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 03:33:51', '2018-08-15 22:08:25'),
(364, 'Công ty TNHH BĐS Phú Hoàng Land', 'imperialplace.com.vn', '2017-09-27', '2018-09-27', 57, 1, '', '4,000,000', 'Anh Tài', 'nam.nguyen@tqdesign.vn', '0944.136.315', 3, '2018-07-13 03:34:56', '2018-08-26 17:00:02'),
(365, 'Cty Cổ Phần Năng Lượng IREX', 'irex.vn', '2017-09-15', '2018-09-15', 65, 2, '', '4,000,000', 'Anh Bình', 'nam.nguyen@tqdesign.vn', '012626 622 32', 3, '2018-07-13 03:36:15', '2018-09-13 17:00:02'),
(366, 'Công ty Cổ phần Tư vấn Đầu tư Hưng Gia Việt', 'centralgarden.com.vn', '2017-10-13', '2018-10-13', 59, 1, '', '800,000', 'Anh Đức', 'nam.nguyen@tqdesign.vn', '0938555769', 4, '2018-07-13 03:37:22', '2018-09-11 17:00:01'),
(367, 'Công ty Cổ phần Tư vấn Đầu tư Hưng Gia Việt', 'centralgarden.vn', '2017-10-13', '2018-10-13', 66, 1, '', '800,000', 'Anh Đức', 'nam.nguyen@tqdesign.vn', '0938555769', 4, '2018-07-13 03:39:37', '2018-09-11 17:00:05'),
(368, 'Công ty Cổ phần Tư vấn Đầu tư Hưng Gia Việt', 'centralgarden.vn', '2017-10-13', '2018-07-13', 67, 2, '', '4,000,000', 'Anh Đức', 'nam.nguyen@tqdesign.vn', '0938555769', 3, '2018-07-13 03:41:36', '2018-08-15 22:09:20'),
(369, 'Trần Anh Group', 'trananhriverside.com.vn', '2017-10-23', '2018-10-23', 57, 1, '', '4,000,000', 'Anh Quang', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 19:08:42', '2018-09-21 17:00:09'),
(370, 'Cty Cổ Phần Đầu Tư Phong Vân', 'phongvanco.com.vn', '2017-12-21', '2018-12-21', 46, 0, '', '4,000,000', 'Chị Trang', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 19:09:31', '2018-08-15 22:01:06'),
(371, 'Công ty Cổ Phần NISO', 'runamdor.com.vn', '2017-12-20', '2018-12-20', 36, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 19:10:30', '2018-08-15 22:02:08'),
(372, 'Cty Cổ Phần Đầu Tư Phong Vân', 'thepanoramadalat.vn', '2017-12-18', '2018-12-18', 47, 0, '', '4,000,000', 'Chị Trang', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 19:11:27', '2018-08-15 22:01:06'),
(373, 'Cty Nielsen', 'Duy trì, theo dõi, support, backup Ứng dụng Web (http://fcv.themax.vn)', '2017-10-30', '2018-10-30', 82, 0, '', 'Update', 'Anh Nhất', 'nam.nguyen@tqdesign.vn', '0932 779 762 (A.Nhất)', 8, '2018-07-13 19:13:17', '2018-08-15 23:43:36'),
(374, 'Cty Nielsen ', 'Duy trì, theo dõi, backup Ứng dụng WebApp (http://kc.themax.vn)', '2017-12-01', '2018-04-30', 83, 2, '', '14,490,000', 'Anh Vinh', 'nam.nguyen@tqdesign.vn', '0982 485 895 (A.Vinh)', 8, '2018-07-13 19:15:53', '2018-08-15 23:43:36'),
(375, 'Cty TNHH dịch vụ tư vấn đầu tư Gia Long', 'greentown.com.vn', '2017-07-08', '2018-07-08', 61, 2, '', '700,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 19:16:52', '2018-08-15 22:08:25'),
(376, 'Công ty Cổ Phần NISO', 'anvienrestaurant.com.vn', '2018-01-09', '2019-01-09', 31, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 19:30:43', '2018-08-15 21:58:01'),
(377, 'Công ty Cổ Phần NISO', 'maximrestaurant.com.vn', '2018-01-09', '2019-01-09', 32, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 19:56:13', '2018-08-15 21:58:01'),
(378, 'Tập đoàn Đất Xanh', 'gemriverside.vn', '2018-01-31', '2019-01-31', 28, 0, '', '4,000,000', 'Anh Tân', 'nam.nguyen@tqdesign.vn', '0934120468', 3, '2018-07-13 19:57:12', '2018-08-15 21:55:43'),
(379, 'Công ty Cổ phần Gamudaland', 'gamudaland.com.vn', '2018-02-05', '2019-02-05', 29, 0, '', '4,000,000', 'Chị Hà', 'nam.nguyen@tqdesign.vn', '0981688577', 3, '2018-07-13 19:58:13', '2018-08-15 21:55:43'),
(380, 'Cty CP ĐẦU TƯ CĂN NHÀ MƠ ƯỚC (DREAM HOUSE - DRH)', 'canhoaurora.vn', '2018-01-24', '2019-01-24', 30, 0, '', '4,000,000', 'Anh Phước', 'nam.nguyen@tqdesign.vn', '0932738353', 3, '2018-07-13 19:58:58', '2018-08-15 21:55:43'),
(381, 'TQ Tecom', 'Cloud Server Linux - Dự Án FCV(125.212.253.17) - Viettel', '2017-10-26', '2018-10-26', 84, 1, '', '14.025.000', 'Anh Nam', 'nam.nguyen@tqdesign.vn', '0969368855', 8, '2018-07-13 20:00:09', '2018-09-24 17:00:01'),
(382, 'Công Ty Cổ Phần Thiên Phúc Điền', 'conghoagarden.com.vn', '2018-03-20', '2019-03-20', 27, 0, '', '4,300,000', 'Chị Thoa', 'nam.nguyen@tqdesign.vn', '0968 68 11 51', 3, '2018-07-13 20:01:04', '2018-08-15 21:55:43'),
(383, 'TQ Tecom', 'coke.themax.vn', '2018-04-18', '2019-04-18', 70, 0, '', '0', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:16:01', '2018-08-15 22:10:17'),
(384, 'Công ty Cổ Phần NISO', 'terracebistro.com.vn', '2017-12-20', '2018-12-20', 33, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 20:20:04', '2018-08-15 21:58:01'),
(385, 'Công ty Cổ Phần NISO', 'nambento.com', '2018-01-16', '2019-01-16', 34, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 20:20:55', '2018-08-15 21:58:01'),
(386, 'Công ty Cổ Phần NISO', 'quananrestaurant.com.vn', '2018-02-05', '2019-02-05', 35, 0, '', '4,000,000', 'Anh Phúc', 'nam.nguyen@tqdesign.vn', '0909 701 720', 3, '2018-07-13 20:42:28', '2018-08-15 21:58:01'),
(387, 'thachthucsuhoanhao.com', 'thachthucsuhoanhao.com', '2018-04-17', '2019-04-17', 69, 0, '', '800,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 20:43:44', '2018-08-15 22:10:17'),
(388, 'carillon.com.vn', 'carillon.com.vn', '2018-04-13', '2019-04-13', 68, 0, '', '4,000,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:44:46', '2018-08-15 22:10:17'),
(389, 'solvillas.vn', 'solvillas.vn', '2018-05-06', '2019-05-06', 69, 0, '', '4,000,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:45:40', '2018-08-15 22:10:17'),
(390, 'Cty Cố Phần Dịch Vụ Tổng Hợp Sài Gòn (SAVICO)', 'savico.com.vn	', '2018-05-04', '2019-05-04', 37, 0, '', '8,000,000', 'Anh Hưng', 'nam.nguyen@tqdesign.vn', '0902 690 123', 3, '2018-07-13 20:46:43', '2018-08-15 22:03:16'),
(391, 'dragonvillage.com.vn', 'dragonvillage.com.vn', '2018-05-21', '2019-05-21', 38, 0, '', '4,000,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:47:59', '2018-08-15 22:03:16'),
(392, 'sccvietnam.vn', 'sccvietnam.vn', '2018-05-26', '2019-05-26', 39, 0, '', '4,000,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:48:43', '2018-08-15 22:03:16'),
(393, 'symbiocity.vn', 'symbiocity.vn', '2018-06-14', '2019-06-14', 70, 0, '', '800,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 20:49:23', '2018-08-15 22:10:17'),
(394, 'symbiocity.com.vn', 'symbiocity.com.vn', '2018-06-14', '2019-06-14', 71, 0, '', '800,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 20:50:06', '2018-08-15 22:10:17'),
(395, 'TQ Design', 'symbiogarden.vn', '2018-06-19', '2019-06-19', 72, 0, '', '800,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 20:50:51', '2018-08-15 23:42:38'),
(396, 'TQ Tecom', 'symbiogarden.com.vn', '2018-06-19', '2019-06-19', 73, 0, '', '800,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 4, '2018-07-13 20:51:36', '2018-08-15 23:42:38'),
(397, 'jamonaskyvillas.vn', 'jamonaskyvillas.vn', '2018-06-15', '2019-06-15', 40, 0, '', '4,000,000', 'TQ Tecom', 'nam.nguyen@tqdesign.vn', '0969368855', 3, '2018-07-13 20:52:39', '2018-08-15 22:03:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2018_05_10_071749_Post', 1),
('2018_05_10_071807_Management', 1),
('2014_10_12_000000_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 2),
('2018_05_16_084419_add_timestamp_to_category_table', 3),
('2018_05_16_091308_drop_col_to_category_table', 4),
('2018_05_17_063007_add_timestamp_customer', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: active; 0: deactive; -1: draft',
  `auto` tinyint(1) DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `status`, `auto`, `cc`, `created_at`, `updated_at`) VALUES
(2, 'Thông báo Gia hạn Dịch vụ', '<style type=\"text/css\">\r\nbody {\r\n	background-color: #114b89;\r\n	margin-left: 0px;\r\n	margin-top: 0px;\r\n	margin-right: 0px;\r\n	margin-bottom: 0px;\r\n}</style>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%;min-width:830px;background:#114b89;margin:auto\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td align=\"center\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\r\n					<tbody>\r\n						<tr style=\"background:#191d26;color:#114b89;font-family:Arial;width:640px;vertical-align:middle\">\r\n							<td height=\"180\" style=\"margin-left: 50px;\">\r\n								<a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"TQ Tecom Logo\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom.png\" style=\"width: 290px; height: 110px;margin-left: 50px;\" /></a></td>\r\n						</tr>\r\n						<tr style=\"background:#fff;\">\r\n							<td height=\"100\" style=\"padding-left:50px;color:#114b89; font-family:Arial;font-weight:bold;font-size:30px;\">\r\n								Th&ocirc;ng b&aacute;o gia hạn dịch vụ</td>\r\n						</tr>\r\n						<tr style=\"background:#fff;\">\r\n							<td height=\"40\" style=\"padding-left:50px;color:#114b89; font-family:Arial;font-weight:bold;font-size:18px;\">\r\n								K&iacute;nh gửi: {contact} - {customer}</td>\r\n						</tr>\r\n						<tr style=\"background:#fff;\">\r\n							<td style=\"padding-left:50px; padding-right:50px; color:#114b89; font-family:Arial; font-size:14px;\">\r\n								<p>\r\n									TQ Tecom ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; Kh&aacute;ch đ&atilde; tin tưởng v&agrave; sử dụng sản phẩm, dịch vụ của ch&uacute;ng t&ocirc;i (TQ Tecom: TQ Design | TheMax) trong thời gian qua.</p>\r\n								<p>\r\n									<strong>K&Iacute;NH CH&Uacute;C QU&Yacute; KH&Aacute;CH KINH DOANH PH&Aacute;T ĐẠT &amp; THỊNH VƯỢNG</strong></p>\r\n								<hr align=\"left\" color=\"#d7d8dd\" noshade=\"noshade\" size=\"1\" width=\"100%\" />\r\n								<p>\r\n									<strong>TQ Tecom tr&acirc;n trọng th&ocirc;ng b&aacute;o đến Qu&yacute; kh&aacute;ch như sau:</strong></p>\r\n								<p>\r\n									<strong>Dịch vụ [{category}] [{project}]&nbsp;<span style=\"font-size: 14px; color: rgb(255, 0, 0);\">[{STATUS}]</span></strong></p>\r\n								<table style=\"width: 400px; margin-left: 30px; font-family:Arial; font-size:14px;\">\r\n									<tbody>\r\n										<tr>\r\n											<td style=\"width: 100px; color:#114b89;\">\r\n												* Ng&agrave;y khởi tạo</td>\r\n											<td style=\"font-size: 14px;\">\r\n												: &nbsp;<strong>&nbsp;<span style=\"color: rgb(255, 0, 0);\">{datecreated}</span></strong></td>\r\n										</tr>\r\n										<tr>\r\n											<td style=\"width: 100px; color:#114b89;\">\r\n												* Ng&agrave;y hết hạn</td>\r\n											<td style=\"font-size: 14px;\">\r\n												: &nbsp;&nbsp;<span style=\"color: rgb(255, 0, 0);\"><strong>{dateexpired}</strong></span></td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<hr align=\"left\" color=\"#d7d8dd\" noshade=\"noshade\" size=\"1\" width=\"100%\" />\r\n								<p>\r\n									Để duy tr&igrave; dịch vụ kh&ocirc;ng bị gi&aacute;n đoạn, Qu&yacute; kh&aacute;ch vui l&ograve;ng thanh to&aacute;n chậm nhất 03 ng&agrave;y trước Ng&agrave;y hết hạn. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm đối với bất kỳ tổn thất hay thiệt hại n&agrave;o li&ecirc;n quan đến việc ngưng hoạt động dịch vụ, nếu đến Ng&agrave;y hết hạn m&agrave; chưa nhận được thanh to&aacute;n của qu&yacute; kh&aacute;ch h&agrave;ng.</p>\r\n								<hr align=\"left\" color=\"#d7d8dd\" noshade=\"noshade\" size=\"1\" width=\"100%\" />\r\n								<p>\r\n									Qu&yacute; kh&aacute;ch vui l&ograve;ng thanh to&aacute;n bằng c&aacute;ch chuyển khoản theo th&ocirc;ng tin dưới đ&acirc;y:<br />\r\n									<br />\r\n									<strong>C&ocirc;ng ty TNHH C&ocirc;ng nghệ &amp; Truyền th&ocirc;ng Thi&ecirc;n Quang (TQ TECOM)</strong></p>\r\n								<table style=\"width: 510; margin-left: 30px; font-family:Arial; font-size:14px;\">\r\n									<tbody>\r\n										<tr>\r\n											<td style=\"color:#114b89;width: 100px;\">\r\n												* Số t&agrave;i khoản</td>\r\n											<td style=\"color:#114b89;\">\r\n												: &nbsp;&nbsp;<strong>13908619</strong> - Ng&acirc;n h&agrave;ng ACB - CN: S&agrave;i G&ograve;n.</td>\r\n										</tr>\r\n										<tr>\r\n											<td style=\"color:#114b89;width: 100px;\">\r\n												* Số tiền</td>\r\n											<td style=\"color:#114b89;\">\r\n												: &nbsp;&nbsp;<span style=\"color:#ff0000;\"><strong>[{price} VNĐ]</strong></span> (đ&atilde; bao gồm thuế VAT 10%)</td>\r\n										</tr>\r\n										<tr>\r\n											<td style=\"color:#114b89;width: 100px;\">\r\n												* Nội dung</td>\r\n											<td style=\"color:#114b89;\">\r\n												: &nbsp;&nbsp;Gia hạn {category} - {project}</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<p>\r\n									Sau khi nhận được thanh to&aacute;n, hợp đồng dịch vụ mặc nhi&ecirc;n được gia hạn, h&oacute;a đơn VAT sẽ được gửi đến Qu&yacute; kh&aacute;ch trong v&ograve;ng 10 ng&agrave;y l&agrave;m việc.<br />\r\n									<br />\r\n									<strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; kh&aacute;ch!</strong><br />\r\n									<br />\r\n									Tr&acirc;n trọng,<br />\r\n									<br />\r\n									<span style=\"font-size:22px;font-weight:bold;\">TQ Tecom Co., Ltd</span><br />\r\n									&nbsp;</p>\r\n							</td>\r\n						</tr>\r\n						<tr style=\"background:#d7d8dd;height:110px;\">\r\n							<td height=\"100\" style=\"color:#114b89;text-align:center;font-family:Arial;font-size:14px;\">\r\n								<strong>Đ&Acirc;Y L&Agrave; EMAIL TỰ ĐỘNG TỪ HỆ THỐNG</strong><br />\r\n								Qu&yacute; kh&aacute;ch c&oacute; thắc mắc g&igrave; vui l&ograve;ng li&ecirc;n hệ theo số phone v&agrave; email sau:<br />\r\n								Support: Mr. Ho&agrave;n Nam: 0969 36 8855 | Sales: Ms. B&iacute;ch Phương: 0908 727571<br />\r\n								support@tqdesign.vn | info@tqdesign.vn</td>\r\n						</tr>\r\n						<tr align=\"center\" style=\"background:#191d26;height:100px;\">\r\n							<td>\r\n								<a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"logo-tqtecom-footer\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom-footer.png\" style=\"width: 552px; height: 49px;\" /></a></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1, 'thducuit@gmail.com', '2018-05-22 21:00:07', '2018-07-04 03:01:33'),
(3, 'Thông báo Gia hạn Dịch vụ Thành công', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#114b89; margin:auto; min-width:830px; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:90%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"TQ Tecom Logo\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom.png\" style=\"height:110px; margin-left:50px; width:290px\" /></a></td>\r\n					</tr>\r\n					<tr>\r\n						<td>Th&ocirc;ng b&aacute;o gia hạn th&agrave;nh c&ocirc;ng</td>\r\n					</tr>\r\n					<tr>\r\n						<td>K&iacute;nh gửi: {contact} - {customer}</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<p>TQ Tecom ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; Kh&aacute;ch đ&atilde; tin tưởng v&agrave; sử dụng sản phẩm, dịch vụ của ch&uacute;ng t&ocirc;i (TQ Tecom: TQ Design | TheMax) trong thời gian qua.</p>\r\n\r\n						<p><strong>K&Iacute;NH CH&Uacute;C QU&Yacute; KH&Aacute;CH KINH DOANH PH&Aacute;T ĐẠT &amp; THỊNH VƯỢNG</strong></p>\r\n\r\n						<hr />\r\n						<p><strong>TQ Tecom tr&acirc;n trọng th&ocirc;ng b&aacute;o đến Qu&yacute; kh&aacute;ch như sau:</strong></p>\r\n\r\n						<p><strong>Dịch vụ [{category}] [{project}]&nbsp;<span style=\"color:#ff0000; font-size:14px\">[Đ&Atilde; GIA HẠN TH&Agrave;NH C&Ocirc;NG]</span></strong></p>\r\n\r\n						<table style=\"font-family:Arial; font-size:14px; margin-left:30px; width:400px\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\"width:100px\">* Ng&agrave;y gia hạn</td>\r\n									<td>: &nbsp;<strong>&nbsp;<span style=\"color:#ff0000\">{datecreated}</span></strong></td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"width:100px\">* Ng&agrave;y hết hạn</td>\r\n									<td>: &nbsp;&nbsp;<span style=\"color:#ff0000\"><strong>{dateexpired}</strong></span></td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<hr />\r\n						<p><br />\r\n						<strong>C&ocirc;ng ty TNHH C&ocirc;ng nghệ &amp; Truyền th&ocirc;ng Thi&ecirc;n Quang (TQ TECOM)</strong></p>\r\n\r\n						<p><strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; kh&aacute;ch!</strong><br />\r\n						<br />\r\n						Tr&acirc;n trọng,<br />\r\n						<br />\r\n						<strong>TQ Tecom Co., Ltd</strong><br />\r\n						&nbsp;</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:110px; text-align:center\"><strong>Đ&Acirc;Y L&Agrave; EMAIL TỰ ĐỘNG TỪ HỆ THỐNG</strong><br />\r\n						Qu&yacute; kh&aacute;ch c&oacute; thắc mắc g&igrave; vui l&ograve;ng li&ecirc;n hệ theo số phone v&agrave; email sau:<br />\r\n						Support: Mr. Ho&agrave;n Nam: 0969 36 8855 | Sales: Ms. B&iacute;ch Phương: 0908 727571<br />\r\n						support@tqdesign.vn | info@tqdesign.vn</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:100px\"><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"logo-tqtecom-footer\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom-footer.png\" style=\"height:49px; width:552px\" /></a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div>&nbsp;</div>\r\n', 1, NULL, NULL, '2018-07-19 19:09:18', '2018-07-19 19:09:18'),
(4, 'Thông báo tạm ngưng dịch vụ', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#114b89; margin:auto; min-width:830px; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:90%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"TQ Tecom Logo\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom.png\" style=\"height:110px; margin-left:50px; width:290px\" /></a></td>\r\n					</tr>\r\n					<tr>\r\n						<td>Hệ thống CRM - Bộ phận Kỹ thuật TQ Tecom:</td>\r\n					</tr>\r\n					<tr>\r\n						<td>K&iacute;nh gửi: {contact} - {customer}</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<p>TQ Tecom ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; Kh&aacute;ch đ&atilde; tin tưởng v&agrave; sử dụng sản phẩm, dịch vụ của ch&uacute;ng t&ocirc;i (TQ Tecom: TQ Design | TheMax) trong thời gian qua.</p>\r\n\r\n						<p><strong>K&Iacute;NH CH&Uacute;C QU&Yacute; KH&Aacute;CH KINH DOANH PH&Aacute;T ĐẠT &amp; THỊNH VƯỢNG</strong></p>\r\n\r\n						<hr />\r\n						<p><strong>TQ Tecom tr&acirc;n trọng th&ocirc;ng b&aacute;o đến Qu&yacute; kh&aacute;ch như sau:</strong></p>\r\n\r\n						<p><strong>Website [{project}]&nbsp;</strong>đ&atilde; khởi tạo v&agrave; duy tr&igrave; cho giai đoạn chạy thử nghiệm &amp; nghiệm thu từ ng&agrave;y: dd/mm/yyyy đến ng&agrave;y dd/mm/yyyy (01 th&aacute;ng) - <span style=\"color:#ff0000; font-size:14px\"><strong>[Đ&atilde; hết/qu&aacute; thời hạn xx ng&agrave;y.]</strong></span></p>\r\n\r\n						<p><strong>Hệ thống sẽ tự động tạm dừng hoạt động của website trong v&ograve;ng 24h nếu chưa nhận được <span style=\"color:#ff0000; font-size:14px\"><strong>[M&Atilde; GIA HẠN]</strong></span> từ bộ phận kế t&agrave;i ch&iacute;nh / kế to&aacute;n.</strong></p>\r\n\r\n						<hr />\r\n						<p><br />\r\n						<strong><strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; kh&aacute;ch!</strong><br />\r\n						<br />\r\n						Tr&acirc;n trọng,<br />\r\n						<br />\r\n						<strong>TQ Tecom Co., Ltd</strong><br />\r\n						&nbsp;</strong></p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:110px; text-align:center\"><strong>Đ&Acirc;Y L&Agrave; EMAIL TỰ ĐỘNG TỪ HỆ THỐNG, VUI L&Ograve;NG KH&Ocirc;NG REPLY EMAIL N&Agrave;Y</strong><br />\r\n						Qu&yacute; kh&aacute;ch c&oacute; thắc mắc g&igrave; vui l&ograve;ng li&ecirc;n hệ theo số phone v&agrave; email sau:<br />\r\n						Support: Mr. Ho&agrave;n Nam: 0969 36 8855 | Sales: Ms. B&iacute;ch Phương: 0908 727571<br />\r\n						support@tqdesign.vn | info@tqdesign.vn</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:100px\"><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"logo-tqtecom-footer\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom-footer.png\" style=\"height:49px; width:552px\" /></a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div>&nbsp;</div>\r\n', 0, NULL, NULL, '2018-07-19 19:09:58', '2018-07-19 19:09:58'),
(5, 'Thông báo Khởi tạo Dịch vụ Thành công', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#114b89; margin:auto; min-width:830px; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:90%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"TQ Tecom Logo\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom.png\" style=\"height:110px; margin-left:50px; width:290px\" /></a></td>\r\n					</tr>\r\n					<tr>\r\n						<td>Th&ocirc;ng b&aacute;o Khởi tạo Dịch vụ Th&agrave;nh c&ocirc;ng</td>\r\n					</tr>\r\n					<tr>\r\n						<td>K&iacute;nh gửi: {contact} - {customer}</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<p>TQ Tecom ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; Kh&aacute;ch đ&atilde; tin tưởng v&agrave; sử dụng sản phẩm, dịch vụ của ch&uacute;ng t&ocirc;i (TQ Tecom: TQ Design | TheMax) trong thời gian qua.</p>\r\n\r\n						<p><strong>K&Iacute;NH CH&Uacute;C QU&Yacute; KH&Aacute;CH KINH DOANH PH&Aacute;T ĐẠT &amp; THỊNH VƯỢNG</strong></p>\r\n\r\n						<hr />\r\n						<p><strong>TQ Tecom tr&acirc;n trọng th&ocirc;ng b&aacute;o đến Qu&yacute; kh&aacute;ch như sau:</strong></p>\r\n\r\n						<p><strong>Dịch vụ [{category}] [{project}]&nbsp;<span style=\"color:#ff0000; font-size:14px\">[KHỞI TẠO TH&Agrave;NH C&Ocirc;NG]</span></strong></p>\r\n\r\n						<table style=\"font-family:Arial; font-size:14px; margin-left:30px; width:400px\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\"width:100px\">* Ng&agrave;y khởi tạo</td>\r\n									<td>: &nbsp;<strong>&nbsp;<span style=\"color:#ff0000\">{datecreated}</span></strong></td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"width:100px\">* Ng&agrave;y kết th&uacute;c</td>\r\n									<td>: &nbsp;&nbsp;<span style=\"color:#ff0000\"><strong>{dateexpired}</strong></span></td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<hr />\r\n						<p><br />\r\n						<strong>C&ocirc;ng ty TNHH C&ocirc;ng nghệ &amp; Truyền th&ocirc;ng Thi&ecirc;n Quang (TQ TECOM)</strong></p>\r\n\r\n						<p><strong>Ch&acirc;n th&agrave;nh c&aacute;m ơn Qu&yacute; kh&aacute;ch!</strong><br />\r\n						<br />\r\n						Tr&acirc;n trọng,<br />\r\n						<br />\r\n						<strong>TQ Tecom Co., Ltd</strong><br />\r\n						&nbsp;</p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:110px; text-align:center\"><strong>Đ&Acirc;Y L&Agrave; EMAIL TỰ ĐỘNG TỪ HỆ THỐNG</strong><br />\r\n						Qu&yacute; kh&aacute;ch c&oacute; thắc mắc g&igrave; vui l&ograve;ng li&ecirc;n hệ theo số phone v&agrave; email sau:<br />\r\n						Support: Mr. Ho&agrave;n Nam: 0969 36 8855 | Sales: Ms. B&iacute;ch Phương: 0908 727571<br />\r\n						support@tqdesign.vn | info@tqdesign.vn</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"height:100px\"><a href=\"http://www.tqdesign.vn/home.html\" target=\"_blank\"><img alt=\"logo-tqtecom-footer\" src=\"http://alert.tqdesign.vn/data/upload/editor/images/logo-tqtecom-footer.png\" style=\"height:49px; width:552px\" /></a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div>&nbsp;</div>\r\n', 0, NULL, NULL, '2018-07-19 19:10:50', '2018-07-19 19:10:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Duc Nguyen Thanh', 'thducuit@gmail.com', '$2y$10$m.U0h4OiV70EkyIoce7SROfd/aqjM5iafZrBUjVrJ2NUIOop2C1zG', 'Gs4HE45Uez6nPaAXE6vzeh7zUPMswlADCRmYknYms4wgZkr16gNIPAtwpSCS', '2018-05-10 01:36:56', '2018-05-10 21:10:41'),
(2, 'administrator', 'support@tqdesign.vn', '$2y$10$Jicwt54vRuc2w1AloG/U5OFRHt/lzWsAdd08pMLEeYzHnajd.ByMW', 'cxGzw2KtXPB8UXX8XEWvBL3KxIiO8oqDf3zJEBmO1rmdPV81mJG2IZHmC2OH', '2018-05-18 02:09:52', '2018-07-19 19:05:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mail_tasks`
--
ALTER TABLE `mail_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT cho bảng `mail_tasks`
--
ALTER TABLE `mail_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `management`
--
ALTER TABLE `management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
