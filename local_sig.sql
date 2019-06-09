/*
 Navicat Premium Data Transfer

 Source Server         : wamp
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : local_sig

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 03/06/2019 21:45:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sig_chofer
-- ----------------------------
DROP TABLE IF EXISTS `sig_chofer`;
CREATE TABLE `sig_chofer`  (
  `cho_id` int(11) NOT NULL AUTO_INCREMENT,
  `cho_ci` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `cho_nombrecompleto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `cho_sexo` char(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `cho_edad` int(255) NULL DEFAULT NULL,
  `cho_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `cho_celular` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `cho_estado` char(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cho_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sig_chofer
-- ----------------------------
INSERT INTO `sig_chofer` VALUES (1, '12321', 'leonads', 'm', 15, '12321', '32121', '1');
INSERT INTO `sig_chofer` VALUES (2, '112351', 'fer', 'f', 18, '123132mbamnsbd', '211321321', '1');

-- ----------------------------
-- Table structure for sig_micro
-- ----------------------------
DROP TABLE IF EXISTS `sig_micro`;
CREATE TABLE `sig_micro`  (
  `mic_id` int(255) NOT NULL AUTO_INCREMENT,
  `mic_nrointerno` int(255) NULL DEFAULT NULL,
  `mic_placa` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `mic_modelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `mic_estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mic_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sig_micro
-- ----------------------------
INSERT INTO `sig_micro` VALUES (1, 1, 'abc123', 'antiguo', '1');
INSERT INTO `sig_micro` VALUES (2, 2, 'adb', 'antigup', '1');

-- ----------------------------
-- Table structure for sig_propietario
-- ----------------------------
DROP TABLE IF EXISTS `sig_propietario`;
CREATE TABLE `sig_propietario`  (
  `pro_id` int(255) NOT NULL AUTO_INCREMENT,
  `pro_nombrecompleto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `pro_celular` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `pro_estado` char(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `pro_ci` int(255) NULL DEFAULT NULL,
  `pro_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pro_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sig_propietario
-- ----------------------------
INSERT INTO `sig_propietario` VALUES (1, 'leonardo ayala caya ', '60817621', '1', 11245454, 'b/el palmar');
INSERT INTO `sig_propietario` VALUES (2, 'fabio cesar', '654478456', '1', 11235468, 'b / caminero');
INSERT INTO `sig_propietario` VALUES (3, 'mario ovando', '605485125', '1', 11254656, 'b/ san silvestre');
INSERT INTO `sig_propietario` VALUES (4, 'leoncio', '60514231', '1', 11236548, 'b/ don quijpote');

-- ----------------------------
-- Table structure for sig_retiro
-- ----------------------------
DROP TABLE IF EXISTS `sig_retiro`;
CREATE TABLE `sig_retiro`  (
  `ret_id` int(255) NOT NULL,
  `ret_descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `ret_fecha` date NULL DEFAULT NULL,
  `mic_id` int(255) NULL DEFAULT NULL,
  `ret_estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ret_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sig_sansion
-- ----------------------------
DROP TABLE IF EXISTS `sig_sansion`;
CREATE TABLE `sig_sansion`  (
  `san_id` int(255) NOT NULL,
  `san_detalle` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `san_duracion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `san_estado` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`san_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sig_ubicacion
-- ----------------------------
DROP TABLE IF EXISTS `sig_ubicacion`;
CREATE TABLE `sig_ubicacion`  (
  `ubi_id` int(255) NOT NULL AUTO_INCREMENT,
  `ubi_latitud` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `ubi_longitud` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `ubi_hora` datetime(6) NULL DEFAULT NULL,
  `mic_id` int(255) NULL DEFAULT NULL,
  `ubi_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ubi_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sig_ubicacion
-- ----------------------------
INSERT INTO `sig_ubicacion` VALUES (1, '-17.81458282', '-63.15608597', '2019-05-27 16:20:00.000000', 1, 'primera');
INSERT INTO `sig_ubicacion` VALUES (12, '-17.767752923556003', '-63.216724681408664', '2019-05-30 11:06:08.000000', 3, 'nuevo nuevo');
INSERT INTO `sig_ubicacion` VALUES (10, '-17.77376046827441', '-63.19183378175046', '2019-05-30 11:03:49.000000', 5, 'leo');
INSERT INTO `sig_ubicacion` VALUES (7, '-17.800485463861634', '-63.160548495800754', '2019-05-30 10:35:40.000000', 3, 'ñlsdalñkj');
INSERT INTO `sig_ubicacion` VALUES (11, '-17.77216664955568', '-63.202476787121554', '2019-05-30 11:04:40.000000', 3, 'nuevo');
INSERT INTO `sig_ubicacion` VALUES (9, '-17.769837196634747', '-63.17968873933103', '2019-05-30 10:46:08.000000', 4, 'asñda´sñldáñ');

SET FOREIGN_KEY_CHECKS = 1;
