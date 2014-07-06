
<style type="text/css">
<!--
*{ padding:0; margin:0; font-size:12px}
a:link,a:visited{text-decoration:none;color:#0068a6}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url(<?php echo Yii::app()->baseUrl ?>/admin/images/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ padding:20px 12px 10px 12px; font-size:14px; height:90px; text-align:left;vertical-align: middle;}
.showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
.showMsg .ok,.showMsg .guery{background: url(<?php echo Yii::app()->baseUrl ?>/admin/images/msg_bg.png) no-repeat 0px -560px ;padding:40px 0 0 50px;height:80px;}
.showMsg .guery{ background-position: left -460px;}
-->
</style>


<div class="showMsg" style="text-align:center">
	<h5><?php echo $title ? $title : '系统提示'; ?></h5>
    <?php if(isset($message)):?>
    <div class="content <?php if(!isset($loader)) echo 'guery'; ?>" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:400px;">
    <?php echo $message ?>
    <?php if(isset($loader)): ?>
    <div style="text-align: center;padding-top:10px;"><img src="<?php Yii::app()->baseUrl?>/admin/images/loader.gif" /></div>
    <?php endif; ?>
    </div>
    <?php endif;?>
    <div class="bottom">

	<?php if(isset($closeWin)):?>
	<input type="button" name="close" value="关闭" onClick="window.close();">
	<?php endif;?>
    <?php if(isset($jumpUrl)):
    $jumpUrl = is_array($jumpUrl) ? CHtml::normalizeUrl($jumpUrl):$jumpUrl;
    ?>
	系统将在<span style="color:blue;font-weight:bold"><?php echo $waitSecond ?></span>秒后自动跳转，如果不想等待，<a href="<?php echo $jumpUrl; ?>">直接点击这里</a>
	<script language="javascript">
		setTimeout("redirect('<?php echo $jumpUrl; ?>');",<?php echo $waitSecond ?>*1000);
    </script>
	<?php endif;?>
    
    </div>
</div>