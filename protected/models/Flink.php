<?php

class Flink extends ActiveRecord
{

	public $modelName = "友链";

	const CATEGORY_INDEX = "首页链接";
	const CATEGORY_INNER = "内页链接";

	protected function afterDelete( )
	{
		parent::afterdelete( );
		if ( $this->image )
		{
			@unlink( Yii::app( )->basePath."/../".$this->image );
		}
		return TRUE;
	}

	public function getSrc( )
	{
		if ( $this->remote_image )
		{
			return $this->remote_image;
		}
		return $this->image;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{flink}}";
	}

	public function rules( )
	{
		return array(
			array( "category, name, url, enabled", "required" ),
			array( "enabled", "numerical", "integerOnly" => TRUE ),
			array( "category", "length", "max" => 30 ),
			array( "name", "length", "max" => 90 ),
			array( "url, remote_image", "length", "max" => 100 ),
			array( "image", "file", "allowEmpty" => TRUE, "types" => "jpg, gif, png", "maxSize" => 51200 ),
			array( "description", "safe"),
			array( "id, category, name, url, onindex, enabled, created, description", "safe", "on" => "search" ),
			array(
				"created",
				"default",
				"value" => time( ),
				"setOnEmpty" => TRUE,
				"on" => "insert"
			)
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "category" => "链接类型", "name" => "链接名称", "url" => "链接地址", "image" => "标识图片", "remote_image" => "远程标识图片", "description" => "网站描述", "enabled" => "有效性", "created" => "添加时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "category", $this->category, TRUE );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "enabled", $this->enabled );
		$criteria->compare( "created", $this->created );
		return new CActiveDataProvider( get_class( $this ), array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "id DESC" )
		) );
	}

}

?>
