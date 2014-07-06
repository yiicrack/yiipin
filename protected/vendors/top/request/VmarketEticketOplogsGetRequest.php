<?php
class VmarketEticketOplogsGetRequest
{

	private $code = NULL;
	private $codemerchantId = NULL;
	private $endTime = NULL;
	private $mobile = NULL;
	private $pageNo = NULL;
	private $pageSize = NULL;
	private $posid = NULL;
	private $sort = NULL;
	private $startTime = NULL;
	private $type = NULL;
	private $apiParas = array( );

	public function setCode( $code )
	{
		$this->code = $code;
		$this->apiParas['code'] = $code;
	}

	public function getCode( )
	{
		return $this->code;
	}

	public function setCodemerchantId( $codemerchantId )
	{
		$this->codemerchantId = $codemerchantId;
		$this->apiParas['codemerchant_id'] = $codemerchantId;
	}

	public function getCodemerchantId( )
	{
		return $this->codemerchantId;
	}

	public function setEndTime( $endTime )
	{
		$this->endTime = $endTime;
		$this->apiParas['end_time'] = $endTime;
	}

	public function getEndTime( )
	{
		return $this->endTime;
	}

	public function setMobile( $mobile )
	{
		$this->mobile = $mobile;
		$this->apiParas['mobile'] = $mobile;
	}

	public function getMobile( )
	{
		return $this->mobile;
	}

	public function setPageNo( $pageNo )
	{
		$this->pageNo = $pageNo;
		$this->apiParas['page_no'] = $pageNo;
	}

	public function getPageNo( )
	{
		return $this->pageNo;
	}

	public function setPageSize( $pageSize )
	{
		$this->pageSize = $pageSize;
		$this->apiParas['page_size'] = $pageSize;
	}

	public function getPageSize( )
	{
		return $this->pageSize;
	}

	public function setPosid( $posId )
	{
		$this->posid = $posId;
		$this->apiParas['posid'] = $posId;
	}

	public function getPosid( )
	{
		return $this->posid;
	}

	public function setSort( $sort )
	{
		$this->sort = $sort;
		$this->apiParas['sort'] = $sort;
	}

	public function getSort( )
	{
		return $this->sort;
	}

	public function setStartTime( $startTime )
	{
		$this->startTime = $startTime;
		$this->apiParas['start_time'] = $startTime;
	}

	public function getStartTime( )
	{
		return $this->startTime;
	}

	public function setType( $type )
	{
		$this->type = $type;
		$this->apiParas['type'] = $type;
	}

	public function getType( )
	{
		return $this->type;
	}

	public function getApiMethodName( )
	{
		return "taobao.vmarket.eticket.oplogs.get";
	}

	public function getApiParas( )
	{
		return $this->apiParas;
	}

	public function check( )
	{
		RequestCheckUtil::checknotnull( $this->type, "type" );
	}

	public function putOtherTextParam( $key, $value )
	{
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}

}

