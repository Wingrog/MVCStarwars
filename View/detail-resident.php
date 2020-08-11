<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="text-center">
        <h2 class="text-center mt-5 mb-3">Détail des résident <?php echo ($resident->getName()) ?></h2>
        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-5">Retour à l'accueil</button>
        </a>
    </div>


    <div class="container col-6 bg-dark">
        <div class="card-body text-white text-center">
            <h5 class="card-title"><?php echo ($resident->getName()) ?></h5>
            <p class="card-text">Le résident est sur la planète qui à l'ID <?php echo ($resident->getPlanet_id()) ?></p>
        </div>
    </div>

</body>

</html>