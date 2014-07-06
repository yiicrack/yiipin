<?php 
$this->pageTitle = '个人设置';
?>

<div id="wrapper">
<div class="clear"></div>
<div id="main" class="container_12" >
  <div class="grid_12">
    <div class="box_shadow mt14 p13">
      <div class="hp_tab">
        <ul class="hp_lt">
          <li class="active red"><a href="<?php echo $this->createUrl('/settings/index'); ?>">个人设置</a></li>

        </ul>
      </div>
      <div class="c_sub_tab" style="margin: 28px 0px 0px 30px;"> 
      <a href="<?php echo $this->createUrl('/settings/index'); ?>" class="c_sub_tab_btn"> 个人信息 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/avatar'); ?>" class="c_sub_tab_btn"> 修改头像 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/account'); ?>" class="c_sub_tab_btn"> 帐号与密码 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/sync'); ?>" class="c_sub_tab_btn_current"> 同步绑定 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/email'); ?>" class="c_sub_tab_btn"> 邮件提醒 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/address'); ?>" class="c_sub_tab_btn"> 收货信息 </a> 
      </div>
      <div class="settings-page-wraper">
        <div class="sync_box">
	<h2 class="mt10 f18 mb14">绑定同步消息</h2>
	<p>把你在<?php echo Yii::app()->name ?>的动向，轻松同步到新浪微博和Qzone，让那里的朋友也能同步分享你的美丽生活！</p>

	<div id="bind">
		<h3 class="f14 mb14">同步到：</h3>
		<div class="sina_left">
			<a class="logo logo_weibo" ></a>
							<div class="follow-mls-wrapp" style="postion:absolute;"><input type="checkbox" name="follow-mls" id="follow-mls" />关注<?php echo Yii::app()->name ?>官方微博 </div>
				<input class="bindsinarenren" type="button" value=""  onclick="return syncBind('weibo');"/>
					</div>
		<div class="qzone_right">
			<a class="logo logo_qzone" ></a>
							<input class="bindsinarenren" type="button" value=""  onclick="return syncBind('qzone');"/>
					</div>
	</div>
</div>
<div style="clear:both"></div>
</div>
<div id="setting_panel" style="display: block;">
	<div class="main mt10">
		<div class="f14 mb14">设置同步</div>
		<form id="syncForm" method="post" action="http://www.meilishuo.com/settings/ajax_syncAction">
			<div class="option">
				<span for="chk_goods">同步消息到：</span>
				<input type="checkbox" id="chk_goods" name="sina_sync_goods" value="1"
								disabled
								/>
				<label for="chk_goods" class="f12">新浪微博</label>
				<input type="checkbox" id="chk_goods_1" name="qzone_sync_goods" value="1" 
								disabled
				 
				/>
				<label for="chk_goods_1" class="f12">Qzone</label>
			</div>
			<div class="option mt10">
				<span>同步消息到Q+：</span>
				<input type="checkbox" id="qplusShare" name="qplusShare" value="1" 
								disabled
								/>
				<label class="f12">分享宝贝</label>
				<input type="checkbox" id="qplusCollect" name="qplusCollect" value="1"
								disabled
								/>
				<label class="f12">收集宝贝</label>
				<input type="checkbox" id="qplusLike" name="qplusLike" value="1"
								disabled
								/>
				<label class="f12">喜欢宝贝</label>
				<input type="checkbox" id="qplusCreate" name="qplusCreate" value="1"
								disabled
								/>
				<label class="f12">创建杂志</label>
				<input type="checkbox" id="qplusFollow" name="qplusFollow" value="1"
								disabled
								/>
				<label class="f12">关注杂志</label>
			</div>
			<div class="mt20">
				<input type="submit" style="margin:0" class="button button-100" value="保存"/>
			</div>
		</form>
	</div>
</div>
        <div style="clear:both"></div>
      </div>
      
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- main -->
<div class="clear"></div>
<div id="show_err"></div>
