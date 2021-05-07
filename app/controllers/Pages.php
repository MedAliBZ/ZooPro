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
    public function typeEnclos()
    {
        $this->view('typeEnclos');
    }
    public function evenement()
    {
        $this->view('evenement');
    }
    public function sponsor()
    {
        $this->view('sponsor');
    }
    public function resetPass()
    {
        $this->view('resetPass');
    }
    public function changePass()
    {
        $this->view('changePass');
    }
    public function dashboard()
    {
        $this->view('dashboard');
    }
}
