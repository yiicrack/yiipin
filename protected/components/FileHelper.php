<?php

class FileHelper extends CFileHelper
{

	public static function mkdirs( $dir, $mode = 511 )
	{
		if ( !is_dir( $dir ) )
		{
			$ret = @mkdir( $dir, $mode, TRUE );
			if ( !$ret )
			{
				throw new Exception( $dir );
			}
		}
		return TRUE;
	}

	public static function rmdirs( $dir, $recursive = TRUE )
	{
		$dir = realpath( $dir );
		if ( $dir == "" || $dir == "/" || strlen( $dir ) == 3 && substr( $dir, 1 ) == ":\\" )
		{
			throw new Exception( "禁止删除：".$dir );
		}
		if ( FALSE !== ( $hd = opendir( $dir ) ) )
		{
			do
			{
				while ( FALSE !== ( $file = readdir( $hd ) ) )
				{
					if ( !( $file == "." ) )
					{
						if ( $file == ".." )
						{
							break;
						}
					}
					else
					{
						continue;
					}
					$path = $dir.DIRECTORY_SEPARATOR.$file;
					if ( is_dir( $path ) )
					{
						self::rmdirs( $path );
					}
					else
					{
						unlink( $path );
					}
				}
				closedir( $hd );
				if ( !$recursive && @rmdir( $dir ) )
				{
					break;
				}
				else
				{
					throw new Exception( "删除失败：".$dir );
				}
			}
			while ( 0 );
			throw new Exception( "删除失败：".$dir );
		} 
	}

	public static function log_result( $msg, $file = "return" )
	{
		$log_file = $file."_".date( "Y-m-d", time( ) ).".log";
		$log_path = Yii::app( )->runtimePath."/log/tenpay";
		if ( !file_exists( $log_path ) )
		{
			$ret = @mkdir( $log_path, 511, TRUE );
			if ( !$ret )
			{
				throw new Exception( $log_path );
			}
		}
		$log = $log_path."/".$log_file;
		file_put_contents( $log, date( "Y-m-d H:i:s" )." ".$msg."\n", FILE_APPEND );
	}

}

?>
