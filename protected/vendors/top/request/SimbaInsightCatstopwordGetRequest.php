<?php
/**
 * TOP API: taobao.simba.insight.catstopword.get request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class SimbaInsightCatstopwordGetRequest
{
	/** 
	 * 类目id数组，最大长度200
	 **/
	private $categoryIds;
	
	/** 
	 * 主人昵称
	 **/
	private $nick;
	
	/** 
	 * 最大返回数量(1-100)
	 **/
	private $resultNum;
	
	private $apiParas = array();
	
	public function setCategoryIds($categoryIds)
	{
		$this->categoryIds = $categoryIds;
		$this->apiParas["category_ids"] = $categoryIds;
	}

	public function getCategoryIds()
	{
		return $this->categoryIds;
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

	public function setResultNum($resultNum)
	{
		$this->resultNum = $resultNum;
		$this->apiParas["result_num"] = $resultNum;
	}

	public function getResultNum()
	{
		return $this->resultNum;
	}

	public function getApiMethodName()
	{
		return "taobao.simba.insight.catstopword.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->categoryIds,"categoryIds");
		RequestCheckUtil::checkMaxListSize($this->categoryIds,200,"categoryIds");
		RequestCheckUtil::checkNotNull($this->resultNum,"resultNum");
		RequestCheckUtil::checkMaxValue($this->resultNum,100,"resultNum");
		RequestCheckUtil::checkMinValue($this->resultNum,1,"resultNum");
	}
}
