<?php
class ShareComment extends ActiveRecord
{

	public $modelName = "评论";

	public function __toString( )
	{
		return $this->content;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord && empty( $this->created ) )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		$this->content = strip_tags( $this->content );
		return parent::beforesave( );
	}

	protected function afterDelete( )
	{
		$this->updateCount( );
		User::addcredit( $this->user_id, "share_comment_del" );
		parent::afterdelete( );
	}

	protected function afterSave( )
	{
		$this->updateCount( );
		if ( $this->isNewRecord )
		{
			User::addcredit( $this->user_id, "share_comment_add" );
		}
		parent::aftersave( );
	}

	private function updateCount( )
	{
		$this->share->comment_count = self::model( )->countByAttributes( array(
			"share_id" => $this->share_id
		) );
		$this->share->save( FALSE );
	}

	public function getParsedContent( )
	{
		$content = nl2br( htmlspecialchars( $this->content ) );
		foreach ( Yii::app( )->params['face_list'] as $key => $value )
		{
			$content = str_replace( "[".$value."]", CHtml::image( Yii::app( )->baseUrl."/images/face/".$key.".gif", $value, array( "valign" => "absmiddle" ) ), $content );
		}
		return $content;
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{share_comment}}";
	}

	public function rules( )
	{
		return array(
			array( "share_id, user_id, content", "required" ),
			array( "share_id, user_id", "numerical", "integerOnly" => TRUE ),
			array( "id, share_id, user_id, content, created", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			),
			"share" => array(
				self::BELONGS_TO,
				"Share",
				"share_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "share_id" => "分享ID", "user_id" => "用户ID", "content" => "评论内容", "created" => "发表时间",  "collect_id" => "采集ID"  );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "share_id", $this->share_id );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "content", $this->content, TRUE );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "ShareComment", array(
			"criteria" => $criteria,
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

}

?>
