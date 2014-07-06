<?php

class GoodsCategoryHasTag extends ActiveRecord
{

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{goods_category_has_tag}}";
	}

	public function rules( )
	{
		return array(
			array( "category_id, tag_id, group, sortnum", "required" ),
			array( "category_id, tag_id, sortnum", "numerical", "integerOnly" => TRUE ),
			array( "group", "length", "max" => 50 ),
			array( "category_id, tag_id, group", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"tag" => array(
				self::BELONGS_TO,
				"GoodsTag",
				"tag_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "category_id" => "Category", "tag_id" => "Tag", "group" => "Group", "sortnum" => "Sortnum" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "category_id", $this->category_id );
		$criteria->compare( "tag_id", $this->tag_id );
		$criteria->compare( "group", $this->group, TRUE );
		return new CActiveDataProvider( "GoodsCategoryHasTag", array(
			"criteria" => $criteria
		) );
	}

}

?>
