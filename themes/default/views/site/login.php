<?php
$this->pageTitle='登录';
$this->layout = 'main';

?>

<div id="wrapper">
  <div id="systemUserMsg"></div>
  <div class="container_12">
    <div class="grid_12">

      <div class="clear"></div>
     
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div id="main" class="container_12">
    <div class="grid_12">
      <div class="box_shadow p13 mt14">
        <div class="login-page">
         <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'loginForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

            <h1>登录<?php echo CHtml::encode(Yii::app()->name); ?></h1>
            <div class="dash-line"></div>
            <div class="logon_form_input_email ">
              <div class="titleBox left">账　号：</div>
              <div class="titleBox left">
                <input type="text" name="LoginForm[username]" id="username" class="logonInput" value="注册时使用的邮箱/用户名" onfocus="if(this.value=='注册时使用的邮箱/用户名')this.value=''"  />
              </div>
              <div class="clear-fix"></div>
            </div>
            <div class="logon_form_input_pass">
              <!-- <div class="passwordMask" id="passwordMask" >请输入密码</div> -->
              <div class="">
                <div class="left titleBox">密　码：</div>
                <div class="left">
                  <input type="password" name="LoginForm[password]" id="password" class=" logonInput" value="" />
                </div>
              </div>
            </div>
            <!--<div id="logon_form_input_auth" class="logon_form_input_auth">
              <div>
                <div class='titleBox left'>验证码：</div>
                <div class="left">
                  <input type="text" class='checkInput left' name="Loginform[verifyCode]" id="checkcode_apply" value="" maxlength="4"/>
                  <div class='left' > <span id="checkCodeSpan" style="cursor: pointer;float:left;" onclick="changeCheckCode();return true;" /> <img id="checkCodeImage" csrc="//css/checkCode.php?t=1338864053" style="cursor: pointer;" > </span> </div>
                  <div class='left ' style="margin-top:8px;" >&nbsp;&nbsp;&nbsp;&nbsp;看不清，<a href="#" class="red" onclick="changeCheckCode();return false;">换一张</a></div>
                  <div style='clear:both'></div>
                </div>
              </div>
            </div> -->
            <!-- ./#logon_form_input_auth -->
            <div class="clear-fix"></div>
            <div class="remember-me">
              <input type="checkbox" name="LoginForm[rememberMe]" id="savestate" value="1" checked="checked"/>
              <label for="savestate">记住我(下次自动登录)</label>
            </div>
            <div id="logon_hint_logon" class="logon_hint_logon">
            <?php echo $form->errorSummary($model); ?>
            </div>
            <input type="submit" value="登   录" class="button button-100 submitLogon" />
            <div id="forget_password" class="forget_password"> <a class='a1' href = "<?php echo $this->createUrl('/site/forgetpassword'); ?>" target='_blank'>忘记密码了?</a> </div>
           
          <?php $this->endWidget(); ?>
          <div class="user-logon-right">
            <div class="reg-desc">还没有<?php echo CHtml::encode(Yii::app()->name); ?>账号？ <a href="<?php echo $this->createUrl('/site/register'); ?>">立即注册</a></div>
            <div class="mt30 f16n"> 你还可以用以下方式直接登录：
              <div class="mt10" style="width:280px;"> 
              <a class="reg_sinaweibo" href="<?php echo $this->createUrl('connect/sinaweibologin'); ?>" target="_blank"></a> 
              <a class="reg_qq" href="<?php echo $this->createUrl('connect/qqlogin'); ?>" target="_blank"></a> 
              <a class="reg_taobao" href="<?php echo $this->createUrl('connect/taobaologin'); ?>" target="_blank"></a> 
              
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.login-page -->
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- main -->
  <div class="clear"></div>
  <div id="show_err"></div>
  <div class="clear-fix"></div>
 
</div>

