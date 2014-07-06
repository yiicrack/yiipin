<?php
$this->breadcrumbs=array(
	'广告联盟',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">淘宝客（验证说明：JSSDK将会自动注册到页面上，无需手动添加）</th>
				</tr>
				<tr>
					<th width="130">淘宝网会员帐号 :</th>
					<td><input type="text" name="taobao_username" size="40" value="<?php echo Yii::app()->config->get('taobao_username'); ?>" class="input-text"><span class="gray">联盟帐号即您的淘宝用户名</span></td>
				</tr>
				<tr>
					<th>阿里妈妈/淘宝PID :</th>
					<td><input type="text" name="taobao_pid" size="40" value="<?php echo Yii::app()->config->get('taobao_pid'); ?>" class="input-text"><span class="gray">mm-12345678-00 只填写中间部份即可如：12345678，若要使用报表功能，请用淘宝PID</span></td>
				</tr>
				<tr>
					<th>App Key :</th>
					<td><input type="text" name="taobao_appkey" size="40" value="<?php echo Yii::app()->config->get('taobao_appkey'); ?>" class="input-text"><span class="gray">通过<a href="http://open.taobao.com" target="_blank">http://open.taobao.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>App Secret :</th>
					<td><input type="text" name="taobao_appsecret" size="40" value="<?php echo Yii::app()->config->get('taobao_appsecret'); ?>" class="input-text"><span class="gray">通过<a href="http://open.taobao.com" target="_blank">http://open.taobao.com</a>开发平台获取</span></td>
				</tr>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">拍拍客（注册说明：<a href="http://pop.paipai.com/bin/view/Main/cps" target="_blank">http://pop.paipai.com/bin/view/Main/cps</a>）</th>
				</tr>
				<tr>
					<th width="100">推广者ID :</th>
					<td><input type="text" name="paipai_userId" size="40" value="<?php echo Yii::app()->config->get('paipai_userId'); ?>" class="input-text"><span class="gray">通过<a href="http://etg.qq.com/" target="_blank">http://etg.qq.com/</a>注册获得</span></td>
				</tr>
				<tr>
					<th>开发者QQ号(uin) :</th>
					<td><input type="text" name="paipai_uin" size="40" value="<?php echo Yii::app()->config->get('paipai_uin'); ?>" class="input-text"><span class="gray">通过<a href="http://pop.paipai.com" target="_blank">http://pop.paipai.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>appOAuthID :</th>
					<td><input type="text" name="paipai_appOAuthID" size="40" value="<?php echo Yii::app()->config->get('paipai_appOAuthID'); ?>" class="input-text"><span class="gray">通过<a href="http://pop.paipai.com" target="_blank">http://pop.paipai.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>secretOAuthKey :</th>
					<td><input type="text" name="paipai_secretOAuthKey" size="40" value="<?php echo Yii::app()->config->get('paipai_secretOAuthKey'); ?>" class="input-text"><span class="gray">通过<a href=""http://pop.paipai.com"" target="_blank">http://pop.paipai.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>accessToken :</th>
					<td><input type="text" name="paipai_accessToken" size="40" value="<?php echo Yii::app()->config->get('paipai_accessToken'); ?>" class="input-text"><span class="gray">通过<a href="http://pop.paipai.com" target="_blank">http://pop.paipai.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">当当网</th>
				</tr>
				<tr>
					<th>当当联盟客户号 :</th>
					<td><input type="text" name="dd_ad_client" size="40" value="<?php echo Yii::app()->config->get('dd_ad_client'); ?>" class="input-text"><span class="gray">如P-307763，可在当当联盟界面右上方找到</span></td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>