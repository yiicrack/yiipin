<?php
/**
 * TOP API: taobao.postage.delete request
 * 
 * @author auto create
 * @since 1.0, 2011-09-09 13:49:16
 */
class PostageDeleteRequest
{
	/** 
	 * 邮费模板id
	 **/
	private $postageId;
	
	private $apiParas = array();
	
	public function setPostageId($postageId)
	{
		$this->postageId = $postageId;
		$this->apiParas["postage_id"] = $postageId;
	}

	public function getPostageId()
	{
		return $this->postageId;
	}

	public function getApiMethodName()
	{
		return "taobao.postage.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->postageId,"postageId");
	}
}