<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class TrialComment extends ActiveRecord
{

	public $modelName = "试用评论";

	public function __toString( )
	{
		return $this->id;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord )
		{
			$this->created = date( "Y-m-d H:i:s" );
		}
		return parent::beforesave( );
	}

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{trial_comment}}";
	}

	public function rules( )
	{
		return array(
			array( "trial_id, content, user_id", "required" ),
			array( "trial_id, user_id", "numerical", "integerOnly" => TRUE ),
			array( "id, trial_id, content, user_id, created", "safe", "on" => "search" )
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
			"trial" => array(
				self::BELONGS_TO,
				"Trial",
				"trial_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "trial_id" => "试用商品ID", "content" => "评论内容", "user_id" => "用户ID", "created" => "发表时间" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "trial_id", $this->trial_id );
		$criteria->compare( "content", $this->content, TRUE );
		$criteria->compare( "user_id", $this->user_id );
		$criteria->compare( "created", $this->created, TRUE );
		return new CActiveDataProvider( "TrialComment", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
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

}

?>
