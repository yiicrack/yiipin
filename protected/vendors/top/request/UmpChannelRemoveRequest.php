<?php
/**
 * TOP API: taobao.ump.channel.remove request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class UmpChannelRemoveRequest
{
	/** 
	 * 标示某个渠道的代码（由新增渠道时添加）。
	 **/
	private $channelKey;
	
	/** 
	 * 当前渠道中，需要删除的referer地址。
referers为空，删除当前渠道信息，同时清空当前渠道已关联的所有referer。
	 **/
	private $referers;
	
	private $apiParas = array();
	
	public function setChannelKey($channelKey)
	{
		$this->channelKey = $channelKey;
		$this->apiParas["channel_key"] = $channelKey;
	}

	public function getChannelKey()
	{
		return $this->channelKey;
	}

	public function setReferers($referers)
	{
		$this->referers = $referers;
		$this->apiParas["referers"] = $referers;
	}

	public function getReferers()
	{
		return $this->referers;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.channel.remove";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->channelKey,"channelKey");
	}
}
