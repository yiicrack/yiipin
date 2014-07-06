<?php
class HelpcenterController extends Controller
{

	public function actionIndex( )
	{
		$this->render( "index", array(
			"helps" => Help::model( )->findAll( array(
				"order" => "sortnum DESC"
			) )
		) );
	}

}

?>
