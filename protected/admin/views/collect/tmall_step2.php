<?php
$this->breadcrumbs=array(
	'天猫精品商品采集',
);
Yii::app()->clientScript->registerScriptFile('http://a.tbcdn.cn/apps/top/x/sdk.js?appkey='.Yii::app()->config->get('taobao_appkey'), CClientScript::POS_HEAD);
?>

<?php 
$this->renderPartial('/site/redirect_msg', array(
    'message'=>'由于API权限限制，正在采取调用客户端API方式来转换淘客商品信息，请勿刷新或点击其他菜单，待操作完成自动跳转！',        
)); 
?>

<script type="text/javascript">
$(document).ready(function(){
	<?php if($curent_iids): ?>
    TOP.api({method:'taobao.taobaoke.widget.items.convert', track_iids:'<?php echo $curent_iids ?>' ,fields: 'num_iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume'}, function(resp) {
    	if($.isEmptyObject(resp)) {
        	return;
    	}
        if(resp.total_results > 0){
            var items = resp.taobaoke_items.taobaoke_item;
            $.post('<?php echo $this->createUrl('collect/tmall_step3'); ?>', {items: items}, function(){
                window.location.reload();
            });
        }
            
    });
    <?php else: ?>
    window.location.href = '<?php echo $this->createUrl('collect/tmall_step3'); ?>';
    <?php endif;?>
});
</script>