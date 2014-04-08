<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-reset-form',
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
			<h5><?php print Yii::t("huaxin","Reset Password"); ?></h5>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
			<p>Enter your new password below:</p>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3">
			<?php echo $form->labelEx($model,'password2'); ?>
			<?php echo $form->passwordField($model,'password2', array("class" => "form-control")); ?>
			<?php echo $form->error($model,'password2'); ?>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6 col-sm-offset-3 button col-xs-offset-5">
			<?php echo CHtml::submitButton('Submit'); ?>
		</div>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->