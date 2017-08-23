# Host: localhost  (Version: 5.6.21)
# Date: 2017-08-24 04:38:24
# Generator: MySQL-Front 5.3  (Build 4.4)

/*!40101 SET NAMES utf8 */;

#
# Source for table "panjardb"
#

CREATE TABLE `panjardb` (
  `id_panjar` int(11) NOT NULL AUTO_INCREMENT,
  `no_pek` int(3) NOT NULL DEFAULT '0',
  `nama_pek` varchar(255) NOT NULL DEFAULT '',
  `no_trip` varchar(255) NOT NULL DEFAULT '',
  `tujuan_dinas` text NOT NULL,
  `pan_tujuan` varchar(255) NOT NULL DEFAULT '',
  `tgl_acara` date NOT NULL DEFAULT '0000-00-00',
  `tgl_kmbl` date NOT NULL DEFAULT '0000-00-00',
  `cost` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_panjar`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "panjardb"
#

REPLACE INTO `panjardb` VALUES (13,2,'Ken Dianto','0887/315','241512','asgasg','2017-07-26','0000-00-00','12.454.151'),(14,1,'admin','215215','125215','Jayapura','2017-07-29','0000-00-00','21.512.525'),(15,1,'admin','215125','125125','21421','2017-07-29','0000-00-00','12.515.215'),(16,2,'Ken Dianto','LL/14302/2017-s5','rekondisi','Makassar','2017-08-26','0000-00-00','12.000.000'),(17,3,'Candra Kampret','345232','Pelatihan','21412','2017-08-24','2017-08-26','6.000.000');

#
# Source for table "transmakan"
#

CREATE TABLE `transmakan` (
  `id_makan` int(11) NOT NULL AUTO_INCREMENT,
  `id_panjar` int(11) NOT NULL DEFAULT '0',
  `tgl` date NOT NULL DEFAULT '0000-00-00',
  `mkn_pg` int(10) DEFAULT NULL,
  `mkn_sg` int(11) DEFAULT NULL,
  `mkn_ml` int(11) DEFAULT NULL,
  `dll` int(11) NOT NULL DEFAULT '0',
  `hrglain` int(11) NOT NULL DEFAULT '0',
  `daily` int(11) DEFAULT NULL,
  `acomodation` int(11) DEFAULT NULL,
  `BiayaAcom` int(11) DEFAULT NULL,
  `ket` text,
  PRIMARY KEY (`id_makan`),
  KEY `id_panjar` (`id_panjar`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "transmakan"
#

REPLACE INTO `transmakan` VALUES (8,14,'2017-08-09',1,1,1,2,50000,1,1,350000,''),(9,14,'2017-08-15',1,2,1,1,60000,2,1,400000,''),(10,17,'2017-08-26',7,7,7,1,500000,3,1,1500000,'Perjalanan Dinas');

#
# Source for table "transportasi"
#

CREATE TABLE `transportasi` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_panjar` int(11) NOT NULL DEFAULT '0',
  `tgl_trans` date NOT NULL DEFAULT '0000-00-00',
  `asal` varchar(255) NOT NULL DEFAULT '',
  `tujuan` varchar(255) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL DEFAULT '0',
  `jns_trans` varchar(255) NOT NULL DEFAULT '',
  `harga` varchar(255) NOT NULL DEFAULT '',
  `totaltrans` varchar(255) NOT NULL DEFAULT '',
  `keterangan` text,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "transportasi"
#

REPLACE INTO `transportasi` VALUES (8,14,'2017-08-19','DJJ','BIK',2,' 2','1.200.000','2.4','Testing'),(9,14,'2017-08-26','ZRI','DJJ',3,' 2','2.000.000','6000000','Testing'),(10,14,'2017-08-01','SBY','DJJ',5,'1','3.000.000.','15000000','Pulang'),(11,14,'2017-08-26','JKT','DJJ',2,'1','2.000.000','4000000','Pulang'),(12,13,'2017-08-26','DJJ','MKQ',2,'','100.000','200','Testing'),(13,13,'2017-08-20','ZRI','BIK',5,'','2.000.000','10','Testing'),(14,17,'2017-08-24','DJJ','UPG',1,'Pesawat','1.500.000','1.5','Pergi'),(15,17,'2017-08-26','UPG','DJJ',1,'Pesawat','2.000.000','2','Pulang');

#
# Source for table "tujuan"
#

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tujuan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tujuan"
#

REPLACE INTO `tujuan` VALUES (1,'21412'),(2,'DJJ');

#
# Source for table "user"
#

CREATE TABLE `user` (
  `Iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  `jabatan` varchar(255) NOT NULL DEFAULT '',
  `penempatan` varchar(255) NOT NULL DEFAULT '',
  `hakakses` enum('Admin','User','Super User') NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`Iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

REPLACE INTO `user` VALUES (1,'admin','buka','admin','admin','admin','Admin'),(2,'123','123','Ken Dianto','Administrasi','MOR VIII Jayapura','Admin'),(3,'candra','candra','Candra Kampret','Staf','Jayapura','User');
