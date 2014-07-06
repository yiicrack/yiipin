<?php

class AdvertiseClick extends ActiveRecord
{

	public $modelName = "广告点击记录";

	public function __toString( )
	{
		return $this->url;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{advertise_click}}";
	}

	public function rules( )
	{
		return array(
			array( "url, click_count", "required" ),
			array( "click_count", "numerical", "integerOnly" => TRUE ),
			array( "url", "length", "max" => 300 ),
			array( "id, url, click_count", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "url" => "广告跳转地址", "click_count" => "点击次数" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "click_count", $this->click_count );
		return new CActiveDataProvider( "AdvertiseClick", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
