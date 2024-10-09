<?php 
use yii\helpers\Url;

?>

<style>
    @media only screen and (max-width: 600px) {
        .espacio_botones {
            margin-bottom: 20px!important;
        }
    }
    .espacio_botones{
        margin-bottom: 200px;
    }
</style>

<div class="container" style="margin-bottom: 20px;">
    <div style="" class="row text-center text-white">
        <h1 class="mb-4">Inicio de Sesión</h1>
        <br>
    </div>
</div>
<div class="container">
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese su usuario</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="inputPassword" class="col-sm-4 col-form-label text-white">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="espacio_botones" style="">
    </div>
    <div class="row" >
        <div class="col-md-12 " style="text-align:center;margin-bottom: 15px;">
            <button type="button" onclick="Login()" class="btn btn-secondary btn-lg">Iniciar Sesión</button>
        </div>
        <div class="col-md-6 " style="text-align:center;margin-bottom:15px;">
            <button type="button" class="btn btn-secondary btn-lg">Registrarse</button>
        </div>
        <div class="col-md-6 " style="text-align:center;margin-bottom:15px;">
            <button type="button" class="btn btn-secondary btn-lg">Recuperar Contraseña</button>
        </div>
    </div>
</div>
<script>
    function Login() {
        $.ajax({
            type:'POST',
            url:'<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/usuarios/realizar-login',
            dataType:'json',
            data:{
                'email' : $("#email").val(),
                'password' : $("#inputPassword").val(),
            }
        }).done(function(data) {
            if(data.success == true){
                Swal.fire({
                    icon: "success",
                    title: "Genial!",
                    text: data.message
                }).then(function() {
                    window.location = "<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/site/index2";
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Ops...",
                    text: data.message
                }).then(function() {
                    window.location = "<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/site/error";
                });
            }
        });
    }
</script>