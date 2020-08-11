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
    }
