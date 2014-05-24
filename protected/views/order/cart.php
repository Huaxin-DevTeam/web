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
        <h5><?php print Yii::t("huaxin", "Revisa tu compra")?></h5>
    </div>

    <div class="resumen-compra col-xs-12">
		<table class="table col-xs-12">
			<tr>
				<th class="col-xs-6"><?php print Yii::t("huaxin", "Resumen de compra:")?></th>
				<th class="col-xs-6"><?php print Yii::t("huaxin", "Precio")?></th>
			</tr>
			<tr>
				<td class="col-xs-6"><?php print $option->name; ?>: <?php print $option->num_credits; ?> <?php print Yii::t("huaxin", "créditos.")?></td>
				<td class="col-xs-6"><?php print $option->price ?>€</td>
			</tr>	
			
		</table>
    </div>
    <div class="col-xs-12 blue margenh5">
		<h5><?php print Yii::t("huaxin", "Selecciona método de pago:")?> </h5>
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
       <label for="tab-1"><?php print Yii::t("huaxin", "Bank Transfer")?></label>
       
       <div class="content">
           <?php print Yii::t("huaxin", "You will be provided with a security token. Credits won't be available on your account until you make the transfer.")?>
       </div> 
   </div>
    
   <div class="tab">
       <input type="radio" id="tab-2" name="payment_method" value="credit_card" <?php if($selected=="credit_card") echo "checked"; ?>>
       <label for="tab-2"><?php print Yii::t("huaxin", "Credit card")?></label>
       
       <div class="content">

			<div class="row">
				<div class="col-sm-6">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/secure-creditcard-logo.jpg" height="100px" />
				</div>
				<div class="col-sm-6">
					<p>
					<?php print Yii::t("huaxin", "Because we want to provide you the maximum security, we delegate the credit card payment to PayPal. You don't need to register to use this service, click here to know how.")?></p>
				</div>
			</div>
           
       </div> 
   </div>
    
    <div class="tab">
       <input type="radio" id="tab-3" name="payment_method" value="paypal" <?php if($selected=="paypal") echo "checked"; ?>>
       <label for="tab-3"><?php print Yii::t("huaxin", "paypal")?></label>
     
       <div class="content">
           <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/secure-paypal-logo.jpg" height="100px" />
           <span><?php print Yii::t("huaxin","You will be redirected to PayPal webpage.")?></span>
       </div> 
   </div>
    
</div>

	<div class="row">
		<div class="form-group col-md-offset-10 col-sm-1 col-sm-offset-10 col-xs-offset-1 bigbottom">			
			<div class="button">
			<?php echo CHtml::submitButton(Yii::t("huaxin","Checkout")); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>	
</div>