-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2026 at 06:06 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `price_range` varchar(50) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`id`, `name`, `description`, `location`, `phone_number`, `map_link`, `price_range`, `cover_image`, `category_id`, `created_at`) VALUES
(1, 'สถานีเกษตรหลวงอ่างขาง', 'โครงการหลวงแห่งแรกของไทย ชมดอกไม้เมืองหนาว ซากุระเมืองไทย (นางพญาเสือโคร่ง) และแปลงไร่ชาท่ามกลางหุบเขา อากาศเย็นตลอดปี', 'อ.ฝาง จ.เชียงใหม่', NULL, NULL, '50 บาท', 'angkhang.jpg', 1, '2026-02-03 02:52:44'),
(2, 'อุทยานแห่งชาติดอยผ้าห่มปก (บ่อน้ำพุร้อนฝาง)', 'บ่อน้ำพุร้อนธรรมชาติที่มีน้ำพุ่งสูง มีกิจกรรมต้มไข่ อาบน้ำแร่ และเส้นทางเดินศึกษาธรรมชาติ', 'อ.ฝาง จ.เชียงใหม่', NULL, NULL, '50-100 บาท', 'fang_hotspring.jpg', 1, '2026-02-03 02:52:44'),
(3, 'วัดท่าตอน', 'วัดสวยที่ตั้งเรียงรายตามไหล่เขา มีเจดีย์แก้วแก้วเก้าชั้น สามารถมองเห็นวิวแม่น้ำกกและชุมชนแม่อายได้แบบพาโนรามา', 'อ.แม่อาย จ.เชียงใหม่', NULL, NULL, 'ฟรี', 'wat_thaton.jpg', 2, '2026-02-03 02:52:44'),
(4, 'สวนส้มธนาธร (สวน 8)', 'สวนส้มขนาดใหญ่ที่มีชื่อเสียง มีบริการรถรางชมสวน ทิวทัศน์สวยงามเหมาะกับการถ่ายรูป', 'อ.แม่อาย จ.เชียงใหม่', NULL, NULL, '40 บาท', 'thanathon_orchard.jpg', 1, '2026-02-03 02:52:44'),
(5, 'ดอยปู่หมื่น', 'หมู่บ้านชาวลาหู่ แหล่งปลูกชาอัสสัมและกาแฟชั้นดี บรรยากาศเงียบสงบ สัมผัสวิถีชีวิตชนเผ่า', 'อ.แม่อาย จ.เชียงใหม่', NULL, NULL, 'ฟรี', 'doi_pu_muen.jpg', 1, '2026-02-03 02:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'ธรรมชาติ'),
(2, 'วัดและสถานที่ทางศาสนา'),
(3, 'คาเฟ่และร้านอาหาร');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$C8.c1y6w3.5.i6.c.1.0.uS1.2.3.4', 'admin@localtravel.com', 'admin', '2026-02-03 02:10:57'),
(3, 'user1', '$2y$10$tt/gYHYCiTYd8hBnDHnOJuz0yV9fcaNINilVM0UX4RfdHlLdTMvki', 'user1@gmail.com', 'user', '2026-02-03 02:19:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attractions`
--
ALTER TABLE `attractions`
  ADD CONSTRAINT `attractions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
