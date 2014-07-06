<div id="dialogContent" style="width: 605px;">
	<div class="zero_fow">
		<div style="height: 66px;" class="zero_t">
			<p class="nick">
				Hi, <b><?php echo Yii::app()->user->name ?>:</b>
			</p>
			<p class="txt">关注一些你可能感兴趣的人～看看他们都在逛什么吧！</p>
		</div>
		<div class="clear_f"></div>
		<ul class="zero_c">
		<?php foreach($users as $data):?>
			<li><a target="_blank" href="<?php echo $this->createUrl('person/index', array('user_id'=>$data->id)); ?>" class="avatar64_f userUrl1"><img src="<?php echo WebUser::getUcAvatarSrc($data->id, 'middle'); ?>"></a>
				<p class="z_tle">
					<span class="right_f"><input type="checkbox" checked="checked" id="checkedbox" user_id="<?php echo $data->id ?>" class="sel_box"></span><a target="_blank" href="<?php echo $this->createUrl('person/index', array('user_id'=>$data->id)); ?>" class="userUrl "><?php echo $data->username ?></a>
				</p>
				<p>
					<span class="similar gray_f"><?php echo $data->tagStr; ?></span>
				</p>
				<p>
					粉丝<a target="_blank" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$data->id)); ?>" class="fans red_f"><?php echo $data->fans_count ?></a> 
					分享<a target="_blank" href="<?php echo $this->createUrl('/person/share', array('user_id'=>$data->id)); ?>" class="share red_f"><?php echo $data->share_count ?></a> 
					<a target="_blank" href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$data->id)); ?>" class="red_f"><em class="lm_love">&nbsp;</em><?php echo $data->likeme_count ?></a>
				</p></li>
		<?php endforeach;?>
		</ul>
		<div class="clear"></div>
		<div class="zero_b">
			<span class="ienot"><input type="checkbox" checked="checked" id="selectall" onclick="$('input.sel_box').attr('checked', $(this).attr('checked') == 'checked');">全选</span><a class="sure btn" id="afterFollow">关注，回我的首页</a>
		</div>
	</div>
	<div class="clear_f"></div>
</div>
<script type="text/javascript">
$('#afterFollow').click(function(){
	var ids = new Array();
	$('input.sel_box:checked').each(function(){
	    ids.push($(this).attr('user_id'));
	});
	
    $.post('<?php echo $this->createUrl('misc/act_batch_follow'); ?>', {ids: ids}, function(result){
        if(result=='true'){
        	$('#ajax-dialog').dialog('close');
        }
    });
});
</script>