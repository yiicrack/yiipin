<?php
$this->pageTitle = $group->name;
$this->keywords = Yii::app()->name.',杂志,图片,购物分享,淘宝网购物';
$this->description = Yii::app()->name.'杂志是风格的小世界，欧美、甜美、森女、朋克，应有尽有！兴趣相投的MM聚焦在这里分享时尚生活，创办属于自己的个性杂志';
?>
<script type="text/javascript">
frame = 0;
running = false;
$(document).ready(function(){

	Yiipin.masonry({
		url: '<?php echo $this->createUrl('/group/getShares', array('group_id'=>$group->id)); ?>', 
		page: <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>, 
		wallSelector:'.goods_wall',
		itemSelector: '.poster_grid',
		contSelector: '.content_fluid',
		skipFirstFrame: true
	});

});

</script>
<div class="group_top">
<?php if($group->banner): ?>
<div class="g_pic">
<?php $this->widget('ext.CacheThumbImageWidget', array('path'=>$group->banner, 'height'=>'250', width=>'958')); ?>
</div>
<?php endif;?>
<a name="bar"></a>
  <div class="group_bar mt14_f">
    <div class="info">
      <ul class="members">
        <li><a target="_blank" title="<?php echo $group->user->username ?>" href="<?php echo $this->createUrl('person/index', array('user_id'=>$group->user_id));?>"
		class="avatar32_f"><img
		src="<?php echo WebUser::getUcAvatarSrc($group->user_id, 'small') ?>"></a></li>
        <li class="ml4_f"><a target="_blank" href="<?php echo $this->createUrl('person/index', array('user_id'=>$group->user_id));?>"><?php echo $group->user->username ?></a></li>
      </ul>
      <ul class="fans">
        <li>分享<b class="block_f"><?php echo $group->share_count ?></b></li>
        <li style="border-left: 1px solid #ccc;"><a target="_blank"
		href="/group/14725624/followerlist">粉丝<b class="block_f"><?php echo $group->fans_count ?></b></a></li>
      </ul>
      <div class="name"><span class="font"> <?php echo $group->name ?> </span> 
      <?php if($group->user_id == Yii::app()->user->id):?>
          <span class="infoBox">    <a class="show_edit" href="<?php echo $this->createUrl('/person/editgroup', array('user_id'=>Yii::app()->user->id, 'id'=>$group->id)); ?>">修改杂志</a>  </span>
      <?php else: ?>
          <span class="infoBox"> 
          <?php if($group->followed): ?>
          <span class="pink_follow" group_id="<?php echo $group->id ?>">已关注</span> 
          <?php else:?>
    		<span class="groupFollow small_btn" group_id="<?php echo $group->id ?>"><em class="small_btnr"></em>+ 加关注</span> 
    	  <?php endif;?>
    	  </span>
	  <?php endif;?>
	
	</div>
    </div>
  </div>
  <div style="height: 19px; overflow: hidden;" class="notes"><b
	class="f14_f left_f">卷首语：</b>
    <div style="width: 650px;" class="notesText left_f"><?php echo $group->preface ?></div>
  </div>
  <p class="switch"></p>
  <div class="clear_f"></div>
</div>

<div class="spinner topSpinner"></div>

<div class="content_fluid">
	<div class="goods_wall mlsWall">
	    <div class="first_frame">
            <?php $this->actionGetShares($group->id, 0, $_GET['page'] ? $_GET['page'] : 1);?>
        </div>
	</div>
</div>

  
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