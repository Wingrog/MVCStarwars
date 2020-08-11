<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>


<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Modifier un résident</h1>

        <a href="index.php?controller=default&action=home">
            <button class="btn btn-warning mb-3">Retour à l'accueil</button>
        </a>

        <form method="post" action="index.php?controller=resident&action=updateResident&id=<?php echo $resident->getId() ?>">

            <label>Nom</label>
            <input type="text" name="name" class="form-control" value="<?php echo ($resident->getName()) ?>" required>
            <input class="btn btn-success mt-3" type="submit" value="Valider">
        </form>
    </div>
</body>

</html>