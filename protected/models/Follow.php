<?php
class Follow extends ActiveRecord
{

	public $modelName = "我关注的用户";

	public function __toString( )
	{
		return $this->id;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		return parent::beforesave( );
	}

	protected function afterSave( )
	{
		$groups = Group::model( )->findAllByAttributes( array(
			"user_id" => $this->to_user_id
		) );
		foreach ( $groups as $group )
		{
			$follow = GroupFollow::model( )->findByAttributes( array(
				"group_id" => $group->id,
				"user_id" => $this->user_id
			) );
			if ( $follow === NULL )
			{
				$follow = new GroupFollow( );
				$follow->group_id = $group->id;
				$follow->user_id = $this->user_id;
				$follow->save( FALSE );
			}
		}
		$this->updateCount( );
		if ( $this->isNewRecord )
		{
			$event = new Event( );
			$event->user_id = $this->to_user_id;
			$event->from_user_id = $this->user_id;
			$event->action = CHtml::link( $this->user->username, array(
				"person/index",
				"user_id" => $this->user_id
			), array( "target" => "_blank" ) )." 关注了你和你所有的杂志";
			$event->image = "avatar";
			$event->link = array(
				"person/index",
				"user_id" => $this->user_id
			);
			$event->save( );
			User::addcredit( $this->user_id, "follow_add" );
		}
		parent::aftersave( );
	}

	protected function afterDelete( )
	{
		$groups = Group::model( )->findAllByAttributes( array(
			"user_id" => $this->to_user_id
		) );
		foreach ( $groups as $group )
		{
			$follow = GroupFollow::model( )->findByAttributes( array(
				"group_id" => $group->id,
				"user_id" => $this->user_id
			) );
			if ( $follow !== NULL )
			{
				$follow->delete( );
			}
		}
		$this->updateCount( );
		User::addcredit( $this->user_id, "follow_del" );
		parent::afterdelete( );
	}

	private function updateCount( )
	{
		$this->user->follow_count = self::countbyattributes( array(
			"user_id" => $this->user_id
		) );
		if ( !$this->user->save( FALSE ) )
		{
			throw new CException( print_r( $this->user->errors, TRUE ) );
		}
		$this->to_user->fans_count = self::countbyattributes( array(
			"to_user_id" => $this->user_id
		) );
		if ( !$this->to_user->save( FALSE ) )
		{
			throw new CException( print_r( $this->to_user->errors, TRUE ) );
		}
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{follow}}";
	}

	public function rules( )
	{
		return array(
			array( "user_id, to_user_id", "required" ),
			array( "user_id, to_user_id", "numerical", "integerOnly" => TRUE ),
			array( "id, user_id, to_user_id, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			),
			"to_user" => array(
				self::BELONGS_TO,
				"User",
				"to_user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "user_id" => "用户ID", "to_user_id" => "关注的用户ID", "created" => "创建时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "to_user_id", $this->to_user_id );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "Follow", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
