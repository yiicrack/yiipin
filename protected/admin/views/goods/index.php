<?php
$label = CActiveRecord::model('Goods')->modelName;
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
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'user_id'); ?></td>
            <td><?php echo $form->textField($model,'user_id', array('size'=>10)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>100)); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'category_id'); ?></td>
            <td><?php $this->widget('backend.extensions.GoodsCategoryDropDownList', array('model'=>$model, 'attribute'=>'category_id', 'group'=>false, 'level'=>2 ,'htmlOptions'=>array('empty'=>'未分类'))); ?></td>

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
	'id'=>'goods-grid',
	'dataProvider'=>$dataProvider,
	'selectableRows' => 2,
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager'),
    'template'=>'{items}<div class="btn"><table width="100%"><tr><td><input type="button" id="btn_batch_delete" value="批量删除" />&nbsp;&nbsp;'.$this->widget('backend.extensions.GoodsCategoryDropDownList', array('model'=>$model, 'attribute'=>'category_id', 'group'=>false, 'level'=>2 ,'htmlOptions'=>array('id'=>'batch_category_id', 'empty'=>'选择目标分类')), true).'<input type="button" id="btn_batch_category" value="批量分类" /></td><td>{pager}</td><td>{summary}</td></tr></table></div>',
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'name'=>'id',
			'id' => 'id',
			'headerHtmlOptions' => array('style'=>'width:40px'),
			'checkBoxHtmlOptions'=>array('class'=>'checkbox'),
		),
		'id',
//		'user_id',	
        array('name'=>'category.name', 'header'=>'分类','headerHtmlOptions' => array('style'=>'width:50px')),
        array('class'=>'CLinkColumn','header'=>'商品名称', 'labelExpression'=>'$data->name', 'urlExpression'=>'Yii::app()->createUrl("/goods/view", array("id"=>$data->id))', 'linkHtmlOptions'=>array('target'=>'_blank') ,'headerHtmlOptions' => array('style'=>'width:300px')),
        array('type'=>'raw', 'header'=>'图片', 'value'=>'$data->getThumb(40)', 'type'=>'image'),
		//array('class'=>'EImageColumn', 'name'=>'image', 'htmlOptions'=>array('width'=>100)),
		'price',
//		'url',
		array('name'=>'website', 'value'=>'$data->website ? Yii::app()->baseUrl."/images/common/logo/".$data->website.".png": Yii::app()->baseUrl."/images/blank.gif"', 'type'=>'image'),
		array('name'=>'taobao_commission_rate',	'value'=>'($data->taobao_commission_rate/100)."%"'),
        'taobao_commission_num',
        'taobao_volume',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
            'template'=>'{shares} {view} {update} {delete}',
            'buttons'=>array(
                'shares'=>array(
                    'label'=>'分享管理',
                    'url'=>'Yii::app()->createUrl("share/index", array("Share[goods_id]"=>$data->id))',
                ),
             ),
		),
	),
)); ?>

</div>
<script type="text/javascript">
$('#btn_batch_delete').live('click', function(){
	var ids = $.fn.yiiGridView.getSelection('goods-grid');
	if(ids.length == 0){
		alert('请勾选要操作的项目');
		return;
	};
	if(confirm('确定要将选中项目 删除 吗？')){
		$.ajax({
			   type: 'POST',
			   url: '<?php echo $this->createUrl('operate'); ?>',
			   data: { operation: 'delete', id: ids},
			   success: function(msg){
				   $.fn.yiiGridView.update('goods-grid');
				   alert(msg);
			   },
			   error: function(obj){
					alert(obj.responseText);
			   }
		});
	}
});
$('#btn_batch_category').live('click', function(){
	var ids = $.fn.yiiGridView.getSelection('goods-grid');
	if(ids.length == 0){
		alert('请勾选要操作的项目');
		return;
	};
	
	if(confirm('确定要将选中项目 分类 吗？')){
		$.ajax({
			   type: 'POST',
			   url: '<?php echo $this->createUrl('operate'); ?>',
			   data: { operation: 'category', category_id: $('#batch_category_id').val(), id: ids},
			   success: function(msg){
				   $.fn.yiiGridView.update('goods-grid');
				   alert(msg);
			   },
			   error: function(obj){
					alert(obj.responseText);
			   }
		});
	}
});
</script>

