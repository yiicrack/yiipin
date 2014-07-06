<?php
class ExchangeController extends Controller
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
				"actions" => array( "order" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index", array(
			"itemCount" => ExchangeGoods::model( )->count( $this->getCriteria( ) )
		) );
	}

	public function actionGetGoods( $frame = 0, $page = 1 )
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
			$goods = ExchangeGoods::model( )->findAll( $criteria );
			if ( empty( $goods ) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "/exchange/getGoods", array(
					"goods" => $goods
				) );
			}
		}
	}

	public function actionView( $id )
	{
		$goods = ExchangeGoods::model( )->findByPk( $id );
		if ( $goods === NULL )
		{
			throw new CHttpException( 404, "您要查看的页面不存在" );
		}
		$this->render( "view", array(
			"goods" => $goods
		) );
	}

	public function actionOrder( $id )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$goods = ExchangeGoods::model( )->findByPk( $id );
			if ( $goods === NULL )
			{
				throw new CHttpException( 404, "您要查看的页面不存在" );
			}
			$user = User::model( )->findByPk( Yii::app( )->user->id );
			if ( $user->credit < $goods->credit * $_POST['count'] )
			{
				$this->render( "/site/flash_message", array(
					"message" => "您的积分不够，无法兑换该商品！",
					"redirect_url" => array( "/exchange/index" ),
					"timeout" => "3000"
				) );
				Yii::app( )->end( );
			}
			if ( $goods->stock < $_POST['count'] )
			{
				throw new CHttpException( 403 );
			}
			$order = new ExchangeOrder( );
			$order->goods_id = $id;
			$order->user_id = Yii::app( )->user->id;
			$order->count = $_POST['count'];
			if ( $order->save( ) )
			{
				if ( !$goods->is_virtual )
				{
					$this->render( "/site/flash_message", array(
						"message" => "该商品为实物商品，需要收货地址，前往填写……",
						"redirect_url" => array( "/settings/address" ),
						"timeout" => "3000"
					) );
					Yii::app( )->end( );
				}
				else
				{
					$this->render( "/site/flash_message", array(
						"message" => "兑换订单提交成功，系统将很快处理！",
						"redirect_url" => array( "/exchange/index" ),
						"timeout" => "3000"
					) );
					Yii::app( )->end( );
				}
			}
		}
		else
		{
			throw new CHttpException( 403 );
		}
	}

	private function getCriteria( )
	{
		$criteria = new CDbCriteria( );
		$criteria->select = "t.*";
		$criteria->order = "t.sortnum DESC";
		if ( isset( $_GET['type'] ) && $_GET['type'] == "new" )
		{
			$criteria->order = "t.id DESC";
		}
		if ( isset( $_GET['sort'] ) && $_GET['sort'] == "new" )
		{
			$criteria->order = "t.id DESC";
		}
		if ( isset( $_GET['sort'] ) && $_GET['sort'] == "hot" )
		{
			$criteria->order = "t.exchanged_count DESC";
		}
		if ( isset( $_GET['category_id'] ) )
		{
			$criteria->compare( "category_id", $_GET['category_id'] );
		}
		if ( isset( $_GET['price'] ) && $_GET['price'] != "all" )
		{
			$price = explode( "~", $_GET['price'] );
			$criteria->compare( "credit", ">=".intval( $price[0] ) );
			$criteria->compare( "credit", "<=".intval( $price[1] ) );
		}
		return $criteria;
	}

	public function getCategories( )
	{
		return ExchangeCategory::model( )->findAll( array( "order" => "sortnum DESC" ) );
	}

}

?>
