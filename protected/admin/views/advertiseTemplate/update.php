<?php
$label = CActiveRecord::model('AdvertiseTemplate')->modelName;
Yii::app()->clientScript->registerScriptFile('/editarea/edit_area_full.js');
$this->breadcrumbs=array(
	$label.'管理',
    '修改'.$label,
);

?>

<div class="col-tab">
  	<div class="contentList pad-10" id="div_setting_1">
	<?php echo $form; ?>
	</div>
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
	editAreaLoader.init({
		id : "<?php echo CHtml::activeId($form->model, 'template'); ?>"		// textarea id
		,language: 'zh'
		,syntax: "html"			// syntax to be uses for highgliting
		,start_highlight: true		// to display with highlight mode on start-up
		,cursor_position: 'auto'
	});
})

</script>