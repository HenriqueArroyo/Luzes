<?php
include 'functions.php';

// Your PHP code here.

// Home Page template below.
?>


<?= template_header('LocEdu') ?>

<div class="container">
    <section>


        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img id="carousel-img" src="img/Análise de dados dashboard empresa vermelho e roxo.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img id="carousel-img" src="img/1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img id="carousel-img" src="img/2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>




</div>
<?= template_footer($f) ?>