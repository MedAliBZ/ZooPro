<?php
class participations
{
    private $db;
    private $id;
    private $id_event;
    private $id_user;
    private $nb;




    public function __construct()
    {
        $this->db = new Database;
    }

    public function getid(){
        echo $this->id;
    }

    public function getid_event(){
        echo $this->id_event;
    }


    public function getid_user(){
        echo $this->id_user;
    }

    public function getnb(){
        echo $this->nb;
    }
    public function getNbrPlaces($event){

        $this->db->query('select SUM(nb) as nbr from participation where id_event = :idEvent');
        $this->db->bind(':idEvent', $event);
        return (int)$this->db->resultSet()[0]['nbr'];
    }

    public function getMaxPlacesByEvent($event){

        $this->db->query('select nbre_place as nbr from event where id = :idEvent');
        $this->db->bind(':idEvent', $event);
        return (int)$this->db->resultSet()[0]['nbr'];
    }

    public function addparticipation($data)
    {
        $idEvent = (int) $data['id_event'];

        $nbrPlaces = $this->getNbrPlaces($idEvent);
        $maxPlaces = $this->getMaxPlacesByEvent($idEvent);
        if($nbrPlaces + (int)$data['nb'] <= $maxPlaces ){
            $this->db->query('INSERT INTO participation (id_event,id_user,nb) VALUES(:id_event,:id_user,:nb)');

            //Bind values
            
            $this->db->bind(':id_event',(int) $data['id_event']);
            $this->db->bind(':id_user', (int)$data['id_user']);
            $this->db->bind(':nb', (int)$data['nb']);
        
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
       
       
    }
}