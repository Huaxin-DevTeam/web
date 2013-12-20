<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create New Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categories', 'url'=>array('index')),
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>