<?php
$this->pageTitle = $this->user->username.'的'.Yii::app()->name;
$this->breadcrumbs=array(
	$this->user->username.'的'.Yii::app()->name,
);
?>

<script type="text/javascript">
$(document).ready(function(){

	$('#person-avatar').live({
	   mouseenter:function(){
		   $('#changeFace').show();
	   },
	   mouseleave:function(){
		   $('#changeFace').hide();
	   }
	});
	$('#changeFace').live({
	   mouseenter:function(){
		   $('#changeFace').show();
	   },
	   mouseleave:function(){
		   $('#changeFace').hide();
	   }
	});


	Yiipin.masonry({
		url: '<?php echo $this->createUrl('/person/getItems', array('user_id'=>$this->user->id)); ?>', 
		page: <?php echo $_GET['page'] ? $_GET['page'] : 1; ?>, 
		wallSelector:'#wall',
		itemSelector: '.poster_wall, .corner_nav',
		contSelector: '#main',
		skipFirstFrame: true
	});
	
	
});

</script>
<div id="main" class="container_12">
    <div class="corner_nav">
          <div class="per_tabs box_inset pr overflow">
            <?php extract($this->getStats());?>
        <ul class="tabs_bar box_inset f20 fb">
          <li class="red" style="border: none;"><a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$this->user->id)); ?>"><?php echo $this->user->username ?>的<?php echo Yii::app()->name ?></a></li>
          <li ><a href="<?php echo $this->createUrl('/person/magazine', array('user_id'=>$this->user->id)); ?>" ><?php echo $groupCount ?>杂志</a></li>
          <li ><a href="<?php echo $this->createUrl('/person/share', array('user_id'=>$this->user->id)); ?>"><?php echo $shareCount ?>分享</a></li>
          <li ><a href="<?php echo $this->createUrl('/person/like', array('user_id'=>$this->user->id)); ?>"><?php echo $likeCount ?>喜欢</a></li>
          <li ><a href="<?php echo $this->createUrl('/person/follow', array('user_id'=>$this->user->id)); ?>"><?php echo $followCount ?>关注的杂志</a></li>
        </ul>
        <div class="clear"></div>
      </div>
    </div>
    <div class="spinner none" id="spinnerPoster"></div>
    <div id="content_fluid" style="margin:0 auto;" class="person_index">
      <div id="wall" class="clearfix masonry">
        
        <div class="corner_notic">
            <?php $this->renderPartial('_sidebar');?>
        </div>
        
        <div class="first_frame">
            <?php $this->actionGetItems($this->user->id, 0, $_GET['page'] ? $_GET['page'] : 1);?>
        </div>
        
      </div>
      <div class="clear"></div>
      <?php if($itemCount > $this->pageSize):?>
      <div class="paging_panel c_f none">
      <div id="pageNav" class="bgcnt"><?php $this->widget('system.web.widgets.pagers.CLinkPager', array(
						'itemCount'=>$itemCount,
						'pageSize'=>$this->pageSize,
						'cssFile' => false,
				       	'maxButtonCount' => 5,
						'firstPageLabel' => '首页',
						'lastPageLabel' => '末页',
						'nextPageLabel' => '下一页',
						'prevPageLabel' => '上一页',
						'header'=>'',
					)); ?></div>
	</div>
	<?php endif;?>
      <div class="spinner none botSpinner"></div>
      
     
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
  </div>