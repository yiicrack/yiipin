<div class="free_box">
  <div class="begin_bg"><?php echo date('n月j日', strtotime($data->start_time)); ?>开始</div>
  <a target="_blank" href="<?php echo CHtml::normalizeUrl(array('/trial/view', 'id'=>$data->id)); ?>" class="pic"><img src="<?php echo $data->image ?>"></a>
  <div class="bewrite">
    <h3 class="bw_tle"><a target="_blank" class="red_f" href="<?php echo CHtml::normalizeUrl(array('/trial/view', 'id'=>$data->id)); ?>"><?php echo ModifierHelper::left($data->name, 34); ?></a></h3>
    <p class="time"><span>共</span><strong class="red_f f20_f"><?php echo $data->stock ?></strong><span>份</span> <span class="ml10_f">价值：</span><strong class="red_f f20_f">￥<del><?php echo $data->price ?></del></strong> </p>
    <p end-date="<?php echo date('F d,Y H:i:s', strtotime($data->end_time)) ?>" class="time timeStamp countdown"></p>
    <?php if(strtotime($data->end_time) < time()): ?>
    <p><a target="_blank" href="<?php echo CHtml::normalizeUrl(array('/trial/view', 'id'=>$data->id)); ?>" class="wf_detail"></a></p>
    <?php else: ?>
    <p><a target="_blank" href="<?php echo CHtml::normalizeUrl(array('/trial/view', 'id'=>$data->id)); ?>" class="wf_apply"></a></p>
    <?php endif; ?>
    <p><b class="f14_f red_f"><?php echo $data->apply_count ?></b>人申请</p>
    
  </div>
  <div class="clear_f"></div>
</div>