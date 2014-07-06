<?php
$this->breadcrumbs=array(
	'天猫精品库采集',
);?>

<form id="myform" name="myform" action="" method="post" onsubmit="$('#dosubmit').attr('disabled',true);$('#dosubmit').val('正在采集……');return true;">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">设定天猫精品库商品采集条件<span style="color:Red">（提示：采集前请先注册和设置用户马甲）</span></th>
				</tr>
				<tr>
					<th width="100" style="vertical-align: top">说明 :</th>
					<td>“天猫精品库”是什么？天猫精品库是淘宝开放平台为导购类合作伙伴提供的选品服务，包括：类目精选商品、品牌特卖商品等。<br />使用天猫精品库API，可以：<br />
1、降低选品成本<br />
2、提升导购收入。<br />
除了淘宝客佣金外，还可获得天猫额外补贴，即使商品没有淘宝客佣金，至少可以获得天猫全站补贴。<br />天猫精选商品列表，同一天之内，同一个appkey请求同一个分类得到的商品列表是固定的，所以每天每个分类只需采集一次即可</td>
				</tr>	
				<tr>
					<th>商品分类 :</th>
					<td><?php $this->widget('backend.extensions.GoodsCategoryDropDownList', array('name'=>'category_id', 'group'=>false, 'level'=>2 ,'htmlOptions'=>array('empty'=>'自动匹配分类'), 'value'=>(isset($config)?$config['category_id']:''))); ?> <span class="gray">以下关键词采集到的商品将归入此类</span></td>
				</tr>	
				<tr>
					<th>淘宝分类 :</th>
					<td>
					<?php echo CHtml::dropDownList('cid', (isset($config)?$config['cid']:''), $parent_cates, array('empty'=>'不限', 'ajax'=>array('type'=>'get', 'url'=>$this->createUrl('getSubCates'), 'update'=>'#sub_cid', 'data'=>'js:{cid: $("#cid").val()}')));?>
					<?php echo CHtml::dropDownList('sub_cid', (isset($config)?$config['sub_cid']:''), (isset($config)?$this->getSubCates($config['cid']):array()), array('empty'=>'不限'));?>
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