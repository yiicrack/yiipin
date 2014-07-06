<?php
class GoodsTagController extends Controller
{

	private $_model = NULL;

	public function actionCreate( )
	{
		$form = new Form( "backend.views.goodsTag.formConfig" );
		$form->model = new GoodsTag( );
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
				Yii::app( )->user->setFlash( "success", GoodsTag::model( )->modelName.( "“".$model."”已成功添加！" ) );
				$this->redirect( array( "index" ) );
			}
		}
		$this->render( "create", array(
			"form" => $form
		) );
	}

	public function actionUpdate( )
	{
		$form = new Form( "backend.views.goodsTag.formConfig" );
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
				Yii::app( )->user->setFlash( "success", GoodsTag::model( )->modelName.( "“".$model."”已成功修改！" ) );
				$this->redirect( array( "index" ) );
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
		$model = new GoodsTag( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['GoodsTag'] ) )
		{
			$model->attributes = $_GET['GoodsTag'];
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
				$models = GoodsTag::model( )->findAllByPk( $_POST['id'] );
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
				$this->_model = GoodsTag::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "goods-tag-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
