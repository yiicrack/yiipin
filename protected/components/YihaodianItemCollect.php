<?php
class YihaodianItemCollect
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
		$item['key'] = "yihaodian_".$id;
		preg_match( "%<h2><font id=\"productMainName\">(.+?)</font></h2>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<span class=\".+?\" id=\"nonMemberPrice\">(.+?)</span>%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%<img id=\"productImg\"   src=\"(.+?)\"%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "yihaodian";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$id = str_replace( "/product/", "", $path );
		return $id;
	}

}

?>
