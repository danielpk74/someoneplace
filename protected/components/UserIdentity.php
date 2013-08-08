<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            $users = Yii::app()->db->createCommand()
                ->select('*')
                ->from('users')
                ->where("user_id=:user_id", array(':user_id' => $this->username))
                ->andWhere("user_pass=:user_pass", array(':user_pass' => $this->username))
                ->limit(1)
                ->queryRow();
                
		if($users['user_id'] != $this->username) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
                }
		elseif($users['user_pass'] != $this->password){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                }
		else {
			$this->errorCode=self::ERROR_NONE;
                }
		return !$this->errorCode;
	}
}