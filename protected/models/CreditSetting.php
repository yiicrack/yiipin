<?php
class CreditSetting extends ActiveRecord
{

	public $modelName = "积分设置";

	public function __toString( )
	{
		return $this->alias;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{credit_setting}}";
	}

	public function rules( )
	{
		return array(
			array( "name, alias, score, limit", "required" ),
			array( "score, limit", "numerical", "integerOnly" => TRUE ),
			array( "limit", "compare", "compareValue" => 0, "operator" => ">=" ),
			array( "name, alias", "length", "max" => 50 ),
			array( "id, name, alias, score", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "名称", "alias" => "别名", "score" => "积分增减", "limit" => "每日上限次数" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "alias", $this->alias, TRUE );
		$criteria->compare( "score", $this->score );
		return new CActiveDataProvider( "CreditSetting", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 15 )
		) );
	}

}

?>
