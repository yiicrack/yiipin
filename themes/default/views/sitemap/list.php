<?php
$this->pageTitle = $tag->name.'_站点地图';
?>

<div id="main" class="container_12">
    <div class="grid_12">
        <div class="box_shadow p13 mt14">
        <h2 class="f16"><?php echo $tag->name ?> 所有分享</h2>
        <div class="mt10 sitemap_share_list">
        <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_listitem',
                        'itemsTagName'=>'ul',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'emptyText'=>'<div class="no_result break-word">该标签暂无任何相关分享</div>',
                        'template'=>'{items}<div class="clear_f"></div>'.($dataProvider->pagination->pageCount > 1 ? '
	<div class="c_f">
		<div id="pageNav" class="bgcnt">{pager}</div>
	</div>':''),
                    ));
?></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>