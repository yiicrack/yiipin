<div class="twitter_Feed">
	<div style="clear: both;"></div>
	<div class="twitter_avatar">
		<a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" target="_blank"> <img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'middle'); ?>" class="js_processed">
		</a>
	</div>
	<div class="twitter_right break-word">
		<div class="content">
			<span class="t_nickname"> <a class="a1 t_nickname_a" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" target="_blank"><?php echo $data->user->username ?></a>
			</span> <span class="t_content">：喜欢你的分享，送给你一颗</span>
		</div>
		<div style="clear: both;"></div>

		<div class="quote_box">
			<div style="border: none; padding: 0px;" class="twitter_note_txt">
				<div class="quote_picture">
					<a href="<?php echo $this->createUrl('/share/view', array('id'=>$data->share_id)); ?>" target="_blank"> 
					<?php echo CHtml::image($data->share->goods->getThumb(100), $data->share->goods->name, array('width'=>100, 'height'=>100, 'class'=>'goods_pic'));?>
					</a>
				</div>

				<div class="quoteabout">
					<div style="_margin-top: 8px;" class="quote_content">
						<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->share->user_id)); ?>">@<?php echo $data->share_user->username ?></a>：<?php echo $data->share->ParsedQuote ? $data->share->ParsedQuote : $data->share->goods->name; ?>
						<div style="clear: both;"></div>
					</div>
					<div class="quote_discuss_num">
						<a href="<?php echo $this->createUrl('/share/view', array('id'=>$data->share_id, '#'=>'comments')); ?>" target="_blank" class="a1"> 相关讨论<?php echo $data->share->comment_count ?>条</a>
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>

	</div>
	<div class="toolsBar">
		<div class="twitter_tools_source"><?php echo $data->created ?>&nbsp; 来自网站</div>
	</div>
	<div style="clear: both;"></div>
</div>