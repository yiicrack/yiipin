<?php

class ResetPasswordForm extends CFormModel
{

	public $newpassword = NULL;
	public $renewpassword = NULL;

	public function rules( )
	{
		return array(
			array( "newpassword, renewpassword", "required" ),
			array( "renewpassword", "compare", "compareAttribute" => "newpassword", "message" => "两处输入的新密码并不一致" )
		);
	}

	public function attributeLabels( )
	{
		return array( "newpassword" => "新密码", "renewpassword" => "确认新密码" );
	}

	public function modifyPassword( $user_id )
	{
		$newpw = $this->newpassword;
		if ( !isset( $user_id ) )
		{
			$user_id = Yii::app( )->user->id;
		}
		$model = User::model( )->findByPk( $user_id );
		$model->password = md5( $newpw );
		if ( $model->save( FALSE ) )
		{
			Yii::import( "application.vendors.*" );
			include_once( "ucenter.php" );
			//uc_client/client.php uc_user_edit
			return 0 <= uc_user_edit( $model->username, "", $newpw, "", 1 );
		}
		return FALSE;
	}

}

?>
