<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="http://www.cal-c-tose.com.mx/images/marca/logo_cct.png" alt="CCT Logo" style="vertical-align: middle;"/> <?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Articulos', 'url'=>array('/articulo'),
                    'items'=>array(
                                array('label'=>'Crear nuevo artículo', 'url'=>array('/articulo/create')),
                                array('label'=>'Todos los artículos', 'url'=>array('/articulo/index')),
                                array('label'=>'Administrar artículos', 'url'=>array('/articulo/admin')),
                    ),
                ),
				array('label'=>'Spots', 'url'=>array('/spot'),
                    'items'=>array(
                                array('label'=>'Crear nuevo spot', 'url'=>array('/spot/create')),
                                array('label'=>'Ver todos los spots', 'url'=>array('/spot/index')),
                                array('label'=>'Administrar spots', 'url'=>array('/spot/admin')),
                    ),                
                ),
				array('label'=>'Tips', 'url'=>array('/tip'),
                    'items'=>array(
                                array('label'=>'Crear nuevo tip', 'url'=>array('/tip/create')),
                                array('label'=>'Ver todos los tips', 'url'=>array('/tip/index')),
                                array('label'=>'Administrar tips', 'url'=>array('/tip/admin')),
                    ),                
                ),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> por Havas Worldwide México.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
