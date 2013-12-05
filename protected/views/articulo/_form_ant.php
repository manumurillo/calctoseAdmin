<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
	Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.10.2.min.js');  
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/form.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/tinymce.min.js');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/layout.css'); 
	
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'id_categoria')."*"; ?>
		<?php echo $form->dropdownlist($model, "id_categoria", CHtml::listData(Categoria::model()->findAll(), 'id', 'nombre'),
					  array('empty'=>'Seleccione una categoria', 'selected'=>'')); ?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plantilla')."*"; ?>
		<?php echo $form->dropdownlist($model, "plantilla", array(1=>'Imagen a la izquierda',2=>'Imagen a la derecha',3=>'Dos columnas',4=>'Vídeo'),
					  array('empty'=>'Seleccione una plantilla', 'selected'=>'')); ?>
		<?php echo $form->error($model,'plantilla'); ?>
	</div>
	
	<div class="layout" style="display:none" id="layoutSelected">

        <div class="title" id="Articulo_titulo">
            Escriba el título aquí
        </div>
		
        <div class="img" id="Articulo_url_imagen">
			<div class="img_footer" class="Articulo_pie_imagen">
			    Escriba una breve descripción de la imagen
			</div>
        </div>
        <div class="content" id="Articulo_contenido">
            Escriba el contenido aquí
        </div>
        <div class="others">
            <div class="row">
				<?php echo $form->labelEx($model,'resumen'); ?>
				<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>55)); ?>
				<?php echo $form->error($model,'resumen'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'thumbnail'); ?>
				<?php echo $form->textField($model,'thumbnail',array('size'=>-1,'maxlength'=>-1)); ?>
				<?php echo $form->error($model,'thumbnail'); ?>
			</div>
			
        </div>

		<div class="row">
			<?php echo $form->hiddenField($model,'id_registro_usuario', array('value'=>14)); ?>
			<?php echo $form->hiddenField($model,'tipo', array('value'=>1)); ?>
		</div>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->