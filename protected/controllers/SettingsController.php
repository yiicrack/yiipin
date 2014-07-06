<?php
class SettingsController extends Controller
{

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"deny",
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$model = User::model( )->findByPk( Yii::app( )->user->id );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "user-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->request->isPostRequest )
		{
			$model->attributes = $_POST['User'];
			if ( $model->save( ) )
			{
				$this->render( "/site/flash_message", array(
					"message" => "您的个人信息修改成功！",
					"redirect_url" => array( "/settings/index" )
				) );
				Yii::app( )->end( );
			}
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionUpdateSignature( )
	{
		$model = User::model( )->findByPk( Yii::app( )->user->id );
		$model->signature = $_POST['signature'];
		if ( $model->save( ) )
		{
			User::addcredit( Yii::app( )->user->id, "edit_signature" );
			echo "true";
		}
	}

	public function actionAvatar( )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_avatar
		$form = uc_avatar( Yii::app( )->user->id );
		$this->render( "avatar", array(
			"form" => $form
		) );
	}

	public function actionAccount( )
	{
		$model = new ModifyPasswordForm( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "modifypassword-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->request->isPostRequest )
		{
			$model->attributes = $_POST['ModifyPasswordForm'];
			if ( $model->modifyPassword( Yii::app( )->user->id ) )
			{
				$this->render( "/site/flash_message", array(
					"message" => "修改密码成功，下次登录请使用新密码",
					"redirect_url" => array( "/settings/account" )
				) );
				Yii::app( )->end( );
			}
		}
		$this->render( "account", array(
			"model" => $model
		) );
	}

	public function actionSync( )
	{
		$this->render( "sync", array( ) );
	}

	public function actionEmail( )
	{
		$this->render( "email", array( ) );
	}

	public function actionAddress( )
	{
		$model = User::model( )->findByPk( Yii::app( )->user->id );
		$model->setScenario( "shipping" );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "user-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->request->isPostRequest )
		{
			$model->attributes = $_POST['User'];
			if ( $model->save( ) )
			{
				$this->render( "/site/flash_message", array(
					"message" => "您的收货信息修改成功！",
					"redirect_url" => array( "/settings/address" )
				) );
				Yii::app( )->end( );
			}
		}
		$this->render( "address", array(
			"model" => $model
		) );
	}
	
	public function actionCredit( )
	{
		$user = User::model( )->findByPk( Yii::app( )->user->id );
		$criteria = new CDbCriteria( );
		$criteria->compare( "user_id", Yii::app( )->user->id );
		$dataProvider = new CActiveDataProvider( "CreditLog", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$this->render( "credit", array(
			"user" => $user,
			"dataProvider" => $dataProvider
		) );
	}

}

?>
