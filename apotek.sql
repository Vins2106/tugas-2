SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `month`;
CREATE TABLE IF NOT EXISTS `month` (
  `month_num` int(2) NOT NULL,
  `month_name` varchar(20) NOT NULL,
  PRIMARY KEY (`month_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `month` (`month_num`, `month_name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

DROP TABLE IF EXISTS `table_cat`;

DROP TABLE IF EXISTS `table_invoice`;
CREATE TABLE IF NOT EXISTS `table_invoice` (
  `id_tagihan` int(5) NOT NULL AUTO_INCREMENT,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_tagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `table_med`;
CREATE TABLE IF NOT EXISTS `table_med` (
  `id_obat` int(4) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(30) NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `stok` int(3) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `kedaluwarsa` date NOT NULL,
  `des_obat` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  PRIMARY KEY (`id_obat`),
  UNIQUE KEY `nama_obat` (`nama_obat`),
  KEY `med_unit` (`unit`),
  KEY `med_cat` (`nama_kategori`),
  KEY `med_sup` (`nama_pemasok`)
) ENGINE=InnoDB AUTO_INCREMENT=1037 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `table_purchase`;
CREATE TABLE IF NOT EXISTS `table_purchase` (
  `id_pembelian` int(5) NOT NULL AUTO_INCREMENT,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pemasok` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `table_sup`;
CREATE TABLE IF NOT EXISTS `table_sup` (
  `id_pem` int(3) NOT NULL AUTO_INCREMENT,
  `nama_pemasok` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pem`),
  UNIQUE KEY `nama_supplier` (`nama_pemasok`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `table_unit`;
CREATE TABLE IF NOT EXISTS `table_unit` (
  `id_unit` int(2) NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_unit`),
  UNIQUE KEY `unit` (`unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `table_unit` (`id_unit`, `unit`) VALUES
(1, 'Kapsul'),
(2, 'Semprot'),
(3, 'Sirup'),
(4, 'Tablet');

ALTER TABLE `table_med`
  ADD CONSTRAINT `med_cat` FOREIGN KEY (`nama_kategori`) REFERENCES `table_cat` (`nama_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_sup` FOREIGN KEY (`nama_pemasok`) REFERENCES `table_sup` (`nama_pemasok`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_unit` FOREIGN KEY (`unit`) REFERENCES `table_unit` (`unit`) ON UPDATE CASCADE;
COMMIT;