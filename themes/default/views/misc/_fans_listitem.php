<div class="user_list">
	<div class="follow_avatar">
		<a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><img width="64" height="64" src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'middle');?>" title="<?php echo $data->user->username ?>"></a>
	</div>
	<div id="user_info">
		<div class="follow_user_name">
			<a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->username ?></a>
		</div>
		<div class="follow_user_info">
			<span>关注：<a target="_blank" href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->follow_count ?></a>|
			</span> <span>粉丝：<a target="_blank" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->fans_count ?></a>|
			</span> <span>分享：<a target="_blank" href="<?php echo $this->createUrl('/person/share', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->share_count ?></a>|
			</span> <span><a target="_blank" href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$data->user_id)); ?>" class="heart_pic">&nbsp;</a>：<a target="_blank" href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->likeme_count ?></a></span>
		</div>
		<div class="follow_user_info"><?php echo $data->user->province ?>，<?php echo $data->user->city ?></div>
		<div class="follow_user_info"><?php echo $data->user->signature ?></div>
	</div>

	<div style="float: right;" class="search_follow">
	    <?php if($data->user->followed):?>
	    <span style="cursor: pointer;" class="new_notfollow mt10" user_id="<?php echo $data->user_id; ?>">已关注</span>
	    <?php else:?>
		<span style="cursor: pointer;" class="new_follow mt10" user_id="<?php echo $data->user_id; ?>">＋加关注</span>
		<?php endif; ?>
		<div class="clear"></div>
		<div style="cursor: pointer; margin-left: 5px;" class="ex_message mt10 red" user_id="<?php echo $data->user_id; ?>">
			<span>发私信</span>
		</div>

	</div>

</div>