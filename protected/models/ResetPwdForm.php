<?php

class ResetPwdForm extends CFormModel{
	
	public $password;
	public $password2;
	
	public function rules(){
		return array(
			array('password,password2','required'),
			array('password,password2','length','min'=>7),
			array('password', 'compare', 'compareAttribute'=>'password2'),
		);
	}
	
	public function attributeLabels(){
		return array(
			"password2" => Yii::t("huaxin","Password confirmation"),
		);
	}
	
}