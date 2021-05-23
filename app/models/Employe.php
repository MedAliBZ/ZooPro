<?php
class Employe
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSalaireSup()
    {
        $this->db->query('SELECT count(*) FROM `personel` WHERE salaire >= 1500');
        return $this->db->resultSet();
    }

    public function getSalaireInf()
    {
        $this->db->query('SELECT count(*) FROM `personel` WHERE salaire < 1500');
        return $this->db->resultSet();
    }

    public function addEmployes($data)
    {
        $this->db->query('INSERT INTO personel (cin, nom, prenom,date_de_naissance,salaire,updated_by) VALUES(:cin, :nom, :prenom,:dateNaissance,:salaire,:updated_by)');

        //Bind values
        $this->db->bind(':cin', $data['cin']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':dateNaissance', $data['dateNaissance']);
        $this->db->bind(':salaire', $data['salaire']);
        $this->db->bind(':updated_by', $_SESSION['id']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by cin. Cin is passed in by the Controller.
    public function findUserByCin($cin)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM personel WHERE cin = :cin');

        //cin param will be binded with the cin variable
        $this->db->bind(':cin', $cin);
        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function afficher()
    {
        $this->db->query('SELECT * FROM personel');
        return $this->db->resultSet();
    }

    public function tri($case)
    {
        $this->db->query('SELECT * FROM personel ORDER BY ' . $case);

        return $this->db->resultSet();
    }

    public function filter($role)
    {
        if ($role == 'sup')
            $this->db->query('SELECT * FROM personel WHERE salaire >= 1500 ORDER BY salaire');
        else if ($role == 'inf')
            $this->db->query('SELECT * FROM personel WHERE salaire < 1500 ORDER BY salaire');

        return $this->db->resultSet();
    }


    public function deleteEmploye($id)
    {
        $this->db->query('DELETE FROM personel WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function findUserByCinUpdate($cin, $id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM personel WHERE cin = :cin AND id != :id;');

        //cin param will be binded with the cin variable
        $this->db->bind(':cin', $cin);
        $this->db->bind(':id', $id);
        $this->db->execute();

        //Check if cin is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function updateP($data)
    {
        $this->db->query('UPDATE personel SET cin = :cin , nom = :nom, prenom = :prenom, date_de_naissance = :dateNaissance, salaire = :salaire, updated_by = :updated_by WHERE id = :id ');
        //Bind values
        $this->db->bind(':cin', $data['cin']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':dateNaissance', $data['dateNaissance']);
        $this->db->bind(':salaire', $data['salaire']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':updated_by', $_SESSION['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
