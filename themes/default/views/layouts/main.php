<?php $this->beginContent('//layouts/basic'); 
$w_layout = array('goods', 'home', 'group', 'person', 'search', 'exchange');
?>

<div class="header_top">
	<a class="logo_new" href="<?php echo Yii::app()->baseUrl.'/' ?>"></a>
	<div id="login-status"><?php $this->renderPartial('/site/_login_status'); ?></div>
	<div class="ser_n">
		<form id="frame_header_tools_searchBox" action="<?php echo $this->createUrl('/search/index'); ?>" method="get">
			<span class="ipt1"> <input id="searchKey" name="searchKey" type="text" autocomplete="off" value="搜宝贝、人、杂志..." />
			</span> <input id="searchType" type="hidden" value="1" name="searchType" /> <input id="filter" type="hidden" value="goods" name="filter"> <span class="ipt2"> <input type="submit" id="fm_hd_btm_shbx_bttn" value="" />
			</span>
		</form>

	</div>
	<ul id="search_type" class="search_type none_f">
		<li class="search_bg" stype="goods">搜<samp>"</samp><span class="input_words"></span> <samp>"</samp>相关宝贝
		</li>
		<li stype="user">搜<samp>"</samp><span class="input_words"></span> <samp>"</samp>相关用户
		</li>
		<li stype="magazine">搜<samp>"</samp><span class="input_words"></span> <samp>"</samp>相关杂志
		</li>
	</ul>
</div>
<div class="clear"></div>
<div id="navbar" class="js-scroll-navbar">
	<div class="<?php echo in_array($this->id, $w_layout) ? 'wheader':'nheader';?>">
		<div class="header_b">
			<div class="h_ico none_f" id="navbar_share_tip">
				<a href="<?php echo $this->createUrl('home/index'); ?>"><span class="red_f navbar_share_count">0</span>个新分享，点击去看看!</a>
			</div>
			<span class="header_b_left"> </span> <span class="header_b_right"> </span>
			<ul class="nav_new">
			<?php if(Yii::app()->user->isGuest):?>
				<li><a class="<?php echo $this->route == 'site/index' ? 'home_d':'home'; ?> f14_f fb_f" href="<?php echo Yii::app()->baseUrl ?>/">首页</a></li>
			<?php else: ?>
			    <li><a class="<?php echo $this->route == 'home/index' ? 'home_d':'home'; ?> f14_f fb_f" href="<?php echo $this->createUrl('home/index'); ?>">我的首页<span class="shining none_f navbar_share_count" style="display: none;">0</span></a></li>
			<?php endif;?>		
				<li><a class="<?php echo $this->id == 'magazine' || $this->id == 'group' ? 'group_d':'group'; ?> f14_f fb_f" href="<?php echo $this->createUrl('/magazine/index'); ?>">翻杂志</a></li>
				<li><a class="<?php echo $this->route == 'goods/index' ? 'racks_d':'racks'; ?> f14_f fb_f" href="<?php echo $this->createUrl('/goods/index'); ?>">逛宝贝</a> 
				<?php foreach($this->getGoodsCategories() as $data): ?>
				<a class="<?php echo ($this->route == 'goods/catalog' && isset($_GET['category_id']) && $data->id == $_GET['category_id']) ? 'racks1_d':'racks1';?> f12_f" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$data->id)); ?>"><?php echo $data->name ?></a>
				<?php endforeach;?>
				</li>
				<li><a class="<?php echo $this->id == 'shop' ? 'home_d':'home'; ?> f14_f fb_f" href="<?php echo $this->createUrl('shop/index'); ?>">好店</a></li>
				<li><a class="<?php echo $this->id == 'trial' ? 'home_d':'home'; ?> f14_f fb_f" href="<?php echo $this->createUrl('trial/index'); ?>">试用</a></li>
				<li><a class="<?php echo $this->id == 'exchange' ? 'home_d':'home'; ?> f14_f fb_f" href="<?php echo $this->createUrl('exchange/index'); ?>">积分兑换</a></li>
				<?php foreach($this->getNavlinks() as $data): ?>
				<li><?php echo CHtml::link($data->name, $data->url, array('title'=>$data->title, 'target'=>$data->target == Navlink::TARGET_BLANK ? '_blank':'_top', 'class'=>'group f14_f fb_f')); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php if(isset($_GET['category_id'])): 
	$subcates = $this->getGoodsCategories($_GET['category_id']);
	if($subcates):
	?>
	<div class="sec_nav">
		<ul class="guide">
		<?php foreach($subcates as $data): ?>
			<li><a class="<?php echo isset($_GET['sub_category_id']) && $data->id == $_GET['sub_category_id'] ? 'current':'';?>" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$data->parent_id, 'sub_category_id'=>$data->id)); ?>"><?php echo $data->name ?></a></li>
		<?php endforeach;?>
		</ul>
	</div>
	<?php endif; endif;?>
</div>

<?php echo $content; ?>

<div class="clear_f"></div>
<div class="footer <?php echo in_array($this->id, $w_layout) ? 'w_foot':'n_foot';?>">
	<div class="foot_con">
		<div class="f_list">
			<h4>发现美丽</h4>
			<ul>
				<li><a href="<?php echo $this->createUrl('goods/index'); ?>" target="_blank">挑衣服</a></li>
				<li><a href="#" target="_blank">看达人</a></li>
				<li><a href="#" target="_blank">逛店铺</a></li>
				<li><a href="#" target="_blank">团购</a></li>
			</ul>
		</div>
		<div class="f_list">
			<h4>获取帮助</h4>
			<ul>
				<li><a href="<?php echo $this->createUrl('helpcenter/index'); ?>" target="_blank">新手指南</a></li>
				<li><a href="<?php echo $this->createUrl('sitemap/index'); ?>" target="_blank">网站地图</a></li>
			</ul>
		</div>
		<div class="f_list">
			<h4>关于我们</h4>
			<ul>
			<?php foreach($this->getAbouts() as $data):?>
				<li><?php echo CHtml::link($data->title, array('about/index', 'name'=>$data->name), array('target'=>'_blank')); ?></li>
			<?php endforeach;?>
			</ul>
		</div>
		<div class="f_list">
			<h4>更多</h4>
			<ul>
				<li><a href="#" target="_blank">下载IOS客户端</a></li>
				<li><a href="#" target="_blank">下载Android客户端</a></li>
				<li><a href="<?php echo $this->createUrl('flink/index'); ?>" target="_blank">友情链接</a></li>
			</ul>
		</div>
		<div class="f_list">
			<h4>关注我们</h4>
			<ul class="l_two">
			    <?php $follow = Yii::app()->config->get('follow'); ?>
				<?php if($follow['weibo_url']): ?><li><a href="<?php echo $follow['weibo_url']; ?>" target="_blank"><span class="i_sina">&nbsp;</span>新浪微博</a></li><?php endif; ?>
				<?php if($follow['renren_url']): ?><li><a href="<?php echo $follow['renren_url']; ?>" target="_blank"><span class="i_renren">&nbsp;</span>人人主页</a></li><?php endif; ?>
				<?php if($follow['qqweibo_url']): ?><li><a href="<?php echo $follow['qqweibo_url'] ?>" target="_blank"><span class="i_tx">&nbsp;</span>腾讯微博</a></li><?php endif; ?>
				<?php if($follow['qqzone_url']): ?><li><a href="<?php echo $follow['qqzone_url']; ?>" target="_blank"><span class="i_qzone">&nbsp;</span>QQ空间</a></li><?php endif; ?>
				<?php if($follow['163_url']): ?><li><a href="<?php echo $follow['163_url']; ?>" target="_blank"><span class="i_wangyi">&nbsp;</span>网易微博</a></li><?php endif; ?>
				<?php if($follow['douban_url']): ?><li><a href="<?php echo $follow['douban_url']; ?>" target="_blank"><span class="i_dban">&nbsp;</span>豆瓣</a></li><?php endif; ?>
			</ul>
		</div>
		<div class="clear_f"></div>
		<?php if($this->route == 'site/index'):?>
		<div class="rolling">
			<h4 class="f_links">友情链接：</h4>
			<ul id="link_slide">
				<li>
				<?php foreach($this->getFlinks(Flink::CATEGORY_INDEX) as $data): ?>
				<?php echo CHtml::link($data->name, $data->url, array('target'=>'_blank')); ?> 
				<?php endforeach; ?>
					
			    </li>

			</ul>
			<p class="link_more">
				<a href="<?php echo $this->createUrl('flink/index'); ?>" target="_blank">更多&gt;&gt;</a>
			</p>
		</div>
		<?php endif;?>
		
		<div class="record">
		 Copyright ©2011 <?php echo Yii::app()->request->serverName ?>, All Rights Reserved. <?php echo CHtml::link(Yii::app()->config->get('icp_beian'), 'http://www.miibeian.gov.cn', array('target'=>'_blank')); ?> <?php echo Yii::app()->config->get('stats_code'); ?> 
		</div>
	</div>
	<div class="foot_con" style="text-align: center;">Powered by <a href="http://www.yiipin.com" target="_blank">YiiPin</a> <?php echo SOFT_VERSION; ?>, <a href="http://www.yiiframework.com" target="_blank">Yii Framework</a>, <?php $stats = Yii::app()->db->stats; $stats[1]= round($stats[1], 3); echo "{$stats[0]} queries, {$stats[1]} seconds."; ?></div>
</div>
<div id="ajax-dialog"></div>

<div id="goTop" class="fixed-bottom fixed-right none">
	<a id="go_top" class="cursor box_shadow" href="#"></a> <a class="cursor box_shadow collect"></a>
</div>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'share-dialog',
	'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'分享',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>'550px',
    ),
));?>
<div class="pickup">
	安装<a class="red" href="<?php echo $this->createUrl('pickup/index'); ?>" target="_blank"><?php echo Yii::app()->name ?>拾宝工具</a>，浏览其他网站时直接把宝贝分享到<?php echo Yii::app()->name ?></div>
<div class="add_share c cursor left">
	<a href="javascript:void(0)" class="share_goods" id="shareMeiliGoods">分享宝贝</a><a href="javascript:void(0)" class="share_pic" id="shareMeiliPic">分享图片</a><a href="javascript:void(0)" class="new_magazine" id="newMeiliMagazine">新建杂志</a>
</div>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'share-goods',
	'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'分享宝贝',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>'550px',
    ),
));?>
<div class="add_share_goods left">
	<div id="linkMessageTips">请在下面输入宝贝的链接地址</div>
	<div class="gray mt10">
		<input type="text" class="add_goods_url" id="addGoodsUrl" /> <input type="button" value="确 定" id="addGoodsSubmit" class="add_goods_btn cursor red_round f14 white" />
	</div>
</div>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'share-pic',
	'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'分享图片',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>'550px',
    ),
));?>
<div class="add_share_goods c left">
	<form action="<?php echo $this->createUrl('/goods/uploadPic'); ?>" target="uploadFile" id="submitPicture" method="post" enctype="multipart/form-data">
		<a class="up_photos cursor f14 left white">选择照片文件</a> <input class="cursor" type="file" name="attach" size="1" id="uploadFileSubmit" style="opacity: 0; position: absolute; left: 10px; height: 40px; top: 20px; -moz-opacity: 0; filter: alpha(opacity :         0); font-size: 20px;" />
	</form>
	<div id="uploadFilePanel">
		<iframe style="position: absolute; left: -1800px; top: 60px;" border="0" name="uploadFile"></iframe>
	</div>
</div>
<div id="share-pic-form"></div>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'share-magazine',
	'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'创建杂志',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>'550px',
    ),
));?>
<div class="add_share_goods left">
	<form>
		<div class="l30 f14n">
			<span class="w40 left">标题</span><input id="createMagaName" type="text" value="20个字以内" class="maga_title gray" maxlength="20" name="name" onfocus="if(this.value=='20个字以内') this.value='';" onblur="if(this.value=='') this.value='20个字以内';" />
		</div>
		<div class="clear"></div>
		<div class="mt5 l30 f14n">
			<div class="w40 left">分类</div>
			<ul class="ml40" id="magaTyepList">
<?php foreach($this->getGroupCategories() as $data):?>
	<li><input type="radio" name="category_id" value="<?php echo $data->id ?>" /><?php echo $data->name ?></li>
<?php endforeach;?>
</ul>
		</div>
		<div class="clear"></div>
		<div class="mt5">
			<a id="createMagazine" class="red_round cursor f14 left white p5_10">创建</a><span class="ml7 l22 red none" id="createMagaMsg"></span>
		</div>
	</form>
</div>
<?php $this->endWidget ();?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'login-dialog',
	'htmlOptions'=>array('style'=>'display:none'),
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'用户登录',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>'450px',
    ),
));?>
<div class="pop_login">
	<div class="l_ico">
		<a target="_SELF" href="<?php echo $this->createUrl('connect/qqlogin'); ?>" class="small_qq"></a> <a target="_SELF" href="<?php echo $this->createUrl('connect/sinaweibologin'); ?>" class="small_sina ml10_f"></a>
	</div>
	<h4>登录后，关注杂志，每天看到最新分享！</h4>
	<fieldset>
		<form action="" onsubmit="return false" method="post">
			<legend><?php echo Yii::app()->name ?>登录表单</legend>
			<p>
				用户名或邮箱：<input type="text" value="" name="LoginForm[username]" id="mlsUser" class="l_ipt">
			</p>
			<p>
				密码：<input type="password" value="" name="LoginForm[password]" id="mlsPass" class="l_ipt">
			</p>
			<p class="loginErrorMessage red_f none_f" style="text-align: center"></p>
			<div>
				<input type="submit" value="登录" class="loginBtn button left_f"><a target="_BLANK" href="<?php echo $this->createUrl('/site/register'); ?>" class="left_f red_f">注册</a>
			</div>
		</form>
	</fieldset>
</div>
<?php $this->endWidget ();?>


<?php $this->endContent(); ?>