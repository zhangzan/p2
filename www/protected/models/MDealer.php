<?php
class MDealer {

    public static function getDealerList() {
		$dba = select_dba();
		return $dba->select_row("select * from dealer");
	}


	/*后台经销商列表*/
    public static function getAllDealer() {
        $dba = select_dba();
        $arr = $dba->select("select * from dealer order by id desc");
        return $arr;
    }



	public static function getDealer($id) {
		$dba = select_dba();
		return $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $id
		));
	}

	public static function register($name, $sex, $mobile, $tel, $fax, $province, $city, $email) {
		$dba = select_dba();
		$ret = $dba->select_row("select * from dealer where name=:name", array(
			':name' => $name
		));
		if ($ret) {
			return false;
		}
		$dba->execute("insert into dealer(name,sex,mobile,tel,fax,province,city,level,email,status,record_time) values(:name,:sex,:mobile,:tel,:fax,:province,:city,1,:email,1,:record_time)", array(
			':name' => $name, ':sex' => $sex, ':mobile' => $mobile, ':tel' => $tel, ':fax' => $fax , ':province' => $province, ':city' => $city, ':email' => $email, ':record_time' => getTime()
		));
		return true;
	}

	public static function registerDealerLogin($username,$password,$level,$company,$contact_name,$address,$province,$city,$point,$postcode,$tel,$mobile,$fax,$email,$can_order) {
		$dba = select_dba();
		$ret = $dba->select_row("select * from dealer_login where username=:username", array(
			':username' => $username
		));
		if ($ret) {
			return false;
		}
		$dba->execute("insert into dealer_login(username, password, level, company, contact_name, address,province,city,point, postcode, tel, mobile,fax, email,can_order, status,record_time) values(:username, :password, :level, :company, :contact_name, :address,:province,:city,:point, :postcode, :tel, :mobile,:fax, :email,:can_order, 1, :record_time)", array(
			':username' => $username, ':password' => md5($password), ':level' => $level, ':company' => $company, ':contact_name' => $contact_name, 
			':address' => $address, ':postcode' => $postcode, ':tel' => $tel, ':mobile' => $mobile, ':email' => $email, 
			':record_time' => getTime(),':point' => $point,':fax'=>$fax,':can_order'=>$can_order,':province'=>$province,':city'=>$city
		));
		return true;
	}

	public static function login($username, $password) {
		$dba = select_dba();
		$ret = $dba->select_row("select * from dealer_login where username=:username and password=:password", array(
			':username' => $username, ':password' => md5($password)
		));
		if (!$ret) {
			return array(2, false);
		}
		return array(1, $ret['id']);
	}

	public function setPassword($dealer_id, $new_password) {
		$dba = select_dba();
		$dba->execute("update dealer set password=:password where id=:id", array(
			':id' => $dealer_id, ':password' => md5($new_password)
		));
		return true;
	}

	public function setStatus($dealer_id, $status) {
		$dba = select_dba();
		$dba->execute("update dealer set status=:status where id=:id", array(
			':id' => $dealer_id, ':status' => $status
		));
		return true;
	}

	public function setLevel($dealer_id, $level) {
		$dba = select_dba();
		$dba->execute("update dealer set level=:level where id=:id", array(
			':id' => $dealer_id, ':level' => $level
		));
		return true;
	}

	public static function getDealerLoginList() {
		$dba = select_dba();
		return $dba->select("select * from dealer_login order by record_time asc");
	}

	public static function getDealerLoginById($id) {
		$dba = select_dba();
		return $dba->select_row("select * from dealer_login where id=:id", array(
			':id' => $id
		));
	}

	public static function updateDealerLoginById($id,$password,$level,$company,$contact_name,$address,$province,$city,$point,$postcode,$tel,$mobile,$fax,$email,$can_order) {
		$dba = select_dba();
		if ($password == '') {
			$affected_rows = $dba->execute("update dealer_login set level=:level, company=:company, contact_name=:contact_name, address=:address,province=:province,city=:city,point=:point, postcode=:postcode, tel=:tel, mobile=:mobile,fax=:fax, email=:email,can_order=:can_order where id=:id limit 1", array(
				':id' => $id, ':level' => $level, ':company' => $company, ':contact_name' => $contact_name, ':address' => $address, 
				':postcode' => $postcode, ':tel' => $tel, ':mobile' => $mobile, ':email' => $email,':point' => $point,':fax'=>$fax,':can_order'=>$can_order,
				':province'=>$province,':city'=>$city
			));
			if ($affected_rows == 0) {
				return false;
			}
		} else {
			$affected_rows = $dba->execute("update dealer_login set password=:password, level=:level, company=:company, contact_name=:contact_name, address=:address,province=:province,city=:city,point=:point, postcode=:postcode, tel=:tel, mobile=:mobile,fax=:fax, email=:email,can_order=:can_order where id=:id limit 1", array(
				':id' => $id, ':password' => md5($password), ':level' => $level, ':company' => $company, 
				':contact_name' => $contact_name, ':address' => $address, ':postcode' => $postcode, 
				':tel' => $tel, ':mobile' => $mobile, ':email' => $email,':point' => $point,':fax'=>$fax,':can_order'=>$can_order,
				':province'=>$province,':city'=>$city
			));
			if ($affected_rows == 0) {
				return false;
			}
		}
		return true;
	}

	public static function deleteDealerLoginById($id) {
		$dba = select_dba();
		$affected_rows = $dba->execute("delete from dealer_login where id=:id limit 1", array(
			':id' => $id
		));
		if ($affected_rows == 0) {
			return false;
		}
		return true;
	}

	public static function submitOrder($dealer_login_id, $content) {
		$dba = select_dba();
		$dba->execute("insert into `order`(dealer_login_id,content,status,record_time)values(:dealer_login_id,:content,1,:record_time)",array(
			':dealer_login_id' => $dealer_login_id, ":content" => $content, ':record_time' => getTime()
		));
		return true;
	}
}