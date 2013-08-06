<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class RobotController extends PageController{
	//edit start

	//edit end
	public function actionRobotLive() {
        //edit start
		$content = KAdmin::getPageContentById(21);
        //edit end
		$bind=array();
		$bind['content'] = $content;
		$this->layout='jqm';
		$tmpl='robot-live';
		$this->pageTitle = "ROBOT生活 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
        
	public function actionOrder() {
        //edit start

        //edit end
		
		$bind=array();
		$this->layout='jqm';
		$tmpl='order';
		$this->pageTitle = "预约试驾 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
	public function actionCustom() {
        //edit start
		$custom_color_list = KAdmin::getColorList();
		$color_arr = array();
		foreach ($custom_color_list as $row) {
			$tmp = array();
			foreach(KAdmin::getCustomColorByColor($row['id']) as $val){
				$tmp[] = $val['car_id'];
			}
			if($row['id']==0){
				$tmp = array(1,2,3,4,5);
			}
			$color_arr[] = $row['id'].',/upload/color/'.$row['id'].'.png,'.$row['color'].(count($tmp)==0?'':(','.implode(',', $tmp)));
		}
		$color = implode(';', $color_arr);
		$part_arr = array();
		foreach (MProduct::getAllPartList() as $val) {
			$part_arr[] = '/upload/part/' . $val['thumbnail'].',/upload/part/'.$val['img'].','.$val['name'].',￥'.$val['price'];
		}
		$part = implode(';', $part_arr);
        //edit end
		$bind=array();
		$bind['color']=$color;
		$bind['part']=$part;
		$this->layout='jqm5';
		$tmpl='custom';
		$this->pageTitle = "个性选择 | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionIrob() {
        //edit start

        //edit end
		$bind=array();
		$this->layout='jqm5';
		$tmpl='irob';
		$this->pageTitle = "iRobot | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end

	public function actionTrob() {
        //edit start

        //edit end
		$bind=array();
		$this->layout='jqm5';
		$tmpl='trob';
		$this->pageTitle = "TRobot | 上海新世纪机器人有限公司";
		$this->output($tmpl,$bind);
	}//action end
	
}
