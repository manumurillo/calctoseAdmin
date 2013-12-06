<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Todos los spots', 'url'=>array('index')),
	array('label'=>'Crear Spot', 'url'=>array('create')),
	array('label'=>'Editar Spot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Spot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de eliminar este spot?')),
	array('label'=>'Administrar Spots', 'url'=>array('admin')),
);
?>

<h1>Ver Spot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_categoria',
		'id_articulo',
		'p_top',
		'p_left',
		'visible',
	),
)); ?>
