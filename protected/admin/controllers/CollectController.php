<?php
class CollectController extends Controller
{

	public function actionTaobao( )
	{
		if ( !Yii::app( )->config->get( "collect_users" ) )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "请先设定用于采集的用户马甲",
				"jumpUrl" => array( "users" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		if ( !Yii::app( )->config->get( "taobao_cates" ) )
		{
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "淘宝分类数据为空，正在自动获取中……",
					"jumpUrl" => array( "fetchcategories" ),
					"waitSecond" => 3,
					"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
		if ( !isset( $_GET['restart'] ) )
		{
			$collect_taobao_items = Yii::app( )->user->getState( "collect_taobao_items" );
			if ( 0 < count( $collect_taobao_items ) )
			{
				$this->render( "taobao_confirm", array(
					"taobao_items" => $collect_taobao_items
				) );
				Yii::app( )->end( );
			}
		}
		else if ( $_GET['restart'] == "0" )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "继续未完成的采集，商品入库……",
				"jumpUrl" => array( "collect/execute_save" ),
				"waitSecond" => 1
			) );
			Yii::app( )->end( );
		}
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( !is_numeric( $_POST['category_id'] ) && $_POST['category_id'] == 0 )
			{
				throw new CException( "请选择商品分类" );
			}
			if ( !trim( $_POST['keywords'] ) )
			{
				throw new CException( "请输入要采集的关键词" );
			}
			if ( !is_numeric( $_POST['config']['page_no'] ) )
			{
				throw new CException( "请输入要采集的页数" );
			}
			if ( !is_numeric( $_POST['config']['page_size'] ) )
			{
				throw new CException( "请输入每页数量" );
			}
			if ( 10 < intval( $_POST['config']['page_no'] ) )
			{
				throw new CException( "最多只能采集10页" );
			}
			if ( 40 < intval( $_POST['config']['page_size'] ) )
			{
				throw new CException( "每页数量最多40条" );
			}
			Yii::app( )->config->set( "taobao_collect_config", $_POST );
			$cid = Yii::app( )->request->getParam( "cid", 0 );
			$sub_cid = Yii::app( )->request->getParam( "sub_cid", 0 );
			if ( $sub_cid )
			{
				$cid = $sub_cid;
			}
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "正在采集第一个关键词……",
				"jumpUrl" => array(
					"collect/execute",
					"cid"=>$cid,
					"index" => 0,
					"page" => 1
				),
				"waitSecond" => 1,
				"loader" => true
			) );
			Yii::app( )->end( );
		}
		$parent_cates = CHtml::listdata( Yii::app( )->config->get( "taobao_cates" ), "cid", "name" );

		$this->render( "taobao", array(
				"parent_cates" => $parent_cates,
				"config" => Yii::app( )->config->get( "taobao_collect_config" )
		) );
	}

	public function actionGetSubCates( $cid )
	{
		$taobao_cates = Yii::app( )->config->get( "taobao_cates" );
		$listData = array( );
		foreach ( $taobao_cates as $category )
		{
			if ( $category['cid'] == $cid  && $category['is_parent'] === "true" ) 
			{
				$listData = CHtml::listdata( $category['subs'], "cid", "name" );
				break;
			}

		}
		$options = array( "empty" => "不限" );
		echo CHtml::listoptions( NULL, $listData, $options );
	}
	
	public function getSubCates( $cid )
	{
		$taobao_cates = Yii::app( )->config->get( "taobao_cates" );
		foreach ( $taobao_cates as $cate )
		{
			if ( !( $cate['cid'] == $cid ) && !( $cate['is_parent'] === "true" ) )
			{
				continue;
			}
			return CHtml::listdata( $cate['subs'], "cid", "name" );
		}
		return array( );
	}
	
	public function actionExecute( $cid, $index, $page )
	{
		$collect_config = Yii::app( )->config->get( "taobao_collect_config" );
		$keywords = explode( " ", trim( $collect_config['keywords'] ) );
		$exclude_keywords = explode( " ", trim( $collect_config['exclude_keywords'] ) );
		$config = $collect_config['config'];
		if ( $index < count( $keywords ) )
		{
			$keyword = $keywords[$index];
			Yii::import( "application.vendors.top.*" );
			Yii::import( "application.vendors.top.request.*" );
			$topclient = new TopClient( );
			$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
			$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
			$current_num = 0;
			if ( $page <=  intval( $config['page_no'] ) )
			{
				$req = new TaobaokeItemsGetRequest( );
				$req->setFields( "num_iid,title,nick,pic_url,price,click_url,shop_click_url,seller_credit_score,item_location,volume,commission_rate,commission,commission_num" );
				$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
				$req->setKeyword( $keyword );
				$req->setStartCredit( $config['start_credit'] );
				$req->setEndCredit( $config['end_credit'] );
				$req->setGuarantee( isset($config['guarantee']) ? $config['guarantee'] : "" );
				$req->setRealDescribe( isset($config['real_describe']) ? $config['real_describe'] : "" );
				$req->setMallItem( isset($config['mall_item']) ? $config['mall_item'] : "" );
				if ( !empty( $config['start_price'] ) )
				{
					$req->setStartPrice( intval( $config['start_price'] ) );
				}
				if ( !empty( $config['end_price'] ) )
				{
					$req->setEndPrice( intval( $config['end_price'] ) );
				}
				if ( !empty( $config['start_commissionRate'] ) )
				{
					$req->setStartCommissionRate( intval( 100 * floatval( $config['start_commissionRate'] ) ) );
				}
				if ( !empty( $config['end_commissionRate'] ) )
				{
					$req->setEndCommissionRate( intval( 100 * floatval( $config['end_commissionRate'] ) ) );
				}
				if ( !empty( $config['start_totalnum'] ) )
				{
					$req->setStartTotalnum( intval( $config['start_totalnum'] ) );
				}
				if ( !empty( $config['end_totalnum'] ) )
				{
					$req->setEndTotalnum( intval( $config['end_totalnum'] ) );
				}
				$req->setSort( $config['sort'] );
				if ( $cid )
				{
					$req->setCid( $cid );
				}
				$req->setPageNo( $page );
				$req->setPageSize( $config['page_size'] );
				$resp = $topclient->execute( $req );
				if ( $resp->msg )
				{
					throw new CException( "发生了错误（可能是API调用次数超过每日限额）：".$resp->msg."; ".$resp->sub_msg );
				}
				$current_num = 0;
				if ( 0 < $resp->total_results )
				{
					$new_items = array( );
					$items = ( array )$resp->taobaoke_items;
					foreach ( $items['taobaoke_item'] as $item )
					{
						$item = ( array )$item;
						$item['item_key'] = "taobao_".$item['num_iid'];
						$is_exclude = FALSE;
						if ( $exclude_keywords )
						{
							foreach ( $exclude_keywords as $tmp )
							{
								if ( trim($tmp) != "" && strpos( trim($item['title']), trim($tmp) ) === FALSE )
								{
									$is_exclude = TRUE;
									break;
								}
							}
						}
						if ( !$is_exclude )
						{
							$new_items[] = array(
								$item,
								$keyword
							);
						}
					}
					$taobao_items = Yii::app( )->user->getState( "collect_taobao_items" );
					if ( $taobao_items )
					{
						$new_items = array_merge( $taobao_items, $new_items );
					}
					Yii::app( )->user->setState( "collect_taobao_items", $new_items );
					$current_num = count( $new_items );
				}
				if ( $page < intval( $config['page_no'] ) )
				{
					$message = "正在进行第一步：关键词 “".$keyword."” 第 {$page} 页数据采集成功，共采集到新商品数据{$current_num}个，继续采集下一页……";
					$page += 1;
				}
				else
				{
					$message = "正在进行第一步：关键词 “".$keyword."” 第 {$page} 页数据采集成功，共采集到新商品数据{$current_num}个，继续采集下一个关键词……";
					$page = 1;
					$index += 1;
				}
			}
			$this->render( "/site/redirect_msg", array(
							"title" => "提示信息",
							"message" => $message,
							"jumpUrl" => array(
								"collect/execute",
								"cid" => $cid,
								"index" => $index,
								"page" => $page
							),
							"waitSecond" => 1,
							"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
		else
		{
			$this->render( "/site/redirect_msg", array(
							"title" => "提示信息",
							"message" => "第一步：数据采集全部完成，进入下一步，商品入库……",
							"jumpUrl" => array( "collect/execute_save" ),
							"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
	}
	
	public function actionExecute_save( )
	{
		$taobao_items = Yii::app( )->user->getState( "collect_taobao_items" );
		$tmp_items = array_splice( $taobao_items, 0, 5 );
		Yii::app( )->user->setState( "collect_taobao_items", $taobao_items );
		$items_count = count( $taobao_items );
		if ( $items_count == 0 )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "第二步：商品全部保存完成！",
				"jumpUrl" => array( "goods/index" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$collect_config = Yii::app( )->config->get( "taobao_collect_config" );
		$success_count = 0;
		foreach ( $tmp_items as $item )
		{
			$ret = $this->_collect_insert( $item[0], $collect_config['category_id'], $item[1] );
			if ( $ret )
			{
				++$success_count;
			}
		}
		if ( $success_count )
		{
			$message = "第二步：成功保存商品".$success_count."件，还剩余{$items_count}件，继续处理……";
		}
		else
		{
			$message = "第二步：跳过已存在商品，还剩余".$items_count."件，继续处理……";
		}
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => $message,
			"jumpUrl" => array( "collect/execute_save" ),
			"waitSecond" => 1,
			"loader" => TRUE
		) );
	}
	

	private function _collect_insert( $item, $category_id, $keyword = "", $images_collected = TRUE )
	{
		$ext = strtolower( pathinfo( $item['pic_url'], PATHINFO_EXTENSION ) );
		if ( !in_array( $ext, array(
			"jpg",
			"jpeg",
			"gif",
			"png"
		) ) )
		{
			return FALSE;
		}
		$goods = Goods::model( )->findByAttributes( array(
			"item_key" => $item['item_key']
		) );
		if ( $goods === NULL )
		{
			$goods = new Goods( );
			$goods->category_id = $category_id;
			$goods->user_id = $this->_getUserId( );
			$goods->name = strip_tags( $item['title'] );
			$goods->image = $item['pic_url'];
			$goods->price = $item['price'];
			$goods->url = isset( $item['click_url'] ) ? $item['click_url'] : $item['detail_url'];
			$goods->website = "taobao";
			$goods->item_key = $item['item_key'];
			$goods->taobao_seller_nick = $item['nick'];
			if ( isset( $item['commission_rate'] ) )
			{
				$goods->taobao_commission_rate = $item['commission_rate'];
			}
			if ( isset( $item['commission'] ) )
			{
				$goods->taobao_commission = $item['commission'];
			}
			if ( isset( $item['commission_num'] ) )
			{
				$goods->taobao_commission_num = $item['commission_num'];
			}
			if ( isset( $item['volume'] ) )
			{
				$goods->taobao_volume = $item['volume'];
			}
			$goods->collect_count = 0;
			$goods->images_collected = $images_collected;
			$im = UtilHelper::getimagesize( $goods->image );
			$goods->image_w = $im['width'];
			$goods->image_h = $im['height'];
			if ( $goods->save( ) )
			{
				$group = Group::model( )->findByAttributes( array(
					"user_id" => $goods->user_id
				), array( "order" => "id ASC" ) );
				if ( $group === NULL )
				{
					$group = new Group( );
					$group->user_id = $goods->user_id;
					$group->name = $goods->user->username."喜欢的宝贝";
					$group->save( FALSE );
				}
				$share = new Share( );
				$share->goods_id = $goods->id;
				$share->group_id = $group->id;
				$share->user_id = $goods->user_id;
				$share->from_group_id = 0;
				$share->from_user_id = 0;
				$share->like_count = 0;
				$share->comment_count = 0;
				$share->save( );
				if ( $keyword )
				{
					$tag = GoodsTag::model( )->findByAttributes( array(
						"name" => $keyword
					) );
					if ( $tag === NULL )
					{
						$tag = new GoodsTag( );
						$tag->name = $keyword;
						$tag->save( FALSE );
					}
					$has_tag = GoodsHasTag::model( )->findByAttributes( array(
						"goods_id" => $goods->id,
						"tag_id" => $tag->id
					) );
					if ( $has_tag === NULL )
					{
						$has_tag = new GoodsHasTag( );
						$has_tag->goods_id = $goods->id;
						$has_tag->tag_id = $tag->id;
						$has_tag->save( );
					}
				}

				if (isset($item['item_img'])) {
					$item_img = ( array )$item['item_img'];
					if ( count( $item_img['item_img'] ) )
					{
						foreach ( $item_img['item_img'] as $index => $img )
						{
							if ( !( $index == 0 ) )
							{
								$goods_image = new GoodsImage( );
								$goods_image->goods_id = $goods->id;
								$goods_image->url = ( boolean )$img->url;
								$goods_image->position = $img->position;
								$goods_image->taobao_id = $img->id;
								$goods_image->save( );
							}
						}
					}
				}
				return TRUE;
			}
		}
		else
		{
			$goods->name = strip_tags( $item['title'] );
			$goods->price = $item['price'];
			$goods->url = $item['click_url'];
			$goods->taobao_seller_nick = $item['nick'];
			$goods->taobao_commission_rate = $item['commission_rate'];
			$goods->taobao_commission = $item['commission'];
			$goods->taobao_commission_num = $item['commission_num'];
			$goods->taobao_volume = $item['volume'];
			$goods->save( FALSE );
			return FALSE;
		}
	}

	private function _getUserId( )
	{
		$collect_users = explode( ",", Yii::app( )->config->get( "collect_users" ) );
		$index = rand( 0, count( $collect_users ) - 1 );
		$user = User::model( )->findByAttributes( array(
			"username" => $collect_users[$index]
		) );
		
		if ( $user !== NULL )
		{
			return $user->id;
		}
		else {
			echo "用户马甲：".$collect_users[$index]." 不存在！请重新设置";
			Yii::app( )->end( );
		}
	}

	public function actionUsers( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "collect/users" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "users" );
	}

	public function actionComment( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			foreach ( $_POST as $key => $value )
			{
				Yii::app( )->config->set( $key, $value );
			}
			$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "设置保存成功!",
					"jumpUrl" => array( "collect/comment" ),
					"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$this->render( "comment" );
	}
	
	public function actionGetTags( $category_id )
	{
		$category = GoodsCategory::model( )->findByPk( $category_id );
		$groups = explode( "\r\n", trim( $category->tag_groups ) );
		$keywords = "";
		foreach ( $groups as $group )
		{
			if ( !( $group != "热门风格" ) && !( $group != "当季流行" ) && !( $group != "元素" ) )
			{
				$has_tags = GoodsCategoryHasTag::model( )->findAllByAttributes( array(
					"group" => $group,
					"category_id" => $category_id
				) );
				foreach ( $has_tags as $has_tag )
				{
					$keywords .= $has_tag->tag->name." ";
				}
			}
		}
		echo trim( $keywords );
	}

	public function actionShop( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( !is_numeric( $_POST['category_id'] ) && $_POST['category_id'] == 0 )
			{
				throw new CException( "请选择店铺分类" );
			}
			if ( !is_numeric( $_POST['pagecount'] ) )
			{
				throw new CException( "请输入要采集的页数" );
			}
			if ( empty( $_POST['keyword'] ) )
			{
				throw new CException( "请输入要采集的店铺名关键词" );
			}
			if ( 100 < intval( $_POST['pagecount'] ) )
			{
				throw new CException( "最多只能采集100页" );
			}
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "正在采集第一页……",
				"jumpUrl" => array(
					"collect/execute_shop",
					"pagecount" => $_POST['pagecount'],
					"keywords" => trim( $_POST['keyword'] ),
					"category_id" => $_POST['category_id'],
					"start_credit" => Yii::app( )->request->getParam( "start_credit", "" ),
					"end_credit" => Yii::app( )->request->getParam( "end_credit", "" ),
					"only_mall" => Yii::app( )->request->getParam( "only_mall", "" ),
					"start_commissionRate" => Yii::app( )->request->getParam( "start_commissionRate", "" ),
					"end_commissionRate" => Yii::app( )->request->getParam( "end_commissionRate", "" ),
					"page" => 1
				),
				"waitSecond" => 1,
				"loader" => true
			) );
			Yii::app( )->end( );
		}
		$this->render( "shop" );
	}

	public function actionExecute_shop( $keyword, $pagecount, $category_id, $start_credit, $end_credit, $only_mall, $start_commissionRate, $end_commissionRate, $page )
	{
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$current_num = 0;
		if ( $page <= $pagecount )
		{
			$req = new TaobaokeShopsGetRequest( );
			$req->setFields( "seller_nick,user_id,click_url,shop_title,commission_rate,seller_credit,shop_type,auction_count,total_auction" );
			$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
			$req->setKeyword( $keyword );
			$req->setStartCredit( $start_credit );
			$req->setEndCredit( $end_credit );
			$req->setOnlyMall( $only_mall );
			if ( !empty( $start_commissionRate ) )
			{
				$req->setStartCommissionRate( intval( 100 * floatval( $start_commissionRate ) ) );
			}
			if ( !empty( $end_commissionRate ) )
			{
				$req->setEndCommissionRate( intval( 100 * floatval( $end_commissionRate ) ) );
			}
			$req->setPageNo( $page );
			$req->setPageSize( 40 );
			$resp = $topclient->execute( $req );
			if ( $resp->msg )
			{
				throw new CException( "发生了错误（可能是API调用次数超过每日限额）：".$resp->msg."; ".$resp->sub_msg );
			}
			if ( 0 < $resp->total_results )
			{
				$shops = ( array )$resp->taobaoke_shops;
				if ( isset( $shops['taobaoke_shop']->seller_nick ) )
				{
					$shops['taobaoke_shop'] = array(
						$shops['taobaoke_shop']
					);
				}
				foreach ( $shops['taobaoke_shop'] as $item )
				{
					$item = ( array )$item;
					$shop = Shop::model( )->findByAttributes( array(
						"nick" => $item['seller_nick']
					) );
					if ( $shop === NULL )
					{
						$shop = new Shop( );
						$shop->category_id = $category_id;
						$shop->name = $item['shop_title'];
						$shop->nick = $item['seller_nick'];
						$shop->url = $item['click_url'];
						$shop->share_count = intval( Goods::model( )->countByAttributes( array(
							"taobao_seller_nick" => $item['seller_nick']
						) ) );
						if ( $shop->save( ) )
						{
							$current_num += 1;
							Goods::model( )->updateAll( array(
								"shop_id" => $shop->id
							), "taobao_seller_nick = '".$item['seller_nick']."'" );
						}
					}
				}
			}
			if ( $page < $pagecount )
			{
				$message = "第 ".$page." 页数据采集成功，共采集到新店铺{$current_num}个，继续采集下一页……";
				$page += 1;
				$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => $message,
					"jumpUrl" => array(
						"collect/execute_shop",
						"keyword" => $keyword,
						"pagecount" => $pagecount,
						"category_id" => $category_id,
						"start_credit" => $start_credit,
						"end_credit" => $end_credit,
						"only_mall" => $only_mall,
						"start_commissionRate" => $start_commissionRate,
						"end_commissionRate" => $end_commissionRate,
						"page" => $page
					),
					"waitSecond" => 1,
					"loader" => true
				) );
			}
			else
			{
				$message = "第 ".$page." 页数据采集成功，共采集到新店铺{$current_num}个，全部采集完成！";
				$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => $message,
					"jumpUrl" => array( "shop/index" ),
					"waitSecond" => 3
				) );
			}
		}
		Yii::app( )->end( );
	}
	
	public function actionFetchCategories( )
	{
		$goodsCategory = $this->getTaobaoCates( );
		$cids = array( );
		foreach ( $goodsCategory as $key => $value )
		{
			if ( $value['is_parent'] === "true" )
			{
				$goodsCategory[$key]['subs'] = $this->getTaobaoCates( $value['cid'] );
			}
		}
		Yii::app( )->config->set( "taobao_cates", $goodsCategory );
		$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "淘宝分类数据获取成功！",
				"jumpUrl" => array( "taobao" ),
				"waitSecond" => 3
		) );
	}
	
	private function getTaobaoCates( $parent_cid = 0 )
	{
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$req = new ItemcatsGetRequest( );
		$req->setFields( "cid,parent_cid,name,is_parent" );
		$req->setParentCid( $parent_cid );
		$resp = $topclient->execute( $req );
		if ( $resp->msg )
		{
			throw new CException( "发生了错误（可能是API调用次数超过每日限额）：".$resp->msg."; ".$resp->sub_msg );
		}
		$data = ( array )$resp->item_cats;
		$data = ( array )$data['item_cat'];
		$goodsCategory = array( );
		foreach ( $data as $value )
		{
			$goodsCategory[] = ( array )$value;
		}
		return $goodsCategory;
	}
	
	public function actionShopGoods( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( !is_numeric( $_POST['shop_id'] ) && $_POST['shop_id'] == 0 )
			{
				throw new CException( "请选择好店" );
			}
			if ( empty( $_POST['shop_url'] ) )
			{
				throw new CException( "请输入要采集的店铺搜索页地址" );
			}
			if ( strpos( $_POST['shop_url'], "search.htm" ) === FALSE )
			{
				throw new CException( "请输入要正确的店铺搜索页地址" );
			}
			Yii::app( )->user->setState( "collect_taobao_item_urls", NULL );
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "开始采集……",
				"jumpUrl" => array(
					"collect/execute_shopgoods_list",
					"shop_id" => $_POST['shop_id'],
					"category_id" => $_POST['category_id'],
					"shop_url" => trim( $_POST['shop_url'] )
				),
				"waitSecond" => 1,
				"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
		$this->render( "shopgoods" );
	}

	public function actionExecute_shopgoods_list( $shop_id, $category_id, $shop_url, $page = 1 )
	{
		$info = parse_url( $shop_url );
		if ( empty( $info['host'] ) )
		{
			throw new CException( "地址错误，无法继续" );
		}
		$shop = Shop::model( )->findByPk( $shop_id );
		if ( $shop === NULL )
		{
			throw new CException( "指定的好店不存在" );
		}
		$params = array();
		if ( isset( $info['query'], $info['query'] ) )
		{
			parse_str( $info['query'], $params );
		}
		$params['pageNum'] = $page;
		$new_url = "http://".$info['host']."{$info['path']}?".http_build_query( $params );
		$html = UtilHelper::getpage( $new_url, "UTF-8" );
		if ( empty( $html ) )
		{
			throw new CException( "抓取搜索列表页失败" );
		}
		if ( strpos( $html, "没有对应的宝贝" ) !== FALSE || strpos( $html, "很抱歉" ) !== FALSE )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "搜索列表分析完毕，开始采集店铺商品……",
				"jumpUrl" => array(
					"collect/execute_shopgoods_goods",
					"shop_id" => $shop_id,
					"category_id" => $category_id
				),
				"waitSecond" => 1,
				"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
		$patterns = array( "%<ul class=\"shop\\-list\">.+?</ul>%is", "%<div class=\"shop\\-hesper\\-bd grid\">.+?<div class=\"pagination\">%is" );
		$result = "";
		foreach ( $patterns as $pattern )
		{
			preg_match_all( $pattern, $html, $matches );
			$result = trim( $matches[0][0] );
			if ( empty( $result ) )
			{
				continue;
			}
			break;
		}
		if ( empty( $result ) )
		{
			throw new CException( "匹配列表部分HTML失败" );
		}
		$result = implode( "", $matches[0] );
		$pattern1 = "%http://item\\.taobao\\.com/item\\.htm\\?.*?id=(\\d+)%is";
		$matches = array( );
		$res = preg_match_all( $pattern1, $result, $matches, PREG_PATTERN_ORDER );
		if ( !$res )
		{
			$pattern2 = "%http://detail\\.tmall\\.com/item\\.htm\\?.*?id=(\\d+)%is";
			$matches = array( );
			$res = preg_match_all( $pattern2, $result, $matches, PREG_PATTERN_ORDER );
			if ( !$res )
			{
				throw new CException( "没有匹配到任何商品链接" );
			}
		}
		$item_urls = array_unique( $matches[0] );
		$taobao_item_urls = Yii::app( )->user->getState( "collect_taobao_item_urls" );
		if ( $taobao_item_urls )
		{
			$item_urls = array_merge( $taobao_item_urls, $item_urls );
			$item_urls = array_unique( $item_urls );
		}
		Yii::app( )->user->setState( "collect_taobao_item_urls", $item_urls );
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => "搜索列表第".$page."页商品链接采集成功（总计".count( $item_urls )."个），正在采集下一页……",
			"jumpUrl" => array(
				"collect/execute_shopgoods_list",
				"shop_id" => $shop_id,
				"shop_url" => $shop_url,
				"category_id" => $category_id,
				"page" => $page + 1
			),
			"waitSecond" => 1,
			"loader" => TRUE
		) );
		Yii::app( )->end( );
	}
	
	public function actionExecute_shopgoods_goods( $shop_id, $category_id )
	{
		$item_urls = Yii::app( )->user->getState( "collect_taobao_item_urls" );
		$tmp_item_urls = array_splice( $item_urls, 0, 5 );
		Yii::app( )->user->setState( "collect_taobao_item_urls", $item_urls );
		$items_count = count( $item_urls );
		if ( empty( $tmp_item_urls ) )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "该店铺商品全部采集完成！",
				"jumpUrl" => array( "goods/index" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$numIids = array( );
		$current_num = 0;
		$item_collect = new TaobaoItemCollect( );
		foreach ( $tmp_item_urls as $url )
		{
			$numIids[] = $item_collect->get_id( $url );
		}
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$req = new TaobaokeItemsDetailGetRequest( );
		$req->setFields( "item,click_url,shop_click_url,num_iid,title,pic_url,item_img,price,nick,volume,commission_rate,commission,commission_num" );
		$req->setNumIids( implode( ",", $numIids ) );
		$req->setPid( Yii::app( )->config->get( "taobao_pid" ) );
		$resp = $topclient->execute( $req );
		if ( $resp->msg )
		{
			throw new CException( "发生了错误（可能是API调用次数超过每日限额）：".$resp->msg."; ".$resp->sub_msg );
		}
		if ( 0 < $resp->total_results )
		{
			$resp = ( array )$resp->taobaoke_item_details;
			$items = $resp['taobaoke_item_detail'];
			foreach ( $items as $item )
			{
				$item = ( array )$item;
				$tmp_item = ( array )$item['item'];
				$item = array_merge( $item, $tmp_item );
				unset( $item['item'] );
				foreach ( $numIids as $k => $v )
				{
					if ( !( $v == $item['num_iid'] ) )
					{
						continue;
					}
					unset( $numIids[$k] );
					break;
				}
				if ( isset( $item['shop_click_url'], $item['shop_click_url'] ) )
				{
					$shop = Shop::model( )->findByPk( $shop_id );
					$shop->url = $item['shop_click_url'];
					$shop->save( FALSE, array( "url" ) );
				}
				$item['item_key'] = "taobao_".$item['num_iid'];
				if ( $this->_collect_insert( $item, $category_id ) )
				{
					$current_num += 1;
				}
			}
		}
		if ( 0 < count( $numIids ) )
		{
			$req = new ItemsListGetRequest( );
			$req->setFields( "detail_url,num_iid,item_img,title,nick,pic_url,price" );
			$req->setNumIids( implode( ",", $numIids ) );
			$resp = $topclient->execute( $req );
			if ( $resp->sub_msg )
			{
				throw new CException( $resp->sub_msg );
			}
			if ( $resp->msg )
			{
				throw new CException( $resp->msg.";".$resp->sub_code );
			}
			$items = ( array )$resp->items;
			$items = ( array )$items['item'];
			if ( is_array( $items ) && 0 < count( $items ) )
			{
				foreach ( $items as $item )
				{
					$item = ( array )$item;
					$item['item_key'] = "taobao_".$item['num_iid'];
					if ( $this->_collect_insert( $item, $category_id ) )
					{
						$current_num += 1;
					}
				}
			}
		}
		$exists_count = 5 - $current_num;
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => "成功采集店铺商品".$current_num."件，{$exists_count}件已存在，还剩余{$items_count}件，继续采集……",
			"jumpUrl" => array(
				"collect/execute_shopgoods_goods",
				"shop_id" => $shop_id,
				"category_id" => $category_id
			),
			"waitSecond" => 1,
			"loader" => TRUE
		) );
		Yii::app( )->end( );
	}
	
	public function actionTmall( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$cid = Yii::app( )->request->getParam( "cid", 0 );
			$sub_cid = Yii::app( )->request->getParam( "sub_cid", 0 );
			if ( $sub_cid )
			{
				$cid = $sub_cid;
			}
			Yii::app( )->user->setState( "collect_taobao_tmall_cid", $_POST['category_id'] );
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "正在获取该类别精选商品track_iid列表……",
				"jumpUrl" => array(
					"collect/tmall_step1",
					"cid" => $cid
				),
				"waitSecond" => 1,
				"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
		$parent_cates = CHtml::listdata( Yii::app( )->config->get( "taobao_cates" ), "cid", "name" );
		$this->render( "tmall", array(
			"parent_cates" => $parent_cates
		) );
	}

	public function actionTmall_step1( $cid )
	{
		Yii::import( "application.vendors.top.*" );
		Yii::import( "application.vendors.top.request.*" );
		$topclient = new TopClient( );
		$topclient->appkey = Yii::app( )->config->get( "taobao_appkey" );
		$topclient->secretKey = Yii::app( )->config->get( "taobao_appsecret" );
		$topclient->format = "json";
		$req = new TmallSelectedItemsSearchRequest( );
		$req->setCid( $cid );
		$resp = $topclient->execute( $req );
		if ( $resp->msg )
		{
			throw new CException( "发生了错误（可能是API调用次数超过每日限额）：".$resp->msg."; ".$resp->sub_msg );
		}
		$iids = array( );
		if ( !empty( $resp->item_list->selected_item ) )
		{
			foreach ( $resp->item_list->selected_item as $item )
			{
				$iids[] = $item->track_iid;
			}
		}
		Yii::app( )->user->setState( "collect_taobao_track_iids", $iids );
		Yii::app( )->user->setState( "collect_taobao_tmall_items", NULL );
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => "该分类track_iid列表获取完成，开始转换为淘客商品信息……",
			"jumpUrl" => array( "collect/tmall_step2" ),
			"waitSecond" => 1,
			"loader" => TRUE
		) );
		Yii::app( )->end( );
	}

	public function actionTmall_step2( )
	{
		$appkey = Yii::app( )->config->get( "taobao_appkey" );
		$appsecret = Yii::app( )->config->get( "taobao_appsecret" );
		$timestamp = time( )."000";
		$message = $appsecret."app_key".$appkey."timestamp".$timestamp.$appsecret;
		$sign = strtoupper( hash_hmac( "md5", $message, $appsecret ) );
		Yii::app( )->request->cookies['timestamp'] = new CHttpCookie( "timestamp", $timestamp );
		Yii::app( )->request->cookies['sign'] = new CHttpCookie( "sign", $sign );
		$iids = Yii::app( )->user->getState( "collect_taobao_track_iids" );
		$curent_iids = array_splice( $iids, 0, 40 );
		Yii::app( )->user->setState( "collect_taobao_track_iids", $iids );
		$this->render( "tmall_step2", array(
			"curent_iids" => implode( ",", $curent_iids )
		) );
	}

	public function actionTmall_step3( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$tmall_items = Yii::app( )->user->getState( "collect_taobao_tmall_items" );
			$items = $_POST['items'];
			if ( $tmall_items )
			{
				$items = array_merge( $tmall_items, $items );
			}
			Yii::app( )->user->setState( "collect_taobao_tmall_items", $items );
		}
		else
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "商品信息转换完成，开始入库保存商品信息……",
				"jumpUrl" => array( "collect/tmall_step4" ),
				"waitSecond" => 1,
				"loader" => TRUE
			) );
			Yii::app( )->end( );
		}
	}

	public function actionTmall_step4( )
	{
		$items = Yii::app( )->user->getState( "collect_taobao_tmall_items" );
		if ( empty( $_obfuscate_AGk1QY4 ) )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "该分类天猫精选商品采集完成！",
				"jumpUrl" => array( "goods/index" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$current_items = array_splice( $items, 0, 5 );
		Yii::app( )->user->setState( "collect_taobao_tmall_items", $items );
		if ( empty( $current_items ) )
		{
			$this->render( "/site/redirect_msg", array(
				"title" => "提示信息",
				"message" => "该分类天猫精选商品采集完成！",
				"jumpUrl" => array( "goods/index" ),
				"waitSecond" => 3
			) );
			Yii::app( )->end( );
		}
		$current_count = 0;
		$items_count = count( $items );
		foreach ( $current_items as $item )
		{
			$item['item_key'] = "taobao_".$item['num_iid'];
			if ( $this->_collect_insert( $item, Yii::app( )->user->getState( "collect_taobao_tmall_cid" ), "", FALSE ) )
			{
				$current_count += 1;
			}
		}
		$this->render( "/site/redirect_msg", array(
			"title" => "提示信息",
			"message" => "成功采集商品".$current_count."件，还剩{$items_count}件待处理，继续处理中……",
			"jumpUrl" => array( "collect/tmall_step4" ),
			"waitSecond" => 1,
			"loader" => TRUE
		) );
		Yii::app( )->end( );
	}

}

?>
