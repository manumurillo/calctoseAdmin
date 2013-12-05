<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Artículos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Artículos', 'url'=>array('index')),
	array('label'=>'Crear Nuevo Artículo', 'url'=>array('create')),
	array('label'=>'Modificar Artículo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Artículo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de eliminar este artículo?')),
	array('label'=>'Administrador de Artículos', 'url'=>array('admin')),
);
?>

<h1>Artículo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'resumen',
		'contenido:html',
		'thumbnail',
		'vistas',
		'fecha_creacion',
		'fecha_actualizacion',
		'id_categoria',
		'id_registro_usuario',
		'plantilla',
		'url_imagen',
		'pie_imagen',
		'tipo',
	),
)); ?>
