<?php

class Item extends ActiveRecord
{

	const TYPE_GROUP = "group";
	const TYPE_SHARE = "share";

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{item}}";
	}

	public function rules( )
	{
		return array(
			array( "item_id, user_id", "numerical", "integerOnly" => TRUE ),
			array( "id", "length", "max" => 17 ),
			array( "type", "length", "max" => 5 ),
			array( "id, type, item_id, user_id", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "Id", "type" => "Type", "item_id" => "Item", "user_id" => "User" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id, TRUE );
		$criteria->compare( "type", $this->type, TRUE );
		$criteria->compare( "item_id", $this->item_id );
		$criteria->compare( "user_id", $this->user_id );
		return new CActiveDataProvider( "Item", array(
			"criteria" => $criteria
		) );
	}

	public function getData( )
	{
		if ( $this->type == self::TYPE_GROUP )
		{
			return Group::model( )->findByPk( $this->item_id );
		}
		if ( $this->type == self::TYPE_SHARE )
		{
			return Share::model( )->findByPk( $this->item_id );
		}
	}

}

?>
