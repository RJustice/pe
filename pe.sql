/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : pe

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-01-20 17:17:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pe_etsy`
-- ----------------------------
DROP TABLE IF EXISTS `pe_etsy`;
CREATE TABLE `pe_etsy` (
  `pe_etsy_id` int(11) unsigned NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `etsy_id` int(11) NOT NULL,
  `etsy_title` varchar(255) NOT NULL,
  `etsy_price` varchar(20) NOT NULL,
  `etsy_qty` int(4) NOT NULL,
  `etsy_shipping` text NOT NULL,
  `etsy_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL,
  `pe_tao_id` int(11) NOT NULL,
  `tao_id` int(11) NOT NULL,
  PRIMARY KEY  (`pe_etsy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_etsy
-- ----------------------------

-- ----------------------------
-- Table structure for `pe_order`
-- ----------------------------
DROP TABLE IF EXISTS `pe_order`;
CREATE TABLE `pe_order` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `tao_id` int(11) NOT NULL,
  `total_fee` varchar(20) NOT NULL,
  `buyer_nick` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `pe_tao_id` int(11) NOT NULL,
  `pe_etsy_id` int(11) NOT NULL,
  `shippinged` tinyint(1) unsigned NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_order
-- ----------------------------

-- ----------------------------
-- Table structure for `pe_shipping_history`
-- ----------------------------
DROP TABLE IF EXISTS `pe_shipping_history`;
CREATE TABLE `pe_shipping_history` (
  `id` int(11) NOT NULL,
  `pe_order_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_shipping_history
-- ----------------------------

-- ----------------------------
-- Table structure for `pe_tao`
-- ----------------------------
DROP TABLE IF EXISTS `pe_tao`;
CREATE TABLE `pe_tao` (
  `pe_tao_id` int(11) unsigned NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `tao_storeid` int(11) NOT NULL,
  `tao_id` int(11) NOT NULL,
  `tao_title` varchar(255) NOT NULL,
  `tao_price` varchar(20) NOT NULL,
  `tao_qty` int(4) NOT NULL,
  `tao_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL,
  `etsy_id` int(11) NOT NULL,
  `pe_etsy_id` int(11) NOT NULL,
  PRIMARY KEY  (`pe_tao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_tao
-- ----------------------------

-- ----------------------------
-- Table structure for `pe_users`
-- ----------------------------
DROP TABLE IF EXISTS `pe_users`;
CREATE TABLE `pe_users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state` tinyint(3) unsigned NOT NULL,
  `band` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_users
-- ----------------------------
