<?php
$backend = dirname( dirname( __FILE__ ) );
$frontend = dirname( $backend );
Yii::setpathofalias( "backend", $backend );
$frontendArray = require( $frontend."/config/main.php" );
unset( $frontendArray['components']['urlManager'] );
unset( $frontendArray['modules'] );
unset( $frontendArray['import'] );
$backendArray = array(
	"name" => "YiiPin",
	"basePath" => $frontend,
	"theme" => NULL,
	"controllerPath" => $backend."/controllers",
	"viewPath" => $backend."/views",
	"runtimePath" => $backend."/../runtime/backend",
	"modulePath" => $backend."/modules",
	"import" => array( "application.models.*", "application.components.*", "application.extensions.*", "backend.models.*", "backend.components.*", "backend.extensions.*", "backend.modules.rights.*", "backend.modules.rights.components.*" ),
	"modules" => array(
		"rights" => array( "install" => FALSE, "enableBizRule" => FALSE, "enableBizRuleData" => FALSE, "appLayout" => "backend.views.layouts.main", "userClass" => "Administrator" )
	),
	"components" => array(
		"format" => array( "class" => "Formatter" ),
		"authManager" => array( "class" => "RDbAuthManager", "itemTable" => "{{admin_authitem}}", "itemChildTable" => "{{admin_authitemchild}}", "assignmentTable" => "{{admin_authassignment}}", "rightsTable" => "{{admin_rights}}" ),
		"user" => array( "class" => "RWebUser", "allowAutoLogin" => TRUE, "loginUrl" => "admin.php", "guestName" => "游客" )
	)
);

$config = new CMap( $frontendArray );
$config->mergeWith( $backendArray );
$config = $config->toArray( );
unset( $config['onBeginRequest'] );
unset( $config['onEndRequest'] );
return $config;
?>
