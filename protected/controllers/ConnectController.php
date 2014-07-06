<?php
class ConnectController extends Controller
{
	public function actions( )
	{
		return array(
			"captcha" => array( "class" => "CCaptchaAction", "backColor" => 16777215, "maxLength" => 4, "minLength" => 4, "width" => 100, "testLimit" => 10 )
		);
	}
	
	public function actionSinaWeiboLogin( )
	{
		if ( Yii::app( )->config->get( "sina_appkey" ) )
		{
		}
		if ( !Yii::app( )->config->get( "sina_appsecret" ) )
		{
			throw new CException( "尚未配置新浪微博登录接口参数！" );
		}
		Yii::import( "application.vendors.libweibo.*" );
		header( "Content-Type: text/html; charset=UTF-8" );
		include_once( "saetv2.ex.class.php" );
		$oauth = new SaeTOAuthV2( Yii::app( )->config->get( "sina_appkey" ), Yii::app( )->config->get( "sina_appsecret" ) );
		$code_url = $oauth->getAuthorizeURL( $this->createAbsoluteUrl( "/connect/sinaweibocallback" ) );
		Yii::app( )->session['qq_user_info'] = NULL;
		$this->redirect( $code_url );
	}

	public function actionSinaWeiboCallback( )
	{
		Yii::import( "application.vendors.libweibo.*" );
		header( "Content-Type: text/html; charset=UTF-8" );
		include_once( "saetv2.ex.class.php" );
		$oauth = new SaeTOAuthV2( Yii::app( )->config->get( "sina_appkey" ), Yii::app( )->config->get( "sina_appsecret" ) );
		if ( isset( $_REQUEST['code'] ) )
		{
			$keys = array( );
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = $this->createAbsoluteUrl( "/connect/sinaweibocallback" );
			try
			{
				$token = $oauth->getAccessToken( "code", $keys );
			}
			catch ( OAuthException $e )
			{
				var_dump($e);
			}
		}
		if ( $token )
		{
			Yii::app( )->session['weibo_token'] = $token;
			setcookie( "weibojs_".$oauth->client_id, http_build_query( $token ) );
			$client = new SaeTClientV2( Yii::app( )->config->get( "sina_appkey" ), Yii::app( )->config->get( "sina_appsecret" ), $token['access_token'] );
			$uid_get = $client->get_uid( );
			$uid = $uid_get['uid'];
			$return = $client->show_user_by_id( $uid );
			if ( isset( $return['error'] ) )
			{
				$this->render( "/site/flash_message", array(
					"message" => "抱歉，新浪微博登录授权失败(".$return['error'].")，请稍候再试，或者用".Yii::app( )->name."账号登录。",
					"redirect_url" => array( "/site/login" )
				) );
				Yii::app( )->end( );
			}
			else
			{
				Yii::app( )->session['weibo_user_info'] = $return;
				$user = User::model( )->findByAttributes( array(
					"sinaweibo_uid" => Yii::app( )->session['weibo_user_info']['id']
				) );
				if ( $user !== NULL )
				{
					$identity = new UcUserIdentity( $user->username );
					if ( $identity->authenticate( ) )
					{
						Yii::app( )->user->login( $identity, 0 );
					}
					$this->render( "/site/flash_message", array(
						"message" => "登录成功，正在返回登录前页面....",
						"redirect_url" => array( "home/index" )
					) );
					Yii::app( )->end( );
				}
				if ( Yii::app( )->config->get( "connect_auto_register" ) == "1" )
				{
					$this->redirect( array( "autoregister" ) );
				}
				else
				{
					$this->redirect( array( "authbind" ) );
				}
			}
		}
		else
		{
			echo "failed!";
		}
	}

	public function actionQQLogin( )
	{
		if ( Yii::app( )->config->get( "qq_appkey" ) )
		{
		}
		if ( !Yii::app( )->config->get( "qq_appsecret" ) )
		{
			throw new CException( "尚未配置QQ登录接口参数！" );
		}
		$oauth = Yii::app( )->qqoauth;
		$oauth->fetchOAuthToken( );
		$key = $oauth->key;
		$callback = Yii::app( )->createAbsoluteUrl( $oauth->callback );
		$url = "http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize?oauth_consumer_key=".$key."&";
		$url .= "oauth_token=".Yii::app( )->session['oauthToken']."&oauth_callback=".urlencode( $callback );
		Yii::app( )->session['weibo_user_info'] = NULL;
		$this->redirect( $url );
	}

	public function actionQQCallback( )
	{
		$token = $_GET['oauth_token'];
		$vericode = $_GET['oauth_vericode'];
		$oauth = Yii::app( )->qqoauth;
		$oauth->fetchAccessToken( $token, $vericode );
		$t = $oauth->accessToken;
		$s = $oauth->accessSecret;
		$userinfo = $oauth->fetchUserInfo( $t, $s );
		Yii::app( )->session['qq_user_info'] = $userinfo;
		$user = User::model( )->findByAttributes( array(
			"qq_openid" => Yii::app( )->session['openid']
		) );
		if ( $user !== NULL )
		{
			$identity = new UcUserIdentity( $user->username );
			if ( $identity->authenticate( ) )
			{
				Yii::app( )->user->login( $identity, 0 );
			}
			$this->render( "/site/flash_message", array(
				"message" => "登录成功，正在返回登录前页面....",
				"redirect_url" => array( "home/index" )
			) );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->config->get( "connect_auto_register" ) == "1" )
		{
			$this->redirect( array( "autoregister" ) );
		}
		else
		{
			$this->redirect( array( "authbind" ) );
		}
	}

	public function actionAuthBind( )
	{
		if ( isset( Yii::app( )->session['qq_user_info'] ) )
		{
			$type = "QQ";
			$nickname = Yii::app( )->session['qq_user_info']['nickname'];
		}
		else if ( isset( Yii::app( )->session['weibo_user_info'] ) )
		{
			$type = "新浪微博";
			$nickname = Yii::app( )->session['weibo_user_info']['screen_name'];
		}
		else if ( isset( Yii::app( )->session['taobao_user_info'] ) )
		{
			$type = "淘宝网";
			$nickname = Yii::app( )->session['taobao_user_info']['nickname'];
		}
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
				$this->render( "/site/flash_message", array(
					"message" => "绑定登录成功，以后您就以用".$type."账号登录".Yii::app( )->name."了！",
					"redirect_url" => Yii::app( )->user->returnUrl
				) );
				Yii::app( )->end( );
			}
		}
		$this->render( "authbind", array(
			"model" => $model,
			"nickname" => $nickname,
			"auth" => $type
		) );
	}

	public function actionTaobaoLogin( )
	{
		if ( Yii::app( )->config->get( "taobao_appkey" ) )
		{
		}
		if ( !Yii::app( )->config->get( "taobao_appsecret" ) )
		{
			throw new CException( "尚未配置淘宝接口参数！" );
		}
		$oauth = new TaobaoOAuth( );
		$oauth->callback = Yii::app( )->createAbsoluteUrl( "/connect/taobaocallback" );
		$oauth->loginRedirect( );
	}

	public function actionTaobaoCallback( )
	{
		if ( isset( $_GET['error'] ) && $_GET['error'] == "access_denied" )
		{
			$this->render( "/site/flash_message", array(
				"message" => "登录失败，您必须授权才能登录....",
				"redirect_url" => array( "/site/login" )
			) );
			Yii::app( )->end( );
		}
		$token = $_GET['code'];
		if ( empty( $token ) )
		{
			$this->render( "/site/flash_message", array(
				"message" => "登录失败，该站点尚未配置淘宝登录....",
				"redirect_url" => array( "/site/login" )
			) );
			Yii::app( )->end( );
		}
		$oauth = new TaobaoOAuth( );
		$oauth->callback = Yii::app( )->createAbsoluteUrl( "/connect/taobaocallback" );
		$userinfo = $oauth->fetchAccessToken( $token );
		Yii::app( )->session['taobao_user_info'] = $userinfo;
		$user = User::model( )->findByAttributes( array(
			"taobao_user_id" => $userinfo['user_id']
		) );
		if ( $user !== NULL )
		{
			$identity = new UcUserIdentity( $user->username );
			if ( $identity->authenticate( ) )
			{
				Yii::app( )->user->login( $identity, 0 );
			}
			$this->render( "/site/flash_message", array(
				"message" => "登录成功，正在返回登录前页面....",
				"redirect_url" => array( "home/index" )
			) );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->config->get( "connect_auto_register" ) == "1" )
		{
			$this->redirect( array( "autoregister" ) );
		}
		else
		{
			$this->redirect( array( "authbind" ) );
		}
	}

	public function actionAutoRegister( )
	{
		$model = new AutoRegisterForm( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "register-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( isset( $_POST['AutoRegisterForm'] ) )
		{
			$model->attributes = $_POST['AutoRegisterForm'];
			if ( $model->validate( ) && $model->register( ) )
			{
				if ( Yii::app( )->config->get( "email_verify" ) == 1 )
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
					$this->render( "//site/activate_success" );
				}
				Yii::app( )->end( );
			}
		}
		$this->render( "autoregister", array(
			"model" => $model
		) );
	}
}

?>
