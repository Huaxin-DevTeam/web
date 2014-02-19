<?php 

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


class OrderController extends Controller{
	
	public function init(){
		parent::init();
		require_once(Yii::getPathOfAlias('application.vendor') . '/autoload.php');
		//define('PP_CONFIG_PATH', Yii::getPathOfAlias('application.vendor.paypal'));
	}
	
	public function actionSelect(){
		
		$options = CreditsManager::model()->findAll();
		
		$opts = array();

		foreach($options as $opt)
			$opts[] = $this->renderPartial('//item/credit_option',array('item' => $opt),true);
				
		$data = array('options' => $opts);
		$this->render('select',$data);
	}
	
	public function actionCart($id){
		
		$opt = CreditsManager::model()->findByPk($id);
				
		/*$sdkConfig = array(
			"mode" => "sandbox"
		);
		
		$clientId = "AUxj2xDEyYYSXi8-ylvmYMdHdpzc9nXziw5USXrWVxRFmqnu0GvS-5y9Q1eA";
		$clientSecret = "EEyfGRCLZ-cadLxwCHnhw-XmYG6G2bpU4_d7ohT0hcmN_Ao2EsWtwWwf29dW";
		
		$cred = new OAuthTokenCredential($clientId,$clientSecret,$sdkConfig);
		
		$apiContext = new ApiContext($cred,'Request' . time());
		$apiContext->setConfig($sdkConfig);
		
		$payer = new Payer();
		$payer->setPayment_method("paypal");
		
		$amount = new Amount();
		$amount->setCurrency("EUR");
		$amount->setTotal("12");
		
		$transaction = new Transaction();
		$transaction->setDescription("creating a payment");
		$transaction->setAmount($amount);
		
//		$baseUrl = getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturn_url("https://devtools-paypal.com/guide/pay_paypal/php?success=true");
		$redirectUrls->setCancel_url("https://devtools-paypal.com/guide/pay_paypal/php?cancel=true");
		
		$payment = new Payment();
		$payment->setIntent("sale");
		$payment->setPayer($payer);
		$payment->setRedirect_urls($redirectUrls);
		$payment->setTransactions(array($transaction));

		$payment->create($apiContext);
		
//		echo "<pre>";
//		print_r($payment);
		
//		die($id); */

		$data = array('option' => $opt);
		$this->render('cart',$data);
	}
	
	
}