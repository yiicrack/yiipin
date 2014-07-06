<?php
class CacheController extends Controller
{

	public function actionFlush( )
	{
		Yii::app( )->cache->flush( );
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => "清理缓存成功!",
			"jumpUrl" => array( "site/welcome" ),
			"waitSecond" => 3
		) );
	}

}

?>
