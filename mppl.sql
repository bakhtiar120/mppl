-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 05:30 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_histori`
--

CREATE TABLE IF NOT EXISTS `detail_histori` (
  `id_histori` varchar(10) NOT NULL,
  `id_layanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_histori`
--

INSERT INTO `detail_histori` (`id_histori`, `id_layanan`) VALUES
('HSTO0001', 'LAYN0001'),
('HSTO0001', 'LAYN0003'),
('HSTO0001', 'LAYN0004'),
('HSTO0002', 'LAYN0004'),
('HSTO0003', 'LAYN0004');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `alamat_dokter` varchar(255) NOT NULL,
  `telp_dokter` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat_dokter`, `telp_dokter`) VALUES
('DOKT0001', 'dr. Agus Saifullah', 'Perum. Jayanegara Blok A / 45, Surabaya', '08572461824'),
('DOKT0002', 'dr. Yusuf Maulana', 'JL. Gajahmada No.43 Surabaya', '08572658907');

--
-- Triggers `dokter`
--
DROP TRIGGER IF EXISTS `insert_dokter`;
DELIMITER //
CREATE TRIGGER `insert_dokter` BEFORE INSERT ON `dokter`
 FOR EACH ROW BEGIN
  INSERT INTO dokter_seq VALUES (NULL);
  SET NEW.id_dokter = CONCAT('DOKT', LPAD(LAST_INSERT_ID(), 4, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dokter_seq`
--

CREATE TABLE IF NOT EXISTS `dokter_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dokter_seq`
--

INSERT INTO `dokter_seq` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'dokter', ''),
(4, 'resepsionis', '');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE IF NOT EXISTS `histori` (
  `id_histori` varchar(10) NOT NULL,
  `tanggal_histori` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resep` text NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_histori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `tanggal_histori`, `resep`, `catatan`) VALUES
('HSTO0001', '2015-03-08 11:30:27', '10 Amoxicilin', 'Pasien mengalami Flu'),
('HSTO0002', '2015-03-08 12:59:56', '10 gr Paracetamol', 'Keluhan minggu lalu telah berkurang'),
('HSTO0003', '2015-03-08 13:36:43', '2 Sachet Obat Sakit Kepala Migrain', 'Sakit Kepala Sebelah');

--
-- Triggers `histori`
--
DROP TRIGGER IF EXISTS `histori_insert`;
DELIMITER //
CREATE TRIGGER `histori_insert` BEFORE INSERT ON `histori`
 FOR EACH ROW BEGIN
  INSERT INTO histori_seq VALUES (NULL);
  SET NEW.id_histori = CONCAT('HSTO', LPAD(LAST_INSERT_ID(), 4, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `histori_seq`
--

CREATE TABLE IF NOT EXISTS `histori_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `histori_seq`
--

INSERT INTO `histori_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `tarif_layanan` int(11) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `tarif_layanan`) VALUES
('LAYN0001', 'Periksa Mata', 100000),
('LAYN0002', 'Medical Check Up', 120000),
('LAYN0003', 'Pemeriksaan Rongga Mulut', 40000),
('LAYN0004', 'Konsultasi', 40000);

--
-- Triggers `layanan`
--
DROP TRIGGER IF EXISTS `layanan_insert`;
DELIMITER //
CREATE TRIGGER `layanan_insert` BEFORE INSERT ON `layanan`
 FOR EACH ROW BEGIN
  INSERT INTO layanan_seq VALUES (NULL);
  SET NEW.id_layanan = CONCAT('LAYN', LPAD(LAST_INSERT_ID(), 4, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_seq`
--

CREATE TABLE IF NOT EXISTS `layanan_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `layanan_seq`
--

INSERT INTO `layanan_seq` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `telp_pasien` varchar(20) NOT NULL,
  `jk_pasien` char(1) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `telp_pasien`, `jk_pasien`) VALUES
('PASN0001', 'Adi', 'Jl. Ketintang 34 Surabaya', '031-284912', 'L'),
('PASN0002', 'Tuto Wiryono', 'Jl Semeru 24 Malang', '0341-379203', 'L');

--
-- Triggers `pasien`
--
DROP TRIGGER IF EXISTS `pasien_insert`;
DELIMITER //
CREATE TRIGGER `pasien_insert` BEFORE INSERT ON `pasien`
 FOR EACH ROW BEGIN
  INSERT INTO pasien_seq VALUES (NULL);
  SET NEW.id_pasien = CONCAT('PASN', LPAD(LAST_INSERT_ID(), 4, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien_seq`
--

CREATE TABLE IF NOT EXISTS `pasien_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pasien_seq`
--

INSERT INTO `pasien_seq` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pasien` varchar(10) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `id_histori` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `id_pasien`, `id_dokter`, `id_histori`) VALUES
('TRNS0001', '2015-03-08 10:24:39', 'PASN0002', 'DOKT0002', 'HSTO0001'),
('TRNS0002', '2015-03-08 12:53:10', 'PASN0002', 'DOKT0001', 'HSTO0002'),
('TRNS0003', '2015-03-08 13:35:01', 'PASN0001', 'DOKT0001', 'HSTO0003');

--
-- Triggers `transaksi`
--
DROP TRIGGER IF EXISTS `transaksi_insert`;
DELIMITER //
CREATE TRIGGER `transaksi_insert` BEFORE INSERT ON `transaksi`
 FOR EACH ROW BEGIN
  INSERT INTO transaksi_seq VALUES (NULL);
  SET NEW.id_transaksi = CONCAT('TRNS', LPAD(LAST_INSERT_ID(), 4, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_seq`
--

CREATE TABLE IF NOT EXISTS `transaksi_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaksi_seq`
--

INSERT INTO `transaksi_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1425873319, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'dr. agus saifullah', '$2y$08$IvwDy.BE3E9QANMcY8b/v.p6jyryoS.tzbBq4G1TLW.GxKcmBrhY2', NULL, 'agus@gmail.com', NULL, NULL, NULL, NULL, 1425184901, 1425821708, 1, 'dr. Agus', 'Saifullah', 'Klinik', '081234124'),
(3, '127.0.0.1', 'wawan hendrawan', '$2y$08$Uf3NPMefmr73tqD1f9txNeqhAgsHD8peMtmd81HCm/oigXtI6Wz0a', NULL, 'wawan@gmail.com', NULL, NULL, NULL, NULL, 1425822828, 1425823113, 1, 'Wawan', 'Hendrawan', 'SIKLIK', '0812849430');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 3),
(6, 3, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
