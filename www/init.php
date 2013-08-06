<?php
require_once(dirname(__FILE__).'/protected/config/app.cfg.php');
require_once dirname(__FILE__).'/protected/includes/functions.inc.php';

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=getMainCfg();

if(TEST_SERVER_FLAG){
    // remove the following lines when in production mode
    define('YII_DEBUG',true);
    // specify how many levels of call stack should be shown in each log message
    define('YII_TRACE_LEVEL',3);
}else{
    define('YII_DEBUG',false);
}

require_once($yii);
$app=Yii::createWebApplication($config);

$ua = 'FORBIDDEN';
if(isset($_SERVER['HTTP_USER_AGENT'])) {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $ua = $ua.$_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
}

$lang = ''; // 'cn': chinese; 'ja': japanese; 'en': english
if(preg_match("/zh[_-]cn/i", $ua)){
     $lang = 'zh_cn';
}
$lang = 'dev';

$app->language = $lang;
