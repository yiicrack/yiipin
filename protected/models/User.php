<?php

class User extends ActiveRecord
{

	public $modelName = "会员";

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		return parent::beforesave( );
	}

	protected function afterSave( )
	{
		if ( $this->isNewRecord )
		{
			$event = new Event( );
			$event->user_id = $this->id;
			$event->from_user_id = $this->id;
			$event->action = "加入了".Yii::app( )->name;
			$event->image = "avatar";
			$event->link = array(
				"person/index",
				"user_id" => $this->id
			);
			$event->save( );
		}
		parent::aftersave( );
	}

	protected function beforeValidate( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		return parent::beforevalidate( );
	}

	protected function afterDelete( )
	{
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_user_delete
		uc_user_delete( $this->id );
		parent::afterdelete( );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{user}}";
	}

	public function rules( )
	{
		return array(
			array( "username, email, gender, created", "required" ),
			array(
				"username",
				"unique",
				"caseSensitive" => FALSE,
				"className" => "user",
				"criteria" => array(
					"condition" => "id <> ".$this->id
				),
				"message" => "用户名\"{value}\"已经被使用，请更换",
				"on" => "update"
			),
			array( "password", "required", "on" => "insert" ),
			array( "username", "length", "max" => 50 ),
			array( "password, qq_openid", "length", "max" => 32 ),
			array( "email", "length", "max" => 250 ),
			array(
				"email",
				"unique",
				"caseSensitive" => FALSE,
				"className" => "User",
				"criteria" => array(
					"condition" => "id <> ".$this->id
				),
				"message" => "电子邮件\"{value}\"已经被使用，请更换",
				"on" => "update"
			),
			array( "email", "unique", "caseSensitive" => FALSE, "className" => "User", "message" => "电子邮件\"{value}\"已经被使用，请更换", "on" => "insert" ),
			array( "gender", "length", "max" => 3 ),
			array( "last_login_ip, this_login_ip", "length", "max" => 30 ),
			array( "sinaweibo_uid", "length", "max" => 20 ),
			array( "realname, province,city, birthdate,qq,shipping_realname", "length", "max" => 30 ),
			array( "school, company,career", "length", "max" => 50 ),
			array( "weibo,avatar", "length", "max" => 200 ),
			array( "msn,shipping_address", "length", "max" => 100 ),
			array( "hooby, signature", "length", "max" => 500 ),
			array( "shipping_postcode", "length", "max" => 6 ),
			array( "qq, shipping_mobile", "numerical", "integerOnly" => TRUE ),
			array( "shipping_mobile", "length", "max" => 11, "min" => 11, "tooLong" => "手机号码错误", "tooShort" => "手机号码错误" ),
			array( "shipping_realname, shipping_postcode, shipping_mobile, shipping_address", "required", "on" => "shipping" ),
			array( "id, username, password, email, gender, created, last_login_time, this_login_time, last_login_ip, this_login_ip, qq_openid, sinaweibo_uid", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"shares" => array(
				self::HAS_MANY,
				"Share",
				"user_id"
			),
			"events" => array(
				self::HAS_MANY,
				"Event",
				"user_id"
			),
			"follows" => array(
				self::HAS_MANY,
				"Follow",
				"user_id"
			),
			"group_follows" => array(
				self::HAS_MANY,
				"GroupFollow",
				"user_id"
			),
			"tags" => array(
				self::HAS_MANY,
				"UserTag",
				"user_id"
			),
			"likeshares" => array(
				self::HAS_MANY,
				"UserLikeShare",
				"user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "username" => "用户名", "password" => "密码", "email" => "Email", "gender" => "性别", "created" => "注册时间", "last_login_time" => "上次登录时间", "this_login_time" => "最近登录时间", "last_login_ip" => "上次登录IP", "this_login_ip" => "最近登录IP", "qq_openid" => "Qq Openid", "sinaweibo_uid" => "Sinaweibo Uid", "realname" => "姓名", "birthdate" => "生日", "province" => "所在省", "city" => "所在市", "school" => "学校", "company" => "工作单位", "career" => "从事行业", "hooby" => "兴趣爱好", "signature" => "美丽宣言", "weibo" => "新浪微博地址", "shipping_realname" => "收货人", "shipping_address" => "收货地址", "shipping_mobile" => "收货人手机号", "shipping_postcode" => "邮政编码", "qq" => "QQ", "msn" => "MSN" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "username", $this->username, TRUE );
		$criteria->compare( "password", $this->password, TRUE );
		$criteria->compare( "email", $this->email, TRUE );
		$criteria->compare( "gender", $this->gender, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		$criteria->compare( "last_login_time", $this->last_login_time, TRUE );
		$criteria->compare( "this_login_time", $this->this_login_time, TRUE );
		$criteria->compare( "last_login_ip", $this->last_login_ip, TRUE );
		$criteria->compare( "this_login_ip", $this->this_login_ip, TRUE );
		$criteria->compare( "qq_openid", $this->qq_openid, TRUE );
		$criteria->compare( "sinaweibo_uid", $this->sinaweibo_uid, TRUE );
		return new CActiveDataProvider( "User", array(
			"criteria" => $criteria
		) );
	}

	public function getFollowed( )
	{
		if ( Yii::app( )->user->isGuest )
		{
			return FALSE;
		}
		$model = Follow::model( )->findByAttributes( array(
			"to_user_id" => $this->id,
			"user_id" => Yii::app( )->user->id
		) );
		return !( $model === NULL );
	}

	public function getFollowCount( )
	{
		return Follow::model( )->countByAttributes( array(
			"to_user_id" => $this->id
		) );
	}

	public function getTags( )
	{
		$ids = explode( ",", $this->tag_ids );
		return UserTag::model( )->findAllByPk( $ids );
	}

	public function getTagStr( )
	{
		$ids = explode( ",", $this->tag_ids );
		$tags = UserTag::model( )->findAllByPk( $ids, array( "limit" => 2 ) );
		$str = array( );
		foreach ( $tags as $tag )
		{
			$str[] = $tag->name;
		}
		return implode( "、", $str );
	}

	public static function AddCredit( $user_id, $name )
	{
		$setting = CreditSetting::model( )->findByAttributes( array(
				"name" => $name
		) );
		if ( $setting === NULL )
		{
			throw new CException( "不存在这个积分设置：".$name );
		}
		$user = self::model( )->findByPk( $user_id );
		if ( $user === NULL )
		{
			throw new CException( "不存在这个用户ID：".$user_id );
		}
		if ( $setting->score == 0 )
		{
			return TRUE;
		}
		if ( 0 < intval( $setting->limit ) )
		{
			$count = CreditLog::model( )->countBySql( "SELECT COUNT(*) FROM {{credit_log}} WHERE user_id = ".$user_id." AND action='{$setting->alias}' AND DATE(created) = CURDATE()" );
			if ( intval( $setting->limit ) <= intval( $count ) )
			{
				return FALSE;
			}
		}
		$log = new CreditLog( );
		$log->user_id = $user_id;
		$log->action = $setting->alias;
		$log->score = $setting->score;
		$log->credit = $user->credit;
		$log->save( FALSE );
		$user['credit'] += $setting->score;
		return $user->save( FALSE );
	}
	
}

?>
