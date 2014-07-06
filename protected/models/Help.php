<?php

class Help extends ActiveRecord
{

	public $modelName = "帮助";

	public function __toString( )
	{
		return $this->title;
	}
	
	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{help}}";
	}

	public function rules( )
	{
		return array(
			array( "title, content, sortnum", "required" ),
			array( "sortnum", "numerical", "integerOnly" => TRUE ),
			array( "title", "length", "max" => 90 ),
			array( "id, title, content, sortnum", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "title" => "标题", "content" => "内容", "sortnum" => "排序数" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "title", $this->title, TRUE );
		$criteria->compare( "content", $this->content, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		return new CActiveDataProvider( "Help", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.sortnum DESC" )
		) );
	}

}

?>
