<?php

class GoodsCategory extends ActiveRecord
{

	public $modelName = "商品分类";

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
		return "{{goods_category}}";
	}

	public function rules( )
	{
		return array(
			array( "parent_id, name, sortnum, tag_groups", "required" ),
			array( "parent_id, sortnum", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 256 ),
			array( "keywords, description", "length", "max" => 500 ),
			array( "id, parent_id, name, keywords, description, sortnum", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"parent" => array(
				self::BELONGS_TO,
				"GoodsCategory",
				"parent_id"
			),
			"subcategories" => array(
				self::HAS_MANY,
				"GoodsCategory",
				"parent_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "parent_id" => "父类ID", "name" => "分类名称", "keywords" => "关键词", "description" => "描述", "sortnum" => "排序数", "tag_groups" => "标签分组" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "parent_id", $this->parent_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "keywords", $this->keywords, TRUE );
		$criteria->compare( "description", $this->description, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		return new CActiveDataProvider( "GoodsCategory", array(
			"criteria" => $criteria
		) );
	}

	public function getTags( $limit = 8, $offset = 0, $has_tag = TRUE )
	{
		$where = "";
		$groups = explode( "\r\n", trim( $this->tag_groups ) );
		if ( !isset( $groups[0] ) || $has_tag )
		{
			$where = " AND ght.group = '".$groups[0]."'";
		}
		return GoodsTag::model( )->findAllBySql( "SELECT DISTINCT t.* FROM {{goods_tag}} t JOIN {{goods_category_has_tag}} ght 
				ON t.id = ght.tag_id WHERE ght.category_id = ".$this->id." 
				AND ght.group NOT IN ('热门风格','当季流行','元素') {$where} 
			ORDER BY ght.sortnum ASC LIMIT {$offset},{$limit}" );
	}

}

?>
