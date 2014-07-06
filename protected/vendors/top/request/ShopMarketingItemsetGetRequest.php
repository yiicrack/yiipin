<?php
/**
 * TOP API: taobao.shop.marketing.itemset.get request
 * 
 * @author auto create
 * @since 1.0, 2012-12-03 16:38:12
 */
class ShopMarketingItemsetGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.shop.marketing.itemset.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
