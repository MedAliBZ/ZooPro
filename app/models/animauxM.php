<?php
class animauxM
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

    public function afficherAnimaux(){
        $this->db->query('SELECT * FROM animaux ');
        return $this->db->resultSet();
    }


    
    public function findUserByIDUpdate($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM animaux WHERE id != :id');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    
    public function findEmailByID()
    {
        //Prepared statement
        $this->db->query('SELECT email FROM `users` WHERE id = :id;');
        $this->db->bind(':id',$_SESSION['id'] );

        return $this->db->resultSet();
       
    }

}
