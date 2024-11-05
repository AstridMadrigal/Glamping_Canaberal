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
        $_SESSION['menus'] = false;
        return $this->render('login');
    }

    public function actionCrearUsuario(){
        $respuesta = [];
        try {
            $email = Yii::$app->request->post('email');
            $contraseña = Yii::$app->request->post('password');
            $nombre = Yii::$app->request->post('nombre');
            $apellidos = Yii::$app->request->post('apellidos');
            $tipo_documento = Yii::$app->request->post('tipo_documento');
            $documento = Yii::$app->request->post('documento');
            $fecha_nacimiento = Yii::$app->request->post('fecha_nacimiento');
            $telefono = Yii::$app->request->post('telefono');

            $usuario = new Usuario();
            
            $usuario->email = $email;
            $usuario->contraseña = $contraseña;
            $usuario->nombre = $nombre;
            $usuario->apellido = $apellidos;
            $usuario->tipo_documento = $tipo_documento;
            $usuario->documento = $documento;
            $usuario->fecha_nacimiento = $fecha_nacimiento;
            $usuario->telefono = $telefono;

            if(!$usuario->save()){
                throw new Exception('Error al crear Usuario: ' . print_r($tercero->getErrors(), true));
            }

            $mensaje = 'Se ha realizado el proceso correctamente';
            $success = true;

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
    
    public function actionViewRecuperarContrasena()
    {
        return $this->render('recuperar_contraseña.php');
    }

    public function actionFichaCliente()
    {
        return $this->render('ficha_cliente.php');
    }

    public function actionRecuperarContrasena(){
        $mensaje = '';
        $success = false;
        
        try{

            $email = Yii::$app->request->post('email');
            
            $usuario = Usuario::findOne([
                "email" => $email
            ]);
            


            if(isset($usuario) && !empty($usuario)){

                $contraseña = rand();
                $usuario->contraseña = "".$contraseña;

                if(!$usuario->save()){
                    throw new Exception('Error al guardar información usuario' . print_r($usuario->getErrors(), true), 3);
                }
                
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("diana1245368@gmail.com", "Glamping_Canaberal");
                $email->setSubject("Recuperar contraseña");
                $email->addTo($usuario->email, $usuario->nombre);
                $email->addContent(
                    "text/html", "<strong>Nueva contraseña: $contraseña</strong>"
                );
                $Key = "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";

                $sendgrid = new \SendGrid($Key);
                $response = $sendgrid->send($email);

                $mensaje = 'Se ha realizado el cambio de contraseña correctamente';
                $success = true;

                $respuesta = [
                    'success' => $success,
                    'code' => 00,
                    'message' => $mensaje,
                    'data' => [],
                ];

            }
        } catch (Exception $e) {
            $respuesta = [
                'success' => $success,
                'code' => 00,
                'message' => $mensaje,
                'data' => [],
            ];
            
            Yii::error('Caught exception: '. $e->getMessage() ."\n");
        }
        return json_encode($respuesta);
    }

    public function actionFormUsuarios()
    {
        $id_update = '';
        if(isset($_POST['id_update'])){
            $id_update = $_POST['id_update'];
        }

        return $this->render('formUsuarios', [
            'id_update' => $id_update,
        ]);
    }

    public function actionRealizarLogin(){
        $respuesta = [];
        try {
            $email = Yii::$app->request->post('email');
            $contraseña = Yii::$app->request->post('password');

            if(isset($email) && !empty($email) && isset($contraseña) && !empty($contraseña)){
                $usuario = Usuario::findOne([
                    "email" => $email,
                    "contraseña" => $contraseña
                ]);
            }else{
                throw new Exception('Debe ingresar la información');
            }

            $mensaje = '';
            $success = false;
            if($usuario){
                $_SESSION['menus'] = true;
                $mensaje = 'Se ha realizado el login correctamente: '.$usuario->nombre;
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
