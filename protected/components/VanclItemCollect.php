<?php

class VanclItemCollect
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
		$item['key'] = "vancl_".$id;
		preg_match( "%<h2>(.+?)</h2>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%价：<span>￥<strong>(.+?)</strong></span>%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%<img id=\"midimg\" src=\"(.+?)\"%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "vancl";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = str_replace( "/", "", $path );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
