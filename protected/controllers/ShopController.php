<?php
class ShopController extends Controller
{

	public function __construct($id,$module=null)
	{
		$this->init();
		parent::__construct($id,$module);
	}

	public function getShopCategories( $parent_id = 0 )
	{
		return ShopCategory::model( )->findAllByAttributes( array(
			"parent_id" => $parent_id
		), array( "order" => "sortnum ASC" ) );
	}

	public function actionIndex( )
	{
		$category = new ShopCategory( );
		$criteria = new CDbCriteria( );
		if ( isset( $_GET['cate_id'] ) && 0 < $_GET['cate_id'] )
		{
			$category = ShopCategory::model( )->findByPk( $_GET['cate_id'] );
			$criteria->compare( "category_id", $_GET['cate_id'] );
		}
		$dataProvider = new CActiveDataProvider( "Shop", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 20, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$dataProvider->getData( );
		$this->render( "index", array(
			"category" => $category,
			"dataProvider" => $dataProvider,
			"parent_id" => $category->parent_id
		) );
	}

	public function actionView( $id )
	{
		$shop = Shop::model( )->findByPk( $id );
		if ( $shop === NULL )
		{
			throw new CHttpException( 404 );
		}
		$criteria = new CDbCriteria( );
		$criteria->compare( "shop_id", $shop->id );
		$criteria->join = "INNER JOIN {{goods}} g ON g.id = t.goods_id";
		$dataProvider = new CActiveDataProvider( "Share", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 8, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$dataProvider->getData( );
		$this->render( "view", array(
			"shop" => $shop,
			"dataProvider" => $dataProvider
		) );
	}

	public function getNewShares( $limit = 5 )
	{
		return Share::model( )->findAll( array(
			"order" => "id DESC",
			"limit" => $limit
		) );
	}

	public function getCommendShops( $limit = 4 )
	{
		return Shop::model( )->findAllBySql( "SELECT  t1.* FROM {{shop}} AS t1\n\t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{shop}})\n\t            -(SELECT MIN(id) FROM {{shop}}))+(SELECT MIN(id) FROM {{shop}})) AS id) AS t2\n\t            WHERE t1.id >= t2.id ORDER BY t1.id LIMIT ".$limit );
	}

}

?>
