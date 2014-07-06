<?php

class Event extends ActiveRecord
{

	public $modelName = "动态";

	public function __toString( )
	{
		return $this->id;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = time( );
		}
		$this->link = serialize( $this->link );
		return parent::beforesave( );
	}

	protected function afterFind( )
	{
		$this->link = unserialize( $this->link );
		if ( $this->image == "avatar" )
		{
			$this->image = WebUser::getucavatarsrc( $this->from_user_id, "small" );
		}
		else
		{
			$this->image = Yii::app( )->baseUrl.$this->image;
		}
		parent::afterfind( );
	}

	protected function afterSave( )
	{
		$ids = Yii::app( )->db->createCommand( "SELECT id FROM {{event}} WHERE user_id = ".$this->user_id." ORDER BY id DESC LIMIT 10" )->queryColumn( );
		if ( $ids )
		{
			Yii::app( )->db->createCommand( "DELETE FROM {{event}} WHERE user_id = ".$this->user_id." AND id NOT IN (".implode( ",", $ids ).")" )->execute( );
		}
		parent::aftersave( );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{event}}";
	}

	public function rules( )
	{
		return array(
			array( "user_id, from_user_id, action, image, link", "required" ),
			array( "user_id, from_user_id, created", "numerical", "integerOnly" => TRUE ),
			array( "action", "length", "max" => 300 ),
			array( "image", "length", "max" => 100 ),
			array( "id, user_id, from_user_id, action, image, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "user_id" => "所属用户ID", "from_user_id" => "来自用户ID", "action" => "动作", "image" => "相关图片", "link" => "相关链接", "created" => "发生时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "from_user_id", $this->from_user_id );
		$criteria->compare( "action", $this->action, TRUE );
		$criteria->compare( "image", $this->image, TRUE );
		$criteria->compare( "created", $this->created );
		return new CActiveDataProvider( "Event", array(
			"criteria" => $criteria
		) );
	}

}

?>
