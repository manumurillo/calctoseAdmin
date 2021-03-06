<?php

/**
 * This is the model class for table "spot".
 *
 * The followings are the available columns in table 'spot':
 * @property integer $id
 * @property integer $id_categoria
 * @property integer $id_articulo
 * @property integer $p_top
 * @property integer $p_left
 * @property string $visible
 *
 * The followings are the available model relations:
 * @property Articulo $idArticulo
 * @property Categoria $idCategoria
 */
class Spot extends CActiveRecord
{
    const VISIBLE_SI = "Sí";
    const VISIBLE_NO = "No";
    
    const VISIBLE_TRUE = 1;
    const VISIBLE_FALSE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('id_categoria, id_articulo, p_top, p_left', 'required'),
			array('id_categoria, id_articulo, p_top, p_left', 'numerical', 'integerOnly'=>true),
			array('visible', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_categoria, id_articulo, p_top, p_left, visible', 'safe', 'on'=>'search'),
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
			'idArticulo' => array(self::BELONGS_TO, 'Articulo', 'id_articulo'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_categoria' => 'Categoria',
			'id_articulo' => 'Artículo',
			'p_top' => 'Posición Top',
			'p_left' => 'Posición Left',
			'visible' => 'Visible',
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
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_articulo',$this->id_articulo);
		$criteria->compare('p_top',$this->p_top);
		$criteria->compare('p_left',$this->p_left);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                'defaultOrder'=>'id_categoria ASC',
              )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Spot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getVisibleText($value)
    {
        if($value == 1)
            return Spot::VISIBLE_SI;
        else {
            return Spot::VISIBLE_NO;
        }
        
    }

}
