<?php

class AjaxAdminController extends AjaxController {
	
	public function filters() {
		return array (
			"CheckAdminLogin - Login" 
		);
	}
	
	public function filterCheckAdminLogin($filterChain){
		if(Yii::app()->user->isGuest){
			app_die();
		}else{
			$filterChain->run();
		}
	}
	
	public function actionAddDealer() {
		$username 	  = $this->qp('username', 'str');
		$password 	  = $this->qp('password', 'str');
		$level 		  = $this->qp('level', 'uint');
		$company 	  = $this->qp('company', 'str');
		$contact_name = $this->qp('contact_name', 'str');
		$address 	  = $this->qp('address', 'str');
		$province 	  = $this->qp('province', 'str');
		$city 	  = $this->qp('city', 'str');
		$point 	  = $this->qp('point', 'str','');
		$postcode 	  = $this->qp('postcode', 'str','');
		$tel 		  = $this->qp('tel', 'str', '');
		$mobile 	  = $this->qp('mobile', 'str', '');
		$fax 	  = $this->qp('fax', 'str','');
		$email 		  = $this->qp('email', 'str');
		$can_order 	  = $this->qp('can_order', 'uint',0);

		$point_arr = explode(',', $point);
		$point = implode('|', $point_arr);
		$ret = MDealer::registerDealerLogin($username,$password,$level,$company,$contact_name,$address,$province,$city,$point,$postcode,$tel,$mobile,$fax,$email,$can_order);
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}

		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionEditDealerLogin() {
		$id 	  	  = $this->qp('id', 'uint');
		$password 	  = $this->qp('password', 'str', '');
		$level 		  = $this->qp('level', 'uint');
		$company 	  = $this->qp('company', 'str');
		$contact_name = $this->qp('contact_name', 'str');
		$address 	  = $this->qp('address', 'str');
		$province 	  = $this->qp('province', 'str');
		$city 	  = $this->qp('city', 'str');
		$point 	  = $this->qp('point', 'str','');
		$postcode 	  = $this->qp('postcode', 'str','');
		$tel 		  = $this->qp('tel', 'str', '');
		$mobile 	  = $this->qp('mobile', 'str', '');
		$fax 	  = $this->qp('fax', 'str','');
		$email 		  = $this->qp('email', 'str');
		$can_order 	  = $this->qp('can_order', 'uint',0);

		$point_arr = explode(',', $point);
		$point = implode('|', $point_arr);
		$ret = MDealer::updateDealerLoginById($id,$password,$level,$company,$contact_name,$address,$province,$city,$point,$postcode,$tel,$mobile,$fax,$email,$can_order);
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}

		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionDeleteDealerLogin() {
		$id = $this->qp('id', 'uint');
		$ret = MDealer::deleteDealerLoginById($id);
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionAddPromotion() {
		$title = $this->qp('title', 'str');
		$content = $this->qp('content', 'longstr');
		$level = $this->qp('level', 'str');
		$publish_time = $this->qp('publish_time', 'str');

		$ret = MPromotion::addPromotion($title, $content, $level, strtotime($publish_time));
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionDeletePromotion() {
		$id = $this->qp('id', 'uint');

		MPromotion::deletePromotionById($id);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionEditPromotion() {
		$id = $this->qp('id', 'uint');
		$title = $this->qp('title', 'str');
		$content = $this->qp('content', 'longstr');
		$level = $this->qp('level', 'str');
		$publish_time = $this->qp('publish_time', 'str');

		$ret = MPromotion::updatePromotionById($id, $title, $content, $level, strtotime($publish_time));
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionAddEvent() {
		$title = $this->qp('title', 'str');
		$content = $this->qp('content', 'longstr');
		$level = $this->qp('level', 'str');
		$publish_time = $this->qp('publish_time', 'str');

		$ret = MEvent::addEvent($title, $content, $level, strtotime($publish_time));
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionAddLinks() {
		$name = $this->qp('name', 'str');
		$href = $this->qp('href', 'str');

		MLinks::addLinks($name, $href);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionDeleteEvent() {
		$id = $this->qp('id', 'uint');

		MEvent::deleteEventById($id);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionEditEvent() {
		$id = $this->qp('id', 'uint');
		$title = $this->qp('title', 'str');
		$content = $this->qp('content', 'longstr');
		$level = $this->qp('level', 'str');
		$publish_time = $this->qp('publish_time', 'str');

		$ret = MEvent::updateEventById($id, $title, $content, $level, strtotime($publish_time));
		if (!$ret) {
			$code = 2;
		} else {
			$code = 1;
		}
		$bind=array();
		$bind['code']=$code;
		$this->output($bind);
	}

	public function actionDeleteMediaFile() {
		$id = $this->qp('id', 'uint');

		$upload_dir = dirname(__FILE__) . "/../../upload/files/";
		$upload_dir_thumbnail = dirname(__FILE__) . "/../../thumbnails/";

		$media = MMedia::getMediaById($id);
		if ($media) {
			MMedia::deleteMediaById($id);
			@unlink($upload_dir . $media['filename']);
			if ($media['thumbnail'] != "") {
				@unlink($upload_dir_thumbnail . $media['thumbnail']);
			}
			MMedia::calcXmlFile();
		}
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionEditProductInfo() {
		$id = $this->qp('id', 'uint');
		$name = $this->qp('name', 'str');
		$main_info = $this->qp('main_info', 'longstr');
		$title1 = $this->qp('title1', 'str');
		$info1 = $this->qp('info1', 'longstr');
		$title2 = $this->qp('title2', 'str');
		$info2 = $this->qp('info2', 'longstr');
		$title3 = $this->qp('title3', 'str');
		$info3 = $this->qp('info3', 'longstr');
		$title4 = $this->qp('title4', 'str');
		$info4 = $this->qp('info4', 'longstr');
		$title5 = $this->qp('title5', 'str');
		$info5 = $this->qp('info5', 'longstr');
		$title6 = $this->qp('title6', 'str');
		$info6 = $this->qp('info6', 'longstr');
		$status = $this->qp('status', 'uint');

		MProduct::updateInfoById($id, $name, $main_info, $title1, $info1, $title2, $info2, $title3, $info3, $title4, $info4, $title5, $info5, $title6, $info6, $status);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionAddJob() {
		$title = $this->qp('title', 'str');
		$count = $this->qp('count', 'uint', 0);
		$expire_time = $this->qp('expire_time', 'str', '');
		$location = $this->qp('location', 'str', '');
		$experience = $this->qp('experience', 'str', '');
		$education = $this->qp('education', 'str', '');
		$desc = $this->qp('desc', 'longstr', '');
		$responsibility = $this->qp('responsibility', 'longstr', '');
		$qualification = $this->qp('qualification', 'longstr', '');

		$expire_time = strtotime($expire_time);
		MJob::addJob($title,$count,$location,$experience,$education,$desc,$responsibility,$qualification,1,$expire_time);

		$bind=array();
		$bind['code']=1;
		$this->output($bind);

	}

	public function actionDelJob() {
		$id = $this->qp("id", 'uint');
		MJob::delJobById($id);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionDeleteProductFile(){
		$id = $this->qp('id', 'uint');
		$upload_dir = dirname(__FILE__) . "/../../download/product_files/";
		$ret = MProduct::delProductFileById($id);
		@unlink($upload_dir . $ret);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionDelPart() {
		$id = $this->qp("id", 'uint');
		MProduct::delPartById($id);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionAddMediaTheme() {
		$theme = $this->qp("theme", 'str');
		MMedia::addTheme($theme);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}

	public function actionDelMediaTheme() {
		$id = $this->qp("id", 'uint');
		MMedia::delThemeById($id);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}
	public function actionDeleteDv() {
		$id = $this->qp("id", 'uint');
		$upload_dir = dirname(__FILE__) . "/../../upload/flv/";
		$ret = MMedia::delDvById($id);
		@unlink($upload_dir . $ret['file']);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}
	public function actionDeleteProductPic() {
		$id = $this->qp("id", 'uint');
		$upload_dir = dirname(__FILE__) . "/../../upload/product_pic/";
		$ret = MProduct::delPicById($id);
		@unlink($upload_dir . $ret['filename']);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}
	public function actionDeleteProductList() {
		$id = $this->qp("id", 'uint');
		$upload_dir = dirname(__FILE__) . "/../../";
		$ret = MProduct::delProductListById($id);
		@unlink($upload_dir . $ret);
		$bind=array();
		$bind['code']=1;
		$this->output($bind);
	}
}
