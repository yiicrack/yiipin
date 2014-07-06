<?php

class TaobaoOAuth extends CComponent
{

	public $client_id = NULL;
	public $secret = NULL;
	public $callback = NULL;
	protected $accessURL = "https://oauth.taobao.com/token";
	protected $authorizeURL = "https://oauth.taobao.com/authorize";
	protected $oauth = NULL;

	public function __construct( )
	{
		$this->client_id = Yii::app( )->config->get( "taobao_appkey" );
		$this->secret = Yii::app( )->config->get( "taobao_appsecret" );
	}

	public function init( )
	{
		return $this;
	}

	public function loginRedirect( )
	{
		header( "Location: ".$this->buildRequestURL( $this->authorizeURL ) );
	}

	public function fetchAccessToken( $code )
	{
		$params = array(
			"client_secret" => $this->secret,
			"grant_type" => "authorization_code",
			"code" => $code
		);
		$request = $this->oauthRequest( $this->accessURL, $params, TRUE, TRUE );
		if ( isset( $request['access_token'] ) )
		{
			return array(
				"user_id" => $request['taobao_user_id'],
				"nickname" => $request['taobao_user_nick'],
				"access_token" => $request['access_token']
			);
		}
		return array( );
	}

	protected function buildRequestURL( $url, $params = array( ) )
	{
		$params += array(
			"client_id" => $this->client_id,
			"response_type" => "code",
			"redirect_uri" => $this->callback,
			"view" => "web"
		);
		return $url."?".http_build_query( $params );
	}

	protected function oauthRequest( $url, $params = array( ), $json = FALSE, $post = FALSE )
	{
		if ( $post )
		{
			$params += array(
				"client_id" => $this->client_id,
				"response_type" => "code",
				"redirect_uri" => $this->callback,
				"view" => "web"
			);
			$ch = curl_init( );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_FAILONERROR, FALSE );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
			if ( 5 < strlen( $url ) && strtolower( substr( $url, 0, 5 ) ) == "https" )
			{
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
			}
			curl_setopt( $ch, CURLOPT_POST, TRUE );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
			$c = curl_exec( $ch );
		}
		else
		{
			$c = trim( UtilHelper::getpage( $this->buildRequestURL( $url, $params ) ) );
		}
		if ( !$json )
		{
			parse_str( $c, &$params );
			return $params;
		}
		$params = CJSON::decode( $c );
		return $params;
	}

}

?>
