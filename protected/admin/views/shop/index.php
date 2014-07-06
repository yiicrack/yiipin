<?php
$label = CActiveRecord::model('Shop')->modelName;
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
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'category_id'); ?></td>
            <td><?php $this->widget('backend.extensions.ShopCategoryDropDownList', array('model'=>$model, 'attribute'=>'category_id', 'group'=>true, 'level'=>2 ,'htmlOptions'=>array('empty'=>'请选择'))); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>250)); ?></td>

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
	'id'=>'shop-grid',
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
		'category.name',
		'name',
		array('class'=>'EImageColumn', 'name'=>'logo', 'htmlOptions' => array('style' => 'width: 60px;'),),
// 		'tags',
		'nick',
// 		'url',
		'share_count',
		'created',
// 		'updated',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>
