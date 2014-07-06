<?php
class HomeController extends Controller
{

	public $pageSize = 100;
	public $frameSize = 10;

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"deny",
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index", array(
			"itemCount" => Share::model( )->count( $this->getCriteria( ) )
		) );
	}

	public function actionGetShares( $frame = 0, $page = 1 )
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
			$criteria = $this->getCriteria( );
			$criteria->limit = $frameSize;
			$criteria->offset = $offset;
			$shares= Share::model( )->findAll( $criteria );
			if ( empty( $shares) )
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

	private function getCriteria( )
	{
		$userId = Yii::app( )->user->id;
		$criteria = new CDbCriteria( );
		$criteria->order = "t.id DESC";
		$criteria->addCondition( "(t.user_id = ".$userId." OR t.group_id IN (SELECT group_id FROM {{group_follow}} f WHERE f.user_id = {$userId}) OR t.id IN (SELECT share_id FROM {{user_like_share}} WHERE user_id = {$userId}))" );
		return $criteria;
	}

	public function actionGetmagazines( )
	{
		$items = $this->getInitMagazines( );
		$this->layout = FALSE;
		$this->render( "_corner_stamp_magazines", array(
			"items" => $items
		) );
	}

	public function actionGetusers( )
	{
		$users = $this->getInitUsers( );
		$this->layout = FALSE;
		$this->render( "_corner_stamp_users", array(
			"users" => $users
		) );
	}

	public function getInitMagazines( )
	{
		return Group::model( )->findAllBySql( "SELECT  t1.* FROM {{group}} AS t1 \n\t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{group}})\n\t            -(SELECT MIN(id) FROM {{group}}))+(SELECT MIN(id) FROM {{group}})) AS id) AS t2 \n\t            WHERE t1.id >= t2.id ORDER BY t1.id LIMIT 3" );
	}

	public function getEvents( )
	{
		return Event::model( )->findAllByAttributes( array(
			"user_id" => Yii::app( )->user->id
		), array( "order" => "id DESC" ) );
	}

	public function getInitUsers( )
	{
		$userId = Yii::app( )->user->id;
		$to_user_id = Yii::app( )->db->createCommand( "SELECT to_user_id FROM {{follow}} WHERE user_id = ".$userId )->queryColumn( );
		if ( empty( $to_user_id ) )
		{
			$to_user_id = array( 0 );
		}
		$users = User::model( )->findAllBySql( "SELECT t1.* FROM {{user}}   AS t1\n    \t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{user}})\n    \t            -(SELECT MIN(id) FROM {{user}}))+(SELECT MIN(id) FROM {{user}})) AS id) AS t2\n    \t            WHERE t1.id >= t2.id AND t1.id <> ".$userId." AND t1.id NOT IN (".implode( ",", $to_user_id ).") ORDER BY t1.id LIMIT 3" );
		return $users;
	}

	public function actionCheckNewShares( )
	{
		$last_refresh_time = intval( $_GET['last_refresh_time'] );
		$criteria = $this->getCriteria( );
		$criteria->compare( "t.user_id", "<>".Yii::app( )->user->id );
		$criteria->compare( "t.created", ">=".date( "Y-m-d H:i:s", $last_refresh_time ) );
		$ret['count'] = Share::model( )->count( $criteria );
		echo json_encode( $ret );
	}

	public function actionGetNewShares( )
	{
		$last_refresh_time = intval( $_GET['last_refresh_time'] );
		$criteria = $this->getCriteria( );
		$criteria->compare( "t.user_id", "<>".Yii::app( )->user->id );
		$criteria->compare( "t.created", ">=".date( "Y-m-d H:i:s", $last_refresh_time ) );
		$criteria->limit = 50;
		$shares= Share::model( )->findAll( $criteria );
		$ret['timestamp'] = time( );
		if ( empty( $shares) )
		{
			$ret['newElements'] = "false";
		}
		else
		{
			$ret['newElements'] = $this->renderPartial( "/group/getShares", array(
				"shares" => $shares
			), TRUE );
		}
		echo json_encode( $ret );
	}

}

?>
