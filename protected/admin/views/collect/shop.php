<?php
$this->breadcrumbs=array(
	'淘宝店铺采集',
);?>
<form id="myform" name="myform" action="" method="post" onsubmit="$('#dosubmit').attr('disabled',true);$('#dosubmit').val('正在采集……');return true;">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">设定淘宝客店铺采集条件</th>
				</tr>
				<tr>
					<th>店铺分类 :</th>
					<td><?php $this->widget('backend.extensions.ShopCategoryDropDownList', array('name'=>'category_id', 'group'=>true, 'level'=>2 ,'htmlOptions'=>array('empty'=>'请选择'))); ?> <span class="gray">以下关键词采集到的店铺将归入此类</span></td>
				</tr>	
				<tr>
					<th>店铺名关键词 :</th>
					<td><input name="keyword" id="keyword" size="20" class="input-text"/> 每次一个关键词</td>
				</tr>
				<tr>
					<th>采集页数 :</th>
					<td><input type="text" name="pagecount" size="10" value="1" class="input-text"> <span class="gray">只能最多采集前100页，每页为40条</span></td>
				</tr>
				<tr>
					<th>采集条件 :</th>
					<td>
					<select name="start_credit">
					<option value="">卖家最低信用</option>
					<option value="1heart">一心</option>
					<option value="2heart">两心</option>
					<option value="3heart">三心</option>
					<option value="4heart">四心</option>
					<option value="5heart">五心</option>
					<option value="1diamond">一钻</option>
					<option value="2diamond">两钻</option>
					<option value="3diamond">三钻</option>
					<option value="4diamond">四钻</option>
					<option value="5diamond">五钻</option>
					<option value="1crown">一冠</option>
					<option value="2crown">两冠</option>
					<option value="3crown">三冠</option>
					<option value="4crown">四冠</option>
					<option value="5crown">五冠</option>
					<option value="1goldencrown">一黄冠</option>
					<option value="2goldencrown">两黄冠</option>
					<option value="3goldencrown">三黄冠</option>
					<option value="4goldencrown">四黄冠</option>
					<option value="5goldencrown">五黄冠</option>
					</select>
					<select name="end_credit">
					<option value="">卖家最高信用</option>
					<option value="1heart">一心</option>
					<option value="2heart">两心</option>
					<option value="3heart">三心</option>
					<option value="4heart">四心</option>
					<option value="5heart">五心</option>
					<option value="1diamond">一钻</option>
					<option value="2diamond">两钻</option>
					<option value="3diamond">三钻</option>
					<option value="4diamond">四钻</option>
					<option value="5diamond">五钻</option>
					<option value="1crown">一冠</option>
					<option value="2crown">两冠</option>
					<option value="3crown">三冠</option>
					<option value="4crown">四冠</option>
					<option value="5crown">五冠</option>
					<option value="1goldencrown">一黄冠</option>
					<option value="2goldencrown">两黄冠</option>
					<option value="3goldencrown">三黄冠</option>
					<option value="4goldencrown">四黄冠</option>
					<option value="5goldencrown">五黄冠</option>
					</select>
					（信用等级须同时设置，前低后高）
					
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<label><input type="checkbox" name="only_mall" value="true" /> 限定为淘宝商城店铺</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					佣金比例范围：<input type="text" name="start_commissionRate" value="" size="5" />% 至 <input type="text" name="end_commissionRate" value="" size="5" />%（起始比例须同时设置，填写数字，前小后大）
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
