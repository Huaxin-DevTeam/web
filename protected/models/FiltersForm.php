<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FiltersForm extends CFormModel
{
	public $category;
	public $text;
	public $price;
	public $pricemin;
	public $pricemax;
	public $location;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			//required fields
			array('text,location','length','min'=>3),
			array('price,pricemin,pricemax','numerical'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}
}
