<?php
class especeM
{
    private $db;
    private $idE;
    private $nomE;
    private $hauteur;
    

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getidE(){
        echo $this->idE;
    }
    public function getNomE(){
        echo $this->nomE;
    }

    public function gethauteur(){
        echo $this->hauteur;
    }

   
    public function afficherespece(){
        $this->db->query('SELECT * FROM espece ');
        return $this->db->resultSet();
    }
    
    public function findespeceByID($idE)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM espece WHERE idE = :idE;');
        $this->db->bind(':idE',$idE);

        return $this->db->resultSet();
       
    }

    

}
