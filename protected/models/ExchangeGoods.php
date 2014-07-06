<?php
class ExchangeGoods extends ActiveRecord
{

	public $modelName = "积分兑换商品";

	public function __toString( )
	{
		return $this->name;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
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
		return "{{exchange_goods}}";
	}

	public function rules( )
	{
		return array(
			array( "category_id, name, stock, limit, credit, sortnum, image, content", "required" ),
			array( "category_id, stock, exchanged_count, limit, credit, sortnum, is_virtual", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 300 ),
			array( "image", "file", "allowEmpty" => TRUE, "types" => "jpg, gif, png", "maxSize" => 2048000, "safe" => TRUE ),
			array( "content", "safe" ),
			array( "id, category_id, name, stock, exchanged_count, limit, credit, sortnum, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"category" => array(
				self::BELONGS_TO,
				"ExchangeCategory",
				"category_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "category_id" => "所属分类", "name" => "商品名称", "image" => "商品图片", "content" => "商品介绍", "stock" => "库存数量", "exchanged_count" => "已兑换数量", "limit" => "每人限兑", "credit" => "所需积分", "is_virtual" => "虚拟商品", "sortnum" => "排序数", "created" => "添加时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "category_id", $this->category_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "stock", $this->stock );
		$criteria->compare( "exchanged_count", $this->exchanged_count );
		$criteria->compare( "`limit`", $this->limit );
		$criteria->compare( "credit", $this->credit );
		$criteria->compare( "sortnum", $this->sortnum );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "ExchangeGoods", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.sortnum DESC" )
		) );
	}

}

?>
