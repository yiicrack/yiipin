<?php

class Sysmsg extends ActiveRecord
{

	public $modelName = "系统消息";

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

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}
	
	public function tableName( )
	{
		return "{{sysmsg}}";
	}

	public function rules( )
	{
		return array(
			array( "content", "required" ),
			array( "user_id", "numerical", "integerOnly" => TRUE ),
			array( "id, user_id, content, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "user_id" => "接收用户ID", "content" => "消息内容", "created" => "发布时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "content", $this->content, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "Sysmsg", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
