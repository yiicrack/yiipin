<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.tools.min.js', CClientScript::POS_END);
?>
<div class="person-left mt14">
	<div class="box_shadow p13" style="width: 200px; overflow: hidden; *padding: 12px;">
		<div class="mm_recommend person_top">
			<div class="p_face">

				<img id="person-avatar" src="<?php echo WebUser::getUcAvatarSrc($this->user->id, 'big');?>" />
           <?php if($this->user->id == Yii::app()->user->id):?>
            <a href="<?php echo $this->createUrl('/settings/avatar'); ?>" target="_blank">
					<div id="changeFace"></div>
				</a> 
           <?php endif;?>
           </div>
			<div class="p_nickname">
				<span class="online"><a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$this->user->id)); ?>" target="_blank"><?php echo $this->user->username ?></a></span>
			</div>
			<div class="p_statistic">
				<ul class="userP_statistic big">
					<li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$this->user->id)); ?>" target="_blank">粉丝</a></span> <span><a class="p_nums" id='follower_num' href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$this->user->id)); ?>" target="_blank"><?php echo $this->user->fans_count ?></a></span></li>
					<li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$this->user->id)); ?>" target="_blank">关注</a></span> <span><a class="p_nums" id='following_num' href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$this->user->id)); ?>" target="_blank"><?php echo $this->user->follow_count ?></a></span></li>
					<li style="border-right: none;"><span><a href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$this->user->id)); ?>" target="_blank"><img src="<?php echo THEME_DIR ?>/images/ILikeit.gif" title="有<?php echo $this->user->likeme_count ?>人喜欢了你的推荐，你收到<?php echo $this->user->likeme_count ?>颗红心" alt="红心" style="margin-top: 2px;" /></a></span> <span><a class="p_nums" id='heart_num' href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$this->user->id)); ?>"><?php echo $this->user->likeme_count ?></a></span></li>
				</ul>
			</div>
			<?php if($this->user->id != Yii::app()->user->id):?>
			<div class="clear"></div>
			<div class="p_flower" style="padding: 10px 0 0;width:200px">
				<div>
					<div class="follow">
					  <?php if($this->user->followed): ?>
                      <span id="fake" user_id="<?php echo $this->user->id ?>" class="ex_notfollow f14">已关注</span>
                      <?php else:?>
                      <span id="fake" user_id="<?php echo $this->user->id ?>" class="ex_follow f14">＋加关注</span>
                	  <?php endif;?>
					</div>
					<div class="message" style="background: none;">
						<span class="ex_message" user_id="<?php echo $this->user->id ?>">发私信</span>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<?php endif;?>
			<div class="clear"></div>
		</div>

	</div>
	<div class="box_shadow mt14 p13 zoom">
		<div class="left">
		<?php if($this->user->id == Yii::app()->user->id):?>
			<?php 
			$tags = $this->user->getTags();
			if(count($tags)==0):?>
				<div class="tie grey666">
					<h4 class="tie_l"></h4>
					<h4 class="tie_r"></h4>
					<a href="javascript:;" id="btnTagMe">贴上描述自己的标签</a>
				</div>
			<?php else:?>
			    <div class="e_tabs"> 
			    <p class="labelList">
			    <ul><li>
			    <?php foreach($tags as $data):?>
				<div class="new_label" style="margin-top: 5px; cursor:pointer"><span class="normal"><?php echo $data->name ?></span></div>
				<?php endforeach;?>
			    </li></ul>
			     </p> 
			     <div class="clear_f"></div>  
			     <p class="mt8_f"><a href="javascript:void(0)" class="showLabel gray_f">编辑</a></p>  </div>
			<?php endif;?>
		<?php else:?>	
			<ul>
				<li><span class="normal"><a>擅长找白菜</a></span></li>
			</ul>
	    <?php endif;?>
		</div>
		<div class="clear"></div>
		<div class="p_detail mt14">
			<h3 class="about_text break-word">
				<img src="<?php echo THEME_DIR?>/images/dotleft_n.gif" /><span id="signature"><?php if($this->user->signature):?><?php echo $this->user->signature ?><?php else:?> 这里是你在<?php echo Yii::app()->name ?>的签名档，宣布你的美丽态度。<?php endif;?></span> <img src="<?php echo THEME_DIR ?>/images/dotright_n.gif" />
			</h3>
			<?php if($this->user->id == Yii::app()->user->id):?>
			<h4 class="grey999 gray">
				<span><a href="javascript:;" id="btnEditDeclaration">编辑 </a></span>
			</h4>
			<?php endif;?>
		</div>

	</div>
</div>
	

<script type="text/javascript">
$(document).ready(function(){
    $('#btnTagMe, .showLabel').click(function(){
    	$('#label-popwin').dialog({
    		'title':'我的标签',
            'autoOpen':true,
    		'modal':true,
    		'width':'720px'
    	});
    });

    $("#slider").scrollable();

    $('#btnEditDeclaration').click(function(){
    	$('#beaty-declaration').dialog({
    		'title':'我的美丽宣言',
            'autoOpen':true,
    		'modal':true,
    		'width':'400px'
    	});
    });

    $('.beaty-cancel').click(function(){
    	$('#beaty-declaration').dialog('close');
    });

    $('.beaty-confirm').click(function(){
        var content = $('#beaty-declaration-text').val();
        if(content.length>40){
            alert('不能超过40个字！');
            $('#beaty-declaration-text').focus();
            return;
        }
        $.post('<?php echo $this->createUrl('/settings/updatesignature'); ?>', {signature: content}, function(){
        	$('#beaty-declaration').dialog('close');
        	$('#signature').text(content);
        });
    });

    //关注用户
	$('#fake.ex_follow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get('<?php echo $this->createUrl('/misc/act_follow'); ?>', {user_id: $(this).attr('user_id'), act: 'on'}, function(){
			btn.removeClass('ex_follow').addClass('ex_notfollow');
			btn.text('已关注');
			btn.hover(function(){$(this).text('取消关注');}, function(){$(this).text('已关注')});
		});
	});
	
	$('#fake.ex_notfollow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get('<?php echo $this->createUrl('/misc/act_follow'); ?>', {user_id: $(this).attr('user_id'), act: 'off'}, function(){
			btn.removeClass('ex_notfollow').addClass('ex_follow');
			btn.html('+ 加关注').unbind('hover');
		});
	});

	$('#fake.ex_notfollow').live({mouseover: function(){$(this).text('取消关注');}, mouseout:function(){$(this).text('已关注')}});

	//贴标签
	$('.items .new_label').click(function(){
		if($('#labelselectlist .new_label').size() < 20){
    		var label = $('<div title="点击删除" class="new_label" style="margin-top: 5px; cursor:pointer" tag_id="'+$(this).attr('tag_id')+'"><span class="normal">'+$(this).text()+'</span></div>');
    	    if($('#labelselectlist').has('div[tag_id='+$(this).attr('tag_id')+']').size()==0){
        	    $('#labelselectlist li').append(label);
    	    }
		}
		else{
		   alert('最多只能贴20个标签哦！');
		}
	});

	$('.lable-submit').click(function(){
		var name = $('#label-edit').val();
		if(name.length > 1){
    		if($('#labelselectlist .new_label').size() < 20){
        		var label = $('<div title="点击删除" class="new_label" style="margin-top: 5px; cursor:pointer" tag_id="'+name+'"><span class="normal">'+name+'</span></div>');
        	    if($('#labelselectlist').has('div[tag_id='+name+']').size()==0){
            	    $('#labelselectlist li').append(label);
        	    }
    		}
    		else{
    		   alert('最多只能贴20个标签哦！');
    		}
    		$('#label-edit').val('');
		}
		else{
		    alert('标签最短两个字哦！');
		}
	});

	$('#labelselectlist .new_label').live('click', function(){
		$(this).remove();
	});

	$('.label-confirm').click(function(){
	    var tag_ids = '';
	    $('#labelselectlist .new_label').each(function(){
	    	tag_ids += $(this).attr('tag_id') + ',';
		});
		$.post('<?php echo $this->createUrl('person/setTags'); ?>', {tag_ids: tag_ids}, function(result){
		   if(result == 'true'){
			   $('#label-popwin').dialog('close');
			   window.location.reload();
		   }
		});
	});

	<?php if($this->user->id == Yii::app()->user->id): ?>
	//推荐用户关注
	$.get('<?php echo $this->createUrl('/person/commendfollow'); ?>', {}, function(html){
		if(html != 'false'){
    		$('#ajax-dialog').html(html).dialog({
    			'title':'推荐关注',
    	        'autoOpen':true,
    			'modal':true,
    			'width':'625px'
    		});
		}
	});
	<?php endif;?>
});
</script>
<div id="label-popwin" style="display:none">
	<div class="content">
		<div class="my_label">
			<div id="labelselectlist" class="label-labelselected">
				<ul>
					<li class="sel_tab">
					<?php foreach($this->user->getTags() as $data):?>
					<div title="点击删除" class="new_label" style="margin-top: 5px; cursor:pointer" tag_id="<?php echo $data->id ?>"><span class="normal"><?php echo $data->name ?></span></div>
					<?php endforeach;?>
					</li>
				</ul>
			</div>
		</div>
		<div id="current-tab-decribe" class="label_tips1">告诉大家自己最擅长的美丽技能吧！</div>
		<div class="label_tips2">点击进行选择，你可以给自己贴20个标签哦！</div>
		<div id="label-hint-box" style="display: none;"></div>
		<div style="clear: both;"></div>
		<div id="sliderprev">
			<a href="javascript:;" class="prev"></a>
		</div>

		<div id="slider" style="width: 580px; height: 54px; overflow: hidden;position:relative">
			<ul class="items" style="width: 2320px; position:absolute">
				<li style="float: left;">
					<?php foreach ($this->getUserTags() as $index=>$data): ?>
					<div class="new_label" style="margin-top: 5px;" tag_id="<?php echo $data->id ?>">
						<a class="normal" href="javascript:;"><?php echo $data->name ?></a>
					</div> 
					<?php if(($index+1) % 20 == 0): ?>
					</li>
					<li style="float: left;">
					<?php endif;?>
					
					<?php endforeach;?>
					</li>
			</ul>
		</div>
		
		<div id="slidernext">
			<a href="javascript:;" class="next"></a>
		</div>
		<div class="label-edit-box">
			<div class="write_tip">或自己写标签：</div>
			<input type="text" value="" class="label-edit" id="label-edit" name="label-edit"> <input type="button" value="贴上" onclick="" class="lable-submit">
		</div>
		<div id="label-hint-box-addsuccess"></div>
		<div style="clear: both;"></div>
		<input type="button" class="label-confirm" value="确  定">
	</div>
	<!-- ./#label-popwin -->
</div>

<div class="beaty-declaration" id="beaty-declaration" style="display: none">
	<div class="content">
        <div class="beaty-declaration-title">说一句你的美丽宣言</div>
        <div class="beaty-declaration-explain">(最多40字)</div>
        <div style="float:left;margin:0px 10px;display:inline;">
            <textarea class="beaty-declaration-text" id="beaty-declaration-text" name="beaty-declaration-text"><?php echo $this->user->signature ?></textarea>
            <div class="checkbox"><input type="checkbox" checked="checked" id="beaty-declaration-telleverybody" name="beaty-declaration-telleverybody">&nbsp;&nbsp;&nbsp;告诉大家</div>
            <div style="clear:both;"></div>
            <div class="mt10 w330">
                    <input type="button" value="" class="beaty-confirm beaty-button">
                    <input type="button" value="" class="beaty-cancel beaty-button">
            </div>
            <div class="clear"></div>
        </div>
   </div>
</div>