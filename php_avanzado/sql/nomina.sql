-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: nomina
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `afialiacion_empresa_entidades`
--

DROP TABLE IF EXISTS `afialiacion_empresa_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afialiacion_empresa_entidades` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(2) NOT NULL,
  `entidad_codigo` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_afiliacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `empresa_id` (`empresa_id`),
  KEY `entidad_codigo` (`entidad_codigo`),
  CONSTRAINT `afialiacion_empresa_entidades_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `afialiacion_empresa_entidades_ibfk_2` FOREIGN KEY (`entidad_codigo`) REFERENCES `entidades` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afialiacion_empresa_entidades`
--

LOCK TABLES `afialiacion_empresa_entidades` WRITE;
/*!40000 ALTER TABLE `afialiacion_empresa_entidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `afialiacion_empresa_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afiliacion_empleado_entidades`
--

DROP TABLE IF EXISTS `afiliacion_empleado_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiliacion_empleado_entidades` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(4) NOT NULL,
  `entidad_codigo` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_afiliacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`),
  KEY `entidad_codigo` (`entidad_codigo`),
  CONSTRAINT `afiliacion_empleado_entidades_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `afiliacion_empleado_entidades_ibfk_2` FOREIGN KEY (`entidad_codigo`) REFERENCES `entidades` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliacion_empleado_entidades`
--

LOCK TABLES `afiliacion_empleado_entidades` WRITE;
/*!40000 ALTER TABLE `afiliacion_empleado_entidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `afiliacion_empleado_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Administrativa'),(2,'Comercial'),(3,'Operativa'),(4,'Técnica');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aux_perfiles_menus`
--

DROP TABLE IF EXISTS `aux_perfiles_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aux_perfiles_menus` (
  `id_aux` int(2) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(1) NOT NULL,
  `menu_id` int(1) NOT NULL,
  `p_crear` tinyint(1) NOT NULL DEFAULT '0',
  `p_leer` tinyint(1) NOT NULL DEFAULT '0',
  `p_editar` tinyint(1) NOT NULL DEFAULT '0',
  `p_eliminar` tinyint(1) NOT NULL DEFAULT '0',
  `p_imprimir` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_aux`),
  KEY `perfil_id` (`perfil_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `fk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_3` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aux_perfiles_menus`
--

LOCK TABLES `aux_perfiles_menus` WRITE;
/*!40000 ALTER TABLE `aux_perfiles_menus` DISABLE KEYS */;
INSERT INTO `aux_perfiles_menus` VALUES (1,1,1,1,1,1,1,1),(2,1,2,1,1,1,1,1),(3,1,3,1,1,1,1,1),(4,1,4,1,1,1,1,1),(5,1,5,1,1,1,1,1),(6,1,6,1,1,0,0,0),(7,1,7,1,1,0,0,0),(8,2,4,0,0,0,0,0),(9,2,5,0,0,0,0,0),(10,2,6,0,0,0,0,0),(11,2,7,0,0,0,0,0),(12,3,3,0,0,0,0,0),(13,3,5,0,0,0,0,0),(14,3,6,0,0,0,0,0),(15,4,5,0,0,0,0,0),(16,4,6,0,0,0,0,0);
/*!40000 ALTER TABLE `aux_perfiles_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Gerente General'),(2,'Secretaria'),(3,'Contador'),(4,'Auxiliar Contable'),(5,'Mensajero'),(6,'Servicios Generales'),(7,'Vigilante'),(8,'Programador Junior'),(9,'Programador Senior'),(10,'Programador Master');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_entidades`
--

DROP TABLE IF EXISTS `clase_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_entidades` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `codigo_entidad` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_entidad_codigo` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codigo_entidad` (`codigo_entidad`),
  KEY `tipo_entidad_id` (`tipo_entidad_codigo`),
  CONSTRAINT `clase_entidades_ibfk_1` FOREIGN KEY (`codigo_entidad`) REFERENCES `entidades` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clase_entidades_ibfk_2` FOREIGN KEY (`tipo_entidad_codigo`) REFERENCES `tipo_entidades` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_entidades`
--

LOCK TABLES `clase_entidades` WRITE;
/*!40000 ALTER TABLE `clase_entidades` DISABLE KEYS */;
INSERT INTO `clase_entidades` VALUES (1,'004','ARL'),(2,'008','EPS'),(3,'014','AFP'),(4,'023','EPS'),(5,'201','AFP'),(6,'008','CCF'),(7,'201','AFC');
/*!40000 ALTER TABLE `clase_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `doc_identidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_doc_id` int(1) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_id` int(3) NOT NULL,
  `cargo_id` int(2) NOT NULL,
  `area_id` int(1) NOT NULL,
  `salario` int(4) NOT NULL,
  `salario_integral` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=No,1=Si',
  `tipo_contrato_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_id` (`usuario_id`),
  UNIQUE KEY `doc_identidad` (`doc_identidad`,`tipo_doc_id`),
  KEY `tipo_doc_id` (`tipo_doc_id`),
  KEY `cargo_id` (`cargo_id`),
  KEY `area_id` (`area_id`),
  KEY `tipo_contrato_id` (`tipo_contrato_id`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`tipo_doc_id`) REFERENCES `tipo_documentos_identidad` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `empleados_ibfk_5` FOREIGN KEY (`tipo_contrato_id`) REFERENCES `tipos_contrato` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'13480035',1,'Carrera 13 # 65 -42','2491770',1,1,1,8000000,0,2),(2,'45998566',2,'Calle 13','05050505',2,3,2,1800000,0,3);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `representante_legal` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `cc_representante_legal` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidades`
--

DROP TABLE IF EXISTS `entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidades` (
  `codigo` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidades`
--

LOCK TABLES `entidades` WRITE;
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
INSERT INTO `entidades` VALUES ('004','SEGUROS DE VIDA COLPATRIA S.A.','860002183','','',''),('008','COMPENSAR','860066942','','',''),('014','COLPENSIONES','900336004','','',''),('023','CRUZ BLANCA S.A.','830009783','','',''),('201','PROTECCION (ING+PROTEC.)','800229739','','','');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `icono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `programa` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `url` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Admón Usuarios','<i class=\"fas fa-building\" style=\"font-size:24px\"></i>','adm_usuarios','admon_usuarios'),(2,'Admón Menús','<i class=\'fas fa-book\' style=\'font-size:24px\'></i>','adm_menus','admon_menus'),(3,'Admón Perfiles','<i class=\'fas fa-bullhorn\' style=\'font-size:24px\'></i>','adm_perfiles','admon_perfiles'),(4,'Admón Empleados','<i class=\"fas fa-address-card\" style=\"font-size:24px\"></i>','adm_empleados','admon_empleados'),(5,'Admón Novedades','<i class=\'fas fa-book\' style=\'font-size:24px\'></i>','adm_novedades','admon_novedades'),(6,'Liquidación Nómina','<i class=\'fas fa-fax\' style=\'font-size:24px\'></i>','liquidacion_nomina','liquidacion_nomina'),(7,'Parámetros Nómina','<i class=\'fas fa-globe\' style=\'font-size:24px\'></i>','parametros_nomina','parametros_nomina'),(75,'rrrrrrrrrr','rrrrrrrrrr','rrrrrrrrrr','rrrrrrrrrr'),(76,'zzzzzzzz','zzzzzzzz','zzzzzzzz','zzzzzzzz'),(77,'fffffffff','fffffffff','fffffffff','fffffffff'),(78,'ggggggggg','ggggggggg','ggggggggg','ggggggggg'),(79,'hhhhhhhhhhh','hhhhhhhhhhh','hhhhhhhhhhh','hhhhhhhhhhh'),(80,'ppppppppp','ppppppppp','ppppppppp','ppppppppp'),(81,'vvvvvvvvvv','vvvvvvvvvv','vvvvvvvvvv','vvvvvvvvvv'),(82,'','','','');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Adminsitrador'),(2,'Supervisor'),(3,'Auditor'),(4,'Operador');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos_pago`
--

DROP TABLE IF EXISTS `periodos_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos_pago` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_dias` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos_pago`
--

LOCK TABLES `periodos_pago` WRITE;
/*!40000 ALTER TABLE `periodos_pago` DISABLE KEYS */;
INSERT INTO `periodos_pago` VALUES (1,'Mensual',30),(2,'Quincenal',15),(3,'Semanal',7);
/*!40000 ALTER TABLE `periodos_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documentos_identidad`
--

DROP TABLE IF EXISTS `tipo_documentos_identidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documentos_identidad` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permiso_especial` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=No,1=Si',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documentos_identidad`
--

LOCK TABLES `tipo_documentos_identidad` WRITE;
/*!40000 ALTER TABLE `tipo_documentos_identidad` DISABLE KEYS */;
INSERT INTO `tipo_documentos_identidad` VALUES (1,'Cédula de ciudadanía',0),(2,'Tarjeta de Identidad',1),(3,'Cédula de extranjería',0),(4,'Pasaporte',1),(5,'Permiso especial de permanencia',1),(6,'Carnet Diplomático',0),(7,'NIT',0),(8,'Cédula sin digito de verificación',0);
/*!40000 ALTER TABLE `tipo_documentos_identidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_entidades`
--

DROP TABLE IF EXISTS `tipo_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_entidades` (
  `codigo` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_entidades`
--

LOCK TABLES `tipo_entidades` WRITE;
/*!40000 ALTER TABLE `tipo_entidades` DISABLE KEYS */;
INSERT INTO `tipo_entidades` VALUES ('AFC','Administradora de Fondo de Cesantias'),('AFP','Administradora de Fondo de Pensiones'),('ARL','Aseguradora de Riesgos Laborales'),('CCF','Caja de Compensación Familiar'),('EPS','Entidad Promotora de Salud'),('ESA','Escuela Superior de Administración Pública'),('ICB','Instituto Colombiano de Bienestar Familiar'),('SEN','Serviciona Nacional de Aprendizaje');
/*!40000 ALTER TABLE `tipo_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_contrato`
--

DROP TABLE IF EXISTS `tipos_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_contrato` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_contrato`
--

LOCK TABLES `tipos_contrato` WRITE;
/*!40000 ALTER TABLE `tipos_contrato` DISABLE KEYS */;
INSERT INTO `tipos_contrato` VALUES (1,'Contrto a término Indefinido'),(2,'Contrto a término fijo inferior a un año'),(3,'Contrto a término fijo inferior a tres años'),(4,'Contrato temporal, ocasional o accidental'),(5,'Contrato de aprendizaje'),(6,'Contrato obra o labor');
/*!40000 ALTER TABLE `tipos_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_novedad`
--

DROP TABLE IF EXISTS `tipos_novedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_novedad` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_novedad`
--

LOCK TABLES `tipos_novedad` WRITE;
/*!40000 ALTER TABLE `tipos_novedad` DISABLE KEYS */;
INSERT INTO `tipos_novedad` VALUES (1,'Ingreso'),(2,'Retiro'),(3,'Vacaciones'),(4,'Licencia Maternidad'),(5,'Licencia no remunerada'),(6,'Incapacidad General'),(7,'Incapacidad Laboral'),(8,'Cuota Prestamo'),(9,'Cuota Fondo de Empleados'),(10,'Cuota Sindicato'),(11,'Ausentismo  no remunerado'),(12,'Suspensión del contrato');
/*!40000 ALTER TABLE `tipos_novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `cuenta` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT '1=Activo,0=Inactivo',
  `perfil_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`),
  CONSTRAINT `fk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Profesor Jirafales','jirafales@gmail.com','123','fotos_usuarios/jirafales.jpeg',1,1),(2,'La Chilindrina','chilindrina@gmail.com','123','fotos_usuarios/chilindrina.jpeg',1,2),(3,'El chavo del 8','chavo8@gmail.com','123','fotos_usuarios/chavo.jpeg',1,3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-24 21:21:13
