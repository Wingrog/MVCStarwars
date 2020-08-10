<?php
class ResidentManager extends DbManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $residents = [];
        $sql =  'SELECT * FROM resident';
        foreach ($this->bdd->query($sql) as $row) {
            $residents[] = new Resident($row['id'], $row['name'], $row['planet_id']);
        }

        return $residents;
    }

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

    public function delete($id)
    {
        $requete = $this->bdd->prepare("DELETE FROM resident where id = ?");
        $requete->bindParam(1, $id);
        $requete->execute();
    }

    public function select($id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM resident WHERE id=?");
        $requete->bindParam(1, $id);
        $requete->execute();
        $res = $requete->fetch();
        $resident = new Resident($res['id'], $res['name'], $res['planet_id']);

        return $resident;
    }

    public function update(Resident $resident)
    {
        $name = $resident->getName();
        $planet_id = $resident->getPlanet_id();
        $id = $resident->getId();

        $requete = $this->bdd->prepare("UPDATE resident SET name =?, status = ?, planet_id = ? WHERE id = ?");
        $requete->bindParam(1, $name);
        $requete->bindParam(2, $status);
        $requete->bindParam(3, $planet_id);
        $requete->bindParam(4, $id);
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
