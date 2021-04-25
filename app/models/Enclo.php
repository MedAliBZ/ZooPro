<?php
class Enclo
{
    private $db;
    private $id;
    private $appellation;
    private $localisation;
    private $taille;
    private $dateConstruction;
    private $capaciteMaximale;
    private $typeEnclos;
    private $photo;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getId(){
        echo $this->id;
    }

    public function getAppellation(){
        echo $this->appellation;
    }

    public function getLocalisation(){
        echo $this->localisation;
    }

    public function getTaille(){
        echo $this->taille;
    }

    public function getDateConstruction(){
        echo $this->dateConstruction;
    }

    public function getRegimeAlimentaire(){
        echo $this->regimeAlimentaire;
    }

    public function getCapaciteMaximale(){
        echo $this->capaciteMaximale;
    }

     public function getTypeEnclos(){
        echo $this->typeEnclos;
    }

     public function getPhoto(){
        echo $this->photo;
    }

    public function afficherEnclos(){
        $this->db->query('SELECT * FROM enclos INNER JOIN typeenclos ON enclos.typeEnclos = typeEnclos.id');
        return $this->db->resultSet();
    }
    


    
    public function findUserByIDUpdate($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM enclos WHERE id != :id');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }


}
