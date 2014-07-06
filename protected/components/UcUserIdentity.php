<?php
class UcUserIdentity extends CUserIdentity
{

	public $id = NULL;

	public function __construct( $username )
	{
		$this->username = $username;
		$this->password = "";
	}

	public function authenticate( )
	{
		$user = User::model( )->findByAttributes( array(
			"username" => $this->username
		) );
		if ( $user == NULL )
		{
			Yii::import( "application.vendors.*" );
			include_once( "ucenter.php" );
			//uc_client/client.php uc_get_user
			var_dump(uc_get_user( $this->username ));
			list( $uid, $username, $email ) = uc_get_user( $this->username );
			
			if ( $uid )
			{
				$user = new User( );
				$user->username = $username;
				$user->password = md5( rand( 10000, 99999 ) );
				$user->email = $email;
				$user->id = $uid;
				$user->active = 1;
				$user->save( );
				$user->refresh( );
			}
		}
		$this->id = $user->id;
		$this->errorCode = self::ERROR_NONE;
		return !$this->errorCode;
	}

	public function getId( )
	{
		return $this->id;
	}

}

?>
