<?php
$this->pageTitle='系统提示信息';
$this->breadcrumbs=array(
	'系统提示信息'
);
if(!isset($window)) $window = 'self';
?>
<style>
#loginsuc{ font:12px; width:360px; height:42px; margin:50px auto; padding:20px 0 0 0; text-align:center;}
html {overflow-y:hidden;}
</style>
<div id="loginsuc" class="no_result break-word">
<?php 
if(isset($script)) echo $script; 
?>
<script type="text/javascript">setTimeout('<?php echo $window; ?>.location.href="<?php echo is_array($redirect_url) ? CHtml::normalizeUrl($redirect_url) : $redirect_url; ?>"',<?php echo isset($timeout) ? $timeout : '3000';?>);</script>
<?php echo $message; ?>
</div>

<div class="clear"></div>