<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;
	private $errorCode;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),

			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			"username" => Yii::t("huaxin","Username"),
			"password" => Yii::t("huaxin","Password"),
			
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
			switch($this->_identity->errorCode){
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username',Yii::t("huaxin","Username is invalid"));
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password',Yii::t("huaxin","Password is invalid"));
					break;
				case UserIdentity::ERROR_USER_NOT_ACTIVE:
					$this->addError('username',Yii::t("huaxin","Username is not activated"));
					break;	
					
				default: break; //OK
					
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=0; 
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
