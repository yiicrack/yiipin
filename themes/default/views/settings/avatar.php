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
      <a href="<?php echo $this->createUrl('/settings/avatar'); ?>" class="c_sub_tab_btn_current"> 修改头像 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/account'); ?>" class="c_sub_tab_btn"> 帐号与密码 </a> 
      <!-- <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/sync'); ?>" class="c_sub_tab_btn"> 同步绑定 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/email'); ?>" class="c_sub_tab_btn"> 邮件提醒 </a>  -->
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/address'); ?>" class="c_sub_tab_btn"> 收货信息 </a>
      </div>
      <div class="settings-page-wraper">
        <div class="settings_box">
          
        
          <table id="ext_info_tab">
            <tr class="ext_info_r" >
              
              <td class="ext_info" colspan="2">
              选一张您喜欢的照片做头像吧(建议图片尺寸不小于200*200)。支持Jpeg和静态Gif格式，大小不超过2M。
         		</td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1"><img src="<?php echo WebUser::getUcAvatarSrc(Yii::app()->user->id, 'middle');?>" width="100" /></td>
              <td class="ext_info_d2">
              <script type="text/javascript">
				function updateavatar() {
					window.location.reload();
				}
				</script>
				
              <?php echo $form; ?>
              </td>
            </tr>
            <tr class="ext_info_r">
			<td class="ext_info_d1"></td>
			<td class="ext_info_d2">
				<div style="display:none;color:#999999;" id="pass_modification"></div>
			</td>
		</tr>
          </table>
          
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
