  
<?php
class especeM
{
    private $db;
    private $idE;
    private $nomE;
    private $hauteur;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getIdE(){
        echo $this->idE;
    }
    public function getNomE(){
        echo $this->nomE;
    }

    public function getHauteur(){
        echo $this->hauteur;
    }

   


    public function addespeceC($data)
    {
        $this->db->query('INSERT INTO espece (nomE,hauteur) VALUES(:nomE,:hauteur)');

        //Bind values
        $this->db->bind(':nomE', $data['nomE']);
        $this->db->bind(':hauteur', $data['hauteur']);
       

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

   

    public function afficherespece(){
        $this->db->query('SELECT * FROM espece ');
        return $this->db->resultSet();
    }


    public function deleteespece($idE){
        $this->db->query('DELETE FROM espece WHERE idE = :idE');
        $this->db->bind(':idE', $idE);
        $this->db->execute();
    }
    
    public function findUserByIDUpdate($idE)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM espece WHERE idE != :idE;');

        $this->db->bind(':idE', $idE);
        $this->db->execute();
    }


    public function updateespece($data){
        $this->db->query('UPDATE espece SET nomE =:nomE,hauteur =:hauteur WHERE idE = :idE ');
        //Bind values
        $this->db->bind(':nomE', $data['nomE']);
        $this->db->bind(':hauteur', $data['hauteur']);
        $this->db->bind(':idE', $data['idE']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
   


}