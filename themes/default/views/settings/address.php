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
      <!-- <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/sync'); ?>" class="c_sub_tab_btn"> 同步绑定 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/email'); ?>" class="c_sub_tab_btn"> 邮件提醒 </a>  -->
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/address'); ?>" class="c_sub_tab_btn_current"> 收货信息 </a> 
      </div>
      <div class="settings-page-wraper">
        <div class="settings_box">
          
         <?php $form = $this -> beginWidget('CActiveForm', array('id' => 'user-form', 'enableAjaxValidation' => true, 'clientOptions'=>array('validateOnChange'=>true)));?>
          <table id="ext_info_tab">
            <tr class="ext_info_r">
              <td class="ext_info_d1"><font style="font-size: 12px; color: red;">*</font>收货人：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'shipping_realname', array('class'=>'ext_input')); ?><?php	echo $form -> error($model, 'shipping_realname');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1"><font style="font-size: 12px; color: red;">*</font>收货地址：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'shipping_address', array('class'=>'ext_input')); ?><?php	echo $form -> error($model, 'shipping_address');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1"><font style="font-size: 12px; color: red;">*</font>收货人手机号：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'shipping_mobile', array('class'=>'ext_input')); ?><?php	echo $form -> error($model, 'shipping_mobile');?></td>
            </tr> 
            <tr class="ext_info_r">
              <td class="ext_info_d1"><font style="font-size: 12px; color: red;">*</font>邮政编码：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'shipping_postcode', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'shipping_postcode');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">QQ：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'qq', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'qq');?></td>
            </tr>
            
           
            <tr class="ext_info_r">
              <td class="ext_info_d1">MSN：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'msn', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'msn');?></td>
            </tr>
            
            <tr class="ext_info_r">
              <td class="ext_info_d1"></td>
              <td class="ext_info_d2">
              	<div id="setting_hint" style="display:none;color:#999999; float:left;"></div>
                <div id="setting_succ_hint" style="display:none;color: green; float:left;"></div></td>
            </tr>
            <tr>
              <td></td>
              <td class="ext_info_d2"><input type="submit" style="margin:0" class="button button-100" value="保存"/></td>
            </tr>
          </table>
          <?php $this -> endWidget();?>
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
