<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaActeion',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIniciarSession() {
        $loginModel = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($loginModel);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $loginModel->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($loginModel->validate() && $loginModel->login()) {
                echo "valido";
            } else {
                $this->renderPartial('flogin', array('loginModel' => $loginModel));
            }
        } else {
            $this->renderPartial('flogin', array('loginModel' => $loginModel));
        }
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $zones = new ZoneRecord();
        $zones = ZoneRecord::model()->findAll();

        $this->render('index', array('zones' => $zones));
    }

    /**
     * Search a place for diferents parameters
     * <b>Single parameter</b>Search a place for description or keys words proposes for the place owner
     * <b>Advance parameter</b>  
     */
    public function actionSearchTypePlace() {
        $place = new PlaceRecord();
        
        $param = Yii::app()->request->getParam('typeID');

        //--------- Start to search places id's for severals parameters
        
        $places = CategoriesPlacesRecord::model()->findAllByAttributes(array('category_id' => $param ));
        if (Count($places) != 0) {
            foreach ($places as $place) {
                $placesID[] = $place['place_id'];
            }

            // convert the place id array to the unique array and create new array with the place data
            $placesID = array_unique($placesID);
            $places = array();
            foreach ($placesID as $id) {
                $places[] = PlaceRecord::searchPlacesById($id);
            }
        }

        if (Count($places) != 0)
            $this->renderPartial('result', array('places' => $places));
        else {
            echo "empty";
        }
    }
    
    /**
     * Search a place for diferents parameters
     * <b>Single parameter</b>Search a place for description or keys words proposes for the place owner
     * <b>Advance parameter</b>  
     */
    public function actionSearch() {
        $place = new PlaceRecord();

        if (Yii::app()->request->getParam('advance') == false)
            $param = Yii::app()->request->getParam('param');

        //--------- Start to search places id's for severals parameters
        $places = PlaceRecord::searchPlaceForComent($param);
        $places = array_merge(PlaceRecord::searchPlaceForKeyWord($param), $places);
        if (Count($places) != 0) {
            foreach ($places as $place) {
                $placesID[] = $place['place_id'];
            }

            // convert the place id array to the unique array and create new array with the place data
            $placesID = array_unique($placesID);
            $places = array();
            foreach ($placesID as $id) {
                $places[] = PlaceRecord::searchPlacesByPlaceId($id);
            }
        }

        if (Count($places) != 0)
            $this->renderPartial('result', array('places' => $places));
        else {
            echo "empty";
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

//    public function actionAdmin() {
//        $placeId = UserRecord::get_PlaceID(Yii::app()->user->id);
//        if($placeId == NULL)
//        {
//            
//        }
//        else {
//            
//        }
//        
//        $this->render('admin',array('placeId'=>$placeId));
//    }
    /// END PROFILE ACTION 

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}