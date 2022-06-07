-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 09:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbd32`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('administrator','editor','pimpinan','') NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nip` varchar(18) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `unit` enum('D32','D321','D322','D323') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  `archieved` enum('0','1','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `nama`, `nip`, `jabatan`, `unit`, `email`, `foto`, `last_logout`, `archieved`) VALUES
(1, 'admin_master', '$2y$10$HLzu/Pt2OcUKIFhp2zY/iujfSC9OUng/H/.BcE.Nd/QTx0I8C4tCa', 'administrator', 'AdminMAster', '123456789012345678', 'Pengolah Data', 'D321', 'dummy@gmail.com', 'ProfilePicture-admin_master1.jpg', '2022-06-05 07:57:25', '0'),
(2, 'editor_jane', '$2y$10$.k.8q1bk36DP2SLeQCjwguD6z7P1N.TooD22QQrzEQiWXdorZyHoK', 'editor', 'Jane Doe', '199909092022031009', 'Pengolah Data', 'D322', 'jane@gmail.com', NULL, '2022-04-22 02:37:26', '1'),
(9, 'editor_jim', '$2y$10$EFiGq8To7nS3guM15Aq3GeBwOPY3/hf8S4bGtwLmh8epzU5tCscSm', 'editor', 'Jim Doe', '199707072022031003', 'Pengolah Data', 'D323', 'jim@gmail.com', NULL, '2022-04-14 03:05:50', '0'),
(10, 'editor_yanti', '$2y$10$24P21XSEN4FmNUHPgi5p1.B8WTQlfeO2ZRXNCZWYnfWMtmx3fp6/2', 'editor', 'Siti Maryanti', '199505042022032006', 'Pengolah Data', 'D323', 'siti.maryanti@gmail.com', 'ProfilePicture-editor_yanti1.jpeg', '2022-06-06 02:31:55', '0'),
(11, 'editor_dian', '$2y$10$2gZMwFwvd61NXk974EeVTejlXnLkVDRT04c45C04lobyM9Qtubj9C', 'editor', 'Rosdiana', '199306062022032002', 'Pengolah Data Keamanan', 'D322', 'rwonna4@gmail.com', 'ProfilePicture-editor_dian.jpg', '2022-06-06 02:10:32', '0'),
(12, 'korpok_james', '$2y$10$zW0iaVW75kVav8CcS/V39.A92I/yqV7TCbkYA3tCQ0jJeNV7xg3Ha', 'pimpinan', 'James Doe', '197001011990011001', 'Korpok', 'D321', 'james@gmail.com', NULL, '2022-06-06 02:09:20', '0'),
(13, 'editor_niah', '$2y$10$NKEllST7AL/Vr2X/J9LxTeLJ2gZNRxisS/fblbzaF6JyahIjtSGFK', 'editor', 'Niah', '199801302022032001', 'Pengolah Data', 'D321', 'fitria.chusniah@gmail.com', NULL, '2022-06-07 01:22:04', '0');

-- --------------------------------------------------------

--
-- Table structure for table `csirt`
--

CREATE TABLE `csirt` (
  `Id_CSIRT` int(11) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Nomor_Sertifikat` varchar(255) DEFAULT NULL,
  `Tgl_STR` date DEFAULT NULL,
  `Tgl_Launching` date DEFAULT NULL,
  `Nama_CSIRT` varchar(150) DEFAULT NULL,
  `Narahubung` text DEFAULT NULL,
  `Dokumen` text DEFAULT NULL,
  `Instansi` int(11) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `upadated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `archieved` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csirt`
--

INSERT INTO `csirt` (`Id_CSIRT`, `Status`, `Nomor_Sertifikat`, `Tgl_STR`, `Tgl_Launching`, `Nama_CSIRT`, `Narahubung`, `Dokumen`, `Instansi`, `Tahun`, `upadated_at`, `updated_by`, `archieved`) VALUES
(1, 'Sudah CSIRT', '005/CSIRT.01.02/BSSN/05/2021', '2021-05-05', '2021-05-05', 'BaliProv-CSIRT', 'I Made Widiartha, ST., MAP.-081237777674', '', 290, 2021, '2022-05-09 08:15:48', 'admin_master', '0'),
(2, 'Sudah CSIRT', '006/CSIRT.01.02/BSSN/05/2021', '2021-05-25', '2021-05-25', 'JambiProv-CSIRT', 'Faransisco, S.I.P., M.P.-082178168111, Moch. Mawardi, S.I.P-081369972298', '', 80, 2021, '2022-04-20 05:41:55', 'admin_master', '0'),
(3, 'Sudah CSIRT', '008/CSIRT.01.02/BSSN/05/2021', '2021-05-19', '2021-05-19', 'BengkuluProv-CSIRT', NULL, 'CSIRT-Provinsi_Bengkulu-20212.pdf', 146, 2021, '2022-04-18 05:38:21', 'admin_master', '0'),
(4, 'Sudah CSIRT', '010/CSIRT.01.02/BSSN/05/2021', '2021-05-27', '2021-05-27', 'PapuabaratProv-CSIRT', 'Zaenal Fanumbi, ST - 082238953683', 'CSIRT-Provinsi_Papua_Barat-2021.pdf', 537, 2021, '2022-04-21 01:35:40', 'editor_yanti', '0'),
(5, 'Sudah CSIRT', '012/CSIRT.01.02/BSSN/05/2021', '2021-06-08', NULL, 'BabelProv-CSIRT', NULL, NULL, 157, 2021, '2022-04-22 07:10:07', NULL, '0'),
(6, 'Sudah CSIRT', '013/CSIRT.01.02.01/BSSN/06/2021', '2021-06-02', '2021-06-02', 'KebumenKab-CSIRT', 'Sutoto Pranoto, S.Kom - 088238204878 ', '', 213, 2021, '2022-04-21 01:55:13', 'editor_yanti', '0'),
(7, 'Sudah CSIRT', '015/CSIRT.01.02/BSSN/06/2021', '2021-06-16', '2021-06-16', 'SumselProv-CSIRT', 'Marwanika,SH - 0711-355699/08117108871 ', 'CSIRT-Provinsi_Sumatera_Selatan-2021.pdf', 112, 2021, '2022-04-21 01:55:39', 'editor_yanti', '0'),
(8, 'Sudah CSIRT', '016/CSIRT.01.02/BSSN/06/2021', '2021-06-22', '2021-06-22', 'SulbarProv-CSIRT', 'Sudarmono, S.IP. - 082396663232 ', 'CSIRT-Provinsi_Sulawesi_Barat-2021.pdf', 419, 2021, '2022-04-21 01:56:02', 'editor_yanti', '0'),
(9, 'Sudah CSIRT', '017/CSIRT.01.02/BSSN/06/2021', '2021-06-29', '2021-10-28', 'SULSELPROV-CSIRT', 'H.Abunaim Sahar, S.Sos., M.M. - 08124240014 ', 'CSIRT-Provinsi_Sulawesi_Selatan-2021.pdf', 426, 2021, '2022-04-21 01:56:37', 'editor_yanti', '0'),
(10, 'Sudah CSIRT', '018/CSIRT.01.02/BSSN/07/2021', '2021-07-14', '2021-11-25', 'PapuaProv-CSIRT', 'Raja Oloan Siburian, SE - 082238930878 ', 'CSIRT-Provinsi_Papua-2021.pdf', 506, 2021, '2022-04-21 02:18:29', 'editor_yanti', '0'),
(11, 'Sudah CSIRT', '020/CSIRT.01.02/BSSN/08/2021', '2021-08-05', '2021-09-16', 'MalukuProv-CSIRT', 'Dra. NurenyY Tuarita, M.Si  - 0813-5122-1692 ', '', 483, 2021, '2022-04-21 02:19:06', 'editor_yanti', '0'),
(12, 'Sudah CSIRT', '030/CSIRT.01.02/BSSN/08/2021', '2021-08-04', '2021-09-13', 'BantenProv-CSIRT', 'Marli Subhiyat, S.Si., M.Si - 08568777888 ', 'CSIRT-Provinsi_Banten-2021.pdf', 165, 2021, '2022-04-22 07:04:35', 'editor_yanti', '0'),
(13, 'Sudah CSIRT', '031/CSIRT.01.02.01/BSSN/08/2021', '2021-08-12', '2021-10-06', 'PatiKab-CSIRT', NULL, '', 228, 2021, '2022-04-22 07:04:39', 'admin_master', '0'),
(14, 'Sudah CSIRT', 'xxx/CSIRT.01.02/BSSN/07/2021', '2021-06-17', '2021-10-22', 'KaltenProv-CSIRT', 'Billy Bareto, ST - 082156239895 ', '', 349, 2021, '2022-04-22 07:04:45', 'editor_yanti', '0'),
(15, 'Sudah CSIRT', '034/CSIRT.01.02.01/BSSN/09/2021', '2021-09-22', '2021-09-22', 'TrenggalekKab-CSIRT', NULL, '', 278, 2021, '2022-04-22 07:04:49', 'admin_master', '0'),
(16, 'Sudah CSIRT', '-', '2020-03-11', '2020-03-11', 'JatimProv-CSIRT', 'Aulia Bahar Pernama, S.Kom, M.ISM. - 08123280253 ', '', 251, 2020, '2022-04-22 07:04:52', 'editor_yanti', '0'),
(17, 'Sudah CSIRT', '-', '2020-08-11', '2020-08-11', 'GorontaloProv-CSIRT', 'Dr.Hi.M.Jamal Nganro, ST, M.Si. - 082292394334 ', '', 412, 2020, '2022-04-22 07:04:56', 'editor_yanti', '0'),
(18, 'Sudah CSIRT', '007/CSIRT.01.02/BSSN/09/2020 ', '2020-10-07', '2020-10-07', 'JatengProv-CSIRT', 'Subroto Budhi Utomo, S.Kom,. M.T. - 081325442423 ', 'CSIRT-Provinsi_Jawa_Tengah-2020.pdf', 209, 2020, '2022-04-22 07:04:59', 'editor_yanti', '0'),
(19, 'Sudah CSIRT', '008/CSIRT.01.02/BSSN/10/2020 ', '2020-10-14', '2020-10-14', 'JogjaProv-CSIRT', ' -  ', 'CSIRT-Provinsi_DI_Yogyakarta-2020.pdf', 245, 2020, '2022-04-28 03:13:57', 'editor_yanti', '0'),
(20, 'Sudah CSIRT', '002/CSIRT.01.02/BSSN/08/2020 ', '2020-07-21', '2020-07-21', 'SumbarProv-CSIRT', NULL, 'CSIRT-Provinsi_Sumatera_Barat-2020.pdf', 92, 2020, '2022-04-22 07:05:06', 'admin_master', '0'),
(21, 'Sudah CSIRT', '-', '2020-09-29', '2020-09-29', 'KepriProv-CSIRT', 'Donny Firmansyah, ST - (0771) 4575023/085264608882 ', '', 72, 2020, '2022-04-22 07:05:10', 'editor_yanti', '0'),
(22, 'Sudah CSIRT', '029/CSIRT.01.02/BSSN/07/2021', '2021-08-25', '2021-10-25', 'RiauProv-CSIRT', 'Debie Naheldha, SE - 08117575722 ', 'CSIRT-Provinsi_Riau-2021.pdf', 59, 2021, '2022-04-22 07:05:12', 'editor_yanti', '0'),
(23, 'Sudah CSIRT', '-', '2020-09-23', '2020-09-23', 'JabarProv-CSIRT', 'Tiomaida Seviana,H.H., S.H., MAP. - (022) 2502898/081321411970 ', '', 174, 2020, '2022-04-22 07:05:15', 'editor_yanti', '0'),
(24, 'Sudah CSIRT', '009/CSIRT.01.02/BSSN/11/2020 ', '2020-11-04', '2020-11-04', 'NTBProv-CSIRT', 'Mahmud, A.KS, M.Si - 08123781455 ', 'CSIRT-Provinsi_Nusa_Tenggara_Barat-2020.pdf', 300, 2020, '2022-04-22 07:05:18', 'editor_yanti', '0'),
(25, 'Sudah CSIRT', '010/CSIRT.01.02/BSSN/11/2020 ', '2020-11-12', '2020-11-12', 'KalselProv-CSIRT', 'Abdul Hafizh, S.Kom. - 082354333363 ', 'CSIRT-Provinsi_Kalimantan_Selatan-2020.pdf', 364, 2020, '2022-04-22 07:05:21', 'editor_yanti', '0'),
(26, 'Sudah CSIRT', '-', '2020-12-23', '2020-12-23', 'JakartaProv-CSIRT', 'Andrie Yuswanto - 021-3822357/08128560955 ', '', 202, 2020, '2022-04-22 07:05:24', 'editor_yanti', '0'),
(27, 'Sudah CSIRT', '025/CSIRT.01.02.01/BSSN/07/2021', '2021-07-21', '2020-11-20', 'MadiunKab-CSIRT', NULL, 'CSIRT-Pemkab_Madiun_-2021.pdf', 253, 2021, '2022-04-22 07:05:27', 'admin_master', '0'),
(28, 'Sudah CSIRT', '033/CSIRT.01.02.01/BSSN/11/2021', '2021-11-22', '2021-11-22', 'TangselKota-CSIRT', 'Jimmy Alberto, ST - 081242621422 ', 'CSIRT-Pemkot_Tangerang_Selatan-2021.pdf', 173, 2021, '2022-04-22 07:05:29', 'editor_yanti', '0'),
(29, 'Sudah CSIRT', '046/CSIRT.01.02.01/BSSN/12/2021', '2021-12-07', '2021-12-07', 'BanyumasKab-CSIRT', NULL, NULL, 217, 2021, '2022-04-22 07:05:33', 'admin_master', '0'),
(30, 'Sudah CSIRT', '045/CSIRT.01.02/BSSN/11/2021', '2021-11-16', '2021-11-16', 'KaltimProv-CSIRT', 'Agus Eko Santoso - 081933833882 ', '', 385, 2021, '2022-04-22 07:05:38', 'editor_yanti', '0'),
(31, 'Sudah CSIRT', '039/CSIRT.01.02.01/BSSN/11/2021', '2021-11-03', '2021-11-03', 'CirebonKota-CSIRT', 'Agus Riswandy, S.E - 089685998335 ', '', 198, 2021, '2022-04-22 07:05:40', 'editor_yanti', '0'),
(32, 'Sudah CSIRT', '040/CSIRT.01.02.01/BSSN/11/2021', '2021-11-17', '2021-12-01', 'GowaKab-CSIRT', 'Fahriansyah, ST - 085242070349 ', '', 432, 2021, '2022-04-22 07:05:42', 'editor_yanti', '0'),
(33, 'Sudah CSIRT', '012/CSIRT.01.02/BSSN/06/2021', '2021-06-08', '2021-06-08', 'BabelProv-CSIRT', NULL, NULL, 157, 2021, '2022-04-22 07:05:45', 'admin_master', '0'),
(34, 'Sudah CSIRT', '035/CSIRT.01.02.01/BSSN/10/2021', '2021-10-21', '2021-10-21', 'PalembangKota-CSIRT', 'Eko Mulyadi, S.Kom, MT - 08117103110 ', '', 126, 2021, '2022-04-22 07:05:48', 'editor_yanti', '0'),
(35, 'Sudah CSIRT', '053/CSIRT.01.02.01/BSSN/12/2021', '2021-12-14', '2021-12-15', 'BandungKota-CSIRT', NULL, '', 193, 2021, '2022-04-22 07:05:51', 'admin_master', '0'),
(36, 'Sudah CSIRT', '056/CSIRT.01.02.01/BSSN/08/2022', '2022-02-04', '2022-02-23', 'BatangKab-CSIRT', 'Muhammad Farid Hasyim, S.Kom - 085742182822 ', 'CSIRT-Pemkab_Batang-2022.pdf', 218, 2022, '2022-04-22 07:05:55', 'admin_master', '0'),
(37, 'Sudah CSIRT', '058/CSIRT.01.02.01/BSSN/02/2022', '2022-02-08', '2022-02-08', 'BogorKab-CSIRT', NULL, 'CSIRT-Pemkab_Bogor-2022.pdf', 180, 2022, '2022-04-22 07:05:57', 'admin_master', '0'),
(38, 'Sudah CSIRT', '059/CSIRT.01.02.01/BSSN/02/2022', '2022-02-08', '2022-02-08', 'SemarangKota-CSIRT', 'Siti Arkunah, S.Kom., M.Kom. - 08156509296 ', 'CSIRT-pemkot_Semarang-2022.pdf', 242, 2022, '2022-04-22 07:06:00', 'editor_yanti', '0'),
(39, 'Sudah CSIRT', '062/CSIRT.01.02/BSSN/03/2022', '2022-03-28', '2022-03-28', 'SumutProv-CSIRT', NULL, 'CSIRT-Provinsi_Sumatera_Utara-2022.pdf', 25, 2022, '2022-04-22 07:06:03', 'admin_master', '0'),
(40, 'Sudah CSIRT', '065/CSIRT.01.02/BSSN/04/2022', '2022-04-07', '2022-04-07', 'SulutProv-CSIRT', 'Huntoro, S.Si - 08229640769 ', 'CSIRT-Provinsi_Sulawesi_Utara-2022.pdf', 396, 2022, '2022-04-22 07:06:07', 'editor_yanti', '0'),
(41, 'Sudah CSIRT', '055/CSIRT.01.02.01/BSSN/02/2022', '2022-02-04', '2022-02-21', 'TangerangKota-CSIRT', 'BUDI HAMZAH PERMANA, SE, MM - 08119623490 ', 'CSIRT-Pemkot_Tangerang-2022.pdf', 172, 2022, '2022-04-22 07:06:10', 'editor_yanti', '0');

-- --------------------------------------------------------

--
-- Table structure for table `csm`
--

CREATE TABLE `csm` (
  `Id_CSM` int(11) NOT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Skor` double DEFAULT NULL,
  `Lv_Kematangan` varchar(255) DEFAULT NULL,
  `Dokumen` text DEFAULT NULL,
  `Instansi` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) NOT NULL,
  `archieved` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csm`
--

INSERT INTO `csm` (`Id_CSM`, `Tahun`, `Skor`, `Lv_Kematangan`, `Dokumen`, `Instansi`, `updated_at`, `updated_by`, `archieved`) VALUES
(1, 2020, 2.92, '3', 'Csm-Provinsi_Sumatera_Barat-2020.pdf', 92, '2022-04-28 03:02:08', 'editor_dian', '0'),
(2, 2020, 4.39, '4+', 'Csm-Provinsi_DI_Yogyakarta-2020.pdf', 245, '2022-04-28 03:16:34', 'editor_dian', '0'),
(3, 2020, 3.2, '3', 'Csm-Provinsi_Kepulauan_Riau-2020.pdf', 72, '2022-04-28 03:02:42', 'editor_dian', '0'),
(4, 2020, 4.06, '4', 'Csm-Provinsi_DKI_Jakarta-2020.pdf', 202, '2022-04-28 03:02:53', 'editor_dian', '0'),
(5, 2020, 3.95, '4', 'Csm-Provinsi_Jawa_Barat-2020.pdf', 174, '2022-04-28 03:03:02', 'editor_dian', '0'),
(6, 2020, 3.33, '3', 'Csm-Provinsi_Jawa_Tengah-2020.pdf', 209, '2022-04-28 03:03:11', 'editor_dian', '0'),
(7, 2020, 3.27, '3', 'Csm-Provinsi_Jawa_Timur-2020.pdf', 251, '2022-04-28 03:03:19', 'editor_dian', '0'),
(8, 2020, 3.11, '3', NULL, 361, '2022-04-28 06:30:43', 'admin_master', '0'),
(9, 2020, 2.89, '3', 'Csm-Provinsi_Nusa_Tenggara_Barat-2020.pdf', 300, '2022-04-28 03:05:11', 'editor_dian', '0'),
(10, 2020, 3.37, '3', 'Csm-Provinsi_Gorontalo-2020.pdf', 412, '2022-04-28 03:05:26', 'editor_dian', '0'),
(11, 2021, 3.95, '4', 'Csm-Provinsi_Sumatera_Selatan-20211.pdf', 112, '2022-04-28 03:05:46', 'editor_dian', '0'),
(12, 2021, 2.27, '2', 'Csm-Provinsi_Bengkulu-2021.pdf', 146, '2022-04-28 03:05:57', 'editor_dian', '0'),
(13, 2021, 2.42, '2', 'Csm-Provinsi_Riau-2021.pdf', 59, '2022-04-28 03:06:11', 'editor_dian', '0'),
(14, 2021, 2.68, '3', 'Csm-Provinsi_Jambi-2021.pdf', 80, '2022-04-28 03:06:22', 'editor_dian', '0'),
(15, 2021, 3.4, '3', 'Csm-Provinsi_Jawa_Tengah-2021.pdf', 209, '2022-04-28 03:06:34', 'editor_dian', '0'),
(16, 2021, 3.53, '3', 'Csm-Provinsi_Jawa_Timur-2021.pdf', 251, '2022-04-28 03:06:50', 'editor_dian', '0'),
(21, 2019, 3.53, '3', 'Csm-Provinsi_Jawa_Timur-2021.pdf', 251, '2022-05-10 07:18:03', 'editor_dian', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ikami`
--

CREATE TABLE `ikami` (
  `Id_IKAMI` int(11) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Hasil_IKAMI` varchar(255) NOT NULL,
  `Kategori_SE` varchar(255) NOT NULL,
  `Nilai` int(11) NOT NULL,
  `Dokumen` text DEFAULT NULL,
  `Instansi` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `archieved` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikami`
--

INSERT INTO `ikami` (`Id_IKAMI`, `Tahun`, `Hasil_IKAMI`, `Kategori_SE`, `Nilai`, `Dokumen`, `Instansi`, `updated_at`, `updated_by`, `archieved`) VALUES
(1, 2018, 'Tidak Layak', 'Tinggi', 285, 'Ikami-Provinsi_DKI_Jakarta-2018.pdf', 202, '2022-04-28 02:43:35', 'editor_dian', '0'),
(2, 2018, 'Baik', 'Tinggi', 547, 'Ikami-Provinsi_DI_Yogyakarta-2018.pdf', 245, '2022-04-28 03:15:45', 'editor_dian', '0'),
(3, 2018, 'Cukup Baik', 'Tinggi', 512, 'Ikami-Provinsi_Jawa_Barat-2018.pdf', 174, '2022-04-28 02:46:27', 'editor_dian', '0'),
(4, 2018, 'Tidak Layak', 'Tinggi', 274, 'Ikami-Provinsi_Jawa_Tengah-2018.pdf', 209, '2022-04-28 02:46:37', 'editor_dian', '0'),
(5, 2018, 'Tidak Layak', 'Tinggi', 243, 'Ikami-Provinsi_Jawa_Timur-20181.pdf', 251, '2022-04-28 02:42:58', 'editor_dian', '0'),
(6, 2019, 'Cukup Baik', 'Strategis', 571, 'Ikami-Provinsi_Jawa_Barat-2019.pdf', 174, '2022-04-28 02:49:30', 'editor_dian', '0'),
(7, 2020, 'Baik', 'Strategis', 610, 'Ikami-Provinsi_Jawa_Barat-2020.pdf', 174, '2022-04-28 02:50:10', 'editor_dian', '0'),
(8, 2020, 'Pemenuhan KK Dasar', 'Tinggi', 292, 'Ikami-Pemkab_Belitung-2020.pdf', 162, '2022-04-28 02:50:26', 'editor_dian', '0'),
(9, 2020, 'Pemenuhan KK Dasar', 'Tinggi', 285, 'Ikami-Pemkab_Bekasi-2020.pdf', 179, '2022-04-28 02:50:39', 'editor_dian', '0'),
(10, 2021, 'Tidak Layak', 'Strategis', 328, 'Ikami-Provinsi_Sumatera_Barat-2021.pdf', 92, '2022-04-28 02:51:00', 'editor_dian', '0'),
(11, 2021, 'Tidak Layak', 'Tinggi', 307, 'Ikami-Provinsi_Kepulauan_Riau-2021.pdf', 72, '2022-04-28 02:51:19', 'editor_dian', '0'),
(12, 2021, 'Pemenuhan KK Dasar', 'Tinggi', 384, 'Ikami-Pemkab_Belitung-2021.pdf', 162, '2022-04-28 02:51:39', 'editor_dian', '0'),
(13, 2021, 'Pemenuhan KK Dasar', 'Tinggi', 405, 'Ikami-Pemkot_Tangerang_Selatan-2021.pdf', 173, '2022-04-28 02:51:59', 'editor_dian', '0'),
(14, 2021, 'Baik', 'Strategis', 623, 'Ikami-Provinsi_Jawa_Barat-2021.pdf', 174, '2022-04-28 02:55:03', 'editor_dian', '0'),
(15, 2021, 'Pemenuhan KK Dasar', 'Tinggi', 318, 'Ikami-Pemkab_Sumedang-2021.pdf', 191, '2022-04-28 02:54:42', 'editor_dian', '0'),
(16, 2021, 'Pemenuhan KK Dasar', 'Strategis', 500, 'Ikami-Pemkot_Bekasi-2021.pdf', 195, '2022-04-28 02:55:25', 'editor_dian', '0'),
(17, 2021, 'Tidak Layak', 'Tinggi', 94, 'Ikami-Pemkot_Malang-2021.pdf', 254, '2022-04-28 02:55:44', 'editor_dian', '0'),
(18, 2021, 'Tidak Layak', 'Tinggi', 64, 'Ikami-Pemkab_Sumbawa_Barat-2021.pdf', 308, '2022-04-28 02:56:01', 'editor_dian', '0'),
(19, 2021, 'Tidak Layak', 'Tinggi', 155, NULL, 483, '2022-04-07 01:31:20', NULL, '0'),
(20, 2022, 'Pemenuhan KK Dasar', 'Tinggi', 438, 'Ikami-Pemkab_Karawang-2022.pdf', 186, '2022-04-28 02:57:42', 'editor_dian', '0'),
(23, 2022, 'Baik', 'Strategis', 626, 'Ikami-Provinsi_DI_Yogyakarta-2022.pdf', 245, '2022-04-28 07:16:55', 'admin_master', '0'),
(24, 2022, 'Tidak Layak', 'Tinggi', 186, 'Ikami-Pemkot_Batam-2022.pdf', 78, '2022-04-28 03:01:22', 'editor_dian', '0'),
(25, 2019, 'Tidak Layak', 'Tinggi', 186, 'Ikami-Pemkot_Batam-2022.pdf', 78, '2022-05-10 07:43:04', 'editor_dian', '1');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `Id_Instansi` int(11) NOT NULL,
  `Nama_Instansi` varchar(255) NOT NULL,
  `Provinsi` int(2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `archieved` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`Id_Instansi`, `Nama_Instansi`, `Provinsi`, `updated_at`, `updated_by`, `archieved`) VALUES
(1, 'Provinsi Aceh', 1, '2022-04-07 02:30:15', '', '0'),
(2, 'Pemkab Aceh Barat', 1, '2022-04-07 02:30:23', '', '0'),
(3, 'Pemkab Aceh Barat Daya', 1, '2022-04-07 02:32:22', '', '0'),
(4, 'Pemkab Aceh Besar', 1, '2022-04-07 02:32:22', '', '0'),
(5, 'Pemkab Aceh Jaya', 1, '2022-04-07 02:32:22', '', '0'),
(6, 'Pemkab Aceh Selatan', 1, '2022-04-07 02:34:21', '', '0'),
(7, 'Pemkab Aceh Singkil', 1, '2022-04-07 02:34:38', '', '0'),
(8, 'Pemkab Aceh Tamiang', 1, '2022-04-07 02:34:38', '', '0'),
(9, 'Pemkab Aceh Tengah', 1, '2022-04-07 02:34:38', '', '0'),
(10, 'Pemkab Aceh Tenggara', 1, '2022-04-07 02:34:38', '', '0'),
(11, 'Pemkab Aceh Timur', 1, '2022-04-07 02:34:38', '', '0'),
(12, 'Pemkab Aceh Utara', 1, '2022-04-07 02:34:38', '', '0'),
(13, 'Pemkab Bener Meriah', 1, '2022-04-07 02:34:38', '', '0'),
(14, 'Pemkab Bireuen', 1, '2022-04-07 02:34:38', '', '0'),
(15, 'Pemkab Gayo Lues', 1, '2022-04-07 02:34:38', '', '0'),
(16, 'Pemkab Nagan Raya', 1, '2022-04-07 02:34:38', '', '0'),
(17, 'Pemkab Pidie', 1, '2022-04-07 02:34:38', '', '0'),
(18, 'Pemkab Pidie Jaya', 1, '2022-04-07 02:34:38', '', '0'),
(19, 'Pemkab Simeulue', 1, '2022-04-07 02:34:38', '', '0'),
(20, 'Pemkot Banda Aceh', 1, '2022-04-07 02:34:38', '', '0'),
(21, 'Pemkot Langsa', 1, '2022-04-07 02:34:38', '', '0'),
(22, 'Pemkot Lhokseumawe', 1, '2022-04-07 02:34:38', '', '0'),
(23, 'Pemkot Sabang', 1, '2022-04-07 02:34:38', '', '0'),
(24, 'Pemkot Subulussalam', 1, '2022-04-07 02:30:43', '', '0'),
(25, 'Provinsi Sumatera Utara', 2, '2022-04-07 02:36:54', '', '0'),
(26, 'Pemkab Asahan', 2, '2022-04-07 02:36:54', '', '0'),
(27, 'Pemkab Batu Bara', 2, '2022-04-07 02:36:54', '', '0'),
(28, 'Pemkab Dairi', 2, '2022-04-07 02:36:54', '', '0'),
(29, 'Pemkab Deli Serdang', 2, '2022-04-07 02:36:54', '', '0'),
(30, 'Pemkab Humbang Hasundutan', 2, '2022-04-07 02:36:54', '', '0'),
(31, 'Pemkab Karo', 2, '2022-04-07 02:37:53', '', '0'),
(32, 'Pemkab Labuhanbatu', 2, '2022-04-07 02:37:53', '', '0'),
(33, 'Pemkab Labuhanbatu Selatan', 2, '2022-04-07 02:37:53', '', '0'),
(34, 'Pemkab Labuhanbatu Utara', 2, '2022-04-07 02:37:53', '', '0'),
(35, 'Pemkab Langkat', 2, '2022-04-07 02:37:53', '', '0'),
(36, 'Pemkab Mandailing Natal', 2, '2022-04-07 02:37:53', '', '0'),
(37, 'Pemkab Nias', 2, '2022-04-07 02:37:53', '', '0'),
(38, 'Pemkab Nias Barat', 2, '2022-04-07 02:37:53', '', '0'),
(39, 'Pemkab Nias Selatan', 2, '2022-04-07 02:37:53', '', '0'),
(40, 'Pemkab Nias Utara', 2, '2022-04-07 02:37:53', '', '0'),
(41, 'Pemkab Padang Lawas', 2, '2022-04-07 02:38:44', '', '0'),
(42, 'Pemkab Padang Lawas Utara', 2, '2022-04-07 02:38:44', '', '0'),
(43, 'Pemkab Pakpak Barat', 2, '2022-04-07 02:38:44', '', '0'),
(44, 'Pemkab Samosir', 2, '2022-04-07 02:38:44', '', '0'),
(45, 'Pemkab Serdang Bedagai', 2, '2022-04-07 02:38:44', '', '0'),
(46, 'Pemkab Simalungun', 2, '2022-04-07 02:38:44', '', '0'),
(47, 'Pemkab Tapanuli Selatan', 2, '2022-04-07 02:38:44', '', '0'),
(48, 'Pemkab Tapanuli Tengah', 2, '2022-04-07 02:38:44', '', '0'),
(49, 'Pemkab Tapanuli Utara', 2, '2022-04-07 02:38:44', '', '0'),
(50, 'Pemkab Toba', 2, '2022-04-07 02:38:44', '', '0'),
(51, 'Pemkot Binjai', 2, '2022-04-07 02:39:39', '', '0'),
(52, 'Pemkot Gunungsitoli', 2, '2022-04-07 02:39:39', '', '0'),
(53, 'Pemkot Medan', 2, '2022-04-07 02:39:39', '', '0'),
(54, 'Pemkot Padang Sidempuan', 2, '2022-04-07 02:39:39', '', '0'),
(55, 'Pemkot Pematangsiantar', 2, '2022-04-07 02:39:39', '', '0'),
(56, 'Pemkot Sibolga', 2, '2022-04-07 02:39:39', '', '0'),
(57, 'Pemkot Tanjung balai', 2, '2022-04-07 02:39:39', '', '0'),
(58, 'Pemkot Tebing Tinggi', 2, '2022-04-07 02:36:03', '', '0'),
(59, 'Provinsi Riau', 3, '2022-04-07 02:40:19', '', '0'),
(60, 'Pemkab Bengkalis', 3, '2022-04-07 02:40:28', '', '0'),
(61, 'Pemkab Indragiri Hilir', 3, '2022-04-07 02:40:33', '', '0'),
(62, 'Pemkab Indragiri Hulu', 3, '2022-04-07 02:40:38', '', '0'),
(63, 'Pemkab Kampar', 3, '2022-04-07 02:40:44', '', '0'),
(64, 'Pemkab Kepulauan Meranti', 3, '2022-04-07 02:40:52', '', '0'),
(65, 'Pemkab Kuatan Singingi', 3, '2022-04-07 02:40:58', '', '0'),
(66, 'Pemkab Pelalawan', 3, '2022-04-07 02:41:10', '', '0'),
(67, 'Pemkab Rokan Hilir', 3, '2022-04-07 02:41:18', '', '0'),
(68, 'Pemkab Rokan Hulu', 3, '2022-04-07 02:41:25', '', '0'),
(69, 'Pemkab Siak', 3, '2022-04-07 02:41:30', '', '0'),
(70, 'Pemkot Dumai', 3, '2022-04-07 02:41:35', '', '0'),
(71, 'Pemkot Pekanbaru', 3, '2022-04-07 02:40:06', '', '0'),
(72, 'Provinsi Kepulauan Riau', 4, '2022-04-07 02:44:23', '', '0'),
(73, 'Pemkab Lingga', 4, '2022-04-07 02:44:28', '', '0'),
(74, 'Pemkab Karimun', 4, '2022-04-07 02:44:32', '', '0'),
(75, 'Pemkab Natuna', 4, '2022-04-07 02:44:38', '', '0'),
(76, 'Pemkab Bintan', 4, '2022-04-07 02:44:41', '', '0'),
(77, 'Pemkab Anambas', 4, '2022-04-07 02:44:45', '', '0'),
(78, 'Pemkot Batam', 4, '2022-04-07 02:44:57', '', '0'),
(79, 'Pemkot Tanjung Pinang', 4, '2022-04-07 02:44:13', '', '0'),
(80, 'Provinsi Jambi', 5, '2022-04-07 02:45:55', '', '0'),
(81, 'Pemkab Batanghari', 5, '2022-04-07 02:45:58', '', '0'),
(82, 'Pemkab  Bungo', 5, '2022-04-07 02:46:00', '', '0'),
(83, 'Pemkab Kerinci', 5, '2022-04-07 02:46:04', '', '0'),
(84, 'Pemkab Merangin', 5, '2022-04-07 02:46:07', '', '0'),
(85, 'Pemkab Muaro Jambi', 5, '2022-04-07 02:46:11', '', '0'),
(86, 'Pemkab Sarolangun', 5, '2022-04-07 02:46:28', '', '0'),
(87, 'Pemkab Tanjung Jabung Barat', 5, '2022-04-07 02:46:31', '', '0'),
(88, 'Pemkab Tanjung Jabung Timur', 5, '2022-04-07 02:46:35', '', '0'),
(89, 'Pemkab Tebo', 5, '2022-04-07 02:46:38', '', '0'),
(90, 'Pemkot Jambi', 5, '2022-04-07 02:46:41', '', '0'),
(91, 'Pemkot Sungai Penuh', 5, '2022-04-07 02:45:45', '', '0'),
(92, 'Provinsi Sumatera Barat', 6, '2022-04-07 02:49:56', '', '0'),
(93, 'Pemkab Agam', 6, '2022-04-07 02:49:56', '', '0'),
(94, 'Pemkab Dharmasraya', 6, '2022-04-07 02:49:56', '', '0'),
(95, 'Pemkab Kepulauan Mentawai', 6, '2022-04-07 02:49:56', '', '0'),
(96, 'Pemkab Lima Puluh Kota', 6, '2022-04-07 02:49:56', '', '0'),
(97, 'Pemkab Padang Pariaman', 6, '2022-04-07 02:49:56', '', '0'),
(98, 'Pemkab Pasaman', 6, '2022-04-07 02:49:56', '', '0'),
(99, 'Pemkab Pasaman Barat', 6, '2022-04-07 02:49:56', '', '0'),
(100, 'Pemkab Pesisir Selatan', 6, '2022-04-07 02:49:56', '', '0'),
(101, 'Pemkab Sijunjung', 6, '2022-04-07 02:49:56', '', '0'),
(102, 'Pemkab Solok', 6, '2022-04-07 02:49:56', '', '0'),
(103, 'Pemkab Solok Selatan', 6, '2022-04-07 02:49:56', '', '0'),
(104, 'Pemkab Tanah Datar', 6, '2022-04-07 02:49:56', '', '0'),
(105, 'Pemkot Bukittinggi', 6, '2022-04-07 02:49:56', '', '0'),
(106, 'Pemkot Padang', 6, '2022-04-07 02:49:56', '', '0'),
(107, 'Pemkot Padang Panjang', 6, '2022-04-07 02:49:56', '', '0'),
(108, 'Pemkot Pariaman', 6, '2022-04-07 02:49:56', '', '0'),
(109, 'Pemkot Payakumbuh', 6, '2022-04-07 02:49:56', '', '0'),
(110, 'Pemkot Sawahlunto', 6, '2022-04-07 02:49:56', '', '0'),
(111, 'Pemkot Solok', 6, '2022-04-07 02:47:34', '', '0'),
(112, 'Provinsi Sumatera Selatan', 7, '2022-04-07 03:12:58', '', '0'),
(113, 'Pemkab Ogan Ilir', 7, '2022-04-07 04:16:33', '', '0'),
(114, 'Pemkab Ogan Komering Ilir', 7, '2022-04-07 04:16:50', '', '0'),
(115, 'Pemkab Ogan Komering Ulu', 7, '2022-04-07 04:16:50', '', '0'),
(116, 'Pemkab Ogan Komering Ulu Selatan ', 7, '2022-04-07 04:16:50', '', '0'),
(117, 'Pemkab Ogan Komering Ulu Timur', 7, '2022-04-07 04:16:50', '', '0'),
(118, 'Pemkab Musi Banyuasin', 7, '2022-04-07 04:16:50', '', '0'),
(119, 'Pemkab Musi Rawas Utara', 7, '2022-04-07 04:16:50', '', '0'),
(120, 'Pemkab Musi Rawas', 7, '2022-04-07 04:16:50', '', '0'),
(121, 'Pemkab Banyuasin', 7, '2022-04-07 04:16:50', '', '0'),
(122, 'Pemkab Muara Enim', 7, '2022-04-07 04:16:50', '', '0'),
(123, 'Pemkab Penukal Abab Lematang Ilir', 7, '2022-04-07 04:16:50', '', '0'),
(124, 'Pemkab Empat Lawang', 7, '2022-04-07 04:16:50', '', '0'),
(125, 'Pemkab Lahat', 7, '2022-04-07 04:16:50', '', '0'),
(126, 'Pemkot Palembang', 7, '2022-04-07 04:16:50', '', '0'),
(127, 'Pemkot Pagar Alam ', 7, '2022-04-07 04:16:50', '', '0'),
(128, 'Pemkot Lubuklinggau', 7, '2022-04-07 04:16:50', '', '0'),
(129, 'Pemkot Prabumulih', 7, '2022-04-07 02:50:56', '', '0'),
(130, 'Provinsi Lampung', 8, '2022-04-07 04:19:16', '', '0'),
(131, 'Pemkab Lampung Barat', 8, '2022-04-07 04:19:16', '', '0'),
(132, 'Pemkab Lampung Selatan', 8, '2022-04-07 04:19:16', '', '0'),
(133, 'Pemkab Lampung Tengah', 8, '2022-04-07 04:19:16', '', '0'),
(134, 'Pemkab Lampung Timur', 8, '2022-04-07 04:19:16', '', '0'),
(135, 'Pemkab Lampung Utara', 8, '2022-04-07 04:19:16', '', '0'),
(136, 'Pemkab Mesuji', 8, '2022-04-07 04:19:16', '', '0'),
(137, 'Pemkab Pesisir Barat', 8, '2022-04-07 04:19:16', '', '0'),
(138, 'Pemkab Pesawaran', 8, '2022-04-07 04:19:16', '', '0'),
(139, 'Pemkab Pringsewu', 8, '2022-04-07 04:19:16', '', '0'),
(140, 'Pemkab Tanggamus', 8, '2022-04-07 04:19:16', '', '0'),
(141, 'Pemkab Tulang Bawang', 8, '2022-04-07 04:19:16', '', '0'),
(142, 'Pemkab Tulang Bawang Barat', 8, '2022-04-07 04:19:16', '', '0'),
(143, 'Pemkab Way Kanan', 8, '2022-04-07 04:19:16', '', '0'),
(144, 'Pemkot Bandar Lampung', 8, '2022-04-07 04:19:16', '', '0'),
(145, 'Pemkot Metro', 8, '2022-04-07 04:19:16', '', '0'),
(146, 'Provinsi Bengkulu', 9, '2022-04-07 04:20:56', '', '0'),
(147, 'Pemkab Rejang Lebong', 9, '2022-04-07 04:20:56', '', '0'),
(148, 'Pemkab Bengkulu Selatan', 9, '2022-04-07 04:20:56', '', '0'),
(149, 'Pemkab Bengkulu Tengah', 9, '2022-04-07 04:20:56', '', '0'),
(150, 'Pemkab Bengkulu Utara', 9, '2022-04-07 04:20:56', '', '0'),
(151, 'Pemkab Mukomuko', 9, '2022-04-07 04:20:56', '', '0'),
(152, 'Pemkab Lebong', 9, '2022-04-07 04:20:56', '', '0'),
(153, 'Pemkab Kepahiang', 9, '2022-04-07 04:20:56', '', '0'),
(154, 'Pemkab Seluma', 9, '2022-04-07 04:20:56', '', '0'),
(155, 'Pemkab Kaur', 9, '2022-04-07 04:20:56', '', '0'),
(156, 'Pemkot Bengkulu', 9, '2022-04-07 04:20:56', '', '0'),
(157, 'Provinsi Kepulauan Bangka Belitung', 10, '2022-04-07 04:21:58', '', '0'),
(158, 'Pemkab Bangka', 10, '2022-04-20 02:53:55', 'admin_master', '0'),
(159, 'Pemkab Bangka Selatan', 10, '2022-04-07 04:21:58', '', '0'),
(160, 'Pemkab Bangka Barat', 10, '2022-04-07 04:21:58', '', '0'),
(161, 'Pemkab Bangka Tengah', 10, '2022-04-07 04:21:58', '', '0'),
(162, 'Pemkab Belitung', 10, '2022-04-07 04:21:58', '', '0'),
(163, 'Pemkab Belitung Timur', 10, '2022-04-07 04:21:58', '', '0'),
(164, 'Pemkot Pangkalpinang', 10, '2022-04-07 04:21:58', '', '0'),
(165, 'Provinsi Banten', 11, '2022-04-07 04:23:41', '', '0'),
(166, 'Pemkab Lebak', 11, '2022-04-07 04:23:41', '', '0'),
(167, 'Pemkab Pandeglang', 11, '2022-04-07 04:23:41', '', '0'),
(168, 'Pemkab Serang', 11, '2022-04-07 04:23:41', '', '0'),
(169, 'Pemkab Tangerang', 11, '2022-04-07 04:23:41', '', '0'),
(170, 'Pemkot Cilegon', 11, '2022-04-07 04:23:41', '', '0'),
(171, 'Pemkot Serang', 11, '2022-04-07 04:23:41', '', '0'),
(172, 'Pemkot Tangerang', 11, '2022-04-07 04:23:41', '', '0'),
(173, 'Pemkot Tangerang Selatan', 11, '2022-04-07 04:23:41', '', '0'),
(174, 'Provinsi Jawa Barat', 12, '2022-04-07 04:27:26', '', '0'),
(175, 'Pemkab Purwakarta', 12, '2022-04-07 04:27:26', '', '0'),
(176, 'Pemkab Sukabumi', 12, '2022-04-07 04:27:26', '', '0'),
(177, 'Pemkab Bandung', 12, '2022-04-07 04:27:26', '', '0'),
(178, 'Pemkab Bandung Barat', 12, '2022-04-07 04:27:26', '', '0'),
(179, 'Pemkab Bekasi', 12, '2022-04-07 04:27:26', '', '0'),
(180, 'Pemkab Bogor', 12, '2022-04-07 04:27:26', '', '0'),
(181, 'Pemkab Ciamis', 12, '2022-04-07 04:27:26', '', '0'),
(182, 'Pemkab Cianjur', 12, '2022-04-07 04:27:26', '', '0'),
(183, 'Pemkab Cirebon', 12, '2022-04-07 04:27:26', '', '0'),
(184, 'Pemkab Garut', 12, '2022-04-07 04:27:26', '', '0'),
(185, 'Pemkab Indramayu', 12, '2022-04-07 04:27:26', '', '0'),
(186, 'Pemkab Karawang', 12, '2022-04-07 04:27:26', '', '0'),
(187, 'Pemkab Kuningan', 12, '2022-04-07 04:27:26', '', '0'),
(188, 'Pemkab Majalengka', 12, '2022-04-07 04:27:26', '', '0'),
(189, 'Pemkab Pangandaran', 12, '2022-04-07 04:27:26', '', '0'),
(190, 'Pemkab Subang', 12, '2022-04-07 04:27:26', '', '0'),
(191, 'Pemkab Sumedang', 12, '2022-04-07 04:27:26', '', '0'),
(192, 'Pemkab Tasikmalaya', 12, '2022-04-07 04:27:26', '', '0'),
(193, 'Pemkot Bandung', 12, '2022-04-07 04:27:26', '', '0'),
(194, 'Pemkot Banjar', 12, '2022-04-07 04:27:26', '', '0'),
(195, 'Pemkot Bekasi', 12, '2022-04-07 04:27:26', '', '0'),
(196, 'Pemkot Bogor', 12, '2022-04-07 04:27:26', '', '0'),
(197, 'Pemkot Cimahi', 12, '2022-04-07 04:27:26', '', '0'),
(198, 'Pemkot Cirebon', 12, '2022-04-07 04:27:26', '', '0'),
(199, 'Pemkot Depok', 12, '2022-04-07 04:27:26', '', '0'),
(200, 'Pemkot Sukabumi', 12, '2022-04-07 04:27:26', '', '0'),
(201, 'Pemkot Tasikmalaya', 12, '2022-04-07 04:27:26', '', '0'),
(202, 'Provinsi DKI Jakarta', 13, '2022-04-07 04:28:27', '', '0'),
(203, 'Pemkab Kepulauan Seribu', 13, '2022-04-07 04:28:27', '', '0'),
(204, 'Pemkot Jakarta Barat', 13, '2022-04-07 04:28:27', '', '0'),
(205, 'Pemkot Jakarta Pusat', 13, '2022-04-07 04:28:27', '', '0'),
(206, 'Pemkot Jakarta Selatan', 13, '2022-04-07 04:28:27', '', '0'),
(207, 'Pemkot Jakarta Timur', 13, '2022-04-07 04:28:27', '', '0'),
(208, 'Pemkot Jakarta Utara', 13, '2022-04-07 04:28:27', '', '0'),
(209, 'Provinsi Jawa Tengah', 14, '2022-04-07 04:33:53', '', '0'),
(210, 'Pemkab Pekalongan', 14, '2022-04-07 04:33:53', '', '0'),
(211, 'Pemkab Grobogan', 14, '2022-04-07 04:33:53', '', '0'),
(212, 'Pemkab Demak', 14, '2022-04-07 04:33:53', '', '0'),
(213, 'Pemkab Kebumen', 14, '2022-04-07 04:33:53', '', '0'),
(214, 'Pemkab Cilacap ', 14, '2022-04-07 04:33:53', '', '0'),
(215, 'Pemkab Purbalingga', 14, '2022-04-07 04:33:53', '', '0'),
(216, 'Pemkab Banjarnegara', 14, '2022-04-07 04:33:53', '', '0'),
(217, 'Pemkab Banyumas', 14, '2022-04-07 04:33:53', '', '0'),
(218, 'Pemkab Batang', 14, '2022-04-07 04:33:53', '', '0'),
(219, 'Pemkab Blora', 14, '2022-04-07 04:33:53', '', '0'),
(220, 'Pemkab Boyolali', 14, '2022-04-07 04:33:53', '', '0'),
(221, 'Pemkab Brebes', 14, '2022-04-07 04:33:53', '', '0'),
(222, 'Pemkab Jepara', 14, '2022-04-07 04:33:53', '', '0'),
(223, 'Pemkab Karanganyar', 14, '2022-04-07 04:33:53', '', '0'),
(224, 'Pemkab Kendal', 14, '2022-04-07 04:33:53', '', '0'),
(225, 'Pemkab Klaten', 14, '2022-04-07 04:33:53', '', '0'),
(226, 'Pemkab Kudus', 14, '2022-04-07 04:33:53', '', '0'),
(227, 'Pemkab Magelang', 14, '2022-04-07 04:33:53', '', '0'),
(228, 'Pemkab Pati', 14, '2022-04-07 04:33:53', '', '0'),
(229, 'Pemkab Pemalang', 14, '2022-04-07 04:33:53', '', '0'),
(230, 'Pemkab Purworejo', 14, '2022-04-07 04:33:53', '', '0'),
(231, 'Pemkab Rembang', 14, '2022-04-07 04:33:53', '', '0'),
(232, 'Pemkab Semarang', 14, '2022-04-07 04:33:53', '', '0'),
(233, 'Pemkab Sragen', 14, '2022-04-07 04:33:53', '', '0'),
(234, 'Pemkab Sukoharjo', 14, '2022-04-07 04:33:53', '', '0'),
(235, 'Pemkab Tegal', 14, '2022-04-07 04:33:53', '', '0'),
(236, 'Pemkab Temanggung', 14, '2022-04-07 04:33:53', '', '0'),
(237, 'Pemkab Wonogiri', 14, '2022-04-07 04:33:53', '', '0'),
(238, 'Pemkab Wonosobo', 14, '2022-04-07 04:33:53', '', '0'),
(239, 'Pemkot Magelang', 14, '2022-04-07 04:33:53', '', '0'),
(240, 'Pemkot Pekalongan', 14, '2022-04-07 04:33:53', '', '0'),
(241, 'Pemkot Salatiga', 14, '2022-04-07 04:33:53', '', '0'),
(242, 'Pemkot Semarang', 14, '2022-04-18 05:56:27', 'admin_master', '0'),
(243, 'Pemkot Surakarta', 14, '2022-04-07 04:33:53', '', '0'),
(244, 'Pemkot Tegal', 14, '2022-04-07 04:33:53', '', '0'),
(245, 'Provinsi DI Yogyakarta', 15, '2022-04-28 03:12:58', '', '0'),
(246, 'Pemkab Gunung Kidul', 15, '2022-04-07 04:34:44', '', '0'),
(247, 'Pemkab Kulon Progo', 15, '2022-04-07 04:34:48', '', '0'),
(248, 'Pemkab Bantul', 15, '2022-04-07 04:34:51', '', '0'),
(249, 'Pemkab Sleman', 15, '2022-04-07 04:34:54', '', '0'),
(250, 'Pemkot Yogyakarta', 15, '2022-04-07 04:34:58', '', '0'),
(251, 'Provinsi Jawa Timur', 16, '2022-04-07 06:04:28', '', '0'),
(252, 'Pemkab Pacitan', 16, '2022-04-12 03:54:24', '', '0'),
(253, 'Pemkab Madiun ', 16, '2022-04-13 06:10:42', 'admin_master', '0'),
(254, 'Pemkot Malang', 16, '2022-04-22 01:24:19', 'admin_master', '0'),
(255, 'Pemkab Ponorogo ', 16, '2022-04-22 01:25:57', 'admin_master', '0'),
(256, 'Pemkab Sumenep ', 16, '2022-05-11 01:23:18', '', '0'),
(257, 'Pemkab Jombang', 16, '2022-05-11 01:23:23', '', '0'),
(258, 'Pemkab Bangkalan', 16, '2022-05-11 01:23:29', '', '0'),
(259, 'Pemkab Blitar', 16, '2022-05-11 01:23:37', '', '0'),
(260, 'Pemkab Banyuwangi', 16, '2022-05-11 01:23:42', '', '0'),
(261, 'Pemkab Bojonegoro', 16, '2022-05-11 01:23:56', '', '0'),
(262, 'Pemkab Bondowoso', 16, '2022-05-11 01:24:02', '', '0'),
(263, 'Pemkab Gresik', 16, '2022-05-11 01:24:08', '', '0'),
(264, 'Pemkab Jember', 16, '2022-05-11 01:24:18', '', '0'),
(265, 'Pemkab Kediri', 16, '2022-05-11 01:24:25', '', '0'),
(266, 'Pemkab Lamongan', 16, '2022-05-11 01:24:30', '', '0'),
(267, 'Pemkab Lumajang', 16, '2022-05-11 01:24:40', '', '0'),
(268, 'Pemkab Magetan', 16, '2022-05-11 01:24:52', '', '0'),
(269, 'Pemkab Mojokerto', 16, '2022-05-11 01:24:57', '', '0'),
(270, 'Pemkab Nganjuk', 16, '2022-05-11 01:25:00', '', '0'),
(271, 'Pemkab Ngawi', 16, '2022-05-11 01:25:07', '', '0'),
(272, 'Pemkab Pamekasan', 16, '2022-05-11 01:25:14', '', '0'),
(273, 'Pemkab Pasuruan', 16, '2022-05-11 01:25:20', '', '0'),
(274, 'Pemkab Probolinggo', 16, '2022-05-11 01:25:25', '', '0'),
(275, 'Pemkab Sampang', 16, '2022-05-11 01:25:51', '', '0'),
(276, 'Pemkab Sidoarjo', 16, '2022-05-11 01:25:55', '', '0'),
(277, 'Pemkab Situbondo', 16, '2022-05-11 01:26:00', '', '0'),
(278, 'Pemkab Trenggalek', 16, '2022-05-11 01:26:06', '', '0'),
(279, 'Pemkab Tuban', 16, '2022-05-11 01:26:12', '', '0'),
(280, 'Pemkab Tulungagung', 16, '2022-05-11 01:26:16', '', '0'),
(281, 'Pemkot Batu', 16, '2022-05-11 01:26:20', '', '0'),
(282, 'Pemkot Biltar', 16, '2022-05-11 01:26:25', '', '0'),
(283, 'Pemkot Kediri', 16, '2022-05-11 01:26:38', '', '0'),
(284, 'Pemkot Madiun', 16, '2022-05-11 01:26:42', '', '0'),
(285, 'Pemkot Malang', 16, '2022-05-11 01:26:46', '', '0'),
(286, 'Pemkot Mojokerto', 16, '2022-05-11 01:26:51', '', '0'),
(287, 'Pemkot Pasuruan', 16, '2022-05-11 01:26:55', '', '0'),
(288, 'Pemkot Probolinggo', 16, '2022-05-11 01:26:59', '', '0'),
(289, 'Pemkot Surabaya', 16, '2022-04-07 06:04:17', '', '0'),
(290, 'Provinsi Bali', 17, '2022-04-07 07:56:41', '', '0'),
(291, 'Pemkab Jembrana', 17, '2022-05-11 01:27:15', '', '0'),
(292, 'Pemkab Klungkung', 17, '2022-05-11 01:27:22', '', '0'),
(293, 'Pemkab Gianyar', 17, '2022-05-11 01:27:35', '', '0'),
(294, 'Pemkab Badung', 17, '2022-05-11 01:27:40', '', '0'),
(295, 'Pemkab Bangli', 17, '2022-05-11 01:27:44', '', '0'),
(296, 'Pemkab Buleleng', 17, '2022-05-11 01:27:50', '', '0'),
(297, 'Pemkab Karangasem', 17, '2022-05-11 01:27:55', '', '0'),
(298, 'Pemkab Tabanan', 17, '2022-05-11 01:27:59', '', '0'),
(299, 'Pemkot Denpasar', 17, '2022-04-07 07:56:25', '', '0'),
(300, 'Provinsi Nusa Tenggara Barat', 18, '2022-05-11 01:28:48', '', '0'),
(301, 'Pemkab Bima', 18, '2022-05-11 01:29:37', '', '0'),
(302, 'Pemkab Dompu', 18, '2022-05-11 01:29:45', '', '0'),
(303, 'Pemkab Lombok Barat', 18, '2022-05-11 01:29:55', '', '0'),
(304, 'Pemkab Lombok Tengah', 18, '2022-05-11 01:30:10', '', '0'),
(305, 'Pemkab Lombok Timur', 18, '2022-05-11 01:30:26', '', '0'),
(306, 'Pemkab Lombok Utara', 18, '2022-05-11 01:30:43', '', '0'),
(307, 'Pemkab Sumbawa', 18, '2022-05-11 01:30:55', '', '0'),
(308, 'Pemkab Sumbawa Barat', 18, '2022-05-11 01:31:04', '', '0'),
(309, 'Pemkot Bima', 18, '2022-05-11 01:31:11', '', '0'),
(310, 'Pemkot Mataram', 18, '2022-05-11 01:31:18', '', '0'),
(311, 'Provinsi Nusa Tenggara Timur', 19, '2022-05-11 01:28:56', '', '0'),
(312, 'Pemkab Rote Ndao', 19, '2022-05-11 01:34:04', '', '0'),
(313, 'Pemkab Alor', 19, '2022-05-11 01:34:14', '', '0'),
(314, 'Pemkab Belu', 19, '2022-05-11 01:34:26', '', '0'),
(315, 'Pemkab Ende', 19, '2022-05-11 01:34:31', '', '0'),
(316, 'Pemkab Flores Timur', 19, '2022-05-11 01:34:47', '', '0'),
(317, 'Pemkab Kupang', 19, '2022-05-11 01:34:55', '', '0'),
(318, 'Pemkab Lembata', 19, '2022-05-11 01:35:07', '', '0'),
(319, 'Pemkab Malaka', 19, '2022-05-11 01:35:32', '', '0'),
(320, 'Pemkab Manggarai', 19, '2022-05-11 01:35:39', '', '0'),
(321, 'Pemkab Manggarai Barat', 19, '2022-05-11 01:35:45', '', '0'),
(322, 'Pemkab Manggarai Timur', 19, '2022-05-11 01:37:15', '', '0'),
(323, 'Pemkab Nagekeo', 19, '2022-05-11 01:37:21', '', '0'),
(324, 'Pemkab Ngada', 19, '2022-05-11 01:37:27', '', '0'),
(325, 'Pemkab Sabu Raijua', 19, '2022-05-11 01:37:35', '', '0'),
(326, 'Pemkab Sikka', 19, '2022-05-11 01:37:51', '', '0'),
(327, 'Pemkab Sumba Barat', 19, '2022-05-11 01:38:04', '', '0'),
(328, 'Pemkab Sumba Barat Daya', 19, '2022-05-11 01:38:13', '', '0'),
(329, 'Pemkab Sumba Tengah', 19, '2022-05-11 01:38:19', '', '0'),
(330, 'Pemkab Sumba Timur', 19, '2022-05-11 01:38:29', '', '0'),
(331, 'Pemkab Timor Tengah Selatan', 19, '2022-05-11 01:38:35', '', '0'),
(332, 'Pemkab Timor Tengah Utara', 19, '2022-05-11 01:38:43', '', '0'),
(333, 'Pemkot Kupang', 19, '2022-05-11 01:38:53', '', '0'),
(334, 'Provinsi Kalimantan Barat', 20, '2022-05-11 01:31:50', '', '0'),
(335, 'Pemkab Sekadau', 20, '2022-05-11 01:39:34', '', '0'),
(336, 'Pemkab Landak', 20, '2022-05-11 01:40:29', '', '0'),
(337, 'Pemkab Sambas', 20, '2022-05-11 01:40:36', '', '0'),
(338, 'Pemkab Bengkayang', 20, '2022-05-11 01:40:43', '', '0'),
(339, 'Pemkab Kapuas Hulu', 20, '2022-05-11 01:40:52', '', '0'),
(340, 'Pemkab Kayong Utara', 20, '2022-05-11 01:41:03', '', '0'),
(341, 'Pemkab Ketapang', 20, '2022-05-11 01:41:22', '', '0'),
(342, 'Pemkab Kubu Raya', 20, '2022-05-11 01:41:38', '', '0'),
(343, 'Pemkab Melawi', 20, '2022-05-11 01:41:45', '', '0'),
(344, 'Pemkab Mempawah', 20, '2022-05-11 01:41:51', '', '0'),
(345, 'Pemkab Sanggau', 20, '2022-05-11 01:42:02', '', '0'),
(346, 'Pemkab Sintang', 20, '2022-05-11 01:42:09', '', '0'),
(347, 'Pemkot Pontianak', 20, '2022-05-11 01:42:15', '', '0'),
(348, 'Pemkot Sikawang', 20, '2022-05-11 01:42:20', '', '0'),
(349, 'Provinsi Kalimantan Tengah', 21, '2022-05-11 01:39:39', '', '0'),
(350, 'Pemkot Palangkaraya', 21, '2022-05-11 01:44:34', '', '0'),
(351, 'Pemkab Barito Utara', 21, '2022-05-11 01:44:42', '', '0'),
(352, 'Pemkab Barito Selatan', 21, '2022-05-11 01:45:11', '', '0'),
(353, 'Pemkab Barito Timur', 21, '2022-05-11 01:45:15', '', '0'),
(354, 'Pemkab Gunung Mas', 21, '2022-05-11 01:45:19', '', '0'),
(355, 'Pemkab Kapuas', 21, '2022-05-11 01:45:23', '', '0'),
(356, 'Pemkab Katingan', 21, '2022-05-11 01:45:29', '', '0'),
(357, 'Pemkab Kotawaringin Barat', 21, '2022-05-11 01:45:33', '', '0'),
(358, 'Pemkab Kotawaringin Timur', 21, '2022-05-11 01:45:40', '', '0'),
(359, 'Pemkab Lamandau', 21, '2022-05-11 01:45:45', '', '0'),
(360, 'Pemkab Murung Raya', 21, '2022-05-11 01:45:49', '', '0'),
(361, 'Pemkab Pulang Pisau', 21, '2022-05-11 01:45:53', '', '0'),
(362, 'Pemkab Sukamara', 21, '2022-05-11 01:45:58', '', '0'),
(363, 'Pemkab Seruyan', 21, '2022-05-11 01:44:27', '', '0'),
(364, 'Provinsi Kalimantan Selatan', 22, '2022-05-11 01:44:22', '', '0'),
(365, 'Pemkab Hulu Sungai Utara', 23, '2022-05-11 01:46:26', '', '0'),
(366, 'Pemkab Hulu Sungai Selatan', 23, '2022-05-11 01:56:07', '', '0'),
(367, 'Pemkab Hulu Sungai Tengah', 23, '2022-05-11 01:56:41', '', '0'),
(368, 'Pemkab Balangan', 23, '2022-05-11 01:56:50', '', '0'),
(369, 'Pemkab Banjar', 23, '2022-05-11 01:56:53', '', '0'),
(370, 'Pemkab Barito Kuala', 23, '2022-05-11 01:57:01', '', '0'),
(371, 'Pemkab Kotabaru', 24, '2022-05-11 01:57:05', '', '0'),
(372, 'Pemkab Tabalong', 23, '2022-05-11 01:57:10', '', '0'),
(373, 'Pemkab Tanah Bumbu', 23, '2022-05-11 01:57:14', '', '0'),
(374, 'Pemkab Tanah Laut', 23, '2022-05-11 01:57:19', '', '0'),
(375, 'Pemkab Tapin', 23, '2022-05-11 01:57:22', '', '0'),
(376, 'Pemkot Banjarbaru', 23, '2022-05-11 01:57:28', '', '0'),
(377, 'Pemkot Banjarmasin', 23, '2022-05-11 01:57:32', '', '0'),
(378, 'Provinsi Kalimantan Utara', 23, '2022-05-11 01:46:08', '', '0'),
(379, 'Pemkab Bulungan', 23, '2022-05-11 02:03:12', '', '0'),
(380, 'Pemkab Tana Tidung', 23, '2022-05-11 02:03:18', '', '0'),
(381, 'Pemkab Bulungan', 23, '2022-05-11 02:03:23', '', '0'),
(382, 'Pemkab Malinau', 23, '2022-05-11 02:03:34', '', '0'),
(383, 'Pemkab Nunukan', 23, '2022-05-11 02:03:39', '', '0'),
(384, 'Pemkot Tarakan', 23, '2022-05-11 02:03:45', '', '0'),
(385, 'Provinsi Kalimantan Timur', 24, '2022-05-11 02:02:15', '', '0'),
(386, 'Pemkab Berau', 24, '2022-05-11 02:06:07', '', '0'),
(387, 'Pemkab Kutai Kartanegara', 24, '2022-05-11 02:06:15', '', '0'),
(388, 'Pemkab Kutai Barat', 24, '2022-05-11 02:06:25', '', '0'),
(389, 'Pemkab Kutai Timur', 24, '2022-05-11 02:06:29', '', '0'),
(390, 'Pemkab Mahakam Ulu', 24, '2022-05-11 02:06:37', '', '0'),
(391, 'Pemkab Paser', 24, '2022-05-11 02:06:43', '', '0'),
(392, 'Pemkab Penajam Paser Utara', 24, '2022-05-11 02:06:57', '', '0'),
(393, 'Pemkot Balikpapan', 24, '2022-05-11 02:07:02', '', '0'),
(394, 'Pemkot Bontang', 24, '2022-05-11 02:07:06', '', '0'),
(395, 'Pemkot Samarinda', 24, '2022-05-11 02:07:13', '', '0'),
(396, 'Provinsi Sulawesi Utara', 25, '2022-05-11 02:05:56', '', '0'),
(397, 'Pemkab Bolaang Mongondow', 25, '2022-05-11 02:10:11', '', '0'),
(398, 'Pemkab Bolaang Mongondow Selatan', 25, '2022-05-11 02:11:27', '', '0'),
(399, 'Pemkab Bolaang Mongondow Timur', 25, '2022-05-11 02:11:40', '', '0'),
(400, 'Pemkab Bolaang Mongondow Utara', 25, '2022-05-11 02:11:51', '', '0'),
(401, 'Pemkab Kepulauan Sangihe', 25, '2022-05-11 02:12:07', '', '0'),
(402, 'Pemkab Kepulauan Siau Tagulandang Biaro', 25, '2022-05-11 02:12:16', '', '0'),
(403, 'Pemkab Kepulauan Talaud', 25, '2022-05-11 02:13:07', '', '0'),
(404, 'Pemkab Minahasa', 25, '2022-05-11 02:13:52', '', '0'),
(405, 'Pemkab Minahasa Selatan', 25, '2022-05-11 02:13:47', '', '0'),
(406, 'Pemkab Minahasa Tenggara', 25, '2022-05-11 02:13:41', '', '0'),
(407, 'Pemkab Minahasa Utara', 25, '2022-05-11 02:13:36', '', '0'),
(408, 'Pemkot Bitung', 25, '2022-05-11 02:13:30', '', '0'),
(409, 'Pemkot Kotamobagu', 25, '2022-05-11 02:13:26', '', '0'),
(410, 'Pemkot Manado', 25, '2022-05-11 02:13:21', '', '0'),
(411, 'Pemkot Tomohon', 25, '2022-05-11 02:13:14', '', '0'),
(412, 'Provinsi Gorontalo', 26, '2022-05-11 02:08:03', '', '0'),
(413, 'Pemkab Pohuwato ', 26, '2022-05-11 02:14:38', '', '0'),
(414, 'Pemkab Boalemo', 26, '2022-05-11 02:14:34', '', '0'),
(415, 'Pemkab Gorontalo', 26, '2022-05-11 02:14:31', '', '0'),
(416, 'Pemkab Gorontalo Utara', 26, '2022-05-11 02:14:28', '', '0'),
(417, 'Pemkab Bone Bolango', 26, '2022-05-11 02:14:24', '', '0'),
(418, 'Pemkot Gorontalo', 26, '2022-05-11 02:14:21', '', '0'),
(419, 'Provinsi Sulawesi Barat', 27, '2022-05-11 02:14:12', '', '0'),
(420, 'Pemkab Majene', 27, '2022-05-11 02:15:05', '', '0'),
(421, 'Pemkab Mamase', 27, '2022-05-11 02:15:09', '', '0'),
(422, 'Pemkab Mamuju', 27, '2022-05-11 02:15:15', '', '0'),
(423, 'Pemkab Mamuju Tengah', 27, '2022-05-11 02:15:20', '', '0'),
(424, 'Pemkab Pasangkayu', 27, '2022-05-11 02:15:27', '', '0'),
(425, 'Pemkab Polewali Mandar', 27, '2022-05-11 02:15:33', '', '0'),
(426, 'Provinsi Sulawesi Selatan', 28, '2022-05-11 02:14:53', '', '0'),
(427, 'Pemkab Bantaeng', 28, '2022-05-11 02:16:20', '', '0'),
(428, 'Pemkab Barru', 28, '2022-05-11 02:16:26', '', '0'),
(429, 'Pemkab Bone', 28, '2022-05-11 02:16:30', '', '0'),
(430, 'Pemkab Bulukumba', 28, '2022-05-11 02:16:36', '', '0'),
(431, 'Pemkab Enrekang', 28, '2022-05-11 02:16:46', '', '0'),
(432, 'Pemkab Gowa', 28, '2022-05-11 02:16:50', '', '0'),
(433, 'Pemkab Jeneponto', 28, '2022-05-11 02:16:55', '', '0'),
(434, 'Pemkab Kepulauan Selayar', 28, '2022-05-11 02:17:29', '', '0'),
(435, 'Pemkab Luwu', 28, '2022-05-11 02:17:36', '', '0'),
(436, 'Pemkab Luwu Timur', 28, '2022-05-11 02:17:40', '', '0'),
(437, 'Pemkab Luwu Utara', 28, '2022-05-11 02:17:44', '', '0'),
(438, 'Pemkab Maros', 28, '2022-05-11 02:17:49', '', '0'),
(439, 'Pemkab Pangkajene dan Kepulauan', 28, '2022-05-11 02:17:57', '', '0'),
(440, 'Pemkab Pinrang', 28, '2022-05-11 02:18:01', '', '0'),
(441, 'Pemkab Sidenreng Rappang', 28, '2022-05-11 02:18:09', '', '0'),
(442, 'Pemkab Sinjai', 28, '2022-05-11 02:18:17', '', '0'),
(443, 'Pemkab Soppeng', 28, '2022-05-11 02:18:21', '', '0'),
(444, 'Pemkab Takalar', 28, '2022-05-11 02:18:25', '', '0'),
(445, 'Pemkab Tana Toraja', 28, '2022-05-11 02:18:35', '', '0'),
(446, 'Pemkab Toraja Utara', 28, '2022-05-11 02:18:38', '', '0'),
(447, 'Pemkab Wajo', 28, '2022-05-11 02:18:43', '', '0'),
(448, 'Pemkot Makassar', 28, '2022-05-11 02:18:48', '', '0'),
(449, 'Pemkot Palopo', 28, '2022-05-11 02:18:53', '', '0'),
(450, 'Pemkot Parepare', 28, '2022-05-11 02:18:57', '', '0'),
(451, 'Provinsi Sulawesi Tengah', 29, '2022-05-11 02:15:51', '', '0'),
(452, 'Pemkab Buol', 29, '2022-05-11 02:19:06', '', '0'),
(453, 'Pemkab Banggai Kepulauan', 29, '2022-05-11 02:19:10', '', '0'),
(454, 'Pemkab Banggai', 29, '2022-05-11 02:19:16', '', '0'),
(455, 'Pemkab Banggai Laut', 29, '2022-05-11 02:19:20', '', '0'),
(456, 'Pemkab Donggala', 29, '2022-05-11 02:19:24', '', '0'),
(457, 'Pemkab Morowali', 29, '2022-05-11 02:19:28', '', '0'),
(458, 'Pemkab Morowali Utara', 29, '2022-05-11 02:19:33', '', '0'),
(459, 'Pemkab Parigi Moutong', 29, '2022-05-11 02:19:37', '', '0'),
(460, 'Pemkab Poso', 29, '2022-05-11 02:19:40', '', '0'),
(461, 'Pemkab Sigi', 29, '2022-05-11 02:19:46', '', '0'),
(462, 'Pemkab Tojo Una-una', 29, '2022-05-11 02:19:50', '', '0'),
(463, 'Pemkab Tolitoli', 29, '2022-05-11 02:19:55', '', '0'),
(464, 'Pemkot Palu', 30, '2022-05-11 02:20:00', '', '0'),
(465, 'Provinsi Sulawesi Tenggara', 30, '2022-04-07 08:04:29', '', '0'),
(466, 'Pemkab Bombana', 30, '2022-04-07 08:04:29', '', '0'),
(467, 'Pemkab Buton', 30, '2022-04-07 08:04:29', '', '0'),
(468, 'Pemkab Buton Selatan', 30, '2022-04-07 08:04:29', '', '0'),
(469, 'Pemkab Buton Tengah', 30, '2022-04-07 08:04:29', '', '0'),
(470, 'Pemkab Buton Utara', 30, '2022-04-07 08:04:29', '', '0'),
(471, 'Pemkab Kolaka', 30, '2022-04-07 08:04:29', '', '0'),
(472, 'Pemkab Kolaka Timur', 30, '2022-04-07 08:04:29', '', '0'),
(473, 'Pemkab Kolaka Utara', 30, '2022-04-07 08:04:29', '', '0'),
(474, 'Pemkab Konawe', 30, '2022-04-07 08:04:29', '', '0'),
(475, 'Pemkab Konawe Kepulauan', 30, '2022-04-07 08:04:29', '', '0'),
(476, 'Pemkab Konawe Selatan', 30, '2022-04-07 08:04:29', '', '0'),
(477, 'Pemkab Konawe Utara', 30, '2022-04-07 08:04:29', '', '0'),
(478, 'Pemkab Muna', 30, '2022-04-07 08:04:29', '', '0'),
(479, 'Pemkab Muna Barat', 30, '2022-04-07 08:04:29', '', '0'),
(480, 'Pemkab Wakatobi', 30, '2022-04-07 08:04:29', '', '0'),
(481, 'Pemkot Baubau', 30, '2022-04-07 08:04:29', '', '0'),
(482, 'Pemkot Kendari', 30, '2022-04-07 08:04:29', '', '0'),
(483, 'Provinsi Maluku', 31, '2022-04-07 08:01:42', '', '0'),
(484, 'Pemkab Buru', 31, '2022-04-07 08:01:42', '', '0'),
(485, 'Pemkab Buru Selatan', 31, '2022-04-07 08:01:42', '', '0'),
(486, 'Pemkab Kepulauan Aru', 31, '2022-04-07 08:01:42', '', '0'),
(487, 'Pemkab Kepulauan Tanimbar', 31, '2022-04-07 08:01:42', '', '0'),
(488, 'Pemkab Maluku Barat Daya', 31, '2022-04-07 08:01:42', '', '0'),
(489, 'Pemkab Maluku Tengah', 31, '2022-04-07 08:01:42', '', '0'),
(490, 'Pemkab Maluku Tenggara', 31, '2022-04-07 08:01:42', '', '0'),
(491, 'Pemkab Seram Bagian Barat', 31, '2022-04-07 08:01:42', '', '0'),
(492, 'Pemkab Seram Bagian Timur', 31, '2022-04-07 08:01:42', '', '0'),
(493, 'Pemkot Ambon', 31, '2022-04-07 08:01:42', '', '0'),
(494, 'Pemkot Tual', 31, '2022-04-07 08:01:42', '', '0'),
(495, 'Provinsi Maluku Utara', 32, '2022-04-07 07:59:52', '', '0'),
(496, 'Pemkab Halmahera Barat', 32, '2022-04-07 07:59:52', '', '0'),
(497, 'Pemkab Halmahera Tengah', 32, '2022-04-07 07:59:52', '', '0'),
(498, 'Pemkab Halmahera Timur', 32, '2022-04-07 07:59:52', '', '0'),
(499, 'Pemkab Halmahera Selatan', 32, '2022-04-07 07:59:52', '', '0'),
(500, 'Pemkab Halmahera Utara', 32, '2022-04-07 07:59:52', '', '0'),
(501, 'Pemkab Kapulauan Sula', 32, '2022-04-07 07:59:52', '', '0'),
(502, 'Pemkab Pulau Morotai', 32, '2022-04-07 07:59:52', '', '0'),
(503, 'Pemkab Pulau Taliabu', 32, '2022-04-07 07:59:52', '', '0'),
(504, 'Pemkot Ternate', 32, '2022-04-07 07:59:52', '', '0'),
(505, 'Pemkot Tidore Kepulauan', 32, '2022-04-07 07:58:49', '', '0'),
(506, 'Provinsi Papua', 33, '2022-04-07 06:03:18', '', '0'),
(507, 'Pemkab Teluk Bintuni', 33, '2022-04-07 06:03:18', '', '0'),
(508, 'Pemkab Asmat', 33, '2022-04-07 06:03:18', '', '0'),
(509, 'Pemkab Biak Numfor', 33, '2022-04-07 06:03:18', '', '0'),
(510, 'Pemkab Boven Digoel', 33, '2022-04-07 06:03:18', '', '0'),
(511, 'Pemkab Deiyai', 33, '2022-04-07 06:03:18', '', '0'),
(512, 'Pemkab Dogiyai', 33, '2022-04-07 06:03:18', '', '0'),
(513, 'Pemkab Intan Jaya', 33, '2022-04-07 06:03:18', '', '0'),
(514, 'Pemkab Jayapura', 33, '2022-04-07 06:03:18', '', '0'),
(515, 'Pemkab Jayawijaya', 33, '2022-04-07 06:03:18', '', '0'),
(516, 'Pemkab Keerom', 33, '2022-04-07 06:03:18', '', '0'),
(517, 'Pemkab Kepulauan Yapen', 33, '2022-04-07 06:03:18', '', '0'),
(518, 'Pemkab Lanny Jaya', 33, '2022-04-07 06:03:18', '', '0'),
(519, 'Pemkab Mamberamo Raya', 33, '2022-04-07 06:03:18', '', '0'),
(520, 'Pemkab Mamberamo Tengah', 33, '2022-04-07 06:03:18', '', '0'),
(521, 'Pemkab Mappi', 33, '2022-04-07 06:03:18', '', '0'),
(522, 'Pemkab Merauke', 33, '2022-04-07 06:03:18', '', '0'),
(523, 'Pemkab Mimika', 33, '2022-04-07 06:03:18', '', '0'),
(524, 'Pemkab Nabire', 33, '2022-04-07 06:03:18', '', '0'),
(525, 'Pemkab Nduga', 33, '2022-04-07 06:03:18', '', '0'),
(526, 'Pemkab Paniai', 33, '2022-04-07 06:03:18', '', '0'),
(527, 'Pemkab Pegunungan Bintang', 33, '2022-04-07 06:03:18', '', '0'),
(528, 'Pemkab Puncak', 33, '2022-04-07 06:03:18', '', '0'),
(529, 'Pemkab Puncak Jaya', 33, '2022-04-07 06:03:18', '', '0'),
(530, 'Pemkab Sarmi', 33, '2022-04-07 06:03:18', '', '0'),
(531, 'Pemkab Supiori', 33, '2022-04-07 06:03:18', '', '0'),
(532, 'Pemkab Tolikara', 33, '2022-04-07 06:03:18', '', '0'),
(533, 'Pemkab Waropen', 33, '2022-04-07 06:03:18', '', '0'),
(534, 'Pemkab Yahukimo', 33, '2022-04-07 06:03:18', '', '0'),
(535, 'Pemkab Yalimo', 33, '2022-04-07 06:03:18', '', '0'),
(536, 'Pemkot Jayapura', 33, '2022-04-07 06:03:18', '', '0'),
(537, 'Provinsi Papua Barat', 34, '2022-04-07 06:00:20', '', '0'),
(538, 'Pemkab Fakfak', 34, '2022-04-07 06:00:20', '', '0'),
(539, 'Pemkab Kaimana', 34, '2022-04-07 06:00:20', '', '0'),
(540, 'Pemkab Manokwari', 34, '2022-04-07 06:00:20', '', '0'),
(541, 'Pemkab Manokwari Selatan', 34, '2022-04-07 06:00:20', '', '0'),
(542, 'Pemkab Maybrat', 34, '2022-04-07 06:00:20', '', '0'),
(543, 'Pemkab Pegunungan Arfak', 34, '2022-04-07 06:00:20', '', '0'),
(544, 'Pemkab Raja Ampat', 34, '2022-04-07 06:00:20', '', '0'),
(545, 'Pemkab Sorong', 34, '2022-04-07 06:00:20', '', '0'),
(546, 'Pemkab Sorong Selatan', 34, '2022-04-07 06:00:20', '', '0'),
(547, 'Pemkab Tambrauw', 34, '2022-04-07 06:00:20', '', '0'),
(548, 'Pemkab Teluk Bintuni', 34, '2022-04-07 06:00:20', '', '0'),
(549, 'Pemkab Teluk Wondama', 34, '2022-04-07 06:00:20', '', '0'),
(550, 'Pemkot Sorong', 34, '2022-04-07 06:00:20', '', '0'),
(551, 'Pemkab Pulang Pisau', 34, '2022-04-07 06:00:20', '', '0'),
(552, 'Pemkot Tangerang Selatan', 34, '2022-04-07 06:00:20', '', '0'),
(553, 'Pemkab Bungo', 34, '2022-04-07 06:00:05', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_persandian`
--

CREATE TABLE `laporan_persandian` (
  `Id_LapSan` int(11) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Saran_uBSSN` text NOT NULL,
  `Jml_Kebijakan` int(11) DEFAULT NULL,
  `Jml_SDM` int(11) NOT NULL,
  `Jml_Palsan` int(11) NOT NULL,
  `Jml_APU` int(11) NOT NULL,
  `Jml_SE` int(11) NOT NULL,
  `Jml_PDok` int(11) DEFAULT NULL,
  `Jml_LKamsi` int(11) DEFAULT NULL,
  `Jml_PHKS` int(11) DEFAULT NULL,
  `Instansi` int(11) NOT NULL,
  `Dokumen` text DEFAULT NULL,
  `Dokumen_Eval` text DEFAULT NULL,
  `Nilai_Eval` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `archieved` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_persandian`
--

INSERT INTO `laporan_persandian` (`Id_LapSan`, `Tahun`, `Saran_uBSSN`, `Jml_Kebijakan`, `Jml_SDM`, `Jml_Palsan`, `Jml_APU`, `Jml_SE`, `Jml_PDok`, `Jml_LKamsi`, `Jml_PHKS`, `Instansi`, `Dokumen`, `Dokumen_Eval`, `Nilai_Eval`, `updated_at`, `updated_by`, `archieved`) VALUES
(1, 2020, 'Diharapkan BSSN melakukan bimbingan teknis utk SDM bidang keamanan informasi dan persandian.', 1, 1, 1, 0, 3, 0, 2, 0, 32, 'Laporan_Persandian-Pemkab_Labuhanbatu-2020.pdf', NULL, NULL, '2022-04-22 06:13:12', 'admin_master', '0'),
(2, 2020, '1. Memperbanyak pelatihan peningkatan SDM via daring.\r\n2. Memberikan pembinaan kpd provinsi/kab/kota dlm pelaksanaan urusan persandian dan standar yg dilaksanakan di daerah.', NULL, 8, 3, 25, 84, NULL, NULL, NULL, 53, 'Laporan_Persandian-Pemkot_Medan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(3, 2020, '1. Peningkatan kerja sama\r\n2. Penyesuaian pelaksanaan diklat sandiman dgn situasi yg ada.', 3, 4, 3, 2, 23, 3, 4, 4, 72, 'Laporan_Persandian-Provinsi_Kepulauan_Riau-2020.pdf', NULL, NULL, '2022-04-19 01:49:34', 'admin_master', '0'),
(4, 2020, 'Menjalankan fungsi persandian di Daerah dan mendukung sarana dan prasarana.', NULL, 0, 1, 0, 0, NULL, NULL, NULL, 73, 'Laporan_Persandian-Pemkab_Lingga-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(5, 2020, 'Tidak ada saran', NULL, 0, 0, 0, 0, NULL, NULL, NULL, 74, 'Laporan_Persandian-Pemkab_Karimun-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(6, 2020, 'Tidak ada saran', NULL, 0, 0, 0, 0, NULL, NULL, NULL, 75, 'Laporan_Persandian-Pemkab_Natuna-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(7, 2020, '1. Kegiatan diklat persandian utk daerah.\r\n2. Pengadaan alat persandian.\r\n3. Mempersiaplan SDM utk kegiatan persandian.', NULL, 1, 1, 0, 0, NULL, NULL, NULL, 76, 'Laporan_Persandian-Pemkab_Bintan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(8, 2020, '1. Mengadakan pelatian sandiman utk meningkatkan kualitas SDM di persandian.\r\n2. Melakukan sosialisasi keamanan informasi digital kpd Pemda dikarenakan kurangnya perahatian dan SDM daerah ttg persandian', NULL, 2, 0, 0, 4, NULL, NULL, NULL, 77, 'Laporan_Persandian-Pemkab_Anambas-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(9, 2020, '1. Terus melakukan koordinasi, komunikasi dan kerja sama dengan PemProv.\r\n 2. Memberikan bantuan alat-alat terkait kontra penginderaan diikiuti pelatihan pemanfaatan alat tsb. \r\n3. Membantu menekankan dan menegaskan pentingnya urusan persandian.', NULL, 7, 5, 2, 13, NULL, NULL, NULL, 80, 'Laporan_Persandian-Provinsi_Jambi-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(10, 2020, '1. Memberikan bantuan peralatan pendukung utama persandian. \r\n2. Mengadakan diklat teknis cyber crime kpd personil sandi Pemda.', 0, 7, 3, 1, 12, 0, 0, 0, 81, 'Laporan_Persandian-Pemkab_Batanghari-2020.pdf', NULL, NULL, '2022-04-22 04:00:27', 'admin_master', '0'),
(11, 2020, 'Mengadakan pelatihan di bidang Keamanan Informasi dan diklat teknis cyber crime bg personil Sandi Pemerintah Kab./Kota.', 0, 7, 4, 0, 0, 0, 0, 0, 82, NULL, NULL, NULL, '2022-04-28 06:14:53', 'admin_master', '0'),
(12, 2020, 'Meningkatkan pelayanan pelatihan daerah.', NULL, 4, 1, 1, 2, NULL, NULL, NULL, 84, 'Laporan_Persandian-Pemkab_Merangin-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(13, 2020, 'Pemda sangat mendukung BSSN dalam meningkatkan kualitas dan kwantitas  SDM persandian.', NULL, 4, 2, 1, 17, NULL, NULL, NULL, 85, 'Laporan_Persandian-Pemkab_Muaro_Jambi-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(14, 2020, '1. Mempermudah daerah dalam syarat dan seleksi penerimaan persandian.\r\n2. Waktu diklat persandian cukup 7-15 hari saja. \r\n3. Sharing kegiatan dan bantuan alat keamanan informasi. \r\n4. Memberikan kewenangan pada PemProv dlm melaksanakan diklat. \r\n5. Pengembangan email sanapati smp tingkat kecamatan ', NULL, 23, 0, 0, 0, NULL, NULL, NULL, 87, 'Laporan_Persandian-Pemkab_Tanjung_Jabung_Barat-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(15, 2020, '1. Perlu pembinaan langsung dari BSSN thdp kab./kota. \r\n2. Memperbanyak pendidikan dan pelatihan SDM utk persandian dan keamanan informasi. \r\n3. Perlu adanya kursus kilat Sandiman khusus bg pejabat Eselon III dan II bidang Persandian.', NULL, 3, 0, 0, 0, NULL, NULL, NULL, 90, 'Laporan_Persandian-Pemkot_Jambi-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(16, 2020, 'BSSN lebih intens memberikan sosialisasi Perban BSSN No.10 Th.2019 Ttg Pelaksanaan Persandian Utk Pengamanan Informasi di Pemda.', NULL, 2, 16, 3, 0, NULL, NULL, NULL, 98, 'Laporan_Persandian-Pemkab_Pasaman-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(17, 2020, '1. Mengadakan bimtek dan pelatihan terkait Persandian dan keamanan informasi.\r\n2. Mengadakan sosialisasi Peraturan terkait dgn persandian dan keamanan informasi. ', NULL, 2, 3, 0, 2, NULL, NULL, NULL, 102, 'Laporan_Persandian-Pemkab_Solok-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(18, 2020, 'Agar BSSN mengalokasikan anggaran, sarana maupun prasarana kegiatan persandian di Pemkab Oan Komering Ilir', NULL, 5, 0, 0, 29, NULL, NULL, NULL, 114, 'Laporan_Persandian-Pemkab_Ogan_Komering_Ilir-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(19, 2020, 'Tidak ada saran', NULL, 4, 3, 11, 0, NULL, NULL, NULL, 116, 'Laporan_Persandian-Pemkab_Ogan_Komering_Ulu_Selatan_-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(20, 2020, '1. Adanya bimbingan teknis persandian utk meningkatkan kualitas SDM persandian.\r\n2. Adanya bantuan peralatan persandian utk keamanan informasi.', NULL, 7, 2, 0, 0, NULL, NULL, NULL, 118, 'Laporan_Persandian-Pemkab_Musi_Banyuasin-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(21, 2020, 'Bantuan dana dan peralatan utk persandian Kab.Musi Rawas Utara.', NULL, 3, 0, 0, 0, NULL, NULL, NULL, 119, 'Laporan_Persandian-Pemkab_Musi_Rawas_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(22, 2020, '1. Dukungan peralatan persandian dan keamanan data informasi.\r\n2. Melaksanakan pengembangan SDM Persandian dan keamanan informasi  secara rutin.\r\n3. Pemberian tunjangan khusus bg SDM persandian yg dituangkan dalam peraturan yg jelas dan prosedur  yg mudah.\r\n4. Penyediaan media konsultasi secara online bagi Pemda utk sarana komunikasi hal-hal terkait persandian.', NULL, 4, 3, 1, 9, NULL, NULL, NULL, 120, 'Laporan_Persandian-Pemkab_Musi_Rawas-2020.pdf', NULL, NULL, '2022-03-30 06:55:21', NULL, '0'),
(23, 2020, '1. Memprioritaskan penyelenggaraan persandian dan keamanan informasi di daerah melalui koordinasi.\r\n2. Menyediakan kelengkapan perangkat di daerah agar kegiatan di Pusat dan Daerah dpt bersinergi.\r\n3. Memperbanyak dan mempermudah sertifikasi sandiman dasar.', NULL, 7, 76, 68, 2, NULL, NULL, NULL, 121, 'Laporan_Persandian-Pemkab_Banyuasin-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(24, 2020, '1. Meningkatkan upaya pemerataan pemahaman kpd unsur pimpinan daerah baik thdp pentingnya persandian dn keamanan informasi.\r\n2. Mendorong percepatan peningkatan kualitas layanan persandian, menambah frekuensi dan kuota peserta diklat persandian.\r\n3. Percepatan pemenuhan Palsan maupun APU di Pemda.', NULL, 7, 4, 0, 22, NULL, NULL, NULL, 122, 'Laporan_Persandian-Pemkab_Muara_Enim-2020.pdf', NULL, NULL, '2022-03-30 06:58:21', NULL, '0'),
(25, 2020, '1. Perbanyak bimtek/pelatihan bidang persandian utk kab./kota.\r\n2. Bantuan peralatan persandian utk kab./kota', NULL, 0, 0, 0, 0, NULL, NULL, NULL, 123, 'Laporan_Persandian-Pemkab_Penukal_Abab_Lematang_Ilir-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(26, 2020, '1. Selalu memberikan informasi mengenai kegiatan persandian di pemerintah pusat sbg panutan bg Pemda\r\n2. Selalu memberikan informasi mengenai pelatihan dan pendidikan utk meningkatkan kemampuan personil di Kamsisan.\r\n3. Memberikan masukan kepada Kepala Daerah mengenai pentingnya fungsi persandian di daerah', NULL, 3, 2, 1, 9, NULL, NULL, NULL, 126, 'Laporan_Persandian-Pemkot_Palembang-2020.pdf', NULL, NULL, '2022-03-30 07:27:11', NULL, '0'),
(27, 2020, '1. Selalu memberikan informasi mengenai kegiatan persandian di pemerintah pusat sbg panutan bg Pemda\r\n2. Selalu memberikan informasi mengenai pelatihan dan pendidikan utk meningkatkan kemampuan personil di Kamsisan.\r\n3. Memberikan pendampingan kpd Pemda dlm melaksanakan keamanan siber secara efektif dan efisien.\r\n4. Memberikan kesejahteraan bg SDM bidang persandian guna meningkatkan kinerja dan kualitas.', NULL, 6, 3, 0, 0, NULL, NULL, NULL, 127, 'Laporan_Persandian-Pemkot_Pagar_Alam_-2020.pdf', NULL, NULL, '2022-03-30 07:27:59', NULL, '0'),
(28, 2020, 'BSSN agar dapat lebih intens dalam melakukan pembinaan dan peningkatan kapasitas SDM Persandian dan Keamanan Informasi.', NULL, 14, 29, 2, 61, NULL, NULL, NULL, 146, 'Laporan_Persandian-Provinsi_Bengkulu-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(29, 2020, '1. Pelaksanaan diklat sandiman sebaiknya dilakukan di daerah masing-masing. \r\n2. Membantu pemenuhan sarana dan prasarana persandian di daerah. \r\n3. Memperbanyak pelatihan. \r\n4. ASN Sandiman di daerah sebaiknya dijadikan ASN Pusat yg ditugaskan di Daerah.', NULL, 1, 1, 0, 2, NULL, NULL, NULL, 147, 'Laporan_Persandian-Pemkab_Rejang_Lebong-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(30, 2020, 'Memfasilitasi kegiatan pembinaan SDM persandian dan membantu kegiatan persandian seperti peralatan pinjam pakai utk counter survaillance dan perlatan sandi lainnya.', NULL, 9, 3, 1, 0, NULL, NULL, NULL, 148, 'Laporan_Persandian-Pemkab_Bengkulu_Selatan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(31, 2020, 'Adanya peraturan yg mengharuskan pemerintah pusat maupun daerah dlm memberikan TPP(Tunjangan Pengamanan Persandian) bagi pimpinan dan staf bidang persandian.', NULL, 3, 3, 1, 0, NULL, NULL, NULL, 150, 'Laporan_Persandian-Pemkab_Bengkulu_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(32, 2020, '1. Segera melaksanakan monitoring thdp aset Daerah. \r\n2. Pemerintah yang telah memiliki sandiman agar diprioritaskan utk memiliki APU.', NULL, 3, 5, 0, 4, NULL, NULL, NULL, 151, 'Laporan_Persandian-Pemkab_Mukomuko-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(33, 2020, 'Tidak ada saran', NULL, 2, 1, 0, 0, NULL, NULL, NULL, 152, 'Laporan_Persandian-Pemkab_Lebong-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(34, 2020, '1. Pembinaan kpd ASN sandiman berupa diklat teknis. \r\n2. Membuka peluang Inpassing bagi ASN persandian. ', NULL, 4, 0, 0, 0, NULL, NULL, NULL, 153, 'Laporan_Persandian-Pemkab_Kepahiang-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(35, 2020, 'Memberikan sosialisasi terkait program dan kegiatan serta bimbingan di bidang persandian.', NULL, 3, 0, 0, 0, NULL, NULL, NULL, 154, 'Laporan_Persandian-Pemkab_Seluma-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(36, 2020, 'Membantu pengembangan SDM persandian dan peralatan utk kegiatan persandian di Pemda Kab.Bangka Selatan.', NULL, 5, 3, 3, 0, NULL, NULL, NULL, 159, 'Laporan_Persandian-Pemkab_Bangka_Selatan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(37, 2020, '1. Meningkatkan penyelenggaraan pelatihan dan bimbingan teknis. \r\n2. Menetapkan standar teknis utk pembangunan komunikasi sandi daerah. \r\n3. Memberikan rekomendasi teknis pengadaan APU. \r\n4. Mengadakan pembinaan thdp Pemda.', 44, 8, 5, 2, 289, 6, 10, 2, 174, 'Laporan_Persandian-Provinsi_Jawa_Barat-2020.pdf', NULL, NULL, '2022-04-18 03:14:26', 'admin_master', '0'),
(38, 2020, '1. Pengadaan fasilitas persandian yg memadai di tingkat daerah. \r\n2. Mengadakan pelatihan teknis bid.Persandian dan Pengamanan Siber.', NULL, 14, 9, 0, 3, NULL, NULL, NULL, 175, 'Laporan_Persandian-Pemkab_Purwakarta-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(39, 2020, 'Terus memimbing persandian di daerah baik dr sisi keilmuan, peralatan, dan pembiayaan serta terus mendampingi pelaksanaan evaluasi Indeks Keamanan Informasi.', NULL, 6, 4, 5, 97, NULL, NULL, NULL, 176, 'Laporan_Persandian-Pemkab_Sukabumi-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(40, 2020, '1. Memberikan pendidikan, pelatihan dan sertifikasi TI utk pemerintah Daerah. \r\n2. Memberikan sarana dan prasaran pendukung bg Pemda utk menangani urusan siber. \r\n3. Memberikan sosialisasi security awareness bg KepDa. \r\n4. Menyiapkan regulasi persandian bagi Pemda. \r\n5. Menambah kuota peserta diklat. \r\n6. Memfasilitasi pengisian LPPD urusan persandian. \r\n7. Memberikan pedoman teknis yg dpt diimplementasikan di Pemda. \r\n8. Meningkatkan kinerja aplikasi esign cloud. \r\n9. Menambah personil verifikator ', NULL, 12, 3, 2, 8, NULL, NULL, NULL, 202, 'Laporan_Persandian-Provinsi_DKI_Jakarta-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(41, 2020, '1. Pendampingan terhadap Pemda dlm pelaksanan persandian. \r\n2. Mempercepat penyususan kebijakan terkait keamanan informasi dlm SPBE spt Manajemen Kamsi dan Manajemen Audit.', NULL, 5, 2, 3, 93, NULL, NULL, NULL, 210, 'Laporan_Persandian-Pemkab_Pekalongan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(42, 2020, 'Memberikan bimtek/training terkait keamanan informasi dan assessment keamanan data informasi.', NULL, 3, 3, 5, 0, NULL, NULL, NULL, 211, 'Laporan_Persandian-Pemkab_Grobogan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(43, 2020, '1. Memfasilitasi fitur pengamanan TI berikut dgn transfer knowledge dari BSSN.\r\n2. Pemberangkatan diklat/bimtek terkait sertifikasi keamanan informasi.', NULL, 7, 4, 1, 17, NULL, NULL, NULL, 212, 'Laporan_Persandian-Pemkab_Demak-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(44, 2020, 'BSSN lebih banyak memberikan sosialisasi dan pelatihan serta membuat standarisasi/pedoman peralatan dan SDM pengolah keamanan informasi. ', NULL, 6, 4, 0, 9, NULL, NULL, NULL, 213, 'Laporan_Persandian-Pemkab_Kebumen-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(45, 2020, '1. Membuat prioritas daerah yg masih kurang SDM ahli Sandi agar dpt mengikuti diklat Persandian. \r\n2. BSSN bersama Kemendagri mengadakan pencerahan kpd Pejabat Daerah akan pentingnya keamanan informasi.', NULL, 5, 6, 1, 13, NULL, NULL, NULL, 214, 'Laporan_Persandian-Pemkab_Cilacap_-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(46, 2020, '1. Menempatkan SDM lulusan STSN pd Pemerintah Kab.Purbalingga. \r\n2. Lebih intensif memberikan dukungan pengamanan e-government pd instansi Pemda. \r\n3. Peningkatan SDM Sandi dan keamanan siber', NULL, 4, 45, 1, 1, NULL, NULL, NULL, 215, 'Laporan_Persandian-Pemkab_Purbalingga-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(47, 2020, '1. Melakukan bimtek dalam penyusunan program dan kegiatan persandian\r\n2. Bantuan dana kegiatan persandian daerah  (Hibah atau Bantuan Keuangan Provinsi)', 0, 4, 42, 13, 23, 0, 0, 0, 237, '', NULL, NULL, '2022-04-22 01:44:28', 'admin_master', '0'),
(48, 2020, '1. Sosialiasi aplikasi-aplikasi bagi pakai produksi BSSN. \r\n2. BSSN melakukan pembinaan langsung ke kab./kota. \r\n3. Ada bimtek Keamanan Siber di daerah.', NULL, 6, 3, 1, 61, NULL, NULL, NULL, 246, 'Laporan_Persandian-Pemkab_Gunung_Kidul-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(49, 2020, 'BSSN memberikan bimbingan/arahan Persandian di seluruh Provinsi Kab./Kota se Indonesia.', NULL, 4, 3, 0, 44, NULL, NULL, NULL, 247, 'Laporan_Persandian-Pemkab_Kulon_Progo-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(50, 2020, 'Mohon utk penerimaan CPNS Kab.Pacitan ada formasi Tenaga Ahli Persandian.', NULL, 3, 3, 1, 0, NULL, NULL, NULL, 252, 'Laporan_Persandian-Pemkab_Pacitan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(51, 2020, '1. Sesering mungkin mengadakan pelatihan persandian utk keamanan informasi. \r\n2. Menyeragaman peralatan. \r\n3. Pembentukan CSIRT utk kab./kota agar segera terwujud.', NULL, 7, 5, 5, 9, NULL, NULL, NULL, 255, 'Laporan_Persandian-Pemkab_Ponorogo_-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(52, 2020, 'Diklat sandiman sebaiknya dilaksanakan di balai Diklat Daerah', NULL, 7, 0, 0, 31, NULL, NULL, NULL, 256, 'Laporan_Persandian-Pemkab_Sumenep_-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(53, 2020, '1. Melaksanakan pembinaan kepala daerah terkait SDM bidang persandian. \r\n2. Menyediakan petunjuk teknis terkait keamanan informasi.', NULL, 1, 2, 0, 0, NULL, NULL, NULL, 257, 'Laporan_Persandian-Pemkab_Jombang-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(54, 2020, 'Memberikan asistensi tugas-tugas persandian secara intens.', NULL, 4, 5, 0, 0, NULL, NULL, NULL, 275, 'Laporan_Persandian-Pemkab_Sampang-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(55, 2020, '1. Segera membuat arsitektur keamanan SPBE.\r\n2. Ada media chatting/video conference yg aman dan berbagi pakai utk Pemda.\r\n3. Peningkatan SDM keamanan informasi utk Pemkab/Pemkot.', NULL, 2, 3, 1, 70, NULL, NULL, NULL, 281, 'Laporan_Persandian-Pemkot_Batu-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(56, 2020, '1. Mengadakan pelatihan pengembangan keamanan informasi bg Pemda.\r\n2. Memperjelas roadmap dn panduan standar pemeliharaan siber bg daerah.\r\n3. Menindaklanjuti pengembangan sarana dan prasarana pemerliharaan siber.\r\n4. Memberikan literasi kesadaran keamanan informasi dlm bentuk sosialisasi/focus group discussion/security briefing kpd pimpinan Pemda atau SDM terkait.', NULL, 6, 6, 5, 6, NULL, NULL, NULL, 284, 'Laporan_Persandian-Pemkot_Madiun-2020.pdf', NULL, NULL, '2022-03-30 07:43:33', NULL, '0'),
(57, 2020, '1. Peningkatan koordinasi dan evaluasi yg lbh intensif. \r\n2. Perlunya dukungan maksimal utk APU dan APK. \r\n3. Melaksanakan sosialisasi/workshop/diklat yg lebih intensif terkait persandian.', NULL, 13, 5, 7, 0, NULL, NULL, NULL, 290, 'Laporan_Persandian-Provinsi_Bali-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(58, 2020, 'Membentuk kelompok persandian atar Pusat dan Daerah sebagai wadah sharing informasi mengenai persandian.', NULL, 4, 0, 1, 0, NULL, NULL, NULL, 291, 'Laporan_Persandian-Pemkab_Jembrana-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(59, 2020, '1. Mengurangi jam mata pelajaran diklat agar lebih efisien. \r\n2. Memberikan sosialisasi secara rutin atau berkala. \r\n3. Meningkatkan kemampuan SDM. \r\n4. Menyelenggarakan diklat teknissingkat terkait keamanan siber untuk kab./kota. \r\n5. Senantiasa memberikan informasi, masukan, maupun bantuan peralatan yg dibutuhkan daerah.', NULL, 3, 71, 1, 21, NULL, NULL, NULL, 292, 'Laporan_Persandian-Pemkab_Klungkung-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(60, 2020, '1. Mengirimkan tim optimalisasi utk memantau dan mengevaluasi persandian. \r\n2. Memperbanyak diklat virtual', NULL, 11, 3, 1, 0, NULL, NULL, NULL, 293, 'Laporan_Persandian-Pemkab_Gianyar-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(61, 2020, 'Memberikan bimbingan assessment keamanan informasi ke tingkat Kab./Kota', NULL, 4, 1, 1, 4, NULL, NULL, NULL, 299, 'Laporan_Persandian-Pemkot_Denpasar-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(62, 2020, '1. BSSN memberikan sinkroniasasi bimbingan dan arahan secara berkelanjutan terkait penyelenggaraan persandian.\r\n2. Mengadakan bimtek keamanan siber secara terjadwal di NTB.\r\n3. Dpt memberikan dukungan fasilitas thdp kebutuhan peralatan baru maupun reparasi ', NULL, 14, 30, 2, 3, NULL, NULL, NULL, 300, 'Laporan_Persandian-Provinsi_Nusa_Tenggara_Barat-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(63, 2020, 'Tidak ada saran', NULL, 0, 0, 0, 0, NULL, NULL, NULL, 312, 'Laporan_Persandian-Pemkab_Rote_Ndao-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(64, 2020, 'Terima Kasih atas\r\n1. Pelaksanaan kegiatan Kontra Penginderaan sehingga dpt menyelenggarakan pengamanan informasi terkait penyadapan.\r\n2. Pelatihan dan bimbingan teknis online bersertifikat utk meningkatkan skill,wawasan, dan kinerja.', NULL, 6, 21, 4, 9, NULL, NULL, NULL, 334, 'Laporan_Persandian-Provinsi_Kalimantan_Barat-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(65, 2020, 'Melakukan pembinaan SDM persandian di daerah khususnya peningkatan kemampuan dan pemahaman siber serta pengamananan informasi.', NULL, 3, 3, 0, 30, NULL, NULL, NULL, 335, 'Laporan_Persandian-Pemkab_Sekadau-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(66, 2020, 'BSSN kedepannya agar lbh bnyk mengadakan sosialisasi utk menambah wawasan kepala daerah akan pentingnya pengamanan informasi di Pemda.', NULL, 1, 2, 0, 82, NULL, NULL, NULL, 336, 'Laporan_Persandian-Pemkab_Landak-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(67, 2020, '1. Diharapkan BSSN membuat kebijakan utk mengatasi Pemda yg tidak/belum mendukung ilmu persandian dan TIK.\r\n2. Menyelenggarakan kegiatan rutin di daerah terkait penggunaan sistem dan alat persandian.\r\n3. Menerapkan program Jaring Komunikasi Sandi yg dikelola BSSN di daeah.\r\n4. Penugasan lgsg lulusan STSN ke daerah-daerang yg krg SDM sandi. ', NULL, 2, 3, 0, 0, NULL, NULL, NULL, 337, 'Laporan_Persandian-Pemkab_Sambas-2020.pdf', NULL, NULL, '2022-03-30 07:44:41', NULL, '0'),
(68, 2020, 'Sarana dan prasarana penunjang kegiatan persandian perlu ditingkatkan.', NULL, 6, 1, 0, 22, NULL, NULL, NULL, 350, 'Laporan_Persandian-Pemkot_Palangkaraya-2020.pdf', NULL, NULL, '2022-03-30 07:45:26', NULL, '0'),
(69, 2020, '1. Pemberian informasi kpd Bid.Persandian dan Pengamanan Informasi mengenai perkembangan siber.\r\n2. Membuat dan mengelola grup resmi Whatsapp utk Bid.Persandian dan Pengamanan Informasi seluruh Indonesia.', NULL, 5, 6, 1, 3, NULL, NULL, NULL, 351, 'Laporan_Persandian-Pemkab_Barito_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(70, 2020, '1. Memberikan informasi perkembangan dan penggunaan aplikasi terbaaru yg dpt mendukung keamanan informasi di daerah.\r\n2. Mengadakan kegiatan sosialisasi dan bimtek ttg keamanan informasi dan penggunaan aplikasi serta alat dukung persandian.', NULL, 4, 13, 1, 2, NULL, NULL, NULL, 354, 'Laporan_Persandian-Pemkab_Gunung_Mas-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(71, 2020, '1. Lakukan Bimtek secara berkala bagi sandiman daerah.\n2. Agar BSSN menaggarkan kegiatan Sosialisasi kepada daerah.\n3. Perlu peremajaan alat pendukung utama persandian.', NULL, 7, 3, 1, 1, NULL, NULL, NULL, 355, NULL, NULL, NULL, NULL, NULL, '0'),
(72, 2020, '1. Memberikan informasi penggunaan aplikasi-aplikasi terbaru yg mendukung kelancaran dan keamanan informasi.\r\n2. Memberikan sosialisasi dan bimtek ttg keamanan informasi dan penggunaan aplikasi dan alat dkg persandian.', NULL, 2, 4, 2, 9, NULL, NULL, NULL, 358, 'Laporan_Persandian-Pemkab_Kotawaringin_Timur-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(73, 2020, '1.Tetap mengadakan pelatihan dan bimbingan teknis Kamsisan. \r\n2. Mengalokasikan anggaran utk kegiatan sosialisasi kpd Daerah.\r\n3. Memberikan dukungan peremajaan dan pengadaan alat pendukung utama persandian.', NULL, 1, 4, 0, 0, NULL, NULL, NULL, 359, 'Laporan_Persandian-Pemkab_Lamandau-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(74, 2020, '1.  Pelaksanaan pendidikan/pelatihan/sosialisasi/bimtek harus terus dilakukan setiap tahunnya.\r\n2. Mewajibkan penggunaan Sertifikat Elektronik kpd seluruh Pemda.\r\n3. Memfasilitasi Pemda utk pemenuhan sarana dan prasarana persandian.', NULL, 4, 1, 0, 5, NULL, NULL, NULL, 365, 'Laporan_Persandian-Pemkab_Hulu_Sungai_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(75, 2020, '1. Memfasilitasi SDM di daerah utk bisa mengikuti diklat, bimtek, dan pelatihan keamanan siber.\r\n2. Memberikan informasi ke daerah jk ada pelatihan mengenai keamanan siber di daerah.\r\n3. Memperbanyak pelatihan secara online kpd kepala daerah yg berhubungan ', NULL, 3, 1, 0, 4, NULL, NULL, NULL, 377, 'Laporan_Persandian-Pemkot_Banjarmasin-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(76, 2020, 'Turut serta mengubah pola pikir insan persandian darah dgn tupoksi persandian sesuai peraturan perundang-undangan.', NULL, 7, 2, 4, 44, NULL, NULL, NULL, 378, 'Laporan_Persandian-Provinsi_Kalimantan_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(77, 2020, '1. Penambahan jadwal diklat dan bimtek persandian.\r\n2. Memfasilitasi daerah untuk menggunakan aplikasi Intelligence Media Management, Intelligence perception Analisys dan Portal data dan pengamanan Cyber lainnya jk Kemendagri tdk dpt memfasilitasi.', NULL, 5, 14, 3, 6, NULL, NULL, NULL, 379, 'Laporan_Persandian-Pemkab_Bulungan-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(78, 2020, 'Peningkatan SDM bidang persandian melalui diklat persandian.', NULL, 3, 2, 0, 0, NULL, NULL, NULL, 380, 'Laporan_Persandian-Pemkab_Tana_Tidung-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(79, 2020, '1. Memberikan dukungan peralatan, sistem persandian dan keamanan informasi pd Pemda.\r\n2. Memberikan pendampingan/asistensi kpd Pemda utk mendukung keamanan informasi pd SPBE.\r\n3. Memberikan kesempatan pd personil Pemda utk mengikuti Pendidikan Sandi dan keamanan informasi.\r\n4. Melaksanakan rapat koordinasi teknis persandian dan keamanan informasi di Pemprov/Pemkab/Pemkot secara regional.', NULL, 7, 3, 1, 14, NULL, NULL, NULL, 386, 'Laporan_Persandian-Pemkab_Berau-2020.pdf', NULL, NULL, '2022-03-30 07:46:24', NULL, '0'),
(80, 2020, '1. Memberikan pelatihan dan bimtek ttg Siber dn Sandi pd ASN daerah.\r\n2. BSSN membantu mengamankan persandian kab./kota utk mengamankan informasi.', NULL, 4, 1, 1, 3, NULL, NULL, NULL, 387, 'Laporan_Persandian-Pemkab_Kutai_Kartanegara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(81, 2020, 'Data tdk lengkap', NULL, 0, 0, 0, 0, NULL, NULL, NULL, 397, 'Laporan_Persandian-Pemkab_Bolaang_Mongondow-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(82, 2020, '1. Melakukan pendataan provinsi/kab/kota yg belum memiliki SDM Kamsisan. \r\n2. Melakukan inventarisasi potensi persandian. \r\n3. Memberikan diskresi sehubungan peralihan SDM persandian ke jabatan fungsional. \r\n4. Memberikan bantuan anggaran. \r\n5. Mengadakan pelatihan.', NULL, 3, 17, 1, 0, NULL, NULL, NULL, 412, 'Laporan_Persandian-Provinsi_Gorontalo-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(83, 2020, '1. Membuka peluang untuk peserta pendidikan siber dan sandi dari daerah. \r\n2. Menyediakan akomodasi dan biaya pendidikan lainnya yg disediakan oleh BSSN.', NULL, 3, 0, 3, 0, NULL, NULL, NULL, 413, 'Laporan_Persandian-Pemkab_Pohuwato_-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(84, 2020, 'Tidak ada saran', NULL, 2, 1, 0, 0, NULL, NULL, NULL, 414, 'Laporan_Persandian-Pemkab_Boalemo-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(85, 2020, 'Menambah dan melatih SDM yg dpt ditempatkan di masing-masing daerah kabupaten.', NULL, 2, 1, 0, 0, NULL, NULL, NULL, 416, 'Laporan_Persandian-Pemkab_Gorontalo_Utara-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(86, 2020, 'Tidak ada saran', NULL, 1, 0, 0, 0, NULL, NULL, NULL, 417, 'Laporan_Persandian-Pemkab_Bone_Bolango-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(87, 2020, '1. Pelaksanaan kegiatan di daerah terutama di luar Jawa', NULL, 5, 39, 2, 52, NULL, NULL, NULL, 419, NULL, NULL, NULL, NULL, NULL, '0'),
(88, 2020, '1. Pelaksanaan Diklat Sandiman bila perlu dijatah utk setiap kabupaten minimal 2 orang.\r\n2. Diklat Pranata Komputer Terampil dan Ahli.\r\n3. Perlengkapan peralatan persandian dr BSSN dlm bentuk Pinjam Pakai.', NULL, 4, 0, 4, 0, NULL, NULL, NULL, 452, 'Laporan_Persandian-Pemkab_Buol-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(89, 2020, '1. Membuka pelatihan dasar persandian dan keamanan sistem informasi melalui virtual meeting.\r\n2. Pelaksanaan pinjam pakai peralatan persandian agar dilaksanakan secara merata di setiap daerah.\r\n3. Adanya dukungan intens pelaksanaan kegiatan persandian dan keamanan informasi.', NULL, 2, 0, 0, 16, NULL, NULL, NULL, 453, 'Laporan_Persandian-Pemkab_Banggai_Kepulauan-2020.pdf', NULL, NULL, '2022-03-30 07:49:35', NULL, '0'),
(90, 2020, '1. Pelaksanaan pinjam pakai peralatan persandian agar dilakukan secara merata di seluruh daerah.\r\n2. Adanya dukungan intens ke Pemda sbg bentuk pelaksanaan persandian dan keamanan informasi.', NULL, 7, 7, 3, 1, NULL, NULL, NULL, 464, 'Laporan_Persandian-Pemkot_Palu-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(91, 2020, '1. Perlu pelaksanaan optimalisasi penyelenggaraan persandian melalui penugasan lulusan STSN.\r\n2. BSSN perlu melakukan kunjungan ke daerah-daerah utk sosialisasi kpd Forkopimda Provinsi ttg pentingnya Kamsisan.', NULL, 7, 5, 2, 6, NULL, NULL, NULL, 483, 'Laporan_Persandian-Provinsi_Maluku-2020.pdf', NULL, NULL, NULL, NULL, '0'),
(92, 2020, '1. Memberikan Palsan dan APU ke Dinas Komunikasi Informatika Persandian dan Statistik Kab. Teluk Bintuni.\r\n2. Mengunjungi Kab.Teluk Bintuni utk memberikan pencerahan kpd pimpinan daerah ttg pentingnya persandian.', NULL, 5, 0, 0, 0, NULL, NULL, NULL, 507, 'Laporan_Persandian-Pemkab_Teluk_Bintuni-2020.pdf', NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pic_instansi`
--

CREATE TABLE `pic_instansi` (
  `Id_PIC` int(11) NOT NULL,
  `Nama_PIC` varchar(255) NOT NULL,
  `Nomor_HP` varchar(16) NOT NULL,
  `Jabatan` text DEFAULT NULL,
  `Kategori` enum('Laporan Persandian','IKAMI','CSM','CSIRT','TMPI') NOT NULL,
  `Id_Instansi` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` text DEFAULT NULL,
  `archieved` enum('0','1','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pic_instansi`
--

INSERT INTO `pic_instansi` (`Id_PIC`, `Nama_PIC`, `Nomor_HP`, `Jabatan`, `Kategori`, `Id_Instansi`, `updated_at`, `updated_by`, `archieved`) VALUES
(11, 'James Doe', '089789678567', 'Kadis', 'CSIRT', 218, '2022-05-30 04:20:48', 'editor_yanti', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tmpi`
--

CREATE TABLE `tmpi` (
  `Id_TMPI` int(11) NOT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Nilai_TMPI` double DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Instansi` int(11) DEFAULT NULL,
  `Dokumen` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `archieved` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmpi`
--

INSERT INTO `tmpi` (`Id_TMPI`, `Tahun`, `Nilai_TMPI`, `Level`, `Instansi`, `Dokumen`, `updated_at`, `updated_by`, `archieved`) VALUES
(1, 2019, 3.16, 3, 251, 'TMPI-Provinsi_Jawa_Timur-2019.xlsx', '2022-04-18 06:36:27', 'editor_yanti', '0'),
(2, 2019, 2.94, 3, 202, 'TMPI-Provinsi_DKI_Jakarta-2019.xlsx', '2022-04-18 06:36:46', 'editor_yanti', '0'),
(3, 2019, 2.92, 3, 174, 'TMPI-Provinsi_Jawa_Barat-2019.xlsx', '2022-04-18 06:37:02', 'editor_yanti', '0'),
(4, 2020, 2.65, 3, 209, 'TMPI-Provinsi_Jawa_Tengah-2019.xlsx', '2022-04-18 06:38:46', 'editor_yanti', '0'),
(5, 2019, 2.18, 2, 245, '', '2022-04-18 06:37:42', 'editor_yanti', '0'),
(6, 2019, 2.09, 2, 364, 'TMPI-Provinsi_Kalimantan_Selatan-2019.xlsx', '2022-04-18 06:42:58', 'editor_yanti', '0'),
(7, 2019, 1.96, 2, 72, 'TMPI-Provinsi_Kepulauan_Riau-2019.xlsx', '2022-04-18 06:38:14', 'editor_yanti', '0'),
(8, 2019, 1.87, 2, 157, 'TMPI-Provinsi_Kepulauan_Bangka_Belitung-2019.xlsx', '2022-04-18 06:39:12', 'editor_yanti', '0'),
(9, 2019, 1.56, 1, 92, 'TMPI-Provinsi_Sumatera_Barat-2019.xlsx', '2022-04-18 06:40:55', 'editor_yanti', '0'),
(10, 2019, 1.52, 1, 25, 'TMPI-Provinsi_Sumatera_Utara-2019.xlsx', '2022-04-18 06:41:18', 'editor_yanti', '0'),
(11, 2019, 1.2, 1, 300, 'TMPI-Provinsi_Nusa_Tenggara_Barat-2019.xlsx', '2022-04-18 06:43:12', 'editor_yanti', '0'),
(12, 2019, 1.03, 1, 412, 'TMPI-Provinsi_Gorontalo-2019.xlsx', '2022-04-18 06:43:27', 'editor_yanti', '0'),
(13, 2019, 0.96, 1, 426, 'TMPI-Provinsi_Sulawesi_Selatan-2019.xlsx', '2022-04-18 06:43:40', 'editor_yanti', '0'),
(14, 2019, 0.9, 1, 112, 'TMPI-Provinsi_Sumatera_Selatan-2019.xlsx', '2022-04-18 06:41:35', 'editor_yanti', '0'),
(15, 2019, 0.88, 1, 146, 'TMPI-Provinsi_Bengkulu-2019.xlsx', '2022-04-18 06:41:47', 'editor_yanti', '0'),
(16, 2019, 0.81, 1, 59, 'TMPI-Provinsi_Riau-2019.xlsx', '2022-04-18 06:41:58', 'editor_yanti', '0'),
(17, 2019, 0.77, 1, 396, 'TMPI-Provinsi_Sulawesi_Utara-2019.xlsx', '2022-04-18 06:43:57', 'editor_yanti', '0'),
(18, 2019, 0.73, 1, 80, 'TMPI-Provinsi_Jambi-2019.xlsx', '2022-04-18 06:42:13', 'editor_yanti', '0'),
(19, 2019, 0.5, 1, 1, 'TMPI-Provinsi_Aceh-2019.xlsx', '2022-04-18 06:42:30', 'editor_yanti', '0'),
(20, 2019, 0.24, 1, 451, 'TMPI-Provinsi_Sulawesi_Tengah-2019.xlsx', '2022-04-18 06:44:13', 'editor_yanti', '0'),
(21, 2019, 0.04, 1, 130, 'TMPI-Provinsi_Lampung-2019.xlsx', '2022-04-18 06:42:42', 'editor_yanti', '0'),
(22, 2019, 0.13, 1, 537, 'TMPI-Provinsi_Papua_Barat-2019.xlsx', '2022-04-18 06:44:51', 'editor_yanti', '0'),
(23, 2019, 0.08, 1, 334, NULL, '2022-04-12 06:01:49', NULL, '0'),
(24, 2019, 0.17, 1, 483, 'TMPI-Provinsi_Maluku-2019.xlsx', '2022-05-11 03:52:28', 'editor_yanti', '0'),
(25, 2019, 3.16, 3, 242, NULL, '2022-04-12 06:01:55', NULL, '0'),
(26, 2019, 0.92, 1, 281, NULL, '2022-04-12 06:02:03', NULL, '0'),
(27, 2019, 0.53, 0, 432, NULL, '2022-04-12 06:02:08', NULL, '0'),
(28, 2019, 0.29, 1, 118, NULL, '2022-04-12 06:02:12', NULL, '0'),
(29, 2019, 0.15, 1, 253, '', '2022-05-09 08:18:12', 'admin_master', '0'),
(30, 2020, 1.48, 1, 213, NULL, '2022-04-12 06:02:21', NULL, '0'),
(31, 2020, 1.09, 1, 165, NULL, '2022-04-12 06:02:25', NULL, '0'),
(32, 2020, 0.89, 1, 290, NULL, '2022-04-12 06:02:29', NULL, '0'),
(33, 2020, 0.7, 1, 349, NULL, '2022-04-12 06:02:32', NULL, '0'),
(34, 2020, 0.19, 1, 378, NULL, '2022-04-12 06:02:37', NULL, '0'),
(35, 2020, 0.43, 1, 385, NULL, '2022-04-12 06:02:41', NULL, '0'),
(36, 2021, 1.18, 1, 483, 'TMPI-Provinsi_Maluku-2021.xlsx', '2022-05-11 03:49:42', 'editor_yanti', '0'),
(37, 2021, 0.88, 1, 537, 'TMPI-Provinsi_Papua_Barat-2021.xlsx', '2022-04-18 06:29:10', 'editor_yanti', '0'),
(38, 2021, 2, 2, 217, NULL, '2022-04-28 07:21:06', 'admin_master', '0'),
(39, 2021, 0.62, 1, 278, NULL, '2022-04-12 06:02:55', NULL, '0'),
(40, 2021, 1.79, 2, 228, NULL, '2022-04-12 06:03:04', NULL, '0'),
(41, 2021, 1.64, 2, 198, NULL, '2022-04-12 06:03:09', NULL, '0'),
(42, 2021, 1.44, 1, 218, NULL, '2022-04-12 06:03:11', NULL, '0'),
(43, 2021, 0.27, 1, 126, NULL, '2022-04-12 06:03:14', NULL, '0'),
(44, 2021, 1.99, 2, 173, NULL, '2022-04-12 06:03:17', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_provinsi`
--

CREATE TABLE `wilayah_provinsi` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `code_vmap` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_provinsi`
--

INSERT INTO `wilayah_provinsi` (`id`, `nama`, `code_vmap`) VALUES
(1, 'Aceh', 'path01'),
(2, 'Sumatera Utara', 'path02'),
(3, 'Riau', 'path04'),
(4, 'Kepulauan Riau', 'path10'),
(5, 'Jambi', 'path05'),
(6, 'Sumatera Barat', 'path03'),
(7, 'Sumatera Selatan', 'path06'),
(8, 'Lampung', 'path08'),
(9, 'Bengkulu', 'path07'),
(10, 'Kepulauan Bangka Belitung', 'path09'),
(11, 'Banten', 'path14'),
(12, 'Jawa Barat', 'path12'),
(13, 'DKI Jakarta', 'path11'),
(14, 'Jawa Tengah', 'path13'),
(15, 'D.I. Yogyakarta', 'path16'),
(16, 'Jawa Timur', 'path15'),
(17, 'Bali', 'path17'),
(18, 'Nusa Tenggara Barat', 'path18'),
(19, 'Nusa Tenggara Timur', 'path19'),
(20, 'Kalimantan Barat', 'path20'),
(21, 'Kalimantan Tengah', 'path21'),
(22, 'Kalimantan Selatan', 'path22'),
(23, 'Kalimantan Utara', 'path24'),
(24, 'Kalimantan Timur', 'path23'),
(25, 'Sulawesi Utara', 'path25'),
(26, 'Gorontalo', 'path29'),
(27, 'Sulawesi Barat', 'path30'),
(28, 'Sulawesi Selatan', 'path27'),
(29, 'Sulawesi Tengah', 'path26'),
(30, 'Sulawesi Tenggara', 'path28'),
(31, 'Maluku', 'path31'),
(32, 'Maluku Utara', 'path32'),
(33, 'Papua', 'path33'),
(34, 'Papua Barat', 'path34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csirt`
--
ALTER TABLE `csirt`
  ADD PRIMARY KEY (`Id_CSIRT`),
  ADD KEY `Instansi` (`Instansi`);

--
-- Indexes for table `csm`
--
ALTER TABLE `csm`
  ADD PRIMARY KEY (`Id_CSM`),
  ADD KEY `Instansi` (`Instansi`);

--
-- Indexes for table `ikami`
--
ALTER TABLE `ikami`
  ADD PRIMARY KEY (`Id_IKAMI`),
  ADD KEY `Instansi` (`Instansi`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`Id_Instansi`),
  ADD KEY `fk_provinsi` (`Provinsi`),
  ADD KEY `Provinsi` (`Provinsi`);

--
-- Indexes for table `laporan_persandian`
--
ALTER TABLE `laporan_persandian`
  ADD PRIMARY KEY (`Id_LapSan`),
  ADD KEY `Instansi` (`Instansi`);

--
-- Indexes for table `pic_instansi`
--
ALTER TABLE `pic_instansi`
  ADD PRIMARY KEY (`Id_PIC`);

--
-- Indexes for table `tmpi`
--
ALTER TABLE `tmpi`
  ADD PRIMARY KEY (`Id_TMPI`),
  ADD KEY `Instansi` (`Instansi`);

--
-- Indexes for table `wilayah_provinsi`
--
ALTER TABLE `wilayah_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `csirt`
--
ALTER TABLE `csirt`
  MODIFY `Id_CSIRT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `csm`
--
ALTER TABLE `csm`
  MODIFY `Id_CSM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ikami`
--
ALTER TABLE `ikami`
  MODIFY `Id_IKAMI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `Id_Instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;

--
-- AUTO_INCREMENT for table `laporan_persandian`
--
ALTER TABLE `laporan_persandian`
  MODIFY `Id_LapSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `pic_instansi`
--
ALTER TABLE `pic_instansi`
  MODIFY `Id_PIC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tmpi`
--
ALTER TABLE `tmpi`
  MODIFY `Id_TMPI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `csirt`
--
ALTER TABLE `csirt`
  ADD CONSTRAINT `csirt_ibfk_1` FOREIGN KEY (`Instansi`) REFERENCES `instansi` (`Id_Instansi`);

--
-- Constraints for table `csm`
--
ALTER TABLE `csm`
  ADD CONSTRAINT `csm_ibfk_1` FOREIGN KEY (`Instansi`) REFERENCES `instansi` (`Id_Instansi`);

--
-- Constraints for table `ikami`
--
ALTER TABLE `ikami`
  ADD CONSTRAINT `ikami_ibfk_1` FOREIGN KEY (`Instansi`) REFERENCES `instansi` (`Id_Instansi`);

--
-- Constraints for table `instansi`
--
ALTER TABLE `instansi`
  ADD CONSTRAINT `instansi_ibfk_1` FOREIGN KEY (`Provinsi`) REFERENCES `wilayah_provinsi` (`id`);

--
-- Constraints for table `tmpi`
--
ALTER TABLE `tmpi`
  ADD CONSTRAINT `tmpi_ibfk_1` FOREIGN KEY (`Instansi`) REFERENCES `instansi` (`Id_Instansi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
