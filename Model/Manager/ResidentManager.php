<?php
class ResidentManager extends DbManager
{
    public function __construct()
    {
        parent::__construct();
    }


    // Fonction pour afficher tous les résidents de la base de donnée
    public function selectAll()
    {
        $residents = [];
        $sql =  'SELECT * FROM resident';
        foreach ($this->bdd->query($sql) as $row) {
            $residents[] = new Resident($row['id'], $row['name'], $row['planet_id']);
        }

        return $residents;
    }


    // Fonction pour ajouter un résident à la base de donnée
    public function insert(Resident $resident)
    {
        $name = $resident->getName();
        $planet_id = $resident->getPlanet_id();

        $requete = $this->bdd->prepare("INSERT INTO resident (name, planet_id) VALUES (?,?)");
        $requete->bindParam(1, $name);
        $requete->bindParam(2, $planet_id);
        $requete->execute();
        $resident->setId($this->bdd->lastInsertId());
    }


    // Fonction pour selectionner un résident selon son ID à la base de donnée
    public function select($id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM resident WHERE id=?");
        $requete->bindParam(1, $id);
        $requete->execute();
        $res = $requete->fetch();
        $resident = new Resident($res['id'], $res['name'], $res['planet_id']);

        return $resident;
    }


    // Fonction pour modifier un résident à la base de donnée
    public function update(Resident $resident)
    {
        $name = $resident->getName();
        $id = $resident->getId();

        $requete = $this->bdd->prepare("UPDATE resident SET name =? WHERE id = ?");
        $requete->bindParam(1, $name);
        $requete->bindParam(2, $id);
        $requete->execute();
    }


    // Fonction pour supprimer un résident selon son ID à la base de donnée
    public function delete($id)
    {
        $requete = $this->bdd->prepare("DELETE FROM resident where id = ?");
        $requete->bindParam(1, $id);
        $requete->execute();
    }


    // Fonction pour afficher le nombre de residents qu'il y à dans la base de donnée (sera utilisée dans le DefaultController)
    public function count()
    {
        $count = $this->bdd->query('SELECT COUNT(*) AS nb FROM resident');
        $res = $count->fetch();
        $nb = $res['nb'];
        return $nb;
    }
}
