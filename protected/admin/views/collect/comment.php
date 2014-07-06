<?php
$this->breadcrumbs=array(
	'淘宝评论采集设置',
);?>
<form id="myform" name="myform" action="" method="post">
	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">淘宝评论采集设置</th>
				</tr>
				<tr>
					<td colspan="2" style="text-align: left; color:red">
					说明：本评论采集功能无需后台操作，在每天该商品被第一次浏览的时候将会自动开始采集新评论。
					</td>
				</tr>
				<tr>
					<th width="200">采集开关 :</th>
					<td>
					<label><input onclick="$('tr.comment').hide();" type="radio" name="comment_collect_on" value="false" <?php if(Yii::app()->config->get('comment_collect_on') =='false') echo 'checked'; ?>> 关闭</label> 
					<label><input onclick="$('tr.comment').show();" type="radio" name="comment_collect_on" value="true" <?php if(Yii::app()->config->get('comment_collect_on') =='true') echo 'checked'; ?>> 开启</label>
					
					</td>
				</tr>
				<tr class="comment"<?php if(Yii::app()->config->get('comment_collect_on') =='false') echo ' style="display:none"'; ?>>
                  <th width="120">采集页数 :</th>
                  <td>
                      <input type="text" name="comment_collect_pagecount" size="10" value="<?php echo Yii::app()->config->get('comment_collect_pagecount'); ?>" class="input-text">
                      <span class="gray">每页20条评论，输入最大页码数字</span>
                  </td>
                </tr>
				<tr class="comment"<?php if(Yii::app()->config->get('comment_collect_on') =='false') echo ' style="display:none"'; ?>>
                  <th>最短评论字数 :</th>
                  <td>
                      <input type="text" name="comment_collect_minlength" size="10" value="<?php echo Yii::app()->config->get('comment_collect_minlength'); ?>" class="input-text">
                      <span class="gray">少于该字数的评论将被忽略</span>
                  </td>
                </tr>
				<tr class="comment"<?php if(Yii::app()->config->get('comment_collect_on') =='false') echo ' style="display:none"'; ?>>
                  <th>过滤关键词 :</th>
                  <td>
                      <input type="text" name="comment_collect_filter" size="50" value="<?php echo Yii::app()->config->get('comment_collect_filter'); ?>" class="input-text">
                      <span class="gray">半角英文逗号隔开多个关键词，含有这些关键词的评论将被放弃</span>
                  </td>
                </tr>
				<tr>
					<th>自动注册马甲 :</th>
					<td>
					<label><input type="radio" name="comment_auto_register" value="1" <?php if(Yii::app()->config->get('comment_auto_register') =='1') echo 'checked'; ?>> 自动注册</label> <span class="gray">（将会自动注册100个用户作为马甲）</span><br />
					<label><input type="radio" name="comment_auto_register" value="0" <?php if(Yii::app()->config->get('comment_auto_register') =='0') echo 'checked'; ?>> 使用设定的马甲</label> <span class="gray">（<?php echo CHtml::link('点这里设置马甲', array('collect/users')); ?>）</span>
					
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