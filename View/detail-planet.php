<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="text-center">
        <h2 class="text-center mt-5 mb-3">Détail de la planète <?php echo ($planet->getName()) ?></h2>
        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-5">Retour à l'accueil</button>
        </a>
    </div>


    <div class="container col-6 bg-dark">
        <div class="card-body text-white text-center">
            <h5 class="card-title"><?php echo ($planet->getName()) ?></h5>
            <p class="card-text"><?php echo ($planet->getStatus()) ?></p>
            <p class="card-text"><?php echo ($planet->getTerrain()) ?></p>
            <p class="card-text"><?php echo ($planet->getAllegiance()) ?></p>
            <p class="card-text"><?php echo ($planet->getKey_fact()) ?></p>
            <p class="card-text"><?php echo ($planet->getImage()) ?></p>
        </div>
    </div>

</body>

</html>