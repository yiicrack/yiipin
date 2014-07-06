
<?php
$label = CActiveRecord::model('Group')->modelName;

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
		'category_id',
		'name',
		array('name'=>'image', 'type'=>'image', 'value'=>Yii::app()->baseUrl.$model->image),
		'banner',
		'fans_count',
		'share_count',
		'preface',
	),
)); ?>

