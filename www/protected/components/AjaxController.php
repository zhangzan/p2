<?php

class AjaxController extends Controller{

	public function error($msg=""){
		//$this->errorlog();
		$result=array("code"=>-1);
		$msg && ($result["msg"]=$msg);
		$this->postFilters=array();
		$this->output($result);
	}
	protected function output($result){
		$this->deal($data);
		$this->doPostFilters();
		echo json_encode($result);
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
}