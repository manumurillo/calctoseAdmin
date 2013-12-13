<?php
/* @var $this TipController */
/* @var $model Tip */

$this->breadcrumbs=array(
	'Tips'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Tips', 'url'=>array('index')),
	array('label'=>'Administrar Tips', 'url'=>array('admin')),
);
?>

<h1>Crear Tip</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>