<?php
class evenements
{
    private $db;
    private $id;
    private $nom;
    private $date;
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


    public function getDate(){
        echo $this->date;
    }

    public function getnb(){
        echo $this->nb;
    }

    public function getphoto(){
        echo $this->photo;
    }

    public function afficher(){
        $this->db->query('SELECT * FROM event');
        return $this->db->resultSet();
    }

}
