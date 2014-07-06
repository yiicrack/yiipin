<?php
$this->layout = 'none';
$allmenu = include(Yii::app()->basePath . '/admin/config/menu.php');
if(isset($_GET['tag']) && isset($allmenu[$_GET['tag']])) 
	$menu = $allmenu[$_GET['tag']];
else 
	$menu = $allmenu['商品'];
?>
<?php foreach($menu as $name => $config): ?>
<h3 class="f14"><span class="switchs cu on" title="展开/折叠菜单"></span><?php echo $config['name']; ?></h3>
<ul>
	<?php foreach($config['submenu'] as $label => $url): ?>
    	<li id="_MP<?php echo $label ?>" class="sub_menu"><a href="javascript:_MP('<?php echo $label ?>','<?php echo $url; ?>');" hidefocus="true" style="outline:none;"><?php echo $label ?></a></li>
	<?php endforeach;?>
</ul>
<?php endforeach;?>
<script type="text/javascript">
$(".switchs").each(function(i){
	var ul = $(this).parent().next();
	$(this).click(
	function(){
		if(ul.is(':visible')){
			ul.hide();
			$(this).removeClass('on');
				}else{
			ul.show();
			$(this).addClass('on');
		}
	})
});
</script>