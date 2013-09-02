<?php

class AdminController extends Controller {

    public function actionIndex() {
        $placeId = UserRecord::get_PlaceID(Yii::app()->user->id);


        $this->render('admin', array('placeId' => $placeId));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionPlace() {
        $placeModel = new PlaceRecord();

        $categories = new Category();
        $categories = Category::model()->findAll();

        $zones = new ZoneRecord();
        $zones = ZoneRecord::model()->findAll();

        // si la opcion es guardar
        if (isset($_POST['objeto'])) {
            $place = new PlaceRecord('Insert');
            $place->place_id = Yii::app()->request->getParam('place_id');
            $place->place_name = Yii::app()->request->getParam('place_name');
            $place->zone_id_fk = Yii::app()->request->getParam('zone_id_fk');
            $place->place_address = Yii::app()->request->getParam('place_address');
            $place->place_phone = Yii::app()->request->getParam('place_phone');
            $place->place_movil = Yii::app()->request->getParam('place_movil');
            $place->place_email = Yii::app()->request->getParam('place_email');
            $place->place_web = Yii::app()->request->getParam('place_web');
            $place->place_facebook = Yii::app()->request->getParam('place_facebook');
            $place->place_twitter = Yii::app()->request->getParam('place_twitter');
            $place->place_google_m = Yii::app()->request->getParam('place_google_m');
            $place->place_flick_r = Yii::app()->request->getParam('place_flick_r');
            $place->place_open_date = Yii::app()->request->getParam('place_open_date');
            $place->contact_name = Yii::app()->request->getParam('contact_name');
            $place->contact_phone = Yii::app()->request->getParam('contact_phone');
            $place->contact_movil = Yii::app()->request->getParam('contact_movil');
            $place->contact_email = Yii::app()->request->getParam('contact_email');
            $place->key_words = Yii::app()->request->getParam('key_words');
            $place->contact_phone = Yii::app()->request->getParam('contact_phone');
            $place->place_coments = Yii::app()->request->getParam('place_coments');
            if ($place->save()) {
                UserRecord::updatePlaceID(Yii::app()->user->id, $place->id);
                $placeId = UserRecord::get_PlaceID(Yii::app()->user->id);
                $this->renderPartial('admin', array('placeId' => $placeId));
            }
            else
                echo "error";
        } else {
            $this->renderPartial('place/place', array('placeModel' => $placeModel,
                'categories' => $categories,
                'zones' => $zones
            ));
        }
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionSavePlace() {
        $placeModel = new PlacesRecord();

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'PlaceRecord') {
            echo CActiveForm::validate($placeModel);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['PlaceRecord'])) {
            $placeModel->attributes = $_POST['PlaceRecord'];
            // validate user input and redirect to the previous page if valid
            if ($placeModel->validate() && $placeModel->login()) {
                echo "valido";
            } else {
                $this->renderPartial('flogin', array('placeModel' => $placeModel));
            }
        } else {
            $this->renderPartial('flogin', array('placeModel' => $placeModel));
        }
    }

    //// PROFILE ACTION
    public function actionProfile() {
        $user = UserRecord::model()->findByPk(Yii::app()->user->id);
        $this->renderPartial('profile/profile', array('user' => $user));
    }

    //// END PROFILE ACTION
    // EVENT ACTION
    /// show event form
    public function actionShowFormEvent() {

        $event = new EventsTypesRecord();
        $event = EventsTypesRecord::model()->findByPk(Yii::app()->getRequest()->getParam('event_type_id'));

        $this->render('event/formCreateEvent', array('type' => $event, 'opcion' => 'Crear'));
    }

    /// Show event
    public function actionEvent() {
        $this->renderPartial('event/event');
    }

    // Create event
    public function actionCreateEvent() {

        // New Event
        if (Yii::app()->getRequest()->getParam('event_id') == '') {
            
        }
        // Edit existent event
        else {
            
        }

        $event = new EventsTypesRecord();
        $event = EventsTypesRecord::model()->findByPk(Yii::app()->getRequest()->getParam('event_type_id'));

        $this->render('templates/event_form', array('type' => $event, 'opcion' => 'Crear'));
    }

}