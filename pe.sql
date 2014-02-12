/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : pe

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-02-12 17:27:21
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
  `etsy_qty` int(4) NOT NULL,
  `etsy_img` varchar(255) NOT NULL,
  `etsy_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL default '0',
  `pe_tao_id` int(11) NOT NULL,
  `tao_id` bigint(20) unsigned NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`pe_etsy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_etsy
-- ----------------------------
INSERT INTO `pe_etsy` VALUES ('2', '1', '124870302', 'Poppy Flower Studs | sterling silver poppy flower earrings | simple studs, modern studs, flower studs, dutch, holland, flowers, garden, eco', '52.00', 'AUD', '5', 'https://img0.etsystatic.com/034/0/5195288/il_75x75.531720482_bz75.jpg', 'a:2:{s:6:\"images\";a:5:{i:0;a:18:{s:16:\"listing_image_id\";i:531720482;s:8:\"hex_code\";s:6:\"DBCDC1\";s:3:\"red\";i:219;s:5:\"green\";i:205;s:4:\"blue\";i:193;s:3:\"hue\";i:28;s:10:\"saturation\";i:11;s:10:\"brightness\";i:85;s:18:\"is_black_and_white\";b:0;s:12:\"creation_tsz\";i:1385525677;s:10:\"listing_id\";i:124870302;s:4:\"rank\";i:1;s:9:\"url_75x75\";s:69:\"https://img0.etsystatic.com/034/0/5195288/il_75x75.531720482_bz75.jpg\";s:11:\"url_170x135\";s:71:\"https://img0.etsystatic.com/034/0/5195288/il_170x135.531720482_bz75.jpg\";s:9:\"url_570xN\";s:69:\"https://img0.etsystatic.com/034/0/5195288/il_570xN.531720482_bz75.jpg\";s:13:\"url_fullxfull\";s:73:\"https://img0.etsystatic.com/034/0/5195288/il_fullxfull.531720482_bz75.jpg\";s:11:\"full_height\";i:570;s:10:\"full_width\";i:570;}i:1;a:18:{s:16:\"listing_image_id\";i:531806263;s:8:\"hex_code\";s:6:\"D0B29E\";s:3:\"red\";i:208;s:5:\"green\";i:178;s:4:\"blue\";i:158;s:3:\"hue\";i:24;s:10:\"saturation\";i:24;s:10:\"brightness\";i:81;s:18:\"is_black_and_white\";b:0;s:12:\"creation_tsz\";i:1385525677;s:10:\"listing_id\";i:124870302;s:4:\"rank\";i:2;s:9:\"url_75x75\";s:69:\"https://img1.etsystatic.com/028/0/5195288/il_75x75.531806263_i09d.jpg\";s:11:\"url_170x135\";s:71:\"https://img1.etsystatic.com/028/0/5195288/il_170x135.531806263_i09d.jpg\";s:9:\"url_570xN\";s:69:\"https://img1.etsystatic.com/028/0/5195288/il_570xN.531806263_i09d.jpg\";s:13:\"url_fullxfull\";s:73:\"https://img1.etsystatic.com/028/0/5195288/il_fullxfull.531806263_i09d.jpg\";s:11:\"full_height\";i:570;s:10:\"full_width\";i:570;}i:2;a:18:{s:16:\"listing_image_id\";i:531806387;s:8:\"hex_code\";s:6:\"DDDDDA\";s:3:\"red\";i:221;s:5:\"green\";i:221;s:4:\"blue\";i:218;s:3:\"hue\";i:60;s:10:\"saturation\";i:1;s:10:\"brightness\";i:86;s:18:\"is_black_and_white\";b:0;s:12:\"creation_tsz\";i:1385525677;s:10:\"listing_id\";i:124870302;s:4:\"rank\";i:3;s:9:\"url_75x75\";s:69:\"https://img1.etsystatic.com/034/0/5195288/il_75x75.531806387_mfnl.jpg\";s:11:\"url_170x135\";s:71:\"https://img1.etsystatic.com/034/0/5195288/il_170x135.531806387_mfnl.jpg\";s:9:\"url_570xN\";s:69:\"https://img1.etsystatic.com/034/0/5195288/il_570xN.531806387_mfnl.jpg\";s:13:\"url_fullxfull\";s:73:\"https://img1.etsystatic.com/034/0/5195288/il_fullxfull.531806387_mfnl.jpg\";s:11:\"full_height\";i:570;s:10:\"full_width\";i:570;}i:3;a:18:{s:16:\"listing_image_id\";i:531806279;s:8:\"hex_code\";s:6:\"E5E4DB\";s:3:\"red\";i:229;s:5:\"green\";i:228;s:4:\"blue\";i:219;s:3:\"hue\";i:54;s:10:\"saturation\";i:4;s:10:\"brightness\";i:89;s:18:\"is_black_and_white\";b:0;s:12:\"creation_tsz\";i:1385525677;s:10:\"listing_id\";i:124870302;s:4:\"rank\";i:4;s:9:\"url_75x75\";s:69:\"https://img1.etsystatic.com/036/0/5195288/il_75x75.531806279_7b8a.jpg\";s:11:\"url_170x135\";s:71:\"https://img1.etsystatic.com/036/0/5195288/il_170x135.531806279_7b8a.jpg\";s:9:\"url_570xN\";s:69:\"https://img1.etsystatic.com/036/0/5195288/il_570xN.531806279_7b8a.jpg\";s:13:\"url_fullxfull\";s:73:\"https://img1.etsystatic.com/036/0/5195288/il_fullxfull.531806279_7b8a.jpg\";s:11:\"full_height\";i:570;s:10:\"full_width\";i:570;}i:4;a:18:{s:16:\"listing_image_id\";i:531720496;s:8:\"hex_code\";s:6:\"DBC3A5\";s:3:\"red\";i:219;s:5:\"green\";i:195;s:4:\"blue\";i:165;s:3:\"hue\";i:33;s:10:\"saturation\";i:24;s:10:\"brightness\";i:85;s:18:\"is_black_and_white\";b:0;s:12:\"creation_tsz\";i:1385525677;s:10:\"listing_id\";i:124870302;s:4:\"rank\";i:5;s:9:\"url_75x75\";s:69:\"https://img0.etsystatic.com/041/0/5195288/il_75x75.531720496_b6fa.jpg\";s:11:\"url_170x135\";s:71:\"https://img0.etsystatic.com/041/0/5195288/il_170x135.531720496_b6fa.jpg\";s:9:\"url_570xN\";s:69:\"https://img0.etsystatic.com/041/0/5195288/il_570xN.531720496_b6fa.jpg\";s:13:\"url_fullxfull\";s:73:\"https://img0.etsystatic.com/041/0/5195288/il_fullxfull.531720496_b6fa.jpg\";s:11:\"full_height\";i:570;s:10:\"full_width\";i:570;}}s:8:\"shipping\";a:2:{i:0;a:10:{s:16:\"shipping_info_id\";i:2035252495;s:17:\"origin_country_id\";i:61;s:22:\"destination_country_id\";N;s:13:\"currency_code\";s:3:\"AUD\";s:12:\"primary_cost\";s:4:\"4.00\";s:14:\"secondary_cost\";s:4:\"0.00\";s:10:\"listing_id\";i:124870302;s:9:\"region_id\";N;s:19:\"origin_country_name\";s:9:\"Australia\";s:24:\"destination_country_name\";s:15:\"Everywhere Else\";}i:1;a:10:{s:16:\"shipping_info_id\";i:2035252493;s:17:\"origin_country_id\";i:61;s:22:\"destination_country_id\";i:61;s:13:\"currency_code\";s:3:\"AUD\";s:12:\"primary_cost\";s:4:\"4.50\";s:14:\"secondary_cost\";s:4:\"0.00\";s:10:\"listing_id\";i:124870302;s:9:\"region_id\";N;s:19:\"origin_country_name\";s:9:\"Australia\";s:24:\"destination_country_name\";s:9:\"Australia\";}}}', '1', '181', '25209064941', '0');

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
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY  (`pe_tao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_tao
-- ----------------------------
INSERT INTO `pe_tao` VALUES ('181', '1', '0', '诚实的说谎人', '25209064941', '钢铁恐龙头骨T-REX金属台装饰 名片夹 特色', 'http://img02.taobaocdn.com/bao/uploaded/i2/19569035306280216/T1ZsOLXEXaXXXXXXXX_!!0-item_pic.jpg', '398.00', '4', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025555;s:5:\"props\";s:0:\"\";}', '1', '124870302', '2', '0');
INSERT INTO `pe_tao` VALUES ('182', '1', '0', '诚实的说谎人', '25165308518', 'iPhone手机壳 木质设计 塑胶材质 黑白色 iphone4/4s iphone5', 'http://img02.taobaocdn.com/bao/uploaded/i2/19569023324047142/T1eUOKXqNXXXXXXXXX_!!0-item_pic.jpg', '168.00', '20', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025033;s:5:\"props\";s:108:\"14213824:6064244;1627207:107121;1627207:28324;1627207:28341;1627207:28320;14213825:109098;14213826:122727384\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('183', '1', '0', '诚实的说谎人', '25060788451', 'iPhone 手工壳 旋转木马 iPhone case handmade merry-go-round', 'http://img01.taobaocdn.com/bao/uploaded/i1/19569035111224289/T1F61EXwdeXXXXXXXX_!!0-item_pic.jpg', '208.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025033;s:5:\"props\";s:18:\"14213826:122727384\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('184', '1', '0', '诚实的说谎人', '25060744682', '仿古真皮皮包 纯手工 MacBook 15&quot;试用', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569022987362138/T1_MaGXqFaXXXXXXXX_!!0-item_pic.jpg', '862.00', '10', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50012010;s:5:\"props\";s:93:\"1627978:3271245;19332273:35735958;20692:28397;14171089:3880992;21541:104704;1632501:259842279\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('185', '1', '0', '诚实的说谎人', '20668771485', '动力滑翔机 SPINFLYER WING 桌面小装饰', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569023576268631/T1TLuPXCFaXXXXXXXX_!!0-item_pic.jpg', '398.00', '10', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50015507;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('186', '1', '0', '诚实的说谎人', '20605591529', '女士手表 皮革表带 艺术 真皮包裹手链手表 铆钉复古风格', 'http://img03.taobaocdn.com/bao/uploaded/i3/19569023109345680/T1LW9LXw4cXXXXXXXX_!!0-item_pic.jpg', '246.00', '15', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50013869;s:5:\"props\";s:137:\"20088:29232;1627207:107121;1627207:132069;1627207:90554;1627207:28338;1627207:28335;3139478:20533;31521:21456;21541:42426;1625880:3216310\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('187', '1', '0', '诚实的说谎人', '20605403842', '复古 - 斯温莱因订书机 - 第13号', 'http://img03.taobaocdn.com/bao/uploaded/i3/19569023108981770/T1NOmKXDXdXXXXXXXX_!!0-item_pic.jpg', '405.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025555;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('188', '1', '0', '诚实的说谎人', '18501325919', '招财猫 猫咪公仔 沃尔特&middot;博塞风格', 'http://img01.taobaocdn.com/bao/uploaded/i1/19569023406389120/T1nQmLXudbXXXXXXXX_!!0-item_pic.jpg', '387.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50020846;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('189', '1', '0', '诚实的说谎人', '18501273069', '部落几何挂件 以色列 独一无二', 'http://img01.taobaocdn.com/bao/uploaded/i1/19569025309391850/T1YAyJXuFeXXXXXXXX_!!0-item_pic.jpg', '280.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50013865;s:5:\"props\";s:121:\"20088:21066;3194675:29232;34634:27370;3139473:21958;3139478:20533;3139489:3275695;31521:21456;1625880:3216309;21541:42426\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('190', '1', '0', '诚实的说谎人', '18485666131', '小博特好友 小机器人 书桌配件 独一无二', 'http://img03.taobaocdn.com/bao/uploaded/i3/19569035305816070/T1pcmMXChXXXXXXXXX_!!0-item_pic.jpg', '187.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025555;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('191', '1', '0', '诚实的说谎人', '18485606875', '复古铜铃 仿古书桌配件', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569023232910434/T1bJ1xXwRjXXXXXXXX_!!0-item_pic.jpg', '250.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50020846;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('192', '1', '0', '诚实的说谎人', '18480149919', 'iPhone手机壳 复古 Life is a story 黑白色 iphone4/4s iphone5', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569023162274429/T1C0eJXAXbXXXXXXXX_!!0-item_pic.jpg', '168.00', '20', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025033;s:5:\"props\";s:108:\"14213824:6064244;1627207:107121;1627207:28324;1627207:28341;1627207:28320;14213825:109098;14213826:122727384\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('193', '1', '0', '诚实的说谎人', '18464198336', 'iPhone手机壳 独特的木设计 黑白色 iphone4/4s iphone5', 'http://img01.taobaocdn.com/bao/uploaded/i1/19569025239215502/T191uJXB4cXXXXXXXX_!!0-item_pic.jpg', '168.00', '20', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025033;s:5:\"props\";s:108:\"14213824:6064244;1627207:107121;1627207:28324;1627207:28341;1627207:28320;14213825:109098;14213826:122727384\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('194', '1', '0', '诚实的说谎人', '18443433621', '海外代沟 水晶松果 耳环 完美呈现', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569023208926614/T1wRqFXqteXXXXXXXX_!!0-item_pic.jpg', '437.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50014238;s:5:\"props\";s:38:\"20088:21066;1627207:107121;21541:42665\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('195', '1', '0', '诚实的说谎人', '18443369991', '珊瑚礁贝壳项链 秀出你的魅力 纯手工', 'http://img01.taobaocdn.com/bao/uploaded/i1/19569023200323346/T1NISIXrpXXXXXXXXX_!!0-item_pic.jpg', '568.90', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50013868;s:5:\"props\";s:108:\"20088:29232;34634:29930;3139478:20533;3139489:3275695;31521:21456;1627207:107121;21541:45689;1625880:3216309\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('196', '1', '0', '诚实的说谎人', '18381098726', '天然紫水晶项链 手工珠串 黄金链 Raw Amethyst Necklace', 'http://img03.taobaocdn.com/bao/uploaded/i3/19569023046810677/T1NGyEXqXaXXXXXXXX_!!0-item_pic.jpg', '658.00', '1', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50013865;s:5:\"props\";s:49:\"20088:21073;20089:21080;1627207:80882;21541:45689\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('197', '1', '0', '诚实的说谎人', '18370325458', '纯银小提琴戒指 Steampunk Violin Ring-Sterling Silver', 'http://img02.taobaocdn.com/bao/uploaded/i2/19569035109872093/T1HfeEXq4eXXXXXXXX_!!0-item_pic.jpg', '198.90', '2', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50013868;s:5:\"props\";s:150:\"20088:21062;34631:3481461;34635:132553;34634:29931;3139478:47698;3139489:3275695;20087:21055;31521:21456;21541:38486;1625880:3216309;1632501:256508961\";}', '0', '0', '0', '0');
INSERT INTO `pe_tao` VALUES ('198', '1', '0', '诚实的说谎人', '18355734391', '皮革的ipad包  Leather ipad bag case', 'http://img04.taobaocdn.com/bao/uploaded/i4/19569023148479208/T1aqusXzxjXXXXXXXX_!!0-item_pic.jpg', '509.00', '3', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50012010;s:5:\"props\";s:321:\"1627978:3271245;19332273:24751375;20692:28397;14171089:3880992;1626247:11031105;1627937:3270272;1627937:3270275;33219:43747;1627207:107121;2040797:21528;1627953:21959;21541:104704;31521:21456;1626655:20213;14067173:109101;1632501:256594412;1626905:3436264;1626249:11033520;1626248:3221908;17137233:28355;3728514:176720536\";}', '0', '0', '0', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_users
-- ----------------------------
INSERT INTO `pe_users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '0', 'a:2:{s:10:\"band_state\";a:1:{s:6:\"taobao\";b:1;}s:4:\"band\";a:1:{s:6:\"taobao\";a:6:{s:12:\"access_token\";s:55:\"62011093637cc233egi930685d8bbf457795b8895a53d6534489569\";s:10:\"expires_in\";i:86400;s:13:\"refresh_token\";s:55:\"6200709bc7abef720ZZ3ea670f7bef878c7e7668a8bf90634489569\";s:13:\"re_expires_in\";i:10379;s:8:\"tao_nick\";s:18:\"诚实的说谎人\";s:7:\"tao_uid\";s:8:\"34489569\";}}}');
