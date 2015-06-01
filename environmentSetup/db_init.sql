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
      `isDefault` tinyint(4) DEFAULT 0,
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

INSERT INTO `shop_category` VALUES (1,'Zentai','Zentai description very very long','',1,1,'2015-04-07 03:16:19','','Zentai','Zentai','Zentai'),(2,'Superheros','Superheros','',1,1,'2015-04-07 03:16:33','','Superheros','Superheros','Superheros'),(3,'Catsuits','Catsuits','',1,1,'2015-04-07 03:16:44','','Catsuits','Catsuits','Catsuits'),(4,'Latex','Latex','',1,1,'2015-04-07 03:17:00','','Latex','Latex','Latex'),(5,'Zentaikids','Zentaikids','',1,1,'2015-04-07 03:17:14','','Zentaikids','Zentaikids','Zentaikids'),(6,'Accessories','Accessories','',1,1,'2015-04-07 03:17:23','','Accessories','Accessories','Accessories'),(7,'Jersey','Jersey','',1,1,'2015-04-07 03:17:31','','Jersey','Jersey','Jersey');

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
      `fk_menuId` int(11) DEFAULT NULL COMMENT '关联的分类',
      `fk_manufactoryId` int(11) DEFAULT NULL COMMENT '生产厂商ID',
      `t_guid` varchar(4000) DEFAULT NULL COMMENT '产品guid生成静态页面用',
      `t_title` varchar(4000) DEFAULT NULL COMMENT '产品标题',
      `t_descr` varchar(4000) DEFAULT NULL COMMENT '产品描述',
      `t_isShow` int(1) DEFAULT NULL,
      `t_discount` double DEFAULT NULL COMMENT '打折',
      `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `t_price` double DEFAULT NULL,
      `t_updateDate` datetime DEFAULT NULL,
      `fk_mediaId` int(10) unsigned DEFAULT NULL,
      `t_seoKeyword` varchar(500) DEFAULT NULL,
      `t_seoDescr` varchar(400) DEFAULT NULL,
      `t_seoTitle` varchar(500) DEFAULT NULL,
      PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `shop_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `shop_submenu`;
CREATE TABLE `shop_submenu` (
      `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
      `fk_cateId` int(11) DEFAULT NULL COMMENT '分类id',
      `t_isShow` bit(1) DEFAULT NULL,
      `t_discount` double DEFAULT NULL COMMENT '打折',
      `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `t_guid` varchar(4000) CHARACTER SET utf8 DEFAULT NULL COMMENT '页面生成使用',
      `t_menuName` varchar(4000) CHARACTER SET utf8 DEFAULT NULL,
      `t_menuDescr` varchar(4000) CHARACTER SET utf8 DEFAULT NULL,
      `fk_mediaId` int(10) unsigned DEFAULT NULL,
      `t_seoTitle` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
      `t_seoDescr` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
      `t_seoKeyword` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
      PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `shop_submenu` VALUES (1,1,'',1,'2015-04-07 03:18:11','','Shiny Zentai Suits','Shiny Zentai Suits',1,'Shiny Zentai Suits','Shiny Zentai Suits','Shiny Zentai Suits'),(2,1,'',1,'2015-04-07 03:19:20','','Multi-Color Zentai Suits','Multi-Color Zentai Suits',2,'Multi-Color Zentai Suits','Multi-Color Zentai Suits','Multi-Color Zentai Suits'),(3,1,'',1,'2015-04-07 03:19:37','','Patterned Zentai Suits','Patterned Zentai Suits',3,'Patterned Zentai Suits','Patterned Zentai Suits','Patterned Zentai Suits'),(4,1,'',1,'2015-04-07 03:20:31','','Flag Zentai Suits','Flag Zentai Suits',4,'Flag Zentai Suits','Flag Zentai Suits','Flag Zentai Suits'),(5,1,'',1,'2015-04-07 03:20:45','','Skeleton Zentai Suits','Skeleton Zentai Suits',5,'Skeleton Zentai Suits','Skeleton Zentai Suits','Skeleton Zentai Suits'),(6,1,'',1,'2015-04-07 03:21:03','','Split Zentai','Split Zentai',6,'Split Zentai','Split Zentai','Split Zentai'),(7,1,'',1,'2015-04-07 03:21:16','','Camouflage Zentai Suit','Camouflage Zentai Suit',7,'Camouflage Zentai Suit','Camouflage Zentai Suit','Camouflage Zentai Suit'),(8,2,'',1,'2015-04-07 03:21:43','','Deadpool','Deadpool',8,'Deadpool','Deadpool','Deadpool'),(9,2,'',1,'2015-04-07 03:21:59','','Power Rangers','Power Rangers',9,'Power Rangers','Power Rangers','Power Rangers'),(10,2,'',1,'2015-04-07 03:22:13','','Spiderman','Spiderman',10,'Spiderman','Spiderman','Spiderman'),(11,2,'',1,'2015-04-07 03:22:27','','Batman','Batman',11,'Batman','Batman','Spiderman'),(12,2,'',1,'2015-04-07 03:22:39','','Robin Hood','Robin Hood',12,'Robin Hood','Robin Hood','Robin Hood'),(13,2,'',1,'2015-04-07 03:22:49','','Other Superheros','Other Superheros',13,'Other Superheros','Other Superheros','Other Superheros'),(14,3,'',1,'2015-04-07 03:23:02','','Animal','Animal',14,'Animal','Animal','Animal'),(15,3,'',1,'2015-04-07 03:23:14','','Leotards/unitard','Leotards/unitard',15,'Leotards/unitard','Leotards/unitard','Leotards/unitard'),(16,3,'',1,'2015-04-07 03:23:24','','Mermaid','Mermaid',16,'Mermaid','Mermaid','Mermaid'),(17,3,'',1,'2015-04-07 03:23:33','','Sexy','Sexy',17,'Sexy','Sexy','Sexy'),(18,6,'',1,'2015-04-07 03:23:45','','Hood','Hood',18,'Hood','Hood','Hood'),(19,6,'',1,'2015-04-07 03:23:54','','Jersey','Jersey',19,'Jersey','Jersey','Jersey'),(20,6,'',1,'2015-04-07 03:24:05','','Glove','Glove',20,'Glove','Glove','Glove'),(21,7,'',1,'2015-04-07 03:24:41','','Superman','Superman',21,'Superman','Superman','Superman'),(22,7,'',1,'2015-04-07 03:24:51','','Ironman','Ironman',22,'Ironman','Ironman','Ironman'),(23,7,'',1,'2015-04-07 03:25:01','','Incredible Hulk','Incredible Hulk',23,'Incredible Hulk','Incredible Hulk','Incredible Hulk');

-- ----------------------------
-- Table structure for `shop_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `shop_transaction`;
CREATE TABLE `shop_transaction` (
      `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
      `fk_user` int(11) DEFAULT NULL,
      `address` varchar(512) DEFAULT NULL,
      `fk_products` int(11) DEFAULT NULL,
      `t_createDate` datetime DEFAULT NULL,
      `delivery` char(32) DEFAULT NULL,
      `orderNum` char(64) DEFAULT NULL,
      `status` smallint(6) DEFAULT NULL,
      `tradeNum` char(64) DEFAULT NULL,
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

CREATE TABLE `shop_picture` (
      `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
      `fk_mediaId` int(11) DEFAULT NULL,
      `t_url` varchar(512) DEFAULT NULL,
      PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shop_media` (
      `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
      PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shop_cart` (
    `t_pkId` int(11) NOT NULL AUTO_INCREMENT,
    `fk_user` int(11) NOT NULL,
    `fk_product` int(11) NOT NULL,
    `t_price` double DEFAULT NULL,
    `t_total` int(11) DEFAULT 1,
    `t_selected` int(11) DEFAULT 1,
    PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shop_customized` (
  `t_pkId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `t_name` varchar(64) DEFAULT NULL,
  `t_lastname` varchar(64) DEFAULT NULL,
  `t_email` varchar(64) DEFAULT NULL,
  `t_phone` varchar(64) DEFAULT NULL,
  `t_descr` varchar(256) DEFAULT NULL,
  `t_height` int(11) DEFAULT NULL,
  `t_bust` int(11) DEFAULT NULL,
  `t_waist` int(11) DEFAULT NULL,
  `t_hip` int(11) DEFAULT NULL,
  `t_weight` int(11) DEFAULT NULL,
  `t_pic1` varchar(128) DEFAULT NULL COMMENT '提交图片',
  `t_pic2` varchar(128) DEFAULT NULL COMMENT '提交图片',
  `fk_usr_id` int(11) DEFAULT NULL COMMENT '用户id',
  `t_state` int(11) DEFAULT '0' COMMENT '当前状态  0  未处理 1 已经处理',
  `t_guid` varchar(64) DEFAULT NULL,
  `t_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='自定义产品';


