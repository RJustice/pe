/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : pe

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-02-13 17:26:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pe_currency`
-- ----------------------------
DROP TABLE IF EXISTS `pe_currency`;
CREATE TABLE `pe_currency` (
  `currency_code` char(7) NOT NULL,
  `value` float(16,6) NOT NULL,
  PRIMARY KEY  (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_currency
-- ----------------------------
INSERT INTO `pe_currency` VALUES ('USD/KRW', '1064.550049');
INSERT INTO `pe_currency` VALUES ('USD/VND', '21095.000000');
INSERT INTO `pe_currency` VALUES ('USD/BOB', '6.910000');
INSERT INTO `pe_currency` VALUES ('USD/MOP', '7.989150');
INSERT INTO `pe_currency` VALUES ('USD/BDT', '77.339996');
INSERT INTO `pe_currency` VALUES ('USD/MDL', '13.450000');
INSERT INTO `pe_currency` VALUES ('USD/VEF', '6.287700');
INSERT INTO `pe_currency` VALUES ('USD/GEL', '1.743250');
INSERT INTO `pe_currency` VALUES ('USD/ISK', '115.629997');
INSERT INTO `pe_currency` VALUES ('USD/BYR', '9695.000000');
INSERT INTO `pe_currency` VALUES ('USD/THB', '32.730000');
INSERT INTO `pe_currency` VALUES ('USD/MXV', '2.594423');
INSERT INTO `pe_currency` VALUES ('USD/TND', '1.593000');
INSERT INTO `pe_currency` VALUES ('USD/JMD', '107.269997');
INSERT INTO `pe_currency` VALUES ('USD/DKK', '5.474100');
INSERT INTO `pe_currency` VALUES ('USD/SRD', '3.287500');
INSERT INTO `pe_currency` VALUES ('USD/BWP', '9.041600');
INSERT INTO `pe_currency` VALUES ('USD/NOK', '6.128250');
INSERT INTO `pe_currency` VALUES ('USD/MUR', '30.680000');
INSERT INTO `pe_currency` VALUES ('USD/ZMK', '0.000000');
INSERT INTO `pe_currency` VALUES ('USD/AZN', '0.784300');
INSERT INTO `pe_currency` VALUES ('USD/INR', '61.959999');
INSERT INTO `pe_currency` VALUES ('USD/MGA', '2315.000000');
INSERT INTO `pe_currency` VALUES ('USD/CAD', '1.100785');
INSERT INTO `pe_currency` VALUES ('USD/XAF', '481.100891');
INSERT INTO `pe_currency` VALUES ('USD/LBP', '1505.500000');
INSERT INTO `pe_currency` VALUES ('USD/XDR', '0.650500');
INSERT INTO `pe_currency` VALUES ('USD/IDR', '12145.000000');
INSERT INTO `pe_currency` VALUES ('USD/IEP', '0.577634');
INSERT INTO `pe_currency` VALUES ('USD/AUD', '1.104118');
INSERT INTO `pe_currency` VALUES ('USD/MMK', '986.000000');
INSERT INTO `pe_currency` VALUES ('USD/LYD', '1.246800');
INSERT INTO `pe_currency` VALUES ('USD/ZAR', '10.968150');
INSERT INTO `pe_currency` VALUES ('USD/IQD', '1164.199951');
INSERT INTO `pe_currency` VALUES ('USD/XPF', '87.379997');
INSERT INTO `pe_currency` VALUES ('USD/TJS', '4.801200');
INSERT INTO `pe_currency` VALUES ('USD/CUP', '1.000000');
INSERT INTO `pe_currency` VALUES ('USD/UGX', '2470.000000');
INSERT INTO `pe_currency` VALUES ('USD/NGN', '164.199997');
INSERT INTO `pe_currency` VALUES ('USD/PGK', '2.563150');
INSERT INTO `pe_currency` VALUES ('USD/TOP', '1.881988');
INSERT INTO `pe_currency` VALUES ('USD/TMT', '2.850000');
INSERT INTO `pe_currency` VALUES ('USD/KES', '86.199997');
INSERT INTO `pe_currency` VALUES ('USD/CRC', '515.169983');
INSERT INTO `pe_currency` VALUES ('USD/MZN', '32.450001');
INSERT INTO `pe_currency` VALUES ('USD/SYP', '143.399994');
INSERT INTO `pe_currency` VALUES ('USD/ANG', '1.790000');
INSERT INTO `pe_currency` VALUES ('USD/ZMW', '5.640000');
INSERT INTO `pe_currency` VALUES ('USD/BRL', '2.402300');
INSERT INTO `pe_currency` VALUES ('USD/BSD', '1.000000');
INSERT INTO `pe_currency` VALUES ('USD/NIO', '25.754999');
INSERT INTO `pe_currency` VALUES ('USD/GNF', '7030.000000');
INSERT INTO `pe_currency` VALUES ('USD/BMD', '1.000000');
INSERT INTO `pe_currency` VALUES ('USD/SLL', '4340.000000');
INSERT INTO `pe_currency` VALUES ('USD/MKD', '45.215000');
INSERT INTO `pe_currency` VALUES ('USD/BIF', '1555.000000');
INSERT INTO `pe_currency` VALUES ('USD/LAK', '8025.500000');
INSERT INTO `pe_currency` VALUES ('USD/BHD', '0.377070');
INSERT INTO `pe_currency` VALUES ('USD/SHP', '0.607800');
INSERT INTO `pe_currency` VALUES ('USD/BGN', '1.440000');
INSERT INTO `pe_currency` VALUES ('USD/SGD', '1.264700');
INSERT INTO `pe_currency` VALUES ('USD/CNY', '6.061250');
INSERT INTO `pe_currency` VALUES ('USD/EUR', '0.733617');
INSERT INTO `pe_currency` VALUES ('USD/TTD', '6.410000');
INSERT INTO `pe_currency` VALUES ('USD/SCR', '12.150000');
INSERT INTO `pe_currency` VALUES ('USD/BBD', '2.000000');
INSERT INTO `pe_currency` VALUES ('USD/SBD', '7.271882');
INSERT INTO `pe_currency` VALUES ('USD/MAD', '8.244000');
INSERT INTO `pe_currency` VALUES ('USD/GTQ', '7.769500');
INSERT INTO `pe_currency` VALUES ('USD/MWK', '430.000000');
INSERT INTO `pe_currency` VALUES ('USD/PKR', '105.400002');
INSERT INTO `pe_currency` VALUES ('USD/PEN', '2.819000');
INSERT INTO `pe_currency` VALUES ('USD/AED', '3.673000');
INSERT INTO `pe_currency` VALUES ('USD/LVL', '0.508200');
INSERT INTO `pe_currency` VALUES ('USD/UAH', '8.615000');
INSERT INTO `pe_currency` VALUES ('USD/LRD', '85.500000');
INSERT INTO `pe_currency` VALUES ('USD/LSL', '10.955000');
INSERT INTO `pe_currency` VALUES ('USD/SEK', '6.442100');
INSERT INTO `pe_currency` VALUES ('USD/RON', '3.283800');
INSERT INTO `pe_currency` VALUES ('USD/XOF', '480.649994');
INSERT INTO `pe_currency` VALUES ('USD/COP', '2039.800049');
INSERT INTO `pe_currency` VALUES ('USD/CDF', '922.500000');
INSERT INTO `pe_currency` VALUES ('USD/USD', '1.000000');
INSERT INTO `pe_currency` VALUES ('USD/TZS', '1620.500000');
INSERT INTO `pe_currency` VALUES ('USD/GHS', '2.532500');
INSERT INTO `pe_currency` VALUES ('USD/NPR', '99.639999');
INSERT INTO `pe_currency` VALUES ('USD/ZWL', '322.355011');
INSERT INTO `pe_currency` VALUES ('USD/SOS', '1101.000000');
INSERT INTO `pe_currency` VALUES ('USD/DZD', '78.205002');
INSERT INTO `pe_currency` VALUES ('USD/FKP', '0.607800');
INSERT INTO `pe_currency` VALUES ('USD/LKR', '130.824997');
INSERT INTO `pe_currency` VALUES ('USD/JPY', '102.595001');
INSERT INTO `pe_currency` VALUES ('USD/CHF', '0.898735');
INSERT INTO `pe_currency` VALUES ('USD/KYD', '0.820000');
INSERT INTO `pe_currency` VALUES ('USD/CLP', '553.770020');
INSERT INTO `pe_currency` VALUES ('USD/IRR', '24900.000000');
INSERT INTO `pe_currency` VALUES ('USD/AFN', '56.830002');
INSERT INTO `pe_currency` VALUES ('USD/DJF', '179.100006');
INSERT INTO `pe_currency` VALUES ('USD/SVC', '8.747500');
INSERT INTO `pe_currency` VALUES ('USD/PLN', '3.060800');
INSERT INTO `pe_currency` VALUES ('USD/PYG', '4540.575195');
INSERT INTO `pe_currency` VALUES ('USD/ERN', '14.880000');
INSERT INTO `pe_currency` VALUES ('USD/ETB', '19.358500');
INSERT INTO `pe_currency` VALUES ('USD/ILS', '3.515800');
INSERT INTO `pe_currency` VALUES ('USD/TWD', '30.317499');
INSERT INTO `pe_currency` VALUES ('USD/KPW', '900.000000');
INSERT INTO `pe_currency` VALUES ('USD/GIP', '0.607800');
INSERT INTO `pe_currency` VALUES ('USD/BND', '1.265700');
INSERT INTO `pe_currency` VALUES ('USD/HNL', '19.799999');
INSERT INTO `pe_currency` VALUES ('USD/CZK', '20.173500');
INSERT INTO `pe_currency` VALUES ('USD/HUF', '227.425003');
INSERT INTO `pe_currency` VALUES ('USD/BZD', '1.990000');
INSERT INTO `pe_currency` VALUES ('USD/JOD', '0.708400');
INSERT INTO `pe_currency` VALUES ('USD/RWF', '679.000000');
INSERT INTO `pe_currency` VALUES ('USD/LTL', '2.528700');
INSERT INTO `pe_currency` VALUES ('USD/RUB', '34.768002');
INSERT INTO `pe_currency` VALUES ('USD/RSD', '84.720497');
INSERT INTO `pe_currency` VALUES ('USD/WST', '2.336221');
INSERT INTO `pe_currency` VALUES ('USD/PAB', '1.000000');
INSERT INTO `pe_currency` VALUES ('USD/NAD', '10.997000');
INSERT INTO `pe_currency` VALUES ('USD/DOP', '43.000000');
INSERT INTO `pe_currency` VALUES ('USD/ALL', '103.105003');
INSERT INTO `pe_currency` VALUES ('USD/HTG', '43.980999');
INSERT INTO `pe_currency` VALUES ('USD/AMD', '411.489990');
INSERT INTO `pe_currency` VALUES ('USD/KMF', '360.825714');
INSERT INTO `pe_currency` VALUES ('USD/MRO', '290.899994');
INSERT INTO `pe_currency` VALUES ('USD/HRK', '5.615350');
INSERT INTO `pe_currency` VALUES ('USD/KHR', '3980.000000');
INSERT INTO `pe_currency` VALUES ('USD/PHP', '44.980000');
INSERT INTO `pe_currency` VALUES ('USD/KWD', '0.282800');
INSERT INTO `pe_currency` VALUES ('USD/XCD', '2.700000');
INSERT INTO `pe_currency` VALUES ('USD/CNH', '6.041300');
INSERT INTO `pe_currency` VALUES ('USD/SDG', '5.682500');
INSERT INTO `pe_currency` VALUES ('USD/CLF', '0.023580');
INSERT INTO `pe_currency` VALUES ('USD/KZT', '184.750000');
INSERT INTO `pe_currency` VALUES ('USD/TRY', '2.191550');
INSERT INTO `pe_currency` VALUES ('USD/FJD', '1.869200');
INSERT INTO `pe_currency` VALUES ('USD/NZD', '1.198998');
INSERT INTO `pe_currency` VALUES ('USD/BAM', '1.437750');
INSERT INTO `pe_currency` VALUES ('USD/BTN', '62.270000');
INSERT INTO `pe_currency` VALUES ('USD/STD', '17965.000000');
INSERT INTO `pe_currency` VALUES ('USD/VUV', '96.300003');
INSERT INTO `pe_currency` VALUES ('USD/MVR', '15.360000');
INSERT INTO `pe_currency` VALUES ('USD/AOA', '97.609497');
INSERT INTO `pe_currency` VALUES ('USD/EGP', '6.962000');
INSERT INTO `pe_currency` VALUES ('USD/QAR', '3.641700');
INSERT INTO `pe_currency` VALUES ('USD/OMR', '0.384950');
INSERT INTO `pe_currency` VALUES ('USD/CVE', '79.870003');
INSERT INTO `pe_currency` VALUES ('USD/KGS', '51.113300');
INSERT INTO `pe_currency` VALUES ('USD/MXN', '13.298650');
INSERT INTO `pe_currency` VALUES ('USD/MYR', '3.321750');
INSERT INTO `pe_currency` VALUES ('USD/GYD', '205.699997');
INSERT INTO `pe_currency` VALUES ('USD/SZL', '11.040000');
INSERT INTO `pe_currency` VALUES ('USD/YER', '214.904999');
INSERT INTO `pe_currency` VALUES ('USD/SAR', '3.750400');
INSERT INTO `pe_currency` VALUES ('USD/UYU', '22.200001');
INSERT INTO `pe_currency` VALUES ('USD/GBP', '0.607918');
INSERT INTO `pe_currency` VALUES ('USD/UZS', '2202.199951');
INSERT INTO `pe_currency` VALUES ('USD/GMD', '38.500000');
INSERT INTO `pe_currency` VALUES ('USD/AWG', '1.789900');
INSERT INTO `pe_currency` VALUES ('USD/MNT', '1732.500000');
INSERT INTO `pe_currency` VALUES ('GOLD 1', '0.000777');
INSERT INTO `pe_currency` VALUES ('USD/HKD', '7.756200');
INSERT INTO `pe_currency` VALUES ('USD/ARS', '7.821650');

-- ----------------------------
-- Table structure for `pe_etsy`
-- ----------------------------
DROP TABLE IF EXISTS `pe_etsy`;
CREATE TABLE `pe_etsy` (
  `pe_etsy_id` int(11) unsigned NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `etsy_id` bigint(20) unsigned NOT NULL,
  `etsy_title` varchar(255) NOT NULL,
  `etsy_price` varchar(20) NOT NULL,
  `etsy_currency` char(3) NOT NULL,
  `cny_price` varchar(20) NOT NULL,
  `etsy_qty` int(4) NOT NULL,
  `etsy_img` varchar(255) NOT NULL,
  `etsy_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL default '0',
  `pe_tao_id` int(11) NOT NULL,
  `tao_id` bigint(20) unsigned NOT NULL,
  `tao_info` text NOT NULL,
  `state` tinyint(1) unsigned NOT NULL default '1',
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
  `tao_id` bigint(20) unsigned NOT NULL,
  `total_fee` varchar(20) NOT NULL,
  `buyer_nick` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
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
  `tao_storeid` bigint(20) unsigned NOT NULL default '0',
  `tao_nick` varchar(50) NOT NULL,
  `tao_id` bigint(20) unsigned NOT NULL,
  `tao_title` varchar(255) NOT NULL,
  `tao_img` varchar(255) NOT NULL default '',
  `tao_price` varchar(20) NOT NULL,
  `tao_qty` int(4) NOT NULL,
  `tao_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL default '0',
  `etsy_id` bigint(20) unsigned NOT NULL,
  `pe_etsy_id` int(11) NOT NULL,
  `etsy_info` text NOT NULL,
  `state` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`pe_tao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_tao
-- ----------------------------

-- ----------------------------
-- Table structure for `pe_update_history`
-- ----------------------------
DROP TABLE IF EXISTS `pe_update_history`;
CREATE TABLE `pe_update_history` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pe_tao_id` int(11) NOT NULL,
  `pe_etsy_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_update_history
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
  `band_params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_users
-- ----------------------------
INSERT INTO `pe_users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '0', 'a:2:{s:10:\"band_state\";a:1:{s:6:\"taobao\";b:1;}s:4:\"band\";a:1:{s:6:\"taobao\";a:7:{s:12:\"access_token\";s:55:\"6201f2104569b9303d0f70b47b072ZZ0091c0568390f72a34489569\";s:10:\"expires_in\";i:86400;s:13:\"refresh_token\";s:55:\"6202421b457a14596bbc016c56eecegb85007c71cceea9534489569\";s:13:\"re_expires_in\";i:44822;s:8:\"tao_nick\";s:18:\"诚实的说谎人\";s:7:\"tao_uid\";s:8:\"34489569\";s:10:\"createtime\";i:1392255191;}}}');
INSERT INTO `pe_users` VALUES ('2', 'sundae', '8e7fe2c69046798a68c9239b605b20b0', '岚呵呵', '1', '');
