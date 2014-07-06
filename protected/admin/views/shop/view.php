
<?php
$label = CActiveRecord::model('Shop')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '查看'.$label,
);

?>
  <table class="tb tb2 nobdb">
    <tr>
      <th colspan="15" class="partition">详细资料</th>
    </tr>
    </table>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category.name',
		'name',
		array('name'=>'logo', 'type'=>'image', 'value'=>Yii::app()->baseUrl.$model->logo),
		'tags',
		'nick',
		array('name'=>'url', 'type'=>'raw', 'value'=>CHtml::link('点击打开', $model->url, array('target'=>'_blank'))),
		'share_count',
		'brand',
		'brand_intro',
		'created',
		'updated',
	),
)); ?>

