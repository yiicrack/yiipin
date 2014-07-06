<?php
$this->pageTitle = '重设密码';
$this->layout = 'main';
Yii::app()->clientScript->registerScript('auto-focus', 
        '$("#ResetPasswordForm_newpassword").focus();');
?>
<div id="wrapper">
	<div class="clear"></div>
	<div id="main" class="container_12">

		<div class="grid_12">
			<div class="box_shadow mt14 p13">
				<div id="content-wrapper-bottom">
					<div class="resetpassword_box_left">				
						<?php
    
$form = $this->beginWidget('CActiveForm', 
            array(
                    'id' => 'resetpassword-form',
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                            'validateOnSubmit' => true
                    )
            ));
    ?>
				<div class="reset_gzq">
							<div class="reset_backg">
								<div class="reset_main_gzq">
									<div class="reset_top_gzq">重设密码</div>
									<div class="reset_main_gzq1">
										<label>新密码：</label>
									<?php echo $form->passwordField($model,'newpassword',array('class'=>'register_Input_gzq1')); ?>

							</div>
									<div class="reset_main_gzq1">
										<label>确认密码：</label>
									<?php echo $form->passwordField($model,'renewpassword',array('class'=>'register_Input_gzq1')); ?>

							</div>
									<div style="color: #999999;">
							<?php echo $form->errorSummary($model); ?>
							</div>
									<input type="submit" class="reset_submit_ico" value="" />
								</div>
							</div>

						</div>	
			 <?php $this->endWidget(); ?>
		   					        		</div>
					<div class="resetPassword_box_right"></div>
					<div class="clear"></div>
				</div>
			</div>


		</div>

		<div class="clear"></div>
	</div>
	<!-- main -->
	<div class="clear"></div>

	<div id="show_err"></div>

	<div class="clear-fix"></div>
</div>