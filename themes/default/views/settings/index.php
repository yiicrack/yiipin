<?php 
$this->pageTitle = '个人设置';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/pcasunzip.js');
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
      <a href="<?php echo $this->createUrl('/settings/index'); ?>" class="c_sub_tab_btn_current"> 个人信息 </a> 
      <span class="separator">|</span> 
      <a href="<?php echo $this->createUrl('/settings/avatar'); ?>" class="c_sub_tab_btn"> 修改头像 </a> 
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
          
         <?php $form = $this -> beginWidget('CActiveForm', array('id' => 'user-form', 'enableAjaxValidation' => true, 'clientOptions'=>array('validateOnChange'=>true)));?>
          <table id="ext_info_tab">
            <tr class="ext_info_r" >
              <td class="ext_info_d1">注册邮箱：</td>
              <td class="ext_info_d2">
              <?php echo $form->textField($model, 'email', array('disabled'=>true, 'class'=>'ext_input')); ?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">真实姓名：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'realname', array('class'=>'ext_input')); ?><?php	echo $form -> error($model, 'realname');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">昵称：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'username', array('class'=>'ext_input')); ?><?php	echo $form -> error($model, 'username');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">性别：</td>
              <td class="ext_info_d2">
               <?php echo $form->radiobuttonlist($model, 'gender', array('女'=>'女','男'=>'男'), array('separator'=>'&nbsp;&nbsp;', 'class'=>'info_radio01'));?>
               <?php echo $form->error($model, 'gender');?>
              
                &nbsp;&nbsp;&nbsp;&nbsp; </td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">生日：</td>
              <td class="ext_info_d2"><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model, 'attribute'=>'birthdate','language'=>'zh-CN',
			'options'=>array(
              	'yearRange'=>'1960:2010',
              	'minDate'=>'js:new Date(1960,1,1)',
				'maxDate'=>'js:new Date()',
				'changeMonth'=>'js:true',
				'changeYear'=>'js:true',
			),'htmlOptions'=>array('class'=>'ext_input'))); ?>
			<?php echo $form->error($model, 'birthdate');?>
			</td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">所在地：</td>
              <td class="ext_info_d2">
              	<?php echo $form->dropdownlist($model, 'province', array()); ?>
                <span id="city">
                <?php echo $form->dropdownlist($model, 'city', array()); ?>
                <script type="text/javascript">
			    new PCAS("User_province","User_city","<?php echo $model->province ?>","<?php echo $model->city ?>");
				</script>
				<?php echo $form->error($model, 'province');?>
				<?php echo $form->error($model, 'city');?>
                </span>
                </td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">学校：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'school', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'school');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">工作单位：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'company', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'company');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">从事行业：</td>
              <td class="ext_info_d2">
              <?php echo $form->dropdownlist($model, 'career', array_combine(Yii::app()->params['careers'], Yii::app()->params['careers']), array('empty'=>'请选择你的职业')); ?>
              <?php echo $form->error($model, 'career');?>
              </td>
            </tr>
            <tr class="ext_info_r">
              <td colspan="2"><div class="askPage_breakDashedLIne"></div></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">爱好：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'hooby', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'hooby');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">新浪微博地址：</td>
              <td class="ext_info_d2"><?php echo $form->textField($model, 'weibo', array('class'=>'ext_input')); ?><?php echo $form->error($model, 'weibo');?></td>
            </tr>
            <tr class="ext_info_r">
              <td class="ext_info_d1">美丽宣言：</td>
              <td class="ext_info_d2"><?php echo $form->textArea($model, 'signature', array('class'=>'ext_input', 'style'=>'height:100px;width:300px;overflow:auto;')); ?>
              <?php echo $form->error($model, 'signature');?>
              </td>
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
