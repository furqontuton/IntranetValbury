/*
Navicat MySQL Data Transfer

Source Server         : dbchat
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inchat_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-06-10 14:07:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id`  bigint(5) NOT NULL AUTO_INCREMENT ,
`userid`  bigint(10) NOT NULL ,
`username`  varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`gender`  varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`password`  varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`image`  varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`date`  datetime NOT NULL ,
`online`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
INDEX `userid` (`userid`) USING BTREE ,
INDEX `username` (`username`) USING BTREE ,
INDEX `email` (`email`) USING BTREE ,
INDEX `date` (`date`) USING BTREE ,
INDEX `online` (`online`) USING BTREE ,
INDEX `gender` (`gender`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '35252', 'furqon', 'furqon.aryulis@kbvalbury.com', 'Male', '12345678', '', '2024-05-28 08:40:32', '0'), ('2', '41545443441305', 'yoga', 'yoga@kbvalkbury.com', 'Male', '12345678', '', '2024-05-28 08:44:10', '0'), ('3', '253040502300232405', 'rangga', 'rangga@kbvalbury.com', 'Male', '12345678', '', '2024-05-28 08:53:35', '0'), ('4', '322431531525151454', 'muthi', 'muthi@kbvalbury.com', 'Female', '12345678', '', '2024-05-28 08:53:57', '0');
COMMIT;

-- ----------------------------
-- Auto increment value for `users`
-- ----------------------------
ALTER TABLE `users` AUTO_INCREMENT=5;
