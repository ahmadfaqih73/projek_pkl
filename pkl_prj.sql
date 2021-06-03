-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jenis_surat`
--

DROP TABLE IF EXISTS `jenis_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_surat` (
  `id_jenis surat` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis surat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_surat`
--

LOCK TABLES `jenis_surat` WRITE;
/*!40000 ALTER TABLE `jenis_surat` DISABLE KEYS */;
INSERT INTO `jenis_surat` VALUES (1,'surat undangan'),(2,'surat Akademi');
/*!40000 ALTER TABLE `jenis_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_sm`
--

DROP TABLE IF EXISTS `kategori_sm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_sm` (
  `id_kategorism` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` enum('Undangan','Surat Tugas','SK Direktur') NOT NULL,
  PRIMARY KEY (`id_kategorism`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_sm`
--

LOCK TABLES `kategori_sm` WRITE;
/*!40000 ALTER TABLE `kategori_sm` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_sm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mhs_mif`
--

DROP TABLE IF EXISTS `mhs_mif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhs_mif` (
  `Id_mhs_mif` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_mhs_mif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs_mif`
--

LOCK TABLES `mhs_mif` WRITE;
/*!40000 ALTER TABLE `mhs_mif` DISABLE KEYS */;
INSERT INTO `mhs_mif` VALUES (0,'E31171294','Intan Permatasari','tutor_mas_hariz.PNG','tutor_mas_hariz1.PNG');
/*!40000 ALTER TABLE `mhs_mif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mhs_tif`
--

DROP TABLE IF EXISTS `mhs_tif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhs_tif` (
  `Id_mhs_tif` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) DEFAULT NULL,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_mhs_tif`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs_tif`
--

LOCK TABLES `mhs_tif` WRITE;
/*!40000 ALTER TABLE `mhs_tif` DISABLE KEYS */;
INSERT INTO `mhs_tif` VALUES (12,'sgs','fhfh','3671_PL17PP_20211.pdf','Logo_Garuda.png');
/*!40000 ALTER TABLE `mhs_tif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mhs_tkk`
--

DROP TABLE IF EXISTS `mhs_tkk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhs_tkk` (
  `Id_mhs_tkk` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_mhs_tkk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs_tkk`
--

LOCK TABLES `mhs_tkk` WRITE;
/*!40000 ALTER TABLE `mhs_tkk` DISABLE KEYS */;
/*!40000 ALTER TABLE `mhs_tkk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_keluar`
--

DROP TABLE IF EXISTS `surat_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` int(11) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `deskripsi_surat` varchar(255) DEFAULT NULL,
  `tanggal_surat_keluar` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_keluar`
--

LOCK TABLES `surat_keluar` WRITE;
/*!40000 ALTER TABLE `surat_keluar` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_masuk`
--

DROP TABLE IF EXISTS `surat_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategorism` int(11) NOT NULL,
  `judul_surat` int(11) NOT NULL,
  `file_surat` int(11) NOT NULL,
  PRIMARY KEY (`id_sm`),
  KEY `id_kategorism` (`id_kategorism`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_masuk`
--

LOCK TABLES `surat_masuk` WRITE;
/*!40000 ALTER TABLE `surat_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `data_created` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'asd','asd@gmail.com','default.jpg','$2y$10$CCJyNvUPFrDdd.XBI4ODm.SiR.eGYXT/7Rgp034tjH14ZJhz1XYt2',2,1,1603802141),(2,'qw','qw@yahoo.com','default.jpg','$2y$10$Qjrs1l.HBEonRe9/tZA4kuKgbvaTaA05K.m80PNLkcoPd2GH6crI2',1,1,1603802968),(3,'erik','erik@gmail.com','default.jpg','$2y$10$uG/DqrKzviwzvYWEoLBpE.bCgv68uofaRn3d9VQ6y5EmbAyBDXlwi',2,1,1605017081),(4,'na','na@gmail.com','default.jpg','$2y$10$0U4hIvrJMgCcXGkW45UTI.GTTrQD3xDC00VBee4yjtlQe5t4pJZ.2',2,0,1605017152);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` VALUES (1,1,1),(2,1,2),(3,2,2),(5,2,3),(6,1,3),(8,1,7),(9,1,8),(10,1,9);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(126) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES (1,'admin'),(2,'user'),(3,'Menu'),(7,'Teknologi Informasi'),(8,'Surat Keluar'),(9,'Surat Masuk');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Administrator'),(2,'Member');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu`
--

LOCK TABLES `user_sub_menu` WRITE;
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` VALUES (1,1,'Dashboard','admin','fas fa-fw fa-tachometer-alt',1),(2,2,'My Profile','user','fas fa-fw fa-user',1),(3,2,'Edit Profile','user/edit','fas fa-fw fa-user-edit',1),(4,3,'Menu Management','menu','fas  fa-fw fa-folder',1),(5,3,'Submenu Management','menu/submenu','fas fa-fw fa-folder-open',1),(7,1,'coba','menu/coba','fas fa-fw fw-folder',1),(9,1,'Role','admin/role','fas fa-fw fa-user-tie',1),(10,7,'Teknik Informatika','TIF','fas fa-fw fa-microchip',1),(12,7,'Manajemen Informatika','MIF','fas fa-laptop-code',1),(13,7,'Teknik Komputer','TKK','fas fa-cogs',1),(14,9,'Undangan','Undangan','fab fa-mailchimp',1),(15,9,'Surat Tugas','Surat_Masuk','fas fa-reply',1),(16,9,'SK Direktur','Sk_Direktur','fas fa-voicemail',1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03 12:59:55
