<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flink-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=> array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>false),
)); ?>

<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<table width="100%" cellspacing="1" cellpadding="2" class="table_form">

	<tr >
    <th><?php echo $form->labelEx($model,'category'); ?></th>
    <td>
    <?php echo $form->dropdownlist($model,'category', $model->getConstOptions('CATEGORY') ,array('empty'=>'请选择')); ?> 若是合作伙伴则必须上传标识图片
    <?php echo $form->error($model,'category'); ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'name'); ?></th>
    <td>
    <?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>90)); ?>
    <?php echo $form->error($model,'name'); ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'url'); ?></th>
    <td>
    <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100,'value'=>($model->isNewRecord?'http://':$model->url))); ?>
    <?php echo $form->error($model,'url'); ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'image'); ?></th>
    <td>
    <?php echo $form->fileField($model,'image',array('size'=>30,'maxlength'=>50)); ?> 最佳大小 88*31px <?php echo CHtml::checkBox('delete_image', false); ?> 删除图片
		<?php echo $form->error($model,'image'); ?>
       <br />
		<?php if($model->image): ?><img src="<?php echo Yii::app()->baseUrl . $model->image ?>" /> <?php endif; ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'remote_image'); ?></th>
    <td>
    <?php echo $form->textField($model,'remote_image',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'remote_image'); ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'description'); ?></th>
    <td>
    <?php echo $form->textArea($model,'description',array('cols'=>70,'rows'=>6)); ?>
		<?php echo $form->error($model,'remote_image'); ?>
    </td>
  </tr>
  
  <tr >
    <th><?php echo $form->labelEx($model,'enabled'); ?></th>
    <td>
    <?php echo $form->checkbox($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
    </td>
  </tr>
  
	
	<tr>
    <th></th><td><button class="btn" type="submit" name="button" id="button">完成提交</button></td>
  </tr>
</table>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->