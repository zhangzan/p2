<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 *
	 * @var string the default layout for the controller view. Defaults to
	 *      '//layouts/column1',
	 *      meaning using a single column layout. See
	 *      'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/jqm';
	/**
	 *
	 * @var array context menu items. This property will be assigned to {@link
	 *      CMenu::items}.
	 */
	public $menu = array ();
	/**
	 *
	 * @var array the breadcrumbs of the current page. The value of this
	 *      property will
	 *      be assigned to {@link CBreadcrumbs::links}. Please refer to {@link
	 *      CBreadcrumbs::links}
	 *      for more details on how to specify this property.
	 */
	public $breadcrumbs = array ();
	
	private $m_user;
	public function qp($param_name, $type, $default = NULL) {
		$value = @$_REQUEST [$param_name];
		$miss = ($value === NULL);
		if ($type == "uint") {
			if (! $miss && preg_match ( "{^\\d+$}su", $value ) && $value >= 0 && $value < 2147483648) {
				return $value;
			}
		} else if (is_array ( $type )) {
			if (! $miss && in_array ( $value, $type )) {
				return $value;
			}
		} else if ($type == "datetime") {
			if (! $miss && strtotime ( $value ) !== false) {
				return $value;
			}
		} else if ($type == "ubigint") {
			if (! $miss && preg_match ( "{^\\d+$}su", $value ) && $value >= 0 && $value < 9223372036854775808) {
				return $value;
			}
		} else if ($type == "str") { // 一般的字符串
			if (! $miss && preg_match ( "{^.{0,255}$}su", $value )) {
				return $value;
			}
		} else if ($type == "longstr") { // 长字符串
			if (! $miss && preg_match ( "{^.{0,4096}$}su", $value )) {
				return $value;
			}
		} else if ($type == "msg") { // 消息字符串
			if (! $miss && preg_match ( "{^.{0,255}$}su", $value )) {
				return mysql_real_escape_string($value);
			}
		} else if ($type == "uint_list") { // 
			if (! $miss && is_array($value)) {
				$cfm = true;
				foreach ($value as $row){
					if(!preg_match ( "{^\\d+$}su", $row ) || $row < 0 || $row > 2147483648){
						$cfm = false;
						break;
					}
				}
				if($cfm){
					return $value;
				}
			}
		} else if ($type == "name") { // user的名字
			if (! $miss && preg_match ( "{^[^\\000-\\037\\177]{2,16}$}su", $value )) {
				$in = trim($value);
				$out = select_dba()->select_one("select CONVERT( _utf8 :in USING utf8 ) COLLATE utf8_bin;",array(':in'=>$in));
				if($out == $in){
					$len = 0;
					preg_match_all ( "{[^\\000-\\037\\177]}su", $value, $matches, PREG_SET_ORDER );
					foreach ( $matches as $match ) {
						$len += strlen ( $match [0] ) > 1 ? 2 : 1;
					}
					if ($len >= 4 && $len <= 16) {
						return $value;
					}
				}
			}
		} else if ($type == 'page') {
			if (! $miss && preg_match ( "{^\\d*$}su", $value ) && $value >= 1 && $value < 2147483648) {
				return min ( $value, 100 );
			}
		} else {
			die ( "qp type error" );
		}
		if ($default === NULL) {
			app_die ( "param error" ); // 参数非法
		}
		return $default;
	}
	
	public function filters() {
		return array ("DoPreFilters" );
	}
	
	public function filterDoPreFilters($filterChain) {
		$this->doPreFilters ();
		$filterChain->run ();
	}
	
	public function filterDoPostFilters($filterChain) {
		$this->doPostFilters ();
		$filterChain->run ();
	}
	
	public $preFilters = array ();
	public function doPreFilters() {
		QApplication::getInstance ()->controller = $this;
		foreach ( $this->preFilters as $filter ) {
			$filter = "filter" . $filter;
			$this->$filter ();
		}
	}
	
	public $postFilters = array ();
	public function doPostFilters() {
		foreach ( $this->postFilters as $filter ) {
			$filter = "filter" . $filter;
			$this->$filter ();
		}
	}
	
	public function url($c, $a = NULL, $p = array()) {
		if ($a) {
			$url = Yii::app ()->getBaseUrl () . "/$c/$a.html";
			if (count($p) != 0) {
				$url .= '?'; 
			}
			foreach ( $p as $k => $v ) {
				$url .= urlencode ( $k ) . "=" . urlencode ( $v ) . "&";
			}
			return $url;
		} else {
			$lang = Yii::app ()->language;
			if (in_array ( $c, array ("js/jquery.min.js" ) )) {
				$file = $c;
			} elseif (preg_match ( "{^js/}su", $c )) {
				$file = $lang . "/" . $c;
			} else { // 其他静态文件
				$file = $c;
			}
			$md5 = @md5_file ( $file );
			return Yii::app ()->getBaseUrl () . "/" . $file . ($md5 ? "?v=" . substr ( $md5, 0, 8 ) : "");
		}
	}
	
	/**
	 * @return MUser
	 */
	protected function getUser($no_cache = true) {
		if (! $no_cache && $this->m_user) {
			return $this->m_user;
		}
		@session_start ();
		if (! @$_SESSION ["user_id"]) {
			app_die ();
		}
		$this->m_user =MUser::getUser ( $_SESSION ["user_id"] );
		QApplication::getInstance ()->user_id = $this->m_user->id;
		return $this->m_user;
	}
	
	public function filterCheckLogin() {
		//if($this instanceof PageController){
		$this->checkTutorial(1);
		//}
		if (! $this->getUser ()) {
			app_die ( "not login" );
		}
	}
	
	public function checkTutorial($id) {
		
		// 新手引导
		select_dba()->begin();
		$m_user = $this->getUser ();
		$ret = KTutorial::getCurrentTutorial($m_user);
		if($ret){
			select_dba()->commit();
			
			if($this instanceof PageController){
				$this->jump ( $this->url ( 'Tutorial', 'Index' ) );
			} else {
				$this->output(array('code'=>-2));
			}
		}
		$cfg = KInfo::getTutorialCfg($id);
		if (! $cfg ) {
			// 不需要引导
			select_dba()->commit();
			return true;
		}
		$ret = KTutorial::isTutorialComplete($m_user, $id);
		if ($ret) {
			// 引导已完成
			select_dba()->commit();
			return true;
		}
		KTutorial::setTutorial($m_user, $id);
		select_dba()->commit();
		
		if($this instanceof PageController){
			$this->jump ( $this->url ( 'Tutorial', 'Index' ) );
		} else {
			$this->output(array('code'=>-2));
		}
	}
	
	public function getAutoScrollInfo(){
		$m_user = $this->getUser();
		$ret = KNews::getAllUnreadList($m_user);
		KNews::setNewsRead($m_user);
		if (count($ret) != 0) {
			return $ret;
		}
		if (Yii::app()->controller->id == 'cook' && Yii::app()->controller->action->id == 'Main') {
			return KNews::getTipsAndRollNews(1);
		} else {
			return KNews::getTipsAndRollNews(2);
		}
	}
}