<?php

class SlideshowWidget extends CWidget
{

	public $height = "100%";
	public $width = "100%";
	public $token = NULL;
	public $asbg = TRUE;
	public $vertical = FALSE;

	public function run( )
	{
		if ( !isset( $this->token ) )
		{
			throw new CHttpException( 500, "\"token\" have to be set!" );
		}
		$cs = Yii::app( )->getClientScript( );
		$cs->registerScriptFile( Yii::app( )->baseUrl."/js/jquery.tools.min.js", CClientScript::POS_END );
		$cs->registerScript( "slideshow", ( "\$(\".boxImg\").scrollable({circular: true, vertical: " ).( $this->vertical ? "true" : "false" )."}).autoscroll({ autoplay: true }).navigator({navi:'._num', activeClass: 'current'});" );
		$data = Slideshow::model( )->findAllByAttributes( array(
			"token" => $this->token
		), array( "limit" => 5, "order" => "sortnum DESC" ) );
		$html = "";
		$html2 = "";
		foreach ( $data as $index => $item )
		{
			if ( $this->asbg )
			{
				$html .= "<li style=\"display: block; width: 100%;\">\r\n                        <div style=\"position: relative; height: ".$this->height."; width:100%; background: url(".Yii::app( )->baseUrl.$item->image.") no-repeat scroll center top transparent;\">\r\n                        <a style=\"top: 0px; left: 0px; width: 100%; height: ".$this->height."; background-position: 0px 0px; position: absolute;\" href=\"".$item->url."\" target=\"_blank\"></a>\r\n                        </div></li>";
			}
			else
			{
				$html .= "<li class=\"left_f\"><a href=\"".$item->url."\" target=\"_blank\"><img width=\"".$this->width."\" height=\"".$this->height."\" src=\"".Yii::app( )->baseUrl.$item->image."\"></a></li>";
			}
			$html2 .= "<a class=\"".( $index == 0 ? "current" : "" )."\"><span class=\"none_f\">".( $index + 1 )."</span></a>";
		}
		if ( $this->vertical )
		{
			$style = "width:100%; height:".$this->height * count( $data )."px";
		}
		else
		{
			$style = "width:".$this->width * count( $data )."px";
		}
		echo "       <div style=\"width: ";
		echo $this->width;
		echo "; height: ";
		echo $this->height;
		echo "; position:relative; overflow:hidden;\" class=\"boxImg\">\r\n\t\t\t<ul style=\"position: absolute; ";
		echo $style;
		echo "; display: inline-block;\" class=\"_img items\">\r\n\t\t\t\t";
		echo $html;
		echo "\r\n\t\t\t</ul>\r\n\t\t</div>\r\n\t\t<div class=\"_num adType1 \">\r\n\t\t\t";
		echo $html2;
		echo "\r\n\t\t</div>";
	}

}

?>
