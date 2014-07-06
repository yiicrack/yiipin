<?php

class AdvertiseTemplate extends ActiveRecord
{

	public $modelName = "广告模板";

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
		return "{{advertise_template}}";
	}

	public function rules( )
	{
		return array(
			array( "name, description, template", "required" ),
			array( "id", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 90 ),
			array( "id, name, description, template", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "模板名称", "description" => "模板简介", "template" => "模板代码" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "description", $this->description, TRUE );
		$criteria->compare( "template", $this->template, TRUE );
		return new CActiveDataProvider( "AdvertiseTemplate", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
