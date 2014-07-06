<?php
$this->pageTitle = '站点地图_所有标签';
?>

<div id="main" class="container_12">
    <div class="grid_12">
        <div class="box_shadow p13 mt14">
        <h2 class="f16">所有标签</h2>
            <ul class="attr_all mt10">
                <?php foreach($tags as $tag): ?><li><?php echo CHtml::link($tag->name, array('/sitemap/list', 'tag_id'=>$tag->id), array('target'=>'_blank')); ?></li><?php endforeach;?>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>