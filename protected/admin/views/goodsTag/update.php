<?php
$label = CActiveRecord::model('GoodsTag')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '修改'.$label,
);


?>

<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<?php echo $form; ?>
</div>
</div>