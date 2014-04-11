<?php


class SearchForm extends CFormModel
{
	public $query;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('query', 'required'),
			array('query','length','min'=>2),
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