<?php
$label = CActiveRecord::model('AdvertisePosition')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '添加'.$label,
);

?>

<div class="col-tab">
  	<div class="contentList pad-10" id="div_setting_1">
	<?php echo $form; ?>
	</div>
</div>
