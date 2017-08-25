# Host: localhost  (Version 5.5.8)
# Date: 2017-08-26 04:16:02
# Generator: MySQL-Front 6.0  (Build 1.163)


#
# Structure for table "panjardb"
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

INSERT INTO `panjardb` VALUES (17,3,'Candra Kampret','345232','Pelatihan','21412','2017-08-24','2017-08-26','6.000.000'),(19,4,'Ramdhani','342342','Pelatihan','JKT','2017-08-26','2017-08-28','6.000.000'),(20,4,'Ramdhani','6242342','Rapat Dinas','JKT','2017-08-29','2017-08-31','10.000.000');

#
# Structure for table "transmakan"
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

INSERT INTO `transmakan` VALUES (10,17,'2017-08-26',7,7,7,1,500000,3,1,1500000,'Perjalanan Dinas'),(11,19,'2017-08-26',1,1,1,0,0,1,1,1200000,'Fix'),(12,19,'2017-08-27',1,1,1,5,100000,0,0,0,'');

#
# Structure for table "transportasi"
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

INSERT INTO `transportasi` VALUES (14,17,'2017-08-24','DJJ','UPG',2,'Pesawat','1.500.000','1.5','Pergi'),(15,17,'2017-08-26','UPG','DJJ',1,'Pesawat','2.000.000','2','Pulang');

#
# Structure for table "tujuan"
#

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tujuan` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tujuan"
#

INSERT INTO `tujuan` VALUES (1,'21412'),(2,'DJJ'),(3,'JKT');

#
# Structure for table "user"
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

INSERT INTO `user` VALUES (1,'admin','buka','admin','admin','admin','Admin'),(2,'123','123','Ken Dianto','Administrasi','MOR VIII Jayapura','Admin'),(3,'candra','2614ae3c375c3095dc536283672548bd','Candra Kampret','Staf','Jayapura','User'),(4,'dani','55b7e8b895d047537e672250dd781555','Ramdhani','Staff Oprasional','Nabire','User');
