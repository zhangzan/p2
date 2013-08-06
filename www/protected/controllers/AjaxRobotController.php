<?php
class AjaxRobotController extends AjaxController{

	public function actionAjaxCommitForm(){
		$type = $this->qp('type','uint');
		$name = $this->qp('name','str');
                $sex = $this->qp('sex','uint');
                $mobile = $this->qp('mobile','str');
                $province = $this->qp('province','str');
                $city = $this->qp('city','str');
                $email = $this->qp('email','str');
                $plan_buy_time = $this->qp('plan_buy_time','uint','-');
                $expect_feedback_time = $this->qp('expect_feedback_time','uint','-');
		//edit start
                if( MRobot::Order($type, $name, $sex, $mobile, $province, $city, $email, $plan_buy_time, $expect_feedback_time)) {
			$code = 1;
		} else {
			$code = 2;
		}
		//edit end
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

}
