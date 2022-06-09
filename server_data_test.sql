-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: faturamais
-- ------------------------------------------------------
-- Server version	5.7.31

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
INSERT INTO `empresas` VALUES (1,'Empresa Teste 1',2500,'empresa.teste1@gmail.com','963258741','951456753','Rua Doce ','2400-000','Leiria');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (3,'Cancelada'),(2,'Fechada'),(1,'Pedente');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `faturas`
--

LOCK TABLES `faturas` WRITE;
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
INSERT INTO `faturas` VALUES (1,'2022-06-08 11:22:00',NULL,1,3,1);
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `linha_faturas`
--

LOCK TABLES `linha_faturas` WRITE;
/*!40000 ALTER TABLE `linha_faturas` DISABLE KEYS */;
INSERT INTO `linha_faturas` VALUES (1,1,2,2.50,2,1),(2,1,1,2.00,2,1),(3,1,3,1.00,3,1),(4,1,4,3.00,2,2),(5,1,8,1.75,10,1),(6,1,7,1.80,5,3),(7,1,6,2.25,5,1),(8,1,5,3.00,10,2),(9,1,9,1.50,5,2),(10,1,10,1.00,2,1),(11,1,11,10.00,5,1);
/*!40000 ALTER TABLE `linha_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,1,'Bolo',2.00,1,1,8),(2,1,'Frango',2.50,1,3,8),(3,1,'Bebida',1.00,1,1,7),(4,1,'Peixe',3.00,1,1,13),(5,1,'Carne Porco',3.00,2,1,90),(6,1,'Peito Frango',2.25,3,1,95),(7,1,'Coca-Cola',1.80,3,1,95),(8,1,'Sumol',1.75,2,1,90),(9,1,'LimÃ£o',1.50,2,3,95),(10,1,'Caneca',1.00,1,1,98),(11,1,'Vinho',10.00,1,1,95);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `taxas`
--

LOCK TABLES `taxas` WRITE;
/*!40000 ALTER TABLE `taxas` DISABLE KEYS */;
INSERT INTO `taxas` VALUES (1,23,'Taxa Normal',1),(2,0,'Nula',1),(3,13,'Taxa media',1);
/*!40000 ALTER TABLE `taxas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES (1,'Un'),(2,'G'),(3,'Kg');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'David Machado','$2y$10$nTs1V/kkZ9pDErsN8fE0Ze44sfOjvQGb27fMhJnaaGkKRCz/9IwUe','david.machado@gmail.com','956321478','951753852','Rua das Eiras','2400-441','Leiria','administrador'),(2,1,'Carlos','$2y$10$sNhkqxKMHNqHTD.PavRLr.fnjDiMqKrrJH3jRopvwmt05bt1x2q4e','carlos@gmail.com','987654321','895632147','Rua Carlos IV','2400-000','Leiria','funcionario'),(3,1,'Pedro Rodrigo Lopez','$2y$10$4G0moeLNGw7wlD.0co2Ww.PMpqXB8MIaEsIlhDdbYbkGqff7tXkqq','pedro@gmail.com','956328741','468215973','Rua Pedro II','2400-000','Leiria','cliente'),(4,1,'Marco Antonio','$2y$10$6HYkl3Hu2FYV4eZ0hHov9.LeQ/pZa68dVsfdtrzhsLz9K034nTR5m','marco.antonio@gmail.com','956321487','845632189','Rua Marco II','2400-000','Leiria','cliente'),(5,1,'Felipe Rodrigo','$2y$10$.V9cekfzNJLsJBn77U1uhe8KvH6oF6ZfSfMmk5Be9RhnMhUceF3QC','felipe.rodrigo@gmail.com','658932147','745123698','Rua Felipe V','2400-000','Leiria','funcionario'),(6,1,'Manel Qualquercoisa','$2y$10$UtRHkqlG6yARTENeguJurubdHvAO8rPo35iOI7U4oBfAMvPrDSF.O','manel@gmai.com','956328741','485697123','Rua das Gomas','2400-000','Lisboa','funcionario');
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

-- Dump completed on 2022-06-08 15:31:34
