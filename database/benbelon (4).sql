-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2024 at 07:57 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benbelon`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` enum('bank','credit_card','cash') NOT NULL DEFAULT 'bank',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `balance`, `type`, `created_at`, `updated_at`) VALUES
(1, 'HDFC Bank', '5000.00', 'bank', '2024-01-27 04:37:49', '2024-02-01 05:22:53'),
(9, 'Federal Bank - 6070', '15000.00', 'bank', '2024-02-01 05:33:08', '2024-02-01 05:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `month`, `year`, `category_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 2024, 1, '90000.00', '2024-02-08 07:30:02', '2024-02-08 07:30:02'),
(3, 2, 2024, 1, '90000.00', '2024-02-08 07:37:46', '2024-02-08 07:37:46'),
(4, 2, 2024, 2, '10000.00', '2024-02-08 07:38:04', '2024-02-08 07:38:04'),
(5, 2, 2024, 8, '1000.00', '2024-02-08 07:38:04', '2024-02-08 07:38:23'),
(6, 2, 2024, 10, '1000.00', '2024-02-08 07:38:04', '2024-02-08 07:38:23'),
(7, 2, 2024, 9, '1500.00', '2024-02-08 07:38:04', '2024-02-08 07:38:23'),
(8, 2, 2024, 3, '1500.00', '2024-02-08 07:38:04', '2024-02-08 07:38:23'),
(9, 2, 2024, 4, '0.00', '2024-02-08 07:38:04', '2024-02-08 07:38:04'),
(10, 2, 2024, 6, '0.00', '2024-02-08 07:38:04', '2024-02-08 07:38:04'),
(11, 2, 2024, 5, '0.00', '2024-02-08 07:38:04', '2024-02-08 07:38:04'),
(12, 2, 2024, 7, '0.00', '2024-02-08 07:38:04', '2024-02-08 07:38:04'),
(13, 3, 2024, 1, '100000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(14, 3, 2024, 2, '11000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(15, 3, 2024, 8, '2000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(16, 3, 2024, 10, '1000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(17, 3, 2024, 9, '2000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(18, 3, 2024, 3, '500.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(19, 3, 2024, 4, '500.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(20, 3, 2024, 6, '3000.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(21, 3, 2024, 5, '300.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50'),
(22, 3, 2024, 7, '500.00', '2024-02-08 07:49:50', '2024-02-08 07:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `type` enum('income','expense') NOT NULL DEFAULT 'expense',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Salary', NULL, 'income', '2024-01-27 05:59:26', '2024-01-27 05:59:26'),
(2, 'Grocery', NULL, 'expense', '2024-01-27 06:02:56', '2024-01-27 06:02:56'),
(3, 'Medical', NULL, 'expense', '2024-01-27 06:03:05', '2024-01-27 06:03:05'),
(4, 'Medicine', 3, 'expense', '2024-01-27 06:03:16', '2024-01-27 06:03:16'),
(5, 'Diesel', 6, 'expense', '2024-01-27 16:05:13', '2024-01-27 16:05:34'),
(6, 'Travel', NULL, 'expense', '2024-01-27 16:05:28', '2024-01-27 16:05:28'),
(7, 'Petrol', 6, 'expense', '2024-01-27 16:05:48', '2024-01-27 16:05:48'),
(8, 'Vegetables', 2, 'expense', '2024-01-27 18:00:50', '2024-01-27 18:00:50'),
(9, 'Milk', 2, 'expense', '2024-01-27 18:01:26', '2024-01-27 18:01:26'),
(10, 'Fruits', 8, 'expense', '2024-01-27 18:03:53', '2024-01-27 18:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `category_id` int(10) DEFAULT NULL,
  `account_from` int(10) DEFAULT NULL,
  `account_to` int(10) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('income','expense','transfer') NOT NULL,
  `happened_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `title`, `description`, `category_id`, `account_from`, `account_to`, `amount`, `type`, `happened_at`, `created_at`, `updated_at`) VALUES
(1, 'Salary', 'testing the function', 1, NULL, 1, '95000.00', 'income', '2024-01-10', '2024-01-28 18:04:59', '2024-01-29 10:54:27'),
(6, 'Milk', 'test', 9, 1, NULL, '56.00', 'expense', '2024-01-16', '2024-01-29 14:00:45', '2024-01-29 14:00:45'),
(5, 'SDFGdsf', 'sdfgsdfg', 1, NULL, 1, '900.00', 'income', '2024-01-10', '2024-01-29 12:53:45', '2024-01-29 12:54:01'),
(7, 'Vegetables', 'test', 8, 1, NULL, '450.00', 'expense', '2024-01-16', '2024-01-29 14:39:48', '2024-01-29 14:39:48'),
(8, 'Diesel', 'Test', 5, 1, NULL, '1050.00', 'expense', '2024-01-16', '2024-01-29 14:54:57', '2024-01-29 14:54:57'),
(9, 'Test', 'test', 2, 1, NULL, '500.00', 'expense', '2024-01-17', '2024-01-29 14:56:08', '2024-01-29 14:56:08'),
(10, 'Test', 'test', NULL, 1, 1, '8000.00', 'transfer', '2024-01-16', '2024-01-29 15:30:02', '2024-01-29 15:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `happened_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` enum('admin','editor','superadmin','user') NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
