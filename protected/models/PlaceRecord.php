<?php

/**
 * This is the model class for table "places".
 *
 * The followings are the available columns in table 'places':
 * @property integer $id
 * @property integer $place_id
 * @property string $place_name
 * @property integer $zone_id_fk
 * @property string $place_address
 * @property string $place_phone
 * @property string $place_movil
 * @property string $place_email
 * @property string $place_web
 * @property string $place_facebook
 * @property string $place_twitter
 * @property string $place_google_m
 * @property string $place_flick_r
 * @property string $place_open_date
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_movil
 * @property string $contact_email
 * @property string $place_coments
 * @property string $key_words
 *
 * The followings are the available model relations:
 * @property Events[] $events
 * @property Zones $zoneIdFk
 */
class PlaceRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PlacesRecord the static model class
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
		return 'places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('place_id, place_name, zone_id_fk, place_address, place_phone, contact_name, contact_phone, key_words', 'required'),
			array('place_id, zone_id_fk', 'numerical', 'integerOnly'=>true),
			array('place_name, place_address, place_email, place_web, contact_email', 'length', 'max'=>200),
			array('place_phone, place_movil, contact_phone, contact_movil', 'length', 'max'=>50),
			array('place_facebook, place_twitter, place_google_m, place_flick_r', 'length', 'max'=>300),
			array('contact_name, place_coments, key_words', 'length', 'max'=>100),
			array('place_open_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, place_id, place_name, zone_id_fk, place_address, place_phone, place_movil, place_email, place_web, place_facebook, place_twitter, place_google_m, place_flick_r, place_open_date, contact_name, contact_phone, contact_movil, contact_email, place_coments, key_words', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Events', 'place_id_fk'),
			'zoneIdFk' => array(self::BELONGS_TO, 'Zones', 'zone_id_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'place_id' => 'NIT',
			'place_name' => 'Nombre',
			'zone_id_fk' => 'Zone Id Fk',
			'place_address' => 'Dirección',
			'place_phone' => 'Teléfono',
			'place_movil' => 'Nro Celular',
			'place_email' => 'Email',
			'place_web' => 'Pagina Web',
			'place_facebook' => 'Facebook',
			'place_twitter' => 'Twitter',
			'place_google_m' => 'Google +',
			'place_flick_r' => 'Flick',
			'place_open_date' => 'Hora Apertura',
			'contact_name' => 'Nombre de Contacto',
			'contact_phone' => 'Teléfono Contacto',
			'contact_movil' => 'Nro Celular',
			'contact_email' => 'Email Contacto',
			'place_coments' => 'Describe tu sitio',
			'key_words' => 'Palabras Clave',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('place_id',$this->place_id);
		$criteria->compare('place_name',$this->place_name,true);
		$criteria->compare('zone_id_fk',$this->zone_id_fk);
		$criteria->compare('place_address',$this->place_address,true);
		$criteria->compare('place_phone',$this->place_phone,true);
		$criteria->compare('place_movil',$this->place_movil,true);
		$criteria->compare('place_email',$this->place_email,true);
		$criteria->compare('place_web',$this->place_web,true);
		$criteria->compare('place_facebook',$this->place_facebook,true);
		$criteria->compare('place_twitter',$this->place_twitter,true);
		$criteria->compare('place_google_m',$this->place_google_m,true);
		$criteria->compare('place_flick_r',$this->place_flick_r,true);
		$criteria->compare('place_open_date',$this->place_open_date,true);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_phone',$this->contact_phone,true);
		$criteria->compare('contact_movil',$this->contact_movil,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('place_coments',$this->place_coments,true);
		$criteria->compare('key_words',$this->key_words,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function searchPlaceForCategory($arrayCategories)
        {
            
        }
        
        public static function searchPlaceForComent($coments)
        {
            $places = new PlaceRecord();
            $places = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('places')
                    ->where(array('like','place_coments','%'.$coments.'%'))
                    ->queryAll();
            
            
//            var_dump($places);
            return $places;
        }
        
        public static function searchPlaceForKeyWord($keyWord)
        {
            
        }
}