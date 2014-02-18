<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ItemForm extends CFormModel
{
	public $category;
	public $title;
	public $description;
	public $price;
	public $phone;
	public $image;
	public $location;
	public $duration;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			//required fields
			array('category, title, description, price, phone, location, duration', 'required'),
			array('title,description','length','min'=>7,'allowEmpty'=>false),
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
