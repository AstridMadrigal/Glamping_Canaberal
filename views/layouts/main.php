<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php $this->head() ?>
</head>
<body class="bg-gradient-vertical myDiv">
<?php $this->beginBody() ?>

<style>
        /* Estilo personalizado para el fondo degradado vertical */
        .bg-gradient-vertical {
            background-image: linear-gradient(to bottom, #000000, #686767);
            height: 100vh; /* Ajusta la altura al 100% de la ventana */
            display: flex;
            justify-content: center;
            background-repeat: no-repeat;
            align-items: center;
        }
        
        @media only screen and (max-width: 600px) {
            .bg-gradient-vertical {
                height: auto; /* Ajusta la altura al 100% de la ventana */
            }

            .myDiv:before {
                background-size: auto 100%!important;
            }

            .espacio_botones {
                margin-bottom: 20px!important;
            }
        }

        body {
            min-height: 100vh;
        }

        .myDiv:before {
            content: "";
            position: absolute;
            z-index: 0;
            top: 30%;
            bottom: 5%;
            left: 0;
            right: 0;
            background: url(<?=Yii::$app->getUrlManager()->getBaseUrl()?>/assets/imagenfondo.jpg) center center;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.5;
            background-size: 47% 100%;
            filter: grayscale(100%);
        }

        .contenido, .page-container {
          content: '';
          display: block;
          position: relative;
          z-index: 2;
        }

        .espacio_botones{
            margin-bottom: 200px;
        }
</style>

<?php 
$menu = 'none';

if(isset($_SESSION['menus']) && $_SESSION['menus']){
    $menu = 'block';
}

?>

<div class="container" style="height:100%;z-index:0;">
    <div id="navbarmenu" style="display:<?=$menu?>">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Glamping Cañaberal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="gestionar-disponibilidad.php">Gestionar Disponibilidad</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Registrar Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Programar Mantenimiento</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Registrar visita</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Registrar Huesped</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Comunicarse con huéspedes</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Crear Paquetes de ofertas</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Crear ficha de cliente</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->getUrlManager()->getBaseUrl().'/usuarios/form-usuarios' ?>">Gestionar Horarios</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div style="height: 30vh;text-align:center;" class="col-md-6">
            <img src="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/assets/logo_pequeño.jpeg" height="100%"  />
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row contenido">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
