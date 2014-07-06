<?php
class Navlink extends ActiveRecord
{

	public $modelName = "导航链接";

	const LEVEL_1 = "一级导航";
	const LEVEL_2 = "二级导航";
	const TARGET_SELF = "当前窗口";
	const TARGET_BLANK = "新窗口";

	public function __toString( )
	{
		return $this->name;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{navlink}}";
	}

	public function rules( )
	{
		return array(
			array( "name, title, url, sortnum, target", "required" ),
			array( "sortnum", "numerical", "integerOnly" => TRUE ),
			array( "name, title, url", "length", "max" => 255 ),
			array( "target, level", "length", "max" => 30 ),
			array( "id, name, title, url, sortnum, level, target", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "导航名称", "title" => "悬停提示", "url" => "链接地址", "sortnum" => "排序数字", "level" => "级别", "target" => "目标窗口" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "title", $this->title, TRUE );
		$criteria->compare( "url", $this->url, TRUE );
		$criteria->compare( "sortnum", $this->sortnum );
		$criteria->compare( "level", $this->level );
		$criteria->compare( "target", $this->target, TRUE );
		return new CActiveDataProvider( "Navlink", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.sortnum DESC" )
		) );
	}

}

?>
