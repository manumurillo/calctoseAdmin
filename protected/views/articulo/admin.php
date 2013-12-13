<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Artículos', 'url'=>array('index')),
	array('label'=>'Crear Articulo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#articulo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de Artículos</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 

$thumbDir = 'http://www.cal-c-tose-com.mx/images/spots/';

?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articulo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
		  'name' => 'titulo',
		  'type' => 'raw',
		  'value' => 'CHtml::link(CHtml::encode($data->titulo), array("view", "id"=>$data->id))'
        ),
        array(
            'name' => 'tipo',
            'value' => function($data){
                     return Articulo::getTipoText($data->tipo);
                   },
           'filter' => CHtml::dropDownList('Articulo[tipo]','', array(1 => 'Artículo', 2 => 'Consejo'), array('empty' => 'Todos')),                           
        ),
		'resumen',
        array(
            'name'=>'fecha_creacion',
            'value' => 'Yii::app()->dateFormatter->format("dd/MMMM/y", $data->fecha_creacion)',
            'filter'=>false,
        ),
        array(
            'name'=>'id_categoria',
            'value'=>'$data->idCategoria->nombre',
            'filter' => CHtml::dropDownList('Articulo[id_categoria]','',CHtml::listData(Categoria::model()->findall(), 'id', 'nombre'), array('empty' => 'Todos'))
        ),
        
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
