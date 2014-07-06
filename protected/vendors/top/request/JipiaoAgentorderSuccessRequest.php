<?php
class JipiaoAgentorderSuccessRequest
{

	private $orderId = NULL;
	private $successInfo = NULL;
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

	public function setSuccessInfo( $successInfo )
	{
		$this->successInfo = $successInfo;
		$this->apiParas['success_info'] = $successInfo;
	}

	public function getSuccessInfo( )
	{
		return $this->successInfo;
	}

	public function getApiMethodName( )
	{
		return "taobao.jipiao.agentorder.success";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checknotnull( $this->orderId, "orderId" );
		RequestCheckUtil::checknotnull( $this->successInfo, "successInfo" );
		RequestCheckUtil::checkmaxlistsize( $this->successInfo, 9, "successInfo" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
