-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 05:30 PM
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
-- Database: `cities`
--

-- --------------------------------------------------------

--
-- Table structure for table `kolhapur`
--

CREATE TABLE `kolhapur` (
  `area_name` varchar(100) NOT NULL,
  `service1_head` varchar(100) NOT NULL,
  `service2_head` varchar(100) NOT NULL,
  `service3_head` varchar(100) NOT NULL,
  `service4_head` varchar(100) NOT NULL,
  `service_discription` varchar(5000) NOT NULL,
  `date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `service_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kolhapur`
--

INSERT INTO `kolhapur` (`area_name`, `service1_head`, `service2_head`, `service3_head`, `service4_head`, `service_discription`, `date`, `service_title`) VALUES
('phulewadi', 'CANCER', 'HEART DISEASE', 'LUNGS DISEASE', 'DENGU', 'very dangerious....', '0000-00-00 00:00:00.00000', 'title here'),
('phulewadi', 'CANCER', 'HEART DISEASE', 'LUNGS DISEASE', 'DENGU', 'very dangerious....', '0000-00-00 00:00:00.00000', 'title here');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
