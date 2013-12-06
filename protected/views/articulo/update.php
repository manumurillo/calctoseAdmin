<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Artículos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Artículos', 'url'=>array('index')),
	array('label'=>'Crear Artículo', 'url'=>array('create')),
	array('label'=>'Ver Artículo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Artículo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Artículo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>