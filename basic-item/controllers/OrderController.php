<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class OrderController extends Controller
{
    public function actionOrder(){
        $this->layout=false;
        return $this->render('balance');
    }

}