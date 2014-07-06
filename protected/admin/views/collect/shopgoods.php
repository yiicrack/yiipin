<?php
$this->breadcrumbs=array(
	'淘宝店铺商品采集',
);?>
<form id="myform" name="myform" action="" method="post" onsubmit="$('#dosubmit').attr('disabled',true);$('#dosubmit').val('正在采集……');return true;">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
				<tr>
					<th colspan="2" style="text-align: left; font-weight: bold; background: #f6f6f6">设定淘宝店铺商品采集条件</th>
				</tr>
				<tr>
					<th width="150">目标好店 :</th>
					<td><?php echo CHtml::dropDownList('shop_id',null, CHtml::listData(Shop::model()->findAll(array('order'=>'id DESC')), 'id', 'name')); ?> <span class="gray">请先添加好店，再到此选择采集</span></td>
				</tr>
				<tr>
					<th style="vertical-align: top">店铺搜索页地址 :</th>
					<td><input name="shop_url" id="shop_url" size="50" class="input-text" /><br />仅支持店铺二级域名（http://myshop.taobao.com或http://myshop.tmall.com）地址，<br />一般是“查看所有宝贝页面”或者店铺分类列表页面，URL中含有search.htm的即是，<br />支持店铺分类商品列表</td>
				</tr>
				<tr>
					<th>商品分类 :</th>
					<td><?php $this->widget('backend.extensions.GoodsCategoryDropDownList', array('name'=>'category_id', 'group'=>false, 'level'=>2 ,'htmlOptions'=>array('empty'=>'自动识别分类'))); ?> <span class="gray">让系统自动分类或者归入此类</span></td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="开始采集" class="button" id="dosubmit" />
		</div>
	</div>
</form>
