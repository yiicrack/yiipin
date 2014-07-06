<?php
class AdministratorController extends Controller
{

	private $_model = NULL;
	public $pageTitle = "管理员";
	private $auth = NULL;

	public function __construct($id)
	{
		parent::__construct($id);
		$this->auth = Yii::app( )->authManager;
	}

	public function actionView( )
	{
		$this->render( "view", array(
			"model" => $this->loadModel( )
		) );
	}

	public function actionCreate( )
	{
		$model = new Administrator( );
		if ( isset( $_POST['Administrator'] ) )
		{
			$model->attributes = $_POST['Administrator'];
			$model->salt = rand( 10000, 99999 );
			$model->password = md5( md5( $model->password ).$model->salt );
			if ( $model->save( ) )
			{
				Yii::app( )->user->setFlash( "success", "管理员“".$model->username."”已成功添加！" );
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
		if ( isset( $_POST['Administrator'] ) )
		{
			if ( !isset( $_POST['Administrator']['password'] ) )
			{
				$_POST['Administrator']['password'] = md5( md5( $_POST['Administrator']['password'] ).$model->salt );
			}
			else
			{
				unset( $_POST['Administrator']['password'] );
			}
			$model->attributes = $_POST['Administrator'];
			if ( $model->save( ) )
			{
				Yii::app( )->user->setFlash( "success", "管理员“".$model->username."”已成功修改！" );
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
		$model = new Administrator( "search" );
		$model->unsetAttributes( );
		if ( isset( $_GET['Administrator'] ) )
		{
			$model->attributes = $_GET['Administrator'];
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
				$this->_model = Administrator::model( )->findbyPk( $_GET['id'] );
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
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "administrator-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
