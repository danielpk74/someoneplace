<?php

class EventController extends Controller {

    //// END PROFILE ACTION
    // EVENT ACTION
    /// show event form
    public function actionShowFormEvent() {

        $event = new EventsTypesRecord();
        $event = EventsTypesRecord::model()->findByPk(Yii::app()->getRequest()->getParam('event_type_id'));
        
        $place = new PlaceRecord();
        $place = PlaceRecord::model()->findByPk(UserRecord::get_PlaceID(Yii::app()->user->id));

        $this->renderPartial('event', array('type' => $event, 'opcion' => 'Crear','place'=>$place));
    }

    /**
     * save or edit an event
     */
    public function actionSaveEvent() {

        $event = new EventRecord();

        // if is a existent event
        if (Yii::app()->request->getParam('event_id') != '')
            $event = EventRecord::model()->findByPk(Yii::app()->request->getParam('event_id'));

        $event->place_id_fk =  UserRecord::get_PlaceID(Yii::app()->user->id);
        $event->event_type_id_fk = NULL;
        $event->event_name = Yii::app()->request->getParam('event_name');
        $event->event_date = date('Y-m-d'); //Yii::app()->request->getParam('event_date');
        $event->event_start_hour = Yii::app()->request->getParam('event_start_hour');
        $event->event_end_hour = Yii::app()->request->getParam('event_end_hour');
        $event->event_address = Yii::app()->request->getParam('event_address');
        $event->event_description = Yii::app()->request->getParam('event_description');
        $event->event_user_id_fk = Yii::app()->user->id;
        $event->event_keys_words = Yii::app()->request->getParam('event_keys_words');
        $image = explode(".", $_FILES['image']['name']);
        $ruta = dirname(Yii::app()->basePath)."/images/events";
        

        try {
            if ($event->save()) {
                
                copy($_FILES["image"]["tmp_name"], $ruta . DIRECTORY_SEPARATOR.$event->event_id.".".$image[1]);
                chmod($ruta . DIRECTORY_SEPARATOR.$event->event_id.".".$image[1], 0777);
                echo "completed";
            } else {
                echo "error";
            }
        } catch (Exception $e) {
            echo "error";
        }
    }

    /// Show event
    public function actionEventList() {
        
        $placeId=UserRecord::get_PlaceID(Yii::app()->user->id);
        $events = new EventRecord();
        $placeEvents = $events->getEventByPlaceID($placeId,1);
        $placePromotions = $events->getEventByPlaceID($placeId,2);
        $placeInvitations = $events->getEventByPlaceID($placeId,3);
        
        $this->renderPartial('eventList',array('events'=>$placeEvents,'promotions'=>$placePromotions,'invitations'=>$placeInvitations,'placeId'=>$placeId));
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