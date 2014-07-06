<?php
class UserIdentity extends CUserIdentity
{

	private $_id = NULL;

	public $last_login_time = 0;
	public $last_login_ip = '';
	const ERROR_NO_PREVILIGE = 3;

	public function authenticate( )
	{
		$user = Administrator::model( )->findByAttributes( array(
			"username" => $this->username
		) );
		if ( $user == NULL )
		{
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if ( $user->password != md5( md5( $this->password ).$user->salt ) )
		{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			$this->_id = $user->id;
			$this->username = $user->username;
			$this->errorCode = self::ERROR_NONE;
			
			$this->last_login_time = $user->this_login_time;
			$this->last_login_ip = $user->this_login_ip;
		}
		return !$this->errorCode;
	}

	public function getId( )
	{
		return $this->_id;
	}

}

?>
