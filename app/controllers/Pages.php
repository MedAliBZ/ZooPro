<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function profile() {
        $this->view('profile');
    }

    public function detailEnclo() {
        $this->view('detailEnclo');
    }

    public function enclos() {
        $this->view('enclos');
    }

    public function animauxInEnclos() {
        $this->view('animauxInEnclos');
    }


}
