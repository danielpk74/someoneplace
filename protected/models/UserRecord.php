<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $user_id
 * @property integer $place_id_fk
 * @property string $user_pass
 * @property string $user_name
 * @property string $user_phone
 * @property string $user_email
 * @property integer $user_type
 * @property integer $user_first_login
 */
class UserRecord extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, user_pass, user_name, user_phone, user_type', 'required'),
            array('place_id_fk, user_type', 'numerical', 'integerOnly' => true),
            array('user_id, user_pass', 'length', 'max' => 20),
            array('user_name', 'length', 'max' => 100),
            array('user_phone', 'length', 'max' => 50),
            array('user_email', 'length', 'max' => 200),
            array('user_first_login', 'boolean'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, place_id_fk, user_pass, user_name, user_phone, user_email, user_type,user_first_login', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'place_id_fk' => 'Place Id Fk',
            'user_pass' => 'User Pass',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'user_email' => 'User Email',
            'user_type' => 'User Type',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('place_id_fk', $this->place_id_fk);
        $criteria->compare('user_pass', $this->user_pass, true);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('user_phone', $this->user_phone, true);
        $criteria->compare('user_email', $this->user_email, true);
        $criteria->compare('user_type', $this->user_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Defined if is the first login 
     * @param string $userId
     * @return boolean
     */
    public static function get_PlaceID($userId) {
        $user = new UserRecord();
        $user = Yii::app()->db->createCommand()
                ->select('place_id_fk')
                ->from('users')
                ->where('user_id=:user_id', array(':user_id' => $userId))
                ->queryRow();

        return $user['place_id_fk'];
    }

    /**
     * update the place Id for an user
     * @return type
     */
    public static function updatePlaceID($userId,$placeID) {
        $user = new UserRecord();
        $user = UserRecord::model()->findByPk($userId);
        $user->place_id_fk = $placeID;
        if($user->save())
            return true;        
    }

}