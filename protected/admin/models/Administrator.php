<?php
class Administrator extends CActiveRecord
{

	public $modelName = "管理员";

	public function getRoles( )
	{
		return Yii::app( )->authManager->getRoles( $this->username );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{administrator}}";
	}

	public function rules( )
	{
		return array(
			array( "username, email", "required" ),
			array( "password, salt", "required", "on" => "insert" ),
			array( "username, password, email", "length", "max" => 128 ),
			array( "salt", "length", "max" => 5 ),
			array( "id, username, password, email, role", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "username" => "用户名", "password" => "密码", "email" => "Email", "last_login_time" => "最近登录时间", "last_login_ip" => "最近登录IP", "roles" => "角色" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "username", $this->username, TRUE );
		$criteria->compare( "password", $this->password, TRUE );
		$criteria->compare( "email", $this->email, TRUE );
		$data = new CActiveDataProvider( get_class( $this ), array(
			"criteria" => $criteria
		) );
		$data->pagination->pageSize = 10;
		return $data;
	}

}

?>
