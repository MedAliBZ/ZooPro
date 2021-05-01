<?php
class AnimauxInEnclo
{
    private $db;
    private $nomAnimal;
    private $type;
    private $age;
    private $pays;
    private $status;
    private $regimeAlimentaire;
    private $image;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getnomAnimal(){
        echo $this->nomAnimal;
    }

    public function getType(){
        echo $this->type;
    }

    public function getage(){
        echo $this->age;
    }

    public function getpays(){
        echo $this->pays;
    }

    public function getstatus(){
        echo $this->status;
    }

    public function getRegimeAlimentaire(){
        echo $this->regimeAlimentaire;
    }

    public function getImage(){
        echo $this->image;
    }

     public function getStable()
    {
        $this->db->query('SELECT COUNT(*) FROM `animaux` WHERE status="stable"');
        return $this->db->resultSet();
    }
    public function getMenace()
    {
        $this->db->query('SELECT COUNT(*) FROM `animaux` WHERE status="menacé"');
        return $this->db->resultSet();
    }
    public function getEndanger()
    {
        $this->db->query('SELECT COUNT(*) FROM `animaux` WHERE status="endanger"');
        return $this->db->resultSet();
    }


    public function afficherAnimaux(){
        $this->db->query('SELECT * FROM animaux INNER JOIN regimealimentaire ON animaux.regimeAlimentaire = regimealimentaire.id');
        return $this->db->resultSet();
    }
 

}