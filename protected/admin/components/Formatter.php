<?php
class Formatter extends CFormatter
{

	public function formatArray( $value )
	{
		$html = '';
		if ( !empty( $value ) || is_array( $value ) )
		{
			$html .= "<table>";
			foreach ( $value as $name => $val )
			{
				$html .= CHtml::tag( "tr", array( ), "<td style=\"font-weight:normal\">".$name."：</td><td>".nl2br( $val )."</td>" );
			}
			$html .= "</table>";
			return $html;
		}
		return $value;
	}

	public function formatUrl( $value )
	{
		return CHtml::link( CHtml::encode( $value ), $value );
	}

}

?>
