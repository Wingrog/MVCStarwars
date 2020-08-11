   <?php
    class ResidentController
    {


        // Toutes ses fonctions seront à utiliser dans notre routeur index.php

        // Fonction pour afficher le détail d'un résident.
        public function residentDetail($id)
        {
            $residentManager = new ResidentManager;
            $resident = $residentManager->select($id);
            require 'View/detail-resident.php';
        }




        // Fonction pour afficher la liste de tous les residents ainsi que le nombre enregistré en base de donnée.
        public function listResident()
        {
            $residentManager = new ResidentManager();
            $residents = $residentManager->selectAll();
            $countResidents = $residentManager->count();
            require 'View/list-resident.php';
        }



        // Fonction pour supprimer un résident à la base de donnée elle est déclenchée via le bouton supprimer (dans tab-resident.php).
        public function deleteResident($id)
        {
            $residentManager = new ResidentManager();
            $residentManager->delete($id);
            header('Location: index.php?controller=default&action=home');
        }




        // Fonction qui va afficher le formulaire d'ajout d'un resident.
        public function addForm()
        {
            require 'View/insert-resident-form.php';
        }


        // Fonction pour ajouter un résident à la base de donnée elle est déclenchée via le formulaire (form action).
        public function addResident()
        {


            // Vérification des champs du formulaire
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = 'Le champ nom est requis';
            }
            if (!ctype_alpha($_POST['name'])) {
                $errors[] = 'Le champ nom est obligatoirement du texte';
            }


            if (empty($_POST['planet_id'])) {
                $errors[] = 'Le champ planet_id est requis';
            }
            if (ctype_alpha($_POST['planet_id'])) {
                $errors[] = 'Le champ planet_id est obligatoirement des chiffres';
            }

            if (count($errors) === 0) {

                $resident = new Resident(null, $_POST['name'], $_POST['planet_id']);
                $residentManager = new ResidentManager();
                $residentManager->insert($resident);
                header('Location: index.php?controller=default&action=home');
            } else {
                require('View/insert-resident-form.php');
            }
        }


        // Fonction qui va afficher le formulaire pour modifier un resident selon son ID.
        public function updateForm($id)
        {

            $residentManager = new ResidentManager();
            $resident = $residentManager->select($id);

            require 'View/update-resident-form.php';
        }

        // Fonction pour modifier un résident à la base de donnée elle est déclenchée via le formulaire de modification (form action).
        public function updateResident($id)
        {
            $residentManager = new ResidentManager();
            $resident = $residentManager->select($id);

            // Vérification des champs du formulaire
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = 'Le champ nom est requis';
            }
            if (!ctype_alpha($_POST['name'])) {
                $errors[] = 'Le champ nom est obligatoirement du texte';
            }

            if (count($errors) === 0) {

                $resident->setName($_POST['name']);
                $residentManager->update($resident);

                header('Location: index.php?controller=default&action=home');
            } else {
                require('View/update-resident-form.php');
            }
        }
    }
