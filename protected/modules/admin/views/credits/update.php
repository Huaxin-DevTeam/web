<?php
/* @var $this CreditsController */
/* @var $model CreditsManager */

$this->breadcrumbs=array(
	'Credits Manager'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Credits Option', 'url'=>array('index')),
	array('label'=>'Create Credits Option', 'url'=>array('create')),
	array('label'=>'View Credits Option', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Credits Options <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>