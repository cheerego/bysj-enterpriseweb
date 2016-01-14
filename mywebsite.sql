/*
Navicat MySQL Data Transfer

Source Server         : 阿里云
Source Server Version : 50542
Source Host           : 115.28.155.116:3306
Source Database       : mywebsite

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2016-01-11 16:15:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `telphone` varchar(100) DEFAULT NULL,
  `mobilephone` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '江商信息技术有限公司', '110', '111asd', '湖北武汉江夏区', '430000', '41974873@qq.com');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('0', 'admin', 'admin');

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('1', 'das asd ', 'asda ads', 'asdasdas', 'dasdaddas', '2016-01-05 17:51:19');
INSERT INTO `feedback` VALUES ('2', 'aaaaaa', 'ghfghfgh', 'hhkkjhkj', 'ghgjgjgjjh', '2016-01-06 22:05:37');
INSERT INTO `feedback` VALUES ('3', 'thsrhts', 'dfgsdfgsd', 'fgsdgfsdf', 'gsdfgsdfgsdfgsdfgsdfg', '2016-01-07 16:28:08');

-- ----------------------------
-- Table structure for jianjie
-- ----------------------------
DROP TABLE IF EXISTS `jianjie`;
CREATE TABLE `jianjie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jianjie
-- ----------------------------
INSERT INTO `jianjie` VALUES ('1', '<p><img src=\"http://115.28.155.116/MyWebSite/upload/20160107/14521553857997.jpg\" _src=\"http://115.28.155.116/MyWebSite/upload/20160107/14521553857997.jpg\"/></p>');

-- ----------------------------
-- Table structure for jianjie_dashi
-- ----------------------------
DROP TABLE IF EXISTS `jianjie_dashi`;
CREATE TABLE `jianjie_dashi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jianjie_dashi
-- ----------------------------
INSERT INTO `jianjie_dashi` VALUES ('1', '<img src=\"http://localhost/MyWebSite/upload/20160101/14516264866813.png\" _src=\"http://localhost/MyWebSite/upload/20160101/14516264866813.png\"/>asdasd<img src=\"http://115.28.155.116/MyWebSite/upload/20160105/14519980208634.png\" _src=\"http://115.28.155.116/MyWebSite/upload/20160105/14519980208634.png\"/>');

-- ----------------------------
-- Table structure for jianjie_zhanlue
-- ----------------------------
DROP TABLE IF EXISTS `jianjie_zhanlue`;
CREATE TABLE `jianjie_zhanlue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jianjie_zhanlue
-- ----------------------------
INSERT INTO `jianjie_zhanlue` VALUES ('1', '<p>对的 &nbsp;说的好</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"white-space: normal;\">对的 &nbsp;说的好</span></p><p><span style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"white-space: normal;\">对的 &nbsp;说的好</span></span></p>');

-- ----------------------------
-- Table structure for jianjie_zhici
-- ----------------------------
DROP TABLE IF EXISTS `jianjie_zhici`;
CREATE TABLE `jianjie_zhici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jianjie_zhici
-- ----------------------------
INSERT INTO `jianjie_zhici` VALUES ('1', '<p>enen</p><p>嘿嘿</p><p>哈哈</p><p>哦哦呵呵</p>');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `author` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk:news-type=>news_type=?>id` (`type`),
  CONSTRAINT `fk:news-type=>news_type=?>id` FOREIGN KEY (`type`) REFERENCES `news_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'enenqweqw', '<p>&nbsp; &nbsp; &nbsp; asdasdsa</p>', '管理员', '2016-01-01 16:13:14', '1');
INSERT INTO `news` VALUES ('3', '377777777', '3', '3', '2016-01-01 17:11:40', '2');
INSERT INTO `news` VALUES ('4', '3555555555', '3', '3', '2016-01-01 17:11:53', '2');
INSERT INTO `news` VALUES ('6', '666665', '6', '6', '2016-01-01 17:12:09', '2');
INSERT INTO `news` VALUES ('7', '766666666666', '7', '7', '2016-01-01 17:12:12', '1');
INSERT INTO `news` VALUES ('8', '855555555555555555555', '8', '8', '2016-01-01 17:12:15', '2');

-- ----------------------------
-- Table structure for news_type
-- ----------------------------
DROP TABLE IF EXISTS `news_type`;
CREATE TABLE `news_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_type
-- ----------------------------
INSERT INTO `news_type` VALUES ('1', '媒体新闻');
INSERT INTO `news_type` VALUES ('2', '项目新闻');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contente` text,
  `contenti` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img90` varchar(255) NOT NULL,
  `img120` varchar(255) NOT NULL,
  `img150` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('6', '112313', '222222', '33333333', '<img src=/MyWebSite/upload/project/2016-01-05//568b68ad16652.png border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68ad16652.png  style=\"height: 90px;\" border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68ad16652.png style=\"height: 120px;\" border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68ad16652.png style=\"height: 150px;\" border=\"0\"/>');
INSERT INTO `project` VALUES ('7', '1233333333', '122222222222222', '123123123123', '<img src=/MyWebSite/upload/project/2016-01-05//568b68b52ed7e.png border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68b52ed7e.png  style=\"height: 90px;\" border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68b52ed7e.png style=\"height: 120px;\" border=\"0\"/>', '<img src=/MyWebSite/upload/project/2016-01-05//568b68b52ed7e.png style=\"height: 150px;\" border=\"0\"/>');

-- ----------------------------
-- Table structure for rongyu
-- ----------------------------
DROP TABLE IF EXISTS `rongyu`;
CREATE TABLE `rongyu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rongyu
-- ----------------------------
INSERT INTO `rongyu` VALUES ('1', '哈哈', '<img src=/MyWebSite/upload/rongyu/2016-01-04//568a2616ec1fb.png alt=\'sda\'/>');
INSERT INTO `rongyu` VALUES ('2', '1', '<img src=/MyWebSite/upload/rongyu/2016-01-04//568a2d69a1111.png  style=\"height: 90px;\" border=\"0\"/>');
INSERT INTO `rongyu` VALUES ('3', '2', '<img src=/MyWebSite/upload/rongyu/2016-01-04//568a2d6f46868.png  style=\"height: 90px;\" border=\"0\"/>');
INSERT INTO `rongyu` VALUES ('4', 'asdasd ', '<img src=/MyWebSite/upload/rongyu/2016-01-05//568b8bff01df3.png  style=\"height: 90px;\" border=\"0\"/>');
