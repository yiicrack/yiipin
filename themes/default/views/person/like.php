<?php
$this->pageTitle = $this->user->username.'的'.Yii::app()->name;
$this->breadcrumbs=array(
        $this->user->username.'的'.Yii::app()->name,
);


?>
<script type="text/javascript">

$(document).ready(function(){

	Yiipin.masonry({
		url: '<?php echo $this->createUrl('/person/getLikes', array('user_id'=>$this->user->id)); ?>', 
		page: <?php echo $_GET['page'] ? $_GET['page'] : 1; ?>, 
		wallSelector:'#wall',
		itemSelector: '.poster_wall, .corner_nav',
		contSelector: '#main',
		skipFirstFrame: true
	});
	
});

</script>

<div id="main" class="container_12">
    <div class="spinner none topSpinner"></div>
    <div class="corner_nav">
          <div class="per_tabs box_inset pr overflow">
           <?php extract($this->getStats());?>
            <ul class="tabs_bar box_inset f20 fb">
              <li style="border: none;"><a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$this->user->id)); ?>"><?php echo $this->user->username ?>的<?php echo Yii::app()->name ?></a></li>
              <li ><a href="<?php echo $this->createUrl('/person/magazine', array('user_id'=>$this->user->id)); ?>" ><?php echo $groupCount ?>杂志</a></li>
              <li ><a href="<?php echo $this->createUrl('/person/share', array('user_id'=>$this->user->id)); ?>"><?php echo $shareCount ?>分享</a></li>
              <li  class="red"><a href="<?php echo $this->createUrl('/person/like', array('user_id'=>$this->user->id)); ?>"><?php echo $likeCount ?>喜欢</a></li>
              <li ><a href="<?php echo $this->createUrl('/person/follow', array('user_id'=>$this->user->id)); ?>"><?php echo $followCount ?>关注的杂志</a></li>
            </ul>

            <div class="clear"></div>
          </div>
        </div>
    <div id="content_fluid" style="margin:0 auto;" class="person_index">
      <div id="wall" class="clearfix masonry">
        <div class="corner_notic">
            <?php $this->renderPartial('_sidebar');?>
        </div>
        
        <div class="first_frame">
            <?php $this->actionGetLikes($this->user->id, 0, $_GET['page'] ? $_GET['page'] : 1);?>
        </div>
        
      </div>
      <div class="clear"></div>
      <div id="pageNav"></div>
      <div class="spinner none botSpinner"></div>

     
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
  </div>
        