<style>
    .carousel-item img {
        object-fit: cover;
        height: 300px;
    }
    @media (min-width: 768px) {
        .carousel-item img {
            height: 400px;
        }
    }
    @media (min-width: 992px) {
        .carousel-item img {
            height: 500px;
        }
    }
    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 5px;
    }
</style>
<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://media.istockphoto.com/id/1407250130/es/foto/carpas-en-glamping-noche.jpg?s=612x612&w=0&k=20&c=TDPq0yp3Hi8uMVVgejU7x9-5irw5LyfvKzoI6DQijCs=" class="d-block w-100" alt="Glamping en la montaña">
            <div class="carousel-caption d-none d-md-block">
                <h5>Glamping en la montaña</h5>
                <p>Disfruta de la naturaleza con todo el confort</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://media.istockphoto.com/id/1317373214/es/foto/tiendas-de-campa%C3%B1a-glamping-de-lona-en-un-campo-verde-con-pasarela-en-la-vista-de-la-monta%C3%B1a.jpg?s=612x612&w=0&k=20&c=KxNUh7ZNQZyT3wNS_9rJ4KAMiVVrnMgjY1N-HVq5jTE=" class="d-block w-100" alt="Interior de la carpa de lujo">
            <div class="carousel-caption d-none d-md-block">
                <h5>Interior de lujo</h5>
                <p>Comodidad y estilo en medio de la naturaleza</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrS6WiFfvHYnxYtU4BZg895raeN2RfS2--Ug&s" class="d-block w-100" alt="Vista panorámica desde el campamento">
            <div class="carousel-caption d-none d-md-block">
                <h5>Vistas impresionantes</h5>
                <p>Paisajes que te dejarán sin aliento</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>
<div class="" style="margin-bottom: 20px;">
</div>
<div class="row">
    <div class="col-md-6" style="text-align:center;margin-bottom: 15px;">
        <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/usuarios/login" class="btn btn-secondary btn-lg">Iniciar Sesión</a>
    </div>
    <div class="col-md-6 " style="text-align:center;margin-bottom:15px;">
        <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl()?>/glamping/domo" class="btn btn-secondary btn-lg">Vista Domo</a>
    </div>
</div>