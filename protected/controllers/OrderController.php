<?php 

class OrderController extends Controller{
	
	public function actionSelect(){
		$data = array();
		$this->render('select',$data);
	}
	
	
}