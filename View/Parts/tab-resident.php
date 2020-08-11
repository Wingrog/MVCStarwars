<h1 class="text-center mt-5">La liste des résidents !</h1>

<div class="row justify-content-center mt-5">
    <div class="col-10">
        <table class="table table-striped table-dark">
            <p class="text-danger"><b>Nombre de résidents enregistrés : <?php echo ($countResidents) ?></b></p>
            <a class="btn btn-success" href="index.php?controller=resident&action=addForm">Ajouter un résident</a>
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
                            <a class="btn btn-primary mr-2" href="index.php?controller=resident&action=residentDetail&id=<?php echo $resident->getId() ?>">Détails</a>
                            <a class=" btn btn-warning mr-2" href="index.php?controller=resident&action=updateForm&id=<?php echo $resident->getId() ?>">Editer</a>
                            <a class="btn btn-danger" href="index.php?controller=resident&action=delete&id=<?php echo $resident->getId() ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>