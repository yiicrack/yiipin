<?php
class RegisterForm extends CFormModel
{

	public $username = "用户名";
	public $password = "";
	public $repassword = "";
	public $email = "电子邮箱";
	public $gender = "女";
	public $verifyCode = "验证码";

	public function __construct($scenario='')
	{
		parent::__construct($scenario);
	}

	public function rules( )
	{
		return array(
			array( "username, password, repassword, email, gender, verifyCode", "required" ),
			array( "username", "checkname" ),
			array( "repassword", "compare", "compareAttribute" => "password", "message" => "两处输入的密码并不一致" ),
			array( "email", "checkemail" ),
			array( "nickname", "required", "on" => "personal" ),
			array( "verifyCode", "captcha", "allowEmpty" => FALSE )
		);
	}

	public function checkname( $attribute, $params )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$username = $this->username;
		if ( strtolower( Yii::app( )->charset ) != strtolower( UC_CHARSET ) )
		{
			$username = mb_convert_encoding( $username, UC_CHARSET, "UTF-8" );
		}
		//uc_client/client.php  uc_user_checkname
		$flag = uc_user_checkname( $username );
		switch ( $flag )
		{
		case -1 :
			$this->addError( "username", "该昵称不符合要求" );
			break;
		case -2 :
			$this->addError( "username", "包含不允许注册的词语" );
			break;
		case -3 :
			$this->addError( "username", "该昵称已经存在" );
		}
	}

	public function checkemail( $attribute, $params )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_user_checkemail
		$flag = uc_user_checkemail( $this->email );
		switch ( $flag )
		{
		case -4 :
			$this->addError( "email", "Email 格式有误" );
			break;
		case -5 :
			$this->addError( "email", "Email 不允许注册" );
			break;
		case -6 :
			$this->addError( "email", "该 Email 已经被注册" );
		}
	}

	public function attributeLabels( )
	{
		return array( "username" => "用户名", "password" => "密码", "repassword" => "确认密码", "email" => "电子邮箱", "verifyCode" => "验证码", "gendre" => "性别" );
	}

	public function register( )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$username = $this->username;
		if ( strtolower( Yii::app( )->charset ) != strtolower( UC_CHARSET ) )
		{
			$username = mb_convert_encoding( $username, UC_CHARSET, "UTF-8" );
		}
		//uc_client/client.php  uc_user_register
		$uid = uc_user_register( $username, $this->password, $this->email );
		if ( 0 < $uid )
		{
			$model = new User( );
			$model->attributes = $_POST['RegisterForm'];
			$model->password = md5( $this->password );
			$model->id = $uid;
			$model->active = Yii::app( )->config->get( "email_verify" ) == 1 ? 0 : 1;
			$model->save( );
			if ( Yii::app( )->config->get( "email_verify" ) == 1 )
			{
				$key = md5( "register".$model->email.$model->username );
				$url = Yii::app( )->getRequest( )->getHostInfo( "" ).CHtml::normalizeurl( array(
					"/site/activate",
					"user_id" => $uid,
					"key" => $key
				) );
				
				$mailer = Yii::app( )->mailer;
				$mailer->Subject = "【".Yii::app( )->name."】会员注册激活邮件";
				$mailer->Body = "您刚刚注册成为我站会员，请您点击以下链接进行账户激活：<br />";
				$mailer->Body .= CHtml::link( $url, $url, array( "target" => "_blank" ) );
				$mailer->Body .= "<br />如果以上链接无法点击，请将其复制到浏览器地址栏，按回车键即可。";
				$mailer->AddAddress( $model->email, $model->username );
				
				$mailer->getView( "register", array(
					"recipient" => $model->username,
					"email" => $model->email,
					"url" => Yii::app( )->getRequest( )->getHostInfo( "" ).CHtml::normalizeurl( array( "/helpcenter/index" ) )
				), "main" );
				try
				{
					$mailer->send( );
				}
				catch ( Exception $e )
				{
					var_dump($e);
				}
			}
			WebUser::thirdpartybind( $uid );
			return $uid;
		}
		return FALSE;
	}

}

?>
