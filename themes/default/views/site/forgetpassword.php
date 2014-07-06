<?php
$this->pageTitle = '忘记密码';
$this->layout = 'main';
?>
<div id="wrapper">


	<div class="clear"></div>
	<div id="main" class="container_12">

		<div class="grid_12">
			<div class="box_shadow mt14 p13">
				<div id="content-wrapper-bottom">
					<div class="resetpassword_box_left">
						<form action="" method="post" id="resetPassword" onsubmit="if($('#emailaddress').val()=='' || $('#emailaddress').val()=='请输入注册时使用的邮箱'){alert('请输入您的Email！');return false;}">
							<div class="reset_gzq">
								<div class="reset_backg">
									<div class="reset_main_gzq">
										<div class="reset_top_gzq">找回密码</div>
										<div class="reset_main_gzq1">
											<label>邮 箱：</label><input id="emailaddress" type="text" name="email" style="vertical-align: middle;" class="reset_input_gzq" value="请输入注册时使用的邮箱" onfocus="if(this.value=='请输入注册时使用的邮箱'){this.value='';this.style.color = '#000';}" />
										</div>
										<div class="reset_yincang" id="emailaddress_hint" style="color: #999999;"></div>
										<input type="submit" class="reset_submit_ico" value="" />

									</div>
								</div>

							</div>
						</form>
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