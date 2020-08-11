<?php
class PlanetController
{

    // Toutes ses fonctions seront à utiliser dans notre routeur index.php

    // Fonction pour afficher le détail d'une planète.
    public function planeteDetail($id)
    {
        $planetManager = new PlanetManager;
        $planet = $planetManager->select($id);
        require 'View/detail-planet.php';
    }


    // Fonction qui va afficher le formulaire d'ajout d'une planète.
    public function addForm()
    {
        require 'View/insert-planet-form.php';
    }

    // Fonction pour ajouter une planète à la base de donnée elle est déclenchée via le formulaire (form action).
    public function addPlanet()
    {
        $planet = new Planet(null, $_POST['name'], $_POST['status'], $_POST['terrain'], $_POST['allegiance'], $_POST['key_fact'], $_POST['image']);
        $planetManager = new PlanetManager();
        $planetManager->insert($planet);
        header('Location: index.php?controller=default&action=home');
    }


    // Fonction pour supprimer une planète à la base de donnée elle est déclenchée via le bouton supprimer (dans tab-planet.php).
    public function deletePlanet($id)
    {
        $planetManager = new PlanetManager();
        $planetManager->delete($id);
        header('Location: index.php?controller=default&action=home');
    }


    // Fonction qui va afficher le formulaire pour modifier une planète selon son ID.
    public function updateForm($id)
    {
        $planetManager = new PlanetManager();
        $planet = $planetManager->select($id);

        require 'View/update-planet-form.php';
    }


    // Fonction pour modifier une planète à la base de donnée elle est déclenchée via le formulaire de modification (form action).
    public function updatePlanet($id)
    {
        $planetManager = new PlanetManager();
        $planet = $planetManager->select($id);
        $planet = new Planet($id, $_POST['name'], $_POST['status'], $_POST['terrain'], $_POST['allegiance'], $_POST['key_fact'], $_POST['image']);
        $planetManager->update($planet);

        header('Location: index.php?controller=default&action=home');
    }


    // Fonction utlisée pour afficher toutes les planètes ainsi que le nombre de planètes présentes dans la base de donnée.
    public function listPlanet()
    {
        $planetManager = new PlanetManager();
        $planets = $planetManager->selectAll();
        $countPlanets = $planetManager->count();
        require 'View/list-planet.php';
    }
}
