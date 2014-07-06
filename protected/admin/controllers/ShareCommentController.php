<?php
class ShareCommentController extends Controller
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
		$form = new Form( "backend.views.shareComment.formConfig" );
		$form->model = new ShareComment( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) && $form->validate( ) )
		{
			$model = $form->model;
			if ( $model->save( FALSE ) )
			{
				Yii::app( )->user->setFlash( "success", ShareComment::model( )->modelName.( "“".$model."”已成功添加！" ) );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
			}
		}
		$this->render( "create", array(
			"form" => $form
		) );
	}

	public function actionUpdate( )
	{
		$form = new Form( "backend.views.shareComment.formConfig" );
		$form->model = $this->loadModel( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) && $form->validate( ) )
		{
			$model = $form->model;
			if ( $model->save( FALSE ) )
			{
				Yii::app( )->user->setFlash( "success", ShareComment::model( )->modelName.( "“".$model."”已成功修改！" ) );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
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
		$model = new ShareComment( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['ShareComment'] ) )
		{
			$model->attributes = $_GET['ShareComment'];
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
				$models = ShareComment::model( )->findAllByPk( $_POST['id'] );
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
				$this->_model = ShareComment::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "share-comment-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
