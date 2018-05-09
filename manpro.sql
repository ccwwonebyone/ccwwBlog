/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : manpro

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-09 18:04:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mp_api
-- ----------------------------
DROP TABLE IF EXISTS `mp_api`;
CREATE TABLE `mp_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL COMMENT 'url地址',
  `method` varchar(10) NOT NULL COMMENT '请求方法',
  `params` text COMMENT '发送参数(json包含键值键名描述等)',
  `project_id` int(11) NOT NULL COMMENT '项目ID',
  `headers` text COMMENT '请求参数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='api表';

-- ----------------------------
-- Records of mp_api
-- ----------------------------
INSERT INTO `mp_api` VALUES ('2', 'http://vuelar.one', 'get', null, '0', null);

-- ----------------------------
-- Table structure for mp_bug
-- ----------------------------
DROP TABLE IF EXISTS `mp_bug`;
CREATE TABLE `mp_bug` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'bug名字',
  `poistion` varchar(255) NOT NULL COMMENT '发生位置',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT 'bug类型：0-接口bug，1-使用bug',
  `detail` varchar(255) DEFAULT NULL COMMENT 'bug描述',
  `picture` varchar(255) DEFAULT NULL COMMENT 'bug图片',
  `status` int(2) DEFAULT NULL COMMENT 'bug状态',
  `user_id` int(11) NOT NULL COMMENT '创建ID',
  `solve_user_id` int(11) DEFAULT NULL COMMENT '解决bug用户',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='bug表';

-- ----------------------------
-- Records of mp_bug
-- ----------------------------

-- ----------------------------
-- Table structure for mp_column
-- ----------------------------
DROP TABLE IF EXISTS `mp_column`;
CREATE TABLE `mp_column` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '栏位id',
  `table_id` int(11) NOT NULL COMMENT '表ID',
  `field` char(255) NOT NULL COMMENT '字段名',
  `comment` char(255) DEFAULT NULL COMMENT '注释',
  `type` char(255) DEFAULT NULL COMMENT '类型',
  `key` char(255) DEFAULT NULL COMMENT '主键',
  `introduce` text COMMENT '介绍字段',
  `null` char(255) DEFAULT NULL COMMENT '能否为空',
  `default` char(255) DEFAULT NULL COMMENT '默认值',
  `collation` varchar(255) DEFAULT NULL COMMENT '排序规则',
  `extra` varchar(255) DEFAULT NULL COMMENT '自增ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COMMENT='字段表';

-- ----------------------------
-- Records of mp_column
-- ----------------------------
INSERT INTO `mp_column` VALUES ('1', '1', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('2', '1', 'url', 'url地址', 'text', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('3', '1', 'mothed', '请求方法', 'int(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('4', '1', 'params', '发送参数(json包含键值键名描述等)', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('5', '1', 'project_id', '项目ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('6', '1', 'headers', '请求参数', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('7', '2', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('8', '2', 'name', 'bug名字', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('9', '2', 'poistion', '发生位置', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('10', '2', 'type', 'bug类型：0-接口bug，1-使用bug', 'int(2)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('11', '2', 'detail', 'bug描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('12', '2', 'picture', 'bug图片', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('13', '2', 'status', 'bug状态', 'int(2)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('14', '2', 'user_id', '创建ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('15', '2', 'solve_user_id', '解决bug用户', 'int(11)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('16', '3', 'id', '栏位id', 'int(6)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('17', '3', 'table_id', '表ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('18', '3', 'field', '字段名', 'char(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('19', '3', 'comment', '注释', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('20', '3', 'type', '类型', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('21', '3', 'key', '主键', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('22', '3', 'introduce', '介绍字段', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('23', '3', 'null', '能否为空', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('24', '3', 'default', '默认值', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('25', '3', 'collation', '排序规则', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('26', '3', 'extra', '自增ID', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('27', '4', 'id', '数据库id', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('28', '4', 'driver', '数据库类型', 'char(255)', '', null, 'NO', 'mysql', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('29', '4', 'dsn', 'dsn', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('30', '4', 'database', '数据库', 'char(40)', '', null, 'NO', 'manp', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('31', '4', 'hostname', '主机名', 'char(40)', '', null, 'NO', 'localhost', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('32', '4', 'username', '用户名', 'char(40)', '', null, 'NO', 'root', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('33', '4', 'password', '密码', 'char(40)', '', null, 'NO', '123456', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('34', '4', 'prefix', '表前缀', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('35', '4', 'charset', '字符集', 'char(255)', '', null, 'YES', 'utf8', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('36', '4', 'hostport', '端口号', 'int(6)', '', null, 'YES', '3306', null, '');
INSERT INTO `mp_column` VALUES ('37', '4', 'params', '额外参数', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('38', '4', 'type', '字符集', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('39', '4', 'comment', '注释', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('40', '4', 'introduce', '介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('41', '4', 'user_id', '用户id', 'int(6)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('42', '5', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('43', '5', 'pid', '上级ID', 'int(11)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('44', '5', 'field', '字段名', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('45', '5', 'name', '', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('46', '5', 'detail', '关于字段的详细描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('47', '5', 'value', '键值', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('48', '6', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('49', '6', 'name', '表名', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('50', '6', 'engine', '数据表引擎', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('51', '6', 'comment', '表的注释', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('52', '6', 'introduce', '表介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('53', '6', 'db_id', '数据库ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('54', '7', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('55', '7', 'nick_name', '昵称', 'varchar(20)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('56', '7', 'username', '姓名', 'varchar(20)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('57', '7', 'password', '密码', 'varchar(60)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('58', '7', 'email', '电子邮件', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('59', '7', 'phone', '手机号', 'int(12)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('60', '7', 'type', '用户类型:', 'tinyint(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('61', '7', 'create_time', '', 'datetime', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('62', '7', 'update_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('63', '7', 'last_login_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('64', '8', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('65', '8', 'url', 'url地址', 'text', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('66', '8', 'mothed', '请求方法', 'int(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('67', '8', 'params', '发送参数(json包含键值键名描述等)', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('68', '8', 'project_id', '项目ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('69', '8', 'headers', '请求参数', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('70', '9', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('71', '9', 'name', 'bug名字', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('72', '9', 'poistion', '发生位置', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('73', '9', 'type', 'bug类型：0-接口bug，1-使用bug', 'int(2)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('74', '9', 'detail', 'bug描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('75', '9', 'picture', 'bug图片', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('76', '9', 'status', 'bug状态', 'int(2)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('77', '9', 'user_id', '创建ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('78', '9', 'solve_user_id', '解决bug用户', 'int(11)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('79', '10', 'id', '栏位id', 'int(6)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('80', '10', 'table_id', '表ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('81', '10', 'field', '字段名', 'char(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('82', '10', 'comment', '注释', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('83', '10', 'type', '类型', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('84', '10', 'key', '主键', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('85', '10', 'introduce', '介绍字段', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('86', '10', 'null', '能否为空', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('87', '10', 'default', '默认值', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('88', '10', 'collation', '排序规则', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('89', '10', 'extra', '自增ID', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('90', '11', 'id', '数据库id', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('91', '11', 'driver', '数据库类型', 'char(255)', '', null, 'NO', 'mysql', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('92', '11', 'dsn', 'dsn', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('93', '11', 'database', '数据库', 'char(40)', '', null, 'NO', 'manp', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('94', '11', 'hostname', '主机名', 'char(40)', '', null, 'NO', 'localhost', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('95', '11', 'username', '用户名', 'char(40)', '', null, 'NO', 'root', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('96', '11', 'password', '密码', 'char(40)', '', null, 'NO', '123456', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('97', '11', 'prefix', '表前缀', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('98', '11', 'charset', '字符集', 'char(255)', '', null, 'YES', 'utf8', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('99', '11', 'hostport', '端口号', 'int(6)', '', null, 'YES', '3306', null, '');
INSERT INTO `mp_column` VALUES ('100', '11', 'params', '额外参数', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('101', '11', 'type', '字符集', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('102', '11', 'comment', '注释', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('103', '11', 'introduce', '介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('104', '11', 'user_id', '用户id', 'int(6)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('105', '12', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('106', '12', 'pid', '上级ID', 'int(11)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('107', '12', 'field', '字段名', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('108', '12', 'name', '字段名', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('109', '12', 'detail', '关于字段的详细描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('110', '12', 'value', '键值', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('111', '13', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('112', '13', 'name', '表名', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('113', '13', 'engine', '数据表引擎', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('114', '13', 'comment', '表的注释', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('115', '13', 'introduce', '表介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('116', '13', 'db_id', '数据库ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('117', '14', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('118', '14', 'nick_name', '昵称', 'varchar(20)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('119', '14', 'username', '姓名', 'varchar(20)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('120', '14', 'password', '密码', 'varchar(60)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('121', '14', 'email', '电子邮件', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('122', '14', 'phone', '手机号', 'int(12)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('123', '14', 'type', '用户类型:', 'tinyint(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('124', '14', 'create_time', '', 'datetime', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('125', '14', 'update_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('126', '14', 'last_login_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('127', '15', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('128', '15', 'url', 'url地址', 'text', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('129', '15', 'mothed', '请求方法', 'int(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('130', '15', 'params', '发送参数(json包含键值键名描述等)', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('131', '15', 'project_id', '项目ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('132', '15', 'headers', '请求参数', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('133', '16', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('134', '16', 'name', 'bug名字', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('135', '16', 'poistion', '发生位置', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('136', '16', 'type', 'bug类型：0-接口bug，1-使用bug', 'int(2)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('137', '16', 'detail', 'bug描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('138', '16', 'picture', 'bug图片', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('139', '16', 'status', 'bug状态', 'int(2)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('140', '16', 'user_id', '创建ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('141', '16', 'solve_user_id', '解决bug用户', 'int(11)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('142', '17', 'id', '栏位id', 'int(6)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('143', '17', 'table_id', '表ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('144', '17', 'field', '字段名', 'char(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('145', '17', 'comment', '注释', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('146', '17', 'type', '类型', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('147', '17', 'key', '主键', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('148', '17', 'introduce', '介绍字段', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('149', '17', 'null', '能否为空', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('150', '17', 'default', '默认值', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('151', '17', 'collation', '排序规则', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('152', '17', 'extra', '自增ID', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('153', '18', 'id', '数据库id', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('154', '18', 'driver', '数据库类型', 'char(255)', '', null, 'NO', 'mysql', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('155', '18', 'dsn', 'dsn', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('156', '18', 'database', '数据库', 'char(40)', '', null, 'NO', 'manp', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('157', '18', 'hostname', '主机名', 'char(40)', '', null, 'NO', 'localhost', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('158', '18', 'username', '用户名', 'char(40)', '', null, 'NO', 'root', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('159', '18', 'password', '密码', 'char(40)', '', null, 'NO', '123456', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('160', '18', 'prefix', '表前缀', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('161', '18', 'charset', '字符集', 'char(255)', '', null, 'YES', 'utf8', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('162', '18', 'hostport', '端口号', 'int(6)', '', null, 'YES', '3306', null, '');
INSERT INTO `mp_column` VALUES ('163', '18', 'params', '额外参数', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('164', '18', 'type', '字符集', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('165', '18', 'comment', '注释', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('166', '18', 'introduce', '介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('167', '18', 'user_id', '用户id', 'int(6)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('168', '19', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('169', '19', 'pid', '上级ID', 'int(11)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('170', '19', 'field', '字段名', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('171', '19', 'name', '字段名', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('172', '19', 'detail', '关于字段的详细描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('173', '19', 'value', '键值', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('174', '20', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('175', '20', 'name', '表名', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('176', '20', 'engine', '数据表引擎', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('177', '20', 'comment', '表的注释', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('178', '20', 'introduce', '表介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('179', '20', 'db_id', '数据库ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('180', '21', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('181', '21', 'nick_name', '昵称', 'varchar(20)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('182', '21', 'username', '姓名', 'varchar(20)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('183', '21', 'password', '密码', 'varchar(60)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('184', '21', 'email', '电子邮件', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('185', '21', 'phone', '手机号', 'int(12)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('186', '21', 'type', '用户类型:', 'tinyint(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('187', '21', 'create_time', '', 'datetime', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('188', '21', 'update_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('189', '21', 'last_login_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('190', '22', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('191', '22', 'url', 'url地址', 'text', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('192', '22', 'mothed', '请求方法', 'int(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('193', '22', 'params', '发送参数(json包含键值键名描述等)', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('194', '22', 'project_id', '项目ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('195', '22', 'headers', '请求参数', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('196', '23', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('197', '23', 'name', 'bug名字', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('198', '23', 'poistion', '发生位置', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('199', '23', 'type', 'bug类型：0-接口bug，1-使用bug', 'int(2)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('200', '23', 'detail', 'bug描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('201', '23', 'picture', 'bug图片', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('202', '23', 'status', 'bug状态', 'int(2)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('203', '23', 'user_id', '创建ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('204', '23', 'solve_user_id', '解决bug用户', 'int(11)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('205', '24', 'id', '栏位id', 'int(6)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('206', '24', 'table_id', '表ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('207', '24', 'field', '字段名', 'char(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('208', '24', 'comment', '注释', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('209', '24', 'type', '类型', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('210', '24', 'key', '主键', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('211', '24', 'introduce', '介绍字段', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('212', '24', 'null', '能否为空', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('213', '24', 'default', '默认值', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('214', '24', 'collation', '排序规则', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('215', '24', 'extra', '自增ID', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('216', '25', 'id', '数据库id', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('217', '25', 'driver', '数据库类型', 'char(255)', '', null, 'NO', 'mysql', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('218', '25', 'dsn', 'dsn', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('219', '25', 'database', '数据库', 'char(40)', '', null, 'NO', 'manp', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('220', '25', 'hostname', '主机名', 'char(40)', '', null, 'NO', 'localhost', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('221', '25', 'username', '用户名', 'char(40)', '', null, 'NO', 'root', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('222', '25', 'password', '密码', 'char(40)', '', null, 'NO', '123456', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('223', '25', 'prefix', '表前缀', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('224', '25', 'charset', '字符集', 'char(255)', '', null, 'YES', 'utf8', 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('225', '25', 'hostport', '端口号', 'int(6)', '', null, 'YES', '3306', null, '');
INSERT INTO `mp_column` VALUES ('226', '25', 'params', '额外参数', 'char(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('227', '25', 'type', '字符集', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('228', '25', 'comment', '注释', 'varchar(40)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('229', '25', 'introduce', '介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('230', '25', 'user_id', '用户id', 'int(6)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('231', '26', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('232', '26', 'pid', '上级ID', 'int(11)', '', null, 'NO', '0', null, '');
INSERT INTO `mp_column` VALUES ('233', '26', 'field', '字段名', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('234', '26', 'name', '字段名', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('235', '26', 'detail', '关于字段的详细描述', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('236', '26', 'value', '键值', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('237', '27', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('238', '27', 'name', '表名', 'varchar(255)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('239', '27', 'engine', '数据表引擎', 'varchar(30)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('240', '27', 'comment', '表的注释', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('241', '27', 'introduce', '表介绍', 'text', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('242', '27', 'db_id', '数据库ID', 'int(11)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('243', '28', 'id', '', 'int(11)', 'PRI', null, 'NO', null, null, 'auto_increment');
INSERT INTO `mp_column` VALUES ('244', '28', 'nick_name', '昵称', 'varchar(20)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('245', '28', 'username', '姓名', 'varchar(20)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('246', '28', 'password', '密码', 'varchar(60)', '', null, 'NO', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('247', '28', 'email', '电子邮件', 'varchar(255)', '', null, 'YES', null, 'utf8_general_ci', '');
INSERT INTO `mp_column` VALUES ('248', '28', 'phone', '手机号', 'int(12)', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('249', '28', 'type', '用户类型:', 'tinyint(2)', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('250', '28', 'create_time', '', 'datetime', '', null, 'NO', null, null, '');
INSERT INTO `mp_column` VALUES ('251', '28', 'update_time', '', 'datetime', '', null, 'YES', null, null, '');
INSERT INTO `mp_column` VALUES ('252', '28', 'last_login_time', '', 'datetime', '', null, 'YES', null, null, '');

-- ----------------------------
-- Table structure for mp_db
-- ----------------------------
DROP TABLE IF EXISTS `mp_db`;
CREATE TABLE `mp_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '数据库id',
  `driver` char(255) NOT NULL DEFAULT 'mysql' COMMENT '数据库类型',
  `dsn` char(255) DEFAULT NULL COMMENT 'dsn',
  `database` char(40) NOT NULL DEFAULT 'manp' COMMENT '数据库',
  `hostname` char(40) NOT NULL DEFAULT 'localhost' COMMENT '主机名',
  `username` char(40) NOT NULL DEFAULT 'root' COMMENT '用户名',
  `password` char(40) NOT NULL DEFAULT '123456' COMMENT '密码',
  `prefix` char(255) DEFAULT NULL COMMENT '表前缀',
  `charset` char(255) DEFAULT 'utf8' COMMENT '字符集',
  `hostport` int(6) DEFAULT '3306' COMMENT '端口号',
  `params` char(255) DEFAULT NULL COMMENT '额外参数',
  `type` varchar(40) DEFAULT NULL COMMENT '字符集',
  `comment` varchar(40) DEFAULT NULL COMMENT '注释',
  `introduce` text COMMENT '介绍',
  `user_id` int(6) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='数据库配置表';

-- ----------------------------
-- Records of mp_db
-- ----------------------------
INSERT INTO `mp_db` VALUES ('1', 'mysql', '', 'manpro', '127.0.0.1', 'root', 'root', '', 'utf8', '3306', 'a:1:{i:8;i:2;}', 'mysql', null, null, null);
INSERT INTO `mp_db` VALUES ('2', 'mysql', '', 'manpro', '127.0.0.1', 'root', 'root', '', 'utf8', '3306', 'a:1:{i:8;i:2;}', 'mysql', null, null, null);
INSERT INTO `mp_db` VALUES ('3', 'mysql', '', 'manpro', '127.0.0.1', 'root', 'root', '', 'utf8', '3306', 'a:1:{i:8;i:2;}', 'mysql', null, null, null);
INSERT INTO `mp_db` VALUES ('4', 'mysql', '', 'manpro', '127.0.0.1', 'root', 'root', '', 'utf8', '3306', 'a:1:{i:8;i:2;}', 'mysql', null, null, null);

-- ----------------------------
-- Table structure for mp_respond
-- ----------------------------
DROP TABLE IF EXISTS `mp_respond`;
CREATE TABLE `mp_respond` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `field` varchar(30) DEFAULT NULL COMMENT '字段名',
  `name` varchar(255) DEFAULT NULL COMMENT '字段名',
  `detail` varchar(255) DEFAULT NULL COMMENT '关于字段的详细描述',
  `value` varchar(255) DEFAULT NULL COMMENT '键值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='api响应表';

-- ----------------------------
-- Records of mp_respond
-- ----------------------------

-- ----------------------------
-- Table structure for mp_table
-- ----------------------------
DROP TABLE IF EXISTS `mp_table`;
CREATE TABLE `mp_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '表名',
  `engine` varchar(30) DEFAULT NULL COMMENT '数据表引擎',
  `comment` varchar(255) DEFAULT NULL COMMENT '表的注释',
  `introduce` text COMMENT '表介绍',
  `db_id` int(11) NOT NULL COMMENT '数据库ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='数据表';

-- ----------------------------
-- Records of mp_table
-- ----------------------------
INSERT INTO `mp_table` VALUES ('1', 'mp_api', 'MyISAM', 'api表', null, '1');
INSERT INTO `mp_table` VALUES ('2', 'mp_bug', 'MyISAM', 'bug表', null, '1');
INSERT INTO `mp_table` VALUES ('3', 'mp_column', 'MyISAM', '字段表', null, '1');
INSERT INTO `mp_table` VALUES ('4', 'mp_db', 'MyISAM', '', null, '1');
INSERT INTO `mp_table` VALUES ('5', 'mp_respond', 'MyISAM', 'api响应表', null, '1');
INSERT INTO `mp_table` VALUES ('6', 'mp_table', 'MyISAM', '', null, '1');
INSERT INTO `mp_table` VALUES ('7', 'mp_user', 'MyISAM', '用户表', null, '1');
INSERT INTO `mp_table` VALUES ('8', 'mp_api', 'MyISAM', 'api表', null, '2');
INSERT INTO `mp_table` VALUES ('9', 'mp_bug', 'MyISAM', 'bug表', null, '2');
INSERT INTO `mp_table` VALUES ('10', 'mp_column', 'MyISAM', '字段表', null, '2');
INSERT INTO `mp_table` VALUES ('11', 'mp_db', 'MyISAM', '数据库配置表', null, '2');
INSERT INTO `mp_table` VALUES ('12', 'mp_respond', 'MyISAM', 'api响应表', null, '2');
INSERT INTO `mp_table` VALUES ('13', 'mp_table', 'MyISAM', '数据表', null, '2');
INSERT INTO `mp_table` VALUES ('14', 'mp_user', 'MyISAM', '用户表', null, '2');
INSERT INTO `mp_table` VALUES ('15', 'mp_api', 'MyISAM', 'api表', null, '3');
INSERT INTO `mp_table` VALUES ('16', 'mp_bug', 'MyISAM', 'bug表', null, '3');
INSERT INTO `mp_table` VALUES ('17', 'mp_column', 'MyISAM', '字段表', null, '3');
INSERT INTO `mp_table` VALUES ('18', 'mp_db', 'MyISAM', '数据库配置表', null, '3');
INSERT INTO `mp_table` VALUES ('19', 'mp_respond', 'MyISAM', 'api响应表', null, '3');
INSERT INTO `mp_table` VALUES ('20', 'mp_table', 'MyISAM', '数据表', null, '3');
INSERT INTO `mp_table` VALUES ('21', 'mp_user', 'MyISAM', '用户表', null, '3');
INSERT INTO `mp_table` VALUES ('22', 'mp_api', 'MyISAM', 'api表', null, '4');
INSERT INTO `mp_table` VALUES ('23', 'mp_bug', 'MyISAM', 'bug表', null, '4');
INSERT INTO `mp_table` VALUES ('24', 'mp_column', 'MyISAM', '字段表', null, '4');
INSERT INTO `mp_table` VALUES ('25', 'mp_db', 'MyISAM', '数据库配置表', null, '4');
INSERT INTO `mp_table` VALUES ('26', 'mp_respond', 'MyISAM', 'api响应表', null, '4');
INSERT INTO `mp_table` VALUES ('27', 'mp_table', 'MyISAM', '数据表', null, '4');
INSERT INTO `mp_table` VALUES ('28', 'mp_user', 'MyISAM', '用户表', null, '4');

-- ----------------------------
-- Table structure for mp_user
-- ----------------------------
DROP TABLE IF EXISTS `mp_user`;
CREATE TABLE `mp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(20) NOT NULL COMMENT '昵称',
  `username` varchar(20) DEFAULT NULL COMMENT '姓名',
  `password` varchar(60) NOT NULL COMMENT '密码',
  `email` varchar(255) DEFAULT NULL COMMENT '电子邮件',
  `phone` int(12) DEFAULT NULL COMMENT '手机号',
  `type` tinyint(2) NOT NULL COMMENT '用户类型:',
  `create_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of mp_user
-- ----------------------------
