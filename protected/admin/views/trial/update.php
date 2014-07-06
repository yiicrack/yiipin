<?php
$label = CActiveRecord::model('Trial')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '修改'.$label,
);


?>

<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<?php echo $form; ?></div>
</div>
<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script type="text/javascript">
KindEditor.ready(function(K) {    
	editor = K.create('#Trial_content', {
        allowFileManager: false,
        resizeType: 1,
        newlineTag: 'p',
        uploadJson: '<?php echo $this->createUrl('upload') ?>'
	});
});
</script>
<?php $this->widget('ext.calendar.SCalendar', array(
        'inputField'=>CHtml::activeId($form->model,'start_time'),
        'ifFormat'=>'%Y-%m-%d %H:%M:%S', 
        'showsTime'=>true,
        'timeFormat'=>24,
    )); ?>
<?php $this->widget('ext.calendar.SCalendar', array(
        'inputField'=>CHtml::activeId($form->model,'end_time'),
        'ifFormat'=>'%Y-%m-%d %H:%M:%S', 
        'showsTime'=>true,
        'timeFormat'=>24,
    )); ?>