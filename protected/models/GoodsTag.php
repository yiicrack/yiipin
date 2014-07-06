<?php

class GoodsTag extends ActiveRecord
{

	public $modelName = "标签";

	public function __toString( )
	{
		return $this->name;
	}

	protected function afterSave( )
	{
		Yii::app( )->db->createCommand( "UPDATE {{goods_tag}} SET goods_count = ( SELECT COUNT(*) FROM {{goods_has_tag}} WHERE tag_id = ".$this->id.") WHERE id = {$this->id}" )->execute( );
		parent::aftersave( );
	}

	protected function afterDelete( )
	{
		Yii::app( )->db->createCommand( "DELETE FROM {{goods_has_tag}} WHERE tag_id = ".$this->id )->execute( );
		parent::afterdelete( );
	}

	public function getMixImage( $category_id )
	{
		$ids[] = $category_id;
		$goodses_categorys = GoodsCategory::model( )->hasCache( )->findAllByAttributes( array(
			"parent_id" => $category_id
		), array( "order" => "sortnum ASC" ) );
		foreach ( $goodses_categorys as $goodses_category )
		{
			$ids[] = $goodses_category->id;
		}
		$category_id = implode( ",", $ids );
		$goodses = Goods::model( )->hasCache( )->findAllBySql( "SELECT DISTINCT g.image FROM {{goods}} g JOIN {{goods_has_tag}} ght ON g.id = ght.goods_id WHERE ght.tag_id = ".$this->id." AND g.category_id IN ({$category_id}) ORDER BY g.id DESC LIMIT 9" );
		$htmls = array( );
		foreach ( $goodses as $index => $goods )
		{
			$img = CHtml::image( $goods->getThumb( 80 ), $goods->name, array( "width" => "65", "height" => "65" ) );
			$htmls[] = "<td>".$img."</td>";
		}
		$index = 0;
		for ( ;	$index < 9 - count( $goodses );	++$index	)
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
		return "{{goods_tag}}";
	}

	public function rules( )
	{
		return array(
			array( "name", "required" ),
			array( "goods_count", "numerical", "integerOnly" => TRUE ),
			array( "name", "length", "max" => 90 ),
			array( "id, name, goods_count", "safe", "on" => "search" )
		);
	}

	public function relations( )
	{
		return array( );
	}

	public function attributeLabels( )
	{
		return array( "id" => "ID", "name" => "标签名称", "goods_count" => "商品数量" );
	}

	public function search( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "id", $this->id );
		$criteria->compare( "name", $this->name, TRUE );
		$criteria->compare( "goods_count", $this->goods_count );
		return new CActiveDataProvider( "GoodsTag", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
	}

	public function getImage( $category_id )
	{
		$filename = md5( $this->id."_".$category_id ).".jpg";
		$h1 = substr( $filename, 0, 1 );
		$h2 = substr( $filename, 1, 1 );
		$dir = "/upload/tag/".$h1."/".$h2."/";
		$full_filename = $dir.$filename;
		if ( !file_exists( Yii::app( )->basePath."/../".$full_filename ) )
		{
			$full_filename = "/images/blank.gif";
		}
		return $full_filename;
	}

}

?>
