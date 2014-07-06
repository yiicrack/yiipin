<div class="cmn_title mt14_f">
	<p>
		<a class="rep_maga" href="#" target="_blank">换一组<samp>&gt;&gt;</samp></a>
	</p>
	<h3 class="f16_f">推荐关注杂志</h3>
</div>
<div class="groupCon">
	<div>
		<div class="rec_maga" style="display: block;">
		<?php foreach($items as $data):?>
			<div class="gc_title">
				<h4>
					<?php echo CHtml::link($data->name, array('/group/view', 'id'=>$data->id), array('target'=>'_blank')); ?>
				</h4>
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
		<?php endforeach;?>
		</div>
	</div>
	<p class="paper">想订制更符合你品味的首页？</p>
	<a href="<?php echo $this->createUrl('magazine/index'); ?>" target="_blank" class="big_btn"><em class="big_btnr"></em>去关注我喜欢的<samp>&gt;&gt;</samp></a>
</div>
