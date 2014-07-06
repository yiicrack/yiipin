<?php
class Html extends CHtml
{

	public static function css( $flienames, $dir = "" )
	{
		$dir == "" ? Yii::app( )->baseUrl."/css/" : $dir;
		$flienames = explode( ",", $flienames );
		foreach ( $flienames as $filename )
		{
			echo Html::cssfile( $dir.trim( $filename ) )."\n";
		}
	}

	public static function js( $flienames )
	{
		$flienames = explode( ",", $flienames );
		foreach ( $flienames as $url )
		{
			echo Html::scriptfile( Yii::app( )->baseUrl."/js/".trim( $url ) )."\n";
		}
	}

	public static function user_avatar( $user, $size = "small", $real = TRUE, $img = FALSE, $split = TRUE )
	{
		$size = in_array( $size, array( "big", "middle", "small" ) ) ? $size : "middle";
		$uid = abs( intval( $user->id ) );
		if ( !$split )
		{
			if ( $img )
			{
				return UC_API."/avatar.php?uid=".$uid."&size=".$size;
			}
			return "<img src=\"".UC_API."/avatar.php?uid=".$uid."&size=".$size.( $real ? "&type=real" : "" )."\" />";
		}
		$uid = sprintf( "%09d", $uid );
		$h1 = substr( $uid, 0, 3 );
		$h2 = substr( $uid, 3, 2 );
		$h3 = substr( $uid, 5, 2 );
		$file = UC_API."/data/avatar/".$h1."/".$h2."/".$h3."/".substr( $uid, -2 ).( $real ? "_real" : "" )."_avatar_".$size.".jpg";
		if ( $img )
		{
			return $file;
		}
		return CHtml::link( "<img src=\"".$file."\" class=\"avatar\" onerror=\"this.onerror=null;this.src='".UC_API."/images/noavatar_".$size.".gif'\" />", array(
			"/user/view",
			"id" => $user->id
		), array( "target" => "_blank" ) );
	}

	public static function user_link( $user, $htmlOpetions = array( ) )
	{
		return CHtml::link( $user->username, array(
			"/user/view",
			"id" => $user->id
		), $htmlOpetions );
	}

	public static function recipient_link( $user, $htmlOpetions = array( ) )
	{
		return CHtml::link( $user->realname, array(
			"/recipient/view",
			"id" => $user->id
		), $htmlOpetions );
	}

	public static function commonweal_link( $about, $htmlOpetions = array( ) )
	{
		return CHtml::link( $about->title, array(
			"/commonweal/view",
			"id" => $about->id
		), $htmlOpetions );
	}

}

?>
