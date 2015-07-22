/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2015-01-06 09:10:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Jumsuit + Set Bộ', '0', '0', '', '', '', '0', 'jumsuit-set-bo', '0000-00-00 00:00:00', '2014-12-19 14:13:32');
INSERT INTO `categories` VALUES ('2', 'Đầm - Maxi', '0', '0', '', '', '', '0', 'dam-maxi', '0000-00-00 00:00:00', '2014-12-19 14:13:50');
INSERT INTO `categories` VALUES ('4', 'Chân Váy', '0', '0', '', '', '', '0', 'chan-vay', '0000-00-00 00:00:00', '2014-12-19 14:14:05');
INSERT INTO `categories` VALUES ('6', 'Áo Khoác - Áo Vest', '0', '0', '', '', '', '0', 'ao-khoac-ao-vest', '0000-00-00 00:00:00', '2014-12-19 14:14:19');
INSERT INTO `categories` VALUES ('10', 'Áo Sơ Mi', '0', '0', '', '', '', '0', 'ao-so-mi', '0000-00-00 00:00:00', '2014-12-19 14:14:57');
INSERT INTO `categories` VALUES ('12', 'Áo Thun Nữ', '0', '0', '', '', '', '0', 'ao-thun-nu', '0000-00-00 00:00:00', '2014-12-19 14:15:54');
INSERT INTO `categories` VALUES ('14', 'Quần Short Xì Teen', '0', '0', '', '', '', '0', 'quan-short-xi-teen', '0000-00-00 00:00:00', '2014-12-19 14:15:18');
INSERT INTO `categories` VALUES ('16', 'Quần Dài', '0', '0', '', '', '', '0', 'quan-dai', '0000-00-00 00:00:00', '2014-12-19 14:15:40');
INSERT INTO `categories` VALUES ('24', 'Cặp đôi nam nữ (couple)', '1', '1', 'Cặp đôi nam nữ (couple)', 'Cặp đôi nam nữ (couple)', 'Cặp đôi nam nữ (couple)', '1', 'cap-doi-nam-nu-couple', '2014-12-19 14:05:30', '2014-12-19 14:05:30');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'superadmin', '{\"_superadmin\":1}', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `groups` VALUES ('2', 'editor', '{\"_user-editor\":1,\"_group-editor\":1}', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `groups` VALUES ('3', 'base admin', '{\"_user-editor\":1}', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_manual` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(10) unsigned NOT NULL,
  `display_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `same_window` tinyint(1) NOT NULL DEFAULT '1',
  `show_image` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'published',
  `parent` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menus_category_index` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('41', 'Trang chủ', 'admin-top-menu-home', '/', null, '', '11', '', '1', '1', 'published', '0', '0', 'public', null, '', '', '2014-09-14 05:24:36', '2014-09-14 08:09:39');
INSERT INTO `menus` VALUES ('51', 'Giới thiệu', 'about', 'pages/staff', null, '', '11', '', '1', '1', 'published', '0', '0', 'public', null, '', '', '2014-09-17 15:26:44', '2014-09-17 15:26:44');

-- ----------------------------
-- Table structure for `menu_categories`
-- ----------------------------
DROP TABLE IF EXISTS `menu_categories`;
CREATE TABLE `menu_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_categories
-- ----------------------------
INSERT INTO `menu_categories` VALUES ('3', 'Admin Top Menu', 'admin-top-menu', '', '2014-03-21 16:29:15', '2014-03-21 16:29:15');
INSERT INTO `menu_categories` VALUES ('4', 'Admin Main Menu', 'admin-main-menu', '', '2014-03-22 02:58:49', '2014-03-22 02:58:49');
INSERT INTO `menu_categories` VALUES ('11', 'Public ', 'public-top-menu', '', '2014-09-14 08:09:10', '2014-09-14 08:09:10');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_12_12_192937_create_shopinfos_table', '1');
INSERT INTO `migrations` VALUES ('2014_02_19_095545_create_users_table', '2');
INSERT INTO `migrations` VALUES ('2014_02_19_095623_create_user_groups_table', '2');
INSERT INTO `migrations` VALUES ('2014_02_19_095637_create_groups_table', '2');
INSERT INTO `migrations` VALUES ('2014_02_19_095645_create_user_throttle_table', '2');
INSERT INTO `migrations` VALUES ('2014_02_19_160516_create_permission_table', '2');
INSERT INTO `migrations` VALUES ('2014_02_26_165011_create_user_profile_table', '2');
INSERT INTO `migrations` VALUES ('2014_05_06_122145_create_profile_field_types', '2');
INSERT INTO `migrations` VALUES ('2014_05_06_122155_create_profile_field', '2');
INSERT INTO `migrations` VALUES ('2014_12_03_082908_create_categories_table', '3');
INSERT INTO `migrations` VALUES ('2014_12_13_172545_create_products_table', '4');
INSERT INTO `migrations` VALUES ('2014_12_17_165517_create_categories_table', '5');
INSERT INTO `migrations` VALUES ('2014_12_27_211736_create_orders_table', '6');
INSERT INTO `migrations` VALUES ('2014_12_31_201926_create_options_table', '6');
INSERT INTO `migrations` VALUES ('2014_12_31_201926_create_optionvalues_table', '6');
INSERT INTO `migrations` VALUES ('2014_12_31_201926_create_productoptions_table', '6');
INSERT INTO `migrations` VALUES ('2015_01_03_164436_create_orderproducts_table', '7');
INSERT INTO `migrations` VALUES ('2015_01_03_173845_create_orderoptions_table', '8');

-- ----------------------------
-- Table structure for `options`
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('1', 'Size', '2015-01-01 21:26:09', '2015-01-01 21:26:09');
INSERT INTO `options` VALUES ('2', 'Màu sắc', '2015-01-01 21:26:23', '2015-01-01 21:26:23');

-- ----------------------------
-- Table structure for `optionvalues`
-- ----------------------------
DROP TABLE IF EXISTS `optionvalues`;
CREATE TABLE `optionvalues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of optionvalues
-- ----------------------------
INSERT INTO `optionvalues` VALUES ('1', '1', 'Xanh', '2015-01-01 21:38:50', '2015-01-01 21:38:50');
INSERT INTO `optionvalues` VALUES ('2', '1', 'Do', '2015-01-01 21:39:03', '2015-01-01 21:39:03');
INSERT INTO `optionvalues` VALUES ('3', '2', 'M', '2015-01-01 21:39:13', '2015-01-01 21:39:13');
INSERT INTO `optionvalues` VALUES ('4', '2', 'S', '2015-01-01 21:39:23', '2015-01-01 21:39:23');

-- ----------------------------
-- Table structure for `orderoptions`
-- ----------------------------
DROP TABLE IF EXISTS `orderoptions`;
CREATE TABLE `orderoptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `orderproduct_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `optionvalue_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orderoptions
-- ----------------------------

-- ----------------------------
-- Table structure for `orderproducts`
-- ----------------------------
DROP TABLE IF EXISTS `orderproducts`;
CREATE TABLE `orderproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `total` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `options` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orderproducts
-- ----------------------------
INSERT INTO `orderproducts` VALUES ('1', '1', '11', 'test test test', '1', '2134.00', '2134.00', '2015-01-03 23:36:33', '2015-01-03 23:36:33', '[\"Xanh\",\"M\"]', '86899235238_02-720x720.jpg', '12312332');
INSERT INTO `orderproducts` VALUES ('2', '2', '1', '123123', '1', '123.00', '123.00', '2015-01-03 23:51:24', '2015-01-03 23:51:24', '[]', 'model7.jpg', '123');
INSERT INTO `orderproducts` VALUES ('3', '2', '11', 'test test test', '1', '2134.00', '2134.00', '2015-01-03 23:51:24', '2015-01-03 23:51:24', '[\"Xanh\",\"M\"]', '86899235238_02-720x720.jpg', '12312332');
INSERT INTO `orderproducts` VALUES ('4', '2', '9', '324234234', '1', '23423.00', '23423.00', '2015-01-03 23:51:24', '2015-01-03 23:51:24', '[]', 'model7.jpg', '34023');
INSERT INTO `orderproducts` VALUES ('5', '3', '10', 'tai dang test nhe', '1', '213.00', '213.00', '2015-01-04 14:56:37', '2015-01-04 14:56:37', '[\"Xanh\",\"M\"]', 'medium-7dd2561fdff34abc91b6b2354e82f62c-650.jpg', 'A320');
INSERT INTO `orderproducts` VALUES ('6', '4', '9', '324234234', '1', '1000000.00', '1000000.00', '2015-01-06 01:51:19', '2015-01-06 01:51:19', '[]', 'model7.jpg', '34023');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` float(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1', null, '2134.00', '1', 'Nguyen Phu Tai', null, '0914041020', '123', '123', '2015-01-03 23:36:33', '2015-01-03 23:36:33');
INSERT INTO `orders` VALUES ('2', '3', null, '25680.00', '1', '123123', null, '1231232', '13123', '21312321321312 12 3123 123 123 123  123 123 23', '2015-01-03 23:51:24', '2015-01-03 23:51:24');
INSERT INTO `orders` VALUES ('3', '1', null, '213.00', '1', '4', null, '3242', '34234', '2342', '2015-01-04 14:56:37', '2015-01-04 14:56:37');
INSERT INTO `orders` VALUES ('4', '1', '4', '1000000.00', '1', 'Nguyễn Phú Tài', null, '12321', '3123213@a.net', '123', '2015-01-06 01:51:19', '2015-01-06 01:51:19');

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', 'superadmin', '_superadmin', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `permission` VALUES ('2', 'user editor', '_user-editor', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `permission` VALUES ('3', 'group editor', '_group-editor', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `permission` VALUES ('4', 'permission editor', '_permission-editor', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');
INSERT INTO `permission` VALUES ('5', 'profile type editor', '_profile-editor', '0', '2014-12-13 11:37:37', '2014-12-13 11:37:37');

-- ----------------------------
-- Table structure for `productoptions`
-- ----------------------------
DROP TABLE IF EXISTS `productoptions`;
CREATE TABLE `productoptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `optionvalue_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of productoptions
-- ----------------------------
INSERT INTO `productoptions` VALUES ('1', '10', '1', '2015-01-01 21:42:53', '2015-01-01 21:42:53');
INSERT INTO `productoptions` VALUES ('2', '10', '2', '2015-01-01 21:42:53', '2015-01-01 21:42:53');
INSERT INTO `productoptions` VALUES ('3', '10', '3', '2015-01-01 21:42:53', '2015-01-01 21:42:53');
INSERT INTO `productoptions` VALUES ('4', '10', '4', '2015-01-01 21:42:53', '2015-01-01 21:42:53');
INSERT INTO `productoptions` VALUES ('19', '11', '1', '2015-01-03 17:16:57', '2015-01-03 17:16:57');
INSERT INTO `productoptions` VALUES ('20', '11', '3', '2015-01-03 17:16:57', '2015-01-03 17:16:57');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_price` decimal(8,2) NOT NULL,
  `special_price` decimal(8,2) NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `size` text COLLATE utf8_unicode_ci NOT NULL,
  `material` text COLLATE utf8_unicode_ci NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `large_image` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '123.00', '312.00', '123', '123', '27', '123123', '1', '13123', '123', '123', 'model7.jpg', '1', '123', '123', '123', '132', null, '2014-12-13 17:30:21', '2014-12-13 17:30:21');
INSERT INTO `products` VALUES ('2', '120000.00', '100000.00', 'A350', 'shop-as-ass', '17', 'shop as ass', '1', '123', '123', '123', 'model7.jpg', '1', '123', '123', '123', '123', null, '2014-12-17 10:18:27', '2014-12-17 10:18:27');
INSERT INTO `products` VALUES ('3', '120000.00', '100000.00', '123', 'shop-as-ass', '1', '12312312312', '2', '1', '2', '2', 'model7.jpg', '1', '2', '2', '2', '2', null, '2014-12-17 10:19:08', '2014-12-17 10:19:08');
INSERT INTO `products` VALUES ('4', '123.00', '123.00', '213', '213', '123', '213', '2', '123', '123', '123', 'model7.jpg', '1', '4454356', '123', '123', '123', null, '2014-12-17 10:19:48', '2014-12-17 10:19:48');
INSERT INTO `products` VALUES ('6', '120000.00', '200000.00', '123', 'jumsuit-set-bo', '123', 'Jumsuit + Set Bộ', '1', '123', '123', '123', 'model7.jpg', '1', '123', '13', '123', '132', null, '2014-12-20 18:15:55', '2014-12-20 18:15:55');
INSERT INTO `products` VALUES ('7', '120000.00', '200000.00', 'A380', 'so-mi-tay-dai-co-tru-nep-giuas', '1000', 'Sơ mi tay dài cổ trụ nẹp giữas', '1', 'Free size', '123', '123', 'model7.jpg', '1', '123', '123', '123', '123', null, '2014-12-21 14:51:21', '2014-12-21 14:51:21');
INSERT INTO `products` VALUES ('8', '323423.00', '4234.00', '234234', '43324234', '1000', '43324234', '1', '234', '23423', '4324', 'model7.jpg', '1', '2342', '3423', '4234', '324324', null, '2014-12-21 14:55:19', '2014-12-21 14:55:19');
INSERT INTO `products` VALUES ('9', '23423.00', '999999.99', '34023', '324234234', '1000', '324234234', '1', '3234233', '423423', '4234', 'model7.jpg', '1', '234', '23432', '4324', '234234', null, '2014-12-21 15:29:53', '2014-12-21 15:29:53');
INSERT INTO `products` VALUES ('10', '213.00', '123.00', 'A320', 'tai-dang-test-nhe', '1000', 'tai dang test nhe', '1', 'Free size', '123', '123', 'medium-7dd2561fdff34abc91b6b2354e82f62c-650.jpg', '1', '123', 'tai dang test nhe', 'tai,dang,test,nhe', 'tai dang test nhe', '2013-09-04 13.28.17.jpeg', '2015-01-01 21:27:41', '2015-01-01 21:42:53');
INSERT INTO `products` VALUES ('11', '2134.00', '3000.00', '12312332', 'test-test-test', '10000', 'test test test', '1', 'a', 'b', 'c', '86899235238_02-720x720.jpg', '1', '4234234', 'test test test', 'test,test,test', 'test test test', '86899235238_01-225x312.jpg', '2015-01-03 09:58:16', '2015-01-03 17:10:42');

-- ----------------------------
-- Table structure for `profile_field`
-- ----------------------------
DROP TABLE IF EXISTS `profile_field`;
CREATE TABLE `profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `profile_field_type_id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`),
  KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`),
  CONSTRAINT `profile_field_profile_field_type_id_foreign` FOREIGN KEY (`profile_field_type_id`) REFERENCES `profile_field_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_field_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile_field
-- ----------------------------
INSERT INTO `profile_field` VALUES ('1', '1', '1', '', '2015-01-03 18:31:19', '2015-01-03 18:31:19');

-- ----------------------------
-- Table structure for `profile_field_type`
-- ----------------------------
DROP TABLE IF EXISTS `profile_field_type`;
CREATE TABLE `profile_field_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile_field_type
-- ----------------------------
INSERT INTO `profile_field_type` VALUES ('1', '', '2015-01-03 17:59:35', '2015-01-03 17:59:35');

-- ----------------------------
-- Table structure for `shopinfos`
-- ----------------------------
DROP TABLE IF EXISTS `shopinfos`;
CREATE TABLE `shopinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_address` text COLLATE utf8_unicode_ci NOT NULL,
  `store_map` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_baner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_tel` text COLLATE utf8_unicode_ci NOT NULL,
  `store_payment` text COLLATE utf8_unicode_ci,
  `store_body` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `store_zopim` text COLLATE utf8_unicode_ci,
  `meta_title` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shopinfos
-- ----------------------------
INSERT INTO `shopinfos` VALUES ('1', '5', 'Girlshop777.Net - Shop thời trang nữ online', '176 Bình Lợi, Phường 13, Quận Bình Thạnh,TP HCM', 'http://girlshop777.net/image/data/map.png', 'http://girlshop777.net//image/banner-mobile.png', '0909638077 - 0979798181', '<table border=\"1\" style=\"width: 96%;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"http://girlshop777.net/image/data/acb.png\" style=\"font-size: 12.727272033691406px; width: 188px; height: 53px;\"></p>\r\n\r\n			<p><strong style=\"font-size: 13px;\">Nguyễn Văn Hợp 182524229</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"font-size: 12.727272033691406px;\"><img alt=\"\" src=\"http://girlshop777.net/image/data/agri.png\" style=\"width: 188px; height: 54px;\"></p>\r\n\r\n			<p style=\"font-size: 12.727272033691406px;\"><strong style=\"font-size: 13px;\">Nguyễn Văn Hợp 6380205183302</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"font-size: 12.727272033691406px;\"><img alt=\"\" src=\"http://girlshop777.net/image/data/tech.png\" style=\"width: 188px; height: 54px;\"></p>\r\n\r\n			<p style=\"font-size: 12.727272033691406px;\"><strong>Nguyễn Văn Hợp 19028316097017</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style=\"font-size: 12.727272033691406px;\"><img alt=\"\" src=\"http://girlshop777.net/image/data/vcb.png\" style=\"width: 188px; height: 54px;\"></p>\r\n\r\n			<p style=\"font-size: 12.727272033691406px;\"><strong>Nguyễn Văn Hợp 0461000471473</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'mnjkj', '0000-00-00 00:00:00', '2014-12-17 10:15:02', '<!--Start of Zopim Live Chat Script-->\r\n<script type=\"text/javascript\">\r\nwindow.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=\r\nd.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.\r\n_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute(\'charset\',\'utf-8\');\r\n$.src=\'http://v2.zopim.com/?1ZiklTIat4rR1Nza5YyFL0LB9eu7eVBX\';z.t=+new Date;$.\r\ntype=\'text/javascript\';e.parentNode.insertBefore($,e)})(document,\'script\');\r\n</script>\r\n<!--End of Zopim Live Chat Script-->', null, null, null);
INSERT INTO `shopinfos` VALUES ('2', '6', '123', '123', 'http://girlshop777.net/image/data/map.png', '123', '131', '123', '132', '2014-12-13 10:38:12', '2014-12-13 10:38:12', '<script type=\"text/javascript\">', null, null, null);
INSERT INTO `shopinfos` VALUES ('3', '7', '9', '9', '9', '9', '9', '9', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' ', null, null, null);

-- ----------------------------
-- Table structure for `stores`
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` text NOT NULL,
  `domain` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `active_date` datetime NOT NULL,
  `period` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES ('5', 'girlshop', 'girlshop.local', null, null, 'hop', '2014-12-12 18:14:02', '2014-12-12 18:35:54', '0000-00-00 00:00:00', '1');
INSERT INTO `stores` VALUES ('6', 'LARAVEL', 'phutai.local', null, null, 'tai', '2014-12-13 10:37:30', '2014-12-13 10:37:30', '0000-00-00 00:00:00', '1');
INSERT INTO `stores` VALUES ('7', '192.168.0.101', '192.168.0.101', null, null, '192.168.0.101', '2014-12-19 00:49:07', '2014-12-19 00:49:07', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `throttle`
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of throttle
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin@admin.com', '$2y$10$lcTgi7YJ7wevjS/IJiItaegTtalilAkT208p0tWrM8J6Qlb6HtDGG', null, '1', '0', null, null, '2015-01-06 02:28:50', '$2y$10$vqYbuTKo2zYebXAe/F.yAOBueOdh3IzGa4UEWQ/TPl2vomL5J5.m2', null, '0', '2014-12-13 11:37:37', '2015-01-06 02:28:50');
INSERT INTO `users` VALUES ('2', 'tai@tai.com', '$2y$10$1KC/Wrfc/Zqwzrkf7gJijOuqxTUseD5vrWHTjyzw5ClkiHhYhyUwy', '{\"_superadmin\":1}', '1', '0', null, null, '2014-12-13 11:39:06', '$2y$10$70K5R13M7h378zIuprNqWubsG/U.1EjL2srlG4v/Nbl7gE/JW9OJu', null, '0', '2014-12-13 11:38:36', '2014-12-13 11:39:06');
INSERT INTO `users` VALUES ('4', 'nphutai@gmail.com', '$2y$10$9nWmy/TMrWZsm.rXPZ4tY.IXgM1P258F7zVjTvx6U6xIXYuYnoq0u', null, '1', '0', null, null, '2015-01-06 01:35:23', '$2y$10$LHlMy0RfcwvgkAYfod4kbONB8eivdnL2wTrTUOBeZ3ueqk4aYaAVa', null, '0', '2015-01-06 01:18:23', '2015-01-06 01:35:23');
INSERT INTO `users` VALUES ('5', 'nptai@vitenet.net', '$2y$10$KEFoW81ZMS.sIkJ1jaF3HOCinaTDGvVY7Fjn1aAZT4v4y3XoHBSq2', null, '1', '0', null, null, null, null, null, '0', '2015-01-06 01:25:28', '2015-01-06 01:25:28');

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1');
INSERT INTO `users_groups` VALUES ('2', '1');

-- ----------------------------
-- Table structure for `user_profile`
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_profile_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES ('1', '1', '', null, 'Tài', '', '', '', '', '', '', '', null, '2014-12-13 11:37:37', '2015-01-03 18:31:19');
INSERT INTO `user_profile` VALUES ('2', '2', null, null, null, null, null, null, null, null, null, null, null, '2014-12-13 11:38:36', '2014-12-13 11:38:36');
INSERT INTO `user_profile` VALUES ('4', '4', null, null, 'Nguyễn Phú Tài', null, '12321', null, null, null, null, '3123213@a.net', null, '2015-01-06 01:18:23', '2015-01-06 01:18:23');
INSERT INTO `user_profile` VALUES ('5', '5', null, null, 'Tài', null, '12321', null, null, null, null, '3123213@a.net', null, '2015-01-06 01:25:28', '2015-01-06 01:25:28');
