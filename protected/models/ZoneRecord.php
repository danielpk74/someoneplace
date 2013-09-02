<?php

/**
 * This is the model class for table "zones".
 *
 * The followings are the available columns in table 'zones':
 * @property integer $zone_id
 * @property string $zone_name
 * @property string $coment
 *
 * The followings are the available model relations:
 * @property Places[] $places
 */
class ZoneRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZoneRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zone_name, coment', 'required'),
			array('zone_name', 'length', 'max'=>100),
			array('coment', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('zone_id, zone_name, coment', 'safe', 'on'=>'search'),
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
			'places' => array(self::HAS_MANY, 'Places', 'zone_id_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'zone_id' => 'Zone',
			'zone_name' => 'Zone Name',
			'coment' => 'Coment',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('zone_name',$this->zone_name,true);
		$criteria->compare('coment',$this->coment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}