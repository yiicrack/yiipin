<?php
$this->breadcrumbs=array(
	'网站设置',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">全局设置</th>
				</tr>
				<tr>
					<th>站点开关 :</th>
					<td>
					<label><input type="radio" name="site_off" value="0" <?php if(Yii::app()->config->get('site_off') =='0') echo 'checked'; ?>> 开启</label> 
					<label><input type="radio" name="site_off" value="1" <?php if(Yii::app()->config->get('site_off') =='1') echo 'checked'; ?>> 关闭</label>
					
					</td>
				</tr>
				<tr>
					<th width="200">网站名称 :</th>
					<td><input type="text" name="sitename" size="40" value="<?php echo Yii::app()->config->get('sitename'); ?>" class="input-text"><span class="gray"></span></td>
				</tr>
				<tr>
					<th>首页标题 :</th>
					<td><input type="text" name="title" size="80" value="<?php echo Yii::app()->config->get('title'); ?>" class="input-text"><span class="gray">很重要，精心编写</span></td>
				</tr>
				<tr>
					<th>SEO关键词 :</th>
					<td><input type="text" name="keywords" size="80" value="<?php echo Yii::app()->config->get('keywords'); ?>" class="input-text"><span class="gray">关键词之间用半角英文逗号分隔</span></td>
				</tr>
				<tr>
					<th>SEO描述 :</th>
					<td><textarea name="description" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('description'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>ICP备案号 :</th>
					<td><input type="text" name="icp_beian" size="40" value="<?php echo Yii::app()->config->get('icp_beian'); ?>" class="input-text"></td>
				</tr>
				<tr>
					<th>网管邮箱 :</th>
					<td><input type="text" name="webmaster_email" size="40" value="<?php echo Yii::app()->config->get('webmaster_email'); ?>" class="input-text"></td>
				</tr>
				<tr>
					<th>统计代码 :</th>
					<td><textarea name="stats_code" cols="80" rows="3" class="input-text"><?php echo Yii::app()->config->get('stats_code'); ?></textarea><span class="gray"></span></td>
				</tr>
				<tr>
					<th>客服QQ :</th>
					<td><input type="text" name="custom_service_qq" size="40" value="<?php echo Yii::app()->config->get('custom_service_qq'); ?>" class="input-text"><span class="gray">暂用于试用频道</span></td>
				</tr>
				<tr>
					<th>客服电话 :</th>
					<td><input type="text" name="custom_service_phone" size="40" value="<?php echo Yii::app()->config->get('custom_service_phone'); ?>" class="input-text"><span class="gray">暂用于试用频道</span></td>
				</tr>
				<tr>
					<th>客服工作时间 :</th>
					<td><input type="text" name="custom_service_time" size="40" value="<?php echo Yii::app()->config->get('custom_service_time'); ?>" class="input-text"><span class="gray">暂用于试用频道</span></td>
				</tr>
				
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">页面设置</th>
				</tr>
				<tr>
					<th>首页分类标签数 :</th>
					<td><input type="text" name="index_tag_count" size="10" value="<?php echo Yii::app()->config->get('index_tag_count'); ?>" class="input-text"><span class="gray">请填写数字，为4的倍数，修改后清除缓存生效</span></td>
				</tr>
				<tr>
					<th>首页底部瀑布流 :</th>
					<td>
					<label><input type="radio" name="index_fluid" value="1" <?php if(Yii::app()->config->get('index_fluid') =='1') echo 'checked'; ?>> 显示</label> 
					<label><input type="radio" name="index_fluid" value="0" <?php if(Yii::app()->config->get('index_fluid') =='0') echo 'checked'; ?>> 关闭</label>
					
					</td>
				</tr>
				<tr>
					<th>商品页底部瀑布流 :</th>
					<td>
					<label><input type="radio" name="share_view_fluid" value="1" <?php if(Yii::app()->config->get('share_view_fluid') =='1') echo 'checked'; ?>> 显示</label> 
					<label><input type="radio" name="share_view_fluid" value="0" <?php if(Yii::app()->config->get('share_view_fluid') =='0') echo 'checked'; ?>> 关闭</label>
					
					</td>
				</tr>
				<tr>
					<th>瀑布流总项目数 :</th>
					<td><input type="text" name="masonry_pagesize" size="10" value="<?php echo Yii::app()->config->get('masonry_pagesize'); ?>" class="input-text"><span class="gray">请填写数字，必须为下一项“瀑布流单次加载数”的N倍，否则功能将失常</span></td>
				</tr>
				<tr>
					<th>瀑布流单次加载数 :</th>
					<td><input type="text" name="masonry_framesize" size="10" value="<?php echo Yii::app()->config->get('masonry_framesize'); ?>" class="input-text"><span class="gray">请填写数字，必须为上一项“瀑布流总项目数”的N分之一，否则功能将失常</span></td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">服务器优化（修改此节后将需要重新登录）</th>
				</tr>
				<tr>
					<th>重要提示 :</th>
					<td>
					<span class="gray">独立主机、VPS等强烈建议安装memcached缓存服务器程序；若您的站点新开，访问量很小，可以设置为一天的时间（86400），若有一定访问量，可设置为1小时（3600）,每当在后台采集了新的商品、修改了设置后，请手动点击右上角的“清除缓存”按钮。</span>
					</td>
				</tr>
				<?php 
				    $cache_backend = Yii::app()->config->get('cache_backend'); 
				    $memcache = Yii::app()->config->get('memcache'); 
				?>
				<tr>
					<th>缓存类型 :</th>
					<td>
					    <label><input onclick="$('.memcached').hide()" type="radio" name="cache_backend" value="file" <?php if($cache_backend =='file') echo 'checked'; ?>> 文件缓存</label>
					    <label><input onclick="$('.memcached').show()" type="radio" name="cache_backend" value="memcached" <?php if($cache_backend =='memcached') echo 'checked'; ?>> Memcached 缓存</label> <a href="http://www.yiipin.com/thread-359-1-1.html" style="text-decoration: underline;color:blue;" target="_blank">Memcached缓存配置指南</a>
					</td>
				</tr>
				<tr class="memcached" <?php if($cache_backend =='file') echo 'style="display:none"'; ?>>
					<th>Memcached 主机 :</th>
					<td><input type="text" name="memcache[server]" size="20" value="<?php if(isset($memcache['server'])) echo $memcache['server']; ?>" class="input-text"><span class="gray">如localhost</span></td>
				</tr>
				<tr class="memcached" <?php if($cache_backend =='file') echo 'style="display:none"'; ?>>
					<th>Memcached 端口 :</th>
					<td><input type="text" name="memcache[port]" size="20" value="<?php if(isset($memcache['port'])) echo $memcache['port']; ?>" class="input-text"><span class="gray">如11211</span></td>
				</tr>
				<tr>
					<th>页面缓存时间 :</th>
					<td><input type="text" name="cache_duration" size="10" value="<?php echo Yii::app()->config->get('cache_duration'); ?>" class="input-text"><span class="gray">请填写数字，单位为秒</span></td>
				</tr>
				
				<tr>
					<th>URL重写 :</th>
					<td>
					    <label><input type="radio" name="url_format" value="rewrite" <?php if(Yii::app()->config->get('url_format') =='rewrite') echo 'checked'; ?>> 干净URL，隐藏php扩展名，需要服务器开启rewrite模块（如 http://domain.com/site/index）</label><br />
					    <label><input type="radio" name="url_format" value="pathinfo" <?php if(Yii::app()->config->get('url_format') =='pathinfo') echo 'checked'; ?>> PATHINFO模式，Apache、IIS服务器原生支持&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration: underline;color:blue;" href="http://www.yiipin.com/thread-177-1-1.html" target="_blank">Nginx配置重写、PATHINFO参考</a>（如 http://domain.com/index.php/site/index）</label>
					</td>
				</tr>
				<tr>
					<th>URL后缀 :</th>
					<td>
					<input type="text" name="url_suffix" size="10" value="<?php echo Yii::app()->config->get('url_suffix'); ?>" class="input-text"><span class="gray">如“.html”，注意要以英文点开头</span>
					</td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">用户注册设置</th>
				</tr>
				<tr>
					<th>邮件验证 :</th>
					<td>
					<label><input type="radio" name="email_verify" value="1" <?php if(Yii::app()->config->get('email_verify') =='1') echo 'checked'; ?>> 新用户需要通过电子邮件激活才可登录（请配置下面的邮件发送设置）</label><br />
					<label><input type="radio" name="email_verify" value="0" <?php if(Yii::app()->config->get('email_verify') =='0') echo 'checked'; ?>> 新用户直接激活，不需要邮件验证</label>
					
					</td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">邮件发送设置（修改此节后将需要重新登录）<a href="http://exmail.qq.com" target="_blank" style="text-decoration: underline;color:blue;" >没有邮局？推荐注册腾讯免费企业邮箱</a></th>
				</tr>
				<tr>
					<th>发件人邮件 :</th>
					<td><input type="text" name="mail_from" size="40" value="<?php echo Yii::app()->config->get('mail_from'); ?>" class="input-text"><span class="gray">如 webmaster@yiipin.com</span></td>
				</tr>
				<tr>
					<th>发件人名称 :</th>
					<td><input type="text" name="mail_fromname" size="20" value="<?php echo Yii::app()->config->get('mail_fromname'); ?>" class="input-text"><span class="gray">如 yiipin</span></td>
				</tr>
				<tr>
					<th>SMTP主机 :</th>
					<td><input type="text" name="mail_smtp_host" size="20" value="<?php echo Yii::app()->config->get('mail_smtp_host'); ?>" class="input-text"><span class="gray">如 smtp.qq.com</span></td>
				</tr>
				<tr>
					<th>SMTP端口 :</th>
					<td><input type="text" name="mail_smtp_port" size="20" value="<?php echo Yii::app()->config->get('mail_smtp_port'); ?>" class="input-text"><span class="gray">一般为默认25</span></td>
				</tr>
				<tr>
					<th>SMTP用户名 :</th>
					<td><input type="text" name="mail_smtp_user" size="20" value="<?php echo Yii::app()->config->get('mail_smtp_user'); ?>" class="input-text"><span class="gray">如果是企业邮箱，一般和邮箱地址相同，即带域名后缀</span></td>
				</tr>
				<tr>
					<th>SMTP密码 :</th>
					<td><input type="text" name="mail_smtp_pwd" size="20" value="<?php echo Yii::app()->config->get('mail_smtp_pwd'); ?>" class="input-text"></td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>