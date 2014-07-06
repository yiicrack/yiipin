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
	echo"本程序用于升级 YiiPin 1.2(20121203) 到 YiiPin 1.3(20130130),请确认之前已经顺利安装 YiiPin 1.2(20121203)<br><br><br>";
	echo "请阅读升级教程：<a href=\"http://www.yiipin.com/thread-218-1-1.html\" target=\"_blank\">http://www.yiipin.com/thread-218-1-1.html</a><br /><br />";
	echo"<b><font color=\"red\">本升级程序只能从 YiiPin 1.2(20121203) 升级到 YiiPin 1.3(20130130),运行之前,请确认已经上传 YiiPin 1.3(20130130) 的全部文件和目录（注意排除不能覆盖的目录）</font></b><br>";
	echo"<b><font color=\"red\">升级前请打开浏览器 JavaScript 支持,整个过程是自动完成的,不需人工点击和干预.<br>升级之前务必备份修改过的文件和数据库资料,否则可能产生无法恢复的后果!<br></font></b><br><br>";
	echo"正确的升级方法为:<br>1. 关闭原有YiiPin网站,上传 YiiPin 1.3(20130130) 版的文件和目录(上述目录除外),覆盖服务器上的 YiiPin 1.2(20121203)<br>2. 上传本程序到 YiiPin 目录中;<br>4. 运行本程序,直到出现升级完成的提示;<br><br>";
	echo"<a href=\"$PHP_SELF?action=upgrade&step=1\">如果您已确认完成上面的步骤,请点这里升级</a>";
} else {

	$db = new dbstuff;
	$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	$db->query("SET NAMES 'utf8'");

	$sql =  <<<EOT
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
ALTER TABLE `pin_goods`  
ADD `taobao_commission_rate` INT NULL DEFAULT '0',  
ADD `taobao_commission` DECIMAL(10,2) NULL DEFAULT '0',  
ADD `taobao_commission_num` INT NULL DEFAULT '0',  
ADD `taobao_volume` INT NULL DEFAULT '0';
CREATE TABLE `pin_trial_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trial_id` (`trial_id`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE `pin_trial_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trial_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trial_id` (`trial_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE `pin_shop`  ADD `brand` VARCHAR(30) NULL AFTER `share_count`,  ADD `brand_intro` TEXT NULL AFTER `brand`;
ALTER TABLE `pin_share_comment`  ADD `username` VARCHAR(50) NULL;
UPDATE  `pin_share_comment` AS c SET `username` = (SELECT username FROM pin_user AS u WHERE u.id = c.user_id);           
ALTER TABLE `pin_goods_has_tag` ADD INDEX(`goods_id`);
ALTER TABLE `pin_goods_has_tag` ADD INDEX(`tag_id`);
ALTER TABLE `pin_share_comment` ADD INDEX(`share_id`);
ALTER TABLE `pin_goods`  ADD `image_w` INT NOT NULL DEFAULT '0' AFTER `image`,  ADD `image_h` INT NOT NULL DEFAULT '0' AFTER `image_w`;
ALTER TABLE `pin_goods` ADD INDEX(`item_key`);
ALTER TABLE `pin_goods_category_has_tag` ADD INDEX( `category_id`, `group`);
ALTER TABLE `pin_goods` ADD INDEX(`taobao_volume`);
ALTER TABLE `pin_share`  ADD `username` VARCHAR(50) NULL,  ADD `group_name` VARCHAR(50) NULL;
update `pin_share` s set username = (select username from `pin_user` u where u.id = s.user_id);
update `pin_share` s set group_name = (select name from `pin_group` g where g.id = s.group_id);
	        	             	                
	                	        	
EOT;
	
	runquery($sql);
	$db->query('REPLACE INTO `pin_config` (`key`, `value`) VALUES (\'theme\', \'s:7:"default";\')');
	
	@mkdir(ROOT_PATH . '/protected/runtime/backend/logs');

	echo "恭喜您升级成功,请务必立即删除本程序.";

}


?>