
<div class="container">

<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name . ' - Login';
	$this->breadcrumbs=array(
		'Login',
	);
	?>
	<div class="row">
		<div class="col-sm-5 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<h1>Login</h1>

		<p>Please fill out the following form with your login credentials:</p>

			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>

				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>
		</div>
			
	</div>
		<div class="row">
			<div class="form-group col-sm-5 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username',array("class" => "form-control")); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-5 col-sm-offset-3 col-xs-10 col-xs-offset-1">			
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password',array("class" => "form-control")); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		</div>

		<div class="row button">
			<div class="form-group col-md-offset-7 col-sm-1 col-sm-offset-3 col-xs-offset-1">			
				<?php echo CHtml::submitButton('Login'); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
