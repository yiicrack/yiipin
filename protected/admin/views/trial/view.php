
<?php
$label = CActiveRecord::model('Trial')->modelName;

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
		'name',
		'product_intro',
		'product_url:url',
		'content:raw',
		'stock',
		'price',
		'apply_count',
		'image:image',
		'user_id',
		'start_time',
		'end_time',
		'created',
		'updated',
	),
)); ?>

