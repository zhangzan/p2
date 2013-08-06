-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 08 日 11:24
-- 服务器版本: 5.5.28-log
-- PHP 版本: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `p1`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identity` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastLoginTime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginTime` int(10) unsigned NOT NULL DEFAULT '0',
  `recordTime` int(10) unsigned NOT NULL DEFAULT '0',
  `delFlag` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `adminFlag` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `repeatPassword` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `identity`, `password`, `name`, `lastLoginTime`, `loginTime`, `recordTime`, `delFlag`, `adminFlag`, `repeatPassword`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1359866092, 1364186814, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'bannerID',
  `name` varchar(200) DEFAULT '' COMMENT 'banner名称',
  `type` varchar(10) DEFAULT NULL COMMENT 'big：为大banner  small：小banner',
  `image_url` varchar(150) DEFAULT '' COMMENT 'banner图片地址',
  `url` varchar(150) DEFAULT NULL COMMENT 'banner对应的url地址',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='banner信息表' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `banner`
--

INSERT INTO `banner` (`id`, `name`, `type`, `image_url`, `url`, `update_time`) VALUES
(13, '个性定制', 'small', './upload/banner/2013_01_14/210824_1726.jpg', 'http://www.x-robot.com.cn/index.php/Robot/Custom', '2013-01-14 13:17:04'),
(14, '市场活动', 'small', './upload/banner/2013_01_14/210848_1452.png', 'javascript:void(0);', '2013-01-14 13:08:48'),
(15, '热点关注', 'small', './upload/banner/2013_01_14/210903_700.png', 'http://www.x-robot.com.cn/index.php/About/News', '2013-01-14 13:17:18'),
(16, '查找经销商', 'small', './upload/banner/2013_01_14/210921_1508.jpg', 'http://www.x-robot.com.cn/index.php/Dealer/Index', '2013-01-14 13:17:36'),
(5, '图片、视频下载', 'small', './upload/banner/2013_01_14/211312_1216.jpg', 'http://www.x-robot.com.cn/index.php/Main/Download', '2013-01-14 13:18:02'),
(6, '预约试驾', 'small', './upload/banner/2013_01_14/213254_676.jpg', 'http://www.x-robot.com.cn/index.php/Robot/Order', '2013-01-14 13:32:54'),
(7, 'i-ROBOT lifestyle', 'small', './upload/banner/2013_01_14/213545_1417.jpg', 'http://www.x-robot.com.cn/index.php/Robot/RobotLive', '2013-01-14 13:36:55'),
(8, 'X-ROBOT售后服务', 'small', './upload/banner/2013_01_14/213747_1399.jpg', 'http://www.x-robot.com.cn/index.php/Serve/AfterSale', '2013-01-14 13:37:47'),
(1, 'big banner1', 'big', './upload/banner/9.jpg', 'http://www.x-robot.com.cn/index.php/Main/Hd', '0000-00-00 00:00:00'),
(2, 'big banner2', 'big', './upload/banner/10.jpg', 'http://www.x-robot.com.cn/index.php/Product/IRobotLA', '0000-00-00 00:00:00'),
(3, 'big banner3', 'big', './upload/banner/11.jpg', 'http://www.x-robot.com.cn/index.php/About/News', '0000-00-00 00:00:00'),
(4, 'big banner4', 'big', './upload/banner/2013_03_21/203444_901.png', '/', '2013-03-21 12:34:44');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `name` varchar(100) DEFAULT '' COMMENT '类别名字',
  `model` varchar(20) DEFAULT NULL COMMENT '类别所属模块 news新闻所有分类，',
  `add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '类别添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='类别表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `model`, `add_time`) VALUES
(1, '1', 'news', '2013-01-07 10:59:26'),
(2, '2', 'news', '2013-01-11 03:34:31');

-- --------------------------------------------------------

--
-- 表的结构 `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(16) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, '蓝色'),
(0, '原色'),
(3, '原2色'),
(2, '蓝1色'),
(4, '墨绿金'),
(5, '帕克达红'),
(6, '深玫瑰金'),
(7, '深宝石蓝'),
(8, '西伯利亚银'),
(9, '香槟金'),
(10, '珠光白');

-- --------------------------------------------------------

--
-- 表的结构 `color_car`
--

CREATE TABLE IF NOT EXISTS `color_car` (
  `car_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`car_id`,`color_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `color_car`
--

INSERT INTO `color_car` (`car_id`, `color_id`) VALUES
(1, 0),
(1, 1),
(1, 9),
(2, 0),
(2, 1),
(3, 0),
(3, 1),
(4, 0),
(4, 1),
(5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '公司名称',
  `name` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '公司具体名称',
  `tel` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '固定电话',
  `fax` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '传真',
  `email` varchar(128) CHARACTER SET utf8 NOT NULL COMMENT '电子邮箱',
  `address` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '地址',
  `city` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '所处城市',
  `zip_code` int(10) unsigned NOT NULL COMMENT '邮编',
  `website` varchar(256) COLLATE utf8_bin NOT NULL COMMENT '网址',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `custom_part`
--

CREATE TABLE IF NOT EXISTS `custom_part` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `thumbnail` varchar(256) CHARACTER SET utf8 NOT NULL,
  `img` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `price` varchar(16) CHARACTER SET utf8 NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `custom_part`
--

INSERT INTO `custom_part` (`id`, `type`, `thumbnail`, `img`, `name`, `price`, `update_time`, `record_time`) VALUES
(4, 0, '1231241358078396s.png', '1231241358078396.png', '123124', '2234', '2013-01-13 11:59:56', 1358078396),
(5, 0, 'jvljv_1358078450s.png', 'jvljv_1358078450.png', 'jvljv', '200', '2013-01-13 12:07:23', 1358078450);

-- --------------------------------------------------------

--
-- 表的结构 `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `mobile` varchar(32) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(32) CHARACTER SET utf8 NOT NULL,
  `fax` varchar(32) CHARACTER SET utf8 NOT NULL,
  `province` varchar(16) COLLATE utf8_bin NOT NULL,
  `city` varchar(16) COLLATE utf8_bin NOT NULL,
  `level` tinyint(3) unsigned NOT NULL COMMENT '分级',
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) unsigned NOT NULL COMMENT '1.未通过,2.通过',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dealer`
--

INSERT INTO `dealer` (`id`, `name`, `password`, `sex`, `mobile`, `tel`, `fax`, `province`, `city`, `level`, `email`, `status`, `update_time`, `record_time`) VALUES
(1, '上海XX有限公司', NULL, 1, '18690998763', '86-021-87652837', '021-23114233', '上海市', '徐汇区', 1, 'xxkaisya@shanghai.com', 1, '2012-11-19 00:49:38', 1353314978),
(2, '上海沈嘉工贸有限公司', NULL, 1, '18621322503', '021-54323201-8304', '54322545', '上海市', '闵行区', 1, 'scottnjq@yahoo.cn', 1, '2012-11-19 23:07:25', 1353395245),
(3, '高升采油厂', NULL, 1, '13514273640', '0427-7502068-', '', '辽宁省', '盘锦市', 1, '402162490@qq.com', 1, '2012-11-21 05:00:51', 1353502851),
(4, '北京鼎尚基业科技有限公司', NULL, 1, '13701390941', '--', '', '北京市', '海淀区', 1, 'maom0171@sina.com', 1, '2012-11-21 16:49:30', 1353545370),
(5, '上海阿运轩汽车装潢有限公司', NULL, 1, '15821825593', '021-68889008-', '', '上海市', '浦东新区', 1, 'dishaofly@gmail.com', 1, '2012-11-23 20:54:21', 1353732861);

-- --------------------------------------------------------

--
-- 表的结构 `dealer_login`
--

CREATE TABLE IF NOT EXISTS `dealer_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` char(32) CHARACTER SET utf8 NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `company` varchar(32) CHARACTER SET utf8 NOT NULL,
  `contact_name` varchar(16) CHARACTER SET utf8 NOT NULL,
  `address` varchar(64) CHARACTER SET utf8 NOT NULL,
  `province` varchar(16) CHARACTER SET utf8 NOT NULL,
  `city` varchar(16) CHARACTER SET utf8 NOT NULL,
  `point` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT '座标',
  `postcode` varchar(6) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(16) CHARACTER SET utf8 DEFAULT NULL COMMENT '传真',
  `email` varchar(64) CHARACTER SET utf8 NOT NULL,
  `can_order` tinyint(1) unsigned NOT NULL COMMENT '有无试驾链接',
  `status` tinyint(3) unsigned NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dealer_login`
--

INSERT INTO `dealer_login` (`id`, `username`, `password`, `level`, `company`, `contact_name`, `address`, `province`, `city`, `point`, `postcode`, `tel`, `mobile`, `fax`, `email`, `can_order`, `status`, `update_time`, `record_time`) VALUES
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', 2, 'i-ROBOT代步机器人体验馆', '曹先生', '上海浦东新区张扬路721号4010室', '上海市', '浦东新区', '121.527729|31.23511', '', '021-50760807', '', '021-50761085', 'abc@def.com', 0, 1, '2013-02-02 15:39:40', 1357832666),
(5, 'bc', '5360af35bde9ebd8f01f492dc059593c', 1, '上海赟创电脑设备有限公司', '陆先生', '上海浦东新区海阳路1333弄1号402室', '上海市', '浦东新区', '121.518949|31.165782', '', '', '13801613563', '', 'abc@def.com', 1, 1, '2013-02-02 15:39:33', 1357830224),
(7, '111112222', '821f3157e1a3456bfe1a000a1adf0862', 1, '123123123123', '21312312312', 'dafsdfsdfdafsdf', '北京市', '海淀区', '116.419522|39.9452', '', '12312312313', '', '', '213132@qq.vvv', 0, 1, '2013-02-02 16:19:56', 1359820446);

-- --------------------------------------------------------

--
-- 表的结构 `drive_request`
--

CREATE TABLE IF NOT EXISTS `drive_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `mobile` varchar(32) CHARACTER SET utf8 NOT NULL,
  `province` varchar(16) COLLATE utf8_bin NOT NULL,
  `city` varchar(16) COLLATE utf8_bin NOT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `plan_buy_time` varchar(16) COLLATE utf8_bin NOT NULL,
  `expect_feedback_time` varchar(16) COLLATE utf8_bin NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '1.新预约,2.批准,3.不批准',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `drive_request`
--

INSERT INTO `drive_request` (`id`, `type`, `name`, `sex`, `mobile`, `province`, `city`, `email`, `plan_buy_time`, `expect_feedback_time`, `status`, `update_time`, `record_time`) VALUES
(1, 1, 'weqweq', 1, '13422223333', '天津市', '河东区', 'qqqq@111.com', '', '', 2, '2013-02-01 14:03:03', 1359727068);

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `publish_time` int(10) unsigned NOT NULL,
  `level` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '查看等级',
  `status` tinyint(3) unsigned NOT NULL COMMENT '1.正常.2.隐藏',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`id`, `title`, `content`, `publish_time`, `level`, `status`, `update_time`, `record_time`) VALUES
(1, 'q1231231', 'wdwafd\nsadf\nsa\nd\nsadf\nwwwwww\nsad\nf\n\nsdf\nad', 1360166400, '1,2,4', 3, '2012-12-31 10:04:20', 1356948260),
(2, '行程11', '生活方式看过来范德萨翻过筋斗粪金龟\n速度见风使舵景福宫就\n上篮得分估计三段论法价格低示范岗', 1357228800, '3,4', 1, '2013-01-03 16:09:06', 1357229346),
(3, '行程22', '哦撒旦魂飞魄散旧番gdsfgdsfgdsfgdsg\n\n但是房管局塑料袋景福宫 \n是冠军联赛党纪国法', 1357228800, '3,4', 1, '2013-01-03 16:09:26', 1357229366),
(4, '啊啊', 'a  是搭撒', 1360080000, '', 1, '2013-01-07 12:44:23', 1357562663);

-- --------------------------------------------------------

--
-- 表的结构 `job_offers`
--

CREATE TABLE IF NOT EXISTS `job_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '职位名称',
  `count` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '人数',
  `location` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '工作地点',
  `experience` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '工作年限',
  `education` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '学理论',
  `desc` text COLLATE utf8_bin NOT NULL COMMENT '职位描述',
  `responsibility` text COLLATE utf8_bin NOT NULL COMMENT '职责',
  `qualification` text COLLATE utf8_bin NOT NULL COMMENT '资格',
  `status` tinyint(3) unsigned NOT NULL COMMENT '状态 1.有效,2.无效',
  `publish_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `expire_time` int(10) unsigned NOT NULL COMMENT '截止时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `job_offers`
--

INSERT INTO `job_offers` (`id`, `title`, `count`, `location`, `experience`, `education`, `desc`, `responsibility`, `qualification`, `status`, `publish_time`, `expire_time`, `update_time`, `record_time`) VALUES
(3, 'erwagsdg', 0, '', '0', '0', '', '', '', 1, 1357825532, 0, '2013-01-10 13:45:32', 1357825532),
(4, 'sss', 0, '', '0', '0', '', '', '', 1, 1357825555, 0, '2013-01-10 13:45:55', 1357825555),
(5, 'sdadsad', 0, '', '0', '0', '', '', '', 1, 1357825587, 0, '2013-01-10 13:46:27', 1357825587),
(6, '123123', 2, 'sh', '3', '0', '阿双方萨芬', '1.是大丰收地方\n1.是大丰收地方\n1.是大丰收地方', '1.使大地方\n1.使大地方\n1.使大地方', 1, 1357825679, 1359561600, '2013-01-10 13:47:59', 1357825679),
(7, '231rwrqrewq', 23, '13123', '123123sadf', 'afdsaf', 'adsfsafdsf', 'asdfasfd', 'dasfgdfbg', 1, 1357826756, 1359475200, '2013-01-10 14:05:56', 1357826756),
(8, '123123123123', 1, '上海', '3年', '本科', '新世纪鼓励一种坦率的、交通的、沟通的文化，新世纪认为积极地互动交流是分享经验、互相学习提高的良好方式，广泛的交流与沟通有助于培养我们的长远眼光和胆识，帮助我们开拓事业的空间。我们一直努力营造一种开放的氛围。通过内部网、人力资源员工自助系统、部门内部交流等多种形式，大家可以公开表达自己的意愿，包括与公司领导的对话和座谈。任何级别的管理人员、公司的人力资源部每一天都希望和大家交流，经常听大家的意见，藉此来不断改进我们的工作', '新世纪鼓励一种坦率的、交通的、沟通的文化，新世纪认为积极地互动交流是分享经验、互相学习提高的良好方式，广泛的交流与沟通有助于培养我们的长远眼光和胆识，帮助我们开拓事业的空间。我们一直努力营造一种开放的氛围。通过内部网、人力资源员工自助系统、部门内部交流等多种形式，大家可以公开表达自己的意愿，包括与公司领导的对话和座谈。任何级别的管理人员、公司的人力资源部每一天都希望和大家交流，经常听大家的意见，藉此来不断改进我们的工作', '新世纪鼓励一种坦率的、交通的、沟通的文化，新世纪认为积极地互动交流是分享经验、互相学习提高的良好方式，广泛的交流与沟通有助于培养我们的长远眼光和胆识，帮助我们开拓事业的空间。我们一直努力营造一种开放的氛围。通过内部网、人力资源员工自助系统、部门内部交流等多种形式，大家可以公开表达自己的意愿，包括与公司领导的对话和座谈。任何级别的管理人员、公司的人力资源部每一天都希望和大家交流，经常听大家的意见，藉此来不断改进我们的工作', 1, 1359726363, 1362758400, '2013-02-01 13:46:03', 1359726363);

-- --------------------------------------------------------

--
-- 表的结构 `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL COMMENT '媒体类型',
  `filename` varchar(128) CHARACTER SET utf8 NOT NULL,
  `title` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `desc` varchar(512) COLLATE utf8_bin NOT NULL COMMENT '描述',
  `thumbnail` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `content_type` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `level` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `show` tinyint(3) unsigned NOT NULL,
  `theme` int(10) unsigned NOT NULL COMMENT '搜索用类型',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `media`
--

INSERT INTO `media` (`id`, `type`, `filename`, `title`, `desc`, `thumbnail`, `content_type`, `level`, `show`, `theme`, `update_time`, `record_time`) VALUES
(17, 2, '12313121357837769.png', '1231312', '12314214234', '', 'image/png', '', 1, 1, '2013-01-10 17:09:29', 1357837769),
(14, 2, 'robotbo1357328717.png', 'robotbo', 'ashdfksg', 'robotbo1357328717s.png', 'image/png', '1,2,3,4,5', 1, 1, '2013-01-04 19:45:17', 1357328717),
(15, 3, '售后服务手册1357328886.doc', '售后服务手册', '售后服务手册', '', 'application/msword', '1,2,3,4,5', 0, 1, '2013-01-04 19:48:06', 1357328886),
(16, 2, '12313121357837737.png', '1231312', '12314214234', '', 'image/png', '', 1, 1, '2013-01-10 17:08:57', 1357837737),
(18, 2, '12313121357837893.png', '1231312', '12314214234', '', 'image/png', '', 1, 1, '2013-01-10 17:11:33', 1357837893),
(19, 3, '13dsafsf1357837967.psd', '13dsafsf', 'asdfsadfsafd', '', 'image/vnd.adobe.photoshop', '1,2,3,4,5', 0, 100, '2013-01-10 17:12:47', 1357837967),
(20, 3, 'adsf1357838039.doc', 'adsf', '', '', 'application/msword', '1,2,3,4,5', 0, 100, '2013-01-10 17:13:59', 1357838039),
(21, 2, '1231231358097503.png', '123123', '12232354345', '', 'image/png', '', 1, 4, '2013-01-13 17:18:23', 1358097503);

-- --------------------------------------------------------

--
-- 表的结构 `mobile_auth`
--

CREATE TABLE IF NOT EXISTS `mobile_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) CHARACTER SET utf8 NOT NULL,
  `code` varchar(16) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) unsigned NOT NULL COMMENT '1.未认证,2.已认证',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '显示类型',
  `title` varchar(256) COLLATE utf8_bin NOT NULL COMMENT '标题',
  `content` text COLLATE utf8_bin NOT NULL COMMENT '内容',
  `img` varchar(1024) COLLATE utf8_bin NOT NULL COMMENT '图片地址',
  `publish_time` int(10) unsigned NOT NULL COMMENT '时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态：1.显示,2.不显示',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL DEFAULT '1353169805',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `type`, `title`, `content`, `img`, `publish_time`, `status`, `update_time`, `record_time`) VALUES
(1, 1, '西安咸阳机场T3航站楼 首次启用巡警平衡两轮车', '        西安网讯：(记者 李林)自2012年5月3日， 7时35分第一架航班从新建成的T3航站楼起飞，标志着西安咸阳国际机场自此迈入3座航站楼、双跑道运营的新时代。可在T3航站楼投入使用后，难为了每天在航站楼内巡逻的民警，因为T3航站楼实在太大，民警人数有限，这就影响了巡逻的民警的处警速度。\n        据了解，针对T3航站楼投运后，航站楼派出所辖区面积成倍增加、巡逻半径急剧增大、影响接处警速度这一新情况，机场公安局及时为航站楼派出所配置了四轮电瓶巡逻车和科技含量更高、更便捷的自平衡两轮电动车共4辆，投入使用后，大大地提升了该所的警务效能，也提大大高了咸阳机场的航空安保能力。据悉该所启用自平衡两轮电动警务用车在西北地区公安警务用车中尚属首次。', '1.jpg', 1337616000, 1, '2012-11-17 17:39:38', 1353168437),
(2, 2, '上海新世纪机器人有限公司诚邀您参与2012年第111届广交会', '        中国进出口商品交易会，又称广交会，创办于1957年春季，每年春秋两季在广州举办，迄今已有近五十年历史，是中国目前历史最长、层次最高、规模最大、商品种类最全、到会客商最多、成交效果最好的综合性国际贸易盛会。广交会由48个交易团组成，有数千家资信良好、实力雄厚的外贸公司、生产企业、科研院所、外商投资/独资企业、私营企业参展。 \r\n        上海新世纪机器人公司参加此次展会并借此优质贸易平台，向世界各地的买家展示其独有的创新产品，同时也将展示企业成熟的技术成果和强大的研发创新能力。新世纪机器人以提供客户智能、绿色、个性化的出行体验为使命，进一步改善人们工作、学习、娱乐和生活的品质。届时，上海新世纪机器人公司将推出多款新品及相关技术，欢迎广大经销商及合作伙伴前来洽谈咨询。\r\n        展位号：摩托车馆12.1，I39-I40展位（动态展示区）； 自行车馆16.2，G22展位（静态展示区） \r\n        展览时间：2012年3月15日—19日 ；   地址：广州市珠海区阅江中路388号 ', '2.jpg', 1333209600, 1, '2012-11-17 17:05:10', 1353168729),
(3, 2, '央视集中报道“智能单警”广州高铁春运实战应用', '        1月7日，中央电视台新闻频道的整点新闻集中报道了广州高铁南站使用新世纪机器人公司提供的“智能单警”安保春运情况。\r\n“在广州南站，无论你在哪个方位，只要对讲机一呼叫，警察踩上“智能单警车”一分钟之内就可以出现在你的面前。元月6日，在广州高铁南站，一款只有两个轮子，被称为机器人“智能单警车”的自动平衡警用巡逻车首次在华南地区亮相。这款“智能单警车”甚至还可以“坐”电梯，实现不同楼层之间的巡逻。  \r\n        据广铁警方介绍，在这款车投入使用以前，民警从南站三楼候车大厅的最东头走到最西头大概需要4到5分钟。现在，踩上“智能单警车”，民警只要通过对讲机一呼叫，一分钟之内就可以出现在你的面前，大大提高了接警、出警效率。” \r\n        新世纪机器人公司的“智能单警”巡逻车首次亮相高铁领域即承担了2012年春运浪潮，这款新世纪机器人公司的主打专业版产品目前已实现了公安、武警、城管、边检等多个领域的应用，市场反响巨大。', '3.jpg', 1326124800, 1, '2012-11-17 16:49:31', 1353169180),
(4, 2, '新世纪机器人“智能单警”巡逻车频现城市街头', '         近期，一款名为“智能单警”的高科技警用巡逻车频频出现在各大主流媒体的视线中，其威武的外形、独特的驾驶方式以及高科技的性能使人们惊呼“未来警察”时代的来临。那么，究竟什么是“智能单警”呢？--据了解“智能单警”是由上海新世纪机器人有限公司研发生产的一种装载智能系统的新型警用移动平台，其基本形态为自平衡两轮电动车。该车体积小、操作简便、坐立两用、节能环保、搭载高科技装备，主要应用于街道、广场、机场及码头等人群密集、空间狭窄的区域，能够辅助警务人员进行日常巡逻工作，极大扩大了警务人员的巡视范围与执勤半径。“智能单警”最高时速为20公里，续航里程达40公里，车身携带有高清摄像头及存储仪器，可将现场实时画面同步传回指挥中心，快速处理各类突发性事件，极大加强了警方的处警能力。 \r\n12月22日，2011年全国公安厅局长会议及相关成果展示在北京举行。“智能单警”作为科技强警的代表装备在现场展现了其傲人的身姿。', '4.jpg', 1325174400, 1, '2012-11-17 16:50:27', 1353169180),
(5, 1, '广深港高铁广深段开通，“智能单警”挺进高铁领域', '        12月26日正值武广高铁开通两周年，广深港高铁广深段也于当日上午10时正式开通，这意味着深圳也进入“高铁时代”。\r\n        与此同时，在高铁广州南站和深圳北站的候车大厅内，新世纪机器人公司的明星产品“智能单警”也作为新一代科技强警装备，被用于常态巡逻执勤的工作中。\r\n        “智能单警”被外界称为新一代智能单兵巡逻车，是当今世界上最先进的智能两轮车，它具有灵活便捷、节能环保、坐立两用以及物联网等先进理念。在警务人员巡逻执勤过程中，能够极大提高其巡逻半径、增加巡视视野、现场采集证据、实时图像传输、并能够随车附带大量警务设备，极大保障了高铁展台及候车大厅的安全秩序。', '5.jpg', 1325088000, 1, '2012-11-17 17:05:14', 1353169644),
(6, 1, '新世纪机器人“I-ROBOT”闪耀北京高端奢侈品展', '        红毯席地，赤幅掩阶。2011年12月23-26日，以“奢华•经典•品味”为主题，旨在帮助成功人士完成低调奢华的精英生活塑造，备受国内外媒体关注的“2011北京国际顶级私人物品、高端生活展览会”在北京国际贸易中心国贸展厅隆重登场。本届展会展出面积逾20,000平方米，近500家国内外顶级品牌和高端珠宝商参展，同时还有众多高端生活物品收藏鉴赏人士及团体参与其中。\r\n        上海新世纪机器人有限公司的个人版“i-robot”首次亮相此类高端奢侈品展会，作为高科技和时尚奢华的神奇组合，展会期间新世纪公司的展台前始终人头攒动，“i-robot”时尚的外观以及令人瞠目结舌的驾驭体验都为这冬日的北京带来一抹难以忘却的身影。\r\n        本次展会邀请了画廊机构、拍卖行、艺术基金、艺术博物馆、艺术家、收藏家参与其中，并特别邀请了来自日本、韩国、意大利、泰国、中国香港、中国台湾、瑞士、中东等国家和地区的驻华使领馆工作人员、国际采购商和专业买家到会，观众数量达到30,000人次。', '6.jpg', 1325088000, 1, '2012-11-17 17:45:51', 1353169644),
(7, 1, '《神行太保》--央视栏目远赴上海报道新世纪机器人产品', '        随着公司品牌及产品知名度的不断提升，新世纪机器人产品所包涵的科技性、时尚性、实用性以及未来感越来越受到大众的关注。近期，中央10台《我爱发明》栏目组从北京远赴上海的新世纪总部和杭州湾生产基地进行实地拍摄，通过现场测试、街头采访以及趣味演示等环节为大众揭开了新世纪产品神秘的面纱。\r\n        “随着信息技术的快速发展，人们的生活、工作、出行变得越来越智能、越来越方便。本期节目介绍的智慧两轮车，依靠陀螺仪和倒立摆原理，人骑在上面，身子往前倾，车子就往前走；人往后倒，车子就能倒退。使驾驶者在驾驶过程中，可坐可立，能够敏锐的捕捉到驾驶者的行走意念，成为驾驶者身体的延伸。”', '7.jpg', 1322582400, 1, '2012-11-17 16:30:05', 1353169805),
(8, 1, '新世纪新交通工具亮相宁波智博会', '        9月2日-4日，2011年中国（宁波）智慧城市技术与应用产品博览会（简称“中国智博会”），在宁波国际会展中心盛大启幕。首届“中国智博会”以“荟萃智慧应用，建设智慧城市”为主题，来自通讯、交通、IT、物流等各个领域的参展商和业内外人士，就智慧城市及相关产业最新发展动态、产业发展导向、前沿研究、最新技术标准等进行了深入交流和讨论。\n        本次展会中，国内外众多参展单位都带来了新颖、环保、凝结了高科技元素的产品、解决方案和概念性方案。令人目不暇接的展览会上，上海新世纪机器人有限公司的T-ROBOT独领风采--其造型独特吸引了诸多参观者的目光。该产品作为国内首台自主研发的智能两轮车，能够敏锐地通过感知器捕捉到的驾驶者身体行进趋势，真正做到了“随心而动”，成为驾驶者身体的延伸。\n        T-ROBOT的演示现场，很多参观者体验了前所未有的的驾驶感受，包括央视记者也耐不住好奇心驾驶体验了一把。T-ROBOT由于灵活便捷、节能环保以及具有物联网的特性，已在公安领域得到广泛应用，被美赞为“智能单警”。目前在北京天安门广场以及上海浦东国际机场均能看到其身影。\n        据现场技术人员介绍，T-ROBOT是一种新型智能交通工具。它的优越之处在于：自平衡系统，超强平稳性；双保险安全模块，具备限速系统，通过减速按钮可即时减速完全不需要依靠人为减速，安全性高；独特的人性化设计，驾驶者在驾驶过程中，可坐可立，轻松舒适；高端中央处理器和无线图传系统，可将周边360°实时情况同步传输至后台系统。', '8.jpg', 1315152000, 1, '2012-11-17 16:30:52', 1353169805),
(9, 1, '“智能单警”助力公安系统', '        “智能单警”是一种装载智能系统的新型警用移动平台，其基本形态为自平衡电动两轮车。该车体积小、操作简便、坐立两用、节能环保，主要应用于街道、广场等人群密集、空间狭窄的区域，辅助警务人员的日常巡逻工作，扩大了警务人员的巡视范围与执勤半径。该产品由上海新世纪机器人有限公司研发生产。 \r\n        “智能单警”最快时速为20公里，车身携带了高清摄像头及存储仪器，可将现场实时画面同步传回指挥中心，快速处理各类突发性事件，极大加强了警方的处警能力。', '9.jpg', 1314288000, 1, '2012-11-17 17:05:18', 1353169805),
(10, 1, 'X-ROBOT自平衡两轮电动车首次亮相春季广交会', '        4月15日-19日，第109届第一期春季广交会在广州开幕，上海新世纪机器人有限公司此次隆重推出完全依靠自身研发力量，历经多年苦心研发而成的X-ROBOT自平衡两轮电动车作为主导参展产品，引来国内外众多客商的关注和兴趣。\r\n        该产品被公安部命名为“智能单警”，是一种新型智能交通工具。它的优越之处在于：自平衡系统，超强平稳性；双保险安全模块，具备限速系统，通过减速按钮可即时减速完全不需要依靠人为减速，安全性高；独特的人性化设计，驾驶者在驾驶过程中，可坐可立，轻松舒适；高端中央处理器和无线图传系统，可将周边360°实时情况同步传输至指挥部，有效无限延伸安全监控范围。\r\n        很多客商进入展区后，争先试驾了两轮车，纷纷表示：“人性化”、“外观款式非常新颖”、“平衡性好，功能齐备”。\r\n        广交会后，上海新世纪机器人公司不断收到来自欧美、阿联酋、俄罗斯等各国客商以及国内客商的邮件，热切地表达了希望同新世纪深入合作、建立贸易伙伴关系的意愿。', '', 1305820800, 1, '2012-11-17 16:40:52', 1353169805),
(11, 1, '智能单警”实时保障两会召开', '        3月2日，北京天安门广场，警察统一装备了被称为“智能单警”的自平衡两轮电动车，确保两会安保。这种智能警车最快时速为20公里，同时自带高清摄像头，能够实时将画面传回指挥中心，该产品由上海新世纪机器人公司自主研发生产。', '11.jpg', 1305820800, 1, '2012-11-17 16:40:19', 1353169805),
(12, 1, '“智能单警”亮相天安门', '        新年第一天，北京市公安局天安门地区分局的民警首次驾驶着自平衡两轮电动车——“智能单警”在天安门广场巡逻。这种新型的警用装备一亮相，立即引起过往群众的浓厚兴趣，大家觉得这样的警用巡逻车使民警和群众之间减少了距离感。据了解，这款电动“智能单警”机器人属上海新世纪机器人有限公司开发制造。 目前，“智能单警”机器人已经批量生产，其最大特点是外观新潮，操控灵活便捷而且低碳环保。', '', 1293811200, 1, '2012-11-17 16:40:19', 1353169805),
(13, 1, 'ekhqwherwqerqwer', '<p>&nbsp; &nbsp; &nbsp; &nbsp;为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; 为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为 &nbsp; &nbsp; &nbsp;何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>\r\n<p>为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i为何前后而后请我二级风i</p>', '', 0, 1, '2013-01-07 11:08:41', 1353169805),
(14, 1, 'wwwwwwww', '<p>&nbsp;wsadkjhdlfhosihwiejrjwqer</p>\r\n<p>wefsnfjsdlfjsa</p>\r\n<p>qernwkerjnkqwer</p>', 'upload/news/2013_01_11/112927_1964.png', 0, 1, '2013-01-11 04:34:05', 1353169805),
(15, 1, '四度空间法兰克是否', '<p>&nbsp;啊三大三大</p>', 'upload/news/2013_01_11/113353_1332.png', 1357875233, 1, '2013-01-11 04:34:02', 1353169805),
(16, 2, '12133123', '<p>&nbsp;阿飞年代里集散地法律；&nbsp;</p>', 'upload/news/2013_01_11/113446_1048.png', 1357875286, 1, '2013-01-11 04:33:58', 1353169805),
(17, 1, '"sdafdf"asdfasfd', '2012年11月19日，沐浴着"十八大"的春风，上海新世纪机器人有限公司在位于上海市金茂君悦大酒店内举办了主题为"车随心动我行我秀——i-ROBOT”代步机器人新品发布会。社会各界领导及专家出席了会议，50余家媒体以及经销商代表云集沪上出席了本次发布会。为了深入贯彻我国政府大力发展低碳环保科技产业，上海新世纪机器人有限公司坚持科技创新，顺应市场需求成功研发智慧环保代步产品，以缓解日益严峻的交通压力。作为近年来交通产业的新秀，新世纪机器人有限公司的创新理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球的“交通革命”，以更加新颖的代步理念引领时尚潮流。\r\n\r\n本次发布会邀请了政府领导、经销商、全国新闻媒体及社会各界朋友。其中，全国人大教科文卫委员会委员，中国智能交通协会理事长，科技部原副部长，吴忠泽先生上台发言表述自己对于新世纪代步机器人未来的发展的期望！\r\n\r\n新世纪机器人有限公司董事长郭启寅先生上台回答记者提问。他从宏观大局到区域经济阐述新世纪今后的发展道路，将为消费者提供一流的产品、把创新科技建设好、发展好！\r\n\r\n本次活动对于节能科技产业的发展前景、X-ROBOT代步机器人今后的发展道路进行畅想！ 作为创始初期就致力于全球领先的新能源机器人研发、生产和销售的新世纪机器人有限公司，始终强调发展自身强大的研发和创新能力，不断引进国内外高端科研人才，为新能源机器人提升人们生活质量而孜孜追求。', 'upload/news/2013_02_03/174321_1549.jpg', 1357878270, 1, '2013-02-03 09:43:21', 1353169805),
(18, 1, '1111111111111', '<p>&nbsp;</p>\r\n<p style="line-height: 200%; text-indent: 18pt"><span style="line-height: 200%; font-size: 12pt">&nbsp; 2012</span><span style="line-height: 200%; font-size: 12pt">年12月8日，由上海世贸汽车捷豹路虎红柳路4S中心与上海机器人有限公司共同主办的&ldquo;双品牌4S中心首次试乘试驾体验会&rdquo;在上海世贸汽车捷豹路虎红柳路4S中心正式启动，作为本次活动专用代步机器人公司，上海新世纪将旗下饱经&ldquo;实战&rdquo;考验的先进&ldquo;机器人们&rdquo;带到活动现场，成为本次试驾活动的亮点。</span></p>\r\n<p align="left" style="text-align: left; line-height: 200%; text-indent: 24pt"><span style="line-height: 200%; font-size: 12pt">作为近几年交通产业的新兴之秀，新世纪公司始终坚持&ldquo;</span><span style="line-height: 200%; font-size: 12pt">不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球&lsquo;交通革命&rsquo;&rdquo;的企业理念，</span><span style="line-height: 200%; font-size: 12pt">以其强大的研发和创新能力在</span><span style="line-height: 200%; color: black; font-size: 12pt">新能源机器人代步工具这一</span><span style="line-height: 200%; font-size: 12pt">领域独树一帜，并将&ldquo;创新，引领新世纪&rdquo;的企业理念贯穿至一切经营活动中，并通过不断的创新技术、工艺以及创新精神，努力为提高人们的生活质量、改善日益拥堵的道路交通、以及尾气排放造成的环境污染而不断进行革新。</span></p>\r\n<p align="left" style="text-align: left; line-height: 200%; text-indent: 24pt"><span style="line-height: 200%; font-size: 12pt">在本次试乘试驾活动中，新世纪带来了三款民用版、具有世界最先进技术的高科技创新代步机器人。在试驾中，这三款规格不同的&ldquo;电子宠物&rdquo;颇为抢眼，不仅需要接受路况的考验，还要在专门设立的&ldquo;障碍赛&rdquo;中大显身手。在这三者之中，&ldquo;阳光天使&rdquo;i-ROBOT-LA以及&ldquo;陆地冲浪&rdquo;i-ROBOT-SC，不仅能敏锐地捕捉到行走的意念，更能将智能、时尚、安全、节能汇聚一身。在&ldquo;障碍赛&rdquo;中，i-ROBOT-LA和i-ROBOT-SC驾驭感十足，在长约10M的跑道中均能以30-90KG的载重灵敏且匀速行驶，最高行驶速度约为10KM/H，极大地降低了行驶过速带来的安全隐患。并且由于机身小巧，无论原地360&deg;转弯或是起伏路面前行，i-ROBOT-LA和i-ROBOT-SC所展现的&ldquo;灵活感&rdquo;均让体验者们赞不绝口。据现场工作人员介绍， i-ROBOT-LA以及i-ROBOT-SC，均采用了大容量锂电池，在满电情况下根据地形以及载重条件约可行驶26公里。并且，因采用了高防水防尘设计，无论沙尘天气或是阴雨天气均可确保正常工作，免去了&ldquo;卡、锈、堵&rdquo;的麻烦。</span></p>\r\n<p align="left" style="text-align: left; line-height: 200%; text-indent: 24pt"><span style="line-height: 200%; font-size: 12pt">此外，适用于街道、广场、机场、大型场馆、旅游景区及高尔夫球场等人群密集、空间狭窄区域的&ldquo;i-ROBOT-BO&rdquo;更是霸气十足。据了解,i-ROBOT-BO是一款为专业越野玩家设计的移动平台。它的最高时速为20公里，续航里程可达35公里，且具有稳定性强、操作简便、坐立两用等特点，更为未来的智能升级预留了足够的空间。</span></p>\r\n<p><span style="line-height: 150%; font-size: 12pt">&nbsp;</span><span style="line-height: 150%; font-size: 12pt">为了更好地服务于社会，新世纪机器人公司极为注重产品质量，通过引进国际上先进的生产管理和质量监控体系，在全自动生产流水线上实现新能源机器人代步工具的全程测试与生产。同时，公司还建立了完善的测试检验实验室，以确保产品质量能够符合专业领域的使用需求。相信在不久的将来，新世纪会有更多的高科技机器人问世，全面推进交通产业的&ldquo;稳步&rdquo;发展！</span></p>', '', 1359726180, 1, '2013-02-03 04:09:04', 1353169805);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dealer_login_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '1.正常.2.隐藏',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `dealer_login_id`, `content`, `status`, `update_time`, `record_time`) VALUES
(1, 1, 'sadfjasbldfbsakdjfb\r\nsadfbkasdfkas\r\n''sadjflkbxcmnzbccmbcmvkhkh3453\r\n\r\n2\r\n34\r\n243\r\n23\r\n45\r\n34', 1, '2012-12-31 10:42:05', 1356950525),
(2, 1, 'qqqqqqqqqqqqqqqqqq\r\nsadfbkasdfkas\r\n''sadjflkbxcmnzbccmbcmvkhkh3453\r\n\r\n2\r\n34\r\n243\r\n23\r\n45\r\n34', 1, '2012-12-31 10:45:03', 1356950703),
(3, 1, 'sdasfdsafd113231231* 12111\n\n\necho', 1, '2012-12-31 14:18:52', 1356963532);

-- --------------------------------------------------------

--
-- 表的结构 `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int(10) unsigned NOT NULL COMMENT '页面id',
  `title` varchar(500) DEFAULT '' COMMENT '页面标题',
  `content` text COMMENT '页面内容',
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页内容表';

--
-- 转存表中的数据 `page_content`
--

INSERT INTO `page_content` (`id`, `title`, `content`, `status`) VALUES
(1, '大客户服务', '    <div class="great">\r\n    	<div class="great-t bg2">\r\n        	<h2>大客户服务</h2>\r\n            <p>每天，新世纪机器人公司的员工都在努力为我们的企业客户提供量身定制的解决方案。我们会与您共同研究、探讨，用我们的专业知识和经验帮您正确使用我们的新型代步工具，同时帮您设计最佳的贷款方案，以期满足贵公司的具体需求。新世纪机器人大客户业务计划让您节省成本，节约时间，还能为您的生活与旅程带来无限乐趣。</p>\r\n        	<p  style="padding-top:10px;">\r\n                作为新世纪机器人的大客户，您还可以享受更多优惠与增值服务：\r\n                <br/>大客户购车专享优惠\r\n                <br/>大客户特惠活动\r\n                <br/>大客户市场活动\r\n                <br/>24小时道路救援\r\n                <br/>x-robot代步机器人信贷服务\r\n                <br/>预约客户上门服务\r\n            </p>\r\n        </div>\r\n        <div class="great-m bg2">\r\n        	<h3>购车优惠 </h3>\r\n            <p>针对在国内上市的5款不同的ROBOT车型，我们将为您提供相应的购车现金优惠，您可以实惠价格购得满意的车款。</p>\r\n            <h3>售后保障 </h3>\r\n            <p>购买ROBOT车辆可以享受ROBOT独有的2年1000公里免费保修保养政策，您可安心驾驶，免除后顾之忧。</p>\r\n            <h3>ROBOT金融方案</h3>\r\n            <p>您可享受到ROBOT金融根据您的需求量身定制的汽车贷款方案，让您轻松拥有ROBOT座驾。\r\n            	<br/>欲了解大客户优惠专案详情，敬请联络<a class="blue" href="##">ROBOTO或当地ROBOT特许经销商</a>。\r\n            </p>\r\n        </div>\r\n    </div>', 1),
(2, '售后服务', '<div class="sale-t bg2">\r\n<div class="sale-t-t"><a href="#"><img src="/htdocs/images/icon-1.png" alt="" />使用锦囊</a>                 <a href="#"><img src="/htdocs/images/icon-2.png" alt="" />维修网点</a></div>\r\n<h2>售后服务</h2>\r\n<p>用户自购车8到15天内，发现车辆有性能问题，经过我公司专业人员检测确认，车辆外观及相关附件完好，可申请执行换货，换货不能更改购车型号，换货车辆按照自换货日起计算保修期。</p>\r\n<p>用户自购车7天内，发现车辆有严重质量问题，经过我公司专业人员检测鉴定，车辆外观及相关附件完好，可申请退货。</p>\r\n<p>对底盘车架;减速箱;伸缩管组件；感应踏板；主控制板;平衡传感器组件；充电器；电机和内部线路的材料和工艺问题，提供一年时间的保修。对于驻车支架、把手、脚踏垫、电池、车轮、车胎、整机外壳及其它附件，提供180天的保修。</p>\r\n<p><a download="" href="&lt;?php echo $this-&gt;url(">&quot;&gt;更多售后服务条例下载</a></p>\r\n</div>\r\n<!--\r\n        <div class="sale-m bg2">\r\n            <h3>X-ROBOT原厂配件</h3>\r\n            <div class="fix">\r\n                <div class="l">\r\n                    <ul>\r\n                        <li><a><img/></a></li>\r\n                        <li><a><img/></a></li>\r\n                        <li><a><img/></a></li>\r\n                    </ul>\r\n                </div>\r\n                <div class="r">\r\n                    <h3>刹车片</h3>\r\n                    <p class="w325">原装BMW刹车片，采用超强耐热性优质材料，在特有的精湛工艺和严格标准下研发而成，在高温和持续刹车时能依然保持较强制动力。</p>\r\n                    <p><a class="btn1 mt10">打造您的ROBOT</a></p>\r\n                </div>\r\n            </div>\r\n        </div>-->\r\n<div class="sale-m1 bg2 fix">\r\n<div class="l">\r\n<h3>服务预约</h3>\r\n<p>自产品验收完毕当天起7天内，产品本身存在缺陷并经过我公司技术人员确认，可以申请执行退货程序。自产品验收完毕当天起8到15天内，产品缺陷经过确认的，可以申请执行换货程序。超出15天作保修处理。退换货申请单必须附我公司技术人员确认单，经我公司核准通过后执行。用户应当在7天内将不良品返回我公司，逾期不予办理，后果由用户承担。</p>\r\n<div><a href="##">服务表单下载</a></div>\r\n</div>\r\n<img width="419" height="278" class="r" src="/userfiles/i-16.jpg" alt="" /></div>\r\n<div class="sale-m2 bg2 fix"><img width="190" height="190" class="l" src="/userfiles/i-17.jpg" alt="" />\r\n<div class="r">\r\n<h3>保修及保养服务</h3>\r\n<p>在保修期内出现问题的产品，经核对购买发票、保修卡和机身条码后，代理商向用户提供免费保修服务。维修发生的人工费管理费等由代理商承担。在保修期外出现的问题，由当地代理商负责维修，代理商向用户收取材料费和服务费。如需返回公司分中心维修，我公司将向代理商收取产品往返运费。</p>\r\n<div><a href="##">报修表单下载</a></div>\r\n<h3 class="pt20">售后市场活动</h3>\r\n<p>我公司将安排技术员到代理商处帮忙维护、实地培训。帮助代理商提高售后服务水平。</p>\r\n<div><a href="##">观看现场讲解、体验视频</a></div>\r\n</div>\r\n</div>', 1),
(3, '商家联盟', '<div class="seller bg2">\r\n<h2>商家联盟</h2>\r\n<p>ROBOT油电混合动力技术，创造性的联合燃油动力与电动机动力。作为行业公认的强混合动力系统，油电混合动力意味着，既能单独使用汽油发动机动力或电动机动力作为能量来源，更可以将两种动力来源有效的联合起来，一同为车辆提供动力。于是让车辆涌现出令人叹服的澎湃动力与静谧、平顺的驾乘体验。与此同时，燃油消耗率也大幅降低，减少了碳排放量。</p>\r\n<ul class="fix vh">\r\n    <li><img alt="" src="/htdocs/images/s-1.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-2.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-3.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-4.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-5.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-6.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-7.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-8.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-9.jpg" /></li>\r\n    <li><img alt="" src="/htdocs/images/s-10.jpg" /></li>\r\n</ul>\r\n</div>', 1),
(4, '金融服务', '    <div class="finance">\r\n    	<div class="fin-t bg2">\r\n            <h2>保险业务</h2>\r\n            <h3>享安全  行人生</h3>\r\n            <p class="p1">上海新世纪机器人有限公司联合品牌车险<br/>上海新世纪机器人有限公司现联合中国人民人寿保险有限公司为您竭诚提供专业、可靠、周到、贴心的驾驶保险方案。创新、安全、舒适与可控，您希望在我司产品上拥有的一切，在我们的保险服务中同样可以实现。</p>\r\n        </div>\r\n        <dl class="fin-t bg2 fix">\r\n        	<dt class="fl"><img src="<?php echo $this->url(''images/i-23.jpg'')?>"/></dt>\r\n            <dd class="fl">\r\n                <h2>贷款业务</h2>\r\n                <h3>无忧贷  行自由</h3>\r\n                <p class="p1">为客户提供符合需要的金融产品和服务，让您的i-ROBOT代步机器人梦想成真！<br/>\r\n                i-ROBOT代步机器人金融服务，包括标准贷款产品、标准弹性贷款产品两项金融产品，其优势在于：<br/>\r\n    您可以通过贷款拥有i-ROBOT代步机器人的所有权，提前享受驾驭i-ROBOT代步机器人的乐趣； 自由选择并升级您所钟爱的i-ROBOT代步机器人，拓展可拥有i-ROBOT代步机器人的范围； 把握家庭的资金积累，投资于其他的理财或保险组合，以获得更高回报； 节省企业现金支出，将资金用于商业运营并取得投资回报； 建立良好的个人信用纪录，助力未来的发展计划； 享有高端现场服务，由专人协助您完成贷款购车的每一个步骤。</p>\r\n                \r\n            </dd>\r\n        </dl>\r\n        \r\n    </div>', 1),
(11, '品牌介绍', '<div class="about-t bg2"><img src="/images/logo.jpg" class="l" alt="" />         <dl class="oh">             <dt>品牌简介</dt>             <dd>上海新世纪机器人有限公司（下称&ldquo;新世纪机器人&rdquo;）是以智能控制技术为核心，真正拥有自主知识产权和核心技术的新型科技企业。公司经过5年技术筹备，2010年在上海浦东成立，注册资本为5,000万人民币。公司主要致力于新能源机器人代步工具的研发、生产和销售，并以实现&quot;智能科技服务社会&quot;为自身发展定位的基本目标。</dd>         </dl></div>\r\n<div class="about-m bg2">\r\n<h3>创新，引领新世纪</h3>\r\n<dl>             <dt>新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创新能力，不断引进国内外高端科研人才，为新能源机器人能够便捷服务人们的每个细节功能而孜孜追求。 在质量参差的市场经济里，新世纪机器人始终秉承卓越品质，引进国际上先进的生产管理和质量监控体系，反复对产品检测实验，坚持领先的全自动一体化生产流水线。\r\n<p>我们坚信：创新，引领新世纪</p>\r\n目前，公司研制的创新产品&quot;x-robot&quot;系列产品是当今世界上最先进的代步机器人，具备智能环保、时尚科技等特征。其警用版本&quot;T-robot&quot;系列和民用版本 &quot;I-robot&quot;系列均已上市，并正在引领一场全新的&quot;科技交通&quot;革命。而我们诚邀您成为这场&quot;交通革命&quot;的弄潮者！             </dt>             <dd>                 <img src="/images/i-7.jpg" alt="" /><img src="/images/i-8.jpg" alt="" />             </dd>         </dl></div>', 1),
(12, '企业文化', '<div class="culture bg2 pr">\r\n<h2>企业精神</h2>\r\n<p>开拓进取，创新卓越</p>\r\n<h2>经营理念</h2>\r\n<p>创新，引领新世纪</p>\r\n<h2>核心思想</h2>\r\n<p>新世纪机器人是行动的巨人</p>\r\n<h2>价值观</h2>\r\n<p>每个创新，百尺竿头，我们只为更进一步，每次把控，开拓进取，我们追求创新卓越</p>\r\n<h2>企业愿景</h2>\r\n<p>和每一个伟大的公司一样，梦想越大成长历程就越艰难，但结果总是让人们惊异称奇，那些巨人企业：微软、IBM、苹果都是如此，现在是&quot;新世纪机器人&quot;。新世纪机器人公司的创建理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球&quot;交通革命&quot;。</p>\r\n<h2>企业使命</h2>\r\n<p>新世纪机器人要改善的是您的生活         <br />\r\n我们的使命是为我们的客户提供智能、绿色、个性化的出行体验，从而改善他们的工作、学习、娱乐、生活情况。真正体会&quot;悦智慧&nbsp;&nbsp;享自由&quot;的乐趣。</p>\r\n<ul>\r\n    <li><img src="/images/i-20.jpg" alt="" /></li>\r\n    <li><img src="/images/i-21.jpg" alt="" /></li>\r\n    <li><img src="/images/i-22.jpg" alt="" /></li>\r\n</ul>\r\n</div>', 1),
(13, '尖端科技', '<ul class="top pr">\r\n    <li><img src="/images/i-6.png" class="l i1" alt="" />             <dl class="l">             	<dt>造就全球交通革命</dt>                 <dd>\r\n    <p>新世纪机器人公司的创建理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球&ldquo;交通革命&rdquo;，这就是我们的X-ROBOT代步机器人系列产品。</p>\r\n    </dd>             </dl></li>\r\n    <li><img src="/images/i-1.png" class="r" width="600" height="340" alt="" />             <dl class="l " style="padding: 24px 0 0 63px;">             	<dt>和谐共荣的人文思想</dt>                 <dd>X-ROBOT代步机器人采用系统化的设计方法(Systematic Design Approach)与以人为本的设计理念(Human Centre Design)，透过人因工程脉络与使用者的探访与调查，探究出人们真正的需求和期望，使得此一轻量化移动机器人代步工具能直觉简易的操作，符合大众对移动代步工具的基本安全与信赖需求。                        <br />\r\n    同时，X-ROBOT代步机器人完整阐释了共生、乐趣、便利性和环境这四大人文价值核心：                         <br />\r\n    「共生」-人、载具和城市相互赖以为生，                         <br />\r\n    「乐趣」-投注个人情感，                         <br />\r\n    「便利性」-配合活动进行各种模式变换，                         <br />\r\n    「环境」-对环境与人友善，并且吸引人们使用。                   </dd>             </dl></li>\r\n    <li>\r\n    <div class="l p68">\r\n    <div class="l"><img src="/images/i-2.jpg" alt="" />\r\n    <p>观看视频</p>\r\n    </div>\r\n    <div class="l"><img src="/images/i-3.jpg" alt="" />\r\n    <p>观看视频</p>\r\n    </div>\r\n    </div>\r\n    <dl class="l" style="padding-top:50px;">             	<dt>驾驭方式的绿色革命</dt>                 <dd>&ldquo;驾驭方式的绿色革命&rdquo;<br />\r\n    这是一项全新的发明，是一件激动人心的产品，它证明了人类创造力的伟大&mdash;&mdash;精巧、安全、实用、富有想象力和驾驶乐趣，完全无碳排放，这就是X-ROBOT，我们有理由相信它将成为人类地面交通方式的未来，我期望将这一份福祉率先分享给每一个中国人，此刻，未来已来。</dd>             </dl></li>\r\n</ul>', 1),
(21, 'ROBOT生活', '<div class="live">\r\n<h2>ROBOT的原理</h2>\r\n<h3>新世纪机器人要改善的是您的生活方式</h3>\r\n<p class="p1">我们的使命很简单，就是为我们的客户提供智能、绿色、个性化的出行体验，从而改善他们的工作、学习、娱乐、生活情况。我们保证每款新世纪机器人拥有者都是出行灵活而富有效率的，并且还会将实实在在的环保意识融入到日常生活中。 		   自您拥有一辆属于自己的i-robot后，您就会明白，它不光便捷了您的生活，它还带来了一种全新的生活方式。您会明显的感受到生活质量的提高，处处伴随简单、自由、随心。 		   i-robot同步的网上社区还会有千千万万的用户和您一起感受分享，您的每个关于i-robot的心情都会有人来互动回应，在i-robot的圈子中，您的每个感受都很重要。</p>\r\n<ul class="fix">\r\n    <li><a href="#"><img src="/images/v-1.jpg" alt="" /></a></li>\r\n    <li><a href="#"><img src="/images/v-2.jpg" alt="" /></a></li>\r\n    <li><a href="#"><img src="/images/v-3.jpg" alt="" /></a></li>\r\n</ul>\r\n<p class="p2"><a href="/index.php/Main/Download" target="_blank">更多内容分享</a></p>\r\n</div>', 1),
(14, '联系我们', '<p><style type="text/css">\r\n    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}\r\n    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}\r\n</style> <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script> <script type="text/javascript">\r\nvar pointList={1:new BMap.Point(121.599836,31.253353),2:new BMap.Point(116.330158,39.971938)};\r\nvar markList={1:[{title:"上海新世纪机器人有限公司",content:"地址：上海浦东新区新金桥路58号银东大厦27楼A<br/>邮编：201206<br/>电话：+86-021-61086568<br/>传真：+86-021-61086567<br/><br/>邮箱：market@x-robot.com.cn<br/>网址：www.x-robot.com.cn",point:"121.599692|31.252828",isOpen:0,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}\r\n         ],2:[{title:"上海新世纪机器人有限公司(北京分部)",content:"地址：北京市海淀区中关村南大街2号数码大厦16楼F座<br/>邮编：100086<br/>电话：+86-010-51726541-101、116<br/>传真：+86-010-51726541-111<br/><br/>邮箱：market@x-robot.com.cn<br/>网址：www.x-robot.com.cn",point:"116.330158|39.971938",isOpen:0,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}\r\n         ]};\r\nvar point_1=pointList[1];\r\n$(document).ready(function(){\r\n    //创建和初始化地图函数：\r\n    function initMap(){\r\n        createMap();//创建地图\r\n        setMapEvent();//设置地图事件\r\n        addMapControl();//向地图添加控件\r\n        addMarker();//向地图中添加marker\r\n    }\r\n    \r\n    //创建地图函数：\r\n    function createMap(){\r\n        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图\r\n        var point = point_1;//定义一个中心点坐标\r\n        map.centerAndZoom(point,16);//设定地图的中心点和坐标并将地图显示在地图容器中\r\n        window.map = map;//将map变量存储在全局\r\n    }\r\n    \r\n    //地图事件设置函数：\r\n    function setMapEvent(){\r\n        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)\r\n        map.disableScrollWheelZoom();//启用地图滚轮放大缩小\r\n        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)\r\n        map.enableKeyboard();//启用键盘上下左右键移动地图\r\n    }\r\n    \r\n    //地图控件添加函数：\r\n    function addMapControl(){\r\n        //向地图中添加缩放控件\r\n    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});\r\n    map.addControl(ctrl_nav);\r\n                //向地图中添加比例尺控件\r\n    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});\r\n    map.addControl(ctrl_sca);\r\n    }\r\n    \r\n    //标注点数组\r\n    var markerArr = markList[1];\r\n    //创建marker\r\n    function addMarker(){\r\n        for(var i=0;i<markerArr.length;i++){\r\n            var json = markerArr[i];\r\n            var p0 = json.point.split("|")[0];\r\n            var p1 = json.point.split("|")[1];\r\n            var point = new BMap.Point(p0,p1);\r\n            var iconImg = createIcon(json.icon);\r\n            var marker = new BMap.Marker(point,{icon:iconImg});\r\n            var iw = createInfoWindow(i);\r\n            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});\r\n            marker.setLabel(label);\r\n            map.addOverlay(marker);\r\n            label.setStyle({\r\n                        borderColor:"#808080",\r\n                        color:"#333",\r\n                        cursor:"pointer"\r\n            });\r\n            \r\n            (function(){\r\n                var index = i;\r\n                var _iw = createInfoWindow(i);\r\n                var _marker = marker;\r\n                _marker.addEventListener("click",function(){\r\n                    this.openInfoWindow(_iw);\r\n                });\r\n                _iw.addEventListener("open",function(){\r\n                    _marker.getLabel().hide();\r\n                })\r\n                _iw.addEventListener("close",function(){\r\n                    _marker.getLabel().show();\r\n                })\r\n                label.addEventListener("click",function(){\r\n                    _marker.openInfoWindow(_iw);\r\n                })\r\n                if(!!json.isOpen){\r\n                    label.hide();\r\n                    _marker.openInfoWindow(_iw);\r\n                }\r\n            })()\r\n        }\r\n    }\r\n    //创建InfoWindow\r\n    function createInfoWindow(i){\r\n        var json = markerArr[i];\r\n        var iw = new BMap.InfoWindow("<b class=''iw_poi_title'' title=''" + json.title + "''>" + json.title + "</b><div class=''iw_poi_content''>"+json.content+"</div>");\r\n        return iw;\r\n    }\r\n    //创建一个Icon\r\n    function createIcon(json){\r\n        var icon = new BMap.Icon("http://map.baidu.com/image/us_cursor.gif", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})\r\n        return icon;\r\n    }\r\n    \r\n    initMap();//创建和初始化地图\r\n\r\n    $("#select_city").change(function(){\r\n        var city=$("#select_city").val();\r\n        if(city==0){\r\n            $("#shanghai").show();\r\n            $("#beijing").show();\r\n            point_1=pointList[1];\r\n            markerArr=markList[1];\r\n        }else if(city==1){\r\n            $("#shanghai").show();\r\n            $("#beijing").hide();\r\n            point_1=pointList[1];\r\n            markerArr=markList[1];\r\n        }else{\r\n            $("#shanghai").hide();\r\n            $("#beijing").show();\r\n            point_1=pointList[2];\r\n            markerArr=markList[2];\r\n        }\r\n        initMap();\r\n    });\r\n});\r\n</script></p>\r\n<div class="l" style="width:291px;">\r\n<div id="shanghai">\r\n<h3>上海总部</h3>\r\n<h4>上海新世纪机器人有限公司</h4>\r\n<p>公司固定电话：+86-021-61086568<br />\r\n传真：+86-021-61086567<br />\r\n邮箱：market@x-robot.com.cn<br />\r\n地址：上海浦东新区新金桥路58号银东大厦27楼A<br />\r\n邮编：201206<br />\r\n<a href="http://www.x-robot.com.cn">www.x-robot.com.cn</a></p>\r\n</div>\r\n<div id="beijing">\r\n<h3>北京分部</h3>\r\n<h4>上海新世纪机器人有限公司(北京分部)</h4>\r\n<p>公司固定电话：+86-010-51726541-101、116<br />\r\n传真：+86-010-51726541-111<br />\r\n邮箱：market@x-robot.com.cn<br />\r\n地址：北京市海淀区中关村南大街2号数码大厦16楼F座<br />\r\n邮编：100086<br />\r\n<a href="http://www.x-robot.com.cn">www.x-robot.com.cn</a></p>\r\n</div>\r\n        <div id="ningbo">\r\n            <h3>杭州湾生产基地</h3>\r\n            <h4>杭州湾生产基地</h4>\r\n          <p>公司电话：+86-021-61086568*805<br/>传真：+86-021-61002037<br/>邮箱：market@x-robot.com.cn<br/>地址：宁波杭州湾新区滨海四路131号<br/></p>\r\n        </div>\r\n<div>\r\n<h3 class="mb18">全国招商</h3>\r\n<p>南 区： 徐先生<span class="ml20">电话：13917780725</span> <br />\r\n北 区： 程先生<span class="ml20">电话：13901393007</span> <br />\r\n大客户： 许小姐 <span class="ml20">电话：13816400684</span></p>\r\n<h3 class="mb18">国际招商</h3>\r\n<p>刘先生<span class="ml20">电话：86-021-61086568*804</span><br />\r\n孙小姐<span class="ml20">电话：86-021-61086568*806</span></p>\r\n</div>\r\n</div>\r\n<div class="map">\r\n<div class="mb18">分部查询：             <select id="select_city">\r\n<option value="0">全部</option>\r\n<option value="1">上海</option>\r\n<option value="2">北京</option>\r\n</select></div>\r\n<div style="width:528px;height:390px;border:#ccc solid 1px;" id="dituContent">&nbsp;</div>\r\n</div>', 1);

-- --------------------------------------------------------

--
-- 表的结构 `product_apply`
--

CREATE TABLE IF NOT EXISTS `product_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `text` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  `img` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `product_apply`
--

INSERT INTO `product_apply` (`id`, `type`, `title`, `text`, `img`, `update_time`, `record_time`) VALUES
(1, 1, '应用案例', '    新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创\r\n    新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创\r\n新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创\r\n    新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创\r\n    新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创', 'upload/product_apply/屏幕快照 2013-03-22 上午12.48.26_1363884522.png', '2013-03-21 16:48:42', 1363870251),
(2, 2, '阿萨德等地', '阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地\r\n        阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地\r\n        阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地阿萨德等地', NULL, '2013-03-21 16:49:52', 1363870251),
(3, 3, NULL, NULL, NULL, '2013-03-21 12:51:25', 1363870285),
(4, 4, NULL, NULL, NULL, '2013-03-21 12:51:25', 1363870285),
(5, 5, '阿萨哈夫快乐撒旦', '        阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦        阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒\r\n        旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦        阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦        阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿\r\n        萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦        阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦阿萨哈夫快乐撒旦', 'upload/product_apply/ttttttetetxeex_1363884824.png', '2013-03-21 16:53:44', 1363870293),
(6, 6, NULL, NULL, NULL, '2013-03-21 12:51:33', 1363870293);

-- --------------------------------------------------------

--
-- 表的结构 `product_download`
--

CREATE TABLE IF NOT EXISTS `product_download` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(128) CHARACTER SET utf8 NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `product_download`
--

INSERT INTO `product_download` (`id`, `filename`, `product_id`) VALUES
(6, 'product.swf', 5),
(2, 'LA靛蓝灰.png', 1),
(3, '网站修改1221.doc', 1);

-- --------------------------------------------------------

--
-- 表的结构 `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `main_info` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title1` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info1` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title2` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info2` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title3` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info3` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title4` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info4` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title5` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info5` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `title6` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `info6` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `main_info`, `title1`, `info1`, `title2`, `info2`, `title3`, `info3`, `title4`, `info4`, `title5`, `info5`, `title6`, `info6`, `status`, `update_time`, `record_time`) VALUES
(1, 'i-ROBOT-LA', '人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-LA系列以简约流线的外型，敏锐捕捉身心的意念；引领人类进入智能时尚的至酷时代。</p><p>i-ROBOT-LA集成了世界上最先进的数字媒体平台之一，可便捷的实现远端及群组间的信息交换和网络通信。当您的i-robot想要有wifi、gps定位、音乐电影功能，抑或您想让它可以即时通讯，所有的一切都可以大胆告诉我们。', '物联响应、智慧安保', 'i-ROBOT-LA可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '时尚美观、科技创新', 'i-ROBOT-LA创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，必将风靡为新世纪新代步工具。', '原地转弯、节省空间', 'i-ROBOT-LA具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-LA可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。', '智能操控、车随身动', 'i-ROBOT-LA以内置的精密陀螺系统来感知车身所处的姿势状态，驾驶者只要改变身体的角度往前或往后倾，i-ROBOT-LA就会智能的根据倾斜的方向前进或后退，而速度则与驾驶者身体倾斜的程度呈正比。', '低碳环保、节能零排放', 'i-ROBOT-LA采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。', '操控精确、机动灵活', 'i-ROBOT-LA时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', 1, '2013-02-04 16:17:42', 1357737907),
(2, 'i-ROBOT-SC', '人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-SC系列以炫酷动感的外型，敏锐的动作捕捉；完美演绎了“车随心动，我行我SHOW”的理念。</p><p>i-ROBOT-SC作为智能交通工具，除了外观时尚的左右两轮造型，i-robot还可以非常轻松的保持您的身体平衡状态。无论是在行驶中还是停立中，它就像您身体的延伸，几乎完美的融为一体。', '物联响应、智慧安保', 'i-ROBOT-SC可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '时尚美观、科技创新', 'i-ROBOT-SC创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，同时也是交通领域的一次革命，必将风靡为新世纪新代步工具。', '低碳环保、节能零排放', 'i-ROBOT-SC采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。', '智能操控、车随身动', 'i-ROBOT-SC以内置的精密陀螺系统来感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。完美诠释了简单易用、车随身动。', '操控精确、机动灵活', 'i-ROBOT-SC时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', '原地转弯、节省空间', 'i-ROBOT-SC具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-SC可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。', 2, '2013-02-04 16:23:03', 1357737907),
(3, 'i-ROBOT-BO', '人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-BO系列量身定制的酷炫时尚外形和智能头盔系统，将带给您前所未有的超级完美体验。</p><p>i-ROBOT-BO完全靠电力来驱动，不产生任何尾气，内置了全球领先的精密陀螺系统来感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。', '物联响应、智慧安保', 'i-ROBOT-BO可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '坐立两用、随心所欲', 'i-ROBOT-BO具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。', '时尚美观、科技创新', 'i-ROBOT-BO创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，同时也是交通领域的一次革命，必将风靡为新世纪新代步工具。', '操控精确、机动灵活', 'i-ROBOT-BO时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', '原地转弯、节省空间', 'i-ROBOT-BO具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-BO可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。', '智能操控、车随身动', 'i-ROBOT-BO以内置的精密陀螺系统来感知车身所处的姿势状态，驾驶者只要改变身体的角度往前或往后倾，i-ROBOT-BO就会智能的根据倾斜的方向前进或后退。', 1, '2013-02-04 16:23:23', 1357737907),
(4, 'T-ROBOT-O', 'T-ROBOT-O具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。</p><p>T-ROBOT-O在车身两侧还设有辅助附件箱，在附件箱内配备了多种实用性警务工具以及其他便民用品，这相当于警务人员随身携带了一个警务支持平台，能够随时处理各类警务工作和突发事件。', '物联响应、智慧安保', 'T-ROBOT-O可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '时尚美观、科技创新', 'T-ROBOT-O创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，必将风靡为新世纪新代步工具。', '车载无线音视频传播', 'T-ROBOT-O车载无线传输系统具有无线图像传输功能、GPS定位功能、视频点播功能、漫游与切换管理功能、动态系统拓扑显示功能以及灵活的扩展功能。', '智能防盗、安全可靠', 'T-ROBOT-O全车设有电子指纹密码锁，在车辆驻车后的数秒内（待确认）能够自动落锁，所有非法移动和拆卸的动作都将引起警鸣声。', '移动警务百宝箱', 'T-ROBOT-O在车身两侧设有辅助附件箱，在附件箱内可配备小型干粉灭火器、警务工具以及其他便民用品，能够随时处理各类警务工作和突发事件。', '操控精确、机动灵活', 'T-ROBOT-O时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', 2, '2013-02-04 16:17:20', 1357737907),
(6, 'T-ROBOT-S', '独特设计的车型身径，令T-ROBOT-S配有更大的驾驶空间，并提供了方便的坐立两种驾驶方式。坐式驾驶可以避免长时间操控带来的疲劳感，站式驾驶则具备了更好的操控性，从而适应从警人员的不同情景需求。\nT-ROBOT-S可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，进行声音、图像以及视频资料的即时交换和通信，以达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '物联响应、智慧安保', 'T-ROBOT-O可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '操控精确、机动灵活', 'T-ROBOT-S时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', '智能操控、车随身动', 'T-ROBOT-O创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，必将风靡为新世纪新代步工具。', '车载前端证据搜集和存储', '通过T-ROBOT-S车载的音、视频采集器和随车携带的硬盘录像机，警务人员能够第一时间将现场的声音和图像进行采集和存储。', '低碳环保、节能零排放', 'T-ROBOT-S采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。', '原地转弯、节省空间', 'T-ROBOT-S具有零转弯半径，完美实现原地转弯，驾驶T-ROBOT-S可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。', 2, '2013-02-04 16:14:46', 1357737907),
(5, 'T-ROBOT-W', 'T-ROBOT-W驾驶者只需一键就能对行进中的车辆暂停并自动加锁，所有非法移动和拆卸工作都将引起语音警告，大大提高了警用人员交通工具的安全性便捷性。更强调突发事件的临场应用，注定了其将在公安、武警、军队、海关、机场、车站、码头、街头、大型场馆、景区、高尔夫球场等领域展现巨大前景。</p><p>内置的精密陀螺系统灵敏感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。完美诠释了简单易用、车随身动。', '物联响应、智慧安保', 'T-ROBOT-W可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。', '操控精确、机动灵活', 'T-ROBOT-W时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。', '坐立两用、随心所欲', 'T-ROBOT-W具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。', '车载无线音视频传播', 'T-ROBOT-W车载无线传输系统具有无线图像传输功能、GPS定位功能、视频点播功能、漫游与切换管理功能、动态系统拓扑显示功能以及灵活的扩展功能。', '低碳环保、节能零排放', 'T-ROBOT-W采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。', '智能驻车、随行随止', 'T-ROBOT-W能够实现驾驶人员只需一键就能完成上下车、停车以及锁车等动作，同时，自动驻车支脚能够瞬间伸出。在人员回到车辆后，也只需一键就能启动车辆。', 2, '2013-02-04 16:14:13', 1357737907);

-- --------------------------------------------------------

--
-- 表的结构 `product_list`
--

CREATE TABLE IF NOT EXISTS `product_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `text` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `img` varchar(512) CHARACTER SET utf8 NOT NULL,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `product_list`
--

INSERT INTO `product_list` (`id`, `type`, `title`, `text`, `img`, `record_time`) VALUES
(2, 1, '表土啊三大示 ', '啊三大咖啡壶撒谎地方；暗示啊三大咖啡壶撒谎地方；暗示啊三大咖啡壶撒谎地方；暗示啊三大咖啡壶撒谎地方；暗示啊\n', 'upload/product_list/屏幕快照 2013-03-20 下午10.58.49_1363791571.png', 1363791571),
(4, 3, '撒大放；暗示', '撒大放卡刷卡；地方哈利撒科打诨公；撒更大的放够得上复合管暗示工会平安道官方店发给啊说个法阿的平发给', 'upload/product_list/屏幕快照 2013-03-20 下午10.58.49_1363791812_1363878212_1363878232.png', 1363878232),
(5, 4, '啊撒大放哈市公是', '奥斯汀黄公望忽然搞「收到公「熬过 桑干河彭浦恩爱活温柔「特日「', 'upload/product_list/屏幕快照 2013-03-20 下午10.58.49_1363791812_1363878212_1363878251.png', 1363878251),
(6, 5, 'IHAS；FSHF SDFS', 'ASsadlhfs搭撒地方「哈；破我「啊和我哈搜歌ihdofgashgodhaoewe暗示放哈萨克都护府', 'upload/product_list/robot-w_1363878313.png', 1363878313),
(7, 1, '123', '123123', 'upload/product_list/链接新闻2_1364018255.jpg', 1364018255),
(8, 1, '23123', '2532453dgfhdfhg', 'upload/product_list/屏幕快照 2013-03-23 下午1.57.49_1364018280.png', 1364018280),
(9, 1, '0000----980', 'zdngnbvm..,mjkhkj', 'upload/product_list/屏幕快照 2013-03-23 下午1.57.49_1364018293.png', 1364018293);

-- --------------------------------------------------------

--
-- 表的结构 `product_pic`
--

CREATE TABLE IF NOT EXISTS `product_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `pos` tinyint(3) unsigned NOT NULL,
  `filename` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_pos` (`type`,`pos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `product_pic`
--

INSERT INTO `product_pic` (`id`, `type`, `pos`, `filename`) VALUES
(3, 1, 1, 'upload/product_pic/屏幕快照 2013-03-25 下午12.54.37_1364187294.png'),
(4, 1, 2, ''),
(5, 1, 3, 'upload/product_pic/屏幕快照 2013-03-25 下午12.55.11_1364187319.png'),
(6, 1, 4, ''),
(7, 1, 5, ''),
(8, 1, 6, ''),
(9, 2, 1, ''),
(10, 2, 2, ''),
(11, 2, 3, 'upload/product_pic/屏幕快照 2013-03-25 下午12.55.32_1364188912.png'),
(12, 2, 4, ''),
(13, 2, 5, ''),
(14, 2, 6, ''),
(15, 3, 1, ''),
(16, 3, 2, ''),
(17, 3, 3, ''),
(18, 3, 4, ''),
(19, 3, 5, ''),
(20, 3, 6, ''),
(21, 4, 1, ''),
(22, 4, 2, ''),
(23, 4, 3, ''),
(24, 4, 4, 'upload/product_pic/屏幕快照 2013-03-25 下午12.55.32_1364187338.png'),
(25, 4, 5, ''),
(26, 4, 6, ''),
(27, 5, 1, ''),
(28, 5, 2, ''),
(29, 5, 3, ''),
(30, 5, 4, ''),
(31, 5, 5, ''),
(32, 5, 6, ''),
(33, 6, 1, ''),
(34, 6, 2, ''),
(35, 6, 3, ''),
(36, 6, 4, ''),
(37, 6, 5, ''),
(38, 6, 6, '');

-- --------------------------------------------------------

--
-- 表的结构 `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `publish_time` int(10) unsigned NOT NULL,
  `level` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '查看等级',
  `status` tinyint(3) unsigned NOT NULL COMMENT '1.正常.2.隐藏',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `promotion`
--

INSERT INTO `promotion` (`id`, `title`, `content`, `publish_time`, `level`, `status`, `update_time`, `record_time`) VALUES
(1, '121323', '12321w\nqwerwqe\nfs\ndfad\nf\nsdaf', 2013, '1,2', 3, '2012-12-31 09:18:07', 1356945487),
(2, '23weqrw', 'erewrgedfg\ndsfg\nsdfsdfsdfs\nd\nds\nfg\nd\nsfgdf', 1357356600, '1,3', 1, '2012-12-31 09:19:30', 1356945570),
(3, '优惠1111', '与欧式的卡上大发牢骚 osjdflasldf\n阿历山大法拉盛京东方；', 1357228800, '5', 1, '2013-01-03 16:08:40', 1357229320);

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_bin COMMENT '售后服务常见问题--问题',
  `answer` text COLLATE utf8_bin COMMENT '售后服务常见问题--回答',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '1.不展示，2.展示',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '提问时间',
  `revert_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '回复时间',
  `record_time` int(11) NOT NULL COMMENT '提问时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `question`, `answer`, `status`, `update_time`, `revert_time`, `record_time`) VALUES
(1, '你好，请问这个哪里有', '啊海口市都', 2, '2013-01-06 17:22:27', '2013-01-07 01:22:27', 1357389047),
(2, 'sdasdasdasdasd', 'sdfdsff', 2, '2013-01-14 18:06:30', '2013-01-15 02:06:30', 1358186771);

-- --------------------------------------------------------

--
-- 表的结构 `search_type`
--

CREATE TABLE IF NOT EXISTS `search_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `search_type`
--

INSERT INTO `search_type` (`id`, `title`) VALUES
(1, '产品'),
(2, '活动'),
(4, '专题');

-- --------------------------------------------------------

--
-- 表的结构 `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8 NOT NULL,
  `file` varchar(128) CHARACTER SET utf8 NOT NULL,
  `thumbnail` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `page` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT '显示页面',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `video`
--

INSERT INTO `video` (`id`, `title`, `file`, `thumbnail`, `page`) VALUES
(1, '新世纪机器人', '新世纪机器人【短】_1358181820.flv', NULL, 'productdv'),
(3, '撒大法兰德斯放', '新世纪机器人【企业篇】_1358182880.flv', NULL, 'technology'),
(4, 'dasdsad', '新世纪机器人【长3】_1358182920.flv', NULL, 'technology'),
(5, 'wwww', 'wwww.flv', NULL, 'productdv'),
(6, '666', 'Ubuntu for Android_1358185821.flv', NULL, 'productdv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
