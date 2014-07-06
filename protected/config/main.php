<?php
/**
 * @version $Id: main.php 4702 2013-01-28 05:51:47Z lonestone $
 */

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

if(class_exists('Yii')) Yii::setPathOfAlias('backend', dirname(__FILE__).'/../admin/');

/**
 * 定义TAOBAO_TOP常量
*/
define("TOP_SDK_WORK_DIR", dirname(__FILE__)."/../runtime/");
define("TOP_SDK_DEV_MODE", true);

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language' => 'zh_cn',
	'charset' => 'utf-8',
    'timeZone' => 'Asia/Chongqing',
	'defaultController'=>'Site',
	// preloading component
	'preload'=>array('log','session'),
	// autoloading model and component classes
    'theme'=>'default',
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/site/login'),
		),
		'db'=>require(dirname(__FILE__).'/database.php'), 
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
//         'config_cache'=>array(
//             'class'=>'CFileCache', 
//             'keyPrefix'=>'yiipin',
//         ),
        'config' => array(
         	'class' => 'application.extensions.EConfig',
         	'configTableName' => '{{config}}',
			'strictMode' => false,
            'autoCreateConfigTable'=>false,
	    ),
        'qqoauth' => array(
            'callback' => '/connect/qqcallback',
            'class' => 'application.components.QQOAuth',
         ),
        'log'=>!YII_DEBUG ? null : array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error',
                    'filter' => array(
                        'class' => 'CLogFilter',
                        'prefixSession' => true,
                        'prefixUser' => true,
                        'logUser' => true,
                        'logVars' => array('_GET', '_POST', '_SESSION', '_COOKIE'),
                    ),
                ),
                array('class'=>'CProfileLogRoute'),
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'), 
);
