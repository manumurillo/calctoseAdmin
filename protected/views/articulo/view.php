<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/layout.css'); 

$this->breadcrumbs=array(
	'Artículos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Artículos', 'url'=>array('index')),
	array('label'=>'Crear Nuevo Artículo', 'url'=>array('create')),
	array('label'=>'Modificar Artículo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Artículo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de eliminar este artículo?')),
	array('label'=>'Administrador de Artículos', 'url'=>array('admin')),
);
?>
<!--Facebook-->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=612206288831246";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!--Twitter -->
<h1>Artículo #<?php echo $model->id; ?></h1>

<div class="layout_<?php echo $model->plantilla ?>">
    <div class="title">
        <?php echo $model->titulo ?>
    </div>
    <div class="img">
        <img src='http://www.cal-c-tose.com.mx/images/articulos/<?php echo $model->url_imagen ?>' alt='<?php echo $model->titulo ?>'/>
        <div class='img_footer'><?php echo$model->pie_imagen ?></div>
    </div>
    <div class="content">
        <?php echo $model->contenido ?>
    </div>
    <div class="social">
        <!--Twitter-->
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://cal-c-tose.com.mx/Articulo.aspx?numero=<?php echo $model->id ?>" data-text="De interés este artículo en Cal-C-Tose:" data-lang="es" data-hashtags="CalCTose">Twittear</a> 
        <script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'twitter-wjs');</script>
        <!--Facebook-->
        <div class="fb-like" data-href="http://cal-c-tose.com.mx/Articulo.aspx?numero=<?php echo $model->id ?>" data-width="350" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
        
    </div>
</div>

<br /><br />
<h3>Detalles:</h3>
<div class="more_info">
    <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            'resumen',
            'thumbnail',
            array(
                'name'=>'fecha_creacion',
                'value' => Yii::app()->dateFormatter->format("dd/MMMM/y", $model->fecha_creacion),
                'filter'=>false,
            ),
            array(
                'name'=>'fecha_actualizacion',
                'value' => Yii::app()->dateFormatter->format("dd/MMMM/y", $model->fecha_actualizacion),
                'filter'=>false,
            ),
            array(
                'name' => 'id_categoria',
                'value'  => $model->idCategoria->nombre          
            ),
            array(
                'name' => 'id_registro_usuario',
                'value'  => $model->idRegistroUsuario->name
            ),
            array(
                'name' => 'plantilla',
                'value' => function($data){
                         return Articulo::getPlantillaText($data->plantilla);
                       }
            ),
            array(
                'name' => 'tipo',
                'value' => function($data){
                         return Articulo::getTipoText($data->tipo);
                       }
            ),
        ),
    ));?>
</div>
