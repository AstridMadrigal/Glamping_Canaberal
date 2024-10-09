<?php

namespace app\controllers;

use Yii;
use Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Usuario;

class UsuariosController extends Controller
{

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRealizarLogin(){
        $respuesta = [];
        try {
            $email = Yii::$app->request->post('email');
            $contraseña = Yii::$app->request->post('password');

            if(isset($email) && !empty($email) && isset($contraseña) && !empty($contraseña)){
                $usuario = Usuario::findOne([
                    "Email" => $email,
                    "Contraseña" => $contraseña
                ]);
            }else{
                throw new Exception('Debe ingresar la información');
            }

            $mensaje = '';
            $success = false;
            if($usuario){
                $mensaje = 'Se ha realizado el login correctamente: '.$usuario->Nombre;
                $success = true;
            }else{
                $mensaje = 'error en los datos, ingresalos de nuevo';
            }

            $respuesta = [
                'success' => $success,
                'code' => 00,
                'message' => $mensaje,
                'data' => [],
            ];
        } catch (Exception $e) {
            $respuesta = [
                'success' => false,
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => [],
            ];
            Yii::error('Error al realizar login: '.$e->__toString());
        }
        return json_encode($respuesta);
    }
}
