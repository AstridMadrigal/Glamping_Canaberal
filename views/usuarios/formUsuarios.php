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
        <?php if($id_update != ''){?>
            <h1 class="mb-4">Actualiza Usuario</h1>
        <?php } else{  ?>
            <h1 class="mb-4">Creación Usuario</h1>
        <?php } ?>
        <br>
    </div>
</div>
<div class="container">
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese su correo electrónico</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="inputPassword" class="col-sm-4 col-form-label text-white">Ingrese su contraseña</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese su nombre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese sus apellidos</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="apellidos" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-5 col-form-label text-white">Ingrese su tipo y número de documento</label>
            <div class="col-sm-2">
                <select class="form-control" id="tipo_documento">
                    <option selected value="" disabled>...</option>
                    <option value="cc">CC</option>
                    <option value="ce">CE</option>
                </select>
            </div>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="documento" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese su fecha de nacimiento</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="fecha_nacimiento" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"  style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <label for="usuario" class="col-sm-4 col-form-label text-white">Ingrese su teléfono de contacto</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="telefono" value="">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" >
        <div class="col-md-12 " style="text-align:center;margin-bottom: 15px;">
            <button type="button" onclick="crearUsuario()" class="btn btn-secondary btn-lg">Registrarse ahora</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('select').select2({ 
            width: '100%',
            containerCssClass: "form-control"
        });
    });

    function crearUsuario() {
        $.ajax({
            type:'POST',
            url:'<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/usuarios/crear-usuario',
            dataType:'json',
            data:{
                'email' : $("#email").val(),
                'password' : $("#inputPassword").val(),
                'nombre' : $("#nombre").val(),
                'apellidos' : $("#apellidos").val(),
                'tipo_documento' : $("#tipo_documento").val(),
                'documento' : $("#documento").val(),
                'fecha_nacimiento' : $("#fecha_nacimiento").val(),
                'telefono' : $("#telefono").val(),
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