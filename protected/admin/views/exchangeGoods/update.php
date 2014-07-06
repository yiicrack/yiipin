<?php
$label = CActiveRecord::model('ExchangeGoods')->modelName;

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
	editor = K.create('#ExchangeGoods_content', {
        allowFileManager: false,
        resizeType: 1,
        newlineTag: 'p',
        uploadJson: '<?php echo $this->createUrl('upload') ?>'
	});
});
</script>