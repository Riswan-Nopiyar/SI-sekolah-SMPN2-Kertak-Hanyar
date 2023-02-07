-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 07:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_informasi_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`attendance_id`, `status`, `student_id`, `date`) VALUES
(46, 1, 2, '2022-06-06'),
(47, 1, 12, '2022-06-06'),
(48, 1, 15, '2022-06-06'),
(49, 0, 2, '2022-06-08'),
(50, 0, 12, '2022-06-08'),
(51, 0, 15, '2022-06-08'),
(52, 1, 2, '2022-08-06'),
(53, 1, 12, '2022-08-06'),
(54, 1, 15, '2022-08-06'),
(55, 1, 1, '2022-08-06'),
(56, 2, 14, '2022-08-06'),
(57, 1, 10, '2022-08-06'),
(58, 2, 11, '2022-08-06'),
(59, 1, 13, '2022-08-06'),
(60, 0, 2, '2022-06-14'),
(61, 0, 12, '2022-06-14'),
(62, 0, 15, '2022-06-14'),
(63, 1, 2, '2022-06-10'),
(64, 1, 12, '2022-06-10'),
(65, 1, 15, '2022-06-10'),
(66, 0, 2, '2022-06-18'),
(67, 0, 12, '2022-06-18'),
(68, 0, 15, '2022-06-18'),
(69, 1, 2, '2022-03-13'),
(70, 1, 12, '2022-03-13'),
(71, 1, 15, '2022-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin Sekolah', 'Nopiyar@Proton.me', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pelajaran`
--

CREATE TABLE `bahan_pelajaran` (
  `document_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bahan_pelajaran`
--

INSERT INTO `bahan_pelajaran` (`document_id`, `title`, `description`, `file_name`, `file_type`, `class_id`, `teacher_id`, `timestamp`) VALUES
(1, 'TIK', 'Belanja Edit Document', 'Usda_ Stevsyyy.pdf', 'PDF', '6', 0, '1655676000'),
(2, 'Matematika', 'Belajar Excel', 'exportPenerimaan.xlsx', 'Excel', '3', 0, '1655071200');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`book_id`, `name`, `description`, `author`, `class_id`, `status`, `price`) VALUES
(1, 'IPA', 'IPA Kelas VIII', 'Gramedia', '3', 'available', '1000'),
(2, 'Bahasa Indonesia', 'Pelajaran Bahasa Indonesia', 'Sinar Jaya Abadi', '3', 'available', '1300'),
(3, 'Bahasa Jawa', 'Menulis Aksara Jawa', 'Mbah Sugi', '6', 'available', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`teacher_id`, `name`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`) VALUES
(2, 'MARIA MAGDALENA KAWER', '06/07/1989', 'Female', '', '', '36 Terra Street', '8555554540', 'maria@mail.com', '123456'),
(3, 'FRANIS MALO, S.Pd', '03/25/1982', 'Male', '', '', '460 Davis Avenue', '0147965454', 'franke@mail.com', '123456'),
(4, 'OSCARDIN NIKOLAUS NANGA, S.Pd', '09/09/1982', 'Male', '', '', '16 Bond Street', '3698885555', 'smyth@mail.com', '123456'),
(5, 'AGATHA WOKOMAN, A.Ma', '08/11/1988', 'Female', '', '', '23 Foley Street', '0369999969', 'pam@mail.com', '123456'),
(6, 'ADAK ALFONSIUS UROPMABIN', '09/08/1988', 'Male', '', '', '693 Kembery Drive', '7850002500', 'gford@mail.com', '123456'),
(7, 'CANDRA KIRANA, S.Pd', '07/05/1987', 'Female', '', '', '96 Public Works Drive', '7898789870', 'candrakirana@mail.com', '123456'),
(8, 'MARICE KONJOL, A.Ma.Pd', '02/04/1990', 'Female', '', '', '190 Haymond Rocks Road', '4545550000', 'john@mail.com', '123456'),
(9, 'HUSEIN N. KAHARU, S.Pd,Gr', '08/26/1984', 'Male', '', '', '68 Arlington Avenue', '4502500010', 'kevinh@mail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(8, 1, 4, '08:00:00', '09:30:00', 'Senin'),
(9, 1, 16, '07:00:00', '08:45:00', 'Jumat'),
(10, 2, 3, '08:00:00', '09:30:00', 'Senin'),
(12, 3, 4, '07:00:00', '08:30:00', 'Selasa'),
(13, 1, 3, '07:00:00', '08:00:00', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_beban`
--

CREATE TABLE `kategori_beban` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategori_beban`
--

INSERT INTO `kategori_beban` (`expense_category_id`, `name`) VALUES
(1, 'Gaji Guru'),
(2, 'Perlengkapan Kelas'),
(3, 'Dekorasi Kelas'),
(4, 'Pembelian Aset'),
(5, 'Perlengkapan Ujian'),
(7, 'Gaji Security dan Cleaning Service');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_nilai`
--

CREATE TABLE `kategori_nilai` (
  `grade_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategori_nilai`
--

INSERT INTO `kategori_nilai` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'A+', '5', 91, 100, 'Sangat Bagus'),
(2, 'A', '4', 81, 90, 'Bagus'),
(3, 'A-', '3', 71, 80, 'Bagus'),
(4, 'B', '2', 61, 70, 'Rata-Rata'),
(5, 'C', '1', 51, 60, 'Kurang'),
(6, 'F', '0', 10, 50, 'Gagal');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(1, 'VII-A', '09', 2),
(2, 'VII-B', '08', 3),
(3, 'VII-C', '07', 4),
(6, 'VIII-A', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admin@mail.com', 1652831362),
(2, '::1', 'a', 1654670065),
(3, '::1', 'a', 1654671216);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `timestamp`, `read_status`) VALUES
(3, 'eb7157e52314645', 'This is a test message', 'admin-1', '1647099867', 1),
(2, '771e4077025c3f1', 'Hi There', 'admin-1', '1449767732', 0),
(4, 'eb7157e52314645', 'This is a test reply from Eleanor.', 'student-2', '1647099931', 1),
(5, '7053f3d0570a2d9', 'Dear student, this is to inform you that this is just a demo text message from the admin.', 'admin-1', '1647193784', 1),
(6, '7053f3d0570a2d9', 'demo reply', 'student-3', '1647193990', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `reciever`, `last_message_timestamp`) VALUES
(2, '771e4077025c3f1', 'admin-1', 'student-1', ''),
(3, 'eb7157e52314645', 'admin-1', 'student-2', ''),
(4, '7053f3d0570a2d9', 'admin-1', 'student-4', '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT 0,
  `mark_total` int(11) NOT NULL DEFAULT 100,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai_ujian`
--

INSERT INTO `nilai_ujian` (`mark_id`, `student_id`, `subject_id`, `class_id`, `exam_id`, `mark_obtained`, `mark_total`, `comment`) VALUES
(57, 2, 5, 3, 2, 80, 100, 'Bagus, lebih teliti lagi dalam mengerjakan soal'),
(58, 12, 5, 3, 2, 85, 100, 'Bagus, bisa lebih ditingkatkan lagi'),
(59, 15, 5, 3, 2, 100, 100, 'Bagus, pertahankan'),
(60, 2, 5, 3, 1, 0, 100, ''),
(61, 12, 5, 3, 1, 0, 100, ''),
(62, 15, 5, 3, 1, 0, 100, ''),
(63, 10, 14, 1, 2, 0, 100, ''),
(64, 11, 14, 1, 2, 0, 100, ''),
(65, 13, 14, 1, 2, 0, 100, ''),
(66, 10, 14, 1, 1, 0, 100, ''),
(67, 11, 14, 1, 1, 0, 100, ''),
(68, 13, 14, 1, 1, 0, 100, ''),
(69, 10, 16, 1, 1, 0, 100, ''),
(70, 11, 16, 1, 1, 0, 100, ''),
(71, 13, 16, 1, 1, 0, 100, ''),
(72, 2, 17, 3, 2, 0, 100, ''),
(73, 12, 17, 3, 2, 0, 100, ''),
(74, 15, 17, 3, 2, 0, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(3, 'IPA', 2, 3),
(4, 'Matematika', 2, 11),
(5, 'IPA', 3, 3),
(14, 'Bahasa Indonesia', 1, 4),
(16, 'Pendidikan Jasmani, Olahraga dan Kesehatan', 1, 2),
(17, 'Matematika', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'Test Notice Two', 'This is a second demo notice from the school administration to inform you that this is just a simple test message. Thank you!', 1654812000),
(2, 'Ujian Kenaikan Kelas', 'Persiapkan Diri Kalian Untuk Ujian Kenaikan Kelas Tahun Ajaran 2022/2023', 1655071200),
(3, 'Upacara Bendera', 'Upacara Bendera HUT RI', 1660687200);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `text_align` varchar(255) DEFAULT NULL,
  `skin_colour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `system_name`, `system_title`, `address`, `phone`, `currency`, `email`, `text_align`, `skin_colour`) VALUES
(1, 'SMPN 2 Kertak Hanyar', 'SCHOOLMIS', 'SMP NEGERI 2 KERTAK HANYAR Jl. A. Yani Km. 8,200, Manarap Tengah, Kec. Kertak Hanyar, Kab. Banjar Prov. Kalimantan Selatan', '0821-1234-5678', 'Rp', 'SMP2@mail.com', 'left-to-right', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `place` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`student_id`, `name`, `place`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`, `father_name`, `mother_name`, `class_id`, `section_id`, `parent_id`, `roll`, `transport_id`, `dormitory_id`, `dormitory_room_number`) VALUES
(1, 'Madeline Collins', '', '12/07/2007', 'Female', '', '', '23 Tea Berry Lane', '1478547855', 'collines@mail.com', '123456', '', '', '2', 1, 2, '3', 0, 0, ''),
(2, 'Eleanor Hathaway', '', '02/16/2010', 'Wanita', '', '', '302 Adams Avenue', '7400012544', 'eleanor@mail.com', '123456', '', '', '3', 3, 1, '1', 0, 0, ''),
(4, 'Ellen Decker', '', '02/28/2007', 'Female', '', '', '709 Anmoore Road', '4580001450', 'ellend@mail.com', '123456', '', '', '6', 7, 6, '2', 0, 0, ''),
(5, 'Arthur Scott', '', '01/21/2008', 'Male', '', '', '32 Goff Avenue', '7800024580', 'arthur@mail.com', '123456', '', '', '6', 7, 7, '3', 0, 0, ''),
(7, 'Doris Chartier', '', '01/30/2007', 'Female', '', '', '10 Grasselli Street', '4780145690', 'doris@mail.com', '123456', '', '', '6', 7, 9, '5', 0, 0, ''),
(8, 'Jamie Yanez', '', '11/29/2006', 'Male', '', '', '17 Woodrow Way', '4569874500', 'jamie@mail.com', '123456', '', '', '6', 8, 10, '1', 0, 0, ''),
(9, 'Ray Bailey', '', '12/27/2005', 'Male', '', '', '70 Jarvisville Road', '4701597530', 'rayb@mail.com', '123456', '', '', '6', 8, 11, '2', 0, 0, ''),
(10, 'Ruth Sloan', '', '07/16/2009', 'Wanita', '', '', '206 Tavern Place', '4785698740', 'ruths@mail.com', '123456', '', '', '1', 5, 3, '3', 0, 0, ''),
(11, 'Brent Scott', '', '12/31/2009', 'Pria', '', '', '98 Loving Acres Road', '4780000020', 'brent@mail.com', '123456', '', '', '1', 5, 7, '4', 0, 0, ''),
(12, 'Martha Jameson', '', '02/14/2008', 'Wanita', '', '', '31 Woodrow Way', '4741458411', 'martha@mail.com', '123456', '', '', '3', 4, 4, '4', 0, 0, ''),
(13, 'Tony Wilson', '', '06/12/2007', 'Male', '', '', '58 Raccoon Run', '4789666666', 'tonyw@mail.com', '123456', '', '', '1', 8, 12, '4', 0, 0, ''),
(14, 'Gary Wilson', '', '07/08/2009', 'Male', '', '', '452 Lanef Street', '7458965000', 'garyw@mail.com', '123456', '', '', '2', 5, 12, '6', 0, 0, ''),
(15, 'Michael Oktanario Rezka', 'Yogyakarta', '10/12/2010', 'Pria', '', '', 'Abepura', '(62) 123-456', 'michael@mail.com', '1234567', '', '', '3', 0, 14, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_copy1`
--

CREATE TABLE `siswa_copy1` (
  `student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `place` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `siswa_copy1`
--

INSERT INTO `siswa_copy1` (`student_id`, `name`, `place`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`, `father_name`, `mother_name`, `class_id`, `section_id`, `parent_id`, `roll`, `transport_id`, `dormitory_id`, `dormitory_room_number`) VALUES
(1, 'miya', '', '12/07/2007', 'Perempuan', 'Islam', 'A', '23 Tea Berry Lane', '1478547855', 'collines@yahoo.com', '123456', '', '', '2', 1, 2, '3', 0, 0, ''),
(2, 'Eleanor Hathaway', '', '02/16/2010', 'Wanita', '', '', '302 Adams Avenue', '7400012544', 'eleanor@yahoo.com', '123456', '', '', '3', 3, 1, '1', 0, 0, ''),
(4, 'Ellen Decker', '', '02/28/2007', 'Female', '', '', '709 Anmoore Road', '4580001450', 'ellend@yahoo.com', '123456', '', '', '6', 7, 6, '2', 0, 0, ''),
(5, 'Arthur Scott', '', '01/21/2008', 'Male', '', '', '32 Goff Avenue', '7800024580', 'arthur@yahoo.com', '123456', '', '', '6', 7, 7, '3', 0, 0, ''),
(7, 'Doris Chartier', '', '01/30/2007', 'Female', '', '', '10 Grasselli Street', '4780145690', 'doris@yahoo.com', '123456', '', '', '6', 7, 9, '5', 0, 0, ''),
(8, 'Jamie Yanez', '', '11/29/2006', 'Male', '', '', '17 Woodrow Way', '4569874500', 'jamie@yahoo.com', '123456', '', '', '6', 8, 10, '1', 0, 0, ''),
(9, 'Ray Bailey', '', '12/27/2005', 'Male', '', '', '70 Jarvisville Road', '4701597530', 'rayb@yahoo.com', '123456', '', '', '6', 8, 11, '2', 0, 0, ''),
(10, 'Ruth Sloan', '', '07/16/2009', 'Wanita', '', '', '206 Tavern Place', '4785698740', 'ruths@yahoo.com', '123456', '', '', '1', 5, 3, '3', 0, 0, ''),
(11, 'Brent Scott', '', '12/31/2009', 'Pria', '', '', '98 Loving Acres Road', '4780000020', 'brent@yahoo.com', '123456', '', '', '1', 5, 7, '4', 0, 0, ''),
(12, 'Martha Jameson', '', '02/14/2008', 'Wanita', '', '', '31 Woodrow Way', '4741458411', 'martha@yahoo.com', '123456', '', '', '3', 4, 4, '4', 0, 0, ''),
(13, 'Tony Wilson', '', '06/12/2007', 'Male', '', '', '58 Raccoon Run', '4789666666', 'tonyw@yahoo.com', '123456', '', '', '1', 8, 12, '4', 0, 0, ''),
(14, 'Gary Wilson', '', '07/08/2009', 'Male', '', '', '452 Lanef Street', '7458965000', 'garyw@yahoo.com', '123456', '', '', '2', 5, 12, '6', 0, 0, ''),
(15, 'Michael Oktanario Rezka', 'Yogyakarta', '10/12/2010', 'Pria', '', '', 'Abepura', '(62) 123-456', 'michael@yahoo.com', '1234567', '', '', '3', 0, 14, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 1, 'SPP Bulanan', 'SPP Bulan Februari 2022', 850000, '850', '849150', 1665007200, '', '', '', 'paid'),
(2, 4, 'SPP Bulanan', 'Pem bayaran SPP Bulan Juni 2022', 980000, '0', '980000', 1646089200, '', '', '', 'unpaid'),
(3, 10, 'Monthly Fees - Feb', 'Fees collection for the month of February', 770, '770', '0', 1646002800, '', '', '', 'paid'),
(4, 5, 'SPP Bulanan', 'SPP Bulan Februari Arthur Kelas VIII-A', 980000, '990', '979010', 1655157600, '', '', '', 'paid'),
(5, 12, 'Monthly Fees - Feb', 'Fees Collection for the month February', 850, '0', '850', 1646002800, '', '', '', 'unpaid'),
(6, 9, 'Monthly Fees', 'none', 990, '990', '0', 1646002800, '', '', '', 'paid'),
(7, 15, 'SPP Bulanan', 'Pembayaran SPP Bulan Juni 2022', 980000, '980000', '0', 1654552800, '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `spp_metode_pembayaran`
--

CREATE TABLE `spp_metode_pembayaran` (
  `payment_id` int(11) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spp_metode_pembayaran`
--

INSERT INTO `spp_metode_pembayaran` (`payment_id`, `expense_category_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `timestamp`) VALUES
(1, 0, 'Monthly Fee', 'income', 1, 1, '1', 'asd', '100', '1449702000'),
(2, 0, 'Monthly Payment', 'income', 2, 3, '1', 'Payment for the month - Feb', '0', '1646089200'),
(3, 0, 'Monthly Fees - Feb', 'income', 3, 10, '3', 'Fees collection for the month of February', '770', '1646002800'),
(4, 0, 'Monthly Fees', 'income', 4, 5, '1', 'Fees collection for the month February', '990', '1646002800'),
(5, 0, 'Monthly Fees - Feb', 'income', 5, 12, '1', 'Fees Collection for the month February', '0', '1646002800'),
(6, 0, 'Monthly Fees', 'income', 6, 9, '2', 'none', '990', '1646002800'),
(7, 0, 'SPP Bulanan', 'income', 7, 15, '1', 'Pembayaran SPP Bulan Juni 2022', '980000', '1654552800');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_dt` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_open` int(1) NOT NULL,
  `strt_dt` date DEFAULT NULL,
  `end_dt` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `name`, `is_dt`, `is_open`, `strt_dt`, `end_dt`) VALUES
(8, '2021/2022', NULL, 1, '2021-07-12', '2022-06-10'),
(9, '2022/2023', NULL, 1, '2022-07-18', '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, 'Ujian Harian', '', 'Belajar yang Rajin, Murid-Murid....'),
(2, 'Penilaian Tengah Semester', '12/13/2021', 'PTS'),
(4, 'Penilaian Akhir Semester', '06/03/2022', 'Ujian Kenaikan Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`parent_id`, `name`, `email`, `password`, `phone`, `address`, `profession`) VALUES
(1, 'Pedro Susanto Hathaway', 'pedro@mail.com', '123456', '3214569855', '309 Winifred Way', 'Tani'),
(2, 'Paulene Djumali Spain', 'pailene@gmail.com', '123456', '1450002020', '68 Morris Street', 'Perawat'),
(3, 'Ruby J. Sloan', 'ruby@mail.com', '123456', '7854444444', '806 Radford Street', 'Housewife'),
(4, 'James K. Jameson', 'james@mail.com', '123456', '7458960000', '15 Pike Street', 'Lawyer'),
(5, 'Lester O. Shelton', 'lester@mail.com', '123456', '7414440010', '10 Smith Street', 'Butcher'),
(6, 'Olga T. Decker', 'olga@mail.com', '123456', '7414741450', '56 Jarvis Street', 'Nurse'),
(7, 'James S. Scott', 'jamescott@mail.com', '123456', '7896547800', '80 Cherry Ridge Drive', 'Civil Engineer'),
(8, 'Samantha J. Wall', 'samantha@mail.com', '123456', '7890001258', '56 Harrison Street', 'Store Manager'),
(9, 'Dustin A. Chartier', 'dustin@mail.com', '123456', '7450025600', '80 Collins Avenue', 'Projectionist'),
(10, 'David L. Yanez', 'davidy@mail.com', '123456', '7950001450', '59 Rocky Road', 'Businessman'),
(11, 'Jose A. Bailey', 'josb@mail.com', '123456', '7896547801', '56 Centennial Farm Road', 'Businessman'),
(13, 'Demsi Singal', 'demsis@mail.com', '123456', '(63) 123-456', 'Kampung Kosong', 'Tani'),
(14, 'Antonius Vicky Prayoga', 'admin@gmail.com', '123456', '(62) 123-456', 'Kampung Kosong', 'Freelance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bahan_pelajaran`
--
ALTER TABLE `bahan_pelajaran`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `kategori_beban`
--
ALTER TABLE `kategori_beban`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `siswa_copy1`
--
ALTER TABLE `siswa_copy1`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `spp_metode_pembayaran`
--
ALTER TABLE `spp_metode_pembayaran`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahan_pelajaran`
--
ALTER TABLE `bahan_pelajaran`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_beban`
--
ALTER TABLE `kategori_beban`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siswa_copy1`
--
ALTER TABLE `siswa_copy1`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spp_metode_pembayaran`
--
ALTER TABLE `spp_metode_pembayaran`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
