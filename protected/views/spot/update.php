<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Todos los Spots', 'url'=>array('index')),
	array('label'=>'Crear Spot', 'url'=>array('create')),
	array('label'=>'Ver Spot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Spots', 'url'=>array('admin')),
);
?>

<h1>Actualizar Spot <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>