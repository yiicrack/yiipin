<?php

class Slideshow extends ActiveRecord
{

	public $modelName = "幻灯";

	protected function beforeDelete( )
	{
		parent::beforedelete( );
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
		return "{{slideshow}}";
	}

	public function rules( )
	{
		return array(
			array( "title, url, token", "required" ),
			array( "sortnum, created", "numerical", "integerOnly" => TRUE ),
			array( "title", "length", "max" => 90 ),
			array( "url", "length", "max" => 100 ),
			array( "token", "length", "max" => 50 ),
			array( "id, title, url, image, token", "safe", "on" => "search" ),
			array( "image", "file", "allowEmpty" => TRUE, "types" => "jpg, gif, png", "maxSize" => 204800 ),
			array(
				"created",
				"default",
				"value" => time( ),
				"setOnEmpty" => FALSE,
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
		return array( "id" => "ID", "title" => "标题", "url" => "链接地址", "image" => "图片", "token" => "识别符", "sortnum" => "排序数", "created" => "添加时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "title", $this->title, TRUE );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "image", $this->image, TRUE );
		$criteria->compare( "token", $this->token, TRUE );
		return new CActiveDataProvider( get_class( $this ), array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 5 ),
			"sort" => array( "defaultOrder" => "id DESC" )
		) );
	}

}

?>
