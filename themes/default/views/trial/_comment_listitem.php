<div class="g_twitter elite">
	<div class="avatar64">
		<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small'); ?>" alt="<?php echo $data->user->username ?>"></a>
	</div>
	<div class="twitter_r break-word r">
		<div class="ico"></div>
		<h3 class="f14 red">
			<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->username ?></a>
		</h3>
		<div class="t_con l22">
			<?php echo $data->ParsedContent; ?>
		</div>
		<div class="clear"></div>
		<div class="pic_con">
			<div class="goods_title red l22 none">
				<!-- 展开大图title -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="t_bar gray">
			<em class="from"> <?php echo UtilHelper::sgmdate('Y年j月n日', strtotime($data->created));?> </em>
		</div>
	</div>
	<div class="clear"></div>
</div>