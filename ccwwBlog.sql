SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for one_article_tag
-- ----------------------------
DROP TABLE IF EXISTS `one_article_tag`;
CREATE TABLE `one_article_tag` (
  `article_id` int(11) NOT NULL COMMENT '文章ID',
  `tag_id` int(11) NOT NULL COMMENT '标签ID',
  PRIMARY KEY (`article_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for one_articles
-- ----------------------------
DROP TABLE IF EXISTS `one_articles`;
CREATE TABLE `one_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `sub_title` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `content` text COMMENT '文章正文',
  `markdown` text COMMENT 'markdown内容',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `category_id` int(11) DEFAULT NULL COMMENT '类别',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_articles
-- ----------------------------
BEGIN;
INSERT INTO `one_articles` VALUES (1, '欢迎使用ccwwBlog!', '', '<h1><a id=\"ccwwBlog_0\"></a>ccwwBlog</h1>\n<pre><code class=\"lang-\">简单的博客系统\n添加文章前先增加分类哦！\n</code></pre>\n', '# ccwwBlog\n\n```\n简单的博客系统\n添加文章前先增加分类哦！\n```', 'ccwwonebyone', 0, 0, 1537496592, 1537496592);
COMMIT;

-- ----------------------------
-- Table structure for one_category
-- ----------------------------
DROP TABLE IF EXISTS `one_category`;
CREATE TABLE `one_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '栏位名',
  `route` varchar(255) NOT NULL DEFAULT '' COMMENT '链接',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `status` tinyint(2) DEFAULT '1' COMMENT '0隐藏1显示',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_category
-- ----------------------------
BEGIN;
INSERT INTO `one_category` VALUES (1, 'php', '', 0, 1, 1, 1566203917, 1566203917);
COMMIT;

-- ----------------------------
-- Table structure for one_company
-- ----------------------------
DROP TABLE IF EXISTS `one_company`;
CREATE TABLE `one_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '网站名字',
  `power` varchar(100) NOT NULL DEFAULT '' COMMENT '归属权限',
  `copyright` varchar(100) NOT NULL DEFAULT '' COMMENT '版权归属',
  `brand` varchar(100) NOT NULL COMMENT '网站图标',
  `favicon` varchar(100) NOT NULL DEFAULT '' COMMENT '网页标签图标',
  `introduce` varchar(255) NOT NULL DEFAULT '' COMMENT '展示自我',
  `header` varchar(100) NOT NULL DEFAULT '' COMMENT '头像地址',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_company
-- ----------------------------
BEGIN;
INSERT INTO `one_company` VALUES (1, 'ccwwBlog', 'ccwwBlog', 'ccwwblog', '/img/ca297c9c8010afeb9fa4aaf0fa2cbb.png', '/img/eddff169cdd12e3d6a663d7b7ed40b.jpg', 'ccwwBlog轻巧型博客系统', '/img/eddff169cdd12e3d6a663d7b7ed40b.jpg', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for one_medias
-- ----------------------------
DROP TABLE IF EXISTS `one_medias`;
CREATE TABLE `one_medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT '文件地址',
  `name` varchar(255) DEFAULT NULL COMMENT '文件名称',
  `type` varchar(30) DEFAULT NULL COMMENT '文件类型',
  `size` float(11,0) DEFAULT NULL COMMENT '文件大小',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for one_tags
-- ----------------------------
DROP TABLE IF EXISTS `one_tags`;
CREATE TABLE `one_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '标签名',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for one_users
-- ----------------------------
DROP TABLE IF EXISTS `one_users`;
CREATE TABLE `one_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
