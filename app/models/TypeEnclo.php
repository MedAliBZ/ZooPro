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

    public function addTypes($data)
    {
        $this->db->query('INSERT INTO typeenclos (id, label, structure) VALUES(:id, :label, :structure)');

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':label', $data['label']);
        $this->db->bind(':structure', $data['structure']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function afficher(){
        $this->db->query('SELECT * FROM typeenclos');
        return $this->db->resultSet();
    }

     public function deleteEnclo($id){
        $this->db->query('DELETE FROM enclos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username AND admin != 0');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        if ($this->db->rowCount() != 0) {
            $hashedPassword = $row->password;
            
            $this->username=$username;
            $this->email=$row->email;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        } else return false;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

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
    public function findUserByUsername($username)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmailUpdate($email,$id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email AND id != :id;');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $id);
        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByUsernameUpdate($username,$id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE username = :username AND id != :id;');

        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        $this->db->bind(':id', $id);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAccount($id){
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function updateE($data){
        $this->db->query('UPDATE enclos SET appellation = :appellation , localisation = :localisation,taille = :taille , dateConstruction = :dateConstruction , capaciteMaximale = :capaciteMaximale WHERE id = :id ');
        //Bind values
        $this->db->bind(':appellation', $data['appellation']);
        $this->db->bind(':localisation', $data['localisation']);
        $this->db->bind(':taille', $data['taille']);
        $this->db->bind(':dateConstruction', $data['dateConstruction']);
        $this->db->bind(':capaciteMaximale', $data['capaciteMaximale']);
        $this->db->bind(':id', $data['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

}