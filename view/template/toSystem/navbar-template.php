<?php require_once('helper/load-image.php') ?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
    
        <div class="mx-1 col-1">
            <img src="<?= $image ?>" class="rounded-circle" width="75px" height="75px">
        </div>

        <h2 class="text-white mt-2 mx-3" href="#">we.point</h2>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav d-flex justify-content-center mt-2 me-auto mb-lg-0">
                <li class="nav-item mx-3">
                    <i class="text-white h5" aria-current="page" href="#">Home</i>
                </li>

                <li class="nav-item mx-3">
                    <i class="text-white h5">Bem vindo <?= $name ?></i>
                </li>
            </ul>
            <a class="btn me-2 px-3 text-white" href="/logout">Sair</a>
        </div>
    </div>
</nav>
