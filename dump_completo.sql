CREATE DATABASE  IF NOT EXISTS `faturamais` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `faturamais`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: faturamais
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(100) NOT NULL,
  `capitalsocial` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(9) NOT NULL,
  `nif` char(9) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `codigopostal` char(8) NOT NULL,
  `localidade` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Papelaria Coelha, Lda',2500,'hp13c.papelaria@inbox.testmail.app','244000000','505000000','Rua Imaginária Nº1','2400-000','Leiria');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (3,'Anulada'),(2,'Finalizada'),(1,'Pendente');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturas`
--

DROP TABLE IF EXISTS `faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_id` int NOT NULL,
  `cliente_id` int NOT NULL,
  `funcionario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDCLIENTE_FK` (`cliente_id`),
  KEY `IDFUNCIONARIO_FK` (`funcionario_id`),
  CONSTRAINT `IDCLIENTE_FK` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `IDFUNCIONARIO_FK` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faturas`
--

LOCK TABLES `faturas` WRITE;
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
INSERT INTO `faturas` VALUES (1,'2022-06-14 02:55:44',2,4,1),(2,'2022-06-14 03:01:04',3,5,1),(3,'2022-06-15 03:08:38',2,6,1),(4,'2022-06-16 03:26:16',2,5,1),(5,'2022-06-16 03:26:56',2,4,1),(6,'2022-06-16 03:27:51',2,6,1),(7,'2022-06-17 03:30:56',2,6,2);
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linha_faturas`
--

DROP TABLE IF EXISTS `linha_faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `linha_faturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fatura_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` decimal(10,2) NOT NULL DEFAULT '1.00',
  `taxa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDFATURA_FK` (`fatura_id`),
  KEY `IDPRODUTO_FK` (`produto_id`),
  KEY `IDIVA_LF_FK` (`taxa_id`),
  CONSTRAINT `IDFATURA_FK` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`),
  CONSTRAINT `IDIVA_LF_FK` FOREIGN KEY (`taxa_id`) REFERENCES `taxas` (`id`),
  CONSTRAINT `IDPRODUTO_FK` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linha_faturas`
--

LOCK TABLES `linha_faturas` WRITE;
/*!40000 ALTER TABLE `linha_faturas` DISABLE KEYS */;
INSERT INTO `linha_faturas` VALUES (1,1,4,1.75,1.00,1),(2,1,1,3.27,1.00,1),(3,1,6,7.85,1.00,1),(4,1,9,1.60,1.00,1),(5,1,3,0.20,4.00,1),(6,2,5,19.99,7.00,3),(7,2,10,30.25,4.00,4),(8,2,1,3.27,4.00,3),(9,2,8,7.99,20.00,1),(10,2,2,10.99,5.00,2),(11,3,2,10.99,5.00,1),(12,3,1,3.27,9.00,1),(13,3,9,1.60,7.00,1),(15,3,3,0.20,4.68,1),(17,3,6,7.85,1.00,2),(18,4,1,3.27,1.00,1),(19,4,2,10.99,1.00,1),(20,4,3,0.20,1.00,1),(21,4,6,7.85,1.00,2),(22,4,7,5.23,1.00,3),(23,5,10,30.25,1.00,1),(24,5,9,1.60,1.00,2),(25,5,8,7.99,1.00,1),(26,5,7,5.23,1.00,3),(27,5,3,0.20,3.50,1),(28,6,2,10.99,1.00,1),(29,6,6,7.85,1.00,2),(30,6,9,1.60,1.00,2),(31,6,10,30.25,1.00,1),(32,6,1,3.27,1.00,1),(33,7,8,7.99,10.00,1),(34,7,1,3.27,2.00,1),(35,7,9,1.60,2.00,2),(36,7,4,1.75,1.00,1),(37,7,6,7.85,1.00,2);
/*!40000 ALTER TABLE `linha_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `descricao` varchar(100) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `taxa_id` int NOT NULL,
  `unidade_id` int NOT NULL,
  `stock` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDTAXA_P_FK` (`taxa_id`),
  KEY `IDUNIDADE_FK` (`unidade_id`),
  CONSTRAINT `IDTAXA_P_FK` FOREIGN KEY (`taxa_id`) REFERENCES `taxas` (`id`),
  CONSTRAINT `IDUNIDADE_FK` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,1,'Resma Papel A4 100fls',3.27,1,1,86),(2,1,'Kit escritório base',10.99,1,1,43),(3,1,'Papel embrulho',0.20,1,3,136.82),(4,1,'Pack 10 canetas',1.75,1,1,28),(5,1,'Tela pintura 1x1,5m',19.99,1,1,35),(6,1,'Kit Regresso às Aulas',7.85,2,1,90),(7,1,'Tintas p/ pintura diversas',5.23,3,1,38),(8,1,'Cal Branca',7.99,1,2,139),(9,1,'Caderno Pautado A4 150 fls',1.60,2,1,28),(10,1,'Conjunto 10 pinceis',30.25,1,1,28);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxas`
--

DROP TABLE IF EXISTS `taxas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` int NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `emvigor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxas`
--

LOCK TABLES `taxas` WRITE;
/*!40000 ALTER TABLE `taxas` DISABLE KEYS */;
INSERT INTO `taxas` VALUES (1,23,'Taxa Normal',1),(2,13,'Taxa Intermédia',1),(3,6,'Taxa Reduzida',1),(4,0,'Isento',1);
/*!40000 ALTER TABLE `taxas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unidade` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES (1,'Un'),(2,'Kg'),(3,'M'),(4,'M2');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(9) NOT NULL,
  `nif` char(9) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `codigopostal` varchar(8) NOT NULL,
  `localidade` varchar(40) NOT NULL,
  `role` varchar(15) DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Administrador','$2y$10$bVmxyNP9gQssxg.HxBL.ueyOSWW.dpKn6Xck6kYhQi9GzIcT1gDHe','hp13c.admin@inbox.testmail.app','990123123','123456789','Rua Hipotética Nº7','2400-000','Leiria','administrador'),(2,1,'Sónia Martins','$2y$10$RaGNJ3Db2a9nS.5z84.81.xyJJgjFr7iGi.KuwL734YcrOm.VaOPC','hp13c.sonia.martins@inbox.testmail.app','990111111','999123999','Rua das Flores Nº15','2400-000','Leiria','funcionario'),(3,1,'Marco Roberto','$2y$10$7rI1dNkgbhkT33CwMUZuEeDb4p61t500DBSb1X2CK3Tx1/xhK/pt2','hp13c.marco.roberto@inbox.testmail.app','990111222','999123888','Rua da Cidade Nº27','2400-000','Leiria','funcionario'),(4,1,'Helena Soares','$2y$10$7/owtGgGQhewCHTOJ3/agO8QMLj3Mz91bPU9EvgpdLfbZyLwgLTKq','hp13c.helena.soares@inbox.testmail.app','990111333','999123777','Avenida Gigante Nº4 R/C E','2400-000','Leiria','cliente'),(5,1,'Flávio Antunes','$2y$10$UOy0StMcVXUfPVhG/NJP5.QadfbMwm1hh7TpRVpmz3wCDRHtFcdmu','hp13c.flavio.antunes@inbox.testmail.app','990111444','999123666','Largo dos Combatentes Nº28','2400-000','Leiria','cliente'),(6,1,'Vítor Pereira','$2y$10$NM40ePQQhDd98OW/o8s1vubnaB73yGio1NHnkS9KT2iGDqEoxVXrC','hp13c.vitor.pereira@inbox.testmail.app','990111555','999123555','Praceta das Formigas Nº9','2400-000','Leiria','cliente');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-17  3:47:33
