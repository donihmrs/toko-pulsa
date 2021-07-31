/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.47-MariaDB-0ubuntu0.18.04.1 : Database - tokotdc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokopulsa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bank` */

insert  into `bank`(`id_bank`,`nama_bank`,`rekening`,`pemilik`,`cabang`) values 
(2,'Mandiri','1234567891231','Doni Syahroni','KCP Taman Semanan Indah');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`id_kategori`,`n_barang`,`code`,`harga`,`gambar`,`deskripsi`,`feature`,`permalink`,`meta_title`,`keyword`,`meta_deskripsi`,`berat`,`created_at`) values 
(1,1,'Dress A','DressA',100000,'qoJ54-282163_hannah-loose-blouse-white_white_5X2NK.jpg','&lt;p&gt;Dress Ini Point A&lt;/p&gt;\r\n',1,'dress-A','Menjual Dress A','dress,jual','Menjual banyak dress',1500,'2020-12-03 03:02:16'),
(2,1,'Dress B','DressB',75000,'goofYDyPY2-280676_elaina-flower-relax-dress-brown_brown_BXKRI.jpg','&lt;p&gt;Dress B Mantap Kali&lt;/p&gt;\r\n',0,'dressb','Dress B Murah Meriah','Jual,dress,murah','Dress B Murah Meriah Hanya di sini',1,'2020-12-03 03:13:46'),
(3,1,'Dress C','DressC',150000,'oezjw-282478_ikita-long-dress-brown_brown_ZNBD7.jpg','&lt;p&gt;Dress C Murah Meriah Hanya di mari&lt;/p&gt;\r\n',0,'dressc','Dress C Murah Meriah','jual,dress,murah','Dress B Murah Meriah Hanya di sini',1,'2020-12-03 03:14:35'),
(4,1,'Dress D','DressD',200000,'5E0Hl5Drv5-281857_harylin-dart-button-dress-green_green_W7FZS.jpg','&lt;p&gt;Dress D murah meriah&lt;/p&gt;\r\n',1,'dressd','Dress D murah meriah','jual,dress,murah','Jual Dress D murah meriah ',1,'2020-12-03 03:17:24'),
(5,2,'Kaos A','kaosa',100000,'O0VMOnZeDw-282163_hannah-loose-blouse-white_white_5X2NK.jpg','&lt;p&gt;Atasan Kaos A yang murah&lt;/p&gt;\r\n',1,'kaosa','Atasan Kaos A yang murah','jual,kaos,murah','Atasan Kaos A yang murah',1,'2020-12-03 03:18:11'),
(6,2,'Kaos B','kaosb',120000,'4B71GeEuJ6-282296_izzy-combination-top-brown_brown_G979Y.jpg','&lt;p&gt;Atasan Kaos B yang murah&lt;/p&gt;\r\n',0,'kaosb','Atasan Kaos B yang murah','jual,kaos,b,murah','Atasan Kaos B yang murah',1,'2020-12-03 03:18:46'),
(7,2,'Kaos C','kaosc',175000,'3xUFH3XKJe-281815_haywa-blouse-brown_brown_EHVP4.jpg','&lt;p&gt;Atasan Kaos C yang murah&lt;/p&gt;\r\n',0,'kaosc','Atasan Kaos C yang murah','jual,kaos,c,murah','Atasan Kaos C yang murah',1,'2020-12-03 03:19:18'),
(8,3,'Celana A','celanaA',100000,'qAj05MELsC-281814_hayqa-printed-culotte-brown_brown_7CROC.jpg','&lt;p&gt;Celana Bahawan C yang murah&lt;/p&gt;\r\n',1,'celanaa','Celana Bahawan C yang murah','jual,celana,murah','Celana Bahawan C yang murah',1,'2020-12-03 03:20:47'),
(9,3,'Celana B','celanab',85000,'gjJxdqy7Qf-282853_juliana-corduroy-pants-khaki_cream_DEPDV.jpg','&lt;p&gt;Celana Bahawan C yang murah&lt;/p&gt;\r\n',0,'celanab','Celana Bahawan B yang murah','jual,celana,b,murah','Celana Bahawan B yang murah',1,'2020-12-03 03:21:21'),
(10,3,'Rok A','rokA',110000,'OBfjZpY2kx-280693_freya-pleated-knit-skirt-blue_blue_26MZU.jpg','&lt;p&gt;Rok Bahwahan A yang murah&lt;/p&gt;\r\n',1,'roka','Rok Bahwahan A yang murah','jual,bawahan,rok,a','Rok Bahwahan A yang murah',1,'2020-12-03 03:22:07'),
(11,3,'Celana C','celanac',160000,'u4tLdYE0OO-282543_isadora-straight-pants-brown_brown_H3F8A.jpg','&lt;p&gt;Jual Celana C dengan harga terbaik&lt;/p&gt;\r\n',1,'celanaC','Jual Celana C dengan harga terbaik','jual,celana,C,harga,terbaik','Jual Celana C dengan harga terbaik',1,'2020-12-03 03:22:48'),
(18,1,'Dress E','Dress E',500000,'3MJ1Y1i6QX-282478_ikita-long-dress-brown_brown_ZNBD7.jpg','&lt;p&gt;Frer&lt;/p&gt;\r\n',0,'DressE','dd','dd','dd',1,'2020-12-07 06:44:56');

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
(1,'PT Teknologi Digital Cemerlang','JL Lingkar Luar Barat NO 23 B-C','021-1234567','085777038748','donihamster88@gmail.com','tokotdc.png','TDC',NULL,NULL,NULL,'&lt;h1 style=&quot;text-align:center&quot;&gt;PT Digital Cemerlang&lt;/h1&gt;\r\n\r\n&lt;p&gt;DAPAT MENGUBAH DI MENU KONFIGURASI &amp;gt; ABOUT US&lt;/p&gt;\r\n','&lt;h1 style=&quot;text-align:center&quot;&gt;Hubungi Kami&lt;/h1&gt;\r\n\r\n&lt;p&gt;DAPAT MENGUBAH DI MENU KONFIGURASI &amp;gt; CONTACT US&lt;/p&gt;\r\n');

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
(1,'top','TvRI1-BlogHeader-1280_DigitalTransformation.jpg');

/*Table structure for table `gambar_barang` */

DROP TABLE IF EXISTS `gambar_barang`;

CREATE TABLE `gambar_barang` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `nama_gambar` varchar(100) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `gambar_barang` */

insert  into `gambar_barang`(`id_gambar`,`id_barang`,`nama_gambar`,`file`) values 
(2,1,'282709_disyana-dress-peach_pink_02NGL.jpg','hHjUxThBES-282709_disyana-dress-peach_pink_02NGL.jpg'),
(4,1,'282439_ivy-checkered-dress-multi-color_multi-color_PEWFU.jpg','mLDPkbzROn-282439_ivy-checkered-dress-multi-color_multi-color_PEWFU.jpg'),
(5,1,'282478_ikita-long-dress-brown_brown_ZNBD7.jpg','6XrKVKJLCY-282478_ikita-long-dress-brown_brown_ZNBD7.jpg'),
(6,18,'282548_imogenia-casual-shirt-dress-brown_brown_VL3ER.jpg','BVaCrCsGNY-282548_imogenia-casual-shirt-dress-brown_brown_VL3ER.jpg'),
(7,18,'282709_disyana-dress-peach_pink_02NGL.jpg','1GSOmKWgD3-282709_disyana-dress-peach_pink_02NGL.jpg'),
(8,18,'282716_jasmine-contrast-dress-yellow_yellow_L684C.jpg','lAZBxQ8iM2-282716_jasmine-contrast-dress-yellow_yellow_L684C.jpg'),
(9,1,'281558_finlee-pocket-slit-shirt-brown_brown_1G7F5.jpg','Kmqf45OoUd-281558_finlee-pocket-slit-shirt-brown_brown_1G7F5.jpg');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `n_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`n_kategori`) values 
(1,'Dress'),
(2,'Kaos'),
(3,'Celana');

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
(1,'instagram','https://www.instagram.com/tdcdigital.id/');

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
(1,'header','Top','&lt;p&gt;Dress Modern Masa Kini&lt;/p&gt;\r\n','&lt;p&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Menjual berbagai busana wanita&lt;/span&gt;&lt;/p&gt;\r\n','&lt;p&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Beli Sekarang&lt;/span&gt;&lt;/p&gt;\r\n','https://tdcdigital.id','All Product'),
(2,'center','Header Text','&lt;p&gt;-&lt;/p&gt;\r\n','&lt;p&gt;DAPAT MENGUBAH DI MENU OTHERS - HEADER TEXT&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://tdcdigital.id','-'),
(3,'footerleft','Footer Left','&lt;p&gt;FOOTER LEFT&lt;/p&gt;\r\n','&lt;p&gt;JIKA INGIN MENGUBAH BISA DI MENU OTHERS &amp;gt; FOOTER LEFT&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://tdcdigital.id','-'),
(4,'footercenter','Footer Center','&lt;p&gt;Footer Center&lt;/p&gt;\r\n','&lt;p&gt;JIKA INGIN MENGUBAH BISA DI MENU OTHERS &amp;gt; FOOTER CENTER&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://tdcdigital.id','-'),
(5,'footerright','Footer RIGHT','&lt;p&gt;FOOTER RIGHT&lt;/p&gt;\r\n','&lt;p&gt;JIKA INGIN MENGUBAH BISA DI MENU OTHERS &amp;gt; FOOTER RIGHT&lt;/p&gt;\r\n','&lt;p&gt;-&lt;/p&gt;\r\n','https://tdcdigital.id','-');

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
(1,'admin','26dc318942685872cf79c5eb96c9bb13','Administrator','donihamster88@gmail.com',1,'+6285777038748');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
