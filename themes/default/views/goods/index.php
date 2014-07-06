<?php
$this->pageTitle = '逛宝贝'.($tag->id ? '_'.$tag->name:'');
$this->breadcrumbs=array(
	'逛宝贝',
);
$this->keywords = Yii::app()->config->get('keywords');
$this->description = Yii::app()->config->get('description');
?>

<script type="text/javascript">
$(document).ready(function(){
    Yiipin.masonry( {
		url: '<?php echo $this->createUrl('/goods/getShares', $_GET); ?>', 
		page: <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>, 
		wallSelector:'.goods_wall',
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
		<h2>
		<?php if((!isset($_GET['type']) && !isset($_GET['tag_id'])) || ( isset($_GET['type']) && $_GET['type']=='week')): ?>
		7天最热
		<?php elseif(isset($_GET['type']) && $_GET['type']=='month'): ?>
		30天最热
		<?php else: ?>
		最新分享
		<?php endif;?>
		</h2>
	</div>
	<div class="clear_f"></div>
	<div class="goods_wall mlsWall">
	
		<div class="corner_notic">
			<div class="rec_nav red_tb">
				<h2>社区热荐</h2>
				<div class="category">
					<a href="<?php echo $this->createUrl('/goods/index', array('type'=>'week')) ?>" class="<?php if((!isset($_GET['type']) && !isset($_GET['tag_id'])) || ( isset($_GET['type']) && $_GET['type']=='week')) echo 'active';?>">7天最热</a> 
					<a href="<?php echo $this->createUrl('/goods/index', array('type'=>'month')) ?>" class="<?php if(isset($_GET['type']) && $_GET['type']=='month') echo 'active';?>">30天最热</a> 
					<a href="<?php echo $this->createUrl('/goods/index', array('type'=>'new')) ?>" class="<?php if(isset($_GET['type']) && $_GET['type']=='new') echo 'active';?>">最新</a>
					<div class="clear_f"></div>
				</div>
				<h2 class="mt10_f">热门搜索</h2>
				<div style="border: none;" class="category">
				<?php foreach($this->getHotTags(20) as $tag):?>
					<a href="<?php echo $this->createUrl('/goods/index', array('tag_id'=>$tag->id)) ?>" class="<?php if(isset($_GET['tag_id']) && $_GET['tag_id']==$tag->id) echo 'active';?>"><?php echo $tag->name ?></a> <?php endforeach;?>
					<div class="clear_f"></div>
				</div>
				<div class="cate_ser">
					<form method="get" action="<?php echo $this->createUrl('/search/index');?>" onsubmit="return checksearch()">
						<span class="text"><input type="text" 
							value="去其他关键词" onfocus="if(this.value == '去其他关键词'){this.value=''}" onblur="if(this.value == ''){this.value='去其他关键词'}" name="searchKey" id="searchKeyCatalog" class="searchKeyCatalog"></span> <span
							class="btn"><input type="submit" value="搜索"></span>
							<input id="filter" type="hidden" value="goods" name="filter">
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
			<h2 class="mt14_f f14_f">推荐杂志</h2>
			<?php foreach($this->getHotGroups(2) as $data):?>
			<div class="groupBox">
            	<div class="groupCon">
            	<div class="gc_title">
            	<h4><?php echo CHtml::link($data->name, array('/group/view', 'id'=>$data->id), array('target'=>'_blank')); ?></h4>
            	<p><?php echo $data->share_count ?></p>
            	</div>
            	<a class="imgBox" href="<?php echo CHtml::normalizeUrl(array('/group/view', 'id'=>$data->id)); ?>" target="_blank">
            	<?php echo $data->getMixImage(); ?>
            	<div class="clear_f"></div>
            	</a>
            	<div class="infoBox c_f">
            	      <?php if($data->followed): ?>
                      <span class="pink_follow" group_id="<?php echo $data->id ?>">已关注</span> 
                      <?php else:?>
                		<span class="groupFollow small_btn" group_id="<?php echo $data->id ?>"><em class="small_btnr"></em>+ 加关注</span> 
                	  <?php endif;?>
            	<div class="clear_f"></div>
            	</div>
            	</div>
            </div>
			<?php endforeach;?>
		</div>
        <div class="first_frame">
            <?php $this->actionGetShares(0, isset($_GET['page']) ? $_GET['page'] : 1);?>
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
