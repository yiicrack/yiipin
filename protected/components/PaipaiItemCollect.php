<?php
class PaipaiItemCollect
{

	public function fetch( $url )
	{
		$id = $this->get_id( $url );
		if ( !$id )
		{
			return FALSE;
		}
		$userId = Yii::app( )->config->get( "paipai_userId" );
		$uin = Yii::app( )->config->get( "paipai_uin" );
		$appOAuthID = Yii::app( )->config->get( "paipai_appOAuthID" );
		$appOAuthkey = Yii::app( )->config->get( "paipai_secretOAuthKey" );
		$accessToken = Yii::app( )->config->get( "paipai_accessToken" );
		if ( !$userId || !$uin || !$appOAuthID || !$appOAuthkey || !$accessToken )
		{
			return $this->parseHtml( $url );
		}
		if ( !$userId && !$uin && !$appOAuthID && !$appOAuthkey && !$accessToken )
		{
			throw new CException( "未完整设置拍拍客各项参数，请到后台广告联盟中设置" );
		}
		Yii::import( "application.vendors.paipai.*" );
		$oauth = new PaiPaiOpenApiOauth( $appOAuthID, $appOAuthkey, $accessToken, $uin );
		$oauth->setDebugOn( FALSE );
		$oauth->setApiPath( "/cps/cpsCommQueryAction.xhtml" );
		$oauth->setMethod( "post" );
		$oauth->setCharset( "utf-8" );
		$oauth->setFormat( "json" );
		$params =& $oauth->getParams( );
		$params['charset'] = "utf-8";
		$params['pureData'] = 1;
		$params['commId'] = $id;
		$params['userId'] = $userId;
		try
		{
			$response = $oauth->invoke( );
			$data = json_decode( UtilHelper::convertencoding( $response, "UTF-8" ) );
		}
		catch ( Exception $e )
		{
			throw new CException( "Request Failed. code:%d, msg:%s\n", $e->getCode( ), $e->getMessage( ) );
		}
		$item = array( );
		$item['key'] = "paipai_".$id;
		$item['author'] = "paipai";
		if ( $data->CpsQueryResult->errorMessage == "Success" && $data->CpsQueryResult->cpsSearchCommData->dwPrice )
		{
			$item['title'] = $data->CpsQueryResult->cpsSearchCommData->sTitle;
			$item['price'] = $data->CpsQueryResult->cpsSearchCommData->dwPrice / 100;
			$item['img'] = $data->CpsQueryResult->cpsSearchCommData->sCommImgUrl;
			$item['url'] = $data->CpsQueryResult->cpsSearchCommData->sClickUrl;
			return $item;
		}
		$oauth->setApiPath( "/item/getItem.xhtml" );
		$oauth->setMethod( "post" );
		$oauth->setCharset( "utf-8" );
		$oauth->setFormat( "json" );
		$params =& $oauth->getParams( );
		$params['charset'] = "utf-8";
		$params['pureData'] = 1;
		$params['itemCode'] = $id;
		try
		{
			$response = $oauth->invoke( );
			$data = json_decode( UtilHelper::convertencoding( $response, "UTF-8" ) );
		}
		catch ( Exception $e )
		{
			throw new CException( "Request Failed. code:%d, msg:%s\n", $e->getCode( ), $e->getMessage( ) );
		}
		if ( $data->errorCode == 0 )
		{
			$item['title'] = $data->itemName;
			$item['price'] = $data->itemPrice / 100;
			$item['img'] = $data->picLink;
		}
		else
		{
			$item = $this->parseHtml( $url );
		}
		$item['url'] = $url;
		return $item;
	}

	private function parseHtml( $url )
	{
		$id = $this->get_id( $url );
		if ( !$id )
		{
			return FALSE;
		}
		$item = array( );
		$item['key'] = "paipai_".$id;
		$item['author'] = "paipai";
		$html = UtilHelper::getpage( $url, "utf-8" );
		if ( !$html )
		{
			return FALSE;
		}
		preg_match( "%<h1>(.+?)</h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<em\\s+id=\"commodityCurrentPrice\".+?defaultVal=\".+?\".*?>(.+?)</em>%is", $html, $matches );
		$item['price'] = $matches[1];
		if ( 0 < strpos( $item['price'], "-" ) )
		{
			$tmp = explode( "-", $item['price'] );
			$item['price'] = trim( $tmp[0] );
		}
		preg_match( "%<img class=\"pic_master\" id=\"pfhlkd_smallImage\" alt=\"商品主图\" src=\"(.+?)\".+?/>%is", $html, $matches );
		$item['img'] = trim( $matches[1] );
		$item['url'] = $url;
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$count = preg_match( "/[A-Z0-9]{32}/s", $url, $matches );
		if ( 0 < $count )
		{
			$id = $matches[0];
		}
		return $id;
	}

}

?>
