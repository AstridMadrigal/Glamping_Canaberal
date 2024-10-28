<?php

namespace app\controllers;

use Yii;
use Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Usuario;

class GlampingController extends Controller
{

    public function actionPanoramica()
    {
        return $this->render('panoramica');
    }

    public function actionDomo()
    {
        return $this->render('domo');
    }
}
