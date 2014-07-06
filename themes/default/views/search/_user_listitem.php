<div class="box_shadow mt14 poster_wall mlsPin left_f" style="margin:10px 8px;">
	<div class="mm_recommend person_top p13">
		<div user_id="<?php echo $data->id ?>" class="p_face">
			<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->id)); ?>"> <img src="<?php echo WebUser::getUcAvatarSrc($data->id, 'big');?>" title="<?php echo $data->username ?>" id="person-avatar">
			</a>
		</div>
		<div class="p_nickname">
			<span class="online"> <a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->id)); ?>"><?php echo $data->username ?></a>
			</span>
		</div>
		<div class="p_statistic">
			<ul class="userP_statistic ">
				<li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$data->id)); ?>" target="_blank">粉丝</a></span> <span><a class="p_nums" id='follower_num' href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$data->id)); ?>" target="_blank"><?php echo $data->fans_count ?></a></span></li>
				<li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$data->id)); ?>" target="_blank">关注</a></span> <span><a class="p_nums" id='following_num' href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$data->id)); ?>" target="_blank"><?php echo $data->follow_count ?></a></span></li>
				<li style="border-right: none;"><span><a href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$data->id)); ?>" target="_blank"><img src="<?php echo THEME_DIR ?>/images/ILikeit.gif" title="有<?php echo $data->likeme_count ?>人喜欢了你的推荐，你收到<?php echo $data->likeme_count ?>颗红心" alt="红心" style="margin-top: 2px;" /></a></span> <span><a class="p_nums" id='heart_num' href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$data->id)); ?>"><?php echo $data->likeme_count ?></a></span></li>
			</ul>
		</div>
		<div style="padding: 10px 0 0; margin-left: 46px; display: inline;" class="p_flower">
			<div class="follow">
			<?php if($data->id == Yii::app()->user->id):?>
				<span class="ex_follow f14" user_id="<?php echo $data->id ?>" >自己哟</span>
            <?php else:?>
				     <?php if($data->followed): ?>
                      <span id="fake" user_id="<?php echo $data->id ?>" class="ex_notfollow f14">已关注</span>
                      <?php else:?>
                      <span id="fake" user_id="<?php echo $data->id ?>" class="ex_follow f14">＋加关注</span>
                	  <?php endif;?>
			<?php endif;?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>