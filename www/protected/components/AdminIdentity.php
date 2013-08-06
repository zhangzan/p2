<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity {
	private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 *
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		// var_dump(md5($this->password));die;
		$identity = strtolower ( $this-> username );
		$dba = select_dba ();
		$user = $dba-> select_row ( "select * from admin where LOWER(Identity)= :identity", array (
			':identity' => $identity 
		) );
		
		if ($user === null || $user ['delFlag'] == 1)
			$this-> errorCode = self::ERROR_USERNAME_INVALID;
		else if ($user ['password'] !== md5 ( $this-> password )) {
			$this-> errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this-> _id = $user ['id'];
			$this-> username = $user ['identity'];
			$this-> errorCode = self::ERROR_NONE;
		}
		return $this-> errorCode == self::ERROR_NONE;
	}

	public function getId() 	// 重写getId变为取得id而不是用户名
	{

		return $this-> _id;
	}
}