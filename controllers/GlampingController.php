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

    public function actionReservas()
    {
        return $this->render('reservas');
    }

    public function actionVisitas()
    {
        return $this->render('visitas');
    }

    public function actionDisponibilidad()
    {
        return $this->render('disponibilidad');
    }

    public function actionDomo()
    {
        return $this->render('domo');
    }
}
