<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	public $layout = "//layouts/huaxin";
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $main_menu=array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	
	//Custom
	public $model = null;
	public $loginModel = null;	

	public $ads = null;
	public $categories = null;
	


	
	public function init(){
		parent::init();
		
		//Load categories
		$this->categories = Category::model()->findAll(array('order' => "id"));
		
		//Load ads
		$ads = array();
		$ads[] = $this->renderPartial("//item/ad",array("ad" => Helper::getRandomAd()),true);
		$ads[] = $this->renderPartial("//item/ad",array("ad" => Helper::getRandomAd()),true);
		$this->ads = $ads;
		
		//Login form
		$this->loginModel=new LoginForm;	
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$this->loginModel->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($this->loginModel->validate() && $this->loginModel->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
	}
}