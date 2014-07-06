<?php
/**
 * TOP API: taobao.widget.cartitem.add request
 * 
 * @author auto create
 * @since 1.0, 2012-04-01 12:37:07
 */
class WidgetCartitemAddRequest
{
	/** 
	 * 要购买的商品的数字id，同Item的num_iid字段
	 **/
	private $itemId;
	
	/** 
	 * 需要购买的数量，至少购买1件
	 **/
	private $quantity;
	
	/** 
	 * 要购买的sku的id，如果是无sku的商品此字段不传，如果是有sku的商品必需指定sku_id。同sku的sku_id字段
	 **/
	private $skuId;
	
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

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		$this->apiParas["quantity"] = $quantity;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setSkuId($skuId)
	{
		$this->skuId = $skuId;
		$this->apiParas["sku_id"] = $skuId;
	}

	public function getSkuId()
	{
		return $this->skuId;
	}

	public function getApiMethodName()
	{
		return "taobao.widget.cartitem.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->itemId,"itemId");
		RequestCheckUtil::checkNotNull($this->quantity,"quantity");
		RequestCheckUtil::checkMaxValue($this->quantity,999999,"quantity");
		RequestCheckUtil::checkMinValue($this->quantity,1,"quantity");
		RequestCheckUtil::checkMinValue($this->skuId,1,"skuId");
	}
}
