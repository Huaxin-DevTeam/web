<?php
/* @var $this SiteController */
/* @var $cc LoginForm */
/* @var $form CActiveForm  */
    $this->pageTitle=Yii::app()->name . ' - Payment Method';
    $this->breadcrumbs=array(
        'Login',
    );
    ?>

<div class="form">
    
    <div class="col-xs-12 blue margenh5">
        <h5>Revisa tu compra</h5>
    </div>

    <div>
        Vas a comprar esto:<br>
        <?php print $option->name; ?> (<?php print $option->num_credits; ?> créditos). Precio: <?php print $option->price ?>€<br>
        <br>
    </div>
    <div class="col-xs-12 blue margenh5">
		<h5>Selecciona método de pago: </h5>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
<div class="tabs">
    
   <div class="tab">
       <input type="radio" id="tab-1" name="payment_method" value="bank_transfer" <?php if($selected=="bank_transfer" || $selected == null) echo "checked"; ?>>
       <label for="tab-1">Bank Transfer</label>
       
       <div class="content">
           You will be provided with a security token. Credits won't be available on your account until you make the transfer.
       </div> 
   </div>
    
   <div class="tab">
       <input type="radio" id="tab-2" name="payment_method" value="credit_card" <?php if($selected=="credit_card") echo "checked"; ?>>
       <label for="tab-2">Credit Card</label>
       
       <div class="content">


			<div class="row">
				<div class="col-sm-6">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/secure-creditcard-logo.jpg" height="100px" />
				</div>
				<div class="form-group col-sm-6 col-xs-12">
					<?php echo $form->labelEx($cc,'name'); ?>
					<?php echo $form->textField($cc,'name',array("class" => "form-control")); ?>
					<?php echo $form->error($cc,'name'); ?>
				</div>
				
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6 col-xs-12">
					<?php echo $form->labelEx($cc,'number'); ?>
					<?php echo $form->textField($cc,'number',array("class" => "form-control")); ?>
					<?php echo $form->error($cc,'number'); ?>
				</div>
				<div class="form-group col-xs-2">
					<?php echo $form->labelEx($cc,'month'); ?>
					<?php echo $form->dropDownList($cc,'month',CreditCardForm::getMonths(),array('prompt' => 'Month',"class" => "form-control")); ?>
					<?php echo $form->error($cc,'month'); ?>
				</div>
				<div class="form-group col-xs-2">
					<?php echo $form->labelEx($cc,'year'); ?>
					<?php echo $form->dropDownList($cc,'year',CreditCardForm::getYears(),array('prompt' => 'Year',"class" => "form-control")); ?>
					<?php echo $form->error($cc,'year'); ?>
				</div>
				<div class="form-group col-xs-2">
					<?php echo $form->labelEx($cc,'cvv'); ?>
					<?php echo $form->textField($cc,'cvv',array("class" => "form-control")); ?>
					<?php echo $form->error($cc,'cvv'); ?>
				</div>
			</div>
           
       </div> 
   </div>
    
    <div class="tab">
       <input type="radio" id="tab-3" name="payment_method" value="paypal" <?php if($selected=="paypal") echo "checked"; ?>>
       <label for="tab-3">PayPal</label>
     
       <div class="content">
           <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/secure-paypal-logo.jpg" height="100px" />
           <span>You will be redirected to PayPal webpage.</span>
       </div> 
   </div>
    
</div>

	<div class="row">
		<div class="form-group col-md-offset-8 col-sm-1 col-sm-offset-8 col-xs-offset-1 bigbottom">			
			<div class="button">
			<?php echo CHtml::submitButton('Checkout'); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>	
</div>