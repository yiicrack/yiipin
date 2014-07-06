<?php
/**
 * TOP API: taobao.juwliserver.operationbanner.get request
 * 
 * @author auto create
 * @since 1.0, 2012-12-03 16:38:12
 */
class JuwliserverOperationbannerGetRequest
{
	/** 
	 * 请求类型，ios:0 android:1
	 **/
	private $requestType;
	
	private $apiParas = array();
	
	public function setRequestType($requestType)
	{
		$this->requestType = $requestType;
		$this->apiParas["request_type"] = $requestType;
	}

	public function getRequestType()
	{
		return $this->requestType;
	}

	public function getApiMethodName()
	{
		return "taobao.juwliserver.operationbanner.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->requestType,"requestType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
