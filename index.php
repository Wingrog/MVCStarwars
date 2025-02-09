<?php
// On met bien le fichier include.php dans le routeur (index.php) et seulement ici.
require 'include.php';

// REDIRECTION AUTOMATIQUE
if (empty($_GET)) {
    header('Location: index.php?controller=default&action=home');
} else if ($_GET['controller'] === 'default' && $_GET['action'] === 'home') {
    $planetController = new DefaultController();
    $planetController->home();

    // POUR LES PLANETES
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'planetDetail' && isset($_GET['id'])) {
    $planetController = new PlanetController;
    $planetController->planeteDetail($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'addForm') {
    $planetController = new PlanetController();
    $planetController->addForm();
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'addPlanet') {
    $planetController = new PlanetController();
    $planetController->addPlanet();
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'updateForm' && isset($_GET['id'])) {
    $planetController = new PlanetController;
    $planetController->updateForm($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'updatePlanet' && isset($_GET['id'])) {
    $planetController = new PlanetController;
    $planetController->updatePlanet($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $planetController = new PlanetController;
    $planetController->deletePlanet($_GET['id']);
} else if ($_GET['controller'] === 'planet' && $_GET['action'] === 'listPlanet') {
    $planetController = new PlanetController();
    $planetController->listPlanets();

    // POUR LES RESIDENTS
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'listResident') {
    $residentController = new ResidentController();
    $residentController->listResidents();
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'residentDetail' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->residentDetail($_GET['id']);
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->deleteResident($_GET['id']);
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'addForm') {
    $residentController = new ResidentController();
    $residentController->addForm();
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'addResident') {
    $residentController = new ResidentController();
    $residentController->addResident();
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'updateForm' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->updateForm($_GET['id']);
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'updateResident' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->updateResident($_GET['id']);

    // SI AUCUN DES PARAMETRES N'EST TROUVES RETOURNE CETTE ERREUR
} else {
    throw new Exception('La page demandée n\'existe pas', 404);
}
