<?php

class ArticuloController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'cargarArticulos'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $model = $this->loadModel($id);
        $this->pageTitle = Yii::app()->name.' ['.$model->id.'] '.$model->titulo; 
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	    $this->pageTitle = Yii::app()->name.' - Crear Artículo';
		$model=new Articulo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Articulo']))
		{
			$model->attributes=$_POST['Articulo'];
            
            $model->titulo = $_POST['Articulo']['titulo'];
            $model->id_categoria = $_POST['Articulo']['id_categoria'];
            $model->plantilla = $_POST['Articulo']['plantilla'];
            $model->contenido = utf8_decode($_POST['Articulo']['contenido']);
            $model->resumen = utf8_decode($_POST['Articulo']['resumen']);
            $model->id_registro_usuario = $_POST['Articulo']['id_registro_usuario'];
            $model->fecha_creacion = date('Y-m-d');
            $model->fecha_actualizacion = date('Y-m-d');
            $model->pie_imagen = $_POST['Articulo']['pie_imagen'];
            $model->tipo = Articulo::TIPO_ARTICULO;
            
            $img1 = CUploadedFile::getInstance($model,'thumbnail');
            $img2 = CUploadedFile::getInstance($model,'url_imagen');
            
            if($img1 !== null){
                $imageFileName1 = $model->generarCodigo(3).$img1->name;
                $model->thumbnail = $imageFileName1;
            }
            
            if($img2 !== null){
                $imageFileName2 = $model->generarCodigo(3).$img2->name;
                $model->url_imagen = $imageFileName2;
            }
            
			if($model->save()){
			    if($img1 !== null){
                    $model->subirPorFTP($imageFileName1, $img1->tempName, "images/spots");
                    $img1->saveAs(Yii::app()->basePath."/../images/thumbs/".$imageFileName1);
                   
                }
                if($img2 !== null){
                   $model->subirPorFTP($imageFileName2, $img2->tempName, "images/articulos");
                    $img2->saveAs(Yii::app()->basePath."/../images/articulos/".$imageFileName2);
                   
                }
			    $this->redirect(array('view','id'=>$model->id));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	    $this->pageTitle = Yii::app()->name.' - Actualizar Artículo';
		$model=$this->loadModel($_GET['id']);

		if(isset($_POST['Articulo']))
        {
            $model->attributes=$_POST['Articulo'];
            $model->fecha_actualizacion = date('Y-m-d');
            $model->fecha_actualizacion = date('Y-m-d');
            
            $img1 = CUploadedFile::getInstance($model,'thumbnail');
            $img2 = CUploadedFile::getInstance($model,'url_imagen');
            
            if($img1 !== null){
                $imageFileName1 = $model->generarCodigo(3).$img1->name;
                $model->thumbnail = $imageFileName1;
            }
            
            if($img2 !== null){
                $imageFileName2 = $model->generarCodigo(3).$img2->name;
                $model->url_imagen = $imageFileName2;
            }
            //print_r($model);
            //Yii::app()->end();
            //$model->validate();
            //Yii::app()->end();
            if($model->save()){
                if($img1 !== null){
                    $model->subirPorFTP($imageFileName1, $img1->tempName, "images/spots");
                    $img1->saveAs(Yii::app()->basePath."/../images/thumbs/".$imageFileName1);
                }
                if($img2 !== null){
                   $model->subirPorFTP($imageFileName2, $img2->tempName, "images/articulos");
                    $img2->saveAs(Yii::app()->basePath."/../images/articulos/".$imageFileName2);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
                
        }

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	    $this->pageTitle = Yii::app()->name.' - Eliminar Artículo';
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    $this->pageTitle = Yii::app()->name.' - Artículos';
	    $criteria=new CDbCriteria(array(
            'order'=>'fecha_creacion DESC',
        ));
        
		$dataProvider=new CActiveDataProvider('Articulo', array(
            'pagination'=>array(
                'pageSize'=>15,
            ),
            'criteria'=>$criteria,
            ));
        
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	    $this->pageTitle = Yii::app()->name.' - Administrar Artículos';
		$model=new Articulo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articulo']))
			$model->attributes=$_GET['Articulo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Articulo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Articulo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Articulo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articulo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
    public function actionCargarArticulos()
    {
        $data=Articulo::model()->findAllBySql(
        "select id, titulo from articulo where id_categoria
        =:keyword and tipo = 1 order by id asc",
        array(':keyword'=>$_POST['Spot']['id_categoria']));
        
        $data=CHtml::listData($data,'id','fullInfo');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
        }
    }
}
