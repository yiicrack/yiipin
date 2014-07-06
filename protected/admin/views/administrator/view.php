<?php
$this->breadcrumbs=array(
	'后台用户管理',
);

$this->menu=array(
	array('label'=>'管理后台用户', 'url'=>array('administrator/index')),
	array('label'=>'添加后台用户', 'url'=>array('administrator/create')),
	array('label'=>'修改后台用户', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除后台用户', 'url'=>'#', 'linkOptions'=>array('csrf'=>true, 'submit'=>array('delete','id'=>$model->id),'confirm'=>'您确定要删除该项目吗？')),
);

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
        'last_login_time:datetime',
        'last_login_ip',
        array('label'=>'属于角色','value'=>implode(', ', array_keys($model->roles))),
	),
)); ?>
