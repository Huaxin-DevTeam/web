<?php
/* @var $this CreditsController */
/* @var $model CreditsManager */

$this->breadcrumbs=array(
	'Credits Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Credits Options', 'url'=>array('index')),
);
?>

<h1>Create Credits Option</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>