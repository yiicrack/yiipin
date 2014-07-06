<?php
class ModifierHelper
{

	public static function left( $str, $slen = 50, $dot = "..." )
	{
		include_once( dirname( __FILE__ )."/modifier/cnsubstr.php" );
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			return cnsubstr( $str, $slen, TRUE, $dot );
		}
		return cnsubstr( $str, $slen, FALSE, $dot );
	}

	public static function Html2Text( $str, $r = 0 )
	{
		include_once( dirname( __FILE__ )."/modifier/htmltext.php" );
		if ( $r == 0 )
		{
			return Html2Text( $str );
		}
		return addslashes( Html2Text( stripslashes( $str ) ) );
	}

	public static function Text2Html( $txt )
	{
		include_once( dirname( __FILE__ )."/modifier/htmltext.php" );
		return Text2Html( $txt );
	}

	public function TrimMsg( $msg )
	{
		$msg = trim( stripslashes( $msg ) );
		$msg = nl2br( htmlspecialchars( $msg ) );
		$msg = str_replace( "  ", "&nbsp;&nbsp;", $msg );
		return addslashes( $msg );
	}

	public function DefaultTEXT( $string, $default = "" )
	{
		if ( !isset( $string ) && $string === "" )
		{
			return $default;
		}
		return $string;
	}

	public static function MyDate( $format = "Y-m-d H:i:s", $timestamp = 0 )
	{
		if ( !$timestamp )
		{
			$timestamp = time( );
		}
		if ( empty( $format ) )
		{
			$format = "Y-m-d H:i:s";
		}
		return date( $format, $timestamp );
	}

	public static function GetAlabNum( $fnum )
	{
		$nums = array( "０", "１", "２", "３", "４", "５", "６", "７", "８", "９", "＋", "－", "％", "．", "ａ", "ｂ", "ｃ", "ｄ", "ｅ", "ｆ", "ｇ", "ｈ", "ｉ", "ｊ", "ｋ", "ｌ", "ｍ", "ｎ", "ｏ", "ｐ", "ｑ", "ｒ", "ｓ ", "ｔ", "ｕ", "ｖ", "ｗ", "ｘ", "ｙ", "ｚ", "Ａ", "Ｂ", "Ｃ", "Ｄ", "Ｅ", "Ｆ", "Ｇ", "Ｈ", "Ｉ", "Ｊ", "Ｋ", "Ｌ", "Ｍ", "Ｎ", "Ｏ", "Ｐ", "Ｑ", "Ｒ", "Ｓ", "Ｔ", "Ｕ", "Ｖ", "Ｗ", "Ｘ", "Ｙ", "Ｚ" );
		$fnums = array( "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-", "%", ".", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );
		$fnum = str_replace( $nums, $fnums, $fnum );
		return $fnum;
	}

	public static function FilterWord( $data = "", $time = 86400 )
	{
		$_obfuscate_KK0pvd8c = new QCache_File( array(
			"life_time" => $time
		) );
		$_obfuscate_zyZ3yChGfrSSrQ = $_obfuscate_KK0pvd8c->get( "FilterWord_cache" );
		if ( !$_obfuscate_zyZ3yChGfrSSrQ )
		{
			$fp = fopen( dirname( __FILE__ )."/modifier/data/filterword.dat", "r" );
			while ( !feof( $fp ) )
			{
				$line = fgets( $fp );
				$_obfuscate_exEcVSIPcuA = array_map( "trim", explode( "=", $line ) );
				if ( count( $_obfuscate_exEcVSIPcuA ) == 2 )
				{
					$_obfuscate_zyZ3yChGfrSSrQ['word_one'][] = "/".str_replace( "*", ".*", $_obfuscate_exEcVSIPcuA[0] )."/";
					$_obfuscate_zyZ3yChGfrSSrQ['word_two'][] = $_obfuscate_exEcVSIPcuA[1];
				}
			}
			fclose( $fp );
			$_obfuscate_KK0pvd8c->set( "FilterWord_cache", $_obfuscate_zyZ3yChGfrSSrQ );
		}
		if ( !is_array( $_obfuscate_zyZ3yChGfrSSrQ['word_one'] ) )
		{
			return $data;
		}
		return preg_replace( $_obfuscate_zyZ3yChGfrSSrQ['word_one'], $_obfuscate_zyZ3yChGfrSSrQ['word_two'], $data );
	}

	public static function GetPinyin( $str, $ishead = 0, $fenge = "" )
	{
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$str = iconv( "utf-8", "gbk//ignore", $str );
		}
		include_once( dirname( __FILE__ )."/modifier/pinyin.php" );
		$restr = pinyin( $str, $ishead, $fenge );
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$restr = iconv( "gbk", "utf-8//ignore", $restr );
		}
		return $restr;
	}

	public static function SplitWord( $str = "", $tryNumName = TRUE, $tryDiff = TRUE )
	{
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$str = iconv( "utf-8", "gbk//ignore", $str );
		}
		include_once( dirname( __FILE__ )."/modifier/splitword.php" );
		$SplitWord = new SplitWord( );
		$SpWord = $SplitWord->SplitRMM( self::html2text( $str ), $tryNumName, $tryDiff );
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$SpWord = iconv( "gbk", "utf-8//ignore", $SpWord );
		}
		$SplitWord->Clear( );
		return $SpWord;
	}

	public static function GetKeyword( $str, $ilen = -1 )
	{
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$str = iconv( "utf-8", "gbk//ignore", $str );
		}
		include_once( dirname( __FILE__ )."/modifier/splitword.php" );
		$SplitWord = new SplitWord( );
		$IndexText = $SplitWord->GetIndexText( self::html2text( $str ), $ilen );
		if ( strtolower( Yii::app( )->charset ) == "utf-8" )
		{
			$IndexText = iconv( "gbk", "utf-8//ignore", $IndexText );
		}
		$SplitWord->Clear( );
		return $IndexText;
	}

	public function ArcKeyword( $_obfuscate_obqvew, $_obfuscate_5nVJEQ, $_obfuscate_O6k3Bw = 50, $_obfuscate_hdx8vSA = " " )
	{
		$keywords = "";
		$tmp = explode( " ", trim( self::getkeyword( $_obfuscate_obqvew ) ) );
		$_obfuscate_gD8t5VMrNKPJ = explode( " ", trim( self::getkeyword( $_obfuscate_5nVJEQ, $_obfuscate_O6k3Bw ) ) );
		if ( is_array( $_obfuscate_gD8t5VMrNKPJ ) && is_array( $tmp ) )
		{
			foreach ( $tmp as $k )
			{
				if ( $_obfuscate_O6k3Bw <= strlen( $keywords ) )
				{
					break;
				}
				$keywords .= $keywords ? $_obfuscate_hdx8vSA.$k : $k;
			}
			foreach ( $_obfuscate_gD8t5VMrNKPJ as $k )
			{
				if ( $_obfuscate_O6k3Bw <= strlen( $keywords ) )
				{
					break;
				}
				if ( !in_array( $k, $tmp ) )
				{
					$keywords .= $keywords ? $_obfuscate_hdx8vSA.$k : $k;
				}
			}
		}
		return $keywords = addslashes( $keywords );
	}

}

?>
