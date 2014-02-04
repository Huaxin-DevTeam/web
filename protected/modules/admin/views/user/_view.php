<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credits')); ?>:</b>
	<?php echo CHtml::encode($data->credits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_register')); ?>:</b>
	<?php echo CHtml::encode($data->date_register); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token')); ?>:</b>
	<?php echo CHtml::encode($data->token); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('device_id')); ?>:</b>
	<?php echo CHtml::encode($data->device_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('push_id')); ?>:</b>
	<?php echo CHtml::encode($data->push_id); ?>
	<br />

	*/ ?>

</div>