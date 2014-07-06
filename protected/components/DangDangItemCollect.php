<?php
class DangDangItemCollect
{

	public function fetch( $url )
	{
		$id = $this->get_id( $url );
		if ( !$id )
		{
			return FALSE;
		}
		$html = UtilHelper::getpage( $url, "utf-8" );
		if ( !$html )
		{
			return FALSE;
		}
		$item = array( );
		$item['key'] = "dangdang_".$id;
		preg_match( "%<h1>(.+?)</h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<span.+?id=\"salePriceTag\">￥(.+?)</span></p>%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%var oldimage = '(.+?)';%is", $html, $matches );
		$item['img'] = $matches[1];
		$dd_ad_client = Yii::app( )->config->get( "dd_ad_client" );
		$item['url'] = "http://union.dangdang.com/transfer.php?sys_id=1&ad_type=10&from=".$dd_ad_client."&backurl=http%3A%2F%2Fproduct.dangdang.com%2Fproduct.aspx%3Fproduct_id%3D{$id}";
		$item['author'] = "dangdang";
		return $item;
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
			if ( isset( $params['product_id'] ) )
			{
				$id = $params['product_id'];
				return $id;
			}
			if ( isset( $params['default_product_id'] ) )
			{
				$id = $params['default_product_id'];
			}
		}
		return $id;
	}

}

?>
