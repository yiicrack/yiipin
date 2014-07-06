<?php

class MbaobaoItemCollect
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
		$item['key'] = "mbaobao_".$id;
		preg_match( "%<h1 class=\"goods-title\">(.+?)<span class=\"goods-title-sub\">.*?</span></h1>%is", $html, $matches );
		$item['title'] = strip_tags( $matches[1] );
		preg_match( "%<span class=\"g-p-t\">麦包价：</span><span class=\"g-p-n\"><em>￥</em>(.+?)</span>%is", $html, $matches );
		$item['price'] = $matches[1];
		preg_match( "%<a class=\"js_goods_image_url cloud-zoom\".+?<img src=\"(.+?)\" width=\"\\d+?\" height=\"\\d+?\" class=\"js_goods_spic_url\"></a>%is", $html, $matches );
		$item['img'] = $matches[1];
		$item['url'] = $url;
		$item['author'] = "mbaobao";
		return $item;
	}

	public function get_id( $url )
	{
		$id = 0;
		$path = parse_url( $url, PHP_URL_PATH );
		$path = str_replace( "/pshow-", "", $path );
		$id = str_replace( ".html", "", $path );
		return $id;
	}

}

?>
