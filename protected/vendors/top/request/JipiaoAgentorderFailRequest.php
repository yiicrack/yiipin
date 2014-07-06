<?php
class JipiaoAgentorderFailRequest
{

	private $memo = NULL;
	private $orderId = NULL;
	private $reason = NULL;
	private $apiParas = array( );

	public function setMemo( $memo )
	{
		$this->memo = $memo;
		$this->apiParas['memo'] = $memo;
	}

	public function getMemo( )
	{
		return $this->memo;
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

	public function setReason( $reason )
	{
		$this->reason = $reason;
		$this->apiParas['reason'] = $reason;
	}

	public function getReason( )
	{
		return $this->reason;
	}

	public function getApiMethodName( )
	{
		return "taobao.jipiao.agentorder.fail";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checkmaxlength( $this->memo, 100, "memo" );
		RequestCheckUtil::checknotnull( $this->orderId, "orderId" );
		RequestCheckUtil::checknotnull( $this->reason, "reason" );
		RequestCheckUtil::checkmaxvalue( $this->reason, 5, "reason" );
		RequestCheckUtil::checkminvalue( $this->reason, 0, "reason" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
