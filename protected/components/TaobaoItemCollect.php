<?php
class TaobaoItemCollect
{

	public function fetch( $url )
	{
		$id = $this->get_id( $url );
		if ( !$id )
		{
			return FALSE;
		}
		$key = "taobao_".$id;
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$req = new ItemGetRequest( );
		$req->setFields( "detail_url,title,nick,pic_url,price" );
		$req->setNumIid( $id );
		$resp = $topclient->execute( $req );
		$res = ( array )$resp;
		if ( $res['code'] )
		{
			if ( $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest" )
			{
				exit( json_encode( array(
					"data" => $res
				) ) );
			}
			exit( $res['msg'] );
		}
		if ( !isset( $resp->item ) )
		{
			return FALSE;
		}
		$item = ( array )$resp->item;
		$result = array( );
		$result['item']['key'] = $key;
		$result['item']['title'] = $item['title'];
		$result['item']['price'] = $item['price'];
		$result['item']['img'] = $item['pic_url'];
		$result['item']['simg'] = $item['pic_url']."_64x64.jpg";
		$result['item']['bimg'] = $item['pic_url']."_210x1000.jpg";
		$result['item']['url'] = $item['detail_url'];
		$result['item']['taobao_seller_nick'] = $item['nick'];
		$result['item']['author'] = "taobao";

		if ( Yii::app( )->config->get( "taobao_pid" ) )
		{
			$req = new TaobaokeItemsDetailGetRequest( );
			$req->setFields( "click_url" );
			$req->setNumIids( $id );
			$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
			$resp = $topclient->execute( $req );
			if ( isset( $resp->taobaoke_item_details ) )
			{
				$item_detail = ( array )$resp->taobaoke_item_details->taobaoke_item_detail;
				if ( $item_detail['click_url'] )
				{
					$result['item']['url'] = $item_detail['click_url'];
				}
			}
		}
		return $result['item'];
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url );
		if ( isset( $path['query'] ) )
		{
			parse_str( $path['query'], $params );
			if ( isset( $params['id'] ) )
			{
				$id = $params['id'];
				return $id;
			}
			if ( isset( $params['item_id'] ) )
			{
				$id = $params['item_id'];
				return $id;
			}
			if ( isset( $params['default_item_id'] ) )
			{
				$id = $params['default_item_id'];
			}
		}
		return $id;
	}

}

?>
