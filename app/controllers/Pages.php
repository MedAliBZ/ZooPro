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

    public function detailAnimal() {
        $this->view('detailAnimal');
    }

    public function animaux() {
        $this->view('animaux');
    }


}
