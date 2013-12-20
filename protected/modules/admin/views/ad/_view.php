<?php
/* @var $this AdController */
/* @var $data Ad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->is_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_clicks')); ?>:</b>
	<?php echo CHtml::encode($data->num_clicks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_published')); ?>:</b>
	<?php echo CHtml::encode($data->date_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_end')); ?>:</b>
	<?php echo CHtml::encode($data->date_end); ?>
	<br />


</div>