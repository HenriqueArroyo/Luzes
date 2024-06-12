<?php
include 'functions.php';

// Your PHP code here.

// Home Page template below.
?>


<?= template_headerLog('LocEdu') ?>

<div class="container">
    <section>


        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img id="carousel-img" src="img/Análise de dados dashboard empresa vermelho e roxo.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img id="carousel-img" src="img/1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img id="carousel-img" src="img/2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>

    <div class="row2">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/icon-fabricacao.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 1</h5>
                        <p class="card-text">Presento do setor 1.</p>
                        <a href="sala1.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body"> 
                    <img src="img/icon-tecnologia.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 2</h5>
                        <p class="card-text">Presento do setor 1.</p>
                        <a href="sala2.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body"> 
                    <img src="img/icon-administracao.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 3</h5>
                        <p class="card-text">Presento do setor 1.</p>
                        <a href="sala3.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body"> 
                    <img src="img/icon-eletronica.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 4</h5>
                        <p class="card-text">Presento do setor 2.</p>
                        <a href="sala4.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body"> 
                    <img src="img/icon-eletronica.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 5</h5>
                        <p class="card-text">Presento do setor 2.</p>
                        <a href="sala5.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body"> 
                    <img src="img/icon-eletronica.svg" class="card-img-top" alt="...">
                        <h5 class="card-title">Sala 6</h5>
                        <p class="card-text">Presento do setor 2.</p>
                        <a href="sala6.php" class="btn btn-outline-dark">Gerenciar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= template_footer($footer) ?>
</div>