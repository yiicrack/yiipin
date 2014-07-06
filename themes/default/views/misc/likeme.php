<?php 
$this->pageTitle = "谁喜欢了".($this->user->id == Yii::app()->user->id ? '我':$this->user->username)."的分享";
$this->keywords = '';

?>

<div class="container_12" id="main">

	<div class="grid_9">

		<div class="box_shadow p13 mt14" id="twitter">
			<div class="page_wrapper_title">
				<h1>谁喜欢了<?php echo ($this->user->id == Yii::app()->user->id ? '我':$this->user->username); ?>的分享</h1>
				<div class="clear"></div>
			</div>
			
			<?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_likeme_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'template'=>'<div id="twitter_show_list">{items}</div><div class="c"><div id="pageNav">{pager}</div><div class="clear"></div></div>',
                    ));
?>
		</div>

	</div>

	<div class="pinnable grid_3 omega">
		<?php $this->renderPartial('/person/_sidebar');?>
		<div class="mt10"></div>
	</div>
	<div class="clear"></div>
</div>