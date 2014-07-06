<?php
class ShopController extends Controller
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
		$form = new Form( "backend.views.shop.formConfig" );
		$form->model = new Shop( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) )
		{
			$images = array( "logo" );
			foreach ( $images as $name )
			{
				$image = CUploadedFile::getinstance( $form->model, $name );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$dir = "/upload/".$name."/".date( "Ym" )."/";
					if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
					{
						FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
					}
					$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$form->model->$name = $dir.$filename;
					}
				}
			}
			if ( $form->validate( ) )
			{
				$model = $form->model;
				if ( $model->save( FALSE ) )
				{
					Yii::app( )->user->setFlash( "success", Shop::model( )->modelName.( "“".$model."”已成功添加！" ) );
					$this->redirect( array(
						"view",
						"id" => $model->id
					) );
				}
			}
			else
			{
				foreach ( $images as $name )
				{
					@unlink( Yii::app( )->basePath."/..".$form->model->$name );
				}
			}
		}
		$this->render( "create", array(
			"form" => $form
		) );
	}

	public function actionUpdate( )
	{
		$form = new Form( "backend.views.shop.formConfig" );
		$form->model = $this->loadModel( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		$images = array( "logo" );
		if ( $form->submitted( "btnsubmit" ) )
		{
			$filenames = array( );
			foreach ( $images as $name )
			{
				$image = CUploadedFile::getinstance( $form->model, $name );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$dir = "/upload/".$name."/".date( "Ym" )."/";
					if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
					{
						FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
					}
					$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$filenames[] = $form->model->$name;
						$form->model->$name = $dir.$filename;
					}
				}
			}
			if ( $form->validate( ) )
			{
				$model = $form->model;
				if ( $model->save( FALSE ) )
				{
					foreach ( $filenames as $filename )
					{
						@unlink( Yii::app( )->basePath."/..".$filename );
					}
					Yii::app( )->user->setFlash( "success", Shop::model( )->modelName.( "“".$model."”已成功修改！" ) );
					$this->redirect( array(
						"view",
						"id" => $model->id
					) );
				}
			}
			else
			{
				foreach ( $images as $name )
				{
					@unlink( Yii::app( )->basePath."/..".$form->model->$name );
				}
			}
		}
		$this->render( "update", array(
			"form" => $form
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
		$model = new Shop( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['Shop'] ) )
		{
			$model->attributes = $_GET['Shop'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) )
		{
			if ( $_POST['operation'] == "delete" )
			{
				$models = Shop::model( )->findAllByPk( $_POST['id'] );
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

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = Shop::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "shop-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
