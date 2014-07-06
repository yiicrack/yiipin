<?php if(Yii::app()->user->isGuest):?>
<ul class="menu_leo">
    <li><a href="<?php echo $this->createUrl('connect/sinaweibologin'); ?>"><em class="i_sina">&nbsp;</em>微博登录</a></li>
    <li><a href="<?php echo $this->createUrl('connect/qqlogin'); ?>"><em class="i_QQ">&nbsp;</em> QQ登录</a></li>
    <li><a href="<?php echo $this->createUrl('connect/taobaologin'); ?>"><em class="i_taobao">&nbsp;</em> 淘宝登录</a></li>
	<li><a class="red_f tunder_f" href="<?php echo $this->createUrl('/site/login'); ?>">登录</a></li>
	<li style="border-right: none;"><a class="red_f tunder_f" href="<?php echo $this->createUrl('/site/register'); ?>">注册</a></li>
</ul>
<?php else:?>
<ul class="menu_leo">
	<li><a id="shareMeiliDialog" class="h_share" href="###"><b class="f14_f">+</b> 分享我喜欢的</a></li>
	<li id="setting"><a href="<?php echo $this->createUrl('/person/index', array('user_id'=>Yii::app()->user->id)); ?>"> <span class="s_face"><img src="<?php echo WebUser::getUcAvatarSrc(Yii::app()->user->id, 'small');?>" /></span> <?php echo Yii::app()->user->name ?><em class="redarrow"></em>
	</a></li>
	<li id="message" style="border-right: none;"><a class="msg">消息<b class="mgsTotalNum red_f"></b><em class="redarrow"></em></a></li>
</ul>
<ul class="add_menu_leo hw76 none_f" id="moreConnectBox">
	<li><a href="<?php echo $this->createUrl('/person/magazine', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">我的杂志</a></li>
	<li><a href="<?php echo $this->createUrl('/person/share', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">我的分享</a></li>
	<li class="b_line"><a href="<?php echo $this->createUrl('/person/like', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">我喜欢的</a></li>
	<li><a href="<?php echo $this->createUrl('/settings/index'); ?>" target="_blank">设置账号</a></li>
	<li class="b_line"><a href="<?php echo $this->createUrl('/settings/credit'); ?>" target="_blank">我的积分</a></li>
	<li><a href="<?php echo $this->createUrl('/site/logout'); ?>">退出</a></li>
</ul>
<ul class="add_menu_leo hw120 none_f" id="moreMessageBox">
	<li><a class="mes_fans" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">查看关注我的</a></li>
	<li><a class="mes_fans" href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">查看我关注的</a></li>
	<li><a class="mes_pmsg" href="<?php echo $this->createUrl('/misc/msg', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">查看私信</a></li>
	<li><a class="mes_sysmesg" href="<?php echo $this->createUrl('/misc/sysmsg', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">查看系统消息</a></li>
	<li><a class="mes_recom" href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>Yii::app()->user->id)); ?>" target="_blank">查看喜欢我的</a></li>
</ul>
<ul id="messageTipBox" class="add_menu_leo hw120 none_f">
	<li class="cleanOnce"><a target="_BLANK" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>Yii::app()->user->id)); ?>">有<b class="msgCountNum red_f" id="msgFansCount">0</b>个新关注</a></li>
	<li class="cleanOnce"><a target="_BLANK" href="<?php echo $this->createUrl('/misc/sysmsg', array('user_id'=>Yii::app()->user->id)); ?>">有<b class="msgCountNum red_f" id="msgSysmsgCount">0</b>条新系统消息</a></li>
	<li class="cleanOnce"><a target="_BLANK" href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>Yii::app()->user->id)); ?>">有<b class="msgCountNum red_f" id="msgLikemeCount">0</b>个喜欢我的</a></li>
	<li class="b_line cleanOnce" id="setAllRead"><span class="mes_know cursor_f right_f">知道了</span></li>
</ul>
<script type="text/javascript">
user_avatar_s = '<?php echo WebUser::getUcAvatarSrc(Yii::app()->user->id, 'small') ?>';
</script>
<?php endif;?>