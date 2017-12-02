/*
Navicat MySQL Data Transfer

Source Server         : 数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : oneplus

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-26 16:52:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `is_default` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('20', '10', 'AJBNDA', '12454', '56456ADSDAD FDSF54SDF', '1');
INSERT INTO `address` VALUES ('21', '10', 'JACK', '13548745784', '时代峻峰说翻就翻打瞌睡', '0');
INSERT INTO `address` VALUES ('22', '4', 'asfasf', 'sdff', 'sdffs', '0');
INSERT INTO `address` VALUES ('23', '9', 'aa', 'vb', 'cvc', '1');
INSERT INTO `address` VALUES ('24', '12', 'AA', 'AAA', 'AAAA', '1');
INSERT INTO `address` VALUES ('26', '13', 'BB', 'BB', 'BB', '1');
INSERT INTO `address` VALUES ('29', '14', 'CC', 'CC', 'CC', '1');
INSERT INTO `address` VALUES ('32', '16', 'BB', 'BB', 'BB', '0');
INSERT INTO `address` VALUES ('37', '19', 'CC', 'CC', 'CC', '1');
INSERT INTO `address` VALUES ('38', '15', 'dfgdf', 'gdgggdg', 'dfgdf', '0');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'admin1', '123456');
INSERT INTO `admin` VALUES ('3', 'admin2', '123456');
INSERT INTO `admin` VALUES ('4', 'admin3', '123456');
INSERT INTO `admin` VALUES ('5', 'admin4', '123456');
INSERT INTO `admin` VALUES ('6', 'admin5', '123456');
INSERT INTO `admin` VALUES ('7', 'admin6', '123456');
INSERT INTO `admin` VALUES ('15', 'admin7', '123456789');

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `sku_id` int(10) NOT NULL,
  `count` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sku_id` (`sku_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '手机', '/OnePlus-master/upload/img/phones-plate1.jpg');
INSERT INTO `category` VALUES ('2', '耳机/音箱', '/OnePlus-master/upload/img/audio-plate2.jpg');
INSERT INTO `category` VALUES ('3', '壳/后盖/膜', '/OnePlus-master/upload/img/cases-plate3.jpg');
INSERT INTO `category` VALUES ('4', '适配器/数据线', '/OnePlus-master/upload/img/cables-plate4.jpg');
INSERT INTO `category` VALUES ('5', '套装', '/OnePlus-master/upload/img/bundles-plate5.jpg');
INSERT INTO `category` VALUES ('6', '生活馆', '/OnePlus-master/upload/img/trip-plate6.jpg');

-- ----------------------------
-- Table structure for good
-- ----------------------------
DROP TABLE IF EXISTS `good`;
CREATE TABLE `good` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parameter` varchar(1000) NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL,
  `detail_img` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good
-- ----------------------------
INSERT INTO `good` VALUES ('7', '1', 'OnePlus 5', 'a:9:{s:6:\"尺寸\";s:4:\"153g\";s:6:\"重量\";s:22:\"154.2 x 74.1 x 7.25 mm\";s:6:\"材质\";s:15:\"铝合金金属\";s:12:\"操作系统\";s:40:\"H2OS 3.5 基于 Android™ Nougat 开发\";s:3:\"CPU\";s:63:\"高通骁龙™835 (8 核，10nm 工艺，最高主频 2.45GHz)\";s:3:\"GPU\";s:10:\"Adreno 540\";s:3:\"RAM\";s:13:\"6/8GB LPDDR4X\";s:6:\"存储\";s:26:\"64/128GB UFS 2.1 双通道\";s:12:\"测试参数\";s:0:\"\";}', '版本', '<img  src=\"/OnePlus-master/upload/20171016/1508156006.png\"/>									', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171016/1508155448.jpg&quot; title=&quot;1508155448.jpg&quot; alt=&quot;screen-bg.jpg&quot;/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('8', '2', '贝壳绕线器', 'a:0:{}', '颜色', '<img  src=\"/OnePlus-master/upload/20171016/1508157753.png\"/>	', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171016/1508157784.jpg&quot; title=&quot;1508157784.jpg&quot; alt=&quot;webwxgetmsgimg.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('9', '3', 'OnePlus 5 芳纶纤维全包保护壳', 'a:3:{s:6:\"尺寸\";s:16:\"157.8*77.8*9.2mm\";s:6:\"重量\";s:3:\"20g\";s:6:\"材质\";s:18:\"芳纶纤维，TPU\";}', '', '<img  src=\"/OnePlus-master/upload/20171016/1508158242.png\"/>	', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171016/1508158248.jpg&quot; title=&quot;1508158248.jpg&quot; alt=&quot;webwxgetmsgimg.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('11', '5', '学习套装', 'a:0:{}', '', '<img  src=\"/OnePlus-master/upload/20171020/1508482851.jpg\"/>', '<p><img src=\"/OnePlus-master/upload/20171020/1508482859.jpg\" title=\"1508482859.jpg\" alt=\"f84b54dab7bfae173e2a69f225b8e7b5.jpg\"/></p><p><img src=\"/OnePlus-master/upload/20171020/1508482873.jpg\" title=\"1508482873.jpg\" alt=\"5ffcf35af80bcc7093e8423f9d39f987.jpg\"/></p>');
INSERT INTO `good` VALUES ('12', '6', ' 一加真皮钱包', 'a:3:{s:6:\"尺寸\";s:36:\"钱包90*110*18mm，卡包72*100*3mm\";s:6:\"重量\";s:21:\"钱包46g，卡包15g\";s:6:\"材质\";s:12:\"头层牛皮\";}', '', '<img  src=\"/OnePlus-master/upload/20171020/1508483812.png\"/>			', '&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171024/1508807880.jpg&quot; title=&quot;1508807880.jpg&quot; alt=&quot;2017-10-24_091731.jpg&quot;/&gt;&lt;/p&gt;');
INSERT INTO `good` VALUES ('13', '6', ' 一加旅行袋', 'a:3:{s:6:\"尺寸\";s:5:\"1060g\";s:6:\"重量\";s:6:\"帆布\";s:6:\"材质\";s:13:\"510*215*280mm\";}', '', '<img  src=\"/OnePlus-master/upload/20171023/1508724423.png\"/>	', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171023/1508724429.jpg&quot; title=&quot;1508724429.jpg&quot; alt=&quot;2a5c268a74d15fda84c34fdbd2765b3c.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('14', '6', '一加环保宝珠笔', 'a:3:{s:6:\"尺寸\";s:11:\"157*24*24mm\";s:6:\"重量\";s:5:\"34.8g\";s:6:\"材质\";s:0:\"\";}', '颜色', '<img  src=\"/OnePlus-master/upload/20171023/1508724765.png\"/>	', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171023/1508724772.jpg&quot; title=&quot;1508724772.jpg&quot; alt=&quot;5ffcf35af80bcc7093e8423f9d39f987.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('15', '6', '一加旅行双肩包', 'a:3:{s:6:\"尺寸\";s:13:\"330*135*460mm\";s:6:\"重量\";s:46:\"1150g （太空黑），1140g (莫兰迪灰）\";s:6:\"材质\";s:58:\"面料：100% 涤纶 ，PU涂层 。里布： 100% 尼龙 \";}', '颜色', '<img  src=\"/OnePlus-master/upload/20171023/1508725277.png\"/>	', '&lt;p&gt;										&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171023/1508725282.jpg&quot; title=&quot;1508725282.jpg&quot; alt=&quot;2017-10-23_102010.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;								&lt;/p&gt;');
INSERT INTO `good` VALUES ('16', '3', 'OnePlus 5 硅胶保护壳', 'a:3:{s:6:\"尺寸\";s:16:\"156.2*77.8*9.8mm\";s:6:\"重量\";s:3:\"27g\";s:6:\"材质\";s:11:\"硅胶 , PC\";}', '颜色', '<img  src=\"/OnePlus-master/upload/20171023/1508727067.png\"/>', '<p><img src=\"/OnePlus-master/upload/20171023/1508727076.jpg\" title=\"1508727076.jpg\" alt=\"2017-10-23_105000.jpg\"/></p>');
INSERT INTO `good` VALUES ('17', '4', ' 一加Type-C OTG数据线', 'a:4:{s:6:\"尺寸\";s:12:\"78*77*16.5mm\";s:6:\"重量\";s:6:\"24.68g\";s:6:\"材质\";s:3:\"TPE\";s:12:\"适配机型\";s:34:\"OnePlus 3 / OnePlus 3T / OnePlus 5\";}', '长度', '<img  src=\"/OnePlus-master/upload/20171024/1508806728.png\"/>', '<p><img src=\"/OnePlus-master/upload/20171024/1508806721.jpg\" title=\"1508806721.jpg\" alt=\"2017-10-24_085809.jpg\"/></p>');
INSERT INTO `good` VALUES ('18', '5', '学咖套装', 'a:0:{}', '', '<img  src=\"/OnePlus-master/upload/20171024/1508807338.jpg\"/>	', '&lt;p&gt;&lt;img src=&quot;/OnePlus-master/upload/20171024/1508807762.jpg&quot; title=&quot;1508807762.jpg&quot; alt=&quot;2017-10-24_091539.jpg&quot;/&gt;&lt;/p&gt;');
INSERT INTO `good` VALUES ('20', '4', '数据线A', 'a:4:{s:6:\"尺寸\";s:2:\"1M\";s:6:\"重量\";s:3:\"1KG\";s:6:\"材质\";s:6:\"木材\";s:12:\"适配机型\";s:0:\"\";}', '长度', '<img  src=\"/OnePlus-master/upload/20171026/1508987097.png\"/>', '<p><img src=\"/OnePlus-master/upload/20171026/1508987102.jpg\" title=\"1508987102.jpg\" alt=\"详情.jpg\"/></p>');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `skuInfo` varchar(1000) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `client_addr` varchar(100) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-下单成功 1-支付成功 2-商品出库 3-交易成功',
  `submit_time` int(100) DEFAULT NULL,
  `pay_time` varchar(100) DEFAULT NULL,
  `delivery_time` varchar(100) DEFAULT NULL,
  `finish_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('6', '19', '59f144abef3e094226', 'a:1:{i:0;a:2:{s:5:\"skuid\";s:2:\"30\";s:5:\"count\";s:1:\"2\";}}', 'BB', 'BB', '\n									BB								', '118.00', '0', '1508983979', null, null, null);
INSERT INTO `order` VALUES ('7', '19', '59f144d029bfe64938', 'a:1:{i:0;a:2:{s:5:\"skuid\";s:2:\"30\";s:5:\"count\";s:1:\"1\";}}', 'CC', 'CC', '\n									CC								', '59.00', '3', '1508984016', '1508985183', '1508985190', '1508985196');
INSERT INTO `order` VALUES ('8', '19', '59f1515106db576612', 'a:1:{i:0;a:2:{s:5:\"skuid\";s:2:\"35\";s:5:\"count\";s:1:\"1\";}}', 'CC', 'CC', '\n									CC								', '100.00', '3', '1508987217', '1508987228', '1508987234', '1508987239');
INSERT INTO `order` VALUES ('9', '15', '59f1a06f8fed841653', 'a:1:{i:0;a:2:{s:5:\"skuid\";s:2:\"29\";s:5:\"count\";s:1:\"2\";}}', 'dfgdf', 'gdgggdg', '\n									dfgdf								', '258.00', '0', '1509007471', null, null, null);

-- ----------------------------
-- Table structure for parameter
-- ----------------------------
DROP TABLE IF EXISTS `parameter`;
CREATE TABLE `parameter` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parameter
-- ----------------------------
INSERT INTO `parameter` VALUES ('3', '1', '尺寸');
INSERT INTO `parameter` VALUES ('4', '1', '重量');
INSERT INTO `parameter` VALUES ('5', '1', '材质');
INSERT INTO `parameter` VALUES ('6', '1', '操作系统');
INSERT INTO `parameter` VALUES ('7', '1', 'CPU');
INSERT INTO `parameter` VALUES ('8', '1', 'GPU');
INSERT INTO `parameter` VALUES ('9', '1', 'RAM');
INSERT INTO `parameter` VALUES ('10', '1', '存储');
INSERT INTO `parameter` VALUES ('11', '3', '尺寸');
INSERT INTO `parameter` VALUES ('12', '3', '重量');
INSERT INTO `parameter` VALUES ('13', '3', '材质');
INSERT INTO `parameter` VALUES ('18', '6', '尺寸');
INSERT INTO `parameter` VALUES ('19', '6', '重量');
INSERT INTO `parameter` VALUES ('20', '6', '材质');
INSERT INTO `parameter` VALUES ('21', '4', ' 尺寸');
INSERT INTO `parameter` VALUES ('22', '4', '重量');
INSERT INTO `parameter` VALUES ('23', '4', '材质');
INSERT INTO `parameter` VALUES ('24', '4', '适配机型');

-- ----------------------------
-- Table structure for sku
-- ----------------------------
DROP TABLE IF EXISTS `sku`;
CREATE TABLE `sku` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `gid` int(100) NOT NULL,
  `option_value` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `count` int(100) NOT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sku_ibfk_1` (`gid`),
  CONSTRAINT `sku_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sku
-- ----------------------------
INSERT INTO `sku` VALUES ('10', '7', '薄荷金 6GB+64GB', '2999.00', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508156678.png\"/>');
INSERT INTO `sku` VALUES ('11', '7', '月岩灰 8GB+128GB', '3499.00', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508156747.png\"/>');
INSERT INTO `sku` VALUES ('12', '7', '月岩灰 6GB+64GB', '2999.00', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508156779.png\"/>');
INSERT INTO `sku` VALUES ('13', '7', '星辰黑 8GB+128GB', '3499.00', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508156809.png\"/>');
INSERT INTO `sku` VALUES ('14', '8', 'a:2:{s:4:\"name\";s:6:\"红色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171016/1508157917.jpg\"/>\";}', '9.90', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508157906.png\"/>');
INSERT INTO `sku` VALUES ('15', '8', 'a:2:{s:4:\"name\";s:6:\"白色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171016/1508158104.jpg\"/>\";}', '9.90', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508158091.png\"/>');
INSERT INTO `sku` VALUES ('16', '9', '', '199.00', '111', '<img  src=\"/OnePlus-master/upload/20171016/1508158679.png\"/>');
INSERT INTO `sku` VALUES ('19', '11', '', '169.00', '111', '<img  src=\"/OnePlus-master/upload/20171020/1508483028.jpg\"/>');
INSERT INTO `sku` VALUES ('20', '12', '', '249.00', '111', '<img  src=\"/OnePlus-master/upload/20171020/1508483895.png\"/>');
INSERT INTO `sku` VALUES ('21', '13', '', '299.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508724511.png\"/>');
INSERT INTO `sku` VALUES ('22', '14', 'a:2:{s:4:\"name\";s:6:\"红色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508724848.jpg\"/>\";}', '19.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508724816.png\"/>');
INSERT INTO `sku` VALUES ('23', '14', 'a:2:{s:4:\"name\";s:6:\"白色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508724935.jpg\"/>\";}', '19.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508724926.png\"/>');
INSERT INTO `sku` VALUES ('24', '15', 'a:2:{s:4:\"name\";s:12:\"莫兰迪灰\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508725537.png\"/>\";}', '399.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508725328.png\"/>	');
INSERT INTO `sku` VALUES ('25', '15', 'a:2:{s:4:\"name\";s:9:\"太空黑\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508725566.jpg\"/>\";}', '399.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508725557.png\"/>');
INSERT INTO `sku` VALUES ('28', '16', 'a:2:{s:4:\"name\";s:6:\"红色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508727292.jpg\"/>\";}', '129.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508727284.png\"/>');
INSERT INTO `sku` VALUES ('29', '16', 'a:2:{s:4:\"name\";s:6:\"黑色\";s:3:\"img\";s:60:\"<img  src=\"/OnePlus-master/upload/20171023/1508727321.jpg\"/>\";}', '129.00', '111', '<img  src=\"/OnePlus-master/upload/20171023/1508727330.png\"/>');
INSERT INTO `sku` VALUES ('30', '17', '100cm', '59.00', '111', '<img  src=\"/OnePlus-master/upload/20171024/1508806841.png\"/>		');
INSERT INTO `sku` VALUES ('31', '17', '150cm', '79.00', '111', '<img  src=\"/OnePlus-master/upload/20171024/1508806877.png\"/>');
INSERT INTO `sku` VALUES ('32', '18', '', '389.00', '111', '<img  src=\"/OnePlus-master/upload/20171024/1508807377.jpg\"/>');
INSERT INTO `sku` VALUES ('35', '20', '100cm', '100.00', '100', '<img  src=\"/OnePlus-master/upload/20171026/1508987141.png\"/>');
INSERT INTO `sku` VALUES ('36', '20', '200cm', '200.00', '200', '<img  src=\"/OnePlus-master/upload/20171026/1508987182.png\"/>');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `thumbImg` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('15', 'test1', '123456', null);
INSERT INTO `user` VALUES ('19', 'test2', '123456', null);
