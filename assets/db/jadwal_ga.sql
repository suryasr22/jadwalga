-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 05:26 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'admin', 'gaadaemail@gmail.com');

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
(2, 'surya', '123', 'asas@asd.com');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_hari`
--

CREATE TABLE `dosen_hari` (
  `id_dosen` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_dosen` int(5) NOT NULL,
  `id_hari` int(5) NOT NULL,
  `id_jam` int(5) NOT NULL,
  `id_matkul` int(5) NOT NULL
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_dosen`
--

CREATE TABLE `login_dosen` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_dosen`
--

INSERT INTO `login_dosen` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `makul_dosen`
--

CREATE TABLE `makul_dosen` (
  `id_makul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
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
  `id` varchar(10) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

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
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_dosen`
--

CREATE TABLE `user_dosen` (
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `dosen_hari`
--
ALTER TABLE `dosen_hari`
  ADD PRIMARY KEY (`id_dosen`,`id_hari`);

--
-- Indexes for table `dosen_jam`
--
ALTER TABLE `dosen_jam`
  ADD PRIMARY KEY (`id_dosen`,`id_jam`);

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
  ADD PRIMARY KEY (`id_dosen`,`id_hari`,`id_jam`,`id_matkul`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_dosen`
--
ALTER TABLE `login_dosen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `makul_dosen`
--
ALTER TABLE `makul_dosen`
  ADD PRIMARY KEY (`id_makul`,`id_dosen`,`id_kelas`);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_dosen`
--
ALTER TABLE `login_dosen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
