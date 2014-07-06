<?php
$this->breadcrumbs=array(
	'首页设置',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">首页标签设置（以半角空格隔开多个标签）</th>
				</tr>
				<tr>
					<th>正在流行 :</th>
					<td><textarea name="index_tags_1" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('index_tags_1'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>热门风格 :</th>
					<td><textarea name="index_tags_2" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('index_tags_2'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>人气品牌 :</th>
					<td><textarea name="index_tags_3" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('index_tags_3'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>家居生活 :</th>
					<td><textarea name="index_tags_4" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('index_tags_4'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>流行趋势 :</th>
					<td><textarea name="index_tags_5" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('index_tags_5'); ?></textarea><span class="gray"></span></td>
				</tr>
				
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>