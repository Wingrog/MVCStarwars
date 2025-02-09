<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Ajout d'une nouvelle planète</h1>

        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-3">Retour à l'accueil</button>
        </a>

        <form method="post" action="index.php?controller=planet&action=addPlanet">

            <label>Nom</label>
            <input type="text" name="name" class="form-control">
            <label>Status</label>
            <input type="text" name="status" class="form-control">
            <label>Terrain</label>
            <input type="text" name="terrain" class="form-control">
            <label>Allegiance</label>
            <input type="text" name="allegiance" class="form-control">
            <label>Key Fact</label>
            <input type="text" name="key_fact" class="form-control">
            <label>Image</label>
            <input type="text" name="image" class="form-control">
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