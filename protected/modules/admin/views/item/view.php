<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Items', 'url'=>array('index')),
);
?>

<h1>View Item #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'category_id',
		'title',
		'description',
		'price',
		'phone',
		'image_url',
		'location',
		'date_published',
		'date_end',
		'num_views',
	),
)); ?>
