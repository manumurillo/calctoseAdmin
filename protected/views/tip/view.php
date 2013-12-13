<?php
/* @var $this TipController */
/* @var $model Tip */

$this->breadcrumbs=array(
	'Tips'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Todos los Tips', 'url'=>array('index')),
	array('label'=>'Crear Nuevo Tip', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está segur@ de eliminar este tip?')),
	array('label'=>'Administrar Tips', 'url'=>array('admin')),
);
?>

<h1>View Tip #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'contenido',
		array(
            'name'=>'fecha_creacion',
            'value' => Yii::app()->dateFormatter->format("dd/MMMM/y", $model->fecha_creacion),
            'filter'=>false,
        ),
        array(
            'name'=>'fecha_actualizacion',
            'value' => Yii::app()->dateFormatter->format("dd/MMMM/y", $model->fecha_actualizacion),
            'filter'=>false,
        ),
        array(
            'name' => 'destacado',
            'value' => function($data){
                     return Tip::getDestacadoText($data->destacado);
                   }
        ),    
	),
)); ?>
