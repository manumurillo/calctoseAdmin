<?php
/* @var $this SpotController */
/* @var $data Spot */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_articulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_top')); ?>:</b>
	<?php echo CHtml::encode($data->p_top); ?>px.
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_left')); ?>:</b>
	<?php echo CHtml::encode($data->p_left); ?>px.
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode(Spot::model()->getVisibleText($data->visible)); ?>
	<br />


</div>