<?php
/**
 * TOP API: taobao.wlb.item.combination.get request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class WlbItemCombinationGetRequest
{
	/** 
	 * 要查询的组合商品id
	 **/
	private $itemId;
	
	private $apiParas = array();
	
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["item_id"] = $itemId;
	}

	public function getItemId()
	{
		return $this->itemId;
	}

	public function getApiMethodName()
	{
		return "taobao.wlb.item.combination.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->itemId,"itemId");
	}
}
