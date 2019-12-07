-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2019 at 06:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Akreditasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditasi`
--

CREATE TABLE `akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `id_valid` int(11) NOT NULL,
  `npsn` varchar(128) NOT NULL,
  `satuan_pendidikan` varchar(128) NOT NULL,
  `program` varchar(128) NOT NULL,
  `Kab_Kota` varchar(128) NOT NULL,
  `status_akreditasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akreditasi`
--

INSERT INTO `akreditasi` (`id_akreditasi`, `id_valid`, `npsn`, `satuan_pendidikan`, `program`, `Kab_Kota`, `status_akreditasi`) VALUES
(1, 9, '11651103442', 'Taman Kanak-Kanak', 'PAUD', 'Kota Pekanbaru', 'A'),
(2, 1, '323', 'Taman Kanak - Kanak', 'paud', 'bengkalis', 'A'),
(3, 1, '6766767', 'hhjg', 'vjjq', 'vhh', 'kvkvj'),
(4, 9, 'jgfjvfh', 'hxfx', 'hxd', 'hxd', 'xh');

-- --------------------------------------------------------

--
-- Table structure for table `asesor`
--

CREATE TABLE `asesor` (
  `id` int(11) NOT NULL,
  `nia` bigint(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `rumpun` varchar(128) NOT NULL,
  `kab_kota` varchar(128) NOT NULL,
  `status_penugasan` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asesor`
--

INSERT INTO `asesor` (`id`, `nia`, `nama`, `rumpun`, `kab_kota`, `status_penugasan`, `keterangan`) VALUES
(4, 1408201910120020, 'Ayu Rahayu', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', 'siap di tugaskan'),
(6, 1408201910120017, 'Ervina', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(7, 1408201910120016, 'Frasanti Sundari', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(8, 1408201910120018, 'Gusmayenti', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(9, 1408201910120021, 'Ismatul Maula, M.Pd', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(10, 1408201910110002, 'Khairul Azan', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(11, 1408201910110001, 'Khairul Khazam', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(12, 1305201710123100, 'Nova Wahyuni, S.Pd.', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(13, 1408201610121596, 'Nurhaida Selian, M.Pd', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(15, 1408201710122897, 'Sri Wahyuni, M.Pd.', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(16, 1408201910120019, 'Syafrida', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(17, 1408201610121593, 'Terry Eky Yosinda, S.Si', 'PAUD', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(18, 1408201910310001, 'Rahayudin Manurung', 'PKBM', 'Kab. Bengkalis', 'bisa ditugaskan', ''),
(19, 1403201710122216, 'Ernani Sutra, S.Sos.', 'PAUD', 'Kab. Indragiri Hilir', 'bisa ditugaskan', 'bisa ditugaskan');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_valid`
--

CREATE TABLE `tahun_valid` (
  `id` int(11) NOT NULL,
  `tahun` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_valid`
--

INSERT INTO `tahun_valid` (`id`, `tahun`) VALUES
(4, '2016'),
(8, '2017'),
(9, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Muhammad Ardhiyansyah', 'muhammadardhiyansyah16@gmail.com', 'download1.jpeg', '$2y$10$fAzF148fJZcNSD/CuN193.f8WC7Fkp.tRyD5DnMpEEK6iWyDjlBA.', 1, 1, 1573723351),
(6, 'Reza Furnama', 'keriting@gmail.com', 'download.jpeg', '$2y$10$lfEXyrw5IVtZKo5Qiqozj.hwd7YSWcTmmZPbFTQqsaeuO0GANeyme', 2, 1, 1573786022),
(9, 'kurniado', 'kurniado@gmail.com', '3.jpg', '$2y$10$oMvVLv0D2q2PmbPdUI6zWelfjKy.Ua/7D4A1yU578LrUU1j7N.Uw2', 2, 1, 1574352012);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(3, 2, 2),
(10, 1, 1),
(12, 1, 2),
(17, 1, 4),
(18, 1, 5),
(19, 2, 5),
(20, 2, 4),
(22, 1, 6),
(23, 1, 7),
(24, 2, 6),
(25, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Asesor'),
(6, 'Akreditasi'),
(7, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 4, 'Asesor', 'asesor/asesor', 'fas fa-fw fa-user-tie', 1),
(21, 6, 'TerAkreditasi', 'akreditasi', 'fas fa-fw fa-user-tie', 1),
(22, 7, 'History', 'history', 'fas fa-fw fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `id` int(11) NOT NULL,
  `validasi` varchar(128) NOT NULL,
  `tahun_id` varchar(128) NOT NULL,
  `no_sk` varchar(128) NOT NULL,
  `tgl_valid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`id`, `validasi`, `tahun_id`, `no_sk`, `tgl_valid`) VALUES
(1, 'validasi 1', '4', 'SK 123', '2019-03-14'),
(9, 'validasi 2', '4', 'sk 124', '2019-12-20'),
(20, 'validasi 3', '4', 'sk 125', '2019-12-11'),
(23, 'validasi 1', '8', 'sk', '0000-00-00'),
(28, 'llkkl', '8', 'hkjh', '0000-00-00'),
(29, 'validasi 3', '9', 'sk', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD PRIMARY KEY (`id_akreditasi`);

--
-- Indexes for table `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_valid`
--
ALTER TABLE `tahun_valid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditasi`
--
ALTER TABLE `akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tahun_valid`
--
ALTER TABLE `tahun_valid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
