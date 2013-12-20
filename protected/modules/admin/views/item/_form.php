<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published'); ?>
		<?php echo $form->error($model,'date_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end'); ?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_views'); ?>
		<?php echo $form->textField($model,'num_views'); ?>
		<?php echo $form->error($model,'num_views'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->