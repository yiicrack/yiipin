<?php
abstract class ImageHelper
{

	public static function createFromFile( $filename, $ext = "", $output = FALSE )
	{
		if ( $ext == "" )
		{
			$ext = pathinfo( $filename, PATHINFO_EXTENSION );
		}
		$ext = trim( strtolower( $ext ), "." );
		if ( empty( $ext ) )
		{
			$ext = "jpg";
		}
		$exts = array( "jpg" => "imagecreatefromjpeg", "jpeg" => "imagecreatefromjpeg", "png" => "imagecreatefrompng", "gif" => "imagecreatefromgif", "bmp" => "imagecreatefromwbmp" );
		if ( !isset( $exts[$ext] ) )
		{
			throw new Exception( "Not Implemented: imagecreateform".$ext );
		}
		$handle = @call_user_func( $exts[$ext], $filename );
		if ( $output )
		{
			return $handle;
		}
		if ( is_resource( $handle ) )
		{
			return new ImageGD( $handle );
		}
		return FALSE;
	}

	public static function hex2rgb( $color, $default = "ffffff" )
	{
		$hex = trim( $color, "#&Hh" );
		$len = strlen( $hex );
		if ( $len == 3 )
		{
			$hex = "{$hex[0]}{$hex[0]}{$hex[1]}{$hex[1]}{$hex[2]}{$hex[2]}";
		}
		else if ( $len < 6 )
		{
			$hex = $default;
		}
		$dec = hexdec( $hex );
		return array(
			$dec >> 16 & 255,
			$dec >> 8 & 255,
			$dec & 255
		);
	}

}

class ImageGD
{

	public $_handle = NULL;

	public function __construct( $handle )
	{
		$this->_handle = $handle;
	}

	public function __destruct( )
	{
		$this->destroy( );
	}

	public function resize( $width, $height )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$dest = imagecreatetruecolor( $width, $height );
		imagecopyresized( $dest, $this->_handle, 0, 0, 0, 0, $width, $height, imagesx( $this->_handle ), imagesy( $this->_handle ) );
		imagedestroy( $this->_handle );
		$this->_handle = $dest;
		return $this;
	}

	public function resampled( $width, $height )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$dest = imagecreatetruecolor( $width, $height );
		imagecopyresampled( $dest, $this->_handle, 0, 0, 0, 0, $width, $height, imagesx( $this->_handle ), imagesy( $this->_handle ) );
		imagedestroy( $this->_handle );
		$this->_handle = $dest;
		return $this;
	}

	public function resizeCanvas( $width, $height, $pos = "center", $bgcolor = "0xffffff" )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$dest = imagecreatetruecolor( $width, $height );
		$sx = imagesx( $this->_handle );
		$sy = imagesy( $this->_handle );
		switch ( strtolower( $pos ) )
		{
		case "left" :
			$ox = 0;
			$oy = ( $height - $sy ) / 2;
			break;
		case "right" :
			$ox = $width - $sx;
			$oy = ( $height - $sy ) / 2;
			break;
		case "top" :
			$ox = ( $width - $sx ) / 2;
			$oy = 0;
			break;
		case "bottom" :
			$ox = ( $width - $sx ) / 2;
			$oy = $height - $sy;
			break;
		case "top-left" :
		case "left-top" :
			$ox = $oy = 0;
			break;
		case "top-right" :
		case "right-top" :
			$ox = $width - $sx;
			$oy = 0;
			break;
		case "bottom-left" :
		case "left-bottom" :
			$ox = 0;
			$oy = $height - $sy;
			break;
		case "bottom-right" :
		case "right-bottom" :
			$ox = $width - $sx;
			$oy = $height - $sy;
			break;
		default :
			$ox = ( $width - $sx ) / 2;
			$oy = ( $height - $sy ) / 2;
		}
		list( $r, $g, $b ) = ImageHelper::hex2rgb( $bgcolor, "0xffffff" );
		$bgcolor = imagecolorallocate( $dest, $r, $g, $b );
		imagefilledrectangle( $dest, 0, 0, $width, $height, $bgcolor );
		imagecolordeallocate( $dest, $bgcolor );
		imagecopy( $dest, $this->_handle, $ox, $oy, 0, 0, $sx, $sy );
		imagedestroy( $this->_handle );
		$this->_handle = $dest;
		return $this;
	}

	public function crop( $width, $height, $options = array( ) )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$default_options = array( "fullimage" => FALSE, "pos" => "center", "bgcolor" => "0xfff", "enlarge" => FALSE, "reduce" => TRUE, "transparent" => FALSE );
		$options = array_merge( $default_options, $options );
		$dest = imagecreatetruecolor( $width, $height );
		list( $r, $g, $b ) = ImageHelper::hex2rgb( $options['bgcolor'], "0xffffff" );
		$bgcolor = imagecolorallocate( $dest, $r, $g, $b );
		imagefilledrectangle( $dest, 0, 0, $width, $height, $bgcolor );
		imagecolordeallocate( $dest, $bgcolor );
		if ( $options['transparent'] )
		{
			imagecolortransparent( $dest, $bgcolor );
		}
		$full_w = imagesx( $this->_handle );
		$full_h = imagesy( $this->_handle );
		$ratio_w = doubleval( $width ) / doubleval( $full_w );
		$ratio_h = doubleval( $height ) / doubleval( $full_h );
		if ( $options['fullimage'] )
		{
			$ratio = $ratio_w < $ratio_h ? $ratio_w : $ratio_h;
		}
		else
		{
			$ratio = $ratio_h < $ratio_w ? $ratio_w : $ratio_h;
		}
		if ( !$options['enlarge'] || 1 < $ratio )
		{
			$ratio = 1;
		}
		if ( !$options['reduce'] || $ratio < 1 )
		{
			$ratio = 1;
		}
		$dst_w = $full_w * $ratio;
		$dst_h = $full_h * $ratio;
		switch ( strtolower( $options['pos'] ) )
		{
		case "left" :
			$dst_x = 0;
			$dst_y = ( $height - $dst_h ) / 2;
			break;
		case "right" :
			$dst_x = $width - $dst_w;
			$dst_y = ( $height - $dst_h ) / 2;
			break;
		case "top" :
			$dst_x = ( $width - $dst_w ) / 2;
			$dst_y = 0;
			break;
		case "bottom" :
			$dst_x = ( $width - $dst_w ) / 2;
			$dst_y = $height - $dst_h;
			break;
		case "top-left" :
		case "left-top" :
			$dst_x = $dst_y = 0;
			break;
		case "top-right" :
		case "right-top" :
			$dst_x = $width - $dst_w;
			$dst_y = 0;
			break;
		case "bottom-left" :
		case "left-bottom" :
			$dst_x = 0;
			$dst_y = $height - $dst_h;
			break;
		case "bottom-right" :
		case "right-bottom" :
			$dst_x = $width - $dst_w;
			$dst_y = $height - $dst_h;
			break;
		case "center" :
			$dst_x = ( $width - $dst_w ) / 2;
			$dst_y = ( $height - $dst_h ) / 2;
		}
		imagecopyresampled( $dest, $this->_handle, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $full_w, $full_h );
		imagedestroy( $this->_handle );
		$this->_handle = $dest;
		return $this;
	}

	public function cutedge( $ratio )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$full_w = imagesx( $this->_handle );
		$full_h = imagesy( $this->_handle );
		$dst_w = $full_w * ( 1 - $ratio * 2 );
		$dst_h = $full_h * ( 1 - $ratio * 2 );
		$dest = imagecreatetruecolor( $dst_w, $dst_h );
		$src_w = $full_w * $ratio;
		$src_h = $full_h * $ratio;
		imagecopy( $dest, $this->_handle, 0, 0, $src_w, $src_h, $full_w, $full_h );
		imagedestroy( $this->_handle );
		$this->_handle = $dest;
		return $this;
	}

	public function waterMark( $options = array( ) )
	{
		if ( is_null( $this->_handle ) )
		{
			return $this;
		}
		$default_options = array(
			"type" => "gif",
			"transparent" => 100,
			"minwidth" => 0,
			"minheight" => 0,
			"text" => array(
				"text" => Yii::app( )->request->serverName,
				"fontpath" => Yii::app( )->basePath."/data/DroidSansFallback.ttf",
				"size" => 10,
				"angle" => 0,
				"color" => "#efefef",
				"shadowx" => 0,
				"shadowy" => 0,
				"shadowcolor" => "#999999",
				"skewx" => 0,
				"skewy" => 0
			),
			"position" => 9
		);
		$map = new CMap( $default_options );
		$map->mergeWith( $options );
		$options = $map->toArray( );
		$sx = imagesx( $this->_handle );
		$sy = imagesy( $this->_handle );
		if ( !$options['minwidth'] && $sx <= $options['minwidth'] || $options['minheight'] && $sy <= $options['minheight'] )
		{
			return $this;
		}
		if ( $options['type'] == "text" && ( !file_exists( $options['text']['fontpath'] ) && !is_file( $options['text']['fontpath'] ) ) )
		{
			throw new Exception( "The Font Path is invalid!" );
		}
		if ( function_exists( "imagecopy" ) && function_exists( "imagealphablending" ) && function_exists( "imagecopymerge" ) )
		{
			if ( $options['type'] != "text" )
			{
				$watermark = $options['type'] == "png" ? Yii::app( )->basePath."/../images/watermark.png" : Yii::app( )->basePath."/../images/watermark.gif";
				$imagesize = @getimagesize( $watermark );
				$wim = $options['type'] == "png" ? imagecreatefrompng( $watermark ) : imagecreatefromgif( $watermark );
				if ( !$wim )
				{
					throw new Exception( "The watermark image is invalid!" );
				}
				list( $wx, $wy ) = $imagesize;
			}
			else
			{
				$text = pack( "H*", bin2hex( $options['text']['text'] ) );
				$dim = imagettfbbox( $options['text']['size'], $options['text']['angle'], $options['text']['fontpath'], $text );
				$wy = max( $dim[1], $dim[3] ) - min( $dim[5], $dim[7] );
				$wx = max( $dim[2], $dim[4] ) - min( $dim[0], $dim[6] );
				$left = min( $dim[0], $dim[6] ) * -1;
				$top = min( $dim[5], $dim[7] ) * -1;
			}
			$ox = $sx - $wx;
			$oy = $sy - $wy;
			if ( ( !( $options['type'] != "text" ) && is_readable( $watermark ) || $options['type'] == "text" ) && 10 < $ox && 10 < $oy )
			{
				switch ( $options['position'] )
				{
				case 1 :
					$x = 5;
					$y = 5;
					break;
				case 2 :
					$x = ( $sx - $wx ) / 2;
					$y = 5;
					break;
				case 3 :
					$x = $sx - $wx - 5;
					$y = 5;
					break;
				case 4 :
					$x = 5;
					$y = ( $sy - $wy ) / 2;
					break;
				case 5 :
					$x = ( $sx - $wx ) / 2;
					$y = ( $sy - $wy ) / 2;
					break;
				case 6 :
					$x = $sx - $wx;
					$y = ( $sy - $wy ) / 2;
					break;
				case 7 :
					$x = 5;
					$y = $sy - $wy - 5;
					break;
				case 8 :
					$x = ( $sx - $wx ) / 2;
					$y = $sy - $wy - 5;
					break;
				case 9 :
					$x = $sx - $wx - 5;
					$y = $sy - $wy - 5;
				}
				$im = imagecreatetruecolor( $sx, $sy );
				@imagecopy( $im, $this->_handle, 0, 0, 0, 0, $sx, $sy );
				if ( $options['type'] == "png" )
				{
					@imagecopy( $im, $wim, $x, $y, 0, 0, $wx, $wy );
				}
				else if ( $options['type'] == "text" )
				{
					if ( ( $options['text']['shadowx'] || $options['text']['shadowy'] ) && $options['text']['shadowcolor'] )
					{
						$shadowcolor = ImageHelper::hex2rgb( $options['text']['shadowcolor'] );
						$shadowcolor = imagecolorallocate( $im, $shadowcolor[0], $shadowcolor[1], $shadowcolor[2] );
						imagettftext( $im, $options['text']['size'], $options['text']['angle'], $x + $left + $options['text']['shadowx'], $y + $top + $options['text']['shadowy'], $shadowcolor, $options['text']['fontpath'], $text );
					}
					$color = ImageHelper::hex2rgb( $options['text']['color'] );
					$color = imagecolorallocate( $im, $color[0], $color[1], $color[2] );
					imagettftext( $im, $options['text']['size'], $options['text']['angle'], $x + $left, $y + $top, $color, $options['text']['fontpath'], $text );
				}
				else
				{
					imagealphablending( $wim, TRUE );
					@imagecopymerge( $im, $wim, $x, $y, 0, 0, $wx, $wy, $options['transparent'] );
				}
				$this->_handle = $im;
			}
		}
		else
		{
			throw new Exception( "The GD library seams to be disabled!" );
		}
	}

	public function mosaic( $x1, $y1, $x2, $y2, $deep )
	{
		if ( $x2 <= $x1 || $y2 <= $y1 )
		{
			return $this;
		}
		$x = $x1;
		for ( ;	$x < $x2;	$x += $deep	)
		{
			$y = $y1;
			for ( ;	$y < $y2;	$y += $deep	)
			{
				$color = @imagecolorat( $this->_handle, $x + @round( $deep / 2 ), $y + @round( $deep / 2 ) );
				@imagefilledrectangle( $this->_handle, $x, $y, $x + $deep, $y + $deep, $color );
			}
		}
	}

	public function saveAsJpeg( $filename, $quality = 95 )
	{
		imagejpeg( $this->_handle, $filename, $quality );
	}

	public function saveAsJpg( $filename )
	{
		$this->saveAsJpeg( $filename );
	}

	public function saveAsPng( $filename )
	{
		imagepng( $this->_handle, $filename );
	}

	public function saveAsGif( $filename )
	{
		imagegif( $this->_handle, $filename );
	}

	public function saveAsBmp( $filename )
	{
		imagewbmp( $this->_handle, $filename );
	}

	public function save( $filename )
	{
		$pathinfo = pathinfo( $filename );
		$ext = $pathinfo['extension'] ? $pathinfo['extension'] : "jpg";
		$filename = $pathinfo['extension'] ? $filename : $filename.".jpg";
		$method = "saveAs".$ext;
		$this->$method( $filename );
	}

	public function destroy( )
	{
		if ( !$this->_handle )
		{
			@imagedestroy( $this->_handle );
		}
		$this->_handle = NULL;
		return $this;
	}

}

?>
