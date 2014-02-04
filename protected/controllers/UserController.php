<?php

class UserController extends Controller{
	
	public $layout = "//layouts/huaxin-nologin";
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//$this->layout = "//layouts/column1";
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegister()
	{
	    $form=new RegisterForm;
	
	    if(isset($_POST['RegisterForm']))
	    {
	    	$form->attributes = $_POST['RegisterForm'];

	        $email  = strtolower(trim($_POST['RegisterForm']['email']));
	        $phone  = strtolower(str_replace( array(" ","-","+",".") , "" , trim($_POST['RegisterForm']['phone']) ));
			$passw  = trim($_POST['RegisterForm']['password']);
			$passw2 = trim($_POST['RegisterForm']['password2']);
			
			$form->email    = $email;
			$form->phone    = $phone;
			$form->password = $passw;
			$form->password2 = $passw2;			
			
	    	echo "<pre>"; print_r($form); echo "</pre>";
	        
	        //Set manual fields
/*	        $user->date_register = new CDbExpression('NOW()');
	        $user->token = Helper::getToken();
	        $user->password = ""; */
	        
	        // Validation filters (email,phone,pwd)
/*			if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) return $this->_error(406, "Please, enter a valid email address.");
			if(strlen($phone) !== 9 || !ctype_digit($phone)) return $this->_error(406, "Please, enter a valid phone number.");
			if(strlen($passw) < 7) return $this->_error(406, "Please, make sure that password is at least 7 characters long.");
			
			$auser = User::model()->find(
				"LOWER(email) = :email OR LOWER(phone) = :phone",
				array(":email" => $email, ":phone" => $phone)
			);
			
			if($auser) return $this->_error(409, "This email/phone is already registered!");
	        
	         */
	        if($form->validate())
	        {
	            // form inputs are valid, do something here
	           	            
	            return;
	        }
	    }
	    $this->render('register',array('model'=>$form));
	}
	
}