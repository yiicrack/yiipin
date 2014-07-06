<?php
class SettingsController extends Controller
{

	public function actionIndex( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/index" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "index" );
	}

	public function actionFrontpage( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/frontpage" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "frontpage" );
	}

	public function actionCloudstorage( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/cloudstorage" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "cloudstorage" );
	}
	
	public function actionUnion( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/union" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "union" );
	}

	public function actionConnect( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/connect" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "connect" );
	}

	public function actionFollow( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "settings/follow" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "follow", array(
			"follow" => Yii::app( )->config->get( "follow" )
		) );
	}
	
}

?>
