<?php
/**
 * TOP API: taobao.fenxiao.product.skus.get request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class FenxiaoProductSkusGetRequest
{
	/** 
	 * 产品ID
	 **/
	private $productId;
	
	private $apiParas = array();
	
	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function getApiMethodName()
	{
		return "taobao.fenxiao.product.skus.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->productId,"productId");
	}
}
