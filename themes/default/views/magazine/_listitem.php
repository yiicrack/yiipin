<div class="groupBox left_f" style="margin:0 8px;">
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