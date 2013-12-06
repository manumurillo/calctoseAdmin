<?php
/* @var $this SpotController */
/* @var $model Spot */
/* @var $form CActiveForm */
    Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.10.2.min.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/form.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/layout.css');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spot-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_categoria'); ?>
		<?php echo $form->dropdownlist($model, "id_categoria", CHtml::listData(Categoria::model()->findAll(), 'id', 'fullInfo'),
                     array(
                        'empty'=>'Seleccione una categoria', 
                        'selected'=>'',
                        'ajax' => array(
                                    'type' => 'POST',
                                    'url' => CController::createUrl('articulo/CargarArticulos'),
                                    'update' => '#Spot_id_articulo'
                                ),
                        )); ?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_articulo'); ?>
	
		<?php 
		if($model->isNewRecord){
		    echo $form->dropdownlist($model, "id_articulo", array(), array('empty'=>'Seleccione una artículo') );	    
		}
		else{
		    echo $form->dropdownlist($model, "id_articulo", CHtml::listData(Articulo::model()->cargarArticulos($model->id_categoria), 'id', 'fullInfo'));
		    
		}
        ?>
		<?php echo $form->error($model,'id_articulo'); ?>
	</div>

    <div id="imagen_cat" class="" style="display: none;">
        
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'p_top'); ?>
		<?php echo $form->textField($model,'p_top'); ?> px.
		<?php echo $form->error($model,'p_top'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_left'); ?>
		<?php echo $form->textField($model,'p_left'); ?> px.
		<?php echo $form->error($model,'p_left'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->dropdownlist($model, "visible", array(1=>'Visible',0=>'Ocultar')); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->