<?php
$this->pageTitle='绑定第三方账号登录';
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

            <h1>绑定到<?php echo CHtml::encode(Yii::app()->name); ?></h1>
            <div class="dash-line"></div>
            <div class="bind-hint">
            您的<?php echo $auth; ?>账号 - <?php echo $nickname; ?> 验证通过！<br />
            如果您已是<?php echo Yii::app()->name ?>的用户，请输入<?php echo Yii::app()->name ?>用户名和密码绑定。<br />
            如果您尚未注册，请点击右侧的“立即注册”链接。
            </div>
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
            <div class="mt30 f16n">
            注册后将自动和您的现有<?php echo $auth; ?>账号等关联起来，下次即可用<?php echo $auth; ?>账号登录了！当然您还可以继续使用本站账号登录。
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

