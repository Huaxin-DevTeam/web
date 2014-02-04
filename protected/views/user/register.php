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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email', array("class" => "form-control")); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone', array("class" => "form-control")); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row form-group">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2', array("class" => "form-control")); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>	

	<div class="row form-group">
	<?php echo $form->labelEx($model,'captcha'); ?>
		<div>
		  <?php $this->widget('CCaptcha', array('captchaAction'=>'site/captcha')); ?>
		  <?php echo $form->textField($model,'captcha', array("class" => "form-control")); ?>
		</div>
		<div class="hint">Introduzca las letras que aparecen arriba.
		<br/>No hay distinción entre mayúsculas y minúsculas.</div>
		<?php echo $form->error($model,'captcha'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->