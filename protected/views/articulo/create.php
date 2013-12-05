<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Artículos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Artículos', 'url'=>array('index')),
	array('label'=>'Administrar Artículos', 'url'=>array('admin')),
);
?>

<h1>Crear Artículo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>