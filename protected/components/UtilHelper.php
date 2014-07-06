<?php

class UtilHelper
{

	public static function Array2Options( $name )
	{
		$options = array( );
		if ( !is_array( $name ) )
		{
			foreach ( Yii::app( )->params[$name] as $value )
			{
				$options[$value] = $value;
			}
			return $options;
		}
		foreach ( $name as $value )
		{
			$options[$value] = $value;
		}
		return $options;
	}

	public static function sgmdate( $format, $timestamp = "", $format = 1 )
	{
		if ( empty( $timestamp ) )
		{
			$timestamp = time( );
		}
		$result = "";
		if ( $format )
		{
			$time = time( ) - $timestamp;
			if ( 86400 < $time )
			{
				$result = gmdate( $format, $timestamp + 28800 );
				return $result;
			}
			if ( 3600 < $time )
			{
				$result = intval( $time / 3600 )."小时前";
				return $result;
			}
			if ( 60 < $time )
			{
				$result = intval( $time / 60 )."分钟前";
				return $result;
			}
			if ( 0 < $time )
			{
				$result = $time."秒前";
				return $result;
			}
			$result = "刚刚";
			return $result;
		}
		$result = gmdate( $format, $timestamp + 28800 );
		return $result;
	}

	public static function formatBytes( $size )
	{
		if ( 1073741824 <= $size )
		{
			$size = ( round( $size / 1073741824 * 100 ) / 100 )."GB";
			return $size;
		}
		if ( 1048576 <= $size )
		{
			$size = ( round( $size / 1048576 * 100 ) / 100 )."MB";
			return $size;
		}
		if ( 1024 <= $size )
		{
			$size = ( round( $size / 1024 * 100 ) / 100 )."KB";
			return $size;
		}
		$size .= "Bytes";
		return $size;
	}

	public static function jsonString( $str )
	{
		return preg_replace( "/([\\\\\\/'])/", "\\\\\$1", $str );
	}

	public static function getpage( $url, $encoding = "UTF-8" )
	{
		if ( !strpos( $url, "://" ) )
		{
			return "Invalid URI";
		}
		$content = "";
		if ( function_exists( "curl_init" ) )
		{
			$ch = curl_init( );
			$useragent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
			curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
			curl_setopt( $ch, CURLOPT_ENCODING, "gzip" );
			$content = curl_exec( $ch );
			curl_close( $ch );
		}
		else if ( function_exists( "fsockopen" ) )
		{
			$tmp = parse_url( $url );
			$host = $tmp['host'];
			$str = explode( $host, $url );
			$req_url = $str[1];
			unset( $tmp );
			unset( $str );
			$content = "";
			$fp = fsockopen( $host, 80, $errno, $errstr, 30 );
			if ( !$fp )
			{
				$content = "Can Not Open Socket...";
			}
			else
			{
				stream_set_timeout( $fp, 10 );
				$out = "GET ".$req_url."/  HTTP/1.1\r\n";
				$out .= "Host: ".$host." \r\n";
				$out .= "Accept: */*\r\n";
				$out .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)\r\n)";
				$out .= "Connection: Keep-Alive\r\n\r\n";
				fputs( $fp, $out );
				while ( !feof( $fp ) )
				{
					$status = stream_get_meta_data( $fp );
					if ( $status['timed_out'] )
					{
						break;
					}
					$content .= fgets( $fp, 4069 );
				}
				fclose( $fp );
			}
		}
		if ( empty( $content ) )
		{
			$content = FALSE;
		}
		$content = self::convertencoding( $content, $encoding );
		return $content;
	}

	public static function getfile( $url, $save_file, $referer = "" )
	{
		if ( !strpos( $url, "://" ) )
		{
			return "Invalid URI";
		}
		$content = "";
		if ( function_exists( "curl_init" ) )
		{
			$times = 0;
			$ch = curl_init( );
			$useragent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
			if ( $referer )
			{
				curl_setopt( $ch, CURLOPT_REFERER, $referer );
			}
			curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
			curl_setopt( $ch, CURLOPT_ENCODING, "gzip" );
			$content = curl_exec( $ch );
			curl_close( $ch );
			$times +=1;
			if (curl_exec($ch))
			{
				break;
			}
		}
		else if ( $times < 4 && function_exists( "fsockopen" ) )
		{
			$tmp = parse_url( $url );
			$host = $tmp['host'];
			$str = explode( $host, $url );
			$req_url = $str[1];
			unset( $tmp );
			unset( $str );
			$content = "";
			$fp = fsockopen( $host, 80, $errno, $errstr, 30 );
			if ( !$fp )
			{
				$content = "Can Not Open Socket...";
			}
			else
			{
				stream_set_timeout( $fp, 10 );
				$out = "GET ".$req_url."/  HTTP/1.1\r\n";
				$out .= "Host: ".$host." \r\n";
				$out .= "Accept: */*\r\n";
				$out .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)\r\n)";
				$out .= "Connection: Keep-Alive\r\n\r\n";
				fputs( $fp, $out );
				while ( !feof( $fp ) )
				{
					$status = stream_get_meta_data( $fp );
					if ( $status['timed_out'] )
					{
						break;
					}
					$content .= fgets( $fp, 4069 );
				}
				fclose( $fp );
			}
		}
		if ( empty( $content ) )
		{
			return FALSE;
		}
		return file_put_contents( $save_file, $content );
	}

	public static function convertencoding( $data, $to = "UTF-8" )
	{
		$encoding_list = array( "UTF-8", "GBK", "GB2312", "BIG5" );
		$encoded = mb_detect_encoding( $data, $encoding_list );
		$data= mb_convert_encoding( $data, $to, $encoded );
		return $data;
	}

	public static function sendsms( $mobile, $message )
	{
		$url = "http://sdk2.entinfo.cn/z_send.aspx";
		$params = array( );
		$params['sn'] = Yii::app( )->params['sms']['username'];
		$params['pwd'] = Yii::app( )->params['sms']['password'];
		$params['mobile'] = $mobile;
		$params['content'] = self::convertencoding( $message, "GBK" );
		$q = "";
		foreach ( $params as $k => $v )
		{
			$q .= "{$k}=".urlencode( $v )."&";
		}
		$params = substr( $q, 0, -1 );
		$ch = curl_init( );
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$result = curl_exec( $ch );
		return trim( $result ) == "1";
	}

	public static function is_file_exists( $filename )
	{
		$path = realpath( Yii::app( )->basePath."/..".$filename );
		if ( $filename && file_exists( $path ) && is_file( $path ) )
		{
			return TRUE;
		}
		return FALSE;
	}

	public static function sizecount( $size )
	{
		if ( 1073741824 <= $size )
		{
			$size = ( round( $size / 1073741824 * 100 ) / 100 )." GB";
			return $size;
		}
		if ( 1048576 <= $size )
		{
			$size = ( round( $size / 1048576 * 100 ) / 100 )." MB";
			return $size;
		}
		if ( 1024 <= $size )
		{
			$size = ( round( $size / 1024 * 100 ) / 100 )." KB";
			return $size;
		}
		$size .= " Bytes";
		return $size;
	}
	
	public static function getip(){
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$cip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(!empty($_SERVER["REMOTE_ADDR"])){
			$cip = $_SERVER["REMOTE_ADDR"];
		}
		else{
			$cip = "无法获取！";
		}
		return $cip;
	}
	
	public static function curl_redir_exec( $ch, $_obfuscate_ySeUHBwˇ = "" )
	{
		static $curl_loops = 0;
		static $curl_max_loops = 20;
		if ( $curl_max_loops <= $curl_loops++ )
		{
			$curl_loops = 0;
			return FALSE;
		}
		curl_setopt( $ch, CURLOPT_HEADER, TRUE );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_NOBODY, TRUE );
		$html = curl_exec( $ch );
		$code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		if ( $code == 301 || $code == 302 )
		{
			$header = array( );
			preg_match( "/Location:(.*?)\\n/", $html, $header );
			$url = @parse_url( @trim( @array_pop( $header ) ) );
			if ( !$url )
			{
				$curl_loops = 0;
				return $data;
			}
			$urlinfo = parse_url( curl_getinfo( $ch, CURLINFO_EFFECTIVE_URL ) );
			$new_url = $url['scheme']."://".$url['host'].$url['path'].( $url['query'] ? "?".$url['query'] : "" );
			curl_setopt( $ch, CURLOPT_URL, $new_url );
			return self::curl_redir_exec( $ch );
		}
		curl_setopt( $ch, CURLOPT_HEADER, FALSE );
		curl_setopt( $ch, CURLOPT_NOBODY, FALSE );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$data = curl_exec( $ch );
		$curl_loops = 0;
		return $data;
	}

	public static function getImageSize( $url )
	{
		$times = 0;
		do
		{
			$result = self::trygetimagesize( $url );
			++$times;
		} while ( $times <= 3 && $result['width'] == 0 );
		return $result;
	}

	public static function tryGetImageSize( $url )
	{
		if ( !function_exists( "curl_init" ) )
		{
			$fp = fopen( $url, "rb" );
			if ( !$fp )
			{
				return FALSE;
			}
			$data = fread( $fp, 168 );
			fclose( $fp );
		}
		else
		{
			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
			curl_setopt( $ch, CURLOPT_RANGE, "0-168" );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
			$data = curl_exec( $ch );
			curl_close( $ch );
			if ( !$data )
			{
				return FALSE;
			}
		}
		$imsize = getimagesize( "data://image/jpeg;base64,".base64_encode( $data ) );
		if ( empty( $imsize ) )
		{
			return FALSE;
		}
		$result['width'] = $imsize[0];
		$result['height'] = $imsize[1];
		return $result;
	}

}

?>
