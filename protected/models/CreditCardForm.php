<?php

/**
 * CreditCard class.
 */
class CreditCardForm extends CFormModel
{
	public $name;
	public $number;
	public $month;
	public $year;
	public $cvv;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		Yii::import('ext.validators.ECCValidator');
		Yii::import('ext.validators.MyCCValidator');
		return array(
			array('number','ext.validators.ECCValidator'),
			array('year','ext.validators.MyCCValidator'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}
	
	public function getMonths(){
		$months = array();
		for($i=1;$i<=12;$i++)
			$months[$i] = $i;
		return $months;
	}
	
	public function getYears(){
		$years = array();
		$currentYear = intval(date('Y'));
		for($year = $currentYear; $year <= $currentYear+10;$year++)
			$years[$year] = $year;
		return $years;
	}
}