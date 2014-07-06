<?php
$label = CActiveRecord::model('GoodsTag')->modelName;
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
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>90)); ?></td>
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
	'id'=>'goods-tag-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager','maxButtonCount'=>5),
    'template'=>'{items}<div class="btn"><table width="100%"><tr><td><input type="button" id="btn_batch_delete" value="批量删除" /></td><td>{pager}</td><td>{summary}</td></tr></table></div>',
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
		'goods_count',
		array(
			'class'=>'ButtonColumn',
            'template'=>'{update}&nbsp;{delete}',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>
<script type="text/javascript">
$('#btn_batch_delete').live('click', function(){
	var ids = $.fn.yiiGridView.getSelection('goods-tag-grid');
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
				   $.fn.yiiGridView.update('goods-tag-grid');
				   alert(msg);
			   },
			   error: function(obj){
					alert(obj.responseText);
			   }
		});
	}
});
</script>
