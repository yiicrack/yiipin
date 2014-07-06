<?php
class GoodsController extends Controller
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
				"actions" => array( "fetch", "create", "createGroup", "uploadPic" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index", array(
			"tag" => isset( $_GET['tag_id'] ) && $_GET['tag_id'] ? GoodsTag::model( )->findByPk( $_GET['tag_id'] ) : new GoodsTag( ),
			"itemCount" => Share::model( )->count( $this->getCriteria( ) )
		) );
	}

	public function actionCatalog( )
	{
		$category_id = $_GET['category_id'];
		if ( isset( $_GET['sub_category_id'] ) )
		{
			$category_id = $_GET['sub_category_id'];
		}
		$category = GoodsCategory::model( )->findByPk( $category_id );
		$key = "catalog_".$category_id."_keywords";
		$keywords = Yii::app( )->cache->get( $key );
		if ( $keywords === FALSE )
		{
			foreach ( $this->getTagGroup( $category ) as $group )
			{
				foreach ( $this->getTags( $category, $group ) as $tag )
				{
					//if ( get_class($tag) == 'GoodsTag' ) if ($tag->hasAttribute('name')) 
					$keywords[] = $tag->name;
				}

			}
			Yii::app( )->cache->set( $key, $keywords, CACHE_DURATION);
			//Yii::app( )->config->get( "cache_duration" ), new CFileCacheDependency( Yii::app( )->basePath."/config/cache.lock" ) );
		}
		$this->render( "catalog", array(
			"category" => $category,
			"tag" => isset( $_GET['tag_id'] ) && $_GET['tag_id'] ? GoodsTag::model( )->findByPk( $_GET['tag_id'] ) : new GoodsTag( ),
			"itemCount" => Share::model( )->count( $this->getCriteria( ) ),
			"keywords" => is_array($keywords) ? implode( ",", $keywords ) : ""
		) );
	}

	public function getHotTags( $limit )
	{
		return GoodsTag::model( )->findAll( array(
			"limit" => $limit,
			"order" => "goods_count DESC"
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
			$shares= Share::model( )->with( "goods", "from_group", "user", "comments" )->findAll( $criteria );
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
		$criteria = new CDbCriteria( );
		$criteria->select = "t.*";
		$criteria->order = "t.comment_count DESC";
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
			$criteria->order = "t.comment_count DESC";
		}
		$criteria->join = "JOIN {{goods_has_tag}} as ght ON t.goods_id = ght.goods_id JOIN {{goods}} g ON g.id = t.goods_id";
		if ( isset( $_GET['tag_id'] ) )
		{
			$criteria->compare( "ght.tag_id", $_GET['tag_id'] );
		}
		if ( isset( $_GET['category_id'] ) )
		{
			$ids[] = $_GET['category_id'];
			$categories = $this->getGoodsCategories( $_GET['category_id'] );
			foreach ( $categories as $category )
			{
				$ids[] = $category->id;
			}
			$criteria->addInCondition( "g.category_id", $ids );
		}
		if ( isset( $_GET['sub_category_id'] ) )
		{
			$criteria->compare( "g.category_id", $_GET['sub_category_id'] );
		}
		if ( isset( $_GET['type'] ) ) {
			if (isset( $_GET['tag_id'] ) || !isset( $_GET['category_id'] ) && $_GET['type'] == "day" )
			{
				$criteria->addCondition( "t.created > DATE_ADD(CURDATE(), INTERVAL -1 DAY)" );
			}
		}
		if ( isset( $_GET['type'] ) && $_GET['type'] == "week" )
		{
			$criteria->addCondition( "t.created > DATE_ADD(CURDATE(), INTERVAL -7 DAY)" );
		}
		if ( isset( $_GET['price'] ) && $_GET['price'] != "all" )
		{
			$prices = explode( "~", $_GET['price'] );
			$criteria->compare( "g.price", ">=".intval( $prices[0] ) );
			$criteria->compare( "g.price", "<=".intval( $prices[1] ) );
		}
		$criteria->group = "t.id";
		return $criteria;
	}

	public function actionFetch( )
	{
		if ( isset( $_REQUEST['url'] ) )
		{
			$url = urldecode( $_REQUEST['url'] );
			$item_collect = new ItemCollect( $url );
			if ( $item_collect->verify( ) )
			{
				$result = $item_collect->parse( );
				$this->render( "fetch", $result );
				Yii::app( )->end( );
			}
		}
		else if ( isset( $_REQUEST['picurl'] ) )
		{
			$url = urldecode( $_REQUEST['picurl'] );
			$location = $_REQUEST['location'];
			$ext = pathinfo( $url, PATHINFO_EXTENSION );
			$filename = time( ).rand( 1000, 9999 ).".".$ext;
			$dir = "/upload/photo/".date( "Ym" )."/";
			if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
			{
				FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
			}
			$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
			UtilHelper::getfile( $url, $full_filename, $location );
			$this->render( "uploadpic", array(
				"img" => $dir.$filename,
				"url" => $location
			) );
			Yii::app( )->end( );
		}
		echo "false";
	}

	public function getGroups( )
	{
		if ( !Yii::app( )->user->isGuest )
		{
			$name = Yii::app( )->user->name."喜欢的宝贝";
			$group = Group::model( )->findByAttributes( array(
				"user_id" => Yii::app( )->user->id,
				"name" => $name
			) );
			if ( $group === NULL )
			{
				$group = new Group( );
				$group->user_id = Yii::app( )->user->id;
				$group->name = $name;
				$group->save( FALSE );
			}
			return Group::model( )->findAllByAttributes( array(
				"user_id" => Yii::app( )->user->id
			), array( "order" => "id DESC" ) );
		}
	}

	public function actionCreate( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( isset( $_SESSION['last_share_time'] ) && $_SESSION['last_share_time'] && time( ) - 30 < $_SESSION['last_share_time'] )
			{
				echo json_encode( array( "result" => FALSE, "message" => "30秒内请勿重复提交" ) );
				Yii::app( )->end( );
			}
			if ( !empty( $_POST['item_key'] ) )
			{
				$model = Goods::model( )->findByAttributes( array(
					"item_key" => $_POST['item_key']
				) );
			}
			if ( !isset( $model ) && $model === NULL )
			{
				$model = new Goods( );
				$model->attributes = $_POST;
				$model->user_id = Yii::app( )->user->id;
				if ( empty( $_POST['price'] ) )
				{
					$model->price = 0;
				}
				if ( empty( $model->name ) )
				{
					$model->name = ModifierHelper::left( strip_tags( $_POST['quote'] ), 80, "..." );
				}
				$model->save( );
			}
			if ( $model->id )
			{
				$share = Share::model( )->findByAttributes( array(
					"goods_id" => $model->id,
					"group_id" => $_POST['group_id']
				) );
				if ($share === NULL) 
				{
					$share = new Share( );
					$share->goods_id = $model->id;
					$share->group_id = $_POST['group_id'];
					$share->quote = $_POST['quote'];
					$share->user_id = Yii::app( )->user->id;
					if ( $share->save( ) )
					{
						$_SESSION['last_share_time'] = time( );
						echo json_encode( array(
							"result" => TRUE,
							"url" => CHtml::normalizeurl( array(
								"/share/view",
								"id" => $share->id
							) )
						) );
					}
				}
				else
				{
					echo json_encode( array(
						"result" => FALSE,
						"message" => "该杂志中已经存在同样的分享了！"
					) );
				}
			}
			else
			{
				echo json_encode( array(
					"result" => FALSE,
					"message" => "发生了错误，请报告客服:".print_r( $model->errors, TRUE )
				) );
			}
		}
	}

	public function actionCreateGroup( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( !isset( $_POST['name'] ) )
			{
				return;
			}
			$name = trim( $_POST['name'] );
			$model = Group::model( )->findByAttributes( array(
				"name" => $name
			) );
			if ( $model !== NULL )
			{
				echo "false";
			}
			else
			{
				$model = new Group( );
				$model->name = $name;
				$model->category_id = isset( $_POST['category_id'] ) ? $_POST['category_id'] : 0;
				$model->user_id = Yii::app( )->user->id;
				if ( $model->save( FALSE ) )
				{
					echo $model->primaryKey;
				}
			}
		}
	}

	public function actionUploadPic( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$image = CUploadedFile::getinstancebyname( "attach" );
			if ( $image )
			{
				if ( 2097152 < $image->size )
				{
					echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /><script type=\"text/javascript\">alert(\"图片超过了允许的大小2MB\");</script>";
					Yii::app( )->end( );
				}
				if ( !in_array( strtolower( $image->extensionName ), array( "gif", "jpg", "jpeg", "png" ) ) )
				{
					echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /><script type=\"text/javascript\">alert(\"请上传标准图片文件, 我们支持gif,jpg,png和jpeg.\");</script>";
					Yii::app( )->end( );
				}
				$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
				$dir = "/upload/photo/".date( "Ym" )."/";
				if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
				{
					FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
				}
				$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
				if ( $image->saveAs( $full_filename ) )
				{
					$this->render( "uploadpic", array(
						"img" => $dir.$filename
					) );
				}
			}
		}
	}

	public function actionCollect( )
	{
		if ( !isset( $_POST['share_id'] ) )
		{
			return;
		}
		$share = Share::model( )->findByPk( $_POST['share_id'] );
		$this->renderPartial( "collect", array(
			"share" => $share
		) );
	}

	public function actionShare( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			if ( $_POST['group_id'] == $_POST['from_group_id'] )
			{
				echo json_encode( array( "result" => FALSE, "message" => "已经属于该杂志了" ) );
				Yii::app( )->end( );
			}
			$share = new Share( );
			$share->goods_id = $_POST['goods_id'];
			$share->group_id = $_POST['group_id'];
			$share->quote = $_POST['quote'];
			$share->user_id = Yii::app( )->user->id;
			$share->from_group_id = $_POST['from_group_id'];
			$share->from_user_id = $_POST['from_user_id'];
			if ( $share->save( ) )
			{
				echo json_encode( array(
					"result" => TRUE
				) );
			}
			else
			{
				echo json_encode( array(
					"result" => FALSE,
					"message" => "发生了错误，请报告客服:".print_r( $share->errors, TRUE )
				) );
			}
		}
	}


	public function actionCollect_comment( $share_id, $item_key, $seller_id )
	{
		if ( Yii::app( )->config->get( "comment_collect_on" ) === "false" )
		{
			Yii::app( )->end( );
		}
		if ( empty( $item_key ) )
		{
			Yii::app( )->end( );
		}
		$comment_collect_pagecount = intval( Yii::app( )->config->get( "comment_collect_pagecount" ) );
		$share = Share::model( )->findByPk( $share_id );
		if ( $share === NULL )
		{
			Yii::app( )->end( );
		}
		if ( time( ) - 86400 < $share->last_collect_time )
		{
			Yii::app( )->end( );
		}
		$share->last_collect_time = time( );
		$share->save( FALSE );
		$arr = explode( "_", trim( $item_key ) );
		if ( $arr[0] != "taobao" )
		{
			Yii::app( )->end( );
		}
		$itemId = $arr[1];
		if ( empty( $itemId ) )
		{
			Yii::app( )->end( );
		}
		$page = 1;
		if ( $seller_id === "0" )
		{
			$html = UtilHelper::getpage( "http://item.taobao.com/item.htm?id=".$itemId );
			if ( $html )
			{
				$pattern = "/userNumId=(\\d+?)&/i";
				preg_match( $pattern, $html, $matches );
				if ( isset( $matches[1] ) )
				{
					$seller_id = intval( $matches[1] );
				}
			}
		}
		$list_detail_rate = "http://rate.tmall.com/list_detail_rate.htm?sellerId=%s&itemId=%s&currentPage=%s&ismore=1&order=1";
		$feedRateList = "http://rate.taobao.com/feedRateList.htm?userNumId=%s&auctionNumId=%s&currentPageNum=%s&showContent=1&orderType=feedbackdate";
		$data = $this->getdata( sprintf( $list_detail_rate, $seller_id, $itemId, $page ) );
		$data = $data['rateDetail'];
		if ( is_array( $data ) )
		{
			$maxPage = intval( $data['paginator']['lastPage'] );
			$maxPage = $comment_collect_pagecount < $maxPage ? $comment_collect_pagecount : $maxPage;
			if ( 1 <= $maxPage )
			{
				if ( 0 < count( $data['rateList'] ) )
				{
					foreach ( $data['rateList'] as $comment )
					{
						$this->insertComment( $share_id, array(
								"id" => "tmall_".$comment['id'],
								"content" => $comment['rateContent'],
								"nick" => $comment['displayUserNick'],
								"created" => $comment['rateDate']
						) );
					}
				}
				$page = 2;
				for ( ;	$page <= $maxPage;	++$page	)
				{
					$data = $this->getdata( sprintf( $list_detail_rate, $seller_id, $itemId, $page ) );
					$data = $data['rateDetail'];
					if ( !is_array( $data ) && !( 0 < count( $data['rateList'] ) ) )
					{
						foreach ( $data['rateList'] as $comment )
						{
							$this->insertComment( $share_id, array(
									"id" => "tmall_".$comment['id'],
									"content" => $comment['rateContent'],
									"nick" => $comment['displayUserNick'],
									"created" => $comment['rateDate']
							) );
						}
					}
				}
				Yii::app( )->end( );
			}
		}
		$data = $this->getdata( sprintf( $feedRateList, $seller_id, $itemId, $page ), "taobao" );
		if ( is_array( $data ) )
		{
			$maxPage = intval( $data['maxPage'] );
			$maxPage = $comment_collect_pagecount < $maxPage ? $comment_collect_pagecount : $maxPage;
			if ( 1 <= $maxPage )
			{
				if ( 0 < count( $data['comments'] ) )
				{
					foreach ( $data['comments'] as $comment )
					{
						$this->insertComment( $share_id, array(
								"id" => "taobao_".$comment['rateId'],
								"content" => $comment['content'],
								"nick" => $comment['user']['nick'],
								"created" => str_replace( ".", "-", $comment['date'] )
						) );
					}
				}
				$page = 2;
				for ( ;	$page <= $maxPage;	++$page	)
				{
					$data = $this->getdata( sprintf( $feedRateList, $seller_id, $itemId, $page ), "taobao" );
					if ( !is_array( $data ) && !( 0 < count( $data['comments'] ) ) )
					{
						foreach ( $data['comments'] as $comment )
						{
							$this->insertComment( $share_id, array(
									"id" => "taobao_".$comment['rateId'],
									"content" => $comment['content'],
									"nick" => $comment['user']['nick'],
									"created" => str_replace( ".", "-", $comment['date'] )
							) );
						}
					}
				}
				Yii::app( )->end( );
			}
		}
	}
	
	private function getdata( $id, $type = "" )
	{
		$data = UtilHelper::getpage( $id );
		$data = trim( trim( $data ), "()" );
		if ( $type != "taobao" )
		{
			$data = "{".$data."}";
		}
		$data = CJSON::decode( $data );
		return $data;
	}
	
	private function insertComment( $share_id, $data )
	{
		if ( strpos( $data['content'], "没有填写" ) === FALSE && strpos( $data['content'], "未及时做出评价" ) === FALSE )
		{
			if ( mb_strlen( $data['content'], "UTF-8" ) < intval( Yii::app( )->config->get( "comment_collect_minlength" ) ) )
			{
				return;
			}
			$comment = ShareComment::model( )->findByAttributes( array(
					"collect_id" => $data['id']."_".$share_id
			) );
			if ( $comment === NULL )
			{
				$comment = new ShareComment( );
				$user = $this->_getUser( $data );
				$comment->user_id = $user->id;
				$comment->username = $user->username;
				$comment->share_id = $share_id;
				$comment->content = $data['content'];
				$comment->created = $data['created'];
				$comment->collect_id = $data['id']."_".$share_id;
				if ( !$comment->save( ) )
				{
					throw new CException( "评论采集保存失败：".print_r( $data, TRUE ).print_r( $comment->errors, TRUE ) );
				}
			}
		}
	}
	
	private function _getUser( $data )
	{
		$usernames = explode( ",", Yii::app( )->config->get( "collect_comment_users" ) );
		if ( Yii::app( )->config->get( "comment_auto_register" ) == "1" && count( $usernames ) < 100 )
		{
			$username = $data['nick'];
			if ( strpos( $username, "*" ) !== FALSE )
			{
				$username = "tb_".rand( 10000, 99999 );
			}
			$user = User::model( )->findByAttributes( array(
					"username" => $username
			) );
			if ( $user === NULL )
			{
				Yii::import( "application.vendors.*" );
				include_once( "ucenter.php" );
				if ( strtolower( Yii::app( )->charset ) != strtolower( UC_CHARSET ) )
				{
					$username = mb_convert_encoding( $username, UC_CHARSET, "UTF-8" );
				}
				$email = time( ).rand( 10, 99 )."@qq.com";
				$password = "123456";
				//uc_client/client.php uc_user_register
				$uid = uc_user_register( $username, $password, $email );
				if ( 0 < $uid )
				{
					$model = new User( );
					$model->username = $username;
					$model->email = $email;
					$model->gender = "女";
					$model->password = md5( $password );
					$model->id = $uid;
					$model->active = 1;
					if ( $model->save( ) )
					{
						$usernames[] = $username;
						$usernames = array_unique( $usernames );
						Yii::app( )->config->set( "collect_comment_users", implode( ",", $usernames ) );
					}
				}
			}
		}
		$index = rand( 0, count( $usernames ) - 1 );
		$user = User::model( )->findByAttributes( array(
				"username" => $usernames[$index]
		) );
		if ( $user !== NULL )
		{
			return $user;
		}
		throw new CException( "用户马甲：".$usernames[$index]." 不存在！请重新设置" );
	}
}

?>
