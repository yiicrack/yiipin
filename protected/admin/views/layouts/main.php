<?php 
Yii::app()->clientScript->registerCoreScript('jquery'); 
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理中心</title>
<link href="<?php echo Yii::app()->baseUrl ?>/admin/css/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/admin/js/admin_common.js"></script>
<script language="javascript">

$(function($){
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
});

</script>
</head>
<body>
<div id="ajax_loading">提交请求中，请稍候...</div>
<?php if(Yii::app()->user->hasFlash('success')):?>
<script type="text/javascript">
    $(document).ready(function(){
		top.$('#flash_message').text('操作成功：<?php echo Yii::app()->user->getFlash('success'); ?>').fadeIn("slow").animate({opacity: 1.0}, 5000).fadeOut("slow");
	});
</script>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
<script type="text/javascript">
    $(document).ready(function(){
    	top.$('#flash_message').text('操作失败：<?php echo Yii::app()->user->getFlash('error'); ?>').fadeIn("slow").animate({opacity: 1.0}, 5000).fadeOut("slow");
	});
</script>
<?php endif; ?>


<div id="breadcrumbs" style="display:none">
<?php if(isset($this->breadcrumbs) && !empty($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>
</div>
<script type="text/JavaScript">
parent.$('#current_pos').html($('#breadcrumbs').html());
</script>
<?php if($this->menu):?>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
    	<?php foreach($this->menu as $item):?>
    	<a class="add fb" href="<?php echo CHtml::normalizeUrl($item['url'])?>"><em><?php echo $item['label']?></em></a>　
        <?php endforeach; ?>
    </div>
</div>
<?php endif;?>
<div class="pad-10" >
<?php echo $content; ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#operateForm').bind('submit', function(e) {
		e.preventDefault(); // <-- important
		var opval = $("input[name='operation']:checked").val();
		if(opval == undefined){
			alert('请选择要执行的操作！');
			return;
		}
		else{
			var ids = $.fn.yiiGridView.getChecked($('.grid-view').attr('id'),'id[]');
			if(ids.length == 0){
				alert('请点选要操作的项目！');
				return;
			};
			if(confirm('确定要执行选定的操作吗？')){
				$(this).ajaxSubmit({
					data: {'id[]': ids},
					success: function(msg){
						   $.fn.yiiGridView.update($('.grid-view').attr('id'));
						   alert(msg);
					   },
					   error: function(obj){
							alert(obj.responseText);
					   }
				});
			}
		}									  
	});			  

	//detailview的图片自动缩放
	$('table[id^=yw] img').each(function(){
		if($(this).width() > 500) {
			$(this).width(500);
			$(this).height('auto');
		}
		if($(this).height() > 500) {
			$(this).height(500);
			$(this).width('auto');
		}
	});
});
</script>

</body>
</html>
