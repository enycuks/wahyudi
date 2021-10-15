-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for undangan_wahyu
CREATE DATABASE IF NOT EXISTS `undangan_wahyu` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `undangan_wahyu`;

-- Dumping structure for table undangan_wahyu.undangan
CREATE TABLE IF NOT EXISTS `undangan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_terima` date NOT NULL,
  `instansi` varchar(255) NOT NULL DEFAULT '0',
  `perihal` text NOT NULL,
  `tgl_pelaksana` date NOT NULL,
  `delegasi` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `jam` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table undangan_wahyu.undangan: ~3 rows (approximately)
/*!40000 ALTER TABLE `undangan` DISABLE KEYS */;
INSERT INTO `undangan` (`id`, `tgl_terima`, `instansi`, `perihal`, `tgl_pelaksana`, `delegasi`, `ket`, `file`, `jam`) VALUES
	(3, '2021-10-07', 'IAIN Palangka Raya', 'Sosialisasi', '2021-10-14', 'Kepala', 'Hm inya', 'Kuitansi_033_Turnitin_IAIN_Palangka_Raya_TA_2021.pdf', '2021-10-13 21:30:00'),
	(4, '2021-10-11', 'IAKN Palangka Raya', 'Rapat', '2021-10-13', 'Kepala Badab', 'jam nya ni bos', 'report2.pdf', '2021-10-13 21:25:00'),
	(5, '2021-10-13', '5', '5', '2021-10-14', '5', '5', 'report3.pdf', '2021-10-14 21:29:00');
/*!40000 ALTER TABLE `undangan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
