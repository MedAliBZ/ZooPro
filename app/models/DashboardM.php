<?php
class DashboardM
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers()
    {
        $this->db->query('select count(*) FROM users WHERE role_id = 0');
        return $this->db->resultSet();
    }
    public function getAdmins()
    {
        $this->db->query('select count(*) FROM users WHERE role_id = 1');
        return $this->db->resultSet();
    }
    public function gethauteurSup()
    {
        $this->db->query('SELECT count(*) FROM espece WHERE hauteur >= 100');
        return $this->db->resultSet();
    }

    public function gethauteurInf()
    {
        $this->db->query('SELECT count(*) FROM espece WHERE hauteur < 100');
        return $this->db->resultSet();
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
    public function getHerbivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="herbivore"');
        return $this->db->resultSet();
    }
    public function getCarnivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="carnivore"');
        return $this->db->resultSet();
    }
    public function getGranivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="granivore"');
        return $this->db->resultSet();
    }

    public function getOmnivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="omnivore"');
        return $this->db->resultSet();
    }
    public function getFrugivore()
    {
        $this->db->query('SELECT COUNT(*) FROM `regimealimentaire` WHERE nom_regime="frugivore"');
        return $this->db->resultSet();
    }
    public function getTailleSup()
    {
        $this->db->query('SELECT count(*) FROM `enclos` WHERE taille >= 1500');
        return $this->db->resultSet();
    }
    public function getTailleInf()
    {
        $this->db->query('SELECT count(*) FROM `enclos` WHERE taille < 1500');
        return $this->db->resultSet();
    }
}
