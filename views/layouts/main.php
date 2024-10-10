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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>

<style>
        /* Estilo personalizado para el fondo degradado vertical */
        .bg-gradient-vertical {
            background-image: linear-gradient(to bottom, #000000, #686767);
            height: 100vh; /* Ajusta la altura al 100% de la ventana */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        @media only screen and (max-width: 600px) {
            .myDiv:before {
                background-size: auto 100%!important;
            }
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
</style>

<div class="bg-gradient-vertical d-flex flex-column">
    <div class="myDiv">
    </div>
    <div class="container" style="height:100%;z-index:1;">
        <div class="row">
            <div class="col-md-3"></div>
            <div style="height: 30vh;text-align:center;" class="col-md-6">
                <img src="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/assets/logo_pequeño.jpeg" height="100%"  />
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
