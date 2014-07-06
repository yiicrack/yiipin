-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 29 日 10:28
-- 服务器版本: 5.5.25
-- PHP 版本: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yiipin_release`
--

-- --------------------------------------------------------

--
-- 表的结构 `pin_about`
--

DROP TABLE IF EXISTS `pin_about`;
CREATE TABLE `pin_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` varchar(90) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_about`
--

INSERT INTO `pin_about` (`id`, `name`, `title`, `content`) VALUES
(1, 'intro', '关于我们', '<p>\r\n	美丽说是目前国内最大的女性时尚社区，2009年11月由徐易容创立于北京中关村。美丽说致力于为女性用户解决穿衣打扮，美容护肤等问题，目前已有超过2000万用户在使用美丽说，超过300万用户每天活跃在美丽说上，是目前国内发展最快的互联网公司之一。\r\n</p>\r\n<p>\r\n	截止目前，美丽说已经发布了超过十款女性时尚相关的APP，安装量超过720万，覆盖iOS及Android两大移动平台。创立至今，美丽说已获得三轮风险投资，分别来自蓝驰创投、红杉资本、纪源资本，投资总额达3000万美元。\r\n</p>\r\n<br />'),
(2, 'contactus', '联系我们', '<h3>\r\n	联系方式\r\n</h3>\r\n<p>\r\n	美丽说（北京）网络科技有限公司<br />\r\n邮箱： kefu@meilishuo.com<br />\r\n联系电话：010-82486129<br />\r\n总部地址：北京市海淀区中关村大街19号新中关购物中心A座7层  邮编：100080<br />\r\n上海公司地址：上海市静安区北京西路1701号2601室（静安中华大厦） 邮编：200040\r\n</p>\r\n<h3>\r\n	市场合作\r\n</h3>\r\n<p>\r\n	电话：010-62672483-612（北京）  021-62108005（上海）\r\n</p>\r\n<h3>\r\n	广告投放与品牌推广\r\n</h3>\r\n<p>\r\n	郑重声明：美丽说没有任何所谓官方代理<br />\r\n咨询电话：4000-800-588<br />\r\n企业QQ：4000800588\r\n</p>\r\n<h3>\r\n	媒体联系\r\n</h3>\r\n<p>\r\n	电话：010-62672483-603（北京）<br />\r\nEmail：pr@meilishuo.com\r\n</p>'),
(3, 'joinus', '加入我们', '在美丽说工作<br />\r\n有兴趣请将简历email投递至hr@meilishuo.com<br />\r\n<p>\r\n	并注明申请职位名称。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<h3>\r\n		商业产品经理\r\n	</h3>\r\n	<div>\r\n		<span>职位要求：</span> 1.本科以上学历，3年以上商业产品相关工作经验；<br />\r\n2.具有高度的数据敏感性和数据分析能力，逻辑思维能力强，商业触觉敏锐；<br />\r\n3.熟悉互联网广告市场，对互联网广告平台、广告网络、广告产品有深刻理解和认识；<br />\r\n4.熟悉淘宝、阿里、SNS、或女性垂直媒体行业商业产品者优先； <span>工作职责：</span> 1.负责美丽说商业产品规划、网站流量变现；<br />\r\n2.负责制定商业产品价格策略与衡量监测机制；<br />\r\n3.负责制定不同客户广告投放机制与广告系统设计；<br />\r\n4.了解市场需求，与销售部门、网站运营部门、用户产品部门、研发部门紧密合作，规划与优化商业产品发展；\r\n	</div>\r\n	<h3>\r\n		品牌广告客户经理\r\n	</h3>\r\n	<div>\r\n		<span>职位要求：</span> 1.抗压能力、沟通能力、提案能力较强；<br />\r\n2.两年以上互联网品牌广告相关销售经验；<br />\r\n3.有女性媒体广告销售经验者优先；<br />\r\n4.有女性电商广告销售经验者优先； <span>工作职责：</span> 1.负责美丽说品牌客户开发和市场拓展等工作；<br />\r\n2.根据销售目标，制定具体销售和工作部署计划，完成公司下达的销售任务；<br />\r\n3.根据客户需求，制定活动计划、推广计划，并进行执行；<br />\r\n4.与商业产品部门紧密合作，提出产品开发需求，并协助反馈与完善；\r\n	</div>\r\n</p>'),
(4, 'privacy', '隐私保护政策', '<p>\r\n	我们非常重视您的隐私，保护用户隐私是美丽说的重点原则，在您使用美丽说提供的服务前，请您仔细阅读以下隐私保护原则。\r\n</p>\r\n<h3>\r\n	一、用户信息\r\n</h3>\r\n<p>\r\n	美丽说将对您所提供的资料进行严格的管理及保护，美丽说通过技术手段、提供隐私保护服务功能、强化内部管理等办法充分保护用户的个人资料安全。美丽说为用\r\n户提供对个人注册信息的绝对的控制权，用户可以通过“修改个人信息”查看或修改个人信息。用户自愿注册个人信息，用户在注册时提供的所有信息，都是基于自\r\n愿，用户有权在任何时候拒绝提供这些信息。美丽说保证不对外公开或向第三方提供用户注册的个人资料，及用户在使用服务时存储的非公开内容，但下列情况除\r\n外：<br />\r\n◇ 事先获得您的明确授权； <br />\r\n◇ 根据有关的法律法规要求；<br />\r\n◇ 按照相关司法机构或政府主管部门的要求；<br />\r\n◇ 只有透露你的个人资料，才能提供你所要求的产品和服务；<br />\r\n◇ 因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用；<br />\r\n◇ 由于您将用户密码告知他人或与他人共享注册帐户，由此导致的任何个人资料泄露。\r\n</p>\r\n<h3>\r\n	二、Cookies和其他浏览器技术\r\n</h3>\r\n<p>\r\n	当用户访问美丽说的时候，我们可能会保存会员的用户登录状态并且为用户分配一个或多个“Cookies”（一个很小的文本文件），例如：当会员访问一个需\r\n要会员登录才可以提供的信息或服务，当会员登录时，我们会把该会员的登录名和密码加密存储在该会员计算机的Cookie文件中，由于是不可逆转的加密存\r\n储，其他人即使可以使用该会员的计算机，也无法识别出会员的用户名和密码。会员并不需要额外做任何工作，所有的收集和保存都由系统自动完成。\r\n</p>\r\n<p>\r\n	Cookie文件将永久的保存在您的计算机硬盘上，除非您使用浏览器或操作系统软件手工将其删除。您也可以选择“不使用Cookie”或“在使用Cookie时事先通知我”的选项禁止Cookie的产生，但是您将为此无法使用一些美丽说的查询和服务。\r\n</p>\r\n<h3>\r\n	三、合作伙伴\r\n</h3>\r\n<p>\r\n	我们选择有信誉的第三方公司或网站作为我们的合作伙伴为用户提供信息和服务。尽管我们只选择有信誉的公司或网站作为我们的合作伙伴，但是每个合作伙伴都会\r\n有与美丽说不同的隐私保护政策，一旦您通过点击进入了合作伙伴的网站，美丽说隐私保护原则将不再生效，我们建议您查看该合作伙伴网站的隐私条款，并了解该\r\n合作伙伴对于收集、使用、泄露您的个人信息的规定。\r\n</p>\r\n<p>\r\n	本隐私保护原则自2010年02月21日起生效。隐私保护原则的修改权、更新权均属美丽说。<br />\r\n如果您对此隐私保护原则有任何疑问或建议，请通过以下方式联系我们: kefu@meilishuo.com，我们会尽一切努力保护您的隐私。\r\n</p>'),
(5, 'brands', '广告推广', '咨询电话：4000-800-588<br />\r\n企业QQ：4000800588 <br />\r\n郑重声明：美丽说没有任何所谓官方代理\r\n<div>\r\n</div>');

-- --------------------------------------------------------

--
-- 表的结构 `pin_administrator`
--

DROP TABLE IF EXISTS `pin_administrator`;
CREATE TABLE `pin_administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(5) NOT NULL,
  `email` varchar(128) NOT NULL,
  `this_login_time` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `this_login_ip` varchar(15) DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_admin_authassignment`
--

DROP TABLE IF EXISTS `pin_admin_authassignment`;
CREATE TABLE `pin_admin_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_admin_authassignment`
--

INSERT INTO `pin_admin_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', '', 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `pin_admin_authitem`
--

DROP TABLE IF EXISTS `pin_admin_authitem`;
CREATE TABLE `pin_admin_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_admin_authitem`
--

INSERT INTO `pin_admin_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, '', '', 'N;'),
('Authenticated', 2, '', '', 'N;'),
('游客', 2, '', '', 'N;'),
('Site.*', 1, '', '', 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `pin_admin_authitemchild`
--

DROP TABLE IF EXISTS `pin_admin_authitemchild`;
CREATE TABLE `pin_admin_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_admin_rights`
--

DROP TABLE IF EXISTS `pin_admin_rights`;
CREATE TABLE `pin_admin_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_advertise`
--

DROP TABLE IF EXISTS `pin_advertise`;
CREATE TABLE `pin_advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL COMMENT '广告位ID',
  `template_id` int(11) NOT NULL COMMENT '模板',
  `name` varchar(90) NOT NULL COMMENT '广告名称',
  `data` text COMMENT '模板数据',
  `display_count` int(11) NOT NULL DEFAULT '0' COMMENT '显示次数',
  `enabled` varchar(30) NOT NULL DEFAULT '' COMMENT '是否有效',
  `created` datetime NOT NULL COMMENT '发布时间',
  `valid_start` date DEFAULT NULL COMMENT '有效期始',
  `valid_end` date DEFAULT NULL COMMENT '有效期止',
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_advertise_click`
--

DROP TABLE IF EXISTS `pin_advertise_click`;
CREATE TABLE `pin_advertise_click` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '广告跳转地址',
  `click_count` int(11) NOT NULL DEFAULT '0' COMMENT '点击次数',
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_advertise_position`
--

DROP TABLE IF EXISTS `pin_advertise_position`;
CREATE TABLE `pin_advertise_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '广告类型',
  `width` int(11) NOT NULL COMMENT '宽度',
  `height` int(11) NOT NULL COMMENT '高度',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '价格',
  `intro` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '广告位介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_advertise_position`
--

INSERT INTO `pin_advertise_position` (`id`, `name`, `type`, `width`, `height`, `price`, `intro`) VALUES
(1, '首页横幅', '独占广告', 990, 100, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `pin_advertise_template`
--

DROP TABLE IF EXISTS `pin_advertise_template`;
CREATE TABLE `pin_advertise_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模板名称',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模板简介',
  `template` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模板代码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_advertise_template`
--

INSERT INTO `pin_advertise_template` (`id`, `name`, `description`, `template`) VALUES
(1, '图片链接广告', '最常见的广告形式之一，由一张图构成，图片上有跳转地址链接，图片可以是静态的也可以是动画GIF', '<a href="/site/redirect.html?url=<{跳转地址}>" target="_blank" title="<{鼠标悬停提示}>">\r\n    <img src="<{图片文件}>" border="0" width="<{宽度}>" height="<{高度}>" alt="<{图片说明}>" />\r\n</a>'),
(2, '文字链接广告', '最简单的广告形式，由文字组成，包含了跳转地址，适合紧凑的广告显示', '<a href="/site/redirect.html?url=<{跳转地址}>" target="_blank" title="<{鼠标悬停提示}>"><{链接文字}></a>\r\n'),
(3, 'FLASH广告', '常见的广告形式之一，表现力丰富，但需要注意SWF文件体积不要太大，另外一个页面不建议用太多flash广告，要考虑低端电脑的浏览体验。如果需要系统统计点击次数，请在制作flash时使用中转跳转地址来打开新窗口：/site/redirect.html?url=你的地址，地址请使用url编码', '<div class="flash_ad_block">\r\n<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<{宽度}>" height="<{高度}>">\r\n  <param name="movie" value="<{FLASH文件}>" />\r\n  <param name="quality" value="high" />\r\n  <param name="wmode" value="opaque" />\r\n  <param name="swfversion" value="9.0.45.0" />\r\n  <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->\r\n  <param name="expressinstall" value="/img/expressInstall.swf" />\r\n  <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->\r\n  <!--[if !IE]>-->\r\n  <object type="application/x-shockwave-flash" data="<{FLASH文件}>" width="<{宽度}>" height="<{高度}>">\r\n    <!--<![endif]-->\r\n    <param name="quality" value="high" />\r\n    <param name="wmode" value="opaque" />\r\n    <param name="swfversion" value="9.0.45.0" />\r\n    <param name="expressinstall" value="/img/expressInstall.swf" />\r\n    <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->\r\n    <div>\r\n      <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>\r\n      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>\r\n    </div>\r\n    <!--[if !IE]>-->\r\n  </object>\r\n  <!--<![endif]-->\r\n</object>\r\n</div>'),
(4, '顶部全屏延时自动收起消失图片广告', '该形式具有很强的视觉冲击力，一般用于重大事件，表现形式为先显示出占满窗口的全副广告，待过一定时间后，自动收起消失。注意！每个页面只能同时使用一个此类型广告。', '<script type="text/javascript">\r\n$(''body'').prepend(''<div id="full_screen_img_show" style="width:<{宽度}>px; height:<{高度}>px; overflow:hidden; margin:0 auto;">\\\r\n<a href="/site/redirect.html?url=<{跳转地址}>" target="_blank" title="<{鼠标悬停提示}>"><img alt="<{图片说明}>" src="<{图片文件}>" width="<{宽度}>" height="<{高度}>" /></a>\\\r\n</div>'');\r\n$(document).ready(function(){\r\n	$(''#full_screen_img_show'').delay(<{延迟秒数}>*1000).slideUp(''normal''); \r\n});\r\n</script>\r\n'),
(5, '顶部全屏延时自动收起消失FLASH广告', '该形式具有很强的视觉冲击力，一般用于重大事件，表现形式为先显示出占满窗口的全副广告，待过一定时间后，自动收起消失。注意！每个页面只能同时使用一个此类型广告。', '<script type="text/javascript">\r\n$(''body'').prepend(''<div id="full_screen_flash_show" style="width:<{宽度}>px; height:<{高度}>px; overflow:hidden; margin:0 auto;">\\\r\n<div class="flash_ad_block">\\\r\n<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<{宽度}>" height="<{高度}>">\\\r\n  <param name="movie" value="<{FLASH文件}>" />\\\r\n  <param name="quality" value="high" />\\\r\n  <param name="wmode" value="opaque" />\\\r\n  <param name="swfversion" value="9.0.45.0" />\\\r\n  <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->\\\r\n  <param name="expressinstall" value="/img/expressInstall.swf" />\\\r\n  <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->\\\r\n  <!--[if !IE]>-->\\\r\n  <object type="application/x-shockwave-flash" data="<{FLASH文件}>" width="<{宽度}>" height="<{高度}>">\\\r\n    <!--<![endif]-->\\\r\n    <param name="quality" value="high" />\\\r\n    <param name="wmode" value="opaque" />\\\r\n    <param name="swfversion" value="9.0.45.0" />\\\r\n    <param name="expressinstall" value="/img/expressInstall.swf" />\\\r\n    <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->\\\r\n    <div>\\\r\n      <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>\\\r\n      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>\\\r\n    </div>\\\r\n    <!--[if !IE]>-->\\\r\n  </object>\\\r\n  <!--<![endif]-->\\\r\n</object>\\\r\n</div>\\\r\n</div>'');\r\n$(document).ready(function(){\r\n	$(''#full_screen_flash_show'').delay(<{延迟秒数}>*1000).slideUp(''normal''); \r\n});\r\n</script>\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `pin_config`
--

DROP TABLE IF EXISTS `pin_config`;
CREATE TABLE `pin_config` (
  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` mediumtext CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_config`
--

INSERT INTO `pin_config` (`key`, `value`) VALUES
('follow', 'a:6:{s:9:"weibo_url";s:23:"http://weibo.com/yiipin";s:11:"qqweibo_url";s:22:"http://t.qq.com/yiipin";s:10:"renren_url";s:0:"";s:7:"163_url";s:0:"";s:10:"qqzone_url";s:0:"";s:10:"douban_url";s:0:"";}'),
('dosubmit', 's:12:"保存设置";'),
('sitename', 's:9:"易拼网";'),
('keywords', 's:79:"易拼网,淘宝客程序,开源免费pinterest,仿pinterest程序,仿美丽说";'),
('description', 's:222:"YIIPIN是一套基于yiiframework开发框架开发的一款精仿美丽说的类pinterest程序，支持淘宝在内的数十家购物网站的宝贝分享功能，和完备的互动功能。开源免费，欢迎使用。";'),
('icp_beian', 's:21:"鄂ICP备000000000号";'),
('cache_backend', 's:4:"file";'),
('memcache', 'a:2:{s:6:"server";s:9:"localhost";s:4:"port";s:5:"11211";}'),
('mail_from', 's:19:"no-reply@yiipin.com";'),
('mail_fromname', 's:9:"易拼网";'),
('mail_smtp_host', 's:18:"smtp.exmail.qq.com";'),
('mail_smtp_port', 's:2:"25";'),
('mail_smtp_user', 's:19:"no-reply@yiipin.com";'),
('mail_smtp_pwd', 's:6:"123abc";'),
('title', 's:72:"易拼网，发现、收藏、分享我的美丽点滴，让改变发生";'),
('stats_code', 's:0:"";'),
('taobao_collect_keywords', 's:187:"连衣裙 雪纺衫 吊带裙 衬衫 长裙 T恤 西装 开衫 背心 打底衫 短裙 连体裤 半身裙 短裤 防晒衫 罩衫 小脚裤 背心裙 背带裤 哈伦裤 包臀裙 裙裤";'),
('paipai_appOAuthID', 's:9:"700051415";'),
('paipai_secretOAuthKey', 's:16:"j27mFOxUbqtmSbzP";'),
('paipai_accessToken', 's:32:"6f18aa48ee96a42dee9163b6ea3b59de";'),
('index_tags_1', 's:141:"T恤 短裤 背心 长裙 凉鞋 衬衫 连衣裙 连体裤 七分裤 情侣装 坡跟鞋 单肩包 雪纺 蕾丝 无袖 宽松 露肩 荧光";'),
('index_tags_2', 's:83:"欧美 性感 简约 日系 清新 甜美 韩系 显瘦 名媛 森女 街拍 混搭";'),
('index_tags_3', 's:102:"H&M ZARA GAP MANGO 贝玲妃 雅诗兰黛 优衣库 无印良品 大嘴猴 havaianas Forever21 McQueen";'),
('index_tags_4', 's:140:"宜家 抱枕 摆件 贴纸 地毯 盆栽 iPhone套 玩具 窗帘 沙发 拍立得 行李箱 床上用品 雨伞 烘焙 手表 风扇 香薰";'),
('index_tags_5', 's:83:"呛口 碎花 撞色 格子 编织 破洞 牛仔 镂空 透视 波点 高腰 拼色";'),
('url_format', 's:8:"pathinfo";'),
('email_verify', 's:1:"0";'),
('cache_duration', 's:4:"3600";'),
('index_tag_count', 's:1:"4";'),
('masonry_pagesize', 's:3:"100";'),
('masonry_framesize', 's:2:"10";'),
('index_fluid', 's:1:"0";'),
('site_off', 's:1:"0";'),
('comment_collect_on', 's:5:"false";'),
('comment_collect_pagecount', 's:1:"1";'),
('comment_collect_minlength', 's:1:"5";'),
('cloud_cache', 'a:493:{s:57:"/upload/goods/201211/ada2a8ac7961453c2e313c9bf8534565.jpg";i:1351942293;s:54:"/upload/thumb/1/e/1e0c0e32ff975a8b8235155a2b811c1f.jpg";i:1351942294;s:57:"/upload/goods/201211/2d15f769b50d93a89ad6862acf58989f.jpg";i:1351942302;s:54:"/upload/thumb/e/4/e48e0b96d781f7ed25d7c313d268b108.jpg";i:1351942304;s:57:"/upload/goods/201211/804fe4b76f17a8ffdbd4b9fca85bd3ef.jpg";i:1351942305;s:54:"/upload/thumb/9/e/9e4ea1d8590abe2419f52e5c9240e261.jpg";i:1351942305;s:39:"/upload/goods/201211/13519358306061.jpg";i:1351942311;s:54:"/upload/thumb/4/d/4dbaf409b4de4eb355cf337922a5544a.jpg";i:1351942312;s:39:"/upload/goods/201211/13519354384222.jpg";i:1351942316;s:54:"/upload/thumb/b/e/bea9b5a8caebaafdc6b3d211a9cbea06.jpg";i:1351942317;s:39:"/upload/goods/201211/13519296995505.jpg";i:1351929706;s:54:"/upload/thumb/6/b/6b0d1b624ad9de9f19d4a853dc1cf256.jpg";i:1351929715;s:39:"/upload/photo/201211/13518656513981.jpg";i:1351926528;s:54:"/upload/thumb/b/6/b6b74b737bf31021f9abb7a3fcbb18a9.jpg";i:1351926538;s:39:"/upload/photo/201211/13518650889743.jpg";i:1351926552;s:54:"/upload/thumb/7/e/7ec335bfb5534a99b93eefe8a1554a59.jpg";i:1351926554;s:39:"/upload/photo/201210/13516963498617.jpg";i:1351926557;s:54:"/upload/thumb/a/c/aca06ebeacc3d4ad78f7c7dff36190da.jpg";i:1351926557;s:39:"/upload/photo/201210/13516962231780.jpg";i:1351926563;s:54:"/upload/thumb/6/2/62d870dedce148e5bea3b24c4e4349fb.jpg";i:1351926564;s:39:"/upload/photo/201210/13516961733357.jpg";i:1351926570;s:54:"/upload/thumb/d/1/d16a2b3bc5c6a366194a7d09ffb3912f.jpg";i:1351926571;s:39:"/upload/photo/201210/13516960575863.jpg";i:1351926574;s:54:"/upload/thumb/2/4/24ee33ceb66ef26097ef8f4578be9b68.jpg";i:1351926575;s:39:"/upload/photo/201210/13515226568623.jpg";i:1351926579;s:54:"/upload/thumb/6/0/603ac8199822d2c6cc7b904ebdc1526f.jpg";i:1351926580;s:39:"/upload/goods/201210/13515212928983.jpg";i:1351926586;s:54:"/upload/thumb/3/1/312a6945a1ec4f9b6f45aae0e2e93067.jpg";i:1351926586;s:39:"/upload/goods/201210/13515209877729.jpg";i:1351926592;s:54:"/upload/thumb/f/f/ff4016f0dbe8dbcbba0270d951dd43db.jpg";i:1351926593;s:39:"/upload/photo/201210/13515190676035.jpg";i:1351926598;s:54:"/upload/thumb/d/b/dbefe242caa08016d42baf6cac1dd572.jpg";i:1351926600;s:39:"/upload/goods/201210/13514923584464.jpg";i:1351926611;s:54:"/upload/thumb/b/2/b278ad451aeea375b81bfd08ea66dae0.jpg";i:1351926611;s:39:"/upload/goods/201210/13511468944431.jpg";i:1351927770;s:54:"/upload/thumb/9/d/9d881df52fe5ebf5ac85caca87059ddd.jpg";i:1351942322;s:39:"/upload/goods/201210/13511468934968.jpg";i:1351926613;s:54:"/upload/thumb/6/e/6e7a069bc00beb753a3cc1ccff40a83a.jpg";i:1351926614;s:54:"/upload/thumb/a/6/a682c1e94c80a3b832e00ede1982413e.jpg";i:1351942337;s:39:"/upload/goods/201209/13476037999115.jpg";i:1351942862;s:54:"/upload/thumb/2/8/28e108bcaccdb8e25082ce264bb26554.jpg";i:1351942862;s:39:"/upload/goods/201209/13476038007572.jpg";i:1351942863;s:54:"/upload/thumb/c/5/c575a7435c4f59b0b9951690256164aa.jpg";i:1351942864;s:39:"/upload/goods/201209/13476038019419.jpg";i:1351942868;s:54:"/upload/thumb/c/5/c57f36c320d5cea4011f69a4ebd6517a.jpg";i:1351942868;s:39:"/upload/goods/201209/13476038026422.jpg";i:1351942870;s:54:"/upload/thumb/8/6/863771bc0cd632158b733e7c7c59a3d4.jpg";i:1351942870;s:39:"/upload/goods/201209/13476038033828.jpg";i:1351942879;s:54:"/upload/thumb/0/6/061e24323eee43df7d9907400c7c1619.jpg";i:1351942880;s:39:"/upload/goods/201209/13476038044288.jpg";i:1351942880;s:54:"/upload/thumb/3/5/353368c9605e2071c010eff5521955de.jpg";i:1351942881;s:39:"/upload/goods/201210/13511468639651.jpg";i:1351927759;s:54:"/upload/thumb/d/f/df795a90e99c7d00140fb8f24314ec84.jpg";i:1351927760;s:39:"/upload/goods/201210/13511468622947.jpg";i:1351927763;s:54:"/upload/thumb/c/6/c65a8d3405339522b951c5e5955e9df2.jpg";i:1351927764;s:54:"/upload/thumb/9/3/93456d9e6bdef95a044f5dd115143890.jpg";i:1351942357;s:54:"/upload/thumb/5/4/540214b6cee1ee8ddb924ba82af18445.jpg";i:1351929727;s:54:"/upload/thumb/9/2/9290346752d30a78d81634986213e97e.jpg";i:1351927766;s:39:"/upload/goods/201210/13511468616616.jpg";i:1351927766;s:54:"/upload/thumb/2/a/2a923984f2410e849d6158579062289a.jpg";i:1351927767;s:39:"/upload/goods/201208/13451889912271.jpg";i:1351929717;s:54:"/upload/thumb/e/5/e557560da78cfcbbe0b5200246dd069a.jpg";i:1351929717;s:39:"/upload/goods/201208/13451889903262.jpg";i:1351929718;s:54:"/upload/thumb/0/1/017da488b5f04974f90a9177b858d472.jpg";i:1351929718;s:39:"/upload/goods/201208/13451889894018.jpg";i:1351929719;s:54:"/upload/thumb/e/9/e98562a20eab1dd9b5735ed5c2fc4f74.jpg";i:1351929720;s:39:"/upload/goods/201210/13511468773468.jpg";i:1351928014;s:54:"/upload/thumb/7/c/7c91cadc68f0dcc0667a421c5d0c4597.jpg";i:1351929720;s:39:"/upload/goods/201209/13476038375416.jpg";i:1351929725;s:54:"/upload/thumb/1/1/116b12aa90ac414d5b46fd16c6af0a11.jpg";i:1351929725;s:39:"/upload/goods/201208/13451890156070.jpg";i:1351929726;s:54:"/upload/thumb/3/2/32c0d2f6facd5a2ab699484ca609246f.jpg";i:1351929726;s:39:"/upload/goods/201209/13476038195859.jpg";i:1351927825;s:54:"/upload/thumb/f/9/f997b1e6fd401fb12fe6729bd08d6d61.jpg";i:1351927825;s:39:"/upload/goods/201208/13451860838386.jpg";i:1351927827;s:54:"/upload/thumb/1/3/135e1f42a681fb54fabc9ee6a53fd00c.jpg";i:1351927827;s:39:"/upload/goods/201208/13451890024552.jpg";i:1351927198;s:54:"/upload/thumb/e/4/e42fee115a78123a7a786c9879d12609.jpg";i:1351927827;s:39:"/upload/goods/201210/13511468338812.jpg";i:1351927810;s:54:"/upload/thumb/e/8/e85db48f477270417050afa1ac7bb655.jpg";i:1351927809;s:39:"/upload/goods/201210/13508935398417.jpg";i:1351927815;s:54:"/upload/thumb/8/4/84262a16d1705271e4464c5d213db25c.jpg";i:1351927816;s:39:"/upload/goods/201209/13476038935921.jpg";i:1351927819;s:54:"/upload/thumb/8/e/8ecccbd2bb68b48f8376953252cefb8c.jpg";i:1351927819;s:54:"/upload/thumb/b/0/b0bf11e71647790b046f01441f9377f5.jpg";i:1351942359;s:54:"/upload/thumb/0/0/0099f8020cbef0b85e59b82db8a84527.jpg";i:1351927771;s:54:"/upload/thumb/7/a/7aa12642185626658859038c2df7e913.jpg";i:1351927771;s:54:"/upload/thumb/8/2/82bdcf5857a5102b514f898fc9fdc1f1.jpg";i:1351927868;s:39:"/upload/goods/201210/13503530417560.jpg";i:1351927830;s:54:"/upload/thumb/f/f/ff7293ee38776f828b0f1a92282642e7.jpg";i:1351927830;s:39:"/upload/goods/201210/13503530196602.jpg";i:1351927839;s:54:"/upload/thumb/2/f/2f9c0613f21a4facc6dfbebc9818599b.jpg";i:1351927838;s:39:"/upload/goods/201208/13455384931370.jpg";i:1351942886;s:54:"/upload/thumb/5/d/5d2b9b23045bcbcbd821e3eede0e91e3.jpg";i:1351942887;s:39:"/upload/goods/201208/13455384948423.jpg";i:1351942888;s:54:"/upload/thumb/e/f/ef0dec5cf73ce275b39cbf0f5fca881d.jpg";i:1351942889;s:39:"/upload/goods/201208/13455384945115.jpg";i:1351942890;s:54:"/upload/thumb/5/2/529f52ebb3515176c9ecd43c68680ade.jpg";i:1351942891;s:39:"/upload/goods/201208/13455384946572.jpg";i:1351942892;s:54:"/upload/thumb/9/c/9cd2c35120a44e3e3e1bd1e63992c8bb.jpg";i:1351942892;s:39:"/upload/goods/201208/13455384951309.jpg";i:1351942893;s:54:"/upload/thumb/1/b/1bf60864a9de879678f8c4e3c5e9cecb.jpg";i:1351942894;s:39:"/upload/goods/201208/13455384957152.jpg";i:1351942894;s:54:"/upload/thumb/0/e/0e0779c624df05343ab2f1f4042c6572.jpg";i:1351942895;s:39:"/upload/goods/201210/13511468921834.jpg";i:1351926617;s:54:"/upload/thumb/f/5/f522af10eb8dceafa9078cecff366d57.jpg";i:1351926617;s:39:"/upload/goods/201210/13511468902640.jpg";i:1351926625;s:54:"/upload/thumb/f/7/f7ae59550827d76656a1ab561ea412b4.jpg";i:1351926626;s:39:"/upload/goods/201210/13511468878440.jpg";i:1351926628;s:54:"/upload/thumb/7/5/75eb6f43be81c79c952fa3267e438e4f.jpg";i:1351926629;s:39:"/upload/goods/201210/13511468862180.jpg";i:1351926631;s:54:"/upload/thumb/9/b/9bed611a3003490763308fb7bb82167d.jpg";i:1351926631;s:39:"/upload/goods/201210/13511468832859.jpg";i:1351926633;s:54:"/upload/thumb/d/c/dc9733e30b53abab87747795594aa50d.jpg";i:1351926634;s:39:"/upload/goods/201210/13511468832567.jpg";i:1351926637;s:54:"/upload/thumb/8/c/8c7df6349dc7cf66a0f6fc5efc453be5.jpg";i:1351926638;s:39:"/upload/goods/201210/13511468825517.jpg";i:1351926645;s:54:"/upload/thumb/7/6/76d08b41d8705f7cfd2062772fdd0f8d.jpg";i:1351926646;s:39:"/upload/goods/201210/13511468817972.jpg";i:1351926649;s:54:"/upload/thumb/2/9/2994c04d5e77fd8bf1be800ed2a25bfe.jpg";i:1351926650;s:39:"/upload/goods/201210/13511468796548.jpg";i:1351928000;s:54:"/upload/thumb/8/8/882e6f0a04bc2b59c1ee4300fab07abd.jpg";i:1351928001;s:39:"/upload/goods/201210/13511468794605.jpg";i:1351928010;s:54:"/upload/thumb/b/0/b07c20d336373319ea88f4f4b31e8423.jpg";i:1351928010;s:39:"/upload/goods/201210/13511468782345.jpg";i:1351928012;s:54:"/upload/thumb/7/0/709f524dfbc7b38c696974c3cec816d8.jpg";i:1351928013;s:39:"/upload/goods/201210/13511468915264.jpg";i:1351906868;s:54:"/upload/thumb/d/8/d8972fedfdb0e48eaa7fc37eedf10d2c.jpg";i:1351906869;s:39:"/upload/goods/201210/13511468914792.jpg";i:1351906199;s:54:"/upload/thumb/0/d/0d5f1bd05a35642bd046d38d229e90de.jpg";i:1351906869;s:39:"/upload/goods/201210/13511468892231.jpg";i:1351906870;s:54:"/upload/thumb/b/f/bfc22c0501f0d1986edb027f18a85716.jpg";i:1351906871;s:39:"/upload/goods/201210/13511468892449.jpg";i:1351906872;s:54:"/upload/thumb/b/0/b090616794a7762043617edca2831703.jpg";i:1351906873;s:39:"/upload/goods/201210/13511468884755.jpg";i:1351906879;s:54:"/upload/thumb/1/1/1161da2cd6f59109279c5705132a78bf.jpg";i:1351906879;s:39:"/upload/goods/201210/13511468867379.jpg";i:1351906889;s:54:"/upload/thumb/0/4/0453f69bd71e6c8b9dae87ee6d5339a1.jpg";i:1351906890;s:39:"/upload/goods/201208/13455385004520.jpg";i:1351943004;s:54:"/upload/thumb/b/6/b68b07125bdbfd1b43c10b42ea45902c.jpg";i:1351943005;s:39:"/upload/goods/201208/13455385013677.jpg";i:1351943005;s:54:"/upload/thumb/1/2/12c641fb61aeb3bad4c829d302c99acc.jpg";i:1351943006;s:39:"/upload/goods/201208/13455385013853.jpg";i:1351943007;s:54:"/upload/thumb/e/9/e99c77256da848f2b510e4db33073d71.jpg";i:1351943007;s:39:"/upload/goods/201208/13455385029413.jpg";i:1351871699;s:54:"/upload/thumb/5/f/5f1b2159d7cc142199935b6171978fa9.jpg";i:1351871700;s:39:"/upload/goods/201208/13455385029326.jpg";i:1351871700;s:54:"/upload/thumb/3/1/31ce9f69d575114201a98c9c5e9915a5.jpg";i:1351871701;s:39:"/upload/goods/201208/13455385034088.jpg";i:1351871701;s:54:"/upload/thumb/0/6/0617bf933cea3040b5666eb017635217.jpg";i:1351871702;s:39:"/upload/goods/201208/13455501414243.jpg";i:1351943021;s:54:"/upload/thumb/7/d/7df5c9be6fbb3bf09f0c7f9e76f04d92.jpg";i:1351943022;s:39:"/upload/goods/201208/13455501422100.jpg";i:1351943022;s:54:"/upload/thumb/9/3/930b873388fe5fb0c3933ab4efeb13b6.jpg";i:1351943024;s:39:"/upload/goods/201208/13455501427891.jpg";i:1351943024;s:54:"/upload/thumb/e/a/ea8fab3fd52c0da1ea1ae42d3f24af86.jpg";i:1351868762;s:39:"/upload/goods/201208/13455501426348.jpg";i:1351943025;s:54:"/upload/thumb/6/e/6e72698e23b42b7b34253714e60cad5e.jpg";i:1351868763;s:39:"/upload/goods/201208/13455501431464.jpg";i:1351943026;s:54:"/upload/thumb/7/9/791a3d0f5a51459568052e806ff73a38.jpg";i:1351868764;s:39:"/upload/goods/201208/13455501455371.jpg";i:1351943028;s:54:"/upload/thumb/b/5/b5761537055aef589c9d9d871afc23b5.jpg";i:1351868764;s:39:"/upload/goods/201208/13455497461907.jpg";i:1351946177;s:54:"/upload/thumb/b/5/b522e7ee539b0c2c9084e904e94d4305.jpg";i:1351946177;s:39:"/upload/goods/201208/13455497474970.jpg";i:1351871563;s:54:"/upload/thumb/e/b/eb9f7cfceb70f31eef225f47c3b5b66d.jpg";i:1351871563;s:39:"/upload/goods/201208/13455497473653.jpg";i:1351871565;s:54:"/upload/thumb/9/5/952a200f94a4a2181faa52669a9c2c19.jpg";i:1351871566;s:39:"/upload/goods/201208/13455497474405.jpg";i:1351871566;s:54:"/upload/thumb/7/2/725e56eb4336e0f975f71804ddbedf71.jpg";i:1351871567;s:39:"/upload/goods/201208/13455497482686.jpg";i:1351871568;s:54:"/upload/thumb/7/d/7d0a670c62b1e5dd193f3f02c1bba6b2.jpg";i:1351871569;s:39:"/upload/goods/201208/13455497483856.jpg";i:1351871570;s:54:"/upload/thumb/a/c/acccd3225430d0dc82c9356077481117.jpg";i:1351871570;s:54:"/upload/thumb/9/5/950a832c54dd2df6e308b2b3bfd110a3.jpg";i:1351868809;s:39:"/upload/goods/201210/13511468749535.jpg";i:1351870861;s:54:"/upload/thumb/b/5/b5e9720eac51dd46d26013c8ff18559f.jpg";i:1351868809;s:39:"/upload/goods/201210/13511468739471.jpg";i:1351870863;s:54:"/upload/thumb/e/3/e3ddabd4838d9bb6fc3d41a652b3f05c.jpg";i:1351868810;s:39:"/upload/goods/201210/13511468727144.jpg";i:1351870871;s:54:"/upload/thumb/a/5/a59e75e0b57a93468977fa6fb13f07c7.jpg";i:1351868811;s:39:"/upload/goods/201210/13511468716517.jpg";i:1351870878;s:54:"/upload/thumb/2/6/2626a7937eea5a73e3212a4a678bb67a.jpg";i:1351868811;s:39:"/upload/goods/201210/13511468694221.jpg";i:1351870880;s:54:"/upload/thumb/6/0/609139e4e23c776e7a7397e3c05b14ed.jpg";i:1351868812;s:39:"/upload/goods/201210/13511468677097.jpg";i:1351870881;s:54:"/upload/thumb/c/0/c0ec90a263d1a268ad61cc97b6d5f485.jpg";i:1351868812;s:39:"/upload/goods/201210/13511468665822.jpg";i:1351906490;s:54:"/upload/thumb/3/4/34199c09474ea4743092b0a26ac7a6d2.jpg";i:1351869186;s:54:"/upload/thumb/8/f/8fbcf43b59633e6c7b55807d8856b29e.jpg";i:1351869187;s:39:"/upload/goods/201210/13511468599184.jpg";i:1351906496;s:54:"/upload/thumb/e/6/e61747653ad017d9d34b66ca48f80cd0.jpg";i:1351869188;s:39:"/upload/goods/201208/13455501308052.jpg";i:1351946212;s:54:"/upload/thumb/0/e/0e2996d12a80cfc682ca0b90ba27afb2.jpg";i:1351946213;s:39:"/upload/goods/201208/13455501317107.jpg";i:1351946214;s:54:"/upload/thumb/d/a/da88367a5af31d9a282613cb7464a32b.jpg";i:1351946214;s:39:"/upload/goods/201208/13455501319360.jpg";i:1351946215;s:54:"/upload/thumb/1/6/1604c2667ea70d091271b821c6b70fd8.jpg";i:1351946215;s:39:"/upload/goods/201208/13455501315495.jpg";i:1351946216;s:54:"/upload/thumb/c/5/c59ea849dab45f63381c1d48cc43cf26.jpg";i:1351946217;s:39:"/upload/goods/201208/13455501326348.jpg";i:1351946217;s:54:"/upload/thumb/1/b/1ba5604bc2d83f7511b024da3f9b5ae0.jpg";i:1351946218;s:39:"/upload/goods/201208/13455501324848.jpg";i:1351927898;s:54:"/upload/thumb/f/c/fc9d02920f538582bf5efb701ab6bdaf.jpg";i:1351946219;s:39:"/upload/goods/201208/13455501558219.jpg";i:1351954013;s:54:"/upload/thumb/7/3/7341213c80a5181c14bc395cc19c4219.jpg";i:1351954013;s:39:"/upload/goods/201208/13455501562624.jpg";i:1351954014;s:54:"/upload/thumb/4/b/4ba35dd33183299941aa7e6f12691b72.jpg";i:1351954014;s:39:"/upload/goods/201208/13455501565319.jpg";i:1351954016;s:54:"/upload/thumb/0/6/061e885b0ae3e8cfffec49af447dfc11.jpg";i:1351954016;s:39:"/upload/goods/201208/13455501575636.jpg";i:1351954017;s:54:"/upload/thumb/d/f/df9772ac3d4962971d54634aa546d4b4.jpg";i:1351954018;s:39:"/upload/goods/201208/13455501588528.jpg";i:1351954018;s:39:"/upload/goods/201208/13455501585456.jpg";i:1351954019;s:54:"/upload/thumb/f/0/f0595129e7ab23b460ed3d4860ba6109.jpg";i:1351954020;s:39:"/upload/goods/201210/13511468851185.jpg";i:1351954081;s:54:"/upload/thumb/c/c/cc5e5169564a48f128ca8bde5c236ea7.jpg";i:1351954082;s:39:"/upload/goods/201210/13511468842655.jpg";i:1351954083;s:54:"/upload/thumb/7/0/70c767afb47dd1430682c71eaf73e6b2.jpg";i:1351954084;s:39:"/upload/goods/201210/13511468806252.jpg";i:1351954086;s:54:"/upload/thumb/a/c/ac2e44edf1462465999ae9221171f319.jpg";i:1351954087;s:39:"/upload/goods/201210/13511468768587.jpg";i:1351906904;s:54:"/upload/thumb/0/c/0c97905da185d4d3a149f791a438c2fb.jpg";i:1351906904;s:39:"/upload/goods/201210/13511468752510.jpg";i:1351906910;s:54:"/upload/thumb/3/4/341bf5277062cebd5bf590f18adbff29.jpg";i:1351906910;s:39:"/upload/goods/201210/13511468754014.jpg";i:1351906914;s:54:"/upload/thumb/8/f/8f784961a082fdaad99aab7332732248.jpg";i:1351906915;s:39:"/upload/goods/201210/13511468706764.jpg";i:1351906919;s:54:"/upload/thumb/b/5/b52a9eff1c9f146ba0f1d941b39d2ee5.jpg";i:1351906919;s:39:"/upload/goods/201210/13511468688671.jpg";i:1351906920;s:54:"/upload/thumb/8/f/8fbdb07d0e6f4b6578a855514bce0568.jpg";i:1351906921;s:54:"/upload/thumb/a/1/a1ed3aff2ee2f50ee01949b2ce8e3a32.jpg";i:1351906921;s:54:"/upload/thumb/a/4/a403326caea1fe21886dcc9651112359.jpg";i:1351906922;s:39:"/upload/goods/201210/13511468612048.jpg";i:1351906925;s:54:"/upload/thumb/b/3/b3d5433026c0d15621b1929394e31e38.jpg";i:1351906926;s:39:"/upload/goods/201210/13511468606546.jpg";i:1351906930;s:54:"/upload/thumb/2/2/223d1035231a0b520eeb84b36cfef40c.jpg";i:1351906930;s:39:"/upload/goods/201210/13511468586781.jpg";i:1351906934;s:54:"/upload/thumb/f/e/fe39172d7b6b4e086f4d41221fa5d153.jpg";i:1351906935;s:39:"/upload/goods/201210/13511468566032.jpg";i:1352189489;s:54:"/upload/thumb/0/2/027c4da097677e96f9d15eb82165ef3a.jpg";i:1352189490;s:39:"/upload/goods/201210/13511468556582.jpg";i:1351906177;s:54:"/upload/thumb/1/5/15dd647c184cf62afbddbc9294dcf013.jpg";i:1352189490;s:39:"/upload/goods/201210/13511468544609.jpg";i:1352189491;s:54:"/upload/thumb/e/f/ef5eccedec5516bec2d70753468fa761.jpg";i:1352189491;s:39:"/upload/goods/201210/13511468537443.jpg";i:1351906498;s:54:"/upload/thumb/8/0/802dd03873f6376e79d4aaad4dcf22b6.jpg";i:1351869188;s:39:"/upload/goods/201210/13511468528973.jpg";i:1351935546;s:54:"/upload/thumb/5/0/50592cd145f770d2e6889b588eb1306f.jpg";i:1352189494;s:39:"/upload/goods/201210/13511468515774.jpg";i:1351906506;s:54:"/upload/thumb/b/9/b9b21ee2868e0e7a87803bf0307a756b.jpg";i:1351869189;s:39:"/upload/goods/201210/13511468503722.jpg";i:1352189494;s:54:"/upload/thumb/e/8/e8904bd7d3a501376583abd71a264ae9.jpg";i:1352189495;s:39:"/upload/goods/201210/13511468495603.jpg";i:1352189495;s:54:"/upload/thumb/d/7/d768cb08cccfca9a373b51bcdc5efc63.jpg";i:1352189496;s:39:"/upload/goods/201210/13511468489184.jpg";i:1351906513;s:54:"/upload/thumb/1/d/1dc82a2ce2488f0378b4baf0e4437a96.jpg";i:1351869189;s:39:"/upload/goods/201210/13511468463785.jpg";i:1352189499;s:54:"/upload/thumb/6/9/69f490c4d2e032371d67c8a136183fac.jpg";i:1352189499;s:39:"/upload/goods/201210/13511468447737.jpg";i:1352189500;s:54:"/upload/thumb/8/3/8361737be857eda99fd01919e0c35b42.jpg";i:1352189500;s:39:"/upload/goods/201210/13511468437361.jpg";i:1352189501;s:54:"/upload/thumb/8/4/842e5577e7dd005acf8e51ec9468a647.jpg";i:1352189501;s:39:"/upload/goods/201210/13511468421682.jpg";i:1352189502;s:54:"/upload/thumb/e/f/ef8b0e3d679477fc6737626a859060ae.jpg";i:1352189502;s:39:"/upload/goods/201210/13511468429476.jpg";i:1351906515;s:54:"/upload/thumb/0/2/027b9df3163415b291d0062f6e3fc71a.jpg";i:1351869190;s:39:"/upload/goods/201210/13511468415804.jpg";i:1352189505;s:54:"/upload/thumb/7/e/7eb31445905f4b70d11d13f4a9813ebf.jpg";i:1352189505;s:39:"/upload/goods/201210/13511468401851.jpg";i:1352189506;s:54:"/upload/thumb/7/6/76e814f869d577efc8168bc86e767874.jpg";i:1352189506;s:39:"/upload/goods/201210/13511468395488.jpg";i:1352189507;s:54:"/upload/thumb/3/7/3787432edd2749a19579037eff596067.jpg";i:1352189507;s:39:"/upload/goods/201210/13511468379035.jpg";i:1352189508;s:54:"/upload/thumb/0/1/01a2b47920a8b2bb87b0b878e8916484.jpg";i:1352189509;s:39:"/upload/goods/201210/13511468369900.jpg";i:1351906519;s:54:"/upload/thumb/3/a/3a2674a34dc8907393b0cca821b82b86.jpg";i:1351869191;s:39:"/upload/goods/201210/13511468359118.jpg";i:1352189510;s:54:"/upload/thumb/1/1/11a64ed567bd0c3ae7e15158aac639e7.jpg";i:1352189510;s:39:"/upload/goods/201210/13511468342954.jpg";i:1352189511;s:54:"/upload/thumb/e/6/e65a82eb97adac149d821e89f63f6e6a.jpg";i:1352189511;s:54:"/upload/thumb/c/3/c32a6da54defb8e5135de0abb33c2ca9.jpg";i:1352189511;s:39:"/upload/goods/201210/13511468316780.jpg";i:1351906527;s:54:"/upload/thumb/f/4/f4f125f967059b28f808eb17e6a5788b.jpg";i:1351869191;s:39:"/upload/goods/201210/13511468293634.jpg";i:1351906534;s:54:"/upload/thumb/6/d/6d56c53f3019da278c0c9535910ebe20.jpg";i:1351869192;s:39:"/upload/goods/201210/13511468264128.jpg";i:1352189514;s:54:"/upload/thumb/a/3/a35b8e5eeef1cf3183b1a2a5d99ec2e7.jpg";i:1352189514;s:39:"/upload/goods/201210/13511326792512.jpg";i:1351906611;s:54:"/upload/thumb/8/0/8066fc5259ad97577e724ed48566478a.jpg";i:1351906612;s:39:"/upload/goods/201210/13511326781608.jpg";i:1351906614;s:54:"/upload/thumb/4/3/43a0387e8e671edaddacb893778aa2ad.jpg";i:1351906615;s:39:"/upload/goods/201210/13511326771481.jpg";i:1352189516;s:54:"/upload/thumb/f/3/f36bf1c00119b96ac6d2439785323161.jpg";i:1352189516;s:39:"/upload/goods/201210/13511326762390.jpg";i:1352189517;s:54:"/upload/thumb/5/6/56e9e64385b6f7968e62831e20c8c0c9.jpg";i:1352189517;s:39:"/upload/goods/201210/13511326754659.jpg";i:1351906624;s:54:"/upload/thumb/d/2/d2a1d953184f56cce4ec302a15277c10.jpg";i:1351906624;s:39:"/upload/goods/201210/13511326757401.jpg";i:1351906625;s:54:"/upload/thumb/4/7/47943547cbfe754ca1b0f9296903527c.jpg";i:1351906630;s:39:"/upload/goods/201210/13511326743454.jpg";i:1351906636;s:54:"/upload/thumb/f/5/f5342e69fe5c40742cafdecd6275f339.jpg";i:1351906637;s:39:"/upload/goods/201210/13511326736915.jpg";i:1351906641;s:54:"/upload/thumb/1/d/1d8aeade19a63cb453f9590e291b604b.jpg";i:1351906641;s:39:"/upload/goods/201210/13511326726217.jpg";i:1351906645;s:54:"/upload/thumb/a/7/a7e4ada86dee14c2bfce6c1e28df881a.jpg";i:1351906646;s:39:"/upload/goods/201210/13511326713640.jpg";i:1351906648;s:54:"/upload/thumb/0/2/02fe341abbcb1f22c62a58bea48c9f98.jpg";i:1351906649;s:39:"/upload/goods/201210/13511326706844.jpg";i:1351906655;s:54:"/upload/thumb/7/6/76bcdc382c07250c27989619e95a973e.jpg";i:1351906656;s:39:"/upload/goods/201210/13511326699588.jpg";i:1352189520;s:54:"/upload/thumb/5/6/56ed1141bbeb73de319ac63a34c3aa3e.jpg";i:1352189521;s:39:"/upload/goods/201210/13511326688552.jpg";i:1352189521;s:54:"/upload/thumb/d/1/d114822ba9724b2ede7d29cc20b3366c.jpg";i:1352189522;s:39:"/upload/goods/201210/13511326673332.jpg";i:1352189522;s:54:"/upload/thumb/7/2/7243160a803e5e9a1224d22557bdbd34.jpg";i:1352189522;s:39:"/upload/goods/201210/13511326665779.jpg";i:1351906658;s:54:"/upload/thumb/6/9/6976b2df503fd4685eab9352ac40bcbe.jpg";i:1351906658;s:39:"/upload/goods/201210/13511326651247.jpg";i:1352189523;s:54:"/upload/thumb/7/8/783cf19369470bb310c264aca478b816.jpg";i:1352189524;s:39:"/upload/goods/201210/13511326643534.jpg";i:1351906775;s:54:"/upload/thumb/9/8/98cac56b5d1e3460190edb600c06f3c2.jpg";i:1351906776;s:39:"/upload/goods/201210/13511326643339.jpg";i:1351906778;s:54:"/upload/thumb/f/d/fdfc174d8614127264f9a5a87a25e4a9.jpg";i:1351906778;s:39:"/upload/goods/201210/13511326625151.jpg";i:1351871841;s:54:"/upload/thumb/8/8/880b11519257c0d32b218e0295797ac5.jpg";i:1351871842;s:39:"/upload/goods/201207/13420775765382.jpg";i:1352190053;s:54:"/upload/thumb/c/1/c17bccc96a467735b58b1422bf75f4ea.jpg";i:1352190053;s:39:"/upload/goods/201207/13419256607256.jpg";i:1351871427;s:54:"/upload/thumb/9/7/976938210bc6e7cf5e5c56c2351ed47f.jpg";i:1351871428;s:39:"/upload/goods/201209/13467369104177.jpg";i:1352190054;s:54:"/upload/thumb/f/0/f082ad6a2834868b66b3b1106ac0fae7.jpg";i:1352190054;s:39:"/upload/goods/201207/13419245254580.jpg";i:1351906403;s:54:"/upload/thumb/4/f/4f0154726e8bb5efff649248033fd9a6.jpg";i:1351906403;s:39:"/upload/goods/201208/13440705812132.jpg";i:1352190055;s:54:"/upload/thumb/4/1/419ba37987807c99cf61da345205dfaf.jpg";i:1352190056;s:39:"/upload/goods/201208/13451889242151.jpg";i:1352190056;s:54:"/upload/thumb/1/b/1bc72b8b15b6158af289e0bf8d03b3bd.jpg";i:1352190056;s:39:"/upload/goods/201208/13446082734175.jpg";i:1352190057;s:54:"/upload/thumb/4/1/41eb902272fe05649ab7862cb38517fb.jpg";i:1352190057;s:39:"/upload/goods/201208/13446083671710.jpg";i:1352190057;s:54:"/upload/thumb/9/4/944a2dc1516f434f4b6309c3d4ef9df4.jpg";i:1352190058;s:39:"/upload/goods/201208/13451855061126.jpg";i:1352190058;s:54:"/upload/thumb/7/f/7fee6a40676e37047907534f37b9ff78.jpg";i:1352190058;s:39:"/upload/goods/201208/13455500369427.jpg";i:1352190060;s:54:"/upload/thumb/7/7/7775aa4c82adc755baf35ed340134bd8.jpg";i:1352190061;s:39:"/upload/goods/201208/13455500375859.jpg";i:1352190061;s:54:"/upload/thumb/b/6/b63e86449668ee25a20baca86839cbb2.jpg";i:1352190061;s:39:"/upload/goods/201208/13455500379359.jpg";i:1352190062;s:54:"/upload/thumb/6/d/6d1da02d3fbb31fcd3de591b161a3977.jpg";i:1352190062;s:39:"/upload/goods/201208/13455500382760.jpg";i:1352190062;s:54:"/upload/thumb/5/2/520cbce422210dd8f98f63050bf3f38b.jpg";i:1352190063;s:39:"/upload/goods/201208/13455500383348.jpg";i:1352190063;s:54:"/upload/thumb/e/b/eb0ed2049dfc380270c0d1520122100e.jpg";i:1352190063;s:39:"/upload/goods/201208/13455500384127.jpg";i:1352190064;s:54:"/upload/thumb/9/a/9a8f853ae3cfa1c77b3c510a4d0d9aeb.jpg";i:1352190064;s:39:"/upload/goods/201208/13455500391278.jpg";i:1352190064;s:54:"/upload/thumb/6/d/6d0189223e0651d4ce06636396d22e4a.jpg";i:1352190065;s:39:"/upload/goods/201208/13455500393490.jpg";i:1352190065;s:54:"/upload/thumb/e/2/e27d3fc216067e971d682e79bcfa0e37.jpg";i:1352190065;s:39:"/upload/goods/201208/13455500407621.jpg";i:1352190066;s:54:"/upload/thumb/1/7/17f7a9accacd47899bdcae4cddaee242.jpg";i:1352190066;s:39:"/upload/goods/201208/13455500404928.jpg";i:1352190066;s:54:"/upload/thumb/f/e/fe99b55c54c502e9f636fd5cf44f1741.jpg";i:1352190067;s:39:"/upload/goods/201208/13455500419519.jpg";i:1352190074;s:54:"/upload/thumb/8/5/850df485fcb19855e38be215c57d671a.jpg";i:1352190074;s:39:"/upload/goods/201208/13455500411199.jpg";i:1352190075;s:54:"/upload/thumb/5/9/59e56c4e462ba9b957b8f8400721f936.jpg";i:1352190075;s:39:"/upload/goods/201208/13455500411160.jpg";i:1352190075;s:54:"/upload/thumb/9/c/9ced1cdc3983966c2428300dc0b48cb0.jpg";i:1352190076;s:39:"/upload/goods/201208/13455500422273.jpg";i:1352190076;s:54:"/upload/thumb/5/7/57b1e0a483cc1c5d3cbfc018ee870105.jpg";i:1352190076;s:39:"/upload/goods/201208/13455500423308.jpg";i:1352190077;s:54:"/upload/thumb/1/6/166974bd9a72edf8818ac2bf51f5abac.jpg";i:1352190077;s:39:"/upload/goods/201208/13455500438304.jpg";i:1352190077;s:54:"/upload/thumb/5/a/5a1b7241bc3e44eb2590b3e0a8a95bbf.jpg";i:1352190078;s:39:"/upload/goods/201208/13455500433803.jpg";i:1352190078;s:54:"/upload/thumb/c/2/c2682cfff553bdeaa0f64ae514af22b0.jpg";i:1352190078;s:39:"/upload/goods/201208/13455500441021.jpg";i:1352190079;s:54:"/upload/thumb/8/0/8002ecf4c9407c63d4905b80175b91bf.jpg";i:1352190079;s:39:"/upload/goods/201208/13455500442751.jpg";i:1352190079;s:54:"/upload/thumb/d/a/dabb268442f5b2f8b83707f799ff96b7.jpg";i:1352190079;s:39:"/upload/goods/201208/13455500442260.jpg";i:1352190080;s:54:"/upload/thumb/e/c/ec1f287d5143ddb83d4912765e30260e.jpg";i:1352190080;s:39:"/upload/goods/201208/13455500454677.jpg";i:1352190193;s:54:"/upload/thumb/a/0/a01729de5cbc4b2618230c651d783f4f.jpg";i:1352190194;s:39:"/upload/goods/201208/13455500453587.jpg";i:1352190194;s:54:"/upload/thumb/1/c/1c6528616a356ace05baf67f7b8423ed.jpg";i:1352190194;s:39:"/upload/goods/201208/13455500463412.jpg";i:1352190195;s:54:"/upload/thumb/d/1/d12aa8dc0f17e014303fd8726c58dd0a.jpg";i:1352190195;s:39:"/upload/goods/201208/13455500469221.jpg";i:1352190195;s:54:"/upload/thumb/6/7/67ee79c42234709d59ebc13afdd17bfa.jpg";i:1352190196;s:39:"/upload/goods/201208/13455500471154.jpg";i:1352190196;s:54:"/upload/thumb/6/a/6af84296088653b95e3e15a6089e65a4.jpg";i:1352190196;s:39:"/upload/goods/201208/13455500479854.jpg";i:1352190197;s:54:"/upload/thumb/7/c/7cda78ca25317d9d3c853a5577f287b5.jpg";i:1352190197;s:39:"/upload/goods/201208/13455500475400.jpg";i:1352190197;s:54:"/upload/thumb/e/2/e2959f45ba3568ae2af37ee0f76f0d94.jpg";i:1352190197;s:39:"/upload/goods/201208/13455500482599.jpg";i:1352190198;s:54:"/upload/thumb/e/1/e11ddea3516ef58083120efbc1ddcc76.jpg";i:1352190198;s:39:"/upload/goods/201208/13455500483090.jpg";i:1352190198;s:54:"/upload/thumb/2/a/2a32e0a351c53e680d4b6268141c8076.jpg";i:1352190199;s:39:"/upload/goods/201208/13455500493194.jpg";i:1352190199;s:54:"/upload/thumb/6/a/6a3493ac58da1faffe7e5176025f24f5.jpg";i:1352190199;s:54:"/upload/thumb/8/9/898e1280053528e9f8c2fb541e85b8ca.jpg";i:1352205314;s:54:"/upload/thumb/c/6/c692f8c4700bc018eece8d457c1774b4.jpg";i:1352205318;s:54:"/upload/thumb/c/7/c7f3ba9d742d4cb9b74e82e39f2b946a.jpg";i:1352205318;s:39:"/upload/goods/201211/13519409406700.jpg";i:1351940941;s:54:"/upload/thumb/6/2/62a0181a8f9070bdcf6782dff01856cb.jpg";i:1352205320;s:39:"/upload/goods/201211/13519405397038.jpg";i:1351940544;s:54:"/upload/thumb/b/4/b4288f362046bed1b598cb7dfe4f8a67.jpg";i:1352205323;s:39:"/upload/goods/201211/13519403624300.jpg";i:1351940363;s:54:"/upload/thumb/5/9/598f2f9774241a506f42dd7d56749ca8.jpg";i:1352205325;s:39:"/upload/goods/201211/13519402891209.jpg";i:1351940289;s:54:"/upload/thumb/9/0/905d870c5b26e0eff0a0302dbb115587.jpg";i:1352205330;s:54:"/upload/thumb/8/e/8eae2353c303944ebfaf1af82a2f1e13.jpg";i:1352205334;s:57:"/upload/goods/201211/4b9a3b60513418995b5e6e836a5154f1.jpg";i:1352205628;s:52:"/upload/tag/a/b/ab609e7d48b079eec0092195f8cbe26d.jpg";i:1352205633;s:54:"/upload/thumb/5/9/59406770eb9a15850d5d83cfb5d5106e.jpg";i:1352205742;s:54:"/upload/thumb/b/e/bea561b41d2f5fc74c2f7c707c22116d.jpg";i:1352205352;s:54:"/upload/thumb/e/1/e107c1a1b1c912ff4177db16a55341e4.jpg";i:1352205353;s:54:"/upload/thumb/e/9/e902b56511df06cfeab1ccb6728520f1.jpg";i:1352205354;s:54:"/upload/thumb/1/1/1179c4beedc77152d8d21bf77840e054.jpg";i:1352205355;s:54:"/upload/thumb/3/c/3c45d6aa21c9d839c112dee92077d1b0.jpg";i:1352205359;s:54:"/upload/thumb/0/f/0f0bf03c63952f3902f643d3e7a93397.jpg";i:1352205359;s:54:"/upload/thumb/b/6/b6f58e1bf3e05b9410f045a05561f429.jpg";i:1352205361;s:54:"/upload/thumb/9/a/9a5211695e7bfd194a6480b2f50e16a1.jpg";i:1352205372;s:39:"/upload/photo/201208/13461677012562.jpg";i:1352266409;s:54:"/upload/thumb/3/e/3e9b6f3dfaf85a9dd4bc9c7b21ee9fd4.jpg";i:1352266410;s:39:"/upload/photo/201208/13461675967392.jpg";i:1352266411;s:54:"/upload/thumb/2/e/2ead1317afc14a8ad0a6f2d8502f88dc.jpg";i:1352266412;s:54:"/upload/thumb/9/4/94a769898397e2e32ee982096fe0cf93.jpg";i:1351868297;s:39:"/upload/goods/201208/13455501786598.jpg";i:1352341447;s:54:"/upload/thumb/9/f/9f232404ec702efb36642bff8ac6038c.jpg";i:1352341448;s:39:"/upload/goods/201208/13455501794594.jpg";i:1352341448;s:54:"/upload/thumb/c/6/c6749e356c23d96b7a8f3398b605e00c.jpg";i:1352341448;s:39:"/upload/goods/201208/13455501815851.jpg";i:1352341449;s:54:"/upload/thumb/8/8/88c719b767e14324b7f5ec75764216f1.jpg";i:1352341449;s:39:"/upload/goods/201208/13455501815673.jpg";i:1352341449;s:54:"/upload/thumb/8/5/8597f9d775e212d1f47e6f629745ef5b.jpg";i:1352341450;s:39:"/upload/goods/201208/13455501812701.jpg";i:1352341450;s:54:"/upload/thumb/9/a/9a778f569e829fb557326d05a336178d.jpg";i:1352341451;s:39:"/upload/goods/201208/13455501824908.jpg";i:1352341451;s:54:"/upload/thumb/5/a/5a35b2c375c997e757740cc302d38869.jpg";i:1352341451;s:39:"/upload/goods/201209/13476045349063.jpg";i:1352341462;s:54:"/upload/thumb/6/e/6ef501066b48188667c6d0353dc86f5c.jpg";i:1352341463;s:39:"/upload/goods/201209/13476045359213.jpg";i:1352341463;s:54:"/upload/thumb/0/5/05351a7e7f5386d828be7e1b204fa4ec.jpg";i:1352341463;s:39:"/upload/goods/201209/13476045367695.jpg";i:1352341464;s:54:"/upload/thumb/7/c/7c78393a3b199d6ecf623f15d67a5ef5.jpg";i:1352341464;s:39:"/upload/goods/201209/13476045248777.jpg";i:1352341465;s:54:"/upload/thumb/5/9/59d5c746b738d4495eda0a55671f4f42.jpg";i:1352341465;s:39:"/upload/goods/201210/13498615345512.jpg";i:1352341465;s:54:"/upload/thumb/5/b/5b2d12990bf991aa4bf8baafc9d79197.jpg";i:1352341466;s:39:"/upload/goods/201210/13502870538434.jpg";i:1352341466;s:54:"/upload/thumb/2/9/299b79add009a51c290a7be0025dcff5.jpg";i:1352341466;s:54:"/upload/thumb/3/a/3a11ee7308672c52fdb328d108c95320.jpg";i:1352341467;s:39:"/upload/goods/201208/13451890052727.jpg";i:1351907221;s:54:"/upload/thumb/2/8/28d24c19f102b41902e1e2065397b969.jpg";i:1352341468;s:39:"/upload/goods/201208/13451869723566.jpg";i:1352341468;s:54:"/upload/thumb/8/c/8ca4de8facd040a7032794e81518bd2a.jpg";i:1352341469;s:39:"/upload/goods/201209/13476040607300.jpg";i:1351935512;s:54:"/upload/thumb/8/e/8e2e12bdf7298599a7169daf228a9d41.jpg";i:1351935513;s:39:"/upload/goods/201209/13476040467153.jpg";i:1351935530;s:54:"/upload/thumb/a/9/a9754832bf681488833d77e55b2840fa.jpg";i:1351935531;s:39:"/upload/goods/201209/13476039996161.jpg";i:1351935542;s:54:"/upload/thumb/c/5/c58b104c38470e88dab9805277c09f99.jpg";i:1351935542;s:54:"/upload/thumb/f/7/f714f4635ba089379a98964bf0a2561c.jpg";i:1351935894;s:39:"/upload/goods/201210/13508936678405.jpg";i:1351935470;s:54:"/upload/thumb/d/e/de1297202e42507740210a2a5e030431.jpg";i:1351935471;s:39:"/upload/goods/201210/13508936661081.jpg";i:1351935480;s:54:"/upload/thumb/e/2/e2dd98fde10cfc46100c970068a387f3.jpg";i:1351935480;s:54:"/upload/thumb/b/2/b2cdf1bb1b5e3d310f81c217429e7674.jpg";i:1351935485;s:39:"/upload/goods/201210/13508936913328.jpg";i:1351935492;s:54:"/upload/thumb/7/6/766e3b7eb9af9f9c2840b213be96dd13.jpg";i:1351935492;s:39:"/upload/goods/201210/13508936904095.jpg";i:1351935496;s:54:"/upload/thumb/4/2/4215c4a45ddbdc3467103b78c451d437.jpg";i:1351935496;s:54:"/upload/thumb/6/4/64f2ca33949bd788eb80ef80eadb87a8.jpg";i:1351941339;s:39:"/upload/goods/201210/13508936609743.jpg";i:1351935500;s:54:"/upload/thumb/2/2/22ed637464541077fabd427ad5e74296.jpg";i:1351935500;s:39:"/upload/goods/201210/13508936521812.jpg";i:1351935506;s:54:"/upload/thumb/5/0/5080e26a126fa6a7042aab1cbdad9a4b.jpg";i:1351935506;s:54:"/upload/thumb/1/a/1aa49c3199fe8ddb6e7e516deb0a636e.jpg";i:1352341472;s:54:"/upload/thumb/f/6/f6a0343dbad4596af76c1aac3f7d7708.jpg";i:1352341472;s:39:"/upload/goods/201209/13476040653777.jpg";i:1352341473;s:54:"/upload/thumb/a/a/aa553e7342fc7caee5247fb42babaa4c.jpg";i:1352341473;s:39:"/upload/goods/201209/13476040425599.jpg";i:1352341474;s:54:"/upload/thumb/1/f/1f851886dabfa7711aa68793e9d3d441.jpg";i:1352341474;s:39:"/upload/goods/201210/13503530333443.jpg";i:1352341474;s:54:"/upload/thumb/c/0/c0518845f89a76c2c8384c1511a190ba.jpg";i:1352341475;s:39:"/upload/goods/201210/13511326597554.jpg";i:1351871812;s:54:"/upload/thumb/7/e/7e538b93a84b469405978b29c1f6424d.jpg";i:1352341475;s:54:"/upload/thumb/d/f/dfb4184dcfebbb40743e57a8525f77b0.jpg";i:1352341475;}');
INSERT INTO `pin_config` (`key`, `value`) VALUES
('taobao_cates', 'a:102:{i:0;a:5:{s:3:"cid";s:2:"26";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"汽车/用品/配件/改装";s:10:"parent_cid";s:1:"0";s:4:"subs";a:10:{i:0;a:4:{s:3:"cid";s:8:"50014480";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"汽车用品/内饰品";s:10:"parent_cid";s:2:"26";}i:1;a:4:{s:3:"cid";s:8:"50014481";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"汽车外饰品/加装装潢/防护";s:10:"parent_cid";s:2:"26";}i:2;a:4:{s:3:"cid";s:8:"50018708";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"汽车零配件";s:10:"parent_cid";s:2:"26";}i:3;a:4:{s:3:"cid";s:8:"50014482";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"汽车影音/车用电子/电器";s:10:"parent_cid";s:2:"26";}i:4;a:4:{s:3:"cid";s:8:"50018720";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"汽车GPS导航仪及配件";s:10:"parent_cid";s:2:"26";}i:5;a:4:{s:3:"cid";s:8:"50014479";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"汽车美容/保养/维修";s:10:"parent_cid";s:2:"26";}i:6;a:4:{s:3:"cid";s:8:"50018772";s:9:"is_parent";s:4:"true";s:4:"name";s:31:"车用清洗用品/清洗工具";s:10:"parent_cid";s:2:"26";}i:7;a:4:{s:3:"cid";s:8:"50014648";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"摩托车/骑士装备";s:10:"parent_cid";s:2:"26";}i:8;a:4:{s:3:"cid";s:4:"2618";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"出租/培训/其它";s:10:"parent_cid";s:2:"26";}i:9;a:4:{s:3:"cid";s:8:"50023950";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"实体服务";s:10:"parent_cid";s:2:"26";}}}i:1;a:5:{s:3:"cid";s:8:"50020808";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"家居饰品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:29:{i:0;a:4:{s:3:"cid";s:8:"50020835";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"摆件";s:10:"parent_cid";s:8:"50020808";}i:1;a:4:{s:3:"cid";s:8:"50021907";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"现代装饰画";s:10:"parent_cid";s:8:"50020808";}i:2;a:4:{s:3:"cid";s:8:"50021902";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"油画";s:10:"parent_cid";s:8:"50020808";}i:3;a:4:{s:3:"cid";s:8:"50021905";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"国画/书法";s:10:"parent_cid";s:8:"50020808";}i:4;a:4:{s:3:"cid";s:8:"50002045";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"DIY/数字油画";s:10:"parent_cid";s:8:"50020808";}i:5;a:4:{s:3:"cid";s:8:"50005919";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"无框画挂钟";s:10:"parent_cid";s:8:"50020808";}i:6;a:4:{s:3:"cid";s:8:"50020841";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"照片/照片墙";s:10:"parent_cid";s:8:"50020808";}i:7;a:4:{s:3:"cid";s:8:"50020836";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"装饰器皿";s:10:"parent_cid";s:8:"50020808";}i:8;a:4:{s:3:"cid";s:8:"50000561";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"相框/画框";s:10:"parent_cid";s:8:"50020808";}i:9;a:4:{s:3:"cid";s:8:"50020840";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"贴饰";s:10:"parent_cid";s:8:"50020808";}i:10;a:4:{s:3:"cid";s:8:"50020842";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"装饰架/装饰搁板";s:10:"parent_cid";s:8:"50020808";}i:11;a:4:{s:3:"cid";s:8:"50020843";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"装饰挂牌";s:10:"parent_cid";s:8:"50020808";}i:12;a:4:{s:3:"cid";s:8:"50020834";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"雕刻工艺";s:10:"parent_cid";s:8:"50020808";}i:13;a:4:{s:3:"cid";s:8:"50001290";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"壁饰";s:10:"parent_cid";s:8:"50020808";}i:14;a:4:{s:3:"cid";s:8:"50020845";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"装饰挂钩";s:10:"parent_cid";s:8:"50020808";}i:15;a:4:{s:3:"cid";s:8:"50020846";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"风铃及配件";s:10:"parent_cid";s:8:"50020808";}i:16;a:4:{s:3:"cid";s:8:"50020848";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"蜡烛/烛台";s:10:"parent_cid";s:8:"50020808";}i:17;a:4:{s:3:"cid";s:8:"50020850";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"家居钟饰/闹钟";s:10:"parent_cid";s:8:"50020808";}i:18;a:4:{s:3:"cid";s:8:"50020851";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"工艺伞";s:10:"parent_cid";s:8:"50020808";}i:19;a:4:{s:3:"cid";s:8:"50020839";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"无框画（此类目已屏蔽）";s:10:"parent_cid";s:8:"50020808";}i:20;a:4:{s:3:"cid";s:8:"50020856";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"创意饰品";s:10:"parent_cid";s:8:"50020808";}i:21;a:4:{s:3:"cid";s:8:"50010356";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"工艺船";s:10:"parent_cid";s:8:"50020808";}i:22;a:4:{s:3:"cid";s:8:"50022440";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"工艺扇";s:10:"parent_cid";s:8:"50020808";}i:23;a:4:{s:3:"cid";s:8:"50003462";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"挂历/台历";s:10:"parent_cid";s:8:"50020808";}i:24;a:4:{s:3:"cid";s:8:"50020855";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"竹炭包";s:10:"parent_cid";s:8:"50020808";}i:25;a:4:{s:3:"cid";s:8:"50020854";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"香薰炉";s:10:"parent_cid";s:8:"50020808";}i:26;a:4:{s:3:"cid";s:8:"50022568";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其他工艺饰品";s:10:"parent_cid";s:8:"50020808";}i:27;a:4:{s:3:"cid";s:8:"50024938";s:9:"is_parent";s:4:"true";s:4:"name";s:36:"花瓶/花器/仿真花/仿真饰品";s:10:"parent_cid";s:8:"50020808";}i:28;a:4:{s:3:"cid";s:8:"50020849";s:9:"is_parent";s:5:"false";s:4:"name";s:27:"仿真饰品（已删除）";s:10:"parent_cid";s:8:"50020808";}}}i:2;a:5:{s:3:"cid";s:8:"50020857";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"特色手工艺";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50021045";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"少数民族特色工艺品";s:10:"parent_cid";s:8:"50020857";}i:1;a:4:{s:3:"cid";s:8:"50021046";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"海外工艺品";s:10:"parent_cid";s:8:"50020857";}i:2;a:4:{s:3:"cid";s:8:"50021047";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"地区特色工艺品";s:10:"parent_cid";s:8:"50020857";}i:3;a:4:{s:3:"cid";s:8:"50021048";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"宗教工艺品";s:10:"parent_cid";s:8:"50020857";}i:4;a:4:{s:3:"cid";s:8:"50025555";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"其他特色工艺品";s:10:"parent_cid";s:8:"50020857";}i:5;a:4:{s:3:"cid";s:8:"50025557";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"圣诞用品";s:10:"parent_cid";s:8:"50020857";}i:6;a:4:{s:3:"cid";s:4:"2902";s:9:"is_parent";s:5:"false";s:4:"name";s:53:"禁止发布商品，后果自负(原民间工艺品)";s:10:"parent_cid";s:8:"50020857";}i:7;a:4:{s:3:"cid";s:8:"50025777";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"葫芦";s:10:"parent_cid";s:8:"50020857";}}}i:3;a:5:{s:3:"cid";s:8:"50025707";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"景点门票/度假线路/旅游服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50017087";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"景点门票";s:10:"parent_cid";s:8:"50025707";}i:1;a:4:{s:3:"cid";s:8:"50012849";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"旅游度假线路";s:10:"parent_cid";s:8:"50025707";}i:2;a:4:{s:3:"cid";s:8:"50012910";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"旅游卡券/服务";s:10:"parent_cid";s:8:"50025707";}i:3;a:4:{s:3:"cid";s:8:"50012917";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"巴士/地铁/交通卡券";s:10:"parent_cid";s:8:"50025707";}i:4;a:4:{s:3:"cid";s:8:"50014469";s:9:"is_parent";s:5:"false";s:4:"name";s:42:"租车（旅游包车、自行车租赁）";s:10:"parent_cid";s:8:"50025707";}i:5;a:4:{s:3:"cid";s:8:"50019242";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"邮轮/游船";s:10:"parent_cid";s:8:"50025707";}i:6;a:4:{s:3:"cid";s:8:"50024207";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"旅游周边商品";s:10:"parent_cid";s:8:"50025707";}i:7;a:4:{s:3:"cid";s:8:"50136001";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"实景演出门票";s:10:"parent_cid";s:8:"50025707";}}}i:4;a:5:{s:3:"cid";s:2:"30";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"男装";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50011153";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"背心/马甲";s:10:"parent_cid";s:2:"30";}i:1;a:4:{s:3:"cid";s:8:"50000436";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"T恤";s:10:"parent_cid";s:2:"30";}i:2;a:4:{s:3:"cid";s:8:"50010402";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"Polo衫";s:10:"parent_cid";s:2:"30";}i:3;a:4:{s:3:"cid";s:8:"50011123";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"衬衫";s:10:"parent_cid";s:2:"30";}i:4;a:4:{s:3:"cid";s:8:"50000557";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"针织衫/毛衣";s:10:"parent_cid";s:2:"30";}i:5;a:4:{s:3:"cid";s:8:"50010167";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"牛仔裤";s:10:"parent_cid";s:2:"30";}i:6;a:4:{s:3:"cid";s:4:"3035";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"休闲裤";s:10:"parent_cid";s:2:"30";}i:7;a:4:{s:3:"cid";s:8:"50025885";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"棉裤";s:10:"parent_cid";s:2:"30";}i:8;a:4:{s:3:"cid";s:8:"50025884";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"羽绒裤";s:10:"parent_cid";s:2:"30";}i:9;a:4:{s:3:"cid";s:8:"50011127";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"皮裤";s:10:"parent_cid";s:2:"30";}i:10;a:4:{s:3:"cid";s:8:"50010158";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"夹克";s:10:"parent_cid";s:2:"30";}i:11;a:4:{s:3:"cid";s:8:"50010159";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"卫衣";s:10:"parent_cid";s:2:"30";}i:12;a:4:{s:3:"cid";s:8:"50011159";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"风衣";s:10:"parent_cid";s:2:"30";}i:13;a:4:{s:3:"cid";s:8:"50025883";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"呢大衣";s:10:"parent_cid";s:2:"30";}i:14;a:4:{s:3:"cid";s:8:"50011165";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"棉衣";s:10:"parent_cid";s:2:"30";}i:15;a:4:{s:3:"cid";s:8:"50011161";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"皮衣";s:10:"parent_cid";s:2:"30";}i:16;a:4:{s:3:"cid";s:8:"50011167";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"羽绒服";s:10:"parent_cid";s:2:"30";}i:17;a:4:{s:3:"cid";s:8:"50010160";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"西服";s:10:"parent_cid";s:2:"30";}i:18;a:4:{s:3:"cid";s:8:"50011129";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"西裤";s:10:"parent_cid";s:2:"30";}i:19;a:4:{s:3:"cid";s:8:"50011130";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"西服套装";s:10:"parent_cid";s:2:"30";}i:20;a:4:{s:3:"cid";s:8:"50001748";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"民族服装";s:10:"parent_cid";s:2:"30";}i:21;a:4:{s:3:"cid";s:8:"50005867";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"工装制服";s:10:"parent_cid";s:2:"30";}}}i:5;a:5:{s:3:"cid";s:8:"50008164";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"住宅家具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50001705";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"柜类";s:10:"parent_cid";s:8:"50008164";}i:1;a:4:{s:3:"cid";s:8:"50015200";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"床类";s:10:"parent_cid";s:8:"50008164";}i:2;a:4:{s:3:"cid";s:8:"50021837";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"床垫类";s:10:"parent_cid";s:8:"50008164";}i:3;a:4:{s:3:"cid";s:8:"50020006";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"沙发类";s:10:"parent_cid";s:8:"50008164";}i:4;a:4:{s:3:"cid";s:8:"50015455";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"坐具类";s:10:"parent_cid";s:8:"50008164";}i:5;a:4:{s:3:"cid";s:8:"50015816";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"几类";s:10:"parent_cid";s:8:"50008164";}i:6;a:4:{s:3:"cid";s:8:"50008280";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"桌类";s:10:"parent_cid";s:8:"50008164";}i:7;a:4:{s:3:"cid";s:8:"50008274";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"架类";s:10:"parent_cid";s:8:"50008164";}i:8;a:4:{s:3:"cid";s:8:"50020618";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"箱类";s:10:"parent_cid";s:8:"50008164";}i:9;a:4:{s:3:"cid";s:8:"50020617";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"镜子类";s:10:"parent_cid";s:8:"50008164";}i:10;a:4:{s:3:"cid";s:8:"50020615";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"榻榻米空间";s:10:"parent_cid";s:8:"50008164";}i:11;a:4:{s:3:"cid";s:8:"50020614";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"根雕类";s:10:"parent_cid";s:8:"50008164";}i:12;a:4:{s:3:"cid";s:8:"50015915";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"屏风/花窗";s:10:"parent_cid";s:8:"50008164";}i:13;a:4:{s:3:"cid";s:8:"50015886";s:9:"is_parent";s:4:"true";s:4:"name";s:10:"案/台类";s:10:"parent_cid";s:8:"50008164";}i:14;a:4:{s:3:"cid";s:8:"50015230";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"户外/庭院家具";s:10:"parent_cid";s:8:"50008164";}i:15;a:4:{s:3:"cid";s:8:"50006281";s:9:"is_parent";s:4:"true";s:4:"name";s:10:"宜家IKEA";s:10:"parent_cid";s:8:"50008164";}i:16;a:4:{s:3:"cid";s:8:"50015568";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"家具辅料";s:10:"parent_cid";s:8:"50008164";}i:17;a:4:{s:3:"cid";s:8:"50015566";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"二手/闲置专区";s:10:"parent_cid";s:8:"50008164";}i:18;a:4:{s:3:"cid";s:8:"50015771";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"成套家具";s:10:"parent_cid";s:8:"50008164";}i:19;a:4:{s:3:"cid";s:8:"50022373";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"情趣家具";s:10:"parent_cid";s:8:"50008164";}i:20;a:4:{s:3:"cid";s:8:"50022397";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"设计师家具";s:10:"parent_cid";s:8:"50008164";}i:21;a:4:{s:3:"cid";s:8:"50236005";s:9:"is_parent";s:4:"true";s:4:"name";s:39:"家具服务（仅供集市服务商）";s:10:"parent_cid";s:8:"50008164";}}}i:6;a:5:{s:3:"cid";s:8:"50020611";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"商业/办公家具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:13:{i:0;a:4:{s:3:"cid";s:8:"50015518";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"货架/展柜";s:10:"parent_cid";s:8:"50020611";}i:1;a:4:{s:3:"cid";s:6:"211503";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"办公家具";s:10:"parent_cid";s:8:"50020611";}i:2;a:4:{s:3:"cid";s:8:"50020612";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"超市家具";s:10:"parent_cid";s:8:"50020611";}i:3;a:4:{s:3:"cid";s:8:"50020671";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"城市家具";s:10:"parent_cid";s:8:"50020611";}i:4;a:4:{s:3:"cid";s:8:"50015541";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"酒店家具";s:10:"parent_cid";s:8:"50020611";}i:5;a:4:{s:3:"cid";s:8:"50020672";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"餐饮/烘焙家具";s:10:"parent_cid";s:8:"50020611";}i:6;a:4:{s:3:"cid";s:8:"50020673";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"服装店家具";s:10:"parent_cid";s:8:"50020611";}i:7;a:4:{s:3:"cid";s:8:"50020674";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"娱乐/酒吧/KTV家具";s:10:"parent_cid";s:8:"50020611";}i:8;a:4:{s:3:"cid";s:8:"50020675";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"桑拿/足浴/健身家具";s:10:"parent_cid";s:8:"50020611";}i:9;a:4:{s:3:"cid";s:8:"50020677";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"发廊/美容家具";s:10:"parent_cid";s:8:"50020611";}i:10;a:4:{s:3:"cid";s:8:"50020679";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"校园教学家具";s:10:"parent_cid";s:8:"50020611";}i:11;a:4:{s:3:"cid";s:8:"50020680";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"医疗家具";s:10:"parent_cid";s:8:"50020611";}i:12;a:4:{s:3:"cid";s:8:"50020681";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"殡葬业家具";s:10:"parent_cid";s:8:"50020611";}}}i:7;a:5:{s:3:"cid";s:8:"50023904";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"国货精品数码";s:10:"parent_cid";s:1:"0";s:4:"subs";a:2:{i:0;a:4:{s:3:"cid";s:8:"50023945";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"国货精品笔记本";s:10:"parent_cid";s:8:"50023904";}i:1;a:4:{s:3:"cid";s:8:"50012081";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"国货精品手机";s:10:"parent_cid";s:8:"50023904";}}}i:8;a:5:{s:3:"cid";s:8:"50010788";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"彩妆/香水/美妆工具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:25:{i:0;a:4:{s:3:"cid";s:8:"50010815";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"香水";s:10:"parent_cid";s:8:"50010788";}i:1;a:4:{s:3:"cid";s:8:"50010793";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"隔离/妆前/打底";s:10:"parent_cid";s:8:"50010788";}i:2;a:4:{s:3:"cid";s:8:"50013794";s:9:"is_parent";s:5:"false";s:4:"name";s:5:"BB霜";s:10:"parent_cid";s:8:"50010788";}i:3;a:4:{s:3:"cid";s:8:"50010803";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"遮瑕";s:10:"parent_cid";s:8:"50010788";}i:4;a:4:{s:3:"cid";s:8:"50010789";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"粉底液/膏";s:10:"parent_cid";s:8:"50010788";}i:5;a:4:{s:3:"cid";s:8:"50010790";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"粉饼";s:10:"parent_cid";s:8:"50010788";}i:6;a:4:{s:3:"cid";s:8:"50010792";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"蜜粉/散粉";s:10:"parent_cid";s:8:"50010788";}i:7;a:4:{s:3:"cid";s:8:"50010798";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"眉笔/眉粉/眉膏";s:10:"parent_cid";s:8:"50010788";}i:8;a:4:{s:3:"cid";s:8:"50010797";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"眼线";s:10:"parent_cid";s:8:"50010788";}i:9;a:4:{s:3:"cid";s:8:"50010796";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"眼影";s:10:"parent_cid";s:8:"50010788";}i:10;a:4:{s:3:"cid";s:8:"50010794";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"睫毛膏/睫毛增长液";s:10:"parent_cid";s:8:"50010788";}i:11;a:4:{s:3:"cid";s:8:"50019254";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"假睫毛/假睫毛工具";s:10:"parent_cid";s:8:"50010788";}i:12;a:4:{s:3:"cid";s:8:"50010805";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"腮红/胭脂";s:10:"parent_cid";s:8:"50010788";}i:13;a:4:{s:3:"cid";s:8:"50010936";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"修颜/高光/阴影粉";s:10:"parent_cid";s:8:"50010788";}i:14;a:4:{s:3:"cid";s:8:"50010801";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"唇笔/唇线笔";s:10:"parent_cid";s:8:"50010788";}i:15;a:4:{s:3:"cid";s:8:"50010807";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"唇彩/唇蜜";s:10:"parent_cid";s:8:"50010788";}i:16;a:4:{s:3:"cid";s:8:"50010808";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"唇膏/口红";s:10:"parent_cid";s:8:"50010788";}i:17;a:4:{s:3:"cid";s:8:"50010800";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"双眼皮贴/胶水";s:10:"parent_cid";s:8:"50010788";}i:18;a:4:{s:3:"cid";s:8:"50010810";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"指甲油/美甲产品";s:10:"parent_cid";s:8:"50010788";}i:19;a:4:{s:3:"cid";s:8:"50019251";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"化妆刷/刷包";s:10:"parent_cid";s:8:"50010788";}i:20;a:4:{s:3:"cid";s:8:"50010817";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"化妆/美容工具";s:10:"parent_cid";s:8:"50010788";}i:21;a:4:{s:3:"cid";s:8:"50010812";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"彩妆套装/彩妆盘";s:10:"parent_cid";s:8:"50010788";}i:22;a:4:{s:3:"cid";s:8:"50010813";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"身体彩绘";s:10:"parent_cid";s:8:"50010788";}i:23;a:4:{s:3:"cid";s:8:"50019246";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"男士彩妆";s:10:"parent_cid";s:8:"50010788";}i:24;a:4:{s:3:"cid";s:8:"50010814";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其它彩妆";s:10:"parent_cid";s:8:"50010788";}}}i:9;a:5:{s:3:"cid";s:4:"1801";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"美容护肤/美体/精油";s:10:"parent_cid";s:1:"0";s:4:"subs";a:19:{i:0;a:4:{s:3:"cid";s:8:"50011990";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"卸妆";s:10:"parent_cid";s:4:"1801";}i:1;a:4:{s:3:"cid";s:8:"50011977";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"洁面";s:10:"parent_cid";s:4:"1801";}i:2;a:4:{s:3:"cid";s:8:"50011978";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"化妆水/爽肤水";s:10:"parent_cid";s:4:"1801";}i:3;a:4:{s:3:"cid";s:8:"50011979";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"面部精华";s:10:"parent_cid";s:4:"1801";}i:4;a:4:{s:3:"cid";s:8:"50011980";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"乳液/面霜";s:10:"parent_cid";s:4:"1801";}i:5;a:4:{s:3:"cid";s:8:"50011981";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"面膜/面膜粉";s:10:"parent_cid";s:4:"1801";}i:6;a:4:{s:3:"cid";s:8:"50011982";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"防晒";s:10:"parent_cid";s:4:"1801";}i:7;a:4:{s:3:"cid";s:8:"50011986";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"眼部护理";s:10:"parent_cid";s:4:"1801";}i:8;a:4:{s:3:"cid";s:8:"50011983";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"身体护理";s:10:"parent_cid";s:4:"1801";}i:9;a:4:{s:3:"cid";s:8:"50011987";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"胸部护理";s:10:"parent_cid";s:4:"1801";}i:10;a:4:{s:3:"cid";s:8:"50011992";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"精油芳疗";s:10:"parent_cid";s:4:"1801";}i:11;a:4:{s:3:"cid";s:8:"50011994";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"唇部护理";s:10:"parent_cid";s:4:"1801";}i:12;a:4:{s:3:"cid";s:8:"50011995";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"T区护理";s:10:"parent_cid";s:4:"1801";}i:13;a:4:{s:3:"cid";s:8:"50011996";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"面部按摩霜";s:10:"parent_cid";s:4:"1801";}i:14;a:4:{s:3:"cid";s:8:"50011997";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"面部磨砂/去角质";s:10:"parent_cid";s:4:"1801";}i:15;a:4:{s:3:"cid";s:8:"50011993";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"面部护理套装";s:10:"parent_cid";s:4:"1801";}i:16;a:4:{s:3:"cid";s:8:"50011988";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"男士护理";s:10:"parent_cid";s:4:"1801";}i:17;a:4:{s:3:"cid";s:8:"50011998";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"手部保养";s:10:"parent_cid";s:4:"1801";}i:18;a:4:{s:3:"cid";s:8:"50011991";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他保养";s:10:"parent_cid";s:4:"1801";}}}i:10;a:5:{s:3:"cid";s:8:"50023282";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"美发护发/假发";s:10:"parent_cid";s:1:"0";s:4:"subs";a:4:{i:0;a:4:{s:3:"cid";s:8:"50023283";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"假发/假发配件";s:10:"parent_cid";s:8:"50023282";}i:1;a:4:{s:3:"cid";s:8:"50023292";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"洗发护发";s:10:"parent_cid";s:8:"50023282";}i:2;a:4:{s:3:"cid";s:8:"50023293";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"头发造型";s:10:"parent_cid";s:8:"50023282";}i:3;a:4:{s:3:"cid";s:8:"50023294";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"染发烫发";s:10:"parent_cid";s:8:"50023282";}}}i:11;a:4:{s:3:"cid";s:4:"1512";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"手机";s:10:"parent_cid";s:1:"0";}i:12;a:5:{s:3:"cid";s:2:"14";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"数码相机/单反相机/摄像机";s:10:"parent_cid";s:1:"0";s:4:"subs";a:7:{i:0;a:4:{s:3:"cid";s:4:"1403";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"普通数码相机";s:10:"parent_cid";s:2:"14";}i:1;a:4:{s:3:"cid";s:8:"50003773";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"专业数码单反";s:10:"parent_cid";s:2:"14";}i:2;a:4:{s:3:"cid";s:4:"1402";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"数码摄像机";s:10:"parent_cid";s:2:"14";}i:3;a:4:{s:3:"cid";s:6:"140116";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"单反镜头";s:10:"parent_cid";s:2:"14";}i:4;a:4:{s:3:"cid";s:8:"50021422";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"单电微单";s:10:"parent_cid";s:2:"14";}i:5;a:4:{s:3:"cid";s:8:"50003770";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"胶卷相机";s:10:"parent_cid";s:2:"14";}i:6;a:4:{s:3:"cid";s:8:"50003793";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"LOMO";s:10:"parent_cid";s:2:"14";}}}i:13;a:4:{s:3:"cid";s:4:"1201";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"MP3/MP4/iPod/录音笔";s:10:"parent_cid";s:1:"0";}i:14;a:4:{s:3:"cid";s:4:"1101";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"笔记本电脑";s:10:"parent_cid";s:1:"0";}i:15;a:4:{s:3:"cid";s:8:"50019780";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"平板电脑/MID";s:10:"parent_cid";s:1:"0";}i:16;a:5:{s:3:"cid";s:8:"50018222";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"台式机/一体机/服务器";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50008351";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"台式整机";s:10:"parent_cid";s:8:"50018222";}i:1;a:4:{s:3:"cid";s:8:"50018323";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"一体机";s:10:"parent_cid";s:8:"50018222";}i:2;a:4:{s:3:"cid";s:6:"110308";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"DIY兼容机";s:10:"parent_cid";s:8:"50018222";}i:3;a:4:{s:3:"cid";s:8:"50010605";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"服务器/Server";s:10:"parent_cid";s:8:"50018222";}i:4;a:4:{s:3:"cid";s:8:"50010613";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"工作站";s:10:"parent_cid";s:8:"50018222";}}}i:17;a:5:{s:3:"cid";s:2:"11";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"电脑硬件/显示器/电脑周边";s:10:"parent_cid";s:1:"0";s:4:"subs";a:26:{i:0;a:4:{s:3:"cid";s:8:"50012320";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"无线鼠标";s:10:"parent_cid";s:2:"11";}i:1;a:4:{s:3:"cid";s:8:"50012307";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"有线鼠标";s:10:"parent_cid";s:2:"11";}i:2;a:4:{s:3:"cid";s:6:"110210";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"键盘";s:10:"parent_cid";s:2:"11";}i:3;a:4:{s:3:"cid";s:6:"110502";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"品牌液晶显示器";s:10:"parent_cid";s:2:"11";}i:4;a:4:{s:3:"cid";s:6:"110203";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"CPU";s:10:"parent_cid";s:2:"11";}i:5;a:4:{s:3:"cid";s:6:"110202";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"内存";s:10:"parent_cid";s:2:"11";}i:6;a:4:{s:3:"cid";s:6:"110207";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"硬盘";s:10:"parent_cid";s:2:"11";}i:7;a:4:{s:3:"cid";s:8:"50013151";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"固态硬盘";s:10:"parent_cid";s:2:"11";}i:8;a:4:{s:3:"cid";s:6:"110201";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"主板";s:10:"parent_cid";s:2:"11";}i:9;a:4:{s:3:"cid";s:6:"110206";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"显卡";s:10:"parent_cid";s:2:"11";}i:10;a:4:{s:3:"cid";s:8:"50003848";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"台机电源";s:10:"parent_cid";s:2:"11";}i:11;a:4:{s:3:"cid";s:6:"110211";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"机箱";s:10:"parent_cid";s:2:"11";}i:12;a:4:{s:3:"cid";s:6:"110215";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"散热设备";s:10:"parent_cid";s:2:"11";}i:13;a:4:{s:3:"cid";s:6:"110212";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"光驱/刻录/DVD";s:10:"parent_cid";s:2:"11";}i:14;a:4:{s:3:"cid";s:6:"110205";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"声卡";s:10:"parent_cid";s:2:"11";}i:15;a:4:{s:3:"cid";s:8:"50003321";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电脑周边";s:10:"parent_cid";s:2:"11";}i:16;a:4:{s:3:"cid";s:8:"50008759";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"组装液晶显示器";s:10:"parent_cid";s:2:"11";}i:17;a:4:{s:3:"cid";s:8:"50001810";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"多媒体音箱";s:10:"parent_cid";s:2:"11";}i:18;a:4:{s:3:"cid";s:6:"110508";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"摄像头";s:10:"parent_cid";s:2:"11";}i:19;a:4:{s:3:"cid";s:8:"50002415";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"键鼠套装";s:10:"parent_cid";s:2:"11";}i:20;a:4:{s:3:"cid";s:6:"110511";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"手写输入/绘图板";s:10:"parent_cid";s:2:"11";}i:21;a:4:{s:3:"cid";s:6:"110216";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"电视卡/盒";s:10:"parent_cid";s:2:"11";}i:22;a:4:{s:3:"cid";s:8:"50003213";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"硬盘盒";s:10:"parent_cid";s:2:"11";}i:23;a:4:{s:3:"cid";s:8:"50003850";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"电竞耳麦";s:10:"parent_cid";s:2:"11";}i:24;a:4:{s:3:"cid";s:8:"50013014";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"网络/高清播放器";s:10:"parent_cid";s:2:"11";}i:25;a:4:{s:3:"cid";s:8:"50019041";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"绘图板配件";s:10:"parent_cid";s:2:"11";}}}i:18;a:5:{s:3:"cid";s:8:"50018264";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"网络设备/网络相关";s:10:"parent_cid";s:1:"0";s:4:"subs";a:20:{i:0;a:4:{s:3:"cid";s:6:"110209";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"网卡";s:10:"parent_cid";s:8:"50018264";}i:1;a:4:{s:3:"cid";s:8:"50022650";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"3G无线路由器";s:10:"parent_cid";s:8:"50018264";}i:2;a:4:{s:3:"cid";s:6:"110808";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"路由器";s:10:"parent_cid";s:8:"50018264";}i:3;a:4:{s:3:"cid";s:8:"50016214";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"网关";s:10:"parent_cid";s:8:"50018264";}i:4;a:4:{s:3:"cid";s:8:"50016213";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"ADSL MODEM/宽带猫";s:10:"parent_cid";s:8:"50018264";}i:5;a:4:{s:3:"cid";s:6:"110805";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"交换机";s:10:"parent_cid";s:8:"50018264";}i:6;a:4:{s:3:"cid";s:8:"50016189";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"光纤设备";s:10:"parent_cid";s:8:"50018264";}i:7;a:4:{s:3:"cid";s:8:"50016195";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"网络存储设备";s:10:"parent_cid";s:8:"50018264";}i:8;a:4:{s:3:"cid";s:8:"50016203";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"电脑/网络工具";s:10:"parent_cid";s:8:"50018264";}i:9;a:4:{s:3:"cid";s:8:"50019309";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"无线网络";s:10:"parent_cid";s:8:"50018264";}i:10;a:4:{s:3:"cid";s:8:"50019318";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"网络设备";s:10:"parent_cid";s:8:"50018264";}i:11;a:4:{s:3:"cid";s:8:"50019341";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"网络安全";s:10:"parent_cid";s:8:"50018264";}i:12;a:4:{s:3:"cid";s:8:"50019361";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"机房布线";s:10:"parent_cid";s:8:"50018264";}i:13;a:4:{s:3:"cid";s:8:"50019494";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"视频监控";s:10:"parent_cid";s:8:"50018264";}i:14;a:4:{s:3:"cid";s:8:"50019510";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"语音视频";s:10:"parent_cid";s:8:"50018264";}i:15;a:4:{s:3:"cid";s:6:"110809";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其它网络相关";s:10:"parent_cid";s:8:"50018264";}i:16;a:4:{s:3:"cid";s:8:"50019812";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"路由器/猫/网卡配件";s:10:"parent_cid";s:8:"50018264";}i:17;a:4:{s:3:"cid";s:8:"50020174";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"数码线材";s:10:"parent_cid";s:8:"50018264";}i:18;a:4:{s:3:"cid";s:8:"50020262";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电力猫";s:10:"parent_cid";s:8:"50018264";}i:19;a:4:{s:3:"cid";s:8:"50118013";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"无线高清";s:10:"parent_cid";s:8:"50018264";}}}i:19;a:5:{s:3:"cid";s:8:"50008090";s:9:"is_parent";s:4:"true";s:4:"name";s:14:"3C数码配件";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50018326";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"苹果专用配件";s:10:"parent_cid";s:8:"50008090";}i:1;a:4:{s:3:"cid";s:8:"50024094";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"手机配件";s:10:"parent_cid";s:8:"50008090";}i:2;a:4:{s:3:"cid";s:8:"50024095";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"笔记本电脑配件";s:10:"parent_cid";s:8:"50008090";}i:3;a:4:{s:3:"cid";s:8:"50024096";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"数码相机配件";s:10:"parent_cid";s:8:"50008090";}i:4;a:4:{s:3:"cid";s:8:"50024097";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"单反/单电相机配件";s:10:"parent_cid";s:8:"50008090";}i:5;a:4:{s:3:"cid";s:8:"50024098";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"平板电脑配件";s:10:"parent_cid";s:8:"50008090";}i:6;a:4:{s:3:"cid";s:8:"50005051";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"MP3/MP4配件";s:10:"parent_cid";s:8:"50008090";}i:7;a:4:{s:3:"cid";s:8:"50020180";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"电子书配件";s:10:"parent_cid";s:8:"50008090";}i:8;a:4:{s:3:"cid";s:8:"50024104";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"电教产品配件";s:10:"parent_cid";s:8:"50008090";}i:9;a:4:{s:3:"cid";s:8:"50024103";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"摄像机配件";s:10:"parent_cid";s:8:"50008090";}i:10;a:4:{s:3:"cid";s:8:"50011826";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"家电影音周边配件";s:10:"parent_cid";s:8:"50008090";}i:11;a:4:{s:3:"cid";s:8:"50024099";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"电子元器件市场";s:10:"parent_cid";s:8:"50008090";}i:12;a:4:{s:3:"cid";s:8:"50018909";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"USB电脑周边";s:10:"parent_cid";s:8:"50008090";}i:13;a:4:{s:3:"cid";s:8:"50024101";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"数码包/收纳/整理";s:10:"parent_cid";s:8:"50008090";}i:14;a:4:{s:3:"cid";s:6:"111703";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"3G无线上网卡设备";s:10:"parent_cid";s:8:"50008090";}i:15;a:4:{s:3:"cid";s:8:"50009211";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"移动电源";s:10:"parent_cid";s:8:"50008090";}i:16;a:4:{s:3:"cid";s:8:"50005050";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"蓝牙耳机";s:10:"parent_cid";s:8:"50008090";}i:17;a:4:{s:3:"cid";s:8:"50008482";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"数码相框";s:10:"parent_cid";s:8:"50008090";}i:18;a:4:{s:3:"cid";s:8:"50003312";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"干电池/充电电池/套装";s:10:"parent_cid";s:8:"50008090";}i:19;a:4:{s:3:"cid";s:8:"50024109";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"数码周边";s:10:"parent_cid";s:8:"50008090";}i:20;a:4:{s:3:"cid";s:8:"50024102";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"数码服务";s:10:"parent_cid";s:8:"50008090";}i:21;a:4:{s:3:"cid";s:8:"50050622";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"胶片相机配件";s:10:"parent_cid";s:8:"50008090";}}}i:20;a:5:{s:3:"cid";s:8:"50012164";s:9:"is_parent";s:4:"true";s:4:"name";s:34:"闪存卡/U盘/存储/移动硬盘";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50012165";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"U盘";s:10:"parent_cid";s:8:"50012164";}i:1;a:4:{s:3:"cid";s:8:"50020196";s:9:"is_parent";s:5:"false";s:4:"name";s:41:"SD卡（将删除，请发到闪存卡）";s:10:"parent_cid";s:8:"50012164";}i:2;a:4:{s:3:"cid";s:8:"50012166";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"闪存卡";s:10:"parent_cid";s:8:"50012164";}i:3;a:4:{s:3:"cid";s:8:"50012167";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"记忆棒";s:10:"parent_cid";s:8:"50012164";}i:4;a:4:{s:3:"cid";s:6:"110507";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"移动硬盘";s:10:"parent_cid";s:8:"50012164";}}}i:21;a:5:{s:3:"cid";s:8:"50007218";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"办公设备/耗材/相关服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:26:{i:0;a:4:{s:3:"cid";s:8:"50012601";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"打印机配件";s:10:"parent_cid";s:8:"50007218";}i:1;a:4:{s:3:"cid";s:6:"110514";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"打印机";s:10:"parent_cid";s:8:"50007218";}i:2;a:4:{s:3:"cid";s:6:"111219";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"投影机";s:10:"parent_cid";s:8:"50007218";}i:3;a:4:{s:3:"cid";s:8:"50021132";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"绳索/扎带/办公线材";s:10:"parent_cid";s:8:"50007218";}i:4;a:4:{s:3:"cid";s:6:"110501";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"扫描仪";s:10:"parent_cid";s:8:"50007218";}i:5;a:4:{s:3:"cid";s:6:"211710";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"碎纸机";s:10:"parent_cid";s:8:"50007218";}i:6;a:4:{s:3:"cid";s:6:"111201";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"复合复印机";s:10:"parent_cid";s:8:"50007218";}i:7;a:4:{s:3:"cid";s:8:"50010757";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其它办公设备";s:10:"parent_cid";s:8:"50007218";}i:8;a:4:{s:3:"cid";s:8:"50001718";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"保险箱";s:10:"parent_cid";s:8:"50007218";}i:9;a:4:{s:3:"cid";s:8:"50008551";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"传真/通信设备";s:10:"parent_cid";s:8:"50007218";}i:10;a:4:{s:3:"cid";s:8:"50008352";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"投影机配件";s:10:"parent_cid";s:8:"50007218";}i:11;a:4:{s:3:"cid";s:8:"50012600";s:9:"is_parent";s:5:"false";s:4:"name";s:33:"办公设备配件及相关服务";s:10:"parent_cid";s:8:"50007218";}i:12;a:4:{s:3:"cid";s:6:"111409";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"其它耗材";s:10:"parent_cid";s:8:"50007218";}i:13;a:4:{s:3:"cid";s:6:"140117";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"胶卷";s:10:"parent_cid";s:8:"50007218";}i:14;a:4:{s:3:"cid";s:8:"50019240";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"墨水";s:10:"parent_cid";s:8:"50007218";}i:15;a:4:{s:3:"cid";s:8:"50019250";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"办公用纸";s:10:"parent_cid";s:8:"50007218";}i:16;a:4:{s:3:"cid";s:8:"50021133";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"胶带";s:10:"parent_cid";s:8:"50007218";}i:17;a:4:{s:3:"cid";s:8:"50024248";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"墨粉硒鼓耗材类";s:10:"parent_cid";s:8:"50007218";}i:18;a:4:{s:3:"cid";s:8:"50024253";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"磁盘刻录存储类";s:10:"parent_cid";s:8:"50007218";}i:19;a:4:{s:3:"cid";s:8:"50024258";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"多功能一体机及配件";s:10:"parent_cid";s:8:"50007218";}i:20;a:4:{s:3:"cid";s:8:"50024300";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"条码扫描/采集器材";s:10:"parent_cid";s:8:"50007218";}i:21;a:4:{s:3:"cid";s:8:"50024346";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"点/验钞/收款机及配件";s:10:"parent_cid";s:8:"50007218";}i:22;a:4:{s:3:"cid";s:8:"50024369";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"包装设备/标牌及耗材";s:10:"parent_cid";s:8:"50007218";}i:23;a:4:{s:3:"cid";s:8:"50024389";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"服务类";s:10:"parent_cid";s:8:"50007218";}i:24;a:4:{s:3:"cid";s:8:"50024394";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"门禁考勤器材";s:10:"parent_cid";s:8:"50007218";}i:25;a:4:{s:3:"cid";s:8:"50024400";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"其它办公设备配件";s:10:"parent_cid";s:8:"50007218";}}}i:22;a:5:{s:3:"cid";s:8:"50018004";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"电子词典/电纸书/文化用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:18:{i:0;a:4:{s:3:"cid";s:8:"50008870";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"电子辞典/学习机";s:10:"parent_cid";s:8:"50018004";}i:1;a:4:{s:3:"cid";s:8:"50022538";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"点读机";s:10:"parent_cid";s:8:"50018004";}i:2;a:4:{s:3:"cid";s:8:"50022537";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"点读笔";s:10:"parent_cid";s:8:"50018004";}i:3;a:4:{s:3:"cid";s:8:"50010731";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"电子阅览器/电纸书";s:10:"parent_cid";s:8:"50018004";}i:4;a:4:{s:3:"cid";s:8:"50012716";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"笔类/书写工具";s:10:"parent_cid";s:8:"50018004";}i:5;a:4:{s:3:"cid";s:8:"50012676";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"纸张本册";s:10:"parent_cid";s:8:"50018004";}i:6;a:4:{s:3:"cid";s:8:"50005757";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"日常学习用品";s:10:"parent_cid";s:8:"50018004";}i:7;a:4:{s:3:"cid";s:8:"50005730";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"胶粘用品";s:10:"parent_cid";s:8:"50018004";}i:8;a:4:{s:3:"cid";s:8:"50005736";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"装订用品";s:10:"parent_cid";s:8:"50018004";}i:9;a:4:{s:3:"cid";s:8:"50005747";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"裁剪用品";s:10:"parent_cid";s:8:"50018004";}i:10;a:4:{s:3:"cid";s:6:"211708";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"计算器";s:10:"parent_cid";s:8:"50018004";}i:11;a:4:{s:3:"cid";s:8:"50016353";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"印刷制品";s:10:"parent_cid";s:8:"50018004";}i:12;a:4:{s:3:"cid";s:8:"50012645";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"收纳/陈列用品";s:10:"parent_cid";s:8:"50018004";}i:13;a:4:{s:3:"cid";s:8:"50005752";s:9:"is_parent";s:4:"true";s:4:"name";s:31:"教学演示/展示告示用品";s:10:"parent_cid";s:8:"50018004";}i:14;a:4:{s:3:"cid";s:8:"50005756";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"绘图测量用品";s:10:"parent_cid";s:8:"50018004";}i:15;a:4:{s:3:"cid";s:8:"50013477";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"财会用品";s:10:"parent_cid";s:8:"50018004";}i:16;a:4:{s:3:"cid";s:6:"211707";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其它文化用品";s:10:"parent_cid";s:8:"50018004";}i:17;a:4:{s:3:"cid";s:8:"50024641";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"画具/画材/书法用品";s:10:"parent_cid";s:8:"50018004";}}}i:23;a:5:{s:3:"cid";s:2:"20";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"电玩/配件/游戏/攻略";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50017905";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"游戏掌机/PSP/NDSL";s:10:"parent_cid";s:2:"20";}i:1;a:4:{s:3:"cid";s:8:"50017906";s:9:"is_parent";s:5:"false";s:4:"name";s:28:"家用游戏机/PS3/Wii/XBOX";s:10:"parent_cid";s:2:"20";}i:2;a:4:{s:3:"cid";s:8:"50012068";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"游戏手柄";s:10:"parent_cid";s:2:"20";}i:3;a:4:{s:3:"cid";s:8:"50012834";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"游戏软件";s:10:"parent_cid";s:2:"20";}i:4;a:4:{s:3:"cid";s:8:"50012079";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"方向盘";s:10:"parent_cid";s:2:"20";}i:5;a:4:{s:3:"cid";s:8:"50012080";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"摇杆";s:10:"parent_cid";s:2:"20";}i:6;a:4:{s:3:"cid";s:8:"50012160";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"PSP专用配件";s:10:"parent_cid";s:2:"20";}i:7;a:4:{s:3:"cid";s:8:"50012161";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"WII专用配件/周边";s:10:"parent_cid";s:2:"20";}i:8;a:4:{s:3:"cid";s:8:"50012162";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"PS2/PS3专用配件（包含PS1)";s:10:"parent_cid";s:2:"20";}i:9;a:4:{s:3:"cid";s:8:"50012163";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"NDSI/NDSL专用配件";s:10:"parent_cid";s:2:"20";}i:10;a:4:{s:3:"cid";s:8:"50018082";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"XBOX专用配件";s:10:"parent_cid";s:2:"20";}i:11;a:4:{s:3:"cid";s:8:"50018224";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"世嘉 DC/MD/SS/SEGA 专用配件";s:10:"parent_cid";s:2:"20";}i:12;a:4:{s:3:"cid";s:8:"50018225";s:9:"is_parent";s:4:"true";s:4:"name";s:36:"任天堂NGC/FC/N64/SFC 专用配件";s:10:"parent_cid";s:2:"20";}i:13;a:4:{s:3:"cid";s:8:"50018230";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"任天堂掌机配件";s:10:"parent_cid";s:2:"20";}i:14;a:4:{s:3:"cid";s:8:"50025710";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"PSV专用配件";s:10:"parent_cid";s:2:"20";}}}i:24;a:5:{s:3:"cid";s:8:"50022703";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"大家电";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:8:"50012136";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"电视机";s:10:"parent_cid";s:8:"50022703";}i:1;a:4:{s:3:"cid";s:8:"50001813";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"家庭影院";s:10:"parent_cid";s:8:"50022703";}i:2;a:4:{s:3:"cid";s:8:"50003881";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"冰箱";s:10:"parent_cid";s:8:"50022703";}i:3;a:4:{s:3:"cid";s:8:"50015558";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"冷柜/便携冷热箱";s:10:"parent_cid";s:8:"50022703";}i:4;a:4:{s:3:"cid";s:8:"50015563";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"酒柜";s:10:"parent_cid";s:8:"50022703";}i:5;a:4:{s:3:"cid";s:6:"350301";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"洗衣机";s:10:"parent_cid";s:8:"50022703";}i:6;a:4:{s:3:"cid";s:6:"350401";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"空调";s:10:"parent_cid";s:8:"50022703";}i:7;a:4:{s:3:"cid";s:6:"350511";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"油烟机";s:10:"parent_cid";s:8:"50022703";}i:8;a:4:{s:3:"cid";s:8:"50015382";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"燃气灶";s:10:"parent_cid";s:8:"50022703";}i:9;a:4:{s:3:"cid";s:6:"350503";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"消毒柜";s:10:"parent_cid";s:8:"50022703";}i:10;a:4:{s:3:"cid";s:8:"50018263";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"烟灶消套装";s:10:"parent_cid";s:8:"50022703";}i:11;a:4:{s:3:"cid";s:8:"50022734";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"大家电配件";s:10:"parent_cid";s:8:"50022703";}}}i:25;a:5:{s:3:"cid";s:8:"50011972";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"影音电器";s:10:"parent_cid";s:1:"0";s:4:"subs";a:13:{i:0;a:4:{s:3:"cid";s:4:"1205";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"耳机/耳麦";s:10:"parent_cid";s:8:"50011972";}i:1;a:4:{s:3:"cid";s:8:"50012142";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"Hifi音箱/功放/器材";s:10:"parent_cid";s:8:"50011972";}i:2;a:4:{s:3:"cid";s:8:"50020192";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"舞台设备";s:10:"parent_cid";s:8:"50011972";}i:3;a:4:{s:3:"cid";s:6:"121616";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"组合/迷你/卡通音响";s:10:"parent_cid";s:8:"50011972";}i:4;a:4:{s:3:"cid";s:8:"50005174";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"硬盘播放器";s:10:"parent_cid";s:8:"50011972";}i:5;a:4:{s:3:"cid";s:8:"50005009";s:9:"is_parent";s:5:"false";s:4:"name";s:31:"影碟机/DVD/蓝光/VCD/高清";s:10:"parent_cid";s:8:"50011972";}i:6;a:4:{s:3:"cid";s:8:"50011973";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"CD机/卡座/黑胶音源";s:10:"parent_cid";s:8:"50011972";}i:7;a:4:{s:3:"cid";s:8:"50003318";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"麦克风/话筒";s:10:"parent_cid";s:8:"50011972";}i:8;a:4:{s:3:"cid";s:8:"50012067";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"随身听/便携视听/收音";s:10:"parent_cid";s:8:"50011972";}i:9;a:4:{s:3:"cid";s:8:"50012148";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"工程解决方案";s:10:"parent_cid";s:8:"50011972";}i:10;a:4:{s:3:"cid";s:8:"50012149";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"扩音器/录像机/世嘉";s:10:"parent_cid";s:8:"50011972";}i:11;a:4:{s:3:"cid";s:8:"50012934";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他音箱";s:10:"parent_cid";s:8:"50011972";}i:12;a:4:{s:3:"cid";s:8:"50011866";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"影音家电配件";s:10:"parent_cid";s:8:"50011972";}}}i:26;a:5:{s:3:"cid";s:8:"50012100";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"生活电器";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:6:"350402";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"空气净化/氧吧";s:10:"parent_cid";s:8:"50012100";}i:1;a:4:{s:3:"cid";s:6:"350407";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"加湿器";s:10:"parent_cid";s:8:"50012100";}i:2;a:4:{s:3:"cid";s:8:"50017072";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"抽湿器/除湿器";s:10:"parent_cid";s:8:"50012100";}i:3;a:4:{s:3:"cid";s:6:"350404";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"暖风机/取暖器";s:10:"parent_cid";s:8:"50012100";}i:4;a:4:{s:3:"cid";s:8:"50000360";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电热毯";s:10:"parent_cid";s:8:"50012100";}i:5;a:4:{s:3:"cid";s:8:"50017589";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"空调扇";s:10:"parent_cid";s:8:"50012100";}i:6;a:4:{s:3:"cid";s:8:"50008557";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电风扇";s:10:"parent_cid";s:8:"50012100";}i:7;a:4:{s:3:"cid";s:8:"50018327";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"吊扇";s:10:"parent_cid";s:8:"50012100";}i:8;a:4:{s:3:"cid";s:8:"50013195";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"挂烫机";s:10:"parent_cid";s:8:"50012100";}i:9;a:4:{s:3:"cid";s:8:"50012101";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"干衣机";s:10:"parent_cid";s:8:"50012100";}i:10;a:4:{s:3:"cid";s:8:"50008552";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电熨斗";s:10:"parent_cid";s:8:"50012100";}i:11;a:4:{s:3:"cid";s:8:"50008553";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"蒸汽刷/干洗刷";s:10:"parent_cid";s:8:"50012100";}i:12;a:4:{s:3:"cid";s:6:"350310";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"毛球修剪器";s:10:"parent_cid";s:8:"50012100";}i:13;a:4:{s:3:"cid";s:8:"50002890";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"干鞋器/擦鞋器";s:10:"parent_cid";s:8:"50012100";}i:14;a:4:{s:3:"cid";s:8:"50008554";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"吸尘器";s:10:"parent_cid";s:8:"50012100";}i:15;a:4:{s:3:"cid";s:8:"50008555";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"扫地机";s:10:"parent_cid";s:8:"50012100";}i:16;a:4:{s:3:"cid";s:8:"50022648";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"蒸汽拖把";s:10:"parent_cid";s:8:"50012100";}i:17;a:4:{s:3:"cid";s:8:"50006508";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"超声波/蒸汽清洁机";s:10:"parent_cid";s:8:"50012100";}i:18;a:4:{s:3:"cid";s:8:"50008563";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"对讲机";s:10:"parent_cid";s:8:"50012100";}i:19;a:4:{s:3:"cid";s:8:"50008542";s:9:"is_parent";s:5:"false";s:4:"name";s:31:"电话机(有绳/无绳/网络)";s:10:"parent_cid";s:8:"50012100";}i:20;a:4:{s:3:"cid";s:8:"50008544";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其它生活家电";s:10:"parent_cid";s:8:"50012100";}i:21;a:4:{s:3:"cid";s:8:"50012135";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"生活家电配件";s:10:"parent_cid";s:8:"50012100";}}}i:27;a:5:{s:3:"cid";s:8:"50012082";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"厨房电器";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50002894";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电烤箱";s:10:"parent_cid";s:8:"50012082";}i:1;a:4:{s:3:"cid";s:8:"50012959";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电锅煲类";s:10:"parent_cid";s:8:"50012082";}i:2;a:4:{s:3:"cid";s:8:"50002809";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"微波炉";s:10:"parent_cid";s:8:"50012082";}i:3;a:4:{s:3:"cid";s:8:"50015397";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"光波热波炉";s:10:"parent_cid";s:8:"50012082";}i:4;a:4:{s:3:"cid";s:6:"350502";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电磁炉";s:10:"parent_cid";s:8:"50012082";}i:5;a:4:{s:3:"cid";s:8:"50002893";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"饮水机";s:10:"parent_cid";s:8:"50012082";}i:6;a:4:{s:3:"cid";s:6:"350504";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"净水器";s:10:"parent_cid";s:8:"50012082";}i:7;a:4:{s:3:"cid";s:8:"50008556";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"豆浆机";s:10:"parent_cid";s:8:"50012082";}i:8;a:4:{s:3:"cid";s:8:"50012097";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"搅拌/料理机";s:10:"parent_cid";s:8:"50012082";}i:9;a:4:{s:3:"cid";s:8:"50018218";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"榨汁机";s:10:"parent_cid";s:8:"50012082";}i:10;a:4:{s:3:"cid";s:8:"50000013";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"多士炉";s:10:"parent_cid";s:8:"50012082";}i:11;a:4:{s:3:"cid";s:8:"50018103";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"面包机";s:10:"parent_cid";s:8:"50012082";}i:12;a:4:{s:3:"cid";s:6:"350507";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"咖啡机";s:10:"parent_cid";s:8:"50012082";}i:13;a:4:{s:3:"cid";s:8:"50003695";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"电热水壶";s:10:"parent_cid";s:8:"50012082";}i:14;a:4:{s:3:"cid";s:8:"50002535";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"酸奶机";s:10:"parent_cid";s:8:"50012082";}i:15;a:4:{s:3:"cid";s:8:"50002898";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"煮蛋器/蒸蛋器";s:10:"parent_cid";s:8:"50012082";}i:16;a:4:{s:3:"cid";s:8:"50004363";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"电饼铛/可丽饼机";s:10:"parent_cid";s:8:"50012082";}i:17;a:4:{s:3:"cid";s:8:"50013007";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电热杯";s:10:"parent_cid";s:8:"50012082";}i:18;a:4:{s:3:"cid";s:8:"50013021";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"商用厨电";s:10:"parent_cid";s:8:"50012082";}i:19;a:4:{s:3:"cid";s:6:"350709";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"定时器/提醒器";s:10:"parent_cid";s:8:"50012082";}i:20;a:4:{s:3:"cid";s:8:"50008543";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其它厨房家电";s:10:"parent_cid";s:8:"50012082";}i:21;a:4:{s:3:"cid";s:8:"50012099";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"厨房家电配件";s:10:"parent_cid";s:8:"50012082";}}}i:28;a:5:{s:3:"cid";s:8:"50002768";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"个人护理/保健/按摩器材";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:8:"50010567";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"清洁美容工具";s:10:"parent_cid";s:8:"50002768";}i:1;a:4:{s:3:"cid";s:8:"50024626";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"口腔护理";s:10:"parent_cid";s:8:"50002768";}i:2;a:4:{s:3:"cid";s:8:"50023686";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"美发工具";s:10:"parent_cid";s:8:"50002768";}i:3;a:4:{s:3:"cid";s:8:"50008548";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"美体瘦身";s:10:"parent_cid";s:8:"50002768";}i:4;a:4:{s:3:"cid";s:8:"50008545";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"美容/美体辅助工具";s:10:"parent_cid";s:8:"50002768";}i:5;a:4:{s:3:"cid";s:8:"50018398";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"按摩器材";s:10:"parent_cid";s:8:"50002768";}i:6;a:4:{s:3:"cid";s:8:"50023687";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"健康检测仪器";s:10:"parent_cid";s:8:"50002768";}i:7;a:4:{s:3:"cid";s:8:"50012083";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"家用保健器材";s:10:"parent_cid";s:8:"50002768";}i:8;a:4:{s:3:"cid";s:8:"50023690";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"家用护理辅助器材";s:10:"parent_cid";s:8:"50002768";}i:9;a:4:{s:3:"cid";s:8:"50023688";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"经络保健器材";s:10:"parent_cid";s:8:"50002768";}i:10;a:4:{s:3:"cid";s:6:"350210";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其它个人护理";s:10:"parent_cid";s:8:"50002768";}i:11;a:4:{s:3:"cid";s:8:"50011877";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"各类配件";s:10:"parent_cid";s:8:"50002768";}}}i:29;a:5:{s:3:"cid";s:2:"27";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"家装主材";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50019935";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"灯具灯饰";s:10:"parent_cid";s:2:"27";}i:1;a:4:{s:3:"cid";s:8:"50013217";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"光源";s:10:"parent_cid";s:2:"27";}i:2;a:4:{s:3:"cid";s:8:"50013222";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"油漆";s:10:"parent_cid";s:2:"27";}i:3;a:4:{s:3:"cid";s:8:"50013474";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"热水器";s:10:"parent_cid";s:2:"27";}i:4;a:4:{s:3:"cid";s:8:"50020966";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"晾衣架/晾衣杆";s:10:"parent_cid";s:2:"27";}i:5;a:4:{s:3:"cid";s:8:"50002409";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"厨房";s:10:"parent_cid";s:2:"27";}i:6;a:4:{s:3:"cid";s:8:"50013322";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"墙纸";s:10:"parent_cid";s:2:"27";}i:7;a:4:{s:3:"cid";s:4:"2159";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"环保/除味/保养";s:10:"parent_cid";s:2:"27";}i:8;a:4:{s:3:"cid";s:8:"50008696";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"配件专区";s:10:"parent_cid";s:2:"27";}i:9;a:4:{s:3:"cid";s:8:"50008725";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"二手/闲置专区";s:10:"parent_cid";s:2:"27";}i:10;a:4:{s:3:"cid";s:8:"50008321";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:2:"27";}i:11;a:4:{s:3:"cid";s:8:"50019835";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"集成吊顶";s:10:"parent_cid";s:2:"27";}i:12;a:4:{s:3:"cid";s:8:"50020007";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"卫浴用品";s:10:"parent_cid";s:2:"27";}i:13;a:4:{s:3:"cid";s:8:"50020573";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"浴霸";s:10:"parent_cid";s:2:"27";}i:14;a:4:{s:3:"cid";s:8:"50020906";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"地暖/暖气片/散热器";s:10:"parent_cid";s:2:"27";}i:15;a:4:{s:3:"cid";s:8:"50021794";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"智能家居系统";s:10:"parent_cid";s:2:"27";}i:16;a:4:{s:3:"cid";s:8:"50022263";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"楼梯";s:10:"parent_cid";s:2:"27";}i:17;a:4:{s:3:"cid";s:8:"50022270";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"瓷砖";s:10:"parent_cid";s:2:"27";}i:18;a:4:{s:3:"cid";s:8:"50022271";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"地板";s:10:"parent_cid";s:2:"27";}i:19;a:4:{s:3:"cid";s:8:"50022357";s:9:"is_parent";s:4:"true";s:4:"name";s:3:"门";s:10:"parent_cid";s:2:"27";}i:20;a:4:{s:3:"cid";s:8:"50024852";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"涂料（乳胶漆）";s:10:"parent_cid";s:2:"27";}i:21;a:4:{s:3:"cid";s:8:"50068005";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"暖气片";s:10:"parent_cid";s:2:"27";}}}i:30;a:5:{s:3:"cid";s:8:"50020332";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"基础建材";s:10:"parent_cid";s:1:"0";s:4:"subs";a:25:{i:0;a:4:{s:3:"cid";s:8:"50020421";s:9:"is_parent";s:4:"true";s:4:"name";s:3:"窗";s:10:"parent_cid";s:8:"50020332";}i:1;a:4:{s:3:"cid";s:8:"50020333";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"板材";s:10:"parent_cid";s:8:"50020332";}i:2;a:4:{s:3:"cid";s:8:"50020341";s:9:"is_parent";s:4:"true";s:4:"name";s:3:"砖";s:10:"parent_cid";s:8:"50020332";}i:3;a:4:{s:3:"cid";s:8:"50020348";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"隔断墙";s:10:"parent_cid";s:8:"50020332";}i:4;a:4:{s:3:"cid";s:8:"50020352";s:9:"is_parent";s:4:"true";s:4:"name";s:7:"沙/石";s:10:"parent_cid";s:8:"50020332";}i:5;a:4:{s:3:"cid";s:8:"50020358";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"水泥";s:10:"parent_cid";s:8:"50020332";}i:6;a:4:{s:3:"cid";s:8:"50020362";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"水管管材";s:10:"parent_cid";s:8:"50020332";}i:7;a:4:{s:3:"cid";s:8:"50020369";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"线条";s:10:"parent_cid";s:8:"50020332";}i:8;a:4:{s:3:"cid";s:8:"50013517";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"人造大理石";s:10:"parent_cid";s:8:"50020332";}i:9;a:4:{s:3:"cid";s:8:"50020372";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"木方";s:10:"parent_cid";s:8:"50020332";}i:10;a:4:{s:3:"cid";s:8:"50020392";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其它基础建材";s:10:"parent_cid";s:8:"50020332";}i:11;a:4:{s:3:"cid";s:8:"50020397";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"隔音材料";s:10:"parent_cid";s:8:"50020332";}i:12;a:4:{s:3:"cid";s:8:"50020400";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"隔热材料";s:10:"parent_cid";s:8:"50020332";}i:13;a:4:{s:3:"cid";s:8:"50020404";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"钢材";s:10:"parent_cid";s:8:"50020332";}i:14;a:4:{s:3:"cid";s:8:"50020412";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"铝型材";s:10:"parent_cid";s:8:"50020332";}i:15;a:4:{s:3:"cid";s:8:"50020417";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"石膏板";s:10:"parent_cid";s:8:"50020332";}i:16;a:4:{s:3:"cid";s:8:"50020442";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"门窗密封条";s:10:"parent_cid";s:8:"50020332";}i:17;a:4:{s:3:"cid";s:8:"50020445";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"雕花件系列";s:10:"parent_cid";s:8:"50020332";}i:18;a:4:{s:3:"cid";s:8:"50020449";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"玻璃";s:10:"parent_cid";s:8:"50020332";}i:19;a:4:{s:3:"cid";s:8:"50013508";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"硅钙板";s:10:"parent_cid";s:8:"50020332";}i:20;a:4:{s:3:"cid";s:8:"50020459";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"新型装饰材料";s:10:"parent_cid";s:8:"50020332";}i:21;a:4:{s:3:"cid";s:8:"50020472";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"天然大理石";s:10:"parent_cid";s:8:"50020332";}i:22;a:4:{s:3:"cid";s:8:"50020480";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"砂岩";s:10:"parent_cid";s:8:"50020332";}i:23;a:4:{s:3:"cid";s:8:"50013226";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"施工保护";s:10:"parent_cid";s:8:"50020332";}i:24;a:4:{s:3:"cid";s:8:"50020608";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"阳光房";s:10:"parent_cid";s:8:"50020332";}}}i:31;a:5:{s:3:"cid";s:8:"50020485";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"五金/工具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:10:{i:0;a:4:{s:3:"cid";s:8:"50020486";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"家用五金";s:10:"parent_cid";s:8:"50020485";}i:1;a:4:{s:3:"cid";s:8:"50020487";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"手动工具";s:10:"parent_cid";s:8:"50020485";}i:2;a:4:{s:3:"cid";s:8:"50020519";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"仪器仪表";s:10:"parent_cid";s:8:"50020485";}i:3;a:4:{s:3:"cid";s:8:"50020646";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电动工具";s:10:"parent_cid";s:8:"50020485";}i:4;a:4:{s:3:"cid";s:8:"50020489";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"气动工具";s:10:"parent_cid";s:8:"50020485";}i:5;a:4:{s:3:"cid";s:8:"50020490";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"机械五金";s:10:"parent_cid";s:8:"50020485";}i:6;a:4:{s:3:"cid";s:8:"50020491";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"机电五金";s:10:"parent_cid";s:8:"50020485";}i:7;a:4:{s:3:"cid";s:8:"50020492";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"紧固件";s:10:"parent_cid";s:8:"50020485";}i:8;a:4:{s:3:"cid";s:8:"50020493";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"刃具";s:10:"parent_cid";s:8:"50020485";}i:9;a:4:{s:3:"cid";s:8:"50020494";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"液压/起重工具";s:10:"parent_cid";s:8:"50020485";}}}i:32;a:5:{s:3:"cid";s:8:"50020579";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"电子/电工";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50020585";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"插座";s:10:"parent_cid";s:8:"50020579";}i:1;a:4:{s:3:"cid";s:8:"50020596";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"底盒";s:10:"parent_cid";s:8:"50020579";}i:2;a:4:{s:3:"cid";s:8:"50020599";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"转换器";s:10:"parent_cid";s:8:"50020579";}i:3;a:4:{s:3:"cid";s:8:"50020602";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"太阳能电池";s:10:"parent_cid";s:8:"50020579";}i:4;a:4:{s:3:"cid";s:8:"50020606";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"节电器";s:10:"parent_cid";s:8:"50020579";}i:5;a:4:{s:3:"cid";s:8:"50020975";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"变压器";s:10:"parent_cid";s:8:"50020579";}i:6;a:4:{s:3:"cid";s:8:"50020978";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"继电器";s:10:"parent_cid";s:8:"50020579";}i:7;a:4:{s:3:"cid";s:8:"50020985";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"蓄电池";s:10:"parent_cid";s:8:"50020579";}i:8;a:4:{s:3:"cid";s:8:"50020995";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"布线箱";s:10:"parent_cid";s:8:"50020579";}i:9;a:4:{s:3:"cid";s:8:"50020998";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电工配件";s:10:"parent_cid";s:8:"50020579";}i:10;a:4:{s:3:"cid";s:8:"50021011";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"开关";s:10:"parent_cid";s:8:"50020579";}i:11;a:4:{s:3:"cid";s:8:"50021027";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"断路器";s:10:"parent_cid";s:8:"50020579";}i:12;a:4:{s:3:"cid";s:8:"50021033";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"电线";s:10:"parent_cid";s:8:"50020579";}i:13;a:4:{s:3:"cid";s:8:"50021042";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电工套管";s:10:"parent_cid";s:8:"50020579";}i:14;a:4:{s:3:"cid";s:8:"50021057";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"监控器材及系统";s:10:"parent_cid";s:8:"50020579";}i:15;a:4:{s:3:"cid";s:8:"50021105";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"防盗报警器材及系统";s:10:"parent_cid";s:8:"50020579";}i:16;a:4:{s:3:"cid";s:8:"50021120";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"消防报警设备";s:10:"parent_cid";s:8:"50020579";}i:17;a:4:{s:3:"cid";s:8:"50021153";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"安全检查设备";s:10:"parent_cid";s:8:"50020579";}i:18;a:4:{s:3:"cid";s:8:"50022516";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"接线板/插头";s:10:"parent_cid";s:8:"50020579";}i:19;a:4:{s:3:"cid";s:8:"50013796";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50020579";}i:20;a:4:{s:3:"cid";s:8:"50013405";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"交换器";s:10:"parent_cid";s:8:"50020579";}i:21;a:4:{s:3:"cid";s:8:"50022651";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"LED设备";s:10:"parent_cid";s:8:"50020579";}}}i:33;a:5:{s:3:"cid";s:8:"50011949";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"特价酒店/特色客栈/公寓旅馆";s:10:"parent_cid";s:1:"0";s:4:"subs";a:2:{i:0;a:4:{s:3:"cid";s:8:"50016161";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"酒店客栈";s:10:"parent_cid";s:8:"50011949";}i:1;a:4:{s:3:"cid";s:8:"50019784";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"酒店客栈套餐";s:10:"parent_cid";s:8:"50011949";}}}i:34;a:5:{s:3:"cid";s:2:"21";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"居家日用/婚庆/创意礼品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:14:{i:0;a:4:{s:3:"cid";s:8:"50026577";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"圣诞袜";s:10:"parent_cid";s:2:"21";}i:1;a:4:{s:3:"cid";s:4:"2801";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"节日/派对庆典用品";s:10:"parent_cid";s:2:"21";}i:2;a:4:{s:3:"cid";s:8:"50009206";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"家用五金工具";s:10:"parent_cid";s:2:"21";}i:3;a:4:{s:3:"cid";s:8:"50010099";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"伞/雨具/防雨/防潮";s:10:"parent_cid";s:2:"21";}i:4;a:4:{s:3:"cid";s:8:"50010464";s:9:"is_parent";s:4:"true";s:4:"name";s:37:"扇/迷你风扇/配件/冰垫/冰贴";s:10:"parent_cid";s:2:"21";}i:5;a:4:{s:3:"cid";s:8:"50012512";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"保暖贴/怀炉/保暖用品";s:10:"parent_cid";s:2:"21";}i:6;a:4:{s:3:"cid";s:8:"50008275";s:9:"is_parent";s:4:"true";s:4:"name";s:3:"钟";s:10:"parent_cid";s:2:"21";}i:7;a:4:{s:3:"cid";s:8:"50003948";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"竹炭包";s:10:"parent_cid";s:2:"21";}i:8;a:4:{s:3:"cid";s:8:"50016434";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"创意礼品";s:10:"parent_cid";s:2:"21";}i:9;a:4:{s:3:"cid";s:8:"50012514";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"防护用品";s:10:"parent_cid";s:2:"21";}i:10;a:4:{s:3:"cid";s:8:"50006528";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"鞋用品";s:10:"parent_cid";s:2:"21";}i:11;a:4:{s:3:"cid";s:8:"50023068";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"美体/减肥/塑型/增高用具";s:10:"parent_cid";s:2:"21";}i:12;a:4:{s:3:"cid";s:8:"50025838";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"驱虫用品";s:10:"parent_cid";s:2:"21";}i:13;a:4:{s:3:"cid";s:8:"50025839";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"香薰用品";s:10:"parent_cid";s:2:"21";}}}i:35;a:5:{s:3:"cid";s:8:"50016349";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"厨房/餐饮用具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:10:{i:0;a:4:{s:3:"cid";s:8:"50006885";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"杯子/水杯/水壶";s:10:"parent_cid";s:8:"50016349";}i:1;a:4:{s:3:"cid";s:8:"50002796";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"餐具";s:10:"parent_cid";s:8:"50016349";}i:2;a:4:{s:3:"cid";s:4:"2107";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"茶具";s:10:"parent_cid";s:8:"50016349";}i:3;a:4:{s:3:"cid";s:8:"50004438";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"咖啡器具";s:10:"parent_cid";s:8:"50016349";}i:4;a:4:{s:3:"cid";s:6:"215206";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"酒壶/酒杯/酒具";s:10:"parent_cid";s:8:"50016349";}i:5;a:4:{s:3:"cid";s:8:"50014236";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"保鲜容器/保鲜器皿";s:10:"parent_cid";s:8:"50016349";}i:6;a:4:{s:3:"cid";s:8:"50010101";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"烹饪用具";s:10:"parent_cid";s:8:"50016349";}i:7;a:4:{s:3:"cid";s:8:"50008281";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"厨用小工具/厨房储物";s:10:"parent_cid";s:8:"50016349";}i:8;a:4:{s:3:"cid";s:8:"50002258";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"烧烤/烘焙用具";s:10:"parent_cid";s:8:"50016349";}i:9;a:4:{s:3:"cid";s:8:"50022523";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"一次性餐桌用品";s:10:"parent_cid";s:8:"50016349";}}}i:36;a:5:{s:3:"cid";s:8:"50016348";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"清洁/卫浴/收纳/整理用具";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50009146";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"个人洗护清洁用具";s:10:"parent_cid";s:8:"50016348";}i:1;a:4:{s:3:"cid";s:8:"50003949";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"家务/地板清洁用具";s:10:"parent_cid";s:8:"50016348";}i:2;a:4:{s:3:"cid";s:8:"50000569";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"衣物洗/晒/护理用具";s:10:"parent_cid";s:8:"50016348";}i:3;a:4:{s:3:"cid";s:8:"50018683";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"家庭收纳用具";s:10:"parent_cid";s:8:"50016348";}i:4;a:4:{s:3:"cid";s:8:"50022707";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"浴洗工具/配件";s:10:"parent_cid";s:8:"50016348";}i:5;a:4:{s:3:"cid";s:8:"50023189";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"家庭整理用具";s:10:"parent_cid";s:8:"50016348";}i:6;a:4:{s:3:"cid";s:8:"50023243";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"家庭防尘用具";s:10:"parent_cid";s:8:"50016348";}i:7;a:4:{s:3:"cid";s:4:"2132";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"卫浴用具/卫浴配件";s:10:"parent_cid";s:8:"50016348";}}}i:37;a:5:{s:3:"cid";s:8:"50008163";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"床上用品/布艺软饰";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50001871";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"休闲毯/毛毯/绒毯";s:10:"parent_cid";s:8:"50008163";}i:1;a:4:{s:3:"cid";s:8:"50000583";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"地垫";s:10:"parent_cid";s:8:"50008163";}i:2;a:4:{s:3:"cid";s:8:"50000582";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"地毯";s:10:"parent_cid";s:8:"50008163";}i:3;a:4:{s:3:"cid";s:8:"50000584";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"挂毯/壁毯";s:10:"parent_cid";s:8:"50008163";}i:4;a:4:{s:3:"cid";s:6:"290209";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"十字绣/刺绣工具配件";s:10:"parent_cid";s:8:"50008163";}i:5;a:4:{s:3:"cid";s:8:"50024797";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"坐垫/椅垫/沙发垫";s:10:"parent_cid";s:8:"50008163";}i:6;a:4:{s:3:"cid";s:8:"50005494";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"防尘罩/沙发套/空调罩";s:10:"parent_cid";s:8:"50008163";}i:7;a:4:{s:3:"cid";s:8:"50002789";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"挂帘/门帘/纱窗/配件";s:10:"parent_cid";s:8:"50008163";}i:8;a:4:{s:3:"cid";s:8:"50024918";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"餐桌布艺";s:10:"parent_cid";s:8:"50008163";}i:9;a:4:{s:3:"cid";s:8:"50024922";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"十字绣/刺绣";s:10:"parent_cid";s:8:"50008163";}i:10;a:4:{s:3:"cid";s:8:"50024923";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"窗帘/窗纱";s:10:"parent_cid";s:8:"50008163";}i:11;a:4:{s:3:"cid";s:8:"50024924";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"其他帘类";s:10:"parent_cid";s:8:"50008163";}i:12;a:4:{s:3:"cid";s:8:"50024925";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"窗帘/门帘配件";s:10:"parent_cid";s:8:"50008163";}i:13;a:4:{s:3:"cid";s:8:"50024947";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"背景墙软包/床头套/工艺软包";s:10:"parent_cid";s:8:"50008163";}i:14;a:4:{s:3:"cid";s:8:"50012791";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"床上用品";s:10:"parent_cid";s:8:"50008163";}i:15;a:4:{s:3:"cid";s:8:"50010103";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"毛巾/浴巾/浴袍";s:10:"parent_cid";s:8:"50008163";}i:16;a:4:{s:3:"cid";s:8:"50012051";s:9:"is_parent";s:5:"false";s:4:"name";s:36:"家居拖鞋/凉拖/棉拖/居家鞋";s:10:"parent_cid";s:8:"50008163";}i:17;a:4:{s:3:"cid";s:6:"213002";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"靠垫/抱枕";s:10:"parent_cid";s:8:"50008163";}i:18;a:4:{s:3:"cid";s:8:"50005033";s:9:"is_parent";s:5:"false";s:4:"name";s:35:"布料/面料/手工diy布料面料";s:10:"parent_cid";s:8:"50008163";}i:19;a:4:{s:3:"cid";s:8:"50010041";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"布艺蛋糕/蛋糕毛巾";s:10:"parent_cid";s:8:"50008163";}i:20;a:4:{s:3:"cid";s:8:"50017143";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"缝纫DIY材料、工具及成品";s:10:"parent_cid";s:8:"50008163";}i:21;a:4:{s:3:"cid";s:8:"50006101";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50008163";}}}i:38;a:5:{s:3:"cid";s:2:"35";s:9:"is_parent";s:4:"true";s:4:"name";s:30:"奶粉/辅食/营养品/零食";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:6:"211104";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"婴幼儿牛奶粉";s:10:"parent_cid";s:2:"35";}i:1;a:4:{s:3:"cid";s:8:"50016094";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"特殊配方奶粉";s:10:"parent_cid";s:2:"35";}i:2;a:4:{s:3:"cid";s:8:"50014813";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:2:"35";}i:3;a:4:{s:3:"cid";s:8:"50018596";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"婴幼儿调味品";s:10:"parent_cid";s:2:"35";}i:4;a:4:{s:3:"cid";s:8:"50018801";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"婴幼儿辅食";s:10:"parent_cid";s:2:"35";}i:5;a:4:{s:3:"cid";s:8:"50018808";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"婴幼儿营养品";s:10:"parent_cid";s:2:"35";}i:6;a:4:{s:3:"cid";s:8:"50018807";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"婴幼儿零食";s:10:"parent_cid";s:2:"35";}i:7;a:4:{s:3:"cid";s:8:"50018184";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"婴幼儿羊奶粉";s:10:"parent_cid";s:2:"35";}}}i:39;a:5:{s:3:"cid";s:8:"50014812";s:9:"is_parent";s:4:"true";s:4:"name";s:30:"尿片/洗护/喂哺/推车床";s:10:"parent_cid";s:1:"0";s:4:"subs";a:21:{i:0;a:4:{s:3:"cid";s:8:"50018813";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"纸尿裤/拉拉裤/纸尿片";s:10:"parent_cid";s:8:"50014812";}i:1;a:4:{s:3:"cid";s:8:"50009522";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"奶瓶";s:10:"parent_cid";s:8:"50014812";}i:2;a:4:{s:3:"cid";s:8:"50009523";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"奶嘴(单卖)-待删除";s:10:"parent_cid";s:8:"50014812";}i:3;a:4:{s:3:"cid";s:8:"50012546";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"湿巾";s:10:"parent_cid";s:8:"50014812";}i:4;a:4:{s:3:"cid";s:8:"50012805";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"安抚奶嘴-待删除";s:10:"parent_cid";s:8:"50014812";}i:5;a:4:{s:3:"cid";s:8:"50013866";s:9:"is_parent";s:4:"true";s:4:"name";s:30:"童床/婴儿床/摇篮/餐椅";s:10:"parent_cid";s:8:"50014812";}i:6;a:4:{s:3:"cid";s:8:"50012711";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"布尿裤/尿垫";s:10:"parent_cid";s:8:"50014812";}i:7;a:4:{s:3:"cid";s:8:"50014248";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"宝宝洗浴护肤品";s:10:"parent_cid";s:8:"50014812";}i:8;a:4:{s:3:"cid";s:8:"50012412";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"睡袋/凉席/枕头/床品";s:10:"parent_cid";s:8:"50014812";}i:9;a:4:{s:3:"cid";s:8:"50009521";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"水杯/餐具/研磨/附件";s:10:"parent_cid";s:8:"50014812";}i:10;a:4:{s:3:"cid";s:8:"50012436";s:9:"is_parent";s:4:"true";s:4:"name";s:53:"理发器/指甲钳/体温计等日常护理小用品";s:10:"parent_cid";s:8:"50014812";}i:11;a:4:{s:3:"cid";s:8:"50006020";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"背带/学步带/出行用品";s:10:"parent_cid";s:8:"50014812";}i:12;a:4:{s:3:"cid";s:8:"50005952";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"防撞/提醒/安全/保护";s:10:"parent_cid";s:8:"50014812";}i:13;a:4:{s:3:"cid";s:8:"50012448";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"牙胶/牙刷/牙膏";s:10:"parent_cid";s:8:"50014812";}i:14;a:4:{s:3:"cid";s:8:"50012466";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"清洁液/洗衣液/柔顺剂";s:10:"parent_cid";s:8:"50014812";}i:15;a:4:{s:3:"cid";s:8:"50018391";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"消毒/吸奶器/小家电";s:10:"parent_cid";s:8:"50014812";}i:16;a:4:{s:3:"cid";s:8:"50018394";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"驱蚊/退烧/感冒贴";s:10:"parent_cid";s:8:"50014812";}i:17;a:4:{s:3:"cid";s:6:"211112";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其它婴童用品";s:10:"parent_cid";s:8:"50014812";}i:18;a:4:{s:3:"cid";s:8:"50022520";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"婴儿手推车/学步车";s:10:"parent_cid";s:8:"50014812";}i:19;a:4:{s:3:"cid";s:8:"50148003";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"儿童房/桌椅/家具";s:10:"parent_cid";s:8:"50014812";}i:20;a:4:{s:3:"cid";s:8:"50228003";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"奶嘴/安抚奶嘴";s:10:"parent_cid";s:8:"50014812";}}}i:40;a:5:{s:3:"cid";s:8:"50022517";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"孕妇装/孕产妇用品/营养";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50012374";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"防辐射";s:10:"parent_cid";s:8:"50022517";}i:1;a:4:{s:3:"cid";s:8:"50012354";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"孕妇装";s:10:"parent_cid";s:8:"50022517";}i:2;a:4:{s:3:"cid";s:8:"50023573";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"孕妇裤/托腹裤";s:10:"parent_cid";s:8:"50022517";}i:3;a:4:{s:3:"cid";s:8:"50012314";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"产妇帽/孕妇袜/孕妇鞋";s:10:"parent_cid";s:8:"50022517";}i:4;a:4:{s:3:"cid";s:8:"50023613";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"家居服/哺乳装/秋衣裤";s:10:"parent_cid";s:8:"50022517";}i:5;a:4:{s:3:"cid";s:8:"50016687";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"哺乳文胸/内裤/产检裤";s:10:"parent_cid";s:8:"50022517";}i:6;a:4:{s:3:"cid";s:8:"50023660";s:9:"is_parent";s:4:"true";s:4:"name";s:47:"束缚带/产妇瘦身塑体衣/盆骨矫正带";s:10:"parent_cid";s:8:"50022517";}i:7;a:4:{s:3:"cid";s:8:"50018397";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"待删勿在此发布-护";s:10:"parent_cid";s:8:"50022517";}i:8;a:4:{s:3:"cid";s:8:"50005961";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"妈咪包/袋";s:10:"parent_cid";s:8:"50022517";}i:9;a:4:{s:3:"cid";s:8:"50011864";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"早孕检测";s:10:"parent_cid";s:8:"50022517";}i:10;a:4:{s:3:"cid";s:8:"50006000";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"妈妈产前产后用品";s:10:"parent_cid";s:8:"50022517";}i:11;a:4:{s:3:"cid";s:8:"50010392";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"孕产妇奶粉";s:10:"parent_cid";s:8:"50022517";}i:12;a:4:{s:3:"cid";s:8:"50026457";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"孕产妇护肤/洗护/祛纹";s:10:"parent_cid";s:8:"50022517";}i:13;a:4:{s:3:"cid";s:8:"50026460";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"孕产妇营养品";s:10:"parent_cid";s:8:"50022517";}i:14;a:4:{s:3:"cid";s:8:"50026471";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"月子营养";s:10:"parent_cid";s:8:"50022517";}}}i:41;a:5:{s:3:"cid";s:8:"50008165";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"童装/童鞋/亲子装";s:10:"parent_cid";s:1:"0";s:4:"subs";a:28:{i:0;a:4:{s:3:"cid";s:8:"50014512";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"婴儿礼盒";s:10:"parent_cid";s:8:"50008165";}i:1;a:4:{s:3:"cid";s:8:"50010537";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"连身衣/爬服/哈衣";s:10:"parent_cid";s:8:"50008165";}i:2;a:4:{s:3:"cid";s:8:"50012431";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"肚围/护脐带/肚兜";s:10:"parent_cid";s:8:"50008165";}i:3;a:4:{s:3:"cid";s:8:"50010530";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"披风/斗篷";s:10:"parent_cid";s:8:"50008165";}i:4;a:4:{s:3:"cid";s:8:"50010524";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"马甲";s:10:"parent_cid";s:8:"50008165";}i:5;a:4:{s:3:"cid";s:8:"50013693";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"裙子";s:10:"parent_cid";s:8:"50008165";}i:6;a:4:{s:3:"cid";s:8:"50013618";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"裤子";s:10:"parent_cid";s:8:"50008165";}i:7;a:4:{s:3:"cid";s:8:"50012433";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"婴童内衣裤/睡衣";s:10:"parent_cid";s:8:"50008165";}i:8;a:4:{s:3:"cid";s:8:"50013189";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"T恤";s:10:"parent_cid";s:8:"50008165";}i:9;a:4:{s:3:"cid";s:8:"50010527";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"衬衫";s:10:"parent_cid";s:8:"50008165";}i:10;a:4:{s:3:"cid";s:8:"50010518";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"卫衣/绒衫";s:10:"parent_cid";s:8:"50008165";}i:11;a:4:{s:3:"cid";s:8:"50010539";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"毛衣/针织衫";s:10:"parent_cid";s:8:"50008165";}i:12;a:4:{s:3:"cid";s:8:"50012308";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"外套/夹克/大衣";s:10:"parent_cid";s:8:"50008165";}i:13;a:4:{s:3:"cid";s:8:"50010531";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"棉袄/棉服";s:10:"parent_cid";s:8:"50008165";}i:14;a:4:{s:3:"cid";s:8:"50010526";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"羽绒服/羽绒内胆";s:10:"parent_cid";s:8:"50008165";}i:15;a:4:{s:3:"cid";s:8:"50010540";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"套装";s:10:"parent_cid";s:8:"50008165";}i:16;a:4:{s:3:"cid";s:8:"50012424";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"亲子装/亲子时装";s:10:"parent_cid";s:8:"50008165";}i:17;a:4:{s:3:"cid";s:8:"50012340";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"童鞋/婴儿鞋";s:10:"parent_cid";s:8:"50008165";}i:18;a:4:{s:3:"cid";s:8:"50016012";s:9:"is_parent";s:5:"false";s:4:"name";s:32:"儿童舞蹈服/演出服/礼服";s:10:"parent_cid";s:8:"50008165";}i:19;a:4:{s:3:"cid";s:8:"50016450";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"校服/校服定制";s:10:"parent_cid";s:8:"50008165";}i:20;a:4:{s:3:"cid";s:8:"50023868";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"儿童泳衣/裤/帽";s:10:"parent_cid";s:8:"50008165";}i:21;a:4:{s:3:"cid";s:8:"50024824";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"儿童配饰/发饰";s:10:"parent_cid";s:8:"50008165";}i:22;a:4:{s:3:"cid";s:8:"50006584";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"婴童袜子";s:10:"parent_cid";s:8:"50008165";}i:23;a:4:{s:3:"cid";s:8:"50006583";s:9:"is_parent";s:4:"true";s:4:"name";s:41:"帽子/围巾/口罩/手套/耳套/脚套";s:10:"parent_cid";s:8:"50008165";}i:24;a:4:{s:3:"cid";s:8:"50006217";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50008165";}i:25;a:4:{s:3:"cid";s:8:"50156002";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"背心/吊带衫";s:10:"parent_cid";s:8:"50008165";}i:26;a:4:{s:3:"cid";s:8:"50152002";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"儿童旗袍/唐装/民族服装";s:10:"parent_cid";s:8:"50008165";}i:27;a:4:{s:3:"cid";s:8:"50146004";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"反穿衣/罩衣";s:10:"parent_cid";s:8:"50008165";}}}i:42;a:5:{s:3:"cid";s:8:"50020275";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"传统滋补营养品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50020280";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"其他品牌保健品";s:10:"parent_cid";s:8:"50020275";}i:1;a:4:{s:3:"cid";s:8:"50015218";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"药食同源食品";s:10:"parent_cid";s:8:"50020275";}i:2;a:4:{s:3:"cid";s:8:"50008044";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"燕窝";s:10:"parent_cid";s:8:"50020275";}i:3;a:4:{s:3:"cid";s:8:"50005945";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"参类保健品";s:10:"parent_cid";s:8:"50020275";}i:4;a:4:{s:3:"cid";s:8:"50005773";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"蜂蜜/蜂产品";s:10:"parent_cid";s:8:"50020275";}i:5;a:4:{s:3:"cid";s:8:"50008046";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"冬虫夏草";s:10:"parent_cid";s:8:"50020275";}i:6;a:4:{s:3:"cid";s:8:"50015134";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"鹿茸";s:10:"parent_cid";s:8:"50020275";}i:7;a:4:{s:3:"cid";s:8:"50015194";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"灵芝";s:10:"parent_cid";s:8:"50020275";}i:8;a:4:{s:3:"cid";s:8:"50015207";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"枸杞及其制品";s:10:"parent_cid";s:8:"50020275";}i:9;a:4:{s:3:"cid";s:8:"50015211";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"雪蛤/林蛙油";s:10:"parent_cid";s:8:"50020275";}i:10;a:4:{s:3:"cid";s:8:"50015219";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"阿胶膏方";s:10:"parent_cid";s:8:"50020275";}i:11;a:4:{s:3:"cid";s:8:"50009980";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"三七";s:10:"parent_cid";s:8:"50020275";}i:12;a:4:{s:3:"cid";s:8:"50012186";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"铁皮/石斛/枫斗";s:10:"parent_cid";s:8:"50020275";}i:13;a:4:{s:3:"cid";s:8:"50020296";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"其他传统滋补品";s:10:"parent_cid";s:8:"50020275";}i:14;a:4:{s:3:"cid";s:8:"50050143";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"新资源食品";s:10:"parent_cid";s:8:"50020275";}}}i:43;a:5:{s:3:"cid";s:8:"50002766";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"零食/坚果/特产";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50013061";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"蜜饯/枣类/梅/果干";s:10:"parent_cid";s:8:"50002766";}i:1;a:4:{s:3:"cid";s:8:"50012981";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"山核桃/坚果/炒货";s:10:"parent_cid";s:8:"50002766";}i:2;a:4:{s:3:"cid";s:8:"50008613";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"牛肉干/猪肉脯/肉类熟食";s:10:"parent_cid";s:8:"50002766";}i:3;a:4:{s:3:"cid";s:8:"50010550";s:9:"is_parent";s:4:"true";s:4:"name";s:30:"饼干/糕点/小点心/膨化";s:10:"parent_cid";s:8:"50002766";}i:4;a:4:{s:3:"cid";s:8:"50008055";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"巧克力/DIY巧克力";s:10:"parent_cid";s:8:"50002766";}i:5;a:4:{s:3:"cid";s:8:"50016091";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"糖果零食/果冻/布丁";s:10:"parent_cid";s:8:"50002766";}i:6;a:4:{s:3:"cid";s:8:"50009556";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"鱿鱼丝/鱼干/海味即食";s:10:"parent_cid";s:8:"50002766";}i:7;a:4:{s:3:"cid";s:8:"50008430";s:9:"is_parent";s:4:"true";s:4:"name";s:17:"奶酪/乳制品/";s:10:"parent_cid";s:8:"50002766";}}}i:44;a:5:{s:3:"cid";s:8:"50016422";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"粮油米面/南北干货/调味品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:9:{i:0;a:4:{s:3:"cid";s:8:"50009837";s:9:"is_parent";s:4:"true";s:4:"name";s:17:"米/面粉/杂粮";s:10:"parent_cid";s:8:"50016422";}i:1;a:4:{s:3:"cid";s:8:"50009821";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"调味品/果酱/沙拉";s:10:"parent_cid";s:8:"50016422";}i:2;a:4:{s:3:"cid";s:8:"50025682";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"南北干货/肉类干货";s:10:"parent_cid";s:8:"50016422";}i:3;a:4:{s:3:"cid";s:8:"50010696";s:9:"is_parent";s:5:"false";s:4:"name";s:35:"烘焙原料/辅料/食品添加剂";s:10:"parent_cid";s:8:"50016422";}i:4;a:4:{s:3:"cid";s:8:"50016443";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他食品";s:10:"parent_cid";s:8:"50016422";}i:5;a:4:{s:3:"cid";s:8:"50025689";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"方便速食";s:10:"parent_cid";s:8:"50016422";}i:6;a:4:{s:3:"cid";s:8:"50016844";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"冷冻/待加工食品";s:10:"parent_cid";s:8:"50016422";}i:7;a:4:{s:3:"cid";s:8:"50025693";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"真空即食/冷藏日配";s:10:"parent_cid";s:8:"50016422";}i:8;a:4:{s:3:"cid";s:8:"50050378";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"食用油/调味油";s:10:"parent_cid";s:8:"50016422";}}}i:45;a:5:{s:3:"cid";s:8:"50008075";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"餐饮美食/面包券";s:10:"parent_cid";s:1:"0";s:4:"subs";a:13:{i:0;a:4:{s:3:"cid";s:8:"50015759";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"中餐";s:10:"parent_cid";s:8:"50008075";}i:1;a:4:{s:3:"cid";s:8:"50026022";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"日韩料理/亚洲美食";s:10:"parent_cid";s:8:"50008075";}i:2;a:4:{s:3:"cid";s:8:"50015758";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"西餐";s:10:"parent_cid";s:8:"50008075";}i:3;a:4:{s:3:"cid";s:8:"50015757";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"自助餐";s:10:"parent_cid";s:8:"50008075";}i:4;a:4:{s:3:"cid";s:8:"50019073";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"冷饮/茶楼";s:10:"parent_cid";s:8:"50008075";}i:5;a:4:{s:3:"cid";s:8:"50025996";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"中式快餐小吃";s:10:"parent_cid";s:8:"50008075";}i:6;a:4:{s:3:"cid";s:8:"50019055";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"面包/月饼/蛋糕";s:10:"parent_cid";s:8:"50008075";}i:7;a:4:{s:3:"cid";s:8:"50019058";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"食品提货券";s:10:"parent_cid";s:8:"50008075";}i:8;a:4:{s:3:"cid";s:8:"50019072";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"其他美食折扣券";s:10:"parent_cid";s:8:"50008075";}i:9;a:4:{s:3:"cid";s:8:"50026554";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"火锅/豆捞";s:10:"parent_cid";s:8:"50008075";}i:10;a:4:{s:3:"cid";s:8:"50015761";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"咖啡厅";s:10:"parent_cid";s:8:"50008075";}i:11;a:4:{s:3:"cid";s:8:"50026002";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"烧烤";s:10:"parent_cid";s:8:"50008075";}i:12;a:4:{s:3:"cid";s:8:"50015756";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"西式快餐";s:10:"parent_cid";s:8:"50008075";}}}i:46;a:5:{s:3:"cid";s:2:"40";s:9:"is_parent";s:4:"true";s:4:"name";s:14:"腾讯QQ专区";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:8:"50005462";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"QQ币/QQ卡";s:10:"parent_cid";s:2:"40";}i:1;a:4:{s:3:"cid";s:8:"50007212";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"QQ增值服务";s:10:"parent_cid";s:2:"40";}i:2;a:4:{s:3:"cid";s:8:"50005457";s:9:"is_parent";s:4:"true";s:4:"name";s:5:"QQ秀";s:10:"parent_cid";s:2:"40";}i:3;a:4:{s:3:"cid";s:8:"50007210";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"QQ游戏币/欢乐豆";s:10:"parent_cid";s:2:"40";}i:4;a:4:{s:3:"cid";s:8:"50005458";s:9:"is_parent";s:4:"true";s:4:"name";s:8:"QQ宠物";s:10:"parent_cid";s:2:"40";}i:5;a:4:{s:3:"cid";s:8:"50005460";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ空间";s:10:"parent_cid";s:2:"40";}i:6;a:4:{s:3:"cid";s:8:"50007185";s:9:"is_parent";s:4:"true";s:4:"name";s:8:"QQ音速";s:10:"parent_cid";s:2:"40";}i:7;a:4:{s:3:"cid";s:8:"50010890";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"点亮QQ图标";s:10:"parent_cid";s:2:"40";}i:8;a:4:{s:3:"cid";s:8:"50008049";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"Q点";s:10:"parent_cid";s:2:"40";}i:9;a:4:{s:3:"cid";s:8:"50005461";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"腾讯游戏";s:10:"parent_cid";s:2:"40";}i:10;a:4:{s:3:"cid";s:8:"50007211";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"QQ游戏大厅道具";s:10:"parent_cid";s:2:"40";}i:11;a:4:{s:3:"cid";s:8:"50005491";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ其它";s:10:"parent_cid";s:2:"40";}}}i:47;a:5:{s:3:"cid";s:8:"50010728";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"运动/瑜伽/健身/球迷用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:37:{i:0;a:4:{s:3:"cid";s:8:"50011556";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"羽毛球";s:10:"parent_cid";s:8:"50010728";}i:1;a:4:{s:3:"cid";s:8:"50012937";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"乒乓球";s:10:"parent_cid";s:8:"50010728";}i:2;a:4:{s:3:"cid";s:8:"50013823";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"足球";s:10:"parent_cid";s:8:"50010728";}i:3;a:4:{s:3:"cid";s:8:"50013202";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"篮球";s:10:"parent_cid";s:8:"50010728";}i:4;a:4:{s:3:"cid";s:8:"50017077";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"网球";s:10:"parent_cid";s:8:"50010728";}i:5;a:4:{s:3:"cid";s:8:"50017616";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"排球";s:10:"parent_cid";s:8:"50010728";}i:6;a:4:{s:3:"cid";s:8:"50017776";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"高尔夫";s:10:"parent_cid";s:8:"50010728";}i:7;a:4:{s:3:"cid";s:8:"50017859";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"棒球";s:10:"parent_cid";s:8:"50010728";}i:8;a:4:{s:3:"cid";s:8:"50017625";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"壁球";s:10:"parent_cid";s:8:"50010728";}i:9;a:4:{s:3:"cid";s:8:"50017757";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"保龄球";s:10:"parent_cid";s:8:"50010728";}i:10;a:4:{s:3:"cid";s:8:"50016729";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"游泳";s:10:"parent_cid";s:8:"50010728";}i:11;a:4:{s:3:"cid";s:8:"50010828";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"跳舞毯";s:10:"parent_cid";s:8:"50010728";}i:12;a:4:{s:3:"cid";s:4:"2612";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"山地/公路/便携自行车";s:10:"parent_cid";s:8:"50010728";}i:13;a:4:{s:3:"cid";s:8:"50019782";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"电动车/电动车配件";s:10:"parent_cid";s:8:"50010728";}i:14;a:4:{s:3:"cid";s:8:"50016689";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"轮滑/滑板/极限运动";s:10:"parent_cid";s:8:"50010728";}i:15;a:4:{s:3:"cid";s:8:"50016663";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"瑜伽";s:10:"parent_cid";s:8:"50010728";}i:16;a:4:{s:3:"cid";s:8:"50016472";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"舞蹈/健美操/体操";s:10:"parent_cid";s:8:"50010728";}i:17;a:4:{s:3:"cid";s:8:"50017913";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"跆拳道/武术/搏击";s:10:"parent_cid";s:8:"50010728";}i:18;a:4:{s:3:"cid";s:8:"50017085";s:9:"is_parent";s:4:"true";s:4:"name";s:31:"踏步机/中小型健身器材";s:10:"parent_cid";s:8:"50010728";}i:19;a:4:{s:3:"cid";s:8:"50017117";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"跑步机/大型健身器械";s:10:"parent_cid";s:8:"50010728";}i:20;a:4:{s:3:"cid";s:8:"50018096";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"橄榄球";s:10:"parent_cid";s:8:"50010728";}i:21;a:4:{s:3:"cid";s:8:"50017722";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"台球";s:10:"parent_cid";s:8:"50010728";}i:22;a:4:{s:3:"cid";s:8:"50017871";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"麻将/棋牌/益智类";s:10:"parent_cid";s:8:"50010728";}i:23;a:4:{s:3:"cid";s:8:"50018005";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"飞镖/桌上足球/室内休闲";s:10:"parent_cid";s:8:"50010728";}i:24;a:4:{s:3:"cid";s:8:"50017269";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"田径运动器材";s:10:"parent_cid";s:8:"50010728";}i:25;a:4:{s:3:"cid";s:8:"50018025";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"毽子/空竹/民间运动";s:10:"parent_cid";s:8:"50010728";}i:26;a:4:{s:3:"cid";s:8:"50013253";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"游乐场/体育场馆设施";s:10:"parent_cid";s:8:"50010728";}i:27;a:4:{s:3:"cid";s:8:"50023363";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"马术运动";s:10:"parent_cid";s:8:"50010728";}i:28;a:4:{s:3:"cid";s:8:"50023370";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"击剑运动";s:10:"parent_cid";s:8:"50010728";}i:29;a:4:{s:3:"cid";s:8:"50018189";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"F1/赛车";s:10:"parent_cid";s:8:"50010728";}i:30;a:4:{s:3:"cid";s:8:"50018194";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"冰球/速滑/冰上运动";s:10:"parent_cid";s:8:"50010728";}i:31;a:4:{s:3:"cid";s:8:"50019503";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"慢跑(有氧运动)";s:10:"parent_cid";s:8:"50010728";}i:32;a:4:{s:3:"cid";s:8:"50019502";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"运动护具/急救用品";s:10:"parent_cid";s:8:"50010728";}i:33;a:4:{s:3:"cid";s:8:"50019501";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"运动书籍/教材";s:10:"parent_cid";s:8:"50010728";}i:34;a:4:{s:3:"cid";s:8:"50019500";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"运动健身卡/会员卡";s:10:"parent_cid";s:8:"50010728";}i:35;a:4:{s:3:"cid";s:8:"50010745";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"其他赛事纪念品";s:10:"parent_cid";s:8:"50010728";}i:36;a:4:{s:3:"cid";s:8:"50010749";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其它运动用品";s:10:"parent_cid";s:8:"50010728";}}}i:48;a:5:{s:3:"cid";s:8:"50013886";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"户外/登山/野营/旅行用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:26:{i:0;a:4:{s:3:"cid";s:8:"50014023";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"垂钓装备";s:10:"parent_cid";s:8:"50013886";}i:1;a:4:{s:3:"cid";s:8:"50013887";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"登山包/旅行包/户外包";s:10:"parent_cid";s:8:"50013886";}i:2;a:4:{s:3:"cid";s:8:"50013888";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"户外服装";s:10:"parent_cid";s:8:"50013886";}i:3;a:4:{s:3:"cid";s:8:"50013908";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"睡袋";s:10:"parent_cid";s:8:"50013886";}i:4;a:4:{s:3:"cid";s:8:"50014756";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"防潮垫/地席/枕头";s:10:"parent_cid";s:8:"50013886";}i:5;a:4:{s:3:"cid";s:8:"50019269";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"户外鞋袜";s:10:"parent_cid";s:8:"50013886";}i:6;a:4:{s:3:"cid";s:8:"50015368";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"服饰配件";s:10:"parent_cid";s:8:"50013886";}i:7;a:4:{s:3:"cid";s:8:"50013891";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"专项户外运动装备";s:10:"parent_cid";s:8:"50013886";}i:8;a:4:{s:3:"cid";s:8:"50014759";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"刀具/多用工具";s:10:"parent_cid";s:8:"50013886";}i:9;a:4:{s:3:"cid";s:8:"50013892";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"户外休闲家具";s:10:"parent_cid";s:8:"50013886";}i:10;a:4:{s:3:"cid";s:8:"50016119";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"旅行便携装备";s:10:"parent_cid";s:8:"50013886";}i:11;a:4:{s:3:"cid";s:8:"50019007";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"军迷服饰/军迷用品";s:10:"parent_cid";s:8:"50013886";}i:12;a:4:{s:3:"cid";s:8:"50018158";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"防护/救生装备";s:10:"parent_cid";s:8:"50013886";}i:13;a:4:{s:3:"cid";s:8:"50014766";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"干粮/户外食品";s:10:"parent_cid";s:8:"50013886";}i:14;a:4:{s:3:"cid";s:8:"50014767";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"地图/旅行指南/影像资料";s:10:"parent_cid";s:8:"50013886";}i:15;a:4:{s:3:"cid";s:8:"50019539";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"帐篷/天幕/帐篷配件";s:10:"parent_cid";s:8:"50013886";}i:16;a:4:{s:3:"cid";s:8:"50019592";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"望远镜/夜视仪/户外眼镜";s:10:"parent_cid";s:8:"50013886";}i:17;a:4:{s:3:"cid";s:8:"50019601";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"户外照明";s:10:"parent_cid";s:8:"50013886";}i:18;a:4:{s:3:"cid";s:8:"50019712";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"饮水用具/盛水容器";s:10:"parent_cid";s:8:"50013886";}i:19;a:4:{s:3:"cid";s:8:"50014763";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"通讯/导航/户外表类";s:10:"parent_cid";s:8:"50013886";}i:20;a:4:{s:3:"cid";s:8:"50014764";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"洗漱清洁/护理用品";s:10:"parent_cid";s:8:"50013886";}i:21;a:4:{s:3:"cid";s:8:"50014762";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"登山杖/手杖";s:10:"parent_cid";s:8:"50013886";}i:22;a:4:{s:3:"cid";s:8:"50014757";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"炉具/餐具/野餐烧烤用品";s:10:"parent_cid";s:8:"50013886";}i:23;a:4:{s:3:"cid";s:8:"50016382";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"活动/培训";s:10:"parent_cid";s:8:"50013886";}i:24;a:4:{s:3:"cid";s:4:"2203";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50013886";}i:25;a:4:{s:3:"cid";s:8:"50025640";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"场地预定";s:10:"parent_cid";s:8:"50013886";}}}i:49;a:5:{s:3:"cid";s:8:"50011699";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"运动服/运动包/颈环配件";s:10:"parent_cid";s:1:"0";s:4:"subs";a:16:{i:0;a:4:{s:3:"cid";s:8:"50013228";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"运动T恤";s:10:"parent_cid";s:8:"50011699";}i:1;a:4:{s:3:"cid";s:8:"50011717";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"运动卫衣/套头衫";s:10:"parent_cid";s:8:"50011699";}i:2;a:4:{s:3:"cid";s:8:"50011718";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动风衣";s:10:"parent_cid";s:8:"50011699";}i:3;a:4:{s:3:"cid";s:8:"50011739";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"运动茄克/外套";s:10:"parent_cid";s:8:"50011699";}i:4;a:4:{s:3:"cid";s:8:"50011720";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动棉衣";s:10:"parent_cid";s:8:"50011699";}i:5;a:4:{s:3:"cid";s:8:"50011721";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"运动羽绒服";s:10:"parent_cid";s:8:"50011699";}i:6;a:4:{s:3:"cid";s:8:"50011704";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"运动毛衣/线衫";s:10:"parent_cid";s:8:"50011699";}i:7;a:4:{s:3:"cid";s:8:"50022728";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动套装";s:10:"parent_cid";s:8:"50011699";}i:8;a:4:{s:3:"cid";s:8:"50022889";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"运动POLO衫";s:10:"parent_cid";s:8:"50011699";}i:9;a:4:{s:3:"cid";s:8:"50022891";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"健身服装";s:10:"parent_cid";s:8:"50011699";}i:10;a:4:{s:3:"cid";s:8:"50023105";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"运动裤";s:10:"parent_cid";s:8:"50011699";}i:11;a:4:{s:3:"cid";s:8:"50023109";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"运动裙";s:10:"parent_cid";s:8:"50011699";}i:12;a:4:{s:3:"cid";s:8:"50023415";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运动球服";s:10:"parent_cid";s:8:"50011699";}i:13;a:4:{s:3:"cid";s:8:"50023110";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运动马甲";s:10:"parent_cid";s:8:"50011699";}i:14;a:4:{s:3:"cid";s:8:"50023102";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运动配件";s:10:"parent_cid";s:8:"50011699";}i:15;a:4:{s:3:"cid";s:8:"50023095";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运动包袋";s:10:"parent_cid";s:8:"50011699";}}}i:50;a:5:{s:3:"cid";s:2:"25";s:9:"is_parent";s:4:"true";s:4:"name";s:34:"玩具/模型/动漫/早教/益智";s:10:"parent_cid";s:1:"0";s:4:"subs";a:26:{i:0;a:4:{s:3:"cid";s:8:"50011975";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"毛绒布艺类玩具";s:10:"parent_cid";s:2:"25";}i:1;a:4:{s:3:"cid";s:8:"50012770";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"娃娃/配件";s:10:"parent_cid";s:2:"25";}i:2;a:4:{s:3:"cid";s:8:"50024128";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"静态模型";s:10:"parent_cid";s:2:"25";}i:3;a:4:{s:3:"cid";s:8:"50013198";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"童车/儿童轮滑";s:10:"parent_cid";s:2:"25";}i:4;a:4:{s:3:"cid";s:8:"50008876";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"早教/音乐/智能玩具";s:10:"parent_cid";s:2:"25";}i:5;a:4:{s:3:"cid";s:4:"2512";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"户外运动/休闲/传统玩具";s:10:"parent_cid";s:2:"25";}i:6;a:4:{s:3:"cid";s:8:"50012455";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"游泳池/戏水玩具";s:10:"parent_cid";s:2:"25";}i:7;a:4:{s:3:"cid";s:8:"50008737";s:9:"is_parent";s:4:"true";s:4:"name";s:39:"玩具模型零件/工具/耗材/辅件";s:10:"parent_cid";s:2:"25";}i:8;a:4:{s:3:"cid";s:8:"50016058";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"高达/BJD/手办/机器人";s:10:"parent_cid";s:2:"25";}i:9;a:4:{s:3:"cid";s:8:"50003682";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"卡通/动漫/游戏周边";s:10:"parent_cid";s:2:"25";}i:10;a:4:{s:3:"cid";s:8:"50015988";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"网游周边";s:10:"parent_cid";s:2:"25";}i:11;a:4:{s:3:"cid";s:8:"50012404";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"儿童包/背包/箱包";s:10:"parent_cid";s:2:"25";}i:12;a:4:{s:3:"cid";s:8:"50015994";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"聚会/魔术/cosplay用具";s:10:"parent_cid";s:2:"25";}i:13;a:4:{s:3:"cid";s:8:"50000813";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"宝宝纪念品/个性产品";s:10:"parent_cid";s:2:"25";}i:14;a:4:{s:3:"cid";s:8:"50008528";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"棋牌/桌面游戏";s:10:"parent_cid";s:2:"25";}i:15;a:4:{s:3:"cid";s:8:"50023498";s:9:"is_parent";s:4:"true";s:4:"name";s:30:"解锁/迷宫/魔方/悠悠球";s:10:"parent_cid";s:2:"25";}i:16;a:4:{s:3:"cid";s:8:"50007116";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"电动/遥控/惯性/发条玩具";s:10:"parent_cid";s:2:"25";}i:17;a:4:{s:3:"cid";s:8:"50023502";s:9:"is_parent";s:4:"true";s:4:"name";s:42:"彩泥/手工制作/仿真/过家家玩具";s:10:"parent_cid";s:2:"25";}i:18;a:4:{s:3:"cid";s:8:"50023504";s:9:"is_parent";s:4:"true";s:4:"name";s:40:"积木/拆装/串珠/拼图/配对玩具";s:10:"parent_cid";s:2:"25";}i:19;a:4:{s:3:"cid";s:8:"50015127";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"学习/实验/绘画文具";s:10:"parent_cid";s:2:"25";}i:20;a:4:{s:3:"cid";s:8:"50023508";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"游乐/教学设备/大型设施";s:10:"parent_cid";s:2:"25";}i:21;a:4:{s:3:"cid";s:8:"50024048";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"幼儿响铃/布书手偶/爬行健身";s:10:"parent_cid";s:2:"25";}i:22;a:4:{s:3:"cid";s:8:"50024050";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"电子/发光/充气/整蛊玩具";s:10:"parent_cid";s:2:"25";}i:23;a:4:{s:3:"cid";s:8:"50024060";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"油动电动模型";s:10:"parent_cid";s:2:"25";}i:24;a:4:{s:3:"cid";s:8:"50023507";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"母婴线下服务";s:10:"parent_cid";s:2:"25";}i:25;a:4:{s:3:"cid";s:8:"50000802";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其它玩具";s:10:"parent_cid";s:2:"25";}}}i:51;a:5:{s:3:"cid";s:8:"50011665";s:9:"is_parent";s:4:"true";s:4:"name";s:36:"网游装备/游戏币/帐号/代练";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50011752";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"游戏币";s:10:"parent_cid";s:8:"50011665";}i:1;a:4:{s:3:"cid";s:8:"50011751";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"游戏装备";s:10:"parent_cid";s:8:"50011665";}i:2;a:4:{s:3:"cid";s:8:"50011753";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"游戏帐号";s:10:"parent_cid";s:8:"50011665";}i:3;a:4:{s:3:"cid";s:8:"50011754";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"游戏代练";s:10:"parent_cid";s:8:"50011665";}i:4;a:4:{s:3:"cid";s:8:"50010609";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"激活码测试号专区";s:10:"parent_cid";s:8:"50011665";}i:5;a:4:{s:3:"cid";s:8:"50010916";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"网页游戏物品/资源";s:10:"parent_cid";s:8:"50011665";}i:6;a:4:{s:3:"cid";s:8:"50002479";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"手机游戏";s:10:"parent_cid";s:8:"50011665";}i:7;a:4:{s:3:"cid";s:8:"50026679";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"chinajoy";s:10:"parent_cid";s:8:"50011665";}}}i:52;a:5:{s:3:"cid";s:8:"50008907";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"手机号码/套餐/增值业务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:13:{i:0;a:4:{s:3:"cid";s:6:"150403";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"IP电话卡/长途卡";s:10:"parent_cid";s:8:"50008907";}i:1;a:4:{s:3:"cid";s:6:"150404";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"网络电话卡";s:10:"parent_cid";s:8:"50008907";}i:2;a:4:{s:3:"cid";s:8:"50005109";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Skype充值专区";s:10:"parent_cid";s:8:"50008907";}i:3;a:4:{s:3:"cid";s:8:"50006853";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"3G无线上网资费卡";s:10:"parent_cid";s:8:"50008907";}i:4;a:4:{s:3:"cid";s:8:"50016361";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"有线宽带缴费";s:10:"parent_cid";s:8:"50008907";}i:5;a:4:{s:3:"cid";s:8:"50023365";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"400电话";s:10:"parent_cid";s:8:"50008907";}i:6;a:4:{s:3:"cid";s:8:"50023366";s:9:"is_parent";s:4:"true";s:4:"name";s:34:"老用户套餐/增值业务办理";s:10:"parent_cid";s:8:"50008907";}i:7;a:4:{s:3:"cid";s:8:"50024820";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"合约购机业务";s:10:"parent_cid";s:8:"50008907";}i:8;a:4:{s:3:"cid";s:8:"50025114";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"新入网手机号套餐";s:10:"parent_cid";s:8:"50008907";}i:9;a:4:{s:3:"cid";s:8:"50025150";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"有线宽带套餐办理";s:10:"parent_cid";s:8:"50008907";}i:10;a:4:{s:3:"cid";s:8:"50025151";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"WIFI热点/无线套餐";s:10:"parent_cid";s:8:"50008907";}i:11;a:4:{s:3:"cid";s:8:"50025626";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"标准套餐库";s:10:"parent_cid";s:8:"50008907";}i:12;a:4:{s:3:"cid";s:8:"50026336";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"老用户预存优惠";s:10:"parent_cid";s:8:"50008907";}}}i:53;a:5:{s:3:"cid";s:2:"99";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"网络游戏点卡";s:10:"parent_cid";s:1:"0";s:4:"subs";a:239:{i:0;a:4:{s:3:"cid";s:8:"50026064";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"A-艾尔之光";s:10:"parent_cid";s:2:"99";}i:1;a:4:{s:3:"cid";s:8:"50007849";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"B-边锋点卡";s:10:"parent_cid";s:2:"99";}i:2;a:4:{s:3:"cid";s:8:"50007396";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"B-霸王点卡";s:10:"parent_cid";s:2:"99";}i:3;a:4:{s:3:"cid";s:8:"50007414";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"B-飚车点卡";s:10:"parent_cid";s:2:"99";}i:4;a:4:{s:3:"cid";s:8:"50026073";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"B-波克城市";s:10:"parent_cid";s:2:"99";}i:5;a:4:{s:3:"cid";s:8:"50024956";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"C-穿越OL点卡";s:10:"parent_cid";s:2:"99";}i:6;a:4:{s:3:"cid";s:8:"50024934";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-春秋外传";s:10:"parent_cid";s:2:"99";}i:7;a:4:{s:3:"cid";s:8:"50007465";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"C-成吉思汗2点卡";s:10:"parent_cid";s:2:"99";}i:8;a:4:{s:3:"cid";s:8:"50007477";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"C-冲锋岛点卡";s:10:"parent_cid";s:2:"99";}i:9;a:4:{s:3:"cid";s:8:"50007456";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"C-彩虹岛点卡";s:10:"parent_cid";s:2:"99";}i:10;a:4:{s:3:"cid";s:8:"50024993";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-宠物王国点卡";s:10:"parent_cid";s:2:"99";}i:11;a:4:{s:3:"cid";s:8:"50026036";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"C-传奇3";s:10:"parent_cid";s:2:"99";}i:12;a:4:{s:3:"cid";s:8:"50007943";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-传奇归来点卡";s:10:"parent_cid";s:2:"99";}i:13;a:4:{s:3:"cid";s:8:"50007883";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-传奇外传点卡";s:10:"parent_cid";s:2:"99";}i:14;a:4:{s:3:"cid";s:8:"50007398";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-传奇世界点卡";s:10:"parent_cid";s:2:"99";}i:15;a:4:{s:3:"cid";s:8:"50007874";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"C-传世群英传点卡";s:10:"parent_cid";s:2:"99";}i:16;a:4:{s:3:"cid";s:8:"50007810";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-赤壁点卡";s:10:"parent_cid";s:2:"99";}i:17;a:4:{s:3:"cid";s:8:"50008021";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-穿越火线点卡";s:10:"parent_cid";s:2:"99";}i:18;a:4:{s:3:"cid";s:8:"50024767";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-创世西游";s:10:"parent_cid";s:2:"99";}i:19;a:4:{s:3:"cid";s:8:"50007822";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"C-CGA浩方点卡";s:10:"parent_cid";s:2:"99";}i:20;a:4:{s:3:"cid";s:8:"50007416";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"C-超级舞者点卡";s:10:"parent_cid";s:2:"99";}i:21;a:4:{s:3:"cid";s:8:"50026037";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-超级跑跑";s:10:"parent_cid";s:2:"99";}i:22;a:4:{s:3:"cid";s:8:"50026040";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-传世无双";s:10:"parent_cid";s:2:"99";}i:23;a:4:{s:3:"cid";s:8:"50007856";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"C-春秋Q传点卡";s:10:"parent_cid";s:2:"99";}i:24;a:4:{s:3:"cid";s:8:"50026056";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"C-苍穹之怒";s:10:"parent_cid";s:2:"99";}i:25;a:4:{s:3:"cid";s:8:"50026436";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"D-第九大陆";s:10:"parent_cid";s:2:"99";}i:26;a:4:{s:3:"cid";s:8:"50024957";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"D- 夺宝传世点卡";s:10:"parent_cid";s:2:"99";}i:27;a:4:{s:3:"cid";s:8:"50024998";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"D-大话水浒点卡";s:10:"parent_cid";s:2:"99";}i:28;a:4:{s:3:"cid";s:8:"50007428";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"D-地下城与勇士点卡";s:10:"parent_cid";s:2:"99";}i:29;a:4:{s:3:"cid";s:8:"50007410";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"D-大话西游2点卡";s:10:"parent_cid";s:2:"99";}i:30;a:4:{s:3:"cid";s:8:"50007413";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"D-刀剑英雄点卡";s:10:"parent_cid";s:2:"99";}i:31;a:4:{s:3:"cid";s:8:"50007420";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"D-大航海时代点卡";s:10:"parent_cid";s:2:"99";}i:32;a:4:{s:3:"cid";s:8:"50007421";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"D-大唐豪侠点卡";s:10:"parent_cid";s:2:"99";}i:33;a:4:{s:3:"cid";s:8:"50008003";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"D-大话西游3点卡";s:10:"parent_cid";s:2:"99";}i:34;a:4:{s:3:"cid";s:8:"50007919";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"D-大海战II点卡";s:10:"parent_cid";s:2:"99";}i:35;a:4:{s:3:"cid";s:8:"50007949";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"D-大话西游之战歌点卡";s:10:"parent_cid";s:2:"99";}i:36;a:4:{s:3:"cid";s:8:"50024996";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"D-大唐豪侠外传点卡";s:10:"parent_cid";s:2:"99";}i:37;a:4:{s:3:"cid";s:8:"50007476";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"D-大唐无双点卡";s:10:"parent_cid";s:2:"99";}i:38;a:4:{s:3:"cid";s:8:"50024931";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"D-大唐英豪";s:10:"parent_cid";s:2:"99";}i:39;a:4:{s:3:"cid";s:8:"50007848";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"D-东邪西毒";s:10:"parent_cid";s:2:"99";}i:40;a:4:{s:3:"cid";s:8:"50007439";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"D-大明龙权点卡";s:10:"parent_cid";s:2:"99";}i:41;a:4:{s:3:"cid";s:8:"50026057";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"D-大话红楼";s:10:"parent_cid";s:2:"99";}i:42;a:4:{s:3:"cid";s:8:"50024968";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"E-恶魔法则点卡";s:10:"parent_cid";s:2:"99";}i:43;a:4:{s:3:"cid";s:8:"50007442";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"E-EVE点卡";s:10:"parent_cid";s:2:"99";}i:44;a:4:{s:3:"cid";s:8:"50126003";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"F-风雷游戏点卡";s:10:"parent_cid";s:2:"99";}i:45;a:4:{s:3:"cid";s:8:"50024935";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"F-封神榜国际版";s:10:"parent_cid";s:2:"99";}i:46;a:4:{s:3:"cid";s:8:"50024936";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"F-封神榜3";s:10:"parent_cid";s:2:"99";}i:47;a:4:{s:3:"cid";s:8:"50024927";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"F-富甲西游";s:10:"parent_cid";s:2:"99";}i:48;a:4:{s:3:"cid";s:8:"50025201";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"F-风暴战区点卡";s:10:"parent_cid";s:2:"99";}i:49;a:4:{s:3:"cid";s:8:"50007443";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"F-风云点卡";s:10:"parent_cid";s:2:"99";}i:50;a:4:{s:3:"cid";s:8:"50007432";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"F-封神榜点卡";s:10:"parent_cid";s:2:"99";}i:51;a:4:{s:3:"cid";s:8:"50007433";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"F-反恐精英OL点卡";s:10:"parent_cid";s:2:"99";}i:52;a:4:{s:3:"cid";s:8:"50024928";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"F-疯狂石头";s:10:"parent_cid";s:2:"99";}i:53;a:4:{s:3:"cid";s:8:"50024932";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"F-反恐行动";s:10:"parent_cid";s:2:"99";}i:54;a:4:{s:3:"cid";s:8:"50024247";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"F-FIFA";s:10:"parent_cid";s:2:"99";}i:55;a:4:{s:3:"cid";s:8:"50026042";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"F-疯狂赛车";s:10:"parent_cid";s:2:"99";}i:56;a:4:{s:3:"cid";s:8:"50026038";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"G-功夫小子";s:10:"parent_cid";s:2:"99";}i:57;a:4:{s:3:"cid";s:8:"50024804";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"G-功夫派";s:10:"parent_cid";s:2:"99";}i:58;a:4:{s:3:"cid";s:8:"50007445";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"GT劲舞团2点卡";s:10:"parent_cid";s:2:"99";}i:59;a:4:{s:3:"cid";s:8:"50024997";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"G-古域点卡";s:10:"parent_cid";s:2:"99";}i:60;a:4:{s:3:"cid";s:8:"50007408";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"G-鬼吹灯外传点卡";s:10:"parent_cid";s:2:"99";}i:61;a:4:{s:3:"cid";s:8:"50024967";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"H-幻魔之眼点卡";s:10:"parent_cid";s:2:"99";}i:62;a:4:{s:3:"cid";s:8:"50007805";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"H-黄金岛点卡";s:10:"parent_cid";s:2:"99";}i:63;a:4:{s:3:"cid";s:8:"50007440";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"H-海盗王点卡";s:10:"parent_cid";s:2:"99";}i:64;a:4:{s:3:"cid";s:8:"50007399";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"H-华夏2点卡";s:10:"parent_cid";s:2:"99";}i:65;a:4:{s:3:"cid";s:8:"50026066";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"H-黄金国度";s:10:"parent_cid";s:2:"99";}i:66;a:4:{s:3:"cid";s:8:"50024994";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"I-iTown点卡";s:10:"parent_cid";s:2:"99";}i:67;a:4:{s:3:"cid";s:8:"50026659";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-九阴真经点卡";s:10:"parent_cid";s:2:"99";}i:68;a:4:{s:3:"cid";s:8:"50024965";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-决战双城点卡";s:10:"parent_cid";s:2:"99";}i:69;a:4:{s:3:"cid";s:8:"50024992";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-精灵传说点卡";s:10:"parent_cid";s:2:"99";}i:70;a:4:{s:3:"cid";s:8:"50024699";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"J-剑灵·诀点卡";s:10:"parent_cid";s:2:"99";}i:71;a:4:{s:3:"cid";s:8:"50007435";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"J-劲舞团点卡";s:10:"parent_cid";s:2:"99";}i:72;a:4:{s:3:"cid";s:8:"50007438";s:9:"is_parent";s:5:"false";s:4:"name";s:30:"J-剑侠情缘网络版3点卡";s:10:"parent_cid";s:2:"99";}i:73;a:4:{s:3:"cid";s:8:"50007405";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"J-剑侠情缘2点卡";s:10:"parent_cid";s:2:"99";}i:74;a:4:{s:3:"cid";s:8:"50007426";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-剑侠世界点卡";s:10:"parent_cid";s:2:"99";}i:75;a:4:{s:3:"cid";s:8:"50007370";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-街头篮球点卡";s:10:"parent_cid";s:2:"99";}i:76;a:4:{s:3:"cid";s:8:"50007955";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"J-剑侠情缘网络版点卡";s:10:"parent_cid";s:2:"99";}i:77;a:4:{s:3:"cid";s:8:"50007409";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-惊天动地点卡";s:10:"parent_cid";s:2:"99";}i:78;a:4:{s:3:"cid";s:8:"50007417";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"J-巨人点卡";s:10:"parent_cid";s:2:"99";}i:79;a:4:{s:3:"cid";s:8:"50026059";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"J-九鼎传说";s:10:"parent_cid";s:2:"99";}i:80;a:4:{s:3:"cid";s:8:"50026062";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"J-剑仙";s:10:"parent_cid";s:2:"99";}i:81;a:4:{s:3:"cid";s:8:"50007359";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"K-口袋西游点卡";s:10:"parent_cid";s:2:"99";}i:82;a:4:{s:3:"cid";s:8:"50024848";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"K-抗战2";s:10:"parent_cid";s:2:"99";}i:83;a:4:{s:3:"cid";s:8:"50007931";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"K-抗战英雄传点卡";s:10:"parent_cid";s:2:"99";}i:84;a:4:{s:3:"cid";s:8:"50024809";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"L-鹿鼎记";s:10:"parent_cid";s:2:"99";}i:85;a:4:{s:3:"cid";s:8:"50025200";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"L-洛奇英雄传点卡";s:10:"parent_cid";s:2:"99";}i:86;a:4:{s:3:"cid";s:8:"50024995";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"L-篮球也疯狂点卡";s:10:"parent_cid";s:2:"99";}i:87;a:4:{s:3:"cid";s:8:"50007937";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"L-龙之谷点卡";s:10:"parent_cid";s:2:"99";}i:88;a:4:{s:3:"cid";s:8:"50007859";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"L-联众世界点卡";s:10:"parent_cid";s:2:"99";}i:89;a:4:{s:3:"cid";s:8:"50007452";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"L-绿色征途点卡";s:10:"parent_cid";s:2:"99";}i:90;a:4:{s:3:"cid";s:8:"50007464";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"L-龙点卡";s:10:"parent_cid";s:2:"99";}i:91;a:4:{s:3:"cid";s:8:"50007815";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"L-浪漫庄园点卡";s:10:"parent_cid";s:2:"99";}i:92;a:4:{s:3:"cid";s:8:"50007446";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"L-洛奇点卡";s:10:"parent_cid";s:2:"99";}i:93;a:4:{s:3:"cid";s:8:"50026072";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"L-亮剑";s:10:"parent_cid";s:2:"99";}i:94;a:4:{s:3:"cid";s:8:"50024772";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"M-摩尔庄园";s:10:"parent_cid";s:2:"99";}i:95;a:4:{s:3:"cid";s:8:"50024805";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"M-魔法哈奇";s:10:"parent_cid";s:2:"99";}i:96;a:4:{s:3:"cid";s:8:"50024963";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"M-魔界2点卡";s:10:"parent_cid";s:2:"99";}i:97;a:4:{s:3:"cid";s:8:"50025621";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"M-魔域掉钱版";s:10:"parent_cid";s:2:"99";}i:98;a:4:{s:3:"cid";s:8:"50007454";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦幻龙族点卡";s:10:"parent_cid";s:2:"99";}i:99;a:4:{s:3:"cid";s:8:"50007361";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-魔兽世界点卡";s:10:"parent_cid";s:2:"99";}i:100;a:4:{s:3:"cid";s:8:"50007675";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦幻西游点卡";s:10:"parent_cid";s:2:"99";}i:101;a:4:{s:3:"cid";s:8:"50007380";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"M-魔域点卡";s:10:"parent_cid";s:2:"99";}i:102;a:4:{s:3:"cid";s:8:"50007395";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"M-冒险岛点卡";s:10:"parent_cid";s:2:"99";}i:103;a:4:{s:3:"cid";s:8:"50007453";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦幻诛仙点卡";s:10:"parent_cid";s:2:"99";}i:104;a:4:{s:3:"cid";s:8:"50007481";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-魔力宝贝点卡";s:10:"parent_cid";s:2:"99";}i:105;a:4:{s:3:"cid";s:8:"50007470";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦想世界点卡";s:10:"parent_cid";s:2:"99";}i:106;a:4:{s:3:"cid";s:8:"50007973";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦幻国度点卡";s:10:"parent_cid";s:2:"99";}i:107;a:4:{s:3:"cid";s:8:"50007901";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-名将三国点卡";s:10:"parent_cid";s:2:"99";}i:108;a:4:{s:3:"cid";s:8:"50024864";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"M-猫扑一卡通";s:10:"parent_cid";s:2:"99";}i:109;a:4:{s:3:"cid";s:8:"50024865";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"M-冒泡一卡通";s:10:"parent_cid";s:2:"99";}i:110;a:4:{s:3:"cid";s:8:"50007991";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"P-破天一剑点卡";s:10:"parent_cid";s:2:"99";}i:111;a:4:{s:3:"cid";s:8:"50024926";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"P-泡泡游戏";s:10:"parent_cid";s:2:"99";}i:112;a:4:{s:3:"cid";s:8:"50007967";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"P-泡泡堂点卡";s:10:"parent_cid";s:2:"99";}i:113;a:4:{s:3:"cid";s:8:"50007437";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"P-跑跑卡丁车点卡";s:10:"parent_cid";s:2:"99";}i:114;a:4:{s:3:"cid";s:8:"50098008";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-麒麟点卡";s:10:"parent_cid";s:2:"99";}i:115;a:4:{s:3:"cid";s:8:"50114008";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Q-起凡通宝卡";s:10:"parent_cid";s:2:"99";}i:116;a:4:{s:3:"cid";s:8:"50024770";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-倩女幽魂";s:10:"parent_cid";s:2:"99";}i:117;a:4:{s:3:"cid";s:8:"50025320";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"Q-QQ仙侠传";s:10:"parent_cid";s:2:"99";}i:118;a:4:{s:3:"cid";s:8:"50025322";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"Q-七雄争霸点卡";s:10:"parent_cid";s:2:"99";}i:119;a:4:{s:3:"cid";s:8:"50025323";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Q-QQ西游点卡";s:10:"parent_cid";s:2:"99";}i:120;a:4:{s:3:"cid";s:8:"50007462";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"Q-千年3点卡";s:10:"parent_cid";s:2:"99";}i:121;a:4:{s:3:"cid";s:8:"50007450";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Q-QQ飞车点卡";s:10:"parent_cid";s:2:"99";}i:122;a:4:{s:3:"cid";s:8:"50007868";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Q-QQ三国点卡";s:10:"parent_cid";s:2:"99";}i:123;a:4:{s:3:"cid";s:8:"50007792";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-起点点卡";s:10:"parent_cid";s:2:"99";}i:124;a:4:{s:3:"cid";s:8:"50007411";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Q-QQ幻想点卡";s:10:"parent_cid";s:2:"99";}i:125;a:4:{s:3:"cid";s:8:"50007985";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"Q-QQ自由幻想点卡";s:10:"parent_cid";s:2:"99";}i:126;a:4:{s:3:"cid";s:8:"50007400";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-奇迹点卡";s:10:"parent_cid";s:2:"99";}i:127;a:4:{s:3:"cid";s:8:"50007825";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Q-QQ华夏点卡";s:10:"parent_cid";s:2:"99";}i:128;a:4:{s:3:"cid";s:8:"50026067";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-全球使命";s:10:"parent_cid";s:2:"99";}i:129;a:4:{s:3:"cid";s:8:"50024964";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"R-热斗传说点卡";s:10:"parent_cid";s:2:"99";}i:130;a:4:{s:3:"cid";s:8:"50007670";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"R-热血传奇点卡";s:10:"parent_cid";s:2:"99";}i:131;a:4:{s:3:"cid";s:8:"50007368";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"R-热血江湖点卡";s:10:"parent_cid";s:2:"99";}i:132;a:4:{s:3:"cid";s:8:"50007997";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"R-热舞派对II点卡";s:10:"parent_cid";s:2:"99";}i:133;a:4:{s:3:"cid";s:8:"50026034";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"R-热血英豪";s:10:"parent_cid";s:2:"99";}i:134;a:4:{s:3:"cid";s:8:"50026058";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"R-热血战队";s:10:"parent_cid";s:2:"99";}i:135;a:4:{s:3:"cid";s:8:"50024863";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"R-人人一卡通";s:10:"parent_cid";s:2:"99";}i:136;a:4:{s:3:"cid";s:8:"50050224";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-世纪佳缘点卡";s:10:"parent_cid";s:2:"99";}i:137;a:4:{s:3:"cid";s:8:"50024168";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-神魔大陆";s:10:"parent_cid";s:2:"99";}i:138;a:4:{s:3:"cid";s:8:"50024802";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"S-赛尔号";s:10:"parent_cid";s:2:"99";}i:139;a:4:{s:3:"cid";s:8:"50024697";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-神鬼世界";s:10:"parent_cid";s:2:"99";}i:140;a:4:{s:3:"cid";s:8:"50007473";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-兽血沸腾点卡";s:10:"parent_cid";s:2:"99";}i:141;a:4:{s:3:"cid";s:8:"50007447";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-蜀门Online点卡";s:10:"parent_cid";s:2:"99";}i:142;a:4:{s:3:"cid";s:8:"50007467";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-神鬼传奇点卡";s:10:"parent_cid";s:2:"99";}i:143;a:4:{s:3:"cid";s:8:"50007458";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"S-三国群英传点卡";s:10:"parent_cid";s:2:"99";}i:144;a:4:{s:3:"cid";s:8:"50007466";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"SD敢达online点卡";s:10:"parent_cid";s:2:"99";}i:145;a:4:{s:3:"cid";s:8:"50007777";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"S-三国策点卡";s:10:"parent_cid";s:2:"99";}i:146;a:4:{s:3:"cid";s:8:"50007887";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"S-蜀山OL点卡";s:10:"parent_cid";s:2:"99";}i:147;a:4:{s:3:"cid";s:8:"50007407";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-丝路传说点卡";s:10:"parent_cid";s:2:"99";}i:148;a:4:{s:3:"cid";s:8:"50007381";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-神泣点卡";s:10:"parent_cid";s:2:"99";}i:149;a:4:{s:3:"cid";s:8:"50026068";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"S-神话";s:10:"parent_cid";s:2:"99";}i:150;a:4:{s:3:"cid";s:8:"50024930";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-三国天下";s:10:"parent_cid";s:2:"99";}i:151;a:4:{s:3:"cid";s:8:"50026039";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"S-三国杀Online";s:10:"parent_cid";s:2:"99";}i:152;a:4:{s:3:"cid";s:8:"50026063";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-三界奇缘";s:10:"parent_cid";s:2:"99";}i:153;a:4:{s:3:"cid";s:8:"50026069";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-水浒无双";s:10:"parent_cid";s:2:"99";}i:154;a:4:{s:3:"cid";s:8:"50025480";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"T-腾讯绿色征途点卡";s:10:"parent_cid";s:2:"99";}i:155;a:4:{s:3:"cid";s:8:"50025109";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"T-坦克世界点卡";s:10:"parent_cid";s:2:"99";}i:156;a:4:{s:3:"cid";s:8:"50007418";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"T-天龙八部3点卡";s:10:"parent_cid";s:2:"99";}i:157;a:4:{s:3:"cid";s:8:"50007468";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"T-天下叁点卡";s:10:"parent_cid";s:2:"99";}i:158;a:4:{s:3:"cid";s:8:"50007479";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"T-天堂2点卡";s:10:"parent_cid";s:2:"99";}i:159;a:4:{s:3:"cid";s:8:"50008015";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"T-吞食天地点卡";s:10:"parent_cid";s:2:"99";}i:160;a:4:{s:3:"cid";s:8:"50007483";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"T-天骄2点卡";s:10:"parent_cid";s:2:"99";}i:161;a:4:{s:3:"cid";s:8:"50026041";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"T-突击风暴";s:10:"parent_cid";s:2:"99";}i:162;a:4:{s:3:"cid";s:8:"50026070";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"T-天道";s:10:"parent_cid";s:2:"99";}i:163;a:4:{s:3:"cid";s:8:"50007793";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"V-VS竞技平台VIP/点卡";s:10:"parent_cid";s:2:"99";}i:164;a:4:{s:3:"cid";s:8:"50007459";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"W-完美世界国际版点卡";s:10:"parent_cid";s:2:"99";}i:165;a:4:{s:3:"cid";s:8:"50007664";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"W-武林外传点卡";s:10:"parent_cid";s:2:"99";}i:166;a:4:{s:3:"cid";s:8:"50007402";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"W-完美世界点卡";s:10:"parent_cid";s:2:"99";}i:167;a:4:{s:3:"cid";s:8:"50007403";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"W-问道点卡";s:10:"parent_cid";s:2:"99";}i:168;a:4:{s:3:"cid";s:8:"50008027";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"W-舞街区点卡";s:10:"parent_cid";s:2:"99";}i:169;a:4:{s:3:"cid";s:8:"50007925";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"W-武神点卡";s:10:"parent_cid";s:2:"99";}i:170;a:4:{s:3:"cid";s:8:"50026045";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"W-武魂";s:10:"parent_cid";s:2:"99";}i:171;a:4:{s:3:"cid";s:8:"50026065";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"W-万王之王3";s:10:"parent_cid";s:2:"99";}i:172;a:4:{s:3:"cid";s:8:"50025778";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"X-迅雷专区";s:10:"parent_cid";s:2:"99";}i:173;a:4:{s:3:"cid";s:8:"50024937";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"X-剑侠贰外传";s:10:"parent_cid";s:2:"99";}i:174;a:4:{s:3:"cid";s:8:"50025654";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"X-侠客列传点卡";s:10:"parent_cid";s:2:"99";}i:175;a:4:{s:3:"cid";s:8:"50024126";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"X-星辰变";s:10:"parent_cid";s:2:"99";}i:176;a:4:{s:3:"cid";s:8:"50007875";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"X-星际争霸2";s:10:"parent_cid";s:2:"99";}i:177;a:4:{s:3:"cid";s:8:"50026054";s:9:"is_parent";s:5:"false";s:4:"name";s:38:"X-星际Ⅱ《自由之翼》畅玩版";s:10:"parent_cid";s:2:"99";}i:178;a:4:{s:3:"cid";s:8:"50007840";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"X-星尘传说点卡";s:10:"parent_cid";s:2:"99";}i:179;a:4:{s:3:"cid";s:8:"50008034";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"X-（蓝港）西游记点卡";s:10:"parent_cid";s:2:"99";}i:180;a:4:{s:3:"cid";s:8:"50024803";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"X-小花仙";s:10:"parent_cid";s:2:"99";}i:181;a:4:{s:3:"cid";s:8:"50007390";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"X-寻仙点卡";s:10:"parent_cid";s:2:"99";}i:182;a:4:{s:3:"cid";s:8:"50007599";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"X-仙剑OL点卡";s:10:"parent_cid";s:2:"99";}i:183;a:4:{s:3:"cid";s:8:"50007863";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"X-侠义道II点卡";s:10:"parent_cid";s:2:"99";}i:184;a:4:{s:3:"cid";s:8:"50007833";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"X-新浪IGame点卡";s:10:"parent_cid";s:2:"99";}i:185;a:4:{s:3:"cid";s:8:"50007800";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"X-新奇迹世界点卡";s:10:"parent_cid";s:2:"99";}i:186;a:4:{s:3:"cid";s:8:"50007436";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"X-新飞飞点卡";s:10:"parent_cid";s:2:"99";}i:187;a:4:{s:3:"cid";s:8:"50008039";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"X-新英雄年代点卡";s:10:"parent_cid";s:2:"99";}i:188;a:4:{s:3:"cid";s:8:"50023165";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"X-降龙之剑点卡";s:10:"parent_cid";s:2:"99";}i:189;a:4:{s:3:"cid";s:8:"50007961";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"X-仙途点卡";s:10:"parent_cid";s:2:"99";}i:190;a:4:{s:3:"cid";s:8:"50024933";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"X-仙侣奇缘2";s:10:"parent_cid";s:2:"99";}i:191;a:4:{s:3:"cid";s:8:"50026071";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"X-新战国";s:10:"parent_cid";s:2:"99";}i:192;a:4:{s:3:"cid";s:8:"50025062";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Y-佣兵天下";s:10:"parent_cid";s:2:"99";}i:193;a:4:{s:3:"cid";s:8:"50025108";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"Y-英雄联盟点卡";s:10:"parent_cid";s:2:"99";}i:194;a:4:{s:3:"cid";s:8:"50025646";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Y-游戏蜗牛";s:10:"parent_cid";s:2:"99";}i:195;a:4:{s:3:"cid";s:8:"50007385";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"Y-永恒之塔点卡";s:10:"parent_cid";s:2:"99";}i:196;a:4:{s:3:"cid";s:8:"50007471";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"Y-倚天2点卡";s:10:"parent_cid";s:2:"99";}i:197;a:4:{s:3:"cid";s:8:"50024698";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Y-倚天屠龙记";s:10:"parent_cid";s:2:"99";}i:198;a:4:{s:3:"cid";s:8:"50024443";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Y-远征Online";s:10:"parent_cid";s:2:"99";}i:199;a:4:{s:3:"cid";s:8:"50026033";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Y-游戏茶苑";s:10:"parent_cid";s:2:"99";}i:200;a:4:{s:3:"cid";s:8:"50026055";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Y-月影传说";s:10:"parent_cid";s:2:"99";}i:201;a:4:{s:3:"cid";s:8:"50007474";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"Z-征途2S点卡";s:10:"parent_cid";s:2:"99";}i:202;a:4:{s:3:"cid";s:8:"50007979";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"Z-诸侯Online点卡";s:10:"parent_cid";s:2:"99";}i:203;a:4:{s:3:"cid";s:8:"50007372";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Z-征途点卡";s:10:"parent_cid";s:2:"99";}i:204;a:4:{s:3:"cid";s:8:"50007832";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"Z-诛仙前传点卡";s:10:"parent_cid";s:2:"99";}i:205;a:4:{s:3:"cid";s:8:"50008009";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"Z-真三国无双OL点卡";s:10:"parent_cid";s:2:"99";}i:206;a:4:{s:3:"cid";s:8:"50007427";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"Z-征途怀旧版点卡";s:10:"parent_cid";s:2:"99";}i:207;a:4:{s:3:"cid";s:8:"50007841";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"Z-中国游戏中心点卡";s:10:"parent_cid";s:2:"99";}i:208;a:4:{s:3:"cid";s:8:"50007451";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"Z-征途时间版点卡";s:10:"parent_cid";s:2:"99";}i:209;a:4:{s:3:"cid";s:8:"50007377";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Z-征服点卡";s:10:"parent_cid";s:2:"99";}i:210;a:4:{s:3:"cid";s:8:"50024929";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Z-战国风云";s:10:"parent_cid";s:2:"99";}i:211;a:4:{s:3:"cid";s:8:"50024729";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Z-纵横中文网";s:10:"parent_cid";s:2:"99";}i:212;a:4:{s:3:"cid";s:8:"50024771";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"Z-战歌";s:10:"parent_cid";s:2:"99";}i:213;a:4:{s:3:"cid";s:8:"50026043";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"Z-斩魂";s:10:"parent_cid";s:2:"99";}i:214;a:4:{s:3:"cid";s:8:"50025321";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Z-战地之王AVA";s:10:"parent_cid";s:2:"99";}i:215;a:4:{s:3:"cid";s:8:"50026060";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Z-中华英雄";s:10:"parent_cid";s:2:"99";}i:216;a:4:{s:3:"cid";s:8:"50025889";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"激活码/新手包";s:10:"parent_cid";s:2:"99";}i:217;a:4:{s:3:"cid";s:8:"50007913";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"网页游戏点卡";s:10:"parent_cid";s:2:"99";}i:218;a:4:{s:3:"cid";s:8:"50007785";s:9:"is_parent";s:5:"false";s:4:"name";s:39:"网游充值平台（平台加款卡）";s:10:"parent_cid";s:2:"99";}i:219;a:4:{s:3:"cid";s:8:"50007779";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其他游戏点卡";s:10:"parent_cid";s:2:"99";}i:220;a:4:{s:3:"cid";s:8:"50050644";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"Q-奇迹世界2点卡";s:10:"parent_cid";s:2:"99";}i:221;a:4:{s:3:"cid";s:8:"50050645";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"S-神仙传点卡";s:10:"parent_cid";s:2:"99";}i:222;a:4:{s:3:"cid";s:8:"50050646";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-三国战魂点卡";s:10:"parent_cid";s:2:"99";}i:223;a:4:{s:3:"cid";s:8:"50050647";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"W-巫师之怒点卡";s:10:"parent_cid";s:2:"99";}i:224;a:4:{s:3:"cid";s:8:"50050648";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"X-仙侠世界点卡";s:10:"parent_cid";s:2:"99";}i:225;a:4:{s:3:"cid";s:8:"50050649";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"W-万神点卡";s:10:"parent_cid";s:2:"99";}i:226;a:4:{s:3:"cid";s:8:"50102011";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Q-奇虎360币";s:10:"parent_cid";s:2:"99";}i:227;a:4:{s:3:"cid";s:8:"50116005";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"J-九州OL点卡";s:10:"parent_cid";s:2:"99";}i:228;a:4:{s:3:"cid";s:8:"50138001";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"S-圣境传说点卡";s:10:"parent_cid";s:2:"99";}i:229;a:4:{s:3:"cid";s:8:"50202003";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"D-大冒险点卡";s:10:"parent_cid";s:2:"99";}i:230;a:4:{s:3:"cid";s:8:"50192003";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"H-幻想之翼点卡";s:10:"parent_cid";s:2:"99";}i:231;a:4:{s:3:"cid";s:8:"50208004";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"J-绝地反击点卡";s:10:"parent_cid";s:2:"99";}i:232;a:4:{s:3:"cid";s:8:"50196005";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"M-梦幻蜀山点卡";s:10:"parent_cid";s:2:"99";}i:233;a:4:{s:3:"cid";s:8:"50208005";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"Q-秦始皇点卡";s:10:"parent_cid";s:2:"99";}i:234;a:4:{s:3:"cid";s:8:"50206003";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"S-神界点卡";s:10:"parent_cid";s:2:"99";}i:235;a:4:{s:3:"cid";s:8:"50192004";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"X-西游Q记点卡";s:10:"parent_cid";s:2:"99";}i:236;a:4:{s:3:"cid";s:8:"50204002";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"X-希望点卡";s:10:"parent_cid";s:2:"99";}i:237;a:4:{s:3:"cid";s:8:"50208006";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"X-炫舞吧Ⅱ点卡";s:10:"parent_cid";s:2:"99";}i:238;a:4:{s:3:"cid";s:8:"50214001";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"Z-争霸天下";s:10:"parent_cid";s:2:"99";}}}i:54;a:5:{s:3:"cid";s:2:"23";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"古董/邮币/字画/收藏";s:10:"parent_cid";s:1:"0";s:4:"subs";a:29:{i:0;a:4:{s:3:"cid";s:4:"2310";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"钱币";s:10:"parent_cid";s:2:"23";}i:1;a:4:{s:3:"cid";s:4:"2309";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"邮品";s:10:"parent_cid";s:2:"23";}i:2;a:4:{s:3:"cid";s:6:"230101";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"古瓷器";s:10:"parent_cid";s:2:"23";}i:3;a:4:{s:3:"cid";s:8:"50019262";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"古瓷片";s:10:"parent_cid";s:2:"23";}i:4;a:4:{s:3:"cid";s:4:"2301";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"古玩杂项";s:10:"parent_cid";s:2:"23";}i:5;a:4:{s:3:"cid";s:4:"2304";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"古董木艺";s:10:"parent_cid";s:2:"23";}i:6;a:4:{s:3:"cid";s:4:"2317";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"古董钟表";s:10:"parent_cid";s:2:"23";}i:7;a:4:{s:3:"cid";s:8:"50012880";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"中国书画";s:10:"parent_cid";s:2:"23";}i:8;a:4:{s:3:"cid";s:8:"50003583";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"现代紫砂艺术";s:10:"parent_cid";s:2:"23";}i:9;a:4:{s:3:"cid";s:8:"50010104";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"现当代艺术品";s:10:"parent_cid";s:2:"23";}i:10;a:4:{s:3:"cid";s:4:"2305";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"金石篆刻";s:10:"parent_cid";s:2:"23";}i:11;a:4:{s:3:"cid";s:4:"2306";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"奇石/观赏石/矿物晶体";s:10:"parent_cid";s:2:"23";}i:12;a:4:{s:3:"cid";s:6:"230202";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"连环画";s:10:"parent_cid";s:2:"23";}i:13;a:4:{s:3:"cid";s:4:"2303";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"磁卡/卡片";s:10:"parent_cid";s:2:"23";}i:14;a:4:{s:3:"cid";s:4:"2316";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"票证";s:10:"parent_cid";s:2:"23";}i:15;a:4:{s:3:"cid";s:8:"50008719";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"礼品类收藏品";s:10:"parent_cid";s:2:"23";}i:16;a:4:{s:3:"cid";s:4:"2903";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"明星纪念品";s:10:"parent_cid";s:2:"23";}i:17;a:4:{s:3:"cid";s:8:"50001931";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"趣味收藏";s:10:"parent_cid";s:2:"23";}i:18;a:4:{s:3:"cid";s:8:"50008583";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"西洋收藏品";s:10:"parent_cid";s:2:"23";}i:19;a:4:{s:3:"cid";s:8:"50001933";s:9:"is_parent";s:5:"false";s:4:"name";s:28:"可乐系列收藏(作废）";s:10:"parent_cid";s:2:"23";}i:20;a:4:{s:3:"cid";s:8:"50005060";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"收藏品保养/鉴定工具";s:10:"parent_cid";s:2:"23";}i:21;a:4:{s:3:"cid";s:4:"2311";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"其它收藏品";s:10:"parent_cid";s:2:"23";}i:22;a:4:{s:3:"cid";s:8:"50019288";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"文革时期收藏品";s:10:"parent_cid";s:2:"23";}i:23;a:4:{s:3:"cid";s:8:"50019289";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"文房四宝";s:10:"parent_cid";s:2:"23";}i:24;a:4:{s:3:"cid";s:8:"50019292";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"当代仿古工艺品";s:10:"parent_cid";s:2:"23";}i:25;a:4:{s:3:"cid";s:8:"50019293";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"宗教收藏品";s:10:"parent_cid";s:2:"23";}i:26;a:4:{s:3:"cid";s:8:"50019296";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"标牌章";s:10:"parent_cid";s:2:"23";}i:27;a:4:{s:3:"cid";s:8:"50019306";s:9:"is_parent";s:5:"false";s:4:"name";s:33:"收藏知识图书/目录/报刊2";s:10:"parent_cid";s:2:"23";}i:28;a:4:{s:3:"cid";s:8:"50024158";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"玉器";s:10:"parent_cid";s:2:"23";}}}i:55;a:5:{s:3:"cid";s:8:"50007216";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"鲜花速递/花卉仿真/绿植园艺";s:10:"parent_cid";s:1:"0";s:4:"subs";a:14:{i:0;a:4:{s:3:"cid";s:6:"290501";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"鲜花速递(同城)";s:10:"parent_cid";s:8:"50007216";}i:1;a:4:{s:3:"cid";s:8:"50003023";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"卡通花/巧克力花";s:10:"parent_cid";s:8:"50007216";}i:2;a:4:{s:3:"cid";s:8:"50004417";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"鲜果篮(预定与速递)";s:10:"parent_cid";s:8:"50007216";}i:3;a:4:{s:3:"cid";s:8:"50009339";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"婚礼鲜花布置";s:10:"parent_cid";s:8:"50007216";}i:4;a:4:{s:3:"cid";s:8:"50015210";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"商务用花";s:10:"parent_cid";s:8:"50007216";}i:5;a:4:{s:3:"cid";s:8:"50015215";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"追悼/奠仪用花";s:10:"parent_cid";s:8:"50007216";}i:6;a:4:{s:3:"cid";s:8:"50015193";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"仿真花/绿植/蔬果成品";s:10:"parent_cid";s:8:"50007216";}i:7;a:4:{s:3:"cid";s:6:"290503";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"DIY仿真花材料";s:10:"parent_cid";s:8:"50007216";}i:8;a:4:{s:3:"cid";s:8:"50009361";s:9:"is_parent";s:5:"false";s:4:"name";s:27:"花瓶/花器/花盆/花架";s:10:"parent_cid";s:8:"50007216";}i:9;a:4:{s:3:"cid";s:8:"50024878";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"花卉/绿植盆栽";s:10:"parent_cid";s:8:"50007216";}i:10;a:4:{s:3:"cid";s:8:"50024881";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"创意迷你植物";s:10:"parent_cid";s:8:"50007216";}i:11;a:4:{s:3:"cid";s:8:"50007010";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"园艺用品";s:10:"parent_cid";s:8:"50007216";}i:12;a:4:{s:3:"cid";s:8:"50024879";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"花卉/蔬果/草坪种子";s:10:"parent_cid";s:8:"50007216";}i:13;a:4:{s:3:"cid";s:8:"50024880";s:9:"is_parent";s:5:"false";s:4:"name";s:32:"庭院植物/行道树木/果树";s:10:"parent_cid";s:8:"50007216";}}}i:56;a:5:{s:3:"cid";s:8:"50004958";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"移动/联通/电信充值中心";s:10:"parent_cid";s:1:"0";s:4:"subs";a:4:{i:0;a:4:{s:3:"cid";s:6:"150401";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"中国移动充值卡";s:10:"parent_cid";s:8:"50004958";}i:1;a:4:{s:3:"cid";s:6:"150402";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"中国联通充值卡";s:10:"parent_cid";s:8:"50004958";}i:2;a:4:{s:3:"cid";s:8:"50011814";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"电信话费充值卡";s:10:"parent_cid";s:8:"50004958";}i:3;a:4:{s:3:"cid";s:6:"150406";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"固定电话充值卡";s:10:"parent_cid";s:8:"50004958";}}}i:57;a:4:{s:3:"cid";s:8:"50005700";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"品牌手表/流行手表";s:10:"parent_cid";s:1:"0";}i:58;a:5:{s:3:"cid";s:8:"50011740";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"流行男鞋";s:10:"parent_cid";s:1:"0";s:4:"subs";a:7:{i:0;a:4:{s:3:"cid";s:8:"50011745";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"凉鞋";s:10:"parent_cid";s:8:"50011740";}i:1;a:4:{s:3:"cid";s:8:"50011746";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"拖鞋";s:10:"parent_cid";s:8:"50011740";}i:2;a:4:{s:3:"cid";s:8:"50011743";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"靴子";s:10:"parent_cid";s:8:"50011740";}i:3;a:4:{s:3:"cid";s:8:"50011744";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"帆布鞋";s:10:"parent_cid";s:8:"50011740";}i:4;a:4:{s:3:"cid";s:8:"50012906";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"低帮鞋";s:10:"parent_cid";s:8:"50011740";}i:5;a:4:{s:3:"cid";s:8:"50012907";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"高帮鞋";s:10:"parent_cid";s:8:"50011740";}i:6;a:4:{s:3:"cid";s:8:"50012908";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"雨鞋";s:10:"parent_cid";s:8:"50011740";}}}i:59;a:5:{s:3:"cid";s:2:"16";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"女装/女士精品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:25:{i:0;a:4:{s:3:"cid";s:8:"50010850";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"连衣裙";s:10:"parent_cid";s:2:"16";}i:1;a:4:{s:3:"cid";s:8:"50000671";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"T恤";s:10:"parent_cid";s:2:"16";}i:2;a:4:{s:3:"cid";s:6:"162104";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"衬衫";s:10:"parent_cid";s:2:"16";}i:3;a:4:{s:3:"cid";s:4:"1622";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"裤子";s:10:"parent_cid";s:2:"16";}i:4;a:4:{s:3:"cid";s:6:"162205";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"牛仔裤";s:10:"parent_cid";s:2:"16";}i:5;a:4:{s:3:"cid";s:4:"1623";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"半身裙";s:10:"parent_cid";s:2:"16";}i:6;a:4:{s:3:"cid";s:6:"162105";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"小背心/小吊带";s:10:"parent_cid";s:2:"16";}i:7;a:4:{s:3:"cid";s:8:"50013196";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"马夹";s:10:"parent_cid";s:2:"16";}i:8;a:4:{s:3:"cid";s:6:"162116";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"蕾丝衫/雪纺衫";s:10:"parent_cid";s:2:"16";}i:9;a:4:{s:3:"cid";s:8:"50000697";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"毛针织衫";s:10:"parent_cid";s:2:"16";}i:10;a:4:{s:3:"cid";s:8:"50011277";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"短外套";s:10:"parent_cid";s:2:"16";}i:11;a:4:{s:3:"cid";s:8:"50008897";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"西装";s:10:"parent_cid";s:2:"16";}i:12;a:4:{s:3:"cid";s:8:"50008898";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"卫衣/绒衫";s:10:"parent_cid";s:2:"16";}i:13;a:4:{s:3:"cid";s:6:"162103";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"毛衣";s:10:"parent_cid";s:2:"16";}i:14;a:4:{s:3:"cid";s:8:"50008901";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"风衣";s:10:"parent_cid";s:2:"16";}i:15;a:4:{s:3:"cid";s:8:"50013194";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"毛呢外套";s:10:"parent_cid";s:2:"16";}i:16;a:4:{s:3:"cid";s:8:"50008900";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"棉衣/棉服";s:10:"parent_cid";s:2:"16";}i:17;a:4:{s:3:"cid";s:8:"50008899";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"羽绒服";s:10:"parent_cid";s:2:"16";}i:18;a:4:{s:3:"cid";s:8:"50008904";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"皮衣";s:10:"parent_cid";s:2:"16";}i:19;a:4:{s:3:"cid";s:8:"50008905";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"皮草";s:10:"parent_cid";s:2:"16";}i:20;a:4:{s:3:"cid";s:8:"50000852";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"中老年女装";s:10:"parent_cid";s:2:"16";}i:21;a:4:{s:3:"cid";s:4:"1629";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"大码女装";s:10:"parent_cid";s:2:"16";}i:22;a:4:{s:3:"cid";s:4:"1624";s:9:"is_parent";s:4:"true";s:4:"name";s:38:"职业套装/学生校服/工作制服";s:10:"parent_cid";s:2:"16";}i:23;a:4:{s:3:"cid";s:8:"50011404";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"婚纱/旗袍/礼服";s:10:"parent_cid";s:2:"16";}i:24;a:4:{s:3:"cid";s:8:"50008906";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"唐装/民族服装/舞台服装";s:10:"parent_cid";s:2:"16";}}}i:60;a:5:{s:3:"cid";s:8:"50006843";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"女鞋";s:10:"parent_cid";s:1:"0";s:4:"subs";a:7:{i:0;a:4:{s:3:"cid";s:8:"50012027";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"低帮鞋";s:10:"parent_cid";s:8:"50006843";}i:1;a:4:{s:3:"cid";s:8:"50012825";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"高帮鞋";s:10:"parent_cid";s:8:"50006843";}i:2;a:4:{s:3:"cid";s:8:"50012028";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"靴子";s:10:"parent_cid";s:8:"50006843";}i:3;a:4:{s:3:"cid";s:8:"50012032";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"凉鞋";s:10:"parent_cid";s:8:"50006843";}i:4;a:4:{s:3:"cid";s:8:"50012033";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"拖鞋";s:10:"parent_cid";s:8:"50006843";}i:5;a:4:{s:3:"cid";s:8:"50012042";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"帆布鞋";s:10:"parent_cid";s:8:"50006843";}i:6;a:4:{s:3:"cid";s:8:"50012047";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"雨鞋";s:10:"parent_cid";s:8:"50006843";}}}i:61;a:5:{s:3:"cid";s:8:"50006842";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"箱包皮具/热销女包/男包";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50012010";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"包袋";s:10:"parent_cid";s:8:"50006842";}i:1;a:4:{s:3:"cid";s:8:"50012018";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"钱包卡套";s:10:"parent_cid";s:8:"50006842";}i:2;a:4:{s:3:"cid";s:8:"50012019";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"旅行箱";s:10:"parent_cid";s:8:"50006842";}i:3;a:4:{s:3:"cid";s:8:"50026617";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"箱包相关配件";s:10:"parent_cid";s:8:"50006842";}i:4;a:4:{s:3:"cid";s:8:"50050199";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"旅行袋";s:10:"parent_cid";s:8:"50006842";}}}i:62;a:5:{s:3:"cid";s:4:"1625";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"女士内衣/男士内衣/家居服";s:10:"parent_cid";s:1:"0";s:4:"subs";a:25:{i:0;a:4:{s:3:"cid";s:8:"50008881";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"文胸";s:10:"parent_cid";s:4:"1625";}i:1;a:4:{s:3:"cid";s:8:"50008883";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"文胸套装";s:10:"parent_cid";s:4:"1625";}i:2;a:4:{s:3:"cid";s:8:"50008882";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"内裤";s:10:"parent_cid";s:4:"1625";}i:3;a:4:{s:3:"cid";s:8:"50008884";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"塑身美体衣";s:10:"parent_cid";s:4:"1625";}i:4;a:4:{s:3:"cid";s:8:"50012774";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"塑身美体裤";s:10:"parent_cid";s:4:"1625";}i:5;a:4:{s:3:"cid";s:8:"50012775";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"塑身腰封/腰夹";s:10:"parent_cid";s:4:"1625";}i:6;a:4:{s:3:"cid";s:8:"50012776";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"塑身分体套装";s:10:"parent_cid";s:4:"1625";}i:7;a:4:{s:3:"cid";s:8:"50012781";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"塑身连体衣";s:10:"parent_cid";s:4:"1625";}i:8;a:4:{s:3:"cid";s:8:"50008886";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"睡衣上装";s:10:"parent_cid";s:4:"1625";}i:9;a:4:{s:3:"cid";s:8:"50012766";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"睡裤/家居裤";s:10:"parent_cid";s:4:"1625";}i:10;a:4:{s:3:"cid";s:8:"50012771";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"睡裙";s:10:"parent_cid";s:4:"1625";}i:11;a:4:{s:3:"cid";s:8:"50012772";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"睡衣/家居服套装";s:10:"parent_cid";s:4:"1625";}i:12;a:4:{s:3:"cid";s:8:"50012773";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"睡袍/浴袍";s:10:"parent_cid";s:4:"1625";}i:13;a:4:{s:3:"cid";s:8:"50008885";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"保暖上装";s:10:"parent_cid";s:4:"1625";}i:14;a:4:{s:3:"cid";s:8:"50012777";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"保暖裤";s:10:"parent_cid";s:4:"1625";}i:15;a:4:{s:3:"cid";s:8:"50012778";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"保暖套装";s:10:"parent_cid";s:4:"1625";}i:16;a:4:{s:3:"cid";s:8:"50006846";s:9:"is_parent";s:5:"false";s:4:"name";s:33:"短袜/打底袜/丝袜/美腿袜";s:10:"parent_cid";s:4:"1625";}i:17;a:4:{s:3:"cid";s:8:"50010394";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"吊带/背心/T恤";s:10:"parent_cid";s:4:"1625";}i:18;a:4:{s:3:"cid";s:8:"50008888";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"抹胸";s:10:"parent_cid";s:4:"1625";}i:19;a:4:{s:3:"cid";s:8:"50008890";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"肚兜";s:10:"parent_cid";s:4:"1625";}i:20;a:4:{s:3:"cid";s:8:"50008889";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"乳贴";s:10:"parent_cid";s:4:"1625";}i:21;a:4:{s:3:"cid";s:8:"50012784";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"肩带";s:10:"parent_cid";s:4:"1625";}i:22;a:4:{s:3:"cid";s:8:"50012785";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"吊袜带";s:10:"parent_cid";s:4:"1625";}i:23;a:4:{s:3:"cid";s:8:"50012786";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"插片/胸垫";s:10:"parent_cid";s:4:"1625";}i:24;a:4:{s:3:"cid";s:8:"50012787";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"搭扣";s:10:"parent_cid";s:4:"1625";}}}i:63;a:5:{s:3:"cid";s:8:"50010404";s:9:"is_parent";s:4:"true";s:4:"name";s:33:"服饰配件/皮带/帽子/围巾";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50009032";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"腰带/皮带/腰链";s:10:"parent_cid";s:8:"50010404";}i:1;a:4:{s:3:"cid";s:6:"302910";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"帽子";s:10:"parent_cid";s:8:"50010404";}i:2;a:4:{s:3:"cid";s:8:"50007003";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"围巾/丝巾/披肩";s:10:"parent_cid";s:8:"50010404";}i:3;a:4:{s:3:"cid";s:8:"50009578";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"围巾/手套/帽子套件";s:10:"parent_cid";s:8:"50010404";}i:4;a:4:{s:3:"cid";s:8:"50011729";s:9:"is_parent";s:5:"false";s:4:"name";s:26:"运动颈环/手环/指环";s:10:"parent_cid";s:8:"50010404";}i:5;a:4:{s:3:"cid";s:6:"302902";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"领带/领结";s:10:"parent_cid";s:8:"50010404";}i:6;a:4:{s:3:"cid";s:8:"50001248";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"领带夹";s:10:"parent_cid";s:8:"50010404";}i:7;a:4:{s:3:"cid";s:6:"302909";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"袖扣";s:10:"parent_cid";s:8:"50010404";}i:8;a:4:{s:3:"cid";s:6:"164206";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"婚纱礼服配件";s:10:"parent_cid";s:8:"50010404";}i:9;a:4:{s:3:"cid";s:8:"50009037";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"耳套";s:10:"parent_cid";s:8:"50010404";}i:10;a:4:{s:3:"cid";s:8:"50010410";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"手套";s:10:"parent_cid";s:8:"50010404";}i:11;a:4:{s:3:"cid";s:8:"50009035";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"手帕";s:10:"parent_cid";s:8:"50010404";}i:12;a:4:{s:3:"cid";s:8:"50010406";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"鞋包/皮带配件";s:10:"parent_cid";s:8:"50010404";}i:13;a:4:{s:3:"cid";s:8:"50009033";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"制衣面料";s:10:"parent_cid";s:8:"50010404";}i:14;a:4:{s:3:"cid";s:8:"50009047";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他配件";s:10:"parent_cid";s:8:"50010404";}}}i:64;a:5:{s:3:"cid";s:8:"50011397";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"珠宝/钻石/翡翠/黄金";s:10:"parent_cid";s:1:"0";s:4:"subs";a:9:{i:0;a:4:{s:3:"cid";s:8:"50011398";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"钻石";s:10:"parent_cid";s:8:"50011397";}i:1;a:4:{s:3:"cid";s:8:"50011399";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"翡翠";s:10:"parent_cid";s:8:"50011397";}i:2;a:4:{s:3:"cid";s:8:"50011400";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"黄金K金";s:10:"parent_cid";s:8:"50011397";}i:3;a:4:{s:3:"cid";s:8:"50011401";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"铂金/PT";s:10:"parent_cid";s:8:"50011397";}i:4;a:4:{s:3:"cid";s:8:"50013964";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天然珍珠";s:10:"parent_cid";s:8:"50011397";}i:5;a:4:{s:3:"cid";s:8:"50013957";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天然玉石";s:10:"parent_cid";s:8:"50011397";}i:6;a:4:{s:3:"cid";s:8:"50011663";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"专柜swarovski水晶";s:10:"parent_cid";s:8:"50011397";}i:7;a:4:{s:3:"cid";s:8:"50013963";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天然琥珀";s:10:"parent_cid";s:8:"50011397";}i:8;a:4:{s:3:"cid";s:8:"50011402";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"红蓝宝石/贵重宝石";s:10:"parent_cid";s:8:"50011397";}}}i:65;a:5:{s:3:"cid";s:2:"28";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"ZIPPO/瑞士军刀/眼镜";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:4:"2908";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"ZIPPO/芝宝";s:10:"parent_cid";s:2:"28";}i:1;a:4:{s:3:"cid";s:8:"50000467";s:9:"is_parent";s:4:"true";s:4:"name";s:31:"品牌打火机/其它打火机";s:10:"parent_cid";s:2:"28";}i:2;a:4:{s:3:"cid";s:6:"290601";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"瑞士军刀";s:10:"parent_cid";s:2:"28";}i:3;a:4:{s:3:"cid";s:8:"50011894";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"眼镜架";s:10:"parent_cid";s:2:"28";}i:4;a:4:{s:3:"cid";s:8:"50011895";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"眼镜片";s:10:"parent_cid";s:2:"28";}i:5;a:4:{s:3:"cid";s:8:"50011892";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"框架眼镜";s:10:"parent_cid";s:2:"28";}i:6;a:4:{s:3:"cid";s:8:"50010368";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"太阳眼镜";s:10:"parent_cid";s:2:"28";}i:7;a:4:{s:3:"cid";s:8:"50011893";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"功能眼镜";s:10:"parent_cid";s:2:"28";}i:8;a:4:{s:3:"cid";s:8:"50011888";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"眼镜配件、护理剂";s:10:"parent_cid";s:2:"28";}i:9;a:4:{s:3:"cid";s:8:"50011896";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"滴眼液、护眼用品";s:10:"parent_cid";s:2:"28";}i:10;a:4:{s:3:"cid";s:4:"2909";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"烟具";s:10:"parent_cid";s:2:"28";}i:11;a:4:{s:3:"cid";s:8:"50012709";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"酒具";s:10:"parent_cid";s:2:"28";}}}i:66;a:5:{s:3:"cid";s:2:"33";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"书籍/杂志/报纸";s:10:"parent_cid";s:1:"0";s:4:"subs";a:43:{i:0;a:4:{s:3:"cid";s:8:"50004788";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"工业/农业技术";s:10:"parent_cid";s:2:"33";}i:1;a:4:{s:3:"cid";s:8:"50004658";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"历史";s:10:"parent_cid";s:2:"33";}i:2;a:4:{s:3:"cid";s:8:"50004725";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"旅游";s:10:"parent_cid";s:2:"33";}i:3;a:4:{s:3:"cid";s:8:"50003112";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"生活";s:10:"parent_cid";s:2:"33";}i:4;a:4:{s:3:"cid";s:4:"3306";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"计算机/网络";s:10:"parent_cid";s:2:"33";}i:5;a:4:{s:3:"cid";s:4:"3331";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"外语/语言文字";s:10:"parent_cid";s:2:"33";}i:6;a:4:{s:3:"cid";s:8:"50004687";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"经济";s:10:"parent_cid";s:2:"33";}i:7;a:4:{s:3:"cid";s:8:"50004870";s:9:"is_parent";s:4:"true";s:4:"name";s:34:"国外原版书/台版、港版书";s:10:"parent_cid";s:2:"33";}i:8;a:4:{s:3:"cid";s:8:"50011016";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"二手/闲置书";s:10:"parent_cid";s:2:"33";}i:9;a:4:{s:3:"cid";s:8:"50004925";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"传记";s:10:"parent_cid";s:2:"33";}i:10;a:4:{s:3:"cid";s:8:"50004767";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"医学卫生";s:10:"parent_cid";s:2:"33";}i:11;a:4:{s:3:"cid";s:8:"50004835";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"地图/地理";s:10:"parent_cid";s:2:"33";}i:12;a:4:{s:3:"cid";s:8:"50004645";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"娱乐时尚";s:10:"parent_cid";s:2:"33";}i:13;a:4:{s:3:"cid";s:8:"50004621";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"报纸";s:10:"parent_cid";s:2:"33";}i:14;a:4:{s:3:"cid";s:8:"50004893";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"政治军事";s:10:"parent_cid";s:2:"33";}i:15;a:4:{s:3:"cid";s:8:"50010485";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"期刊杂志";s:10:"parent_cid";s:2:"33";}i:16;a:4:{s:3:"cid";s:8:"50004816";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"法律";s:10:"parent_cid";s:2:"33";}i:17;a:4:{s:3:"cid";s:8:"50005715";s:9:"is_parent";s:5:"false";s:4:"name";s:27:"淘宝网开店书籍专区";s:10:"parent_cid";s:2:"33";}i:18;a:4:{s:3:"cid";s:8:"50004620";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"社会科学";s:10:"parent_cid";s:2:"33";}i:19;a:4:{s:3:"cid";s:8:"50004707";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"科普读物";s:10:"parent_cid";s:2:"33";}i:20;a:4:{s:3:"cid";s:8:"50004960";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"培训课程";s:10:"parent_cid";s:2:"33";}i:21;a:4:{s:3:"cid";s:8:"50000072";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"考试/教材/论文";s:10:"parent_cid";s:2:"33";}i:22;a:4:{s:3:"cid";s:8:"50004674";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"小说";s:10:"parent_cid";s:2:"33";}i:23;a:4:{s:3:"cid";s:8:"50004806";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"文化";s:10:"parent_cid";s:2:"33";}i:24;a:4:{s:3:"cid";s:8:"50000063";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"管理";s:10:"parent_cid";s:2:"33";}i:25;a:4:{s:3:"cid";s:8:"50000049";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"自我实现/励志";s:10:"parent_cid";s:2:"33";}i:26;a:4:{s:3:"cid";s:8:"50001965";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"漫画/动漫小说";s:10:"parent_cid";s:2:"33";}i:27;a:4:{s:3:"cid";s:8:"50000177";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"自然科学";s:10:"parent_cid";s:2:"33";}i:28;a:4:{s:3:"cid";s:4:"3334";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"体育运动";s:10:"parent_cid";s:2:"33";}i:29;a:4:{s:3:"cid";s:8:"50000141";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"文学";s:10:"parent_cid";s:2:"33";}i:30;a:4:{s:3:"cid";s:8:"50001378";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"报刊订阅";s:10:"parent_cid";s:2:"33";}i:31;a:4:{s:3:"cid";s:8:"50004743";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"保健/心理类书籍";s:10:"parent_cid";s:2:"33";}i:32;a:4:{s:3:"cid";s:4:"3332";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"工具书/百科全书";s:10:"parent_cid";s:2:"33";}i:33;a:4:{s:3:"cid";s:8:"50000054";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"艺术";s:10:"parent_cid";s:2:"33";}i:34;a:4:{s:3:"cid";s:4:"3338";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"哲学和宗教";s:10:"parent_cid";s:2:"33";}i:35;a:4:{s:3:"cid";s:8:"50010689";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"低于5元专区";s:10:"parent_cid";s:2:"33";}i:36;a:4:{s:3:"cid";s:4:"3314";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"儿童读物/教辅";s:10:"parent_cid";s:2:"33";}i:37;a:4:{s:3:"cid";s:8:"50004849";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"育儿书籍";s:10:"parent_cid";s:2:"33";}i:38;a:4:{s:3:"cid";s:8:"50013002";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"人文社科";s:10:"parent_cid";s:2:"33";}i:39;a:4:{s:3:"cid";s:8:"50026342";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"网络原创";s:10:"parent_cid";s:2:"33";}i:40;a:4:{s:3:"cid";s:8:"50050280";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"心理学";s:10:"parent_cid";s:2:"33";}i:41;a:4:{s:3:"cid";s:8:"50132001";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其他";s:10:"parent_cid";s:2:"33";}i:42;a:4:{s:3:"cid";s:8:"50138006";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"古籍";s:10:"parent_cid";s:2:"33";}}}i:67;a:5:{s:3:"cid";s:2:"34";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"音乐/影视/明星/音像";s:10:"parent_cid";s:1:"0";s:4:"subs";a:9:{i:0;a:4:{s:3:"cid";s:4:"3415";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"音乐CD/DVD";s:10:"parent_cid";s:2:"34";}i:1;a:4:{s:3:"cid";s:8:"50000201";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"电影";s:10:"parent_cid";s:2:"34";}i:2;a:4:{s:3:"cid";s:8:"50003291";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电视剧";s:10:"parent_cid";s:2:"34";}i:3;a:4:{s:3:"cid";s:8:"50005271";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"成人教育音像";s:10:"parent_cid";s:2:"34";}i:4;a:4:{s:3:"cid";s:8:"50003679";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"动画碟";s:10:"parent_cid";s:2:"34";}i:5;a:4:{s:3:"cid";s:8:"50005272";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"生活百科";s:10:"parent_cid";s:2:"34";}i:6;a:4:{s:3:"cid";s:8:"50005273";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"戏曲综艺";s:10:"parent_cid";s:2:"34";}i:7;a:4:{s:3:"cid";s:4:"3412";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:2:"34";}i:8;a:4:{s:3:"cid";s:8:"50011257";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"育儿/儿童教育音像";s:10:"parent_cid";s:2:"34";}}}i:68;a:5:{s:3:"cid";s:8:"50017300";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"乐器/吉他/钢琴/配件";s:10:"parent_cid";s:1:"0";s:4:"subs";a:46:{i:0;a:4:{s:3:"cid";s:8:"50017471";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"吉他-民谣吉他";s:10:"parent_cid";s:8:"50017300";}i:1;a:4:{s:3:"cid";s:8:"50017474";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"吉他-电吉他";s:10:"parent_cid";s:8:"50017300";}i:2;a:4:{s:3:"cid";s:8:"50017472";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"吉他-古典吉他";s:10:"parent_cid";s:8:"50017300";}i:3;a:4:{s:3:"cid";s:8:"50017473";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"吉他-电箱吉他";s:10:"parent_cid";s:8:"50017300";}i:4;a:4:{s:3:"cid";s:8:"50017313";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"吉他配件";s:10:"parent_cid";s:8:"50017300";}i:5;a:4:{s:3:"cid";s:8:"50017477";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"贝司-电贝司";s:10:"parent_cid";s:8:"50017300";}i:6;a:4:{s:3:"cid";s:8:"50017476";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"贝司-木贝司";s:10:"parent_cid";s:8:"50017300";}i:7;a:4:{s:3:"cid";s:8:"50017506";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"小提琴";s:10:"parent_cid";s:8:"50017300";}i:8;a:4:{s:3:"cid";s:8:"50017507";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"中提琴";s:10:"parent_cid";s:8:"50017300";}i:9;a:4:{s:3:"cid";s:8:"50017508";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"大提琴";s:10:"parent_cid";s:8:"50017300";}i:10;a:4:{s:3:"cid";s:8:"50017509";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"低音提琴/倍大提琴";s:10:"parent_cid";s:8:"50017300";}i:11;a:4:{s:3:"cid";s:8:"50017510";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"提琴配件";s:10:"parent_cid";s:8:"50017300";}i:12;a:4:{s:3:"cid";s:8:"50017306";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"古筝";s:10:"parent_cid";s:8:"50017300";}i:13;a:4:{s:3:"cid";s:8:"50017502";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电子琴";s:10:"parent_cid";s:8:"50017300";}i:14;a:4:{s:3:"cid";s:8:"50017503";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"数码钢琴";s:10:"parent_cid";s:8:"50017300";}i:15;a:4:{s:3:"cid";s:8:"50017391";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"京胡";s:10:"parent_cid";s:8:"50017300";}i:16;a:4:{s:3:"cid";s:8:"50017378";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"笛子";s:10:"parent_cid";s:8:"50017300";}i:17;a:4:{s:3:"cid";s:8:"50017316";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"钢琴";s:10:"parent_cid";s:8:"50017300";}i:18;a:4:{s:3:"cid";s:8:"50017661";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"口风琴";s:10:"parent_cid";s:8:"50017300";}i:19;a:4:{s:3:"cid";s:8:"50017367";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"古琴";s:10:"parent_cid";s:8:"50017300";}i:20;a:4:{s:3:"cid";s:8:"50017379";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"箫";s:10:"parent_cid";s:8:"50017300";}i:21;a:4:{s:3:"cid";s:8:"50017393";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"二胡";s:10:"parent_cid";s:8:"50017300";}i:22;a:4:{s:3:"cid";s:8:"50017662";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"手风琴";s:10:"parent_cid";s:8:"50017300";}i:23;a:4:{s:3:"cid";s:8:"50017380";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"葫芦丝";s:10:"parent_cid";s:8:"50017300";}i:24;a:4:{s:3:"cid";s:8:"50017381";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"埙";s:10:"parent_cid";s:8:"50017300";}i:25;a:4:{s:3:"cid";s:8:"50017504";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"电子合成器";s:10:"parent_cid";s:8:"50017300";}i:26;a:4:{s:3:"cid";s:8:"50017505";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"手卷钢琴";s:10:"parent_cid";s:8:"50017300";}i:27;a:4:{s:3:"cid";s:8:"50017664";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"风琴";s:10:"parent_cid";s:8:"50017300";}i:28;a:4:{s:3:"cid";s:8:"50017390";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"陶笛";s:10:"parent_cid";s:8:"50017300";}i:29;a:4:{s:3:"cid";s:8:"50017307";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"口琴";s:10:"parent_cid";s:8:"50017300";}i:30;a:4:{s:3:"cid";s:8:"50017308";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"萨克斯风";s:10:"parent_cid";s:8:"50017300";}i:31;a:4:{s:3:"cid";s:8:"50017325";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"鼓-民族鼓";s:10:"parent_cid";s:8:"50017300";}i:32;a:4:{s:3:"cid";s:8:"50017309";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"鼓-西洋鼓";s:10:"parent_cid";s:8:"50017300";}i:33;a:4:{s:3:"cid";s:8:"50017311";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"MIDI乐器/电脑音乐";s:10:"parent_cid";s:8:"50017300";}i:34;a:4:{s:3:"cid";s:8:"50017322";s:9:"is_parent";s:4:"true";s:4:"name";s:3:"锣";s:10:"parent_cid";s:8:"50017300";}i:35;a:4:{s:3:"cid";s:8:"50017312";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"吉他/贝司";s:10:"parent_cid";s:8:"50017300";}i:36;a:4:{s:3:"cid";s:8:"50017318";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"乐器音箱";s:10:"parent_cid";s:8:"50017300";}i:37;a:4:{s:3:"cid";s:8:"50017319";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"乐器配件";s:10:"parent_cid";s:8:"50017300";}i:38;a:4:{s:3:"cid";s:8:"50017320";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"乐器定制/出租";s:10:"parent_cid";s:8:"50017300";}i:39;a:4:{s:3:"cid";s:8:"50017321";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"儿童玩具乐器";s:10:"parent_cid";s:8:"50017300";}i:40;a:4:{s:3:"cid";s:8:"50017305";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"乐器教材/曲谱";s:10:"parent_cid";s:8:"50017300";}i:41;a:4:{s:3:"cid";s:8:"50017310";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其他西洋乐器";s:10:"parent_cid";s:8:"50017300";}i:42;a:4:{s:3:"cid";s:8:"50017302";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"民族弹拨乐器";s:10:"parent_cid";s:8:"50017300";}i:43;a:4:{s:3:"cid";s:8:"50017303";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"民族吹奏乐器";s:10:"parent_cid";s:8:"50017300";}i:44;a:4:{s:3:"cid";s:8:"50017304";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"民族拉弦乐器";s:10:"parent_cid";s:8:"50017300";}i:45;a:4:{s:3:"cid";s:8:"50017301";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"其他民族乐器";s:10:"parent_cid";s:8:"50017300";}}}i:69;a:5:{s:3:"cid";s:2:"29";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"宠物/宠物食品及用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:23:{i:0;a:4:{s:3:"cid";s:6:"217309";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"狗狗";s:10:"parent_cid";s:2:"29";}i:1;a:4:{s:3:"cid";s:8:"50015380";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"犬主粮";s:10:"parent_cid";s:2:"29";}i:2;a:4:{s:3:"cid";s:8:"50015262";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"狗零食";s:10:"parent_cid";s:2:"29";}i:3;a:4:{s:3:"cid";s:8:"50016383";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"猫咪";s:10:"parent_cid";s:2:"29";}i:4;a:4:{s:3:"cid";s:8:"50023066";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"猫主粮";s:10:"parent_cid";s:2:"29";}i:5;a:4:{s:3:"cid";s:8:"50023067";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"猫零食";s:10:"parent_cid";s:2:"29";}i:6;a:4:{s:3:"cid";s:8:"50015285";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"猫/狗日用品";s:10:"parent_cid";s:2:"29";}i:7;a:4:{s:3:"cid";s:8:"50023206";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"猫/狗美容清洁用品";s:10:"parent_cid";s:2:"29";}i:8;a:4:{s:3:"cid";s:8:"50015288";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"猫/狗保健品";s:10:"parent_cid";s:2:"29";}i:9;a:4:{s:3:"cid";s:8:"50015289";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"猫/狗医疗用品";s:10:"parent_cid";s:2:"29";}i:10;a:4:{s:3:"cid";s:8:"50001739";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"宠物服饰及配件";s:10:"parent_cid";s:2:"29";}i:11;a:4:{s:3:"cid";s:6:"217311";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"猫/狗玩具";s:10:"parent_cid";s:2:"29";}i:12;a:4:{s:3:"cid";s:6:"217312";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"水族世界";s:10:"parent_cid";s:2:"29";}i:13;a:4:{s:3:"cid";s:8:"50015293";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"仓鼠类及其它小宠";s:10:"parent_cid";s:2:"29";}i:14;a:4:{s:3:"cid";s:8:"50015292";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"兔类及其用品";s:10:"parent_cid";s:2:"29";}i:15;a:4:{s:3:"cid";s:8:"50008622";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"爬虫/鸣虫及其用品";s:10:"parent_cid";s:2:"29";}i:16;a:4:{s:3:"cid";s:8:"50008604";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"鸟类及用品";s:10:"parent_cid";s:2:"29";}i:17;a:4:{s:3:"cid";s:8:"50015294";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"马类及其用品";s:10:"parent_cid";s:2:"29";}i:18;a:4:{s:3:"cid";s:8:"50015295";s:9:"is_parent";s:4:"true";s:4:"name";s:36:"美容/寄养/配种/托运等服务";s:10:"parent_cid";s:2:"29";}i:19;a:4:{s:3:"cid";s:6:"217302";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"其它宠物";s:10:"parent_cid";s:2:"29";}i:20;a:4:{s:3:"cid";s:8:"50023028";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"宠物爱心助养/领养";s:10:"parent_cid";s:2:"29";}i:21;a:4:{s:3:"cid";s:8:"50023357";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"畜牧用品";s:10:"parent_cid";s:2:"29";}i:22;a:4:{s:3:"cid";s:8:"50023358";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"宠物附属品";s:10:"parent_cid";s:2:"29";}}}i:70;a:5:{s:3:"cid";s:4:"2813";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"成人用品/避孕/计生用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:6:{i:0;a:4:{s:3:"cid";s:8:"50012829";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"计生用品";s:10:"parent_cid";s:4:"2813";}i:1;a:4:{s:3:"cid";s:8:"50019617";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"男用器具";s:10:"parent_cid";s:4:"2813";}i:2;a:4:{s:3:"cid";s:8:"50019630";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"女用器具";s:10:"parent_cid";s:4:"2813";}i:3;a:4:{s:3:"cid";s:8:"50019641";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"情趣用品";s:10:"parent_cid";s:4:"2813";}i:4;a:4:{s:3:"cid";s:8:"50019651";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"情趣内衣";s:10:"parent_cid";s:4:"2813";}i:5;a:4:{s:3:"cid";s:8:"50020206";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"情趣家具";s:10:"parent_cid";s:4:"2813";}}}i:71;a:5:{s:3:"cid";s:8:"50012029";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运动鞋new";s:10:"parent_cid";s:1:"0";s:4:"subs";a:11:{i:0;a:4:{s:3:"cid";s:8:"50012031";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"篮球鞋";s:10:"parent_cid";s:8:"50012029";}i:1;a:4:{s:3:"cid";s:8:"50012037";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"网球鞋";s:10:"parent_cid";s:8:"50012029";}i:2;a:4:{s:3:"cid";s:8:"50012038";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"足球鞋";s:10:"parent_cid";s:8:"50012029";}i:3;a:4:{s:3:"cid";s:8:"50012036";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"跑步鞋";s:10:"parent_cid";s:8:"50012029";}i:4;a:4:{s:3:"cid";s:8:"50012043";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"板鞋/休闲鞋";s:10:"parent_cid";s:8:"50012029";}i:5;a:4:{s:3:"cid";s:8:"50012044";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"帆布鞋";s:10:"parent_cid";s:8:"50012029";}i:6;a:4:{s:3:"cid";s:8:"50026312";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"童鞋/青少年鞋";s:10:"parent_cid";s:8:"50012029";}i:7;a:4:{s:3:"cid";s:8:"50012041";s:9:"is_parent";s:5:"false";s:4:"name";s:31:"综合训练鞋/室内健身鞋";s:10:"parent_cid";s:8:"50012029";}i:8;a:4:{s:3:"cid";s:8:"50012048";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"运动沙滩鞋/凉鞋";s:10:"parent_cid";s:8:"50012029";}i:9;a:4:{s:3:"cid";s:8:"50012049";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动拖鞋";s:10:"parent_cid";s:8:"50012029";}i:10;a:4:{s:3:"cid";s:8:"50012064";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"其它运动鞋";s:10:"parent_cid";s:8:"50012029";}}}i:72;a:5:{s:3:"cid";s:8:"50013864";s:9:"is_parent";s:4:"true";s:4:"name";s:35:"饰品/流行首饰/时尚饰品新";s:10:"parent_cid";s:1:"0";s:4:"subs";a:14:{i:0;a:4:{s:3:"cid";s:8:"50013865";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"项链";s:10:"parent_cid";s:8:"50013864";}i:1;a:4:{s:3:"cid";s:8:"50013868";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"项坠/吊坠";s:10:"parent_cid";s:8:"50013864";}i:2;a:4:{s:3:"cid";s:8:"50014227";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"耳饰";s:10:"parent_cid";s:8:"50013864";}i:3;a:4:{s:3:"cid";s:8:"50013869";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"手链";s:10:"parent_cid";s:8:"50013864";}i:4;a:4:{s:3:"cid";s:8:"50013870";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"手镯";s:10:"parent_cid";s:8:"50013864";}i:5;a:4:{s:3:"cid";s:8:"50013871";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"脚链";s:10:"parent_cid";s:8:"50013864";}i:6;a:4:{s:3:"cid";s:8:"50013875";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"戒指/指环";s:10:"parent_cid";s:8:"50013864";}i:7;a:4:{s:3:"cid";s:8:"50013876";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"胸针";s:10:"parent_cid";s:8:"50013864";}i:8;a:4:{s:3:"cid";s:8:"50013877";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"摆件";s:10:"parent_cid";s:8:"50013864";}i:9;a:4:{s:3:"cid";s:8:"50013878";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"发饰";s:10:"parent_cid";s:8:"50013864";}i:10;a:4:{s:3:"cid";s:8:"50013879";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"DIY饰品配件";s:10:"parent_cid";s:8:"50013864";}i:11;a:4:{s:3:"cid";s:8:"50013880";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"首饰保养鉴定";s:10:"parent_cid";s:8:"50013864";}i:12;a:4:{s:3:"cid";s:8:"50013881";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"首饰盒/展示架";s:10:"parent_cid";s:8:"50013864";}i:13;a:4:{s:3:"cid";s:8:"50013882";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其它首饰";s:10:"parent_cid";s:8:"50013864";}}}i:73;a:5:{s:3:"cid";s:8:"50018252";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"电子凭证";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:8:"50023712";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"摄影写真";s:10:"parent_cid";s:8:"50018252";}i:1;a:4:{s:3:"cid";s:8:"50018254";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"餐饮美食";s:10:"parent_cid";s:8:"50018252";}i:2;a:4:{s:3:"cid";s:8:"50018627";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"特色礼品";s:10:"parent_cid";s:8:"50018252";}i:3;a:4:{s:3:"cid";s:8:"50019673";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"电影票";s:10:"parent_cid";s:8:"50018252";}i:4;a:4:{s:3:"cid";s:8:"50022994";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"午饭订餐";s:10:"parent_cid";s:8:"50018252";}i:5;a:4:{s:3:"cid";s:8:"50019263";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"景点门票";s:10:"parent_cid";s:8:"50018252";}i:6;a:4:{s:3:"cid";s:8:"50019666";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"本地生活服务";s:10:"parent_cid";s:8:"50018252";}i:7;a:4:{s:3:"cid";s:8:"50023362";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"聚划算团购";s:10:"parent_cid";s:8:"50018252";}i:8;a:4:{s:3:"cid";s:8:"50023864";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"体育赛事/演出";s:10:"parent_cid";s:8:"50018252";}i:9;a:4:{s:3:"cid";s:8:"50024037";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"城市购物/礼品卡";s:10:"parent_cid";s:8:"50018252";}i:10;a:4:{s:3:"cid";s:8:"50025951";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"教育培训";s:10:"parent_cid";s:8:"50018252";}i:11;a:4:{s:3:"cid";s:8:"50050399";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"休闲娱乐";s:10:"parent_cid";s:8:"50018252";}}}i:74;a:5:{s:3:"cid";s:8:"50014442";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"交通票";s:10:"parent_cid";s:1:"0";s:4:"subs";a:26:{i:0;a:4:{s:3:"cid";s:8:"50014443";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"饰品";s:10:"parent_cid";s:8:"50014442";}i:1;a:4:{s:3:"cid";s:8:"50014444";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"家用纺织品";s:10:"parent_cid";s:8:"50014442";}i:2;a:4:{s:3:"cid";s:8:"50014445";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"个人护理用品";s:10:"parent_cid";s:8:"50014442";}i:3;a:4:{s:3:"cid";s:8:"50014446";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"服装";s:10:"parent_cid";s:8:"50014442";}i:4;a:4:{s:3:"cid";s:8:"50014447";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"帽";s:10:"parent_cid";s:8:"50014442";}i:5;a:4:{s:3:"cid";s:8:"50014448";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"文具";s:10:"parent_cid";s:8:"50014442";}i:6;a:4:{s:3:"cid";s:8:"50014449";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"伞具及手杖";s:10:"parent_cid";s:8:"50014442";}i:7;a:4:{s:3:"cid";s:8:"50014450";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"鞋";s:10:"parent_cid";s:8:"50014442";}i:8;a:4:{s:3:"cid";s:8:"50014451";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"眼镜";s:10:"parent_cid";s:8:"50014442";}i:9;a:4:{s:3:"cid";s:8:"50014452";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"电脑外部设备";s:10:"parent_cid";s:8:"50014442";}i:10;a:4:{s:3:"cid";s:8:"50014453";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"贵重物品";s:10:"parent_cid";s:8:"50014442";}i:11;a:4:{s:3:"cid";s:8:"50014454";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"家用玻璃制品";s:10:"parent_cid";s:8:"50014442";}i:12;a:4:{s:3:"cid";s:8:"50014455";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"家用套餐制品";s:10:"parent_cid";s:8:"50014442";}i:13;a:4:{s:3:"cid";s:8:"50014456";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"家用金属制品";s:10:"parent_cid";s:8:"50014442";}i:14;a:4:{s:3:"cid";s:8:"50014457";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"箱包";s:10:"parent_cid";s:8:"50014442";}i:15;a:4:{s:3:"cid";s:8:"50014458";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"玩具";s:10:"parent_cid";s:8:"50014442";}i:16;a:4:{s:3:"cid";s:8:"50014459";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"车";s:10:"parent_cid";s:8:"50014442";}i:17;a:4:{s:3:"cid";s:8:"50014460";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"礼品";s:10:"parent_cid";s:8:"50014442";}i:18;a:4:{s:3:"cid";s:8:"50014461";s:9:"is_parent";s:5:"false";s:4:"name";s:28:"家用塑料/竹草腾制品";s:10:"parent_cid";s:8:"50014442";}i:19;a:4:{s:3:"cid";s:8:"50014462";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动制品";s:10:"parent_cid";s:8:"50014442";}i:20;a:4:{s:3:"cid";s:8:"50014463";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"钟表";s:10:"parent_cid";s:8:"50014442";}i:21;a:4:{s:3:"cid";s:8:"50014464";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"邮票";s:10:"parent_cid";s:8:"50014442";}i:22;a:4:{s:3:"cid";s:8:"50014465";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"门票";s:10:"parent_cid";s:8:"50014442";}i:23;a:4:{s:3:"cid";s:8:"50017815";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"7折团购";s:10:"parent_cid";s:8:"50014442";}i:24;a:4:{s:3:"cid";s:8:"50017814";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"8折团购";s:10:"parent_cid";s:8:"50014442";}i:25;a:4:{s:3:"cid";s:8:"50017816";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"6折团购";s:10:"parent_cid";s:8:"50014442";}}}i:75;a:5:{s:3:"cid";s:8:"50014811";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"网店/网络服务/软件";s:10:"parent_cid";s:1:"0";s:4:"subs";a:13:{i:0;a:4:{s:3:"cid";s:8:"50014850";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"网店服务";s:10:"parent_cid";s:8:"50014811";}i:1;a:4:{s:3:"cid";s:8:"50014851";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"网络服务";s:10:"parent_cid";s:8:"50014811";}i:2;a:4:{s:3:"cid";s:8:"50014852";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"程序/软件开发";s:10:"parent_cid";s:8:"50014811";}i:3;a:4:{s:3:"cid";s:8:"50014853";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"多媒体/摄影/冲印";s:10:"parent_cid";s:8:"50014811";}i:4;a:4:{s:3:"cid";s:8:"50014855";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"物流服务";s:10:"parent_cid";s:8:"50014811";}i:5;a:4:{s:3:"cid";s:8:"50003853";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其它服务";s:10:"parent_cid";s:8:"50014811";}i:6;a:4:{s:3:"cid";s:8:"50014923";s:9:"is_parent";s:4:"true";s:4:"name";s:39:"广告制作/传统印刷/打印/复印";s:10:"parent_cid";s:8:"50014811";}i:7;a:4:{s:3:"cid";s:8:"50003316";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"软件cd-key/序列号";s:10:"parent_cid";s:8:"50014811";}i:8;a:4:{s:3:"cid";s:8:"50014924";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"翻译/文字服务";s:10:"parent_cid";s:8:"50014811";}i:9;a:4:{s:3:"cid";s:8:"50014929";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"商务服务";s:10:"parent_cid";s:8:"50014811";}i:10;a:4:{s:3:"cid";s:8:"50010686";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"电脑软件";s:10:"parent_cid";s:8:"50014811";}i:11;a:4:{s:3:"cid";s:8:"50019286";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"充值平台软件/加款卡";s:10:"parent_cid";s:8:"50014811";}i:12;a:4:{s:3:"cid";s:8:"50019287";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"网络会员卡/付费卡";s:10:"parent_cid";s:8:"50014811";}}}i:76;a:5:{s:3:"cid";s:8:"50016891";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"网游垂直市场根类目";s:10:"parent_cid";s:1:"0";s:4:"subs";a:461:{i:0;a:4:{s:3:"cid";s:8:"50016894";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"2061";s:10:"parent_cid";s:8:"50016891";}i:1;a:4:{s:3:"cid";s:8:"50016908";s:9:"is_parent";s:5:"false";s:4:"name";s:2:"R2";s:10:"parent_cid";s:8:"50016891";}i:2;a:4:{s:3:"cid";s:8:"50016995";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"三国群英传";s:10:"parent_cid";s:8:"50016891";}i:3;a:4:{s:3:"cid";s:8:"50019827";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"功夫世界";s:10:"parent_cid";s:8:"50016891";}i:4;a:4:{s:3:"cid";s:8:"50016892";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"名将三国";s:10:"parent_cid";s:8:"50016891";}i:5;a:4:{s:3:"cid";s:8:"50016967";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"开心";s:10:"parent_cid";s:8:"50016891";}i:6;a:4:{s:3:"cid";s:8:"50016956";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"机战";s:10:"parent_cid";s:8:"50016891";}i:7;a:4:{s:3:"cid";s:8:"50016989";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"泡泡堂";s:10:"parent_cid";s:8:"50016891";}i:8;a:4:{s:3:"cid";s:8:"50017017";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"石器时代2";s:10:"parent_cid";s:8:"50016891";}i:9;a:4:{s:3:"cid";s:8:"50019833";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"神兵传奇";s:10:"parent_cid";s:8:"50016891";}i:10;a:4:{s:3:"cid";s:8:"50024444";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"艾尔之光";s:10:"parent_cid";s:8:"50016891";}i:11;a:4:{s:3:"cid";s:8:"50024674";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ仙境";s:10:"parent_cid";s:8:"50016891";}i:12;a:4:{s:3:"cid";s:8:"50025487";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"三国战魂";s:10:"parent_cid";s:8:"50016891";}i:13;a:4:{s:3:"cid";s:8:"50016957";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑舞江南";s:10:"parent_cid";s:8:"50016891";}i:14;a:4:{s:3:"cid";s:8:"50016940";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"反恐精英OL";s:10:"parent_cid";s:8:"50016891";}i:15;a:4:{s:3:"cid";s:8:"50016968";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"口袋西游";s:10:"parent_cid";s:8:"50016891";}i:16;a:4:{s:3:"cid";s:8:"50016893";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"地下城与勇士";s:10:"parent_cid";s:8:"50016891";}i:17;a:4:{s:3:"cid";s:8:"50016928";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"大海战2";s:10:"parent_cid";s:8:"50016891";}i:18;a:4:{s:3:"cid";s:8:"50017010";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"天堂";s:10:"parent_cid";s:8:"50016891";}i:19;a:4:{s:3:"cid";s:8:"50017019";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"完美世界";s:10:"parent_cid";s:8:"50016891";}i:20;a:4:{s:3:"cid";s:8:"50016915";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"彩虹岛";s:10:"parent_cid";s:8:"50016891";}i:21;a:4:{s:3:"cid";s:8:"50017060";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"战地之王";s:10:"parent_cid";s:8:"50016891";}i:22;a:4:{s:3:"cid";s:8:"50170001";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"时空裂痕";s:10:"parent_cid";s:8:"50016891";}i:23;a:4:{s:3:"cid";s:8:"50016970";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"浪漫庄园";s:10:"parent_cid";s:8:"50016891";}i:24;a:4:{s:3:"cid";s:8:"50019825";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"特种部队";s:10:"parent_cid";s:8:"50016891";}i:25;a:4:{s:3:"cid";s:8:"50017061";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"真·三国无双OL";s:10:"parent_cid";s:8:"50016891";}i:26;a:4:{s:3:"cid";s:8:"50050364";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"神雕侠侣";s:10:"parent_cid";s:8:"50016891";}i:27;a:4:{s:3:"cid";s:8:"50016952";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"航海世纪";s:10:"parent_cid";s:8:"50016891";}i:28;a:4:{s:3:"cid";s:8:"50016916";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"苍天";s:10:"parent_cid";s:8:"50016891";}i:29;a:4:{s:3:"cid";s:8:"50019509";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"蓬莱";s:10:"parent_cid";s:8:"50016891";}i:30;a:4:{s:3:"cid";s:8:"50016910";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"霸王II";s:10:"parent_cid";s:8:"50016891";}i:31;a:4:{s:3:"cid";s:8:"50016950";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"鬼吹灯外传";s:10:"parent_cid";s:8:"50016891";}i:32;a:4:{s:3:"cid";s:8:"50016897";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ华夏";s:10:"parent_cid";s:8:"50016891";}i:33;a:4:{s:3:"cid";s:8:"50016898";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ幻想";s:10:"parent_cid";s:8:"50016891";}i:34;a:4:{s:3:"cid";s:8:"50020135";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"VS游戏竞技平台";s:10:"parent_cid";s:8:"50016891";}i:35;a:4:{s:3:"cid";s:8:"50017020";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"万王之王3";s:10:"parent_cid";s:8:"50016891";}i:36;a:4:{s:3:"cid";s:8:"50050660";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"伏魔者";s:10:"parent_cid";s:8:"50016891";}i:37;a:4:{s:3:"cid";s:8:"50017052";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"倚天Ⅱ自由世界";s:10:"parent_cid";s:8:"50016891";}i:38;a:4:{s:3:"cid";s:8:"50026614";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他游戏";s:10:"parent_cid";s:8:"50016891";}i:39;a:4:{s:3:"cid";s:8:"50016953";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"华夏2";s:10:"parent_cid";s:8:"50016891";}i:40;a:4:{s:3:"cid";s:8:"50019926";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"古域";s:10:"parent_cid";s:8:"50016891";}i:41;a:4:{s:3:"cid";s:8:"50024825";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"地下城守护者OL";s:10:"parent_cid";s:8:"50016891";}i:42;a:4:{s:3:"cid";s:8:"50017029";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"希望OL";s:10:"parent_cid";s:8:"50016891";}i:43;a:4:{s:3:"cid";s:8:"50018306";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"恶魔法则";s:10:"parent_cid";s:8:"50016891";}i:44;a:4:{s:3:"cid";s:8:"50016969";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"昆仑OL";s:10:"parent_cid";s:8:"50016891";}i:45;a:4:{s:3:"cid";s:8:"50050182";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"暗黑纪元";s:10:"parent_cid";s:8:"50016891";}i:46;a:4:{s:3:"cid";s:8:"50017065";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"盛世征途";s:10:"parent_cid";s:8:"50016891";}i:47;a:4:{s:3:"cid";s:8:"50017062";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"真封神";s:10:"parent_cid";s:8:"50016891";}i:48;a:4:{s:3:"cid";s:8:"50016971";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"联众世界";s:10:"parent_cid";s:8:"50016891";}i:49;a:4:{s:3:"cid";s:8:"50017028";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"西游记";s:10:"parent_cid";s:8:"50016891";}i:50;a:4:{s:3:"cid";s:8:"50019796";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"诺亚传说";s:10:"parent_cid";s:8:"50016891";}i:51;a:4:{s:3:"cid";s:8:"50026367";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"逆战";s:10:"parent_cid";s:8:"50016891";}i:52;a:4:{s:3:"cid";s:8:"50023506";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"问道外传";s:10:"parent_cid";s:8:"50016891";}i:53;a:4:{s:3:"cid";s:8:"50016942";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"风云";s:10:"parent_cid";s:8:"50016891";}i:54;a:4:{s:3:"cid";s:8:"50020271";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"飘流幻境";s:10:"parent_cid";s:8:"50016891";}i:55;a:4:{s:3:"cid";s:8:"50050363";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"仙侠世界";s:10:"parent_cid";s:8:"50016891";}i:56;a:4:{s:3:"cid";s:8:"50017030";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"侠义道2";s:10:"parent_cid";s:8:"50016891";}i:57;a:4:{s:3:"cid";s:8:"50050183";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"傲世OL";s:10:"parent_cid";s:8:"50016891";}i:58;a:4:{s:3:"cid";s:8:"50016980";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"冒险岛";s:10:"parent_cid";s:8:"50016891";}i:59;a:4:{s:3:"cid";s:8:"50026479";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"功夫英雄";s:10:"parent_cid";s:8:"50016891";}i:60;a:4:{s:3:"cid";s:8:"50016954";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"华夏免费版";s:10:"parent_cid";s:8:"50016891";}i:61;a:4:{s:3:"cid";s:8:"50017018";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"完美国际";s:10:"parent_cid";s:8:"50016891";}i:62;a:4:{s:3:"cid";s:8:"50017063";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"征服";s:10:"parent_cid";s:8:"50016891";}i:63;a:4:{s:3:"cid";s:8:"50026434";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"恶魔法则3";s:10:"parent_cid";s:8:"50016891";}i:64;a:4:{s:3:"cid";s:8:"50026324";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"抗战2";s:10:"parent_cid";s:8:"50016891";}i:65;a:4:{s:3:"cid";s:8:"50016998";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"神泣";s:10:"parent_cid";s:8:"50016891";}i:66;a:4:{s:3:"cid";s:8:"50017053";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"英雄2";s:10:"parent_cid";s:8:"50016891";}i:67;a:4:{s:3:"cid";s:8:"50018220";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"西游天下";s:10:"parent_cid";s:8:"50016891";}i:68;a:4:{s:3:"cid";s:8:"50017023";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"问道";s:10:"parent_cid";s:8:"50016891";}i:69;a:4:{s:3:"cid";s:8:"50016943";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"风云之问鼎天下";s:10:"parent_cid";s:8:"50016891";}i:70;a:4:{s:3:"cid";s:8:"50020273";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"飘邈之旅2010";s:10:"parent_cid";s:8:"50016891";}i:71;a:4:{s:3:"cid";s:8:"50050360";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"EVE新纪元";s:10:"parent_cid";s:8:"50016891";}i:72;a:4:{s:3:"cid";s:8:"50016902";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ三国";s:10:"parent_cid";s:8:"50016891";}i:73;a:4:{s:3:"cid";s:8:"50016901";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ魔域";s:10:"parent_cid";s:8:"50016891";}i:74;a:4:{s:3:"cid";s:8:"50017031";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"仙剑OL";s:10:"parent_cid";s:8:"50016891";}i:75;a:4:{s:3:"cid";s:8:"50019220";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"倩女幽魂";s:10:"parent_cid";s:8:"50016891";}i:76;a:4:{s:3:"cid";s:8:"50026480";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"光明OL";s:10:"parent_cid";s:8:"50016891";}i:77;a:4:{s:3:"cid";s:8:"50016959";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑侠情缘";s:10:"parent_cid";s:8:"50016891";}i:78;a:4:{s:3:"cid";s:8:"50016958";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"剑侠贰外传";s:10:"parent_cid";s:8:"50016891";}i:79;a:4:{s:3:"cid";s:8:"50017013";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"天子";s:10:"parent_cid";s:8:"50016891";}i:80;a:4:{s:3:"cid";s:8:"50017009";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"天龙八部OL";s:10:"parent_cid";s:8:"50016891";}i:81;a:4:{s:3:"cid";s:8:"50026353";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"开创世纪II";s:10:"parent_cid";s:8:"50016891";}i:82;a:4:{s:3:"cid";s:8:"50016972";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"炼狱2";s:10:"parent_cid";s:8:"50016891";}i:83;a:4:{s:3:"cid";s:8:"50016994";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血江湖";s:10:"parent_cid";s:8:"50016891";}i:84;a:4:{s:3:"cid";s:8:"50017022";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"王者世界";s:10:"parent_cid";s:8:"50016891";}i:85;a:4:{s:3:"cid";s:8:"50016999";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"神兽";s:10:"parent_cid";s:8:"50016891";}i:86;a:4:{s:3:"cid";s:8:"50016997";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"神鬼传奇";s:10:"parent_cid";s:8:"50016891";}i:87;a:4:{s:3:"cid";s:8:"50017054";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"英雄无敌在线";s:10:"parent_cid";s:8:"50016891";}i:88;a:4:{s:3:"cid";s:8:"50016918";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"赤壁";s:10:"parent_cid";s:8:"50016891";}i:89;a:4:{s:3:"cid";s:8:"50025265";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"跑跑卡丁车";s:10:"parent_cid";s:8:"50016891";}i:90;a:4:{s:3:"cid";s:8:"50016913";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"边锋";s:10:"parent_cid";s:8:"50016891";}i:91;a:4:{s:3:"cid";s:8:"50016944";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"风云之武魂传说";s:10:"parent_cid";s:8:"50016891";}i:92;a:4:{s:3:"cid";s:8:"50016973";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"亮剑2";s:10:"parent_cid";s:8:"50016891";}i:93;a:4:{s:3:"cid";s:8:"50019797";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"八仙过海";s:10:"parent_cid";s:8:"50016891";}i:94;a:4:{s:3:"cid";s:8:"50026514";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"功夫西游";s:10:"parent_cid";s:8:"50016891";}i:95;a:4:{s:3:"cid";s:8:"50017012";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"天下3";s:10:"parent_cid";s:8:"50016891";}i:96;a:4:{s:3:"cid";s:8:"50026354";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"抗战英雄传";s:10:"parent_cid";s:8:"50016891";}i:97;a:4:{s:3:"cid";s:8:"50023935";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"桃园";s:10:"parent_cid";s:8:"50016891";}i:98;a:4:{s:3:"cid";s:8:"50019481";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"海之乐章—启航";s:10:"parent_cid";s:8:"50016891";}i:99;a:4:{s:3:"cid";s:8:"50016974";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"烈焰飞雪";s:10:"parent_cid";s:8:"50016891";}i:100;a:4:{s:3:"cid";s:8:"50019485";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热斗传说";s:10:"parent_cid";s:8:"50016891";}i:101;a:4:{s:3:"cid";s:8:"50016993";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血传奇";s:10:"parent_cid";s:8:"50016891";}i:102;a:4:{s:3:"cid";s:8:"50017000";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"生肖传说";s:10:"parent_cid";s:8:"50016891";}i:103;a:4:{s:3:"cid";s:8:"50026368";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"盘古战纪";s:10:"parent_cid";s:8:"50016891";}i:104;a:4:{s:3:"cid";s:8:"50016945";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"风云之雄霸天下";s:10:"parent_cid";s:8:"50016891";}i:105;a:4:{s:3:"cid";s:8:"50016914";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"飚车世界";s:10:"parent_cid";s:8:"50016891";}i:106;a:4:{s:3:"cid";s:8:"50106001";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"光荣使命";s:10:"parent_cid";s:8:"50016891";}i:107;a:4:{s:3:"cid";s:8:"50017056";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"勇者传说";s:10:"parent_cid";s:8:"50016891";}i:108;a:4:{s:3:"cid";s:8:"50019484";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"华夏前传";s:10:"parent_cid";s:8:"50016891";}i:109;a:4:{s:3:"cid";s:8:"50017001";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"圣斗士";s:10:"parent_cid";s:8:"50016891";}i:110;a:4:{s:3:"cid";s:8:"50016946";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"封神榜2";s:10:"parent_cid";s:8:"50016891";}i:111;a:4:{s:3:"cid";s:8:"50026534";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"快乐无双";s:10:"parent_cid";s:8:"50016891";}i:112;a:4:{s:3:"cid";s:8:"50016983";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"梦幻西游";s:10:"parent_cid";s:8:"50016891";}i:113;a:4:{s:3:"cid";s:8:"50020171";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血昆仑";s:10:"parent_cid";s:8:"50016891";}i:114;a:4:{s:3:"cid";s:8:"50019799";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"百年战争";s:10:"parent_cid";s:8:"50016891";}i:115;a:4:{s:3:"cid";s:8:"50017015";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"铁血迷情完美版";s:10:"parent_cid";s:8:"50016891";}i:116;a:4:{s:3:"cid";s:8:"50016985";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"魔力宝贝";s:10:"parent_cid";s:8:"50016891";}i:117;a:4:{s:3:"cid";s:8:"50019824";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"魔界2";s:10:"parent_cid";s:8:"50016891";}i:118;a:4:{s:3:"cid";s:8:"50017033";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"仙途";s:10:"parent_cid";s:8:"50016891";}i:119;a:4:{s:3:"cid";s:8:"50016960";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"剑侠情缘2";s:10:"parent_cid";s:8:"50016891";}i:120;a:4:{s:3:"cid";s:8:"50016931";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"大话西游2";s:10:"parent_cid";s:8:"50016891";}i:121;a:4:{s:3:"cid";s:8:"50016932";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"大话西游3";s:10:"parent_cid";s:8:"50016891";}i:122;a:4:{s:3:"cid";s:8:"50016933";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"大话西游之战歌";s:10:"parent_cid";s:8:"50016891";}i:123;a:4:{s:3:"cid";s:8:"50016947";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"封神榜国际版";s:10:"parent_cid";s:8:"50016891";}i:124;a:4:{s:3:"cid";s:8:"50026559";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"开心大陆";s:10:"parent_cid";s:8:"50016891";}i:125;a:4:{s:3:"cid";s:8:"50017066";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"征途时间版";s:10:"parent_cid";s:8:"50016891";}i:126;a:4:{s:3:"cid";s:8:"50017016";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"投名状OL";s:10:"parent_cid";s:8:"50016891";}i:127;a:4:{s:3:"cid";s:8:"50023329";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血世界";s:10:"parent_cid";s:8:"50016891";}i:128;a:4:{s:3:"cid";s:8:"50017002";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"盛世OL";s:10:"parent_cid";s:8:"50016891";}i:129;a:4:{s:3:"cid";s:8:"50019803";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"红颜";s:10:"parent_cid";s:8:"50016891";}i:130;a:4:{s:3:"cid";s:8:"50017075";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"诸侯";s:10:"parent_cid";s:8:"50016891";}i:131;a:4:{s:3:"cid";s:8:"50017034";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"逍遥传说";s:10:"parent_cid";s:8:"50016891";}i:132;a:4:{s:3:"cid";s:8:"50016975";s:9:"is_parent";s:5:"false";s:4:"name";s:5:"龙OL";s:10:"parent_cid";s:8:"50016891";}i:133;a:4:{s:3:"cid";s:8:"50017802";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"龙之谷";s:10:"parent_cid";s:8:"50016891";}i:134;a:4:{s:3:"cid";s:8:"50017901";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"龙腾世界";s:10:"parent_cid";s:8:"50016891";}i:135;a:4:{s:3:"cid";s:8:"50016906";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"QQ英雄岛";s:10:"parent_cid";s:8:"50016891";}i:136;a:4:{s:3:"cid";s:8:"50016962";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑侠世界";s:10:"parent_cid";s:8:"50016891";}i:137;a:4:{s:3:"cid";s:8:"50016963";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"剑侠世界盛大版";s:10:"parent_cid";s:8:"50016891";}i:138;a:4:{s:3:"cid";s:8:"50016961";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"剑侠情缘3";s:10:"parent_cid";s:8:"50016891";}i:139;a:4:{s:3:"cid";s:8:"50018677";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"剑侠情缘三盛大版";s:10:"parent_cid";s:8:"50016891";}i:140;a:4:{s:3:"cid";s:8:"50017003";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"十二之天貳";s:10:"parent_cid";s:8:"50016891";}i:141;a:4:{s:3:"cid";s:8:"50016990";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"千年3";s:10:"parent_cid";s:8:"50016891";}i:142;a:4:{s:3:"cid";s:8:"50016935";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"大唐豪侠";s:10:"parent_cid";s:8:"50016891";}i:143;a:4:{s:3:"cid";s:8:"50016934";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"大明龙权";s:10:"parent_cid";s:8:"50016891";}i:144;a:4:{s:3:"cid";s:8:"50019224";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"天元";s:10:"parent_cid";s:8:"50016891";}i:145;a:4:{s:3:"cid";s:8:"50016948";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"封神世界";s:10:"parent_cid";s:8:"50016891";}i:146;a:4:{s:3:"cid";s:8:"50016964";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"惊天动地2";s:10:"parent_cid";s:8:"50016891";}i:147;a:4:{s:3:"cid";s:8:"50017035";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新飞飞";s:10:"parent_cid";s:8:"50016891";}i:148;a:4:{s:3:"cid";s:8:"50017026";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"武林群侠传2";s:10:"parent_cid";s:8:"50016891";}i:149;a:4:{s:3:"cid";s:8:"50017055";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"永恒之塔";s:10:"parent_cid";s:8:"50016891";}i:150;a:4:{s:3:"cid";s:8:"50019925";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"海之梦";s:10:"parent_cid";s:8:"50016891";}i:151;a:4:{s:3:"cid";s:8:"50025341";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血战队";s:10:"parent_cid";s:8:"50016891";}i:152;a:4:{s:3:"cid";s:8:"50017024";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"问鼎";s:10:"parent_cid";s:8:"50016891";}i:153;a:4:{s:3:"cid";s:8:"50017058";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"预言OL怀旧版";s:10:"parent_cid";s:8:"50016891";}i:154;a:4:{s:3:"cid";s:8:"50016907";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"QQ自由幻想";s:10:"parent_cid";s:8:"50016891";}i:155;a:4:{s:3:"cid";s:8:"50016921";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"传奇3";s:10:"parent_cid";s:8:"50016891";}i:156;a:4:{s:3:"cid";s:8:"50016923";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"传奇世界2(经典区)";s:10:"parent_cid";s:8:"50016891";}i:157;a:4:{s:3:"cid";s:8:"50016924";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"传奇外传";s:10:"parent_cid";s:8:"50016891";}i:158;a:4:{s:3:"cid";s:8:"50016922";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"传奇归来";s:10:"parent_cid";s:8:"50016891";}i:159;a:4:{s:3:"cid";s:8:"50025642";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"兵王";s:10:"parent_cid";s:8:"50016891";}i:160;a:4:{s:3:"cid";s:8:"50019538";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"天之痕";s:10:"parent_cid";s:8:"50016891";}i:161;a:4:{s:3:"cid";s:8:"50017064";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"征途";s:10:"parent_cid";s:8:"50016891";}i:162;a:4:{s:3:"cid";s:8:"50025641";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"忍者世界";s:10:"parent_cid";s:8:"50016891";}i:163;a:4:{s:3:"cid";s:8:"50016917";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"成吉思汗3";s:10:"parent_cid";s:8:"50016891";}i:164;a:4:{s:3:"cid";s:8:"50018305";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"武神";s:10:"parent_cid";s:8:"50016891";}i:165;a:4:{s:3:"cid";s:8:"50016978";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"洛奇";s:10:"parent_cid";s:8:"50016891";}i:166;a:4:{s:3:"cid";s:8:"50016920";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"穿越火线";s:10:"parent_cid";s:8:"50016891";}i:167;a:4:{s:3:"cid";s:8:"50017069";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"纵横时空";s:10:"parent_cid";s:8:"50016891";}i:168;a:4:{s:3:"cid";s:8:"50019826";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"重返神州";s:10:"parent_cid";s:8:"50016891";}i:169;a:4:{s:3:"cid";s:8:"50017059";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"预言OL经典版";s:10:"parent_cid";s:8:"50016891";}i:170;a:4:{s:3:"cid";s:8:"50018307";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"飞天风云";s:10:"parent_cid";s:8:"50016891";}i:171;a:4:{s:3:"cid";s:8:"50016976";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"鹿鼎记";s:10:"parent_cid";s:8:"50016891";}i:172;a:4:{s:3:"cid";s:8:"50017594";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"中华英雄";s:10:"parent_cid";s:8:"50016891";}i:173;a:4:{s:3:"cid";s:8:"50016937";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"刀剑英雄";s:10:"parent_cid";s:8:"50016891";}i:174;a:4:{s:3:"cid";s:8:"50016925";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"创世西游";s:10:"parent_cid";s:8:"50016891";}i:175;a:4:{s:3:"cid";s:8:"50019792";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"天涯OL";s:10:"parent_cid";s:8:"50016891";}i:176;a:4:{s:3:"cid";s:8:"50017037";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新魔界";s:10:"parent_cid";s:8:"50016891";}i:177;a:4:{s:3:"cid";s:8:"50018676";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"月影传说";s:10:"parent_cid";s:8:"50016891";}i:178;a:4:{s:3:"cid";s:8:"50023942";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"武林至尊";s:10:"parent_cid";s:8:"50016891";}i:179;a:4:{s:3:"cid";s:8:"50026405";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"热血西游";s:10:"parent_cid";s:8:"50016891";}i:180;a:4:{s:3:"cid";s:8:"50026325";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"白蛇传说";s:10:"parent_cid";s:8:"50016891";}i:181;a:4:{s:3:"cid";s:8:"50017068";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"诛仙2";s:10:"parent_cid";s:8:"50016891";}i:182;a:4:{s:3:"cid";s:8:"50016986";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"魔兽世界";s:10:"parent_cid";s:8:"50016891";}i:183;a:4:{s:3:"cid";s:8:"50016988";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"魔域";s:10:"parent_cid";s:8:"50016891";}i:184;a:4:{s:3:"cid";s:8:"50018673";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"魔域(掉钱版)";s:10:"parent_cid";s:8:"50016891";}i:185;a:4:{s:3:"cid";s:8:"50018304";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"九界";s:10:"parent_cid";s:8:"50016891";}i:186;a:4:{s:3:"cid";s:8:"50017073";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"传奇续章";s:10:"parent_cid";s:8:"50016891";}i:187;a:4:{s:3:"cid";s:8:"50024623";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"完美传奇";s:10:"parent_cid";s:8:"50016891";}i:188;a:4:{s:3:"cid";s:8:"50016966";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"巨人";s:10:"parent_cid";s:8:"50016891";}i:189;a:4:{s:3:"cid";s:8:"50017038";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"新破天一剑";s:10:"parent_cid";s:8:"50016891";}i:190;a:4:{s:3:"cid";s:8:"50016926";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"春秋Q传";s:10:"parent_cid";s:8:"50016891";}i:191;a:4:{s:3:"cid";s:8:"50019225";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"梦幻迪士尼";s:10:"parent_cid";s:8:"50016891";}i:192;a:4:{s:3:"cid";s:8:"50026613";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"热舞派对II";s:10:"parent_cid";s:8:"50016891";}i:193;a:4:{s:3:"cid";s:8:"50026326";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"碧雪情天OL";s:10:"parent_cid";s:8:"50016891";}i:194;a:4:{s:3:"cid";s:8:"50016979";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"绿色征途";s:10:"parent_cid";s:8:"50016891";}i:195;a:4:{s:3:"cid";s:8:"50017074";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"绿色征途腾讯版";s:10:"parent_cid";s:8:"50016891";}i:196;a:4:{s:3:"cid";s:8:"50017005";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"蜀门";s:10:"parent_cid";s:8:"50016891";}i:197;a:4:{s:3:"cid";s:8:"50018678";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"远征";s:10:"parent_cid";s:8:"50016891";}i:198;a:4:{s:3:"cid";s:8:"50020232";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"黄易群侠传OL";s:10:"parent_cid";s:8:"50016891";}i:199;a:4:{s:3:"cid";s:8:"50018674";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"QQ幻想世界";s:10:"parent_cid";s:8:"50016891";}i:200;a:4:{s:3:"cid";s:8:"50016977";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"东游记";s:10:"parent_cid";s:8:"50016891";}i:201;a:4:{s:3:"cid";s:8:"50018795";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"勇士OL";s:10:"parent_cid";s:8:"50016891";}i:202;a:4:{s:3:"cid";s:8:"50018796";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"封神榜3";s:10:"parent_cid";s:8:"50016891";}i:203;a:4:{s:3:"cid";s:8:"50020248";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"幻魔之眼";s:10:"parent_cid";s:8:"50016891";}i:204;a:4:{s:3:"cid";s:8:"50017039";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"新奇迹世界";s:10:"parent_cid";s:8:"50016891";}i:205;a:4:{s:3:"cid";s:8:"50016927";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"春秋外传";s:10:"parent_cid";s:8:"50016891";}i:206;a:4:{s:3:"cid";s:8:"50019920";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"桃花源记";s:10:"parent_cid";s:8:"50016891";}i:207;a:4:{s:3:"cid";s:8:"50019791";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"猎国";s:10:"parent_cid";s:8:"50016891";}i:208;a:4:{s:3:"cid";s:8:"50017007";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"蜀山新传";s:10:"parent_cid";s:8:"50016891";}i:209;a:4:{s:3:"cid";s:8:"50018861";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ西游";s:10:"parent_cid";s:8:"50016891";}i:210;a:4:{s:3:"cid";s:8:"50017008";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"丝路传说";s:10:"parent_cid";s:8:"50016891";}i:211;a:4:{s:3:"cid";s:8:"50018310";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"传世群英传";s:10:"parent_cid";s:8:"50016891";}i:212;a:4:{s:3:"cid";s:8:"50019924";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"凡人修仙传";s:10:"parent_cid";s:8:"50016891";}i:213;a:4:{s:3:"cid";s:8:"50023411";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"卓越之剑2";s:10:"parent_cid";s:8:"50016891";}i:214;a:4:{s:3:"cid";s:8:"50020164";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"天道OL";s:10:"parent_cid";s:8:"50016891";}i:215;a:4:{s:3:"cid";s:8:"50019219";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"奇迹";s:10:"parent_cid";s:8:"50016891";}i:216;a:4:{s:3:"cid";s:8:"50019828";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"征途2S";s:10:"parent_cid";s:8:"50016891";}i:217;a:4:{s:3:"cid";s:8:"50018831";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"极光世界";s:10:"parent_cid";s:8:"50016891";}i:218;a:4:{s:3:"cid";s:8:"50019425";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"梦想世界";s:10:"parent_cid";s:8:"50016891";}i:219;a:4:{s:3:"cid";s:8:"50017041";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"武林外传";s:10:"parent_cid";s:8:"50016891";}i:220;a:4:{s:3:"cid";s:8:"50018830";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"英雄年代2";s:10:"parent_cid";s:8:"50016891";}i:221;a:4:{s:3:"cid";s:8:"50019256";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"醉逍遥";s:10:"parent_cid";s:8:"50016891";}i:222;a:4:{s:3:"cid";s:8:"50050200";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"霸刀";s:10:"parent_cid";s:8:"50016891";}i:223;a:4:{s:3:"cid";s:8:"50017004";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"兽血沸腾";s:10:"parent_cid";s:8:"50016891";}i:224;a:4:{s:3:"cid";s:8:"50019493";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"剑仙";s:10:"parent_cid";s:8:"50016891";}i:225;a:4:{s:3:"cid";s:8:"50019429";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"墨香";s:10:"parent_cid";s:8:"50016891";}i:226;a:4:{s:3:"cid";s:8:"50020165";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"天朝OL";s:10:"parent_cid";s:8:"50016891";}i:227;a:4:{s:3:"cid";s:8:"50024148";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"奇迹世界2";s:10:"parent_cid";s:8:"50016891";}i:228;a:4:{s:3:"cid";s:8:"50024991";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"巫师之怒";s:10:"parent_cid";s:8:"50016891";}i:229;a:4:{s:3:"cid";s:8:"50020250";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"幻灵游侠";s:10:"parent_cid";s:8:"50016891";}i:230;a:4:{s:3:"cid";s:8:"50026418";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"战国群雄";s:10:"parent_cid";s:8:"50016891";}i:231;a:4:{s:3:"cid";s:8:"50024044";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"烽火战国";s:10:"parent_cid";s:8:"50016891";}i:232;a:4:{s:3:"cid";s:8:"50018151";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"大唐无双2";s:10:"parent_cid";s:8:"50016891";}i:233;a:4:{s:3:"cid";s:8:"50019443";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"宠物森林";s:10:"parent_cid";s:8:"50016891";}i:234;a:4:{s:3:"cid";s:8:"50025623";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"封神";s:10:"parent_cid";s:8:"50016891";}i:235;a:4:{s:3:"cid";s:8:"50018675";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"弹头奇兵";s:10:"parent_cid";s:8:"50016891";}i:236;a:4:{s:3:"cid";s:8:"50017042";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新侠义道";s:10:"parent_cid";s:8:"50016891";}i:237;a:4:{s:3:"cid";s:8:"50017040";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"新天下无双之火";s:10:"parent_cid";s:8:"50016891";}i:238;a:4:{s:3:"cid";s:8:"50019488";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"梦三国OL";s:10:"parent_cid";s:8:"50016891";}i:239;a:4:{s:3:"cid";s:8:"50025345";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"武魂";s:10:"parent_cid";s:8:"50016891";}i:240;a:4:{s:3:"cid";s:8:"50025343";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"混沌之门";s:10:"parent_cid";s:8:"50016891";}i:241;a:4:{s:3:"cid";s:8:"50023936";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"猎刃";s:10:"parent_cid";s:8:"50016891";}i:242;a:4:{s:3:"cid";s:8:"50025650";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"王者大陆";s:10:"parent_cid";s:8:"50016891";}i:243;a:4:{s:3:"cid";s:8:"50026419";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"真王";s:10:"parent_cid";s:8:"50016891";}i:244;a:4:{s:3:"cid";s:8:"50019226";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"QQ仙侠传";s:10:"parent_cid";s:8:"50016891";}i:245;a:4:{s:3:"cid";s:8:"50019697";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"倾国倾城";s:10:"parent_cid";s:8:"50016891";}i:246;a:4:{s:3:"cid";s:8:"50026319";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"凤舞天骄";s:10:"parent_cid";s:8:"50016891";}i:247;a:4:{s:3:"cid";s:8:"50026521";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"斩魂";s:10:"parent_cid";s:8:"50016891";}i:248;a:4:{s:3:"cid";s:8:"50017043";s:9:"is_parent";s:5:"false";s:4:"name";s:24:"新倚天剑与屠龙刀";s:10:"parent_cid";s:8:"50016891";}i:249;a:4:{s:3:"cid";s:8:"50019491";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"梦幻聊斋";s:10:"parent_cid";s:8:"50016891";}i:250;a:4:{s:3:"cid";s:8:"50026413";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"武林秘籍";s:10:"parent_cid";s:8:"50016891";}i:251;a:4:{s:3:"cid";s:8:"50026320";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"汉武大帝";s:10:"parent_cid";s:8:"50016891";}i:252;a:4:{s:3:"cid";s:8:"50018854";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"独孤九剑";s:10:"parent_cid";s:8:"50016891";}i:253;a:4:{s:3:"cid";s:8:"50017595";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"神魔大陆";s:10:"parent_cid";s:8:"50016891";}i:254;a:4:{s:3:"cid";s:8:"50024149";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"雷电OL";s:10:"parent_cid";s:8:"50016891";}i:255;a:4:{s:3:"cid";s:8:"50018312";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"三国群英传2OL";s:10:"parent_cid";s:8:"50016891";}i:256;a:4:{s:3:"cid";s:8:"50019221";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"东邪西毒";s:10:"parent_cid";s:8:"50016891";}i:257;a:4:{s:3:"cid";s:8:"50020161";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"九阴真经";s:10:"parent_cid";s:8:"50016891";}i:258;a:4:{s:3:"cid";s:8:"50020167";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"九鼎传说";s:10:"parent_cid";s:8:"50016891";}i:259;a:4:{s:3:"cid";s:8:"50023867";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"佣兵天下";s:10:"parent_cid";s:8:"50016891";}i:260;a:4:{s:3:"cid";s:8:"50023402";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"坦克世界";s:10:"parent_cid";s:8:"50016891";}i:261;a:4:{s:3:"cid";s:8:"50019451";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"御龙在天";s:10:"parent_cid";s:8:"50016891";}i:262;a:4:{s:3:"cid";s:8:"50017044";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"新英雄年代";s:10:"parent_cid";s:8:"50016891";}i:263;a:4:{s:3:"cid";s:8:"50026619";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"武易传奇II";s:10:"parent_cid";s:8:"50016891";}i:264;a:4:{s:3:"cid";s:8:"50024163";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"洛奇英雄传";s:10:"parent_cid";s:8:"50016891";}i:265;a:4:{s:3:"cid";s:8:"50023422";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"游戏代练";s:10:"parent_cid";s:8:"50016891";}i:266;a:4:{s:3:"cid";s:8:"50019994";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"苍生OL";s:10:"parent_cid";s:8:"50016891";}i:267;a:4:{s:3:"cid";s:8:"50026599";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"醉八仙";s:10:"parent_cid";s:8:"50016891";}i:268;a:4:{s:3:"cid";s:8:"50026426";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"风暴战区";s:10:"parent_cid";s:8:"50016891";}i:269;a:4:{s:3:"cid";s:8:"50026321";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"黑暗帝国";s:10:"parent_cid";s:8:"50016891";}i:270;a:4:{s:3:"cid";s:8:"50018315";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"SD敢达OL";s:10:"parent_cid";s:8:"50016891";}i:271;a:4:{s:3:"cid";s:8:"50023412";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"倚天屠龙记OL";s:10:"parent_cid";s:8:"50016891";}i:272;a:4:{s:3:"cid";s:8:"50020177";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑雨天下";s:10:"parent_cid";s:8:"50016891";}i:273;a:4:{s:3:"cid";s:8:"50026411";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天之炼狱";s:10:"parent_cid";s:8:"50016891";}i:274;a:4:{s:3:"cid";s:8:"50026678";s:9:"is_parent";s:5:"false";s:4:"name";s:5:"战OL";s:10:"parent_cid";s:8:"50016891";}i:275;a:4:{s:3:"cid";s:8:"50019793";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"梦幻问情";s:10:"parent_cid";s:8:"50016891";}i:276;a:4:{s:3:"cid";s:8:"50026664";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"武易";s:10:"parent_cid";s:8:"50016891";}i:277;a:4:{s:3:"cid";s:8:"50026458";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"烽火大唐2";s:10:"parent_cid";s:8:"50016891";}i:278;a:4:{s:3:"cid";s:8:"50026322";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"红途OL";s:10:"parent_cid";s:8:"50016891";}i:279;a:4:{s:3:"cid";s:8:"50025342";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"苍穹之怒";s:10:"parent_cid";s:8:"50016891";}i:280;a:4:{s:3:"cid";s:8:"50023870";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"英雄美人";s:10:"parent_cid";s:8:"50016891";}i:281;a:4:{s:3:"cid";s:8:"50024184";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"雷霆";s:10:"parent_cid";s:8:"50016891";}i:282;a:4:{s:3:"cid";s:8:"50019492";s:9:"is_parent";s:5:"false";s:4:"name";s:16:"魔域(boss 版)";s:10:"parent_cid";s:8:"50016891";}i:283;a:4:{s:3:"cid";s:8:"50025890";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"传世无双";s:10:"parent_cid";s:8:"50016891";}i:284;a:4:{s:3:"cid";s:8:"50024042";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"倚天2外传";s:10:"parent_cid";s:8:"50016891";}i:285;a:4:{s:3:"cid";s:8:"50019921";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"全球使命";s:10:"parent_cid";s:8:"50016891";}i:286;a:4:{s:3:"cid";s:8:"50019798";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"十二封印";s:10:"parent_cid";s:8:"50016891";}i:287;a:4:{s:3:"cid";s:8:"50026412";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"天境";s:10:"parent_cid";s:8:"50016891";}i:288;a:4:{s:3:"cid";s:8:"50020169";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"夺宝传世";s:10:"parent_cid";s:8:"50016891";}i:289;a:4:{s:3:"cid";s:8:"50050181";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"战争前线";s:10:"parent_cid";s:8:"50016891";}i:290;a:4:{s:3:"cid";s:8:"50026515";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"核金风暴";s:10:"parent_cid";s:8:"50016891";}i:291;a:4:{s:3:"cid";s:8:"50026665";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"武侠无双";s:10:"parent_cid";s:8:"50016891";}i:292;a:4:{s:3:"cid";s:8:"50026459";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"风之谷";s:10:"parent_cid";s:8:"50016891";}i:293;a:4:{s:3:"cid";s:8:"50025266";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ飞车";s:10:"parent_cid";s:8:"50016891";}i:294;a:4:{s:3:"cid";s:8:"50026327";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"传说OL";s:10:"parent_cid";s:8:"50016891";}i:295;a:4:{s:3:"cid";s:8:"50019800";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"十虎";s:10:"parent_cid";s:8:"50016891";}i:296;a:4:{s:3:"cid";s:8:"50026516";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"后宫计";s:10:"parent_cid";s:8:"50016891";}i:297;a:4:{s:3:"cid";s:8:"50026615";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"天翼决";s:10:"parent_cid";s:8:"50016891";}i:298;a:4:{s:3:"cid";s:8:"50026478";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"富甲西游";s:10:"parent_cid";s:8:"50016891";}i:299;a:4:{s:3:"cid";s:8:"50017047";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"星尘传说";s:10:"parent_cid";s:8:"50016891";}i:300;a:4:{s:3:"cid";s:8:"50020162";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"梦想岛";s:10:"parent_cid";s:8:"50016891";}i:301;a:4:{s:3:"cid";s:8:"50025625";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"流星蝴蝶剑OL";s:10:"parent_cid";s:8:"50016891";}i:302;a:4:{s:3:"cid";s:8:"50026177";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"猎天";s:10:"parent_cid";s:8:"50016891";}i:303;a:4:{s:3:"cid";s:8:"50024045";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"精灵传说";s:10:"parent_cid";s:8:"50016891";}i:304;a:4:{s:3:"cid";s:8:"50026355";s:9:"is_parent";s:5:"false";s:4:"name";s:5:"LUNA2";s:10:"parent_cid";s:8:"50016891";}i:305;a:4:{s:3:"cid";s:8:"50025643";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ炫舞";s:10:"parent_cid";s:8:"50016891";}i:306;a:4:{s:3:"cid";s:8:"50026616";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天外飞仙";s:10:"parent_cid";s:8:"50016891";}i:307;a:4:{s:3:"cid";s:8:"50017048";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"星空战记";s:10:"parent_cid";s:8:"50016891";}i:308;a:4:{s:3:"cid";s:8:"50026417";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"月光宝盒";s:10:"parent_cid";s:8:"50016891";}i:309;a:4:{s:3:"cid";s:8:"50020166";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"梦幻群侠传";s:10:"parent_cid";s:8:"50016891";}i:310;a:4:{s:3:"cid";s:8:"50026430";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"沧海";s:10:"parent_cid";s:8:"50016891";}i:311;a:4:{s:3:"cid";s:8:"50026517";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"洪荒";s:10:"parent_cid";s:8:"50016891";}i:312;a:4:{s:3:"cid";s:8:"50019801";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"神武";s:10:"parent_cid";s:8:"50016891";}i:313;a:4:{s:3:"cid";s:8:"50024575";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"聚仙";s:10:"parent_cid";s:8:"50016891";}i:314;a:4:{s:3:"cid";s:8:"50024608";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"英雄联盟";s:10:"parent_cid";s:8:"50016891";}i:315;a:4:{s:3:"cid";s:8:"50050563";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"风云传奇";s:10:"parent_cid";s:8:"50016891";}i:316;a:4:{s:3:"cid";s:8:"50024814";s:9:"is_parent";s:5:"false";s:4:"name";s:4:"JR01";s:10:"parent_cid";s:8:"50016891";}i:317;a:4:{s:3:"cid";s:8:"50025950";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"QQ增值服务";s:10:"parent_cid";s:8:"50016891";}i:318;a:4:{s:3:"cid";s:8:"50025799";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ音速";s:10:"parent_cid";s:8:"50016891";}i:319;a:4:{s:3:"cid";s:8:"50019919";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"三界奇缘";s:10:"parent_cid";s:8:"50016891";}i:320;a:4:{s:3:"cid";s:8:"50050568";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"反恐行动(MAT)";s:10:"parent_cid";s:8:"50016891";}i:321;a:4:{s:3:"cid";s:8:"50026660";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天之游侠";s:10:"parent_cid";s:8:"50016891";}i:322;a:4:{s:3:"cid";s:8:"50026524";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"海魂";s:10:"parent_cid";s:8:"50016891";}i:323;a:4:{s:3:"cid";s:8:"50026606";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"超级跑跑";s:10:"parent_cid";s:8:"50016891";}i:324;a:4:{s:3:"cid";s:8:"50026356";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"龙纹";s:10:"parent_cid";s:8:"50016891";}i:325;a:4:{s:3:"cid";s:8:"50026562";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"一卡通充值";s:10:"parent_cid";s:8:"50016891";}i:326;a:4:{s:3:"cid";s:8:"50026404";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"七雄争霸";s:10:"parent_cid";s:8:"50016891";}i:327;a:4:{s:3:"cid";s:8:"50019927";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"上古世界";s:10:"parent_cid";s:8:"50016891";}i:328;a:4:{s:3:"cid";s:8:"50026620";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"亚瑟王之剑";s:10:"parent_cid";s:8:"50016891";}i:329;a:4:{s:3:"cid";s:8:"50025263";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"劲舞团";s:10:"parent_cid";s:8:"50016891";}i:330;a:4:{s:3:"cid";s:8:"50050204";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"天子传奇";s:10:"parent_cid";s:8:"50016891";}i:331;a:4:{s:3:"cid";s:8:"50026525";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"幻想大陆";s:10:"parent_cid";s:8:"50016891";}i:332;a:4:{s:3:"cid";s:8:"50024165";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"弹弹堂";s:10:"parent_cid";s:8:"50016891";}i:333;a:4:{s:3:"cid";s:8:"50023559";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"第九大陆";s:10:"parent_cid";s:8:"50016891";}i:334;a:4:{s:3:"cid";s:8:"50022990";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"魔神无双";s:10:"parent_cid";s:8:"50016891";}i:335;a:4:{s:3:"cid";s:8:"50026424";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"龙之传奇";s:10:"parent_cid";s:8:"50016891";}i:336;a:4:{s:3:"cid";s:8:"50050205";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"天地劫";s:10:"parent_cid";s:8:"50016891";}i:337;a:4:{s:3:"cid";s:8:"50017049";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"寻仙";s:10:"parent_cid";s:8:"50016891";}i:338;a:4:{s:3:"cid";s:8:"50026526";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"幻兽大陆";s:10:"parent_cid";s:8:"50016891";}i:339;a:4:{s:3:"cid";s:8:"50050562";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"彩虹岛II暴风";s:10:"parent_cid";s:8:"50016891";}i:340;a:4:{s:3:"cid";s:8:"50018301";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"新传奇外传";s:10:"parent_cid";s:8:"50016891";}i:341;a:4:{s:3:"cid";s:8:"50024573";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"梦幻昆仑";s:10:"parent_cid";s:8:"50016891";}i:342;a:4:{s:3:"cid";s:8:"50024205";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"盗墓笔记";s:10:"parent_cid";s:8:"50016891";}i:343;a:4:{s:3:"cid";s:8:"50025264";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"街头篮球";s:10:"parent_cid";s:8:"50016891";}i:344;a:4:{s:3:"cid";s:8:"50018308";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"降龙之剑";s:10:"parent_cid";s:8:"50016891";}i:345;a:4:{s:3:"cid";s:8:"50026560";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"零纪元";s:10:"parent_cid";s:8:"50016891";}i:346;a:4:{s:3:"cid";s:8:"50026427";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"QQ仙灵";s:10:"parent_cid";s:8:"50016891";}i:347;a:4:{s:3:"cid";s:8:"50025619";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"九刃";s:10:"parent_cid";s:8:"50016891";}i:348;a:4:{s:3:"cid";s:8:"50102012";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"传奇归来(国际版)";s:10:"parent_cid";s:8:"50016891";}i:349;a:4:{s:3:"cid";s:8:"50024574";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"大话红楼";s:10:"parent_cid";s:8:"50016891";}i:350;a:4:{s:3:"cid";s:8:"50026561";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"狼烟";s:10:"parent_cid";s:8:"50016891";}i:351;a:4:{s:3:"cid";s:8:"50019995";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"神鬼世界";s:10:"parent_cid";s:8:"50016891";}i:352;a:4:{s:3:"cid";s:8:"50026649";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"秦皇天下";s:10:"parent_cid";s:8:"50016891";}i:353;a:4:{s:3:"cid";s:8:"50050206";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"铁血星球";s:10:"parent_cid";s:8:"50016891";}i:354;a:4:{s:3:"cid";s:8:"50026357";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"魔侠传";s:10:"parent_cid";s:8:"50016891";}i:355;a:4:{s:3:"cid";s:8:"50026662";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"黄易世界";s:10:"parent_cid";s:8:"50016891";}i:356;a:4:{s:3:"cid";s:8:"50026652";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"奇门";s:10:"parent_cid";s:8:"50016891";}i:357;a:4:{s:3:"cid";s:8:"50016951";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新海盗王";s:10:"parent_cid";s:8:"50016891";}i:358;a:4:{s:3:"cid";s:8:"50020163";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"水浒Q传2";s:10:"parent_cid";s:8:"50016891";}i:359;a:4:{s:3:"cid";s:8:"50026566";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"狼队";s:10:"parent_cid";s:8:"50016891";}i:360;a:4:{s:3:"cid";s:8:"50138005";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"画皮2";s:10:"parent_cid";s:8:"50016891";}i:361;a:4:{s:3:"cid";s:8:"50158003";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"通天OL";s:10:"parent_cid";s:8:"50016891";}i:362;a:4:{s:3:"cid";s:8:"50026358";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"魔卡精灵";s:10:"parent_cid";s:8:"50016891";}i:363;a:4:{s:3:"cid";s:8:"50024842";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"刀剑2";s:10:"parent_cid";s:8:"50016891";}i:364;a:4:{s:3:"cid";s:8:"50026661";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"千年之王";s:10:"parent_cid";s:8:"50016891";}i:365;a:4:{s:3:"cid";s:8:"50026323";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"将军令";s:10:"parent_cid";s:8:"50016891";}i:366;a:4:{s:3:"cid";s:8:"50025620";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"帝国文明";s:10:"parent_cid";s:8:"50016891";}i:367;a:4:{s:3:"cid";s:8:"50019217";s:9:"is_parent";s:5:"false";s:4:"name";s:22:"新倚天-王者归来";s:10:"parent_cid";s:8:"50016891";}i:368;a:4:{s:3:"cid";s:8:"50026567";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"烈焰行动";s:10:"parent_cid";s:8:"50016891";}i:369;a:4:{s:3:"cid";s:8:"50026598";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"魔神争霸(天机)";s:10:"parent_cid";s:8:"50016891";}i:370;a:4:{s:3:"cid";s:8:"50060001";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"Q币充值";s:10:"parent_cid";s:8:"50016891";}i:371;a:4:{s:3:"cid";s:8:"50026019";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"东海奇谭";s:10:"parent_cid";s:8:"50016891";}i:372;a:4:{s:3:"cid";s:8:"50212002";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"天骄3";s:10:"parent_cid";s:8:"50016891";}i:373;a:4:{s:3:"cid";s:8:"50050190";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"猎灵";s:10:"parent_cid";s:8:"50016891";}i:374;a:4:{s:3:"cid";s:8:"50020170";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"神话2";s:10:"parent_cid";s:8:"50016891";}i:375;a:4:{s:3:"cid";s:8:"50020272";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"神魔传";s:10:"parent_cid";s:8:"50016891";}i:376;a:4:{s:3:"cid";s:8:"50026529";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"绝对火力";s:10:"parent_cid";s:8:"50016891";}i:377;a:4:{s:3:"cid";s:8:"50026600";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"萌战天下";s:10:"parent_cid";s:8:"50016891";}i:378;a:4:{s:3:"cid";s:8:"50106010";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"QQ炫舞2";s:10:"parent_cid";s:8:"50016891";}i:379;a:4:{s:3:"cid";s:8:"50050191";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"乱世";s:10:"parent_cid";s:8:"50016891";}i:380;a:4:{s:3:"cid";s:8:"50026530";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"决战";s:10:"parent_cid";s:8:"50016891";}i:381;a:4:{s:3:"cid";s:8:"50019482";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新天骄";s:10:"parent_cid";s:8:"50016891";}i:382;a:4:{s:3:"cid";s:8:"50026647";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"魔骑士OL";s:10:"parent_cid";s:8:"50016891";}i:383;a:4:{s:3:"cid";s:8:"50026318";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"东方故事";s:10:"parent_cid";s:8:"50016891";}i:384;a:4:{s:3:"cid";s:8:"50019483";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"仙剑神曲";s:10:"parent_cid";s:8:"50016891";}i:385;a:4:{s:3:"cid";s:8:"50024572";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"神仙传";s:10:"parent_cid";s:8:"50016891";}i:386;a:4:{s:3:"cid";s:8:"50023943";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"神雕OL";s:10:"parent_cid";s:8:"50016891";}i:387;a:4:{s:3:"cid";s:8:"50026531";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"锦衣卫";s:10:"parent_cid";s:8:"50016891";}i:388;a:4:{s:3:"cid";s:8:"50050192";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"零世界";s:10:"parent_cid";s:8:"50016891";}i:389;a:4:{s:3:"cid";s:8:"50026648";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"魔咒2";s:10:"parent_cid";s:8:"50016891";}i:390;a:4:{s:3:"cid";s:8:"50019923";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"侠义世界";s:10:"parent_cid";s:8:"50016891";}i:391;a:4:{s:3:"cid";s:8:"50026532";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑侠传奇";s:10:"parent_cid";s:8:"50016891";}i:392;a:4:{s:3:"cid";s:8:"50026431";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"斗仙";s:10:"parent_cid";s:8:"50016891";}i:393;a:4:{s:3:"cid";s:8:"50026196";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"斗战神";s:10:"parent_cid";s:8:"50016891";}i:394;a:4:{s:3:"cid";s:8:"50025147";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"水浒传OL";s:10:"parent_cid";s:8:"50016891";}i:395;a:4:{s:3:"cid";s:8:"50050201";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"龙剑";s:10:"parent_cid";s:8:"50016891";}i:396;a:4:{s:3:"cid";s:8:"50025267";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"三国策";s:10:"parent_cid";s:8:"50016891";}i:397;a:4:{s:3:"cid";s:8:"50026607";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"九州OL";s:10:"parent_cid";s:8:"50016891";}i:398;a:4:{s:3:"cid";s:8:"50050202";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"密传2";s:10:"parent_cid";s:8:"50016891";}i:399;a:4:{s:3:"cid";s:8:"50016984";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"梦幻诛仙2";s:10:"parent_cid";s:8:"50016891";}i:400;a:4:{s:3:"cid";s:8:"50019993";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"仙侣奇缘2";s:10:"parent_cid";s:8:"50016891";}i:401;a:4:{s:3:"cid";s:8:"50026612";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"剑啸九州";s:10:"parent_cid";s:8:"50016891";}i:402;a:4:{s:3:"cid";s:8:"50026631";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"斗破苍穹";s:10:"parent_cid";s:8:"50016891";}i:403;a:4:{s:3:"cid";s:8:"50019933";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"星辰变";s:10:"parent_cid";s:8:"50016891";}i:404;a:4:{s:3:"cid";s:8:"50050220";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"玛雅战纪";s:10:"parent_cid";s:8:"50016891";}i:405;a:4:{s:3:"cid";s:8:"50025340";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"隋唐演义OL";s:10:"parent_cid";s:8:"50016891";}i:406;a:4:{s:3:"cid";s:8:"50050219";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"黎明之光";s:10:"parent_cid";s:8:"50016891";}i:407;a:4:{s:3:"cid";s:8:"50050361";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"兰格利萨战纪";s:10:"parent_cid";s:8:"50016891";}i:408;a:4:{s:3:"cid";s:8:"50050184";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"刀剑笑OL";s:10:"parent_cid";s:8:"50016891";}i:409;a:4:{s:3:"cid";s:8:"50050662";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"剑灵";s:10:"parent_cid";s:8:"50016891";}i:410;a:4:{s:3:"cid";s:8:"50050221";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"梦传说";s:10:"parent_cid";s:8:"50016891";}i:411;a:4:{s:3:"cid";s:8:"50025344";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"水浒无双";s:10:"parent_cid";s:8:"50016891";}i:412;a:4:{s:3:"cid";s:8:"50025486";s:9:"is_parent";s:5:"false";s:4:"name";s:10:"圣斗士2";s:10:"parent_cid";s:8:"50016891";}i:413;a:4:{s:3:"cid";s:8:"50050185";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"大话战国2";s:10:"parent_cid";s:8:"50016891";}i:414;a:4:{s:3:"cid";s:8:"50050225";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"明朝演义";s:10:"parent_cid";s:8:"50016891";}i:415;a:4:{s:3:"cid";s:8:"50060002";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"骏网一卡通";s:10:"parent_cid";s:8:"50016891";}i:416;a:4:{s:3:"cid";s:8:"50136005";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"龙门客栈OL";s:10:"parent_cid";s:8:"50016891";}i:417;a:4:{s:3:"cid";s:8:"50050217";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"大冲锋";s:10:"parent_cid";s:8:"50016891";}i:418;a:4:{s:3:"cid";s:8:"50025763";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"守护之剑";s:10:"parent_cid";s:8:"50016891";}i:419;a:4:{s:3:"cid";s:8:"50144003";s:9:"is_parent";s:5:"false";s:4:"name";s:7:"激战2";s:10:"parent_cid";s:8:"50016891";}i:420;a:4:{s:3:"cid";s:8:"50050226";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"魔狱军团";s:10:"parent_cid";s:8:"50016891";}i:421;a:4:{s:3:"cid";s:8:"50050235";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"命运之轮";s:10:"parent_cid";s:8:"50016891";}i:422;a:4:{s:3:"cid";s:8:"50026020";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"圣域传奇";s:10:"parent_cid";s:8:"50016891";}i:423;a:4:{s:3:"cid";s:8:"50023413";s:9:"is_parent";s:5:"false";s:4:"name";s:14:"星际争霸II";s:10:"parent_cid";s:8:"50016891";}i:424;a:4:{s:3:"cid";s:8:"50050236";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"末日屠龙";s:10:"parent_cid";s:8:"50016891";}i:425;a:4:{s:3:"cid";s:8:"50066001";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"独孤求败";s:10:"parent_cid";s:8:"50016891";}i:426;a:4:{s:3:"cid";s:8:"50023414";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"西游群英传";s:10:"parent_cid";s:8:"50016891";}i:427;a:4:{s:3:"cid";s:8:"50020178";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"轩辕传奇";s:10:"parent_cid";s:8:"50016891";}i:428;a:4:{s:3:"cid";s:8:"50204003";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"大航海时代OL";s:10:"parent_cid";s:8:"50016891";}i:429;a:4:{s:3:"cid";s:8:"50024204";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"小小忍者";s:10:"parent_cid";s:8:"50016891";}i:430;a:4:{s:3:"cid";s:8:"50050541";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"麻辣江湖";s:10:"parent_cid";s:8:"50016891";}i:431;a:4:{s:3:"cid";s:8:"50025892";s:9:"is_parent";s:5:"false";s:4:"name";s:17:"三国杀(盛大)";s:10:"parent_cid";s:8:"50016891";}i:432;a:4:{s:3:"cid";s:8:"50026176";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"圣境传说";s:10:"parent_cid";s:8:"50016891";}i:433;a:4:{s:3:"cid";s:8:"50026406";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"圣道传奇";s:10:"parent_cid";s:8:"50016891";}i:434;a:4:{s:3:"cid";s:8:"50024576";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"玄武";s:10:"parent_cid";s:8:"50016891";}i:435;a:4:{s:3:"cid";s:8:"50026410";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"盛世三国";s:10:"parent_cid";s:8:"50016891";}i:436;a:4:{s:3:"cid";s:8:"50025624";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新鬼吹灯";s:10:"parent_cid";s:8:"50016891";}i:437;a:4:{s:3:"cid";s:8:"50026425";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"蜀山剑侠传";s:10:"parent_cid";s:8:"50016891";}i:438;a:4:{s:3:"cid";s:8:"50026653";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"三界西游";s:10:"parent_cid";s:8:"50016891";}i:439;a:4:{s:3:"cid";s:8:"50018302";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新神界";s:10:"parent_cid";s:8:"50016891";}i:440;a:4:{s:3:"cid";s:8:"50026414";s:9:"is_parent";s:5:"false";s:4:"name";s:8:"仙尘OL";s:10:"parent_cid";s:8:"50016891";}i:441;a:4:{s:3:"cid";s:8:"50026654";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"蜀山神话";s:10:"parent_cid";s:8:"50016891";}i:442;a:4:{s:3:"cid";s:8:"50026415";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"侠客列传";s:10:"parent_cid";s:8:"50016891";}i:443;a:4:{s:3:"cid";s:8:"50026655";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"山海志";s:10:"parent_cid";s:8:"50016891";}i:444;a:4:{s:3:"cid";s:8:"50026435";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"仙门";s:10:"parent_cid";s:8:"50016891";}i:445;a:4:{s:3:"cid";s:8:"50026656";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"圣斗士传说";s:10:"parent_cid";s:8:"50016891";}i:446;a:4:{s:3:"cid";s:8:"50026657";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"圣灵传说";s:10:"parent_cid";s:8:"50016891";}i:447;a:4:{s:3:"cid";s:8:"50026658";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"三国演义";s:10:"parent_cid";s:8:"50016891";}i:448;a:4:{s:3:"cid";s:8:"50026518";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"炫斗之王";s:10:"parent_cid";s:8:"50016891";}i:449;a:4:{s:3:"cid";s:8:"50026605";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"修魔";s:10:"parent_cid";s:8:"50016891";}i:450;a:4:{s:3:"cid";s:8:"50026522";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"新惊天动地";s:10:"parent_cid";s:8:"50016891";}i:451;a:4:{s:3:"cid";s:8:"50026663";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"曙光之城";s:10:"parent_cid";s:8:"50016891";}i:452;a:4:{s:3:"cid";s:8:"50026677";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新蓬莱";s:10:"parent_cid";s:8:"50016891";}i:453;a:4:{s:3:"cid";s:8:"50050193";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"生化战场";s:10:"parent_cid";s:8:"50016891";}i:454;a:4:{s:3:"cid";s:8:"50050344";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"三国风云2";s:10:"parent_cid";s:8:"50016891";}i:455;a:4:{s:3:"cid";s:8:"50050189";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"仙境冒险";s:10:"parent_cid";s:8:"50016891";}i:456;a:4:{s:3:"cid";s:8:"50025647";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"修罗刹";s:10:"parent_cid";s:8:"50016891";}i:457;a:4:{s:3:"cid";s:8:"50016930";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"新水浒Q传";s:10:"parent_cid";s:8:"50016891";}i:458;a:4:{s:3:"cid";s:8:"50017011";s:9:"is_parent";s:5:"false";s:4:"name";s:11:"新天堂II";s:10:"parent_cid";s:8:"50016891";}i:459;a:4:{s:3:"cid";s:8:"50050737";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"仙境江湖";s:10:"parent_cid";s:8:"50016891";}i:460;a:4:{s:3:"cid";s:8:"50164001";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"新挑战";s:10:"parent_cid";s:8:"50016891";}}}i:77;a:5:{s:3:"cid";s:8:"50023724";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"其他";s:10:"parent_cid";s:1:"0";s:4:"subs";a:7:{i:0;a:4:{s:3:"cid";s:8:"50011150";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50023724";}i:1;a:4:{s:3:"cid";s:8:"50023725";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"邮费";s:10:"parent_cid";s:8:"50023724";}i:2;a:4:{s:3:"cid";s:8:"50023726";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新品预览";s:10:"parent_cid";s:8:"50023724";}i:3;a:4:{s:3:"cid";s:8:"50023727";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"定金";s:10:"parent_cid";s:8:"50023724";}i:4;a:4:{s:3:"cid";s:8:"50023728";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"赠品";s:10:"parent_cid";s:8:"50023724";}i:5;a:4:{s:3:"cid";s:8:"50023729";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"订单";s:10:"parent_cid";s:8:"50023724";}i:6;a:4:{s:3:"cid";s:8:"50025832";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"搭配商品";s:10:"parent_cid";s:8:"50023724";}}}i:78;a:5:{s:3:"cid";s:8:"50017652";s:9:"is_parent";s:4:"true";s:4:"name";s:17:"TP服务商大类";s:10:"parent_cid";s:1:"0";s:4:"subs";a:18:{i:0;a:4:{s:3:"cid";s:8:"50019810";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"营销推广";s:10:"parent_cid";s:8:"50017652";}i:1;a:4:{s:3:"cid";s:8:"50018578";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"店铺管理软件";s:10:"parent_cid";s:8:"50017652";}i:2;a:4:{s:3:"cid";s:8:"50018588";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"店铺装修";s:10:"parent_cid";s:8:"50017652";}i:3;a:4:{s:3:"cid";s:8:"50018444";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"数据分析";s:10:"parent_cid";s:8:"50017652";}i:4;a:4:{s:3:"cid";s:8:"50018348";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"图片拍摄/处理";s:10:"parent_cid";s:8:"50017652";}i:5;a:4:{s:3:"cid";s:8:"50018641";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"客服绩效管理";s:10:"parent_cid";s:8:"50017652";}i:6;a:4:{s:3:"cid";s:8:"50018838";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"运营服务";s:10:"parent_cid";s:8:"50017652";}i:7;a:4:{s:3:"cid";s:8:"50018354";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"物流/仓储";s:10:"parent_cid";s:8:"50017652";}i:8;a:4:{s:3:"cid";s:8:"50018447";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他服务";s:10:"parent_cid";s:8:"50017652";}i:9;a:4:{s:3:"cid";s:8:"50020145";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"品控服务";s:10:"parent_cid";s:8:"50017652";}i:10;a:4:{s:3:"cid";s:8:"50020268";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"无线应用";s:10:"parent_cid";s:8:"50017652";}i:11;a:4:{s:3:"cid";s:8:"50019805";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"买家服务";s:10:"parent_cid";s:8:"50017652";}i:12;a:4:{s:3:"cid";s:8:"50018442";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"商家培训";s:10:"parent_cid";s:8:"50017652";}i:13;a:4:{s:3:"cid";s:8:"50019807";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"淘宝客工具";s:10:"parent_cid";s:8:"50017652";}i:14;a:4:{s:3:"cid";s:8:"50023121";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"工具套餐";s:10:"parent_cid";s:8:"50017652";}i:15;a:4:{s:3:"cid";s:8:"50026563";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"店铺基础服务";s:10:"parent_cid";s:8:"50017652";}i:16;a:4:{s:3:"cid";s:8:"50050208";s:9:"is_parent";s:5:"false";s:4:"name";s:19:"金融/保险服务";s:10:"parent_cid";s:8:"50017652";}i:17;a:4:{s:3:"cid";s:8:"50050664";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"服务套餐";s:10:"parent_cid";s:8:"50017652";}}}i:79;a:4:{s:3:"cid";s:8:"50019379";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"合作商家";s:10:"parent_cid";s:1:"0";}i:80;a:5:{s:3:"cid";s:8:"50023575";s:9:"is_parent";s:4:"true";s:4:"name";s:43:"房产/租房/新房/二手房/委托服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:6:{i:0;a:4:{s:3:"cid";s:8:"50023597";s:9:"is_parent";s:5:"false";s:4:"name";s:33:"租房/出租/租赁/日租短租";s:10:"parent_cid";s:8:"50023575";}i:1;a:4:{s:3:"cid";s:8:"50023598";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"二手房/出售/卖房";s:10:"parent_cid";s:8:"50023575";}i:2;a:4:{s:3:"cid";s:8:"50023944";s:9:"is_parent";s:5:"false";s:4:"name";s:37:"新房/新楼盘（待删除勿发）";s:10:"parent_cid";s:8:"50023575";}i:3;a:4:{s:3:"cid";s:8:"50023579";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"委托服务/中介服务";s:10:"parent_cid";s:8:"50023575";}i:4;a:4:{s:3:"cid";s:8:"50023902";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其他房产服务";s:10:"parent_cid";s:8:"50023575";}i:5;a:4:{s:3:"cid";s:8:"50026396";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"新房垂直市场";s:10:"parent_cid";s:8:"50023575";}}}i:81;a:5:{s:3:"cid";s:8:"50023717";s:9:"is_parent";s:4:"true";s:4:"name";s:48:"OTC药品/医疗器械/隐形眼镜/计生用品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50023720";s:9:"is_parent";s:4:"true";s:4:"name";s:9:"OTC药品";s:10:"parent_cid";s:8:"50023717";}i:1;a:4:{s:3:"cid";s:8:"50023721";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"医疗器械";s:10:"parent_cid";s:8:"50023717";}i:2;a:4:{s:3:"cid";s:8:"50023722";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"隐形眼镜/护理液";s:10:"parent_cid";s:8:"50023717";}i:3;a:4:{s:3:"cid";s:8:"50024153";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"计生用品";s:10:"parent_cid";s:8:"50023717";}i:4;a:4:{s:3:"cid";s:8:"50120006";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"医疗服务";s:10:"parent_cid";s:8:"50023717";}}}i:82;a:5:{s:3:"cid";s:8:"50023878";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"自用闲置转让";s:10:"parent_cid";s:1:"0";s:4:"subs";a:22:{i:0;a:4:{s:3:"cid";s:8:"50112001";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"女装";s:10:"parent_cid";s:8:"50023878";}i:1;a:4:{s:3:"cid";s:8:"50122001";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"男装";s:10:"parent_cid";s:8:"50023878";}i:2;a:4:{s:3:"cid";s:8:"50104002";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"鞋包配饰";s:10:"parent_cid";s:8:"50023878";}i:3;a:4:{s:3:"cid";s:8:"50025385";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"手机";s:10:"parent_cid";s:8:"50023878";}i:4;a:4:{s:3:"cid";s:8:"50025242";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"相机/摄像机";s:10:"parent_cid";s:8:"50023878";}i:5;a:4:{s:3:"cid";s:8:"50025240";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"电脑/电脑配件";s:10:"parent_cid";s:8:"50023878";}i:6;a:4:{s:3:"cid";s:8:"50025243";s:9:"is_parent";s:4:"true";s:4:"name";s:14:"数码3C产品";s:10:"parent_cid";s:8:"50023878";}i:7;a:4:{s:3:"cid";s:8:"50190001";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"奢侈品转让";s:10:"parent_cid";s:8:"50023878";}i:8;a:4:{s:3:"cid";s:8:"50025249";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"服装/服饰";s:10:"parent_cid";s:8:"50023878";}i:9;a:4:{s:3:"cid";s:8:"50025250";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"美容/美颜/香水";s:10:"parent_cid";s:8:"50023878";}i:10;a:4:{s:3:"cid";s:8:"50025244";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"家居/日用品";s:10:"parent_cid";s:8:"50023878";}i:11;a:4:{s:3:"cid";s:8:"50025246";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"食品/保健品";s:10:"parent_cid";s:8:"50023878";}i:12;a:4:{s:3:"cid";s:8:"50025245";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"家用电器/影音设备";s:10:"parent_cid";s:8:"50023878";}i:13;a:4:{s:3:"cid";s:8:"50025247";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"母婴/儿童用品/玩具";s:10:"parent_cid";s:8:"50023878";}i:14;a:4:{s:3:"cid";s:8:"50025253";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"宠物/宠物用品";s:10:"parent_cid";s:8:"50023878";}i:15;a:4:{s:3:"cid";s:8:"50025254";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"生活服务/票务/卡券";s:10:"parent_cid";s:8:"50023878";}i:16;a:4:{s:3:"cid";s:8:"50025251";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"书刊音像/文体用品";s:10:"parent_cid";s:8:"50023878";}i:17;a:4:{s:3:"cid";s:8:"50025255";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"汽摩/电动车/自行车";s:10:"parent_cid";s:8:"50023878";}i:18;a:4:{s:3:"cid";s:8:"50025248";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"珠宝/黄金/手表";s:10:"parent_cid";s:8:"50023878";}i:19;a:4:{s:3:"cid";s:8:"50025252";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"艺术品/收藏品/古董古玩";s:10:"parent_cid";s:8:"50023878";}i:20;a:4:{s:3:"cid";s:8:"50023914";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"其他闲置";s:10:"parent_cid";s:8:"50023878";}i:21;a:4:{s:3:"cid";s:8:"50026696";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"专业回收";s:10:"parent_cid";s:8:"50023878";}}}i:83;a:5:{s:3:"cid";s:8:"50024186";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"保险";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50024187";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"车险";s:10:"parent_cid";s:8:"50024186";}i:1;a:4:{s:3:"cid";s:8:"50024188";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"意外险";s:10:"parent_cid";s:8:"50024186";}i:2;a:4:{s:3:"cid";s:8:"50024189";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"医疗疾病保险";s:10:"parent_cid";s:8:"50024186";}i:3;a:4:{s:3:"cid";s:8:"50024190";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"财产险";s:10:"parent_cid";s:8:"50024186";}i:4;a:4:{s:3:"cid";s:8:"50025948";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"少儿险";s:10:"parent_cid";s:8:"50024186";}i:5;a:4:{s:3:"cid";s:8:"50025949";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"旅游保险";s:10:"parent_cid";s:8:"50024186";}i:6;a:4:{s:3:"cid";s:8:"50050401";s:9:"is_parent";s:5:"false";s:4:"name";s:29:"交易保障险种(不展示)";s:10:"parent_cid";s:8:"50024186";}i:7;a:4:{s:3:"cid";s:8:"50216001";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"理财保险";s:10:"parent_cid";s:8:"50024186";}}}i:84;a:5:{s:3:"cid";s:8:"50024449";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"淘花娱乐";s:10:"parent_cid";s:1:"0";s:4:"subs";a:2:{i:0;a:4:{s:3:"cid";s:8:"50024450";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"电影/视频/电视栏目";s:10:"parent_cid";s:8:"50024449";}i:1;a:4:{s:3:"cid";s:8:"50025287";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"教育/培训";s:10:"parent_cid";s:8:"50024449";}}}i:85;a:5:{s:3:"cid";s:8:"50024451";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"外卖/外送/订餐服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50024456";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"冷菜/小菜";s:10:"parent_cid";s:8:"50024451";}i:1;a:4:{s:3:"cid";s:8:"50024461";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"热菜/炒菜/锅仔";s:10:"parent_cid";s:8:"50024451";}i:2;a:4:{s:3:"cid";s:8:"50024466";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"汤/煲/砂锅/火锅";s:10:"parent_cid";s:8:"50024451";}i:3;a:4:{s:3:"cid";s:8:"50024467";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"烧烤/烤肉/烤串";s:10:"parent_cid";s:8:"50024451";}i:4;a:4:{s:3:"cid";s:8:"50024468";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"米饭/炒饭/盖饭/粥";s:10:"parent_cid";s:8:"50024451";}i:5;a:4:{s:3:"cid";s:8:"50024470";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"面食/饺子/包子/饼";s:10:"parent_cid";s:8:"50024451";}i:6;a:4:{s:3:"cid";s:8:"50024504";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"套餐/简餐";s:10:"parent_cid";s:8:"50024451";}i:7;a:4:{s:3:"cid";s:8:"50024476";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"西餐/西式快餐";s:10:"parent_cid";s:8:"50024451";}i:8;a:4:{s:3:"cid";s:8:"50024477";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"日韩料理/刺身";s:10:"parent_cid";s:8:"50024451";}i:9;a:4:{s:3:"cid";s:8:"50024478";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"奶茶/咖啡/饮料";s:10:"parent_cid";s:8:"50024451";}i:10;a:4:{s:3:"cid";s:8:"50024479";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"面包/蛋糕/甜品";s:10:"parent_cid";s:8:"50024451";}i:11;a:4:{s:3:"cid";s:8:"50024480";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"鸭脖/卤味/特色小吃";s:10:"parent_cid";s:8:"50024451";}i:12;a:4:{s:3:"cid";s:8:"50024481";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"水果/拼盘/果篮";s:10:"parent_cid";s:8:"50024451";}i:13;a:4:{s:3:"cid";s:8:"50024482";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"生鲜蔬菜";s:10:"parent_cid";s:8:"50024451";}i:14;a:4:{s:3:"cid";s:8:"50024484";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其他";s:10:"parent_cid";s:8:"50024451";}}}i:86;a:5:{s:3:"cid";s:8:"50024612";s:9:"is_parent";s:4:"true";s:4:"name";s:44:"外卖/外送/订餐服务（垂直市场）";s:10:"parent_cid";s:1:"0";s:4:"subs";a:15:{i:0;a:4:{s:3:"cid";s:8:"50024701";s:9:"is_parent";s:5:"false";s:4:"name";s:13:"冷菜/小菜";s:10:"parent_cid";s:8:"50024612";}i:1;a:4:{s:3:"cid";s:8:"50024702";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"热菜/炒菜/锅仔";s:10:"parent_cid";s:8:"50024612";}i:2;a:4:{s:3:"cid";s:8:"50024703";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"汤/煲/砂锅/火锅";s:10:"parent_cid";s:8:"50024612";}i:3;a:4:{s:3:"cid";s:8:"50024704";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"烧烤/烤肉/烤串";s:10:"parent_cid";s:8:"50024612";}i:4;a:4:{s:3:"cid";s:8:"50024705";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"米饭/炒饭/盖饭/粥";s:10:"parent_cid";s:8:"50024612";}i:5;a:4:{s:3:"cid";s:8:"50024710";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"面食/饺子/包子/饼";s:10:"parent_cid";s:8:"50024612";}i:6;a:4:{s:3:"cid";s:8:"50024717";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"套餐/简餐";s:10:"parent_cid";s:8:"50024612";}i:7;a:4:{s:3:"cid";s:8:"50024723";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"西餐/西式快餐";s:10:"parent_cid";s:8:"50024612";}i:8;a:4:{s:3:"cid";s:8:"50024734";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"日韩料理/刺身";s:10:"parent_cid";s:8:"50024612";}i:9;a:4:{s:3:"cid";s:8:"50024739";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"奶茶/咖啡/饮料";s:10:"parent_cid";s:8:"50024612";}i:10;a:4:{s:3:"cid";s:8:"50024747";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"面包/蛋糕/甜品";s:10:"parent_cid";s:8:"50024612";}i:11;a:4:{s:3:"cid";s:8:"50024754";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"鸭脖/卤味/特色小吃";s:10:"parent_cid";s:8:"50024612";}i:12;a:4:{s:3:"cid";s:8:"50024758";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"水果/拼盘/果篮";s:10:"parent_cid";s:8:"50024612";}i:13;a:4:{s:3:"cid";s:8:"50024762";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"生鲜蔬菜/食材半成品";s:10:"parent_cid";s:8:"50024612";}i:14;a:4:{s:3:"cid";s:8:"50024765";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其他";s:10:"parent_cid";s:8:"50024612";}}}i:87;a:5:{s:3:"cid";s:8:"50024971";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"新车/二手车";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50011555";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"二手整车";s:10:"parent_cid";s:8:"50024971";}i:1;a:4:{s:3:"cid";s:8:"50018718";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新车定金";s:10:"parent_cid";s:8:"50024971";}i:2;a:4:{s:3:"cid";s:8:"50024973";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新车全款";s:10:"parent_cid";s:8:"50024971";}i:3;a:4:{s:3:"cid";s:8:"50050565";s:9:"is_parent";s:5:"false";s:4:"name";s:23:"新车整车销售(新)";s:10:"parent_cid";s:8:"50024971";}i:4;a:4:{s:3:"cid";s:8:"50050566";s:9:"is_parent";s:5:"false";s:4:"name";s:27:"二手整车销售（新）";s:10:"parent_cid";s:8:"50024971";}}}i:88;a:5:{s:3:"cid";s:8:"50025004";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"个性定制/设计服务/DIY";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50025007";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"日用/装饰定制";s:10:"parent_cid";s:8:"50025004";}i:1;a:4:{s:3:"cid";s:8:"50025008";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"数码/办公定制";s:10:"parent_cid";s:8:"50025004";}i:2;a:4:{s:3:"cid";s:8:"50025009";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"服饰箱包定制";s:10:"parent_cid";s:8:"50025004";}i:3;a:4:{s:3:"cid";s:8:"50014854";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"设计服务";s:10:"parent_cid";s:8:"50025004";}i:4;a:4:{s:3:"cid";s:8:"50025010";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"饰品定制";s:10:"parent_cid";s:8:"50025004";}i:5;a:4:{s:3:"cid";s:8:"50014920";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"个性定制产品";s:10:"parent_cid";s:8:"50025004";}i:6;a:4:{s:3:"cid";s:8:"50025011";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"新奇商品定制";s:10:"parent_cid";s:8:"50025004";}i:7;a:4:{s:3:"cid";s:8:"50025012";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"其它定制";s:10:"parent_cid";s:8:"50025004";}}}i:89;a:5:{s:3:"cid";s:8:"50025110";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"电影/演出/体育赛事";s:10:"parent_cid";s:1:"0";s:4:"subs";a:4:{i:0;a:4:{s:3:"cid";s:8:"50019077";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电影票";s:10:"parent_cid";s:8:"50025110";}i:1;a:4:{s:3:"cid";s:8:"50019086";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"体育赛事";s:10:"parent_cid";s:8:"50025110";}i:2;a:4:{s:3:"cid";s:8:"50019084";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"演出话剧";s:10:"parent_cid";s:8:"50025110";}i:3;a:4:{s:3:"cid";s:8:"50082008";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"电影演出周边";s:10:"parent_cid";s:8:"50025110";}}}i:90;a:5:{s:3:"cid";s:8:"50025111";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"本地化生活服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:12:{i:0;a:4:{s:3:"cid";s:8:"50014927";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"教育培训";s:10:"parent_cid";s:8:"50025111";}i:1;a:4:{s:3:"cid";s:8:"50025144";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"便民/生活配送(待删)";s:10:"parent_cid";s:8:"50025111";}i:2;a:4:{s:3:"cid";s:8:"50025125";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"保姆/护理/保洁";s:10:"parent_cid";s:8:"50025111";}i:3;a:4:{s:3:"cid";s:8:"50025133";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"汽车服务";s:10:"parent_cid";s:8:"50025111";}i:4;a:4:{s:3:"cid";s:8:"50025132";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"婚庆服务";s:10:"parent_cid";s:8:"50025111";}i:5;a:4:{s:3:"cid";s:8:"50026189";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"设备场地租赁(待删)";s:10:"parent_cid";s:8:"50025111";}i:6;a:4:{s:3:"cid";s:8:"50026199";s:9:"is_parent";s:4:"true";s:4:"name";s:20:"殡葬服务(待删)";s:10:"parent_cid";s:8:"50025111";}i:7;a:4:{s:3:"cid";s:8:"50026535";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"医疗服务";s:10:"parent_cid";s:8:"50025111";}i:8;a:4:{s:3:"cid";s:8:"50050464";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"家居服务";s:10:"parent_cid";s:8:"50025111";}i:9;a:4:{s:3:"cid";s:8:"50050471";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"本地摄影/摄像服务";s:10:"parent_cid";s:8:"50025111";}i:10;a:4:{s:3:"cid";s:8:"50050489";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"便民服务";s:10:"parent_cid";s:8:"50025111";}i:11;a:4:{s:3:"cid";s:8:"50025138";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"加油卡/加油充值";s:10:"parent_cid";s:8:"50025111";}}}i:91;a:5:{s:3:"cid";s:8:"50025618";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"理财";s:10:"parent_cid";s:1:"0";s:4:"subs";a:4:{i:0;a:1:{i:0;s:8:"50172001";}i:1;a:1:{i:0;s:4:"true";}i:2;a:1:{i:0;s:12:"银行理财";}i:3;a:1:{i:0;s:8:"50025618";}}}i:92;a:5:{s:3:"cid";s:8:"50025705";s:9:"is_parent";s:4:"true";s:4:"name";s:36:"洗护清洁剂/卫生巾/纸/香薰";s:10:"parent_cid";s:1:"0";s:4:"subs";a:9:{i:0;a:4:{s:3:"cid";s:8:"50012482";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"洗发沐浴/个人清洁";s:10:"parent_cid";s:8:"50025705";}i:1;a:4:{s:3:"cid";s:8:"50012487";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"家庭环境清洁剂";s:10:"parent_cid";s:8:"50025705";}i:2;a:4:{s:3:"cid";s:8:"50018971";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"家私/皮具护理品";s:10:"parent_cid";s:8:"50025705";}i:3;a:4:{s:3:"cid";s:8:"50018975";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"衣物清洁剂/护理剂";s:10:"parent_cid";s:8:"50025705";}i:4;a:4:{s:3:"cid";s:8:"50018960";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"室内除臭/芳香用品";s:10:"parent_cid";s:8:"50025705";}i:5;a:4:{s:3:"cid";s:4:"2165";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"香熏用品";s:10:"parent_cid";s:8:"50025705";}i:6;a:4:{s:3:"cid";s:8:"50016889";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"卫生巾/护垫/成人尿裤";s:10:"parent_cid";s:8:"50025705";}i:7;a:4:{s:3:"cid";s:8:"50012473";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"纸品/湿巾";s:10:"parent_cid";s:8:"50025705";}i:8;a:4:{s:3:"cid";s:6:"210207";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"驱虫用品";s:10:"parent_cid";s:8:"50025705";}}}i:93;a:5:{s:3:"cid";s:8:"50025968";s:9:"is_parent";s:4:"true";s:4:"name";s:24:"司法拍卖拍品专用";s:10:"parent_cid";s:1:"0";s:4:"subs";a:8:{i:0;a:4:{s:3:"cid";s:8:"50025969";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"房产";s:10:"parent_cid";s:8:"50025968";}i:1;a:4:{s:3:"cid";s:8:"50025970";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"土地";s:10:"parent_cid";s:8:"50025968";}i:2;a:4:{s:3:"cid";s:8:"50025971";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"资产";s:10:"parent_cid";s:8:"50025968";}i:3;a:4:{s:3:"cid";s:8:"50025972";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"机动车";s:10:"parent_cid";s:8:"50025968";}i:4;a:4:{s:3:"cid";s:8:"50025973";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"林权";s:10:"parent_cid";s:8:"50025968";}i:5;a:4:{s:3:"cid";s:8:"50025974";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"矿权";s:10:"parent_cid";s:8:"50025968";}i:6;a:4:{s:3:"cid";s:8:"50025975";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"工程";s:10:"parent_cid";s:8:"50025968";}i:7;a:4:{s:3:"cid";s:8:"50025976";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其他";s:10:"parent_cid";s:8:"50025968";}}}i:94;a:5:{s:3:"cid";s:8:"50026316";s:9:"is_parent";s:4:"true";s:4:"name";s:14:"茶/酒/冲饮";s:10:"parent_cid";s:1:"0";s:4:"subs";a:6:{i:0;a:4:{s:3:"cid";s:8:"50026397";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"茶叶";s:10:"parent_cid";s:8:"50026316";}i:1;a:4:{s:3:"cid";s:8:"50026398";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"饮料/乳品";s:10:"parent_cid";s:8:"50026316";}i:2;a:4:{s:3:"cid";s:8:"50003860";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"天然粉粉食品";s:10:"parent_cid";s:8:"50026316";}i:3;a:4:{s:3:"cid";s:8:"50009857";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"藕粉/麦片/冲饮品";s:10:"parent_cid";s:8:"50026316";}i:4;a:4:{s:3:"cid";s:6:"210605";s:9:"is_parent";s:4:"true";s:4:"name";s:26:"速溶咖啡/咖啡豆/粉";s:10:"parent_cid";s:8:"50026316";}i:5;a:4:{s:3:"cid";s:8:"50008141";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"酒类";s:10:"parent_cid";s:8:"50026316";}}}i:95;a:5:{s:3:"cid";s:8:"50023804";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"装修设计/装修服务";s:10:"parent_cid";s:1:"0";s:4:"subs";a:4:{i:0;a:4:{s:3:"cid";s:8:"50023809";s:9:"is_parent";s:5:"false";s:4:"name";s:31:"装修装饰设计/样板案例";s:10:"parent_cid";s:8:"50023804";}i:1;a:4:{s:3:"cid";s:8:"50023810";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"装修施工服务";s:10:"parent_cid";s:8:"50023804";}i:2;a:4:{s:3:"cid";s:8:"50023921";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"装修工程监理";s:10:"parent_cid";s:8:"50023804";}i:3;a:4:{s:3:"cid";s:8:"50056001";s:9:"is_parent";s:4:"true";s:4:"name";s:6:"其他";s:10:"parent_cid";s:8:"50023804";}}}i:96;a:5:{s:3:"cid";s:8:"50026523";s:9:"is_parent";s:4:"true";s:4:"name";s:22:"休闲娱乐/购物卡";s:10:"parent_cid";s:1:"0";s:4:"subs";a:11:{i:0;a:4:{s:3:"cid";s:8:"50026008";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"酒吧/俱乐部";s:10:"parent_cid";s:8:"50026523";}i:1;a:4:{s:3:"cid";s:8:"50019100";s:9:"is_parent";s:5:"false";s:4:"name";s:20:"足浴/洗浴/按摩";s:10:"parent_cid";s:8:"50026523";}i:2;a:4:{s:3:"cid";s:8:"50025977";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"景点/郊游/温泉/滑雪";s:10:"parent_cid";s:8:"50026523";}i:3;a:4:{s:3:"cid";s:8:"50019080";s:9:"is_parent";s:5:"false";s:4:"name";s:25:"美容美发/美体美甲";s:10:"parent_cid";s:8:"50026523";}i:4;a:4:{s:3:"cid";s:8:"50026044";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"户外休闲运动";s:10:"parent_cid";s:8:"50026523";}i:5;a:4:{s:3:"cid";s:8:"50019095";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"超市卡/商场购物卡";s:10:"parent_cid";s:8:"50026523";}i:6;a:4:{s:3:"cid";s:8:"50019079";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"运动健身";s:10:"parent_cid";s:8:"50026523";}i:7;a:4:{s:3:"cid";s:8:"50025982";s:9:"is_parent";s:4:"true";s:4:"name";s:18:"室内休闲游乐";s:10:"parent_cid";s:8:"50026523";}i:8;a:4:{s:3:"cid";s:8:"50019081";s:9:"is_parent";s:5:"false";s:4:"name";s:3:"KTV";s:10:"parent_cid";s:8:"50026523";}i:9;a:4:{s:3:"cid";s:8:"50026568";s:9:"is_parent";s:5:"false";s:4:"name";s:18:"其他休闲娱乐";s:10:"parent_cid";s:8:"50026523";}i:10;a:4:{s:3:"cid";s:8:"50050546";s:9:"is_parent";s:4:"true";s:4:"name";s:19:"购物券/礼品卡";s:10:"parent_cid";s:8:"50026523";}}}i:97;a:5:{s:3:"cid";s:8:"50026800";s:9:"is_parent";s:4:"true";s:4:"name";s:31:"保健品/膳食营养补充剂";s:10:"parent_cid";s:1:"0";s:4:"subs";a:2:{i:0;a:4:{s:3:"cid";s:8:"50026801";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"品牌保健营养品";s:10:"parent_cid";s:8:"50026800";}i:1;a:4:{s:3:"cid";s:8:"50026811";s:9:"is_parent";s:4:"true";s:4:"name";s:27:"其他品牌保健营养品";s:10:"parent_cid";s:8:"50026800";}}}i:98;a:5:{s:3:"cid";s:8:"50050359";s:9:"is_parent";s:4:"true";s:4:"name";s:32:"水产肉类/新鲜蔬果/熟食";s:10:"parent_cid";s:1:"0";s:4:"subs";a:9:{i:0;a:4:{s:3:"cid";s:8:"50050371";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"海鲜/水产品/制品";s:10:"parent_cid";s:8:"50050359";}i:1;a:4:{s:3:"cid";s:8:"50050372";s:9:"is_parent";s:4:"true";s:4:"name";s:16:"生肉/肉制品";s:10:"parent_cid";s:8:"50050359";}i:2;a:4:{s:3:"cid";s:8:"50050643";s:9:"is_parent";s:4:"true";s:4:"name";s:23:"熟食/凉菜/私房菜";s:10:"parent_cid";s:8:"50050359";}i:3;a:4:{s:3:"cid";s:8:"50016810";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"废弃类目";s:10:"parent_cid";s:8:"50050359";}i:4;a:4:{s:3:"cid";s:8:"50010566";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"新鲜蔬菜/蔬菜制品";s:10:"parent_cid";s:8:"50050359";}i:5;a:4:{s:3:"cid";s:8:"50025680";s:9:"is_parent";s:4:"true";s:4:"name";s:39:"腌制蔬菜/泡菜/酱菜/脱水蔬菜";s:10:"parent_cid";s:8:"50050359";}i:6;a:4:{s:3:"cid";s:8:"50012382";s:9:"is_parent";s:4:"true";s:4:"name";s:13:"蛋/蛋制品";s:10:"parent_cid";s:8:"50050359";}i:7;a:4:{s:3:"cid";s:8:"50050725";s:9:"is_parent";s:4:"true";s:4:"name";s:25:"新鲜水果/水果制品";s:10:"parent_cid";s:8:"50050359";}i:8;a:4:{s:3:"cid";s:8:"50024607";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"新鲜蛋糕";s:10:"parent_cid";s:8:"50050359";}}}i:99;a:5:{s:3:"cid";s:8:"50074001";s:9:"is_parent";s:4:"true";s:4:"name";s:29:"摩托车/配件/骑士装备";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50003794";s:9:"is_parent";s:5:"false";s:4:"name";s:15:"摩托车整车";s:10:"parent_cid";s:8:"50074001";}i:1;a:4:{s:3:"cid";s:8:"50078001";s:9:"is_parent";s:4:"true";s:4:"name";s:15:"摩托车配件";s:10:"parent_cid";s:8:"50074001";}i:2;a:4:{s:3:"cid";s:8:"50070004";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"摩托车骑士装备";s:10:"parent_cid";s:8:"50074001";}i:3;a:4:{s:3:"cid";s:8:"50078002";s:9:"is_parent";s:4:"true";s:4:"name";s:21:"摩托车装饰养护";s:10:"parent_cid";s:8:"50074001";}i:4;a:4:{s:3:"cid";s:6:"261407";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"其他摩托车用品";s:10:"parent_cid";s:8:"50074001";}}}i:100;a:5:{s:3:"cid";s:8:"50158001";s:9:"is_parent";s:4:"true";s:4:"name";s:28:"网络店铺代金/优惠券";s:10:"parent_cid";s:1:"0";s:4:"subs";a:3:{i:0;a:4:{s:3:"cid";s:8:"50020126";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"网络店铺代金券";s:10:"parent_cid";s:8:"50158001";}i:1;a:4:{s:3:"cid";s:8:"50160001";s:9:"is_parent";s:5:"false";s:4:"name";s:21:"淘宝店铺优惠券";s:10:"parent_cid";s:8:"50158001";}i:2;a:4:{s:3:"cid";s:8:"50160002";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"O2O卡券";s:10:"parent_cid";s:8:"50158001";}}}i:101;a:5:{s:3:"cid";s:8:"50230002";s:9:"is_parent";s:4:"true";s:4:"name";s:12:"服务商品";s:10:"parent_cid";s:1:"0";s:4:"subs";a:5:{i:0;a:4:{s:3:"cid";s:8:"50232002";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"保修";s:10:"parent_cid";s:8:"50230002";}i:1;a:4:{s:3:"cid";s:8:"50242002";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"电保包";s:10:"parent_cid";s:8:"50230002";}i:2;a:4:{s:3:"cid";s:8:"50242003";s:9:"is_parent";s:5:"false";s:4:"name";s:12:"物流服务";s:10:"parent_cid";s:8:"50230002";}i:3;a:4:{s:3:"cid";s:8:"50234002";s:9:"is_parent";s:5:"false";s:4:"name";s:9:"服务卡";s:10:"parent_cid";s:8:"50230002";}i:4;a:4:{s:3:"cid";s:8:"50246001";s:9:"is_parent";s:5:"false";s:4:"name";s:6:"其它";s:10:"parent_cid";s:8:"50230002";}}}}');
INSERT INTO `pin_config` (`key`, `value`) VALUES
('comment_auto_register', 's:1:"1";'),
('taobao_collect_config', 'a:6:{s:11:"category_id";s:1:"8";s:3:"cid";s:2:"16";s:7:"sub_cid";s:8:"50011404";s:8:"keywords";s:113:"半身裙 背心裙 吊带裙 短裙 长裙 包臀裙 牛仔裙 抹胸裙 百褶裙 雪纺裙 蓬蓬裙 连衣裙";s:16:"exclude_keywords";s:0:"";s:6:"config";a:11:{s:7:"page_no";s:1:"1";s:9:"page_size";s:2:"10";s:12:"start_credit";s:6:"1crown";s:10:"end_credit";s:12:"5goldencrown";s:11:"start_price";s:0:"";s:9:"end_price";s:0:"";s:20:"start_commissionRate";s:0:"";s:18:"end_commissionRate";s:0:"";s:14:"start_totalnum";s:0:"";s:12:"end_totalnum";s:0:"";s:4:"sort";s:21:"commissionVolume_desc";}}'),
('theme', 's:7:"default";'),
('url_suffix', 's:5:".html";'),
('comment_collect_filter', 's:24:"返利,www,退货,退款";'),
('connect_auto_register', 's:1:"1";'),
('connect_auto_register_prefix', 's:2:"yp";'),
('custom_service_time', 's:26:"周一至周五10:30-19:30";'),
('comment_collect_processlimit', 's:1:"5";'),
('share_view_fluid', 's:1:"1";');

-- --------------------------------------------------------

--
-- 表的结构 `pin_credit_log`
--

DROP TABLE IF EXISTS `pin_credit_log`;
CREATE TABLE `pin_credit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_credit_setting`
--

DROP TABLE IF EXISTS `pin_credit_setting`;
CREATE TABLE `pin_credit_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='积分设置';

--
-- 转存表中的数据 `pin_credit_setting`
--

INSERT INTO `pin_credit_setting` (`id`, `name`, `alias`, `score`, `limit`) VALUES
(1, 'share_add', '分享商品', 10, 10),
(2, 'share_del', '删除分享', -10, 10),
(3, 'user_login', '用户登录', 5, 2),
(4, 'user_register', '用户注册初始积分', 5, 1),
(5, 'follow_add', '关注用户', 5, 10),
(6, 'follow_del', '取消关注用户', -5, 10),
(7, 'group_follow_add', '关注杂志', 10, 10),
(8, 'group_follow_del', '取消关注杂志', -10, 10),
(9, 'share_comment_add', '发表商品评论', 10, 10),
(10, 'share_comment_del', '商品评论被删除', -20, 10),
(11, 'share_like', '喜欢商品', 5, 10),
(12, 'share_be_liked', '商品被喜欢', 10, 10),
(13, 'share_like_del', '取消喜欢商品', -5, 10),
(14, 'share_be_liked_del', '取消商品被喜欢', -10, 10),
(15, 'view_share', '浏览分享', 1, 10),
(16, 'share_be_viewed', '分享被浏览', 1, 10),
(17, 'search_share', '搜索分享', 5, 10),
(18, 'edit_signature', '修改签名档', 10, 1),
(19, 'edit_user_tag', '贴用户标签', 10, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pin_event`
--

DROP TABLE IF EXISTS `pin_event`;
CREATE TABLE `pin_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `action` varchar(300) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_exchange_category`
--

DROP TABLE IF EXISTS `pin_exchange_category`;
CREATE TABLE `pin_exchange_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `name` varchar(256) NOT NULL COMMENT '栏目名称',
  `sortnum` int(11) NOT NULL DEFAULT '0' COMMENT '排序数字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='积分兑换分类';

--
-- 转存表中的数据 `pin_exchange_category`
--

INSERT INTO `pin_exchange_category` (`id`, `parent_id`, `name`, `sortnum`) VALUES
(1, 0, '工艺品', 1),
(2, 0, '玩具', 2),
(3, 0, '充值卡', 3),
(4, 0, 'Q币', 4),
(5, 0, '数码配件', 5),
(6, 0, '纪念品', 6);

-- --------------------------------------------------------

--
-- 表的结构 `pin_exchange_goods`
--

DROP TABLE IF EXISTS `pin_exchange_goods`;
CREATE TABLE `pin_exchange_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(300) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `content` text,
  `stock` int(11) DEFAULT NULL,
  `exchanged_count` int(11) NOT NULL DEFAULT '0',
  `limit` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) DEFAULT NULL,
  `is_virtual` tinyint(4) NOT NULL,
  `sortnum` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_exchange_order`
--

DROP TABLE IF EXISTS `pin_exchange_order`;
CREATE TABLE `pin_exchange_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_flink`
--

DROP TABLE IF EXISTS `pin_flink`;
CREATE TABLE `pin_flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `name` varchar(90) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `remote_image` varchar(100) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_flink`
--

INSERT INTO `pin_flink` (`id`, `category`, `name`, `url`, `image`, `remote_image`, `description`, `enabled`, `created`) VALUES
(3, '首页链接', '新浪网', 'http://www.sina.com.cn', '', '', '', 1, 1331013386),
(4, '首页链接', '百度', 'http://www.baidu.com', '', '', '', 1, 1344497797),
(5, '首页链接', '网易', 'http://www.163.com', '', '', '', 1, 1344497889),
(6, '内页链接', '搜狐女人', 'http://lady.sohu.com', '', 'http://imgtest-lx.meilishuo.net/img/_o/35/73/10a0734a6d1e7a78a35ccb7f7cff_120_50.jpg', '', 1, 1344503113),
(7, '内页链接', '谷歌中国', 'http://www.g.cn', '/upload/flink/13467402337418.png', '', '', 1, 1344503295);

-- --------------------------------------------------------

--
-- 表的结构 `pin_follow`
--

DROP TABLE IF EXISTS `pin_follow`;
CREATE TABLE `pin_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`to_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods`
--

DROP TABLE IF EXISTS `pin_goods`;
CREATE TABLE `pin_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `collect_count` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_w` int(11) NOT NULL DEFAULT '0',
  `image_h` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `item_key` varchar(50) DEFAULT NULL COMMENT '唯一编号',
  `shop_id` int(11) DEFAULT NULL,
  `delisted` tinyint(1) NOT NULL DEFAULT '0',
  `taobao_seller_nick` varchar(250) DEFAULT NULL,
  `edited` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否编辑过',
  `taobao_commission_rate` int(11) DEFAULT '0',
  `taobao_commission` decimal(10,2) DEFAULT '0.00',
  `taobao_commission_num` int(11) DEFAULT '0',
  `taobao_volume` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `shop_id` (`shop_id`),
  KEY `item_key` (`item_key`),
  KEY `taobao_volume` (`taobao_volume`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods_category`
--

DROP TABLE IF EXISTS `pin_goods_category`;
CREATE TABLE `pin_goods_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `name` varchar(256) NOT NULL COMMENT '栏目名称',
  `keywords` text COMMENT '列表页关键字',
  `description` text COMMENT '栏目简介',
  `sortnum` int(11) NOT NULL DEFAULT '0' COMMENT '排序数字',
  `tag_groups` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_goods_category`
--

INSERT INTO `pin_goods_category` (`id`, `parent_id`, `name`, `keywords`, `description`, `sortnum`, `tag_groups`) VALUES
(1, 0, '衣服', '美丽说,美丽,网购,购物分享,淘宝网购物,淘宝网女装,衣服搭配,美丽说团购', '美丽说是百万MM一起修炼变美的购物分享社区。各路扮美达人与你分享美人心计、购物经验、搭配秘笈、当红好店，记录你的美丽成长。快来美丽说分享你的美丽点滴吧', 1, '当季热款\r\n当季流行\r\n热门风格'),
(2, 0, '鞋子', '', '', 2, '当季热款\r\n当季流行\r\n热门风格'),
(3, 0, '包包', '', '', 3, '当季热款\r\n当季流行'),
(4, 0, '配饰', '', '', 4, '当季热款\r\n热门风格\r\n元素'),
(5, 0, '美容', '', '', 5, '功效\r\n护肤\r\n彩妆\r\n美体\r\n热门品牌'),
(6, 0, '家居', '', '', 6, '家\r\n起居室\r\n卧室\r\n厨房\r\n卫浴\r\n花园\r\n小物'),
(7, 1, '上衣', '', '', 1, '当季热款\r\n当季流行\r\n热门风格'),
(8, 1, '裙子', '', '', 2, '当季热款\r\n当季流行\r\n热门风格'),
(9, 1, '裤子', '', '', 3, '当季热款\r\n当季流行\r\n热门风格'),
(10, 1, '内衣', '', '', 4, '当季热款\r\n当季流行');

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods_category_has_tag`
--

DROP TABLE IF EXISTS `pin_goods_category_has_tag`;
CREATE TABLE `pin_goods_category_has_tag` (
  `category_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `group` varchar(50) NOT NULL,
  `sortnum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`,`tag_id`,`group`),
  KEY `category_id` (`category_id`,`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_goods_category_has_tag`
--

INSERT INTO `pin_goods_category_has_tag` (`category_id`, `tag_id`, `group`, `sortnum`) VALUES
(1, 5, '热门风格', 4),
(1, 10, '当季热款', 15),
(1, 9, '当季热款', 14),
(1, 18, '当季热款', 1),
(1, 19, '当季热款', 2),
(1, 20, '当季热款', 3),
(1, 21, '当季热款', 4),
(1, 22, '当季热款', 5),
(1, 23, '当季热款', 6),
(1, 24, '当季热款', 7),
(1, 25, '当季热款', 8),
(1, 26, '当季热款', 9),
(1, 17, '当季热款', 10),
(1, 16, '当季热款', 11),
(1, 8, '当季热款', 12),
(1, 7, '当季热款', 13),
(1, 6, '当季热款', 0),
(2, 68, '当季流行', 3),
(2, 69, '当季流行', 2),
(2, 70, '当季流行', 1),
(2, 39, '当季流行', 0),
(2, 58, '当季热款', 15),
(2, 44, '当季热款', 14),
(2, 45, '当季热款', 13),
(2, 46, '当季热款', 12),
(2, 47, '当季热款', 11),
(2, 48, '当季热款', 10),
(2, 49, '当季热款', 9),
(2, 50, '当季热款', 8),
(2, 51, '当季热款', 7),
(2, 52, '当季热款', 6),
(2, 53, '当季热款', 5),
(2, 54, '当季热款', 4),
(2, 55, '当季热款', 3),
(2, 56, '当季热款', 2),
(2, 57, '当季热款', 1),
(2, 43, '当季热款', 0),
(3, 83, '当季热款', 18),
(3, 84, '当季热款', 19),
(3, 85, '当季热款', 20),
(3, 86, '当季热款', 21),
(3, 87, '当季热款', 22),
(3, 718, '当季热款', 23),
(3, 77, '当季热款', 0),
(3, 90, '当季热款', 1),
(3, 91, '当季热款', 2),
(3, 92, '当季热款', 3),
(3, 93, '当季热款', 4),
(3, 94, '当季热款', 5),
(3, 95, '当季热款', 6),
(3, 96, '当季热款', 7),
(3, 97, '当季热款', 8),
(3, 98, '当季热款', 9),
(3, 99, '当季热款', 10),
(3, 89, '当季热款', 11),
(3, 88, '当季热款', 12),
(3, 78, '当季热款', 13),
(3, 79, '当季热款', 14),
(4, 142, '热门风格', 4),
(4, 74, '热门风格', 3),
(4, 3, '热门风格', 2),
(4, 2, '热门风格', 1),
(4, 1, '热门风格', 0),
(4, 711, '当季热款', 34),
(4, 124, '当季热款', 33),
(4, 123, '当季热款', 32),
(4, 122, '当季热款', 31),
(4, 121, '当季热款', 30),
(4, 120, '当季热款', 29),
(4, 119, '当季热款', 28),
(4, 118, '当季热款', 27),
(4, 117, '当季热款', 26),
(4, 116, '当季热款', 25),
(4, 115, '当季热款', 24),
(4, 114, '当季热款', 23),
(4, 113, '当季热款', 22),
(4, 112, '当季热款', 21),
(4, 111, '当季热款', 20),
(5, 166, '护肤', 8),
(5, 167, '护肤', 7),
(5, 168, '护肤', 6),
(5, 171, '护肤', 3),
(5, 170, '护肤', 4),
(5, 169, '护肤', 5),
(5, 179, '彩妆', 6),
(5, 180, '彩妆', 5),
(5, 181, '彩妆', 4),
(5, 182, '彩妆', 3),
(5, 183, '彩妆', 2),
(5, 184, '彩妆', 1),
(5, 174, '彩妆', 0),
(5, 160, '功效', 1),
(5, 192, '美体', 5),
(5, 193, '美体', 4),
(5, 194, '美体', 3),
(5, 195, '美体', 2),
(5, 196, '美体', 1),
(5, 186, '美体', 0),
(5, 185, '彩妆', 11),
(5, 175, '彩妆', 10),
(5, 178, '彩妆', 7),
(5, 177, '彩妆', 8),
(5, 176, '彩妆', 9),
(5, 634, '美体', 11),
(5, 187, '美体', 10),
(5, 188, '美体', 9),
(5, 189, '美体', 8),
(5, 190, '美体', 7),
(6, 264, '卫浴', 5),
(6, 263, '卫浴', 4),
(6, 262, '卫浴', 3),
(6, 261, '卫浴', 2),
(6, 260, '卫浴', 1),
(6, 259, '卫浴', 0),
(6, 258, '厨房', 12),
(6, 247, '厨房', 11),
(6, 248, '厨房', 10),
(6, 249, '厨房', 9),
(6, 250, '厨房', 8),
(6, 251, '厨房', 7),
(6, 252, '厨房', 6),
(6, 253, '厨房', 5),
(6, 254, '厨房', 4),
(6, 255, '厨房', 3),
(6, 256, '厨房', 2),
(6, 257, '厨房', 1),
(6, 246, '厨房', 0),
(6, 245, '卧室', 7),
(6, 244, '卧室', 6),
(6, 243, '卧室', 5),
(6, 242, '卧室', 4),
(6, 241, '卧室', 3),
(6, 240, '卧室', 2),
(6, 239, '卧室', 1),
(6, 238, '卧室', 0),
(6, 237, '起居室', 10),
(6, 228, '起居室', 9),
(6, 229, '起居室', 8),
(6, 230, '起居室', 7),
(6, 231, '起居室', 6),
(6, 232, '起居室', 5),
(6, 233, '起居室', 4),
(6, 234, '起居室', 3),
(6, 235, '起居室', 2),
(6, 236, '起居室', 1),
(6, 227, '起居室', 0),
(6, 226, '家', 14),
(6, 213, '家', 13),
(6, 214, '家', 12),
(6, 215, '家', 11),
(6, 216, '家', 10),
(6, 217, '家', 9),
(6, 218, '家', 8),
(6, 219, '家', 7),
(6, 220, '家', 6),
(6, 221, '家', 5),
(6, 222, '家', 4),
(6, 223, '家', 3),
(6, 224, '家', 2),
(6, 225, '家', 1),
(6, 212, '家', 0),
(7, 18, '当季热款', 14),
(7, 20, '当季热款', 15),
(7, 21, '当季热款', 16),
(7, 23, '当季热款', 17),
(7, 298, '当季热款', 18),
(7, 32, '当季热款', 19),
(7, 646, '当季热款', 20),
(7, 690, '当季热款', 21),
(7, 7, '当季热款', 0),
(7, 303, '当季热款', 1),
(7, 304, '当季热款', 2),
(7, 305, '当季热款', 3),
(7, 306, '当季热款', 4),
(7, 307, '当季热款', 5),
(7, 308, '当季热款', 6),
(8, 323, '当季流行', 5),
(8, 18, '当季热款', 7),
(8, 23, '当季热款', 6),
(8, 8, '当季热款', 10),
(8, 16, '当季热款', 8),
(8, 10, '当季热款', 9),
(8, 26, '当季热款', 5),
(8, 301, '当季热款', 4),
(8, 305, '当季热款', 3),
(8, 321, '当季热款', 11),
(8, 324, '当季流行', 4),
(8, 319, '当季热款', 2),
(8, 320, '当季热款', 1),
(8, 325, '当季流行', 3),
(8, 28, '当季流行', 0),
(8, 327, '当季流行', 1),
(8, 326, '当季流行', 2),
(8, 6, '当季热款', 0),
(9, 332, '当季热款', 18),
(9, 27, '当季热款', 15),
(9, 25, '当季热款', 14),
(9, 24, '当季热款', 13),
(9, 22, '当季热款', 12),
(9, 19, '当季热款', 11),
(9, 333, '当季热款', 10),
(9, 334, '当季热款', 9),
(9, 342, '当季热款', 8),
(9, 341, '当季热款', 7),
(9, 340, '当季热款', 6),
(9, 339, '当季热款', 5),
(9, 331, '当季热款', 17),
(9, 338, '当季热款', 4),
(9, 337, '当季热款', 3),
(9, 336, '当季热款', 2),
(9, 335, '当季热款', 1),
(9, 330, '当季热款', 16),
(9, 17, '当季热款', 0),
(10, 372, '当季流行', 1),
(10, 1, '当季流行', 0),
(10, 368, '当季热款', 13),
(10, 356, '当季热款', 12),
(10, 357, '当季热款', 11),
(10, 358, '当季热款', 10),
(10, 359, '当季热款', 9),
(10, 360, '当季热款', 8),
(10, 361, '当季热款', 7),
(10, 364, '当季热款', 4),
(10, 363, '当季热款', 5),
(10, 362, '当季热款', 6),
(10, 365, '当季热款', 3),
(10, 367, '当季热款', 1),
(10, 366, '当季热款', 2),
(10, 355, '当季热款', 0),
(5, 191, '美体', 6),
(7, 33, '当季流行', 13),
(4, 110, '当季热款', 19),
(4, 109, '当季热款', 18),
(4, 125, '当季热款', 17),
(4, 126, '当季热款', 16),
(4, 688, '当季热款', 15),
(4, 141, '当季热款', 14),
(4, 140, '当季热款', 13),
(4, 139, '当季热款', 12),
(3, 82, '当季热款', 17),
(3, 81, '当季热款', 16),
(3, 80, '当季热款', 15),
(1, 2, '热门风格', 1),
(1, 3, '热门风格', 2),
(1, 4, '热门风格', 3),
(1, 1, '热门风格', 0),
(1, 42, '当季流行', 14),
(1, 29, '当季流行', 13),
(1, 11, '当季热款', 16),
(1, 12, '当季热款', 17),
(1, 13, '当季热款', 18),
(1, 14, '当季热款', 19),
(1, 15, '当季热款', 20),
(1, 27, '当季热款', 21),
(1, 28, '当季流行', 0),
(1, 41, '当季流行', 1),
(1, 40, '当季流行', 2),
(1, 39, '当季流行', 3),
(1, 38, '当季流行', 4),
(1, 37, '当季流行', 5),
(1, 36, '当季流行', 6),
(1, 35, '当季流行', 7),
(1, 34, '当季流行', 8),
(1, 33, '当季流行', 9),
(1, 32, '当季流行', 10),
(1, 31, '当季流行', 11),
(1, 30, '当季流行', 12),
(2, 67, '当季流行', 4),
(2, 66, '当季流行', 5),
(2, 65, '当季流行', 6),
(2, 64, '当季流行', 7),
(2, 63, '当季流行', 8),
(2, 62, '当季流行', 9),
(2, 61, '当季流行', 10),
(2, 60, '当季流行', 11),
(2, 59, '当季流行', 12),
(2, 71, '当季流行', 13),
(2, 1, '热门风格', 0),
(2, 2, '热门风格', 1),
(2, 3, '热门风格', 2),
(2, 5, '热门风格', 3),
(2, 72, '热门风格', 4),
(2, 73, '热门风格', 5),
(2, 74, '热门风格', 6),
(2, 75, '热门风格', 7),
(2, 76, '热门风格', 8),
(3, 3, '当季流行', 0),
(3, 106, '当季流行', 1),
(3, 105, '当季流行', 2),
(3, 104, '当季流行', 3),
(3, 103, '当季流行', 4),
(3, 102, '当季流行', 5),
(3, 101, '当季流行', 6),
(3, 100, '当季流行', 7),
(3, 66, '当季流行', 8),
(3, 65, '当季流行', 9),
(3, 61, '当季流行', 10),
(3, 39, '当季流行', 11),
(3, 37, '当季流行', 12),
(3, 28, '当季流行', 13),
(3, 5, '当季流行', 14),
(3, 107, '当季流行', 15),
(4, 138, '当季热款', 11),
(4, 137, '当季热款', 10),
(4, 136, '当季热款', 9),
(4, 135, '当季热款', 8),
(4, 134, '当季热款', 7),
(4, 133, '当季热款', 6),
(4, 132, '当季热款', 5),
(4, 131, '当季热款', 4),
(4, 130, '当季热款', 3),
(4, 129, '当季热款', 2),
(4, 127, '当季热款', 1),
(4, 108, '当季热款', 0),
(4, 145, '元素', 6),
(4, 146, '元素', 5),
(4, 147, '元素', 4),
(4, 148, '元素', 3),
(4, 149, '元素', 2),
(4, 150, '元素', 1),
(4, 30, '元素', 0),
(4, 143, '热门风格', 5),
(5, 165, '护肤', 9),
(5, 164, '护肤', 10),
(5, 625, '护肤', 11),
(5, 152, '功效', 0),
(5, 158, '功效', 3),
(5, 157, '功效', 4),
(5, 156, '功效', 5),
(5, 155, '功效', 6),
(5, 154, '功效', 7),
(5, 153, '功效', 8),
(5, 162, '功效', 9),
(5, 163, '护肤', 0),
(5, 173, '护肤', 1),
(5, 172, '护肤', 2),
(5, 159, '功效', 2),
(6, 265, '卫浴', 6),
(6, 266, '卫浴', 7),
(6, 267, '卫浴', 8),
(6, 268, '花园', 0),
(6, 269, '花园', 1),
(6, 270, '花园', 2),
(6, 271, '花园', 3),
(6, 272, '花园', 4),
(6, 273, '花园', 5),
(6, 274, '花园', 6),
(6, 275, '花园', 7),
(6, 276, '花园', 8),
(6, 277, '小物', 0),
(6, 288, '小物', 1),
(6, 287, '小物', 2),
(6, 286, '小物', 3),
(6, 285, '小物', 4),
(6, 284, '小物', 5),
(6, 283, '小物', 6),
(6, 282, '小物', 7),
(6, 281, '小物', 8),
(6, 280, '小物', 9),
(6, 279, '小物', 10),
(6, 278, '小物', 11),
(6, 289, '小物', 12),
(7, 143, '当季流行', 8),
(7, 136, '当季流行', 9),
(7, 65, '当季流行', 10),
(7, 37, '当季流行', 11),
(7, 34, '当季流行', 12),
(7, 12, '当季热款', 22),
(7, 30, '当季流行', 0),
(7, 317, '当季流行', 1),
(7, 316, '当季流行', 2),
(7, 315, '当季流行', 3),
(7, 314, '当季流行', 4),
(7, 313, '当季流行', 5),
(7, 312, '当季流行', 6),
(7, 311, '当季流行', 7),
(8, 322, '当季流行', 6),
(8, 315, '当季流行', 7),
(8, 107, '当季流行', 8),
(8, 103, '当季流行', 9),
(8, 65, '当季流行', 10),
(8, 39, '当季流行', 11),
(8, 37, '当季流行', 12),
(8, 36, '当季流行', 13),
(8, 35, '当季流行', 14),
(8, 33, '当季流行', 15),
(8, 29, '当季流行', 16),
(8, 328, '当季流行', 17),
(8, 1, '热门风格', 0),
(8, 2, '热门风格', 1),
(8, 3, '热门风格', 2),
(8, 5, '热门风格', 3),
(8, 72, '热门风格', 4),
(8, 75, '热门风格', 5),
(8, 76, '热门风格', 6),
(8, 329, '热门风格', 7),
(9, 343, '当季热款', 19),
(9, 28, '当季流行', 0),
(9, 352, '当季流行', 1),
(9, 351, '当季流行', 2),
(9, 350, '当季流行', 3),
(9, 349, '当季流行', 4),
(9, 348, '当季流行', 5),
(9, 347, '当季流行', 6),
(9, 346, '当季流行', 7),
(9, 345, '当季流行', 8),
(9, 344, '当季流行', 9),
(9, 328, '当季流行', 10),
(9, 327, '当季流行', 11),
(9, 65, '当季流行', 12),
(9, 40, '当季流行', 13),
(9, 38, '当季流行', 14),
(9, 353, '当季流行', 15),
(9, 1, '热门风格', 0),
(9, 5, '热门风格', 1),
(9, 74, '热门风格', 2),
(9, 314, '热门风格', 3),
(9, 354, '热门风格', 4),
(10, 371, '当季流行', 2),
(10, 370, '当季流行', 3),
(10, 369, '当季流行', 4),
(10, 315, '当季流行', 5),
(10, 313, '当季流行', 6),
(10, 106, '当季流行', 7),
(10, 100, '当季流行', 8),
(10, 76, '当季流行', 9),
(10, 75, '当季流行', 10),
(10, 34, '当季流行', 11),
(10, 3, '当季流行', 12),
(10, 2, '当季流行', 13),
(10, 373, '当季流行', 14),
(7, 2, '热门风格', 1),
(7, 1, '热门风格', 0),
(7, 318, '当季流行', 14),
(7, 309, '当季热款', 7),
(7, 310, '当季热款', 8),
(7, 36, '当季热款', 9),
(7, 301, '当季热款', 10),
(7, 300, '当季热款', 11),
(7, 9, '当季热款', 12),
(7, 11, '当季热款', 13),
(7, 3, '热门风格', 2),
(7, 5, '热门风格', 3),
(7, 73, '热门风格', 4),
(5, 197, '热门品牌', 0),
(5, 210, '热门品牌', 1),
(5, 209, '热门品牌', 2),
(5, 208, '热门品牌', 3),
(5, 207, '热门品牌', 4),
(5, 206, '热门品牌', 5),
(5, 205, '热门品牌', 6),
(5, 204, '热门品牌', 7),
(5, 203, '热门品牌', 8),
(5, 202, '热门品牌', 9),
(5, 201, '热门品牌', 10),
(5, 200, '热门品牌', 11),
(5, 199, '热门品牌', 12),
(5, 198, '热门品牌', 13),
(5, 211, '热门品牌', 14),
(4, 144, '元素', 7),
(4, 36, '元素', 8),
(4, 151, '元素', 9);

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods_has_tag`
--

DROP TABLE IF EXISTS `pin_goods_has_tag`;
CREATE TABLE `pin_goods_has_tag` (
  `goods_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`goods_id`,`tag_id`),
  KEY `goods_id` (`goods_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods_image`
--

DROP TABLE IF EXISTS `pin_goods_image`;
CREATE TABLE `pin_goods_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `taobao_id` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_goods_tag`
--

DROP TABLE IF EXISTS `pin_goods_tag`;
CREATE TABLE `pin_goods_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL COMMENT '标签名称',
  `goods_count` int(11) NOT NULL DEFAULT '0' COMMENT '关联商品数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_goods_tag`
--

INSERT INTO `pin_goods_tag` (`id`, `name`, `goods_count`) VALUES
(1, '欧美', 0),
(2, '日系', 0),
(3, '甜美', 0),
(4, '高街', 0),
(5, '复古', 0),
(6, '连衣裙', 0),
(7, '雪纺衫', 0),
(8, '吊带裙', 0),
(9, '衬衫', 0),
(10, '长裙', 0),
(11, 'T恤', 0),
(12, '西装', 0),
(13, '开衫', 0),
(14, '背心', 0),
(15, '打底衫', 0),
(16, '短裙', 0),
(17, '连体裤', 0),
(18, '半身裙', 0),
(19, '短裤', 0),
(20, '防晒衫', 0),
(21, '罩衫', 0),
(22, '小脚裤', 0),
(23, '背心裙', 0),
(24, '背带裤', 0),
(25, '哈伦裤', 0),
(26, '包臀裙', 0),
(27, '裙裤', 0),
(28, '几何', 0),
(29, '雪纺', 0),
(30, '蕾丝', 0),
(31, '娃娃领', 0),
(32, '露肩', 0),
(33, '碎花', 0),
(34, '透视', 0),
(35, '纯色', 0),
(36, '印花', 0),
(37, '撞色', 0),
(38, '渐变', 0),
(39, '豹纹', 0),
(40, '格子', 0),
(41, 'Boyfriend', 0),
(42, 'Oversize', 0),
(43, '单鞋', 0),
(44, '人字拖', 0),
(45, '高跟鞋', 0),
(46, '平底鞋', 0),
(47, '鱼嘴鞋', 0),
(48, '凉鞋', 0),
(49, '粗跟鞋', 0),
(50, '厚底鞋', 0),
(51, '细跟鞋', 0),
(52, '休闲鞋', 0),
(53, '帆布鞋', 0),
(54, '松糕鞋', 0),
(55, '坡跟鞋', 0),
(56, '罗马鞋', 0),
(57, '运动鞋', 0),
(58, '豆豆鞋', 0),
(59, '系带', 0),
(60, '坡跟', 0),
(61, '铆钉', 0),
(62, '粗跟', 0),
(63, '尖头', 0),
(64, '防水台', 0),
(65, '拼接', 0),
(66, '流苏', 0),
(67, '玛丽珍鞋', 0),
(68, '圆头', 0),
(69, '方头', 0),
(70, '厚底', 0),
(71, '细跟', 0),
(72, '名媛', 0),
(73, '英伦', 0),
(74, '朋克', 0),
(75, '性感', 0),
(76, '优雅', 0),
(77, '编织包', 0),
(78, '钱包', 0),
(79, '方扣包', 0),
(80, '斜挎包', 0),
(81, '化妆包', 0),
(82, '果冻包', 0),
(83, '单肩包', 0),
(84, '双肩包', 0),
(85, '手拿包', 0),
(86, '手提包', 0),
(87, '复古包', 0),
(88, '零钱包', 0),
(89, '帆布包', 0),
(90, '水桶包', 0),
(91, '链条包', 0),
(92, '晚宴包', 0),
(93, '环保袋', 0),
(94, '行李箱', 0),
(95, '机车包', 0),
(96, '笑脸包', 0),
(97, '信封包', 0),
(98, '流苏包', 0),
(99, '菱格包', 0),
(100, '外贸', 0),
(101, '环保', 0),
(102, '链条', 0),
(103, '蝴蝶结', 0),
(104, '水钻', 0),
(105, '菱形格', 0),
(106, '代购', 0),
(107, '动物纹', 0),
(108, '项链', 0),
(109, '手表', 0),
(110, '耳钉', 0),
(111, '发箍', 0),
(112, '耳环', 0),
(113, '手链', 0),
(114, '钥匙链', 0),
(115, '细腰带', 0),
(116, '发圈', 0),
(117, '墨镜', 0),
(118, '戒指', 0),
(119, '胸针', 0),
(120, '镜框', 0),
(121, '丝袜', 0),
(122, '腰带', 0),
(123, '手镯', 0),
(124, '丝巾', 0),
(125, '脚链', 0),
(126, '腰封', 0),
(127, '发夹', 0),
(128, '假领子', 0),
(129, '发带', 0),
(130, '袜套', 0),
(131, '军帽', 0),
(132, '草帽', 0),
(133, '吊坠', 0),
(134, '锁骨链', 0),
(135, '头巾', 0),
(136, '假领', 0),
(137, '草编帽', 0),
(138, '遮阳帽', 0),
(139, '宽沿帽', 0),
(140, '怀表', 0),
(141, '马术帽', 0),
(142, '个性', 0),
(143, '摇滚', 0),
(144, '玉', 0),
(145, '银饰', 0),
(146, '镶钻', 0),
(147, '水晶', 0),
(148, '羽毛', 0),
(149, '24k金', 0),
(150, '花朵', 0),
(151, '玫瑰金', 0),
(152, '美白', 0),
(153, '保湿', 0),
(154, '祛痘', 0),
(155, '抗敏', 0),
(156, '遮瑕', 0),
(157, '祛斑', 0),
(158, '控油', 0),
(159, '补水', 0),
(160, '去黑头', 0),
(161, '收毛孔', 0),
(162, '去眼袋', 0),
(163, '防晒霜', 0),
(164, '喷雾', 0),
(165, '卸妆油', 0),
(166, '洗面奶', 0),
(167, '面膜', 0),
(168, '眼霜', 0),
(169, '化妆水', 0),
(170, '面霜', 0),
(171, '隔离霜', 0),
(172, '吸油面纸', 0),
(173, '药妆', 0),
(174, '香水', 0),
(175, '指甲油', 0),
(176, '睫毛膏', 0),
(177, 'BB霜', 0),
(178, '粉饼', 0),
(179, '蜜粉', 0),
(180, '口红', 0),
(181, '腮红', 0),
(182, '眼影', 0),
(183, '眉笔', 0),
(184, '唇彩', 0),
(185, '眼线膏', 0),
(186, '手工皂', 0),
(187, '沐浴露', 0),
(188, '美颈霜', 0),
(189, '身体乳', 0),
(190, '护手霜', 0),
(191, '假发', 0),
(192, '发蜡', 0),
(193, '弹力素', 0),
(194, '发膜', 0),
(195, '蓬蓬粉', 0),
(196, '染发膏', 0),
(197, '倩碧', 0),
(198, 'kose', 0),
(199, '雅漾', 0),
(200, '资生堂', 0),
(201, 'DHC', 0),
(202, '丝芙兰', 0),
(203, 'Benefit', 0),
(204, '植村秀', 0),
(205, 'the', 0),
(206, 'face', 0),
(207, 'shop', 0),
(208, 'MAC', 0),
(209, '科颜氏', 0),
(210, 'OPI', 0),
(211, '欧舒丹', 0),
(212, '书柜', 0),
(213, '烛台', 0),
(214, '墙贴', 0),
(215, '摆件', 0),
(216, '桌布', 0),
(217, '落地灯', 0),
(218, '台灯', 0),
(219, '时钟', 0),
(220, '吊灯', 0),
(221, '吸顶灯', 0),
(222, '杯子', 0),
(223, '置物架', 0),
(224, '香薰', 0),
(225, '地毯', 0),
(226, '收纳', 0),
(227, '沙发', 0),
(228, '茶几', 0),
(229, '搁板', 0),
(230, '电视柜', 0),
(231, '椅子', 0),
(232, '桌子', 0),
(233, '坐垫', 0),
(234, '沙发垫', 0),
(235, '照片墙', 0),
(236, '相框', 0),
(237, '靠垫', 0),
(238, '床上用品', 0),
(239, '床', 0),
(240, '床头柜', 0),
(241, '衣柜', 0),
(242, '斗柜', 0),
(243, '窗帘', 0),
(244, '家居鞋', 0),
(245, '梳妆', 0),
(246, '盘碟', 0),
(247, '水壶', 0),
(248, '茶具', 0),
(249, '勺', 0),
(250, '筷子', 0),
(251, '饭盒', 0),
(252, '锅具', 0),
(253, '烘焙', 0),
(254, '烹饪', 0),
(255, '储物罐', 0),
(256, '调味瓶', 0),
(257, '餐垫', 0),
(258, '餐巾', 0),
(259, '毛巾', 0),
(260, '浴帘', 0),
(261, '浴室套件', 0),
(262, '皂液器', 0),
(263, '浴室垫', 0),
(264, '皂盒', 0),
(265, '衣架', 0),
(266, '马桶刷', 0),
(267, '挂钩', 0),
(268, '花瓶', 0),
(269, '仿真花', 0),
(270, '园艺工具', 0),
(271, '迷你植物', 0),
(272, '水培', 0),
(273, '多肉植物', 0),
(274, '花架', 0),
(275, '花盆', 0),
(276, '盆栽', 0),
(277, '遮阳伞', 0),
(278, '手机壳', 0),
(279, '马克杯', 0),
(280, '加湿器', 0),
(281, '风扇', 0),
(282, '首饰盒', 0),
(283, '抱枕', 0),
(284, '贴纸', 0),
(285, '玩偶', 0),
(286, 'LOMO', 0),
(287, '文具', 0),
(288, '本子', 0),
(289, '钥匙扣', 0),
(290, '古装', 0),
(291, '影楼', 0),
(292, '摄影写真', 0),
(293, '唐朝', 0),
(294, '新款', 0),
(295, 'cosplay', 0),
(296, '主题', 0),
(297, '蓝襦裙', 0),
(298, '吊带', 0),
(299, '露肩T恤', 0),
(300, '马夹', 0),
(301, '牛仔裙', 0),
(302, '印花T恤', 0),
(303, '牛仔衬衫', 0),
(304, '格子衬衫', 0),
(305, '抹胸裙', 0),
(306, '娃娃衫', 0),
(307, '马甲', 0),
(308, '字母T恤', 0),
(309, '蕾丝衫', 0),
(310, '牛仔背心', 0),
(311, '牛仔', 0),
(312, '斜肩', 0),
(313, '镂空', 0),
(314, '简约', 0),
(315, '波点', 0),
(316, '打底', 0),
(317, '男朋友', 0),
(318, '民族', 0),
(319, '雪纺裙', 0),
(320, '蓬蓬裙', 0),
(321, '百褶裙', 0),
(322, '波普', 0),
(323, '条纹', 0),
(324, '泡泡袖', 0),
(325, '显瘦', 0),
(326, '荷叶边', 0),
(327, '不规则', 0),
(328, '高腰', 0),
(329, '清新', 0),
(330, '牛仔裤', 0),
(331, '打底裤', 0),
(332, '五分裤', 0),
(333, '牛仔短裤', 0),
(334, '高腰裤', 0),
(335, '铅笔裤', 0),
(336, '阔腿裤', 0),
(337, '低腰裤', 0),
(338, '休闲裤', 0),
(339, '七分裤', 0),
(340, '工装裤', 0),
(341, '直筒裤', 0),
(342, '长裤', 0),
(343, '九分裤', 0),
(344, '低腰', 0),
(345, '磨旧', 0),
(346, '拉链', 0),
(347, '破洞', 0),
(348, '水洗', 0),
(349, '紧身', 0),
(350, '磨白', 0),
(351, '卷边', 0),
(352, '丹宁', 0),
(353, '百搭', 0),
(354, '街拍', 0),
(355, '文胸', 0),
(356, 'bra', 0),
(357, '瑜伽裤', 0),
(358, '睡衣', 0),
(359, '内裤', 0),
(360, '泳衣', 0),
(361, '安全裤', 0),
(362, '家居服', 0),
(363, '睡裙', 0),
(364, '胸贴', 0),
(365, '调整型内衣', 0),
(366, '无痕内衣', 0),
(367, '比基尼', 0),
(368, '隐形内衣', 0),
(369, '塑身', 0),
(370, '可爱', 0),
(371, '情侣', 0),
(372, '原单', 0),
(373, '莫代尔', 0),
(374, '唐装', 0),
(375, '贵妃', 0),
(376, '古筝', 0),
(377, '女式', 0),
(378, '仙女', 0),
(379, '古代', 0),
(380, '儿童', 0),
(381, '服饰', 0),
(382, '服装', 0),
(383, '改良', 0),
(384, '舞蹈', 0),
(385, '演出', 0),
(386, '英国', 0),
(387, '褶皱', 0),
(388, '春装', 0),
(389, '淑女', 0),
(390, '新品', 0),
(391, '时尚', 0),
(392, 'Oasis', 0),
(393, '4.30', 0),
(394, '夏装', 0),
(395, '金币', 0),
(396, '女装', 0),
(397, '收口', 0),
(398, '小辣椒', 0),
(399, '宫廷', 0),
(400, '夏季', 0),
(401, 'L10008', 0),
(402, '春夏', 0),
(403, '童话', 0),
(404, '2012', 0),
(405, '米亚', 0),
(406, '波西', 0),
(407, '女裙', 0),
(408, '百褶', 0),
(409, '糖果', 0),
(410, '伊人', 0),
(411, '荷叶', 0),
(412, '秋水', 0),
(413, '修身', 0),
(414, '专柜', 0),
(415, '正品', 0),
(416, '无袖', 0),
(417, '夏新', 0),
(418, '超大', 0),
(419, '沙滩', 0),
(420, '连身', 0),
(421, '真丝', 0),
(422, '宽松', 0),
(423, '绣花', 0),
(424, '紫色', 0),
(425, '蓝色', 0),
(426, '装饰', 0),
(427, '喜喜', 0),
(428, '秀大', 0),
(429, '全新', 0),
(430, '米亚风', 0),
(431, '一下', 0),
(432, '评论', 0),
(433, '什么', 0),
(434, '漂亮', 0),
(435, '色彩斑斓', 0),
(436, '裙子', 0),
(437, '装扮', 0),
(438, '味道', 0),
(439, '群舞', 0),
(440, '飞扬', 0),
(441, '魅力', 0),
(442, '浪漫', 0),
(443, '秋水伊人', 0),
(444, '知名品牌', 0),
(445, '货到付款', 0),
(446, '原价', 0),
(447, '112102033', 0),
(448, '韩版', 0),
(449, '短袖', 0),
(450, '8338622', 0),
(451, '松紧', 0),
(452, '紫藤', 0),
(453, '发饰', 0),
(454, '韩国', 0),
(455, '头饰', 0),
(456, '香蕉', 0),
(457, '进口', 0),
(458, 'tb455', 0),
(459, '围巾', 0),
(460, '早安', 0),
(461, '羚羊', 0),
(462, '国风', 0),
(463, '披肩', 0),
(464, '柔软', 0),
(465, '气质', 0),
(466, '女士', 0),
(467, '云鹤竹', 0),
(468, '女包', 0),
(469, '手提', 0),
(470, '包包', 0),
(471, '6119', 0),
(472, '112102032', 0),
(473, '特卖', 0),
(474, '112102110', 0),
(475, '品牌', 0),
(476, '双肩', 0),
(477, '红色', 0),
(478, '中长', 0),
(479, '热卖', 0),
(480, '当当', 0),
(481, 'OSA2012', 0),
(482, '品质', 0),
(483, '包邮', 0),
(484, '淘宝', 0),
(485, '抓取', 0),
(486, '宝贝', 0),
(487, '圆领', 0),
(488, '双层', 0),
(489, '韩版女', 0),
(490, '中国', 0),
(491, '甘婷婷', 0),
(492, '爱心', 0),
(493, '彩色', 0),
(494, '513', 0),
(495, '112', 0),
(496, '层次感', 0),
(497, '孔雀', 0),
(498, '高腰收', 0),
(499, '477', 0),
(500, '144', 0),
(501, '太阳花', 0),
(502, '长袖', 0),
(503, '481', 0),
(504, '套头', 0),
(505, '立领', 0),
(506, '钩花', 0),
(507, '涂鸦', 0),
(508, '742', 0),
(509, '083', 0),
(510, 'adsfasdfsadf', 0),
(511, '花边', 0),
(512, '蛋糕', 0),
(513, '154', 0),
(514, '大众', 0),
(515, '情人', 0),
(516, '不错', 0),
(517, '诱惑', 0),
(518, '连衣', 0),
(519, '退换货', 0),
(520, 'WRDDX11757', 0),
(521, '高品质', 0),
(522, '111', 0),
(523, '173', 0),
(524, '限时', 0),
(525, '特惠', 0),
(526, 'asdfasdfasdf', 0),
(527, '发生', 0),
(528, '温柔', 0),
(529, '感觉', 0),
(530, '喜欢', 0),
(531, '飘逸', 0),
(532, '古典', 0),
(533, '数码', 0),
(534, '374', 0),
(535, 'QCL', 0),
(536, '花色', 0),
(537, '原创', 0),
(538, '89', 0),
(539, '艾菲', 0),
(540, '依依', 0),
(541, 'Q3120301I', 0),
(542, '绿色', 0),
(543, '天空', 0),
(544, '扇', 0),
(545, '蓝绿色', 0),
(546, '田园', 0),
(547, 'Candy', 0),
(548, '白格', 0),
(549, '纯棉', 0),
(550, '121302099', 0),
(551, '12Q3', 0),
(552, '1220', 0),
(553, 'Betu', 0),
(554, '12Q2', 0),
(555, '15', 0),
(556, '09', 0),
(557, 'GS0938', 0),
(558, '韩都衣', 0),
(559, '高领', 0),
(560, '羊毛', 0),
(561, 'I9443', 0),
(562, 'WORLD', 0),
(563, '黄灰', 0),
(564, '超宽', 0),
(565, '件套', 0),
(566, 'DL404522', 0),
(567, '白色', 0),
(568, '言若】', 0),
(569, '10110072', 0),
(570, 'LIFEHOME', 0),
(571, '梦幻', 0),
(572, '生活', 0),
(573, '牛皮', 0),
(574, '灰色', 0),
(575, '苏黑', 0),
(576, '041', 0),
(577, '07', 0),
(578, 'ZA', 0),
(579, '收纳柜', 0),
(580, '古韵', 0),
(581, '好事', 0),
(582, '1021', 0),
(583, '纱帘', 0),
(584, '幅宽', 0),
(585, '玫瑰', 0),
(586, 'YJCS005', 0),
(587, '米一片', 0),
(588, '2.5', 0),
(589, '维科', 0),
(590, '花飞', 0),
(591, '斜纹', 0),
(592, '家纺', 0),
(593, '套件', 0),
(594, '全棉', 0),
(595, '物语', 0),
(596, '七彩', 0),
(597, '阳光', 0),
(598, '福田', 0),
(599, '蚕丝', 0),
(600, '润肤', 0),
(601, '日用', 0),
(602, 'yealotus', 0),
(603, 'KDB', 0),
(604, 'LP', 0),
(605, '半身', 0),
(606, '套装', 0),
(607, '加大', 0),
(608, '1610', 0),
(609, '高端', 0),
(610, '定制', 0),
(611, '高贵', 0),
(612, '女款', 0),
(613, '胭脂', 0),
(614, '长袖T恤', 0),
(615, '基础', 0),
(616, 'VT', 0),
(617, '博洋', 0),
(618, '婉丽', 0),
(619, '美宝莲', 0),
(620, '浓密', 0),
(621, '防水', 0),
(622, '黑色', 0),
(623, '8.8', 0),
(624, 'ml', 0),
(625, '洗液', 0),
(626, '肌肤', 0),
(627, 'Summer''s', 0),
(628, '敏感', 0),
(629, '专用', 0),
(630, '女性', 0),
(631, '237ml', 0),
(632, '夏依', 0),
(633, '玫琳凯', 0),
(634, '磨砂膏', 0),
(635, '异域风情', 0),
(636, '系列', 0),
(637, '150g', 0),
(638, '珍珠', 0),
(639, '立体', 0),
(640, '镂花', 0),
(641, '唯美', 0),
(642, '内衣', 0),
(643, '古今', 0),
(644, '08313', 0),
(645, '2000', 0),
(646, '衬衣', 0),
(647, 'H1010803', 0),
(648, 'SHOW', 0),
(649, '2011', 0),
(650, 'HOPE', 0),
(651, '莱尔斯', 0),
(652, '3M55201OWK', 0),
(653, '埃菲尔', 0),
(654, '蒂斯特', 0),
(655, '阿尔法', 0),
(656, '单肩', 0),
(657, '流年', 0),
(658, '凝胶', 0),
(659, '冰凉', 0),
(660, '按摩', 0),
(661, '身体', 0),
(662, 'Betty', 0),
(663, 'Jcare', 0),
(664, '180g', 0),
(665, 'Boop', 0),
(666, '三重', 0),
(667, '超凡', 0),
(668, '隔离', 0),
(669, '滋润', 0),
(670, 'Clinique', 0),
(671, '防护', 0),
(672, 'SPF25', 0),
(673, '15ml', 0),
(674, 'PA', 0),
(675, '6891', 0),
(676, '包邮】', 0),
(677, '892', 0),
(678, '爪牙', 0),
(679, '清仓', 0),
(680, '年中', 0),
(681, '瑞丽', 0),
(682, '瑞士', 0),
(683, '涟漪', 0),
(684, 'AAA', 0),
(685, '奥地利', 0),
(686, '摩天轮', 0),
(687, '幸福', 0),
(688, '毛衣链', 0),
(689, '施华', 0),
(690, '毛衣', 0),
(691, '元素', 0),
(692, '采用', 0),
(693, '洛世奇', 0),
(694, '1295', 0),
(695, 'T400', 0),
(696, '杏色', 0),
(697, '艾夫斯', 0),
(698, 'G21212119002', 0),
(699, '日韩', 0),
(700, '洁面霜', 0),
(701, '银杏', 0),
(702, '泡沫', 0),
(703, 'CHARMZONE', 0),
(704, '天然', 0),
(705, '200g', 0),
(706, '雅顿', 0),
(707, '茶香', 0),
(708, 'ElizabethArden', 0),
(709, '500ml', 0),
(710, '赛金格', 0),
(711, '耳坠', 0),
(712, '两用', 0),
(713, '完美', 0),
(714, 'Ria', 0),
(715, '毛条', 0),
(716, '华丽', 0),
(717, '羽绒服', 0),
(718, '拎袋', 0);

-- --------------------------------------------------------

--
-- 表的结构 `pin_group`
--

DROP TABLE IF EXISTS `pin_group`;
CREATE TABLE `pin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT '',
  `banner` varchar(100) DEFAULT '',
  `fans_count` int(11) NOT NULL DEFAULT '0',
  `share_count` int(11) NOT NULL DEFAULT '0',
  `preface` varchar(300) DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `follow_count` int(11) NOT NULL DEFAULT '0' COMMENT '关注（粉丝）数量',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_group_category`
--

DROP TABLE IF EXISTS `pin_group_category`;
CREATE TABLE `pin_group_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `group_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_group_category`
--

INSERT INTO `pin_group_category` (`id`, `name`, `sortnum`, `group_count`) VALUES
(1, '欧美', 1, 0),
(2, '甜美', 2, 0),
(3, '复古', 3, 0),
(4, '个性', 4, 0),
(5, '日系', 5, 0),
(6, '韩范', 6, 0),
(7, '品牌', 7, 0),
(8, '家居', 8, 0),
(9, '萌物', 9, 0);

-- --------------------------------------------------------

--
-- 表的结构 `pin_group_follow`
--

DROP TABLE IF EXISTS `pin_group_follow`;
CREATE TABLE `pin_group_follow` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_help`
--

DROP TABLE IF EXISTS `pin_help`;
CREATE TABLE `pin_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(90) NOT NULL,
  `content` text NOT NULL,
  `sortnum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_help`
--

INSERT INTO `pin_help` (`id`, `title`, `content`, `sortnum`) VALUES
(1, '美丽说是什么', '<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	1. 美丽说是什么？\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	美丽说是与最会网购的MM一起逛街，挑衣服的地方，是败家MM分享网购衣服经验的圣地。扮美达人与数百万买家聚集在这里，分享网购经验，发表对宝贝和店铺的真切评价，晒真人搭配，为你推荐衣服、帮你找差价、回答你关于搭配与护肤的各种问题。网购挑衣服，先来美丽说。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	这里有：\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	最有型的网购买家-看数百万买家交流风格品位—\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	最漂亮的淘宝单品-每一件都是真人推荐，只分享我喜欢的—去挑衣服。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	最便宜的网购价格-我们都爱白菜价。去团购\r\n</p>\r\n<div style="margin:0px;padding:0px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n</div>\r\n<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	2.	美丽说怎么玩？美丽说新人必看\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	美丽说的乐趣是与最会逛街的MM们边逛边聊边长草。三步教你玩转美丽说：\r\n</p>\r\n<div style="margin:0px;padding:0px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n</div>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	（1）找到最会逛街的MM，关注她们，看她们每天的私房分享：\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	美丽说有数百万买家与各种搭配高手，关注她们，在“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”能第一时间看到她们的分享的衣服与败家心得，参加讨论或者跟随购买。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	<a href="http://www.meilishuo.com/findfs/main/recommend" target="_blank">去找达人</a> \r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	（2） 加入大家的逛街现场，看大家都在推荐什么，今天有什么衣服值得买：<br />\r\n逛宝贝频道是大家的逛街现场，所有衣服、包包、鞋子、护肤品都来自纯买家们的真人推荐，绝无广告。<br />\r\n<a href="http://www.meilishuo.com/goods" target="_blank">去挑衣服</a> \r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	（3）分享自己喜欢的衣服，看看大家对你眼光的评价，结识网购闺蜜。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	网购时发现喜欢的衣服想推荐给别人，或者购买时拿不定主意。都可以分享到美丽说。过程很简单，把网购宝贝的链接复制下来，粘贴到“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”发表框中，点“发布”，美丽说会自动抓取商品的图片与链接，补充完你的评语或问题后，再点“完成”，关注你的人就会看到你的推荐了。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	如果有人喜欢你推荐的宝贝，你会收到一颗小红心。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	<a href="http://www.meilishuo.com/home" target="_blank">去我的首页</a>开始分享\r\n</p>', 100),
(2, '如何在美丽说找到自己喜欢的宝贝 ', '<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	1.	美丽说的宝贝都是从哪里来的？\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	美丽说的每一件宝贝都来自纯买家MM们的真人分享，真心推荐，带有网购链接，每一件都买的到。\r\n</p>\r\n<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	2. 在哪里可以找宝贝？\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	三种方式找到心水宝贝：<br />\r\n1）	关注美丽说推荐的扮美达人，她们最新的推荐会出现在“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”。根据自己的风格、喜好关注你喜欢的MM，“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”上出现的宝贝，会越来越贴近你的喜好。<br />\r\n2）	去“<a href="http://www.meilishuo.com/goods" target="_blank">逛宝贝</a>”看看热门的宝贝。 逛宝贝频道里有社区里最新、最热的宝贝分享。衣服、包包、鞋子、化妆品应有尽有。<br />\r\n3）	使用搜索，查找你想要的商品。美丽说的每一件宝贝都来自真人推荐，质量是有口碑保证的哟。\r\n</p>\r\n<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	3. 美丽说里会不会有很多广告？\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	不会，美丽说是纯买家MM聚集的地方。我们对用户进行“纯买家网购身份验证”，杜绝卖家以买家身份在社区里广告。\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	如果是心级买家，用户名后面会有这样的小图标：<img src="http://imgtest.meiliworks.com/css/images/twitter_tools/v.gif" />\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	如果是黄钻买家，用户名后面会有这样的小图标：<img src="http://imgtest.meiliworks.com/css/images/twitter_tools/diamond.gif" />\r\n</p>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	美丽说里也有部分在淘宝开店的用户，社区要求她们进行“商家认证”。是否是卖家，在社区里一目了然。如果是商家，用户名后会有这样的小图标：<span><img src="http://imgtest.meiliworks.com/css/images/twitter_tools/s.gif" /></span>\r\n</p>', 99),
(3, '如何把自己喜欢的宝贝分享到美丽说 ', '<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	1.	如何把自己喜欢的宝贝分享到美丽说？\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	过程很简单哦，你只需把网购宝贝的链接复制下来，黏贴到“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”发表框中，然后点“发布”，美丽说会自动抓取宝贝的图片与链接，补充完你的评语或问题后，再点“完成”就可以啦！<br />\r\n<a href="http://www.meilishuo.com/home" target="_blank">去分享宝贝</a>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		2.小红心是什么？\r\n	</h4>\r\n	<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		当你分享的宝贝有MM喜欢时，你就会收到她为你送上的小红心<img src="http://imgtest.meiliworks.com/css/images/twitter_tools/I_loveit.gif" />\r\n	</p>\r\n	<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		你收到的小红心越多，就代表有越多的MM喜欢了你推荐的宝贝。说明你是个时尚的妞！喜欢其他MM推荐的宝贝时，不要吝啬哦，也送她一颗小红心吧。<br />\r\n在你喜欢的宝贝图片下点击“我喜欢”，你就可送上你充满爱意的小红心啦！\r\n	</p>\r\n	<p>\r\n		<br />\r\n	</p>\r\n</p>', 98),
(4, '如何在美丽说找到合适的逛街闺蜜 ', '<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	1. 关注达人\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	1）	你在注册美丽说时，美丽说会先为你推荐热门的网购达人，你只用点击关注，就可以第一时间了解这些达人在美丽说的最新动态；<br />\r\n2）美丽说在“我的首页”每天还会向你推荐一个精选的“今日达人”供你选择；<br />\r\n3）在逛美丽说时，发现喜欢的宝贝，也可以向分享这个宝贝的达人添加关注，交到合适的逛街闺蜜；\r\n</p>\r\n<div style="margin:0px;padding:0px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n</div>\r\n<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	2.	邀请朋友来美丽说边聊边逛\r\n</h4>\r\n<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n	你可通过MSN，Email，人人等方式，邀请你的好友加入美丽说，收到邀请的姐妹在注册美丽说后就会自动关注你！朋友的加入可以让你们边聊边逛哦！<a href="http://www.meilishuo.com/findfs/invite/inv" target="_blank">去邀请朋友</a>\r\n</p>\r\n<div>\r\n	<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		3. 什么是达人?\r\n	</h4>\r\n	<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		美丽达人是指网购经验丰富的网购MM，你可以通过申请成为网购达人。在“<a href="http://www.meilishuo.com/home" target="_blank">我的首页</a>”右侧“今日达人”下，点击<a href="http://www.meilishuo.com/topic/hot/30956" target="_blank">申请成为美丽达人</a>\r\n	</p>\r\n	<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		4.	什么是黄钻买家与心级买家?\r\n	</h4>\r\n	<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		美丽说的定位是纯买家网购微博，为了避免广告、创造真实健康的社区环境，美丽说号召MM们申请纯买家认证。<br />\r\n纯买家中含有黄钻买家和心级买家，都是指淘宝买家的信用评级。<br />\r\n心级买家是指在淘宝网交易后，所积累的信用度评级达到心级买家的MM。黄钻买家是指在淘宝的购物较多，作为买家的信用积分达到251分之后，获得的黄钻头衔的MM。\r\n	</p>\r\n	<h4 style="font-size:14px;color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		5.	什么是美丽说特别认证？\r\n	</h4>\r\n	<p style="color:#666666;font-family:Arial;background-color:#FFFFFF;">\r\n		美丽说特别认证时专门为时尚从业者，或知名社区版主或达人设置的认证。\r\n	</p>\r\n<br />\r\n</div>', 97);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `pin_item`
--
DROP VIEW IF EXISTS `pin_item`;
CREATE TABLE `pin_item` (
`id` varchar(17)
,`type` varchar(5)
,`item_id` int(11)
,`user_id` int(11)
);
-- --------------------------------------------------------

--
-- 表的结构 `pin_navlink`
--

DROP TABLE IF EXISTS `pin_navlink`;
CREATE TABLE `pin_navlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `sortnum` int(11) NOT NULL DEFAULT '0',
  `level` varchar(30) DEFAULT NULL,
  `target` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_navlink`
--

INSERT INTO `pin_navlink` (`id`, `name`, `title`, `url`, `sortnum`, `level`, `target`) VALUES
(2, '论坛', '进入论坛', '/bbs/', 9, '一级导航', '当前窗口');

-- --------------------------------------------------------

--
-- 表的结构 `pin_share`
--

DROP TABLE IF EXISTS `pin_share`;
CREATE TABLE `pin_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quote` varchar(500) DEFAULT NULL,
  `from_group_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `last_collect_time` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_share_comment`
--

DROP TABLE IF EXISTS `pin_share_comment`;
CREATE TABLE `pin_share_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `collect_id` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`share_id`,`user_id`),
  KEY `collect_id` (`collect_id`),
  KEY `share_id` (`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_shop`
--

DROP TABLE IF EXISTS `pin_shop`;
CREATE TABLE `pin_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `tags` text,
  `nick` varchar(250) DEFAULT NULL COMMENT '卖家昵称',
  `url` varchar(250) NOT NULL,
  `share_count` int(11) NOT NULL DEFAULT '0',
  `brand` varchar(30) DEFAULT NULL,
  `brand_intro` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='好店';

-- --------------------------------------------------------

--
-- 表的结构 `pin_shop_category`
--

DROP TABLE IF EXISTS `pin_shop_category`;
CREATE TABLE `pin_shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT '父类ID',
  `name` varchar(256) NOT NULL COMMENT '栏目名称',
  `sortnum` int(11) NOT NULL DEFAULT '0' COMMENT '排序数字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='店铺分类';

--
-- 转存表中的数据 `pin_shop_category`
--

INSERT INTO `pin_shop_category` (`id`, `parent_id`, `name`, `sortnum`) VALUES
(1, 0, '风格', 1),
(2, 0, '看点', 2),
(3, 1, '日韩杂志款', 1),
(4, 1, '小清新混搭', 2),
(5, 1, '欧美高街', 3),
(6, 1, '休闲混搭', 4),
(7, 2, '外贸原单', 1),
(8, 2, '潮流女鞋', 2),
(9, 2, '流行饰品', 3),
(10, 2, '包包手袋', 4),
(11, 2, '手套配件', 5);

-- --------------------------------------------------------

--
-- 表的结构 `pin_slideshow`
--

DROP TABLE IF EXISTS `pin_slideshow`;
CREATE TABLE `pin_slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(90) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `sortnum` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_slideshow`
--

INSERT INTO `pin_slideshow` (`id`, `title`, `url`, `image`, `token`, `sortnum`, `created`) VALUES
(1, '首页测试幻灯1', '#', '/upload/slideshow/13448384678035.jpg', '首页640*240', 1, 1344838467),
(2, '首页测试幻灯2', '#', '/upload/slideshow/13448390104833.jpg', '首页640*240', 0, 1344839010),
(3, '首页测试幻灯3', '#', '/upload/slideshow/13448390293414.jpg', '首页640*240', 3, 1344839029),
(4, '首页测试幻灯4', '#', '/upload/slideshow/13448390425228.jpg', '首页640*240', 0, 1344839042),
(5, '逛宝贝1', '#', '/upload/slideshow/13448438301659.jpg', '逛宝贝100%*100', 0, 1344843830),
(6, '逛宝贝2', '#', '/upload/slideshow/13448438727264.jpg', '逛宝贝100%*100', 0, 1344843872),
(7, '逛宝贝3', '#', '/upload/slideshow/13448447743117.jpg', '逛宝贝100%*100', 0, 1344844774);

-- --------------------------------------------------------

--
-- 表的结构 `pin_sysmsg`
--

DROP TABLE IF EXISTS `pin_sysmsg`;
CREATE TABLE `pin_sysmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_trial`
--

DROP TABLE IF EXISTS `pin_trial`;
CREATE TABLE `pin_trial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `product_intro` text NOT NULL,
  `product_url` varchar(250) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `apply_count` int(11) NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_trial_comment`
--

DROP TABLE IF EXISTS `pin_trial_comment`;
CREATE TABLE `pin_trial_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trial_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trial_goods_id` (`trial_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_trial_order`
--

DROP TABLE IF EXISTS `pin_trial_order`;
CREATE TABLE `pin_trial_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trial_id` (`trial_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_user`
--

DROP TABLE IF EXISTS `pin_user`;
CREATE TABLE `pin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `gender` enum('男','女') NOT NULL,
  `created` datetime NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `this_login_time` datetime DEFAULT NULL,
  `last_login_ip` varchar(30) DEFAULT NULL,
  `this_login_ip` varchar(30) DEFAULT NULL,
  `qq_openid` varchar(32) DEFAULT NULL,
  `sinaweibo_uid` bigint(20) DEFAULT NULL,
  `taobao_user_id` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `realname` varchar(30) NOT NULL DEFAULT '',
  `birthdate` date DEFAULT NULL,
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `school` varchar(50) DEFAULT '',
  `company` varchar(50) DEFAULT '',
  `career` varchar(30) DEFAULT '',
  `hooby` varchar(500) DEFAULT '',
  `weibo` varchar(100) DEFAULT '',
  `signature` varchar(500) DEFAULT '',
  `avatar` varchar(100) DEFAULT '',
  `shipping_realname` varchar(30) DEFAULT NULL,
  `shipping_address` varchar(100) DEFAULT NULL,
  `shipping_postcode` varchar(6) DEFAULT NULL,
  `shipping_mobile` varchar(11) DEFAULT NULL,
  `qq` varchar(30) DEFAULT NULL,
  `msn` varchar(100) DEFAULT NULL,
  `fans_count` int(11) NOT NULL DEFAULT '0' COMMENT '关注我的人数',
  `follow_count` int(11) NOT NULL DEFAULT '0' COMMENT '我关注的人数',
  `likeme_count` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢我的分享的人数',
  `share_count` int(11) NOT NULL DEFAULT '0' COMMENT '分享数量',
  `deleted_sysmsg_ids` text COMMENT '已删除的系统消息id',
  `tag_ids` varchar(300) DEFAULT NULL COMMENT '用户标签',
  `credit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_user_like_share`
--

DROP TABLE IF EXISTS `pin_user_like_share`;
CREATE TABLE `pin_user_like_share` (
  `share_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `share_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`share_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pin_user_tag`
--

DROP TABLE IF EXISTS `pin_user_tag`;
CREATE TABLE `pin_user_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pin_user_tag`
--

INSERT INTO `pin_user_tag` (`id`, `name`, `user_id`) VALUES
(1, '擅长找白菜', 0),
(2, '擅长找差价', 0),
(3, '擅长找同款', 0),
(4, '擅长找原单', 0),
(5, '擅长组团', 0),
(6, '擅长找好店', 0),
(7, '擅长护肤', 0),
(8, '擅长彩妆', 0),
(9, '擅长护发', 0),
(10, '擅长减重', 0),
(11, '擅长淘包包', 0),
(12, '擅长淘配饰', 0),
(13, '擅长淘鞋子', 0),
(14, '格子控', 0),
(15, '细节控', 0),
(16, '豹纹控', 0),
(17, '黑色控', 0),
(18, '丝袜控', 0),
(19, '色彩控', 0),
(20, '条纹控', 0),
(21, '波点控', 0),
(22, '白菜控', 0),
(23, '蓝色控', 0),
(24, '衬衫控', 0),
(25, '蕾丝控', 0),
(26, '原单控', 0),
(27, '美瞳控', 0),
(28, '蝴蝶结控', 0),
(29, '粉色控', 0),
(30, '鞋子控', 0),
(31, '牛仔控', 0),
(32, '碎花控', 0),
(33, '平底鞋控', 0),
(34, '高跟鞋控', 0),
(35, '真丝控', 0),
(36, '护肤控', 0),
(37, '饰品控', 0),
(38, '面膜控', 0),
(39, '棉麻控', 0),
(40, '指甲油控', 0),
(41, '裸色控', 0),
(42, '内衣控', 0),
(43, '包包控', 0),
(44, '美白控', 0),
(45, '雪纺控', 0),
(46, '彩妆控', 0),
(47, '白色控', 0),
(48, '军绿控', 0),
(49, '纯色控', 0),
(50, '帆布鞋控', 0),
(51, '坡跟鞋控', 0),
(52, '减重控', 0),
(53, '祛痘控', 0),
(54, '美黑控', 0),
(55, '护发控', 0),
(56, '学院风格', 0),
(57, '欧美风格', 0),
(58, '混搭风格', 0),
(59, '甜美风格', 0),
(60, '清新风格', 0),
(61, '英伦风格', 0),
(62, 'vintage复古风格', 0),
(63, 'BF风格', 0),
(64, '极简风格', 0),
(65, '中性风格', 0),
(66, '朋克风格', 0),
(67, '摇滚风格', 0),
(68, '森女风格', 0),
(69, '洛丽塔风格', 0),
(70, '公主风格', 0),
(71, '名媛风格', 0),
(72, '波西米亚风格', 0),
(73, '民族风格', 0),
(74, '休闲风格', 0),
(75, '御姐风格', 0),
(76, '性感风格', 0),
(77, '模特', 0),
(78, '造型师', 0),
(79, '品牌工作人员', 0),
(80, '美容编辑', 0),
(81, '时尚编辑', 0),
(82, '时尚媒体', 0),
(83, '时装买手', 0),
(84, '我在其它网站是达人', 0);

-- --------------------------------------------------------

--
-- 视图结构 `pin_item`
--
DROP TABLE IF EXISTS `pin_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pin_item` AS select concat('group_',`pin_group`.`id`) AS `id`,'group' AS `type`,`pin_group`.`id` AS `item_id`,`pin_group`.`user_id` AS `user_id` from `pin_group` union select concat('share_',`pin_share`.`id`) AS `id`,'share' AS `type`,`pin_share`.`id` AS `item_id`,`pin_share`.`user_id` AS `user_id` from `pin_share`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
