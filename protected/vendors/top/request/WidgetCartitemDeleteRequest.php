<?php
/**
 * TOP API: taobao.widget.cartitem.delete request
 * 
 * @author auto create
 * @since 1.0, 2012-04-01 12:37:07
 */
class WidgetCartitemDeleteRequest
{
	/** 
	 * 要删除的购物车记录id号
	 **/
	private $cartId;
	
	private $apiParas = array();
	
	public function setCartId($cartId)
	{
		$this->cartId = $cartId;
		$this->apiParas["cart_id"] = $cartId;
	}

	public function getCartId()
	{
		return $this->cartId;
	}

	public function getApiMethodName()
	{
		return "taobao.widget.cartitem.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->cartId,"cartId");
		RequestCheckUtil::checkMinValue($this->cartId,1,"cartId");
	}
}
