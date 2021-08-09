-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2021 at 11:11 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.2.34-23+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting-rtrw`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int NOT NULL,
  `no_kandidat` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `no_kandidat`, `nama`, `visi`, `misi`, `image`) VALUES
(4, 4, 'Magna voluptatem ci', 'Consequatur quidem', 'Quae soluta in elige', 'kades-21.png'),
(5, 5, 'Duis magni aut itaqu', 'Est ratione magni et', 'Explicabo Illum et', 'kades-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `image`, `password`, `role_id`) VALUES
(13, 'Administrator', 'admin', 'foto.jpeg', 'admin', 1),
(41, 'Vel libero ea impedi', 'velliberoeaimpedi', 'default.jpg', NULL, 2),
(42, 'Dolores ad eos nost', 'doloresadeosnost', 'default.jpg', NULL, 2),
(43, 'Ab ea quo in deserun', 'abeaquoindeserun', 'default.jpg', NULL, 3),
(44, 'Consequuntur aut omn', 'consequunturautomn', 'default.jpg', NULL, 2),
(45, 'Illo exercitation ei', 'illoexercitationei', 'default.jpg', NULL, 2),
(46, 'Enim est consequuntu', 'enimestconsequuntu', 'default.jpg', NULL, 2),
(47, 'Est doloribus ut pro', 'estdoloribusutpro', 'default.jpg', NULL, 2),
(48, 'Excepteur voluptates', 'excepteurvoluptates', 'default.jpg', NULL, 2),
(49, 'Repellendus Invento', 'repellendusinvento', 'default.jpg', NULL, 2),
(50, 'Vel qui magni iusto ', 'velquimagniiusto', 'default.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` int NOT NULL,
  `nik` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `vote_status` int DEFAULT '0',
  `waktu_pemilihan` datetime DEFAULT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `nik`, `nama_lengkap`, `ttl`, `jenis_kelamin`, `alamat`, `pekerjaan`, `vote_status`, `waktu_pemilihan`, `rt`, `rw`) VALUES
(41, 93, 'Vel libero ea impedi', 'Ut magna earum quibu', 'laki-laki', 'Debitis quia qui har', 'Facere consequatur ', 1, NULL, '66', '43'),
(42, 98, 'Dolores ad eos nost', 'Asperiores et labore', 'laki-laki', 'Ea ut quos voluptate', 'Illo non cillum even', 1, '2021-08-08 21:35:32', '16', '19'),
(44, 78, 'Consequuntur aut omn', 'Ut ut et placeat ve', 'perempuan', 'Cumque neque ad prae', 'Aliqua Aut quis ull', 1, NULL, '20', '58'),
(45, 96, 'Illo exercitation ei', 'Quia consequat Do v', 'perempuan', 'Odio aut ab est nemo', 'Et ullamco lorem dol', 1, '2021-08-09 20:10:55', '1', '4'),
(46, 89, 'Enim est consequuntu', 'Adipisicing deserunt', 'perempuan', 'Vitae deleniti aliqu', 'Et mollit qui incidu', 1, '2021-08-09 20:09:34', '001', '002'),
(47, 29, 'Est doloribus ut pro', 'Totam enim nostrum s', 'laki-laki', 'Illo est sapiente i', 'Quas totam dolor fac', 1, '2021-08-09 20:15:45', '38', '25'),
(48, 38, 'Excepteur voluptates', 'Tempor excepturi ut ', 'perempuan', 'Nostrud qui accusant', 'Tempora et aliquip t', 1, '2021-08-09 20:24:35', '87', '25'),
(49, 59, 'Repellendus Invento', 'Consequatur In cons', 'laki-laki', 'In qui et amet accu', 'Eius nihil aliqua L', 1, '2021-08-09 21:50:20', '91', '56'),
(50, 99, 'Vel qui magni iusto ', 'Dolor pariatur Quae', 'perempuan', 'Laborum aut ea aliqu', 'Ullamco est irure re', 1, '2021-08-09 21:52:05', '14', '22');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Vote'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(4, 'Kandidat');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(8, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 3, 'Kelola Kandidat', 'kandidat', 'fas fa-user', 1),
(10, 2, 'Pemilihan', 'pemilihan', 'fas fa-comments', 1),
(11, 3, 'Kelola User', 'kelola-user', 'fas fa-fw fa-users', 1),
(12, 3, 'Kelola Panitia', 'kelola-panitia', 'fas fa-fw fa-user', 0),
(13, 2, 'Laporan', 'kelola-laporan', 'fas fa-fw fa-file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `pilihan` int NOT NULL,
  `periode` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `user_id`, `pilihan`, `periode`) VALUES
(3, 42, 5, 2021),
(4, 46, 5, 2021),
(5, 45, 4, 2021),
(6, 47, 5, 2021),
(7, 48, 4, 2021),
(8, 49, 5, 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
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
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
