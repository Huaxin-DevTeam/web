
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name . ' - Login';
	$this->breadcrumbs=array(
		'Login',
	);
	?>

<div class="form">
	<div class="col-xs-12 blue margenh5">
		<h5>Login</h5>
	</div>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<div class="row">
		<div class="form-group col-sm-6 col-sm-offset-3 col-xs-12">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array("class" => "form-control")); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6 col-sm-offset-3 col-xs-12">			
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array("class" => "form-control")); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3 col-sm-offset-3 gray"><a href="<?php print $this->createUrl("user/password"); ?>">Lost password?</a></div>
		<div class="form-group col-sm-1 col-sm-offset-2 col-xs-offset-1 bigbottom">			
			<div class="button button-register col-xs-offset-5">
			<?php echo CHtml::submitButton('Login'); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>	
</div>
