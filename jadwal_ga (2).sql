-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 07:18 PM
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
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`) VALUES
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
(11, 'Dwi Viora', '1234', 'dwi@lecturer.unri.ac.id'),
(12, 'Yen Norahma Yeni', '1234', 'yen@lecturer.unri.ac.id'),
(13, 'Muhammad Syafii, S.Pd, M.Si', '1234', 'syafii@lecturer.unri.ac.id'),
(14, 'Kingkel Panah Grosman', '1234', 'kingkel@lecturer.unri.ac.id'),
(15, 'Dra. Maimunah, M.Si', '1234', 'maimunah@lecturer.unri.ac.id'),
(16, 'Feranita, S.T, M.T.', '1234', 'feranita@lecturer.unri.ac.id'),
(17, 'Syamsurizal, S.Pd, M.H', '1234', 'syamsurizal@lecturer.unri.ac.id'),
(18, 'Yuliantoro, M.Pd', '1234', 'yuliantoro@lecturer.unri.ac.id'),
(19, 'Salhazan Nasution, S.Kom., MIT', '1234', 'salhazan@lecturer.unri.ac.id'),
(20, 'Edi Susilo, S.Pd., M.Kom', '1234', 'edi@lecturer.unri.ac.id'),
(21, 'Noveri Lysbetti Marpaung, S.T., M.Sc.', '1234', 'noveri@lecturer.unri.ac.id'),
(22, 'dosen', '1234', 'dosen@lecturer.unri.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_jam`
--

CREATE TABLE `dosen_jam` (
  `id_dosen` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_jam`
--

INSERT INTO `dosen_jam` (`id_dosen`, `id_jam`) VALUES
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(11, 23),
(11, 24),
(11, 25),
(11, 26),
(11, 27),
(11, 34),
(11, 35),
(11, 36),
(11, 37),
(11, 38),
(11, 45),
(11, 46),
(11, 47),
(11, 48),
(11, 49),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 17),
(12, 18),
(12, 19),
(12, 20),
(12, 21),
(12, 22),
(12, 28),
(12, 29),
(12, 30),
(12, 31),
(12, 32),
(12, 33),
(12, 39),
(12, 40),
(12, 41),
(12, 42),
(12, 43),
(12, 44),
(12, 50),
(12, 51),
(12, 52),
(12, 53),
(12, 54),
(12, 55),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 12),
(13, 13),
(13, 14),
(13, 15),
(13, 16),
(13, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(13, 38),
(13, 45),
(13, 46),
(13, 47),
(13, 48),
(13, 49),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 17),
(14, 18),
(14, 19),
(14, 20),
(14, 21),
(14, 22),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(14, 32),
(14, 33),
(14, 39),
(14, 40),
(14, 41),
(14, 42),
(14, 43),
(14, 44),
(14, 50),
(14, 51),
(14, 52),
(14, 53),
(14, 54),
(14, 55),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 12),
(15, 13),
(15, 14),
(15, 15),
(15, 16),
(15, 23),
(15, 24),
(15, 25),
(15, 26),
(15, 27),
(15, 34),
(15, 35),
(15, 36),
(15, 37),
(15, 38),
(15, 45),
(15, 46),
(15, 47),
(15, 48),
(15, 49),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 17),
(16, 18),
(16, 19),
(16, 20),
(16, 21),
(16, 22),
(16, 28),
(16, 29),
(16, 30),
(16, 31),
(16, 32),
(16, 33),
(16, 39),
(16, 40),
(16, 41),
(16, 42),
(16, 43),
(16, 44),
(16, 50),
(16, 51),
(16, 52),
(16, 53),
(16, 54),
(16, 55),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 12),
(17, 13),
(17, 14),
(17, 15),
(17, 16),
(17, 23),
(17, 24),
(17, 25),
(17, 26),
(17, 27),
(17, 34),
(17, 35),
(17, 36),
(17, 37),
(17, 38),
(17, 45),
(17, 46),
(17, 47),
(17, 48),
(17, 49),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 17),
(18, 18),
(18, 19),
(18, 20),
(18, 21),
(18, 22),
(18, 28),
(18, 29),
(18, 30),
(18, 31),
(18, 32),
(18, 33),
(18, 39),
(18, 40),
(18, 41),
(18, 42),
(18, 43),
(18, 44),
(18, 50),
(18, 51),
(18, 52),
(18, 53),
(18, 54),
(18, 55),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(19, 13),
(19, 14),
(19, 15),
(19, 16),
(19, 17),
(19, 18),
(19, 19),
(19, 20),
(19, 21),
(19, 22),
(19, 23),
(19, 24),
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(19, 29),
(19, 30),
(19, 31),
(19, 32),
(19, 33),
(19, 34),
(19, 35),
(19, 36),
(19, 37),
(19, 38),
(19, 39),
(19, 40),
(19, 41),
(19, 42),
(19, 43),
(19, 44),
(19, 45),
(19, 46),
(19, 47),
(19, 48),
(19, 49),
(19, 50),
(19, 51),
(19, 52),
(19, 53),
(19, 54),
(19, 55),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 17),
(20, 18),
(20, 19),
(20, 20),
(20, 21),
(20, 22),
(20, 28),
(20, 29),
(20, 30),
(20, 31),
(20, 32),
(20, 33),
(20, 39),
(20, 40),
(20, 41),
(20, 42),
(20, 43),
(20, 44),
(20, 50),
(20, 51),
(20, 52),
(20, 53),
(20, 54),
(20, 55),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(21, 17),
(21, 18),
(21, 19),
(21, 20),
(21, 21),
(21, 22),
(21, 28),
(21, 29),
(21, 30),
(21, 31),
(21, 32),
(21, 33),
(21, 39),
(21, 40),
(21, 41),
(21, 42),
(21, 43),
(21, 44),
(21, 50),
(21, 51),
(21, 52),
(21, 53),
(21, 54),
(21, 55),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 12),
(22, 13),
(22, 14),
(22, 15),
(22, 16),
(22, 23),
(22, 24),
(22, 25),
(22, 26),
(22, 27),
(22, 34),
(22, 35),
(22, 36),
(22, 37),
(22, 38),
(22, 45),
(22, 46),
(22, 47),
(22, 48),
(22, 49);

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
(11, 24),
(12, 25),
(13, 9),
(13, 10),
(14, 11),
(14, 12),
(15, 13),
(16, 14),
(17, 15),
(18, 16),
(19, 17),
(20, 18),
(20, 19),
(20, 20),
(21, 21),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 22),
(22, 23);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_ruang`
--

CREATE TABLE `dosen_ruang` (
  `id_dosen` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_ruang`
--

INSERT INTO `dosen_ruang` (`id_dosen`, `id_ruang`) VALUES
(11, 1),
(11, 3),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_makul` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
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
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `kelas` text NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama`, `kelas`, `semester`, `sks`) VALUES
(5, 'UXN11034', 'Agama Islam', 'A', 1, 2),
(6, 'UXN11034', 'Agama Islam', 'B', 1, 2),
(7, 'TIS11023', 'Dasar Pemrograman T/P', 'A', 1, 4),
(8, 'TIS11023', 'Dasar Pemrograman T/P', 'B', 1, 4),
(9, 'FTS11013', 'Fisika Dasar', 'A', 1, 2),
(10, 'FTS11013', 'Fisika Dasar', 'B', 1, 2),
(11, 'UXN11277', 'Kewarganegaraan', 'A', 1, 2),
(12, 'UXN11277', 'Kewarganegaraan', 'B', 1, 2),
(13, 'FTS11023', 'Matematika Dasar', 'A', 1, 2),
(14, 'FTS11023', 'Matematika Dasar', 'B', 1, 2),
(15, 'UXN11194', 'Pendidikan Pancasila', 'A', 1, 2),
(16, 'UXN11194', 'Pendidikan Pancasila', 'B', 1, 2),
(17, 'FTS11033', 'Pengantar Teknik', 'A', 1, 2),
(18, 'FTS11033', 'Pengantar Teknik', 'B', 1, 2),
(19, 'FTS11033', 'Pengantar Teknik', 'C', 1, 2),
(20, 'TIS11013', 'Sistem dan Teknologi Informasi', 'A', 1, 3),
(21, 'TIS11013', 'Sistem dan Teknologi Informasi', 'B', 1, 3),
(22, 'UXN11118', 'Agama Katolik', '-', 1, 2),
(23, 'UXN11076', 'Agama Kristen', '-', 1, 2),
(24, 'UXN11239', 'Bahasa Indonesia', 'A', 1, 2),
(25, 'UXN11239', 'Bahasa Indonesia', 'B', 1, 2),
(26, '', 'Aljabar Linier dan Matrik - T.Informatika A.', '', 3, 3),
(27, '', 'Aljabar Linier dan Matrik - T.Informatika B.', '', 3, 3),
(28, '', 'Basis Data  - T.Informatika A.', '', 3, 3),
(29, '', 'Basis Data - T.Informatika B.', '', 3, 3),
(30, '', 'Dasar Pengembangan Perangkat Lunak - T.Informatika A.', '', 3, 3),
(31, '', 'Dasar Pengembangan Perangkat Lunak - T.Informatika B.', '', 3, 3),
(32, '', 'Komputer dan Masyarakat - T.Informatika A.', '', 3, 2),
(33, '', 'Komputer dan Masyarakat - T.Informatika B.', '', 3, 2),
(34, '', 'Pemrograman Berorientasi Objek T/P  - T.Informatika A.', '', 3, 4),
(35, '', 'Pemrograman Berorientasi Objek T/P  - T.Informatika B.', '', 3, 4),
(36, '', 'Sistem Operasi  - T.Informatika A.', '', 3, 3),
(37, '', 'Sistem Operasi  - T.Informatika B.', '', 3, 3),
(38, '', 'Teori Bahasa dan Otomata - T.Informatika A.', '', 3, 3),
(39, '', 'Teori Bahasa dan Otomata - T.Informatika B.', '', 3, 3),
(40, '', 'Animasi & Pemodelan 3D', '', 5, 4),
(41, '', 'Animasi Komputer & Multimedia', '', 5, 3),
(42, '', 'Jaringan Sensor Nirkabel', '', 5, 4),
(43, '', 'Kecerdasan Buatan T/P', '', 5, 4),
(44, '', 'Manajemen Proyek', '', 5, 2),
(45, '', 'Pemrograman Jaringan T/P', '', 5, 4),
(46, '', 'Pengenalan Pola', '', 5, 4),
(47, '', 'Pengolahan Citra Digital T/P', '', 5, 4),
(48, '', 'Simulasi dan Pemodelan', '', 5, 3),
(49, '', 'Cloud Computing', '', 7, 3),
(50, '', 'Ethical Hacking', '', 7, 3),
(51, '', 'Etika Profesi  - T.Informatika A.', '', 7, 2),
(52, '', 'Etika Profesi  - T.Informatika B.', '', 7, 2),
(53, '', 'Informatika Robotika', '', 7, 3),
(54, '', 'Jaringan Nirkabel dan Komputasi Bergerak', '', 7, 3),
(55, '', 'Komputasi Forensik', '', 7, 3),
(56, '', 'Pembuatan Game', '', 7, 3),
(57, '', 'Pemodelan 3D', '', 7, 3),
(58, '', 'Pemrograman Bahasa Alami', '', 7, 3),
(59, '', 'Pemrograman Perangkat Mobile', '', 7, 3),
(61, '', 'Simulasi Sistem Diskrit', '', 7, 3),
(62, '', 'Sistem Pakar', '', 7, 3),
(63, '', 'Agama Islam - T. Informatika A.', '', 1, 2),
(64, '', 'Agama Islam - T. Informatika B.', '', 1, 2),
(65, '', 'Dasar Pemrograman T/P - T. Informatika A.', '', 1, 4),
(66, '', 'Dasar Pemrograman T/P - T. Informatika B.', '', 1, 4),
(67, '', 'Fisika Dasar - T. Informatika A.', '', 1, 2),
(68, '', 'Fisika Dasar - T. Informatika B.', '', 1, 2),
(69, '', 'Kewarganegaraan - T. Informatika A.', '', 1, 2),
(70, '', 'Kewarganegaraan - T. Informatika B.', '', 1, 2),
(71, '', 'Matematika Dasar - T. Informatika A.', '', 1, 2),
(72, '', 'Matematika Dasar - T. Informatika B.', '', 1, 2),
(73, '', 'Pendidikan Pancasila T. Informatika A.', '', 1, 2),
(74, '', 'Pendidikan Pancasila T. Informatika B.', '', 1, 2),
(75, '', 'Pengantar Teknik - T. Informatika A.', '', 1, 2),
(76, '', 'Pengantar Teknik - T. Informatika B.', '', 1, 2),
(77, '', 'Pengantar Teknik - T. Informatika C.', '', 1, 2),
(78, '', 'Sistem dan Teknologi Informasi - T. Informatika A.', '', 1, 3),
(79, '', 'Sistem dan Teknologi Informasi - T. Informatika B.', '', 1, 3),
(80, '', 'Agama Katolik', '', 1, 2),
(81, '', 'Agama Kristen', '', 1, 2),
(82, '', 'Bahasa Indonesia - T. Informatika A.', '', 1, 2),
(83, '', 'Bahasa Indonesia - T. Informatika B.', '', 1, 2),
(84, '', 'Aljabar Linier dan Matrik - T.Informatika A.', '', 3, 3),
(85, '', 'Aljabar Linier dan Matrik - T.Informatika B.', '', 3, 3),
(86, '', 'Basis Data  - T.Informatika A.', '', 3, 3),
(87, '', 'Basis Data - T.Informatika B.', '', 3, 3),
(88, '', 'Dasar Pengembangan Perangkat Lunak - T.Informatika A.', '', 3, 3),
(89, '', 'Dasar Pengembangan Perangkat Lunak - T.Informatika B.', '', 3, 3),
(90, '', 'Komputer dan Masyarakat - T.Informatika A.', '', 3, 2),
(91, '', 'Komputer dan Masyarakat - T.Informatika B.', '', 3, 2),
(92, '', 'Pemrograman Berorientasi Objek T/P  - T.Informatika A.', '', 3, 4),
(93, '', 'Pemrograman Berorientasi Objek T/P  - T.Informatika B.', '', 3, 4),
(94, '', 'Sistem Operasi  - T.Informatika A.', '', 3, 3),
(95, '', 'Sistem Operasi  - T.Informatika B.', '', 3, 3),
(96, '', 'Teori Bahasa dan Otomata - T.Informatika A.', '', 3, 3),
(97, '', 'Teori Bahasa dan Otomata - T.Informatika B.', '', 3, 3),
(98, '', 'Animasi & Pemodelan 3D', '', 5, 4),
(99, '', 'Animasi Komputer & Multimedia', '', 5, 3),
(100, '', 'Jaringan Sensor Nirkabel', '', 5, 4),
(101, '', 'Kecerdasan Buatan T/P', '', 5, 4),
(102, '', 'Manajemen Proyek', '', 5, 2),
(103, '', 'Pemrograman Jaringan T/P', '', 5, 4),
(104, '', 'Pengenalan Pola', '', 5, 4),
(105, '', 'Pengolahan Citra Digital T/P', '', 5, 4),
(106, '', 'Simulasi dan Pemodelan', '', 5, 3),
(107, '', 'Cloud Computing', '', 7, 3),
(108, '', 'Ethical Hacking', '', 7, 3),
(109, '', 'Etika Profesi  - T.Informatika A.', '', 7, 2),
(110, '', 'Etika Profesi  - T.Informatika B.', '', 7, 2),
(111, '', 'Informatika Robotika', '', 7, 3),
(112, '', 'Jaringan Nirkabel dan Komputasi Bergerak', '', 7, 3),
(113, '', 'Komputasi Forensik', '', 7, 3),
(114, '', 'Pembuatan Game', '', 7, 3),
(115, '', 'Pemodelan 3D', '', 7, 3),
(116, '', 'Pemrograman Bahasa Alami', '', 7, 3),
(117, '', 'Pemrograman Perangkat Mobile', '', 7, 3),
(118, '', 'Simulasi Sistem Diskrit', '', 7, 3),
(119, '', 'Sistem Pakar', '', 7, 3);

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
(1, 'C1TI'),
(2, '303'),
(3, 'Lab. Jarkom');

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
(14, 'syafii', 'be8c6b8f224ae75f82919ded5a093de1', 2),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1),
(13, 'yen', '2599296bb9087b2fed9d0e353a8dcdf9', 2),
(12, 'dwi', '7aa2602c588c05a93baf10128861aeb9', 2),
(15, 'kingkel', 'eda4dcb5d38c4da6c7b77447130d8a7b', 2),
(16, 'maimunah', '217a39352a72fe13b33e68bf784b4195', 2),
(17, 'feranita', 'e76d7b699e14797a5ad7daf829c0a4a9', 2),
(18, 'syamsurizal', '55f5f402cb937cb2b0cb58d459650a5e', 2),
(19, 'yuliantoro', '42b27b4dc0b364c4e2c82414c8fd312e', 2),
(20, 'salhazan', '4e3b866c33fbe364e3e8ed5a6386f9a5', 2),
(21, 'edi', '8457dff5491b024de6b03e30b609f7e8', 2),
(22, 'noveri', '4c5e400e92baa90c9b7f9130d77e9deb', 2),
(23, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 2);

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
(3, 2);

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
(6, 6),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 19),
(21, 20),
(22, 21),
(23, 22);

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
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_makul`,`id_ruang`,`id_jam`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
