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

    public function resetPass(){
        $this->view('resetPass');
    }

    public function resetKey(){
        $this->view('resetKey');
    }

    public function getUsername(){
        $this->view('getUsername');
    }

    public function evenement() {
        $this->view('evenement');
    }



}
