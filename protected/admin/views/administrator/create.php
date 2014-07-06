<?php
$this->breadcrumbs=array(
	'后台用户管理',
);

$this->menu=array(
	array('label'=>'管理后台用户', 'url'=>array('administrator/index')),
	array('label'=>'添加后台用户', 'url'=>array('administrator/create')),
);

?>
    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>