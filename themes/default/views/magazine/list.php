<?php
$this->pageTitle = '翻杂志_'.$category->name;
$this->keywords = Yii::app()->name.',杂志,图片,购物分享,淘宝网购物';
$this->description = Yii::app()->name.'杂志是风格的小世界，欧美、甜美、森女、朋克，应有尽有！兴趣相投的MM聚焦在这里分享时尚生活，创办属于自己的个性杂志';

?>

<div>
<div class="group_tab"><a
	href="<?php echo CHtml::normalizeUrl(array('/magazine/index')); ?>"
	class="tab_cate">推荐</a> 
<?php foreach($this->getGroupCategories() as $index=>$data):?>
<a
	href="<?php echo CHtml::normalizeUrl(array('/magazine/list', 'cat'=>$data->id)); ?>"
	class="tab_cate <?php if($data->id == $category->id) echo 'current'; ?>"><?php echo $data->name ?></a> 
<?php if($index>5) break; endforeach;?>

</div>

<div class="goodsTJ">

<?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'emptyText'=>'<div class="no_result break-word">该分类暂无杂志，赶快创建杂志占领有利地形吧！</div>',
                        'template'=>'{items}<div class="clear_f"></div>'.($dataProvider->pagination->pageCount > 1 ? '
	<div class="c_f">
		<div id="pageNav" class="bgcnt">{pager}</div>
	</div>':''),
                    ));
?>
</div>
