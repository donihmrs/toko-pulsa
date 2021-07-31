/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.31-0ubuntu0.18.04.1 : Database - tokopulsa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokopulsa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tokopulsa`;

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(50) DEFAULT NULL,
  `rekening` varchar(30) DEFAULT NULL,
  `pemilik` varchar(75) DEFAULT NULL,
  `cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bank` */

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT '1',
  `n_barang` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `deskripsi` text,
  `feature` tinyint(1) DEFAULT '0',
  `permalink` varchar(50) DEFAULT NULL,
  `meta_title` varchar(80) DEFAULT NULL,
  `keyword` varchar(80) DEFAULT NULL,
  `meta_deskripsi` varchar(160) DEFAULT NULL,
  `berat` int(11) DEFAULT '1000',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`id_kategori`,`n_barang`,`code`,`harga`,`gambar`,`deskripsi`,`feature`,`permalink`,`meta_title`,`keyword`,`meta_deskripsi`,`berat`,`created_at`) values 
(1,3,'085777038748','IND-01',5000000,'Ud3niIKTG2-Logo_IM3_Ooredoo.png','&lt;p&gt;Nomor cantik Indosat&lt;/p&gt;\r\n',1,'IND-01','Indosat nomor cantik ','nomor cantik,indosat','nomor cantik indosat tangerang murah',1,'2021-07-31 23:15:41'),
(2,2,'087777478477','XL-1',3000000,'JN3hZTAu0a-LOGO-XL.jpg','&lt;p&gt;Nomor cantik XL&lt;/p&gt;\r\n',1,'XL-1','','','',10,'2021-07-31 23:20:34'),
(3,3,'08577123457','IND-2',500000,'EVgWtpztbq-Logo_IM3_Ooredoo.png','&lt;p&gt;Nomor cantik indosat&lt;/p&gt;\r\n',1,'IND-02','','','',10,'2021-07-31 23:21:14'),
(4,4,'08999858989','Three-01',500000,'waC16FARRI-Three_Logo.png','&lt;p&gt;Nomor cantik three&lt;/p&gt;\r\n',1,'Three-01','','','',10,'2021-07-31 23:22:25'),
(5,1,'081212121212','Simpati-01',1000000,'OItX3RUwdr-logo_telkomsel_1.png','&lt;p&gt;Nomor cantik telkomsel&lt;/p&gt;\r\n',1,'simpati-1','','','',10,'2021-07-31 23:24:38');

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `n_perusahaan` varchar(40) NOT NULL,
  `alt_perusahaan` varchar(70) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `hp` varchar(17) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo` varchar(25) DEFAULT NULL,
  `sing_perusahaan` varchar(5) DEFAULT NULL,
  `feature_top` text,
  `feature_center` text,
  `feature_bottom` text,
  `about` text,
  `contact` text,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `config` */

insert  into `config`(`id_config`,`n_perusahaan`,`alt_perusahaan`,`phone`,`hp`,`email`,`logo`,`sing_perusahaan`,`feature_top`,`feature_center`,`feature_bottom`,`about`,`contact`) values 
(1,'Indojaya Makmur Group','Tangerang','021-1234567','62858-9389-9094','donihamster88@gmail.com','LOGO.jpg','GROUP',NULL,NULL,NULL,'&lt;h1 style=&quot;text-align:center&quot;&gt;Indojayamakmur Group&lt;/h1&gt;\r\n\r\n&lt;p&gt;DAPAT MENGUBAH DI MENU KONFIGURASI &amp;gt; ABOUT US&lt;/p&gt;\r\n','&lt;h1 style=&quot;text-align:center&quot;&gt;Hubungi Kami&lt;/h1&gt;\r\n\r\n&lt;p&gt;DAPAT MENGUBAH DI MENU KONFIGURASI &amp;gt; CONTACT US&lt;/p&gt;\r\n');

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `body` text,
  `image` varchar(75) DEFAULT NULL,
  `permalink` varchar(75) DEFAULT NULL,
  `meta_title` varchar(80) DEFAULT NULL,
  `keyword` varchar(80) DEFAULT NULL,
  `meta_deskripsi` varchar(160) DEFAULT NULL,
  `creator` varchar(25) DEFAULT 'Content Creator',
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `content` */

/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `file` varchar(25) NOT NULL,
  `lokasi` varchar(35) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `file` */

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gambar` */

insert  into `gambar`(`id_gambar`,`type`,`file`) values 
(1,'top','tmZKy-Webp_net-resizeimage.png');

/*Table structure for table `gambar_barang` */

DROP TABLE IF EXISTS `gambar_barang`;

CREATE TABLE `gambar_barang` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `nama_gambar` varchar(100) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar_barang` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `n_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`n_kategori`) values 
(1,'Simpati'),
(2,'XL'),
(3,'Indosat'),
(4,'Three');

/*Table structure for table `sosial` */

DROP TABLE IF EXISTS `sosial`;

CREATE TABLE `sosial` (
  `id_sosial` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_sosial`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sosial` */

insert  into `sosial`(`id_sosial`,`type`,`link`) values 
(1,'facebook','https://api.whatsapp.com/send?phone=6285893899094');

/*Table structure for table `template` */

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(12) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `title` text,
  `body` text,
  `footer` text,
  `link_button` text,
  `text_button` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `template` */

insert  into `template`(`id_template`,`type`,`name`,`title`,`body`,`footer`,`link_button`,`text_button`) values 
(1,'header','Top','&lt;p&gt;Jual Berbagai Nomor Cantik Operator&lt;/p&gt;\r\n','&lt;p&gt;&lt;span style=&quot;font-size:16px&quot;&gt;XL, Simpati, Indosat, Three, Kartu AS, Axis dan lainnya&lt;/span&gt;&lt;/p&gt;\r\n','&lt;p&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Order Sekarang Juga&lt;/span&gt;&lt;/p&gt;\r\n','https://web.facebook.com/ptindojayamakmur/?_rdc=1&amp;_rdr','Our Facebook'),
(2,'center','Header Text','&lt;p&gt;Menjual Nomor Cantik&lt;/p&gt;\r\n','&lt;p&gt;Nomor Cantik Operator Di Tangerang&lt;/p&gt;\r\n','&lt;p&gt;Nomor Cantik Operator Di Tangerang&lt;/p&gt;\r\n','https://web.facebook.com/ptindojayamakmur/?_rdc=1&amp;_rdr','Order Nomor Cantik'),
(3,'footerleft','Footer Left','&lt;p&gt;Pelayanan&lt;/p&gt;\r\n','&lt;p&gt;Pelayanan yang cepat dan ramah&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://api.whatsapp.com/send?phone=6285893899094','Pelayanan Cepat'),
(4,'footercenter','Footer Center','&lt;p&gt;Pembayaran&lt;/p&gt;\r\n','&lt;p&gt;Dapat COD (Tangerang &amp;amp; Jakarta)&amp;nbsp;ataupun Transfer&amp;nbsp;&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://api.whatsapp.com/send?phone=6285893899094','-'),
(5,'footerright','Footer RIGHT','&lt;p&gt;Terpercaya&lt;/p&gt;\r\n','&lt;p&gt;Kami dapat dipercaya dalam penjualan nomor cantik seluruh operator&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://api.whatsapp.com/send?phone=6285893899094','-');

/*Table structure for table `trans_barang` */

DROP TABLE IF EXISTS `trans_barang`;

CREATE TABLE `trans_barang` (
  `id_transbarang` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `berat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_barang` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(35) DEFAULT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `ongkir` varchar(25) DEFAULT NULL,
  `harga_ongkir` varchar(10) DEFAULT NULL,
  `service` varchar(20) DEFAULT NULL,
  `pembayaran` smallint(2) DEFAULT NULL,
  `opt_pembayaran` varchar(20) DEFAULT 'NULL',
  `total` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `resi` varchar(35) DEFAULT 'NULL',
  `accnumber` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(34) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '3',
  `hp` varchar(16) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id_users`,`username`,`password`,`nama`,`email`,`level`,`hp`) values 
(1,'admin','e6e061838856bf47e1de730719fb2609','Administrator','donihamster88@gmail.com',1,'+6285893899094');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
