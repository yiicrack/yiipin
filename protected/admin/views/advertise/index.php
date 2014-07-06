<?php
$label = CActiveRecord::model('Advertise')->modelName;
$this->breadcrumbs=array(
	$label.'管理',
);


?>


<div class="table-list">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'advertise-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
	'template'=>'{items}<div class="btn">{summary}<div id="pages">{pager}</div></div>',
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager'),
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'name'=>'id',
			'id' => 'id',
			'headerHtmlOptions' => array('style'=>'width:40px'),
			'checkBoxHtmlOptions'=>array('class'=>'checkbox'),
		),
		'id',
		'name',
		'position.name',
		'template.name',
		'display_count',
		'clickStats:array:点击统计',
		'created',
		array(
			'class'=>'ButtonColumn',
		),
	),
)); ?>
</div>