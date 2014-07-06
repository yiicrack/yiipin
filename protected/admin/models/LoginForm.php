<?php
class LoginForm extends CFormModel
{

	public $username = NULL;
	public $password = NULL;
	public $rememberMe = NULL;
	public $verifyCode = NULL;
	private $_identity = NULL;

	public function rules( )
	{
		return array(
			array( "username, password", "required" ),
			array( "rememberMe", "boolean" ),
			array( "password", "authenticate" )
		);
	}

	public function attributeLabels( )
	{
		return array( "username" => "用户名", "password" => "密码", "rememberMe" => "记住并自动登录", "verifyCode" => "验证码" );
	}

	public function authenticate( $attribute, $params )
	{
		if ( !$this->hasErrors( ) )
		{
			$this->_identity = new UserIdentity( $this->username, $this->password );
			$this->_identity->authenticate( );
			switch ( $this->_identity->errorCode )
			{
			case UserIdentity::ERROR_USERNAME_INVALID :
				$this->addError( "username", "用户名不正确." );
				break;
			case UserIdentity::ERROR_PASSWORD_INVALID :
				$this->addError( "password", "密码不正确." );
			}
		}
	}

	public function login( )
	{
		if ( $this->_identity === NULL )
		{
			$this->_identity = new UserIdentity( $this->username, $this->password );
			$this->_identity->authenticate( );
		}
		if ( $this->_identity->errorCode === UserIdentity::ERROR_NONE )
		{
			Administrator::model( )->updateByPk(
				$this->_identity->id, array(
					'this_login_time'=>time(), 
					'last_login_time'=>$this->_identity->last_login_time,
					'this_login_ip'=>UtilHelper::getip(),
					'last_login_ip'=>$this->_identity->last_login_ip
				));
			$duration = $this->rememberMe ? 2592000 : 0;
			Yii::app( )->user->login( $this->_identity, $duration );
			return TRUE;
		}
		return FALSE;
	}

}

?>
