<?php
$this->breadcrumbs=array(
	'云存储设置',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">云存储设置</th>
				</tr>
			    <tr>
					<td colspan="2" style="text-align: left; color:red">说明：目前支持又拍云存储（<a target="_blank" href="http://www.upyun.com/">http://www.upyun.com/</a>），如果本地存储空间充足，建议保留本地图片备份，这样可以提高性能，且可以防止云端数据丢失、不稳定时候可以随时关闭云存储。<br />
					<span style="font-size:14;font-weight:bold;">现有站点开启云存储，您需要手动将upload文件夹通过又拍云FTP上传到空间中，否则将无法显示已有图片。</span>
					</td>
				</tr>
				<tr>
					<th width="200">全局开关 :</th>
					<td>
					<label><input onclick="$('tr.cloud').hide();" type="radio" name="use_cloud" value="false" <?php if(Yii::app()->config->get('use_cloud') =='false') echo 'checked'; ?>> 关闭</label> 
					<label><input onclick="$('tr.cloud').show();" type="radio" name="use_cloud" value="true" <?php if(Yii::app()->config->get('use_cloud') =='true') echo 'checked'; ?>> 开启</label>
					
					</td>
				</tr>
				<tr class="cloud"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th>本地保留备份 :</th>
					<td>
					<label><input type="radio" name="cloud_config[local_backup]" value="true" <?php if(isset($cloud_config) && $cloud_config['local_backup'] =='true') echo 'checked'; ?>> 保留</label> 
					<label><input type="radio" name="cloud_config[local_backup]" value="false" <?php if(isset($cloud_config) && $cloud_config['local_backup'] =='false') echo 'checked'; ?>> 不保留</label>
					
					</td>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th width="200">又拍云操作员 :</th>
					<td><input type="text" name="cloud_config[upyun_username]" size="20" value="<?php echo isset($cloud_config['upyun_username']) ? $cloud_config['upyun_username'] : ""; ?>" class="input-text" />
					<span class="gray"></span></td>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th width="200">又拍云密码 :</th>
					<td><input type="text" name="cloud_config[upyun_password]" size="20" value="<?php echo isset($cloud_config['upyun_password']) ? $cloud_config['upyun_password'] : ""; ?>" class="input-text" />
					<span class="gray"></span></td>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th width="200">又拍云空间名称 :</th>
					<td><input type="text" name="cloud_config[upyun_bucket]" size="20" value="<?php echo isset($cloud_config['upyun_bucket']) ? $cloud_config['upyun_bucket'] : ""; ?>" class="input-text" />
					<span class="gray"> 请先到又拍云管理中心创建好空间，再回来填写</span></td>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th width="200">又拍云域名绑定 :</th>
					<td><input type="text" name="cloud_config[upyun_domain]" size="20" value="<?php echo isset($cloud_config['upyun_domain']) ? $cloud_config['upyun_domain'] : ""; ?>" class="input-text" />
					<span class="gray"> 如 yiipin.b0.upaiyun.com，不要http://和尾部/</span></td>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">后续设置-创建缩略图水印版本</th>
				</tr>
				<tr class="cloud upyun"<?php if(Yii::app()->config->get('use_cloud') =='false') echo ' style="display:none"'; ?>>
					<td colspan="2">
					<span style="color:red">首先，设置缩略图版本标志间隔符为下划线（_），然后参照下表设置以下缩略图版本：</span><br />
                    <table width="500" border="0" cellspacing="0" cellpadding="5" class="table_form">
                      <tr>
                        <th style="text-align: left">版本名称</th>
                        <th style="text-align: left">缩略方式</th>
                        <th style="text-align: left">缩略选项</th>
                        <th style="text-align: left">限定尺寸</th>
                      </tr>
                      <tr>
                        <td>40x40.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>40x40px</td>
                      </tr>
                      <tr>
                        <td>70x70.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>70x70px</td>
                      </tr>
                      <tr>
                        <td>sum.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>80x80px</td>
                      </tr>
                      <tr>
                        <td>100x100.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>100x100px</td>
                      </tr>
                      <tr>
                        <td>120x120.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>120x120px</td>
                      </tr>
                      <tr>
                        <td>160x160.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>160x160px</td>
                      </tr>
                      <tr>
                        <td>b.jpg</td>
                        <td>限定宽度，高度自适应</td>
                        <td></td>
                        <td>220px</td>
                      </tr>
                      <tr>
                        <td>310x310.jpg</td>
                        <td>限定宽度和高度</td>
                        <td>放大较小图片, 并裁剪较大图片</td>
                        <td>310x310px</td>
                      </tr>
                    </table>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>
