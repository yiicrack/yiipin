<?php
class GoodsHasTag extends ActiveRecord
{

	public static function model( $className = __CLASS__ )
	{
		return parent::model( $className );
	}

	public function tableName( )
	{
		return "{{goods_has_tag}}";
	}

	protected function afterSave( )
	{
		$tag = GoodsTag::model( )->findByPk( $this->tag_id );
		$tag->goods_count = self::model( )->countByAttributes( array(
			"tag_id" => $this->tag_id
		) );
		$tag->save( FALSE );
		$has_tags = GoodsCategoryHasTag::model( )->findAllByAttributes( array(
			"tag_id" => $this->tag_id
		) );
		foreach ( $has_tags as $has_tag )
		{
			$this->makeMixImage( $has_tag->category_id );
		}
		parent::aftersave( );
	}

	private function makeMixImage( $category_id )
	{
		$filename = md5( $this->tag_id."_".$category_id ).".jpg";
		$h1 = substr( $filename, 0, 1 );
		$h2 = substr( $filename, 1, 1 );
		$dir = Yii::app( )->basePath."/../upload/tag/".$h1."/".$h2."/";
		if ( !file_exists( $dir ) )
		{
			FileHelper::mkdirs( $dir );
		}
		$full_filename = $dir.$filename;
		$isUpdate = FALSE;
		if ( !file_exists( $full_filename ) )
		{
			$isUpdate = TRUE;
		}
		if ( file_exists( $full_filename ) )
		{
			$filemtime = filemtime( $full_filename );
			if ( $filemtime <= time( ) - intval( Yii::app( )->config->get( "cache_duration" ) ) )
			{
				$isUpdate = TRUE;
			}
		}
		if ( $isUpdate )
		{
			$goods = Goods::model( )->findAllBySql( "SELECT DISTINCT g.image FROM {{goods}} g JOIN {{goods_has_tag}} ght ON g.id = ght.goods_id WHERE ght.tag_id = ".$this->tag_id." AND g.category_id = {$category_id} ORDER BY g.id DESC LIMIT 9" );
			$pic = Yii::app( )->basePath."/../images/common/group_bg.png";
			$im = imagecreatefrompng( $pic );
			$dest = imagecreatetruecolor( imagesx( $im ), imagesy( $im ) );
			imagecopy( $dest, $im, 0, 0, 0, 0, imagesx( $im ), imagesy( $im ) );
			$i = 0;
			foreach ( $goods as $g )
			{
				$image = ImageHelper::createfromfile( Yii::app( )->basePath."/../".$g->image );
				if ( $image )
				{
					$image->crop( 64, 64, array( "fullimage" => FALSE, "pos" => "center" ) );
					$row = intval( $i / 3 );
					$col = $i % 3;
					imagecopy( $dest, $image->_handle, $col * 68, $row * 68, 0, 0, 64, 64 );
					imagedestroy( $image->_handle );
					++$i;
				}
			}
			imagejpeg( $dest, $full_filename, 100 );
		}
	}

	public function rules( )
	{
		return array(
			array( "goods_id, tag_id", "required" ),
			array( "goods_id, tag_id", "numerical", "integerOnly" => TRUE ),
			array( "goods_id, tag_id", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array(
			"tag" => array(
				self::BELONGS_TO,
				"GoodsTag",
				"tag_id"
			)
		);
	}

	public function attributeLabels( )
	{
		return array( "goods_id" => "Goods", "tag_id" => "Tag" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "goods_id", $this->goods_id );
		$criteria->compare( "tag_id", $this->tag_id );
		return new CActiveDataProvider( "GoodsHasTag", array(
			"criteria" => $criteria
		) );
	}

}

?>
