<?php
class MiscController extends Controller
{

	private $_user = NULL;

	public function getUser( )
	{
		if ( $this->_user instanceof User )
		{
			return $this->_user;
		}
		$this->_user = User::model( )->findByPk( $_GET['user_id'] );
		if ( $this->_user === NULL )
		{
			throw new CHttpException( 404 );
		}
		return $this->_user;
	}

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"allow",
				"users" => array( "?" ),
				"actions" => array( "fans", "follow" )
			),
			array(
				"deny",
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index" );
	}

	public function actionFans( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "to_user_id", $this->user->id );
		$dataProvider = new CActiveDataProvider( "Follow", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "fans", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function actionFollow( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "user_id", $this->user->id );
		$dataProvider = new CActiveDataProvider( "Follow", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "follow", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function actionLikeme( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "share_user_id", $this->user->id );
		$dataProvider = new CActiveDataProvider( "UserLikeShare", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "likeme", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function actionAct_follow( $userId, $flag )
	{
		if ( Yii::app( )->request->isAjaxRequest && $userId != Yii::app( )->user->id )
		{
			$follow = Follow::model( )->findByAttributes( array(
				"to_user_id" => $userId,
				"user_id" => Yii::app( )->user->id
			) );
			if ( $flag == "on" )
			{
				if ( $follow === NULL )
				{
					$follow = new Follow( );
					$follow->to_user_id = $userId;
					$follow->user_id = Yii::app( )->user->id;
					$follow->save( FALSE );
				}
			}
			else if ( $follow !== NULL )
			{
				$follow->delete( );
			}
		}
	}

	public function actionAct_batch_follow( )
	{
		if ( Yii::app( )->request->isAjaxRequest )
		{
			foreach ( $_POST['ids'] as $userId )
			{
				if ( $userId != Yii::app( )->user->id )
				{
					$follow = Follow::model( )->findByAttributes( array(
						"to_user_id" => $userId,
						"user_id" => Yii::app( )->user->id
					) );
					if ( $follow === NULL )
					{
						$follow = new Follow( );
						$follow->to_user_id = $userId;
						$follow->user_id = Yii::app( )->user->id;
						$follow->save( FALSE );
					}
				}
			}
			echo "true";
		}
	}

	public function actionMsg( )
	{
		$this->render( "msg" );
	}

	public function actionSysmsg( )
	{
		$user = User::model( )->findByPk( Yii::app( )->user->id );
		$criteria = new CDbCriteria( );
		$criteria->addCondition( "(user_id = ".$user->id." OR user_id = 0)" );
		$ids = explode( ",", trim( $user->deleted_sysmsg_ids, "," ) );
		if ( $ids )
		{
			$criteria->addNotInCondition( "id", $ids );
		}
		$dataProvider = new CActiveDataProvider( "Sysmsg", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "sysmsg", array(
			"dataProvider" => $dataProvider
		) );
	}

	public function actionDelsysmsg( )
	{
		if ( Yii::app( )->request->isAjaxRequest )
		{
			$sysmsg = Sysmsg::model( )->findByPk( $_POST['id'] );
			if ( $sysmsg !== NULL )
			{
				if ( 0 < $sysmsg->user_id )
				{
					if ( $sysmsg->user_id == Yii::app( )->user->id )
					{
						$sysmsg->delete( );
						echo "true";
						Yii::app( )->end( );
					}
				}
				else
				{
					$user = User::model( )->findByPk( Yii::app( )->user->id );
					$ids = explode( ",", trim( $user->deleted_sysmsg_ids, "," ) );
					$ids[] = $sysmsg->id;
					$ids = array_unique( $ids );
					$user->deleted_sysmsg_ids = implode( ",", $ids );
					$user->save( FALSE );
					echo "true";
					Yii::app( )->end( );
				}
			}
			echo "false";
		}
	}

	public function actionPm( )
	{
		$this->layout = "none";
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		//uc_client/client.php uc_pm_location
		uc_pm_location( Yii::app( )->user->id );
	}

	public function actionSendPm( )
	{
		$this->layout = "none";
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$user = User::model( )->findByPk( $_GET['user_id'] );
		//uc_client/client.php uc_pm_send
		uc_pm_send( Yii::app( )->user->id, $user->username, "", "", 0 );
	}

}

?>
