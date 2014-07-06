<?php
$this->breadcrumbs=array(
	'淘宝商品采集',
);?>
<form id="myform" name="myform" action="" method="post" onsubmit="$('#dosubmit').attr('disabled',true);$('#dosubmit').val('正在采集……');return true;">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">设定淘宝客商品采集条件<span style="color:Red">（提示：采集前请先注册和设置用户马甲）</span></th>
				</tr>
				<tr>
					<th>商品分类 :</th>
					<td><?php $this->widget('backend.extensions.GoodsCategoryDropDownList', array('name'=>'category_id', 'group'=>false, 'level'=>2 ,'htmlOptions'=>array('empty'=>'请选择'), 'value'=>(isset($config)?$config['category_id']:''))); ?> <span class="gray">以下关键词采集到的商品将归入此类</span></td>
				</tr>	
				<tr>
					<th>淘宝分类 :</th>
					<td>
					<?php echo CHtml::dropDownList('cid', (isset($config)?$config['cid']:''), $parent_cates, array('empty'=>'不限', 'ajax'=>array('type'=>'get', 'url'=>$this->createUrl('getSubCates'), 'update'=>'#sub_cid', 'data'=>'js:{cid: $("#cid").val()}')));?>
					<?php echo CHtml::dropDownList('sub_cid', (isset($config)?$config['sub_cid']:''), (isset($config)?$this->getSubCates($config['cid']):array()), array('empty'=>'不限'));?>
					</td>
				</tr>	
				<tr>
					<th>采集关键词 :</th>
					<td><textarea name="keywords" id="keywords" cols="80" rows="5" class="input-text"><?php echo (isset($config)?$config['keywords']:''); ?></textarea> <span class="gray">多个关键词用空格隔开，将依次采集</span></td>
				</tr>
				<tr>
					<th>排除关键词 :</th>
					<td><input name="exclude_keywords" id="exclude_keywords" size="60" type="text" class="input-text" value="<?php echo (isset($config)?$config['exclude_keywords']:''); ?>"/> <span class="gray">多个关键词用空格隔开，含有这些关键词的商品将被放弃</span></td>
				</tr>
				<tr>
					<th>采集页数 :</th>
					<td><input type="text" name="config[page_no]" size="10" value="<?php echo (isset($config)?$config['config']['page_no']:'10'); ?>" class="input-text"> <span class="gray">只能最多采集前10页，每页最多40条</span></td>
				</tr>
				<tr>
					<th>每页数量 :</th>
					<td><input type="text" name="config[page_size]" size="10" value="<?php echo (isset($config)?$config['config']['page_size']:'10'); ?>" class="input-text"> <span class="gray">每页最多40条，若您的服务器PHP超时较短，请将此值设置小一点</span></td>
				</tr>
				<tr>
					<th>采集条件 :</th>
					<td>
					<?php $credits=array(
					        "1heart"=>"一心",
					        "2heart"=>"两心",
					        "3heart"=>"三心",
					        "4heart"=>"四心",
					        "5heart"=>"五心",
					        "1diamond"=>"一钻",
					        "2diamond"=>"两钻",
					        "3diamond"=>"三钻",
					        "4diamond"=>"四钻",
					        "5diamond"=>"五钻",
					        "1crown"=>"一冠",
					        "2crown"=>"两冠",
					        "3crown"=>"三冠",
					        "4crown"=>"四冠",
					        "5crown"=>"五冠",
					        "1goldencrown"=>"一黄冠",
					        "2goldencrown"=>"两黄冠",
					        "3goldencrown"=>"三黄冠",
					        "4goldencrown"=>"四黄冠",
					        "5goldencrown"=>"五黄冠",
				        );?>
				        <?php echo CHtml::dropDownList('config[start_credit]', (isset($config)?$config['config']['start_credit']:''), $credits, array('empty'=>'卖家最低信用'));?>
				        <?php echo CHtml::dropDownList('config[end_credit]', (isset($config)?$config['config']['end_credit']:''), $credits, array('empty'=>'卖家最高信用'));?>
					
					（信用等级须同时设置，前低后高）
					
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<label><input type="checkbox" name="config[guarantee]" value="true" <?php if(isset($config) && isset($config['config']['guarantee']) && $config['config']['guarantee']=='true') echo 'checked="checked"'; ?>/> 仅查询消保卖家</label>
					<label><input type="checkbox" name="config[real_describe]" value="true" <?php if(isset($config) && isset($config['config']['real_describe']) && $config['config']['real_describe']=='true') echo 'checked="checked"'; ?>/> 如实描述商品</label>
					<label><input type="checkbox" name="config[mall_item]" value="true" <?php if(isset($config) && isset($config['config']['mall_item']) && $config['config']['mall_item']=='true') echo 'checked="checked"'; ?>/> 限定为淘宝商城商品</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					价格范围：<input type="text" name="config[start_price]" value="<?php echo (isset($config)?$config['config']['start_price']:''); ?>" size="5" /> 至 <input type="text" name="config[end_price]" value="<?php echo (isset($config)?$config['config']['end_price']:''); ?>" size="5" />元（起始价须同时设置，填写数字，前小后大）
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					佣金比例范围：<input type="text" name="config[start_commissionRate]" value="<?php echo (isset($config)?$config['config']['start_commissionRate']:''); ?>" size="5" />% 至 <input type="text" name="config[end_commissionRate]" value="<?php echo (isset($config)?$config['config']['end_commissionRate']:''); ?>" size="5" />%（起始比例须同时设置，填写数字，前小后大）
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					商品总成交量范围：<input type="text" name="config[start_totalnum]" value="<?php echo (isset($config)?$config['config']['start_totalnum']:''); ?>" size="5" /> 至 <input type="text" name="config[end_totalnum]" value="<?php echo (isset($config)?$config['config']['end_totalnum']:''); ?>" size="5" />（起始比例须同时设置，填写数字，前小后大）
					</td>
				</tr>
				<tr>
					<th>排序设置</th>
					<td>
					<?php $sorts = array(
					        "default"=>"默认排序",
					        "price_desc"=>"价格从高到低",
					        "price_asc"=>"价格从低到高",
					        "credit_desc"=>"信用等级从高到低",
					        "commissionRate_desc"=>"佣金比率从高到低",
					        "commissionRate_asc"=>"佣金比率从低到高",
					        "commissionNum_desc"=>"成交量成高到低",
					        "commissionNum_asc"=>"成交量从低到高",
					        "commissionVolume_desc"=>"总支出佣金从高到低",
					        "commissionVolume_asc"=>"总支出佣金从低到高",
					        "delistTime_desc"=>"商品下架时间从高到低",
					        "delistTime_asc"=>"商品下架时间从低到高",
				        );?>
					<?php echo CHtml::dropDownList('config[sort]', (isset($config)?$config['config']['sort']:''), $sorts);?>
					</td>
				</tr>

			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="开始采集" class="button" id="dosubmit"/>
		</div>
	</div>
</form>
<script type="text/javascript">
$('#category_id').change(function(){
	var category_id = $(this).val();
	if(category_id > 0){
	    $.get('<?php echo $this->createUrl('collect/gettags'); ?>', {category_id: category_id}, function(result){
	    	$('#keywords').val(result);
		});
	}
});

</script>
