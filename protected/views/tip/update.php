<?php
/* @var $this TipController */
/* @var $model Tip */

$this->breadcrumbs=array(
	'Tips'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Tips', 'url'=>array('index')),
	array('label'=>'Crear nuevo Tip', 'url'=>array('create')),
	array('label'=>'Visualizar Tip', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tips', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tip <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>