<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class JipiaoAgentorderConfirmRequest
{

	private $latestTicketTime = NULL;
	private $orderId = NULL;
	private $apiParas = array( );

	public function setLatestTicketTime( $lastTicketTime )
	{
		$this->latestTicketTime = $lastTicketTime;
		$this->apiParas['latest_ticket_time'] = $lastTicketTime;
	}

	public function getLatestTicketTime( )
	{
		return $this->latestTicketTime;
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
		return "taobao.jipiao.agentorder.confirm";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checknotnull( $this->latestTicketTime, "latestTicketTime" );
		RequestCheckUtil::checknotnull( $this->orderId, "orderId" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
