<?php

/**
 * This is the model class for table "articulo".
 *
 * The followings are the available columns in table 'articulo':
 * @property integer $id
 * @property string $titulo
 * @property string $resumen
 * @property string $contenido
 * @property string $thumbnail
 * @property integer $vistas
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $id_categoria
 * @property integer $id_registro_usuario
 * @property integer $plantilla
 * @property string $url_imagen
 * @property string $pie_imagen
 * @property integer $tipo
 *
 * The followings are the available model relations:
 * @property Spot[] $spots
 * @property Categoria $idCategoria
 * @property RegistroUsuario $idRegistroUsuario
 */
class Articulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, id_categoria, id_registro_usuario, plantilla', 'required'),
			array('vistas, id_categoria, id_registro_usuario, plantilla, tipo', 'numerical', 'integerOnly'=>true),
			array('resumen, contenido, thumbnail, fecha_creacion, fecha_actualizacion, url_imagen, pie_imagen', 'safe'),
			array('thumbnail, url_imagen', 'file', 'types'=>'jpg, gif, jpeg, png', "allowEmpty"=>TRUE),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, resumen, contenido, thumbnail, vistas, fecha_creacion, fecha_actualizacion, id_categoria, id_registro_usuario, plantilla, url_imagen, pie_imagen, tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'spots' => array(self::HAS_MANY, 'Spot', 'id_articulo'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'idRegistroUsuario' => array(self::BELONGS_TO, 'RegistroUsuario', 'id_registro_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Título',
			'resumen' => 'Resumen',
			'contenido' => 'Contenido',
			'thumbnail' => 'Thumbnail',
			'vistas' => 'Vistas',
			'fecha_creacion' => 'Fecha Creación',
			'fecha_actualizacion' => 'Fecha Actualización',
			'id_categoria' => 'Categoria',
			'id_registro_usuario' => 'Id Usuario',
			'plantilla' => 'Plantilla',
			'url_imagen' => 'Url Imagen',
			'pie_imagen' => 'Pie Imagen',
			'tipo' => 'Tipo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('vistas',$this->vistas);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_registro_usuario',$this->id_registro_usuario);
		$criteria->compare('plantilla',$this->plantilla);
		$criteria->compare('url_imagen',$this->url_imagen,true);
		$criteria->compare('pie_imagen',$this->pie_imagen,true);
		$criteria->compare('tipo',$this->tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'fecha_creacion DESC',
              )
                        
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /*
     * Returns an alphanumeric key
     * @param int $longitud size of key
     * @return string alphanumeric key
     */
    public function generarCodigo($longitud){
        $key='';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max=strlen($pattern)-1;
        
        for($i=0;$i<$longitud;$i++)
            $key.=$pattern{mt_rand(0,$max)};
        return $key;
    }
    
    /*
     * Permite la subida de un archivo por FTP
     * @params string $filename nombre del archivo local
     * @params string $tmp nombre del archivo remoto
     * @params string $d destino del archivo a guardar.
     */
    public function subirPorFTP($filename, $tmp, $d){
        $ftp = "216.87.164.4";
        $puerto = 721;
        $username = "ftpCalctose";
        $pwd = "c4lct053FTP";
        
        $connect = ftp_connect($ftp, $puerto)or die("Unable to connect to host");
        ftp_login($connect,$username,$pwd)or die("Authorization Failed");       
        ftp_pasv($connect, true);
        ftp_put($connect,$d.'/'.$filename,$tmp,FTP_BINARY)or die("Unable to upload");
    }
        
}
