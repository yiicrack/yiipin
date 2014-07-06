<?php
class UserIdentity extends CUserIdentity
{

	public $id = NULL;

	const ERROR_INACTIVE = 999;

	public function authenticate( )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$isuid = 0;
		$validator = new CEmailValidator( );
		if ( $validator->validateValue( $this->username ) )
		{
			$isuid = 2;
		}
		$username = $this->username;
		if ( strtolower( Yii::app( )->charset ) != strtolower( UC_CHARSET ) )
		{
			$username = mb_convert_encoding( $username, UC_CHARSET, "UTF-8" );
		}
		//uc_client/client.php   uc_user_login
		$userInfo = uc_user_login( $username, $this->password, $isuid );
		if (count($userInfo)==4) {
			list( $uid, $username, $password, $email ) = $userInfo;
		}
		else list( $uid, $username, $password, $email, $isexist ) = $userInfo;

		if ( 0 < $uid )
		{
			$user = User::model( )->findByPk( $uid );
			if ( $user == NULL )
			{
				$user = new User( );
				$user->username = $this->username;
				$user->password = md5( $password );
				$user->email = $email;
				$user->id = $uid;
				$user->gender = "女";
				$user->active = 1;
				if ( !$user->save( ) )
				{
					print_r( $user->errors );
				}
				$user->refresh( );
			}
			$this->username = $user->username;
			$this->id = $user->id;
			if ( $user->active == 0 )
			{
				$this->errorCode = self::ERROR_INACTIVE;
			}
			else
			{
				$this->errorCode = self::ERROR_NONE;
			}
		}
		else if ( $uid == -1 )
		{
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if ( $uid == -2 )
		{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		return !$this->errorCode;
	}

	public function getId( )
	{
		return $this->id;
	}

}

?>
