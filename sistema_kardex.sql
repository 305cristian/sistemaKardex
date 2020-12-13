/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : sistema_kardex

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 24/10/2020 13:20:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_apellido` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_cedula` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_estado` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_genero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 234 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (10, 'PAOLA JANINE', 'PAZ PAEZ', '1900827722', 'Inactivo', 'Femenino');
INSERT INTO `clientes` VALUES (11, 'JOSE MANUEL', 'JIMENEZ', '1900877721', 'Activo', 'Masculino');
INSERT INTO `clientes` VALUES (12, 'JESIKA', 'LOAIZA', '1899009987', 'Activo', 'Femenino');
INSERT INTO `clientes` VALUES (188, 'v cv cv', 'bgfgbfgb', 'gbfgb', 'Activo', 'Masculino');
INSERT INTO `clientes` VALUES (232, 'gsdgsdg', 'sdgsdg', 'sdgsdg', 'Activo', 'Masculino');
INSERT INTO `clientes` VALUES (233, 'rgserg', 'sergserg', '1900827722', 'Inactivo', 'Femenino');

-- ----------------------------
-- Table structure for grupo_prod
-- ----------------------------
DROP TABLE IF EXISTS `grupo_prod`;
CREATE TABLE `grupo_prod`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detalle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of grupo_prod
-- ----------------------------
INSERT INTO `grupo_prod` VALUES (1, 'ABARROTES', 'TODO LO QUE PERTENECE A ABARROTES', 'on');
INSERT INTO `grupo_prod` VALUES (2, 'CARNICOS', 'TODO LO QUE PERTENECE A CARNES', 'on');
INSERT INTO `grupo_prod` VALUES (3, 'SUM-OFICINA', 'TODO LO QUE PERTENECE A OFICINA', 'on');

-- ----------------------------
-- Table structure for marca_prod
-- ----------------------------
DROP TABLE IF EXISTS `marca_prod`;
CREATE TABLE `marca_prod`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detalle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of marca_prod
-- ----------------------------
INSERT INTO `marca_prod` VALUES (1, 'GENUIS', 'GENUIS', 'on');
INSERT INTO `marca_prod` VALUES (2, 'HP', 'HP', 'on');
INSERT INTO `marca_prod` VALUES (11, 'LG', 'LG', 'on');
INSERT INTO `marca_prod` VALUES (23, 'epson', 'epson', NULL);
INSERT INTO `marca_prod` VALUES (27, 'lenovo', 'lenovo', 'on');
INSERT INTO `marca_prod` VALUES (28, 'PRONACA', 'PRONACA', 'on');
INSERT INTO `marca_prod` VALUES (29, 'MONTERREY', 'MONTERREY', 'on');
INSERT INTO `marca_prod` VALUES (30, 'NUTRI', 'NUTRI', 'on');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stock_min` int(255) NULL DEFAULT NULL,
  `stock_max` int(255) NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iva` int(255) NULL DEFAULT NULL,
  `cod_barra1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cod_barra2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cod_barra3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fkMarca` int(10) NULL DEFAULT NULL,
  `fkSubGrupo` int(10) NULL DEFAULT NULL,
  `fkTipo` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fkTipo`(`fkTipo`) USING BTREE,
  INDEX `fkSubGrupo`(`fkSubGrupo`) USING BTREE,
  INDEX `fkMarca`(`fkMarca`) USING BTREE,
  CONSTRAINT `fkMarca` FOREIGN KEY (`fkMarca`) REFERENCES `marca_prod` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fkSubGrupo` FOREIGN KEY (`fkSubGrupo`) REFERENCES `subgrupo_prod` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fkTipo` FOREIGN KEY (`fkTipo`) REFERENCES `tipo_prod` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'POLLO AL VACIO', 'KG', 50, 1000, 'on', 0, '5555', '222', '6666', 28, 20, 1);
INSERT INTO `productos` VALUES (2, 'AZUCAR MONTERREY 50KG', 'QQ', 5, 100, 'on', 0, '', '', '', 1, 5, 1);
INSERT INTO `productos` VALUES (4, 'PIERNA DE CERDO', 'KG', 5, 100, 'on', 0, '', '', '', 28, 2, 1);
INSERT INTO `productos` VALUES (5, 'HARINA DE TRIGO 50KG', 'QQ', 5, 100, 'on', 0, '', '', '', 1, 3, 1);
INSERT INTO `productos` VALUES (7, 'AZUCAR SPLENDA', 'DYSPLEY', 0, 0, 'on', 12, '', '', '', 29, 3, 1);
INSERT INTO `productos` VALUES (8, 'LECHE ENTERA', 'UNI', 5, 100, 'on', 0, '', '', '', 30, 21, 1);

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ci_ruc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `razon_social` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tipo_documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES (1, '11', 'manuel', 'n', 'bg', '99', '00000', 'ui', 'Ruc');
INSERT INTO `proveedores` VALUES (2, '66666', 'Juan', 'Armijos', 'hjh', 'gjgu', 'uy8', 'ghg', 'Ruc');
INSERT INTO `proveedores` VALUES (3, '1900837474', 'Ariana', 'Yuribeth', 'arianas yuriss', 'ari@gmail.com', '099283733', 'Los encuentros', 'Cedula');
INSERT INTO `proveedores` VALUES (4, 'kk', 'qqq', 'jj', 'hgh', 'dtyyi', '89', 'fgfg', 'Pasaporte');
INSERT INTO `proveedores` VALUES (14, 'dsvds', 'z zx zx', 'zx ', 'z zx ', 'dsvsd', 'dsv', 'zx ', 'Ruc');
INSERT INTO `proveedores` VALUES (15, '  xz', 'z Z ', 'xz ', 'dsv', 'sdv', 'sdvsd', 'vsd', 'Ruc');
INSERT INTO `proveedores` VALUES (16, 'erhrh', 'eherh', 'reher', 'erherhe', 'erhwrwe', 'eherh', 'herhrwh', 'Cedula');
INSERT INTO `proveedores` VALUES (17, '54545454', 'sfgsdfgdfg', 'dfgsdg', 'dfgsdg', 'gsdfg', 'dfgdsf', 'sdfgs', 'Pasaporte');

-- ----------------------------
-- Table structure for subgrupo_prod
-- ----------------------------
DROP TABLE IF EXISTS `subgrupo_prod`;
CREATE TABLE `subgrupo_prod`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detalle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fkGrupo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fkGrupo`(`fkGrupo`) USING BTREE,
  CONSTRAINT `fkGrupo` FOREIGN KEY (`fkGrupo`) REFERENCES `grupo_prod` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of subgrupo_prod
-- ----------------------------
INSERT INTO `subgrupo_prod` VALUES (1, 'RES', 'CARNE DE VACA LOLA VIVA', 'on', 2);
INSERT INTO `subgrupo_prod` VALUES (2, 'CERDO', 'CARNE DE CHANCHO', 'on', 2);
INSERT INTO `subgrupo_prod` VALUES (3, 'HARINAS', 'TODO LO REFERIDO A HARINAS', 'on', 1);
INSERT INTO `subgrupo_prod` VALUES (4, 'MARCADORES', 'MARCADORES', NULL, 3);
INSERT INTO `subgrupo_prod` VALUES (5, 'AZUCARES', 'AZUCARES', 'on', 1);
INSERT INTO `subgrupo_prod` VALUES (7, 'PAPELES', 'PAPELES', 'on', 3);
INSERT INTO `subgrupo_prod` VALUES (8, 'ACEITES', 'ACEITES', 'on', 1);
INSERT INTO `subgrupo_prod` VALUES (9, 'CEREALES', 'CEREALES', 'on', 1);
INSERT INTO `subgrupo_prod` VALUES (20, 'AVES', 'SOLO AVES', 'on', 2);
INSERT INTO `subgrupo_prod` VALUES (21, 'LACTEOS', 'TODO DERIVADO DE LALECHE', 'on', 1);

-- ----------------------------
-- Table structure for tipo_prod
-- ----------------------------
DROP TABLE IF EXISTS `tipo_prod`;
CREATE TABLE `tipo_prod`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detalle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipo_prod
-- ----------------------------
INSERT INTO `tipo_prod` VALUES (1, 'INVENTARIO', 'SOLO INVENTARIO', 'on');
INSERT INTO `tipo_prod` VALUES (2, 'ACTIVOS FIJOS', 'SOLO ACTIVOS FIJOS', 'on');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contrasenia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'CRISTIAN', 'PAZ', 'admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
