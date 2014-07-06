<?php
$label = CActiveRecord::model('Advertise')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '修改'.$label,
);

?>
<div class="col-tab">
  	<div class="contentList pad-10" id="div_setting_1">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
