<?php

class AmazonItemCollect
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
		$item['key'] = "amazon_".$id;
		preg_match( "%<h1 class=\"parseasinTitle\">(.+?)</h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<b class=\"priceLarge\">￥(.+?)</b>%is", $html, $matches );
		$item['price'] = intval( $matches[1] );
		preg_match( "%<img id=\"main-image\" src=\"(.+?)\" alt=\".*?\"  rel=\".+?\" .+?>%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "amazon";
		return $item;
	}

	public function get_id( $url )
	{
		return substr( $url, 31, 10 );
	}

}

?>
