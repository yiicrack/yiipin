<li><a target="_blank"
	href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id));?>"
	class="avatar32 left trans07"><img
		src="<?php echo WebUser::getUcAvatarSrc($comment->user_id, 'small'); ?>"
		class="namecard js_processed"></a>
	<p>
		<a target="_blank"
			href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id));?>"
			class="fb"><?php echo $comment->user->username ?></a> <span
			class="hp_xin gray"><?php echo $comment->content ?></span>
	</p></li>