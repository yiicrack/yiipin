<?php
class TrialController extends Controller
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
		$form = new Form( "backend.views.trial.formConfig" );
		$form->model = new Trial( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) )
		{
			$images = array( "image" );
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
				unset( $form->model[$name] );
			}
			if ( $form->validate( ) )
			{
				$model = $form->model;
				if ( $model->save( FALSE ) )
				{
					Yii::app( )->user->setFlash( "success", Trial::model( )->modelName.( "“".$model."”已成功添加！" ) );
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
		$form = new Form( "backend.views.trial.formConfig" );
		$form->model = $this->loadModel( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		$images = array( "image" );
		foreach ( $images as $name )
		{
			unset( $form->model[$name] );
		}
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
					foreach ( $filenames as $f )
					{
						@unlink( Yii::app( )->basePath."/..".$f );
					}
					Yii::app( )->user->setFlash( "success", Trial::model( )->modelName.( "“".$model."”已成功修改！" ) );
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
		$model = new Trial( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['Trial'] ) )
		{
			$model->attributes = $_GET['Trial'];
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
				$trial = Trial::model( )->findAllByPk( $_POST['id'] );
				if ( $trial )
				{
					foreach ( $trial as $_obfuscate_0e3q )
					{
						$_obfuscate_0e3q->delete( );
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
				$this->_model = Trial::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "trial-goods-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
