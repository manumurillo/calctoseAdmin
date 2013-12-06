<?php

/**
 * This is the model class for table "registro_usuario".
 *
 * The followings are the available columns in table 'registro_usuario':
 * @property integer $id
 * @property string $nombre
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $email
 * @property string $estado
 * @property string $contrasena
 * @property string $fechaIngreso
 * @property string $fechaNacimiento
 *
 * The followings are the available model relations:
 * @property Articulo[] $articulos
 */
class RegistroUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registro_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidoPaterno, apellidoMaterno, email', 'length', 'max'=>250),
			array('estado, contrasena', 'length', 'max'=>50),
			array('fechaIngreso, fechaNacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellidoPaterno, apellidoMaterno, email, estado, contrasena, fechaIngreso, fechaNacimiento', 'safe', 'on'=>'search'),
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
			'articulos' => array(self::HAS_MANY, 'Articulo', 'id_registro_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellidoPaterno' => 'Apellido Paterno',
			'apellidoMaterno' => 'Apellido Materno',
			'email' => 'Email',
			'estado' => 'Estado',
			'contrasena' => 'Contrasena',
			'fechaIngreso' => 'Fecha Ingreso',
			'fechaNacimiento' => 'Fecha Nacimiento',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidoPaterno',$this->apellidoPaterno,true);
		$criteria->compare('apellidoMaterno',$this->apellidoMaterno,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegistroUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getName()
    {
        return $this->nombre.' '.$this->apellidoPaterno;
    }
}
