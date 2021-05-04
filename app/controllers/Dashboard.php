<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->statsModel = $this->model('DashboardM');
    }

    public function showStats(){
        $data = [
            'users' => '',
            'admins' => '',
            'sup' => '',
            'inf' => '',
            'stable' => '',
            'menace' => '',
            'endanger' => '',
            'herbivore' => '',
            'omnivore' => '',
            'frugivore' => '',
            'carnivore' => '',
            'granivore' => '',
            'supp' => '',
            'inff' => '',
            'suppp' => '',
            'infff' => ''
        ];

        $sup = $this->statsModel->gethauteurSup();
        $data['suppp'] = $sup[0][0];

        $inf = $this->statsModel->gethauteurInf();
        $data['infff'] = $inf[0][0];

        $sup = $this->statsModel->getTailleSup();
        $data['supp'] = $sup[0][0];

        $inf = $this->statsModel->getTailleInf();
        $data['inff'] = $inf[0][0];

        $herbivore = $this->statsModel->getHerbivore();
        $data['herbivore'] = $herbivore[0][0];

        $omnivore = $this->statsModel->getOmnivore();
        $data['omnivore'] = $omnivore[0][0];

        $frugivore = $this->statsModel->getFrugivore();
        $data['frugivore'] = $frugivore[0][0];


        $carnivore = $this->statsModel->getCarnivore();
        $data['carnivore'] = $carnivore[0][0];

        $granivore = $this->statsModel->getGranivore();
        $data['granivore'] = $granivore[0][0];

        $stable = $this->statsModel->getStable();
        $data['stable'] = $stable[0][0];

        $menace = $this->statsModel->getMenace();
        $data['menace'] = $menace[0][0];

        $endanger = $this->statsModel->getEndanger();
        $data['endanger'] = $endanger[0][0];

        $sup = $this->statsModel->getSalaireSup();
        $data['sup'] = $sup[0][0];

        $inf = $this->statsModel->getSalaireInf();
        $data['inf'] = $inf[0][0];

        $users = $this->statsModel->getUsers();
        $data['users'] = $users[0][0];

        $admins = $this->statsModel->getAdmins();
        $data['admins'] = $admins[0][0];

        $this->view("dashboard",$data);
    }
}

?>