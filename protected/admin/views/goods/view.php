
<?php
$label = CActiveRecord::model('Goods')->modelName;

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
		'collect_count',
		'user_id',
		'name',
		array('name'=>'image', 'type'=>'image', 'value'=>Yii::app()->baseUrl.$model->image),
		'price',
		array('name'=>'url', 'type'=>'raw', 'value'=>CHtml::link('点击打开', $model->url, array('target'=>'_blank'))),
		'website',
        'TagsByName:array:标签',
	),
)); ?>

