<?php
class WebUser extends CWebUser
{

	public function afterLogin( $fromCookie )
	{
		parent::afterlogin( $fromCookie );
		$user = User::model( )->findByPk( $this->id );
		$user->last_login_time = $user->this_login_time;
		$user->this_login_time = date( "Y-m-d H:i:s" );
		$user->last_login_ip = $user->this_login_ip;
		$user->this_login_ip = Yii::app( )->getRequest( )->userHostAddress;
		$user->save( FALSE );
		User::addcredit( $user->id, "user_login" );
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_user_synlogin
		$script = uc_user_synlogin( $this->getId( ) );
		$count = preg_match_all( "/src=\"(.+?)\"/i", $script, $matches );
		if ( 0 < $count )
		{
			foreach ( $matches[1] as $file )
			{
				Yii::app( )->clientScript->registerScriptFile( $file, CClientScript::POS_END );
			}
		}
		Yii::app( )->clientScript->registerScript( "refresh-login-status", "top.\$(\"#top_nav\").load(\"".CHtml::normalizeurl( array( "/site/login_status" ) )."\");" );
		self::thirdpartybind( $this->id );
	}

	public static function thirdpartyBind( $uid )
	{
		if ( isset( Yii::app( )->session['weibo_user_info'] ) )
		{
			self::sinaweibobind( $uid );
		}
		else if ( isset( Yii::app( )->session['qq_user_info'] ) )
		{
			self::qqbind( $uid );
		}
		else if ( isset( Yii::app( )->session['taobao_user_info'] ) )
		{
			self::taobaobind( $uid );
		}
	}

	public static function sinaWeiboBind( $uid )
	{
		$user_info = Yii::app( )->session['weibo_user_info'];
		$user = User::model( )->findByPk( $uid );
		$user->sinaweibo_uid = $user_info['id'];
		$user->save( FALSE );
		$avatar = self::getucavatarsrc( $user->id, "small" );
		if ( !file_exists( $avatar ) )
		{
			UtilHelper::getfile( $user_info['profile_image_url'], $avatar );
			UtilHelper::getfile( $user_info['profile_image_url'], self::getucavatarsrc( $user->id, "middle" ) );
			UtilHelper::getfile( $user_info['profile_image_url'], self::getucavatarsrc( $user->id, "big" ) );
		}
	}

	public static function QQBind( $uid )
	{
		$openid = Yii::app( )->session['openid'];
		$accessToken = Yii::app( )->session['accessToken'];
		$user_info = Yii::app( )->session['qq_user_info'];
		$user = User::model( )->findByPk( $uid );
		$user->qq_openid = $openid;
		$user->save( FALSE );
	}

	public static function TaobaoBind( $uid )
	{
		$user_info = Yii::app( )->session['taobao_user_info'];
		$user = User::model( )->findByPk( $uid );
		$user->taobao_user_id = $user_info['user_id'];
		$user->save( FALSE );
	}

	public static function getUcAvatarSrc( $uid, $size )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$uid = sprintf( "%09d", $uid );
		$dir1 = substr( $uid, 0, 3 );
		$dir2 = substr( $uid, 3, 2 );
		$dir3 = substr( $uid, 5, 2 );
		$src = "/data/avatar/".$dir1."/".$dir2."/".$dir3."/".substr( $uid, -2 )."_avatar_".$size.".jpg";
		$parts = explode( "/", trim( UC_API, "/" ) );
		$uc_server = array_pop( $parts );
		if ( file_exists( Yii::app( )->basePath."/..".$uc_server ) )
		{
			$file = file_exists( Yii::app( )->basePath."/..".$uc_server.$src ) ? UC_API.$src : Yii::app( )->theme->baseUrl. "/images/0.gif";
			return $file;
		}
		$file = UC_API.( "/avatar.php?uid=".$uid."&size={$size}" );
		return $file;
	}

	public function afterLogout( )
	{
		parent::afterlogout( );
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_user_synlogout
		$script = uc_user_synlogout( );
		$count = preg_match_all( "/src=\"(.+?)\"/i", $script, $matches );
		if ( 0 < $count )
		{
			foreach ( $matches[1] as $file )
			{
				Yii::app( )->clientScript->registerScriptFile( $file, CClientScript::POS_END );
			}
		}
		Yii::app( )->clientScript->registerScript( "refresh-login-status", "top.\$(\"#top_nav\").load(\"".CHtml::normalizeurl( array( "/site/login_status" ) )."\");" );
	}

	public function getRoleName( )
	{
		var_dump(Yii::app());exit;
		$roles = Yii::app( )->authManager->getRoles( $this->id );
		if ( count( $roles ) )
		{
			$role = array_shift( $roles );
			return $role->description;
		}
	}

}

?>
