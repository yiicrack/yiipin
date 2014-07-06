<?php

class About extends ActiveRecord
{

	public $modelName = "关于我们";

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
		return "{{about}}";
	}

	public function rules( )
	{
		return array(
			array( "name, title, content", "required" ),
			array( "name", "length", "max" => 50 ),
			array( "title", "length", "max" => 90 ),
			array( "id, name, title, content", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "URL名称", "title" => "标题", "content" => "内容" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "title", $this->title, TRUE );
		$criteria->compare( "content", $this->content, TRUE );
		return new CActiveDataProvider( "About", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id ASC" )
		) );
	}

}

?>
