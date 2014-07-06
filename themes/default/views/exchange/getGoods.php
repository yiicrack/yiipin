<?php foreach($goods as $data):?>
<div class="poster_grid poster_wall pins">
    <div class="new_poster">
      <div class="np_pic">
        <div class="price"><?php echo $data->credit; ?>分</div>
        <a target="_blank" href="<?php echo $this->createUrl('/exchange/view', array('id'=>$data->id)); ?>" class="pic_load">
        <?php $this->widget('ext.widgets.ThumbWidget', array('path'=>$data->image, 'width'=>200, 'alt'=>$data->name, 'htmlOptions'=>array('class'=>'goods_pic'))); ?>
        </a>
      </div>
      <div class="np_share"> 
      	<?php echo CHtml::link($data->name, array('/exchange/view', 'id'=>$data->id), array('target'=>'_blank')); ?>
      	<a style="width: 48px; height: 20px;" class="c red_round white noneButton cursor r" target="_blank" href="<?php echo $this->createUrl('/exchange/view', array('id'=>$data->id)); ?>">兑换</a>
        <div class="clear_f"></div>
      </div>
      
    </div>
  </div>
 <?php endforeach;?>