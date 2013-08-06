<?php 
class ProductController extends PageController{
	//edit start
	
	//edit end
	public function actionIndex() {
        //edit start
		
        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='index';
		$this->pageTitle = "上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotLA(){
        //edit start
        $info = MProduct::getInfoById(1);
        $pro_list = MProduct::getProListByType(1);
        
        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='i-robot-la';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotLAPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(1);
        $apply = MProduct::getProApplyByType(1);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='i-robot-la-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionIRobotLADv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='i-robot-la-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotLASpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(1);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='i-robot-la-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotSC(){
        //edit start
        $info = MProduct::getInfoById(2);
        $pro_list = MProduct::getProListByType(2);
        
        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='i-robot-sc';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotSCPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(2);
        $apply = MProduct::getProApplyByType(2);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='i-robot-sc-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionIRobotSCDv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='i-robot-sc-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotSCSpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(2);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='i-robot-sc-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotBO(){
        //edit start
        $info = MProduct::getInfoById(3);
        $pro_list = MProduct::getProListByType(3);

        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='i-robot-bo';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotBOPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(3);
        $apply = MProduct::getProApplyByType(3);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='i-robot-bo-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionIRobotBODv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='i-robot-bo-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIRobotBOSpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(3);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='i-robot-bo-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotO(){
        //edit start
        $info = MProduct::getInfoById(4);
        $pro_list = MProduct::getProListByType(4);
        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='t-robot-o';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotOPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(4);
        $apply = MProduct::getProApplyByType(4);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='t-robot-o-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionTRobotODv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='t-robot-o-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotOSpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(4);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='t-robot-o-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end


	public function actionTRobotW(){
        //edit start
        $info = MProduct::getInfoById(5);
        $pro_list = MProduct::getProListByType(5);
        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='t-robot-w';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotWPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(5);
        $apply = MProduct::getProApplyByType(5);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='t-robot-w-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionTRobotWDv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='t-robot-w-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotWSpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(5);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='t-robot-w-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end


	public function actionTRobotS(){
        //edit start
        $info = MProduct::getInfoById(6);
        $pro_list = MProduct::getProListByType(6);
        //edit end
		$bind=array();
		$bind['info'] = $info;
		$bind['pro_list'] = $pro_list;
		$this->layout='jqm6';
		$tmpl='t-robot-s';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotSPic(){
        //edit start
        $pic_list = MProduct::getPicListByType(6);
        $apply = MProduct::getProApplyByType(6);
        //edit end
		$bind=array();
		$bind['pic_list'] = $pic_list;
		$bind['apply'] = $apply;
		$this->layout='jqm6';
		$tmpl='t-robot-s-pic';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionTRobotSDv(){
        //edit start
        $dv = MMedia::getDvByPage("productdv");
        if (count($dv)!=0) {
        	$dv = $dv[0];
        }else{
        	$dv = false;
        }
        //edit end
		$bind=array();
		$bind['dv']=$dv;
		$this->layout='jqm6';
		$tmpl='t-robot-s-dv';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTRobotSSpec(){
		$download = $this->qp('download','uint',0);
        //edit start
        $file_list = MProduct::getFileListByProduct(6);
        //edit end
		$bind=array();
		$bind['file_list']=$file_list;
		$this->layout='jqm6';
		$tmpl='t-robot-s-spec';
		$this->pageTitle = "产品 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionDownload() {
		$filename = $this->qp('filename','str');
		
		$upload_dir = dirname(__FILE__) . "/../../download/product_files/";

		if (! file_exists ( $upload_dir . $filename )) {
		    echo "File Not Found!";
		    exit ();
		} else {
		    //打开文件  
		    $file = fopen ( $upload_dir . $filename, "r" );
		    //输入文件标签   
		    Header ( "Content-type: application/octet-stream" );
		    Header ( "Accept-Ranges: bytes" );
		    Header ( "Accept-Length: " . filesize ( $upload_dir . $filename ) );
		    Header ( "Content-Disposition: attachment; filename=" . $filename );
		    //输出文件内容   
		    //读取文件内容并直接输出到浏览器  
		    echo fread ( $file, filesize ( $upload_dir . $filename ));
		    fclose ( $file );
		    exit ();
		}  
	}

}
