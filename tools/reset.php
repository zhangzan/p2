<?php
$lang_list=array("dev","zh_cn");

define("ALL_STEP",1);
chdir("../htdocs");
foreach($lang_list as $lang){
	doOne($lang);
}

echo "step 1 of 1 : patch md5, generate url.js success\n";


function pushToAr(&$arr,$file,$md5){
	if(in_array($file,array(//这些文件是不会在js中调用的，所以去掉
		"js/url.js",
		"css/css.css",
		"js/main.js",
		"js/helper.js",
		"js/jquery.min.js",
	))){
		return;
	}else if(preg_match("{\\.dic$}su",$file)){//dic文件不做处理
		return;
	}else if(preg_match("{Thumb\\.db$}su",$file)||preg_match("{Thumbs\\.db$}su",$file)){
		return;
	}
	$pieces=explode("/",$file);
	for($i=0;$i<count($pieces);$i++){
		if($i==(count($pieces)-1)){//最后一个
			$arr[$pieces[$i]]=$md5;
			break;
		}else if(!isset($arr[$pieces[$i]])){
			$arr[$pieces[$i]]=array();
		}
		$arr= &$arr[$pieces[$i]];
	}	
}

//处理一个语言目录
function doOne($dir){
	$arr=array();	
	//处理语言所对应目录
	$adir=$dir;
	$file_list=array();
	scan_dir($adir."/js",$file_list,false);//只做一层目录，不做多层
	foreach($file_list as $file){
        if(preg_match("{\.DS_Store}isu",$file)){
			continue;
		}
		pushToAr($arr,substr($file,strlen($adir)+1),substr(md5_file($file),0,8));		
	}
	//处理根目录下面的img目录
	$adir=$dir."/../img";
	$file_list=array();
	scan_dir($adir,$file_list);
	foreach($file_list as $file){
		if(preg_match("{thumb\.db}isu",$file)||preg_match("{thumbs\.db}isu",$file)||preg_match("{\.DS_Store}isu",$file)){
			continue;
		}
		pushToAr($arr,"img/".substr($file,strlen($adir)+1),substr(md5_file($file),0,8));
	}
	
	//处理根目录下面的images目录
	$adir=$dir."/../images";
	$file_list=array();
	scan_dir($adir,$file_list);
	foreach($file_list as $file){
		if(preg_match("{thumb\.db}isu",$file)||preg_match("{thumbs\.db}isu",$file)||preg_match("{\.DS_Store}isu",$file)){
			continue;
		}
		pushToAr($arr,"images/".substr($file,strlen($adir)+1),substr(md5_file($file),0,8));
	}
	
	//保存到url.js
	file_put_contents($dir."/js/url.js","var URLCACHE=".json_encode($arr).";\r\n");
	
	//处理CSS文件给图片加MD5后缀
	$rep=new ReplaceCss("css/");
	$file="css/css.css";
	$content=@file_get_contents($file);
	if(!$content){
		die("$file not found");
	}
	file_put_contents($file,preg_replace_callback("{url\\(([^\\?\\)]*)\\??.*?\\)}u",array($rep,"callback"),$content));	
}

//遍历一个文件夹下面的所有文件
function scan_dir($dir,&$file_list,$recursive=true){
	foreach(scandir($dir) as $file){
		if($file=="." || $file==".." || $file==".svn"){
			continue;
		}else if(is_file($dir."/".$file)){
			$file_list[]=$dir."/".$file;
		}else if($recursive && is_dir($dir."/".$file)){
			scan_dir($dir."/".$file,$file_list);
		}else{
			continue;
		}
	}		
}

class ReplaceCss{
	private $dir;
	public function __construct($dir){
		$this->dir=$dir;
	}
	public function callback($m){
		$file=$this->dir."/".$m[1];		
		return "url(".$m[1]."?v=".substr(md5_file($file),0,8).")";
	}	
}

