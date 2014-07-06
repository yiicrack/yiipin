<?php
class ShareController extends Controller
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
				"actions" => array( "comment" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index" );
	}

	public function actionView( $id )
	{
		$share = Share::model( )->with( "goods", "group", "from_group", "user", "from_user" )->findByPk( $id );
		if ( $share === NULL )
		{
			throw new CHttpException( 404 );
		}
		User::addcredit( $share->user_id, "share_be_viewed" );
		if ( !Yii::app( )->user->isGuest && Yii::app( )->user->id != $share->user_id )
		{
			User::addcredit( Yii::app( )->user->id, "view_share" );
		}
		$criteria = new CDbCriteria( );
		$criteria->compare( "share_id", $id );
		$criteria->with = array( "user" );
		$dataProvider = new CActiveDataProvider( "ShareComment", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 5, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$keywords = array( );
		foreach ( $share->goods->tags as $tag )
		{
			$keywords[] = $tag->name;
		}
		$this->keywords = implode( ",", $keywords );
		$search_url = "http://s8.taobao.com/search?q=".rawurlencode( mb_convert_encoding( implode( " ", array_slice( $keywords, 0, 3 ) ), "GBK", "UTF-8" ) )."&pid=mm_".Yii::app( )->config->get( "taobao_pid" )."_0_0";
		$this->render( "view", array(
			"share" => $share,
			"dataProvider" => $dataProvider,
			"search_url" => $search_url
		) );
	}

	public function actionRedirect( $url )
	{
		$url = rawurldecode( $url );
		$this->redirect( $url );
	}

	public function actionComment( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$comment = new ShareComment( );
			$comment->user_id = Yii::app( )->user->id;
			$comment->content = htmlspecialchars( $_POST['content'] );
			$comment->share_id = $_POST['share_id'];
			if ( $comment->save( ) )
			{
				$this->layout = "none";
				$this->render( "_comment_item", array(
					"comment" => $comment
				) );
			}
			else
			{
				echo "false";
			}
		}
	}

	public function getMoreShares( $limit = 6 )
	{
		return Share::model( )->with( "goods" )->findAllBySql( "SELECT  t1.* FROM {{share}} AS t1\n\t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{share}})\n\t            -(SELECT MIN(id) FROM {{share}}))+(SELECT MIN(id) FROM {{share}})) AS id) AS t2\n\t            WHERE t1.id >= t2.id ORDER BY t1.id LIMIT ".$limit );
	}

	public function getMoreMagazines( $limit = 3 )
	{
		return Group::model( )->findAllBySql( "SELECT  t1.* FROM {{group}} AS t1\n\t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{group}})\n\t            -(SELECT MIN(id) FROM {{group}}))+(SELECT MIN(id) FROM {{group}})) AS id) AS t2\n\t            WHERE t1.id >= t2.id ORDER BY t1.id LIMIT ".$limit );
	}

	public function actionGetShares( $user_id, $frame = 0, $page = 1 )
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
			$shares = Share::model( )->with( "goods", "from_group", "user", "comments" )->findAllByAttributes( array(
				"user_id" => $user_id
			), array(
				"order" => "t.id DESC",
				"limit" => $frameSize,
				"offset" => $offset
			) );
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
				$this->renderPartial( "getShares", array(
					"shares" => $shares
				) );
			}
		}
	}

	public function getShares( $tag_id, $limit = 3 )
	{
		$criteria = new CDbCriteria( );
		$criteria->limit = $limit;
		$criteria->order = "id DESC";
		$criteria->join = "JOIN {{goods_has_tag}} ght ON ght.goods_id = t.goods_id";
		$criteria->compare( "ght.tag_id", $tag_id );
		return Share::model( )->findAll( $criteria );
	}

}

?>
