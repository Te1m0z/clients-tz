-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 16, 2023 at 12:29 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clients_tz`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `parent_id`, `title`, `description`) VALUES
(18, NULL, 'Ultrices dui sapien eget mi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim. Purus ut faucibus pulvinar elementum integer enim. Quis lectus nulla at volutpat. Etiam erat velit scelerisque in dictum. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Dictum at tempor commodo ullamcorper a lacus. Pretium aenean pharetra magna ac placerat. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Facilisis magna etiam tempor orci. Arcu non sodales neque sodales ut etiam sit amet nisl. Scelerisque viverra mauris in aliquam sem. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae. Eu tincidunt tortor aliquam nulla facilisi. Porttitor eget dolor morbi non.'),
(19, NULL, 'Eget nunc lobortis mattis aliquam faucibus.', 'Lobortis feugiat vivamus at augue. Feugiat nisl pretium fusce id velit ut tortor pretium viverra. Ut sem nulla pharetra diam. Orci nulla pellentesque dignissim enim sit amet venenatis. Sit amet justo donec enim diam vulputate ut pharetra.'),
(20, NULL, 'Ullamcorper sit amet risus nullam eget felis eget.', ''),
(22, NULL, 'Nunc.', 'hello'),
(23, NULL, 'Тест главный пост', 'тест описание 222'),
(24, 18, 'дочерний элемент 1', ''),
(25, 18, 'дочерний элемент 2', ''),
(26, 18, 'дочерний элемент 3', ''),
(27, 24, 'дочерний элемент 1.1', ''),
(28, 24, 'дочерний элемент 1.2', ''),
(29, 22, 'дочерний элемент 1', ''),
(30, 22, 'дочерний элемент 111', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'ee95a16d763ab0d26ee62c53056df928');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `records` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
