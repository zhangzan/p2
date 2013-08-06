<?php

class QApplication {

	protected function __construct() {
		
	}

	private static $instance;

	/** @return QApplication */
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self ();
		}
		return self::$instance;
	}

	public $controller;
	public $user_id;

	public function app_die($msg = null) {
		define("APP_DIE_FLAG",1);
		if(TEST_SERVER_FLAG){
			throw new CException();
		}
		
		$this->errorlog();
		if ($this->controller) {
			$this->controller->error();
		} else {
			die();
		}
	}

	public function errorlog() {
		$url = dirname(__FILE__) . '/../../../data/error_log/';
		$filename = "";
		$s = "record_time:" . date("Y-m-d H:i:s", getTime()) . "\n";
		if ($this->user_id) {
			$s.="UserId:" . $this->user_id . "\n";
		}
		$s.="URL:" . $_SERVER['REQUEST_URI'] . "\n";
		$s.="GET:" . var_export($_GET, true) . "\n";
		$s.="POST:" . var_export($_POST, true) . "\n";
		$s.="COOKIE:" . var_export($_COOKIE, true) . "\n";
		foreach (debug_backtrace(false) as $k => $v) {
			$args = array();
			if ($k == 2) {
				$path_parts = pathinfo($v["file"]);
				$filename = $path_parts["filename"] . "-" . $v["line"];
			}
			$s.="#$k " . $v["function"] . "(" . implode(",", $args) . ") called at [" . $v["file"] . ":" . $v["line"] . "]";
			$s.="\n";
		}
		$s.="\n";
		if (!is_dir($url)) {
			@mkdir($url);
		}
		if ($filename) {
			@file_put_contents($url . $filename, $s, FILE_APPEND);
		}
	}

}

function app_die($msg = null) {
	QApplication::getInstance()->app_die($msg);
}

function dump($object, $level = 0) {
	$rgbVal = 255 - max(128 + $level * 16, 0);
	$nodeBgColor = sprintf("rgb(%s, %s, %s)", $rgbVal, $rgbVal, $rgbVal);
	echo "<meta charset='utf-8' />";
	echo '<div style="width:auto; height:auto; font-family:Tahoma; font-size:11px">';

	if (is_array($object) || is_object($object)) {
		if ($level == 0 && is_array($object))
			echo '<b>Array (' . count($object) . ')</b><br/><br>';
		if (is_object($object))
			echo '<div style="font-size:15px">object(' . get_class($object) . ')</div>';
		echo '<table ' . (($level == 0) ? 'style="border:#999999 solid 1px"' : '') . ' cellspacing="0" cellpadding="0">';
		$dataIndex = 0;
		$dataCount = count($object);
		foreach ($object as $item => $n) {
			$randID = "dataContainer" . mt_rand(0, 1000000);

			echo '<tr style="vertical-align:top; overflow:hidden; height:20px"><td style="text-align:right; background-color:' . $nodeBgColor . '; color:#EEEEEE; border-bottom:#CCCCCC solid 1px; padding-left:5px; padding-right:2px; padding-top:2px';
			echo (is_array($n) || is_object($n)) ? '; cursor:pointer" collapsed="false" prevHTML="" onclick="if (this.attributes.collapsed.value != \'true\'){ this.attributes.prevHTML.value = this.ownerDocument.getElementById(\'' . $randID . '\').innerHTML; this.ownerDocument.getElementById(\'' . $randID . '\').innerHTML = \'...\'; this.attributes.collapsed.value = \'true\' } else { this.ownerDocument.getElementById(\'' . $randID . '\').innerHTML = this.attributes.prevHTML.value; this.attributes.collapsed.value = \'false\' }">' : '">';
			echo '<b>' . $item . '</b></td></td><td style="' . (($dataIndex < $dataCount - 1) ? 'border-bottom:#CCCCCC solid 1px; ' : ' ') . 'height:20px; padding-left:5px; padding-right:2px; padding-top:2px" id="' . $randID . '">';
			if (is_array($n) || is_object($n)) {
				//if(is_object ( $n )){
				//	echo 'object('.get_class($n).')';
				//}
				dump($n, $level + 1);
			} else {
				echo gettype($n) . '&nbsp;&nbsp;';
				echo "<font style='color:red;'>'" . $n . "'</font>";
			}
			echo '</td></tr>';

			$dataIndex++;
		}
		echo '</table></div>';
	} else {
		echo $object . "</div>";
	}
}

/**
 *  @return KDatabaseAccess
 */
function select_dba() {
	return KDatabase::select_dba();
}

//$time=getTime();得到当前时间,允许缓存
//$time=getTime();得到当前时间,不允许缓存
//$time=getTime('2010-1-1'); 等同于 strtotime
function getTime($refresh = false) {
	if ($refresh !== true && $refresh !== false) {
		return strtotime($refresh);
	}
	if (!defined("CUR_TIME") || $refresh) {
		$dba = select_dba();
		//sql 结果为字符串型，在js中做数学运算会出问题
		$t = (int)$dba->select_one("select unix_timestamp()");
		if (!defined("CUR_TIME")) {
			define("CUR_TIME", $t);
		}
		return $t;
	}
	return CUR_TIME;
}

//$time=getDay();得到当前日期,允许缓存
//$time=getDay();得到当前日期,不允许缓存
//$time=getTime($timestamp); 等同于 strtotime(date("Y-m-d",$timestamp))
function getDay($refresh = false) {
	if ($refresh === true || $refresh === false) {
		return strtotime(date("Y-m-d", getTime($refresh)));
	} else {
		return strtotime(date("Y-m-d", $refresh));
	}
}

function rd() {
	return mt_rand() / (mt_getrandmax() + 1);
}

function getRand($arr, $key = null, $all_rate = null) {
	if ($key === null) {//随机取一个
		if(count($arr)==0){
			app_die();
		}
		$tmp_key = intval(rd() * count($arr));
		while (!isset($arr[$tmp_key])) {
			$tmp_key = intval(rd() * count($arr));
		}
		return $arr[$tmp_key];
	}elseif(is_array($key)){//随机取N个
		shuffle($key);
		return array_slice($key, 0, $arr);
	}
	$sum = 0;
	foreach ($arr as $row) {
		$sum+=$row[$key];
	}
	if ($all_rate !== null) {
		if ($all_rate < $sum) {
			app_die();
		}
		$sum = $all_rate;
	}
	$rand = rd() * $sum;
	foreach ($arr as $row) {
		$rand-=$row[$key];
		if ($rand <= 0) {
			return $row;
		}
	}
	return false;
}

class MSCallback {

	var $param;

	function __construct($param) {
		$this->param = $param;
	}

	private static function text2html($s) {
		return preg_replace_callback("{MB6o2t62u2|[\\r\\n\\t\\>\\<\\ \\\"\\'\\&]}su", "text2html_replace", $s);
	}

	public function func($row) {
		$s = $row[0];
		$name = substr($s, 1, strlen($s) - 2);
		$encode = false;
		if (substr($name, 0, 1) == ":") {
			$encode = true;
			$name = substr($name, 1);
		}
		$data = $name == "?" ? $this->param : $this->param[$name];
		return $encode ? self::text2html($data) : $data;
	}

}

function h($s) {
	return text2html($s);
}

function text2html_replace($ch) {
	$map = array("MB6o2t62u2" => "&#x", "\r" => "", "\n" => "<br/>", " " => "&nbsp;", "\t" => "&nbsp;&nbsp;&nbsp;&nbsp;", "<" => "&lt;", ">" => "&gt;", "\"" => "&quot;", "'" => "&#039;", "&" => "&amp;");
	return $map[$ch[0]];
}

function text2html($s) {
	return preg_replace_callback("{MB6o2t62u2|[\\r\\n\\t\\>\\<\\ \\\"\\'\\&]}su", "text2html_replace", $s);
}

function ms($tmpl, $param) {
	$callback = new MSCallback($param);
	return preg_replace_callback("{\\{\\:?[A-Za-z0-9_\\?]+\\}}u", array($callback, "func"), $tmpl);
}

function utf8_substr($s, $offset, $length) {
	return $s === "" ? "" : iconv_substr($s, $offset, $length, "utf-8");
}

function j($s) {
	return json_encode($s);
}

function cp($src, $columns, &$dest = array()) {
	foreach ($columns as $column) {
		if (is_array($src)) {
			$dest[$column] = $src[$column];
		} else if (is_object($src)) {
			$dest[$column] = $src->$column;
		} else {
			die("cp:src type error");
		}
	}
	return $dest;
}

function mkmap($arr, $key, $no_val = false) {
	$map = array();
	foreach ($arr as $row) {
		if (isset($map[$row[$key]])) {
			app_die();
		}
		$map[$row[$key]] = $no_val ? 1 : $row;
	}
	return $map;
}

function formatNumber($num) {
	if (!preg_match('/^(-)?\d+$/iu', $num)) {
		return $num;
	}
	$is_down_0 = ($num < 0);
	if ($is_down_0) {
		$num = substr($num, 1);
	}
	$s = array();
	$len = strlen($num);
	for ($i = 0; $i < $len; $i++) {
		if ($i % 3 == 0) {
			array_unshift($s, ",");
		}
		array_unshift($s, substr($num, $len - $i - 1, 1));
	}

	array_pop($s);
	if ($is_down_0) {
		array_unshift($s, "-");
	}
	return implode("", $s);
}

//格式化时间
function formatTime($t, $format) {
	$t = floor($t);
	$t < 0 && ($t = 0);
	$msg = array(
		0 => array("dev" => "刚才", "zh_cn" => "刚才", "ja" => "今", "zh_tw" => "刚才", "en" => "刚才"),
		1 => array("dev" => "天", "zh_cn" => "天", "ja" => "日", "zh_tw" => "天", "en" => "天"),
		2 => array("dev" => "小时", "zh_cn" => "小时", "ja" => "時間", "zh_tw" => "小时", "en" => "小时"),
		3 => array("dev" => "分钟", "zh_cn" => "分钟", "ja" => "分", "zh_tw" => "分钟", "en" => "分钟"),
		4 => array("dev" => "秒", "zh_cn" => "秒", "ja" => "秒", "zh_tw" => "秒", "en" => "秒"),
		5 => array("dev" => "分钟前", "zh_cn" => "分钟前", "ja" => "分前", "zh_tw" => "分钟前", "en" => "分钟前"),
		6 => array("dev" => "天前", "zh_cn" => "天前", "ja" => "日前", "zh_tw" => "天前", "en" => "天前"),
	);
	if ($format == 2) {//00:00
		return sprintf("%02d", $t / 60) . ":" . sprintf("%02d", $t % 60);
	} else if ($format == 3) {//00:00:00
		return sprintf("%02d", $t / 3600) . ":" . sprintf("%02d", $t / 60 % 60) . ":" . sprintf("%02d", $t % 60);
	} else if ($format == 4) {
		return $t < 60 ? $msg[0][Yii::app()->language] : ($t < 3600 ? floor($t / 60) . $msg[5][Yii::app()->language] : ($t < 86400 ? floor($t / 3600) . $msg[2][Yii::app()->language] . floor($t / 60 % 60) . $msg[5][Yii::app()->language] : floor($t / 86400) . $msg[6][Yii::app()->language]));
	} else if ($format == 5) {
		return $t <= 0 ? "0" . $msg[3][Yii::app()->language] : ($t < 60 ? $t . $msg[4][Yii::app()->language] : ($t < 3600 ? floor($t / 60) . $msg[3][Yii::app()->language] : ($t < 86400 ? floor($t / 3600) . $msg[2][Yii::app()->language] . floor($t / 60 % 60) . $msg[3][Yii::app()->language] : floor($t / 86400) . $msg[1][Yii::app()->language])));
	} else if ($format == 6) {
		return $t <= 0 ? "0" . $msg[3][Yii::app()->language] : ($t < 60 ? $t . $msg[4][Yii::app()->language] : ($t < 3600 ? floor($t / 60) . $msg[3][Yii::app()->language] : ($t < 86400 ? floor($t / 3600) . $msg[2][Yii::app()->language] . floor($t / 60 % 60) . $msg[3][Yii::app()->language] : floor($t / 86400) . $msg[1][Yii::app()->language] . floor($t % 86400 / 3600) . $msg[2][Yii::app()->language] . floor($t / 60 % 60) . $msg[3][Yii::app()->language])));
	} else {
		die("BUG");
	}
}

function getMainCfg() {
	require_once(dirname(__FILE__) . '/../config/app.cfg.php');
	require_once(dirname(__FILE__) . '/../config/constant.cfg.php');
	return array(
		'basePath' => dirname(__FILE__) . '/..',
		'name' => '上海新世纪机器人有限公司',
		//set default Controller
		'defaultController' => 'Main',
		// preloading 'log' component
		'preload' => array('log'),
		// autoloading model and component classes
		'import' => array(
			'application.models.*',
			'application.components.*',
		),
		'modules' => array(
		),
		// application components
		'components' => array(
			'user'=>array(
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
			),
			// uncomment the following to enable URLs in path-format
			'urlManager' => array(
				'urlFormat' => 'path', 
				'showScriptName'=>false,
				 'urlSuffix'=>'.html',
				 'rules'=>array(
              '<controller:\w+>/<id:\d+>'=>'<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
              '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
			),
            /*
			'cache' => array(
				'class' => 'CMemCache',
				'servers'=>array(
						array('host'=>MEMCACHED_SERVER,'port'=>MEMCACHED_SERVER_PORT,'weight'=>100),
				),
			),
            */
			// uncomment the following to use a MySQL database
			'db' => array(
				'class' => 'CDbConnection',
				'connectionString' => 'mysql:host=' . MYSQL_SERVER . ';port=' . MYSQL_SERVER_PORT . ';dbname=' . MYSQL_DATABASE . ';charset=utf8',
				'username' => MYSQL_USERNAME,
				'password' => MYSQL_PASSWORD,
				'emulatePrepare' => true,
				'schemaCachingDuration' => 0,
				'charset' => 'utf8',
			),
			'errorHandler' => array(
				// use 'site/error' action to display errors
				'errorAction' => 'site/error',
			),
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning',
					),
				// uncomment the following to show log messages on web pages
				/*
				  array(
				  'class'=>'CWebLogRoute',
				  ),
				 */
				),
			),
		),
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params' => array(
			// this is used in contact page
			'adminEmail' => 'webmaster@example.com',
		),
	);
}

function getConsoleCfg() {
	require_once(dirname(__FILE__) . '/../config/app.cfg.php');
	require_once(dirname(__FILE__) . '/../config/constant.cfg.php');
	return array(
		'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
		'name' => 'Origin',
		'preload' => array('log'),
		// autoloading model and component classes
		'import' => array(
			'application.models.*',
			'application.components.*',
			'application.extensions.*',
		),
		// application components
		'components' => array(
			// uncomment the following to use a MySQL database
            /*
			'cache' => array(
				'class' => 'CMemCache',
				'servers'=>array(
						array('host'=>MEMCACHED_SERVER,'port'=>MEMCACHED_SERVER_PORT,'weight'=>100),
				),
			),
            */
			'db' => array(
				'class' => 'CDbConnection',
				'connectionString' => 'mysql:host=' . MYSQL_SERVER . ';port=' . MYSQL_SERVER_PORT . ';dbname=' . MYSQL_DATABASE . ';charset=utf8',
				'username' => MYSQL_USERNAME,
				'password' => MYSQL_PASSWORD,
				'emulatePrepare' => true,
				'schemaCachingDuration' => 0,
				'charset' => 'utf8',
			),
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error,warning',
					),
				// uncomment the following to show log messages on web pages
				//array(
				//    'class'=>'CWebLogRoute',
				//),
				),
			),
		),
	);
}

function doPager($list, $page, $page_size, $require_all = false) {
	$item_count = count($list);
	if($page_size==0){
		return $item_count;
	}
	$page_count = ceil($item_count / $page_size);
	if ($page_count == 0) {
		$page = 0;
	} elseif ($page > $page_count) {
		$page = $page_count;
	} elseif($page == 0){
		app_die();
	}
	if($page>0){
		list($offset,$length) = $require_all?array(0,$page*$page_size):array(($page-1) * $page_size,$page_size);
		$data=array_slice($list,$offset,$length);
	}else{
		$data=array();
	}	
	return array("item_count" => $item_count, "page" => $page, "page_count" => $page_count, "data" => $data);
}

/**
 * [in]
 * val 当前值
 * per_val 每周期增加
 * max_val 最大值
 * val_update_time 上次刷新时间
 * val_update_interval 刷新周期
 * [out]
 * refresh 是否刷新
 * val_remain_time 剩余时间
 * 
 * $type 
 * 增加 , 减少 , 刷新 
 *  2  ,  4  ,  6  整点
 *  1  ,  3  ,  5  普通
 * @param unknown_type $data
 * @param unknown_type $type
 */
function setTimerInfo($data, $type) {

	$t = getTime (); // 当前时间
	if ($type == 2 || $type == 4 || $type == 6 || $type == 7) {
		$base_time = strtotime ( "2000-01-01" ); // 一天开始的标准时间
	} else {
		$base_time = $data ['val_update_time'];
	}
	if ($type == 1 || $type == 2 || $type == 7) { // 增加, 增加+整点, 增加+整点+倒计时不停止
		$val_update_time = $t - ($t - $base_time) % $data ["val_update_interval"]; // 上一个可以领取薪水的时间时间点
		$val = min ( $data ["max_val"], $data ["val"] + floor ( $data ["per_val"] * ($val_update_time - $data ['val_update_time']) / $data ["val_update_interval"] ) );
		$data ['val_update_time'] = (($val == $data ["max_val"] && $type == 1) ? $t : $val_update_time);
		$data ['val'] = $val;
		$data ['val_remain_time'] = (($val == $data ["max_val"] && $type != 7) ? 0 : ($val_update_time + $data ["val_update_interval"] - $t));
	} elseif ($type == 3 || $type == 4) { // 减少, 减少+整点
		$val_update_time = $t - ($t - $base_time) % $data ["val_update_interval"]; // 上一个可以领取薪水的时间时间点
		$val = max ( 0, $data ["val"] - floor ( $data ["per_val"] * ($val_update_time - $data ['val_update_time']) / $data ["val_update_interval"] ) );
		$data ['val_update_time'] = (($val == 0 && $type == 3) ? $t : $val_update_time);
		$data ['val'] = $val;
		$data ['val_remain_time'] = ($val == 0 ? 0 : ($val_update_time + $data ["val_update_interval"] - $t));
	} elseif ($type == 5 || $type == 6) { // 刷新, 刷新+整点
		$val_update_time = $t - ($t - $base_time) % $data ["val_update_interval"]; // 上一个可以领取薪水的时间时间点
		$data ['refresh'] = ($val_update_time > $data ['val_update_time']) ? 1 : 0;
		$data ['val_update_time'] = $val_update_time;
		$data ['val_remain_time'] = $val_update_time + $data ["val_update_interval"] - $t;
	} else {
		app_die ();
	}
	return $data;
}


function check_sig(){
	if(!isset($_GET["ct"])){
		return array(CT_IOS_GOO);
	}elseif(in_array($_GET["ct"],array(CT_IOS_QU))){
		$ct=CT_IOS_QU;
	}else{
		app_die();
	}
	if($ct==CT_IOS_QU){
		if(!isset($_GET["sig"])||!isset($_GET["uuid"])){
			app_die();
		}
		$arr = $_GET;	
		$sig = $arr ['sig'];
		unset($arr ['sig']);	
		$s = "";
		$keys = array_keys ( $arr );
		sort ( $keys , SORT_STRING );
		foreach ($keys as $k ) {
			$s .= $k;
			$s .= $arr [$k];
		}
		$s .= APPLE_ITUNES_PAYMENT_SIGNATURE;
		if (md5 ( $s ) != $sig) {
			app_die ();
		}
		//TODO check uuid in memcache
		//TODO save  uuid to memcache
	}
	return array($ct);
}


define('ROOT_PATH',dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR);



/*上传文件到指定的目录下
 * $folder要上传的路径
 * $file 要上传的文件
 * */
function uploadFile($folder,$file){
	//当前年月日，每天的目录
	$date = date("Y_m_d",time());//年月日
	$time = date("His",time()); //时分秒
	$rand = mt_rand(0,2000);	//获得一个随机数

	//文件保存的文件夹
	$filePath=ROOT_PATH."upload/".$folder."/".$date."/ ";

	//目录不存在，则创建
	if(!file_exists($filePath)){
		createFolder($filePath);
	}

	$filePath = trim($filePath);

	//获得文件的后缀
	$ext = getFileExt($file['name']);

	//文件的临时名字
	$tempname = $file["tmp_name"];
	move_uploaded_file($tempname,$filePath.$time."_".$rand.".".$ext);   //保存文件

	$fileUrl="./upload/".$folder."/".$date."/".$time."_".$rand.".".$ext;  //保存路径
	return $fileUrl;  //返回文件的保存路径
}


/*同时创建目录及其子目录*/
function createFolder ($path){
    if (!file_exists($path)){
        createFolder(dirname($path));
        if (@mkdir(iconv("UTF-8", "gb2312",dirname($path)))) {
            return true;;
        } else {
            return false;
        }
    }
}

/*获得文件的后缀名*/
function getFileExt($filename){
	$endpos = strrpos($filename,".");
	$ext = substr($filename,$endpos+1);
	return $ext;
}


