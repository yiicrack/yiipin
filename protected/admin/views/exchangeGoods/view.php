
<?php
$label = CActiveRecord::model('ExchangeGoods')->modelName;

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
		'is_virtual:boolean',
		'image:image',
		'content:raw',
		'stock',
		'exchanged_count',
		'limit',
		'credit',
		'sortnum',
		'created',
	),
)); ?>

