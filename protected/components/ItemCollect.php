<?php

class ItemCollect
{

	public $supported_sites = NULL;
	public $url = NULL;

	public function __construct( $url )
	{
		$this->url = $url;
		$this->supported_sites = array( "item.taobao.com" => "TaobaoItemCollect", "detail.tmall.com/" => "TaobaoItemCollect", "product.dangdang.com" => "DangDangItemCollect", "360buy.com/product/" => "JingDongItemCollect", "item.vancl.com" => "VanclItemCollect", "www.yintai.com/product/productdetail" => "YintaiItemCollect", "www.yihaodian.com/product/" => "YihaodianItemCollect", "mall.jumei.com/product_" => "JumeiItemCollect", "moonbasa.com/p-" => "MoonbasaItemCollect", "shopin.net/product/" => "ShopinItemCollect", "item.mbaobao.com" => "MbaobaoItemCollect", "www.lafaso.com/product/" => "LafasoItemCollect", "auction1.paipai.com" => "PaipaiItemCollect", "item.buy.qq.com" => "QQItemCollect", "product.m18.com/p-" => "M18ItemCollect" );
	}

	public function verify( )
	{
		foreach ( $this->supported_sites as $url => $value )
		{
			if ( !( strpos( $this->url, $url ) !== FALSE ) )
			{
				continue;
			}
			return TRUE;
		}
		return FALSE;
	}

	public function parse( )
	{
		$item_collect = "";
		foreach ( $this->supported_sites as $url => $value )
		{
			if ( strpos( $this->url, $url ) !== FALSE )
			{
				$item_collect = $value;
			}
		}
		if ( $item_collect )
		{
			$collect = new $item_collect( );
			$result = $collect->fetch( $this->url );
		}
		if ( $result )
		{
			return $result;
		}
		throw new CException( "抓取宝贝失败！" );
	}

}

?>
