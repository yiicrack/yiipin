<?php

class Advertise extends ActiveRecord
{

	public $modelName = "广告";

	const ENABLED_YES = "启用";
	const ENABLED_NO = "禁用";

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

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	protected function afterFind( )
	{
		$this->data = unserialize( $this->data );
		parent::afterfind( );
	}

	public function tableName( )
	{
		return "{{advertise}}";
	}

	public function rules( )
	{
		return array(
			array( "position_id, template_id, name, data, valid_start, valid_end", "required" ),
			array( "position_id, template_id, display_count", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 90 ),
			array( "enabled", "length", "max" => 30 ),
			array( "valid_start, valid_end", "type", "type" => "date", "dateFormat" => "yyyy-MM-dd", "message" => "{attribute} 必须是日期." ),
			array( "id, position_id, name, data, display_count, enabled, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"template" => array(
				self::BELONGS_TO,
				"AdvertiseTemplate",
				"template_id"
			),
			"position" => array(
				self::BELONGS_TO,
				"AdvertisePosition",
				"position_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "position_id" => "广告位", "template_id" => "广告模板", "name" => "广告名称", "data" => "模板数据", "display_count" => "显示次数", "enabled" => "是否有效", "created" => "发布时间", "valid_start" => "有效期始", "valid_end" => "有效期止" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "position_id", $this->position_id );
		$criteria->compare( "template_id", $this->template_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "data", $this->data, TRUE );
		$criteria->compare( "display_count", $this->display_count );
		$criteria->compare( "enabled", $this->enabled );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "Advertise", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

	public function getClickStats( )
	{
		$status = array( );
		if ( is_array( $this->data ) )
		{
			foreach ( $this->data as $name => $value )
			{
				if ( strpos( $name, "跳转地址" ) !== FALSE )
				{
					$click = AdvertiseClick::model( )->findByAttributes( array(
						"url" => $value
					) );
					if ( $click !== NULL )
					{
						$click_count = $click->click_count;
					}
					else
					{
						$click_count = 0;
					}
					$status[$value] = "点击 ".$click_count." 次";
				}
			}
		}
		return $status;
	}

}

?>
