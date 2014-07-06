<?php
class Share extends ActiveRecord
{
	public $modelName = "分享";
	public $isliked = FALSE;
	
	public function __toString( )
	{
		return $this->id;
	}

	public function getParsedQuote( )
	{
		$content = $this->quote;
		foreach ( Yii::app( )->params['face_list'] as $key => $value )
		{
			$content = str_replace( "[".$value."]", CHtml::image( Yii::app( )->baseUrl."/images/face/".$key.".gif", $value, array( "valign" => "absmiddle" ) ), $content );
		}
		return $content;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		$this->quote = strip_tags( $this->quote );
		$this->username = $this->user->username;
		$this->group_name = $this->group->name;
		return parent::beforesave( );
	}

	protected function afterFind( )
	{
		$this->isliked = $this->logLiked( );
		parent::afterfind( );
	}
	
	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{share}}";
	}

	protected function afterSave( )
	{
		if ( $this->group_id && $this->group !== NULL )
		{
			$this->group->share_count = intval( self::model( )->countByAttributes( array(
				"group_id" => $this->group_id
			) ) );
			$this->group->save( FALSE );
		}
		if ( $this->goods !== NULL )
		{
			$this->goods->collect_count = intval( self::model( )->countByAttributes( array(
				"goods_id" => $this->goods_id
			) ) );
			$this->goods->save( FALSE );
		}
		if ( $this->isNewRecord )
		{
			User::addcredit( $this->user->id, "share_add" );
		}
		parent::aftersave( );
	}

	protected function beforeDelete( )
	{
		User::addcredit( $this->user->id, "share_del" );
		return parent::beforedelete( );
	}
	
	public function rules( )
	{
		return array(
			array( "goods_id, group_id", "required" ),
			array( "goods_id, group_id, from_group_id, from_user_id", "numerical", "integerOnly" => TRUE ),
			array( "quote", "length", "max" => 500 ),
			array( "id, goods_id, group_id, quote, from_group_id, from_user_id, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"group" => array(
				self::BELONGS_TO,
				"Group",
				"group_id"
			),
			"from_group" => array(
				self::BELONGS_TO,
				"Group",
				"from_group_id"
			),
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			),
			"from_user" => array(
				self::BELONGS_TO,
				"User",
				"from_user_id"
			),
			"goods" => array(
				self::BELONGS_TO,
				"Goods",
				"goods_id"
			),
			"comments" => array(
				self::HAS_MANY,
				"ShareComment",
				"share_id"
			),
			"likes" => array(
				self::HAS_MANY,
				"UserLikeShare",
				"share_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "分享ID", "goods_id" => "商品ID", "group_id" => "杂志ID", "from_user_id" => "分享自用户", "from_group_id" => "分享自杂志", "quote" => "点评", "like_count" => "喜欢数", "comment_count" => "评论数", "created" => "创建时间", "user_id" => "用户ID" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "t.id", $this->id );
		$criteria->compare( "t.goods_id", $this->goods_id );
		$criteria->compare( "t.group_id", $this->group_id );
		$criteria->compare( "t.quote", $this->quote, TRUE );
		$criteria->compare( "t.from_group_id", $this->from_group_id );
		$criteria->compare( "t.from_user_id", $this->from_user_id );
		$criteria->compare( "t.created", $this->created, TRUE );
		$criteria->with = array( "goods", "group", "user" );
		return new CActiveDataProvider( "Share", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

	public function getLiked( )
	{
		if ( Yii::app( )->user->isGuest )
		{
			return FALSE;
		}
		$model = UserLikeShare::model( )->findByPk( array(
			"user_id" => Yii::app( )->user->id,
			"share_id" => $this->id
		) );
		return !( $model === NULL );
	}
	
	public function logLiked( )
	{
		$liked_data = Yii::app( )->user->getState( "liked_data" );
		if ( $liked_data === FALSE )
		{
			$liked_data = array( );
		}
		$liked_data[] = $this->id;
		Yii::app( )->user->setState( "liked_data", $liked_data );
		return "<{liked_{$this->id}}>";
	}

	public function getNewComments( $limit = 5 )
	{
		if ( 0 < $this->comment_count )
		{
			return ShareComment::model( )->hasCache( )->findAllByAttributes( array(
				"share_id" => $this->id
			), array(
				"order" => "id DESC",
				"limit" => $limit
			) );
		}
		else
		{
			return array( );
		}
	}

}

?>
