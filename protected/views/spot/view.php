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
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de eliminar este spot?')),
	array('label'=>'Administrar Spots', 'url'=>array('admin')),
);
?>

<h1>Ver Spot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
            'name'=>'id_categoria',
            'value'=>$model->idCategoria->nombre,
        ),
        array(
            'name' =>'id_articulo',
            'value'=>$model->idArticulo->titulo,
        ),
        array(
            'name' => 'p_top',
            'value' => $model->p_top.'px'
        ),
        array(
            'name' => 'p_left',
            'value' => $model->p_left.'px'
        ),
		array(
            'name' => 'visible',
            'value' => function($model){
                     return Spot::getVisibleText($model->visible);
                   }
        ),
	),
)); ?>
