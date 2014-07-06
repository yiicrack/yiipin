<?php

class GroupFollow extends ActiveRecord
{

	public $modelName = "关注杂志";

	protected function afterSave( )
	{
		$this->updateCount( );
		if ( $this->isNewRecord )
		{
			User::addcredit( $this->user_id, "group_follow_add" );
		}
		parent::aftersave( );
	}

	protected function afterDelete( )
	{
		$this->updateCount( );
		User::addcredit( $this->user_id, "group_follow_del" );
		parent::afterdelete( );
	}

	private function updateCount( )
	{
		if ( $this->group !== NULL )
		{
			$this->group->follow_count = self::model( )->countByAttributes( array(
				"group_id" => $this->group_id
			) );
			$this->group->save( FALSE );
		}
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{group_follow}}";
	}

	public function rules( )
	{
		return array(
			array( "group_id, user_id", "required" ),
			array( "group_id, user_id", "numerical", "integerOnly" => TRUE ),
			array( "group_id, user_id", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"group" => array(
				self::BELONGS_TO,
				"Group",
				"group_id"
			),
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "group_id" => "Group", "user_id" => "User" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "group_id", $this->group_id );
		$criteria->compare( "user_id", $this->user_id );
		return new CActiveDataProvider( "GroupFollow", array(
			"criteria" => $criteria
		) );
	}

}

?>
