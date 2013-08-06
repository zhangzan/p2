<?php
class KDatabase{
	private static $dba;
	public static function select_dba($tb=null,$key=null){
		if(!self::$dba){
			self::$dba=KDatabaseAccess::create();
		}
		return self::$dba;
	}
}

//from yii
final class KDatabaseAccess{
	private $connection;
	private $transaction;
	private function __construct($connection){
		$this->connection=$connection;		
	}
	public static function create(){
		return new KDatabaseAccess(Yii::app()->getDb());
	}
	public function execute($sql,$params=array()){
		if(TEST_SERVER_FLAG && !$this->transaction){
			//app_die();
		}
		return 	$this->connection->createCommand($sql)->execute($params);
	}
	public function select($sql,$params=array()){
		return 	$this->connection->createCommand($sql)->queryAll(true,$params);
	}
	public function select_row($sql,$params=array()){
		return 	$this->connection->createCommand($sql)->queryRow(true,$params);
	}
	public function select_col($sql,$params=array()){
		return 	$this->connection->createCommand($sql)->queryColumn($params);
	}
	public function select_one($sql,$params=array()){
		return 	$this->connection->createCommand($sql)->queryScalar($params);
	}
	public function last_insert_id(){
		return $this->connection->getLastInsertID ();
	}	
	public function begin(){
		if($this->transaction){
			app_die();
		}
		$this->transaction=$this->connection->beginTransaction();
		return true;
	}
	public function commit(){
		if(!$this->transaction){
			app_die();
		}
		$this->transaction->commit();
		$this->transaction=null;
		return true;
	}
	public function rollback(){
		if(!$this->transaction){
			app_die();
		}
		$this->transaction->rollBack();
		$this->transaction=null;
		return true;
	}
	
	//register_shutdown_function使用，其他地区禁用
	public function checkTransaction(){
		return $this->transaction?true:false;
	}
}
