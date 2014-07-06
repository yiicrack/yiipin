<?php
$this->pageTitle='注册成功';
$this->layout = 'main';
?>


<div id="wrapper">

	<div class="clear"></div>
    <div id="main" class="container_12">
		<div class="box_shadow p13 mt14 mb14" style="margin-left: auto; margin-right: auto; _overflow: hidden;width:950px; padding:50px 0;">
			<div class="clear"></div>
			<div>
				<p class="fb f30 c">注册成功!</p>
				<p class="mt10 fb f24 c">感谢您注册成为<?php echo Yii::app()->name ?>的会员，现在就开始发现美丽吧！</p>

				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
setTimeout("window.location.href='<?php echo $this->createUrl('/site/index'); ?>';", 3000);
</script>