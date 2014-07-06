<?php
class JipiaoAgentorderGetRequest
{

	private $orderId = NULL;
	private $apiParas = array( );

	public function setOrderId( $orderId )
	{
		$this->orderId = $orderId;
		$this->apiParas['order_id'] = $orderId;
	}

	public function getOrderId( )
	{
		return $this->orderId;
	}

	public function getApiMethodName( )
	{
		return "taobao.jipiao.agentorder.get";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checknotnull( $this->orderId, "orderId" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
