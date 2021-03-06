<?php

class UserController extends Controller{
	
	public function init(){
		parent::init();
	}
	
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
	        
	        // Validation filters (email,phone,pwd)
	        if($form->validate())
	        {	            
	            //Validation
	            $auser = User::model()->find("LOWER(email) = :email OR LOWER(phone) = :phone",
					array(":email" => $email, ":phone" => $phone)
				);
				
				
	           	if($auser){
		           	if($auser->email == $form->email) $form->addError("email",Yii::t("huaxin","This email is already registered!"));
					if($auser->phone == $form->phone) $form->addError("phone",Yii::t("huaxin","This phone is already registered!"));
	           	}else{
	           		
	           		//Set fields
	           		$user = new User;
	           		$user->active = 0;
	           		$user->email = $form->email;
	           		$user->phone = $form->phone;
	           		$user->password = $user->hashPassword($passw);
			   		$user->date_register = new CDbExpression('NOW()');
			   		$user->token = Helper::getToken();
			   		
			   		//Create email to confirm
			   		$mail = new YiiMailer('confirmation', array(
				   		'email' => $user->email, 
				   		'link' => Yii::app()->createAbsoluteUrl('user/confirm', array('token' => $user->token))
			   		));

			   		$mail->setFrom("info@huaxin.com", "HUAXIN");
			   		$mail->setSubject("Huaxin Account Confirmation");
			   		$mail->setTo($user->email);
			   		//$mail->setTo("friko67@gmail.com");

					if($mail->send()) {
						Yii::app()->user->setFlash('success','Thank you for registering. Please, check your email and follow the instructions.');
					}else{
						Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
					}
					
					//Save!
			   		$user->save();
			   		
			   		$this->redirect(Yii::app()->homeUrl);
	           	}
	        }
	    }
	    $this->render('register',array('model'=>$form));
	}
	
	public function actionConfirm($token)
	{
		$user = User::model()->find("token = :token AND active = 0", 
					array(":token" => $token)
				);
		if(!$user){
			Yii::app()->user->setFlash('danger', "no existe el user");
			$this->redirect(Yii::app()->homeUrl);
		}
		else{
			$user->active = 1;
			$user->token = Helper::getToken();
			$user->save();
			
			Yii::app()->user->setFlash('success', "Usuario registrado correctamente");
			$this->redirect(Yii::app()->homeUrl);
		}
	}
	
	public function actionPassword(){
		$form = new LostPasswordForm;
		
		if(isset($_POST['LostPasswordForm'])){
			$form->attributes = $_POST['LostPasswordForm'];
			
			$email  = strtolower(trim($_POST['LostPasswordForm']['email']));
						
			$form->email = $email;
			
			if($form->validate()){
				
				$auser = User::model()->find("LOWER(email) = :email",
					array(":email" => $email)
				);
				
				
	           	if(!$auser){
		           	$form->addError("email",Yii::t("huaxin","This email is not on our database!"));
	           	}else{
	           		
			   		$auser->token = Helper::getToken();
			   		
			   		//Create email to confirm
			   		$mail = new YiiMailer('password', array(
				   		'email' => $auser->email, 
				   		'link' => Yii::app()->createAbsoluteUrl('user/resetpwd', array('token' => $auser->token))
			   		));

			   		$mail->setFrom("info@huaxin.com", "HUAXIN");
			   		$mail->setSubject("Huaxin Account Password Reset");
			   		$mail->setTo($auser->email);
			   		//$mail->setTo("friko67@gmail.com");

					if($mail->send()) {
						Yii::app()->user->setFlash('success','Succes. Please, check your email and follow the instructions.');
					}else{
						Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
					}
					
					//Save!
			   		$auser->save();
			   		
			   		$this->redirect(Yii::app()->homeUrl);
	           	}
			}
			
		}
		
		$this->render('lostpassword', array('model'=>$form));
	}
	
	public function actionResetpwd($token)
	{
		
		$form = new ResetPwdForm;
		
		$user = User::model()->find("token = :token", 
							array(":token" => $token)
				);
		
		if(isset($_POST['ResetPwdForm'])){
			
			$form->attributes = $_POST['ResetPwdForm'];
			
			$passw  = trim($_POST['ResetPwdForm']['password']);
			$passw2 = trim($_POST['ResetPwdForm']['password2']);
			
			$form->password = $passw;
			$form->password2 = $passw2;
			
			if($form->validate()){
				
				if(!$user){
					Yii::app()->user->setFlash('danger', "Wrong token!");
					$this->redirect(Yii::app()->homeUrl);
				}
				
				$user->password = $user->hashPassword($passw);
				$user->save();
				
				Yii::app()->user->setFlash('success','All done! You can login with your new password now.');
				$this->redirect(Yii::app()->homeUrl);
			}			
			
		}else{
		
			if(!$user){
				Yii::app()->user->setFlash('danger', "Wrong token!");
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		
		$this->render('resetpwd', array("model" => $form, "token" => $token));
	}
	
}