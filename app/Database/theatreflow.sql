/*
 Navicat Premium Dump SQL

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 90100 (9.1.0)
 Source Host           : localhost:3306
 Source Schema         : theatreflow

 Target Server Type    : MySQL
 Target Server Version : 90100 (9.1.0)
 File Encoding         : 65001

 Date: 14/04/2025 18:18:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for obra
-- ----------------------------
DROP TABLE IF EXISTS `obra`;
CREATE TABLE `obra`  (
  `cod_obra` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_obra` datetime NOT NULL,
  `aforo` int NOT NULL,
  `disponibles` int NOT NULL,
  `sala` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_obra`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obra
-- ----------------------------
INSERT INTO `obra` VALUES (1, 'El Fantasma de la Ópera', '2025-05-15 20:00:00', 200, 147, 'Sala Principal', 'Un clásico del teatro musical donde el amor y el misterio se entrelazan bajo la Ópera de París.', 'fantasma.jpg', 45.99);
INSERT INTO `obra` VALUES (2, 'Romeo y Julieta', '2025-05-20 19:30:00', 180, 74, 'Sala Shakespeare', 'La trágica historia de amor de los jóvenes amantes de Verona, en una versión moderna con toques flamencos.', 'romeo.jpeg', 39.50);
INSERT INTO `obra` VALUES (3, 'La Casa de Bernarda Alba', '2025-06-10 21:00:00', 150, 120, 'Sala Lorca', 'Drama rural andaluz que explora la represión y las pasiones ocultas en una familia de mujeres.', 'bernarda.jpg', 35.00);
INSERT INTO `obra` VALUES (4, 'El Rey León', '2025-05-25 18:00:00', 250, 30, 'Sala Disney', 'El espectacular musical basado en la película clásica, con impresionantes vestuarios y coreografías.', 'leon.jpeg', 59.99);
INSERT INTO `obra` VALUES (5, 'Hombres de Negro', '2025-05-01 20:30:00', 120, 120, 'Sala Innovación', 'Comedia científica con agentes secretos que protegen la Tierra de alienígenas rebeldes.', 'hombres.jpg', 42.75);

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `numero_venta` int NOT NULL AUTO_INCREMENT,
  `cod_obra` int NOT NULL,
  `comprador` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_compra` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `comprador_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`numero_venta`) USING BTREE,
  INDEX `cod_obra`(`cod_obra`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of venta
-- ----------------------------
INSERT INTO `venta` VALUES (1, 1, 'María González', '2025-04-10 14:22:10', '');
INSERT INTO `venta` VALUES (2, 3, 'Carlos Martínez', '2025-04-11 09:45:33', '');
INSERT INTO `venta` VALUES (3, 1, 'Ana Rodríguez', '2025-04-12 16:30:47', '');
INSERT INTO `venta` VALUES (4, 1, 'Orlando Nuñez', '2025-04-14 17:33:58', '');
INSERT INTO `venta` VALUES (5, 1, 'Orlando Nuñez', '2025-04-14 17:35:06', '');
INSERT INTO `venta` VALUES (6, 1, 'Orlando Nuñez', '2025-04-14 21:40:10', '');
INSERT INTO `venta` VALUES (7, 2, 'Pasblo Nuñez', '2025-04-14 22:02:53', '32900202');

SET FOREIGN_KEY_CHECKS = 1;
