<?php

class SiteController extends Controller
{
	public $maxprice = 1;
		
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
		
		$this->render('index', $data);
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
/*	public function actionContact()
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
	} */
	
	public function actionView($id){
		
		$item = Item::model()->findByPk($id);
		
		$data = array('item' => $item);
		$this->render("item", $data);
	}

	public function actionMyads(){
		
		$sql = "NOW() BETWEEN date_published AND date_end AND user_id = :id";
		$opts = array(":id" => Yii::app()->user->id);
		
		$dbitems = Item::model()->findAll($sql,$opts);
		
		$page = 3;
		$total = count($dbitems);
		
		$pages =new CPagination($total);
		$pages->setPageSize($page);
		
		$sql .= " LIMIT :offset, :limit";
		$opts[':offset'] = $pages->offset;
		$opts[':limit'] = $page;
		
		$dbitems = Item::model()->findAll($sql,$opts);
		
		$items = array();

		foreach($dbitems as $item)
			$items[] = $this->renderPartial('//item/list',array('item' => $item),true);
		
		
		$data = array(
			"items" => $items,
			"pages" => $pages,
		);
		
		$this->render("list", $data);
	}
	
	public function actionCategory($id=0){

		$this->layout = "//layouts/huaxin-filters";
		
		//Get filters
		$this->filters = new FiltersForm;
		
		$sql = "NOW() BETWEEN date_published AND date_end";
		$opts = array();
		
		$maxitem = Item::model()->find($sql." ORDER BY price DESC",$opts);
		$this->maxprice = $maxitem->price;
		
		if($id > 0){
			$sql .= " AND category_id = :id";
			$opts[":id"] = $id;
		}
		
		if(isset($_POST['FiltersForm'])){
			$this->filters->attributes = $_POST['FiltersForm'];
			
			$text = trim($this->filters->text);
			if($text != "" && $text != null){
				$sql .= " AND (title LIKE :text OR description LIKE :text)";
				$opts[':text'] = "%$text%";
			}
			
			
			$min = trim($this->filters->pricemin);
			if($min != null && $min != ""){
				$sql .= " AND price >= :min";
				$opts[':min'] = $min;
			}
			
			$max = trim($this->filters->pricemax);
			if($max != null && $max != ""){
				$sql .= " AND price <= :max";
				$opts[':max'] = $max;
			}

			$loc = trim($this->filters->location);
			if($loc != null && $loc != ""){
				$sql .= " AND location LIKE :loc";
				$opts[':loc'] = "%$loc%";
			}
		}
		
		$dbitems = Item::model()->findAll($sql,$opts);
		
		$page = 3;
		$total = count($dbitems);
		
		$pages =new CPagination($total);
		$pages->setPageSize($page);
		
		$sql .= " LIMIT :offset, :limit";
		$opts[':offset'] = $pages->offset;
		$opts[':limit'] = $page;
		
		$dbitems = Item::model()->findAll($sql,$opts);
		
		$items = array();

		foreach($dbitems as $item)
			$items[] = $this->renderPartial('//item/list',array('item' => $item),true);
		
		$data = array(
			"items" => $items,
			"pages" => $pages,
		);
		
		$this->render("list", $data);
	}
	
	
	/** New Item! **/
	public function actionNew()
	{
		Helper::needLogin($this->createUrl("/new"));
		
		$user = Helper::getUser();
		
		if($user->credits < 1){
			Yii::app()->user->setFlash('warning', Yii::t('huaxin',"You need to buy some credits to create new ads."));
			$this->redirect("order/select");
		}
		
		$model = new ItemForm;
		
		if($user->phone != null && $user->phone != "")
			$model->phone = $user->phone;
		
		if(isset($_POST['ItemForm'])){
			$model->attributes = $_POST['ItemForm'];
			
			if($model->validate()){
				//Ok, create!
				
				$premium = strtolower($model->premium) == "on";
				$duration = $model->duration;
				$num_credits = $duration + ($premium ? 2*$duration : 0);
				
				$item = new Item;
				$item->user_id = $user->id;
				$item->category_id = $model->category;
				$item->title = Helper::purify($model->title);
				$item->description = Helper::purify($model->description);
				$item->price = $model->price;
				$item->phone = $model->phone;
				$item->image_url = "/img/placeholder.png";//$model->??;
				$item->location = Helper::purify($model->location);
				$item->date_published = new CDbExpression('NOW()');
				$item->date_end = new CDbExpression("NOW() + INTERVAL $duration DAY");
				$item->premium = $premium ? 1 : 0;
				
				if(!$item->validate()){
					die(print_r($item->getErrors()));
				}
				
				$item->save();
				$user->credits -= $num_credits;;
				$user->save();
				
				Yii::app()->user->setFlash('success',Yii::t("huaxin","Creation successful."));
				$this->redirect("/view/".$item->id);
			}
			
		}
				
		$data = array(
			'model' => $model,
		);		
		
		$this->render('//item/form',$data);
	}
	
	public function actionEdit($id)
	{
		Helper::needLogin($this->createUrl("/edit/$id"));
		
		$user = Helper::getUser();
		$item = Item::model()->findByPk($id);
		
		if($item->user_id != $user->id){
			Yii::app()->user->setFlash('danger',Yii::t("huaxin","You cannot edit this item!"));
			$this->redirect(Yii::app()->getHomeUrl());
		}
		
		
		$model = new ItemForm;
		
		if(isset($_POST['ItemForm'])){
			$model->attributes = $_POST['ItemForm'];
			//small hack to validate
			$model->duration = floor(abs(strtotime($item->date_published)-strtotime($item->date_end))/(60*60*24));
			
			if($model->validate()){
				//Ok, create!

				$item->category_id = $model->category;
				$item->title = Helper::purify($model->title);
				$item->description = Helper::purify($model->description);
				$item->price = $model->price;
				$item->phone = $model->phone;
				$item->image_url = "/img/placeholder.png";//$model->??;
				$item->location = Helper::purify($model->location);
				
				if(!$item->validate()){
					die(print_r($item->getErrors()));
				}
				
				$item->save();
				
				Yii::app()->user->setFlash('success',Yii::t("huaxin","Update successful."));
				$this->redirect("/view/".$item->id);
			}
			
		}else{
			//Fill in previous data
			$model->category = $item->category_id;
			$model->title = $item->title;
			$model->description = $item->description;
			$model->price = $item->price;
			$model->phone = $item->phone;
			$model->image = $item->image_url;
			$model->location = $item->location;
		}
				
		$data = array(
			'model' => $model,
		);		
		
		$this->render('//item/form-edit',$data);
	}
	
	public function actionDelete($id)
	{
		Helper::needLogin($this->createUrl("/view/$id"));
		
		$user = Helper::getUser();
		$item = Item::model()->findByPk($id);
		
		if($item->user_id != $user->id){
			Yii::app()->user->setFlash('danger',Yii::t("huaxin","You cannot delete this item!"));
			$this->redirect(Yii::app()->getHomeUrl());
		}
		
		$item->delete();
		
		Yii::app()->user->setFlash('success',Yii::t("huaxin","Delete successful."));
		$this->redirect(Yii::app()->getHomeUrl());
	}	
}