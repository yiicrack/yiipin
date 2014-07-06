<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl().'/jui/css'.'/base/jquery-ui.css');
$cs->registerScriptFile($cs->getCoreScriptUrl().'/jui/js'.'/jquery-ui-i18n.min.js');

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'advertise-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=> array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true, 
		'validateOnChange'=>true,
		'afterValidate'=>"js:function(form, data, hasError){
			if(!hasError){
				var valid = true;
				$('input[id^=data_filed_]').each(function(){
					if($(this).val() == ''){
						alert('请完整填写广告模板所需数据！');
						valid = false;
						return valid;
					}
				});
				return valid;
			}else{return true;}}",
	),
)); ?>
<table class="tb tb2 " id="tips">
  <tr >
    <td class="tipsblock" >
    <ul id="tipslis">
        <li>提示：一个独占广告位同时只能显示一个广告，一个共存广告位将显示所有属于它的广告，如对联、浮标等可以同时显示。</li>
      </ul>
    </td>
  </tr>
</table>

<table width="100%" cellspacing="1" cellpadding="2" class="table_form">
  <tr >
    <th><?php echo $form->labelEx($model,'position_id'); ?></th>
    <td><?php echo $form->dropdownlist($model,'position_id', CHtml::listData(AdvertisePosition::model()->findAll(), 'id', 'label'), array('empty'=>'')); ?> <?php echo $form->error($model,'position_id'); ?></td>
  </tr>
  <tr >
    <th><?php echo $form->labelEx($model,'template_id'); ?></th>
    <td><?php echo $form->dropdownlist($model,'template_id', CHtml::listData(AdvertiseTemplate::model()->findAll(), 'id', 'name'), array('empty'=>'')); ?> <?php echo $form->error($model,'template_id'); ?></td>
  </tr>
  <tr >
    <td id="template_description" colspan="2"></td>
  </tr>
   <tr >
    <th><?php echo $form->labelEx($model,'name'); ?></th>
    <td><?php echo $form->textField($model,'name', array('size'=>'40')); ?><?php echo $form->error($model,'name'); ?></td>
  </tr>
  <tr >
    <th>投放有效期</th>
    <td>
    <?php echo $form->textField($model,'valid_start', array('size'=>12)); ?> - <?php echo $form->textField($model,'valid_end', array('size'=>12)); ?>
    <?php echo $form->error($model,'valid_start'); ?>
    <?php echo $form->error($model,'valid_end'); ?>
    </td>
  </tr>
  <tr >
    <th><?php echo $form->labelEx($model,'enabled'); ?></th>
    <td><?php echo $form->dropdownlist($model,'enabled', $model->getConstOptions('ENABLED')); ?></td>
  </tr>
  <tr >
    <th><?php echo $form->labelEx($model,'data'); ?></th>
    <td>重要提示：宽度、高度等数值，请填写数字即可；各类文件可使用已存在的URL，或者点击右侧上传按钮上传新文件<br />
    <span style="color:red">请注意宽度和高度，务必与广告位要求一致</span>
    </td>
  </tr>
  <tr >
    <td id="template_data" colspan="2">请先选择广告模板</td>
  </tr>
<tr>
    <th></th><td><button class="btn" type="submit" name="button" id="button">完成提交</button></td>
  </tr>
</table>
<?php $this->endWidget(); ?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
	$('#<?php echo CHtml::activeId($model, 'template_id'); ?>').change(function(){
		$("#template_description").load("<?php echo CHtml::normalizeUrl(array('advertise/template_description')); ?>", {template_id: $(this).val(), id: <?php echo intval($model->id) ?>}); 
		$("#template_data").load("<?php echo CHtml::normalizeUrl(array('advertise/template_data')); ?>", {template_id: $(this).val(), id: <?php echo intval($model->id) ?>}, function(){
			$("*[rel=fancybox]").fancybox({
				'width'				: 400,
				'height'			: 150,
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'centerOnScroll'	: true,
				'hideOnOverlayClick': false,
				'showNavArrows'		: false
							
			});
		}); 
	});
<?php if(!$model->isNewRecord): ?>
	$('#<?php echo CHtml::activeId($model, 'template_id'); ?>').trigger('change');
<?php endif; ?>
});

$(function() {
	var dates = $( "#<?php echo CHtml::activeId($model, 'valid_start')?>, #<?php echo CHtml::activeId($model, 'valid_end')?>" ).datepicker({
		defaultDate: "+1w",
		changeYear: true,
		changeMonth: true,
		numberOfMonths: 1,
		language: "zh-CN",
		dateFormat: 'yy-mm-dd',
		minDate: new Date(),
		onSelect: function( selectedDate ) {
			var option = this.id == "<?php echo CHtml::activeId($model, 'valid_start')?>" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
			dates.not( this ).datepicker( "option", option, date );
		}
	});
});
</script>