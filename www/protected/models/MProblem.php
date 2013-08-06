<?php

class MProblem {
	/*常见问题列表*/
    public static function getClientProlenList() {
        $dba = select_dba();
        $pro = $dba->select("select * from question order by id desc");
        return $pro;
    }


    /* 根据常见问题ID 获得常见问题的详情 */

    public static function getProblemInfoById($id) {
        $dba = select_dba();
        $res = $dba->select("select * from question where id=:id", array(':id' => $id));
        if (!empty($res)) {
            return $res[0];
        } else {
            return array();
        }
    }


    /* 根据常见问题ID删除记录 */

    public static function deleteProblemById($id) {
        $dba = select_dba();
        return $dba->execute("delete from question  where id=:id", array(
                    ':id' => $id
                ));
    }


    /* 根据类别ID更新类别信息 */

    public static function updateProblemById($id, $answer, $revert_time,$status) {
        $dba = select_dba();
        return $dba->execute("update question set answer=:answer,revert_time=:revert_time,status=:status where id=:id", array(
            ':answer' => $answer, ':revert_time' => $revert_time, ':id' => $id,':status' => $status
                ));
    }

    public static function getShowQuestionList() {
        $dba = select_dba();
        return $dba->select("select * from question where status = 2 order by id desc limit 20");
    }
}
