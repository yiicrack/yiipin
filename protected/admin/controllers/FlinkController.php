<?php
class FlinkController extends Controller
{

	private $_model = NULL;

	public function actionView( )
	{
		$this->render( "view", array(
			"model" => $this->loadModel( )
		) );
	}

	public function actionCreate( )
	{
		$model = new Flink( );
		$this->performAjaxValidation( $model );
		if ( isset( $_POST['Flink'] ) )
		{
			$model->attributes = $_POST['Flink'];
			if ( $model->save( ) )
			{
				$image = CUploadedFile::getinstance( $model, "image" );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$full_filename = $this->getUploadDir( "flink" ).$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$model->image = $this->getUploadBase( "flink" ).$filename;
						$model->save( );
					}
				}
				Yii::app( )->user->setFlash( "success", "友情链接“".$model->name."”已成功添加！" );
				$this->redirect( array( "index" ) );
			}
		}
		$this->render( "create", array(
			"model" => $model
		) );
	}

	public function actionUpdate( )
	{
		$model = $this->loadModel( );
		$this->performAjaxValidation( $model );
		if ( isset( $_POST['Flink'] ) )
		{
			$model->attributes = $_POST['Flink'];
			if ( isset( $_POST['delete_image'] ) && $_POST['delete_image'] )
			{
				if ( $model->image )
				{
					@unlink( Yii::app( )->basePath."/../".$model->image );
				}
				$model->image = NULL;
			}
			unset( $model['image']);
			if ( $model->save( ) )
			{
				$image = CUploadedFile::getinstance( $model, "image" );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$full_filename = $this->getUploadDir( "flink" ).$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						@unlink( Yii::app( )->basePath."/../".$model->image );
						$model->image = $this->getUploadBase( "flink" ).$filename;
						$model->save( );
					}
				}
				Yii::app( )->user->setFlash( "success", "友情链接“".$model->name."”已成功修改！" );
				$this->redirect( array( "index" ) );
			}
		}
		$this->render( "update", array(
			"model" => $model
		) );
	}

	public function actionDelete( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$this->loadModel( )->delete( );
			if ( !isset( $_GET['ajax'] ) )
			{
				$this->redirect( array( "index" ) );
			}
		}
		else
		{
			throw new CHttpException( 400, "Invalid request. Please do not repeat this request again." );
		}
	}

	public function actionIndex( )
	{
		$model = new Flink( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['Flink'] ) )
		{
			$model->attributes = $_GET['Flink'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) )
		{
			if ( $_POST['operation'] == "check" )
			{
				Flink::model( )->updateByPk( $_POST['id'], array(
					"enabled" => $_POST['opcheck']
				) );
			}
			else if ( $_POST['operation'] == "delete" )
			{
				$models = Flink::model( )->findAllByPk( $_POST['id'] );
				if ( $models )
				{
					foreach ( $models as $model )
					{
						$model->delete( );
					}
				}
			}
			echo "操作成功！";
		}
	}

	public function actionCheck( )
	{
		$start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
		$link = Flink::model( )->find( array(
			"order" => "id ASC",
			"condition" => "id > ".$start
		) );
		$this->showHead( );
		if ( $link !== NULL )
		{
			$this->showmsg( "检查友情链接 ".$link->name." ..." );
			$this->showmsg( "下载页面 ".$link->url."..." );
			$html = UtilHelper::getpage( $link->url );
			$this->showmsg( "下载页面 ".( stripos( $html, "<title>" ) !== FALSE ? "成功" : "失败" )."!" );
			if ( preg_match( "%<a[^>]*href=\"http://www\\.steelzx\\.com\"[^>]*>.*?</a>%si", $html ) )
			{
				$link->enabled = 1;
				$link->save( );
				$this->showmsg( "发现有效链接 ..." );
			}
			else
			{
				$link->enabled = 0;
				$link->save( );
				$this->showmsg( "没有发现有效链接 ..." );
			}
			$this->showmsg( "<script>setTimeout('window.location.href=\"".$this->createUrl( "check", array(
				"start" => $link->id
			) )."\";', 2000);</script>" );
		}
		else
		{
			$this->showmsg( "完成检查！" );
		}
	}

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = Flink::model( )->findbyPk( $_GET['id'] );
			}
			if ( $this->_model === NULL )
			{
				throw new CHttpException( 404, "您要浏览的页面不存在，可能是已被删除或者URL地址错误。" );
			}
		}
		return $this->_model;
	}

	protected function performAjaxValidation( $model )
	{
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "flink-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

	protected function showmsg( $msg, $isexit = FALSE )
	{
		echo "<br />".$msg;
		echo "<script type=\"text/javascript\">document.documentElement.scrollTop=document.documentElement.scrollHeight</script>";
		flush( );
		if ( $isexit )
		{
			exit( );
		}
	}

	protected function showHead( )
	{
		echo "\n        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n<title>检查友情链接投放</title>\n<style type=\"text/css\">\n    body { background: none repeat scroll 0 0 #F0F7FF; font-size:12px; line-height:200%;}\n</style>\n</head>\n\n<body>\n        ";
	}

}

?>
