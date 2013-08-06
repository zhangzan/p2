<?php
function sort_cmp($a, $b){
	if ($a['record_time'] == $b['record_time']) {
		return 0;
	}
	return $a['record_time'] < $b['record_time'] ? 1 : -1;
}
class DealerController extends PageController{
	//edit start

	//edit end
	public function actionIndex() {
        //edit start
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
		$bind['dealer_list'] = $dealer_list;
		$bind['province_list'] = $province_list;
		$bind['city_list'] = $city_list;
		$bind['province_map'] = $province_map;
		$bind['city_map'] = $city_map;
		$this->layout='jqm';
		$tmpl='index';
		$this->pageTitle = "经销商查询 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionRegister() {
        //edit start

        //edit end

		$bind=array();
		$this->layout='jqm';
		$tmpl='register';
		$this->pageTitle = "经销商加盟 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionLogin() {
        //edit start

        //edit end

		$bind=array();
		$this->layout='jqm';
		$tmpl='login';
		$this->pageTitle = "经销商登入口 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionMain() {
		$page = $this->qp('page', 'uint', 1);
        //edit start
		@session_start();
		if (!@$_SESSION['dealer_id']) {
			$this->jump($this->url('Dealer', 'Login'));
		}
		$dealer = MDealer::getDealer($_SESSION['dealer_id']);

		$promotion_list = MPromotion::getPromotionListByDealer($dealer['id']);
		$event_list = MEvent::getEventListByDealer($dealer['id']);
		$info_list = array_merge($promotion_list, $event_list);
		usort($info_list, "sort_cmp");
		$info_pager = doPager($info_list, $page, 10);
		$info_list = $info_pager['data'];
		$page_count = $info_pager['page_count'];

		$file_list = MMedia::getMediaListByDealer($dealer['id']);
        //edit end
		$bind=array();
		$bind['dealer'] = $dealer;
		$bind['info_list'] = $info_list;
		$bind['file_list'] = $file_list;
		$bind['page'] = $page;
		$bind['page_count'] = $page_count;
		$this->layout='jqm';
		$tmpl='main';
		$this->pageTitle = "经销商专区 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionDownload() {
		$id = $this->qp("id", 'uint');

		@session_start();
		if (!@$_SESSION['dealer_id']) {
			app_die();
		}
		$dealer = MDealer::getDealer($_SESSION['dealer_id']);
		$ret = MMedia::checkCanDownload($dealer['id'], $id);
		if (!$ret) {
			app_die();
		}
		$upload_dir = dirname(__FILE__) . "/../../upload/files/";

		if (! file_exists ( $upload_dir . $ret['filename'] )) {
		    echo "File Not Found!";
		    exit ();
		} else {
		    //打开文件  
		    $file = fopen ( $upload_dir . $ret['filename'], "r" );
		    //输入文件标签   
		    Header ( "Content-type: application/octet-stream" );
		    Header ( "Accept-Ranges: bytes" );
		    Header ( "Accept-Length: " . filesize ( $upload_dir . $ret['filename'] ) );
		    Header ( "Content-Disposition: attachment; filename=" . $ret['filename'] );
		    //输出文件内容   
		    //读取文件内容并直接输出到浏览器  
		    echo fread ( $file, filesize ( $upload_dir . $ret['filename'] ));
		    fclose ( $file );
		    exit ();
		}  

	}
}
