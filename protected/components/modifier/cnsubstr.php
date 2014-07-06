<?php

function cnsubstr( $string, $length, $charset = TRUE, $dot = "" )
{
	$len = strlen( $string );
	if ( $len <= $length )
	{
		return $string;
	}
	$string = str_replace( array( "&nbsp;", "&amp;", "&quot;", "&#039;", "&ldquo;", "&rdquo;", "&mdash;", "&lt;", "&gt;", "&middot;", "&hellip;" ), array( " ", "&", "\"", "'", "“", "”", "—", "<", ">", "·", "…" ), $string );
	$strcut = "";
	$length -= min( $length, strlen( $dot ) );
	if ( $charset )
	{
		$n = $tn = $noc = 0;
		while ( $n < $len && isset( $string[$n] ) )
		{
			$t = ord( $string[$n] );
			if ( $t == 9 || $t == 10 || 32 <= $t && $t <= 126 )
			{
				$tn = 1;
				++$n;
				++$noc;
			}
			else if ( 194 <= $t && $t <= 223 )
			{
				$tn = 2;
				$n += 2;
				$noc += 2;
			}
			else if ( 224 <= $t && $t < 239 )
			{
				$tn = 3;
				$n += 3;
				$noc += 2;
			}
			else if ( 240 <= $t && $t <= 247 )
			{
				$tn = 4;
				$n += 4;
				$noc += 2;
			}
			else if ( 248 <= $t && $t <= 251 )
			{
				$tn = 5;
				$n += 5;
				$noc += 2;
			}
			else if ( $t == 252 || $t == 253 )
			{
				$tn = 6;
				$n += 6;
				$noc += 2;
			}
			else
			{
				++$n;
			}
			if ( !( $length <= $noc ) )
			{
				continue;
			}
			break;
		}
		if ( $length < $noc )
		{
			$n -= $tn;
		}
		$strcut = substr( $string, 0, $n );
	}
	else
	{
		$len = strlen( $dot );
		$len = $length - $len - 1;
		$i = 0;
		for ( ;	$i < $len;	++$i	)
		{
			$strcut .= 127 < ord( $string[$i] ) ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace( array( "&", "\"", "'", "<", ">" ), array( "&amp;", "&quot;", "&#039;", "&lt;", "&gt;" ), $strcut );
	if ( $strcut != $string )
	{
		$strcut .= $dot;
	}
	return $strcut;
}

?>
