<?php

class TrialOrder extends ActiveRecord
{

	public $modelName = "使用订单";

	const STATUS_PENDDING = "等待处理";
	const STATUS_FINISHED = "处理完成";
	const STATUS_CANCELLED = "已作废";

	public function __toString( )
	{
		return $this->id;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
			$this->status = self::STATUS_PENDDING;
		}
		return parent::beforesave( );
	}

	protected function afterSave( )
	{
		$this->trial->apply_count = intval( self::model( )->countByAttributes( array(
			"trial_id" => $this->trial_id
		) ) );
		$this->trial->save( FALSE );
		parent::aftersave( );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{trial_order}}";
	}

	public function rules( )
	{
		return array(
			array( "trial_id, user_id", "required" ),
			array( "trial_id, user_id", "numerical", "integerOnly" => TRUE ),
			array( "status", "length", "max" => 30 ),
			array( "id, trial_id, user_id, status, created", "safe", "on" => "search" )
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
			"trial" => array(
				self::BELONGS_TO,
				"Trial",
				"trial_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "trial_id" => "试用ID", "user_id" => "用户ID", "status" => "处理状态", "created" => "申请时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "trial_id", $this->trial_id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "status", $this->status, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "TrialOrder", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
