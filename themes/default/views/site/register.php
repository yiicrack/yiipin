<?php 
$this->layout = 'basic';
$this->pageTitle = '新用户注册';

if(isset(Yii::app()->session['qq_user_info']))
{
    $auth = 'QQ';
    $nickname = Yii::app()->session['qq_user_info']['nickname'];
}
elseif((isset(Yii::app()->session['weibo_user_info'])))
{
    $auth = '新浪微博';
    $nickname = Yii::app()->session['weibo_user_info']['screen_name'];
}

?>

<div id="wrapper">
  <div class="new_header" style="height:50px;">
    <div class="header_top" style="padding-left:0px;">
      <h1><a class="logo_new" style=" margin-left:0; " href="<?php echo Yii::app()->baseUrl ?>/"></a><span class="none"><?php echo Yii::app()->name ?></span></h1>
    </div>
    <div class="clear"></div>
  </div>
  <div id="main" class="container_12">
    <div class="box_shadow p13 mt14 mb14">
      <div id="RegForm" class="register-page-wrapper" style="padding-left: 100px;">
        <h3 class="f24">注册<?php echo CHtml::encode(Yii::app()->name); ?></h3>
        <div class="left newRegFromMain mt14">
          <?php if(isset($auth)): ?>
          <div class="bind-hint">
            您的<?php echo $auth; ?>账号 - <?php echo $nickname; ?> 验证通过！<br />
            如果您没有<?php echo Yii::app()->name ?>账号，请填写下方表单来注册，完成后将自动和您的<?php echo $auth; ?>账号绑定，下次即可用<?php echo $auth; ?>账号登录了。<br />
            </div>
          <?php endif;?>
          <div class="clear"></div>
          <?php $form = $this -> beginWidget('CActiveForm', array('id' => 'register-form', 'enableAjaxValidation' => true, 'clientOptions'=>array('validateOnChange'=>false)));?>
            <div class="oneline">
              <div class="inputBox left">
                <?php echo $form -> textField($model, 'email', array(
                	'class' => 'input1', 
                	'onblur'=>'if($(this).val()===\'\'){$(this).val(\'电子邮箱\');};', 
                	'onfocus'=>'if($(this).val()===\'电子邮箱\'){$(this).val(\'\');};'
                ));?>
              </div>
              <?php	echo $form -> error($model, 'email', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            <div class="oneline mt14">
              <div class="inputBox left">
                <?php echo $form -> textField($model, 'username', array(
                	'class' => 'input1', 
                	'onblur'=>'if($(this).val()===\'\'){$(this).val(\'用户名\');};', 
                	'onfocus'=>'if($(this).val()===\'用户名\'){$(this).val(\'\');};',
                    'autocomplete'=>'off',
                ));?>
              </div>
              <?php	echo $form -> error($model, 'username', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            <div class="oneline mt14">
            	<div class="inputBox left" id="showpassword" style="display:none;">
            	<?php echo $form -> passwordField($model, 'password', array(
                	'class' => 'input1', 
                	'onblur'=>'if($(this).val()===\'\'){$(\'#showpassword\').hide();$(\'#hidepassword\').show();}', 
                	'onfocus'=>''
                ));?>
              </div>
              <div class="inputBox left" id="hidepassword">
                <input type="text" class='input1' name="password" value="密码"
					onfocus="$('#hidepassword').hide();$('#showpassword').show().find('input').focus();"/>
              </div>
              
              <?php	echo $form -> error($model, 'password', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            <div id="rePwdRow" class="oneline mt14">
              <div class="inputBox left"  id="showconfirm_password" style="display:none;">
                <?php echo $form -> passwordField($model, 'repassword', array(
                	'class' => 'input1', 
                	'onblur'=>'if($(this).val()===\'\'){$(\'#showconfirm_password\').hide();$(\'#hideconfirm_password\').show();}', 
                	'onfocus'=>''
                ));?>
              </div>
              <div class="inputBox left"  id="hideconfirm_password">
                <input type="text" class='input1' name="confirm_password" id="hideconfirm_password" value="确认密码"
					onfocus="$('#hideconfirm_password').hide();$('#showconfirm_password').show().find('input').focus();"/>
              </div>
              <?php	echo $form -> error($model, 'repassword', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            <div class="oneline">
              <div class="inputBox left hackBox" id="gender-wrapper">
                <?php echo $form->radiobuttonlist($model, 'gender', array('女'=>'女','男'=>'男'), array('separator'=>'&nbsp;&nbsp;'));?>
              </div>
              <?php	echo $form -> error($model, 'gender', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            <div id="checkcode" class="oneline">
              <div class="inputBox left">
                <?php echo $form -> textField($model, 'verifyCode', array(
                	'class' => 'input2', 
                	'onblur'=>'if($(this).val()===\'\'){$(this).val(\'验证码\');};', 
                	'onfocus'=>'if($(this).val()===\'验证码\'){$(this).val(\'\');};'
                ));?>
              </div>
              <div class="left"> <span id="checkCodeSpan" class="cursor left"> <?php	$this -> widget('system.web.widgets.captcha.CCaptcha', array('buttonLabel' => '看不清换一个', 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer', 'align' => 'absmiddle')));?></span> </div>
              <?php	echo $form -> error($model, 'verifyCode', array('class'=>'hints left', 'style'=>'margin-left:10px;'));?>
              <div class="clear"></div>
            </div>
            <div class="clear-fix"></div>
            <div class="mt14">
              <div class='inputBox'>
                <input type="submit" value="立即注册" id="newRegister_submit" class="regFormBtn" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="oneline mt10">
              <div class="inputBox left" style='border:0px;'>
                <input type="checkbox" id="agreement" checked="checked" onClick="clickAgreement();">
                </input>
                同意<a href="<?php echo $this->createUrl('site/page', array('view'=>'item')); ?>" target='_blank'><?php echo CHtml::encode(Yii::app()->name); ?>注册条款</a> </div>
              <div class="clear"></div>
            </div>
            <input type="hidden" name="invite_code" id="invite_code" value="aa74158f1933b65e23e61bf99d8157f5"/>
          <?php $this -> endWidget();?>
        </div>
        <div class="left newRegFromRight mt30">
          <h4 class="f16">用<?php echo CHtml::encode(Yii::app()->name); ?>账号<a class="red" href="<?php echo $this->createUrl('/site/login'); ?>">登录</a></h4>
          <div class="mt30 f16n"> 你还可以用以下方式直接登录：
            <div class="mt10" style="width:280px;"> 
            <a class="reg_sinaweibo" href="<?php echo $this->createUrl('connect/sinaweibologin'); ?>" target="_blank"></a> 
            <a class="reg_qq" href="<?php echo $this->createUrl('connect/qqlogin'); ?>" target="_blank"></a> 
            <a class="reg_taobao" href="<?php echo $this->createUrl('connect/taobaologin'); ?>" target="_blank"></a> 
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- 弹窗 -->
    <div id="is_fale" class ="fale_box" >
      <p class="wording"><?php echo CHtml::encode(Yii::app()->name); ?>里都是MM们喜欢的漂亮衣服、可爱东东,不适合你,<br />
        但很适合你身边的漂亮MM哦~~<br />
        把<?php echo Yii::app()->name ?>告诉她们,你的魅力会大大加分!你也可以申请特<br />
        别加入哦～～<br />
      </p>
      <div class="medal"></div>
      <a class="go_weibo_word red f16" href="javascript:void(0)" onclick="tuanObj.shareToWeibo();return false;">领取男生特别准入许可勋章,并转发到微博>></a> </div>
    <script type="text/javascript">
//	$(function(){
//		tuanObj.shareContent = '<?php echo CHtml::encode(Yii::app()->name); ?>不让男的玩儿啊！！只能转给周围的女生们了，进去逛吧，喜欢啥哥给你们买！';
//		tuanObj.shareUrl = '/welcome?frm=man';
//		tuanObj.shareImage = '/css/images/medal/icons/xyns.png';
//	});
</script>
  </div>
</div>