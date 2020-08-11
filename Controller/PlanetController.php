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

    // Fonction utlisée pour afficher toutes les planètes ainsi que le nombre de planètes présentes dans la base de donnée.
    public function listPlanets()
    {
        $planetManager = new PlanetManager();
        $planets = $planetManager->selectAll();
        $countPlanets = $planetManager->count();
        require 'View/list-planet.php';
    }


    // Fonction qui va afficher le formulaire d'ajout d'une planète.
    public function addForm()
    {
        require 'View/insert-planet-form.php';
    }

    // Fonction pour ajouter une planète à la base de donnée elle est déclenchée via le formulaire (form action).
    public function addPlanet()
    {
        // Vérification des champs du formulaire
        $errors = [];
        if (empty($_POST['name'])) {
            $errors[] = 'Le champ nom est requis';
        }
        if (empty($_POST['status'])) {
            $errors[] = 'Le champ status est requis';
        }
        if (empty($_POST['terrain'])) {
            $errors[] = 'Le champ terrain est requis';
        }
        if (empty($_POST['allegiance'])) {
            $errors[] = 'Le champ allegiance est requis';
        }
        if (empty($_POST['key_fact'])) {
            $errors[] = 'Le champ key_fact est requis';
        }
        if (empty($_POST['image'])) {
            $errors[] = 'Le champ image est requis';
        }


        if (count($errors) === 0) {
            $planet = new Planet(null, $_POST['name'], $_POST['status'], $_POST['terrain'], $_POST['allegiance'], $_POST['key_fact'], $_POST['image']);
            $planetManager = new PlanetManager();
            $planetManager->insert($planet);
            header('Location: index.php?controller=default&action=home');
        } else {
            require('View/insert-planet-form.php');
        }
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

        // Vérification des champs du formulaire
        $errors = [];
        if (empty($_POST['name'])) {
            $errors[] = 'Le champ nom est requis';
        }
        if (empty($_POST['status'])) {
            $errors[] = 'Le champ status est requis';
        }
        if (empty($_POST['terrain'])) {
            $errors[] = 'Le champ terrain est requis';
        }
        if (empty($_POST['allegiance'])) {
            $errors[] = 'Le champ allegiance est requis';
        }
        if (empty($_POST['key_fact'])) {
            $errors[] = 'Le champ key_fact est requis';
        }
        if (empty($_POST['image'])) {
            $errors[] = 'Le champ image est requis';
        }


        if (count($errors) === 0) {

            $planet->setName($_POST['name']);
            $planet->setStatus($_POST['status']);
            $planet->setTerrain($_POST['terrain']);
            $planet->setAllegiance($_POST['allegiance']);
            $planet->setKey_fact($_POST['key_fact']);
            $planet->setImage($_POST['image']);
            $planetManager->update($planet);

            header('Location: index.php?controller=default&action=home');
        } else {
            require('View/update-planet-form.php');
        }
    }


    // Fonction pour supprimer une planète à la base de donnée elle est déclenchée via le bouton supprimer (dans tab-planet.php).
    public function deletePlanet($id)
    {
        $planetManager = new PlanetManager();
        $planetManager->delete($id);
        header('Location: index.php?controller=default&action=home');
    }
}
