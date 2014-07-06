<?php
final class MagazineController extends Controller
{

	public function actionIndex( )
	{
		$this->render( "index" );
	}

	public function actionList( )
	{
		if ( !isset( $_GET['cat'] ) )
		{
			throw new CHttpException( 404 );
		}
		$criteria = new CDbCriteria( );
		if ( $_GET['cat'] )
		{
			$category = GroupCategory::model( )->findByPk( $_GET['cat'] );
			$criteria->compare( "category_id", $_GET['cat'] );
		}
		if ( isset( $_GET['q'] ) )
		{
			$criteria->addSearchCondition( "t.name", $_GET['q'] );
		}
		$dataProvider = new CActiveDataProvider( "Group", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 40, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$dataProvider->getData( );
		$this->render( "list", array(
			"category" => $category,
			"dataProvider" => $dataProvider
		) );
	}

	public function getGroupByCategory( $category_id )
	{
		return Group::model( )->findAllByAttributes( array(
			"category_id" => $category_id
		), array( "order" => "id DESC", "limit" => 4 ) );
	}

	public function getNewGroups( $limit = 6 )
	{
		return Group::model( )->findAll( array(
			"order" => "id DESC",
			"limit" => $limit
		) );
	}

	public function getHotGroups( $limit = 10 )
	{
		return Group::model( )->findAll( array(
			"order" => "follow_count DESC",
			"limit" => $limit
		) );
	}

}

?>
