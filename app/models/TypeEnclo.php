<?php
class TypeEnclo
{
    private $db;
    private $id;
    private $label;
    private $structure;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getId(){
        echo $this->id;
    }

    public function getLabel(){
        echo $this->label;
    }

    public function getStructure(){
        echo $this->structure;
    }


    public function afficherType(){
        $this->db->query('SELECT * FROM typeenclos');
        return $this->db->resultSet();
    }


     public function findEnclosByID($id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM typeenclos WHERE id == :id;');

        $this->db->bind(':id', $id);
        $this->db->execute();
    }

}
