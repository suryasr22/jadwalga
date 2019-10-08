-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 07:00 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_ga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `admin_nama` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_nama`, `admin_email`) VALUES
(1, 'admin', 'gaadaemail@gmail.com'),
(2, 'admin2', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nip` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `email`) VALUES
(3, 'asep', '1234', 'asep@gmail.com'),
(9, 'surya', '1234', 'surya@gmail.com'),
(10, 'jason', '090909', 'jason@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_jam`
--

CREATE TABLE `dosen_jam` (
  `id_dosen` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_makul`
--

CREATE TABLE `dosen_makul` (
  `id_dosen` int(11) NOT NULL,
  `id_makul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_makul`
--

INSERT INTO `dosen_makul` (`id_dosen`, `id_makul`) VALUES
(3, 1),
(3, 2),
(3, 3),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_ruang`
--

CREATE TABLE `dosen_ruang` (
  `id_dosen` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(10) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jam` int(11) NOT NULL,
  `id_makul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makul_ruang`
--

CREATE TABLE `makul_ruang` (
  `id_makul` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`, `semester`, `sks`) VALUES
(1, 'bahasa inggris', 1, 2),
(2, 'algoritma genetika', 5, 3),
(3, 'bahasa indonesia', 1, 2),
(4, 'jaringan syaraf tiruan', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama`) VALUES
(1, 'C1TI');

-- --------------------------------------------------------

--
-- Table structure for table `semester_ruang`
--

CREATE TABLE `semester_ruang` (
  `id_semester` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'asep', 'dc855efb0dc7476760afaa1b281665f1', 2),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1),
(9, 'surya', 'aff8fbcbf1363cd7edc85a1e11391173', 2),
(10, 'jason', '2b877b4b825b48a9a0950dd5bd1f264d', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_user`, `id_admin`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_dosen`
--

CREATE TABLE `user_dosen` (
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_dosen`
--

INSERT INTO `user_dosen` (`id_user`, `id_dosen`) VALUES
(2, 3),
(6, 6),
(9, 9),
(10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen_jam`
--
ALTER TABLE `dosen_jam`
  ADD PRIMARY KEY (`id_dosen`,`id_jam`);

--
-- Indexes for table `dosen_makul`
--
ALTER TABLE `dosen_makul`
  ADD PRIMARY KEY (`id_dosen`,`id_makul`);

--
-- Indexes for table `dosen_ruang`
--
ALTER TABLE `dosen_ruang`
  ADD PRIMARY KEY (`id_dosen`,`id_ruang`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD UNIQUE KEY `id_jam` (`id_jam`),
  ADD UNIQUE KEY `id_makul` (`id_makul`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makul_ruang`
--
ALTER TABLE `makul_ruang`
  ADD PRIMARY KEY (`id_makul`,`id_ruang`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_ruang`
--
ALTER TABLE `semester_ruang`
  ADD PRIMARY KEY (`id_semester`,`id_ruang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `user_dosen`
--
ALTER TABLE `user_dosen`
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_dosen` (`id_dosen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
