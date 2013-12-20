<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Ads', 'url'=>array('index')),
);
?>

<h1>Create Ad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>