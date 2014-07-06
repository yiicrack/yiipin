<?php
$this->beginContent('//layouts/basic');
?>

<script type="text/javascript">
$('body').css('background-color', 'transparent');
</script>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'share-goods',
	//'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>$this->pageTitle,
        'autoOpen'=>true,
		'modal'=>true,
		'width'=>'550px',
    ),
));?>
	<?php echo $content ?>
<?php $this->endWidget ();?>

<?php $this->endContent(); ?>