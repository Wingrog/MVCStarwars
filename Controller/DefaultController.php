<?php
class DefaultController
{
    // Toutes ses fonctions seront à utiliser dans notre routeur index.php

    // Fonction utlisée pour afficher toutes les planètes ainsi que le nombre de planètes présentes dans la base de donnée.
    public function home()
    {
        $planetManager = new PlanetManager();
        $planets = $planetManager->selectAll();
        $countPlanets = $planetManager->count();

        // Pour afficher tous ce qui se trouve sur la table resident de la base de donnée
        $residentManager = new ResidentManager();
        $residents = $residentManager->selectAll();
        $countResidents = $residentManager->count();

        require 'View/home.php';
    }
}
