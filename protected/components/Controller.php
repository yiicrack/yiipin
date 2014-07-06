<?php
class Controller extends CController
{

	public $layout = "//layouts/main";
	public $keywords = "";
	public $description = "";
	public $menu = array( );
	public $breadcrumbs = array( );
	
	protected function beforeAction( $action )
	{
		if ( !YII_DEBUG )
		{
			Yii::app( )->db->schemaCachingDuration = 86400;
		}

		if ( isset( $this->pageSize ) )
		{
			$this->pageSize = intval( Yii::app( )->config->get( "masonry_pagesize" ) );
		}
		if ( isset( $this->frameSize ) )
		{
			$this->frameSize = intval( Yii::app( )->config->get( "masonry_framesize" ) );
		}
		if ( empty( $this->keywords ) )
		{
			$this->keywords = Yii::app( )->config->get( "keywords" );
		}
		if ( empty( $this->description ) )
		{
			$this->description = Yii::app( )->config->get( "description" );
		}
		if ( Yii::app( )->config->get( "site_off" ) == "1" )
		{
			echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n<title>本站例行维护，暂时停止服务，请稍后回来……</title>\r\n</head>\r\n\r\n<body>\r\n本站例行维护，暂时停止服务，请稍后回来……\r\n</body>\r\n</html>";
			Yii::app( )->end( );
		}
		$taobao_appkey = Yii::app( )->config->get( "taobao_appkey" );
		$taobao_appsecret = Yii::app( )->config->get( "taobao_appsecret" );
		$timestamp = time( )."000";
		$message = $taobao_appsecret."app_key".$taobao_appkey."timestamp".$timestamp.$taobao_appsecret;
		$sign = strtoupper( hash_hmac( "md5", $message, $taobao_appsecret ) );
		Yii::app( )->request->cookies['timestamp'] = new CHttpCookie( "timestamp", $timestamp );
		Yii::app( )->request->cookies['sign'] = new CHttpCookie( "sign", $sign );
		if ( $action->id != "js" )
		{
			Yii::app( )->clientScript->registerScriptFile( "http://a.tbcdn.cn/apps/top/x/sdk.js?appkey=".Yii::app( )->config->get( "taobao_appkey" ), CClientScript::POS_HEAD );
		}
		defined('URL_PREFIX') or define( "URL_PREFIX", Yii::app( )->baseUrl );
		defined('CACHE_DURATION') or define( "CACHE_DURATION", intval( Yii::app( )->config->get( "cache_duration" ) ) );
		defined('THEME_DIR') or define( "THEME_DIR", Yii::app( )->theme->baseUrl );
		if ( Yii::app( )->theme !== NULL )
		{
			$behavior = Yii::app( )->theme->basePath."/behaviors/ThemeBehavior.php";
			if ( file_exists( $behavior ) )
			{
				include_once( $behavior );
				$this->attachBehavior( "themeBehavior", "ThemeBehavior" );
			}
		}
		Yii::app( )->clientScript->registerCoreScript( "jquery" );
		Yii::app( )->clientScript->registerCoreScript( "jquery.ui" );
		Yii::app( )->clientScript->registerScriptFile( THEME_DIR."/js/jquery.yiipin.js?t=".Yii::app( )->theme->name, CClientScript::POS_END );
		$js_config = array(
			"domain" => Yii::app( )->request->getHostInfo( ),
			"appname" => Yii::app( )->name,
			"timestamp" => ( boolean )time( ),
			"urls" => array(
				"check_logins_tatus" => $this->createUrl( "/site/checkLoginStatus" ),
				"goods_create_group" => $this->createUrl( "/goods/createGroup" ),
				"good_view_width_id" => $this->createUrl( "/group/view" )."?id=",
				"site_checkmsg" => $this->createUrl( "site/checkmsg" ),
				"site_setallmsgread" => $this->createUrl( "site/setallmsgread" ),
				"home_checknewshares" => $this->createUrl( "home/checknewshares" ),
				"goods_fetch" => $this->createUrl( "/goods/fetch" ),
				"site_ajaxlogin" => $this->createUrl( "/site/ajaxLogin" ),
				"site_loginstatus" => $this->createUrl( "/site/loginStatus" ),
				"group_follow" => $this->createUrl( "/group/follow" ),
				"share_comment" => $this->createUrl( "/share/comment" ),
				"person_comment" => $this->createUrl( "/person/comment" ),
				"group_like" => $this->createUrl( "/group/like" ),
				"goods_collect" => $this->createUrl( "/goods/collect" ),
				"person_deleteshare" => $this->createUrl( "/person/deleteShare" ),
				"misc_act_follow" => $this->createUrl( "/misc/act_follow" ),
				"misc_delsysmsg" => $this->createUrl( "/misc/delsysmsg" ),
				"misc_sendpm" => $this->createUrl( "/misc/sendpm" )
			)
		);
		$js = "Yiipin.config=".CJSON::encode( $js_config ).";\n";
		$js .= "Yiipin.userLogin = ".( Yii::app( )->user->isGuest ? "false" : "true" ).";\n";
		Yii::app( )->clientScript->registerScript( "js_config", $js );
		Yii::app( )->user->setState( "liked_data", NULL );
		return parent::beforeaction( $action );
	}

	public function getGroupCategories( )
	{
		return GroupCategory::model( )->findAll( array( "order" => "sortnum ASC" ) );
	}

	public function getGoodsCategories( $parent_id = 0 )
	{
		return GoodsCategory::model( )->findAllByAttributes( array(
			"parent_id" => $parent_id
		), array( "order" => "sortnum ASC" ) );
	}

	public function getHotGroups( $limit )
	{
		return Group::model( )->hasCache( )->with( "user" )->findAll( array(
			"order" => "t.share_count DESC",
			"limit" => $limit
		) );
	}

	public function getFlinks( $category = "", $limit = 0, $type = "" )
	{
		$criteria = new CDbCriteria( );
		if ( $category != "" )
		{
			$criteria->compare( "category", $category );
		}
		if ( $type != "" )
		{
			if ( $type == "image" )
			{
				$criteria->addCondition( "(image IS NOT NULL AND image <> '') OR (remote_image IS NOT NULL AND remote_image <> '')" );
			}
			else if ( $type == "text" )
			{
				$criteria->addCondition( "(image IS NULL OR image = '') AND (remote_image IS NULL OR remote_image = '')" );
			}
		}
		$criteria->compare( "enabled", 1 );
		if ( 0 < $limit )
		{
			$criteria->limit = $limit;
		}
		return Flink::model( )->findAll( $criteria );
	}

	public function getAbouts( )
	{
		return About::model( )->findAll( array( "order" => "id ASC" ) );
	}

	public function getUserTags( )
	{
		return UserTag::model( )->findAllByAttributes( array( "user_id" => 0 ), array( "order" => "id ASC" ) );
	}

	public function getTagGroup( $category )
	{
		return explode( "\r\n", $category->tag_groups );
	}

	public function getTags( $category, $group )
	{
		$has_tagsg = GoodsCategoryHasTag::model( )->findAllByAttributes( array(
			"category_id" => $category->id,
			"group" => $group
		), array( "order" => "sortnum ASC" ) );
		$tags = array( );
		foreach ( $has_tagsg as $tag )
		{
			$tags[] = $tag->tag;
		}
		return $tags;
	}

	public function getNavlinks( )
	{
		return Navlink::model( )->findAll( array( "order" => "sortnum DESC" ) );
	}

	public function renderPartial( $view, $data = NULL, $return = FALSE, $processOutput = FALSE )
	{
		$html = parent::renderpartial( $view, $data, TRUE, $processOutput );
		$html = $this->processTokens( $html );
		if ( $return )
		{
			return $html;
		}
		echo $html;
	}
}

?>
