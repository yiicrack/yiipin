<?php
class YintaiItemCollect
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
		$item['key'] = "yintai_".$id;
		preg_match( "%<h1 class=\"p-tit\">(.+?)</h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%\"YP\":\"(.+?)\"%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%{\"B\":\"(.+?)\",\"D\"%is", $html, $matches );
		$item['img'] = stripslashes( $matches[1] );
		$item['url'] = $url;
		$item['author'] = "yintai";
		return $item;
	}

	public function get_id( $url )
	{
		$value = parse_url( $url, PHP_URL_QUERY );
		parse_str( $value, $params );
		return $params['itemcode'];
	}

}

?>
