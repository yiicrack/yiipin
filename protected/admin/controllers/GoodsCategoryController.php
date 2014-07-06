<?php
class GoodsCategoryController extends Controller
{

	private $_model = NULL;

	public function actionCreate( )
	{
		$form = new Form( "backend.views.goodsCategory.formConfig" );
		$form->model = new GoodsCategory( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) && $form->validate( ) )
		{
			$model = $form->model;
			//var_dump($model);exit;
			if ( $model->save( FALSE ) )
			{
				Yii::app( )->user->setFlash( "success", GoodsCategory::model( )->modelName.( "“".$model."”已成功添加！" ) );
				$this->redirect( array( "index" ) );
			}
		}
		$this->render( "create", array(
			"form" => $form
		) );
	}

	public function actionUpdate( )
	{
		$form = new Form( "backend.views.goodsCategory.formConfig" );
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
				Yii::app( )->user->setFlash( "success", GoodsCategory::model( )->modelName.( "“".$model."”已成功修改！" ) );
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
		$model = new GoodsCategory( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['GoodsCategory'] ) )
		{
			$model->attributes = $_GET['GoodsCategory'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionTags( )
	{
		$category = $this->loadModel( );
		$groups = explode( "\r\n", trim( $category->tag_groups ) );
		if ( Yii::app( )->request->isPostRequest )
		{
			GoodsCategoryHasTag::model( )->deleteAllByAttributes( array(
				"category_id" => $category->id
			) );
			foreach ( $_POST['tags'] as $group => $tags )
			{
				$tags = explode( " ", trim( $tags ) );
				foreach ( $tags as $sortnum => $tag_name )
				{
					$tag = GoodsTag::model( )->findByAttributes( array(
						"name" => $tag_name
					) );
					if ( $tag === NULL )
					{
						$tag = new GoodsTag( );
						$tag->name = $tag_name;
						$tag->save( );
					}
					$has_tag = GoodsCategoryHasTag::model( )->findByAttributes( array(
						"category_id" => $category->id,
						"tag_id" => $tag->id,
						"group" => $group
					) );
					if ( $has_tag === NULL )
					{
						$has_tag = new GoodsCategoryHasTag( );
						$has_tag->category_id = $category->id;
						$has_tag->tag_id = $tag->id;
						$has_tag->group = $group;
						$has_tag->sortnum = $sortnum;
						$has_tag->save( );
					}
				}
			}
			Yii::app( )->user->setFlash( "success", "分类标签成功保存！" );
			$this->redirect( array( "index" ) );
		}
		$this->render( "tags", array(
			"groups" => $groups,
			"tags" => GoodsTag::model( )->findAll( )
		) );
	}

	public function getTags( $category_id, $group )
	{
		$has_tag = GoodsCategoryHasTag::model( )->findAllByAttributes( array(
			"category_id" => $category_id,
			"group" => $group
		), array( "order" => "sortnum ASC" ) );
		$tags = "";
		foreach ( $has_tag as $tag )
		{
			$tags .= $tag->tag->name." ";
		}
		return $tags;
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) )
		{
			if ( $_POST['operation'] == "delete" )
			{
				$models = GoodsCategory::model( )->findAllByPk( $_POST['id'] );
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
				$this->_model = GoodsCategory::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "goods-category-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
