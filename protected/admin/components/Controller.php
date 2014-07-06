<?php
class Controller extends RController
{

	public $layout = "application.admin.views.layouts.main";
	public $menu = array( );
	public $breadcrumbs = array( );

	public function filters( )
	{
		return array( "rights" );
	}

	protected function beforeAction( $action )
	{
		if ( !YII_DEBUG )
		{
			Yii::app( )->db->schemaCachingDuration = 86400;
		}
		//define("URL_PREFIX", Yii::app( )->baseUrl);
		$configs = Yii::app( )->config->get( "memcache" );
		Yii::app( )->setComponents( array(
			"cache" => Yii::app( )->config->get( "cache_backend" ) == "file" ? array(
				"class" => "CFileCache",
				"keyPrefix" => "yiipin",
				"directoryLevel" => 2
			) : array(
				"class" => "CMemCache",
				"keyPrefix" => "yiipin",
				"servers" => array(
					array(
						"host" => $configs['server'],
						"port" => $configs['port']
					)
				)
			)
		) );
		return parent::beforeaction( $action );
	}
	
	public function getUploadDir( $path )
	{
		$base = Yii::app( )->basePath.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR;
		if ( !file_exists( $base ) )
		{
			FileHelper::mkdirs( $base );
		}
		return $base;
	}

	public function getUploadBase( $path )
	{
		$base = "/upload/".$path."/";
		return $base;
	}

	public function actionUpload( )
	{
		header( "Content-type: text/html; charset=UTF-8" );
		$exts = array(
			"image" => array( "gif", "jpg", "jpeg", "png" ),
			"flash" => array( "swf", "flv" ),
			"media" => array( "swf", "flv", "mp3", "wav", "wma", "wmv", "mid", "avi", "mpg", "asf", "rm", "rmvb" ),
			"file" => array( "doc", "docx", "xls", "xlsx", "ppt", "htm", "html", "txt", "zip", "rar", "gz", "bz2" )
		);
		$maxsize = 1000000;
		try
		{
			$file = CUploadedFile::getinstancebyname( "imgFile" );
			if ( $maxsize < $file->size )
			{
				throw new CException( "文件超过了允许的大小" );
			}
			if ( !in_array( strtolower( $file->extensionName ), $exts[$_GET['dir']] ) )
			{
				throw new CException( "文件格式不允许" );
			}
			$dir = "/upload/".$_GET['dir']."/".date( "Y-m" )."/";
			if ( !is_dir( $realpath = Yii::app( )->basePath."/..".$dir ) )
			{
				FileHelper::mkdirs( $realpath );
			}
			$full_filename = $dir.time( ).rand( 1000, 9999 ).".".$file->extensionName;
			$filename = Yii::app( )->basePath."/..".$full_filename;
			$file->saveAs( $filename );
			if ( in_array( strtolower( $file->extensionName ), $exts['image'] ) )
			{
				$image = ImageHelper::createfromfile( $filename );
				if ( $image )
				{
					$image->waterMark( array(
						"type" => "text",
						"position" => 1,
						"minwidth" => 300,
						"minheight" => 275,
						"text" => array( "shadowx" => 1, "shadowy" => 1 )
					) );
					$image->save( $filename );
					$image->destroy( );
				}
			}
			echo json_encode( array(
				"error" => 0,
				"url" => $full_filename
			) );
			return;
		}
		catch ( CException $e )
		{
			echo json_encode( array(
				"error" => 1,
				"message" => $e->getMessage( )
			) );
		}
	}

	public function getfile( $url, $save_file, $referer = "" )
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
			if ( $referer )
			{
				curl_setopt( $ch, CURLOPT_REFERER, $referer );
			}
			curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
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
			return FALSE;
		}
		return file_put_contents( $save_file, $content );
	}

	public function actionSwfUpload( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$file = CUploadedFile::getinstancebyname( "Filedata" );
			$exts = array( "swf", "zip", "rar", "pdf", "jpg", "gif", "png", "doc", "xls", "ppt", "docx", "xlsx", "pptx" );
			if ( !in_array( strtolower( $file->getExtensionName( ) ), $exts ) )
			{
				return;
			}
			$filename = time( ).rand( 1000, 9999 ).".".$file->getExtensionName( );
			$dir = "/upload/upfiles/".date( "Ym" )."/";
			if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
			{
				FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
			}
			$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
			if ( $file->saveAs( $full_filename ) )
			{
				$filename_url = $dir.$filename;
				$_SESSION['Filedata'][] = $filename_url;
				Yii::app( )->end( );
			}
		}
	}

}

?>
