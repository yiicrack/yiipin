<?php
$this->breadcrumbs=array(
	'第三方登录',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">注册设置</th>
				</tr>
				<tr>
					<th style="vertical-align: top">说明 :</th>
					<td>目前提供两种第三方登录用户注册方式，自动注册和绑定注册。<br />
					自动注册采用系统生成的用户名、用户补充输入的Email注册到UCenter，优点是步骤少，缺点是老用户用第三方登录会生成新的用户；<br />
					绑定注册需要用户输入已有的用户名密码来绑定，或者输入注册资料注册成功后绑定第三方账号，优点是注册用户质量较高，资料齐全，缺点是稍繁琐。
					</td>
				</tr>
				<tr>
					<th>注册方式 :</th>
					<td>
					<label><input type="radio" name="connect_auto_register" value="1" <?php if(Yii::app()->config->get('connect_auto_register') =='1') echo 'checked'; ?>> 自动注册</label> 
					<label><input type="radio" name="connect_auto_register" value="0" <?php if(Yii::app()->config->get('connect_auto_register') =='0') echo 'checked'; ?>> 绑定注册</label>
					</td>
				</tr>
				<tr>
					<th>用户名前缀 :</th>
					<td><input type="text" name="connect_auto_register_prefix" size="10" value="<?php echo Yii::app()->config->get('connect_auto_register_prefix'); ?>" class="input-text"><span class="gray">只能是英文字母，将和下划线、随机数字组成用户名，注意UCenter必须允许该组合用户名注册</span></td>
				</tr>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">淘宝</th>
				</tr>
				<tr>
					<th>说明 :</th>
					<td>淘宝登录无需特别设置，只需设置好淘宝客即可使用。</td>
				</tr>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">新浪微博</th>
				</tr>
				<tr>
					<th>验证META :</th>
					<td>&lt;meta property="wb:webmaster" content="<input type="text" name="sina_meta" size="17" value="<?php echo Yii::app()->config->get('sina_meta'); ?>" class="input-text"/>"/&gt;<span class="gray">通过<a href="http://open.weibo.com" target="_blank">http://open.weibo.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>App Key :</th>
					<td><input type="text" name="sina_appkey" size="40" value="<?php echo Yii::app()->config->get('sina_appkey'); ?>" class="input-text"><span class="gray">通过<a href="http://open.weibo.com" target="_blank">http://open.weibo.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>App Secret :</th>
					<td><input type="text" name="sina_appsecret" size="40" value="<?php echo Yii::app()->config->get('sina_appsecret'); ?>" class="input-text"><span class="gray"></span></td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">腾讯QQ</th>
				</tr>
				<tr>
					<th>验证META :</th>
					<td>&lt;meta property="qc:admins" content="<input type="text" name="qq_meta" size="17" value="<?php echo Yii::app()->config->get('qq_meta'); ?>" class="input-text"/>"/&gt;<span class="gray">通过<a href="http://connect.qq.com" target="_blank">http://connect.qq.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>App Key :</th>
					<td><input type="text" name="qq_appkey" size="40" value="<?php echo Yii::app()->config->get('qq_appkey'); ?>" class="input-text"><span class="gray">通过<a href="http://connect.qq.com" target="_blank">http://connect.qq.com</a>开发平台获取</span></td>
				</tr>
				<tr>
					<th>App Secret :</th>
					<td><input type="text" name="qq_appsecret" size="40" value="<?php echo Yii::app()->config->get('qq_appsecret'); ?>" class="input-text"><span class="gray"></span></td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>