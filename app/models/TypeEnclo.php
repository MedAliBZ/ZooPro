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

    public function deleteType($id){
        $this->db->query('DELETE FROM typeenclos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

     public function findTypeByID($id)
    {
        $this->db->query('SELECT * FROM typeenclos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function updateT($data){
        $this->db->query('UPDATE typeenclos SET id = :id , label = :label, structure = :structure WHERE id = :id ');
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

    public function tri($case)
    {
        $this->db->query('SELECT * FROM typeEnclos ORDER BY ' . $case);

        return $this->db->resultSet();
    }
}