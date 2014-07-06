<?php

class UserTag extends ActiveRecord
{

	public $modelName = "用户标签";

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
		return "{{user_tag}}";
	}

	public function rules( )
	{
		return array(
			array( "name", "required" ),
			array( "name", "length", "max" => 30 ),
			array( "id, name", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "user_id" => "用户ID", "name" => "标签名称" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name );
		return new CActiveDataProvider( "UserTag", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id ASC" )
		) );
	}

}

?>
