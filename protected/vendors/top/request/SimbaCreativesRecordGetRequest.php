<?php
/**
 * TOP API: taobao.simba.creatives.record.get request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class SimbaCreativesRecordGetRequest
{
	/** 
	 * 创意Id数组，最多200个
	 **/
	private $creativeIds;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setCreativeIds($creativeIds)
	{
		$this->creativeIds = $creativeIds;
		$this->apiParas["creative_ids"] = $creativeIds;
	}

	public function getCreativeIds()
	{
		return $this->creativeIds;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.creatives.record.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->creativeIds,"creativeIds");
		RequestCheckUtil::checkMaxListSize($this->creativeIds,200,"creativeIds");
	}
}
