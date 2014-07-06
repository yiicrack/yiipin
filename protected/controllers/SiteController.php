<?php
class SiteController extends Controller
{

	public function actions( )
	{
		return array(
			"captcha" => array( "class" => "CCaptchaAction", "backColor" => 16777215, "maxLength" => 4, "minLength" => 4, "width" => 100, "testLimit" => 100 ),
			"page" => array( "class" => "CViewAction" )
		);
	}

	public function actionIndex( )
	{
		if ( !Yii::app( )->user->isGuest )
		{
			$this->redirect( array( "home/index" ) );
		}
		$this->render( "index" );
	}

	public function actionGetShares( )
	{
		$this->forward( "/goods/getShares", FALSE );
	}

	public function actionError( )
	{
		if ( $error = Yii::app( )->errorHandler->error )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo $error['message'];
			}
			else
			{
				$this->render( "error", $error );
			}
		}
	}

	public function actionLogin( )
	{
		$model = new LoginForm( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "login-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( isset( $_POST['LoginForm'] ) )
		{
			
			$model->attributes = $_POST['LoginForm'];
			if ( $model->validate( ) && $model->login( ) )
			{
				$redirect_url = Yii::app( )->user->returnUrl;
				$paths = explode( "/", $_obfuscate_q0AfmxAK7nlN );
				$last = count( $paths ) - 1;
				if ( $paths[$last] == "index.php" || empty( $redirect_url ) || strpos( Yii::app( )->user->returnUrl, "site/" ) !== FALSE )
				{
					$redirect_url = array( "/goods/index", "type" => "new" );
				}
				$this->render( "flash_message", array(
					"message" => "登录成功！正在跳转，请稍候……",
					"redirect_url" => $redirect_url,
					"timeout" => "3000"
				) );
				Yii::app( )->end( );
			}
		}

		$this->render( "login", array(
			"model" => $model
		) );
	}

	public function actionAjaxLogin( )
	{
		$model = new LoginForm( );
		if ( isset( $_POST['LoginForm'] ) )
		{
			$model->attributes = $_POST['LoginForm'];
			if ( $model->validate( ) && $model->login( ) )
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}

	public function actionLoginStatus( )
	{
		$this->layout = "none";
		$this->render( "/site/_login_status" );
	}

	public function actionLogout( )
	{
		Yii::app( )->user->logout( );
		$this->render( "flash_message", array(
			"message" => "您已成功退出系统！正在跳转，请稍候……",
			"redirect_url" => Yii::app( )->homeUrl,
			"timeout" => "3000"
		) );
		Yii::app( )->end( );
	}

	public function actionRegister( )
	{
		$model = new RegisterForm( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "register-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( isset( $_POST['RegisterForm'] ) )
		{
			$model->attributes = $_POST['RegisterForm'];
			if ( $model->validate( ) && $model->register( ) )
			{
				if ( Yii::app( )->config->get("email_verify") == 1 )
				{
					$domain = explode( "@", $model->email );
					$mail_index = "";
					if ( isset( Yii::app( )->params['mail_index'][$domain[1]] ) )
					{
						$mail_index = Yii::app( )->params['mail_index'][$domain[1]];
					}
					$this->render( "//site/register_success", array(
						"email" => $model->email,
						"mail_index" => $mail_index
					) );
				}
				else
				{
					$identity = new UcUserIdentity( $model->username );
					if ( $identity->authenticate( ) )
					{
						Yii::app( )->user->login( $identity, 0 );
					}
					$this->render( "activate_success" );
				}
				Yii::app( )->end( );
			}
		}
		$this->render( "register", array(
			"model" => $model
		) );
	}

	public function actionActivate( $userId, $key )
	{
		$user = User::model( )->findByPk( $userId );
		if ( $user === NULL )
		{
			$this->render( "flash_message", array( "message" => "对不起，没有找到要激活的用户信息，请勿随意修改链接参数。", "redirect_url" => "/" ) );
			Yii::app( )->end( );
		}
		$key1 = md5( "register".$user->email.$user->username );
		if ( $key != $key1 )
		{
			$this->render( "flash_message", array( "message" => "对不起，校验信息错误，请勿随意修改链接参数。", "redirect_url" => "/" ) );
			Yii::app( )->end( );
		}
		$user->active = 1;
		$user->save( FALSE );
		$identity = new UcUserIdentity( $user->username );
		if ( $identity->authenticate( ) )
		{
			Yii::app( )->user->login( $identity, 0 );
		}
		$this->render( "activate_success" );
	}

	public function actionForgetpassword( )
	{
		if ( isset( $_POST['email'] ) )
		{
			$validator = new CEmailValidator( );
			if ( $validator->validateValue( trim( $_POST['email'] ) ) )
			{
				$user = User::model( )->findByAttributes( array(
					"email" => trim( $_POST['email'] )
				) );
				if ( $user !== NULL )
				{
					$key = md5( "@q3dssad@34SDASDASD@*&^%".$user->email.$user->username );
					$mailer = Yii::app( )->mailer;
					$mailer->Subject = "【".Yii::app( )->name."】密码重设邮件";
					$mailer->Body = "您刚刚请求了重设密码，请您点击以下链接进行密码重设：<br />";
					$mailer['Body'] .= CHtml::link( $this->createAbsoluteUrl( "/site/resetpwd", array(
						"user_id" => $user->id,
						"key" => $key
					) ), $this->createAbsoluteUrl( "/site/resetpwd", array(
						"user_id" => $user->id,
						"key" => $key
					) ), array( "target" => "_blank" ) );
					$mailer['Body'] .= "<br />如果以上链接无法点击，请将其复制到浏览器地址栏，按回车键即可。";
					$mailer->AddAddress( $user->email, $user->username );
					$mailer->getView( "notify", array(
						"recipient" => $user->username,
						"url" => $this->createAbsoluteUrl( "/helpcenter/index" )
					), "main" );
					$mailer->send( );
					$domain = explode( "@", $user->email );
					$mail_index = "";
					if ( isset( Yii::app( )->params['mail_index'][$domain[1]] ) )
					{
						$mail_index = Yii::app( )->params['mail_index'][$domain[1]];
					}
					$this->render( "//site/sendpwd_success", array(
						"email" => $user->email,
						"mail_index" => $mail_index
					) );
					Yii::app( )->end( );
				}
				else
				{
					$this->render( "flash_message", array(
						"message" => "该Email尚未在本网注册，请检查是否输入正确。",
						"redirect_url" => array( "/site/forgetpassword" ),
						"timeout" => "5000"
					) );
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->render( "flash_message", array(
					"message" => "您输入的不是有效的Email地址。",
					"redirect_url" => array( "/site/forgetpassword" ),
					"timeout" => "5000"
				) );
				Yii::app( )->end( );
			}
		}
		$this->render( "forgetpassword" );
	}

	public function actionResetPwd( )
	{
		$model = new ResetPasswordForm( );
		$user = User::model( )->findByPk( $_GET['user_id'] );
		if ( $user === NULL )
		{
			throw new CHttpException( "404", "用户不存在！" );
		}
		
		$key = md5( "@q3dssad@34SDASDASD@*&^%".$user->email.$user->username );
		if ( isset( $_GET['key'] ) )
		{
			do
			{
				if ( !( $_GET['key'] != $key ) )
				{
					break;
				}
				else
				{
					throw new CHttpException( "500", "密钥错误，请重新发起请求！" );
				}
			}
			while ( 0 );
			//throw new CHttpException( "500", "密钥没有检测到，请重新发起请求！" );
		} //
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "resetpassword-form" )
			{
				echo CActiveForm::validate( $model );
				Yii::app( )->end( );
			}
			if ( isset( $_POST['ResetPasswordForm'] ) )
			{
				$model->attributes = $_POST['ResetPasswordForm'];
				if ( $model->validate( ) && $model->modifyPassword( $_GET['user_id'] ) )
				{
					$this->render( "flash_message", array(
						"message" => "您的密码已经修改成功，现在您就可以用新密码登录了！",
						"redirect_url" => array( "/site/login" ),
						"timeout" => "5000"
					) );
					Yii::app( )->end( );
				}
			}
		}
		$this->render( "resetpwd", array(
			"model" => $model
		) );
	}

	public function actionCheckLoginStatus( )
	{
		if ( Yii::app( )->user->isGuest )
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

	public function actionCheckMsg( )
	{
		$ret['hasnew'] = FALSE;
		if ( !Yii::app( )->user->isGuest && Yii::app( )->user->getState( "all_msg_read" ) )
		{
			var_dump(Yii::app( )->user->id);exit;
			$user = User::model( )->findByPk( Yii::app( )->user->id );
			if (!is_null($user)) {
				$ret['fansCount'] = Follow::model( )->countByAttributes( array(
					"to_user_id" => $user->id
					), "created >= '".$user->last_login_time."'" );
				$deleted_sysmsg_ids = trim( $user->deleted_sysmsg_ids, "," );
				$condition = "created >= '".$user->last_login_time."'";
				if ( $deleted_sysmsg_ids )
				{
					$condition .= " AND id NOT IN (".$deleted_sysmsg_ids.")";
				}
				$ret['sysmsgCount'] = Sysmsg::model( )->count( $condition );
				$ret['likemeCount'] = UserLikeShare::model( )->countByAttributes( array(
					"share_user_id" => $user->id
					), "created >= '".$user->last_login_time."'" );
				if ( $ret['fansCount'] || $ret['sysmsgCount'] || $ret['likemeCount'] )
				{
					$ret['hasnew'] = TRUE;
				}
			}
		}
		echo json_encode( $ret );
	}

	public function actionSetAllMsgRead( )
	{
		Yii::app( )->user->setState( "all_msg_read", TRUE );
		echo "ok";
	}

	public function actionRedirect( $url )
	{
		$click = AdvertiseClick::model( )->findByAttributes( array(
			"url" => $url
		) );
		if ( $click === NULL )
		{
			$click = new AdvertiseClick( );
			$click->url = $url;
			$click->click_count = 0;
		}
		$click['click_count'] += 1;
		$click->save( );
		$this->redirect( $url );
	}

}

?>
