<?php
class SearchController extends Controller
{

	public $pageSize = 100;
	public $frameSize = 10;

	public function actionIndex( )
	{
		if ( !Yii::app( )->user->isGuest )
		{
			User::addcredit( Yii::app( )->user->id, "search_share" );
		}
		if ( $_GET['filter'] == "user" )
		{
			$this->forward( "user" );
		}
		else if ( $_GET['filter'] == "magazine" )
		{
			$this->forward( "magazine" );
		}
		$criteria = new CDbCriteria( );
		$criteria->join = "JOIN {{goods}} AS g ON g.id = t.goods_id";
		$criteria->compare( "name", addslashes( strip_tags( trim( $_GET['searchKey'] ) ) ), TRUE );
		$this->render( "index", array(
			"itemCount" => Share::model( )->count( $criteria )
		) );
	}

	public function actionGetShares( $name, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$criteria = new CDbCriteria( );
			$criteria->order = "id DESC";
			$criteria->limit = $frameSize;
			$criteria->offset = $offset;
			$criteria->join = "JOIN {{goods}} AS g ON g.id = t.goods_id";
			$criteria->compare( "name", addslashes( strip_tags( trim( $name ) ) ), TRUE );
			$shares = Share::model( )->findAll( $criteria );
			if ( empty( $shares ) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "/group/getShares", array(
					"shares" => $shares
				) );
			}
		}
	}

	public function actionUser( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "username", trim( $_GET['searchKey'] ), TRUE );
		$dataProvider = new CActiveDataProvider( "User", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "user", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function actionMagazine( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "name", addslashes( strip_tags( trim( $_GET['searchKey'] ) ) ), TRUE );
		$dataProvider = new CActiveDataProvider( "Group", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$this->render( "magazine", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function getCount( )
	{
		$criteria = new CDbCriteria( );
		$criteria->join = "JOIN {{goods}} AS g ON g.id = t.goods_id";
		$criteria->compare( "name", addslashes( strip_tags( trim( $_GET['searchKey'] ) ) ), TRUE );
		$share = Share::model( )->count( $criteria );
		$criteria = new CDbCriteria( );
		$criteria->compare( "name", trim( $_GET['searchKey'] ), TRUE );
		$group = Group::model( )->count( $criteria );
		$criteria = new CDbCriteria( );
		$criteria->compare( "username", trim( $_GET['searchKey'] ), TRUE );
		$user = User::model( )->count( $criteria );
		return array(
			$share,
			$group,
			$user
		);
	}

}

?>
