<?php

class FilefieldWidget extends CInputWidget
{

	public $thumbOptions = NULL;
	public $renderDeleteCheckbox = FALSE;

	public function run( )
	{
		echo CHtml::activefilefield( $this->model, $this->attribute, $this->htmlOptions );
		echo "<br />";
		$attribute = $this->attribute;
		$path = $this->model->$attribute;
		if ( $path )
		{
			$ext = strtolower( pathinfo( $path, PATHINFO_EXTENSION ) );
			if ( in_array( $ext, array(
				"jpg",
				"gif",
				"png"
			) ) )
			{
				echo CHtml::opentag( "a", array(
					"rel" => "imagebox",
					"href" => $path
				) );
				$this->getController( )->widget( "ext.CacheThumbImageWidget", array(
					"path" => $path,
					"fullimage" => isset($this->thumbOptions['fullimage']) ? $this->thumbOptions['fullimage'] : false,
					"width" => isset($this->thumbOptions['width']) ? $this->thumbOptions['width'] : 200,
					"height" => isset($this->thumbOptions['height']) ? $this->thumbOptions['height'] : 200,
					"class" => "img_bd"
				) );
				echo CHtml::closetag( "a" );
			}
			else
			{
				echo CHtml::link( "点击下载", $path );
			}
			if ( $this->renderDeleteCheckbox )
			{
				echo "<br />";
				echo CHtml::checkbox( "delete_".$this->attribute, FALSE, array(
					"id" => "delete_".$this->attribute
				) );
				echo "&nbsp;";
				echo CHtml::label( "删除已上传", "delete_".$this->attribute, array( "style" => "float:none; width:auto; text-align:left; font-weight:normal;font-size:12px" ) );
			}
		}
	}

}

?>
