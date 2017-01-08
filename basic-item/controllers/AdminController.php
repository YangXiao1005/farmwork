<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
{
    public function actionAdmin(){
        $this->layout=false;
        return $this->render('index');
    }
    public function actionUser(){
        $this->layout=false;
        return $this->render('user');
    }
}