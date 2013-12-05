<?php
/* @var $this ArticuloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artículos',
);

$this->menu=array(
	array('label'=>'Crear Artículo', 'url'=>array('create')),
	array('label'=>'Administrador de Artículos', 'url'=>array('admin')),
);
?>

<h1>Artículos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
