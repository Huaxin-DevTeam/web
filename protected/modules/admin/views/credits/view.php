<?php
/* @var $this CreditsController */
/* @var $model CreditsManager */

$this->breadcrumbs=array(
	'Credits Manager'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Credits Option', 'url'=>array('index')),
	array('label'=>'Create Credits Option', 'url'=>array('create')),
	array('label'=>'Update Credits Option', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Credits Option', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Credits Option #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'num_credits',
		'price',
		'text',
	),
)); ?>
