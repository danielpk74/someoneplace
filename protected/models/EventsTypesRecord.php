<?php

/**
 * This is the model class for table "events_types".
 *
 * The followings are the available columns in table 'events_types':
 * @property integer $event_type_id
 * @property string $description
 * @property string $coment
 *
 * The followings are the available model relations:
 * @property Events[] $events
 */
class EventsTypesRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventsTypesRecord the static model class
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
		return 'events_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>100),
			array('coment', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('event_type_id, description, coment', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Events', 'event_type_id_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_type_id' => 'Event Type',
			'description' => 'Description',
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

		$criteria->compare('event_type_id',$this->event_type_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('coment',$this->coment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}