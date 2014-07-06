<?php
class Trial extends ActiveRecord
{

	public $modelName = "试用商品";

	public function __toString( )
	{
		return $this->name;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
			$this->updated = date( "Y-m-d H:i:s" );
		}
		else
		{
			$this->updated = date( "Y-m-d H:i:s" );
		}
		return parent::beforesave( );
	}

	protected function afterDelete( )
	{
		parent::afterdelete( );
		if ( $this->image )
		{
			@unlink( Yii::app( )->basePath."/../".$this->image );
		}
		return TRUE;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{trial}}";
	}

	public function rules( )
	{
		return array(
			array( "name, product_intro, product_url, content, stock, price, apply_count, image, user_id, start_time, end_time", "required" ),
			array( "stock, apply_count, user_id", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 300 ),
			array( "product_url, image", "length", "max" => 250 ),
			array( "price", "length", "max" => 10 ),
			array( "image", "file", "allowEmpty" => TRUE, "types" => "jpg, gif, png", "maxSize" => 2048000, "safe" => TRUE ),
			array( "id, name, product_intro, product_url, content, stock, price, apply_count, image, user_id, start_time, end_time, created, updated", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"comments" => array(
				self::HAS_MANY,
				"TrialComment",
				"trial_id"
			),
			"orders" => array(
				self::HAS_MANY,
				"TrialOrder",
				"trial_id"
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
		return array( "id" => "ID", "name" => "试用名称", "product_intro" => "产品简介", "product_url" => "产品URL", "content" => "活动简介", "stock" => "商品库存", "price" => "市场价格", "apply_count" => "已申请人数", "image" => "图片", "user_id" => "发布用户ID", "start_time" => "开始时间", "end_time" => "结束时间", "created" => "添加时间", "updated" => "修改时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "product_intro", $this->product_intro, TRUE );
		$criteria->compare( "product_url", $this->product_url, TRUE );
		$criteria->compare( "content", $this->content, TRUE );
		$criteria->compare( "stock", $this->stock );
		$criteria->compare( "price", $this->price, TRUE );
		$criteria->compare( "apply_count", $this->apply_count );
		$criteria->compare( "image", $this->image, TRUE );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "start_time", $this->start_time, TRUE );
		$criteria->compare( "end_time", $this->end_time, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		$criteria->compare( "updated", $this->updated, TRUE );
		return new CActiveDataProvider( "Trial", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
