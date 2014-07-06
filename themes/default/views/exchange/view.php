<?php
$this->pageTitle = $goods->name.'_积分兑换';
$this->keywords = Yii::app()->name.',积分兑换';
$this->description = Yii::app()->name.'积分兑换喜欢的商品';
?>


<div class="container_12" id="main">
    <div style="_overflow: hidden;" class="grid_3">
    <div class="rec_nav red_tb">
				<h2 class="mt10_f">全部分类</h2>
				<div style="border: none;" class="category">
				<?php foreach($this->getCategories() as $data):?>
					<a href="<?php echo $this->createUrl('/exchange/index', array('category_id'=>$data->id)) ?>" class="<?php if(isset($_GET['category_id']) && $_GET['category_id']==$data->id) echo 'active';?>"><?php echo $data->name ?></a> <?php endforeach;?>
					<div class="clear_f"></div>
				</div>
				<div class="cate_ser">
				<?php echo CHtml::link('如何获得积分？', array('/helpcenter/index'), array('target'=>'_blank')); ?>
				</div>
			</div>
    </div>
	<div style="_overflow: hidden;" class="grid_9 alpha">
	    <div class="box_shadow mt14 p13">
	        <div class="code_pic">
				<?php $this->widget('ext.CacheThumbImageWidget', array('width'=>400, 'fullimage'=>true, 'zoom'=>true, 'path'=>$goods->image)); ?>
			</div>
			<div class="goodsdetail" style="float:left; font-size: 14px;line-height: 25px; margin-left: 15px;">
				<div class="break-word">
				    <p class="f14 l22 mb14"><?php echo $goods->name ?></p>
				    库存数量：<?php echo $goods->stock ?><br />
				    限兑份数：<?php echo $goods->limit > 0 ? $goods->limit : '不限'; ?><br />
				    所需积分：<?php echo $goods->credit ?><br />
				    已兑数量：<?php echo $goods->exchanged_count ?><br />
				    <div style="margin-top:20px">
				    <form action="<?php echo CHtml::normalizeUrl(array('/exchange/order', 'id'=>$goods->id)); ?>" method="post">
				        <div class="i_box">兑换数量：<a href="javascript:;" class="J_minus">-</a><input type="text" value="1" class="J_input" name="count" /><a href="javascript:;" class="J_add">+</a></div><br /><br />
				        <?php echo CHtml::link('<em class="big_btnr"></em>&nbsp;&nbsp;立即兑换&nbsp;&nbsp;<samp></samp>', '###', array('id'=>"btn_exchange", 'class'=>"big_btn")); ?>
				    </form>
				    </div>
				    <div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hp_tab" style="margin-top:20px">
                <ul class="hp_lt">
                  <li class="active red"><a href="###">详细介绍</a></li>
                  <li class="red"><?php echo CHtml::link('兑换须知', array('/helpcenter/index'), array('target'=>'_blank')); ?></li>
                </ul>
            </div>
            <div style="padding:20px;">
                <?php echo $goods->content; ?>
            </div> 
	    </div>
	</div>
	<div class="clear_f"></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.i_box').iVaryVal({Min:1, Max: <?php echo $goods->limit > 0 ? $goods->limit : $goods->stock; ?>});
});
</script>