# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.35-0ubuntu0.12.10.2)
# Database: seekuni_core
# Generation Time: 2015-02-19 22:07:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table su_course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `su_course`;

CREATE TABLE `su_course` (
  `course_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_cost` float(7,2) unsigned DEFAULT NULL,
  `course_ucas` int(10) unsigned DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_uni` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `su_course` WRITE;
/*!40000 ALTER TABLE `su_course` DISABLE KEYS */;

INSERT INTO `su_course` (`course_id`, `course_cost`, `course_ucas`, `course_name`, `course_uni`, `course_code`)
VALUES
	(1,1499.00,140,'Computer Science',1,'G410'),
	(2,2499.00,150,'Computer Science',2,'G410'),
	(3,2499.00,160,'Computer Science',3,'G410'),
	(4,2499.00,160,'Computer Science',4,'G410'),
	(5,1499.00,150,'Computer Science',5,'G410'),
	(6,3050.00,200,'Biomedical Sciences',2,'B501'),
	(7,2000.00,150,'Social Studies',3,'SO10');

/*!40000 ALTER TABLE `su_course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table su_uni
# ------------------------------------------------------------

DROP TABLE IF EXISTS `su_uni`;

CREATE TABLE `su_uni` (
  `uni_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uni_name` varchar(255) DEFAULT NULL,
  `uni_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `su_uni` WRITE;
/*!40000 ALTER TABLE `su_uni` DISABLE KEYS */;

INSERT INTO `su_uni` (`uni_id`, `uni_name`, `uni_image`)
VALUES
	(1,'The University of Manchester','mancuni_140_70.png'),
	(2,'The University of Lancaster','lancuni_140_70.png'),
	(3,'Birmingham University','birm_140_70.png'),
	(4,'Liverpool University','liveruni_140_70.png'),
	(5,'Oxford University','oxuni_140_70.png');

/*!40000 ALTER TABLE `su_uni` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table su_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `su_users`;

CREATE TABLE `su_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `su_users` WRITE;
/*!40000 ALTER TABLE `su_users` DISABLE KEYS */;

INSERT INTO `su_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_name`)
VALUES
	(1,'Damien Walsh','me@damow.net','bb6735b0f05ef83cb8e10212fec3a966','damo');

/*!40000 ALTER TABLE `su_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
