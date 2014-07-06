<?php
$label = CActiveRecord::model('Shop')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '添加'.$label,
);

?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
  说明：首先添加好店，如果是淘宝店，则其后有新的这家店的商品分享，就将自动识别和关联这家店。
<?php echo $form; ?>
</div>
</div>