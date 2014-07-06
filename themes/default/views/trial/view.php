<?php
$this->pageTitle = $trial->name.'_免费使用';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.jcountdown1.3.3.js');
?>
<script type="text/javascript">
$(document).ready(function(){
	$(".countdown").each(function(){
		var time = $(this).attr('end-date');
		$(this).countdown({
			date: time, //Counting FROM a date
			onComplete: function( event ) {
				$(this).html('<span>剩余时间：</span><strong class="f14_f">已结束</strong>');
			},
			htmlTemplate: '<span>剩余时间：</span> <span id="f_d_wrapper"><strong id="f_d" class="f20">%{d}</strong><label>天 </label></span> <strong id="f_h" class="f20">%{h}</strong> <span>时 </span> <strong id="f_m" class="f20">%{m}</strong> <span>分</span> <strong id="f_s" class="f20">%{s}</strong> <span>秒</span>',
			leadingZero: true,
			direction: "down"
		})
	});

	$('#btn_apply_trial').click(function(){
		if(!Yiipin.check_login()) return false;
		if(confirm('您确定要申请该试用吗？')){
			$(this).parents('form').submit();
		}
	});
});
</script>
<div style="width: 946px; margin: 10px auto 0;" id="secondNav">
	<div id="personNavBar" class="p_navNew">
		<h2 class="f24 fb mr14 left">免费试用</h2>
		<p class="left">
			<span class="gray">常来常新，免费试用</span>
		</p>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<div id="main" class="container_12">
	<div class="grid_12">
		<div class="grid_9 alpha">
			<div style="_width: 680px;" class="box_shadow p13 mt14">
				<!--新浪微博组件-->
				<script charset="utf-8" type="text/javascript" src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=<?php echo Yii::app()->config->get('sina_appkey'); ?>"></script>
				<div class="wf_top">
					<a target="_blank" href="###" class="wf_pic left"><img src="<?php echo $trial->image; ?>"></a>
					<div class="wf_pr">
						<h3 class="wf_tle f20 red"><?php echo ModifierHelper::left($trial->name, 34); ?></h3>
						<p class="mt10 wf_num">
							<span>共</span><strong class="f20 red"><?php echo $trial->stock; ?></strong><span>份</span> <span class="ml10">价值：</span><span class="f20 red">￥</span><strong class="textdel f20 red"><?php echo $trial->price; ?></strong> <strong class="f20 red ml10"><?php echo $trial->apply_count; ?></strong><span>人申请</span>
						</p>
						<p id="f_time" class="mt10 wf_num countdown" end-date="<?php echo date('F d,Y H:i:s', strtotime($trial->end_time)) ?>">
							
						</p>

						<div class="mt10 overh">
						<?php if(strtotime($trial->end_time) >= time()): ?>
						<form action="<?php echo CHtml::normalizeUrl(array('/trial/order', 'id'=>$trial->id)); ?>" method="post">
							<div style="float:left" class="wf_ico1 cursor" id="btn_apply_trial"></div>
					    </form>
					    <?php endif;?>
							<div style="float:left;padding-top:10px;padding-left:20px">
							<wb:share-button 
        					    appkey="<?php echo Yii::app()->config->get('sina_appkey'); ?>" 
        					    pic="<?php echo Yii::app()->request->getHostInfo().Yii::app()->baseUrl.$trial->image ?>"  
        					    type="button"  
        					    title="<?php echo rawurlencode("#".Yii::app()->name."#期期都精彩，这期我最喜欢！嘿嘿~~也推荐".Yii::app()->name."免费试用的这期免费试用活动给你，想申请点击进入>> "); ?>" 
        					    height="25" size="middle" count="0">
        				   </wb:share-button>
        				    </div>
						</div>
						<div class="pro_intro">
							产品介绍：<?php echo ModifierHelper::left($trial->product_intro, 80); ?><a target="_blank" class="red" href="<?php echo $trial->product_url ?>">详细介绍&gt;&gt;</a>
						</div>
						<div class="wf_date"><?php echo date('Y年n月j日', strtotime($trial->start_time)); ?>开始</div>
					</div>
					<div class="clear"></div>
					
				</div>
			</div>

			<div class="box_shadow p13 mt14">
				<h3 class="f16 mt14">活动简介</h3>
				<div class="wf_two zoom l22">
					<?php echo $trial->content ?>
				</div>
			</div>

			<div class="box_shadow p13 mt14">
				<h3 class="f16">她们刚刚申请了福利</h3>
				<div class="applyed">
					<div class="wf_she">
						<a target="_blank" class="wf_sheimg" href="/person/u/9557512"><img src="http://d04.res.meilishuo.net/ap/b/f9/5e/50dbc54926b58b247e533fa70826_355_355.jpg"></a> <a target="_blank" class="wf_shename" href="/person/u/9557512">菩提..</a>
					</div>
					<div class="wf_she">
						<a target="_blank" class="wf_sheimg" href="/person/u/6926578"><img src="http://d02.res.meilishuo.net/ap/b/cd/90/1c77996b02c684975d815b22b735_100_100.jpg"></a> <a target="_blank" class="wf_shename" href="/person/u/6926578">许多..</a>
					</div>
					
				</div>
			</div>

			<h3 class="f16 mt14">活动讨论</h3>
			<div class="editorbg box_shadow mt14 p13" id="twitter_editor">
				<h3 class="ed_font">点滴分享，发现最美的自己</h3>
				<!-- 中间输入部分 -->
				<div id="twitter_editor_boxmid" class="text_wrapper">
					<!-- 输入推内容 -->
					<textarea class="editor" id="comment_content" name="content"></textarea>
				</div>
				<div class="clear"></div>
				<!-- 中间输入部分 结束-->

				<!-- 尾部 -->
				<div id="twitter_editor_boxBottom" class="pub_b">
					<div class="pub_list">
						<a class="toggle_smileys toggle" href="###">表情</a>
					</div>
					<!--提交按钮-->
					<a class="pub_sub cursor" href="###" id="btn_comment_submit"></a>

					<div class="clear"></div>
				</div>
				<!-- 尾部 结束-->

				<div class="clear"></div>
				<div class="message" style="display: none;"></div>
			</div>
            <script type="text/javascript">
            $(document).ready(function(){
                $('#btn_comment_submit').click(function(){
                	if(Yiipin.check_login()){
            			var content = $('#comment_content');
            			if(content.val() == ''){
            				alert('请输入评论！');
            				content.focus();
            				return false;
            			}
            			else{
            				var trial_id = <?php echo $trial->id?>;

            			    $.post('<?php echo $this->createUrl('/trial/comment'); ?>', {trial_id: trial_id, content: content.val()}, function(html){
            			        if(html == 'false'){
            				        alert('评论失败，请联系客服');
            				        return false;
            			        }
            			        content.val('');
            			        $.fn.yiiListView.update('comment-listview');
            				});
            			}
            		}
                });
            });
            </script>
			<div class="box_shadow mt14 p13">
			<?php $this->widget('zii.widgets.CListView', array(
                        'id'=>'comment-listview',
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>true,
                        'emptyText'=>'还没有任何评论哦，等你来评论！',
              			'cssFile' =>false,
                        'itemView'=>'_comment_listitem',
                        'itemsTagName'=>'ul',
                        'itemsCssClass'=>'pl_list',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'template'=>'{items}<div class="clear"></div><div id="pageNav">{pager}<div class="clear"></div></div>',
                    ));?>
                    
				
			</div>
		</div>

		<div class="grid_3 omega">
			<div class="box_shadow mt14 p13">
				<div class="mm_recommend hometop">
					<div class="p_face">
						<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$trial->user_id)); ?>">
						<img src="<?php echo WebUser::getUcAvatarSrc($trial->user_id, 'big');?>" id="person-avatar"></a> <a target="_blank" href="/settings/setAvatar"><div id="changeFace"></div></a>
					</div>
					<div class="p_nickname">
						<a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$trial->user_id)); ?>"><?php echo $trial->user->username ?></a>
					</div>
					<div class="p_statistic">
						<ul class="userP_statistic big">
							<li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$trial->user_id)); ?>" target="_blank">粉丝</a></span> <span><a class="p_nums" id='follower_num' href="<?php echo $this->createUrl('/misc/fans', array('user_id'=>$trial->user_id)); ?>" target="_blank"><?php echo $trial->user->fans_count ?></a></span></li>
					        <li><span><a class="p_f" href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$trial->user_id)); ?>" target="_blank">关注</a></span> <span><a class="p_nums" id='following_num' href="<?php echo $this->createUrl('/misc/follow', array('user_id'=>$trial->user_id)); ?>" target="_blank"><?php echo $trial->user->follow_count ?></a></span></li>
							<li style="border-right: none;"><span><a href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$trial->user_id)); ?>" target="_blank"><img src="<?php echo THEME_DIR ?>/images/ILikeit.gif" title="有<?php echo $trial->user->likeme_count ?>人喜欢了TA的推荐，你收到<?php echo $trial->user->likeme_count ?>颗红心" alt="红心" style="margin-top: 2px;" /></a></span> <span><a class="p_nums" id='heart_num' href="<?php echo $this->createUrl('/misc/likeme', array('user_id'=>$trial->user_id)); ?>"><?php echo $trial->user->likeme_count ?></a></span></li>
						</ul>
					</div>
					<div class="clear"></div>
        			<div class="p_flower" style="padding: 10px 0 0;width:200px">
        				<div>
        					<div class="follow">
        					  <?php if($trial->user->followed): ?>
                              <span id="fake" user_id="<?php echo $trial->user->id ?>" class="ex_notfollow f14">已关注</span>
                              <?php else:?>
                              <span id="fake" user_id="<?php echo $trial->user->id ?>" class="ex_follow f14">＋加关注</span>
                        	  <?php endif;?>
        					</div>
        					<div class="message" style="background: none;">
        						<span class="ex_message" user_id="<?php echo $trial->user->id ?>">发私信</span>
        					</div>
        				</div>
        				<div class="clear"></div>
        			</div>
        			<div class="clear"></div>
				</div>
				
		</div>
	</div>
	<div class="clear"></div>
</div>