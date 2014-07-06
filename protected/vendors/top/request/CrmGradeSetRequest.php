<?php
/**
 * TOP API: taobao.crm.grade.set request
 * 
 * @author auto create
 * @since 1.0, 2011-09-09 13:49:16
 */
class CrmGradeSetRequest
{
	/** 
	 * 必须要在amount和count参数中选择一个<br>
amount参数的填写规范：升级到下一个级别的需要的交易额，单位为分,必须全部填写.例如10000,20000,30000，其中10000表示普通会员升级到高级会员需要达到100元的交易额。至尊VIP为最高等级，不需要填写。会员等级越高，所需交易额必须越高。
	 **/
	private $amount;
	
	/** 
	 * 必须要在amount和count参数中选择一个<br>
count参数的填写规范：
升级到下一个级别的需要的交易量,必须全部填写. 以逗号分隔,例如100,200,300，其中100表示普通会员升级到高级会员需要100笔交易。至尊VIP为最高等级，不需要填写。会员等级越高，交易量必须越高。
	 **/
	private $count;
	
	/** 
	 * 会员级别折扣率。会员等级越高，折扣必须越低。
950即9.5折，888折即8.88折8。出于安全原因，折扣现最低只能设置到700即7折。
	 **/
	private $discount;
	
	/** 
	 * 会员等级,必须全部填写。用逗号分隔。买家会员级别 1：普通会员 2 ：高级会员 3：VIP会员 4：至尊VIP
	 **/
	private $grade;
	
	private $apiParas = array();
	
	public function setAmount($amount)
	{
		$this->amount = $amount;
		$this->apiParas["amount"] = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function setCount($count)
	{
		$this->count = $count;
		$this->apiParas["count"] = $count;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function setDiscount($discount)
	{
		$this->discount = $discount;
		$this->apiParas["discount"] = $discount;
	}

	public function getDiscount()
	{
		return $this->discount;
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
		return "taobao.crm.grade.set";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMaxListSize($this->amount,3,"amount");
		RequestCheckUtil::checkMaxListSize($this->count,3,"count");
		RequestCheckUtil::checkNotNull($this->discount,"discount");
		RequestCheckUtil::checkMaxListSize($this->discount,4,"discount");
		RequestCheckUtil::checkNotNull($this->grade,"grade");
		RequestCheckUtil::checkMaxListSize($this->grade,4,"grade");
	}
}