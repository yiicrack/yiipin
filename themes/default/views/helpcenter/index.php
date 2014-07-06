<?php
$this->pageTitle = '帮助中心';
$this->breadcrumbs=array(
	'帮助中心',
);
?>
<div class="container_12" id="main">

	<div style="_overflow: hidden;" class="grid_9">
		<div class="box_shadow p13 mt14" id="about_us_utterance">
			<div style="width: 680px; border: none;" id="apply_innertest_utterance" class="about_innertest_utterance">
				<div class="help_title"><?php echo Yii::app()->name  ?>帮助</div>
				<div class="mt14"></div>
				<div class="help_con">
				<?php foreach($helps as $index=>$data):?>
					<h3 id="h_<?php echo $index+1; ?>" class="help_ctitle"><?php echo $data->title ?></h3>
					<?php echo $data->content ?>
					<div class="help_clear"></div>
					
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>

	<div class="pinnable grid_3 omega">
		<div class="help_right box_shadow p13 mt14 red">
		<?php foreach($helps as $index=>$data):?>
			<div>
				<a href="#h_<?php echo $index+1; ?>">&gt;&gt;<?php echo $data->title ?></a>
			</div>
		<?php endforeach;?>
		</div>

		<div class="mt10"></div>
	</div>
	<div class="clear"></div>
</div>