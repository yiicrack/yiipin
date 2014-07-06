<div class="info">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slideshow-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=> array('enctype'=>'multipart/form-data'),
)); ?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<table width="100%" cellspacing="1" cellpadding="2" class="table_form">
	<tr>
         <tr >
    <td class="td27" ><?php echo $form->labelEx($model,'title'); ?></td>

    <td>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'title'); ?>
        </td>
    </tr>
	<tr>
        <tr >
    <td class="td27" ><?php echo $form->labelEx($model,'url'); ?></td>

    <td>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url'); ?>
        </td>
    </tr>
	<tr>
         <tr >
    <td class="td27" ><?php echo $form->labelEx($model,'image'); ?></td>

    <td>
		<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'image'); ?>
       <br />
<?php if($model->image): ?><img src="<?php echo Yii::app()->baseUrl . $model->image ?>" height="100"/> <?php endif; ?>
        </td>
        <tr >
    <td class="td27" ><?php echo $form->labelEx($model,'token'); ?></td>

    <td>
        <?php $this->widget('system.web.widgets.CAutoComplete',
              array(
               //'name'=>CHtml::activeName($model, 'name'), 
                 'model'=> $model,
                 'attribute'=>'token',
                         //replace controller/action with real ids
                 'url'=>array('autocomplete'), 
                 'max'=>50, //specifies the max number of items to display
     
                             //specifies the number of chars that must be entered 
                             //before autocomplete initiates a lookup
                 'minChars'=>0, 
                 'delay'=>500, //number of milliseconds before lookup occurs
                 'matchCase'=>false, //match case when performing a lookup?
     
                             //any additional html attributes that go inside of 
                             //the input field can be defined here
                 'htmlOptions'=>array('size'=>'20'), 
     
                 //'methodChain'=>".result(function(event,item){\$(\"#user_id\").val(item[1]);})",
              )
       ); ?>
       按下箭头键可显示已有识别符，识别符对应模板中的焦点图幻灯组，须保持一致
		<?php echo $form->error($model,'token'); ?>
        </td>
    </tr>
	 <tr >
    <td class="td27" ><?php echo $form->labelEx($model,'sortnum'); ?></td>
    <td>
		<?php echo $form->textField($model,'sortnum'); ?>
		<?php echo $form->error($model,'sortnum'); ?>
        </td>
    </tr>
	<tr>
    <td></td><td><button class="btn" type="submit" name="button" id="button">完成提交</button></td>
  </tr>
</table>
</div>
</div>

<?php $this->endWidget(); ?>
