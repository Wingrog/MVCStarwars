<?php
include('View/Parts/header.php');
include('View/Parts/navbar.php');
?>

<body>

    <!-- // ON AFFICHE LA PARTIE PLANETE -->

    <h1 class="text-center mt-5">La liste des planètes !</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            <table class="table table-striped table-dark">
                <p class="text-danger"><b>Nombre de planètes enregistrées : <?php echo ($countPlanets) ?></b></p>
                <a class="btn btn-success" href="index.php?controller=planet&action=addForm">Ajouter une planète</a>
                <thead>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Status</td>
                    <td>Allegiance</td>
                    <td>Terrain</td>
                    <td>Key Fact</td>
                    <td>Image</td>
                    <td>Action</td>
                </thead>

                <tbody>
                    <?php
                    foreach ($planets as $planet) {
                    ?>
                        <tr>
                            <td><?php echo $planet->getId() ?></td>
                            <td><?php echo $planet->getName() ?></td>
                            <td><?php echo $planet->getStatus() ?></td>
                            <td><?php echo $planet->getAllegiance() ?></td>
                            <td><?php echo $planet->getTerrain() ?></td>
                            <td><?php echo $planet->getKey_fact() ?></td>
                            <td><?php echo $planet->getImage() ?></td>
                            <td>
                                <a class="btn btn-primary mr-2" href="index.php?controller=planet&action=planetDetail&id=<?php echo $planet->getId() ?>">Détails</a>
                                <a class=" btn btn-warning mr-2" href="index.php?controller=planet&action=updateForm&id=<?php echo $planet->getId() ?>">Editer</a>
                                <a class="btn btn-danger" href="index.php?controller=planet&action=delete&id=<?php echo $planet->getId() ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <!-- ON AFFICHE LA PARTIE RESIDENT -->


    <h1 class="text-center mt-5">La liste des résidents !</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            <table class="table table-striped table-dark">
                <p class="text-danger"><b>Nombre de résidents enregistrés : <?php echo ($countResidents) ?></b></p>
                <a class="btn btn-success" href="#">Ajouter un résident</a>
                <thead>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>ID Planete</td>
                    <td>Action</td>

                </thead>

                <tbody>
                    <?php
                    foreach ($residents as $resident) {
                    ?>
                        <tr>
                            <td><?php echo $resident->getId() ?></td>
                            <td><?php echo $resident->getName() ?></td>
                            <td><?php echo $resident->getPlanet_id() ?></td>
                            <td>
                                <a class="btn btn-primary mr-2" href="#">Détails</a>
                                <a class=" btn btn-warning mr-2" href="#">Editer</a>
                                <a class="btn btn-danger" href="#">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>