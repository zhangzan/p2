<?php
class AdminController extends PageController {
	public $layout = 'admin_main';
	public function filters() {
		return array (
				"CheckAdminLogin - Login"
		);
	}
	public function filterCheckAdminLogin($filterChain) {
		if (Yii::app ()->user->isGuest) {
			$this->jump ( $this->url ( 'Admin', 'Login' ) );
		} else {
			$filterChain->run ();
		}
	}
	public function actionLogin() {
		$layout = 'admin_login';
		$model = new AdminLoginForm ();
		if (! Yii::app ()-> user-> isGuest) {
			Yii::app ()-> user-> logout ();
		}
		if (isset($_POST['adminLoginForm'])) {
			$model->attributes=$_POST['adminLoginForm'];
			if ($model->validate() && $model-> login ()) {
				KAdmin::adminLogin($model->username);
				$this-> jump ( $this-> url ( 'Admin', 'NewsManage' ) );
			}
		}
		$this-> output ( 'login', array (
			'model' => $model
		) );
	}
	public function actionLogout() {
		$id = Yii::app ()->user->id;

		KAdmin::adminLogout ( $id );
		Yii::app ()->user->logout ();
		$this->redirect ( 'login' );
	}

	/* 友情链接列表 */
	public function actionLinksList() {
		/* ajax更改友情链接标题 */
		if (@$_REQUEST ['act'] == "edit_name") {
			$id = intval ( $_POST ['id'] );
			$name = $_REQUEST ['val'];
			if (MLinks::updateLinksNameById ( $id, $name )) {
				exit ( "更新成功!" );
			} else {
				exit ( "更新失败!" );
			}
		}
		/* ajax更改友情链接链接 */
		if (@$_REQUEST ['act'] == "edit_href") {
			$id = intval ( $_POST ['id'] );
			$href = $_REQUEST ['val'];
			$exist = MLinks::linksExist ( $href ); // 判断友情链接标题是否重复
			if ($exist) {
				exit ( "链接：" . $href . ' 已经存在!' );
			}

			if (MLinks::updateLinksHrefById ( $id, $href )) {
				exit ( "更新成功!" );
			} else {
				exit ( "更新失败!" );
			}
		}
		/* 增加友情链接信息 */
		if (@$_REQUEST ['act'] == 'add') {
			$name = $this->qp ( "name", 'str' );
			$href = $this->qp ( "href", 'str' );
			$model = "links";
			$res = MLinks::addLinks ( $name, $href );
			$this->redirect($this->url('Admin', 'LinksList'));
			exit;
		}
		/* 删除友情链接信息 */
		if (@$_REQUEST ['act'] == 'del') {
			$id = $_REQUEST ['id'];
			if (MLinks::deleteLinksById ( $id )) {
				$this->showMsg ( "提示", "友情链接删除成功", array (
						'友情链接列表' => 'LinksList'
				), 2 );
			} else {
				$this->showMsg ( "提示", "友情链接删除失败", array (
						'友情链接列表' => 'LinksList'
				), 2 );
			}
		}

		$links_list = MLinks::getLinksList();
		$this->output ( 'links-list', array (
				'url' => 'LinksList',
				'links_list' => $links_list
		));
	}
	
	/* 新闻类别列表 */
	public function actionNewsClassList() {

		/* ajax编辑类别名称 */
		if (@$_REQUEST ['act'] == "edit_name") {
			$id = intval ( $_POST ['id'] );
			$name = $_REQUEST ['val'];
			$model = "news";
			$exist = MNews::newsClassExist ( $name, $model );
			if ($exist) {
				exit ( $name . ' 已经存在!' );
			}

			if (MNews::updateNewsClassById ( $id, $name, 'news' )) {
				exit ( "更新成功!" );
			} else {
				exit ( "更新失败!" );
			}
		}

		/* 删除类别信息 */
		if (@$_REQUEST ['act'] == 'del') {
			$id = $this->qp ( "id", 'uint' ); /* 类别ID */
			$res = MNews::getNewsByClassId ( $id );
			if (! empty ( $res )) {
				$this->showMsg ( "提示", "为类别下还存在文章，禁止删除!", array (
						'类别列表' => "NewsClassList"
				), 2 );
			}

			if (MNews::deleteNewsClassById ( $id )) {
				$this->showMsg ( "提示", "类别删除成功!", array (
						'类别列表' => "NewsClassList"
				), 2 );

			} else {
				$this->showMsg ( "提示", "类别删除失败!", array (
						'类别列表' => "NewsClassList"
				), 2 );
			}
		}

		/* 查询新闻的类别 */
		$classArr = MNews::getNewsClassList ();
		$this->output ( 'news-class-list', array (
				'classArr' => $classArr
		) );

	}

	/* 新增新闻类别 */
	public function actionAddNewsClass() {
		if (isset ( $_POST ['act'] ) && $_POST ['act'] == "add") {
			$name = $this->qp ( "name", 'str' ); // 类别名称
			$model = "news";

			$exist = MNews::newsClassExist ( $name, $model );
			if ($exist) {
				$this->showMsg ( "提示", "类别名：" . $name . " 已经存在", array (
						'重新添加' => "AddNewsClass"
				), 2 );
				return;
			}

			$res = MNews::addNewsClass ( $name, $model );
			if ($res) {
				$this->showMsg ( "提示", "类别添加成功", array (
						'类别列表' => 'NewsClassList',
						'继续增加' => "AddNewsClass"
				), 2 );
			} else {
				$this->showMsg ( "提示", "类别添加失败", array (
						'重新添加' => "AddNewsClass"
				), 2 );
			}
		}
		$this->output ( 'add-news-class', array (
				'act' => 'add',
				'url' => 'AddNewsClass'
		) );
	}

	/* 新闻列表及管理 */
	public function actionNewsManage() {

		/* ajax更改新闻标题 */
		if (@$_REQUEST ['act'] == "edit_title") {
			$id = intval ( $_POST ['id'] );
			$title = $_REQUEST ['val'];
			$exist = MNews::newsExist ( $title ); // 判断新闻标题是否重复
			if ($exist) {
				exit ( "新闻标题： " . $title . ' 已经存在!' );
			}

			if (MNews::updateNewsTitleById ( $id, $title )) {
				exit ( "更新成功!" );
			} else {
				exit ( "更新失败!" );
			}
		}

		/* 删除新闻信息 */
		if (@$_REQUEST ['act'] == 'del') {
			$id = $_REQUEST ['id'];
			if (MNews::deleteNewsById ( $id )) {
				
			} else {
				$this->showMsg ( "提示", "新闻删除失败", array (
						'新闻列表' => 'NewsManage'
				), 2 );
			}
		}

		$news_list = MNews::getAllNewsList();
		$this->output ( 'news-manage', array (
				'news_list' => $news_list
		) );
	}

	/* 增加新闻 */
	public function actionAddNews() {
		if (isset ( $_POST ['act'] ) && $_POST ['act'] == "add") {
			$title = $this->qp ( 'title', 'str' ); // 文章标题
			$type = $this->qp ( 'type', 'uint' ); // 类型
			$status = $this->qp ( 'status', 'uint' ); // 是否显示
			$content = $this->qp ( 'content', 'longstr' ); // 新闻内容

			$image = $_FILES ['image'];
			if (! empty ( $image ['name'] )) {
				$imageurl = uploadFile ( 'news', $image ); /*
				                                        * 两个参数，一个是保存的文件夹名，以及要上传的文件
				                                        */
			} else {
				$imageurl = "";
			}
			if(substr($imageurl, 0, 2)=='./'){
				$imageurl = substr($imageurl, 2);
			}
			if (MNews::addNews ( $title, $type, $status, $imageurl, $content )) {
				$this->showMsg ( "提示", "新闻添加成功", array (
						'新闻列表' => 'NewsManage',
						'继续增加' => "AddNews"
				), 2 );
			} else {
				$this->showMsg ( "提示", "新闻添加失败", array (
						'继续增加' => "AddNews"
				), 2 );
			}
		}

		/* 查询新闻的类别 */
		$classArr = MNews::getNewsClassList ();

		$this->output ( 'add-news', array (
				'newsClass' => $classArr,
				'act' => 'add',
				'url' => 'AddNews'
		) );
	}

	/* 编辑新闻信息 */
	public function actionEditNews() {
		if (isset ( $_POST ['act'] ) && $_POST ['act'] == "edit") {
			$id = intval ( $this->qp ( 'news_id', 'str' ) ); // 新闻ID
			$title = $this->qp ( 'title', 'str' ); // 文章标题
			$type = $this->qp ( 'type', 'uint' ); // 类型
			$status = $this->qp ( 'status', 'uint' ); // 是否显示
			$content = $this->qp ( 'content', 'longstr' ); // 新闻内容

			$image = $_FILES ['image'];
			if (! empty ( $image ['name'] )) {
				$imageurl = uploadFile ( 'news', $image ); /*
				                                        * 两个参数，一个是保存的文件夹名，以及要上传的文件
				                                        */
			} else {
				$imageurl = $this->qp ( 'y_image', 'str' );
			}
			if(substr($imageurl, 0, 2)=='./'){
				$imageurl = substr($imageurl, 2);
			}

			if (MNews::updateNewsById ( $id, $title, $type, $status, $imageurl, $content )) {
				$this->showMsg ( "提示", "编辑成功", array (
						'新闻列表' => "NewsManage",
						'继续编辑' => "EditNews?id=" . $id
				), 2 );
			} else {
				$this->showMsg ( "提示", "编辑失败", array (
						'继续编辑' => "EditNews?id=" . $id
				), 2 );
			}
		}

		$news_id = @$_REQUEST ['id'];
		$news_arr = MNews::getNewsinfoById ( $news_id );

		/* 查询新闻的类别 */
		$newsClass = MNews::getNewsClassList ();

		/* 编辑新闻信息 */

		$this->output ( 'add-news', array (
				'news_arr' => $news_arr,
				'newsClass' => $newsClass,
				'act' => 'edit',
				'url' => 'EditNews'
		) );
	}

	/*常见问题列表*/
	public function actionClientProblemList() {
		$problem_list = MProblem::getClientProlenList ();
		
		$this->output ( 'client-problem-list', array (
				'problem_list' => $problem_list
		) );
	}


	/*常见问题管理  编辑 删除 查看 是否显示等*/
	public function actionProblemManage(){

		/*回复 编辑常见问题*/
		if(@$_REQUEST['act']=="edit"){
			$id = $_REQUEST['id'];
			$problem_info = MProblem::getProblemInfoById($id);


			$this->output ( 'problem-form', array (
											'problem_info'	=> $problem_info,
											'url'			=>"ProblemManage?act=update"
							) );
		}

		/*更新常见问题信息*/
		elseif(@$_REQUEST['act']=="update"){
			$problem_id 	= $_POST['problem_id'];	/*id*/
			$answer 		= $_POST['content'];	/*回复的内容*/
			$revert_time 	= date("Y-m-d H:i:s");
			$status 		= empty($answer) ? 1 : $_POST['status'];

			if (MProblem::updateProblemById ($problem_id, $answer, $revert_time,$status)) {
				$this->showMsg ( "提示", "编辑成功", array (
						'问题列表' => "ClientProblemList",
						'继续编辑' => "ProblemManage?id=" . $problem_id
				), 2 );
			} else {
				$this->showMsg ( "提示", "编辑失败", array (
						'继续编辑' => "ProblemManage?id=" . $problem_id
				), 2 );
			}
		}

		/* 删除常见问题记录 */
		elseif (@$_REQUEST ['act'] == 'del')
		{
			$id = $_REQUEST ['id'];
			if (MProblem::deleteProblemById ( $id )) {
				$this->showMsg ("提示","记录删除成功",array('问题列表'=>'ClientProblemList'), 2 );
			} else {
				$this->showMsg ("提示","记录删除失败", array ('问题列表'=>'ClientProblemList'),2);
			}
		}
	}



	// 客户问题解答
	public function actionAnswerToClient() {
		if (isset ( $_POST ['act'] ) && $_POST ['act'] == "add") {
			$title = $this->qp ( 'title', 'str' ); // 文章标题
			$type = $this->qp ( 'type', 'uint' ); // 类型
			$status = $this->qp ( 'status', 'uint' ); // 是否显示
				                                      // $image = $this->qp();
		}

		$this->output ( 'answer-to-client' );
	}


	// 经销商
	public function actionDealer() {
		$dealer_list = MDealer::getAllDealer ();
		$this->output ( 'dealer-list', array (
				'dealer_list' => $dealer_list
		) );
	}


	/* 预约试驾 管理action*/
	public function actionOrder() {
		$robot = array (
				1 => 'i-ROBOT-BO',
				2 => 'i-ROBOT-SC',
				3 => 'i-ROBOT-LA',
				4 => 'T-ROBOT-S',
				5 => 'T-ROBOT-W',
				6 => 'T-ROBOT-O'
		);
		$plan_buy_time = array (
				0 => '没有时间要求',
				1 => '0-6月之内',
				2 => '7-12月之内',
				3 => '1-2年之内',
				4 => '2年以上'
		);
		$expect_feedback_time = array (
				0 => '没有时间要求',
				1 => '0-12小时之内',
				2 => '1天之内',
				3 => '3天之内',
				4 => '一周之内'
		);
		$sex = array (
				0 => '男',
				1 => '女',
		);
		$status_type = array (
				1 => '新预约',
				2 => '已批准',
				3 => '不批准',
		);

		$_REQUEST['act'] = isset($_REQUEST['act']) ? $_REQUEST['act'] : "list";
		/*预约试驾 列表*/
		if(@$_REQUEST['act'] =='list'){
			$ret = MRobot::getOrderList ();
			$this->output ( 'order', array (
					'ret' => $ret,
					'robot' 					=>$robot,
					'plan_buy_time' 			=>$plan_buy_time,
					'expect_feedback_time' 	=>$expect_feedback_time,
					'sex' 						=>$sex,
					'status_type' 				=>$status_type
			) );
		}

		/*编辑试驾 记录*/
		elseif($_REQUEST['act'] == 'edit')
		{
			$id 		= $_REQUEST['id'];
			$order_info = MRobot::getOrderInfoById($id);
			$this->output ( 'order-form', array (
						'order_info'				=> $order_info,
						'url' 						=> 'Order?act=update',
						'robot' 					=>$robot,
						'plan_buy_time' 			=>$plan_buy_time,
						'expect_feedback_time' 	=>$expect_feedback_time,
						'sex' 						=>$sex,
						'status_type' 				=>$status_type
			) );
		}

		/*更新 编辑的预约记录信息 */
		elseif($_REQUEST['act'] == 'update')
		{
			$order_id 	= $_REQUEST['order_id'];
			$status 	= $_REQUEST['status'];
			if(MRobot::updateOrderInfoById($order_id,$status)){
				$this->showMsg ("提示","更改成功",array('预约试驾列表'=>'Order?act=list'), 2 );
			}else{
				$this->showMsg ("提示","更改失败",array('预约试驾列表'=>'Order?act=list','重新编辑'=>'Order?act=edit&id='.$order_id), 2 );
			}
		}

		/*删除 预约记录*/
		elseif($_REQUEST['act'] =='del')
		{
			$id = $_REQUEST['id'];
			if(MRobot::delOrderById($id)){
				$this->showMsg ("提示","记录删除成功",array('预约试驾列表'=>'Order?act=list'), 2 );
			}else{
				$this->showMsg ("提示","记录删除失败",array('预约试驾列表'=>'Order?act=list'), 2 );
			}
		}

	}


	/*提示页面*/
  	public	function showMsg($title, $msg, $goto, $second=''){
		if(empty($second)){
			$second=count($goto);
		}
		$this->output('success',array('title'=>$title,'msg'=>$msg,'goto'=>$goto,'second'=>$second));
		exit();
	}

	public function actionAddDealer() {

		$this->output('add-dealer');
	}

	public function actionDealerLoginList() {
		$dealer_login_list = MDealer::getDealerLoginList();

		$this->output('dealer-login-list', array(
			'dealer_login_list' => $dealer_login_list
		));
	}

	public function actionEditDealerLogin() {
		$id = $this->qp('id', 'uint');

		$dealer_login = MDealer::getDealerLoginById($id);
		$point_arr = explode('|', $dealer_login['point']);
		$dealer_login['point'] = implode(',', $point_arr);
		$this->output('edit-dealer-login', array(
			'dealer_login' => $dealer_login
		));
	}

	public function actionPromotionList() {
		$promotion_list = MPromotion::getAllPromotionList();

		$this->output('promotion-list', array(
			'promotion_list' => $promotion_list
		));
	}

	public function actionAddPromotion() {
		$this->output('add-promotion');
	}

	public function actionHideShowPromotion() {
		$id = $this->qp('id', 'uint');
		$status = $this->qp('status', 'uint');
		MPromotion::hideShowPromotionById($id, $status);
		header("Location: " . $this->url("Admin", "PromotionList"));
	}

	public function actionEditPromotion() {
		$id = $this->qp('id', 'uint');

		$promotion = MPromotion::getPromotionById($id);

		$this->output('edit-promotion', array(
			'promotion' => $promotion
		));
	}

	public function actionEventList() {
		$event_list = MEvent::getAllEventList();

		$this->output('event-list', array(
			'event_list' => $event_list
		));
	}

	public function actionAddEvent() {
		$this->output('add-Event');
	}

	public function actionAddLinks() {
		$this->output('add-Links');
	}

	public function actionHideShowEvent() {
		$id = $this->qp('id', 'uint');
		$status = $this->qp('status', 'uint');
		MEvent::hideShowEventById($id, $status);
		header("Location: " . $this->url("Admin", "EventList"));
	}

	public function actionEditEvent() {
		$id = $this->qp('id', 'uint');

		$event = MEvent::getEventById($id);

		$this->output('edit-event', array(
			'event' => $event
		));
	}

	public function actionDealerOrderList() {
		$page=$this->qp('page','uint',1);

		list($order_list, $pages, $count) = KAdmin::getDealerOrderList();

		$this->output('dealer-order-list', array(
			'order_list' => $order_list,
			'pages'=>$pages,
			'page'=>$page,
			'count'=>$count,
		));
	}

	public function actionDealerOrderDetail() {
		$id=$this->qp('id','uint');

		$order = KAdmin::getDealerOrderById($id);

		$this->output('dealer-order-detail', array(
			'order' => $order,
		));
	}

	public function actionUploadFile() {
		$theme_list = MMedia::getThemeList();
		$this->output('upload-file', array(
			'theme_list' => $theme_list
		));
	}

	public function actionDoUploadFile() {
		$file = $_FILES['file'];
		$title = $this->qp("title", "str", '');
		$description = $this->qp("description", "longstr", '');
		$thumbnail = $_FILES['thumbnail'];
		$level = $this->qp("level", "uint_list", array());
		$theme = $this->qp("theme", "uint", 1);
		$up_type = $this->qp("up_type", 'uint');
		/*........*/

		$show = $up_type == 2 ? 1 : 0;
		$theme = $up_type == 2 ? $theme : 100;
		$level = implode(",", $level);
		$t = getTime();
		$upload_dir = dirname(__FILE__) . "/../../upload/files/";
		$filename = "";
		$type = 3;
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				$file_pathinfo = pathinfo($file['name']);
				$file_extension = strtolower($file_pathinfo['extension']);
				if (in_array($file_extension, array("png","jpg","bmp","gif","jpeg"))) {
					$type = 2;
				} elseif (in_array($file_extension, array("flv","mp4","rmvb","avi","3gp","mov","wmv","mkv"))) {
					$type = 1;
				} else {
					$type = 3;
				}
				$file_basename = basename($file['name'], ".".$file_pathinfo['extension']);
				$filename = ($title != '' ? $title : $file_basename) . $t . "." . $file_extension;
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
				} else {
					$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadFile'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'UploadFile'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'UploadFile'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadFile'), 2 );
				exit;
			}
		}

		$upload_dir_thumbnail = dirname(__FILE__) . "/../../thumbnails/";
		$thumbnail_name = "";
		if (is_uploaded_file($thumbnail['tmp_name'])) {
			if ($thumbnail['error'] == 0) {
				$thumbnail_pathinfo = pathinfo($thumbnail['name']);
				$thumbnail_extension = strtolower($thumbnail_pathinfo['extension']);
				$thumbnail_basename = basename($thumbnail['name'], ".".$thumbnail_pathinfo['extension']);
				$thumbnail_name = ($title != '' ? $title : $thumbnail_basename) . $t . "s." . $thumbnail_extension;
				move_uploaded_file($thumbnail['tmp_name'], $upload_dir_thumbnail . $thumbnail_name);
			} elseif ($thumbnail['error'] == 1) {

			} elseif ($thumbnail['error'] == 4) {

			} else {

			}
		}
		
		if ($filename == "") {
			$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadFile'), 2 );
			exit;
		} else {
			$ret = MMedia::uploadFile($type, $filename, $title, $description, $thumbnail_name, $file['type'], $level, $show, $theme);
			if ($ret) {
				if($up_type == 2){
					MMedia::calcXmlFile();
				}
				$this->showMsg ("提示","文件上传成功",array('文件列表'=>$up_type==2?'MediaList':'DocList'), 2 );
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>$up_type==2?'UploadFile':'UploadDoc'), 2 );
			}
		}
	}

	public function actionMediaList() {
		$page = $this->qp("page", "uint", 1);

		list($file_list, $pages, $count) = MMedia::getAllMediaList(2);
		$theme_list = MMedia::getThemeList();
		$theme_map = mkmap($theme_list, 'id');
		$this->output('media-list', array(
			'file_list' => $file_list,
			'theme_map' => $theme_map,
			'pages'=>$pages,
			'page'=>$page,
			'count'=>$count,
		));
	}
	
	/*大客户服务 售后服务 商家联盟 金融服务 编辑功能*/
	public function actionPageContent() {

		/*编辑页面信息*/
		if(isset($_REQUEST['act']) && $_REQUEST['act']=="edit")
		{
			$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 1;
			$page_arr = MServe::getPageInfoById($id);

			$this->output ( 'page-content',array('pagearr'=>$page_arr,'act'=>'edit','url'=>'PageContent?act=update&id='.$id));

		}
		/*更新数据到数据库*/
		elseif(isset($_REQUEST['act']) && $_REQUEST['act']=="update")
		{
			$id = intval($_REQUEST['id']);

			$content = $_REQUEST['content']; 	/*页面内容*/
			if (trim($content) == "") {
				$this->showMsg ( "提示", "内容为空", array ('重新编辑' => 'PageContenta?act=edit&id='.$id), 2 );
				exit;
			}
			$status = (isset($_REQUEST['status'])&&$_REQUEST['status']=='on')?2:1;
			if(KAdmin::updatePageContentById($id,$content,$status)){
				$this->showMsg ( "提示", "内容编辑成功", array ('返回' => 'PageContent?act=edit&id='.$id), 2 );
			}else{
				$this->showMsg ( "提示", "内容编辑失败", array ('重新编辑' => 'PageContent?act=edit&id='.$id), 2 );
			}
		}
	}

	public function actionPageContenta() {

		/*编辑页面信息*/
		if(isset($_REQUEST['act']) && $_REQUEST['act']=="edit")
		{
			$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 1;
			$page_content = KAdmin::getPageContentById($id);
			$this->output ( 'page-content-a',array('page_content'=>$page_content,'act'=>'edit','url'=>'PageContenta?act=update&id='.$id));

		}
		/*更新数据到数据库*/
		elseif(isset($_REQUEST['act']) && $_REQUEST['act']=="update")
		{
			$id = intval($_REQUEST['id']);

			$content = $_REQUEST['content']; 	/*页面内容*/
			if (trim($content) == "") {
				$this->showMsg ( "提示", "内容为空", array ('重新编辑' => 'PageContenta?act=edit&id='.$id), 2 );
				exit;
			}
			$status = (isset($_REQUEST['status'])&&$_REQUEST['status']=='on')?2:1;
			if(KAdmin::updatePageContentById($id,$content,$status)){
				$this->showMsg ( "提示", "内容编辑成功", array ('返回' => 'PageContenta?act=edit&id='.$id), 2 );
			}else{
				$this->showMsg ( "提示", "内容编辑失败", array ('重新编辑' => 'PageContenta?act=edit&id='.$id), 2 );
			}
		}
	}

	public function actionEditProductInfo() {
		$id = $this->qp("id",'uint');
		//
		$info = MProduct::getInfoById($id);
		//
		$this->output('edit-product-info', array(
			'info' => $info
		));
	}

	public function actionProductInfoList() {
		$list = MProduct::getInfoList();
		$this->output("product-info-list", array(
			'list' => $list
		));
	}

	public function actionJobList(){
		$list = Mjob::getJobList();
		$this->output("job-list", array(
			'list' => $list
		));
	}

	public function actionAddJob(){
		
		$this->output("add-job");
	}

	public function actionJobDetail(){
		$id = $this->qp('id','uint');
		$detail = Mjob::getJobById($id);
		$this->output("job-detail", array(
			'detail' => $detail
		));
	}

	public function actionDocList() {
		$page = $this->qp("page", "uint", 1);

		list($file_list, $pages, $count) = MMedia::getAllMediaList(1);

		$this->output('doc-list', array(
			'file_list' => $file_list,
			'pages'=>$pages,
			'page'=>$page,
			'count'=>$count,
		));
	}

	public function actionUploadDoc() {

		$this->output('upload-doc');
	}
	
	public function actionUploadProductFile(){
		$this->output('upload-product-file');
	}
	public function actionProductFileList(){
		$file_list = MProduct::getAllFileList();
		$this->output('product-file-list',array(
			'file_list' => $file_list
			));
	}

	public function actionDoUploadProductFile(){
		$product_id = $this->qp('product_id', 'uint');
		$file = $_FILES['file'];

		$upload_dir = dirname(__FILE__) . "/../../download/product_files/";
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				if (file_exists ( $upload_dir . $file['name'] )) {
					unlink($upload_dir . $file['name'] );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $file['name'])) {
				} else {
					$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadProductFile'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'UploadProductFile'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'UploadProductFile'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadProductFile'), 2 );
				exit;
			}
			MProduct::uploadProductFile($product_id, $file['name']);
			$this->showMsg ("提示","文件上传成功",array('文件列表'=>'ProductFileList'), 2 );
		} else {
			$this->showMsg ("错误","文件上传失败",array('上传文件'=>'UploadProductFile'), 2 );
			exit;
		}
	}

	public function actionColorList(){
		$list = KAdmin::getColorList();
		$this->output('color-list',array(
			'list' =>$list));
	}

	public function actionAddColor(){
		$id = $this->qp('id','uint',100000);
		$color = false;
		if ($id != 100000) {
			$color = KAdmin::getColorById($id);
		}
		$this->output('add-color', array(
			'color' => $color
		));
	}

	public function actionDoUploadColor(){
		$color = $this->qp('color','str');
		$file = $_FILES['file'];

		$ret = KAdmin::getColorByColor($color);
		if (!$ret) {
			$ret = KAdmin::addColor($color);
		}
		$upload_dir = dirname(__FILE__) . "/../../upload/color/";
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				if (file_exists ( $upload_dir . $ret['id'] . '.png' )) {
					unlink($upload_dir . $ret['id'] . '.png' );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $ret['id'] . '.png')) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'AddColor'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'AddColor'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'AddColor'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'AddColor'), 2 );
				exit;
			}
			$this->showMsg ("提示","成功",array('文件列表'=>'ColorList'), 2 );
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'AddColor'), 2 );
			exit;
		}
	}

	public function actionCustomColorList(){
		$list = KAdmin::getCustomColorList();
		$this->output('custom-color-list',array(
			'list' =>$list));
	}

	public function actionAddCustomColor(){
		$car_id = $this->qp('car_id','uint',0);
		$color_id = $this->qp('color_id','uint',100000);

		$color_list = KAdmin::getAdminColorList();

		$custom_color = false;
		if ($color_id != 100000 && $car_id != 0) {
			$custom_color = KAdmin::getCustomColor($color_id,$car_id);
		}
		$this->output('add-custom-color', array(
			'custom_color' => $custom_color,'color_list'=>$color_list
		));
	}

	public function actionDoUploadCustomColor(){
		$color_id = $this->qp('color_id','uint');
		$car_id = $this->qp('car_id','uint');
		$file = $_FILES['file'];

		$ret = KAdmin::getCustomColor($color_id,$car_id);
		if (!$ret) {
			KAdmin::addCustomColor($color_id,$car_id);
		}
		$upload_dir = dirname(__FILE__) . "/../../upload/custom_color/";
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				if (file_exists ( $upload_dir . $car_id .'_'. $color_id . '.png' )) {
					unlink($upload_dir . $car_id .'_'. $color_id. '.png' );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir .$car_id .'_'. $color_id . '.png')) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			}
			$this->showMsg ("提示","成功",array('文件列表'=>'CustomColorList'), 2 );
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
			exit;
		}
	}
	
	/*大banner列表*/
	public function actionBigBanner(){
		$_REQUEST['act'] = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'list';
		/*大banner列表*/
		if($_REQUEST['act'] == 'list'){
			$bannerlist = MBanner::getBigBannerList();
			$this->output('big-banner-list', array(
				'bannerlist' => $bannerlist,
				'url'=>'BigBanner?act=update'
			));
		}

		/*更新banner信息*/
		elseif($_REQUEST['act'] == 'update')
		{
			$url = $_REQUEST['url'];
			$y_image_url = $_REQUEST['y_image_url'];
			$banner_image = $_FILES['banner'];
			foreach($banner_image['name'] as $k=>$v){
				if(!empty($v)){
					$bannerimage['name'] = $banner_image['name'][$k];
					$bannerimage['type'] = $banner_image['type'][$k];
					$bannerimage['tmp_name'] = $banner_image['tmp_name'][$k];
					$bannerimage['error'] = $banner_image['error'][$k];
					$bannerimage['size'] = $banner_image['size'][$k];
					$id = $k+1; //banner在数据库中的ID
					$image_url = uploadFile ( 'banner', $bannerimage );


					MBanner::updateBigBannerById($id,$image_url,$url[$k]);
				}else{
					$id = $k+1; //banner在数据库中的ID
					MBanner::updateBigBannerById($id,$y_image_url[$k],$url[$k]);
				}
			}
			$this->showMsg ( "提示", "banner更新成功", array ('banner列表' => 'BigBanner?act=list'), 2 );

		}
	}


/*小banner列表*/
	public function actionSmallBanner(){
		$_REQUEST['act'] = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'list';
		if($_REQUEST['act']=="list"){
			$bannerlist = MBanner::getSmallBannerList();
			$this->output('small-banner-list', array(
				'bannerlist' => $bannerlist,
				'url'=>'BigBanner?act=update'
			));
		}

		/*新增*/
		elseif($_REQUEST['act']=="add")
		{
			$this->output('add-small-banner',array('act'=>'add','url'=>'SmallBanner?act=insert'));

		}

		/*新增数据*/
		elseif($_REQUEST['act']=="insert")
		{
			$name 	= $_POST['name'];
			$url 	= $_POST['url'];

			$image 	= $_FILES['image_url'];
			if(!empty($image['name'])){
				$image_url = uploadFile ( 'banner', $image );
			}else{
				$image_url="";
			}

			$update_time = date("Y-m-d H:i:s");

			if(MBanner::insertSmallBanner($name,$url,$image_url,$update_time)){
				$this->showMsg ("提示","banner添加成功",array('banner列表'=>'SmallBanner?act=list','继续添加'=>'SmallBanner?act=add'), 2 );
			}else{
				$this->showMsg ("提示","banner添加失败",array('banner列表'=>'SmallBanner?act=list','继续添加'=>'SmallBanner?act=add'), 2 );
			}
		}

		/*编辑*/
		elseif($_REQUEST['act']=="edit")
		{
			$id = $_REQUEST['id'];
			$bannerinfo = MBanner::getSmallBannerInforById($id);
			$this->output('add-small-banner',array('act'=>'edit','url'=>'SmallBanner?act=update','bannerinfo'=>$bannerinfo));

		}

		/*更新到数据库*/
		elseif($_REQUEST['act']=="update")
		{
			$id 	= $_POST['bannerid'];
			$name 	= $_POST['name'];
			$url 	= $_POST['url'];
			$update_time = date("Y-m-d H:i:s");

			$image 	= $_FILES['image_url'];
			if(!empty($image['name'])){
				$image_url = uploadFile ( 'banner', $image );
			}else{
				$image_url=$_POST['y_image_url'];
			}

			if(MBanner::updateSmallBannerById($id,$name,$url,$image_url,$update_time)){
				$this->showMsg ("提示","banner编辑成功",array('banner列表'=>'SmallBanner?act=list','继续编辑'=>'SmallBanner?act=edit&id='.$id), 2 );
			}else{
				$this->showMsg ("提示","banner编辑失败",array('banner列表'=>'SmallBanner?act=list','继续编辑'=>'SmallBanner?act=edit&id='.$id), 2 );
			}

		}

	}

	public function actionPartList() {
		$list = MProduct::getAllPartList();
		$this->output('part-list', array(
			'list'=>$list
		));
	}
	
	public function actionAddPart() {
		$this->output('add-part');
	}
	
	public function actionDoAddPart(){
		$name = $this->qp('name','str');
		$type = $this->qp('type','uint',0);
		$price = $this->qp('price','str');
		$thumbnail = $_FILES['thumbnail'];
		$img = $_FILES['img'];

		$t = time();
		$upload_dir = dirname(__FILE__) . "/../../upload/part/";
		if (is_uploaded_file($thumbnail['tmp_name'])) {
			if ($thumbnail['error'] == 0) {
				$thumbnail_pathinfo = pathinfo($thumbnail['name']);
				$thumbnail_extension = strtolower($thumbnail_pathinfo['extension']);
				$thumbnail_basename = basename($thumbnail['name'], ".".$thumbnail_pathinfo['extension']);
				$thumbnail_name = $name .'_'. $t . "s." . $thumbnail_extension;

				if (file_exists ( $upload_dir . $thumbnail_name )) {
					unlink($upload_dir . $thumbnail_name );
				}
				if (move_uploaded_file($thumbnail['tmp_name'], $upload_dir . $thumbnail_name)) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
					exit;
				}
			} elseif ($thumbnail['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} elseif ($thumbnail['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			}
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
			exit;
		}
		if (is_uploaded_file($img['tmp_name'])) {
			if ($img['error'] == 0) {
				$img_pathinfo = pathinfo($img['name']);
				$img_extension = strtolower($img_pathinfo['extension']);
				$img_basename = basename($img['name'], ".".$img_pathinfo['extension']);
				$img_name = $name .'_'. $t . "." . $img_extension;

				if (file_exists ( $upload_dir . $img_name )) {
					unlink($upload_dir . $img_name );
				}
				if (move_uploaded_file($img['tmp_name'], $upload_dir . $img_name)) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
					exit;
				}
			} elseif ($img['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} elseif ($img['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'AddCustomColor'), 2 );
				exit;
			}
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'AddCustomColor'), 2 );
			exit;
		}
		MProduct::addPart($name, $type, $price, $thumbnail_name, $img_name);
		$this->showMsg ("提示","成功",array('部件列表'=>'PartList'), 2 );
	}

	public function actionMediaThemeList(){
		$list = MMedia::getThemeList();
		$this->output("media-theme-list",array(
			'list'=>$list
		));
	}
	public function actionAddMediaTheme(){
		$list = MMedia::getThemeList();
		$this->output("add-media-theme");
	}
	public function actionDvList(){
		$list = MMedia::getDvList();
        $this->output("dv-list",array(
        	'list' => $list
        ));
	}
	public function actionAddDv(){
		ini_set('max_execution_time', '0');
        $this->output("add-dv");
	}
	public function actionAddDv2(){
		ini_set('max_execution_time', '0');
        $this->output("add-dv2");
	}
	public function actionEditDv(){
		ini_set('max_execution_time', '0');
		$id = $this->qp('id','uint');
		$dv = MMedia::getDvById($id);
		$this->output("edit-dv",array(
			'dv' => $dv
		));
	}

	public function actionUploadDv(){
		ini_set('max_execution_time', '0');
		$act = $this->qp('act','str');
		$id = $this->qp('id','uint',0);
		$page = $this->qp("page",'str');
		$title = $this->qp("title",'str','');

		if($act == 'add2'){
			$file_name = $this->qp('file','str');
		}else{
			$file = $_FILES['file'];

			$file_name = false;
			$t = time();
			$upload_dir = dirname(__FILE__) . "/../../upload/flv/";
			if ($act == 'edit' && $file['error'] == 4){

			} elseif (is_uploaded_file($file['tmp_name'])) {
				if ($file['error'] == 0) {
					$file_pathinfo = pathinfo($file['name']);
					$file_extension = strtolower($file_pathinfo['extension']);
					$file_basename = basename($file['name'], ".".$file_pathinfo['extension']);
					$file_name = $file_basename .'_'. $t . "." . $file_extension;

					if (file_exists ( $upload_dir . $file_name )) {
						unlink($upload_dir . $file_name );
					}
					if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
					} else {
						$this->showMsg ("错误","失败",array('上传文件'=>'DvList'), 2 );
						exit;
					}
				} elseif ($file['error'] == 1) {
					$this->showMsg ("错误","文件大小过大",array('上传文件'=>'DvList'), 2 );
					exit;
				} elseif ($file['error'] == 4) {
					$this->showMsg ("错误","上传文件为空",array('上传文件'=>'DvList'), 2 );
					exit;
				} else {
					$this->showMsg ("错误","文件上传失败",array('上传文件'=>'DvList'), 2 );
					exit;
				}
			} else {
				$this->showMsg ("错误","失败",array('上传文件'=>'DvList'), 2 );
				exit;
			}
		}
		if($act == "add" || $act == "add2"){
			MMedia::addDv($page, $file_name, $title);
		}elseif($act == "edit"){
			if($file_name!=false){
				$dv = MMedia::getDvById($id);
				@unlink($upload_dir . $dv['file']);
			}
			MMedia::updateDvById($id, $page, $file_name, $title);
		}
		
		$this->showMsg ("提示","成功",array('视频列表'=>'DvList'), 2 );
	}

	public function actionProductPicList(){

		$list = MProduct::getAllPicList();
		$this->output('product-pic-list',array(
			'list' => $list
		));
	}

	public function actionAddProductPic(){
		$type = $this->qp('type', 'uint');
		$pos = $this->qp('pos', 'uint');

		$pic = MProduct::getPicByTypeAndPos($type, $pos);
		$this->output('add-product-pic', array(
			'pic' => $pic
		));
	}

	public function actionDoUploadProductPic(){
		$type = $this->qp('type', 'uint');
		$pos = $this->qp('pos', 'uint');
		$file = $_FILES['file'];

		$t = time();
		$upload_dir = dirname(__FILE__) . "/../../upload/product_pic/";
		$file_name = false;
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				$file_pathinfo = pathinfo($file['name']);
				$file_extension = strtolower($file_pathinfo['extension']);
				$file_basename = basename($file['name'], ".".$file_pathinfo['extension']);
				$file_name = $file_basename .'_'. $t . "." . $file_extension;

				if (file_exists ( $upload_dir . $file_name )) {
					unlink($upload_dir . $file_name );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'ProductPicList'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'ProductPicList'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'ProductPicList'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'ProductPicList'), 2 );
				exit;
			}
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'ProductPicList'), 2 );
			exit;
		}
		if($file_name == false){
			$this->showMsg ("错误","失败",array('上传文件'=>'ProductPicList'), 2 );
			exit;
		}
		MProduct::changePicByTypeAndPos($type, $pos, 'upload/product_pic/'.$file_name);
		$this->showMsg ("提示","成功",array('列表'=>'ProductPicList'), 2 );
	}

	public function actionProductList() {
		$pro_list = array();
		foreach (array(1,2,3,4,5,6) as $type) {
			foreach (MProduct::getProListByType($type) as $row) {
				$pro_list[] = $row;
			}
		}
		$this->output("product-list", array(
			'pro_list' => $pro_list
		));
	}
	public function actionAddProductList() {
		$this->output("add-product-list");
	}
	public function actionDoAddProductList() {
		$type = $this->qp('type', 'uint');
		$title = $this->qp('title', 'str');
		$text = $this->qp('text', 'longstr');
		$file = $_FILES['file'];

		$t = time();
		$upload_dir = dirname(__FILE__) . "/../../upload/product_list/";
		$file_name = false;
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				$file_pathinfo = pathinfo($file['name']);
				$file_extension = strtolower($file_pathinfo['extension']);
				$file_basename = basename($file['name'], ".".$file_pathinfo['extension']);
				$file_name = $file_basename .'_'. $t . "." . $file_extension;

				if (file_exists ( $upload_dir . $file_name )) {
					unlink($upload_dir . $file_name );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
				} else {
					$this->showMsg ("错误","失败",array('上传文件'=>'ProductList'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('上传文件'=>'ProductList'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$this->showMsg ("错误","上传文件为空",array('上传文件'=>'ProductList'), 2 );
				exit;
			} else {
				$this->showMsg ("错误","文件上传失败",array('上传文件'=>'ProductList'), 2 );
				exit;
			}
		} else {
			$this->showMsg ("错误","失败",array('上传文件'=>'ProductList'), 2 );
			exit;
		}
		if($file_name == false){
			$this->showMsg ("错误","失败",array('上传文件'=>'ProductList'), 2 );
			exit;
		}
		MProduct::addProductList($type, $title, $text, 'upload/product_list/'.$file_name);
		$this->showMsg ("提示","成功",array('列表'=>'ProductList'), 2 );
	}

	public function actionProductApply() {
		$apply_list = array();
		foreach (array(1,2,3,4,5,6) as $type) {
			$apply_list[] = MProduct::getProApplyByType($type, false);
		}
		$this->output("product-apply", array(
			'apply_list' => $apply_list
		));
	}
	public function actionEditProductApply() {
		$type=$this->qp('type', 'uint');

		$apply = MProduct::getProApplyByType($type, true);

		$this->output("edit-product-apply", array(
			'apply' => $apply
		));
	}
	public function actionDoEditProductApply() {
		$type = $this->qp('type', 'uint');
		$title = $this->qp('title', 'str');
		$text = $this->qp('text', 'longstr');
		$file = $_FILES['file'];

		$t = time();
		$upload_dir = dirname(__FILE__) . "/../../upload/product_apply/";
		$file_name = false;
		$change_img = false;
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['error'] == 0) {
				$change_img = true;
				$file_pathinfo = pathinfo($file['name']);
				$file_extension = strtolower($file_pathinfo['extension']);
				$file_basename = basename($file['name'], ".".$file_pathinfo['extension']);
				$file_name = $file_basename .'_'. $t . "." . $file_extension;

				if (file_exists ( $upload_dir . $file_name )) {
					unlink($upload_dir . $file_name );
				}
				if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
				} else {
					$this->showMsg ("错误","失败",array('跳转'=>'ProductApply'), 2 );
					exit;
				}
			} elseif ($file['error'] == 1) {
				$this->showMsg ("错误","文件大小过大",array('跳转'=>'ProductApply'), 2 );
				exit;
			} elseif ($file['error'] == 4) {
				$change_img = false;
			} else {
				$this->showMsg ("错误","文件上传失败",array('跳转'=>'ProductApply'), 2 );
				exit;
			}
		}
		if ($change_img && $file_name == false) {
			$this->showMsg ("错误","失败",array('跳转'=>'ProductApply'), 2 );
			exit;
		}
		if ($change_img) {
			MProduct::EditProductApply($type, $title, $text, 'upload/product_apply/'.$file_name);
		} else {
			MProduct::EditProductApply($type, $title, $text, NULL);
		}
		
		$this->showMsg ("提示","成功",array('列表'=>'ProductApply'), 2 );
	}
}
