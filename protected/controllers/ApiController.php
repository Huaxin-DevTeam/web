<?php

class ApiController extends Controller
{
	public $layout='//layouts';
	
	private function _render($data){
		$this->render('api', array("data" => $data));
	}
	
	public function actionIndex()
	{	
		$data = array(
			"name" => "HUAXIN API",
			"version" => "0.1",
			"message" => "Welcome!",
		);
		return $this->_render($data);
	}
	
	public function actionAd()
	{
		$data = array("message" => "ad");
		return $this->_render($data);
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
		$data = array("message" => "login");
		return $this->_render($data);
	}

	public function actionMyads()
	{
		$data = array("message" => "myads");
		return $this->_render($data);
	}

	public function actionRegister()
	{
		$data = array("message" => "register");
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