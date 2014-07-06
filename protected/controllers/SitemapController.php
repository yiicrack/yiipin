<?php
class SitemapController extends Controller
{

	public function actionIndex( )
	{
		$tags = GoodsTag::model( )->findAll( array( "order" => "goods_count DESC" ) );
		$this->render( "index", array(
			"tags" => $tags
		) );
	}

	public function actionList( $tag_id )
	{
		$tag = GoodsTag::model( )->findByPk( $tag_id );
		$criteria = new CDbCriteria( );
		$criteria->join = "JOIN {{goods_has_tag}} as ght ON t.goods_id = ght.goods_id JOIN {{goods}} g ON g.id = t.goods_id";
		$criteria->compare( "ght.tag_id", $tag_id );
		$criteria->with = array( "goods" );
		$dataProvider = new CActiveDataProvider( "Share", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 100, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$dataProvider->getData( );
		$this->render( "list", array(
			"tag" => $tag,
			"dataProvider" => $dataProvider
		) );
	}

}

?>
