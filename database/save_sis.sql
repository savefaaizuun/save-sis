/*
 Navicat Premium Data Transfer

 Source Server         : MySql7
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : 127.0.0.1:3307
 Source Schema         : save_sis

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 10/08/2018 19:41:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (3, '2018_08_08_061353_create_tahun_ajarans_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_08_08_074148_create_tahun_akademiks_table', 2);
INSERT INTO `migrations` VALUES (7, '2018_08_09_070711_add_tgl_berlaku_to_sis_konfig_tahun_akademik', 3);
INSERT INTO `migrations` VALUES (11, '2014_10_12_000000_create_users_table', 4);
INSERT INTO `migrations` VALUES (12, '2014_10_12_100000_create_password_resets_table', 4);
INSERT INTO `migrations` VALUES (13, '2018_08_08_061353_create_sis_konfig_tahun_akademik_table', 4);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sis_konfig_tahun_akademik
-- ----------------------------
DROP TABLE IF EXISTS `sis_konfig_tahun_akademik`;
CREATE TABLE `sis_konfig_tahun_akademik`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun_akademik` int(11) NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_aktif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sis_konfig_tahun_akademik
-- ----------------------------
INSERT INTO `sis_konfig_tahun_akademik` VALUES (3, 2018, '01', NULL, '2018-08-09 07:30:27', '2018-08-09 07:30:27');
INSERT INTO `sis_konfig_tahun_akademik` VALUES (4, 2018, '02', NULL, '2018-08-09 08:21:55', '2018-08-09 08:21:55');
INSERT INTO `sis_konfig_tahun_akademik` VALUES (5, 2018, '03', 'on', '2018-08-09 08:22:44', '2018-08-09 08:22:44');
INSERT INTO `sis_konfig_tahun_akademik` VALUES (6, 2018, '04', '1', '2018-08-09 08:25:42', '2018-08-09 08:25:42');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
