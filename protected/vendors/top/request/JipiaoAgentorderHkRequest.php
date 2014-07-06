<?php
class JipiaoAgentorderHkRequest
{

	private $hkInfo = NULL;
	private $orderId = NULL;
	private $apiParas = array( );

	public function setHkInfo( $hkInfo )
	{
		$this->hkInfo = $hkInfo;
		$this->apiParas['hk_info'] = $hkInfo;
	}

	public function getHkInfo( )
	{
		return $this->hkInfo;
	}

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
		return "taobao.jipiao.agentorder.hk";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checknotnull( $this->hkInfo, "hkInfo" );
		RequestCheckUtil::checkmaxlistsize( $this->hkInfo, 9, "hkInfo" );
		RequestCheckUtil::checknotnull( $this->orderId, "orderId" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
