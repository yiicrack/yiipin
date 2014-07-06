<?php

class MoonbasaItemCollect
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
		$item['key'] = "moonbasa_".$id;
		preg_match( "%Pname: '(.+?)',%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%Value: (.+?),%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%<img id=\"bigimg\" src=\"(.+?)\".+?jqimg=\".+?\" />%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "moonbasa";
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
