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
      <a href="<?php echo $this->createUrl('/settings/sync'); ?>" class="c_sub_tab_btn"> 同步绑定 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/email'); ?>" class="c_sub_tab_btn_current"> 邮件提醒 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/address'); ?>" class="c_sub_tab_btn"> 收货信息 </a> 
      </div>
      
<div id="settingemail">
<table><tbody>
	<tr><td colspan="3" class="settingEmailHeader1" style="padding-top:20px;font-size:13px;">下列情况时，发送邮件通知我</td></tr>
   	<tr><td class="settingEmailCheckBox" style="font-size:12;">
   		   			<input id="newfocus" type="checkbox" name="newfocus" value="0"/>
   		   	有人关注了我</td></tr>
  	<tr><td class="settingEmailCheckBox">
  		  			<input  id="newmessage" type="checkbox" name="newmessage" value="1" checked/>
  		  	有人私信了我</td></tr>
  	<tr><td class="settingEmailCheckBox">
  		  			<input id="like_sharegoods" type="checkbox" name="like_sharegoods" value="0"/>
  		  	有人喜欢了我分享的宝贝</td></tr>
  	<tr><td class="settingEmailCheckBox">
  		  			<input id="reply_sharegoods" type="checkbox" name="reply_sharegoods" value="0" />
  		  	有人回复了我分享的宝贝</td></tr>
  	
   	<tr><td style="padding-top:20px;"><input type="submit" style="margin:0" class="button button-100" value="保存"/></td></tr>
   	<tr><td><div id="settingEmailHint"></div></td><td></td><td></td></tr>
</tbody></table>     
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
