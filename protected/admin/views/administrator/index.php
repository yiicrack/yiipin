<?php
$this->breadcrumbs=array(
	'后台用户管理',
);

$this->menu=array(
	array('label'=>'管理后台用户', 'url'=>array('administrator/index')),
	array('label'=>'添加后台用户', 'url'=>array('administrator/create')),
);

?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<table class="search-form" width="100%">
	<tr>
		<td>
			<div class="explain-col">
			<table class="noborder">
		<tr>
		<td style="text-align:right;vertical-align:middle;">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('size'=>5)); ?>
	
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>10,'maxlength'=>128)); ?>
	
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>128)); ?>
		</td>
		<td>
		<?php echo CHtml::submitButton('搜索', array('class'=>'btn')); ?>
		</td>
</td>
</tr>
</table>
</div></td></tr>
</table>

<?php $this->endWidget(); ?>

<div class="table-list">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'administrator-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
	'template'=>'{items}<div class="btn"><div id="pages"> {summary}{pager}</div></div>',
	'cssFile'=>false,
	'columns'=>array(
		'id',
		'username',
		'email',
        'last_login_time:datetime',
        'last_login_ip',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>
</div>
