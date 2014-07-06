<?php

class LafasoItemCollect
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
		$item['key'] = "lafaso_".$id;
		preg_match( "%<span class=\"pname\">(.+?)</span>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<b class=\"c6\">乐 蜂 价：</b><em><b>￥</b><strong>(.+?)</strong></em>%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%<img class=\"jqzoom\" alt=\"(.+?)\" src=\".+?\" />%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "lafaso";
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
