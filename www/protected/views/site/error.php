<?php
function url($c,$a=NULL,$p=array()){
	if($a){
		$url=Yii::app()->getBaseUrl()."/index.php/$c/$a";
		foreach($p as $k=>$v){
			$url.="/".urlencode($k)."/".urlencode($v);
		}
		return $url;
	}else{
		$lang = Yii::app()->language;
		if(in_array($c,array("js/jquery.min.js"))){
			$file=$c;
		}elseif(preg_match("{^js/}su",$c)){
			$file=$lang."/".$c;
		}else{//其他静态文件
			$file=$c;
		}
		$md5=@md5_file($file);			
		return Yii::app()->getBaseUrl()."/".$file.($md5?"?v=".substr($md5,0,8):"");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
<h1>Error!</h1>
</body>
</html>