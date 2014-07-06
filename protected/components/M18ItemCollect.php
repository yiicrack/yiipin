<?php

class M18ItemCollect
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
		$item['key'] = "m18_".$id;
		preg_match( "%<h1 class=\".+?\">(.+?)</h1>%is", $html, $matches );
		$item['title'] = trim( strip_tags( $matches[1] ) );
		preg_match( "%<span id=\"stylePrice\">(.+?)</span>%is", $html, $matches );
		$item['price'] = intval( $matches[1] );
		preg_match( "%<img width=\"\\d+\" height=\"\\d+\" styleid=\".+?\" src=\".+?\" oriSrc=\"(.+?)\" blankSrc=\".+?\">%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "m18";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = str_replace( "/p-", "", $path );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
