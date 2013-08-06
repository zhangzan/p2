<?php

class MPromotion {
	
	public static function getPromotionByDealer(MDealer $m_dealer) {
		
	}

	public static function getAllPromotionList() {
		$dba = select_dba();
		$promtion_list = $dba->select("select * from promotion where status in(1,2) order by record_time asc");
		foreach ($promtion_list as &$row) {
			$row['level_list'] = $row['level']==''?array():explode(",", $row['level']);
		}
		return $promtion_list;
	}

	public static function addPromotion($title, $content, $level, $publish_time) {
		$dba = select_dba();
		$dba->execute("insert into promotion(title, content, level, publish_time, status, record_time)values(:title, :content, :level, :publish_time, 1, :record_time)", array(
			":title" => $title,":content" => $content,":level" => $level,":publish_time" => $publish_time,":record_time" => getTime()
		));
		return true;
	}


	public static function setPromotionStatusById($id, $status) {
		$dba = select_dba();
		$dba->execute("update promotion set status=:status where id=:id", array(
			":id" => $id, ":status" => $status
		));
		return true;
	}

	public static function hideShowPromotionById($id, $status) {
		if (!in_array($status, array(1, 2))) {
			app_die();
		}
		self::setPromotionStatusById($id, $status);
	}

	public static function deletePromotionById($id) {
		self::setPromotionStatusById($id, 3);
	}

	public static function getPromotionById($id) {
		$dba = select_dba();
		$ret = $dba->select_row("select * from promotion where id=:id", array(
			':id' => $id
		));
		$ret['level_list'] = $ret['level']==''?array():explode(",", $ret['level']);
		return $ret;
	}

	public static function updatePromotionById($id, $title, $content, $level, $publish_time) {
		$dba = select_dba();
		$affected_rows = $dba->execute("update promotion set title=:title, content=:content, level=:level, publish_time=:publish_time where id=:id limit 1", array(
			":title" => $title,":content" => $content,":level" => $level,":publish_time" => $publish_time,":id" => $id
		));
		if ($affected_rows == 0) {
			return false;
		}
		return true;
	}

	public static function getPromotionListByDealer($dealer_login_id) {
		$dba = select_dba();
		$dealer_login = $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $dealer_login_id
		));
		$ret = $dba->select("select *,1 as type from promotion where status=1 and level like '%" . $dealer_login['level'] . "%' order by record_time desc");
		return $ret;
	}

}
