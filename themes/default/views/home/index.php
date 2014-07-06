<?php
$this->pageTitle = '我的首页';
$this->breadcrumbs=array(
	'我的首页',
);

?>
<script type="text/javascript">
 
$(document).ready(function(){

	Yiipin.masonry({
		url:'<?php echo $this->createUrl('/home/getShares'); ?>', 
		page: <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>, 
		wallSelector:'.goods_wall',
		itemSelector: '.poster_wall, .corner_notic',
		contSelector: '.content_fluid',
		skipFirstFrame: true
	});
	
	$('.rep_maga').live('click', function(){
	    $.get('<?php echo $this->createUrl('/home/getmagazines'); ?>', {random: Math.random()}, function(html){
	        $('#corner_stamp_magazines').html(html);
	        //$('.goods_wall').masonry();
		});
		return false;
	});
	
	$('.rep_daren').live('click', function(){
	    $.get('<?php echo $this->createUrl('/home/getusers'); ?>', {random: Math.random()}, function(html){
	        $('#corner_stamp_users').html(html);
	        //$('.goods_wall').masonry();
		});
		return false;
	});

	//插入新分享
	$('#updateFluid').click(function(){
	    $.get('<?php echo $this->createUrl('/home/getnewshares'); ?>', {last_refresh_time: Yiipin.config.timestamp}, function(result){
	    	var data = eval('('+result+')');
		    if(data.newElements != 'false'){
			    var last_col = 0;
			    var cols = $('.fluid_column').size();
    	    	$(data.newElements).each(function(){
        	    	var $current_col = $('.goods_wall .fluid_column:eq('+last_col+')');
        	    	if($current_col.children().first().is('.corner_notic, .corner_stamp')){
        	    		$('.corner_notic').after($(this));
        	    	}
            	    else{
            	        $current_col.prepend($(this));
            	    }
    	    		last_col++;
    	    		if(last_col >= cols) last_col = 0;
    	    	});
		    }
		    Yiipin.config.timestamp = data.timestamp;
		    $('#updateFluid').hide();
		});
	});

	
});

</script>


<div class="content_fluid">
	<div class="ads_banner ads_top none_f" style="display: block; position: relative">
    <?php $this->widget('ext.SlideshowWidget', array('asbg'=>true, 'vertical'=>true, 'width'=>'100%', 'height'=>'100px', 'token'=>'逛宝贝100%*100'));?>
    </div>
	<div class="clear_f"></div>
    <div class="clear_f"></div>
	<div class="goods_wall mlsWall">
		<div class="corner_notic">
			<div class="repinNotic none_f" style="display: block;">
				<h3 class="f14_f">最新动态</h3>
				<ul>
				<?php foreach($this->getEvents() as $data): ?>
					<li class=""><a target="_blank" href="<?php echo CHtml::normalizeUrl($data->link); ?>" class="face"><img src="<?php echo $data->image ?>" class="face"></a>
						<p class="ml40_f">
							<span><?php echo UtilHelper::sgmdate('m月d日', $data->created); ?></span> <?php echo $data->action ?>
						</p></li>
				<?php endforeach; ?>
				</ul>
			
			</div>
		</div>
    
		<div class="corner_stamp">
			<div id="corner_stamp_magazines"><?php $this->renderPartial('_corner_stamp_magazines', array('items'=>$this->getInitMagazines()));?></div>
			<div id="corner_stamp_users"><?php $this->renderPartial('_corner_stamp_users', array('users'=> $this->getInitUsers()));?></div>
		</div>
		
		<div class="first_frame">
            <?php $this->actionGetShares(0, isset($_GET['page']) ? $_GET['page'] : 1);?>
        </div>
	</div>
    <div class="spinner botSpinner" style="display: none;"></div>
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
	<div class="clear_f"></div>
	<div class="rec_pager">
		想订制更符合你品味的首页？ <a target="_blank" href="<?php echo $this->createUrl('magazine/index'); ?>" class="small_btn"><em class="small_btnr"></em>去关注我喜欢的&gt;&gt;</a>
	</div>
</div>
<div id="updateFluid" class="h_update none_f fixed-top fixed-left" style="_top:expression(eval(document.documentElement.scrollTop+260))"><a><span id="msgSize">20</span>个新分享</a></div>


