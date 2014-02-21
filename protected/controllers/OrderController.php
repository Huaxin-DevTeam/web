<?php 

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


class OrderController extends Controller{

	private $option;
	
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
		
		$baseUrl = Yii::app()->baseUrl;
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturn_url("http://huaxin/?success=true");
		$redirectUrls->setCancel_url("http://huaxin/?cancel=true");
		
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
				
		// ### Redirect buyer to paypal
		// Retrieve buyer approval url from the `payment` object.
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirectUrl = $link->getHref();
			}
		}
		
		// It is not really a great idea to store the payment id
		// in the session. In a real world app, please store the
		// payment id in a database.
		$_SESSION['paymentId'] = $payment->getId();
		if(isset($redirectUrl)) {
			header("Location: $redirectUrl");
			exit;
		}

		
		die();
	}
	
	
}