<div class="cmn_title mt14_f">
	<p>
		<a class="rep_daren" href="#" target="_blank">换一组<samp>&gt;&gt;</samp></a>
	</p>
	<h3 class="f16_f">你可能感兴趣的人</h3>
</div>
<ul style="height: 184px; display: block;" class="interest">
<?php foreach($users as $data):?>
	<li><a href="<?php echo $this->createUrl('person/index', array('user_id'=>$data->id)); ?>" target="_blank" class="avatar48_f"><img src="<?php echo WebUser::getUcAvatarSrc($data->id, 'small');?>"></a>
		<p>
			<a href="<?php echo $this->createUrl('person/index', array('user_id'=>$data->id)); ?>" target="_blank"><?php echo $data->username ?><em class="i_buyer">&nbsp;</em></a>
		</p>
		<p><?php echo $data->tagStr ?></p>
		<p>
			<a user_id="<?php echo $data->id; ?>" href="#" class="btn new_notfollow">＋ 加关注</a>
		</p></li>
<?php endforeach;?>
</ul>