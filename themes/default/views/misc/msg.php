<?php 
$this->pageTitle = "我的私信";
$this->keywords = '';
?>

<div class="container_12" id="main">
	<div style="_overflow: hidden;" class="grid_9">
		<div class="mt14 box_shadow p13">
			<div class="hp_tab">
				<ul class="hp_lt">
					<li class="active red"><a href="###">私信</a></li>
					<li class=""><a href="<?php echo $this->createUrl('sysmsg', array('user_id'=>Yii::app()->user->id)); ?>">系统消息</a></li>
				</ul>
			</div>
			<div class="pmsg_list_wrap">
            <iframe src="<?php echo $this->createUrl('pm', array('user_id'=>$this->user->id)); ?>" width="100%" height="700" frameborder="0"></iframe>
			</div>
		</div>
		<!-- .box_shadow -->
	</div>


	<div class="pinnable grid_3 omega">
		<?php $this->renderPartial('/person/_sidebar');?>
		<div class="mt10"></div>
	</div>
	<div class="clear"></div>
</div>
