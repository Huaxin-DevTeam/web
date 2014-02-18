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
	public function actionNew(){
		
		$model = new ItemForm;
		
		if(isset($_POST['ItemForm'])){
			$model->attributes = $_POST['ItemForm'];
			
			if($model->validate()){
				die("OK!");
			}
			
		}
				
		$data = array(
			'model' => $model,
		);		
		
		$this->render('//item/form',$data);
	}
	
}