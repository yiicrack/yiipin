<?php
class ThumbWidget extends CWidget
{

	public $height = NULL;
	public $width = NULL;
	public $path = "";
	public $alt = "";
	public $lazyload = FALSE;
	public $htmlOptions = array( );
	public $options = array( );
	private $image = NULL;
	private $imgh = NULL;
	private $imgw = NULL;

	public function run( )
	{
		$default_options = array( "fullimage" => FALSE, "pos" => "center", "bgcolor" => "#ffffff", "transparent" => TRUE );
		$this->options = array_merge( $default_options, $this->options );
		$filename = realpath( Yii::app( )->basePath."/.." ).$this->path;
		$path = pathinfo( $filename );
		if ( !isset( $path['extension'] ) && !in_array( strtolower( $path['extension'] ), array( "jpg", "jpeg", "gif", "png" ) ) )
		{
			echo $this->renderNopic( );
		}
		else
		{
			$this->image = ImageHelper::createfromfile( $filename, $path['extension'] );
			if ( 0 < $this->width && $this->height == NULL )
			{
				if ( $this->image )
				{
					$this->imgw = imagesx( $this->image->_handle );
					$this->imgh = imagesy( $this->image->_handle );
					$this->height = intval( $this->width * $this->imgh / $this->imgw );
				}
				else
				{
					$this->height = $this->width;
				}
			}
			$md5 = md5( $filename.$this->width.$this->height.filemtime( $filename ) );
			$h1 = substr( $md5, 0, 2 );
			$h2 = substr( $md5, 2, 2 );
			$dir = Yii::app( )->basePath."/../upload/thumb/".$h1."/".$h2."/";
			if ( !file_exists( $dir ) )
			{
				FileHelper::mkdirs( $dir );
			}
			$dest_filename = "/upload/thumb/".$h1."/".$h2."/".$md5.".".$path['extension'];
			$pic = Yii::app( )->basePath."/..".$dest_filename;
			if ( file_exists( $pic ) )
			{
			}
			if ( !is_file( $pic ) )
			{
				if ( $this->width < $this->imgw && $this->height < $this->imgh )
				{
					$this->image->crop( $this->width, $this->height, $this->options );
					$this->image->save( $pic, 100 );
				}
				else
				{
					$dest_filename = $this->path;
				}
			}
			$this->htmlOptions['width'] = $this->width;
			$this->htmlOptions['height'] = $this->height;
			if ( $this->lazyload )
			{
				if ( isset( $this->htmlOptions['class'] ) )
				{
					$class = preg_split( "/[\\s,]+/", $this->htmlOptions['class'], -1, PREG_SPLIT_NO_EMPTY );
					$class[] = "lazy";
					$this->htmlOptions['class'] = implode( " ", $class );
				}
				else
				{
					$this->htmlOptions['class'] = "lazy";
				}
				$this->htmlOptions['data-original'] = Yii::app( )->baseUrl.$dest_filename;
				$img = CHtml::image( Yii::app( )->baseUrl."/images/blank.gif", $this->alt, $this->htmlOptions );
			}
			else
			{
				$img = CHtml::image( Yii::app( )->baseUrl.$dest_filename, $this->alt, $this->htmlOptions );
			}
			echo $img;
		}
	}

	public function renderNopic( )
	{
		return CHtml::image( THEME_DIR."/images/nopic.gif", "图片丢失", $this->htmlOptions );
	}

}

?>
