<?php if(!isset($_GET['display']) || $_GET['display'] == 'list'): ?>
<div id="t<?php echo $data->id ?>" class="twitter_Feed">
  <div style="clear:both;"></div>
  <div style="height:10px;width:100%;float:left;"></div>
  <div style="clear:both"></div>
  <div class="big_picture">
    <div style="position: relative">
      <div class="code_pic"> 
      <a target="_blank" href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>" class="pic_load">
        <?php echo CHtml::image($data->goods->getThumb(220), $data->goods->name, array('width'=>220, 'class'=>'normal_pic')); ?>
        </a>
      </div>
      <div style="position:absolute; left: 140px; top: 10px; display: none;" class="original_pic_ioc">
			<a target="_blank" href="<?php echo $data->goods->image; ?>">
				<img src="<?php echo THEME_DIR ?>/images/original_pic_ico.gif" style="border: medium none;">
			</a>
		</div>
    </div>
  </div>
  <div style="margin-left:20px;float:left;width:368px;">
    <div style="float:none;" class="goods_title"> <a href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>" target="_blank"><?php echo $data->goods->name ?></a> </div>
    <div style="margin-top:15px;">
      <div style="float:left;width:32px;height:32px;margin-top:3px;" class="twitter_avatar"> 
          <a target="_blank" user_id="<?php echo $data->user_id ?>" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><img style="width:32px;height:32px;border:none;" src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small') ?>"></a></div>
      <div style="float:left;width:255px;margin-left:10px;display:inline;" class="content">
        <div class="t_nickname"> 
        <a style="color:#ff3366;" target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" class="a1 t_nickname_a"><?php echo $data->user->username ?></a> 
         推荐说： <span class="t_usecontent break-word"><?php echo $data->quote; ?></span> </div>
      </div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="margin-left:0px;" class="toolsBar">
    <div class="twitter_tools_source"><?php echo UtilHelper::sgmdate('Y-m-d', strtotime($data->created));?></div>
  </div>
  <div style="clear: both;"></div>
</div>
<?php else: ?>
 <div <?php if(($index+1) % 3 == 0) echo 'style="margin-right: 0"';?> id="t<?php echo $data->id ?>" class="twitter_pic twitter_large_pic">
        	<a target="_blank" href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>" class="goods_pic">
        <?php echo CHtml::image($data->goods->getThumb(160), $data->goods->name, array('width'=>180, 'class'=>'normal_pic')); ?>
        </a>
        		<div class="author_wrapper">
        		by: <a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>"><?php echo $data->user->username ?></a>
        	</div>
        </div>
<?php endif;?>