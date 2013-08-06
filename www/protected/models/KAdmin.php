<?php
class KAdmin {
	protected $id;
	protected $user;

	public static function adminLogin($identity) {
		
		$dba = select_dba ();
		$dba-> begin ();
		$dba-> execute ( "update admin set loginTime = :loginTime where identity = :identity", array (
			':loginTime' => getTime (),':identity' => $identity 
		) );
		$dba-> commit ();
		return true;
	}
	
	public static function adminLogout($id) {

		$dba = select_dba ();
		$dba->begin();
		$dba-> execute ( "update admin set lastLoginTime=:lastLoginTime where id = :id", array (
			':id' => $id,':lastLoginTime' => getTime()
		) );
		$dba->commit();
		return true;
	}

	public static function getAdmin($id) {

		$m_user = new self ();
		$dba = select_dba ();
		$m_user-> id = $id;
		$ret = $dba-> select_row ( "select * from admin where id = :id and delFlag = 0 and adminFlag = 1", array (
			':id' => $id 
		) );
		if (! $ret) {
			app_die ();
		}
		$m_user-> user = $ret;
		return $m_user;
	}

	public static function getDealerOrderList() {
		$dba = select_dba();
		$count_row = $dba->select_one("select count(*) from `order`");
		$criteria = new CDbCriteria ();
		$pages = new CPagination ( $count_row );
		$pages-> pageSize = 20;
		$pages-> applyLimit ( $criteria );
		$offset = $pages-> currentPage * $pages-> pageSize;
		$dealer_order_list = $dba->select("select o.*,dl.company,dl.username from `order` o join dealer_login dl on o.dealer_login_id=dl.id order by o.record_time desc limit {$offset},{$pages->pageSize}");
		return array($dealer_order_list, $pages, $count_row);
	}

	public static function getDealerOrderById($id) {
		$dba = select_dba();
		return $dba->select_row("select o.*,dl.company,dl.username from `order` o join dealer_login dl on o.dealer_login_id=dl.id where o.id=:id", array(
			':id' => $id
		));
	}

	public static function editPageById($id, $content, $status) {
		$dba = select_dba();
		$dba->execute("update page_content set content=:content,status=:status where id=:id", array(
			':content' => $content, ':id' => $id, ':status' => $status
			));
	}


	public static function getPageContentById($id){
        $dba = select_dba();
        $ret = $dba->select_row("select * from page_content where id=:id", array(':id' => $id));
        return $ret;
    }

    public static function updatePageContentById($id,$content, $status){
		$dba = select_dba();
        return $dba->execute("update page_content set content=:content,status=:status where id=:id",array(':content'=>$content,':id'=>$id,':status'=>$status));
    }

    public static function getColorList(){
    	return select_dba()->select("select * from color order by id asc");
    }

    public static function getAdminColorList(){
    	return select_dba()->select("select * from color where id>0 order by id asc");
    }

    public static function getColorByColor($color){
    	return select_dba()->select_row("select * from color where color=:color",array(
    		':color'=>$color));
    }
    public static function getColorById($id){
    	return select_dba()->select_row("select * from color where id=:id",array(
    		':id'=>$id));
    }
    public static function addColor($color){
    	$dba = select_dba();
    	$dba->execute("insert into color(color)values(:color)",array(
    		':color'=>$color));
    	$id = $dba->last_insert_id();
    	return self::getColorById($id);
    }

    public static function getCustomColor($color_id,$car_id){
    	return select_dba()->select_row("select * from color_car where color_id=:color_id and car_id=:car_id",array(
    		':color_id' => $color_id,':car_id' => $car_id
    	));
    }
    public static function addCustomColor($color_id,$car_id){
    	select_dba()->execute("insert ignore into color_car(car_id,color_id)values(:car_id,:color_id)",array(
    		':color_id'=>$color_id,':car_id' => $car_id));
    }
    public static function getCustomColorList(){
    	return select_dba()->select("select * from color join color_car on color.id=color_car.color_id order by color_car.car_id asc");
    }
    public static function getCustomColorByColor($color_id){
    	return select_dba()->select("select * from color join color_car on color.id=color_car.color_id where color.id=:color_id order by color_car.car_id asc",array(':color_id'=>$color_id));
    }
}
