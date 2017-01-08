<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PublicController extends Controller
{
    public function actionBanner(){
        $this->layout=false;
        return $this->render('banner');
    }
    public function actionOpinion(){
        $this->layout=false;
        return $this->render('opinion');
    }
}