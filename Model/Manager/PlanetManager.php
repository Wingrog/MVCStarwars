<?php

class PlanetManager extends DbManager
{
    public function __construct()
    {
        parent::__construct();
    }


    // Fonction pour afficher toutes les planètes de la base de donnée
    public function selectAll()
    {
        $planets = [];
        $sql =  'SELECT * FROM planets';
        foreach ($this->bdd->query($sql) as $row) {
            $planets[] = new Planet($row['id'], $row['name'], $row['status'], $row['terrain'], $row['allegiance'], $row['key_fact'], $row['image']);
        }

        return $planets;
    }


    // Fonction pour ajouter une planète à la base de donnée
    public function insert(Planet $planet)
    {
        $name = $planet->getName();
        $status = $planet->getStatus();
        $terrain = $planet->getTerrain();
        $allegiance = $planet->getAllegiance();
        $key_fact = $planet->getKey_fact();
        $image = $planet->getImage();

        $requete = $this->bdd->prepare("INSERT INTO planets (name, status, terrain, allegiance, key_fact, image) VALUES (?,?,?,?,?,?)");
        $requete->bindParam(1, $name);
        $requete->bindParam(2, $status);
        $requete->bindParam(3, $terrain);
        $requete->bindParam(4, $allegiance);
        $requete->bindParam(5, $key_fact);
        $requete->bindParam(6, $image);

        $requete->execute();
        $planet->setId($this->bdd->lastInsertId());
    }


    // Fonction pour supprimer une planète selon son ID à la base de donnée
    public function delete($id)
    {
        $requete = $this->bdd->prepare("DELETE FROM planets where id = ?");
        $requete->bindParam(1, $id);
        $requete->execute();
    }


    // Fonction pour selectionner une planète selon son ID à la base de donnée
    public function select($id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM planets WHERE id=?");
        $requete->bindParam(1, $id);
        $requete->execute();
        $res = $requete->fetch();
        $planet = new Planet($res['id'], $res['name'], $res['status'], $res['terrain'], $res['allegiance'], $res['key_fact'], $res['image']);

        return $planet;
    }


    // Fonction pour modifier une planète à la base de donnée
    public function update(Planet $planet)
    {
        $name = $planet->getName();
        $status = $planet->getStatus();
        $terrain = $planet->getTerrain();
        $id = $planet->getId();
        $allegiance = $planet->getAllegiance();
        $key_fact = $planet->getKey_fact();
        $image = $planet->getImage();

        $requete = $this->bdd->prepare("UPDATE planets SET name = ?, status = ?, terrain = ?, allegiance = ?, key_fact = ?, image = ? WHERE id = ?");
        $requete->bindParam(1, $name);
        $requete->bindParam(2, $status);
        $requete->bindParam(3, $terrain);
        $requete->bindParam(4, $allegiance);
        $requete->bindParam(5, $key_fact);
        $requete->bindParam(6, $image);
        $requete->bindParam(7, $id);
        $requete->execute();
    }


    // Fonction pour afficher le nombre de planètes qu'il y à dans la base de donnée (sera utilisée dans le DefaultController)
    public function count()
    {
        $count = $this->bdd->query('SELECT COUNT(*) AS nb FROM planets');
        $res = $count->fetch();
        $nb = $res['nb'];
        return $nb;
    }
}
