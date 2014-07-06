<?php
/**
 * TOP API: taobao.sellercenter.subuser.permissions.roles.get request
 * 
 * @author auto create
 * @since 1.0, 2012-07-07 12:38:51
 */
class SellercenterSubuserPermissionsRolesGetRequest
{
	/** 
	 * 子账号昵称(子账号标识)
	 **/
	private $nick;
	
	private $apiParas = array();
	
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
		return "taobao.sellercenter.subuser.permissions.roles.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->nick,"nick");
		RequestCheckUtil::checkMaxLength($this->nick,100,"nick");
	}
}
