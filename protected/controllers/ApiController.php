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
	
	private function checkToken(){
		$params = json_decode($_POST['params'],true);
		
		if(!isset($params['token'])) die($this->_error(400, "huaxin","Missing 'token' parameter"));
		$token = $params['token'];
		
		$user = User::model()->findByAttributes(array("token" => $token));
		if(!$user) die($this->_error(401, "Invalid token"));
		return $user;
	}
	
	private function _error($code,$msg=null){
		$error = array();
		$error['code'] = $code;
		$error['description'] = Errors::getError($code);
		if($msg) $error['message'] = Yii::t("huaxin",$msg);
		
		$data = array("error" => $error);
		
		Helper::log($error['description']." - ".$msg);
		
		$this->_render($data);
	}
	
	private function _errors($errors){
		$msg = "";

		foreach($errors as $k=>$e)
			$msg .= " $k: $e |";
			
		$this->_error(406,$msg);
	}	

	private function _render($data){
		$this->render('api', array("data" => $data));
	}
	
	
	// Test call...
	public function actionIndex()
	{			
		$data = array(
			"name" => "HUAXIN API",
			"version" => "0.1",
			"message" => Yii::t("huaxin","Welcome!"),
		);
		return $this->_render($data);
	}
	
	/**
	* Load Splash Screen: ads and categories
	*/
	public function actionInit(){
		$data = array(
			"ad" => $this->actionAd(true),
			"categories" => $this->actionCategories(true),
			"num_anuncios" => Helper::getCount(),
		);
		
		return $this->_render($data);
	}
	
	/* Returns all ads, active and for mobile */
	public function actionAd($output=false)
	{
		// Only active ads and shown in mobile
		$res = Ad::model()->findAll("NOW() BETWEEN date_published AND date_end AND is_mobile");		
		$ads = array();
		foreach($res as $ad){
			$ads[] = $ad->toArray();
		}
		
		$rand = array_rand($ads);
		
		if($output) 
			return $ads[$rand];
		
		return $this->_render($ads[$rand]);
	}
	
	/* Returns all categories */
	public function actionCategories($output=false)
	{
		$categories = Category::model()->findAll(array('order'=>'id'));
		
		$cats = array();
		foreach($categories as $c)
			$cats[] = $c->toArray();
			
		if($output)
			return $cats;
		
		return $this->_render($cats);
	}
	
	/**
	* Login-Register actions
	*/
	public function actionRegister()
	{
		$this->checkPost();
		
		// Verify data
		if(!isset($_POST['email'])) 	return $this->_error(400, "Missing 'email' parameter");
		if(!isset($_POST['phone'])) 	return $this->_error(400, "Missing 'phone' parameter");
		if(!isset($_POST['password'])) 	return $this->_error(400, "Missing 'password' parameter");
		
		$email = strtolower(trim($_POST['email']));
		$phone = strtolower(str_replace( array(" ","-","+",".") , "" , trim($_POST['phone']) ));
		$passw = trim($_POST['password']);
		
		// Validation filters (email,phone,pwd)
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) return $this->_error(406, "Please, enter a valid email address.");
		if(strlen($phone) !== 9 || !ctype_digit($phone)) return $this->_error(406, "Please, enter a valid phone number.");
		if(strlen($passw) < 7) return $this->_error(406, "Please, make sure that password is at least 7 characters long.");
		
		$auser = User::model()->find(
			"LOWER(email) = :email OR LOWER(phone) = :phone",
			array(":email" => $email, ":phone" => $phone)
		);
		
		if($auser) return $this->_error(409, "This email/phone is already registered!");
		
		$user = new User;
		$user->phone = $phone;
		$user->email = $email;
		$user->password = $user->hashPassword($passw);
		$user->date_register = new CDbExpression('NOW()');
		$user->token = Helper::getToken();
		
		if(!$user->validate()) $this->_errors($user->getErrors());
		
		$user->save();
		
		$data = array(
			"success" => true,
			"message" =>  "User {email} creation successful!", array("{email}" => $email),
			"token" => $user->token,
		);
		return $this->_render($data);
	}
	
	public function actionLogin()
	{
		$this->checkPost();
		
		$params = json_decode($_POST['params'],true);
		
		if(!isset($params['username'])) return $this->_error(400, "Missing 'username' parameter");
		if(!isset($params['password'])) return $this->_error(400, "Missing 'password' parameter");
		
		// Gather data sent by user
		$username = $params['username'];
		$password = $params['password'];
		
		// Check credentials
		$user = User::model()->find(
			"LOWER(email) = :username OR LOWER(phone) = :username", 
			array(":username" => $username)
		);
		
		if($user===null) return $this->_error(401, "Wrong username");
		if(!$user->validatePassword($password)) return $this->_error(401, "Wrong password");
		
		$user->device_id = $user->device_id ? : Helper::getToken();
		$user->save();
		
		$data = array(
			"success" => true,
			"message" => Yii::t("huaxin","Welcome, {email}!", array("{email}" => $user->email)),
			"token" => $user->token,
			"num_credits" => $user->credits,
			"email" => $user->email,
			"phone" => $user->phone,
			"id" => $user->id,
		);
		
		return $this->_render($data);
	}

	public function actionAutologin()
	{
		$this->checkPost();
		
		$user = $this->checkToken();
		
		$data = array(
			"success" => true,
			"message" => Yii::t("huaxin","Welcome back, {email}!", array("{email}" => $user->email)),
			"token" => $user->token,
			"num_credits" => $user->credits,
			"email" => $user->email,
			"phone" => $user->phone,
			"id" => $user->id,
		);
		
		return $this->_render($data);
	}

	/**
	* Credits actions
	*/
	public function actionBuy()
	{
		$data = array("message" => "buy");
		return $this->_render($data);
	}

	public function actionCreate()
	{
	
		//TODO! edit
		
		// 1. Post request
		$this->checkPost();
		
		// 2. Valid token
		$user = $this->checkToken();
		
		// 3. Valid data
		
		// category_id
		if(!isset($_POST['category_id'])) return $this->_error(400, "Missing 'category_id' parameter");
		
		// title
		if(!isset($_POST['title'])) return $this->_error(400, "Missing 'title' parameter");
		
		// description
		if(!isset($_POST['description'])) return $this->_error(400, "Missing 'description' parameter");
		
		// price
		if(!isset($_POST['price'])) return $this->_error(400, "Missing 'price' parameter");
		
		// phone
		if(!isset($_POST['phone'])) return $this->_error(400, "Missing 'phone' parameter");
			
		// location
		if(!isset($_POST['location'])) return $this->_error(400, "Missing 'location' parameter");
		
		// duration
		if(!isset($_POST['duration'])) return $this->_error(400, "Missing 'duration' parameter");
		
		// image
		if(!isset($_FILES['image'])) return $this->_error(400, "Missing 'image' parameter");

		$category_id = $_POST['category_id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$duration = $_POST['duration'];
		
		$image = $_FILES['image'];
		
		//TODO Image process

		
		//Category validation
		$category = Category::model()->find($category_id);
		if(!$category || $category_id == 9) return $this->_error(400, "Category not valid");			
		
		
		// Credits validation!
		if($duration < 1) return $this->_error(400, "Duration not valid");
		$num_credits = 1 + $duration;
		if($user->credits < $num_credits) return $this->_error(402,  "Not enough credits");
		
		
		$item = new Item;
		$item->user_id = $user->id;
		$item->category_id = $category_id;
		$item->title = $title;
		$item->description = $description;
		$item->price = floatval($price);
		$item->phone = $phone;
		$item->location = $location;
		$item->image_url = $image['name'];
		
		$item->date_published = new CDbExpression('NOW()');
		$item->date_end = new CDbExpression("NOW() + INTERVAL $duration DAY");		
		
		if(!$item->validate()) $this->_errors($item->getErrors());
		
		$item->save();
		$user->credits -= $num_credits;
		$user->save();	
		
		$data = array("message" => Yii::t("huaxin","Ad creation successful."), "id" => $item->id);
		return $this->_render($data);
	}

	public function actionDetail($id)
	{
		$this->checkPost();
		
		$item = Item::model()->findByPk($id);
		
		if(!$item) return $this->_error(404, "This item was not found.");
		
		$item->num_views++;
		$item->save();
		
		return $this->_render($item->toArray());
	}

	public function actionList($id)
	{
		// TODO filters?
		$this->checkPost();
		
		$category_id = $id;		
		$filters = isset($_POST['filters']) ? json_decode($_POST['filters'],true) : null;
		
		$query = array(
			"condition" => "category_id = :category AND date_end >= :date",
			"params" => array(":category" => $category_id, ":date" => date("Y-m-d h:i:s")),
		);
				
		$items = Item::model()->findAll($query);
		
		$list = array();
		foreach($items as $i)
			$list[] = $i->toArray();
		
		return $this->_render($list);
	}

	public function actionMyads()
	{		
		// 1. Post request
		$this->checkPost();
		
		// 2. Valid token
		$user = $this->checkToken();
		
		//Get ads
		$active_items = Item::model()->findAll(array(
			"condition" => "user_id = :userid AND date_end >= :date",
			"params" => array(":userid" => $user->id, ":date" => date("Y-m-d h:i:s") ),
		));
		
		$past_items = Item::model()->findAll(array(
			"condition" => "user_id = :userid AND date_end < :date",
			"params" => array(":userid" => $user->id, ":date" => date("Y-m-d h:i:s") ),
		));
		
		$active = array();
		foreach($active_items as $item)
			$active[] = $item->toArray();
			
		$past = array();
		foreach($past_items as $item)
			$past[] = $item->toArray();	
		
		$data = array("ads" => array( "active" => $active, "inactive" => $past ));
		return $this->_render($data);
	}

	public function actionSearch()
	{
		$params = json_decode($_POST['params'], true);
		
		$query = $params['query'];
		$category_id = $params['category'];
		
		$sql = "NOW() BETWEEN date_published AND date_end";
		$opts = array();
				
		$sql .= " AND (title LIKE :text OR description LIKE :text OR location LIKE :text)";
		$opts[':text'] = "%$query%";
		
		$sql .= " AND (category_id = :cat)";
		$opts[':cat'] = $category_id;
				
		$dbitems = Item::model()->findAll($sql,$opts);
		
		$sql .=" ORDER BY date_published DESC";
		
		$items = array();
		foreach($dbitems as $item)
			$items[] = $item->toArray();
			
		$data = array("items" => $items);
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