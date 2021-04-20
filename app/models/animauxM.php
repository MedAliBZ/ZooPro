<?php
class animauxM
{
    private $db;
    private $nomAnimal;
    private $race;
    private $age;
    private $pays;
    private $genre;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getnomAnimal(){
        echo $this->nomAnimal;
    }

    public function getrace(){
        echo $this->race;
    }

    public function getage(){
        echo $this->age;
    }

    public function getpays(){
        echo $this->pays;
    }

    public function getGenre(){
        echo $this->genre;
    }


    public function addanimauxM($data)
    {
        $this->db->query('INSERT INTO animaux (nomAnimal,race,age,pays,genre) VALUES(:nomAnimal,:race,:age,:pays,:genre)');

        //Bind values
        $this->db->bind(':nomAnimal', $data['nomAnimal']);
        $this->db->bind(':race', $data['race']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':pays', $data['pays']);
        $this->db->bind(':genre', $data['genre']);

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
        $this->db->query('SELECT * FROM animaux WHERE id != :id;');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function updateAnimal($data){
        $this->db->query('UPDATE animaux SET nomAnimal=:nomAnimal,race=:race,age=:age,pays=:pays,genre=:genre WHERE id=:id ');
        //Bind values
        $this->db->bind(':nomAnimal',$data['nomAnimal']);
        $this->db->bind(':race', $data['race']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':pays',$data['pays']);
        $this->db->bind(':genre',$data['genre']);
        $this->db->bind(':id', $data['id']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

}
