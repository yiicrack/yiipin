<?php
$label = CActiveRecord::model('Share')->modelName;
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
            <td><?php echo $form->textField($model,'id', array('size'=>5)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'goods_id'); ?></td>
            <td><?php echo $form->textField($model,'goods_id', array('size'=>5)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'group_id'); ?></td>
            <td><?php echo $form->textField($model,'group_id', array('size'=>5)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'user_id'); ?></td>
            <td><?php echo $form->textField($model,'user_id', array('size'=>5)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'quote'); ?></td>
            <td><?php echo $form->textField($model,'quote',array('size'=>10,'maxlength'=>500)); ?></td>
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
	'id'=>'share-grid',
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
        array('name'=>'id','headerHtmlOptions' => array('style'=>'width:40px')),
        array('name'=>'goods_id','headerHtmlOptions' => array('style'=>'width:40px')),
        array('class'=>'CLinkColumn','header'=>'商品名称', 'labelExpression'=>'$data->goods->name', 'urlExpression'=>'Yii::app()->createUrl("/goods/view", array("id"=>$data->goods_id))', 'linkHtmlOptions'=>array('target'=>'_blank') ,'headerHtmlOptions' => array('style'=>'width:150px')),
        array('name'=>'user.username','headerHtmlOptions' => array('style'=>'width:70px')),
        array('name'=>'group_id','headerHtmlOptions' => array('style'=>'width:40px')),
        array('name'=>'group.name','headerHtmlOptions' => array('style'=>'width:150px')),
		array('name'=>'quote','headerHtmlOptions' => array('style'=>'width:150px')),
// 		'from_group_id',
// 		'from_user_id',
		array('name'=>'created','headerHtmlOptions' => array('style'=>'width:120px')),
// 		'like_count',
// 		'comment_count',
// 		'last_collect_time',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>
