<?php
class ExchangeOrder extends ActiveRecord
{

	public $modelName = "积分兑换订单";

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
		if ( $this->isNewRecord )
		{
			$user = User::model( )->findByPk( $this->user_id );
			$credit = $this->goods->credit * $this->count;
			$user['credit'] -= $credit;
			$log = new CreditLog( );
			$log->user_id = $this->user_id;
			$log->action = "兑换商品“".$this->goods->name."”{$this->count}份";
			$log->score = 0 - $credit;
			$log->credit = $user->credit;
			$log->save( FALSE );
			$user->save( FALSE );
			$this->goods->exchanged_count = intval( Yii::app( )->db->createCommand( "SELECT SUM(`count`) FROM {{exchange_order}} WHERE goods_id = :goods_id" )->queryScalar( array(
				":goods_id" => $this->goods_id
			) ) );
			$this->goods['stock'] -= $this->count;
			$this->goods->save( FALSE );
		}
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{exchange_order}}";
	}

	public function rules( )
	{
		return array(
			array( "goods_id, user_id, count", "required" ),
			array( "goods_id, user_id, count", "numerical", "integerOnly" => TRUE ),
			array( "status", "length", "max" => 30 ),
			array( "id, goods_id, user_id, count, status, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"goods" => array(
				self::BELONGS_TO,
				"ExchangeGoods",
				"goods_id"
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
		return array( "id" => "ID", "goods_id" => "商品ID", "user_id" => "用户ID", "count" => "兑换数量", "status" => "订单状态", "created" => "提交时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "goods_id", $this->goods_id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "count", $this->count );
		$criteria->compare( "status", $this->status, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "ExchangeOrder", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
