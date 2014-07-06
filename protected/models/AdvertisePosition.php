<?php

class AdvertisePosition extends ActiveRecord
{

	public $modelName = "广告位";

	const TYPE_SINGLE = "独占广告";
	const TYPE_MULTIPLE = "共存广告";

	public function __toString( )
	{
		return $this->name;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{advertise_position}}";
	}

	public function rules( )
	{
		return array(
			array( "name, type, width, height", "required" ),
			array( "width, height, price", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 90 ),
			array( "type", "length", "max" => 30 ),
			array( "intro", "safe" ),
			array( "id, name, type, width, height, price", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "广告位名称", "type" => "广告类型", "width" => "宽度", "height" => "高度", "price" => "价格", "intro" => "介绍" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "type", $this->type );
		$criteria->compare( "width", $this->width );
		$criteria->compare( "height", $this->height );
		$criteria->compare( "price", $this->price );
		return new CActiveDataProvider( "AdvertisePosition", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

	public function getLabel( )
	{
		return "{$this->name}（{$this->type}，尺寸{$this->width}×{$this->height}）";
	}

}

?>
