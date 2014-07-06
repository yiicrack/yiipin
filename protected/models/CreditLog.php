<?php
class CreditLog extends ActiveRecord
{

	public $modelName = "积分记录";

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
		return "{{credit_log}}";
	}

	public function rules( )
	{
		return array(
			array( "user_id, action, score, credit", "required" ),
			array( "user_id, score, credit, created", "numerical", "integerOnly" => TRUE ),
			array( "action", "length", "max" => 100 ),
			array( "id, user_id, action, score, credit, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "user_id" => "用户ID", "action" => "操作", "score" => "变动积分", "credit" => "当前积分", "created" => "发生时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "action", $this->action, TRUE );
		$criteria->compare( "score", $this->score );
		$criteria->compare( "credit", $this->credit );
		$criteria->compare( "created", $this->created );
		return new CActiveDataProvider( "CreditLog", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 15 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
