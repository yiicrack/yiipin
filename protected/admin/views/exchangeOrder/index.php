<?php
$label = CActiveRecord::model('ExchangeOrder')->modelName;
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
      
    <table>
		<tr>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'id'); ?></td>
            <td><?php echo $form->textField($model,'id', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'goods_id'); ?></td>
            <td><?php echo $form->textField($model,'goods_id', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'user_id'); ?></td>
            <td><?php echo $form->textField($model,'user_id', array('size'=>10)); ?></td>

            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'status'); ?></td>
            <td><?php echo $form->dropdownlist($model,'status',$model->getConstOptions('STATUS'), array('empty'=>'不限')); ?></td>


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
	'id'=>'exchange-order-grid',
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
		'goods.name',
        'user_id',
		'user.username',
		'count',
		'status',
		'created',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
            'template'=>'{update}',
            'updateButtonLabel'=>'处理',
		),
	),
)); ?>

</div>
