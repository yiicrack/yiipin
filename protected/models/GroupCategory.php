<?php

class GroupCategory extends ActiveRecord
{

	public $modelName = "杂志类别";

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
		return "{{group_category}}";
	}

	public function rules( )
	{
		return array(
			array( "name, sortnum", "required" ),
			array( "sortnum, group_count", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 100 ),
			array( "id, name, sortnum, group_count", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "名称", "sortnum" => "排序数", "group_count" => "杂志数量" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		$criteria->compare( "group_count", $this->group_count );
		return new CActiveDataProvider( "GroupCategory", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.sortnum ASC" )
		) );
	}

}

?>
