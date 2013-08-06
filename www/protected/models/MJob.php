<?php
class MJob {
	
	public static function addJob($title,$count,$location,$experience,$education,$desc,$responsibility,$qualification,$status,$expire_time) {
		$dba = select_dba();
		$dba->execute("insert into job_offers(`title`,`count`,`location`,`experience`,`education`,`desc`,
			`responsibility`,`qualification`,`status`,`publish_time`,`expire_time`,record_time)values(
			:title,:count,:location,:experience,:education,:desc,
			:responsibility,:qualification,:status,:publish_time,:expire_time,:record_time
			)", array(
			':title'=>$title,':count'=>$count,':location'=>$location,':experience'=>$experience,':education'=>$education,':desc'=>$desc,
			':responsibility'=>$responsibility,':qualification'=>$qualification,':status'=>$status,':publish_time'=>getTime(),':expire_time'=>$expire_time,
			':record_time'=>getTime()
			));
	}

	public static function delJobById($id) {
		$dba = select_dba();
		$dba->execute("delete from job_offers where id=:id", array(
			':id' => $id
			));
	}

	public static function getJobList() {
		$dba = select_dba();
		return $dba->select("select * from job_offers order by id desc");
	}

	public static function getJobById($id) {
		$dba = select_dba();
		return $dba->select_row("select * from job_offers where id=:id",array(':id'=>$id));
	}
}

