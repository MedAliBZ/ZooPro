<?php
class planteM
{
    private $db;
    private $nomP;
    private $longevite;
    private $origine;
    private $taille;
    private $famille;
    private $image;
    private $idespece;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getnomP(){
        echo $this->nomP;
    }

    public function getlongevite(){
        echo $this->longevite;
    }

    public function getorigine(){
        echo $this->origine;
    }

    public function gettaille(){
        echo $this->taille;
    }

    public function getfamille(){
        echo $this->famille;
    }

    public function getimage(){
        echo $this->image;
    }

   

    public function afficherplante(){
        $this->db->query('SELECT * FROM plante ');
        return $this->db->resultSet();
    }


    
    public function findUserByIDUpdate($idP)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM plante WHERE idP != :idP');

        $this->db->bind(':idP', $idP);
        $this->db->execute();
    }


}
