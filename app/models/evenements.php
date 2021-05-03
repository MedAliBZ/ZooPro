<?php
class evenements
{
    private $db;
    private $id;
    private $nom;
    private $date;
    private $nb;
    private $photo;
    private $description;



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


    public function getDate(){
        echo $this->date;
    }

    public function getnb(){
        echo $this->nb;
    }

    public function getphoto(){
        echo $this->photo;
    }

    public function description(){
        echo $this->description;
    }

    public function addevent($data)
    {
        $this->db->query('INSERT INTO event (nom_event,date,nbre_place,photo,description) VALUES(:nom, :date,:nb, :photo,:description)');

        //Bind values
        
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':nb', $data['nb']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':description', $data['description']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sorteventbynombredeplace()
    {
        $this->db->query('SELECT * FROM event ORDER BY nbre_place DESC');
        return $this->db->resultSet();
    }

    public function geteventID($id)
    {
        $this->db->query('SELECT * FROM event WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    //Find event by id id is passed in by the Controller.
    public function finddate($date)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM event WHERE date = :date');

        //cin param will be binded with the id variable
        $this->db->bind(':date', $date);
        $this->db->execute();

        //Check if date is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findphoto($photo)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM event WHERE photo = :photo');

        //cin param will be binded with the id variable
        $this->db->bind(':photo', $photo);
        $this->db->execute();

        //Check if date is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function afficher(){
        $this->db->query('SELECT * FROM event');
        return $this->db->resultSet();
    }


    public function deleteevent($id){
        $this->db->query('DELETE FROM event WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    
    public function findUserByCinUpdate($cin,$id)
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


    public function updateP($data){
        $this->db->query('UPDATE event SET  nom_event = :nom, date = :date, nbre_place = :nb, photo = :photo, description = :description WHERE id = :id ');
        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':nb', $data['nb']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':description', $data['description']);
        

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getnbSup()
    {
        $this->db->query('SELECT count(*) FROM event WHERE nbre_place >= 100');
        return $this->db->resultSet();
    }

    public function getnbInf()
    {
        $this->db->query('SELECT count(*) FROM event WHERE nbre_place < 100');
        return $this->db->resultSet();
    }
    

}
