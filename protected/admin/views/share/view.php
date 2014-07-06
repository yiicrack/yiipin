
<?php
$label = CActiveRecord::model('Share')->modelName;

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
		'goods_id',
		'group_id',
		'user_id',
		'quote',
		'from_group_id',
		'from_user_id',
		'created',
		'like_count',
		'comment_count',
		'last_collect_time',
	),
)); ?>

