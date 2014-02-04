<?php

class RegisterForm extends CFormModel{
	
	public $email;
	public $phone;
	public $password;
	public $password2;
	public $captcha;
	
	public function rules(){
		return array(
			array('email,password,password2,captcha','required'),
			array('phone','numerical',
				'integerOnly'=>true,
				'integerPattern'=>"/^[6,7,9](\d){8}$/",
				'min'=>9,
				'message'=> Yii::t("huaxin","Invalid number format"),
			),
			array('email','email'),
			array('password,password2','length','min'=>7),
			array('password', 'compare', 'compareAttribute'=>'password2'),
			array('captcha','captcha','captchaAction'=>'site/captcha'),
		);
	}
	
	public function attributeLabels(){
		return array(
			"password2" => Yii::t("huaxin","Password confirmation"),
			"captcha" => Yii::t("huaxin","Verification code"),
		);
	}
	
}