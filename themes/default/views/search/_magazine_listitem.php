<div class="poster_wall mlsPin left_f" style="margin:0 8px;">
	<div class="box_shadow groupBox mt14">
		<div class="groupbg">
			<div class="gc_title h18 l18 overflow">
				<h3 class="f14 cursor white-space left">
					<?php echo CHtml::link($data->name, array('/group/view', 'id'=>$data->id), array('target'=>'_blank')); ?>
				</h3>
				<p class="gray f14n r"><?php echo $data->share_count ?></p>
			</div>
			<div class="clear"></div>
			<a target="_blank" href="<?php echo CHtml::normalizeUrl(array('/group/view', 'id'=>$data->id)); ?>" class="mt5 cursor block g_db_bg"> 
			    <?php echo $data->getMixImage(); ?> 
				<div class="clear"></div>
			</a>
			
			<div class="imgBox">
			<?php if($data->followed): ?>
				<span class="ex_notfollow f14 cursor quitbtn auto" group_id="<?php echo $data->id ?>">已关注</span>
		    <?php else: ?>
		        <span class="ex_follow f14 cursor followbtn auto" group_id="<?php echo $data->id ?>">＋ 加关注</span>
		    <?php endif;?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>