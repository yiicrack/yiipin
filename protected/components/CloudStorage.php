<?php
class CloudStorage extends CComponent
{

	public $use_cloud = FALSE;
	public $cloud_type = NULL;
	public $cloud_config = array( );
	public $space_name = NULL;
	public $service = NULL;
	public $cache = TRUE;
	public static $cache_data = array( );

	const CLOUD_TYPE_ALIYUN = "阿里云";
	const CLOUT_TYPE_UPYUN = "又拍云";
	const CLOUD_CACHE_KEY = "cloud_cache";

	public function __construct( )
	{
		$this->init( );
	}

	public function init( )
	{
		$this->use_cloud = Yii::app( )->config->get( "use_cloud" );
		$this->cloud_type = Yii::app( )->config->get( "cloud_type" );
		$this->cloud_config = Yii::app( )->config->get( "cloud_config" );
		if ( $this->use_cloud === "true" )
		{
			if ( empty( $this->cloud_type ) || empty( $this->cloud_config ) )
			{
				throw new CException( "云存储配置不完整！" );
				return;
			}
		}
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			define( "ALI_LOG", YII_DEBUG );
			define( "ALI_LOG_PATH", Yii::app( )->runtimePath."/logs/" );
			define( "ALI_DISPLAY_LOG", FALSE );
			define( "ALI_LANG", "zh" );
			$this->space_name = $this->cloud_config['oss_bucket'];
			Yii::import( "application.vendors.aliyun_oss.*" );
			$this->service = new ALIOSS( $this->cloud_config['oss_access_id'], $this->cloud_config['oss_access_key'], $this->cloud_config['oss_internal'] === "true" ? "oss-internal.aliyuncs.com" : NULL );
			$this->service->set_debug_mode( FALSE );
		}
		else if ( $this->cloud_type == self::CLOUT_TYPE_UPYUN )
		{
			Yii::import( "application.vendors.upyun.*" );
			$this->service = new UpYun( $this->cloud_config['upyun_bucket'], $this->cloud_config['upyun_username'], $this->cloud_config['upyun_password'] );
			$this->service->debug = YII_DEBUG;
			$this->service->setApiDomain( "v0.api.upyun.com" );
		}
		if ( $this->cache )
		{
			self::$cache_data = Yii::app( )->config->get( self::CLOUD_CACHE_KEY );
			if ( empty( self::$cache_data ) )
			{
				self::$cache_data = array( );
			}
		}
		return $this;
	}

	public function saveFile( $filename )
	{
		$object = substr( $filename, strlen( realpath( Yii::app( )->basePath."/../" ) ) + 1 );
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			$response = $this->service->upload_file_by_file( $this->space_name, $object, $filename );
			return FALSE;
		}
		if ( $response->status != 200 && $this->cloud_type == self::CLOUT_TYPE_UPYUN )
		{
			$this->service->setContentMD5( md5_file( $filename ) );
			$fp = fopen( $filename, "r" );
			$response = $this->service->writeFile( "/".$object, $fp, TRUE );
			fclose( $fp );
			if ( !$response )
			{
				return FALSE;
			}
		}
		$this->addCache( "/".$object, time( ) );
		return TRUE;
	}

	public function deleteFile( $filename )
	{
		if ( strpos( $filename, realpath( Yii::app( )->basePath."/../" ) ) === 0 )
		{
			$filename = substr( $filename, strlen( realpath( Yii::app( )->basePath."/../" ) ) + 1 );
		}
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			$response = $this->service->delete_object( $this->space_name, $filename );
			return FALSE;
		}
		if ( $response->status != 200 && $response->status != 404 && $response->status != 204 && $this->cloud_type == self::CLOUT_TYPE_UPYUN )
		{
			$response = $this->service->deleteFile( "/".$filename );
			if ( !$response )
			{
				return FALSE;
			}
		}
		if ( $this->cache )
		{
			$file = "/".$filename;
			if ( array_key_exists( $file, self::$cache_data ) )
			{
				unset( $cache_data[$file] );
			}
		}
		return TRUE;
	}

	public function deleteDir( $dir )
	{
		$dir = rtrim( $dir, "/" );
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			$response = $this->service->delete_object( $this->space_name, $dir."/" );
			return FALSE;
		}
		if ( $response->status != 200 && $response->status != 404 && $response->status != 204 && $this->cloud_type == self::CLOUT_TYPE_UPYUN )
		{
			$response = $this->service->rmDir( "/".$dir."/" );
			if ( !$response )
			{
				return FALSE;
			}
		}
		return TRUE;
	}

	public function createDir( $dir )
	{
		if ( strpos( $dir, realpath( Yii::app( )->basePath."/../" ) ) === 0 )
		{
			$dir = substr( $dir, strlen( realpath( Yii::app( )->basePath."/../" ) ) + 1 );
		}
		$dir = rtrim( $dir, "/" );
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			$response = $this->service->create_object_dir( $this->space_name, $dir );
			if ( $response->status != 200 ) {
				throw new CException( "创建阿里云文件夹失败！" );
				return FALSE;
			}
		}
		if ( $this->cloud_type == self::CLOUT_TYPE_UPYUN ) {
			$response = $this->service->mkDir( "/".$dir, TRUE );
			if ( !$response )
			{
				throw new CException( "创建又拍云文件夹失败！" );
				return FALSE;
			}
		}
		return TRUE;
	}

	public function fileExists( $filename )
	{
		if ( strpos( $filename, realpath( Yii::app( )->basePath."/../" ) ) === 0 )
		{
			$filename = substr( $filename, strlen( realpath( Yii::app( )->basePath."/../" ) ) + 1 );
		}
		if ( $this->cloud_type == self::CLOUD_TYPE_ALIYUN )
		{
			$file = "/".$filename;
			if ( $this->cache && self::$cache_data !== FALSE && array_key_exists( $file, self::$cache_data ) )
			{
				return TRUE;
			}
			$response = $this->service->is_object_exist( $this->space_name, $filename );
			if ( $response->status == 404 )
			{
				return FALSE;
			}
			if ( $response->status == 200 )
			{
				$this->addCache( $file, $response->header['_info']['filetime'] );
				return TRUE;
			}
			return FALSE;
		}
		if ( $this->cloud_type == self::CLOUT_TYPE_UPYUN )
		{
			$file = "/".$filename;
			if ( $this->cache && self::$cache_data !== FALSE && array_key_exists( $file, self::$cache_data ) )
			{
				return TRUE;
			}
			$response = $this->service->getFileInfo( $file );
			if ( $response === NULL )
			{
				return FALSE;
			}
			$this->addCache( $file, $response['date'] );
			return TRUE;
		}
	}

	private function addCache( $file, $filemtime )
	{
		if ( $this->cache )
		{
			if ( self::$cache_data === FALSE )
			{
				self::$cache_data = array( );
			}
			if ( !in_array( $file, self::$cache_data ) )
			{
				self::$cache_data[$file] = $filemtime;
			}
		}
	}

	public function __destruct( )
	{
		Yii::app( )->config->set( self::CLOUD_CACHE_KEY, self::$cache_data );
	}

}

?>
