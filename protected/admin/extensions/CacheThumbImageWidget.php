<?php
class CacheThumbImageWidget extends CWidget
{

	public $height = "100";
	public $width = "100";
	public $path = "";
	public $alt = "";
	public $class = "";

	public function run( )
	{
		$filename = Yii::app( )->basePath."/..".$this->path;
		if ( file_exists( $filename ) )
		{
		}
		if ( !is_file( $filename ) )
		{
			$pic = "/images/nopic_s.gif";
		}
		if ( is_file( $filename ) )
		{
			$pathinfo = pathinfo( $filename );
			if ( !isset( $pathinfo['extension'] ) )
			{
				$pic = Yii::app( )->baseUrl."/images/nopic.gif";
			}
			else
			{
				$md5 = md5( $filename.$this->width.$this->height );
				$h1 = substr( $md5, 0, 1 );
				$h2 = substr( $md5, 1, 1 );
				$dir = Yii::app( )->basePath."/../upload/thumb/".$h1."/".$h2."/";
				if ( !file_exists( $dir ) )
				{
					FileHelper::mkdirs( $dir );
				}
				$dest_filename = "/upload/thumb/".$h1."/".$h2."/".$md5.".".$pathinfo['extension'];
				$pic = Yii::app( )->baseUrl.$dest_filename;
				if ( !is_file( Yii::app( )->basePath."/..".$dest_filename ) )
				{
					$image = ImageHelper::createfromfile( $filename, $pathinfo['extension'] );
					if ( $image )
					{
						$image->crop( $this->width, $this->height, array( "fullimage" => FALSE, "pos" => "center", "bgcolor" => "#ffffff", "transparent" => TRUE ) );
						$image->save( Yii::app( )->basePath."/..".$dest_filename, 100 );
					}
					else
					{
						$pic = Yii::app( )->baseUrl."/images/nopic.gif";
						Yii::log( "The image file \"".realpath( $filename )."\" can not be handled!", "error" );
					}
				}
			}
		}
		echo "<img src= \"".$pic."\" class=\"".$this->class."\" alt=\"".$this->alt."\" height=\"".$this->height."\" width=\"".$this->width."\" />";
	}

}

?>
