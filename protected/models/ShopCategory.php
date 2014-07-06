<?php
class ShopCategory extends ActiveRecord
{

	public $modelName = "店铺分类";

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
		return "{{shop_category}}";
	}

	public function rules( )
	{
		return array(
			array( "parent_id, name, sortnum", "required" ),
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
		return array( "id" => "ID", "parent_id" => "父类ID", "name" => "分类名称", "sortnum" => "排序数字" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "parent_id", $this->parent_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		return new CActiveDataProvider( "ShopCategory", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.parent_id ASC, t.sortnum ASC" )
		) );
	}

}

?>
