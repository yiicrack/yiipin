<?php
/**
 * TOP API: taobao.picture.delete request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class PictureDeleteRequest
{
	/** 
	 * 图片ID字符串,可以一个也可以一组,用英文逗号间隔,如450,120,155
	 **/
	private $pictureIds;
	
	private $apiParas = array();
	
	public function setPictureIds($pictureIds)
	{
		$this->pictureIds = $pictureIds;
		$this->apiParas["picture_ids"] = $pictureIds;
	}

	public function getPictureIds()
	{
		return $this->pictureIds;
	}

	public function getApiMethodName()
	{
		return "taobao.picture.delete";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->pictureIds,"pictureIds");
	}
}
