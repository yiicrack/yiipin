<?php

class CacheThumbImageWidget extends CWidget
{

	public $height = NULL;
	public $width = NULL;
	public $path = "";
	public $alt = "";
	public $class = "";
	public $fullimage = FALSE;
	public $zoom = FALSE;
	public $placeholder = TRUE;
	private $croped = FALSE;
	private $baseurl = "";

	public function run( )
	{
		$width = $height = 0;
		$filename = Yii::app( )->basePath."/..".$this->path;
		$fileExists = true;
		//_obfuscate_J4SaU7yizfYKBzsˇ
		if ( file_exists( $filename ) )
		{
		}
		if ( !is_file( $filename ) )
		{
			$fileExists = true;
		}
		
		if (!$fileExists)
		{
			if ( $this->placeholder )
			{
				$pic = THEME_DIR.( 200 <= $this->width ? "/images/nopic.gif" : "/images/nopic_s.gif" );
			}
			else
			{
				echo "";
			}
		}
		else
		{
			if ( $fileExists )
			{
				$pathinfo = pathinfo( $filename );
				if ( !isset( $pathinfo['extension'] ) && !in_array( strtolower( $pathinfo['extension'] ), array( "jpg", "jpeg", "gif", "png" ) ) )
				{
					$pic = THEME_DIR."/images/nopic.gif";
				}
				else
				{
					if ( 0 < $this->width && $this->height == NULL )
					{
						$image = ImageHelper::createfromfile( $filename, $pathinfo['extension'] );
						if ( $image )
						{
							$w = imagesx( $image->_handle );
							$h = imagesy( $image->_handle );
							$this->height = intval( $this->width * $h / $w );
						}
						else
						{
							$this->height = $this->width;
						}
						$image = NULL;
					}
					$md5 = md5( $filename.$this->width.$this->height.filemtime( $filename ) );
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
							$w = imagesx( $image->_handle );
							$h = imagesy( $image->_handle );
							if ( $this->width < $w && $this->height < $h )
							{
								$image->crop( $this->width, $this->height, array(
									"fullimage" => $this->fullimage,
									"pos" => "center",
									"bgcolor" => "#ffffff",
									"transparent" => TRUE
										) );
									$image->save( Yii::app( )->basePath."/..".$dest_filename, 100 );
									$width = $this->width;
									$height = $this->height;
									$this->croped = TRUE;
							}
							else
							{
								$pic = Yii::app( )->baseUrl.$this->path;
								$width = $w;
								$height = $h;
							}
						}
						else
						{
							$pic = Yii::app( )->baseUrl."/images/nopic.gif";
							Yii::log( "The image file \"".realpath( $filename )."\" can not be handled!", "error" );
						}
					}
					else
					{
						$width = $this->width;
						$height = $this->height;
						$this->croped = TRUE;
					}
				}
			
			}
			$html = "<img src= \"".$pic."\" class=\"".$this->class."\" alt=\"".$this->alt."\" width=\"".$width."\" height=\"".$height."\" />";
			if ( $this->zoom && $this->croped )
			{
				Yii::app( )->clientScript->registerScriptFile( Yii::app( )->baseUrl."/js/jquery.jqzoom-core.js" );
				Yii::app( )->clientScript->registerScript( "jquery-zoom", "\$('#".$this->id."').jqzoom({zoomType: 'innerzoom', lens:true, title: false, preloadImages: true, preloadText: '正在加载……'});" );
				Yii::app( )->clientScript->registerCss( "jquery-zoom", "/*jquer zoom 图片缩放插件样式*/\r\n.zoomPad { position:relative; float:left; z-index:99; cursor:crosshair; }\r\n.zoomPreload { -moz-opacity:0.8; opacity: 0.8; filter: alpha(opacity = 80); color: #333; font-size: 12px; font-family: Tahoma; text-decoration: none; border: 1px solid #CCC; background-color: white; padding: 8px; text-align:center; background-image: url(".Yii::app( )->baseUrl."/images/zoomloader.gif); background-repeat: no-repeat; background-position: 43px 30px; z-index:110; width:90px; height:43px; position:absolute; top:0px; left:0px;  * width:100px;\r\n * height:49px;\r\n}\r\n.zoomPup { overflow:hidden; background-color: #FFF; -moz-opacity:0.6; opacity: 0.6; filter: alpha(opacity = 60); z-index:120; position:absolute; border:1px solid #CCC; z-index:101; cursor:crosshair; }\r\n.zoomOverlay { position:absolute; left:0px; top:0px; background:#FFF; /*opacity:0.5;*/\r\n\tz-index:5000; width:100%; height:100%; display:none; z-index:101; }\r\n.zoomWindow { position:absolute; left:110%; top:40px; background:#FFF; z-index:6000; height:auto; z-index:10000; z-index:110; }\r\n.zoomWrapper { position:relative; border:1px solid #999; z-index:110; }\r\n.zoomWrapperTitle { display:block; background:#999; color:#FFF; height:18px; line-height:18px; width:100%; overflow:hidden; text-align:center; font-size:10px; position:absolute; top:0px; left:0px; z-index:120; -moz-opacity:0.6; opacity: 0.6; filter: alpha(opacity = 60); }\r\n.zoomWrapperImage { display:block; position:relative; overflow:hidden; z-index:110; }\r\n.zoomWrapperImage img { border:0px; display:block; position:absolute; z-index:101; }\r\n.zoomIframe { z-index: -1; filter:alpha(opacity=0); -moz-opacity: 0.80; opacity: 0.80; position:absolute; display:block; }\r\n" );
				echo CHtml::link( $html, Yii::app( )->baseUrl.$this->path, array(
					"id" => $this->id
				) );
			}
			else
			{
				echo $html;
			}
		}
	}

}

?>
