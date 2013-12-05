<?php
/* @var $this SpotController */
/* @var $model Spot */

$this->breadcrumbs=array(
	'Spots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Spot', 'url'=>array('index')),
	array('label'=>'Create Spot', 'url'=>array('create')),
	array('label'=>'View Spot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Spot', 'url'=>array('admin')),
);
?>

<h1>Update Spot <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>