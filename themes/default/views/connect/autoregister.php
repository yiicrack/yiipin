<?php 
$this->layout = 'basic';
$this->pageTitle = '新用户登录';

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
        <h3 class="f24">登录到<?php echo CHtml::encode(Yii::app()->name); ?></h3>
        <div class="left newRegFromMain mt14">
          <?php if(isset($auth)): ?>
          <div class="bind-hint">
            您的<?php echo $auth; ?>账号 - <?php echo $nickname; ?> 验证通过！<br />
            请填写您的Email来完成登录，该Email将自动和您的<?php echo $auth; ?>账号绑定，下次即可用<?php echo $auth; ?>和该Email账号登录了。<br />
            </div>
          <?php endif;?>
          <div class="clear"></div>
          <?php $form = $this -> beginWidget('CActiveForm', array('id' => 'register-form', 'enableAjaxValidation' => true, 'clientOptions'=>array('validateOnChange'=>false)));?>
           <?php echo $form->hiddenField($model, 'username'); ?>
           <?php echo $form->hiddenField($model, 'gender'); ?>
            <div class="oneline">
              <div class="inputBox left">
                <?php echo $form->textField($model, 'email', array(
                	'class' => 'input1', 
                	'onblur'=>'if($(this).val()===\'\'){$(this).val(\'电子邮箱\');};', 
                	'onfocus'=>'if($(this).val()===\'电子邮箱\'){$(this).val(\'\');};'
                ));?>
              </div>
              <?php	echo $form -> error($model, 'email', array('class'=>'hints left'));?>
              <div class="clear"></div>
            </div>
            
            <div class="clear-fix"></div>
            <div class="mt14">
              <div class='inputBox'>
                <input type="submit" value=" 完成 " id="newRegister_submit" class="regFormBtn" />
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
  </div>
</div>