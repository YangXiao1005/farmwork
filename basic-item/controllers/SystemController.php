<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SystemController extends Controller
{
    public function actionChangepwd(){
        $this->layout=false;
        return $this->render('changepwd');
    }
    public function actionOpinion(){
        $this->layout=false;
        return $this->render('opinion');
    }
}