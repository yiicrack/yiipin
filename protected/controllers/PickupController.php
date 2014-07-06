<?php
class PickupController extends Controller
{

	public function actionIndex( )
	{
		$this->render( "index" );
	}

	public function actionJs( )
	{
		$this->layout = "none";
		$this->render( "js" );
	}

	public function actionAjax_varify_url( $callback )
	{
		$url = Yii::app( )->request->getUrlReferrer( );
		$item_collect = new ItemCollect( $url );
		if ( $item_collect->verify( ) )
		{
			echo $callback."({message: \"goods\"})";
		}
		else
		{
			echo $callback."({message: \"picture\"})";
		}
	}

}

?>
