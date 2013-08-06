<?php
class MServe{
        public static function commitQuestion($txt){//提交问题默认展示
            $dba=select_dba();
            $dba->execute("insert into question(question,record_time,status) values(:txt,:record_time,:status)",
                    array(':txt'=>$txt,':record_time'=>getTime(),':status'=>0));
            return true;
        }
        public static function getQuestionList(){
            $dba = select_dba();
            return $dba->select_row("select * from question");
        }
        /*修改页面内容id为
        1：Great
        2：AfterSale
        3：allianceService
        4：financeService
        */
        public static function EditContent($type,$txt){//提交问题默认展示
            $dba=select_dba();
            $dba->execute("insert into page_content(id,content,status) values(:type,:txt,2)",
                    array(':type'=>$type,':txt'=>$txt));
            return true;
        }

/*************************************************************/
/*************************************************************/


        /* 根据页面标题，查询页面信息*/
        public static function getPageInfoById($id){
	        $dba = select_dba();
	        $res = $dba->select_row("select * from page_content where id=:id", array(':id' => $id));
	       	return $res;
	    }


	    /*根据 页面ID更新页面信息*/
	    public static function updatePageInfoById($id,$content){
			$dba = select_dba();
	        return $dba->execute("update page_content set content=:content,status=2 where id=:id",array(':content'=>$content,':id'=>$id));
	    }
        
}
?>