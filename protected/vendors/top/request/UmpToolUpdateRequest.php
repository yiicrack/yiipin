<?php
/**
 * TOP API: taobao.ump.tool.update request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class UmpToolUpdateRequest
{
	/** 
	 * 工具的内容，由sdk的marketingBuilder生成
	 **/
	private $content;
	
	/** 
	 * 工具id
	 **/
	private $toolId;
	
	private $apiParas = array();
	
	public function setContent($content)
	{
		$this->content = $content;
		$this->apiParas["content"] = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setToolId($toolId)
	{
		$this->toolId = $toolId;
		$this->apiParas["tool_id"] = $toolId;
	}

	public function getToolId()
	{
		return $this->toolId;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.tool.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->content,"content");
		RequestCheckUtil::checkNotNull($this->toolId,"toolId");
	}
}
