<?php
class Enclo
{
    private $db;
    private $appellation;
    private $localisation;
    private $taille;
    private $dateConstruction;
    private $capaciteMaximale;
    private $photo;
    private $typeEnclos;


    public function __construct()
    {
        $this->db = new Database;
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

    public function getCapaciteMaximale(){
        echo $this->capaciteMaximale;
    }

    public function getPhoto(){
        echo $this->photo;
    }

    public function getTypeEnclos(){
        echo $this->typeEnclos;
    }


    public function addEnclos($data)
    {
        $this->db->query('INSERT INTO enclos (appellation, localisation, taille, dateConstruction, capaciteMaximale, typeEnclos, photo) VALUES(:appellation, :localisation, :taille, :dateConstruction, :capaciteMaximale, :typeEnclos, :photo)');

        //Bind values
        $this->db->bind(':appellation', $data['appellation']);
        $this->db->bind(':localisation', $data['localisation']);
        $this->db->bind(':taille', $data['taille']);
        $this->db->bind(':dateConstruction', $data['dateConstruction']);
        $this->db->bind(':capaciteMaximale', $data['capaciteMaximale']);
        $this->db->bind(':typeEnclos', $data['typeEnclos']);
        $this->db->bind(':photo', $data['photo']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

     public function getTailleSup()
    {
        $this->db->query('SELECT count(*) FROM `enclos` WHERE taille >= 1500');
        return $this->db->resultSet();
    }

    public function getTailleInf()
    {
        $this->db->query('SELECT count(*) FROM `enclos` WHERE taille < 1500');
        return $this->db->resultSet();
    }

    public function afficher(){
        $this->db->query('SELECT * FROM enclos');
        return $this->db->resultSet();
    }

 

     public function deleteEnclo($id){
        $this->db->query('DELETE FROM enclos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function updateE($data){
        $this->db->query('UPDATE enclos SET appellation = :appellation , localisation = :localisation, taille = :taille , dateConstruction = :dateConstruction , capaciteMaximale = :capaciteMaximale  WHERE id = :id ');
        //Bind values
        $this->db->bind(':appellation', $data['appellation']);
        $this->db->bind(':localisation', $data['localisation']);
        $this->db->bind(':taille', $data['taille']);
        $this->db->bind(':dateConstruction', $data['dateConstruction']);
        $this->db->bind(':capaciteMaximale', $data['capaciteMaximale']);
        // $this->db->bind(':typeEnclos', $data['typeEnclos']);
        // $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':id', $data['id']);
        


        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getEnclosByID($id)
    {
        $this->db->query('SELECT * FROM enclos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function sortEnclosByTaille()
    {
        $this->db->query('SELECT * FROM enclos ORDER BY taille DESC');
        return $this->db->resultSet();
    }

    public function listeTypeID()
    {
        $this->db->query('SELECT id FROM `typeenclos`');
        return $this->db->resultSet();
    }



   

}