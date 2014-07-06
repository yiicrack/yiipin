<?php
class JipiaoAgentordersGetRequest
{

	private $status = NULL;
	private $apiParas = array( );

	public function setStatus( $status )
	{
		$this->status = $status;
		$this->apiParas['status'] = $status;
	}

	public function getStatus( )
	{
		return $this->status;
	}

	public function getApiMethodName( )
	{
		return "taobao.jipiao.agentorders.get";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

?>
