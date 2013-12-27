<?php

class Errors{
	private static $errors = array(
	    400 => 'Bad Request',
	    401 => 'Unauthorized',
	    402 => 'Payment Required',
	    403 => 'Forbidden',
	    404 => 'Not Found',
	    405 => 'Method Not Allowed',
	    406 => 'Not Acceptable',
	    408 => 'Request Timeout',
	    409 => 'Conflict',
	    410 => 'Gone',
	    411 => 'Length Required',
	    412 => 'Precondition Failed',
	    414 => 'Request-URI Too Long',
	    415 => 'Unsupported Media Type',
	    500 => 'Internal Server Error',
	    501 => 'Not Implemented',
	    503 => 'Service Unavailable',
	);
	
	public static function getError($code){
		if(isset(self::$errors[$code])) return self::$errors[$code];
		return "Bad Error Code";
	}
}


class ApiController extends Controller
{
	public $layout='//layouts';

	
	
	private function checkPost(){
		if($_SERVER['REQUEST_METHOD'] !== "POST") die($this->_error(405));
	}
	
	private function _error($code,$msg=null){
		$error = array();
		$error['code'] = $code;
		$error['description'] = Errors::getError($code);
		if($msg) $error['message'] = $msg;
		
		$data = array("error" => $error);
		
		$this->_render($data);
	}	

	private function _render($data){
		$this->render('api', array("data" => $data));
	}
	
	
	
	public function actionIndex()
	{			
		$data = array(
			"name" => Yii::t("huaxin","HUAXIN API"),
			"version" => "0.1",
			"message" => Yii::t("huaxin","Welcome!"),
		);
		return $this->_render($data);
	}
	
	public function actionAd()
	{
		// Only active ads and shown in mobile
		$res = Ad::model()->findAll("NOW() BETWEEN date_published AND date_end AND is_mobile");		
		$ads = array();
		foreach($res as $ad){
			$ads[] = $ad->toArray();
		}
		
//		$data = array("ads" => $ads);
		return $this->_render($ads);
	}

	public function actionAutologin()
	{
		$data = array("message" => "autologin");
		return $this->_render($data);
	}

	public function actionBuy()
	{
		$data = array("message" => "buy");
		return $this->_render($data);
	}

	public function actionCategories()
	{
		$data = array("message" => "categories");
		return $this->_render($data);
	}

	public function actionCreate()
	{
		$data = array("message" => "create");
		return $this->_render($data);
	}

	public function actionDetail()
	{
		$data = array("message" => "detail");
		return $this->_render($data);
	}

	public function actionList()
	{
		$data = array("message" => "list");
		return $this->_render($data);
	}

	public function actionLogin()
	{
		$this->checkPost();
		
		if(!isset($_POST['username'])) return $this->_error(400, Yii::t("huaxin","Missing 'username' parameter"));
		if(!isset($_POST['password'])) return $this->_error(400, Yii::t("huaxin","Missing 'password' parameter"));
		
		// Gather data sent by user
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		
		// Check credentials
		$user = User::model()->find(
			"(email = :username OR phone = :username) AND password = :password", 
			array(":username" => $username, ":password" => $password)
		);
		
		if(!$user){
			return $this->_error(401, Yii::t("huaxin","Wrong username/password"));
		}
		
		$user->token = $user->token ? : Helper::getToken();
		// $user->save();
		
		$data = array(
			$user->email,
			$user->phone,
			$user->token,
		);
		
		return $this->_render($data);
	}

	public function actionMyads()
	{
		$data = array("message" => "myads");
		return $this->_render($data);
	}

	public function actionRegister()
	{
		$this->checkPost();
		
		// Verify data
		if(!isset($_POST['email'])) 	return $this->_error(400, Yii:t("huaxin","Missing 'email' parameter"));
		if(!isset($_POST['phone'])) 	return $this->_error(400, Yii:t("huaxin","Missing 'phone' parameter"));
		if(!isset($_POST['password'])) 	return $this->_error(400, Yii:t("huaxin","Missing 'password' parameter"));
		
		$email = trim($_POST['email']);
		$phone = str_replace( array(" ","-","+",".") , "" , trim($_POST['phone']) );
		$passw = $_POST['password'];
		
		// Validation filters (email,phone,pwd)
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) return $this->_error(406, Yii:t("huaxin","Please, enter a valid email address."));
		if(strlen($phone) !== 9) return $this->_error(406, Yii:t("huaxin","Please, enter a valid phone number."));
		if(strlen($passw) < 7) return $this->_error(406, Yii:t("huaxin","Please, make sure that password is at least 7 characters long."));
		
		$auser = User::model()->find(
			"email = :email OR phone = :phone",
			array(":email" => $email, ":phone" => $phone)
		);
		
		if($auser){
			return $this->_error(409, Yii:t("huaxin","This email/phone is already registered!"));
		}
		
		$user = new User;
		$user->phone = $phone;
		$user->email = $email;
		$user->password = sha1($passw);
		$user->date_register = new CDbExpression('NOW()');
		$user->save();
		
		if(!$user->validate()){
			print_r($user->getErrors());
		}
		
		$data = array("message" => Yii::t("huaxin", "User {email} creation successful!", array("{email}" => $email)));
		return $this->_render($data);
	}

	public function actionSearch()
	{
		$data = array("message" => "search");
		return $this->_render($data);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}