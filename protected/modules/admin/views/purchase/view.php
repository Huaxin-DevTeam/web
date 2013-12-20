<?php
/* @var $this PurchaseController */
/* @var $model Purchase */

$this->breadcrumbs=array(
	'Purchases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Manage Purchases', 'url'=>array('index')),
);
?>

<h1>View Purchase #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'method',
		'num_credits',
		'date',
		'token',
	),
)); ?>
