<?php
class AjaxDealerController extends AjaxController{
	
	public function actionAjaxLogin(){
		$username = $this->qp('username','str');
		$password = $this->qp('password','str');
		//edit start
		list($rcode, $dealer_id) = MDealer::login($username, $password);
		if ($rcode == 1) {
			@session_start();
			$code = 1;
			$_SESSION['dealer_id'] = $dealer_id;
		} else {
			$code = 2;
		}
		//edit end
		
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}
	
	public function actionAjaxRegister(){
		$name = $this->qp('name','str');
		$sex = $this->qp('sex','uint');
		$mobile = $this->qp('mobile','str');
		$tel = $this->qp('tel','str');
		$fax = $this->qp('fax','str');
		$province = $this->qp('province','str');
		$city = $this->qp('city','str');
		$email = $this->qp('email','str');
		//edit start
		if(MDealer::register($name, $sex, $mobile, $tel, $fax, $province, $city, $email)) {
			$code = 1;
		} else {
			$code = 2;
		}
		//edit end
		
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionSubmitOrder() {
		$content = $this->qp('content', 'longstr');

		@session_start();
		if (!@$_SESSION['dealer_id']) {
			app_die();
		}
		MDealer::submitOrder($_SESSION['dealer_id'], $content);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}
	
}
