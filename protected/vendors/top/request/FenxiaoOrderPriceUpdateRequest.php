<?php
/**
 * TOP API: taobao.fenxiao.order.price.update request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class FenxiaoOrderPriceUpdateRequest
{
	/** 
	 * 单位是分，多个值用","分隔。负数表示减价，正数表示加价。
adjust_fee值的个数必须和sub_order_ids个数一样
	 **/
	private $adjustFee;
	
	/** 
	 * 单位是分,值不能小于0,值必须在采购单可改的范围内。
post_fee和sub_order_ids  至少有一组不能为空
	 **/
	private $postFee;
	
	/** 
	 * 采购单id
	 **/
	private $purchaseOrderId;
	
	/** 
	 * 采购子单id
	 **/
	private $subOrderIds;
	
	private $apiParas = array();
	
	public function setAdjustFee($adjustFee)
	{
		$this->adjustFee = $adjustFee;
		$this->apiParas["adjust_fee"] = $adjustFee;
	}

	public function getAdjustFee()
	{
		return $this->adjustFee;
	}

	public function setPostFee($postFee)
	{
		$this->postFee = $postFee;
		$this->apiParas["post_fee"] = $postFee;
	}

	public function getPostFee()
	{
		return $this->postFee;
	}

	public function setPurchaseOrderId($purchaseOrderId)
	{
		$this->purchaseOrderId = $purchaseOrderId;
		$this->apiParas["purchase_order_id"] = $purchaseOrderId;
	}

	public function getPurchaseOrderId()
	{
		return $this->purchaseOrderId;
	}

	public function setSubOrderIds($subOrderIds)
	{
		$this->subOrderIds = $subOrderIds;
		$this->apiParas["sub_order_ids"] = $subOrderIds;
	}

	public function getSubOrderIds()
	{
		return $this->subOrderIds;
	}

	public function getApiMethodName()
	{
		return "taobao.fenxiao.order.price.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMinValue($this->postFee,0,"postFee");
		RequestCheckUtil::checkNotNull($this->purchaseOrderId,"purchaseOrderId");
	}
}
