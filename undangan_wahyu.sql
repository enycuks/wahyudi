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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table undangan_wahyu.undangan: ~0 rows (approximately)
/*!40000 ALTER TABLE `undangan` DISABLE KEYS */;
INSERT INTO `undangan` (`id`, `tgl_terima`, `instansi`, `perihal`, `tgl_pelaksana`, `delegasi`, `ket`, `file`) VALUES
	(2, '2021-10-02', 'Instansi edit', 'Perihal edit', '2021-10-04', 'delegasi edit', 'keterangan edit', 'Analytics_Filtered_View_Halaman_20210817-20210916.pdf'),
	(3, '2021-10-02', 'Instansi 3', 'Perihal 3', '2021-10-05', 'delegasi 3', 'keterangan 3', 'Data_Siswa.pdf');
/*!40000 ALTER TABLE `undangan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
