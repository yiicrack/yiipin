<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_DIR; ?>/css/global.css" />
<link rel="apple-touch-icon-precomposed" href="<?php echo THEME_DIR; ?>/images/custom_icon_precomposed.png"/>
<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" type="image/x-icon" />
<meta http-equiv="content-type" content="text/html; charset=<?php echo Yii::app()->charset ?>" />
<title><?php echo CHtml::encode($this->pageTitle); ?><?php if($this->route!='site/index') echo '_'.CHtml::encode(Yii::app()->name); ?></title>
<meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>" />
<meta name="description" content="<?php echo CHtml::encode($this->description); ?>" />
<meta property="wb:webmaster" content="<?php echo Yii::app()->config->get('sina_meta'); ?>"/>
<meta property="qc:admins" content="<?php echo Yii::app()->config->get('qq_meta'); ?>"/>
</head>

<body>
<div id="ajax_loading" class="fixed-top">正在加载，请稍候...</div>

<?php echo $content; ?>
<div class="clear"></div>
<div id="xs"></div>

<div class="twitter_tools_faces_table_div" >
	<div id="twitter_tools_faces_table" class="twitter_tools_faces_table_0" style="display:none">
		<div class="twitter_tolls_faces_table_1">
			<ul id="face_list" class="face_list">
			<?php foreach(Yii::app()->params['face_list'] as $key=>$face):?>
				<li id='<?php echo $key ?>' title="<?php echo $face ?>"><img emotion="[<?php echo $face ?>]" alt="<?php echo $face ?>" src="<?php echo Yii::app()->baseUrl ?>/images/face/<?php echo $key ?>.gif" /></li>
			<?php endforeach;?>
			</ul>
			<div class="returnBack">
				<img src="<?php echo THEME_DIR ?>/images/close.gif" />
			</div>
		</div>
	</div>
	<!-- 插入链接提示框结束 -->
</div>

</body>
</html>