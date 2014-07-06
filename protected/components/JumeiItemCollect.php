<?php

class JumeiItemCollect
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
		$item['key'] = "jumei_".$id;
		preg_match( "%<meta name=\"description\" content=\"(.+?)\"/>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<span class=\"big_price\"><label>¥</label>(.+?)</span>%is", $html, $matches );
		$item['price'] = strip_tags( $matches[1] );
		preg_match( "%var share_pic = \"(.+?)\";%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "jumei";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = str_replace( "/product_", "", $path );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
