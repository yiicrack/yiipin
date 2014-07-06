<?php
$this->pageTitle = '积分兑换';
$this->breadcrumbs=array(
	'积分兑换',
);
$this->keywords = Yii::app()->config->get('keywords');
$this->description = Yii::app()->config->get('description');
?>

<script type="text/javascript">
$(document).ready(function(){
    Yiipin.masonry( {
		url: '<?php echo $this->createUrl('/exchange/getGoods', $_GET); ?>', 
		page: <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>, 
		wallSelector:'.goods_wall',
		contSelector: '.content_fluid',
		skipFirstFrame: true
	});
});
</script>


<div class="content_fluid">
	<div class="cata_title">
		<h2>积分兑换</h2>
		<span class="left_f f14_f">积分范围：</span>
		<ul class="category left_f">
			<li><a href="<?php echo $this->createUrl('exchange/index', array('price'=>'all','page'=>1)+$_GET); ?>"<?php if(!isset($_GET['price']) || $_GET['price']=='all') echo ' class="active"';?>>全部</a></li>
			<li><a href="<?php echo $this->createUrl('exchange/index', array('price'=>'0~5000','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='0~5000') echo ' class="active"';?>>0~5000</a></li>
			<li><a href="<?php echo $this->createUrl('exchange/index', array('price'=>'5001~20000','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='5001~20000') echo ' class="active"';?>>5001~20000</a></li>
			<li><a href="<?php echo $this->createUrl('exchange/index', array('price'=>'20001~50000','page'=>1)+$_GET); ?>"<?php if(isset($_GET['price']) && $_GET['price']=='20001~50000') echo ' class="active"';?>>20001~50000</a></li>
			<li><a href="<?php echo $this->createUrl('exchange/index', array('price'=>'50001~1000000','page'=>1)+$_GET); ?>" class="last<?php if(isset($_GET['price']) && $_GET['price']=='50001~1000000') echo ' active';?>">50000以上</a></li>
		</ul>
		<ul class="category right_f">
			<li><a href="<?php echo $this->createUrl('exchange/index', array('sort'=>'hot')+$_GET); ?>" class="<?php if(!isset($_GET['sort']) || $_GET['sort']=='hot') echo ' active';?>">最热</a></li>
			<li><a href="<?php echo $this->createUrl('exchange/index', array('sort'=>'new')+$_GET); ?>" class="<?php if(isset($_GET['sort']) && $_GET['sort']=='new') echo ' active';?>">最新</a></li>
		</ul>
	</div>
	<div class="clear_f"></div>
	<div class="spinner topSpinner"></div>
	<div class="goods_wall mlsWall">
	
		<div class="corner_notic">
			<div class="rec_nav red_tb">
				<h2 class="mt10_f">全部分类</h2>
				<div style="border: none;" class="category">
				<?php foreach($this->getCategories() as $data):?>
					<a href="<?php echo $this->createUrl('/exchange/index', array('category_id'=>$data->id)) ?>" class="<?php if(isset($_GET['category_id']) && $_GET['category_id']==$data->id) echo 'active';?>"><?php echo $data->name ?></a> <?php endforeach;?>
					<div class="clear_f"></div>
				</div>
				<div class="cate_ser">
				<?php echo CHtml::link('如何获得积分？', array('/helpcenter/index'), array('target'=>'_blank')); ?>
				</div>
			</div>
			
		</div>
        <div class="first_frame">
            <?php $this->actionGetGoods(0, isset($_GET['page']) ? $_GET['page'] : 1);?>
        </div>
	</div>
    <div class="spinner botSpinner none"></div>
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
    					)) ?>
    	</div>
    </div> 
    <?php endif;?>

</div>
