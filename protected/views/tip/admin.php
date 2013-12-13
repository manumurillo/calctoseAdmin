<?php
/* @var $this TipController */
/* @var $model Tip */

$this->breadcrumbs=array(
	'Tips'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Tips', 'url'=>array('index')),
	array('label'=>'Crear Tip', 'url'=>array('create')),
);
?>

<h1>Administrar Tips</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tip-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'contenido',
		array(
            'name' => 'destacado',
            'value' => function($data){ return Tip::getDestacadoText($data->destacado);},
            'filter' => CHtml::dropDownList('Tip[destacado]','', array(1 => 'Sí', 0 => 'No'), array('empty' => 'Todos')),  
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
