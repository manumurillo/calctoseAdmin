<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	'Crear nuevo spot',
);

$this->menu=array(
	array('label'=>'Todos los Spots', 'url'=>array('index')),
	array('label'=>'Administrar Spots', 'url'=>array('admin')),
);
?>

<h1>Crear nuevo Spot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>