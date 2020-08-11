<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Ajout d'un nouveau résident</h1>

        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-3">Retour à l'accueil</button>
        </a>

        <form method="post" action="index.php?controller=resident&action=addResident">

            <label>Nom</label>
            <input type="text" name="name" class="form-control">
            <label>Planet ID</label>
            <input type="text" name="planet_id" class="form-control">
            <input class="btn btn-success mt-3" type="submit" value="Valider">
        </form>

        <!-- Affichage des erreurs -->
        <?php
        if (isset($errors)) {
            echo ('<h2 style="color: red">Liste des erreurs :</h2>
<ol>');
            foreach ($errors as $error) {
                echo ('<li>' . $error . '</li>');
            }
            echo ('</ol>');
        }
        ?>
    </div>
</body>

</html>