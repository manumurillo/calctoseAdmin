<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Spot', 'url'=>array('index')),
	array('label'=>'Manage Spot', 'url'=>array('admin')),
);
?>

<h1>Create Spot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>