/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100420
Source Host           : localhost:3306
Source Database       : prueba_konecta

Target Server Type    : MYSQL
Target Server Version : 100420
File Encoding         : 65001

Date: 2021-10-14 22:20:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `peso` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', 'Manzana Verdes', '1001', '1500', '55 g', 'Frutas', '100', '2021-10-14 20:50:33');
INSERT INTO `producto` VALUES ('3', 'Computador portátil Lenovo X260', 'X260', '4580000', '1.2 kg', 'Computadores', '28', '2021-10-14 21:54:31');

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `id_venta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) unsigned NOT NULL,
  `cantidad_venta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_venta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `producto_venta` (`id_producto`),
  CONSTRAINT `producto_venta` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of venta
-- ----------------------------
INSERT INTO `venta` VALUES ('1', '1', '30', '2021-10-14 21:33:33');
INSERT INTO `venta` VALUES ('2', '1', '10', '2021-10-14 21:38:27');
INSERT INTO `venta` VALUES ('3', '1', '50', '2021-10-14 21:38:47');
INSERT INTO `venta` VALUES ('4', '3', '2', '2021-10-14 21:55:26');
SET FOREIGN_KEY_CHECKS=1;
