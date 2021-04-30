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


    public function addanimauxM($data)
    {
        $this->db->query('INSERT INTO animaux (nomAnimal,type,age,pays,status,regimeAlimentaire,image,updated_by) VALUES(:nomAnimal,:type,:age,:pays,:status,:regimeAlimentaire,:image,:updated_by)');

        //Bind values
        $this->db->bind(':nomAnimal', $data['nomAnimal']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':pays', $data['pays']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':regimeAlimentaire', $data['regimeAlimentaire']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':updated_by', $_SESSION['id']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function afficherAnimaux(){
        $this->db->query('SELECT * FROM animaux ');
        return $this->db->resultSet();
    }


    public function deleteAnimal($id){
        $this->db->query('DELETE FROM animaux WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    
    public function findUserByIDUpdate($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM animaux WHERE id != :id');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function updateAnimal($data){
        $this->db->query('UPDATE animaux SET nomAnimal=:nomAnimal,type=:type,age=:age,pays=:pays,status=:status,regimeAlimentaire=:regimeAlimentaire,image=:image,updated_by=:updated_by WHERE id=:id');
        //Bind values
        $this->db->bind(':nomAnimal',$data['nomAnimal']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':pays',$data['pays']);
        $this->db->bind(':status',$data['status']);
        $this->db->bind(':regimeAlimentaire', $data['regimeAlimentaire']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':updated_by', $_SESSION['id']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
      
    public function listRegimeID()
    {
        $this->db->query('SELECT id FROM `regimealimentaire`');
        return $this->db->resultSet();
    }

    public function triID()
    {
        $this->db->query('SELECT * FROM `animaux` ORDER BY id DESC ');
        return $this->db->resultSet();
    }

    public function triNomAnimal()
    {
        $this->db->query('SELECT * FROM `animaux` ORDER BY nomAnimal ');
        return $this->db->resultSet();
    }

    public function triAge()
    {
        $this->db->query('SELECT * FROM `animaux` ORDER BY age ');
        return $this->db->resultSet();
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
   

}
