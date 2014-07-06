<?php $this->layout='none'; ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name ?> 管理中心</title>
<link href="<?php echo Yii::app()->baseUrl ?>/admin/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
if (self != top)
{
    top.location = self.location;
}
$(function(){
    $('#LoginForm_username').focus();
});
</script>
</head>
<body scroll="no" class="login_body">
  <table class="login_table">
  	<tbody>
    <tr>
      <td class="logo">
      	<h1>管理中心</h1>
      </td>
      <td class="loginform">
      	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>false,
		)); ?>
        <table>
          <tr>
          	<th>用户名：</th>
            <td><?php echo $form->textField($model,'username', array('class'=>'text','tabindex'=>1)); ?><?php echo $form->error($model,'username', array('id'=>'username')); ?></td>
          </tr>
          <tr>
          	<th>密　码：</th>
            <td><?php echo $form->passwordField($model,'password', array('class'=>'text','tabindex'=>2)); ?> <?php echo $form->error($model,'password'); ?></td>
          </tr>
          <tr>
          	<th>验证码：</th>
            <td><?php echo $form->passwordField($model,'verifyCode', array('class'=>'text','tabindex'=>3, 'style'=>'width:50px')); ?><?php	$this -> widget('system.web.widgets.captcha.CCaptcha', array('buttonLabel' => false, 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer', 'align' => 'absmiddle')));?><?php echo $form->error($model,'verifyCode'); ?></td>
          </tr>
          <tr>
          	<th></th>
            <td><input type="submit" name="dosubmit" value=" " class="login_btn" /></td>
          </tr>
        </table>
      	<?php $this->endWidget(); ?>
      </td>
    </tr>
    </tbody>
  </table>
</body>

</html>