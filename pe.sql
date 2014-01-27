/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : pe

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-01-27 16:59:30
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `etsy_qty` int(4) NOT NULL,
  `etsy_shipping` text NOT NULL,
  `etsy_params` text NOT NULL,
  `linked` tinyint(1) unsigned NOT NULL,
  `pe_tao_id` int(11) NOT NULL,
  `tao_id` bigint(20) unsigned NOT NULL,
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
  `linked` tinyint(1) unsigned NOT NULL,
  `etsy_id` bigint(20) unsigned NOT NULL,
  `pe_etsy_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY  (`pe_tao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pe_tao
-- ----------------------------
INSERT INTO `pe_tao` VALUES ('181', '1', '0', '诚实的说谎人', '25209064941', '钢铁恐龙头骨T-REX金属台装饰 名片夹 特色', 'http://img02.taobaocdn.com/bao/uploaded/i2/19569035306280216/T1ZsOLXEXaXXXXXXXX_!!0-item_pic.jpg', '398.00', '4', 'a:3:{s:14:\"approve_status\";s:6:\"onsale\";s:3:\"cid\";i:50025555;s:5:\"props\";s:0:\"\";}', '0', '0', '0', '0');
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
