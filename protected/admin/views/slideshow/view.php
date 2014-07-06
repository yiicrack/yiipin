<?php
$this->breadcrumbs=array(
	'焦点图管理',
);

$this->menu=array(
	array('label'=>'管理焦点图', 'url'=>array('slideshow/index')),
	array('label'=>'添加焦点图', 'url'=>array('slideshow/create')),
	array('label'=>'修改焦点图', 'url'=>array('slideshow/update', 'id'=>$model->id)),
	array('label'=>'删除焦点图', 'url'=>'#', 'linkOptions'=>array('submit'=>array('slideshow/delete','id'=>$model->id),'confirm'=>'您确定要删除该项目吗？', 'csrf'=>true)),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'url',
		'image:image',
		'token',
		'sortnum',
		'created:datetime',
	),
)); ?>
