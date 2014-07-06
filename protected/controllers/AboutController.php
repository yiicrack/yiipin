<?php
class AboutController extends Controller
{

	public function actionIndex( $name )
	{
		$about = About::model( )->findByAttributes( array(
			"name" => $name
		) );
		if ( $about === NULL )
		{
			throw new CHttpException( 404 );
		}
		$this->render( "index", array(
			"about" => $about
		) );
	}

}

?>
