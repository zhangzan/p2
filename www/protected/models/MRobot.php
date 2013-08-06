<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MRobot{
    public static function Order($type,$name,$sex,$mobile,$province,$city,$email,$plan_buy_time,$expect_feedback_time){
       $dba=  select_dba();
       $dba->execute("insert into drive_request(type,name,sex,mobile,province,city,email,plan_buy_time,expect_feedback_time,status,record_time)
                       values(:type,:name,:sex,:mobile,:province,:city,:email,:plan_buy_time,:expect_feedback_time,1,:record_time)", array(
               	':type' => $type,':name'=>$name, ':sex'=>$sex, ':mobile' =>$mobile,':province'=>$province, ':city'=>$city, ':email'=>$email,
				':plan_buy_time'=> $plan_buy_time,':expect_feedback_time'=>$expect_feedback_time,
				':record_time'=>getTime()
		));
        return true;
    }


	/*获得预约列表*/
     public static function getOrderList(){
       $dba=  select_dba();
       $ret = $dba->select("select * from drive_request order by id desc");
       return $ret;
    }


    /*根据预约ID删除记录信息*/
    public static function delOrderById($id){
       $dba=  select_dba();
       return $dba->execute("delete from drive_request where id=:id",array(':id'=>$id));
    }

	/*根据预约ID获得预约详情*/
	public static function getOrderInfoById($id){
       $dba=  select_dba();
       $ret = $dba->select("select * from drive_request where id = :id",array(':id'=>$id));
        if (!empty($ret)) {
            return $ret[0];
        } else {
            return array();
        }
	}


    /* 根据类别ID更新预约信息 */
    public static function updateOrderInfoById($id, $status) {
        $dba = select_dba();
        return $dba->execute("update drive_request set status=:status where id=:id", array(':id' => $id,':status' => $status));
    }
}
