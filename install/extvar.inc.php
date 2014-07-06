<?php
$extrasql = <<<EOT

EOT;


function upg_yiipin_stats() {
	global $db, $tablepre;
	static $is_run = false;
	if($is_run) return;
	if(getgpc('addfounder_contact','P')) {
		$email = strip_tags(getgpc('email', 'P'));
		$msn = strip_tags(getgpc('msn', 'P'));
		$qq = strip_tags(getgpc('qq', 'P'));
		if(!preg_match("/^[\d]+$/", $qq)) $qq = '';
		if(strlen($email) < 6 || !preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email)) $email = '';
		if(strlen($msn) < 6 || !preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $msn)) $msn = '';
        $contact = array('qq' => $qq, 'msn' => $msn, 'email' => $email);
        getstatinfo($contact);
		$contact = serialize($contact);
		$db->query("REPLACE {$tablepre}config (`key`, `value`) VALUES ('founder_contact', '$contact')");
		$is_run = ture;
		echo '<script type="text/javascript">document.getElementById("laststep").disabled=false;document.getElementById("laststep").value = \''.lang('install_succeed').'\';</script><iframe src="../" style="display:none"></iframe>'."\r\n";
		show_header();
		echo '</div><div class="main" style="margin-top: -123px;"><ul style="line-height: 200%; margin-left: 30px;">';
		echo '<li><a href="../">'.lang('install_succeed').'</a><br>';
		echo '<script>setTimeout(function(){window.location=\'../\'}, 2000);</script>'.lang('auto_redirect').'</li>';
		echo '</ul></div>';
		
		show_footer();
	} else {

		show_header();
		$contact = array();
		$contact = unserialize($db->result($db->query("SELECT value FROM {$tablepre}config WHERE `key`='founder_contact'"),0));
		$founder_contact = lang('founder_contact');
		$founder_contact = str_replace(array("\n","\t"), array('<br>','&nbsp;&nbsp;&nbsp;&nbsp;'), $founder_contact);
			echo '</div><div class="main" style="margin-top: -123px;">';
			echo $founder_contact;
			echo '<form action="'.$url_forward.'" method="post" id="postform">';
			echo	"<br><table width=\"360\" cellspacing=\"1\" border=\"0\" align=\"center\">".
		 		"<tr height=\"30\"><td align=\"right\" >QQ:</td><td>&nbsp;&nbsp;<input  class=\"txt\" type=\"text\" value=\"$contact[qq]\" name=\"qq\" ></td></tr>
		 		<tr height=\"30\"><td align=\"right\">MSN:</td><td>&nbsp;&nbsp;<input  class=\"txt\" type=\"text\" value=\"$contact[msn]\" name=\"msn\" ></td></tr>
		 		<tr height=\"30\"><td align=\"right\">E-mail:</td><td>&nbsp;&nbsp;<input  class=\"txt\" type=\"text\" value=\"$contact[email]\" name=\"email\" ></td></tr>
		 		<tr align=\"center\" height=\"30\"><td colspan=\"2\"><input type=\"submit\" style=\"padding: 2px;\" name=\"addfounder_contact\" value=\"".lang('install_submit')."\"></td></tr></table>";
			echo '</form>';
			getstatinfo(array('qq' => '', 'msn' => '', 'email' => ''));
			echo '<p style="text-align:right"><input type="button" style="padding: 2px;" onclick="window.location=\'index.php?method=ext_info&skip=1\'" value="'.lang('skip_current').'" /></center></p>';
			echo '</div>';
		show_footer();
	}
}


function getstatinfo($contact) {
	if($siteid && $key) {
		return;
	}
	$version = SOFT_VERSION.'('.SOFT_RELEASE.')';
	$onlineip = '';
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$onlineip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$onlineip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	$funcurl = 'http://crm.yiipin.com/stats/newinstall';
	$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);
	$url = htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].preg_replace("/\/+(api|archiver|wap)?\/*$/i", '', substr($PHP_SELF, 0, strrpos($PHP_SELF, '/'))));
	$url = substr($url, 0, -8);
	$hash = md5("$url\$version{$onlineip}");
	$q = "url=$url&version=$version&ip=$onlineip&time=".time()."&hash=$hash&qq={$contact['qq']}&msn={$contact['msn']}&email={$contact['email']}";
	$q=rawurlencode(base64_encode($q));
	dfopen($funcurl."?q=$q");
}
?>
