<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'View Item', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Items', 'url'=>array('index')),
);
?>

<h1>Update Item <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>