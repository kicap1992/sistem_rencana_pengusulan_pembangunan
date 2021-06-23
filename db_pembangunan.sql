-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 01:21 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembangunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `no` int(1) NOT NULL,
  `kelurahan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`no`, `kelurahan`) VALUES
(1, 'Galung Maloang'),
(2, 'Lemoe'),
(3, 'Lompoe'),
(4, 'Watang Bacukiki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_penolakan`
--

CREATE TABLE `tb_ket_penolakan` (
  `no` int(3) NOT NULL,
  `ket_admin` text DEFAULT NULL,
  `ket_camat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ket_penolakan`
--

INSERT INTO `tb_ket_penolakan` (`no`, `ket_admin`, `ket_camat`) VALUES
(13, NULL, 'Tolak Usulan'),
(16, NULL, 'Tolak Usulan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana_pembangunan`
--

CREATE TABLE `tb_rencana_pembangunan` (
  `no` int(3) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `biaya` varchar(9) NOT NULL,
  `rtrw` int(2) DEFAULT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `exel_url` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencana_pembangunan`
--

INSERT INTO `tb_rencana_pembangunan` (`no`, `nik`, `judul`, `biaya`, `rtrw`, `tanggal_upload`, `exel_url`, `status`) VALUES
(7, '3333333333333333', 'asdasdasd', '3,000,000', 9, '2020-09-06 21:22:54', 'laporan/7/adiburning.pdf', 3),
(8, '3333333333333333', 'Rencana Pembangunan Lompoe', '4,000,000', 8, '2020-09-06 21:40:43', 'laporan/8/04550057.pdf', 1),
(9, '2222222222222222', 'Rencana Pembangunan Lemoe 1', '5,000,000', 5, '2020-09-06 21:41:24', 'laporan/9/adi_3.pdf', 1),
(10, '2222222222222222', 'Rencana Pembangunan Lemoe 2', '6,000,000', 6, '2020-09-06 21:41:46', 'laporan/10/certificate.pdf', 1),
(11, '1111111111111112', 'Rencana Pembangunan Galung Maloang 1', '7,000,000', 1, '2020-09-06 21:42:46', 'laporan/11/kirim_2.pdf', 3),
(12, '1111111111111112', 'Rencana Pembangunan Galung Maloang 2', '9,000,000', 2, '2020-09-06 21:43:09', 'laporan/12/Sad-Theme-One-Punch-Man.pdf', 1),
(13, '1111111111111112', 'Rencana Pembangunan Galung Maloang 3', '7,000,000', 3, '2020-09-06 21:43:33', 'laporan/13/the-hero-one-punch-man.pdf', 4),
(14, '1111111111111112', 'Rencana Pembangunan Galung Maloang 4', '20,000,00', 4, '2020-09-06 21:44:03', 'laporan/14/Studi_Kelayakan_Sarana&Prasarana_Laboratorium_Komputer_Jurus.pdf', 1),
(15, '4444444444444444', 'Rencana Pembangunan Watang Bacukiki 1', '33,300,00', 11, '2020-09-06 21:44:37', 'laporan/15/l. BAB I ~ BAB V SISTEM INFORMASI INVENTARIS LABORATORIUM TEKNIK ELEKTRO UMY BERBASIS WEB', 1),
(16, '4444444444444444', 'Rencana Pembangunan Watang Bacukiki 2', '5,000,000', 12, '2020-09-06 21:44:56', 'laporan/16/0599032.pdf', 4),
(17, '4444444444444444', 'Rencana Pembangunan Watang Bacukiki 3\r\n', '6,000,000', 13, '2020-09-06 21:45:24', 'laporan/17/adiburning.pdf', 1),
(18, '4444444444444444', 'Rencana Pembangunan Watang Bacukiki 4', '4,000,000', 14, '2020-09-06 21:45:43', 'laporan/18/073611039_Coverdll.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rtrw`
--

CREATE TABLE `tb_rtrw` (
  `no` int(2) NOT NULL,
  `kelurahan` int(1) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `rt` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rtrw`
--

INSERT INTO `tb_rtrw` (`no`, `kelurahan`, `rw`, `rt`) VALUES
(1, 1, '002', '001'),
(2, 1, '002', '002'),
(3, 1, '007', '001'),
(4, 1, '007', '002'),
(5, 2, '005', '001'),
(6, 2, '005', '002'),
(7, 3, '001', '001'),
(8, 3, '001', '002'),
(9, 3, '004', '001'),
(10, 3, '004', '002'),
(11, 4, '003', '001'),
(12, 4, '003', '002'),
(13, 4, '006', '001'),
(14, 4, '006', '002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff_kelurahan`
--

CREATE TABLE `tb_staff_kelurahan` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `kelurahan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_staff_kelurahan`
--

INSERT INTO `tb_staff_kelurahan` (`nik`, `nama`, `email`, `no_telpon`, `kelurahan`) VALUES
('1111111111111112', 'Galung Maloang', 'GalungMaloang@gmail.com', '081245126523', 1),
('2222222222222222', 'Lemoe', 'Lemoe@gmail.com', '082245124514', 2),
('3333333333333333', 'Lompoe', 'lompoe@gmail.com', '08412541263', 3),
('4444444444444444', 'Watang Bacukiki', 'WatangBacukiki@gmail.com', '082365412569', 4),
('9876543210125478', 'Adrianus Aransina Tukan', 'kicap.karan92@gmail.com', '082293246583', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `no` int(1) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`no`, `status`) VALUES
(1, 'Menunggu Pengesahan Admin'),
(2, 'Diterima Oleh Admin, Sedang Dalam Pengesahan Camat'),
(3, 'Diterima Oleh Admin, Diterima Oleh Camat'),
(4, 'Diterima Oleh Admin, Ditolak Oleh Camat'),
(5, 'Ditolak Oleh Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik_staff` varchar(16) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `username`, `password`, `nik_staff`, `level`) VALUES
(1, 'Galung Maloang', 'Galung Maloang', '1111111111111112', 3),
(2, 'Lemoe', 'Lemoe', '2222222222222222', 3),
(3, 'Lompoe', 'Lompoe', '3333333333333333', 3),
(4, 'Watang Bacukiki', 'Watang Bacukiki', '4444444444444444', 3),
(5, 'admin', 'admin', NULL, 1),
(6, 'camat', 'camat', NULL, 2),
(7, '9876543210125478', '9876543210125478', '9876543210125478', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_ket_penolakan`
--
ALTER TABLE `tb_ket_penolakan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_rencana_pembangunan`
--
ALTER TABLE `tb_rencana_pembangunan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nik_staff` (`nik`),
  ADD KEY `status` (`status`),
  ADD KEY `rtrw` (`rtrw`);

--
-- Indexes for table `tb_rtrw`
--
ALTER TABLE `tb_rtrw`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kelurahan` (`kelurahan`);

--
-- Indexes for table `tb_staff_kelurahan`
--
ALTER TABLE `tb_staff_kelurahan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `kelurahan` (`kelurahan`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nik_staff` (`nik_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `no` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_rencana_pembangunan`
--
ALTER TABLE `tb_rencana_pembangunan`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_rtrw`
--
ALTER TABLE `tb_rtrw`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `no` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ket_penolakan`
--
ALTER TABLE `tb_ket_penolakan`
  ADD CONSTRAINT `tb_ket_penolakan_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_rencana_pembangunan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rencana_pembangunan`
--
ALTER TABLE `tb_rencana_pembangunan`
  ADD CONSTRAINT `tb_rencana_pembangunan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_staff_kelurahan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rencana_pembangunan_ibfk_2` FOREIGN KEY (`status`) REFERENCES `tb_status` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rencana_pembangunan_ibfk_3` FOREIGN KEY (`rtrw`) REFERENCES `tb_rtrw` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rtrw`
--
ALTER TABLE `tb_rtrw`
  ADD CONSTRAINT `tb_rtrw_ibfk_1` FOREIGN KEY (`kelurahan`) REFERENCES `tb_kelurahan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_staff_kelurahan`
--
ALTER TABLE `tb_staff_kelurahan`
  ADD CONSTRAINT `tb_staff_kelurahan_ibfk_1` FOREIGN KEY (`kelurahan`) REFERENCES `tb_kelurahan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`nik_staff`) REFERENCES `tb_staff_kelurahan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
