<?php
/* @var $this TipController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tips',
);

$this->menu=array(
	array('label'=>'Crear Tip', 'url'=>array('create')),
	array('label'=>'Administrar Tips', 'url'=>array('admin')),
);
?>

<h1>Tips</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
