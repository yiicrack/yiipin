<?php

class CaptchaWidget extends CInputWidget
{

	public $hint = NULL;

	public function init( )
	{
		if ( !extension_loaded( "gd" ) )
		{
			throw new CException( "CaptchaWidget need GD" );
		}
	}

	public function run( )
	{
		echo CHtml::activetextfield( $this->model, "verifyCode", $this->htmlOptions );
		$this->controller->widget( "system.web.widgets.captcha.CCaptcha", array(
			"buttonLabel" => "看不清换一个",
			"clickableImage" => TRUE,
			"imageOptions" => array( "style" => "cursor:pointer;vertical-align:middle;", "align" => "texttop" )
		) );
		$this->hint === NULL ? "" : "<div>".$this->hint."</div>";
	}

}

?>
