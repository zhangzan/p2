<?php 
class ServeController extends PageController{
	//edit start
	
	//edit end
	public function actionServe() {
        //edit start
		
        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='serve';
		$this->pageTitle = "服务概述| 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
    
    public function actionGreat() {
		//edit start
		
        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='great';
		$this->pageTitle = "大客户服务 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionAfterSale() {
		//edit start
		$question_list = MProblem::getShowQuestionList();

		$dealer_list = MDealer::getDealerLoginList();
		$province_list = array();
		$city_list = array();
		foreach ($dealer_list as &$row) {
			$row['point_arr'] = $row['point']?explode("|", $row['point']):false;
			if(!in_array($row['province'], $province_list)){
				$province_list[count($province_list)+1] = $row['province'];
			}
			if(!in_array($row['city'], $city_list)){
				$city_list[count($city_list)+1] = $row['city'];
			}
		}
		$province_map = array_flip($province_list);
		$city_map = array_flip($city_list);
        //edit end
		$bind=array();
		$bind['question_list'] = $question_list;
		$bind['dealer_list'] = $dealer_list;
		$bind['province_list'] = $province_list;
		$bind['city_list'] = $city_list;
		$bind['province_map'] = $province_map;
		$bind['city_map'] = $city_map;
		$this->layout='jqm';
		$tmpl='after-sale';
		$this->pageTitle = "售后服务 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionSeller() {
		//edit start
		
        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='seller';
		$this->pageTitle = "商家联盟 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionFinance() {
		//edit start
		
        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='finance';
		$this->pageTitle = "金融服务 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
}
