<?php
class Group extends ActiveRecord
{

	public $modelName = "杂志";

	public function __toString( )
	{
		return $this->name;
	}

	protected function beforeSave( )
	{
		if ( $this->isNewRecord && !$this->image )
		{
			$this->image = "/images/common/group_bg.png";
		}
		$this->name = strip_tags( $this->name );
		return parent::beforesave( );
	}

	protected function afterSave( )
	{
		if ( $this->isNewRecord )
		{
			$follows = Follow::model( )->findAllByAttributes( array(
				"to_user_id" => $this->user_id
			) );
			foreach ( $follows as $follow )
			{
				$group_follow = GroupFollow::model( )->findByAttributes( array(
					"group_id" => $this->id,
					"user_id" => $follow->user_id
				) );
				if ( $group_follow === NULL )
				{
					$group_follow = new GroupFollow( );
					$group_follow->group_id = $this->id;
					$group_follow->user_id = $follow->user_id;
					$group_follow->save( FALSE );
				}
			}
		}
		parent::aftersave( );
	}

	protected function afterDelete( )
	{
		parent::afterdelete( );
		if ( $this->image && $this->image != "/images/common/group_bg.png" )
		{
			@unlink( Yii::app( )->basePath."/../".$this->image );
		}
		if ( $this->banner )
		{
			@unlink( Yii::app( )->basePath."/../".$this->banner );
		}
		$group_follows = GroupFollow::model( )->findAllByAttributes( array(
			"group_id" => $this->id
		) );
		foreach ( $group_follows as $group_follow )
		{
			$group_follow->delete( );
		}
		return TRUE;
	}

	public function getMixImage( $_obfuscate_1KQFnn0DHJkˇ = TRUE )
	{
		$shares = Share::model( )->hasCache( )->with( "goods" )->findAllByAttributes( array(
			"group_id" => $this->id
		), array( "limit" => 9, "order" => "t.id DESC" ) );
		$htmls = array( );
		foreach ( $shares as $index => $share )
		{
			if ( !( $share->goods === NULL ) )
			{
				$img = CHtml::image( $share->goods->getThumb( 70 ), $share->goods->name, array( "width" => "65", "height" => "65" ) );
				$htmls[] = "<td>".$img."</td>";
			}
		}
		$index = 0;
		for ( ;	$index < 9 - count( $shares );	++$index	)
		{
			$htmls[] = "<td>&nbsp;</td>";
		}
		$chunks = array_chunk( $htmls, 3, TRUE );
		$html = "";
		foreach ( $chunks as $chunk )
		{
			$html .= "<tr>".implode( $chunk )."</tr>";
		}
		return CHtml::tag( "table", array( "cellspacing" => 1, "cellspadding" => 0 ), $html, TRUE );
	}
	
	
	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{group}}";
	}

	public function rules( )
	{
		return array(
			array( "category_id, name, user_id", "required" ),
			array( "category_id, fans_count, share_count", "numerical", "integerOnly" => TRUE ),
			array( "name, image, banner", "length", "max" => 100 ),
			array( "preface", "length", "max" => 300 ),
			array( "id, category_id, name, image, banner, fans_count, share_count, preface", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"category" => array(
				self::BELONGS_TO,
				"GroupCategory",
				"category_id"
			),
			"user" => array(
				self::BELONGS_TO,
				"User",
				"user_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "category_id" => "分类", "name" => "名称", "image" => "图片", "banner" => "横幅", "fans_count" => "粉丝数", "share_count" => "分享数", "preface" => "卷首语" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "category_id", $this->category_id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "image", $this->image, TRUE );
		$criteria->compare( "banner", $this->banner, TRUE );
		$criteria->compare( "fans_count", $this->fans_count );
		$criteria->compare( "preface", $this->preface, TRUE );
		return new CActiveDataProvider( "Group", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

	public function getFollowed( )
	{
		if ( Yii::app( )->user->isGuest )
		{
			return FALSE;
		}
		$model = GroupFollow::model( )->findByPk( array(
			"user_id" => Yii::app( )->user->id,
			"group_id" => $this->id
		) );
		return !( $model === NULL );
	}

}

?>
