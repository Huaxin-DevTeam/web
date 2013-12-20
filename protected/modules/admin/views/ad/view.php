<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create New Ad', 'url'=>array('create')),
	array('label'=>'Update Ad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ads', 'url'=>array('index')),
);
?>

<h1>View Ad #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image_url',
		'link',
		'is_mobile',
		'num_clicks',
		'date_published',
		'date_end',
	),
)); ?>
