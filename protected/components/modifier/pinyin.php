<?php

function pinyin( $str, $ishead = 0, $fenge = "" )
{
	$restr = "";
	$str = trim( $str );
	$length = strlen( $str );
	if ( $length < 2 )
	{
		return $str;
	}
	$cache = new CFileCache( );
	$data = $cache->get( "Pinyin_cache" );
	if ( !is_array( $data ) )
	{
		$fp = fopen( dirname( __FILE__ )."/data/pinyin.dat", "r" );
		while ( !feof( $fp ) )
		{
			$line = trim( fgets( $fp ) );
			$data[$line[0].$line[1]] = substr( $line, 3, strlen( $line ) - 3 );
		}
		fclose( $fp );
		$cache->set( "Pinyin_cache", $data );
	}
	$i = 0;
	for ( ;	$i < $length;	++$i	)
	{
		if ( 128 < ord( $str[$i] ) )
		{
			$c = $str[$i].$str[$i + 1];
			++$i;
			if ( isset( $data[$c] ) )
			{
				if ( $ishead == 0 )
				{
					$restr .= $restr ? $fenge.$data[$c] : $data[$c];
				}
				else
				{
					$restr .= $restr ? $fenge.$data[$c][0] : $data[$c][0];
				}
			}
		}
		else if ( eregi( "[a-z0-9]", $str[$i] ) )
		{
			$restr .= $str[$i];
		}
	}
	unset( $data );
	return $restr;
}

?>
