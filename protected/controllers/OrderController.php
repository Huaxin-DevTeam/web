<?php 

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


class OrderController extends Controller{

	private $option;
	private $payerId;
	private $token;
	
	public function init(){
		parent::init();
		require_once(Yii::getPathOfAlias('application.vendor') . '/autoload.php');
		//define('PP_CONFIG_PATH', Yii::getPathOfAlias('application.vendor.paypal'));
	}
	
	public function actionSelect(){
	
		Helper::needLogin($this->createUrl("/order/select"));
		
		$options = CreditsManager::model()->findAll();
		
		$opts = array();

		foreach($options as $opt)
			$opts[] = $this->renderPartial('//item/credit_option',array('item' => $opt),true);
				
		$data = array('options' => $opts);
		$this->render('select',$data);
	}
	
	public function actionCart($id){
		
		Helper::needLogin($this->createUrl("/order/cart/$id"));
		
		$this->option = CreditsManager::model()->findByPk($id);

		$cc = new CreditCardForm;
		
		$selected = isset($_POST['payment_method']) ? $_POST['payment_method'] : null;
		
		if($selected != null){
			
			$method = $_POST['payment_method'];
			
			switch($method){
				
				case "bank_transfer": 
					die($method); 
					break;
				
				case "credit_card": 
					$cc->attributes = $_POST['CreditCardForm'];
					if($cc->validate()){
						$this->processCreditCard($cc);
					}
					break;
					
				case "paypal": 
					$this->startPayPalTransaction(); 
					break;
				
				default: 
					$this->redirect(Yii::app()->homeUrl);
			}
			
		}

		$data = array('cc' => $cc, 'option' => $this->option, 'selected' => $selected);
		$this->render('cart',$data);
	}
	
	private function processCreditCard($cc){
		//die(print_r($cc));
		
	}
	
	private function startPayPalTransaction(){
		$sdkConfig = array(
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
		$amount->setTotal($this->option->price);
		
		$transaction = new Transaction();
		$transaction->setDescription($this->option->name. " (".$this->option->num_credits." credits)");
		$transaction->setAmount($amount);
		
		$baseUrl = Yii::app()->getbaseUrl(true);
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturn_url($baseUrl."/order/buy?success=true");
		$redirectUrls->setCancel_url($baseUrl."/order/buy?cancel=true");
		
		$payment = new Payment();
		$payment->setIntent("sale");
		$payment->setPayer($payer);
		$payment->setRedirect_urls($redirectUrls);
		$payment->setTransactions(array($transaction));
		
		
		
		try {
			$payment->create($apiContext);
		} catch (\PPConnectionException $ex) {
			echo "Exception: " . $ex->getMessage() . PHP_EOL;
			var_dump($ex->getData());	
			exit(1);
		}				
		
		$token = null;
		
		// Retrieve buyer approval url from the `payment` object.
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirectUrl = $link->getHref();
				
				$parts = parse_url($redirectUrl);
				parse_str($parts['query'], $query);
				$token = $query['token'];
			}
		}
		
		//Store in our db...
		$purchase = new Purchase();
		$purchase->user_id = Yii::app()->user->id;
		$purchase->method = strtoupper("paypal");
		$purchase->num_credits = $this->option->num_credits;
		$purchase->date = new CDbExpression('NOW()');
		$purchase->status = 0;
		$purchase->token = $token;
		$purchase->payment_token = $payment->getId();
		if($purchase->validate()){
			$purchase->save();
		}else{
			echo "ERROR: " . PHP_EOL;
			print_r($purchase->getErrors());
			exit;
		}
		
		// ### Redirect buyer to paypal
		if(isset($redirectUrl)) {
			header("Location: $redirectUrl");
			exit;
		}
	}
	
	public function actionBuy(){
	
		Helper::needLogin($this->createUrl("/order/select"));
		
		if( (!isset($_GET['success']) && !isset($_GET['cancel'])) || !isset($_GET['token'])){
			$this->redirect(Yii::app()->homeUrl);
			exit;
		}
		
		$success = isset($_GET['success']) ? $_GET['success'] : false;
		$token = trim($_GET['token']);
		
		if($success && $token != null && $token != ""){
			$payerId = $_GET['PayerID'];
			$this->render("buy", array('token' => $token, 'payerId' => $payerId));
			exit;
		}
		
		$this->redirect("/order/cancel");
	}
	
	public function actionConfirm($token,$payerId){
	
		Helper::needLogin($this->createUrl("/order/select"));
		
		$purchase = Purchase::model()->find(
			"user_id = :uid AND status = 0 AND token = :token",
			array(
				':uid' => Yii::app()->user->id,
				':token' => $token,
			)
		);
		
		if($purchase){
			
			$sdkConfig = array(
				"mode" => "sandbox"
			);
			
			$clientId = "AUxj2xDEyYYSXi8-ylvmYMdHdpzc9nXziw5USXrWVxRFmqnu0GvS-5y9Q1eA";
			$clientSecret = "EEyfGRCLZ-cadLxwCHnhw-XmYG6G2bpU4_d7ohT0hcmN_Ao2EsWtwWwf29dW";
			
			$cred = new OAuthTokenCredential($clientId,$clientSecret,$sdkConfig);
			
			$apiContext = new ApiContext($cred,'Request' . time());
			$apiContext->setConfig($sdkConfig);
			
			$payment = Payment::get($purchase->payment_token, $apiContext);

			$execution = new PaymentExecution();
			$execution->setPayer_id($payerId);
			
			$payment->execute($execution, $apiContext);
			
			//Hacer las acciones que tocan en nuestra BBDD
			$purchase->status = 1;
			$purchase->save();
			
			$user = User::model()->findByPk(Yii::app()->user->id);
			$user->credits += $purchase->num_credits;
			$user->save();
			
			Yii::app()->user->setFlash('success', Yii::t('huaxin',"Thank you for your purchase!"));
			$this->redirect(Yii::app()->homeUrl);
			
		}else{
			die("no purchase");
		}
	}
	
	public function actionCancel($token = null){
		
		Helper::needLogin($this->createUrl("/order/select"));
		
		if($token != null)
			$this->token = $token;
		
		Purchase::model()->deleteAll('token = :token', array(':token' => $this->token));
		
		$this->render('cancel');
	}
	
	
}