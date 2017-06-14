/*
SQLyog Ultimate v8.32 
MySQL - 5.5.41-log : Database - bwt_practice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bwt_practice` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bwt_practice`;

/*Table structure for table `page1` */

DROP TABLE IF EXISTS `page1`;

CREATE TABLE `page1` (
  `root` char(1) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `page1` */

/*Table structure for table `page4` */

DROP TABLE IF EXISTS `page4`;

CREATE TABLE `page4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` char(1) DEFAULT NULL,
  `feedback` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `page4` */

/*Table structure for table `weather` */

DROP TABLE IF EXISTS `weather`;

CREATE TABLE `weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `hour` datetime DEFAULT NULL,
  `icon_scr` blob,
  `overcast` binary(1) DEFAULT NULL,
  `temperature` bit(1) DEFAULT NULL,
  `pressure` tinyint(1) DEFAULT NULL,
  `wind` tinyint(1) DEFAULT NULL,
  `huminidy` tinyint(1) DEFAULT NULL,
  `comfort` char(1) DEFAULT NULL,
  `last_update` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `weather` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
