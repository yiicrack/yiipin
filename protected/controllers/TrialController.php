<?php
class TrialController extends Controller
{

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"deny",
				"actions" => array( "order" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "start_time", "<=".date( "Y-m-d H:i:s" ) );
		$data_provider = new CActiveDataProvider( "Trial", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.end_time DESC" )
		) );
		$data_provider->getData( );
		$this->render( "index", array(
			"dataProvider" => $data_provider
		) );
	}

	public function actionView( $id )
	{
		$t = Trial::model( )->findByPk( $id );
		if ( $t === NULL )
		{
			throw new CHttpException( 404 );
		}
		$criteria = new CDbCriteria( );
		$criteria->compare( "trial_id", $id );
		$criteria->with = array( "user" );
		$data_provider = new CActiveDataProvider( "TrialComment", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10, "pageVar" => "page" ),
			"sort" => array( "defaultOrder" => "t.created DESC" )
		) );
		$this->render( "view", array(
			"trial" => $t,
			"dataProvider" => $data_provider
		) );
	}

	public function actionComment( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$comment = new TrialComment( );
			$comment->user_id = Yii::app( )->user->id;
			$comment->content = htmlspecialchars( $_POST['content'] );
			$comment->trial_id = $_POST['trial_id'];
			if ( $comment->save( ) )
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}

	public function actionOrder( $id )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$t = Trial::model( )->findByPk( $id );
			if ( $t === NULL )
			{
				throw new CHttpException( 404, "您要查看的页面不存在" );
			}
			$order = TrialOrder::model( )->findByAttributes( array(
				"user_id" => Yii::app( )->user->id,
				"trial_id" => $id
			) );
			if ( $order !== NULL )
			{
				$this->render( "/site/flash_message", array(
					"message" => "您已经申请过该试用了哦！",
					"redirect_url" => array(
						"/trial/view",
						"id" => $id
					),
					"timeout" => "5000"
				) );
				Yii::app( )->end( );
			}
			$order = new TrialOrder( );
			$order->trial_id = $id;
			$order->user_id = Yii::app( )->user->id;
			if ( $order->save( ) )
			{
				$this->render( "/site/flash_message", array(
					"message" => "申请成功，请填写和确认有效的收货地址，前往填写……",
					"redirect_url" => array( "/settings/address" ),
					"timeout" => "3000"
				) );
				Yii::app( )->end( );
			}
		}
		else
		{
			throw new CHttpException( 403 );
		}
	}

	public function getNextTrials( $limit = 2 )
	{
		$criteria = new CDbCriteria( );
		$criteria->compare( "start_time", ">".date( "Y-m-d H:i:s" ) );
		$criteria->limit = $limit;
		$criteria->order = "start_time ASC";
		return Trial::model( )->findAll( $criteria );
	}

	public function getNewOrders( $limit = 5 )
	{
		return TrialOrder::model( )->findAll( array(
			"order" => "id DESC",
			"limit" => $limit
		) );
	}

}

?>
