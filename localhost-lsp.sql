-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: lsp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.6-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_asesor`
--

DROP TABLE IF EXISTS `m_asesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_asesor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) unsigned NOT NULL,
  `reg_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id_tuk` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_asesor_id_users_foreign` (`id_users`),
  KEY `m_asesor_id_tuk_foreign` (`id_tuk`),
  CONSTRAINT `m_asesor_id_tuk_foreign` FOREIGN KEY (`id_tuk`) REFERENCES `m_tuk` (`id`),
  CONSTRAINT `m_asesor_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `m_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_asesor`
--

LOCK TABLES `m_asesor` WRITE;
/*!40000 ALTER TABLE `m_asesor` DISABLE KEYS */;
INSERT INTO `m_asesor` VALUES (1,'Abdul',2,'MET.000.002535 2019','Laki-Laki','Kota Administrasi Jakarta Timur, DKI Jakarta','088975539182',1,1,'2020-08-01 01:26:36','2020-08-01 01:26:36'),(2,'Falahlaz',3,'MET.000.002535 2020','Laki-Laki','Kota Administrasi Jakarta Timur, DKI Jakarta','088975539182',1,1,'2020-08-11 18:59:00','2020-08-11 18:59:00');
/*!40000 ALTER TABLE `m_asesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_asesor_scheme`
--

DROP TABLE IF EXISTS `m_asesor_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_asesor_scheme` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asesor` bigint(20) unsigned NOT NULL,
  `id_scheme` bigint(20) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_asesor_scheme_id_asesor_foreign` (`id_asesor`),
  KEY `m_asesor_scheme_id_scheme_foreign` (`id_scheme`),
  CONSTRAINT `m_asesor_scheme_id_asesor_foreign` FOREIGN KEY (`id_asesor`) REFERENCES `m_asesor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `m_asesor_scheme_id_scheme_foreign` FOREIGN KEY (`id_scheme`) REFERENCES `m_scheme` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_asesor_scheme`
--

LOCK TABLES `m_asesor_scheme` WRITE;
/*!40000 ALTER TABLE `m_asesor_scheme` DISABLE KEYS */;
INSERT INTO `m_asesor_scheme` VALUES (1,1,1,1,'2020-08-01 01:26:36','2020-08-01 01:26:36'),(2,1,2,1,'2020-08-01 01:26:36','2020-08-01 01:26:36'),(3,1,3,1,'2020-08-01 01:26:36','2020-08-01 01:26:36'),(5,2,1,1,'2020-08-11 18:59:00','2020-08-11 18:59:00'),(6,2,2,1,'2020-08-11 18:59:00','2020-08-11 18:59:00'),(7,2,3,1,'2020-08-11 18:59:00','2020-08-11 18:59:00');
/*!40000 ALTER TABLE `m_asesor_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_element`
--

DROP TABLE IF EXISTS `m_element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_element` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_unit` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_unit`),
  CONSTRAINT `FK__m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_element`
--

LOCK TABLES `m_element` WRITE;
/*!40000 ALTER TABLE `m_element` DISABLE KEYS */;
INSERT INTO `m_element` VALUES (9,6,'Elemen 1',1,'2020-10-21 12:38:40','2020-10-21 12:38:40'),(10,7,'Elemen 2',1,'2020-10-21 12:38:40','2020-10-21 12:38:40'),(11,8,'Elemen 3',1,'2020-10-21 12:38:40','2020-10-21 12:38:40'),(12,9,'Elemen 4',1,'2020-10-21 12:38:40','2020-10-21 12:38:40');
/*!40000 ALTER TABLE `m_element` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_element_question`
--

DROP TABLE IF EXISTS `m_element_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_element_question` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_element` bigint(20) unsigned NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_unit_question_id_unit_foreign` (`id_element`),
  CONSTRAINT `m_unit_question_id_unit_foreign` FOREIGN KEY (`id_element`) REFERENCES `m_element` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_element_question`
--

LOCK TABLES `m_element_question` WRITE;
/*!40000 ALTER TABLE `m_element_question` DISABLE KEYS */;
INSERT INTO `m_element_question` VALUES (4,9,'Pertanyaan A',1,'2020-10-21 12:48:33','2020-10-21 12:48:33'),(5,9,'Pertanyaan B',1,'2020-10-21 12:48:33','2020-10-21 12:48:33'),(6,9,'Pertanyaan C',1,'2020-10-21 12:48:33','2020-10-21 12:48:33'),(7,10,'Pertanyaan D',1,NULL,NULL),(8,10,'Pertanyaan E',1,NULL,NULL),(9,10,'Pertanyaan F',1,NULL,NULL),(10,11,'Pertanyaan G',1,NULL,NULL),(11,11,'Pertanyaan H',1,NULL,NULL),(12,11,'Pertanyaan I',1,NULL,NULL),(13,12,'Pertanyaan J',1,NULL,NULL),(14,12,'Pertanyaan K',1,NULL,NULL),(15,12,'Pertanyaan L',1,NULL,NULL);
/*!40000 ALTER TABLE `m_element_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_exam_answer`
--

DROP TABLE IF EXISTS `m_exam_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_exam_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_exam_question` bigint(20) unsigned NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_exam_answer_id_exam_question_foreign` (`id_exam_question`),
  CONSTRAINT `m_exam_answer_id_exam_question_foreign` FOREIGN KEY (`id_exam_question`) REFERENCES `m_exam_question` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_exam_answer`
--

LOCK TABLES `m_exam_answer` WRITE;
/*!40000 ALTER TABLE `m_exam_answer` DISABLE KEYS */;
INSERT INTO `m_exam_answer` VALUES (11,5,'Selalu menggunakan perlengkapan APD',1,0,'2020-09-12 09:13:31','2020-09-12 09:13:31'),(12,5,'Mengikuti SOP yang telah ditentukan tempat kerja',1,1,'2020-09-12 09:13:31','2020-09-12 10:23:09'),(13,5,'Menghidupkan  mesin secara langsung yang penting bahan bakarnya terisi',1,0,'2020-09-12 09:13:31','2020-09-12 10:23:09'),(14,5,'Menggunakan perlengkapan kerja sesuai tugas dan pekerjaannya',1,0,'2020-09-12 09:13:31','2020-09-12 09:13:31'),(21,5,'mantap',1,0,'2020-09-12 10:03:46','2020-09-12 10:03:46');
/*!40000 ALTER TABLE `m_exam_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_exam_question`
--

DROP TABLE IF EXISTS `m_exam_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_exam_question` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_scheme` bigint(20) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_exam_question_id_scheme_foreign` (`id_scheme`),
  CONSTRAINT `m_exam_question_id_scheme_foreign` FOREIGN KEY (`id_scheme`) REFERENCES `m_scheme` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_exam_question`
--

LOCK TABLES `m_exam_question` WRITE;
/*!40000 ALTER TABLE `m_exam_question` DISABLE KEYS */;
INSERT INTO `m_exam_question` VALUES (5,'Pernyataan ini adalah yang tidak termasuk memenuhi unsur K3 adalah...',1,1,'2020-09-12 09:13:31','2020-09-12 09:34:54');
/*!40000 ALTER TABLE `m_exam_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_position`
--

DROP TABLE IF EXISTS `m_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_position` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_position`
--

LOCK TABLES `m_position` WRITE;
/*!40000 ALTER TABLE `m_position` DISABLE KEYS */;
INSERT INTO `m_position` VALUES (1,'admin','2020-08-01 01:19:29','2020-08-01 01:19:29'),(2,'asesor','2020-08-01 01:19:29','2020-08-01 01:19:29'),(3,'tuk','2020-08-01 01:19:29','2020-08-01 01:19:29');
/*!40000 ALTER TABLE `m_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_scheme`
--

DROP TABLE IF EXISTS `m_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_scheme` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mea_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_scheme`
--

LOCK TABLES `m_scheme` WRITE;
/*!40000 ALTER TABLE `m_scheme` DISABLE KEYS */;
INSERT INTO `m_scheme` VALUES (1,'SKM/0349/00007/3/2019/10','PENGECATAN PANEL BODI KENDARAAN','Perdagangan besar dan eceran, Reparasi dan Perawatan Mobil dan Motor','Perdagangan, Reparasi, dan Perawatan Mobil dan Sepeda Motor','Industri Otomotif',1,'2020-08-01 01:26:17','2020-09-12 08:12:44'),(2,'SKM/0349/00007/3/2019/1','ENGINE TUNE UP KONVENSIONAL','Perdagangan besar dan eceran, Reparasi dan Perawatan Mobil dan Motor','Perdagangan, Reparasi, dan Perawatan Mobil dan Sepeda Motor','Industri Otomotif',1,'2020-08-01 01:26:19','2020-09-12 08:12:00'),(3,'SKM/0349/00007/3/2015/8','SERVIS SEPEDA MOTOR SISTEM KARBURATOR','Perdagangan besar dan eceran, Reparasi dan Perawatan Mobil dan Motor','Perdagangan, Reparasi, dan Perawatan Mobil dan Sepeda Motor','Industri Otomotif',1,'2020-08-01 01:26:21','2020-09-11 06:44:24');
/*!40000 ALTER TABLE `m_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_tuk`
--

DROP TABLE IF EXISTS `m_tuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_tuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_tuk`
--

LOCK TABLES `m_tuk` WRITE;
/*!40000 ALTER TABLE `m_tuk` DISABLE KEYS */;
INSERT INTO `m_tuk` VALUES (1,'070-TUKS-LSPABI','Sewaktu','Fresh Konsultan','Perum Nitikan Jaya Residence No. 41/B1 Jl. Ni\nKota Yogyakarta, Daerah Istimewa Yogyakarta',1,'2020-08-01 01:26:10','2020-08-01 01:26:10'),(2,'064-TUKS-LSPABI','Sewaktu','LDP Expert Indoprima','Jalan Parangtritis, Prancak Dukuh, Sewon, Pri\nBantul, Daerah Istimewa Yogyakarta',1,'2020-08-12 20:00:40','2020-09-11 03:25:23'),(3,'053-TUKS-LSPABI','Sewaktu','Politeknik Negeri Jakarta','Jl. Prof. Dr. G.A Siwabessy, Kampus Baru UI,\nKota Depok, Jawa Barat',1,'2020-08-12 20:01:09','2020-08-12 20:08:11'),(4,'01772019','Sewaktu','INDOMOBIL NISSAN','Wisma Indomobil, Jl. Letjen Mt. Haryono No.3,\r\nKota Administrasi Jakarta Selatan, DKI Jakarta',1,'2020-09-11 03:04:50','2020-09-11 03:42:30'),(5,'01222018','Mandiri','INNOVAM INDONESIA','Jln. Padang Golf CBD POLONIA BLOK DD NO 7 - 8\r\nKota Medan, Sumatera Utara',1,'2020-09-11 03:07:00','2020-09-11 03:43:16'),(6,'zxc','Sewaktu','zxc','zxc',0,'2020-09-11 03:26:25','2020-09-11 03:43:28'),(7,'asd','Sewaktu','asd','asd',0,'2020-09-11 03:29:10','2020-09-11 03:43:33');
/*!40000 ALTER TABLE `m_tuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_unit`
--

DROP TABLE IF EXISTS `m_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_unit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_scheme` bigint(20) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_unit_id_scheme_foreign` (`id_scheme`),
  CONSTRAINT `m_unit_id_scheme_foreign` FOREIGN KEY (`id_scheme`) REFERENCES `m_scheme` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_unit`
--

LOCK TABLES `m_unit` WRITE;
/*!40000 ALTER TABLE `m_unit` DISABLE KEYS */;
INSERT INTO `m_unit` VALUES (3,'OTO.SM01.001.01','Mengikuti Prosedur Keselamatan, Kesehatan Kerja, dan Lingkungan','2005',3,1,'2020-09-11 07:11:43','2020-09-11 07:32:56'),(5,'OTO.SM01.002.01','Membaca dan Memahami Gambar Teknik','2005',3,1,'2020-09-11 07:23:16','2020-09-11 07:36:10'),(6,'G.45OTO01.001.2','Melaksanakan Keselamatan dan Kesehatan Kerja','2018',1,1,'2020-09-17 14:38:46','2020-09-17 14:38:46'),(7,'G.45OTO01.002.2','Menggunakan Peralatan dan Perlengkapan Tempat Kerja','2018',1,1,'2020-09-17 14:39:03','2020-09-17 14:39:03'),(8,'G.45OTO01.003.2','Melaksanakan Komunikasi di Tempat Kerja','2018',1,1,'2020-09-17 14:39:19','2020-09-17 14:39:19'),(9,'G.45OBR02.028.2','Melakukan Pengecatan Bodi Kendaraan','2018',1,1,'2020-09-17 14:39:34','2020-09-17 14:39:34');
/*!40000 ALTER TABLE `m_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_users`
--

DROP TABLE IF EXISTS `m_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_position` bigint(20) unsigned NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `m_users_email_unique` (`email`),
  KEY `m_users_id_position_foreign` (`id_position`),
  CONSTRAINT `m_users_id_position_foreign` FOREIGN KEY (`id_position`) REFERENCES `m_position` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_users`
--

LOCK TABLES `m_users` WRITE;
/*!40000 ALTER TABLE `m_users` DISABLE KEYS */;
INSERT INTO `m_users` VALUES (1,'Admin','$2y$10$pw6WikwVFT/cOKoPdRhtA.CVisJ2RQV9meJvWeMuDDePIAY.X5Bqy','admin1@gmail.com',1,'$2y$10$pRWnY31ezsb7FN6ASROX.eaRSLpHet2cG9fhcBTZc6XVMUoiJxINe',1,'2020-08-01 01:19:31','2020-08-11 18:58:39'),(2,'asesor1','$2y$10$B5TNYmh0m90iyaXTSOaTwe3pzDY7l3fOrUSeys7kWrngTG8ipESQS','asesor2@gmail.com',2,NULL,1,'2020-08-01 01:26:36','2020-08-01 01:26:36'),(3,'falahlaz','$2y$10$3jC7QATW5KvcW23A3ajDXujhqwymtEtli6wvJgkZYWYl2eTgOYKBu','falahlaz@gmail.com',2,NULL,1,'2020-08-11 18:59:00','2020-08-11 18:59:00');
/*!40000 ALTER TABLE `m_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_07_27_132355_create_m_position_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2020_07_27_134329_create_m_tuk_table',1),(6,'2020_07_27_134436_create_m_scheme_table',1),(7,'2020_07_27_134450_create_m_asesor_table',1),(8,'2020_07_28_071845_create_m_unit_table',1),(9,'2020_07_28_072007_create_m_exam_question_table',1),(10,'2020_07_28_072038_create_m_unit_question_table',1),(11,'2020_07_28_072117_create_m_exam_answer_table',1),(12,'2020_07_28_073221_create_t_exam_answer_table',1),(13,'2020_07_28_073222_create_t_form01_table',1),(14,'2020_07_28_073223_create_t_scheme_form01_table',1),(15,'2020_07_28_073224_create_t_requirement_table',1),(16,'2020_07_28_073225_create_t_competency_table',1),(17,'2020_07_28_073226_create_t_exam_score_table',1),(18,'2020_07_28_073227_create_t_form02_table',1),(19,'2020_07_28_073228_create_t_examinees_form02_table',1),(20,'2020_07_28_073229_create_t_form02_answer_table',1),(21,'2020_08_01_054414_create_m_asesor_scheme_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_competency`
--

DROP TABLE IF EXISTS `t_competency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_competency` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form01` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_competency_id_form01_foreign` (`id_form01`),
  CONSTRAINT `t_competency_id_form01_foreign` FOREIGN KEY (`id_form01`) REFERENCES `t_form01` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_competency`
--

LOCK TABLES `t_competency` WRITE;
/*!40000 ALTER TABLE `t_competency` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_competency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_exam_answer`
--

DROP TABLE IF EXISTS `t_exam_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_exam_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_exam_question` bigint(20) unsigned NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_exam_answer_id_exam_question_foreign` (`id_exam_question`),
  CONSTRAINT `t_exam_answer_id_exam_question_foreign` FOREIGN KEY (`id_exam_question`) REFERENCES `m_exam_question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_exam_answer`
--

LOCK TABLES `t_exam_answer` WRITE;
/*!40000 ALTER TABLE `t_exam_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_exam_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_exam_score`
--

DROP TABLE IF EXISTS `t_exam_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_exam_score` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form01` bigint(20) unsigned NOT NULL,
  `id_scheme` bigint(20) unsigned NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_exam_score_id_form01_foreign` (`id_form01`),
  KEY `t_exam_score_id_scheme_foreign` (`id_scheme`),
  CONSTRAINT `t_exam_score_id_form01_foreign` FOREIGN KEY (`id_form01`) REFERENCES `t_form01` (`id`),
  CONSTRAINT `t_exam_score_id_scheme_foreign` FOREIGN KEY (`id_scheme`) REFERENCES `m_scheme` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_exam_score`
--

LOCK TABLES `t_exam_score` WRITE;
/*!40000 ALTER TABLE `t_exam_score` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_exam_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_form01`
--

DROP TABLE IF EXISTS `t_form01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_form01` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(50) unsigned DEFAULT NULL,
  `photo_ktp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_educ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheme_certification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_form01`
--

LOCK TABLES `t_form01` WRITE;
/*!40000 ALTER TABLE `t_form01` DISABLE KEYS */;
INSERT INTO `t_form01` VALUES (8,'Al Falah Lazuardi Mahmudi',12313123123321,'1601801820.jpeg','1601801821.jpeg','asdasdasdad','2020-10-04','laki-laki','asdasdasd','asdasdda','123131','1231313','123131312','asdklasdn@gmail.com','123123','SMK','assdasdas','adsdasads','asdsaddsa','123123','123123','akdnadk@gmail.com','213213','KKNI','Sertifikasi',1,NULL,'2020-10-04 08:57:01','2020-10-04 08:57:01'),(9,'Muhammad Dani Asyrofi',13212331,'1601802237.png','1601802237.jpeg','asdasdasd','2020-10-04','laki-laki','asdasdasd','asdasdda','12313131','3123123','123123','1231313@gmail.com','123132131','SMK','assdasdas','adsdasads','asdsaddsa','123123123','1231231','kdadkja@gmail.com','123132','KKNI','Sertifikasi',2,NULL,'2020-10-04 09:03:57','2020-10-04 09:03:57');
/*!40000 ALTER TABLE `t_form01` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_form02`
--

DROP TABLE IF EXISTS `t_form02`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_form02` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form01` bigint(20) unsigned NOT NULL,
  `id_asesor` bigint(20) unsigned NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_scheme_form01` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_form02_id_form01_foreign` (`id_form01`),
  KEY `Index 3` (`id_asesor`),
  KEY `t_form02_FK` (`id_scheme_form01`),
  CONSTRAINT `FK_t_form02_m_asesor` FOREIGN KEY (`id_asesor`) REFERENCES `m_asesor` (`id`),
  CONSTRAINT `t_form02_FK` FOREIGN KEY (`id_scheme_form01`) REFERENCES `t_scheme_form01` (`id`),
  CONSTRAINT `t_form02_id_form01_foreign` FOREIGN KEY (`id_form01`) REFERENCES `t_form01` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_form02`
--

LOCK TABLES `t_form02` WRITE;
/*!40000 ALTER TABLE `t_form02` DISABLE KEYS */;
INSERT INTO `t_form02` VALUES (7,9,1,NULL,2,'2020-10-21 14:10:26','2020-10-21 14:10:26',11);
/*!40000 ALTER TABLE `t_form02` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_form02_answer`
--

DROP TABLE IF EXISTS `t_form02_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_form02_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_unit_question` bigint(20) unsigned DEFAULT NULL,
  `asesor_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_form02` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_form02_answer_FK` (`id_unit_question`),
  KEY `t_form02_answer_FK_1` (`id_form02`),
  CONSTRAINT `t_form02_answer_FK` FOREIGN KEY (`id_unit_question`) REFERENCES `m_element_question` (`id`),
  CONSTRAINT `t_form02_answer_FK_1` FOREIGN KEY (`id_form02`) REFERENCES `t_form02` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_form02_answer`
--

LOCK TABLES `t_form02_answer` WRITE;
/*!40000 ALTER TABLE `t_form02_answer` DISABLE KEYS */;
INSERT INTO `t_form02_answer` VALUES (13,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',4,NULL,7),(14,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',5,NULL,7),(15,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',6,NULL,7),(16,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',7,NULL,7),(17,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',8,NULL,7),(18,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',9,NULL,7),(19,'K',0,'2020-10-21 14:11:32','2020-10-21 14:11:32',10,NULL,7),(20,'K',0,'2020-10-21 14:11:33','2020-10-21 14:11:33',11,NULL,7),(21,'K',0,'2020-10-21 14:11:33','2020-10-21 14:11:33',12,NULL,7),(22,'K',0,'2020-10-21 14:11:33','2020-10-21 14:11:33',13,NULL,7),(23,'K',0,'2020-10-21 14:11:33','2020-10-21 14:11:33',14,NULL,7),(24,'K',0,'2020-10-21 14:11:33','2020-10-21 14:11:33',15,NULL,7);
/*!40000 ALTER TABLE `t_form02_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_requirement`
--

DROP TABLE IF EXISTS `t_requirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_requirement` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form01` bigint(20) unsigned NOT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apprv` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_requirement_id_form01_foreign` (`id_form01`),
  CONSTRAINT `t_requirement_id_form01_foreign` FOREIGN KEY (`id_form01`) REFERENCES `t_form01` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_requirement`
--

LOCK TABLES `t_requirement` WRITE;
/*!40000 ALTER TABLE `t_requirement` DISABLE KEYS */;
INSERT INTO `t_requirement` VALUES (22,8,'1601801821.jpeg','Bukti Lulusan SMK Jurusan Teknik Otomotif',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(23,8,'1601801821.jpeg','Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(24,8,'1601801821.jpeg','Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(25,8,'1601801821.jpeg','Bukti Kompetensi 1',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(26,8,'1601801821.jpeg','Bukti Kompetensi 2',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(27,8,'1601801821.jpeg','Bukti Kompetensi 3',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(28,8,'1601801821.jpeg','Bukti Kompetensi 4',1,'2020-10-04 08:57:01','2020-10-04 08:57:01',NULL),(29,9,'1601802237.jpeg','Bukti Lulusan SMK Jurusan Teknik Otomotif',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Memenuhi Syarat'),(30,9,'1601802237.jpeg','Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Memenuhi Syarat'),(31,9,'1601802237.jpeg','Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Memenuhi Syarat'),(32,9,'1601802237.jpeg','Bukti Kompetensi 1',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Ada'),(33,9,'1601802237.jpeg','Bukti Kompetensi 2',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Ada'),(34,9,'1601802237.jpeg','Bukti Kompetensi 3',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Ada'),(35,9,'1601802237.jpeg','Bukti Kompetensi 4',1,'2020-10-04 09:03:57','2020-10-04 09:03:57','Ada');
/*!40000 ALTER TABLE `t_requirement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_scheme_form01`
--

DROP TABLE IF EXISTS `t_scheme_form01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_scheme_form01` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_scheme` bigint(20) unsigned NOT NULL,
  `id_form01` bigint(20) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_scheme_form01_id_exam_question_foreign` (`id_scheme`),
  KEY `t_scheme_form01_id_form01_foreign` (`id_form01`),
  CONSTRAINT `t_scheme_form01_id_exam_question_foreign` FOREIGN KEY (`id_scheme`) REFERENCES `m_scheme` (`id`),
  CONSTRAINT `t_scheme_form01_id_form01_foreign` FOREIGN KEY (`id_form01`) REFERENCES `t_form01` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_scheme_form01`
--

LOCK TABLES `t_scheme_form01` WRITE;
/*!40000 ALTER TABLE `t_scheme_form01` DISABLE KEYS */;
INSERT INTO `t_scheme_form01` VALUES (9,1,8,1,'2020-10-04 08:57:01','2020-10-04 08:57:01'),(10,3,8,1,'2020-10-04 08:57:01','2020-10-04 08:57:01'),(11,1,9,1,'2020-10-04 09:03:57','2020-10-04 09:03:57');
/*!40000 ALTER TABLE `t_scheme_form01` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_assessor`
--

DROP TABLE IF EXISTS `vw_assessor`;
/*!50001 DROP VIEW IF EXISTS `vw_assessor`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_assessor` (
  `id_assessor` tinyint NOT NULL,
  `assessor_name` tinyint NOT NULL,
  `reg_num` tinyint NOT NULL,
  `gender` tinyint NOT NULL,
  `address` tinyint NOT NULL,
  `phone` tinyint NOT NULL,
  `id_tuk` tinyint NOT NULL,
  `tuk_name` tinyint NOT NULL,
  `id_scheme` tinyint NOT NULL,
  `scheme_code` tinyint NOT NULL,
  `scheme_name` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_element`
--

DROP TABLE IF EXISTS `vw_element`;
/*!50001 DROP VIEW IF EXISTS `vw_element`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_element` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `id_unit` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `unit` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_exam_question`
--

DROP TABLE IF EXISTS `vw_exam_question`;
/*!50001 DROP VIEW IF EXISTS `vw_exam_question`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_exam_question` (
  `id_e_question` tinyint NOT NULL,
  `question` tinyint NOT NULL,
  `id_scheme` tinyint NOT NULL,
  `scheme_name` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_form01`
--

DROP TABLE IF EXISTS `vw_form01`;
/*!50001 DROP VIEW IF EXISTS `vw_form01`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_form01` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `phone` tinyint NOT NULL,
  `nationality` tinyint NOT NULL,
  `private_email` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `id_scheme_form` tinyint NOT NULL,
  `id_scheme` tinyint NOT NULL,
  `scheme` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_form02`
--

DROP TABLE IF EXISTS `vw_form02`;
/*!50001 DROP VIEW IF EXISTS `vw_form02`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_form02` (
  `id` tinyint NOT NULL,
  `id_form01` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `phone` tinyint NOT NULL,
  `private_email` tinyint NOT NULL,
  `nationality` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `note` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_scheme_form01`
--

DROP TABLE IF EXISTS `vw_scheme_form01`;
/*!50001 DROP VIEW IF EXISTS `vw_scheme_form01`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_scheme_form01` (
  `id_scheme` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `total` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'lsp'
--

--
-- Final view structure for view `vw_assessor`
--

/*!50001 DROP TABLE IF EXISTS `vw_assessor`*/;
/*!50001 DROP VIEW IF EXISTS `vw_assessor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_assessor` AS select `a`.`id` AS `id_assessor`,`a`.`name` AS `assessor_name`,`a`.`reg_num` AS `reg_num`,`a`.`gender` AS `gender`,`a`.`address` AS `address`,`a`.`phone` AS `phone`,`a`.`id_tuk` AS `id_tuk`,`b`.`name` AS `tuk_name`,`c`.`id_scheme` AS `id_scheme`,`d`.`code` AS `scheme_code`,`d`.`name` AS `scheme_name`,`a`.`status` AS `status` from (((`m_asesor` `a` join `m_tuk` `b`) join `m_asesor_scheme` `c`) join `m_scheme` `d`) where `b`.`id` = `a`.`id_tuk` and `a`.`id` = `c`.`id_asesor` and `d`.`id` = `c`.`id_scheme` order by `a`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_element`
--

/*!50001 DROP TABLE IF EXISTS `vw_element`*/;
/*!50001 DROP VIEW IF EXISTS `vw_element`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_element` AS select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`id_unit` AS `id_unit`,`a`.`status` AS `status`,`b`.`name` AS `unit` from (`m_element` `a` join `m_unit` `b`) where `b`.`id` = `a`.`id_unit` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_exam_question`
--

/*!50001 DROP TABLE IF EXISTS `vw_exam_question`*/;
/*!50001 DROP VIEW IF EXISTS `vw_exam_question`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_exam_question` AS select `a`.`id` AS `id_e_question`,`a`.`question` AS `question`,`a`.`id_scheme` AS `id_scheme`,`b`.`name` AS `scheme_name`,`a`.`status` AS `status` from (`m_exam_question` `a` join `m_scheme` `b`) where `b`.`id` = `a`.`id_scheme` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_form01`
--

/*!50001 DROP TABLE IF EXISTS `vw_form01`*/;
/*!50001 DROP VIEW IF EXISTS `vw_form01`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_form01` AS select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`phone` AS `phone`,`a`.`nationality` AS `nationality`,`a`.`private_email` AS `private_email`,`a`.`status` AS `status`,`a`.`created_at` AS `created_at`,`b`.`id` AS `id_scheme_form`,`b`.`id_scheme` AS `id_scheme`,`c`.`name` AS `scheme` from ((`t_form01` `a` join `t_scheme_form01` `b`) join `m_scheme` `c`) where `a`.`id` = `b`.`id_form01` and `c`.`id` = `b`.`id_scheme` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_form02`
--

/*!50001 DROP TABLE IF EXISTS `vw_form02`*/;
/*!50001 DROP VIEW IF EXISTS `vw_form02`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_form02` AS select `a`.`id` AS `id`,`a`.`id_form01` AS `id_form01`,`b`.`name` AS `name`,`b`.`phone` AS `phone`,`b`.`private_email` AS `private_email`,`b`.`nationality` AS `nationality`,`a`.`status` AS `status`,`a`.`note` AS `note`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at` from (`t_form02` `a` join `t_form01` `b`) where `b`.`id` = `a`.`id_form01` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_scheme_form01`
--

/*!50001 DROP TABLE IF EXISTS `vw_scheme_form01`*/;
/*!50001 DROP VIEW IF EXISTS `vw_scheme_form01`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_scheme_form01` AS select `a`.`id_scheme` AS `id_scheme`,`b`.`name` AS `name`,`b`.`code` AS `code`,count(`a`.`id_scheme`) AS `total` from (`t_scheme_form01` `a` join `m_scheme` `b`) where `b`.`id` = `a`.`id_scheme` group by `a`.`id_scheme` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-21 22:15:45
