<?php
/**
 * TOP API: taobao.marketing.promotion.add request
 * 
 * @author auto create
 * @since 1.0, 2011-09-09 13:49:16
 */
class MarketingPromotionAddRequest
{
	/** 
	 * 减价件数。只有discount_type=PRICE有效，1只减一件，0表示多件，不为1的其他数字都作0处理；discount_type=DISCOUNT该参数无效。
	 **/
	private $decreaseNum;
	
	/** 
	 * 折扣类型，可选PRICE(优惠价格)和DISCOUNT(折扣)，填写其它值返回错误
	 **/
	private $discountType;
	
	/** 
	 * 优惠额度，若优惠类型为折扣（DISCOUNT），则传入该商品的折扣比例，有效值范围：0.01-9.99，支持小数点后2位。
若优惠类型为优惠价格(PRICE)，传入该商品的优惠价，单位：元，支持小数点后2位
	 **/
	private $discountValue;
	
	/** 
	 * 优惠结束时间
	 **/
	private $endDate;
	
	/** 
	 * 优惠策略适用的商品数字ID列表，一次最多设置10个商品，以半角','号分割。
	 **/
	private $numIids;
	
	/** 
	 * 活动描述，最多30个字符
	 **/
	private $promotionDesc;
	
	/** 
	 * 活动名称，最多5个字符。默认为卖家促销
（注意：为了向下兼容，超过5个字符就当做活动描述处理，这个兼容方案从2011-6-28号发布后保持15-20天，希望ISV们在这期间处理好）
	 **/
	private $promotionTitle;
	
	/** 
	 * 优惠开始时间
	 **/
	private $startDate;
	
	/** 
	 * 标签ID。这里的标签可以使用taobao.marketing.tag.add这个API创建得到的标签ID，也可以使用淘宝提供的公共标签:1=全网会员
	 **/
	private $tagId;
	
	private $apiParas = array();
	
	public function setDecreaseNum($decreaseNum)
	{
		$this->decreaseNum = $decreaseNum;
		$this->apiParas["decrease_num"] = $decreaseNum;
	}

	public function getDecreaseNum()
	{
		return $this->decreaseNum;
	}

	public function setDiscountType($discountType)
	{
		$this->discountType = $discountType;
		$this->apiParas["discount_type"] = $discountType;
	}

	public function getDiscountType()
	{
		return $this->discountType;
	}

	public function setDiscountValue($discountValue)
	{
		$this->discountValue = $discountValue;
		$this->apiParas["discount_value"] = $discountValue;
	}

	public function getDiscountValue()
	{
		return $this->discountValue;
	}

	public function setEndDate($endDate)
	{
		$this->endDate = $endDate;
		$this->apiParas["end_date"] = $endDate;
	}

	public function getEndDate()
	{
		return $this->endDate;
	}

	public function setNumIids($numIids)
	{
		$this->numIids = $numIids;
		$this->apiParas["num_iids"] = $numIids;
	}

	public function getNumIids()
	{
		return $this->numIids;
	}

	public function setPromotionDesc($promotionDesc)
	{
		$this->promotionDesc = $promotionDesc;
		$this->apiParas["promotion_desc"] = $promotionDesc;
	}

	public function getPromotionDesc()
	{
		return $this->promotionDesc;
	}

	public function setPromotionTitle($promotionTitle)
	{
		$this->promotionTitle = $promotionTitle;
		$this->apiParas["promotion_title"] = $promotionTitle;
	}

	public function getPromotionTitle()
	{
		return $this->promotionTitle;
	}

	public function setStartDate($startDate)
	{
		$this->startDate = $startDate;
		$this->apiParas["start_date"] = $startDate;
	}

	public function getStartDate()
	{
		return $this->startDate;
	}

	public function setTagId($tagId)
	{
		$this->tagId = $tagId;
		$this->apiParas["tag_id"] = $tagId;
	}

	public function getTagId()
	{
		return $this->tagId;
	}

	public function getApiMethodName()
	{
		return "taobao.marketing.promotion.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->discountType,"discountType");
		RequestCheckUtil::checkNotNull($this->discountValue,"discountValue");
		RequestCheckUtil::checkNotNull($this->endDate,"endDate");
		RequestCheckUtil::checkNotNull($this->numIids,"numIids");
		RequestCheckUtil::checkMaxListSize($this->numIids,10,"numIids");
		RequestCheckUtil::checkNotNull($this->startDate,"startDate");
		RequestCheckUtil::checkNotNull($this->tagId,"tagId");
	}
}