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
	
	public static function getRandomAd($mobile=false){
		$ad = Ad::model()->find(array(
			"condition" => "NOW() BETWEEN date_published AND date_end AND NOT is_mobile",
			"order" => new CDbExpression("RAND()"),
		));
		$ad->num_views++;
		$ad->save();
		
		return $ad;
	}
	
	public static function purify($str){
		 $attr = CHtml::decode(strip_tags($str));
		 $p = new CHtmlPurifier();
		 return $p->purify($attr);
	}
	
	public static function needLogin($url){
		if(Yii::app()->user->isGuest){
			Yii::app()->user->setReturnUrl($url);
			Yii::app()->user->setFlash('warning', Yii::t('huaxin',"You need to be logged in to create new ads."));
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

}