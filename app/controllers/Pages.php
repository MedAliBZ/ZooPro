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

    public function detailplante() {
        $this->view('detailplante');
    }

    public function plante() {
        $this->view('plante');
    }


}
