-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: lusonay_imobiliaria
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `casa`
--

DROP TABLE IF EXISTS `casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casa` (
  `cod_casa` int(11) NOT NULL AUTO_INCREMENT,
  `cod_local` int(11) NOT NULL,
  `cod_imagem_fk` int(11) NOT NULL,
  `preco` double NOT NULL,
  `data_registo` date NOT NULL,
  `estado` varchar(255) NOT NULL,
  `tipo_negocio` varchar(255) NOT NULL,
  `tipologia` varchar(255) NOT NULL,
  `mobilada` varchar(100) NOT NULL,
  `wcs` int(11) NOT NULL,
  `desc_interior` text NOT NULL,
  `desc_exterior` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prioridade` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_casa`),
  KEY `cod_local` (`cod_local`),
  KEY `cod_imagem_fk` (`cod_imagem_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casa`
--

LOCK TABLES `casa` WRITE;
/*!40000 ALTER TABLE `casa` DISABLE KEYS */;
INSERT INTO `casa` VALUES (5,22,20,120000,'2022-02-26','Novo','Vende-se','T4','parcialmente',3,'duas varandas e 1 corredor ','piscina e um quintal vasto','947042925','frederico22joaquim@gmail.com',NULL),(6,26,24,11200000,'2022-02-28','Usado','Vende-se','T6','totalmente',4,'duas varandas e 1 corredor ','uma piscina e 1 quintal vasto','947042925','frederico22joaquim@gmail.com',NULL),(7,32,30,100000,'2022-03-10','Usado','Arrenda-se','T6','Não',3,'um escritório, uma sala vasta , corredor e sala de estar','piscina e um quintal vasto, estacionamento para 3 veículos','947042925','frederico22joaquim@gmail.com',NULL),(8,34,32,50000,'2022-03-15','Usado','Arrenda-se','T3','totalmente',3,'2 varandas e um escritorio','quintal, piscina ','947042925','frederico22joaquim@gmail.com',NULL),(9,35,33,40000,'2022-03-18','Usado','Vende-se','T2','parcialmente',2,'duas varandas e 1 corredor ','quintal vasto, garagem para 4 veiculos','947042925','frederico22joaquim@gmail.com',NULL),(10,36,34,5000000,'2022-03-18','Usado','Vende-se','T4','totalmente',4,'duas varandas e 1 corredor ','quintal vasto, garagem para 4 veiculos','947042925','frederico22joaquim@gmail.com',0),(11,40,38,62000,'2022-03-26','Usado','Arrenda-se','T4','Não',2,'uma varanda','uma piscina e 1 quintal vasto','(+244) 947-042-925','frederico22joaquim@gmail.com',0),(12,41,39,100000,'2022-03-26','Usado','Vende-se','T4','totalmente',4,'duas varandas e 1 corredor ','uma piscina e 1 quintal vasto','(+244) 947-042-925','frederico22joaquim@gmail.com',0);
/*!40000 ALTER TABLE `casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagem` (
  `cod_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `foto_principal` varchar(255) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_imagem`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem`
--

LOCK TABLES `imagem` WRITE;
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
INSERT INTO `imagem` VALUES (14,'fotos/62194198d4e40.jpeg','fotos/62194198d5165.jpeg','fotos/62194198d5473.jpeg','fotos/6219419912cba.jpeg','fotos/62194199132ed.jpeg'),(13,'fotos/6219415237660.jpeg','fotos/621941528b9d2.jpeg','fotos/621941528bce9.jpeg','fotos/621941528bf8a.jpeg','fotos/621941528c1c0.jpeg'),(12,'fotos/621940a5c10fa.jpeg','fotos/621940a5c2257.jpeg','fotos/621940a5c2596.jpeg','fotos/621940a5c28b4.jpeg','fotos/621940a5c2b07.jpeg'),(11,'fotos/62193fe7874a4.jpeg','fotos/62193fe787fb5.jpeg','fotos/62193fe7c48e6.jpeg','fotos/62193fe7c4bb1.jpeg','fotos/62193fe7c4def.jpeg'),(20,'fotos/621a7440eef26.jpg','fotos/621a7440f3e83.jpeg','fotos/621a7440f41d3.jpeg','fotos/621a7441003d6.jpeg','fotos/621a744100756.jpeg'),(10,'fotos/62193fa015baf.jpeg','fotos/62193fa01602d.jpeg','fotos/62193fa01a16d.jpeg','fotos/62193fa01a4b6.jpeg','fotos/62193fa01a74f.jpeg'),(15,'fotos/6219428296ff7.jpeg','fotos/62194282a3473.jpeg','fotos/62194282a3773.jpeg','fotos/62194282a39b6.jpeg','fotos/62194282a3c79.jpeg'),(16,'fotos/621942e94221f.jpeg','fotos/621942e942587.jpeg','fotos/621942e942940.jpeg','fotos/621942e942cf1.jpeg','fotos/621942e943090.jpeg'),(17,'fotos/6219432daa752.jpg','fotos/6219432daaabc.jpg','fotos/6219432dab001.jpg','fotos/6219432dab2b7.jpg','fotos/6219432dab535.png'),(22,'fotos/621b601183eb3.jpeg','fotos/621b60118418b.jpeg','fotos/621b6011843ec.jpeg','fotos/621b60118467f.jpeg','fotos/621b60118491a.jpeg'),(23,'fotos/621b608a308bc.jpeg','fotos/621b608a30c3c.jpeg','fotos/621b608a30f32.jpeg','fotos/621b608a312a0.jpeg','fotos/621b608a315fa.jpeg'),(24,'fotos/621cc55c3bff4.jpg','fotos/621cc55c3c420.jpeg','fotos/621cc55c3c74d.jpg','fotos/621cc55c3cad9.jpg','fotos/621cc55c3cdc7.jpeg'),(27,'fotos/6227594db660d.jpeg','fotos/6227594dba4e1.jpeg','fotos/6227594dba736.jpeg','fotos/6227594dd0a9d.jpeg','fotos/6227594dd0f6c.jpeg'),(28,'fotos/622759b8cd816.jpeg','fotos/622759b8cdc17.jpeg','fotos/622759b8d179e.jpeg','fotos/622759b8d1ac4.jpeg','fotos/622759b8d1d95.jpeg'),(29,'fotos/62275edd0f399.jpeg','fotos/62275edd1638a.jpeg','fotos/62275edd1667d.jpeg','fotos/62275edd16a97.jpeg','fotos/62275edd16d59.jpeg'),(30,'fotos/622a660a82000.jpg','fotos/622a660a879e9.jpg','fotos/622a660a87d05.jpeg','fotos/622a660a88062.jpeg','fotos/622a660a88657.jpeg'),(31,'fotos/622bfcad39965.jpeg','fotos/622bfcad39c5e.jpeg','fotos/622bfcad39ee9.jpeg','fotos/622bfcad3a141.jpeg','fotos/622bfcad3a373.jpeg'),(32,'fotos/6230491d1adcf.jpg','fotos/6230491d1cc3f.jpg','fotos/6230491d1cf8c.jpg','fotos/6230491d1d297.jpeg','fotos/6230491d1d4fe.jpeg'),(33,'fotos/62347de85a7fb.jpg','fotos/62347de86169f.jpeg','fotos/62347de86526d.jpg','fotos/62347de86b2de.jpg','fotos/62347de86b76d.jpeg'),(34,'fotos/62347ece27241.jpg','fotos/62347ece27531.jpeg','fotos/62347ece27893.jpg','fotos/62347ece27c4d.jpeg','fotos/62347ece27f25.jpeg'),(35,'fotos/62348593c32d7.jpeg','fotos/62348593c35b8.jpeg','fotos/62348593dcfa0.jpeg','fotos/62348593dd2cd.jpeg','fotos/62348593dd5a3.jpeg'),(36,'fotos/6234860fd6994.jpeg','fotos/6234860fe57da.jpeg','fotos/6234860fe5a66.jpeg','fotos/6234860fe5c82.jpeg','fotos/6234860fe5f21.jpeg'),(37,'fotos/6234873213251.jpeg','fotos/623487321ea17.jpeg','fotos/623487321f010.jpeg','fotos/623487321f376.jpeg','fotos/623487321f577.jpeg'),(38,'fotos/623ec945ce3c3.jpeg','fotos/623ec945ce700.jpeg','fotos/623ec945cea3e.jpeg','fotos/623ec945ced59.jpg','fotos/623ec945cf150.jpeg'),(39,'fotos/623ec99b011e7.jpg','fotos/623ec99b01461.jpeg','fotos/623ec99b01731.jpg','fotos/623ec99b01979.jpeg','fotos/623ec99b01c19.jpeg'),(40,'fotos/623ecbd5e6320.jpeg','fotos/623ecbd5e665b.jpeg','fotos/623ecbd5e6901.jpeg','fotos/623ecbd5e6bfa.jpeg','fotos/623ecbd5e6f41.jpeg'),(41,'fotos/623ecc2857331.jpeg','fotos/623ecc2857802.jpeg','fotos/623ecc2857b1d.jpeg','fotos/623ecc285bf2f.jpeg','fotos/623ecc285c222.jpeg'),(42,'fotos/623ecc93d8aa4.jpeg','fotos/623ecc93d8d79.jpeg','fotos/623ecc93d9038.jpeg','fotos/623ecc93d92a1.jpeg','fotos/623ecc93d950f.jpg'),(43,'fotos/623eccf6603e7.jpeg','fotos/623eccf660781.jpeg','fotos/623eccf660aa4.jpeg','fotos/623eccf660dc6.jpeg','fotos/623eccf661109.jpeg');
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localizacao` (
  `cod_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(50) NOT NULL,
  `regiao` varchar(100) NOT NULL,
  `localidade` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_localizacao`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizacao`
--

LOCK TABLES `localizacao` WRITE;
/*!40000 ALTER TABLE `localizacao` DISABLE KEYS */;
INSERT INTO `localizacao` VALUES (17,'Angola','Dangereux','Talatona','Talatona'),(16,'Angola','Dangereux','Talatona','Talatona'),(15,'Angola','Dangereux','Talatona','Talatona'),(14,'Angola','Dangereux','Talatona','Talatona'),(13,'Angola','Dangereux','Talatona','Talatona'),(12,'Angola','Luanda','Talatona','Talatona'),(22,'Angola','Dangereux','Talatona','Talatona'),(18,'Angola','Dangereux','Talatona','Talatona'),(19,'Angola','Dangereux','Talatona','Talatona'),(20,'Angola','Dangereux','Talatona','Talatona'),(21,'Angola','Dangereux','Talatona','Talatona'),(24,'Angola','Dangereux','Talatona','Talatona'),(25,'Angola','Dangereux','Talatona','Talatona'),(26,'Angola','Dangereux','Talatona','Talatona'),(27,'Angola','dangereux','Talatona','Talatona'),(29,'Angola','Dangereux','Talatona','Talatona'),(30,'Angola','Luanda','Talatona','Cazenga'),(31,'Angola','Dangereux','Talatona','Talatona'),(32,'Angola','Luanda','Talatona','Talatona'),(33,'Angola','Luanda','Talatona','Talatona'),(34,'Angola','Dangereux','Luanda','Talatona'),(35,'Angola','Golf 2','Luanda','Kilamba Kiaxi'),(36,'Angola','Prenda','Luanda','Maianga'),(37,'Angola','Dangereux','Talatona','Cazenga'),(38,'Angola','Dangereux','Talatona','Samba'),(39,'Angola','Dangereux','Talatona','Maianga'),(40,'Angola','Benfica','Talatona','Talatona'),(41,'Angola','Prenda','Luanda','Maianga'),(42,'Angola','Squele','Luanda','Viana'),(43,'Angola','Benfica','Talatona','Talatona'),(44,'Angola','samba','Talatona','Samba'),(45,'Angola','Dangereux','Talatona','Maianga');
/*!40000 ALTER TABLE `localizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newsletter` (
  `cod_fk` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` VALUES (1,'fff@gmail.com'),(2,'fredericojoaquim@trycode.co'),(3,'geral@lusonay.co'),(4,'fred22jaoaquim@gmail.com'),(5,'frederico22joaquim@gmail.com');
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terreno`
--

DROP TABLE IF EXISTS `terreno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terreno` (
  `cod_terreno` int(11) NOT NULL AUTO_INCREMENT,
  `cod_local_fk` int(11) NOT NULL,
  `cod_imagem_fk` int(11) NOT NULL,
  `preco` double NOT NULL,
  `data_registo` date NOT NULL,
  `dimensao` varchar(100) NOT NULL,
  `tipo_de_negocio` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prioridade` int(11) DEFAULT NULL,
  `desc_exterior` text NOT NULL,
  `desc_interior` text NOT NULL,
  PRIMARY KEY (`cod_terreno`),
  KEY `cod_local_fk` (`cod_local_fk`),
  KEY `cod_imagem_fk` (`cod_imagem_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terreno`
--

LOCK TABLES `terreno` WRITE;
/*!40000 ALTER TABLE `terreno` DISABLE KEYS */;
INSERT INTO `terreno` VALUES (11,42,40,500000,'2022-03-26','15/30','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'quintal vasto, garagem para 4 veiculos','duas varandas e 1 corredor '),(5,25,23,120000,'2022-02-27','50/50','Vende-se','947042925','frederico22joaquim@gmail.com',0,'piscina e um quintal vasto','duas varandas e 1 corredor '),(6,31,29,11200000,'2022-03-08','50/50','Vende-se','947042925','frederico22joaquim@gmail.com',0,'piscina e um quintal vasto','duas varandas e 1 corredor '),(7,33,31,2000000,'2022-03-12','20/20','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'estrada alfaltada','um tanque de água e quintal  vedado'),(8,37,35,1200,'2022-03-18','20/20','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'quintal vasto, garagem para 4 veiculos','duas varandas e 1 corredor '),(9,38,36,120,'2022-03-18','15/30','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'quintal vasto, garagem para 4 veiculos','2 varandas e 1 corredor'),(10,39,37,120,'2022-03-18','20/20','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'quintal vasto, garagem para 4 veiculos','duas varandas e 1 corredor '),(12,43,41,8000000,'2022-03-26','50/50','Vende-se','(+244) 947-042-925','frederico22joaquim@gmail.com',0,'uma piscina e 1 quintal vasto','duas varandas e 1 corredor ');
/*!40000 ALTER TABLE `terreno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teste`
--

DROP TABLE IF EXISTS `teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teste` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teste`
--

LOCK TABLES `teste` WRITE;
/*!40000 ALTER TABLE `teste` DISABLE KEYS */;
INSERT INTO `teste` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `teste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `num_utilizador` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Frederico Joaquim','fred','Frederico Joaquim','frederico22joaquim@gmail.com','947042925'),(2,'FRE','$2y$10$k3UqtNRhunHvJQ1xRrCjguwHED3HzFWonkk3GdlfYmg/MhccEkY6a','Frederico Joaquim','frederico22joaquim@gmail.com','923456789');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veiculo` (
  `cod_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_local_fk` int(11) NOT NULL,
  `cod_imagem_fk` int(11) NOT NULL,
  `preco` double NOT NULL,
  `data_registo` date NOT NULL,
  `estado` varchar(255) NOT NULL,
  `tipo_negocio` varchar(255) NOT NULL,
  `airbag` varchar(255) NOT NULL,
  `arcondicionado` varchar(100) NOT NULL,
  `ele_seguranca` varchar(255) NOT NULL,
  `equipam_interior` varchar(255) NOT NULL,
  `kilometragem` varchar(100) NOT NULL,
  `caixa_velocidade` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `comustivel` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prioridade` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_veiculo`),
  KEY `cod_local_fk` (`cod_local_fk`),
  KEY `cod_imagem_fk` (`cod_imagem_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (3,29,27,11200000,'2022-03-08','Novo','Vende-se','Sim','Sim','ddd','sss','123','Manual','I10','Toyota','LD-20-21-BG','vermelho','Gasolina','947042925','frederico22joaquim@gmail.com',0),(4,30,28,11200000,'2022-03-08','Usado','Vende-se','Sim','Sim','eee','dddd','123','Manual','AZERA','Hyunday','LD-21-10-HA','Branco','Gasóleo','947042925','frederico22joaquim@gmail.com',0),(5,44,42,4000000,'2022-03-26','Usado','Vende-se','Sim','Sim','ddd','dddd','40.000','Automática','i10','Hyunday','LD-20-21-BG','vermelho','Gasolina','(+244) 947-042-925','frederico22joaquim@gmail.com',0),(6,45,43,4500000,'2022-03-26','Novo','Vende-se','Sim','Sim','eee','sss','40.000','Manual','I30','Hyunday','LD-20-21-BG','Branco','Gasolina','(+244) 947-042-925','frederico22joaquim@gmail.com',0);
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20  8:52:30
