<?php
class UserController extends Controller
{

	public $_model = NULL;
	public $pageTitle = "会员";

	public function actionUpdate( )
	{
		$model = $this->loadModel( );
		if ( isset( $_POST['User'] ) )
		{
			$newpw = "";
			if ( !empty( $_POST['User']['password'] ) )
			{
				$newpw = $_POST['User']['password'];
				$GLOBALS['_POST']['User']['password'] = md5( $_POST['User']['password'] );
			}
			else
			{
				unset( $GLOBALS['_POST']['User']['password'] );
			}
			$model->attributes = $_POST['User'];
			if ( $model->save( ) )
			{
				Yii::import( "application.vendors.*" );
				include_once( "ucenter.php" );
				if ( $newpw )
				{
					//uc_client/client.php uc_user_edit
					uc_user_edit( $model->username, "", $newpw, "", 1 );
				}
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
			$model = $this->loadModel( );
			Yii::import( "application.vendors.*" );
			include_once( "ucenter.php" );
			//uc_client/client.php uc_user_delete
			uc_user_delete( $model->id );
			$model->delete( );
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
		$model = new User( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['User'] ) )
		{
			$model->attributes = $_GET['User'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = User::model( )->findbyPk( $_GET['id'] );
			}
			if ( $this->_model === NULL )
			{
				throw new CHttpException( 404, "您要浏览的页面不存在，可能是已被删除或者URL地址错误。" );
			}
		}
		return $this->_model;
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) )
		{
			if ( $_POST['operation'] == "delete" )
			{
				$models = User::model( )->findAllByPk( $_POST['id'] );
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

	protected function performAjaxValidation( $model )
	{
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "user-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
