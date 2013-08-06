<?php 
class MainController extends PageController{
	//edit start
	
	//edit end
	public function actionIndex() {
        //edit start

        //edit end
    /*获得大banner图片*/
		$bigbannerlist = MBanner::getBigBannerList();
    /*获得小banner图片*/
    $smallbannerlist = MBanner::getSmallBannerList();
    $news_list = MNews::getNewsTitleList();
        
		$bind=array();
        $bind['smallbannerlist'] = $smallbannerlist;
        $bind['bigbannerlist'] = $bigbannerlist;
        $bind['news_list'] = $news_list;
		$this->layout='jqm';
		$tmpl='index';
		$this->pageTitle = "上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionDownload(){
        //edit start
		$theme_arr = array();
		foreach (MMedia::getThemeList() as $row) {
			$theme_arr[] = $row['id'].','.$row['title'];
		}
		$theme_arr = array_reverse($theme_arr);
		$theme = implode(';', $theme_arr);
        //edit end
		$bind=array();
		$bind['theme']=$theme;
		$this->layout='jqm5';
		$tmpl='download';
		$this->pageTitle = "图片&视频下载 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function  actionHd(){
        //edit start

        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='hd';
		$this->pageTitle = "专题:车随心动 我行我秀i-ROBOT代步机器人新品发布会 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionDeclare() {

		$bind=array();
		$this->layout='jqm';
		$tmpl='declare';
		$this->pageTitle = "法律声明 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}
    
	public function actionSiteMap() {

		$bind=array();
		$this->layout='jqm';
		$tmpl='site-map';
		$this->pageTitle = "网站地图 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}

	public function actionLinks() {
		$link_list = Mlinks::getLinksList();
		$bind=array();
		$bind['link_list'] = $link_list;
		$this->layout='jqm';
		$tmpl='links';
		$this->pageTitle = "友情链接 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}

	public function actionGroupLink() {

		$bind=array();
		$this->layout='jqm';
		$tmpl='group-link';
		$this->pageTitle = "集团公司链接 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}

	public function actionSearch() {

		$bind=array();
		$this->renderPartial('search');
	}
}
