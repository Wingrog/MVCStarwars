<?php
// On met bien le fichier include.php dans le routeur (index.php) et seulement ici.
require 'include.php';

if (empty($_GET)) {
    header('Location: index.php?controller=default&action=home');
} else if ($_GET['controller'] === 'default' && $_GET['action'] === 'home') {
    $planetController = new DefaultController();
    $planetController->home();
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
    $planetController->listPlanet();
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'listResident') {
    $planetController = new ResidentController();
    $planetController->listResident();
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'residentDetail' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->residentDetail($_GET['id']);
} else if ($_GET['controller'] === 'resident' && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $residentController = new ResidentController;
    $residentController->deleteResident($_GET['id']);
} else {
    throw new Exception('La page demandée n\'existe pas', 404);
}
