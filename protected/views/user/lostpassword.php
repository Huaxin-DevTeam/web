<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-password-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model,null,null,array('class'=>"bs-callout bs-callout-danger")); ?>
	<div class="">
		<div class="col-xs-12 blue margenh5">
			<h5><?php print Yii::t("huaxin","Lost Password"); ?></h5>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
			<p>Give us your email and we will send it the reset instructions</p>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
		<?php echo $form->labelEx($model,'captcha'); ?>
			<div class="captcha_wrapper">
			  <?php $this->widget('CCaptcha', array('captchaAction'=>'site/captcha')); ?>
			  <?php echo $form->textField($model,'captcha', array("class" => "form-control","class"=>"captcha")); ?>
			</div>
			<div class="hint">Introduzca las letras que aparecen arriba.
			<br/>No hay distinción entre mayúsculas y minúsculas.</div>
			<?php echo $form->error($model,'captcha'); ?>
			
			<div class="button button-register col-xs-offset-5">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>
		</div>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->