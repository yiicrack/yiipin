<?php
class ModifyPasswordForm extends CFormModel
{

	public $password = NULL;
	public $newpassword = NULL;
	public $renewpassword = NULL;

	public function rules( )
	{
		return array(
			array( "password", "checkPassword" ),
			array( "password, newpassword, renewpassword", "required" ),
			array( "renewpassword", "compare", "compareAttribute" => "newpassword", "message" => "两处输入的新密码并不一致" )
		);
	}

	public function attributeLabels( )
	{
		return array( "password" => "现密码", "newpassword" => "新密码", "renewpassword" => "确认新密码" );
	}

	public function checkPassword( $attribute, $params )
	{
		if ( !isset( $username ) )
		{
			$username = Yii::app( )->user->name;
		}
		if ( !$this->hasErrors( ) )
		{
			$identity = new UserIdentity( $username, $this->password );
			if ( !$identity->authenticate( ) )
			{
				$this->addError( "password", "现密码验证不正确" );
			}
		}
	}

	public function modifyPassword( $user_id )
	{
		$oldpw = $this->password;
		$newpw = $this->newpassword;
		if ( !isset( $user_id ) )
		{
			$user_id = Yii::app( )->user->id;
		}
		$model = User::model( )->findByPk( $user_id );
		$model->password = md5( $newpw );
		if ( $model->save( ) )
		{
			Yii::import( "application.vendors.*" );
			include_once( "ucenter.php" );
			if ( strtoupper( Yii::app( )->charset ) != strtoupper( UC_CHARSET ) )
			{
				$model->username = mb_convert_encoding( $model->username, UC_CHARSET, Yii::app( )->charset );
			}
			//uc_client/client.php uc_user_edit
			return uc_user_edit( $model->username, $oldpw, $newpw );
		}
		return FALSE;
	}

}

?>
