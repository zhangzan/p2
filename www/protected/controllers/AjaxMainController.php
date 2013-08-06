<?php
class AjaxMainController extends Controller{
	public function actionajaxSearchCompany(){
		$txt = $this->qp('txt','str');
		//edit start
		$contact_list = KPro::getSearchList($txt);
		print_r($contact_list);die();
		//edit end
		
		$bind=array();
		$bind['contact_list']=$contact_list;
		$bind['code']=1;
		$this->output($bind);
	}

}
