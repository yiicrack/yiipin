<?php
/**
 * TOP API: taobao.promotion.membergrade.set request
 * 
 * @author auto create
 * @since 1.0, 2011-09-09 13:49:16
 */
class PromotionMembergradeSetRequest
{
	/** 
	 * 买家数字ID
	 **/
	private $buyerId;
	
	/** 
	 * 买家会员级别 general：普通会员 senior ：高级会员 vip：VIP会员 king：至尊VIP
	 **/
	private $grade;
	
	private $apiParas = array();
	
	public function setBuyerId($buyerId)
	{
		$this->buyerId = $buyerId;
		$this->apiParas["buyer_id"] = $buyerId;
	}

	public function getBuyerId()
	{
		return $this->buyerId;
	}

	public function setGrade($grade)
	{
		$this->grade = $grade;
		$this->apiParas["grade"] = $grade;
	}

	public function getGrade()
	{
		return $this->grade;
	}

	public function getApiMethodName()
	{
		return "taobao.promotion.membergrade.set";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->buyerId,"buyerId");
		RequestCheckUtil::checkNotNull($this->grade,"grade");
	}
}