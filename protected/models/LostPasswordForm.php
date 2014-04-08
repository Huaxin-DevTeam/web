<?php

class LostPasswordForm extends CFormModel
{
	public $email;
	public $captcha;
	
	public function rules(){
		return array(
			array('email,captcha','required'),
			array('email','email'),
			array('captcha','captcha','captchaAction'=>'site/captcha'),
		);
	}
	
	public function attributeLabels(){
		return array(
			"captcha" => Yii::t("huaxin","Verification code"),
		);
	}
}
