<?php
class GoodsImage extends ActiveRecord
{

	public $modelName = "商品图片";

	public function __toString( )
	{
		return $this->id;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{goods_image}}";
	}

	public function rules( )
	{
		return array(
			array( "goods_id, url, position, taobao_id", "required" ),
			array( "goods_id, position, taobao_id", "numerical", "integerOnly" => TRUE ),
			array( "url", "length", "max" => 250 ),
			array( "id, goods_id, url, position, taobao_id", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "goods_id" => "商品ID", "url" => "图片地址", "position" => "图片位置", "taobao_id" => "淘宝图片ID" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "goods_id", $this->goods_id );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "position", $this->position );
		$criteria->compare( "taobao_id", $this->taobao_id );
		return new CActiveDataProvider( "GoodsImage", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
