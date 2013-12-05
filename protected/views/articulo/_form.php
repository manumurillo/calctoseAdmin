<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_categoria'); ?>
        <?php echo $form->dropdownlist($model, "id_categoria", CHtml::listData(Categoria::model()->findAll(), 'id', 'nombre'),
                      array('empty'=>'Seleccione una categoria', 'selected'=>'')); ?>
        <?php echo $form->error($model,'id_categoria'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'plantilla'); ?>
        <?php echo $form->dropdownlist($model, "plantilla", array(1=>'Imagen a la izquierda',2=>'Imagen a la derecha',3=>'Dos columnas',4=>'Vídeo'),
                      array('empty'=>'Seleccione una plantilla', 'selected'=>'')); ?>
        <?php echo $form->error($model,'plantilla'); ?>
    </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>-1,'maxlength'=>-1)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenido'); ?>
		<?php $this->widget('application.extensions.tinymce.ETinyMce',
                        array(
                            'model'=>$model,
                            'attribute'=>'contenido',
                            'options'=>array('mode'=>'specific_textareas'),
                            'editorTemplate'=>'full',
                            'htmlOptions'=>array('rows'=>6, 'cols'=>10, 'class'=>'tinymce')
                        ));
        ?>
		<?php echo $form->error($model,'contenido'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'thumbnail'); ?>
            <?php echo $form->fileField($model,'thumbnail'); ?>
            <?php echo $form->error($model,'thumbnail'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'url_imagen'); ?>
            <?php echo $form->fileField($model,'url_imagen',array('size'=>-1,'maxlength'=>-1)); ?>
            <?php echo $form->error($model,'url_imagen'); ?>
        </div>

    <div class="row">
            <?php echo $form->hiddenField($model,'id_registro_usuario', array('value'=>14)); ?>
            <?php echo $form->hiddenField($model,'tipo', array('value'=>1)); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'pie_imagen'); ?>
		<?php echo $form->textArea($model,'pie_imagen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pie_imagen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Terminar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->