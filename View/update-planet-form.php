<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Modifier une planète</h1>

        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-3">Retour à l'accueil</button>
        </a>

        <form method="post" action="index.php?controller=planet&action=updatePlanet&id=<?php echo $planet->getId() ?>">

            <label>Nom</label>
            <input type=" text" name="name" class="form-control" value="<?php echo ($planet->getName()) ?>" required>
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?php echo ($planet->getStatus()) ?>" required>
            <label>Terrain</label>
            <input type="text" name="terrain" class="form-control" value="<?php echo ($planet->getTerrain()) ?>" required>
            <label>Allegiance</label>
            <input type="text" name="allegiance" class="form-control" value="<?php echo ($planet->getAllegiance()) ?>" required>
            <label>Key Fact</label>
            <input type="text" name="key_fact" class="form-control" value="<?php echo ($planet->getKey_fact()) ?>" required>
            <label>Image</label>
            <input type="text" name="image" class="form-control" value="<?php echo ($planet->getImage()) ?>" required>
            <input class="btn btn-success mt-3" type="submit" value="Valider">
        </form>
    </div>
</body>

</html>