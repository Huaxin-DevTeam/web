<?php

class MyCCValidator extends CValidator{
	
	/**
	 * Validates the attribute of the object.
	 * If there is any error, the error message is added to the object.
	 * @param CModel $object the object being validated
	 * @param string $attribute the attribute being validated
	 */
	protected function validateAttribute($object,$attribute){
		Yii::import('ext.validators.ECCValidator');
		$cc = new ECCValidator();
		
		if(!$cc->validateDate($object->month,$object->year)){
			$this->addError($object,$attribute,'Expiry date is invalid');
		}
	}
}