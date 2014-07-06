<?php
$this->breadcrumbs=array(
	'用户管理',
);

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<table width="100%" cellspacing="1" cellpadding="2" class="table_form">
<tr >
    <th><?php echo $form->labelEx($model,'username'); ?></th>
    <td><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?></td>
  </tr>
  <tr>
    <th><?php echo $form->labelEx($model,'password'); ?></th>

    <td><?php echo $form->textField($model,'password',array('value'=>'', 'size'=>60,'maxlength'=>128)); ?> <?php if(!$model->isNewRecord) echo '若不修改密码请留空'; ?>
		<?php echo $form->error($model,'password'); ?></td>
  </tr>
  
  <tr>
    <th><?php echo $form->labelEx($model,'email'); ?></th>
    <td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?></td>
  </tr>
</table>



</div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" id="dosubmit" class="button" name="dosubmit" value="提交">
  </div>
</div>
<?php $this->endWidget(); ?>