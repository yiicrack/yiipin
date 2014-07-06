<?php 
$this->pageTitle = '杂志搜索';
$this->keywords = '';

if(!isset($_GET['searchKey'])) $_GET['searchKey'] = '';
?>

    
<div id="content_fluid" style="margin: 0px auto; width: 968px; visibility: visible;">
	<?php $this->renderPartial('_top'); ?>

<?php if($dataProvider->totalItemCount == 0):?>
    <div class="no_result break-word">抱歉哦！没有找到<span class="keyword"><?php echo htmlspecialchars($_GET['searchKey']); ?></span>，可以换个关键词试试看。</div>
<?php else: ?>
    <?php $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'ajaxUpdate'=>false,
                  			'cssFile' =>false,
                            'itemView'=>'_magazine_listitem',
            				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                            'template'=>'<div class="clearfix masonry" id="wall">{items}</div><div class="clear"></div><div id="pageNav">{pager}</div>',
                        ));
    ?>
	<?php endif;?>
</div>
