<?php
class CreditLogController extends Controller
{

	public function actionIndex( )
	{
		$model = new CreditLog( "search" );
		if ( isset( $_GET['CreditLog'] ) )
		{
			$model->attributes = $_GET['CreditLog'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

}

?>
