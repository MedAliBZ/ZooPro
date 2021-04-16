<?php
class Pages extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
    }

    public function index()
    {
        $this->view('index');
    }

    public function usersV()
    {
        $this->view('usersV');
    }

    public function employes()
    {
        $this->view('employes');
    }
    public function animaux()
    {
        $this->view('animaux');
    }
    public function regime()
    {
        $this->view('regime');
    }
    public function plante()
    {
        $this->view('plante');
    }
    public function espece()
    {
        $this->view('espece');
    }
    public function enclos()
    {
        $this->view('enclos');
    }
    public function types()
    {
        $this->view('types');
    }
    public function evenement()
    {
        $this->view('evenement');
    }
    public function sponsor()
    {
        $this->view('sponsor');
    }
}
