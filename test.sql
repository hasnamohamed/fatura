-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 03:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `price`) VALUES
(8, 'Daily', 97),
(9, 'Weekly', 887),
(10, 'Monthly', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `user_id`, `date`) VALUES
(8, 8, '23 $', '        Aliquam esse aliquip    ', ' 46 ', '2021-07-18 12:34:54'),
(9, 9, '54 $', '                Sit iusto officia al        ', ' 46 ', '2021-07-21 07:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `d` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `m` int(11) NOT NULL DEFAULT 0,
  `credit` int(11) NOT NULL DEFAULT 0,
  `cash` int(11) NOT NULL DEFAULT 0,
  `credit_name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `d`, `w`, `m`, `credit`, `cash`, `credit_name`, `address`) VALUES
(46, 'hasnaa', 'Hasnaamohammed538@gmail.com', '$2y$10$2ioyTeHeNhcb0cGokn4Te.tjyAupmGhcElq8YShGGA9JT8udB7JO6', 'admin', 1, 0, 0, 1, 0, '', ''),
(47, 'xupyfy', 'hhh@gmail.com', '$2y$10$Eo6sfpNcM6qFkul79KyuyOC7zJxz2S8B4yjFsa7Cg8tIjno1lZHr.', 'user', 0, 0, 0, 0, 0, '', ''),
(48, 'hasnaa', 'kkk@gmail.com', '$2y$10$zymdQ7/7aOEVDxKouWynxecIDQ/CcHog7qwx0UYrSFD2GN43SAJ.a', 'user', 1, 0, 0, 0, 0, '', ''),
(49, 'xofeluniw', 'laqev@mailinator.com', '$2y$10$85d0sFpqB7GqtJ..iO5Q5eVlv1skPoPHxlI3VPh7noEgTInE/ImDO', 'user', 0, 1, 0, 0, 0, '', ''),
(50, 'foqunikux', 'gebawe@mailinator.com', '$2y$10$mUQFEs5LIc0Fhe5CTqPqCu2lIKIWSea10rQaBnvltNnZoNEC2namG', 'user', 0, 0, 1, 0, 0, '', ''),
(51, 'wedyma', 'banivixagy@mailinator.com', '$2y$10$NKkekUOtrKqLK7jmWA2rZeldT5hP4fJoRUEA.jshQ2dDEDW6MkZAW', 'user', 1, 0, 0, 0, 0, '', ''),
(52, 'cyhumibebu', 'lirusyg@mailinator.com', '$2y$10$G.Ow8ON9Dwos.t.porXYw.YPD/cKEBmPHGEmpT5sEZB2iQMVESAKC', 'user', 1, 0, 0, 0, 0, '', ''),
(53, 'hasnaa', 'ttt@gmail.com', '$2y$10$9A6Z3ev7orTTad2sR4PGf.4Cr5x/XYzpP2uKuXhqdfifASVjMluZi', 'user', 1, 0, 0, 1, 0, '', ''),
(56, 'jecexok', 'vafabyw@mailinator.com', '$2y$10$L3T/3KXSpTFBTx44Os0Hveo0cl4RKaeWA9.owyVmSorV06iIYNoXW', 'user', 0, 0, 0, 1, 0, '', ''),
(57, 'tesepuvuz', 'ruluhodicy@mailinator.com', '$2y$10$z/ol8IS2k.oSiJinClmnru.YMo9BpNM9XUBAfUt48Jg9Fj3GmRPG2', 'user', 0, 0, 0, 0, 1, '', ''),
(58, 'suqufi', 'kupazoqo@mailinator.com', '$2y$10$czGAqFoMkdQBWVH5Aaz7z.Jw1yb7KpOKfCDRWPWsv2lquf/RE6Hoe', 'user', 0, 0, 1, 0, 1, '', ''),
(59, 'hasnaa', 'iii@gmail.com', '$2y$10$4NDVal2DKXXv7ersnHcm0OnostrKVibIx94UtvmT1d21O0r6J5oae', 'user', 0, 1, 0, 0, 1, '', ''),
(60, 'cyqezare', 'gyniw@mailinator.com', '$2y$10$BVuN2ER6yopXUzlb3V3D1.hr7yr6GR6UaiPqAbvw4.9PayYGsnFTC', 'user', 1, 0, 0, 0, 1, '', ''),
(61, 'pihatyfug', 'zivufo@mailinator.com', '$2y$10$DzW5sDBKOcpvpTK0FAK5PeOSh1i03R88HL1O4o6Q0wBZRBHMT2/e2', 'user', 1, 0, 0, 1, 0, '', ''),
(62, 'koduboj', 'qepirisi@mailinator.com', '$2y$10$AlVC26TB7/HZLH2JjtVy4eRXGcVixzaeuvWadwDw88f5s0aFyoHgW', 'user', 0, 0, 1, 0, 1, '', ''),
(63, 'kynemy', 'myjeba@mailinator.com', '$2y$10$DsR4cYAfR2ddjchREKb.v.hNVA.gRd9aUSLGiZ1OggvKVT9Om8QPm', 'user', 0, 1, 0, 1, 0, '', ''),
(64, 'wugonaqi', 'nugaty@mailinator.com', '$2y$10$.2BP98hcbKzDxUsaOyIMWulu0nR7g/ZBBfNyuKXTxRWuOVJjHRx/u', 'user', 1, 0, 0, 0, 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
