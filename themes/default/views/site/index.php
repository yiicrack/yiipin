<?php 
$this->pageTitle=Yii::app()->config->get('title');
?>
<div class="wlc_top">
	<div class="wlc_bnr">
		<?php $this->widget('ext.SlideshowWidget', array('asbg'=>false, 'width'=>'640px', 'height'=>'240px', 'token'=>'首页640*240'));?>
	</div>
	<div class="mls_txt">
		<h3>这里已有万千爱打扮的MM每日分享怎么穿，哪里买</h3>
		<a href="<?php echo $this->createUrl('site/register'); ?>" target="_blank" class="btn_login">注册</a> <a href="<?php echo $this->createUrl('site/login'); ?>" target="_blank" class="btn_reg">登录</a>
		<div class="clear_f"></div>
		<div class="share">
			<div data="{'desc':'【今日推荐】万千爱打扮的MM分享聚集地&mdash;&mdash;<?php  echo Yii::app()->name ?>，这里有无穷尽的搭配秘籍，还有省钱秘籍，赶紧来看看&gt;&gt;','text':'【今日推荐】万千爱打扮的MM分享聚集地&mdash;&mdash;<?php  echo Yii::app()->name ?>，这里有无穷尽的搭配秘籍，还有省钱秘籍，赶紧来看看&gt;&gt;', 'url':'<?php echo Yii::app()->request->hostInfo ?>', 'pic':'<?php echo Yii::app()->request->hostInfo ?>/images/share.jpg'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
				<span class="bds_more"></span>
			</div>
			<div data="{'text':'&gt;&gt;<?php  echo Yii::app()->name ?>，陪你美丽每一天','desc':'【今日推荐】万千爱打扮的MM分享聚集地&mdash;&mdash;<?php echo Yii::app()->name; ?>，这里有无穷尽的搭配秘籍，还有省钱秘籍，赶紧来看看&gt;&gt; <?php echo Yii::app()->request->hostInfo; ?>``','url':'<?php echo Yii::app()->request->hostInfo ?>', 'pic':'<?php echo Yii::app()->request->hostInfo ?>/images/share.jpg'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
				<a title="分享到QQ空间" class="bds_qzone" href="#"></a>
			</div>
			<div data="{'text':'【今日推荐】万千爱打扮的MM分享聚集地&mdash;&mdash;<?php  echo Yii::app()->name ?>，这里有无穷尽的搭配秘籍，还有省钱秘籍，赶紧来看看&gt;&gt;', 'url':'<?php echo Yii::app()->request->hostInfo ?>', 'pic':'<?php echo Yii::app()->request->hostInfo ?>/images/share.jpg'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
				<a title="分享到新浪微博" class="bds_tsina" href="#"></a>
			</div>
			<span class="rec_frd">推荐给好友:</span>
			<script data="type=tools&amp;mini=1&amp;uid=683718" id="bdshare_js" type="text/javascript" src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=20120806"></script>
			<script id="bdshell_js" type="text/javascript" src="http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=21"></script>
			<script type="text/javascript"> var bds_config = {'review':'normal', 'snsKey':{'tsina':'<?php echo Yii::app()->config->get('sina_appkey'); ?>','qzone':'<?php echo Yii::app()->config->get('qq_appkey'); ?>'}}; document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours(); </script>
		</div>
	</div>
</div>

<div class="top">
	<div class="top_con">
		<a target="_blank" href="<?php echo $this->createUrl('goods/index'); ?>" class="hot">今日最热</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>1)); ?>" class="dress">衣服榜</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>2)); ?>" class="shoes">鞋子榜</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>3)); ?>" class="bag">包包榜</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>4)); ?>" class="access">配饰榜</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>5)); ?>" class="beauty">美容榜</a> <a target="_blank" href="<?php echo $this->createUrl('goods/catalog', array('category_id'=>6)); ?>" class="jiaju">家居榜</a>
	</div>
</div>

<div class="attr_word n_attr">
	<div class="attr_con">
		<div class="list">
			<h2 class="f14_f">正在流行</h2>
			<div class="attr_list  ">
				<ul>
				<?php $keys = explode(' ', Yii::app()->config->get('index_tags_1')); foreach($keys as $index=>$key): ?>
					<li><a target="_blank" class="" href="<?php echo $this->createUrl('search/index', array('searchKey'=>$key, 'filter'=>'goods')); ?>"><?php echo $key ?></a></li>
				<?php if(($index+1) % 6 == 0) echo '</ul><ul>';?>
				<?php endforeach;?>
				</ul>
				
			</div>
		</div>
		<div class="list">
			<h2 class="f14_f">热门风格</h2>
			<div class="attr_list  ">
				<ul>
				<?php $keys = explode(' ', Yii::app()->config->get('index_tags_2')); foreach($keys as $index=>$key): ?>
					<li><a target="_blank" class="" href="<?php echo $this->createUrl('search/index', array('searchKey'=>$key, 'filter'=>'goods')); ?>"><?php echo $key ?></a></li>
				<?php if(($index+1) % 6 == 0) echo '</ul><ul>';?>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="list">
			<h2 class="f14_f">人气品牌</h2>
			<div class="attr_list  ">
				<ul>
					<?php $keys = explode(' ', Yii::app()->config->get('index_tags_3')); foreach($keys as $index=>$key): ?>
					<li><a target="_blank" class="" href="<?php echo $this->createUrl('search/index', array('searchKey'=>$key, 'filter'=>'goods')); ?>"><?php echo $key ?></a></li>
    				<?php if(($index+1) % 6 == 0) echo '</ul><ul>';?>
    				<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="list">
			<h2 class="f14_f">家居生活</h2>
			<div class="attr_list  ">
				<ul>
					<?php $keys = explode(' ', Yii::app()->config->get('index_tags_4')); foreach($keys as $index=>$key): ?>
					<li><a target="_blank" class="" href="<?php echo $this->createUrl('search/index', array('searchKey'=>$key, 'filter'=>'goods')); ?>"><?php echo $key ?></a></li>
    				<?php if(($index+1) % 6 == 0) echo '</ul><ul>';?>
    				<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="list">
			<h2 class="f14_f">流行趋势</h2>
			<div class="attr_list last">
				<ul>
				<?php $keys = explode(' ', Yii::app()->config->get('index_tags_5')); foreach($keys as $index=>$key): ?>
					<li><a target="_blank" class="" href="<?php echo $this->createUrl('search/index', array('searchKey'=>$key, 'filter'=>'goods')); ?>"><?php echo $key ?></a></li>
				<?php if(($index+1) % 6 == 0) echo '</ul><ul>';?>
				<?php endforeach;?>				
				</ul>
			</div>
		</div>
	</div>
	<div class="clear_f"></div>
</div>

<?php foreach($this->getGoodsCategories() as $category): ?>
<div class="cmn_title w948_f mt14_f">
	<p>
		<a target="_blank" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$category->id)); ?>">更多<samp>&gt;&gt;</samp></a>
	</p>
	<h3 class="f16_f">
		爱美丽们分享的<a target="_blank" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$category->id)); ?>" class="red_f"><?php echo $category->name ?></a>
	</h3>
	<div class="words_link">
	    <?php foreach($category->getTags(12, 8) as $tag):?>
		<?php echo CHtml::link($tag->name, array('/goods/catalog', 'category_id'=>$category->id, 'tag_id'=>$tag->id), array('target'=>'_blank')); ?> 
		<?php endforeach; ?>
	</div>
</div>

<div class="wlc_auto" style="width:968px">
<?php foreach($category->getTags(Yii::app()->config->get('index_tag_count')) as $index=>$tag): ?>
	<div class="groupBox left_f" style="margin:0 8px;">
		<div class="groupCon">
			<div class="gc_title">
				<h4>
					<?php echo CHtml::link($tag->name, array('/goods/catalog', 'category_id'=>$category->id, 'tag_id'=>$tag->id)); ?>
				</h4>
			</div>
			<a class="imgBox" target="_blank" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$category->id, 'tag_id'=>$tag->id)); ?>"> 
			<?php echo $tag->getMixImage($category->id); ?>
			</a>
			<div class="lookBox">
				<a target="_blank" href="<?php echo $this->createUrl('/goods/catalog', array('category_id'=>$category->id, 'tag_id'=>$tag->id)); ?>" class="btn">去看看</a> <span class="tex"><?php echo $tag->goods_count ?>个分享</span>
			</div>
		</div>
	</div>
<?php endforeach;?>	
<div class="clear"></div>
</div>
<div class="clear_f"></div>
<?php endforeach;?>


<?php if(Yii::app()->config->get('index_fluid') =='1'): ?>
<div class="cmn_title w948_f mt14_f">
    <p>
		<a target="_blank" href="<?php echo $this->createUrl('/goods/index', array('type'=>'new')); ?>">更多<samp>&gt;&gt;</samp></a>
	</p>
    <h3 class="f16_f">最新分享的宝贝</h3>
</div>

<div class="content_fluid" style="width:968px">
	<div class="clear_f"></div>
	<div class="spinner topSpinner"></div>
	<div class="goods_wall mlsWall">
        <div class="first_frame">
            <?php $this->actionGetShares(0, isset($_GET['page']) ? $_GET['page'] : 1);?>
        </div>
	</div>
    <div class="spinner botSpinner none"></div>

</div>
<script type="text/javascript">
$(document).ready(function(){
    Yiipin.masonry( {
		url: '<?php echo $this->createUrl('/goods/getShares', array('type'=>'new')); ?>', 
		page: 1, 
		wallSelector:'.goods_wall',
		contSelector: '.content_fluid',
		contWidth: 980,
		skipFirstFrame: true
	});
});
</script>
<?php endif; ?>

<div class="wlc_bot">
	<ul>
		<li class="login"><a href="<?php echo $this->createUrl('site/register'); ?>">万千爱美丽MM，每天都有新分享！<span class="red_f">现在注册&gt;&gt;</span></a></li>
		<li><a href="<?php echo $this->createUrl('connect/sinaweibologin'); ?>"><em class="i_sina">&nbsp;&nbsp;</em> 微博登录</a> <a href="<?php echo $this->createUrl('connect/qqlogin'); ?>" class="ml14_f"><em class="i_QQ">&nbsp;</em> QQ登录</a></li>
		<li class="detail">现在注册，跟朋友一起修炼美丽，每天分享怎样搭配，怎样化妆，哪里去买；记录我漂亮的每一天，让改变发生！</li>
	</ul>
	<div>
		<a target="_blank" href="<?php echo $this->createUrl('goods/index', array('type'=>'new')); ?>" class="big_btn"><span class="big_btnr"></span>更多精彩分享&gt;&gt;</a>
	</div>
</div>

