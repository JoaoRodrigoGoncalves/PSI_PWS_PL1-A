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
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação Empresa',
  `designacaosocial` varchar(100) NOT NULL COMMENT 'Designação Social da Empresa',
  `capitalsocial` float NOT NULL COMMENT 'Capital Social da empresa',
  `email` varchar(100) NOT NULL COMMENT 'Email da empresa',
  `telefone` char(9) NOT NULL COMMENT 'Telemovel da empresa',
  `nif` char(9) NOT NULL COMMENT 'Numero de Identificação fiscal da empresa',
  `morada` varchar(100) NOT NULL COMMENT 'Morada da empresa',
  `codigopostal` char(8) NOT NULL COMMENT 'Codigo postal da Empresa',
  `localidade` varchar(40) NOT NULL COMMENT 'Localidade da Empresa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Empresa Teste 1',2500.58,'empresa.teste1@gmail.com','987654321','123456789','Morada Teste 1','4400-441','Leiria'),(2,'Empresa Teste 2',1546.58,'empresa.teste2@gmail.com','159789456','753159852','Morada Teste 2','4400-441','Leiria');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (2,'Espera de pagamento'),(3,'Fechado'),(1,'Pendente produção');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturas`
--

DROP TABLE IF EXISTS `faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação fatura',
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data criação fatura',
  `observacoes` text NOT NULL COMMENT 'Observações da fatura',
  `estado_id` int(11) NOT NULL COMMENT 'Identificador do estado da fatura',
  `cliente_id` int(11) NOT NULL COMMENT 'Identificador do cliente da fatura',
  `funcionario_id` int(11) NOT NULL COMMENT 'Identificador do funcionario da fatura',
  PRIMARY KEY (`id`),
  KEY `IDCLIENTE_FK` (`cliente_id`),
  KEY `IDFUNCIONARIO_FK` (`funcionario_id`),
  CONSTRAINT `IDCLIENTE_FK` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `IDFUNCIONARIO_FK` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faturas`
--

LOCK TABLES `faturas` WRITE;
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
INSERT INTO `faturas` VALUES (1,'2022-05-22 02:41:55','Compra de comida',3,2,1);
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linhas_faturas`
--

DROP TABLE IF EXISTS `linhas_faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `linhas_faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador da linha de faturas',
  `fatura_id` int(11) NOT NULL COMMENT 'Identificador da fatura asociada',
  `produto_id` int(11) NOT NULL COMMENT 'Identificador do produto asociado',
  `valor` decimal(10,2) NOT NULL COMMENT 'Valor da fatura',
  `quantidade` int(11) NOT NULL DEFAULT '1' COMMENT 'Quantidade de produto',
  `iva_id` int(11) NOT NULL COMMENT 'Identificador do tipo de iva da fatura',
  PRIMARY KEY (`id`),
  KEY `IDFATURA_FK` (`fatura_id`),
  KEY `IDPRODUTO_FK` (`produto_id`),
  KEY `IDIVA_LF_FK` (`iva_id`),
  CONSTRAINT `IDFATURA_FK` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`),
  CONSTRAINT `IDIVA_LF_FK` FOREIGN KEY (`iva_id`) REFERENCES `taxas` (`id`),
  CONSTRAINT `IDPRODUTO_FK` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhas_faturas`
--

LOCK TABLES `linhas_faturas` WRITE;
/*!40000 ALTER TABLE `linhas_faturas` DISABLE KEYS */;
INSERT INTO `linhas_faturas` VALUES (1,1,2,1.50,3,2),(2,1,3,3.50,3,2),(3,1,4,5.00,2,2);
/*!40000 ALTER TABLE `linhas_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador do produto',
  `ativo` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Estado ativo ou não do produto',
  `descricao` varchar(100) NOT NULL COMMENT 'Descrição do produto',
  `preco_unitario` decimal(10,2) NOT NULL COMMENT 'Preço do produto',
  `iva_id` int(11) NOT NULL COMMENT 'Identificador do iva do produto',
  `unidade_id` int(11) NOT NULL COMMENT 'Identificador tipo de unidade do produto',
  `stock` float NOT NULL COMMENT 'Numero de stock do produto',
  PRIMARY KEY (`id`),
  KEY `IDIVA_P_FK` (`iva_id`),
  KEY `IDUNIDADE_FK` (`unidade_id`),
  CONSTRAINT `IDIVA_P_FK` FOREIGN KEY (`iva_id`) REFERENCES `taxas` (`id`),
  CONSTRAINT `IDUNIDADE_FK` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,_binary '','Ropa',3.50,1,3,10),(2,_binary '','Comida 1',1.50,2,1,30),(3,_binary '','Comida 2',3.50,2,1,30),(4,_binary '','Comida 3',5.00,2,1,30),(5,_binary '','Comida 4',1.50,2,1,30);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxas`
--

DROP TABLE IF EXISTS `taxas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador da Taxa',
  `valor` int(11) NOT NULL COMMENT 'Valor da taxa',
  `descricao` varchar(100) NOT NULL COMMENT 'Descrição da taxa',
  `emVigor` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Bool estado em vigor ou não da taxa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxas`
--

LOCK TABLES `taxas` WRITE;
/*!40000 ALTER TABLE `taxas` DISABLE KEYS */;
INSERT INTO `taxas` VALUES (1,10,'10%',_binary ''),(2,20,'20%',_binary ''),(3,35,'35%',_binary '');
/*!40000 ALTER TABLE `taxas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador da unidade',
  `unidade` varchar(10) NOT NULL COMMENT '?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES (1,'KG'),(2,'G'),(3,'L'),(4,'U');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador User',
  `ativo` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Estado do utilizador ',
  `username` varchar(100) NOT NULL COMMENT 'Nome do utilizador',
  `password` varchar(100) NOT NULL COMMENT 'Password do utilizador',
  `email` varchar(100) NOT NULL COMMENT 'Email do utilizador',
  `telefone` char(9) NOT NULL COMMENT 'Telefone do utilizador',
  `nif` char(9) NOT NULL COMMENT 'Numero de identificação fiscal do utilizador',
  `morada` varchar(100) NOT NULL COMMENT 'Morada do utilizador',
  `codigopostal` varchar(8) NOT NULL COMMENT 'Código Postal do Utilizador',
  `localidade` varchar(40) NOT NULL COMMENT 'Localidade da morada do Utilizador',
  `role` int(2) NOT NULL DEFAULT '0' COMMENT 'Posição do utilizador',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2022-05-22  2:47:57
