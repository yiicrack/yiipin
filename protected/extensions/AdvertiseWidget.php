<?php
class AdvertiseWidget extends CWidget
{

	public $position_id = NULL;

	public function run( )
	{
		if ( $this->position_id === NULL )
		{
			throw new CException( "必须指定广告位ID" );
		}
		$position = AdvertisePosition::model( )->findByPk( $this->position_id );
		if ( $position === NULL )
		{
			echo "无效的广告位ID";
		}
		else
		{
			$criteria = new CDbCriteria( );
			$criteria->order = "id DESC";
			$criteria->compare( "position_id", $this->position_id );
			$criteria->compare( "enabled", Advertise::ENABLED_YES );
			$criteria->addCondition( "valid_start <='".date( "Y-m-d" )."'" );
			$criteria->addCondition( "valid_end >='".date( "Y-m-d" )."'" );
			if ( $position->type == AdvertisePosition::TYPE_SINGLE )
			{
				$advertise = Advertise::model( )->find( $criteria );
				if ( $advertise === NULL )
				{
					echo "虚位以待，欢迎投放广告！";
				}
				else
				{
					$this->showad( $advertise );
				}
			}
			else
			{
				$advertises = Advertise::model( )->findAll( $criteria );
				foreach ( $advertises as $advertise )
				{
					$this->showad( $advertise );
				}
			}
		}
	}

	private function showad( $advertise )
	{
		Advertise::model( )->updateCounters( array(
			"display_count" => 1
		), array(
			"condition" => "id=".$advertise->id
		) );
		$html = $advertise->template->template;
		$data = $advertise->data;
		$matches = array( );
		if ( preg_match_all( "/<\\{(.+?)\\}>/", $html, $matches ) ) {
			foreach ( array_unique( $matches[0] ) as $index => $token )
			{
				$html = str_replace( $token, $data[$matches[1][$index]], $html );
			}
		}
		echo $html;
	}

}

?>
