<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />
    <?php
        if($data->resumen == ""){
    ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
        <?php echo CHtml::encode($data->contenido); ?>
        <br />
    <?php
        }
        else {
    ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
        <?php echo CHtml::encode($data->resumen); ?>
        <br />
    <?php
        } 
    ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->format("d/MMMM/y", $data->fecha_creacion); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
    <?php echo CHtml::encode($data->idCategoria->nombre); ?>
    <br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('plantilla')); ?>:</b>
    <?php echo CHtml::encode(Articulo::model()->getPlantillaText($data->plantilla)); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('id_registro_usuario')); ?>:</b>
    <?php echo CHtml::encode($data->idRegistroUsuario->name); ?>
    <br />

</div>