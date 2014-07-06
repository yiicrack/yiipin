<?php
$this->breadcrumbs=array(
	'用户管理',
);


?>
<?php
$form = $this->beginWidget ( 'CActiveForm', array ('action' => Yii::app ()->createUrl ( $this->route ), 'method' => 'get' ) );
?>
<table class="search-form" width="100%">
	<tr>
		<td>
			<div class="explain-col">
			<table>
				<tr>
					<td style="text-align: right; vertical-align: middle;"><?php
					echo $form->label ( $model, 'id' );
					?></td>
					<td><?php
					echo $form->textField ( $model, 'id', array ('size' => 5, 'maxlength' => 50, 'class' => 'input-text' ) );
					?></td>
	
					<td style="text-align: right; vertical-align: middle;"><?php
					echo $form->label ( $model, 'username' );
					?></td>
					<td><?php
					echo $form->textField ( $model, 'username', array ('size' => 10, 'maxlength' => 50, 'class' => 'input-text' ) );
					?></td>
	
					<td style="text-align: right; vertical-align: middle;"><?php
					echo $form->label ( $model, 'email' );
					?></td>
					<td><?php
					echo $form->textField ( $model, 'email', array ('size' => 10, 'maxlength' => 50, 'class' => 'input-text' ) );
					?></td>
	
					<td>
					<?php
					echo CHtml::submitButton ( '搜索', array ('class' => 'button' ) );
					?>
					</td>
				</tr>
			</table>
			</div>
		</td>
	</tr>
</table>
<?php $this->endWidget(); ?>

<div class="table-list">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
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
		'username',
		'email',
		// 'mobile',
		//'birthday',
		// 'gender',
		//'qq',
		'created',
		'this_login_time',
        'credit',
		//'sign',
		array(
			'class'=>'ButtonColumn',
			'viewButtonOptions' => array('target'=>'_self'),
			'template'=>'{sendsms} {update} {delete}',
			'buttons'=>array(
				'sendsms'=>array(
					'label'=>'发送系统通知',
					'url'=>'Yii::app()->createUrl("site/sendsms", array("msgto"=>$data->username))',
					'options'=>array('rel'=>'fancybox', 'class'=>'iframe', 'fbw'=>600, 'fbh'=>500),
				),
			),
		),
	),
)); ?>
</div>
<script type="text/javascript">
$('#btn_batch_delete').live('click', function(){
	var ids = $.fn.yiiGridView.getSelection('user-grid');
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
				   $.fn.yiiGridView.update('user-grid');
				   alert(msg);
			   },
			   error: function(obj){
					alert(obj.responseText);
			   }
		});
	}
});
</script>
