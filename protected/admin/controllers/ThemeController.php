<?php
class ThemeController extends Controller
{

	public function actionIndex( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			Yii::app( )->config->set( "theme", trim( $_POST['theme'] ) );
			Yii::app( )->cache->flush( );
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "设置保存成功!",
				"jumpUrl" => array( "theme/index" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$theme_basedir = realpath( Yii::app( )->basePath."/../themes" );
		$theme_names = Yii::app( )->themeManager->getThemeNames( );
		$themes = array( );
		foreach ( $theme_names as $name )
		{
			$themes[$name] = include( $theme_basedir."/".$name."/info.php" );
		}
		foreach ( $themes as $name => $theme )
		{
			$themes[$name]['thumb'] = Yii::app( )->themeManager->baseUrl."/".$name."/".$theme['thumb'];
		}
		$current_theme = Yii::app( )->config->get( "theme" );
		$this->render( "index", array(
			"themes" => $themes,
			"current" => empty( $current_theme ) ? "default" : $current_theme
		) );
	}

}

?>
