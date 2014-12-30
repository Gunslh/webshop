/*
Navicat MySQL Data Transfer

Source Server         : web_shop
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : web_shop

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2015-02-08 11:49:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usrId` int(11) DEFAULT NULL,
  `t_country` varchar(4000) DEFAULT NULL,
  `t_state` varchar(4000) DEFAULT NULL,
  `t_city` varchar(4000) DEFAULT NULL,
  `t_street` varchar(4000) DEFAULT NULL,
  `t_name` varchar(4000) DEFAULT NULL,
  `t_phone` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_address
-- ----------------------------
INSERT INTO `shop_address` VALUES ('1', '1', 'cn', 'sc', null, 'cd', 'huqiu', '18981717357');

-- ----------------------------
-- Table structure for `shop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(4000) NOT NULL,
  `t_pwd` varchar(4000) NOT NULL,
  `t_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_admin
-- ----------------------------
INSERT INTO `shop_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', null);

-- ----------------------------
-- Table structure for `shop_category`
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `t_cateName` varchar(4000) DEFAULT NULL,
  `t_cateDescr` varchar(4000) DEFAULT NULL,
  `t_cateImage` varchar(4000) DEFAULT NULL,
  `t_isShow` int(11) DEFAULT NULL,
  `t_discount` decimal(10,0) DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_guid` varchar(4000) DEFAULT NULL,
  `t_seoTitle` varchar(400) DEFAULT NULL,
  `t_seoDescr` varchar(400) DEFAULT NULL,
  `t_seoKeyword` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES ('3', 'ab', 'acqweqwe', '', '1', '22', '2014-12-25 14:55:10', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('4', 'ab', 'acsss', '', '1', '222', '2014-12-25 14:55:34', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('5', 'ab', 'acqwe', '', '1', '222', '2014-12-25 14:56:17', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('6', 'ab', 'ac', '', '0', '222', '2014-12-25 14:56:35', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('7', 'ab', 'ac', '', '0', '22', '2014-12-25 15:00:41', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('8', 'ab', 'ac', '', '0', '22', '2014-12-25 15:01:02', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('9', 'ab', 'ac', '', '0', '22', '2014-12-25 15:05:57', '', 'ad', 'ad', 'ad');
INSERT INTO `shop_category` VALUES ('12', '', '', '', '0', '1', '2014-12-27 23:31:29', '', 'aaa', 'qwe', 'asdqwe');

-- ----------------------------
-- Table structure for `shop_manufactory`
-- ----------------------------
DROP TABLE IF EXISTS `shop_manufactory`;
CREATE TABLE `shop_manufactory` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_manufactory
-- ----------------------------
INSERT INTO `shop_manufactory` VALUES ('1', 'factory1');

-- ----------------------------
-- Table structure for `shop_product`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product`;
CREATE TABLE `shop_product` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menuId` int(11) DEFAULT NULL,
  `fk_manufactoryId` int(11) DEFAULT NULL COMMENT 'ID',
  `t_guid` varchar(4000) DEFAULT NULL,
  `t_title` varchar(4000) DEFAULT NULL,
  `t_descr` varchar(4000) DEFAULT NULL,
  `t_isShow` int(1) DEFAULT NULL,
  `t_discount` double DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `t_price` double DEFAULT NULL,
  `t_updateDate` datetime DEFAULT NULL,
  `t_image` varchar(45) DEFAULT NULL,
  `t_seoKeyword` varchar(500) DEFAULT NULL,
  `t_seoDescr` varchar(400) DEFAULT NULL,
  `t_seoTitle` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_product
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `shop_submenu`;
CREATE TABLE `shop_submenu` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cateId` int(11) DEFAULT NULL COMMENT 'id',
  `t_isShow` bit(1) DEFAULT NULL,
  `t_discount` double DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_guid` varchar(4000) DEFAULT NULL,
  `t_menuName` varchar(4000) DEFAULT NULL,
  `t_menuDescr` varchar(4000) DEFAULT NULL,
  `t_menuImage` varchar(4000) DEFAULT NULL,
  `t_seoTitle` varchar(500) DEFAULT NULL,
  `t_seoDescr` varchar(500) DEFAULT NULL,
  `t_seoKeyword` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_submenu
-- ----------------------------
INSERT INTO `shop_submenu` VALUES ('3', '4', '', '1.2', '2014-12-25 11:18:46', '', 'axa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 'ad', 'asd', 'eqwe');
INSERT INTO `shop_submenu` VALUES ('4', '3', '', '1.2', '2014-12-25 11:19:18', '', 'axa', 'a', '', 'ad', 'asd', 'eqwe');
INSERT INTO `shop_submenu` VALUES ('5', '4', '', '1.2', '2014-12-25 11:21:41', '', 'axa', 'a', '', 'ad', 'asd', 'eqwe');
INSERT INTO `shop_submenu` VALUES ('6', '8', '', '1.2', '2014-12-25 11:22:31', '', 'axa2', 'a', '', 'ad', 'asd', 'eqwe');
INSERT INTO `shop_submenu` VALUES ('7', '4', '', '1.2', '2014-12-26 11:58:22', '', 'asd', 'qwe', '', 'a', 'sda', 'qqwe');
INSERT INTO `shop_submenu` VALUES ('9', '2', '', '1', '2014-12-26 12:52:33', '', 'awqe', 'qwe', '', 'qwe', 'qweqwe', 'aseaseqwe');
INSERT INTO `shop_submenu` VALUES ('10', '3', '', '91', '2014-12-26 12:52:48', '', 'es', 'qweqweqwe', '', 'qwe', 'qwe', 'qwe');

-- ----------------------------
-- Table structure for `shop_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `shop_transaction`;
CREATE TABLE `shop_transaction` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_address` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `t_createDate` datetime DEFAULT NULL,
  `fk_deliveryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_transaction
-- ----------------------------
INSERT INTO `shop_transaction` VALUES ('1', '1', '1', '1', null, null);

-- ----------------------------
-- Table structure for `shop_user`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `t_pkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_usrName` char(60) NOT NULL,
  `t_usrPwd` char(255) NOT NULL,
  `t_regDate` datetime NOT NULL,
  `t_name` char(60) NOT NULL,
  `t_telephone` char(60) NOT NULL,
  `t_zipCode` char(40) NOT NULL,
  `t_address` varchar(400) NOT NULL,
  `t_lastLogin` datetime NOT NULL,
  `t_lastPurchase` datetime DEFAULT NULL,
  `t_status` int(11) unsigned  NOT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', 'aaaa', 'weqqwe', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `shop_user` VALUES ('2', 'bbb', 'qw12312', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
