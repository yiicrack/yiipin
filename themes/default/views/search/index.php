<?php 
$this->pageTitle = '宝贝搜索';
$this->keywords = '';

if(!isset($_GET['searchKey'])) $_GET['searchKey'] = '';
?>
<script type="text/javascript">

$(document).ready(function(){

	Yiipin.masonry({
		url: '<?php echo $this->createUrl('/search/getShares', array('searchKey'=>$_GET['searchKey'])); ?>', 
		page: <?php echo $_GET['page'] ? $_GET['page'] : 1; ?>, 
		wallSelector:'#wall',
		itemSelector: '.poster_wall',
		contSelector: '#content_fluid',
		skipFirstFrame: true
	});
	
});

</script>


<div id="content_fluid" style="margin: 0px auto;">
	<?php $this->renderPartial('_top'); ?>
    
    <?php if($itemCount == 0):?>
    <div class="no_result break-word">抱歉哦！没有找到<span class="keyword"><?php echo htmlspecialchars($_GET['searchKey']); ?></span>，可以换个关键词试试看。</div>
    <?php else:?>
    <div class="spinner topSpinner"></div>
    <?php endif;?>
	<div id="wall" class="clearfix masonry">
		<div class="first_frame">
            <?php $this->actionGetShares($_GET['searchKey'], 0, $_GET['page'] ? $_GET['page'] : 1);?>
        </div>
	</div>
    <?php if($itemCount > 0):?>
	<div class="spinner botSpinner none_f" style="display: none;"></div>
    <?php if($itemCount <= $this->pageSize):?>
    <div class="clear_f"></div>
    <div class="lookmore"><a target="_blank" href="<?php echo $this->createUrl('/goods/index', array('type'=>'new'));?>" class="big_btn"><em class="big_btnr"></em>查看更多&gt;&gt;</a></div>
    
    <?php else:?>
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
    <?php endif;?>

</div>