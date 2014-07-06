<?php
$label = CActiveRecord::model('Group')->modelName;
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
            <td><?php echo $form->dropdownlist($model,'category_id', CHtml::listData(GroupCategory::model()->findAll(array('order'=>'sortnum ASC')), 'id', 'name'), array('empty'=>'不限')); ?></td>
            <td style="text-align:right;vertical-align:middle;"><?php echo $form->label($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>100)); ?></td>
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
	'id'=>'group-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager'),
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
		'category.name:分类',
		'name',
		//array('name'=>'image', 'value'=>'"<div style=\"width:200px;height:204px;\">".$data->getMixImage(false)."</div>"', 'type'=>raw),
		array('type'=>'raw', 'header'=>'横幅', 'value'=>'$this->grid->controller->widget("ext.CacheThumbImageWidget", array("path"=>$data->banner, "width"=>300, "height"=>50, "fullimage"=>false, "placeholder"=>false), true)'),
		'share_count',
		/*
		'share_count',
		'preface',
		*/
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>

</div>
<script type="text/javascript">
$('#btn_batch_delete').live('click', function(){
	var ids = $.fn.yiiGridView.getSelection('group-grid');
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
				   $.fn.yiiGridView.update('group-grid');
				   alert(msg);
			   },
			   error: function(obj){
					alert(obj.responseText);
			   }
		});
	}
});
</script>
