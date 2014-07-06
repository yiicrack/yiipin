<?php

class QQItemCollect
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
		$item['key'] = "qq_".$id;
		preg_match( "%<span id=\"title\">(.+?)</span>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		if ( empty( $item['title'] ) )
		{
			preg_match( "%<h1 class=\"title\">(.+?)</h1>%is", $html, $matches );
			$item['title'] = strip_tags( $matches[1] );
		}
		preg_match( "%<span class=\"price price_now\" id=\"qq_price\"><span class=\"yen\">&yen;</span>(.+?)</span>%is", $html, $matches );
		$item['price'] = $matches[1];
		if ( empty( $item['price'] ) )
		{
			preg_match( "%<span class=\"price price_now\"><span class=\"yen\">&yen;(.+?)</span>%is", $html, $matches );
			$item['price'] = $matches[1];
		}
		preg_match( "%<img src=\"(.+?)\" class=\"good_img\" id=\"large_image\" />%is", $html, $matches );
		$item['img'] = trim( $matches[1] );
		$item['url'] = $url;
		$item['author'] = "qq";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = substr( $path, strrpos( $path, "/" ) );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
