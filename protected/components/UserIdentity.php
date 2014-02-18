<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;
	private $user;
	
	const ERROR_USER_NOT_ACTIVE = 3;
	
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->find("LOWER(email) = :email OR LOWER(phone) = :phone",
					array(":email" => $this->username, ":phone" => $this->username));
		
		if( $user === null )
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		
		elseif( !$user->validatePassword($this->password) )
			$this->errorCode=self::ERROR_PASSWORD_INVALID;

		elseif( $user->active == 0 )
			$this->errorCode=self::ERROR_USER_NOT_ACTIVE;

		else{
			$this->_id = $user->id;
			$this->errorCode=self::ERROR_NONE;
		}

		return $this->errorCode;
	}
	
	public function getId(){
		return $this->_id;
	}
	
}