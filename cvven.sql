-- Auto Backup for MySQL Professional Edition 2.1
--
-- Host: localhost
--
-- MySQL Server Version: 5.6.17
--
-- 2015-01-18 02:00:00
--
-- ------------------------------------------------------

SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_CHARACTER_SET_CONNECTION=@@CHARACTER_SET_CONNECTION;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET CHARACTER_SET_CLIENT='latin1';
SET CHARACTER_SET_RESULTS='latin1';
SET CHARACTER_SET_CONNECTION='latin1';
SET NAMES 'latin1';
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS;
SET UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET @OLD_SQL_NOTES=@@SQL_NOTES;
SET SQL_NOTES=0;
SET CHARACTER_SET_CLIENT='utf8';
SET CHARACTER_SET_RESULTS='utf8';
SET CHARACTER_SET_CONNECTION='utf8';
SET NAMES 'utf8';
CREATE DATABASE IF NOT EXISTS `cvven` DEFAULT CHARACTER SET utf8;
USE `cvven`;

DROP TABLE IF EXISTS `attribuer_hebergement`;
CREATE TABLE IF NOT EXISTS `attribuer_hebergement` (  `ah_reservation_id` int(3) NOT NULL,  `ah_hebergement_id` int(3) NOT NULL,  `ah_date` date NOT NULL,  PRIMARY KEY (`ah_reservation_id`,`ah_hebergement_id`),  KEY `ah_hebergement_id` (`ah_hebergement_id`),  CONSTRAINT `attribuer_hebergement_ibfk_2` FOREIGN KEY (`ah_hebergement_id`) REFERENCES `hebergement` (`hebergement_id`),  CONSTRAINT `attribuer_hebergement_ibfk_3` FOREIGN KEY (`ah_reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `attribuer_hebergement` DISABLE KEYS;
LOCK TABLES `attribuer_hebergement` WRITE;
INSERT INTO `attribuer_hebergement` VALUES (6,5,'2014-11-04');
INSERT INTO `attribuer_hebergement` VALUES (8,2,'2014-11-04');
INSERT INTO `attribuer_hebergement` VALUES (10,3,'2014-11-11');
UNLOCK TABLES;
ALTER TABLE `attribuer_hebergement` ENABLE KEYS;
SET CHARACTER_SET_CLIENT='utf8';
SET CHARACTER_SET_RESULTS='utf8';
SET CHARACTER_SET_CONNECTION='utf8';
SET NAMES 'utf8';
CREATE DATABASE IF NOT EXISTS `cvven` DEFAULT CHARACTER SET utf8;
USE `cvven`;

DROP TABLE IF EXISTS `hebergement`;
CREATE TABLE IF NOT EXISTS `hebergement` (  `hebergement_id` int(3) NOT NULL AUTO_INCREMENT,  `hebergement_type` varchar(30) NOT NULL,  `hebergement_emplacement` varchar(30) NOT NULL,  `hebergement_etage` varchar(2) NOT NULL,  `hebergement_remarques` text NOT NULL,  PRIMARY KEY (`hebergement_id`)) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
ALTER TABLE `hebergement` DISABLE KEYS;
LOCK TABLES `hebergement` WRITE;
INSERT INTO `hebergement` VALUES (1,'Chambre pour handicapé','101','1','');
INSERT INTO `hebergement` VALUES (2,'Chambre de 2 lits','201','2','');
INSERT INTO `hebergement` VALUES (3,'Chambre double','301','3','');
INSERT INTO `hebergement` VALUES (4,'Chambre de 3 lits','401','4','');
INSERT INTO `hebergement` VALUES (5,'Chambre de 4 lits','501','5','');
UNLOCK TABLES;
ALTER TABLE `hebergement` ENABLE KEYS;
SET CHARACTER_SET_CLIENT='utf8';
SET CHARACTER_SET_RESULTS='utf8';
SET CHARACTER_SET_CONNECTION='utf8';
SET NAMES 'utf8';
CREATE DATABASE IF NOT EXISTS `cvven` DEFAULT CHARACTER SET utf8;
USE `cvven`;

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (  `reservation_id` int(3) NOT NULL AUTO_INCREMENT,  `reservation_date_arrivee` date NOT NULL,  `reservation_date_depart` date NOT NULL,  `reservation_nb_personnes` int(3) NOT NULL,  `reservation_menage` varchar(1) NOT NULL,  `reservation_etat` varchar(1) NOT NULL,  `reservation_user_id` int(3) NOT NULL,  PRIMARY KEY (`reservation_id`),  KEY `reservation_user_id` (`reservation_user_id`),  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`reservation_user_id`) REFERENCES `user` (`user_id`)) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
ALTER TABLE `reservation` DISABLE KEYS;
LOCK TABLES `reservation` WRITE;
INSERT INTO `reservation` VALUES (5,'2014-11-22','2014-11-29',4,'o','0',3);
INSERT INTO `reservation` VALUES (6,'2014-12-20','2014-12-27',4,'','0',3);
INSERT INTO `reservation` VALUES (7,'2014-11-15','2014-11-22',5,'o','0',3);
INSERT INTO `reservation` VALUES (8,'2014-12-27','2015-01-03',1,'','0',3);
INSERT INTO `reservation` VALUES (9,'2014-12-13','2014-12-20',3,'o','0',4);
INSERT INTO `reservation` VALUES (10,'2014-12-20','2014-12-27',3,'','0',4);
INSERT INTO `reservation` VALUES (11,'2015-01-24','2015-01-31',1,'o','0',1);
UNLOCK TABLES;
ALTER TABLE `reservation` ENABLE KEYS;
SET CHARACTER_SET_CLIENT='utf8';
SET CHARACTER_SET_RESULTS='utf8';
SET CHARACTER_SET_CONNECTION='utf8';
SET NAMES 'utf8';
CREATE DATABASE IF NOT EXISTS `cvven` DEFAULT CHARACTER SET utf8;
USE `cvven`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (  `user_id` int(3) NOT NULL AUTO_INCREMENT,  `user_mdp` varchar(100) NOT NULL,  `user_prenom` varchar(30) NOT NULL,  `user_nom` varchar(30) NOT NULL,  `user_email` varchar(50) NOT NULL,  `user_tel` varchar(10) NOT NULL,  `user_rue` varchar(100) NOT NULL,  `user_cp` varchar(5) NOT NULL,  `user_ville` varchar(50) NOT NULL,  `user_admin` varchar(1) NOT NULL,  PRIMARY KEY (`user_id`)) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
ALTER TABLE `user` DISABLE KEYS;
LOCK TABLES `user` WRITE;
INSERT INTO `user` VALUES (1,'6147bfc411f677d345a0d4e8aaf6750565e5be1f','Jérémy','Lémont','jerem-lem@hotmail.fr','0631727083','31 rue Roger Salengro','77420','Champs sur Marne','1');
INSERT INTO `user` VALUES (2,'7c5af37e6c6e21a50052b7723a84472640d68645','aymeric','foulard','foulard.aymeric@gmail.com','06 28 51 7','44 avenue henri barbusse','93140','Bondy','1');
INSERT INTO `user` VALUES (3,'f6ff067421fbd90571240adea4e50eb715e49ac0','fdf','fdf','clement.boin@gmail.com','fdf','77','77877','fdfd','1');
INSERT INTO `user` VALUES (4,'5484b855400576141edceb9a9d22ee1bd77483fa','bibi','bibi','clement.boin@gmail.com','055055','fd','fd','gfgf','1');
UNLOCK TABLES;
ALTER TABLE `user` ENABLE KEYS;
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET SQL_NOTES=@OLD_SQL_NOTES;
SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
SET CHARACTER_SET_CONNECTION=@OLD_CHARACTER_SET_CONNECTION;
SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
