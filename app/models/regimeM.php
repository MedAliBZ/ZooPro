<?php
class regimeM
{
    private $db;
    private $id;
    private $nom_regime;
    private $type_nourriture;
    private $quantite_par_repas;
    private $nombre_de_repas;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getid(){
        echo $this->id;
    }
    public function getNom_regime(){
        echo $this->nom_regime;
    }

    public function getType_nourriture(){
        echo $this->type_nourriture;
    }

    public function getquantite_par_repas(){
        echo $this->quantite_par_repas;
    }

    public function getNombre_de_repas(){
        echo $this->nombre_de_repas;
    }

    public function afficherRegime(){
        $this->db->query('SELECT * FROM regimealimentaire ');
        return $this->db->resultSet();
    }
    
    public function findRegimeByID($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM regimealimentaire WHERE id = :id;');
        $this->db->bind(':id',$id);

        return $this->db->resultSet();
       
    }  

}
