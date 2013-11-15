/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2013-06-09 11:25:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_pubuliu`
-- ----------------------------
DROP TABLE IF EXISTS `think_pubuliu`;
CREATE TABLE `think_pubuliu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `width` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='瀑布流数据表';

-- ----------------------------
-- Records of think_pubuliu
-- ----------------------------
INSERT INTO `think_pubuliu` VALUES ('1', '133.00');
INSERT INTO `think_pubuliu` VALUES ('2', '144.00');
INSERT INTO `think_pubuliu` VALUES ('3', '136.00');
INSERT INTO `think_pubuliu` VALUES ('4', '127.00');
INSERT INTO `think_pubuliu` VALUES ('5', '176.70');
INSERT INTO `think_pubuliu` VALUES ('6', '255.55');
INSERT INTO `think_pubuliu` VALUES ('7', '121.00');
INSERT INTO `think_pubuliu` VALUES ('8', '290.00');
INSERT INTO `think_pubuliu` VALUES ('9', '288.00');
INSERT INTO `think_pubuliu` VALUES ('10', '123.00');
INSERT INTO `think_pubuliu` VALUES ('11', '244.12');
INSERT INTO `think_pubuliu` VALUES ('12', '123.00');
INSERT INTO `think_pubuliu` VALUES ('13', '321.00');
INSERT INTO `think_pubuliu` VALUES ('14', '213.00');
INSERT INTO `think_pubuliu` VALUES ('15', '411.00');
INSERT INTO `think_pubuliu` VALUES ('16', '333.00');
INSERT INTO `think_pubuliu` VALUES ('17', '222.00');
INSERT INTO `think_pubuliu` VALUES ('18', '378.00');
INSERT INTO `think_pubuliu` VALUES ('19', '177.00');
INSERT INTO `think_pubuliu` VALUES ('20', '199.00');
INSERT INTO `think_pubuliu` VALUES ('21', '251.00');
INSERT INTO `think_pubuliu` VALUES ('22', '321.00');
