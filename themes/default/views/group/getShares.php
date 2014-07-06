<?php foreach($shares as $data):?>
<div class="poster_grid poster_wall pins" share_id="<?php echo $data->id ?>">
    <div class="new_poster">
      <div class="np_pic">
        <?php if($data->goods->price > 0): ?><div class="price">￥<?php echo number_format($data->goods->price, 2); ?></div><?php endif;?>
        <a target="_blank" href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>" class="pic_load">
        <?php echo CHtml::image($data->goods->thumb, $data->goods->name, array('width'=>200, 'height'=>$data->goods->getImageHeight(200), 'class'=>'goods_pic'));?>
        </a>
        <div class="like_merge" style="display: none;"> 
	        <a data="{share_id:'<?php echo $data->id ?>', target:'#comment_<?php echo $data->id ?>'}" href="javascript:void(0)" class="hw46 right_f poster_comment js-comment"><span class="plm_bgr"></span><em class="lm_comm">&nbsp;</em>评论</a> 
	        <a href="javascript:void(0)" class="hw73 left_f poster_forward"><span class="plm_bgr"></span><em class="lm_shouji">&nbsp;</em>收进杂志</a> 
	        <?php echo($data->isliked) ?>
	         
        </div>
      </div>
      <div class="comm_box">
        <p class="l18_f posterContent"><?php echo $data->ParsedQuote ?></p>
        <p class="comm_num"> 
	        <span><b><?php echo $data->goods->collect_count ?></b> 收进杂志</span>
	        <span><b><?php echo $data->like_count ?></b> 喜欢</span> 
        </p>
      </div>
      <div class="np_share"> 
      	<a target="_blank" user_id="<?php echo $data->user_id ?>" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" class="avatar32_f trans07"><img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small') ?>"></a>
        <p class="ml40_f"> <a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" class="fb_f"><?php echo $data->username ?></a> 
        <span>分享到</span>
        <a target="_blank" href="<?php echo $this->createUrl('/group/view', array('id'=>$data->group_id)); ?>"><?php echo $data->group_name ?></a>&nbsp;&nbsp; </p>
        <div class="clear_f"></div>
      </div>
      <div class="comment_share">
      <?php foreach($data->getNewComments(3) as $comment) $this->renderPartial('/share/_comment_item', array('comment'=>$comment));?>
      </div>
      <?php if($data->comment_count > 3):?>
      <div class="comm_share c_f"><a href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id, '#'=>'comments')); ?>" target="_blank"> 查看全部<?php echo $data->comment_count ?>条评论...</a> </div>
      <?php endif;?>
      <div class="poster_cmt none_f" id="comment_<?php echo $data->id ?>"> 
      	<a target="_blank" user_id="0" href="" class="avatar32_f"><img src="<?php echo THEME_DIR ?>/images/0.gif"></a>
        <div class="cmt_r">
          <textarea class="poster_textarea"></textarea>
          <div class="clear_f"></div>
          <p class="discuss"> <a href="javascript:void(0);" class="pl_btn poster_comment_btn share_comment_btn">评论</a><a class="share_smileys">表情</a> </p>
        </div>
        <div class="clear_f"></div>
      </div>
    </div>
  </div>
 <?php endforeach;?>