<?php
class GoodsController extends Controller
{

	private $_model = NULL;

	public function actionView( )
	{
		$this->render( "view", array(
			"model" => $this->loadModel( )
		) );
	}

	public function actionCreate( )
	{
		$form = new Form( "backend.views.goods.formConfig" );
		$form->model = new Goods( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		if ( $form->submitted( "btnsubmit" ) )
		{
			$images = array( "image" );
			foreach ( $images as $name )
			{
				$image = CUploadedFile::getinstance( $form->model, $name );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$dir = "/upload/goods/".date( "Ym" )."/";
					if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
					{
						FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
					}
					$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$form->model->$name = $dir.$filename;
					}
				}
			}
			if ( $form->validate( ) )
			{
				$model = $form->model;
				if ( $model->save( FALSE ) )
				{
					Yii::app( )->user->setFlash( "success", Goods::model( )->modelName.( "“".$model."”已成功添加！" ) );
					$this->redirect( array(
						"view",
						"id" => $model->id
					) );
				}
			}
			else
			{
				foreach ( $images as $name )
				{
					@unlink( Yii::app( )->basePath."/..".$form->model->$name );
				}
			}
		}
		$this->render( "create", array(
			"form" => $form
		) );
	}

	public function actionUpdate( )
	{
		$form = new Form( "backend.views.goods.formConfig" );
		$form->model = $this->loadModel( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "edit-form" )
		{
			echo CActiveForm::validate( $form->model );
			Yii::app( )->end( );
		}
		$images = array( "image" );
		if ( $form->submitted( "btnsubmit" ) )
		{
			$filenames = array( );
			foreach ( $images as $name )
			{
				$image = CUploadedFile::getinstance( $form->model, $name );
				if ( $image )
				{
					$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
					$dir = "/upload/goods/".date( "Ym" )."/";
					if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
					{
						FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
					}
					$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
					if ( $image->saveAs( $full_filename ) )
					{
						$filenames[] = $form->model->$name;
						$form->model->$name = $dir.$filename;
					}
				}
			}
			if ( $form->validate( ) )
			{
				$model = $form->model;
				if ( $model->save( FALSE ) )
				{
					foreach ( $filenames as $filename )
					{
						@unlink( Yii::app( )->basePath."/..".$filename );
					}
					Yii::app( )->user->setFlash( "success", Goods::model( )->modelName.( "“".$model."”已成功修改！" ) );
					$this->redirect( array( "index" ) );
				}
			}
			else
			{
				foreach ( $images as $name )
				{
					@unlink( Yii::app( )->basePath."/..".$form->model->$name );
				}
			}
		}
		$this->render( "update", array(
			"form" => $form
		) );
	}

	public function actionDelete( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$this->loadModel( )->delete( );
			if ( !isset( $_GET['ajax'] ) )
			{
				$this->redirect( array( "index" ) );
			}
		}
		else
		{
			throw new CHttpException( 400, "Invalid request. Please do not repeat this request again." );
		}
	}

	public function actionIndex( )
	{
		$model = new Goods( );
		if ( isset( $_GET['Goods'] ) )
		{
			$model->attributes = $_GET['Goods'];
		}
		$criteria = new CDbCriteria( );
		$criteria->addCondition( "price > 0" );
		if ( isset( $_GET['Goods']['id'], $_GET['Goods']['id'] ) )
		{
			$criteria->compare( "id", $_GET['Goods']['id'] );
		}
		if ( isset( $_GET['Goods']['category_id'], $_GET['Goods']['category_id'] ) )
		{
			$criteria->compare( "category_id", $_GET['Goods']['category_id'] );
		}
		if ( isset( $_GET['Goods']['user_id'], $_GET['Goods']['user_id'] ) )
		{
			$criteria->compare( "user_id", $_GET['Goods']['user_id'] );
		}
		if ( isset( $_GET['Goods']['name'], $_GET['Goods']['name'] ) )
		{
			$criteria->compare( "name", $_GET['Goods']['name'], TRUE );
		}
		$dataProvider = new CActiveDataProvider( "Goods", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$this->render( "index", array(
			"dataProvider" => $dataProvider,
			"model" => $model
		) );
	}

	public function actionImage( )
	{
		$model = new Goods( );
		if ( isset( $_GET['Goods'] ) )
		{
			$model->attributes = $_GET['Goods'];
		}
		$criteria = new CDbCriteria( );
		$criteria->addCondition( "price = 0" );
		if ( isset( $_GET['Goods']['id'], $_GET['Goods']['id'] ) )
		{
			$criteria->compare( "id", $_GET['Goods']['id'] );
		}
		if ( isset( $_GET['Goods']['category_id']) )
		{
			$criteria->compare( "category_id", $_GET['Goods']['category_id'] );
		}
		if ( isset( $_GET['Goods']['user_id']) )
		{
			$criteria->compare( "user_id", $_GET['Goods']['user_id'] );
		}
		if ( isset( $_GET['Goods']['name']) )
		{
			$criteria->compare( "name", $_GET['Goods']['name'], TRUE );
		}
		$dataProvider = new CActiveDataProvider( "Goods", array(
			"criteria" => $criteria,
			"pagination" => array( "pageSize" => 10 ),
			"sort" => array( "defaultOrder" => "t.id DESC" )
		) );
		$this->render( "image", array(
			"dataProvider" => $dataProvider,
			"model" => $model
		) );
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) )
		{
			if ( $_POST['operation'] == "delete" )
			{
				$models = Goods::model( )->findAllByPk( $_POST['id'] );
				if ( $models )
				{
					foreach ( $models as $model )
					{
						$model->delete( );
					}
				}
			}
			echo "操作成功！";
		}
	}

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = Goods::model( )->findbyPk( $_GET['id'] );
			}
			if ( $this->_model === NULL )
			{
				throw new CHttpException( 404, "您要浏览的页面不存在，可能是已被删除或者URL地址错误。" );
			}
		}
		return $this->_model;
	}

	protected function performAjaxValidation( $model )
	{
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "goods-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

	public function actionManage( )
	{
		if ( Yii::app( )->request->getParam( "act", "" ) == "delete" )
		{
			$page = Yii::app( )->request->getParam( "page", 1 );
			$criteria = new CDbCriteria( );
			$criteria->addCondition( "item_key <> ''" );
			$criteria->order = "id ASC";
			$criteria->limit = 10;
			$criteria->offset = ( $page - 1 ) * 10;
			$goodses = Goods::model( )->findAll( $criteria );
			if ( empty( $goodses ) )
			{
				echo CJSON::encode( array( "act" => "done" ) );
				Yii::app( )->end( );
			}
			$num_iids = array( );
			foreach ( $goodses as $goods )
			{
				if ( $goods->website == "taobao" )
				{
					$num_iids[] = str_replace( "taobao_", "", $goods->item_key );
				}
			}
			$delisted_num_iids = $num_iids;
			if ( $num_iids )
			{
				Yii::import( "application.vendors.top.*" );
				Yii::import( "application.vendors.top.request.*" );
				$tb_top = new TopClient( );
				$tb_top->appkey = Yii::app( )->config->get( "taobao_appkey" );
				$tb_top->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
				$tb_top->format = "json";
				$req = new TaobaokeItemsDetailGetRequest( );
				$req->setFields( "item,detail_url,num_iid,title,list_time,delist_time,price,nick,pic_url" );
				$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
				$req->setNumIids( implode( ",", $num_iids ) );
				$resp = $tb_top->execute( $req );
				if ( $resp->msg )
				{
					throw new CException( $resp->msg."; ".$resp->sub_msg );
				}
				$result_count = 0;
				$delisted_count = 0;
				$updated_price_count = 0;
				$updated_name_count = 0;
				if ( 0 < $resp->total_results )
				{
					$resp = $resp->taobaoke_item_details;
					$goods_list = ( array )$resp->taobaoke_item_detail;
					$result_count = count( $goods_list );
					foreach ( $goods_list as $goods_item )
					{
						$details = ( array )$goods_item->item;
						foreach ( $delisted_num_iids as $index => $num_iid )
						{
							if ( $num_iid == $details['num_iid'] )
							{
								unset( $delisted_num_iids[$index] );
								break;
							}
						}
						foreach ( $goodses as $goods )
						{
							if ( $goods->item_key == "taobao_".$details['num_iid'] )
							{
								if ( empty( $goods->taobao_seller_nick ) )
								{
									$goods->taobao_seller_nick = $details['nick'];
									if ( $goods->shop_id == 0 )
									{
										$shop = Shop::model( )->findByAttributes( array(
											"nick" => $details['nick']
										) );
										if ( $shop !== NULL )
										{
											$goods->shop_id = $shop->id;
										}
									}
								}
								if ( $goods->price != $details['price'] )
								{
									$goods->price = $details['price'];
									$updated_price_count += 1;
								}
								if ( $goods->name != $details['title'] && $goods->edited == 0 )
								{
									$goods->name = $details['title'];
									$updated_name_count += 1;
								}
								if ( $goods->image[0] == "/" )
								{
									@unlink( Yii::app( )->basePath."/../".$goods->image );
									$goods->image = $details['pic_url'];
								}
								$goods->save( FALSE );
							}
						}
					}
				}
			}
			foreach ( $goodses as $goods )
			{
				$changed = FALSE;
				if ( $delisted_num_iids && in_array( str_replace( "taobao_", "", $goods->item_key ), $delisted_num_iids ) )
				{
					$goods->delisted = 1;
					$changed = TRUE;
				}
				if ( $goods->image_w == 0 || $goods->image_h == 0 )
				{
					if ( $goods->image[0] == "/" )
					{
						$filename = Yii::app( )->basePath."/..".$goods->image;
						$pathinfo = pathinfo( $filename );
						$image = ImageHelper::createfromfile( $filename, $pathinfo['extension'] );
						if ( $image->_handle !== NULL )
						{
							$goods->image_w = imagesx( $image->_handle );
							$goods->image_h = imagesy( $image->_handle );
							$image->destroy( );
						}
						else
						{
							$goods->image_w = $goods->image_h = 200;
						}
					}
					else
					{
						$wh = UtilHelper::getimagesize( $goods->image );
						$goods->image_w = intval( $wh['width'] );
						$goods->image_h = intval( $wh['height'] );
					}
					$changed = TRUE;
				}
				if ( $changed )
				{
					$goods->save( FALSE );
				}
			}
			echo CJSON::encode( array(
				"act" => "next",
				"delisted_count" => count( $delisted_num_iids ),
				"updated_name_count" => $updated_name_count,
				"updated_price_count" => $updated_price_count,
				"result_count" => $result_count
			) );
			Yii::app( )->end( );
		}
		$this->render( "manage" );
	}

}

?>
