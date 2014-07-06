<?php
$this->pageTitle = $shop->name.'_好店';
$this->breadcrumbs=array(
        '好店'=>array('shop/index'),
        $shop->name,
);
$this->keywords = $shop->tags.','.Yii::app()->config->get('keywords');
$this->description = Yii::app()->config->get('description');
?>

<div class="container_12" id="main">
  <div class="grid_12">
    <div class="shop_wrapper">
      <h1 style="float: none; font-size: 24px; padding: 13px 10px;"><?php echo $shop->name ?></h1>
      <div class="shop_sidebar box_shadow p13">
        <div class="shop_summary">
          <div> <a class="shop-url-link" target="_blank" href="<?php echo $shop->url ?>"><img width="80" height="80" src="<?php echo $shop->logo ?>" style="border: 1px solid #e0e0e0;" /></a> </div>
          <div class="title"><?php echo ModifierHelper::left($shop->name,50); ?></div>
          <a class="shop-url-link" target="_blank" href="<?php echo $shop->url ?>">去这家店逛逛</a> </div>
        <div class="section">
          <h3 class="section_title">店铺看点</h3>
          <?php foreach($shop->allTags as $tag): ?>
          <?php echo CHtml::link($tag, array('/search/index', 'searchKey'=>$tag, 'searchType'=>1, 'filter'=>'goods'), array('class'=>'item')); ?>
          <?php endforeach;?>
              
        </div>
        <div class="section">
          <h3 class="section_title">店铺品牌</h3>
              <?php echo $shop->brand; ?>
            <div class="clear-fix"></div>
        </div>
        <div class="section">
          <h3 class="section_title">品牌介绍</h3>
              <?php echo nl2br($shop->brand_intro); ?>
        </div>
        <div class="section">
          <h3 class="section_title"><span><a target="_blank" href="<?php echo $this->createUrl('/shop/index'); ?>">更多&gt;&gt;</a></span>推荐这家店铺的人还在逛</h3>
          <div class="relative_shop">
          <?php foreach($this->getCommendShops(4) as $index=>$data): ?>
            <div class="item" <?php if(($index+1)%2 ==0) echo 'style="margin-left: 53px;"';?>> <a target="_blank" href="<?php echo $this->createUrl('/shop/view', array('id'=>$data->id)); ?>"><img width="80" height="80" src="<?php echo $data->logo ?>" /></a><br />
              <a title="<?php echo $data->name ?>" target="_blank" class="link red" href="<?php echo $this->createUrl('/shop/view', array('id'=>$data->id)); ?>"><?php echo ModifierHelper::left($data->name,20); ?></a> </div>
          <?php endforeach; ?>
            <div class="clear-fix"></div>
          </div>
        </div>

      </div>
      <div class="shop_body box_shadow p13">
        
        <div style="margin-bottom: 15px;" class="c_tab"> <a class="c_tab_btn_current" style="margin-left: 0;" href="###">大家推荐的</a>
          <div class="twitter_display_type"> 
              <a class="type_list<?php echo !isset($_GET['display']) || $_GET['display'] == 'list' ? '_current':''; ?>" href="<?php echo $this->createUrl('/shop/view', array('id'=>$shop->id)); ?>"></a> 
              <a class="type_pic<?php echo isset($_GET['display']) && $_GET['display'] == 'pic' ? '_current':''; ?>" href="<?php echo $this->createUrl('/shop/view', array('id'=>$shop->id, 'display'=>'pic')); ?>"></a> 
          </div>
        </div>
        
        <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_share_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'emptyText'=>'<div class="no_result break-word">该店暂无推荐分享，欢迎推荐！</div>',
                        'template'=>'{items}<div class="clear-fix"></div>'.($dataProvider->pagination->pageCount > 1 ? '
	<div class="c">
		<div id="pageNav" class="bgcnt">{pager}</div>
	</div>':''),
                    ));
?>

      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	if($('a.shop-url-link').attr('href').indexOf('s.click.taobao.com') == -1){
        TOP.api({method:'taobao.taobaoke.widget.shops.convert', fields: 'user_id,shop_title,click_url', seller_nicks: '<?php echo $shop->nick ?>'}, function(resp) {
        	if($.isEmptyObject(resp)) {
            	return;
        	}
            $('a.shop-url-link').attr('href', resp.taobaoke_shops.taobaoke_shop[0].click_url);
        });
	}
    $('div.big_picture').live({'mouseenter': function(){$(this).find('.original_pic_ioc').show();}, 'mouseleave': function(){$(this).find('.original_pic_ioc').hide();}});
});
</script>
