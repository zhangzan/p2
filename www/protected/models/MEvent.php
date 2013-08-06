<?php

class MEvent {
	
	public static function getEventByDealer(MDealer $m_dealer) {
		
	}

	public static function getAllEventList() {
		$dba = select_dba();
		$promtion_list = $dba->select("select * from event where status in(1,2) order by record_time asc");
		foreach ($promtion_list as &$row) {
			$row['level_list'] = $row['level']==''?array():explode(",", $row['level']);
		}
		return $promtion_list;
	}

	public static function addEvent($title, $content, $level, $publish_time) {
		$dba = select_dba();
		$dba->execute("insert into event(title, content, level, publish_time, status, record_time)values(:title, :content, :level, :publish_time, 1, :record_time)", array(
			":title" => $title,":content" => $content,":level" => $level,":publish_time" => $publish_time,":record_time" => getTime()
		));
		return true;
	}


	public static function setEventStatusById($id, $status) {
		$dba = select_dba();
		$dba->execute("update event set status=:status where id=:id", array(
			":id" => $id, ":status" => $status
		));
		return true;
	}

	public static function hideShowEventById($id, $status) {
		if (!in_array($status, array(1, 2))) {
			app_die();
		}
		self::setEventStatusById($id, $status);
	}

	public static function deleteEventById($id) {
		self::setEventStatusById($id, 3);
	}

	public static function getEventById($id) {
		$dba = select_dba();
		$ret = $dba->select_row("select * from event where id=:id", array(
			':id' => $id
		));
		$ret['level_list'] = $ret['level']==''?array():explode(",", $ret['level']);
		return $ret;
	}

	public static function updateEventById($id, $title, $content, $level, $publish_time) {
		$dba = select_dba();
		$affected_rows = $dba->execute("update event set title=:title, content=:content, level=:level, publish_time=:publish_time where id=:id limit 1", array(
			":title" => $title,":content" => $content,":level" => $level,":publish_time" => $publish_time,":id" => $id
		));
		if ($affected_rows == 0) {
			return false;
		}
		return true;
	}

	public static function getEventListByDealer($dealer_login_id) {
		$dba = select_dba();
		$dealer_login = $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $dealer_login_id
		));
		$ret = $dba->select("select *,2 as type from event where status=1 and level like '%" . $dealer_login['level'] . "%' order by record_time desc");
		return $ret;
	}
}
