<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php //echo $form->errorSummary($model); ?>
	<div class="">
		<div class="col-xs-12 blue margenh5">
			<h5><?php print Yii::t("huaxin", "Nuevo registro")?></h5>
		</div>
	</div>
		
	<div class="row">
		<div class="form-group col-xs-6">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		<div class="form-group col-xs-6">
			<?php echo $form->labelEx($model,'phone'); ?>
			<?php echo $form->textField($model,'phone', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'phone'); ?>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	
		<div class="form-group col-xs-6">
			<?php echo $form->labelEx($model,'password2'); ?>
			<?php echo $form->passwordField($model,'password2', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'password2'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
		<?php echo $form->labelEx($model,'captcha'); ?>
			<div class="captcha_wrapper">
			  <?php $this->widget('CCaptcha', array('captchaAction'=>'site/captcha')); ?>
			  <?php echo $form->textField($model,'captcha', array("class" => "form-control","class"=>"captcha")); ?>
			</div>
			<div class="hint"><?php print Yii::t("huaxin", "Introduzca las letras que aparecen arriba.")?>
			<br/><?php print Yii::t("huaxin", "No hay distinción entre mayúsculas y minúsculas.")?></div>
			<?php echo $form->error($model,'captcha'); ?>
			
			<div class="button button-register col-xs-offset-5">
				<?php echo CHtml::submitButton(Yii::t("huaxin", "Submit")); ?>
			</div>
		</div>
		
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->