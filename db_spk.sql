-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 08:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlit`
--

CREATE TABLE `atlit` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmpt_lhr` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(2550) NOT NULL,
  `foto` text NOT NULL DEFAULT '\'default.png\'',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atlit`
--

INSERT INTO `atlit` (`id`, `nik`, `nama`, `tmpt_lhr`, `tgl_lhr`, `jk`, `alamat`, `foto`, `timestamp`) VALUES
(1611396403, '2482346234123254', 'asasfashjkdfajsghhjkasfhjk', 'asfdadkladjkladjklajkl', '2021-01-23', 'L', 'asdfasfhjkbsghjkfaaghjksfhj kashjkhajksf hjka', '1611396403_.jpg', '2021-01-23 10:06:43'),
(1611441199, '324234234234234', 'dfsdfg sdgfd fj fhgj ', 'dfg fgh fj hgj fghjgf', '2021-01-24', 'P', 'fgh jgh ff ghj gfhj ghj', '1611441199_.png', '2021-01-23 22:33:19'),
(1641395989, '2482346234123213', 'asasfashjkdfajsghhjkasfhjk', 'asfdadkladjkladjklajkl', '2021-01-23', 'L', 'asdfasfhjkbsghjkfaaghjksfhj kashjkhajksf hjka', '1611395989_.jpg', '2021-01-24 06:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `kf`
--

CREATE TABLE `kf` (
  `id` int(11) NOT NULL,
  `kf1` tinyint(3) NOT NULL,
  `kf2` tinyint(3) NOT NULL,
  `kf3` tinyint(3) NOT NULL,
  `kf4` tinyint(3) NOT NULL,
  `kf5` tinyint(3) NOT NULL,
  `kf6` tinyint(3) NOT NULL,
  `kf7` tinyint(3) NOT NULL,
  `kf8` tinyint(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_atlit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kf`
--

INSERT INTO `kf` (`id`, `kf1`, `kf2`, `kf3`, `kf4`, `kf5`, `kf6`, `kf7`, `kf8`, `timestamp`, `id_atlit`) VALUES
(2, 5, 4, 5, 1, 4, 1, 1, 5, '2021-01-24 06:17:56', 1641395989),
(5, 5, 4, 5, 1, 4, 1, 1, 5, '2021-01-23 10:06:43', 1611396403),
(6, 1, 1, 2, 2, 1, 1, 2, 2, '2021-01-23 22:33:19', 1611441199);

-- --------------------------------------------------------

--
-- Table structure for table `kt`
--

CREATE TABLE `kt` (
  `id` int(11) NOT NULL,
  `kt1` tinyint(4) NOT NULL,
  `kt2` tinyint(4) NOT NULL,
  `kt3` tinyint(4) NOT NULL,
  `kt4` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_atlit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kt`
--

INSERT INTO `kt` (`id`, `kt1`, `kt2`, `kt3`, `kt4`, `timestamp`, `id_atlit`) VALUES
(2, 5, 4, 3, 3, '2021-01-24 06:18:01', 1641395989),
(5, 5, 4, 3, 3, '2021-01-23 10:06:43', 1611396403),
(6, 2, 2, 2, 1, '2021-01-23 22:33:19', 1611441199);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `jenis` enum('3','1','0') NOT NULL COMMENT '3 = Nasional\r\n1 = Daerah',
  `keterangan` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_atlit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `jenis`, `keterangan`, `file`, `timestamp`, `id_atlit`) VALUES
(1, '3', 'rghsdfgsdfh', '1611396403_prestasi.jpg', '2021-01-23 11:04:44', 1611396403),
(2, '1', 'df fdgh gfdhfg', '1611441199_prestasi.png', '2021-01-23 22:33:19', 1611441199);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(3) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `akses` enum('0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `akses`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atlit`
--
ALTER TABLE `atlit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kf`
--
ALTER TABLE `kf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt`
--
ALTER TABLE `kt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atlit`
--
ALTER TABLE `atlit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1641395990;

--
-- AUTO_INCREMENT for table `kf`
--
ALTER TABLE `kf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kt`
--
ALTER TABLE `kt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
