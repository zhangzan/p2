<?php
class AjaxServeController extends AjaxController{
	public function actionAjaxCommitQuestion(){
		$txt = $this->qp('txt','str');
		//edit start
		$code = MServe::commitQuestion($txt);
		//edit end
		
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

}
