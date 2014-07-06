<?php
$this->pageTitle = '好店';
$this->breadcrumbs=array(
        '好店',
);
$this->keywords = Yii::app()->config->get('keywords');
$this->description = Yii::app()->config->get('description');
?>
<script type="text/javascript">
$(function(){
	$('.top_shop_list .shop_item').each(function(){
		var o = $(this);
		o.hover(function(){
			o.find('.link_btn').height(o.height()-6).show();
		}, function(){
			o.find('.link_btn').hide();
		});
	});
});
</script>
<div id="main" class="container_12">
    <div class="grid_12">
      <div class="top_shop_header box_shadow p13">
        <div class="info"> 时尚编辑也网购？美容达人也上网买保养品？
          论坛里的搭配红人天天都淘宝？她们都去哪里逛？<br/>
          她们都潜伏在<?php echo Yii::app()->name ?>分享宝贝！<?php echo Yii::app()->name ?>精选时尚MM们的私房推荐，
          为你奉上好店100，让你立刻变身潮爆时尚买手！<br/>
        </div>
      </div>
      <div class="top_shop_body">
        <div class="top_shop_cat box_shadow p13">
          <div class="cat">
            <h3><a href="<?php echo $this->createUrl('index'); ?>" class="cat_name <?php if(!isset($_GET['cate_id'])) echo 'cat_current'; ?>">全部精选</a></h3>
          </div>
          <?php foreach($this->getShopCategories(0) as $cate):?>
          <div class="cat">
            <h3><?php echo CHtml::link($cate->name, '###', array('class'=>isset($parent_id) && $parent_id==$cate->id ? 'cat_name cat_current':'cat_name')); ?></h3>
            <div style="padding-left: 13px;">
             <?php foreach($this->getShopCategories($cate->id) as $subcate):?>
              <div class="sub_cat_name <?php if(isset($_GET['cate_id']) && $_GET['cate_id'] == $subcate->id) echo 'sub_cat_current'; ?>"> <?php echo CHtml::link($subcate->name, array('shop/index', 'cate_id'=>$subcate->id)); ?> </div>
             <?php endforeach;?>
              <div class="clear-fix"></div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <div class="top_shop_list box_shadow p13">
        <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'emptyText'=>'<div class="no_result break-word">暂无该分类好店，欢迎推荐！</div>',
                        'template'=>'{items}<div class="clear-fix"></div>'.($dataProvider->pagination->pageCount > 1 ? '
	<div class="c">
		<div id="pageNav" class="bgcnt">{pager}</div>
	</div>':''),
                    ));
?>

          <div class="clear-fix"></div>
          <div class="shopDarenbot">
            <h2 class="shopDarenbot_title f14">
            <span style=" padding-right: 5px"><a href="<?php echo $this->createUrl('/goods/index', array('type'=>'new')); ?>" target="_blank">更多&gt;&gt;</a></span>最新分享的宝贝
            </h2>
            <div class="shop_daren">
              <ul class="darenShare">
              <?php foreach($this->getNewShares(5) as $data):?>
                <li><a href="<?php echo $this->createUrl('/share/view', array('id'=>$data->id)); ?>" target="_blank">
                <?php echo CHtml::image($data->goods->getThumb(120), $data->goods->name, array('width'=>120, 'height'=>120)); ?>
                </a></li>
              <?php endforeach;?>
              </ul>
            </div>
            <div class="follow_detail"><?php echo Yii::app()->name ?>是一个沸腾着血拼快感的时尚<a href="<?php echo $this->createUrl('/goods/index', array('type'=>'new')); ?>" target="_blank">购物社区</a>。这里为你筛选了各类<a href="<?php echo $this->createUrl('/shop/index'); ?>" target="_blank">淘宝店铺</a>。</div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>