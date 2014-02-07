<?php

class SiteController extends Controller
{

	public $layout = "//layouts/huaxin";
	
	private function _login(){
		//Login form
		$this->model=new LoginForm;	
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$this->model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($this->model->validate() && $this->model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
	}
	private function _render($template,$data){
		
		$data["model"] = $this->model;
		
		$this->render($template,$data);
	}
	
	protected function beforeAction($action){
		$this->_login();
		return true;
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		//1. Load all categories
		$categories = Category::model()->findAll(array('order' => "id"));
		
		//2. Load premium items
		
		//3. Load just one random ad
		$ads = array();
		$ads[] = $this->renderPartial("item/ad",array("ad" => Helper::getRandomAd()),true);
		$ads[] = $this->renderPartial("item/ad",array("ad" => Helper::getRandomAd()),true);
		
		$data = array(
			"categories" => $categories,
			"ads" => $ads,
		);
		
		$this->_render('index', $data);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionCategory($id){
		
		$dbitems = Item::model()->findAll("NOW() BETWEEN date_published AND date_end AND category_id = :id", array(":id" => $id) );
		
		$items = array();

		foreach($dbitems as $item)
			$items[] = $this->renderPartial('item/list',array('item' => $item),true);
		
		
		$data = array(
			"items" => $items,
		);
		
		$this->render("list", $data);
	}
	
}