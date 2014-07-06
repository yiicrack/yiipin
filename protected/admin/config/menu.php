<?php
include_once( dirname( __FILE__ )."/../../config/ucenter.php" );
return array(
	"商品" => array(
		"goods" => array(
			"name" => "商品管理",
			"submenu" => array(
				"商品列表" => $this->createUrl( "goods/index" ),
				"评论管理" => $this->createUrl( "shareComment/index" )
			)
		),
		"photo" => array(
			"name" => "图片",
			"submenu" => array(
				"图片列表" => $this->createUrl( "goods/image" )
			)
		),
		"shares" => array(
			"name" => "分享",
			"submenu" => array(
				"分享管理" => $this->createUrl( "share/index" )
			)
		),
		"groups" => array(
			"name" => "杂志",
			"submenu" => array(
				"杂志管理" => $this->createUrl( "group/index" )
			)
		),
		"category" => array(
			"name" => "分类",
			"submenu" => array(
				"商品分类" => $this->createUrl( "goodsCategory/index" ),
				"添加商品分类" => $this->createUrl( "goodsCategory/create" ),
				"杂志分类" => $this->createUrl( "groupCategory/index" ),
				"添加杂志分类" => $this->createUrl( "groupCategory/create" )
			)
		),
		"tag" => array(
			"name" => "标签",
			"submenu" => array(
				"标签列表" => $this->createUrl( "goodsTag/index" ),
				"添加标签" => $this->createUrl( "goodsTag/create" )
			)
		)
	),
	"淘宝客" => array(
		"shop" => array(
			"name" => "管理",
			"submenu" => array(
				"商品维护" => $this->createUrl( "goods/manage" )
			)
		),
		"collect" => array(
			"name" => "采集",
			"submenu" => array(
				"淘宝客商品采集" => $this->createUrl( "collect/taobao" ),
				"淘宝店铺商品采集" => $this->createUrl( "collect/shopgoods" ),
				"天猫精品库采集" => $this->createUrl( "collect/tmall" ),
				"淘宝客店铺采集" => $this->createUrl( "collect/shop" ),
				"用户马甲设置" => $this->createUrl( "collect/users" ),
				"评论采集设置" => $this->createUrl( "collect/comment" )
			)
		)
	),
	"好店" => array(
		"shop" => array(
			"name" => "好店管理",
			"submenu" => array(
				"好店列表" => $this->createUrl( "shop/index" ),
				"添加好店" => $this->createUrl( "shop/create" ),
				"分类管理" => $this->createUrl( "shopCategory/index" ),
				"添加分类" => $this->createUrl( "shopCategory/create" )
			)
		)
	),
	"试用" => array(
		"trial" => array(
			"name" => "试用管理",
			"submenu" => array(
				"试用商品管理" => $this->createUrl( "trial/index" ),
				"添加试用商品" => $this->createUrl( "trial/create" )
			)
		),
		"order" => array(
			"name" => "申请管理",
			"submenu" => array(
				"试用申请管理" => $this->createUrl( "trialOrder/index" )
			)
		)
	),
	"内容" => array(
		"slideshow" => array(
			"name" => "焦点图",
			"submenu" => array(
				"焦点图列表" => $this->createUrl( "slideshow/index" ),
				"添加焦点图" => $this->createUrl( "slideshow/create" )
			)
		),
		"ad" => array(
			"name" => "广告",
			"submenu" => array(
				"广告管理" => $this->createUrl( "advertise/index" ),
				"添加广告" => $this->createUrl( "advertise/create" ),
				"广告模板管理" => $this->createUrl( "advertiseTemplate/index" ),
				"添加广告模板" => $this->createUrl( "advertiseTemplate/create" ),
				"广告位管理" => $this->createUrl( "advertisePosition/index" ),
				"添加广告位" => $this->createUrl( "advertisePosition/create" )
			)
		),
		"flink" => array(
			"name" => "友情链接",
			"submenu" => array(
				"友情链接列表" => $this->createUrl( "flink/index" ),
				"添加友情链接" => $this->createUrl( "flink/create" )
			)
		),
		"help" => array(
			"name" => "帮助中心",
			"submenu" => array(
				"帮助信息列表" => $this->createUrl( "help/index" ),
				"添加帮助信息" => $this->createUrl( "help/create" )
			)
		)
	),
	"会员" => array(
		"user" => array(
			"name" => "会员管理",
			"submenu" => array(
				"会员管理" => $this->createUrl( "user/index" ),
				"标签管理" => $this->createUrl( "userTag/index" ),
				"系统消息管理" => $this->createUrl( "sysmsg/index" ),
				"发布系统消息" => $this->createUrl( "sysmsg/create" )
			)
		)
	),
	"积分" => array(
		"credit1" => array(
			"name" => "设置",
			"submenu" => array(
				"积分设置" => $this->createUrl( "creditSetting/index" ),
				"积分记录" => $this->createUrl( "creditLog/index" )
			)
		),
		"credit2" => array(
			"name" => "商品",
			"submenu" => array(
				"兑换分类" => $this->createUrl( "exchangeCategory/index" ),
				"添加分类" => $this->createUrl( "exchangeCategory/create" ),
				"兑换商品" => $this->createUrl( "exchangeGoods/index" ),
				"添加商品" => $this->createUrl( "exchangeGoods/create" )
			)
		),
		"credit3" => array(
			"name" => "订单",
			"submenu" => array(
				"兑换订单" => $this->createUrl( "exchangeOrder/index" )
			)
		)
	),
	"系统" => array(
		"collect" => array(
			"name" => "设置",
			"submenu" => array(
				"网站设置" => $this->createUrl( "settings/index" ),
				"首页设置" => $this->createUrl( "settings/frontpage" ),
				"广告联盟" => $this->createUrl( "settings/union" ),
				"第三方登录" => $this->createUrl( "settings/connect" ),
				"关注我们" => $this->createUrl( "settings/follow" ),
				"导航设置" => $this->createUrl( "navlink/index" ),
				"主题设置" => $this->createUrl( "theme/index" ),
				"云存储设置" => $this->createUrl( "settings/cloudstorage" )
			)
		),
		"database" => array(
			"name" => "数据库",
			"submenu" => array(
				"数据库备份" => $this->createUrl( "database/backup" ),
				"数据库恢复" => $this->createUrl( "database/restore" ),
				"数据库优化" => $this->createUrl( "database/optimize" ),
				"数据库升级" => $this->createUrl( "database/runquery" )
			)
		),
		"global" => array(
			"name" => "系统",
			"submenu" => array(
				"后台用户" => $this->createUrl( "administrator/index" ),
				"关于我们" => $this->createUrl( "about/index" ),
				"授权管理" => $this->createUrl( "/rights" ),
				"UCenter" => UC_API."/admin.php?m=user&a=ls&iframe=1",
				"环境信息" => $this->createUrl( "site/phpinfo" )
			)
		)
	)
);
?>
