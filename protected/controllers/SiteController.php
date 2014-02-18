<?php

class SiteController extends Controller
{
	private function _render($template,$data){
		//Do something?
		$this->render($template,$data);
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
		// Load premium items
		
		$data = array(
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
			$items[] = $this->renderPartial('//item/list',array('item' => $item),true);
		
		
		$data = array(
			"items" => $items,
		);
		
		$this->render("list", $data);
	}
	
	
	/** New Item! **/
	public function actionNew()
	{
		//Solo login!
		if(Yii::app()->user->isGuest){
			Yii::app()->user->setReturnUrl("/new");
			Yii::app()->user->setFlash('warning', Yii::t('huaxin',"You need to be logged in to create new ads."));
			$this->redirect("user/login");
		}
		
		$model = new ItemForm;
		
		if(isset($_POST['ItemForm'])){
			$model->attributes = $_POST['ItemForm'];
			
			if($model->validate()){
				//Ok, create!
				
				$user = Helper::getUser();
				$duration = $model->duration;
				$num_credits = 1 + $duration;
				
				$item = new Item;
				$item->user_id = $user->id;
				$item->category_id = $model->category;
				$item->title = Helper::purify($model->title);
				$item->description = Helper::purify($model->description);
				$item->price = $model->price;
				$item->phone = $model->phone;
//				$item->image_url = $model->??;
				$item->location = Helper::purify($model->location);
				$item->date_published = new CDbExpression('NOW()');
				$item->date_end = new CDbExpression("NOW() + INTERVAL $duration DAY");
				
				if(!$item->validate()){
					die(print_r($item->getErrors()));
				}
				
				//$item->save();
				print_r($item);
				$user->credits -= $num_credits;
				print_r($user);
				//$user->save();
			}
			
		}
				
		$data = array(
			'model' => $model,
		);		
		
		$this->render('//item/form',$data);
	}
	
}