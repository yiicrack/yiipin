<?php

class UserLikeShare extends ActiveRecord
{

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
		$this->updateCount( );
		if ( $this->isNewRecord )
		{
			$event = new Event( );
			$event->user_id = $this->share->user_id;
			$event->from_user_id = $this->user_id;
			$event->action = CHtml::link( $this->user->username, array(
				"person/index",
				"user_id" => $this->user_id
			), array( "target" => "_blank" ) )." 喜欢了你的分享";
			$event->image = $this->share->goods->image;
			$event->link = array(
				"share/view",
				"id" => $this->share_id
			);
			$event->save( );
			User::addcredit( $this->user_id, "share_like" );
			User::addcredit( $this->share_user_id, "share_be_liked" );
		}
		parent::aftersave( );
	}

	protected function afterDelete( )
	{
		$this->updateCount( );
		User::addcredit( $this->user_id, "share_like_del" );
		User::addcredit( $this->share_user_id, "share_be_liked_del" );
		parent::afterdelete( );
	}

	private function updateCount( )
	{
		$this->share->like_count = self::model( )->countByAttributes( array(
			"share_id" => $this->share_id
		) );
		$this->share->save( FALSE );
		$this->share_user->likeme_count = self::model( )->countByAttributes( array(
			"share_user_id" => $this->share_user_id
		) );
		$this->share_user->save( FALSE );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{user_like_share}}";
	}

	public function rules( )
	{
		return array(
			array( "share_id, user_id, share_user_id", "required" ),
			array( "share_id, user_id, share_user_id", "numerical", "integerOnly" => TRUE ),
			array( "share_id, user_id, share_user_id", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"share" => array(
				self::BELONGS_TO,
				"Share",
				"share_id"
			),
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			),
			"share_user" => array(
				self::BELONGS_TO,
				"User",
				"share_user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "share_id" => "Share", "user_id" => "User" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "share_id", $this->share_id );
		$criteria->compare( "user_id", $this->user_id );
		return new CActiveDataProvider( "UserLikeShare", array(
			"criteria" => $criteria
		) );
	}

}

?>
