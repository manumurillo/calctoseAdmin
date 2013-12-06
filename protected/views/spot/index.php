<?php
/* @var $this SpotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spots',
);

$this->menu=array(
	array('label'=>'Crear Spot', 'url'=>array('create')),
	array('label'=>'Administrar Spots', 'url'=>array('admin')),
);
?>

<h1>Spots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
