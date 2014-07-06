<?php
$this->pageTitle='用户激活';
$this->layout = 'basic';
?>



<div id="wrapper">
			<div class="new_header" style="height:50px;">
	<div class="header_top" style="padding-left:0px;">
		<h1><a class="logo_new" style=" margin-left:0; " href="<?php echo Yii::app()->baseUrl ?>"></a><span class="none"><?php echo CHtml::encode(Yii::app()->name); ?></span></h1>
	</div>
	<div class="clear"></div>
</div>		
	<div id="main" class="container_12">
		<div class="c box_shadow p13 mt14">
	<h3 class="i_suc f24">注册成功,快去激活你的<?php echo CHtml::encode(Yii::app()->name); ?>！</h3>
	<div class="clear"></div>
	<p class="l22 mb30 f14n">
	一封确认邮件已经发送到你的邮箱<span class="red"><?php echo $email ?></span><br />
	点击邮件里的确认链接即可登录，快去查收邮件吧！
	激活后可以发宝贝哦！
	</p>
	<?php if($mail_index):?>
		<a class="btn_view f16" target="_blank" href="<?php echo $mail_index; ?>"><span style="background-image: none">立即查看邮箱</span></a>
    <?php endif;?>
		<div class="l_dsh mt40"></div>
	<div class="noEmail">
		<div class="f14 mb14">还没有收到确认邮件？</div>
		<ul class="mt14 l22">
			<li>· 可以尝试到垃圾邮件里找找看</li>
			<li>· 邮箱地址写错了？很抱歉，你需要<a class="red" href="<?php echo $this->createUrl('/site/register'); ?>">重新注册</a></li>
		</ul>
	</div>
</div>
	</div>
</div>
