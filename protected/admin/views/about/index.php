<?php
$label = CActiveRecord::model('About')->modelName;
$this->breadcrumbs=array(
	$label.'管理',
);

$this->menu=array(
    array('label'=>'添加页面', 'url'=>array('about/create')),
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
      
    <table>
		<tr>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'title'); ?></td>
            <td><?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>90)); ?></td>
            <td>
            <?php echo CHtml::submitButton('搜索', array('class'=>'btn')); ?>
            </td>
        </tr>
    </table>
    
        </div>
		</td>
	</tr>
</table>
<?php $this->endWidget(); ?>
<!-- search-form -->

<div class="table-list">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'about-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager'),
    'template'=>'{items}<div class="btn"><div id="pages"> {summary}{pager}</div></div>',
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
		'title',
// 		'content',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>
