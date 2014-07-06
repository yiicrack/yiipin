<?php
$label = CActiveRecord::model('AdvertisePosition')->modelName;
$this->breadcrumbs=array(
	$label.'管理',
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
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'id'); ?></td>
            <td><?php echo $form->textField($model,'id', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'type'); ?></td>
            <td><?php echo $form->textField($model,'type',array('size'=>30,'maxlength'=>30)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'width'); ?></td>
            <td><?php echo $form->textField($model,'width', array('size'=>10)); ?></td>
<!--            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'height'); ?></td>
            <td><?php echo $form->textField($model,'height', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'price'); ?></td>
            <td><?php echo $form->textField($model,'price', array('size'=>10)); ?></td>
		-->
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
	'id'=>'advertise-position-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}<div class="btn">{summary}<div id="pages">{pager}</div></div>',
	'selectableRows' => 2,
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
		'type',
		'width',
		'height',
		//'price',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>