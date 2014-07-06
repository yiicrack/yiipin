<?php
class SlideshowController extends Controller
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
		$model = new Slideshow( );
		$this->performAjaxValidation( $model );
		if ( isset( $_POST['Slideshow'] ) )
		{
			$model->attributes = $_POST['Slideshow'];
			if ( $model->save( ) )
			{
				$image = CUploadedFile::getinstance( $model, "image" );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$full_filename = $this->getUploadDir( "slideshow" ).$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$model->image = $this->getUploadBase( "slideshow" ).$filename;
						$model->save( );
					}
				}
				Yii::app( )->user->setFlash( "success", "幻灯“".$model->title."”已成功添加！" );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
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
		if ( isset( $_POST['Slideshow'] ) )
		{
			$model->attributes = $_POST['Slideshow'];
			unset( $model['image']);
			if ( $model->save( ) )
			{
				$image = CUploadedFile::getinstance( $model, "image" );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$full_filename = $this->getUploadDir( "slideshow" ).$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						@unlink( Yii::app( )->basePath."/../".$model->image );
						$model->image = $this->getUploadBase( "slideshow" ).$filename;
						$model->save( );
					}
				}
				Yii::app( )->user->setFlash( "success", "幻灯“".$model->title."”已成功修改！" );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
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
		$model = new Slideshow( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['Slideshow'] ) )
		{
			$model->attributes = $_GET['Slideshow'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionAutocomplete( )
	{
		if ( Yii::app( )->request->isAjaxRequest && isset( $_GET['q'] ) )
		{
			$token = $_GET['q'];
			$limit = min( $_GET['limit'], 50 );
			$criteria = new CDbCriteria( );
			$criteria->condition = "token LIKE :sterm";
			$criteria->params = array(
				":sterm" => "%".$token."%"
			);
			$criteria->limit = $limit;
			$criteria->distinct = TRUE;
			$criteria->select = array( "token" );
			$models = Slideshow::model( )->findAll( $criteria );
			$ids = "";
			foreach ( $models as $model )
			{
				$ids .= $model->getAttribute( "token" )."|".$model->getAttribute( "id" )."\n";
			}
			echo $ids;
		}
	}

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = Slideshow::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "slideshow-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
