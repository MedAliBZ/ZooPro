<?php
class regimeM
{
    private $db;
    private $idRegime;
    private $nom_regime;
    private $type_nourriture;
    private $quantite_par_repas;
    private $nombre_de_repas;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getIdRegime(){
        echo $this->idRegime;
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

    public function addRegimeC($data)
    {
        $this->db->query('INSERT INTO regimealimentaire (nom_regime,type_nourriture,quantite_par_repas,nombre_de_repas) VALUES(:nom_regime,:type_nourriture,:quantite_par_repas,:nombre_de_repas)');

        //Bind values
        $this->db->bind(':nom_regime', $data['nom_regime']);
        $this->db->bind(':type_nourriture', $data['type_nourriture']);
        $this->db->bind(':quantite_par_repas', $data['quantite_par_repas']);
        $this->db->bind(':nombre_de_repas', $data['nombre_de_repas']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // //Find user by nom_regime. nom_regime is passed in by the Controller.
    // public function findUserBynom_regime($nom_regime)
    // {
    //     //Prepared statement
    //     $this->db->query('SELECT * FROM personel WHERE nom_regime = :nom_regime');

    //     //nom_regime param will be binded with the nom_regime variable
    //     $this->db->bind(':nom_regime', $nom_regime);
    //     $this->db->execute();

    //     //Check if email is already registered
    //     if ($this->db->rowCount() > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function afficherRegime(){
        $this->db->query('SELECT * FROM regimealimentaire ');
        return $this->db->resultSet();
    }


    public function deleteRegime($id){
        $this->db->query('DELETE FROM regimealimentaire WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    
    public function findUserByIDUpdate($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM regimealimentaire WHERE id != :id;');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function updateRegime($data){
        $this->db->query('UPDATE regimealimentaire SET nom_regime =:nom_regime,type_nourriture =:type_nourriture,quantite_par_repas =:quantite_par_repas,nombre_de_repas=:nombre_de_repas WHERE id = :id ');
        //Bind values
        $this->db->bind(':nom_regime', $data['nom_regime']);
        $this->db->bind(':type_nourriture', $data['type_nourriture']);
        $this->db->bind(':quantite_par_repas', $data['quantite_par_repas']);
        $this->db->bind(':nombre_de_repas', $data['nombre_de_repas']);
        $this->db->bind(':id', $data['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function triID()
    {
        $this->db->query('SELECT * FROM `regimealimentaire` ORDER BY id DESC ');
        return $this->db->resultSet();
    }

    public function triNomregime()
    {
        $this->db->query('SELECT * FROM `regimealimentaire` ORDER BY nom_regime ');
        return $this->db->resultSet();
    }

    public function triNombreRepas()
    {
        $this->db->query('SELECT * FROM `regimealimentaire` ORDER BY nombre_de_repas ');
        return $this->db->resultSet();
    }

    //stat

    public function getHerbivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="herbivore"');
        return $this->db->resultSet();
    }
    public function getCarnivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="carnivore"');
        return $this->db->resultSet();
    }
    public function getGranivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="granivore"');
        return $this->db->resultSet();
    }

    public function getOmnivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="omnivore"');
        return $this->db->resultSet();
    }
    public function getFrugivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="frugivore"');
        return $this->db->resultSet();
    }

    

}
