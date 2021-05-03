<?php
class sponsors
{
    private $db;
    private $id;
    private $nom;
    private $email;
    private $nb;
    private $photo;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getid(){
        echo $this->id;
    }

    public function getNom(){
        echo $this->nom;
    }


    public function getemail(){
        echo $this->email;
    }

    public function getnb(){
        echo $this->nb;
    }

    public function getphoto(){
        echo $this->photo;
    }
    public function afficher(){
        $this->db->query('SELECT * FROM spons');
        return $this->db->resultSet();
    }

    
}