<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Todos los Spots', 'url'=>array('index')),
	array('label'=>'Crear Spot', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#spot-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Spots</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spot-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'id_categoria',
            'value'=>'$data->idCategoria->nombre',
        ),
		array(
            'name'=>'id_articulo',
            'value'=>'$data->idArticulo->titulo',
        ),
		'p_top',
		'p_left',
		array(
            'name' => 'visible',
            'value' => function($data){
                     return Spot::getVisibleText($data->visible);
                   }
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
