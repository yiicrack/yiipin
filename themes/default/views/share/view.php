<?php 
$this->pageTitle = $share->goods->name ? $share->goods->name : "{$share->user->username}分享到{$share->group->name}杂志的宝贝";
$this->keywords = $this->keywords.",{$share->user->username},分享, 图片, 宝贝";
$this->description = "{$share->group->name}杂志的精彩宝贝 - ".Yii::app()->name."用户@{$share->user->username}的分享，{$share->quote}";
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/css_pirobox/style_1/style.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/pirobox_extended_min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/base64.js');
?>
<script type="text/javascript">
function likeMagazine(obj, share_id){
	if(!Yiipin.check_login()) return;

	var link = $(obj);

	if(link.hasClass('liked')){
		$.get('<?php echo $this->createUrl('/group/like'); ?>', {share_id: share_id, like: 0}, function(like_count){
			link.removeClass('liked').html('<span class="likePanel"><samp class="lm_love">&nbsp;</samp>喜欢</span><span class="likeNum">'+like_count+'</span>');
		});
	}
	else{
		$.get('<?php echo $this->createUrl('/group/like'); ?>', {share_id: share_id, like: 1}, function(like_count){
			link.addClass('liked').html('<span class="likePanel">已喜欢</span><span class="likeNum">'+like_count+'</span>');
		});
	}
	
}

function forwardMagazine(obj, share_id){
	if(!Yiipin.check_login()) return;

	$.post('<?php echo $this->createUrl('/goods/collect'); ?>', {share_id: share_id}, function(html){
		if(html != 'false'){
			$("#share-goods").dialog("close");
			$('#ajax-dialog').html(html).dialog({
				'title':'收进杂志',
		        'autoOpen':true,
				'modal':true,
				'width':'550px'
			});
		}
		else{
			$('#linkMessageTips').html('<span class="red">宝贝链接好像不对哦，换一个试试看</span>');
		}
	});
	
}

function replyInEditbox(name){
	$('.reply_box textarea').val('回复@'+name+"：").focus();
}

$(document).ready(function(){
    $('.pl_btn').click(function(){
    	if(Yiipin.check_login()){
			var content = $('.reply_box textarea');
			if(content.val() == ''){
				alert('请输入评论！');
				content.focus();
				return false;
			}
			else{
				var share_id = <?php echo $share->id?>;

			    $.post('<?php echo $this->createUrl('/share/comment'); ?>', {share_id: share_id, content: content.val()}, function(html){
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
<script type="text/javascript">

$(document).ready(function(){
	var seller_id = 0;
    <?php if(!empty($share->goods->taobao_seller_nick)): ?>
    TOP.api({method:'taobao.taobaoke.widget.shops.convert', fields: 'user_id,shop_title,click_url', seller_nicks: '<?php echo $share->goods->taobao_seller_nick ?>'}, function(resp) {
    	if($.isEmptyObject(resp) || resp.error_response != undefined) {
    		if($('#shop-url-link').attr('href')=='###') $('#shop-url-link').parent().remove();
    		seller_id = 0;
    	}else{
    	    $('#shop-url-link').attr('href', resp.taobaoke_shops.taobaoke_shop[0].click_url);
    	    seller_id = resp.taobaoke_shops.taobaoke_shop[0].user_id;
    	}
        <?php if(Yii::app()->config->get('comment_collect_on') === 'true'): ?>
        Yiipin.fluid_runing = true;
        $.get('<?php echo $this->createUrl('/goods/collect_comment'); ?>', {share_id:<?php echo $share->id; ?> ,item_key: '<?php echo $share->goods->item_key; ?>', seller_id: seller_id}, function(){
        	Yiipin.fluid_runing = false;
        	$.fn.yiiListView.update('comment-listview');
        });
        <?php endif;?>
    });
    <?php endif;?>

    
});

</script>
<div id="main" class="container_12">
	<div class="grid_12">
		<div class="grid_9 alpha">
			<div class="box_shadow mt14 p13">
				<div class="singleGoods t_341155175" style="padding-bottom: 0;" id="t341155175">
					<dl class="twitter_top">
						<dt>
							<a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$share->user_id)); ?>" target="_blank"><img src="<?php echo WebUser::getUcAvatarSrc($share->user_id, 'small') ?>" /></a>
						</dt>
						<dd>
							<span class="r" style="color: #ccc;"><?php echo $share->created ?></span> <a class="red" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$share->user_id)); ?>" target="_blank" id="attr_uid_341155175"><?php echo $share->user->username ?></a> 
              <?php if($share->from_user_id):?>
              <span class="gray">从</span><span><a class="red" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$share->user_id)); ?>" target="_blank" id="attr_uid_341155175"><?php echo $share->from_user->username ?></a> 的 <a class="red f12" href="<?php echo $this->createUrl('/group/view', array('id'=>$share->from_group_id)); ?>" target="_blank">#<?php echo $share->from_group->name ?>#</a>分享了这个宝贝</span> 
              <?php else:?>
              <span class="gray">分享到</span><span><a class="red f12" href="<?php echo $this->createUrl('/group/view', array('id'=>$share->group_id)); ?>" target="_blank">#<?php echo $share->group->name ?>#</a></span> 
              <?php endif; ?>
              </dd>
						<dd id="tuijian_341155175" class="quote_goods_title break-word"><?php echo $share->ParsedQuote ?></dd>

					</dl>
					<div class="clear"></div>
					<div class="code_pic">
					    <a rel="gallery"  href="<?php echo $share->goods->getThumb('default') ?>" class="pirobox_gall" title="<?php echo $share->goods->name ?>"><?php 
						echo CHtml::image($share->goods->getThumb('default'), $share->goods->name, array('width'=>310, 'height'=>$share->goods->getImageHeight(310)));
						?></a>
						
						<div class="clear"></div>
						<?php if(count($share->goods->images)): ?>
                        <div style="padding: 20px 16px 6px 0px; overflow: hidden;">
                            <?php foreach($share->goods->images as $index=>$img):?>
                                <a rel="gallery" class="pirobox_gall small_img" title="<?php echo $share->goods->name ?>" href="<?php echo $img->url ?>">
                                    <img src="<?php echo $img->getThumb(80); ?>" width="70" height="70" style="float:left;padding:2px;" />
                                </a>
                            <?php endforeach;?>
                        </div>
                        <?php endif; ?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                        	$().piroBox_ext({
                        	    piro_speed : 700,
                        		bg_alpha : 0.5,
                        		piro_scroll : true // pirobox always positioned at the center of the page
                        	});
                        });
                        </script>
					</div>
					<div class="goodsdetail">
						<div class="break-word">
              <?php if($share->goods->name):?>
                <p class="f14 l22 mb14">
								<a  href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($this->createUrl('/share/redirect', array('url'=>rawurlencode($share->goods->url ? $share->goods->url : Yii::app()->baseUrl.$share->goods->image)))); ?>')" class="goods_title"><?php echo $share->goods->name ?> <span>
								<?php if($share->goods->website): ?>
        						    <img src="<?php echo Yii::app()->baseUrl ?>/images/common/logo/<?php echo $share->goods->website ?>.png" />
        						<?php endif;?>
								</span></a>
							</p>
               <?php endif;?>
                <?php if($share->goods->price > 0):?>
                    <?php if($share->goods->delisted): ?>
                    <a class="btn_price_go"  href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($search_url) ?>')"> 
                	<span class="pricetag c f20b left white">￥<?php echo round($share->goods->price,2) ?></span> 
                	<span class="f16 white mt8 left">搜同款</span>
					</a>
					<div class="box_delisted">
					    <div class="cont">
                            <p class="tb-hint"><strong>此宝贝已下架</strong> <span><a target="_blank" href="http://service.taobao.com/support/knowledge-1102683.htm" title="为什么"><img src="http://img01.taobaocdn.com/tps/i1/T1VuyiXcRkXXazG.A_-11-11.gif" alt="为什么"></a></span></p>
                            <p class="tb-tips">1: 你可以<a class="ured" href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($search_url) ?>')">搜索其他卖家同样的宝贝</a>
                            <?php if($share->goods->shop!==null && $share->goods->shop->url ): ?>
                            <p class="tb-tips">2: 你可以<a id="shop-url-link" class="ured" href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($share->goods->shop->url) ?>')">进入卖家店铺看看</a>
                            <?php elseif(!empty($share->goods->taobao_seller_nick)):?>
                            <p class="tb-tips">2: 你可以<a  target="_blank" id="shop-url-link" class="ured" href="###">进入卖家店铺看看</a>
                            <?php endif; ?>
                            
                            </p>
					    </div>
					</div>
                    <?php else: ?>
                	<a class="btn_price_go"  href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($this->createUrl('/share/redirect', array('url'=>rawurlencode($share->goods->url ? $share->goods->url : Yii::app()->baseUrl.$share->goods->image)))); ?>')"> 
                	<span class="pricetag c f20b left white">￥<?php echo round($share->goods->price,2) ?></span> 
                	<span class="f16 white mt8 left">去购买</span>
					</a>
					<?php endif; ?>
                <?php endif;?>
                <div class="clear"></div>
				<p class="tui_heart c l22 mt10">
				<a id="<?php echo $share->id ?>" class="s_collect red" href="javascript:void(0)" onclick="javascript:forwardMagazine(this,<?php echo $share->id ?>);"><span><em class="lm_shouji">&nbsp;&nbsp;</em>收进杂志</span><span><?php echo $share->goods->collect_count ?></span></a> 
                <?php if($share->liked):?>
                <a id="<?php echo $share->id ?>" class="tui_like ml7 red liked" onclick="javascript:likeMagazine(this,<?php echo $share->id ?>)"><span class="likePanel">已喜欢</span><span class="likeNum"><?php echo $share->like_count ?></span></a> 
                <?php else:?>
                <a id="<?php echo $share->id ?>" class="tui_like ml7 red" onclick="javascript:likeMagazine(this,<?php echo $share->id ?>)"><span class="likePanel"><samp class="lm_love">&nbsp;</samp>喜欢</span><span class="likeNum"><?php echo $share->like_count ?></span></a> 
                <?php endif;?>
				</p>
				<?php if($share->goods->price == 0 && $share->goods->url):?>
				<p class="mt10">
				<?php echo CHtml::link('访问该图所在原网页', $share->goods->url, array('target'=>'_blank')); ?>
				</p>
				<?php endif; ?>
				<!-- Baidu Button BEGIN -->
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'text':'我喜欢 @<?php echo Yii::app()->name ?> 的这个分享：<?php echo $share->goods->name ?>', 'pic':'<?php echo $share->goods->getThumb(310); ?>' , 'url':'<?php echo $this->createAbsoluteUrl('/share/view', array('id'=>$share->id))?>'}">
                    <a class="bds_qzone">QQ空间</a>
                    <a class="bds_tsina">新浪微博</a>
                    <a class="bds_tqq">腾讯微博</a>
                    <a class="bds_renren">人人网</a>
                    <span class="bds_more">更多</span>
                </div>
                <script type="text/javascript" id="bdshare_js" data="type=tools&mini=1" ></script> 
                <script type="text/javascript" id="bdshell_js"></script> 
                <script type="text/javascript">
                	//在这里定义bds_config
                	var bds_config = {'snsKey':{'tsina':'<?php echo Yii::app()->config->get('sina_appkey'); ?>','qzone':'<?php echo Yii::app()->config->get('qq_appkey'); ?>'}};
                	document.getElementById('bdshell_js').src = "http://news.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
                </script>
                <!-- Baidu Button END -->
                <?php if($share->goods->shop !== null): ?>
                <div class="clear"></div>
                <div class="share_goods_brand">
                    <p class="f14 l22 mb14">
                    <h3>店铺品牌：<?php echo $share->goods->shop->brand ?></h3>
                    品牌介绍：<br /><?php echo nl2br($share->goods->shop->brand_intro); ?>
                    </p>
                </div>
                <?php endif; ?>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="original_pic_ioc" style="display: none;">
						<a href="<?php echo Yii::app()->baseUrl.$share->goods->image ?>" target="_blank"></a>
					</div>
					<div class="clear"></div>

					<div class="t_tag r">
						<div class="share left">
							<a href="javascript:void(0)" onclick="return false;"><b class="f14 red" id="r341155175"><?php echo $share->comment_count ?></b>评论</a>
						</div>
					</div>
				</div>
				<div class="clear"></div>

				<ul class="goods_comm" id="comments">
					<li class="comm_con">
						<div class="comments" id="t_note341155175">
							<div class="icon i2"></div>
							<div class="note-list">
                <?php $this->widget('zii.widgets.CListView', array(
                        'id'=>'comment-listview',
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>true,
                        'emptyText'=>'还没有任何评论哦，等你来评论！',
              			'cssFile' =>false,
                        'itemView'=>'_listitem',
                        'itemsTagName'=>'ul',
                        'itemsCssClass'=>'pl_list',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'template'=>'{items}<div class="clear"></div><div id="pageNav">{pager}<div class="clear"></div></div>',
                    ));?>
                
                </div>
							<!-- /.note-list -->
							<div class="reply_box mt10">
								<textarea class="pl_area answer_text" range="0"></textarea>
							</div>
							<div class="clear"></div>
							<div class="forwarding mt10">
								<span class="left cursor share_smileys">表情</span> <span class="r"><a href="javascript:void(0);" class="pl_btn cursor">评 论</a></span>
							</div>
							<div class="hint"></div>
							<div class="clear"></div>
						</div> <!--/.comments -->
					</li>
				</ul> 
          <?php if($share->goods->price > 0):?>
          <div style="height: 48px; background: none repeat scroll 0% 0% rgb(247, 247, 247); padding: 6px 16px 6px 10px; overflow: hidden;">
					<p style="line-height: 48px;" class="left">可以在这里买到：</p>
					<a  href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($this->createUrl('/share/redirect', array('url'=>rawurlencode($share->goods->url ? $share->goods->url : Yii::app()->baseUrl.$share->goods->image)))); ?>')">
					    <?php echo CHtml::image($share->goods->getThumb(70), $share->goods->name, array('width'=>70, 'class'=>'avatar48')); ?>
						<p class="left cursor" style="font-size: 14px; height: 48px; line-height: 48px; margin-left: 8px; width: 275px; white-space: nowrap; text-overflow: ellipsis; -o-text-overflow: ellipsis; overflow: hidden;"><?php echo $share->goods->name ?></p>
						<p class="left" style="margin-left: 3px; margin-top: 15px;">
						<?php if($share->goods->website): ?>
						    <img src="<?php echo Yii::app()->baseUrl ?>/images/common/logo/<?php echo $share->goods->website ?>.png" />
						<?php endif;?>
						</p> </a> <a style="width: 95px; margin-left: 12px;" class="r mt8 c f16 small_btn pr block white cursor"  href="###" onclick="window.location.href=str_decode('<?php echo base64_encode($this->createUrl('/share/redirect', array('url'=>rawurlencode($share->goods->url ? $share->goods->url : Yii::app()->baseUrl.$share->goods->image)))); ?>')"><em class="small_btnr r pa"></em>去购买</a> <a href="<?php echo $this->createUrl('/share/redirect', array('url'=>rawurlencode($share->goods->url))); ?>" target="_blank"><span class="red r cursor" style="font-size: 20px; line-height: 48px;">￥<?php echo round($share->goods->price); ?></span></a>

				</div>
           <?php endif;?>
        </div>
			<div class="clear"></div>
			<h3 class="f16 mt14">也许你还喜欢</h3>
        <?php foreach($this->getMoreShares() as $index => $data):?>
        <div class="mt10 grid_3 left<?php if($index % 3 == 0) echo ' alpha'; if($index % 3 == 2) echo ' omega'; ?>">
				<div class="box_shadow break-word">
					<div class="hp_top_n c">
						<a href="<?php echo $this->createUrl('share/view', array('id'=>$data->id)); ?>" target="_blank">
						<?php echo CHtml::image($data->goods->getThumb(310), $data->goods->name, array('width'=>200, 'height'=>200, 'class'=>'goods_pic'));?>
                        </a>
					</div>
					<div class="hp_b_n l16">
						<div style="height: 32px; overflow: hidden;">
							<a href="<?php echo $this->createUrl('share/view', array('id'=>$data->id)); ?>" target="_blank"><?php echo $data->username ?></a>：<span class="gray"><?php echo $data->ParsedQuote ? $data->ParsedQuote : $data->goods->name; ?></span>
						</div>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
        
        <div class="clear"></div>
			<h3 class="f16 mt14">猜你喜欢</h3>
        <?php foreach($this->getMoreMagazines() as $index => $data): ?>
        <div class="grid_3 <?php if($index % 3 == 0) echo ' alpha'; if($index % 3 == 2) echo ' omega'; ?>" <?php if($index % 3 == 1) echo ' style="_margin:0 3px;"'; ?>>
				<div class="box_shadow groupBox mt10" style="margin:5px 0; ">
					<div class="groupbg">
						<h3 class="f16 h18 l18 cursor white-space overflow p0_13 mt10">
							<a href="<?php echo $this->createUrl('/group/view', array('id'=>$data->id)) ;?>" target="_blank"><?php echo $data->name ?></a>
						</h3>
						<div class="clear"></div>

						<a class="mt5 cursor block g_db_bg" href="<?php echo $this->createUrl('/group/view', array('id'=>$data->id)) ;?>" target="_blank">
						    <?php echo $data->getMixImage(); ?>
							<div class="clear"></div>
						</a>
						<div class="h20 mt10 p0_13">
							<a id="right_follow" class="c red_round white noneButton cursor r" href="<?php echo $this->createUrl('/group/view', array('id'=>$data->id)) ;?>" target="_blank">去看看</a> <span class="gray f12 l20"><?php echo $data->share_count ?>个分享</span>
						</div>
						<div class="clear mt10"></div>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
        
            <div class="clear"></div>
            <?php if(Yii::app()->config->get('share_view_fluid') =='1'): ?>
			<div id="single" class="mt14">
				<h4 class="single_title f14">
					<a class="red" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$share->user_id)) ;?>" target="_blank"><?php echo $share->user->username ?></a>分享的更多宝贝
				</h4>
				<div id="detail_wall" style="width: 708px;">
				<div class="first_frame">
                    <?php $this->actionGetShares($share->user_id, 0, $_GET['page'] ? $_GET['page'] : 1);?>
                </div>
				</div>
				<div class="clear"></div>
				<div class="spinner botSpinner" style="display: none;"></div>
				<div class="pager">
					<div class="more c f16 red">
						<samp class="left ">
							<a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$share->user_id)) ;?>">去她的美丽空间查看更多分享&gt;&gt;</a>
						</samp>
						<span class="hua left"> </span>
					</div>
				</div>
			</div>
			<script type="text/javascript">
        $(document).ready(function(){
        
        	Yiipin.masonry({
        		url: '<?php echo $this->createUrl('/share/getShares', array('user_id'=>$share->user_id)); ?>', 
        		page: <?php echo $_GET['page'] ? $_GET['page'] : 1; ?>, 
        		wallSelector:'#detail_wall',
        		itemSelector: '.poster_grid',
        		contWidth: 708,
        		clearboth: true,
        		skipFirstFrame: true
        	});
        });
        </script>
			<?php endif;?>
		</div>
		
		<div class="grid_3 omega" style="float:right; margin-left:0">
			<h3 class="f16 ftnr mt14">所在杂志</h3>
			<div class="grid_3 alpha omega">
				<div class="box_shadow groupBox" style="margin:14px 0 0 0">
					<div class="groupbg">
						<div class="gc_title h18 l18 overflow">
							<h3 class="f14 cursor white-space left">
								<a href="<?php echo $this->createUrl('/group/view', array('id'=>$share->group_id)) ;?>" target="_blank"><?php echo $share->group->name ?></a>
							</h3>
							<p class="gray f14n r"><?php echo $share->group->share_count ?></p>
						</div>
						<div class="clear"></div>
						<a class="mt5 cursor block g_db_bg" href="<?php echo $this->createUrl('/group/view', array('id'=>$share->group_id)) ;?>" target="_blank"> <?php echo $share->group->getMixImage(); ?>
							<div class="clear"></div>
						</a>
						<div class="imgBox">
                <?php if($share->group->user_id == Yii::app()->user->id):?>
				<a style="width: 48px; height: 20px;" class="c red_round white noneButton cursor r" target="_blank" href="<?php echo $this->createUrl('/person/editgroup', array('id'=>$share->group->id, 'user_id'=>$share->group->user_id)); ?>">设置</a>
				<?php else:?>
				    <?php if($share->group->followed): ?>
        				<span class="ex_notfollow f14 cursor quitbtn auto" group_id="<?php echo $share->group->id ?>">已关注</span>
        		    <?php else: ?>
        		        <span class="ex_follow f14 cursor followbtn auto" group_id="<?php echo $share->group->id ?>">＋ 加关注</span>
        		    <?php endif;?>
				<?php endif;?>
				<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<h3 class="f16 ftnr mt14">推荐杂志</h3>
        <?php foreach($this->getHotGroups(3) as $data):?>
		<div class="grid_3 alpha omega">
				<div class="box_shadow groupBox" style="margin:14px 0 0 0">
					<div class="groupbg">
						<div class="gc_title h18 l18 overflow">
							<h3 class="f14 cursor white-space left">
								<a href="<?php echo $this->createUrl('/group/view', array('id'=>$data->id)) ;?>" target="_blank"><?php echo $data->name ?></a>
							</h3>
							<p class="gray f14n r"><?php echo $data->share_count ?></p>
						</div>
						<div class="clear"></div>
						<a class="mt5 cursor block g_db_bg" href="<?php echo $this->createUrl('/group/view', array('id'=>$data->id)) ;?>" target="_blank">
						<?php echo $data->getMixImage(); ?>
							<div class="clear"></div>
						</a>
						<div class="imgBox">
                <?php if($data->user_id == Yii::app()->user->id):?>
				<a style="width: 48px; height: 20px;" class="c red_round white noneButton cursor r" target="_blank" href="<?php echo $this->createUrl('/person/editgroup', array('id'=>$data->id, 'user_id'=>$data->id)); ?>">设置</a>
				<?php else:?>
				    <?php if($data->followed): ?>
        				<span class="ex_notfollow f14 cursor quitbtn auto" group_id="<?php echo $data->id ?>">已关注</span>
        		    <?php else: ?>
        		        <span class="ex_follow f14 cursor followbtn auto" group_id="<?php echo $data->id ?>">＋ 加关注</span>
        		    <?php endif;?>
				<?php endif;?>
				<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		<?php endforeach;?>
        
        <div class="clear"></div>
        <?php if($share->goods->category_id): ?>
		<div class="box_shadow mt14 p13">
			<h3 class="f14n">喜欢这个宝贝的MM还在看</h3>
			<?php foreach($this->getTagGroup($share->goods->category) as $group): ?>
			<?php foreach($this->getTags($share->goods->category, $group) as $tag):?>
			<?php 
			$shares = $this->getShares($tag->id);
			if(count($shares)):
			?>
			<div class="mygroup mt14">
				<h3 class="f14">
					<a class="f12 gray r" href="<?php echo $this->createUrl('/goods/catalog', array('tag_id'=>$tag->id, 'category_id'=>$share->goods->category_id)); ?>" target="_blank"><?php echo $tag->goods_count ?>个</a><a href="<?php echo $this->createUrl('/goods/catalog', array('tag_id'=>$tag->id, 'category_id'=>$share->goods->category_id)); ?>" target="_blank"><?php echo $tag->name ?></a>
				</h3>
				<ul class="SKU mt10">
					<li><a href="<?php echo $this->createUrl('/goods/catalog', array('tag_id'=>$tag->id, 'category_id'=>$share->goods->category_id)); ?>" target="_blank"> 
					<?php foreach($shares as $data):?>
					<?php echo CHtml::image($data->goods->getThumb(100), $data->goods->name, array('width'=>60, 'height'=>60, 'alt'=>$data->goods->name));?>
					<?php endforeach; ?>
					</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<?php endif;?>
			<?php endforeach;?>
			<?php break;?>
			<?php endforeach;?>
			
		</div>
		<?php endif;?>
		</div>




	</div>
	<div class="clear"></div>
</div>
<!-- main -->
<div class="clear"></div>
<div id="show_err"></div>

<div class="clear-fix"></div>
