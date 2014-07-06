<?php
/**
 * TOP API: taobao.shop.marketing.itemset.set request
 * 
 * @author auto create
 * @since 1.0, 2012-12-03 16:38:12
 */
class ShopMarketingItemsetSetRequest
{
	/** 
	 * 店铺待统计复购率的商品组合，其中：
不同组合之间用“|”分割；
组内商品之间用“,”分割，且每组第一个商品用做分母。
	 **/
	private $itemset;
	
	private $apiParas = array();
	
	public function setItemset($itemset)
	{
		$this->itemset = $itemset;
		$this->apiParas["itemset"] = $itemset;
	}

	public function getItemset()
	{
		return $this->itemset;
	}

	public function getApiMethodName()
	{
		return "taobao.shop.marketing.itemset.set";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->itemset,"itemset");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
