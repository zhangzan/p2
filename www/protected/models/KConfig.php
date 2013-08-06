<?php
function KMenu(){
	return new KMenuClass(func_get_args());
}

function KKey(){
	return new KKeyClass(func_get_args());
}

class KMenuClass{
	public $header_list;
	public function __construct($header_list){
		$this->header_list=$header_list;
	}
}

class KKeyClass{
	public $header_list;
	public function __construct($header_list){
		$this->header_list=$header_list;
	}
}

class KConfig {
    private static $config=array();
    private function __construct() {
 
    }
	public static function get($name){
		if(!isset(self::$config[$name])){
			$file_name = dirname(__FILE__) .'/../config/'.$name.'.cfg.php';
			$data = require($file_name);
			self::$config[$name]=self::array2hash($data);
		}
		return self::$config[$name];
	}
	private static function array2hash($data){
		if(is_array($data) && count($data)>0 && (@$data[0]) instanceof KMenuClass){			
			$new_data=array();
			$menu=array_shift($data)->header_list;
			foreach($data as $row){
				if(count($menu)!=count($row)){
					dump($menu);
					dump($data);
					dump($row);exit;
					app_die();
				}
				$hash=array();
				$key=null;
				foreach($row as $k => $v){
					if($menu[$k] instanceof KKeyClass){
						$hash[$menu[$k]->header_list[0]]=self::array2hash($v);
						$key=$hash[$menu[$k]->header_list[0]];
					}else{
						$hash[$menu[$k]]=self::array2hash($v);
					}					
				}	
				if($key!==null){
					if(isset($new_data[$key])){
						app_die();
					}
					$new_data[$key]=$hash;
				}else{
					$new_data[]=$hash;
				}				
			}
			return $new_data;
		}else{
			return $data;
		}
	}
}