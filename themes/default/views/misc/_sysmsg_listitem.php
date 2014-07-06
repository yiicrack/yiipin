<div class="pmsg_one_msg_info_0" style="position: relative;">
	<div class="right pmsg_one_msg_info_delete" id="57" style="position: absolute; right: 0px; top: 20px; display: none;">
		<a href="###" msg_id="<?php echo $data->id; ?>">×</a>
	</div>
	<div class="pmsg_one_msg_info_avatar">
		<img src="<?php echo THEME_DIR ?>/images/mlslogo.jpg">
	</div>
	<!-- twitter_avatar -->
	<div class="left pmsg_one_msg_info_content">
		<div class="f14n left"><?php echo Yii::app()->name ?>系统消息:</div>
		&nbsp;&nbsp;亲爱的<?php echo $this->user->username ?><br>
		<div style="margin-top: 6px;">
			<?php echo $data->content ?>
			 <br> （<?php echo $data->created ?>）
		</div>

	</div>
	<div class="pmsg_one_msg_info_toolbar">&nbsp;</div>
	<div style="clear: both;"></div>
</div>