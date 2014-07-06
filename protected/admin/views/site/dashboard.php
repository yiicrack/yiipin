<?php $this->layout='none'; ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?php echo Yii::app()->baseUrl ?>/admin/css/style.css" rel="stylesheet" type="text/css"/>
<title><?php echo Yii::app()->name ?> 管理中心</title>
</head>
<body scroll="no">
<div id="header">
    <div class="logo"><a href="<?php echo Yii::app()->baseUrl ?>" title="<?php echo Yii::app()->name ?> 管理中心"></a></div>
    <div class="fr">
        <div class="style_but"></div>
    </div>
    <div class="col-auto" style="overflow: visible">
        <div class="log white cut_line"> 欢迎你，<?php echo Yii::app()->user->name ?>！
            <span>|</span>
            <a href="<?php echo $this->createUrl('site/logout') ?>" target="_top">退出</a> |
            <a onclick="$('#rightMain').attr('src','<?php echo $this->createUrl('site/welcome') ?>')" href="javascript:">[管理首页]</a>|
            <a href="./" target="_blank">[站点首页]</a>
        </div>            
		<div class="log_right white cut_line">
        	<a href="http://www.yiipin.com" target="_blank">官方网站</a>
            <span>|</span>
            <a href="http://www.yiipin.com/" target="_blank">支持论坛</a>
            <span>|</span>
        </div>             
    </div>
    <ul class="nav white" id="top_menu">
    <?php $menu = include(Yii::app()->basePath . '/admin/config/menu.php'); ?>
        <?php foreach($menu as $name => $config): ?>
            <li id="_M<?php echo $name ?>" class="top_menu">
            	<a href="javascript:_M('<?php echo $name ?>','')"  hidefocus="true" style="outline:none;"><?php echo $name ?></a>
         	</li>
        <?php endforeach;?>
    </ul>
</div>
<div id="content">
    <div class="left_menu fl">
        <div id="leftMain"></div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="{$lang.expand_or_contract}"></a> </div>
    <div class="right_main">
        <div class="crumbs" style="position: relative">
            <div class="shortcut cu-span"> 
            <a href="<?php echo $this->createUrl('cache/flush'); ?>" target="right">
                <span>清除缓存</span>
                </a> <a href="javascript:Refresh();"><span>刷新页面</span>
                </a> </div>
                <div id="current_pos"></div>
            <div id="flash_message"></div>
            
        </div>
        <div class="rmc">
            <div class="content" style="position:relative; overflow:hidden">
                <iframe name="right" id="rightMain" src="<?php echo $this->createUrl('site/welcome') ?>" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none;" width="100%" height="auto" allowtransparency="true"></iframe>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function windowW(){
	if($(window).width()<980){
			$('#header').css('width',980+'px');
			$('#content').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();
$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
		$('#header').css('width','auto');
		$('#content').css('width','auto');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');

	}
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-110;
	document.getElementById('rightMain').height = heights;
	var openClose = $("#rightMain").height()+9;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose+30);
}
window.onresize();

$(function(){
	//默认载入左侧菜单
	$("#leftMain").load("<?php echo $this->createUrl('site/menu') ?>");
	$('#top_menu li').first().addClass('on');
})

//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
	}
	return false;
});

function _M(tag,targetUrl) {
	$.get("<?php echo $this->createUrl('site/menu') ?>", {tag:tag}, function(data){
		$("#leftMain").html(data);
		//自动打开第一个菜单
		var link = $("#leftMain").find('ul > li > a').first().attr('href').replace('javascript:', '');
		eval(link);
	});

	//$("#rightMain").attr('src', targetUrl);
	$('.top_menu').removeClass("on");
	$('#_M'+tag).addClass("on");

	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$("#openClose").data('clicknum', 0);
	$("#current_pos").data('clicknum', 1);
}

function _MP(menuid,targetUrl) {
	$("#rightMain").attr('src', targetUrl);
	$('.sub_menu').removeClass("on fb blue");
	$('#_MP'+menuid).addClass("on fb blue");
	$("#current_pos").data('clicknum', 1);
}

function Refresh() {
	var src = $("#rightMain").attr('src');
	$("#rightMain").attr('src',src);
}
</script>
</body>
</html>
