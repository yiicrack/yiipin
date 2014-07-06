<div class="shop_item"> 
    <a href="<?php echo $this->createUrl('/shop/view', array('id'=>$data->id)); ?>" target="_blank" class="click_area"></a> 
    <a href="<?php echo $this->createUrl('/shop/view', array('id'=>$data->id)); ?>" target="_blank" class="link_btn" style="display: none;"></a>
    <h4 class="title"><?php echo ModifierHelper::left($data->name, 40, '...'); ?></h4>
    <div class="stat"> 推荐人数：<span style="color: #f36;"><?php echo $data->share_count ?></span></div>
    <div class="goods_list"> 
    <?php foreach($data->getTopShares(3) as $tmp): ?>
        <?php echo CHtml::image($tmp->goods->getThumb(100), $tmp->goods->name, array('width'=>90, 'height'=>'90')); ?>
    <?php endforeach; ?>
        <div class="clear-fix"></div>
    </div>
    <?php if($data->brand): ?>
    <div class="stat"> 店铺品牌：<span style="color: #f36;"><?php echo $data->brand ?></span></div>
    <?php endif;?>
</div>