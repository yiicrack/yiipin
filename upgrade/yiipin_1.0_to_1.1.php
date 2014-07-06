<?php

// Yiipin升级程序

@set_time_limit(1000);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@set_magic_quotes_runtime(0);

class dbstuff {
    var $querynum = 0;
    var $link;
    var $histories;
    var $time;
    var $tablepre;

    function connect($dbhost, $dbuser, $dbpw, $dbname = '', $dbcharset, $pconnect = 0, $tablepre='', $time = 0) {
        $this->time = $time;
        $this->tablepre = $tablepre;
        if($pconnect) {
            if(!$this->link = mysql_pconnect($dbhost, $dbuser, $dbpw)) {
                $this->halt('Can not connect to MySQL server');
            }
        } else {
            if(!$this->link = mysql_connect($dbhost, $dbuser, $dbpw, 1)) {
                $this->halt('Can not connect to MySQL server');
            }
        }

        if($this->version() > '4.1') {
            if($dbcharset) {
                mysql_query("SET character_set_connection=".$dbcharset.", character_set_results=".$dbcharset.", character_set_client=binary", $this->link);
            }

            if($this->version() > '5.0.1') {
                mysql_query("SET sql_mode=''", $this->link);
            }
        }

        if($dbname) {
            mysql_select_db($dbname, $this->link);
        }

    }

    function fetch_array($query, $result_type = MYSQL_ASSOC) {
        return mysql_fetch_array($query, $result_type);
    }

    function result_first($sql, &$data) {
        $query = $this->query($sql);
        $data = $this->result($query, 0);
    }

    function fetch_first($sql, &$arr) {
        $query = $this->query($sql);
        $arr = $this->fetch_array($query);
    }

    function fetch_all($sql, &$arr) {
        $query = $this->query($sql);
        while($data = $this->fetch_array($query)) {
            $arr[] = $data;
        }
    }

    function cache_gc() {
        $this->query("DELETE FROM {$this->tablepre}sqlcaches WHERE expiry<$this->time");
    }

    function query($sql, $type = '', $cachetime = FALSE) {
        $func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ? 'mysql_unbuffered_query' : 'mysql_query';
        if(!($query = $func($sql, $this->link)) && $type != 'SILENT') {
            $this->halt('MySQL Query Error', $sql);
        }
        $this->querynum++;
        $this->histories[] = $sql;
        return $query;
    }

    function affected_rows() {
        return mysql_affected_rows($this->link);
    }

    function error() {
        return (($this->link) ? mysql_error($this->link) : mysql_error());
    }

    function errno() {
        return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
    }

    function result($query, $row) {
        $query = @mysql_result($query, $row);
        return $query;
    }

    function num_rows($query) {
        $query = mysql_num_rows($query);
        return $query;
    }

    function num_fields($query) {
        return mysql_num_fields($query);
    }

    function free_result($query) {
        return mysql_free_result($query);
    }

    function insert_id() {
        return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
    }

    function fetch_row($query) {
        $query = mysql_fetch_row($query);
        return $query;
    }

    function fetch_fields($query) {
        return mysql_fetch_field($query);
    }

    function version() {
        return mysql_get_server_info($this->link);
    }

    function close() {
        return mysql_close($this->link);
    }

    function halt($message = '', $sql = '') {
        echo($message.'<br /><br />'.$sql.'<br /> '.mysql_error());
        exit();
    }
}

function daddslashes($string) {
    if(is_array($string)) {
        foreach($string as $key => $val) {
            $string[$key] = daddslashes($val, $force);
        }
    } else {
        $string = addslashes($string);
    }
    return $string;
}

function runquery($query) {
    global $db, $tablepre;
    $expquery = explode(";", $query);
    foreach($expquery as $sql) {
        $sql = trim($sql);
        if($sql != "" && $sql[0] != "#") {
            $db->query(str_replace("pin_", $tablepre, $sql));
        }
    }
}

function dir_clear($dir) {
    $directory = dir($dir);
    while($entry = $directory->read()) {
        $filename = $dir.'/'.$entry;
        if(is_file($filename)) {
            @unlink($filename);
        }
    }
    $directory->close();
    @touch($dir.'/index.htm');
}

header("Content-Type: text/html; charset=UTF-8");

define('ROOT_PATH', dirname(__FILE__).'/');
$conf_file = dirname(__FILE__)."/protected/config/database.php";
if(!file_exists($conf_file)) {
	exit("无法找到数据库配置文件，请确认是将本文件放在YiiPin系统根目录");
}
$db_config = @include($conf_file);
if(!is_array($db_config))
{
    exit("无法读取数据库配置文件，请确认是将本文件放在YiiPin系统根目录");
}

$regex = '/mysql:host=(.+?);dbname=(.+$)/i';
preg_match($regex, $db_config['connectionString'], $matches);
$dbhost = $matches[1];
$dbname = $matches[2];
$dbuser = $db_config['username'];
$dbpw = $db_config['password'];
$tablepre = $db_config['tablePrefix'];
$pconnect = 0;


$action = ($_POST['action']) ? $_POST['action'] : $_GET['action'];
$step = $_GET['step'];
$start = $_GET['start'];

if(!$action) {
	echo"本程序用于升级 YiiPin 1.0(20121010) 到 YiiPin 1.1(20121101),请确认之前已经顺利安装 YiiPin 1.0(20121010)<br><br><br>";
	echo "请阅读升级教程：<a href=\"http://www.yiipin.com/thread-218-1-1.html\" target=\"_blank\">http://www.yiipin.com/thread-218-1-1.html</a><br /><br />";
	echo"<b><font color=\"red\">本升级程序只能从 YiiPin 1.0(20121010) 升级到 YiiPin 1.1(20121101),运行之前,请确认已经上传 YiiPin 1.1(20121101) 的全部文件和目录（注意排除不能覆盖的目录）</font></b><br>";
	echo"<b><font color=\"red\">升级前请打开浏览器 JavaScript 支持,整个过程是自动完成的,不需人工点击和干预.<br>升级之前务必备份修改过的文件和数据库资料,否则可能产生无法恢复的后果!<br></font></b><br><br>";
	echo"<b><font color=\"red\">升级后由于首页标签合成图生成规则发生变化，首页标签图将暂时为空白，只需给每个标签新分享一个商品进去即可恢复显示!<br></font></b><br><br>";
	echo"正确的升级方法为:<br>1. 关闭原有YiiPin网站,上传 YiiPin 1.1(20121101) 版的文件和目录(上述目录除外),覆盖服务器上的 YiiPin 1.0(20121010)<br>2. 上传本程序到 YiiPin 目录中;<br>4. 运行本程序,直到出现升级完成的提示;<br><br>";
	echo"<a href=\"$PHP_SELF?action=upgrade&step=1\">如果您已确认完成上面的步骤,请点这里升级</a>";
} else {

	$db = new dbstuff;
	$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	$db->query("SET NAMES 'utf8'");

	$sql =  <<<EOT
DROP TABLE IF EXISTS `pin_navlink`;
CREATE TABLE `pin_navlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sortnum` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `target` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `pin_navlink` (`id`, `name`, `title`, `url`, `sortnum`, `level`, `target`) VALUES
(1, '官方网站', 'YiiPin官方网站', 'http://www.yiipin.com', 10, '一级导航', '当前窗口'),
(2, '使用帮助', '获取YiiPin使用帮助', 'http://www.yiipin.com/forum.php', 8, '二级导航', '新窗口');
	        
DROP TABLE IF EXISTS `pin_shop`;
CREATE TABLE `pin_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `tags` text NOT NULL,
  `nick` varchar(250) NOT NULL COMMENT '卖家昵称',
  `url` varchar(250) NOT NULL,
  `share_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='好店';

DROP TABLE IF EXISTS `pin_shop_category`;
CREATE TABLE `pin_shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT '父类ID',
  `name` varchar(256) NOT NULL COMMENT '栏目名称',
  `sortnum` int(11) NOT NULL COMMENT '排序数字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='店铺分类';

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

ALTER TABLE `pin_goods`  ADD `shop_id` INT NOT NULL,  ADD INDEX (`shop_id`) ;
ALTER TABLE `pin_user`  ADD `taobao_user_id` BIGINT NOT NULL AFTER `sinaweibo_uid`;
ALTER TABLE `pin_goods` ADD  `delisted`  TINYINT( 1 ) NOT NULL;
ALTER TABLE `pin_goods`  ADD `taobao_seller_nick` VARCHAR(250) NOT NULL;

INSERT INTO `pin_config` (`key`, `value`) VALUES
('index_fluid', 0x733a313a2231223b),
('site_off', 0x733a313a2230223b);
	
EOT;
	
	runquery($sql);
	
	@touch(ROOT_PATH . '/protected/config/cache.lock');

	echo "恭喜您升级成功,请务必立即删除本程序.";

}


?>