# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: arceri
# Generation Time: 2022-06-08 00:21:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cliente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `dni` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;

INSERT INTO `cliente` (`dni`, `nombre`)
VALUES
	(38123123,'Jose perez');

/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orden
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orden`;

CREATE TABLE `orden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) NOT NULL,
  `id_cliente` int(255) NOT NULL,
  `id_distrito` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;

INSERT INTO `orden` (`id`, `id_producto`, `id_cliente`, `id_distrito`)
VALUES
	(1,1,1,1);

/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table producto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;

INSERT INTO `producto` (`id`, `nombre`, `precio`)
VALUES
	(1,'pantalon nike','250'),
	(2,'pantalon adidas','300');

/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
