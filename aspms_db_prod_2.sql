/*
SQLyog Ultimate v8.55 
MySQL - 5.5.54 : Database - aspms_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aspms_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aspms_db`;

/*Table structure for table `barcode` */

DROP TABLE IF EXISTS `barcode`;

CREATE TABLE `barcode` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bcn` varchar(50) NOT NULL,
  `status` varchar(5) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `barcode` */

insert  into `barcode`(`id`,`bcn`,`status`) values (1,'5000000000210','DAC'),(2,'5000000000012','DAC'),(3,'5000000000029','ACT'),(4,'5000000000036','ACT'),(5,'5000000000043','ACT'),(6,'5000000000050','ACT'),(7,'5000000000067','ACT'),(8,'5000000000074','ACT'),(9,'5000000000081','ACT'),(10,'5000000000098','ACT'),(11,'5000000000104','ACT'),(12,'5000000000111','ACT'),(13,'5000000000128','ACT'),(14,'5000000000135','ACT'),(15,'5000000000142','ACT'),(16,'5000000000159','ACT'),(17,'5000000000166','ACT'),(18,'5000000000173','ACT'),(19,'5000000000180','ACT'),(20,'5000000000197','ACT'),(21,'5000000000203','ACT'),(22,'5000000000210','ACT'),(23,'5000000000227','ACT'),(24,'5000000000234','ACT'),(25,'5000000000241','ACT'),(26,'5000000000258','ACT'),(27,'5000000000265','ACT'),(28,'5000000000272','ACT'),(29,'5000000000289','ACT'),(30,'5000000000296','ACT'),(31,'5000000000302','ACT'),(32,'5000000000319','ACT'),(33,'5000000000326','ACT'),(34,'5000000000333','ACT'),(35,'5000000000340','ACT'),(36,'5000000000357','ACT');

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `brand` */

insert  into `brand`(`id`,`description`,`status`) values (1,'toyota','ACTIVE'),(2,'nissan','DEACTIVE'),(3,'Suzuki','ACTIVE'),(5,'KIA','ACTIVE');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`description`,`status`) values (1,'Engine','ACTIVE'),(2,'Radiator','DEACTIVE');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(20) DEFAULT NULL,
  `brand_id` varchar(100) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `selling_price` varchar(10) DEFAULT NULL,
  `min_price` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `store_area` varchar(10) DEFAULT NULL,
  `stock` int(5) DEFAULT '0',
  `bcn` varchar(50) DEFAULT NULL,
  `itmstatus` varchar(5) DEFAULT 'ACT' COMMENT 'ACT-DACT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`category_id`,`brand_id`,`model`,`selling_price`,`min_price`,`description`,`image_path`,`store_area`,`stock`,`bcn`,`itmstatus`) values (1,'1','1','1000 CC','154000','150000','','download (1).jpg','1',5,'5000000000210\r','DACT'),(2,'1','2','233','1233','1222','sds','download.jpg','1',4,'5000000000012','ACT');

/*Table structure for table `saleitem` */

DROP TABLE IF EXISTS `saleitem`;

CREATE TABLE `saleitem` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `saleno` int(5) DEFAULT NULL,
  `itemid` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `itemprice` varchar(10) DEFAULT NULL,
  `ttlprice` varchar(10) DEFAULT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `saleitem` */

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(20) DEFAULT NULL,
  `customer` varchar(200) DEFAULT NULL,
  `mode` varchar(10) DEFAULT NULL COMMENT 'CASH|CHEQUE',
  `realize_date` varchar(20) DEFAULT NULL,
  `cheque_no` varchar(100) DEFAULT NULL,
  `bank_branch` varchar(500) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createduser` varchar(5) DEFAULT NULL,
  `updateddate` varchar(20) DEFAULT NULL,
  `updateduser` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

/*Table structure for table `store_area` */

DROP TABLE IF EXISTS `store_area`;

CREATE TABLE `store_area` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `store_area` */

insert  into `store_area`(`id`,`description`,`status`) values (1,'A1',NULL),(2,'A2',NULL);

/*Table structure for table `table_alert` */

DROP TABLE IF EXISTS `table_alert`;

CREATE TABLE `table_alert` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `altdate` varchar(20) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `table_alert` */

insert  into `table_alert`(`id`,`title`,`description`,`altdate`,`status`) values (2,'Vehicle Rent','1500','2017-03-07','ACT');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`firstname`,`lastname`,`role`,`datecreated`) values (1,'admin','*667F407DE7C6AD07358FA38DAED7828A72014B4E','admin','admin','Admin','2017-03-16 22:54:04'),(2,'saman','*667F407DE7C6AD07358FA38DAED7828A72014B4E','saman','kumara','Employee','2017-03-16 22:54:04'),(3,'gayan','*667F407DE7C6AD07358FA38DAED7828A72014B4E','gyan','gayannn','Employee','2017-03-16 22:54:04'),(4,'shana','*A46A1ABE7D3B09461649DBA7956238D4BA51F70C','shanaka','Fernando','Employee','2017-03-16 22:57:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
