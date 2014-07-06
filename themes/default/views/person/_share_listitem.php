<div class="poster_wall h_poster  box_shadow break-word mt14 mlsPin" share_id="<?php echo $data->id ?>">
	<div class="hp_top">
		<div class="goods_pic hp_pic c">
			<div class="like_merge pa">
				<a href="javascript:void(0)"
					class="poster_comment plm_bg w47 cursor r"><span
					class="plm_bgr pr r"></span><em class="lm_comm">&nbsp;</em>评论</a> <a
					href="javascript:void(0)"
					class="poster_forward plm_bg hw76 cursor left"><span
					class="plm_bgr pr r"></span><em class="lm_shouji">&nbsp;&nbsp;</em>收进杂志</a>
					<?php if($this->user->id == Yii::app()->user->id):?>
				    <a class="poster_delete plm_bg w33 cursor left"><span class="plm_bgr pr r"></span>删除</a>
                    <?php endif;?>
			</div>


			<?php if($data->goods->price > 0): ?><div class="hp_price">￥<?php echo number_format($data->goods->price, 2); ?></div><?php endif;?>


			<div class="content none">
				<span class="t_usecontent"><?php echo $data->ParsedQuote ?></span>
			</div>
			<a target="_blank"
				href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>">
				<?php echo CHtml::image($data->goods->thumb, $data->goods->name, array('width'=>200, 'height'=>$data->goods->getImageHeight(200), 'alt'=>$data->goods->name));?>
				
				</a>
		</div>

		<div class="comm_outbox">
			<div class="mt14">
				<span><b><?php echo $data->comment_count ?></b> 评论</span>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="hp_b">
		<dl class="hp_share">
			<dt class="avatar32">
				<a target="_blank" user_id="<?php echo $data->user_id ?>" href="<?php echo $data->user_id ?>" class="avatar32_f trans07"><img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small') ?>"></a>

			</dt>
			<dd>
				<span id="attr_uid_357313100" class="fb"><a target="_blank"
					href="<?php echo $data->user_id ?>"><?php echo $data->username ?></a></span>
				<span class="gray">分享到</span> <span id="tuijian_357313100"
					class="com_link"><a target="_blank"
					href="<?php echo $this->createUrl('/group/view', array('id'=>$data->group_id)); ?>"><?php echo $data->group_name ?></a></span>
			</dd>
		</dl>
		<div class="clear"></div>
	</div>
	<ul class="hp_s_c">
		<!-- 评论人开始 -->
		<?php foreach($data->getNewComments(3) as $comment): ?>
		<li><a target="_blank"
			href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id));?>"
			class="avatar32 left trans07"><img
				src="<?php echo WebUser::getUcAvatarSrc($comment->user_id, 'small'); ?>"
				class="namecard js_processed"></a>
			<p>
				<a target="_blank"
					href="<?php echo $this->createUrl('/person/index', array('user_id'=>$comment->user_id));?>"
					class="fb"><?php echo $comment->username ?></a> <span
					class="hp_xin gray"><?php echo $comment->content ?></span>
			</p></li>
	 <?php endforeach;?>
	 <?php if($data->comment_count > 3):?>
	 <a class="cursor" href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id, '#'=>'comments')); ?>" target="_blank">
		<li class="c">查看全部<?php echo $data->comment_count ?>条评论...</li>
	 </a>
	 <?php endif;?>
	
	</ul>

	<div class="hp_cmt none">
		<a target="_blank" href="#" class="avatar32 mt10 left"><img src="<?php echo THEME_DIR ?>/images/0.gif"></a>
		<div class="c_r mt10 r">
			<textarea class="comm_box answer_text f12 gray" style="background-color: rgb(255, 255, 255);"></textarea>
			<div class="discussing">
				<span class="left cursor"><a class="share_smileys"></a><small>▼</small></span> <span class="r">
				<a class="pl_btn person_share_comment_btn cursor l22" href="javascript:void(0);">评 论</a></span>
			</div>
		</div>
	</div>

	<div class="clear"></div>
</div>