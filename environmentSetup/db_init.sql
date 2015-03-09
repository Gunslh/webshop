CREATE DATABASE IF NOT EXISTS webshop;
USE webshop;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usrId` int(11) DEFAULT NULL,
  `t_country` varchar(512) DEFAULT NULL,
  `t_state` varchar(512) DEFAULT NULL,
  `t_city` varchar(512) DEFAULT NULL,
  `t_street` varchar(512) DEFAULT NULL,
  `t_name` varchar(512) DEFAULT NULL,
  `t_phone` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(512) NOT NULL,
  `t_pwd` varchar(512) NOT NULL,
  `t_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `t_cateName` varchar(512) DEFAULT NULL,
  `t_cateDescr` varchar(512) DEFAULT NULL,
  `t_cateImage` varchar(512) DEFAULT NULL,
  `t_isShow` int(11) DEFAULT NULL,
  `t_discount` decimal(10,0) DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_guid` varchar(512) DEFAULT NULL,
  `t_seoTitle` varchar(512) DEFAULT NULL,
  `t_seoDescr` varchar(512) DEFAULT NULL,
  `t_seoKeyword` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_manufactory`
-- ----------------------------
DROP TABLE IF EXISTS `shop_manufactory`;
CREATE TABLE `shop_manufactory` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_product`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product`;
CREATE TABLE `shop_product` (
  `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menuId` int(11) DEFAULT NULL,
  `fk_manufactoryId` int(11) DEFAULT NULL COMMENT 'ID',
  `t_guid` varchar(512) DEFAULT NULL,
  `t_title` varchar(512) DEFAULT NULL,
  `t_descr` varchar(512) DEFAULT NULL,
  `t_isShow` int(1) DEFAULT NULL,
  `t_discount` double DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `t_price` double DEFAULT NULL,
  `t_updateDate` datetime DEFAULT NULL,
  `t_image` varchar(45) DEFAULT NULL,
  `t_seoKeyword` varchar(512) DEFAULT NULL,
  `t_seoDescr` varchar(512) DEFAULT NULL,
  `t_seoTitle` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `t_guid` varchar(512) DEFAULT NULL,
  `t_menuName` varchar(512) DEFAULT NULL,
  `t_menuDescr` varchar(512) DEFAULT NULL,
  `t_menuImage` varchar(512) DEFAULT NULL,
  `t_seoTitle` varchar(512) DEFAULT NULL,
  `t_seoDescr` varchar(512) DEFAULT NULL,
  `t_seoKeyword` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_user`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `t_pkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_usrName` char(64) NOT NULL,
  `t_usrPwd` char(255) NOT NULL,
  `t_regDate` datetime NOT NULL,
  `t_name` char(64) NOT NULL,
  `t_telephone` char(64) NOT NULL,
  `t_zipCode` char(48) NOT NULL,
  `t_address` varchar(512) NOT NULL,
  `t_lastLogin` datetime NOT NULL,
  `t_lastPurchase` datetime DEFAULT NULL,
  `t_status` int(11) unsigned  NOT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE UNIQUE INDEX shop_user_idx1 ON shop_user (t_usrName);

-- ----------------------------
-- Table structure for `shop_user_addr`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user_addr`;
CREATE TABLE `shop_user_addr` (
  `t_pkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_usrName` char(64) NOT NULL,
  `t_name` char(64) NOT NULL,
  `t_countrycode` char(64) NOT NULL,
  `t_telephone` char(64) NOT NULL,
  `t_zipCode` char(48) NOT NULL,
  `t_area` varchar(512) NOT NULL,
  `t_address` varchar(512) NOT NULL,
  `t_flag` datetime NOT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_shopping_cart;`
-- ----------------------------
DROP TABLE IF EXISTS `shop_shopping_cart`;
CREATE TABLE `shop_shopping_cart` (
  `t_pkId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_usrName` char(64) NOT NULL,
  `t_prodId` int(11) unsigned,
  `t_num` int(11) unsigned,
  `t_unit_price` double NOT NULL,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
