<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Ad', 'url'=>array('create')),
	array('label'=>'View Ad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ads', 'url'=>array('index')),
);
?>

<h1>Update Ad <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>