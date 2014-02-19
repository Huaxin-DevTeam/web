<?php
/* @var $this CreditsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Credits Options',
);

$this->menu=array(
	array('label'=>'Create Credits Option', 'url'=>array('create')),
	array('label'=>'Manage Credits Options', 'url'=>array('admin')),
);
?>

<h1>Credits Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
