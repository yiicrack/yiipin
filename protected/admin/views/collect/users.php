<?php
$this->breadcrumbs=array(
	'用户马甲',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">输入用于采集淘宝的用户名，多个之间用半角英文逗号分隔</th>
				</tr>
				<tr>
					<th width="100">商品用户名列表 :</th>
					<td><textarea name="collect_users" rows="5" cols="50" class="input-text"><?php echo Yii::app()->config->get('collect_users'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th width="100">评论用户名列表 :</th>
					<td><textarea name="collect_comment_users" rows="5" cols="50" class="input-text"><?php echo Yii::app()->config->get('collect_comment_users'); ?></textarea><span class="gray"></span></td>
				</tr>
				
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>