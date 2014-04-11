<?php

/**
* Some random functions used across the application
*/

class Helper extends CComponent{
	
	private static function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
	}
	public static function getEasyToken(){
		$length = 7;
		$token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    for($i=0;$i<$length;$i++){
	        $token .= $codeAlphabet[self::crypto_rand_secure(0,strlen($codeAlphabet))];
	    }
	    return Yii::app()->user->id."-".$token;
	}
	
	public static function getToken($length=25){
	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= "0123456789";
	    for($i=0;$i<$length;$i++){
	        $token .= $codeAlphabet[self::crypto_rand_secure(0,strlen($codeAlphabet))];
	    }
	    return $token;
	}
	
	public static function log($message,$type = "error"){
		$log = new Log;
		$log->message = $message;
		$log->type = $type;
		$log->datetime = new CDbExpression('NOW()');
		$log->save();
	}
	
	public static function getRandomAd($id=0){
		$ad = Ad::model()->find(array(
			"condition" => "NOW() BETWEEN date_published AND date_end AND NOT is_mobile AND id <> $id",
			"order" => new CDbExpression("RAND()"),
		));
		$ad->num_views++;
		$ad->save();
		
		return $ad;
	}
	
	public static function purify($str){
		$str = str_ireplace("€", "&euro;", $str);
		$attr = CHtml::decode(strip_tags($str));
		return $attr;
	}
	
	public static function needLogin($url){
		if(Yii::app()->user->isGuest){
			Yii::app()->user->setReturnUrl($url);
			Yii::app()->user->setFlash('warning', Yii::t('huaxin',"You need to be logged in to perform this action."));
			Yii::app()->request->redirect("/user/login");
		}
	}
	
	public static function getUser(){
		return User::model()->findByPk(Yii::app()->user->id);
	}
	
	public static function getCategories(){
		$cats = Category::model()->findAll();
		$categories = array();
		foreach($cats as $c)
			$categories[$c->id] = $c->name;
		return $categories;
	}
	
	public static function getCount(){
		return count(Item::model()->findAll("NOW() BETWEEN date_published AND date_end" ));
	}
	
	public static function getCreditCost($duration){
		$cost = array(
			7 => 3,
			14 => 5,
			30 => 9,
			60 => 15,
			365 => 30,
		);
		return $cost[$duration];
	}

}