<?php
class QQOAuth extends CComponent
{

	public $key = NULL;
	public $secret = NULL;
	public $callback = NULL;
	protected $accessURL = "http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token";
	protected $requestURL = "http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token";
	protected $authorizeURL = "http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize";
	protected $userInfoURL = "http://openapi.qzone.qq.com/user/get_user_info";
	protected $oauth = NULL;

	public function __construct( )
	{
		$this->key = Yii::app( )->config->get( "qq_appkey" );
		$this->secret = Yii::app( )->config->get( "qq_appsecret" );
		$this->callback = Yii::app( )->createAbsoluteUrl( $this->callback );
	}

	public function init( )
	{
		return $this;
	}

	public function fetchOAuthToken( )
	{
		$request = $this->oauthRequest( $this->requestURL );
		if ( isset( $request['oauth_token'], $request['oauth_token_secret'] ) )
		{
			$this->storageToken( array(
				"oauthToken" => $request['oauth_token'],
				"oauthSecret" => $request['oauth_token_secret']
			) );
			return TRUE;
		}
		return FALSE;
	}

	public function fetchAccessToken( $code, $oauth_vericode )
	{
		$params = array(
			"oauth_vericode" => $oauth_vericode,
			"oauth_consumer_key" => $this->key,
			"oauth_token" => $this->getOAuthData( "oauthToken" )
		);
		$oauthSecret = $this->getOAuthData( "oauthSecret" );
		$request = $this->oauthRequest( $this->accessURL, $params, $oauthSecret );
		if ( isset( $request['oauth_token'], $request['oauth_token_secret'] ) )
		{
			$this->storageToken( array(
				"openid" => $request['openid'],
				"accessToken" => $request['oauth_token'],
				"accessSecret" => $request['oauth_token_secret']
			) );
			return TRUE;
		}
		return FALSE;
	}

	public function fetchUserInfo( $accessToken = NULL, $oauthSecret = NULL )
	{
		if ( empty( $accessToken ) )
		{
			$accessToken = $this->getOAuthData( "accessToken" );
		}
		if ( empty( $oauthSecret ) )
		{
			$oauthSecret = $this->getOAuthData( "accessSecret" );
		}
		$openid = $this->getOAuthData( "openid" );
		$params = array(
			"openid" => $openid,
			"oauth_token" => $accessToken,
			"oauth_consumer_key" => $this->key
		);
		$url = $this->buildRequestURL( $this->userInfoURL, $params, $oauthSecret );
		$userinfo = trim( UtilHelper::getpage( $url ) );
		return CJSON::decode( $userinfo );
	}

	public function getOpenId( )
	{
		return $this->getOAuthData( "openid" );
	}

	public function getAuthorizeURL( )
	{
		return $this->authorizeURL;
	}

	public function getOAuthToken( )
	{
		return $this->getOAuthData( "oauthToken" );
	}

	public function getOAuthSecret( )
	{
		return $this->getOAuthData( "oauthSecret" );
	}

	public function getAccessToken( )
	{
		return $this->getOAuthData( "accessToken" );
	}

	public function getAccessSecret( )
	{
		return $this->getOAuthData( "accessSecret" );
	}

	public function flushStorage( )
	{
		return $this->storageToken( array( "openid" => NULL, "oauthToken" => NULL, "oauthSecret" => NULL, "accessToken" => NULL, "accessSecret" => NULL ) );
	}

	protected function buildRequestURL( $url, $params = array( ), $method = "" )
	{
		$params += array(
			"oauth_timestamp" => time( ),
			"oauth_version" => "1.0",
			"oauth_consumer_key" => $this->key,
			"oauth_signature_method" => "HMAC-SHA1",
			"oauth_nonce" => rand( 1000, 9999 )
		);
		$base_params = $params;
		ksort( $base_params );
		$query_string = "GET&".urlencode( $url )."&".urlencode( http_build_query( $base_params ) );
		$params['oauth_signature'] = base64_encode( hash_hmac( "SHA1", $query_string, $this->secret."&".$method, TRUE ) );
		return $url."?".http_build_query( $params );
	}

	protected function oauthRequest( $url, $params = array( ), $method = "" )
	{
		$c = trim( UtilHelper::getpage( $this->buildRequestURL( $url, $params, $method ) ) );
		if ( !strpos( $c, "&" ) )
		{
			return FALSE;
		}
		parse_str( $c, $params );
		return $params;
	}

	protected function getOAuthData( $name )
	{
		$session = Yii::app( )->session;
		if ( isset( $session[$name] ) )
		{
			return $session[$name];
		}
	}

	protected function storageToken( $name, $value = NULL )
	{
		$session = Yii::app( )->session;
		if ( is_array( $name ) )
		{
			foreach ( $name as $key => $value )
			{
				$session[$key] = $value;
			}
			return TRUE;
		}
		$session[$name] = $value;
		return TRUE;
	}

}

?>
