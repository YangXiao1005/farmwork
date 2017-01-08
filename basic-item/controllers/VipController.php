<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class VipController extends Controller
{
    public function actionVip(){
        $this->layout=false;
        return $this->render('vip');
    }
}