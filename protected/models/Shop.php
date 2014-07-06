<?php
class Shop extends ActiveRecord
{

	public $modelName = "好店";
	private $old_nick = NULL;

	public function __toString( )
	{
		return $this->name;
	}

	protected function afterFind( )
	{
		$this->old_nick = $this->nick;
		return parent::afterfind( );
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
			$this->updated = date( "Y-m-d H:i:s" );
		}
		else
		{
			$this->updated = date( "Y-m-d H:i:s" );
		}
		return parent::beforesave( );
	}

	protected function beforeValidate( )
	{
		if ( $this->nick != $this->old_nick )
		{
			try
			{
				$this->updateTaoBaoShop( );
			}
			catch ( CException $e )
			{
				$this->addError( "nick", $e->getMessage( ) );
			}
		}
		return parent::beforevalidate( );
	}

	private function updateTaoBaoKeUrl( )
	{
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$req = new TaobaokeShopsConvertRequest( );
		$req->setFields( "shop_title, click_url" );
		if ( Yii::app( )->config->get( "taobao_username" ) )
		{
			$req->setNick( Yii::app( )->config->get( "taobao_username" ) );
		}
		if ( Yii::app( )->config->get( "taobao_pid" ) )
		{
			$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
		}
		$req->setSellerNicks( $this->nick );
		$resp = $topclient->execute( $req );
		$res = ( array )$resp;
		if ( $res['code'] )
		{
			if ( $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest" )
			{
				exit( json_encode( array(
					"data" => $res
				) ) );
			}
			throw new CException( "调用淘宝客API（taobao.taobaoke.shops.convert）发生错误（可能是权限不足，需要淘宝客中级包api（增值）权限）：".implode( "; ", $res ) );
		}
		if ( !isset( $resp->taobaoke_shops->taobaoke_shop ) )
		{
			return FALSE;
		}
		$shop = ( array )$resp->taobaoke_shops->taobaoke_shop;
		$this->name = $shop['shop_title'];
		$this->url = $shop['click_url'];
	}

	private function updateTaoBaoShop( )
	{
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$req = new ShopGetRequest( );
		$req->setFields( "sid,cid,title,nick,desc,bulletin,pic_path,created,modified" );
		$req->setNick( $this->nick );
		$resp = $topclient->execute( $req );
		$res = ( array )$resp;
		if ( isset($res['code']) )
		{
			if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest" )
			{
				exit( json_encode( array(
					"data" => $res
				) ) );
			}
			throw new CException( "调用淘宝店铺API（taobao.shop.get）发生错误（可能是权限不足，需要店铺信息查询api权限）：".implode( "; ", $res ) );
		}
		if ( !isset( $resp->shop ) )
		{
			return FALSE;
		}
		$shop = ( array )$resp->shop;
		$this->logo = "http://logo.taobao.com/shop-logo".$shop['pic_path'];
	}

	public function getTopShares( $count = 3 )
	{
		return Share::model( )->findAllBySql( "SELECT t.* FROM {{share}} t JOIN {{goods}} g ON t.goods_id = g.id WHERE g.shop_id = ".$this->id." LIMIT {$count}" );
	}

	public function getAllTags( )
	{
		return preg_split( "/[\\s,]+/", $this->tags, -1, PREG_SPLIT_NO_EMPTY );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{shop}}";
	}

	public function rules( )
	{
		return array(
			array( "category_id, name, url", "required" ),
			array( "category_id, share_count", "numerical", "integerOnly" => TRUE ),
			array( "name, logo, nick, url", "length", "max" => 250 ),
			array( "tags", "safe" ),
			array( "id, category_id, name, logo, tags, nick, url, share_count, created, updated", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"category" => array(
				self::BELONGS_TO,
				"ShopCategory",
				"category_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "category_id" => "所属分类", "name" => "店铺名称", "logo" => "标识图片", "tags" => "店铺标签", "nick" => "卖家昵称", "url" => "店铺地址", "share_count" => "推荐数量", "created" => "添加时间", "updated" => "更新时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "category_id", $this->category_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "logo", $this->logo, TRUE );
		$criteria->compare( "tags", $this->tags, TRUE );
		$criteria->compare( "nick", $this->nick, TRUE );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "share_count", $this->share_count );
		$criteria->compare( "created", $this->created, TRUE );
		$criteria->compare( "updated", $this->updated, TRUE );
		return new CActiveDataProvider( "Shop", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
