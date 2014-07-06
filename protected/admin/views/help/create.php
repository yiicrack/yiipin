<?php
$label = CActiveRecord::model('Help')->modelName;

$this->breadcrumbs=array(
	$label.'管理',
    '添加'.$label,
);

?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<?php echo $form; ?>
</div>
</div>
<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script type="text/javascript">

KindEditor.ready(function(K) {    
	editor = K.create('#Help_content', {
        allowFileManager: true,
        resizeType: 1,
        newlineTag: 'p',
        uploadJson: '<?php echo $this->createUrl('site/upload') ?>'
	});
});
</script>