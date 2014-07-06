<?php
if(!file_exists(dirname(__FILE__).'/protected/config/install.lock')) 
{
    header('Location: ./install/index.php');
    exit();
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
include dirname(__FILE__).'/protected/components/YiiPinWebApplication.php';
include dirname(__FILE__).'/protected/config/version.php';
Yii::createApplication('YiiPinWebApplication', $config)->run();
