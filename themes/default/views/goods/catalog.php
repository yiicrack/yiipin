<?php
$this->pageTitle = '逛宝贝_'.$category->name.($tag->id ? '_'.$tag->name:'');
$this->breadcrumbs=array(
	'逛宝贝',
);
$this->keywords = "{$category->name},{$category->name}价格,{$category->name}女装,{$category->name}单品推荐,{$category->name}搭配,".$keywords;
$this->description = "{$category->name}是当前流行的服饰搭配元素，想要把{$category->name}搭得美丽，来看百万时尚网友精心挑选出的当季最流行的{$category->name}单品、最佳搭配、购买心得、购买链接";

?>
<script type="text/javascript">

$(document).ready(function(){
	Yiipin.masonry({
		url: '<?php echo $this->createUrl('/goods/getShares', $_GET); ?>', 
		page: <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>, 
		wallSelector:'.goods_wall',
		itemSelector: '.poster_grid, .corner_notic',
		contSelector: '.content_fluid',
		skipFirstFrame: true
	});

});
</script>

<div class="content_fluid">
	<div class="ads_banner ads_top none_f" style="display: block; position: relative">
    <?php $this->widget('ext.SlideshowWidget', array('asbg'=>true, 'vertical'=>true, 'width'=>'100%', 'height'=>'100px', 'token'=>'逛宝贝100%*100'));?>
    </div>
    
	<div class="cata_title">
		<h2><?php echo $category->name ?></h2>
		<span class="left_f f14_f">价格：</span>
		<ul class="category left_f">
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('price'=>'all','page'=>1)+$_GET); ?>"<?php if(!isset($_GET['price']) || $_GET['price']=='all') echo ' class="active"';?>>全部</a></li>
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('price'=>'0~50','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='0~50') echo ' class="active"';?>>0~50</a></li>
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('price'=>'51~200','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='51~200') echo ' class="active"';?>>51~200</a></li>
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('price'=>'201~500','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='201~500') echo ' class="active"';?>>201~500</a></li>
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('price'=>'501~10000','page'=>1)+$_GET); ?>" class="last<?php if(isset($_GET['price']) && $_GET['price']=='501~10000') echo ' active';?>">500元以上</a></li>
		</ul>
		<ul class="category right_f">
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('sort'=>'hot')+$_GET); ?>" class="<?php if(!isset($_GET['sort']) || $_GET['sort']=='hot') echo ' active';?>">最热</a></li>
			<li><a href="<?php echo $this->createUrl('goods/catalog', array('sort'=>'new')+$_GET); ?>" class="<?php if(isset($_GET['sort']) && $_GET['sort']=='new') echo ' active';?>">最新</a></li>
		</ul>
		<span class="right_f f14_f">排序：</span>
	</div>
	<div class="clear_f"></div>
	<div class="goods_wall mlsWall">
		<div class="corner_notic">
			<div class="rec_nav red_tb">
			<?php foreach($this->getTagGroup($category) as $group): ?>
				<h2><?php echo $group ?></h2>
				<div class="category">
				<?php foreach($this->getTags($category, $group) as $tag):?>
					<a href="<?php echo $this->createUrl('/goods/catalog', array('tag_id'=>$tag->id,'page'=>1)+$_GET); ?>" class="<?php echo isset($_GET['tag_id']) && $tag->id == $_GET['tag_id'] ? 'active':'';?>"><?php echo $tag->name ?></a> 
				<?php endforeach;?>
					<div class="clear_f"></div>
				</div>
			<?php endforeach;?>
			
				<div class="cate_ser">
					<form method="get" action="<?php echo $this->createUrl('/search/index');?>" onsubmit="return checksearch()">
						<span class="text"><input type="text" value="去其他关键词" onfocus="if(this.value == '去其他关键词'){this.value=''}" onblur="if(this.value == ''){this.value='去其他关键词'}" name="searchKey" id="searchKeyCatalog" class="searchKeyCatalog"></span> <span class="btn"><input type="submit" value="搜索"></span> <input id="filter" type="hidden" value="goods" name="filter">
					</form>
					<script type="text/javascript">
				    function checksearch(){
				        if($('#searchKeyCatalog').val()=='' || $('#searchKeyCatalog').val()=='去其他关键词'){
				            alert('请输入关键词！');
				            return false;
				        }
				        return true;
				    }
					</script>
				</div>
			</div>
		</div>
    
    <div class="first_frame">
        <?php $this->actionGetShares(0, isset($_GET['page']) ? $_GET['page'] : 1);?>
    </div>
    
	</div>
	<div class="spinner botSpinner none_f" style="display: none;"></div>
    <?php if($itemCount > $this->pageSize):?>
    <div class="clear_f"></div>
	<div class="paging_panel c_f none">
		<div id="pageNav" class="bgcnt">
    	<?php $this->widget('system.web.widgets.pagers.CLinkPager', array(
    						'itemCount'=>$itemCount,
    						'pageSize'=>$this->pageSize,
    						'cssFile' => false,
    				       	'maxButtonCount' => 5,
    						'firstPageLabel' => '首页',
    						'lastPageLabel' => '末页',
    						'nextPageLabel' => '下一页',
    						'prevPageLabel' => '上一页',
    						'header'=>'',
    					)); ?>
    	</div>
	</div> 
    <?php endif;?>
    
</div>

