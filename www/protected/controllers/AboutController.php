<?php 
class AboutController extends PageController{
	public function actionBrand() {
        //edit start
		$content = KAdmin::getPageContentById(11);
        //edit end
		$bind=array();
		$bind['content'] = $content;
		$this->layout='jqm';
		$tmpl='brand';
		$this->pageTitle = "品牌介绍 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
    
    public function actionCulture() {
		//edit start
		$content = KAdmin::getPageContentById(12);
        //edit end
		$bind=array();
		$bind['content'] = $content;
		$this->layout='jqm';
		$tmpl='culture';
		$this->pageTitle = "企业文化 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionTechnology() {
		//edit start
		$content = KAdmin::getPageContentById(13);
		$dv_list = MMedia::getDvByPage("technology");
        //edit end
		$bind=array();
		$bind['dv_list'] = $dv_list;
		$bind['content'] = $content;
		$this->layout='jqm';
		$tmpl='technology';
		$this->pageTitle = "尖端科技 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionJobs() {
		//edit start
		$job_list = MJob::getJobList();
        //edit end
		$bind=array();
		$bind['job_list'] = $job_list;
		$this->layout='jqm';
		$tmpl='jobs';
		$this->pageTitle = "人力资源 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

    public function actionNews() {
    	$p = $this->qp('p', 'uint', 1);
    	$time = $this->qp('time', 'str', '');
        $id = $this->qp('id', 'uint', 0);
		//edit start
		$year_list = MNews::getYearList();
		if ($time == '') {
			if ($p == 1) {
				$top_news_list = MNews::getTopNewsList();
			} else {
				$top_news_list = array();
			}
			$news_list = MNews::getNewsList();
		} else {
			$top_news_list = array();
			$news_list = MNews::getNewsListByTime($time);
		}
        $order = 0;
        if ($id != 0) {
            $flag = false;
            foreach ($news_list as $row) {
                $order++;
                if ($id == $row['id']) {
                    $flag = true;
                    break;
                }
            }
        }
        $page_size = 5;
        if ($id != 0 && $flag) {
            $p = ceil($order/$page_size);
            $news_pager = doPager($news_list, $p, $page_size);
        } else {
            $news_pager = doPager($news_list, $p, $page_size);
        }
        if ($p != 1) {
            $top_news_list = array();
        }
		$news_list = $news_pager['data'];
		$page = $p;
		$page_count = $news_pager['page_count'];
		$year = $time;
        //edit end
		$bind=array();
		$bind['top_news_list'] = $top_news_list;
		$bind['news_list'] = $news_list;
		$bind['page'] = $page;
		$bind['page_count'] = $page_count;
		$bind['year'] = $year;
		$bind['year_list'] = $year_list;
        $bind['id'] = $id;
		$this->layout='jqm';
		$tmpl='news';
		$this->pageTitle = "新闻资讯 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionContact() {
		//edit start
		$content = KAdmin::getPageContentById(14);
		//edit end
		$bind=array();
		$bind['content'] = $content;
		$this->layout='jqm';
		$tmpl='contact';
		$this->pageTitle = "联系我们 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
}
