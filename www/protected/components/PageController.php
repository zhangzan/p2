<?php
class PageController extends Controller{
		
	public function error($msg=""){
		$this->postFilters=array();
		$this->jump(Yii::app()->getBaseUrl()."/index.php/site/error");
	}
	protected function output($tmpl,$data=array()){
		$this->deal($data);
		$this->doPostFilters();
		$this->render($tmpl,$data);
		Yii::app()->end();
		exit;
	}
	
	private function deal(&$data){
		if(is_array($data)){
			foreach ($data as &$val){
				$this->deal($val);
			}
		} else if(is_numeric($data) && $data < 999999999){
			if(!preg_match ( "{^0\\d+}su", $data ) || preg_match ( "{^0\\.}su", $data )){
				$data = (double)$data;
			}
		}
	}
	
	protected function jump($url){
		$this->doPostFilters();
		$this->redirect($url);
		Yii::app()->end();
		exit;
	}	
}