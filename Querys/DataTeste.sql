-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: faturamais
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Empresa Teste 1',2500.58,'empresa.teste1@gmail.com','987654321','123456789','Morada Teste 1','4400-441','Leiria'),(2,'Empresa Teste 2',1546.58,'empresa.teste2@gmail.com','159789456','753159852','Morada Teste 2','4400-441','Leiria');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (2,'Espera de pagamento'),(3,'Fechado'),(1,'Pendente produção');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `faturas`
--

LOCK TABLES `faturas` WRITE;
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
INSERT INTO `faturas` VALUES (1,'2022-05-22 02:41:55','Compra de comida',3,2,1);
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `linhas_faturas`
--

LOCK TABLES `linhas_faturas` WRITE;
/*!40000 ALTER TABLE `linhas_faturas` DISABLE KEYS */;
INSERT INTO `linhas_faturas` VALUES (1,1,2,1.50,3,2),(2,1,3,3.50,3,2),(3,1,4,5.00,2,2);
/*!40000 ALTER TABLE `linhas_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,_binary '','Ropa',3.50,1,3,10),(2,_binary '','Comida 1',1.50,2,1,30),(3,_binary '','Comida 2',3.50,2,1,30),(4,_binary '','Comida 3',5.00,2,1,30),(5,_binary '','Comida 4',1.50,2,1,30);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `taxas`
--

LOCK TABLES `taxas` WRITE;
/*!40000 ALTER TABLE `taxas` DISABLE KEYS */;
INSERT INTO `taxas` VALUES (1,10,'10%',_binary ''),(2,20,'20%',_binary ''),(3,35,'35%',_binary '');
/*!40000 ALTER TABLE `taxas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES (1,'KG'),(2,'G'),(3,'L'),(4,'U');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,_binary '','David','1234','daviduvi2010@gmail.com','987654321','123456789','Morada','4400-441','Leiria',0),(2,_binary '','Client Teste 1','1234','client.test1@gmail.com','985632147','745896321','Morada Teste 1','4400-441','Leiria',2),(3,_binary '','Client Teste 2','1234','client.test2@gmail.com','741258963','369852147','Morada Teste 2','4400-441','Leiria',2);
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

-- Dump completed on 2022-05-22  2:49:23
