<?php
class ExchangeCategory extends ActiveRecord
{

	public $modelName = "积分兑换分类";

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
		return "{{exchange_category}}";
	}

	public function rules( )
	{
		return array(
			array( "name, sortnum", "required" ),
			array( "parent_id, sortnum", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 256 ),
			array( "id, parent_id, name, sortnum", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "parent_id" => "父类ID", "name" => "分类名称", "sortnum" => "排序数" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "parent_id", $this->parent_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		return new CActiveDataProvider( "ExchangeCategory", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.sortnum DESC" )
		) );
	}

}

?>
