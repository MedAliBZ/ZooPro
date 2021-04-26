<?php
class sponsors
{
    private $db;
    private $id;
    private $nom;
    private $email;
    private $nb;


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

    public function addsponsor($data)
    {
        $this->db->query('INSERT INTO spons (nom,email,num) VALUES(:nom, :email,:nb)');

        //Bind values
        
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nb', $data['nb']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

    public function findEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM spons WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findnum($nb)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM spons WHERE num = :nb');

        //username param will be binded with the username variable
        $this->db->bind(':nb', $nb);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function findnom($nom)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM spons WHERE nom = :nom');

        //username param will be binded with the username variable
        $this->db->bind(':nom', $nom);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    public function afficher(){
        $this->db->query('SELECT * FROM spons');
        return $this->db->resultSet();
    }


    public function deletesponsor($id){
        $this->db->query('DELETE FROM spons WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    
    


    public function updateP($data){
        $this->db->query('UPDATE spons SET  nom = :nom, num = :nb, email = :email WHERE id = :id ');
        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nb', $data['nb']);
        

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

}
