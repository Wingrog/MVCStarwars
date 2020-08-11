<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Modifier la planète <?php echo ($planet->getName()) ?></h1>

        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-3">Retour à l'accueil</button>
        </a>

        <form method="post" action="index.php?controller=planet&action=updatePlanet&id=<?php echo ($planet->getId()) ?>">

            <label>Nom</label>
            <input type=" text" name="name" class="form-control" value="<?php echo ($planet->getName()) ?>">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?php echo ($planet->getStatus()) ?>">
            <label>Terrain</label>
            <input type="text" name="terrain" class="form-control" value="<?php echo ($planet->getTerrain()) ?>">
            <label>Allegiance</label>
            <input type="text" name="allegiance" class="form-control" value="<?php echo ($planet->getAllegiance()) ?>">
            <label>Key Fact</label>
            <input type="text" name="key_fact" class="form-control" value="<?php echo ($planet->getKey_fact()) ?>">
            <label>Image</label>
            <input type="text" name="image" class="form-control" value="<?php echo ($planet->getImage()) ?>">
            <input class="btn btn-success mt-3" type="submit" value="Valider">
        </form>

        <!-- Affichage des erreurs -->
        <?php
        if (isset($errors)) {
            echo ('<h2 class="text-danger mt-5">Liste des erreurs :</h2>
<ol>');
            foreach ($errors as $error) {
                echo ('<li class="font-weight-bold">' . $error . '</li>');
            }
            echo ('</ol>');
        }
        ?>

    </div>
</body>

</html>