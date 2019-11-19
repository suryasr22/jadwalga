-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 05:57 PM
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
(22, 'dosen', '1234', 'dosen@lecturer.unri.ac.id'),
(23, 'Feri Candra', '1234', 'feri@lecturer.unri.ac.id'),
(24, 'Dahliyusmanto', '1234', 'dahliyusmanto@lecturer.unri.ac.id'),
(25, 'Irsan Taufik Ali', '1234', 'irsan@lecturer.unri.ac.id'),
(26, 'Linna Oktaviana Sari', '1234', 'linna@lecturer.unri.ac.id'),
(27, 'Rahyul Amri', '1234', 'rahyul@lecturer.unri.ac.id'),
(29, 'T. Yudi Hadiwandra', '1234', 'yudi@lecturer.unri.ac.id'),
(30, 'Rahmat Rizal', '1234', 'rahmat@lecturer.unri.ac.id'),
(31, 'Dewi Nasien', '1234', 'dewi@lecturer.unri.ac.id'),
(32, 'Ardi Nugraah', '1234', 'adi@lecturer.unri.ac.id'),
(33, 'Antonius Rajagukguk', '1234', 'antonius@lecturer.unri.ac.id');

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
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(11, 20),
(11, 21),
(11, 22),
(11, 23),
(11, 24),
(11, 25),
(11, 26),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(11, 33),
(11, 34),
(11, 35),
(11, 36),
(11, 37),
(11, 38),
(11, 39),
(11, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(11, 45),
(11, 46),
(11, 47),
(11, 48),
(11, 49),
(11, 50),
(11, 51),
(11, 52),
(11, 53),
(11, 54),
(11, 55),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(12, 14),
(12, 15),
(12, 16),
(12, 17),
(12, 18),
(12, 19),
(12, 20),
(12, 21),
(12, 22),
(12, 23),
(12, 24),
(12, 25),
(12, 26),
(12, 27),
(12, 28),
(12, 29),
(12, 30),
(12, 31),
(12, 32),
(12, 33),
(12, 34),
(12, 35),
(12, 36),
(12, 37),
(12, 38),
(12, 39),
(12, 40),
(12, 41),
(12, 42),
(12, 43),
(12, 44),
(12, 45),
(12, 46),
(12, 47),
(12, 48),
(12, 49),
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
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(13, 14),
(13, 15),
(13, 16),
(13, 17),
(13, 18),
(13, 19),
(13, 20),
(13, 21),
(13, 22),
(13, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 29),
(13, 30),
(13, 31),
(13, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(13, 38),
(13, 39),
(13, 40),
(13, 41),
(13, 42),
(13, 43),
(13, 44),
(13, 45),
(13, 46),
(13, 47),
(13, 48),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(13, 53),
(13, 54),
(13, 55),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 12),
(14, 13),
(14, 14),
(14, 15),
(14, 16),
(14, 17),
(14, 18),
(14, 19),
(14, 20),
(14, 21),
(14, 22),
(14, 23),
(14, 24),
(14, 25),
(14, 26),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(14, 32),
(14, 33),
(14, 34),
(14, 35),
(14, 36),
(14, 37),
(14, 38),
(14, 39),
(14, 40),
(14, 41),
(14, 42),
(14, 43),
(14, 44),
(14, 45),
(14, 46),
(14, 47),
(14, 48),
(14, 49),
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
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 12),
(15, 13),
(15, 14),
(15, 15),
(15, 16),
(15, 17),
(15, 18),
(15, 19),
(15, 20),
(15, 21),
(15, 22),
(15, 23),
(15, 24),
(15, 25),
(15, 26),
(15, 27),
(15, 28),
(15, 29),
(15, 30),
(15, 31),
(15, 32),
(15, 33),
(15, 34),
(15, 35),
(15, 36),
(15, 37),
(15, 38),
(15, 39),
(15, 40),
(15, 41),
(15, 42),
(15, 43),
(15, 44),
(15, 45),
(15, 46),
(15, 47),
(15, 48),
(15, 49),
(15, 50),
(15, 51),
(15, 52),
(15, 53),
(15, 54),
(15, 55),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(16, 13),
(16, 14),
(16, 15),
(16, 16),
(16, 17),
(16, 18),
(16, 19),
(16, 20),
(16, 21),
(16, 22),
(16, 23),
(16, 24),
(16, 25),
(16, 26),
(16, 27),
(16, 28),
(16, 29),
(16, 30),
(16, 31),
(16, 32),
(16, 33),
(16, 34),
(16, 35),
(16, 36),
(16, 37),
(16, 38),
(16, 39),
(16, 40),
(16, 41),
(16, 42),
(16, 43),
(16, 44),
(16, 45),
(16, 46),
(16, 47),
(16, 48),
(16, 49),
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
(17, 6),
(17, 7),
(17, 8),
(17, 9),
(17, 10),
(17, 11),
(17, 12),
(17, 13),
(17, 14),
(17, 15),
(17, 16),
(17, 17),
(17, 18),
(17, 19),
(17, 20),
(17, 21),
(17, 22),
(17, 23),
(17, 24),
(17, 25),
(17, 26),
(17, 27),
(17, 28),
(17, 29),
(17, 30),
(17, 31),
(17, 32),
(17, 33),
(17, 34),
(17, 35),
(17, 36),
(17, 37),
(17, 38),
(17, 39),
(17, 40),
(17, 41),
(17, 42),
(17, 43),
(17, 44),
(17, 45),
(17, 46),
(17, 47),
(17, 48),
(17, 49),
(17, 50),
(17, 51),
(17, 52),
(17, 53),
(17, 54),
(17, 55),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 12),
(18, 13),
(18, 14),
(18, 15),
(18, 16),
(18, 17),
(18, 18),
(18, 19),
(18, 20),
(18, 21),
(18, 22),
(18, 23),
(18, 24),
(18, 25),
(18, 26),
(18, 27),
(18, 28),
(18, 29),
(18, 30),
(18, 31),
(18, 32),
(18, 33),
(18, 34),
(18, 35),
(18, 36),
(18, 37),
(18, 38),
(18, 39),
(18, 40),
(18, 41),
(18, 42),
(18, 43),
(18, 44),
(18, 45),
(18, 46),
(18, 47),
(18, 48),
(18, 49),
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
(19, 12),
(19, 13),
(19, 14),
(19, 15),
(19, 16),
(19, 17),
(19, 18),
(19, 19),
(19, 23),
(19, 24),
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(19, 29),
(19, 30),
(19, 34),
(19, 35),
(19, 36),
(19, 37),
(19, 38),
(19, 39),
(19, 40),
(19, 41),
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
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 12),
(21, 13),
(21, 14),
(21, 15),
(21, 16),
(21, 23),
(21, 24),
(21, 25),
(21, 26),
(21, 27),
(21, 34),
(21, 35),
(21, 36),
(21, 37),
(21, 38),
(21, 45),
(21, 46),
(21, 47),
(21, 48),
(21, 49),
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
(22, 49),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 12),
(23, 13),
(23, 14),
(23, 15),
(23, 16),
(23, 23),
(23, 24),
(23, 25),
(23, 26),
(23, 27),
(23, 34),
(23, 35),
(23, 36),
(23, 37),
(23, 38),
(23, 45),
(23, 46),
(23, 47),
(23, 48),
(23, 49),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 12),
(24, 13),
(24, 14),
(24, 15),
(24, 16),
(24, 23),
(24, 24),
(24, 25),
(24, 26),
(24, 27),
(24, 34),
(24, 35),
(24, 36),
(24, 37),
(24, 38),
(24, 45),
(24, 46),
(24, 47),
(24, 48),
(24, 49),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 12),
(26, 13),
(26, 14),
(26, 15),
(26, 16),
(26, 23),
(26, 24),
(26, 25),
(26, 26),
(26, 27),
(26, 34),
(26, 35),
(26, 36),
(26, 37),
(26, 38),
(26, 45),
(26, 46),
(26, 47),
(26, 48),
(26, 49),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 7),
(27, 8),
(27, 9),
(27, 10),
(27, 13),
(27, 14),
(27, 15),
(27, 16),
(27, 18),
(27, 19),
(27, 20),
(27, 21),
(27, 24),
(27, 25),
(27, 26),
(27, 27),
(27, 29),
(27, 30),
(27, 31),
(27, 32),
(27, 35),
(27, 36),
(27, 37),
(27, 38),
(27, 40),
(27, 41),
(27, 42),
(27, 43),
(27, 46),
(27, 47),
(27, 48),
(27, 49),
(27, 51),
(27, 52),
(27, 53),
(27, 54),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(29, 10),
(29, 11),
(29, 17),
(29, 18),
(29, 19),
(29, 20),
(29, 21),
(29, 22),
(29, 28),
(29, 29),
(29, 30),
(29, 31),
(29, 32),
(29, 33),
(29, 39),
(29, 40),
(29, 41),
(29, 42),
(29, 43),
(29, 44),
(29, 50),
(29, 51),
(29, 52),
(29, 53),
(29, 54),
(29, 55),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(30, 8),
(30, 9),
(30, 10),
(30, 11),
(30, 12),
(30, 13),
(30, 14),
(30, 15),
(30, 16),
(30, 17),
(30, 18),
(30, 19),
(30, 20),
(30, 21),
(30, 22),
(30, 23),
(30, 24),
(30, 25),
(30, 26),
(30, 27),
(30, 28),
(30, 29),
(30, 30),
(30, 31),
(30, 32),
(30, 33),
(30, 34),
(30, 35),
(30, 36),
(30, 37),
(30, 38),
(30, 39),
(30, 40),
(30, 41),
(30, 42),
(30, 43),
(30, 44),
(30, 45),
(30, 46),
(30, 47),
(30, 48),
(30, 49),
(30, 50),
(30, 51),
(30, 52),
(30, 53),
(30, 54),
(30, 55),
(31, 6),
(31, 7),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(31, 17),
(31, 18),
(31, 19),
(31, 20),
(31, 21),
(31, 22),
(31, 28),
(31, 29),
(31, 30),
(31, 31),
(31, 32),
(31, 33),
(31, 39),
(31, 40),
(31, 41),
(31, 42),
(31, 43),
(31, 44),
(31, 50),
(31, 51),
(31, 52),
(31, 53),
(31, 54),
(31, 55),
(32, 6),
(32, 7),
(32, 8),
(32, 9),
(32, 10),
(32, 11),
(32, 17),
(32, 18),
(32, 19),
(32, 20),
(32, 21),
(32, 22),
(32, 28),
(32, 29),
(32, 30),
(32, 31),
(32, 32),
(32, 33),
(32, 39),
(32, 40),
(32, 41),
(32, 42),
(32, 43),
(32, 44),
(32, 50),
(32, 51),
(32, 52),
(32, 53),
(32, 54),
(32, 55),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(33, 8),
(33, 9),
(33, 10),
(33, 11),
(33, 12),
(33, 13),
(33, 14),
(33, 15),
(33, 16),
(33, 17),
(33, 18),
(33, 19),
(33, 20),
(33, 21),
(33, 22),
(33, 23),
(33, 24),
(33, 25),
(33, 26),
(33, 27),
(33, 28),
(33, 29),
(33, 30),
(33, 31),
(33, 32),
(33, 33),
(33, 34),
(33, 35),
(33, 36),
(33, 37),
(33, 38),
(33, 39),
(33, 40),
(33, 41),
(33, 42),
(33, 43),
(33, 44),
(33, 45),
(33, 46),
(33, 47),
(33, 48),
(33, 49),
(33, 50),
(33, 51),
(33, 52),
(33, 53),
(33, 54),
(33, 55);

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
(19, 28),
(19, 29),
(19, 30),
(19, 31),
(20, 18),
(20, 19),
(20, 20),
(20, 32),
(20, 33),
(20, 36),
(20, 44),
(21, 21),
(21, 26),
(21, 27),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 22),
(22, 23),
(23, 46),
(23, 58),
(24, 37),
(24, 50),
(24, 51),
(24, 52),
(24, 55),
(26, 45),
(26, 54),
(27, 38),
(27, 39),
(27, 42),
(27, 53),
(29, 43),
(29, 47),
(29, 48),
(29, 49),
(29, 62),
(30, 40),
(30, 41),
(30, 56),
(30, 57),
(30, 59),
(31, 35),
(32, 34),
(33, 61);

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
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3);

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
(26, 'TIS21113', 'Aljabar Linier dan Matrik', 'A', 3, 3),
(27, 'TIS21113', 'Aljabar Linier dan Matrik', 'B', 3, 3),
(28, '	TIS21163', 'Basis Data', 'A', 3, 3),
(29, '	TIS21163', 'Basis Data', 'B', 3, 3),
(30, 'TIS21123', 'Dasar Pengembangan Perangkat Lunak', 'A', 3, 3),
(31, 'TIS21123', 'Dasar Pengembangan Perangkat Lunak', 'B', 3, 3),
(32, 'TIS21133', 'Komputer dan Masyarakat', 'A', 3, 2),
(33, 'TIS21133', 'Komputer dan Masyarakat', 'B', 3, 2),
(34, 'TIS21143', 'Pemrograman Berorientasi Objek T/P', 'A', 3, 4),
(35, 'TIS21143', 'Pemrograman Berorientasi Objek T/P', 'B', 3, 4),
(36, 'TIS21103', 'Sistem Operasi', 'A', 3, 3),
(37, 'TIS21103', 'Sistem Operasi', 'B', 3, 3),
(38, 'TIS21153', 'Teori Bahasa dan Otomata', 'A', 3, 3),
(39, 'TIS21153', 'Teori Bahasa dan Otomata', 'B', 3, 3),
(40, 'TIS31353', 'Animasi & Pemodelan 3D', 'RPL', 5, 4),
(41, 'TIS3111', 'Animasi Komputer & Multimedia', 'KBJ', 5, 3),
(42, 'TIS31403', 'Jaringan Sensor Nirkabel', 'KBJ', 5, 4),
(43, 'TIS31233', 'Kecerdasan Buatan T/P', '-', 5, 4),
(44, 'TIS31253', 'Manajemen Proyek', '-', 5, 2),
(45, 'TIS31263', 'Pemrograman Jaringan T/P', '-', 5, 4),
(46, 'TIS31303', 'Pengenalan Pola', 'KCV', 5, 4),
(47, 'TIS31243', 'Pengolahan Citra Digital T/P', '-', 5, 4),
(48, 'TIS31273', 'Simulasi dan Pemodelan', '-', 5, 3),
(49, 'TIS4114', 'Cloud Computing', 'KBJ', 7, 3),
(50, 'TIS4117', 'Ethical Hacking', 'KBJ', 7, 3),
(51, 'TIS4101', 'Etika Profesi', 'A', 7, 2),
(52, 'TIS4101', 'Etika Profesi', 'B', 7, 2),
(53, 'TIS4104', 'Informatika Robotika', 'KCV', 7, 3),
(54, 'TIS4115', 'Jaringan Nirkabel dan Komputasi Bergerak', 'KBJ', 7, 3),
(55, 'TIS4116', 'Komputasi Forensik', 'KBJ', 7, 3),
(56, 'TIS4112', 'Pembuatan Game', 'RPL', 7, 3),
(57, '	TIS4109', 'Pemodelan 3D', 'RPL', 7, 3),
(58, 'TIS4106', 'Pemrograman Bahasa Alami', 'KCV', 7, 3),
(59, 'TIS4111', 'Pemrograman Perangkat Mobile', '-RPL', 7, 3),
(61, 'TIS4108', 'Simulasi Sistem Diskrit', 'KCV', 7, 3),
(62, 'TIS4105', 'Sistem Pakar', 'KCV', 7, 3);

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
(23, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 2),
(24, 'feri', '4c850dbd4128e75d16f407a9188e2aab', 2),
(25, 'dahliyusmanto', '5a7fbf877eace440696ff0a18e61bef2', 2),
(26, 'irsan', '8a97fb7c04a7a82eb7aca56c8a27934a', 2),
(27, 'linna', 'afcf18ce63442755f9068f4473867a0f', 2),
(28, 'rahyul', 'b04bbf055fd74f02eae87571798326e2', 2),
(34, 'antonius', '5a60668bacacd99584dcc0ab99893e7f', 2),
(30, 'yudi', 'c232864d5de2064450915c0b9e4cc0b5', 2),
(31, 'rahmat', 'af2a4c9d4c4956ec9d6ba62213eed568', 2),
(32, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 2),
(33, 'ardi', '0264391c340e4d3cbba430cee7836eaf', 2);

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
(23, 22),
(24, 23),
(25, 24),
(26, 25),
(27, 26),
(28, 27),
(30, 29),
(31, 30),
(32, 31),
(33, 32),
(34, 33);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
