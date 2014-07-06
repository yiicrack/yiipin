<?php
/**
 * TOP API: taobao.shop.item.get request
 * 
 * @author auto create
 * @since 1.0, 2012-12-03 16:38:12
 */
class ShopItemGetRequest
{
	/** 
	 * 商品ID
	 **/
	private $auctionId;
	
	/** 
	 * 待查询指标：ItemInfo数据结构的公开信息字段列表，以半角逗号（,）分割
	 **/
	private $fields;
	
	/** 
	 * 新老客户维度，其中：
0=不区分新老客户
1=区分新老客户
	 **/
	private $isOld;
	
	/** 
	 * 统计时间窗口：其中
“1D”=为最近1天
“3D”=最近3天
“7D“=为最近7天
“30D“=为最近30天
“60D“=为最近60天
“90D“=为最近90天
	 **/
	private $scope;
	
	/** 
	 * 来源细分粒度，其中：
0=不区分来源细分 2=按照2级来源细分
	 **/
	private $src;
	
	private $apiParas = array();
	
	public function setAuctionId($auctionId)
	{
		$this->auctionId = $auctionId;
		$this->apiParas["auction_id"] = $auctionId;
	}

	public function getAuctionId()
	{
		return $this->auctionId;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setIsOld($isOld)
	{
		$this->isOld = $isOld;
		$this->apiParas["is_old"] = $isOld;
	}

	public function getIsOld()
	{
		return $this->isOld;
	}

	public function setScope($scope)
	{
		$this->scope = $scope;
		$this->apiParas["scope"] = $scope;
	}

	public function getScope()
	{
		return $this->scope;
	}

	public function setSrc($src)
	{
		$this->src = $src;
		$this->apiParas["src"] = $src;
	}

	public function getSrc()
	{
		return $this->src;
	}

	public function getApiMethodName()
	{
		return "taobao.shop.item.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->auctionId,"auctionId");
		RequestCheckUtil::checkNotNull($this->fields,"fields");
		RequestCheckUtil::checkNotNull($this->isOld,"isOld");
		RequestCheckUtil::checkNotNull($this->scope,"scope");
		RequestCheckUtil::checkNotNull($this->src,"src");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
