<?php

class JingDongItemCollect
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
		$item['key'] = "jingdong_".$id;
		preg_match( "%<h1>(.+?)</h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%京东价：￥(.+?)。%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%jqimg=\"(.+?)\"%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "360buy";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = str_replace( "/product/", "", $path );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
