<?php
/**
 * TOP API: taobao.scitem.map.delete request
 * 
 * @author auto create
 * @since 1.0, 2012-12-03 16:38:12
 */
class ScitemMapDeleteRequest
{
	/** 
	 * 后台商品ID
	 **/
	private $scItemId;
	
	/** 
	 * 分销商id
	 **/
	private $userId;
	
	private $apiParas = array();
	
	public function setScItemId($scItemId)
	{
		$this->scItemId = $scItemId;
		$this->apiParas["sc_item_id"] = $scItemId;
	}

	public function getScItemId()
	{
		return $this->scItemId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "taobao.scitem.map.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->scItemId,"scItemId");
		RequestCheckUtil::checkNotNull($this->userId,"userId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
