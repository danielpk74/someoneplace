<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $event_id
 * @property integer $place_id_fk
 * @property integer $event_type_id_fk
 * @property string $event_name
 * @property string $event_date
 * @property string $event_start_hour
 * @property string $event_end_hour
 * @property string $event_address
 * @property string $event_description
 * @property string $event_user_id_fk
 * @property string $event_keys_words
 *
 * The followings are the available model relations:
 * @property Places $placeIdFk
 */
class EventRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventRecord the static model class
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
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('place_id_fk, event_type_id_fk', 'numerical', 'integerOnly'=>true),
			array('event_name, event_address', 'length', 'max'=>200),
			array('event_date', 'length', 'max'=>50),
			array('event_start_hour, event_end_hour', 'length', 'max'=>10),
			array('event_description', 'length', 'max'=>400),
			array('event_user_id_fk', 'length', 'max'=>20),
			array('event_keys_words', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('event_id, place_id_fk, event_type_id_fk, event_name, event_date, event_start_hour, event_end_hour, event_address, event_description, event_user_id_fk, event_keys_words', 'safe', 'on'=>'search'),
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
			'placeIdFk' => array(self::BELONGS_TO, 'Places', 'place_id_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_id' => 'Event',
			'place_id_fk' => 'Place Id Fk',
			'event_type_id_fk' => 'Event Type Id Fk',
			'event_name' => 'Event Name',
			'event_date' => 'Event Date',
			'event_start_hour' => 'Event Start Hour',
			'event_end_hour' => 'Event End Hour',
			'event_address' => 'Event Address',
			'event_description' => 'Event Description',
			'event_user_id_fk' => 'Event User Id Fk',
			'event_keys_words' => 'Event Keys Words',
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

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('place_id_fk',$this->place_id_fk);
		$criteria->compare('event_type_id_fk',$this->event_type_id_fk);
		$criteria->compare('event_name',$this->event_name,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('event_start_hour',$this->event_start_hour,true);
		$criteria->compare('event_end_hour',$this->event_end_hour,true);
		$criteria->compare('event_address',$this->event_address,true);
		$criteria->compare('event_description',$this->event_description,true);
		$criteria->compare('event_user_id_fk',$this->event_user_id_fk,true);
		$criteria->compare('event_keys_words',$this->event_keys_words,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getEventByPlaceID($placeID,$event_Type)
        {
            $events = new EventRecord();
            $events = Yii::app()->db->createCommand()
                ->select('*')
                ->from('events')
                ->where('place_id_fk=:place_id', array(':place_id' => $placeID))
                ->andWhere('event_type_id_fk=:event_Type', array(':event_Type' => $event_Type))
                ->queryAll();
            
            return $events;
        }
}