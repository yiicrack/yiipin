<div class="comm_share">
	<a class="avatar32_f trans07" user_id="<?php echo $comment->user_id ?>"
		href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id)); ?>" target="_blank"> <img
		src="<?php echo WebUser::getUcAvatarSrc($comment->user_id, 'small'); ?>" /></a>
	<p class="ml40_f">
		<a class="fb_f" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id)); ?>" target="_blank"><?php echo $comment->username ?></a> 
		<span class="gray_f"><?php echo $comment->ParsedContent ?> </span>
	</p>
	<div class="clear_f"></div>
</div>