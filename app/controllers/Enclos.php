<?php
class Enclos extends Controller
{
    public function __construct()
    {
        $this->encloModel = $this->model('Enclo');
    }

    public function addEnclos()
    {
        $data = [
            'appellation' => '',
            'localisation' => '',
            'taille' => '',
            'dateConstruction' => '',
            'capaciteMaximale' => '',
            'photo' => '',
            'typeEnclos' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'appellation' => trim($_POST['appellation']),
                'localisation' => trim($_POST['localisation']),
                'taille' => trim($_POST['taille']),
                'dateConstruction' => trim($_POST['dateConstruction']),
                'capaciteMaximale' => trim($_POST['capaciteMaximale']),
                'photo' => trim($_POST['photo']),
                'typeEnclos' => trim($_POST['typeEnclos']),
                'errorAdd' => ''
            ];
            
            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //Register user from model function
                if ($this->encloModel->addEnclos($data)) {
                 $this->view('enclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
         
        $this->view('enclos', $data);
    }

    
    public function afficherList($error = '')
    {

        $tab = $this->encloModel->afficher();
        $data = [
            'tab' => '',
            'typeEnclos'=> '',
            'errorAdd' => '',
            'sup' => '',
            'inf' => ''
        ];
        $sup = $this->encloModel->getTailleSup();
        $data['sup'] = $sup[0][0];

        $inf = $this->encloModel->getTailleInf();
        $data['inf'] = $inf[0][0];

        foreach ($tab as $key => $value) {
            $data['tab'] .= ' <li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Appellation">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Localisation">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Taille">' . $value[3] . '</div>
                    <div class="col col-5" data-label="Date de construction">' . $value[4] . '</div>
                    <div class="col col-6" data-label="Capacite maximale">' . $value[5] . '</div>
                    <div class="col col-7">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
        }
        $typeEnclos = $this->encloModel->listeTypeID();
        foreach ($typeEnclos as $key => $value)
        {
            $data['typeEnclos'] .= '<option value="'.$value[0].'">'.$value[0].'</option>';
        }
        
        $this->view('enclos', $data);
    }

        
    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->encloModel->deleteEnclo($_POST['id']);
            header('location:' . URLROOT . '/pages/enclos');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'appellation' => '',
                'localisation' => '',
                'taille' => '',
                'dateConstruction' => '',
                'capaciteMaximale' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'appellation' => trim($_POST['appellation']),
                    'localisation' => trim($_POST['localisation']),
                    'taille' => trim($_POST['taille']),
                    'dateConstruction' => trim($_POST['dateConstruction']),
                    'capaciteMaximale' => trim($_POST['capaciteMaximale']),
                    'errorUpdate' => ''
                ];
                
            // Make sure that errors are empty
            if (empty($data['errorUpdate'])) {

                //Register user from model function
                if ($this->encloModel->updateE($data)) {
                 $this->view('enclos', $data);
                } 
                else
                {
                  die('Something went wrong.');
                }
            }
        }
                
            $this->view('enclos', $data);
        }
    }

    public function getEnclos()
    {       
    if(isset($_POST['search_enclos'])) {
        $tab = $this->encloModel->getEnclosByID($_POST['id']);
    }
      $data = [
            'tab' => '',
            'errorAdd' => ''
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= ' <li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Appellation">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Localisation">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Taille">' . $value[3] . '</div>
                    <div class="col col-5" data-label="Date de construction">' . $value[4] . '</div>
                    <div class="col col-6" data-label="Capacite maximale">' . $value[5] . '</div>
                    <div class="col col-7">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
        }

        $this->view('enclos', $data);
    }

     public function sortEnclos($error = '')
    {
        $tab = $this->encloModel->sortEnclosByTaille();
        $data = [
            'tab' => '',
            'errorAdd' => ''
        ];

        foreach ($tab as $key => $value) {
            $data['tab'] .= ' <li class="table-row">
                    <div class="col col-1" data-label="ID">' . $value[0] . '</div>
                    <div class="col col-2" data-label="Appellation">' . $value[1] . '</div>
                    <div class="col col-3" data-label="Localisation">' . $value[2] . '</div>
                    <div class="col col-4" data-label="Taille">' . $value[3] . '</div>
                    <div class="col col-5" data-label="Date de construction">' . $value[4] . '</div>
                    <div class="col col-6" data-label="Capacite maximale">' . $value[5] . '</div>
                    <div class="col col-7">
                        <div class="col-buttons">
                            <button class="tab-btn"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </li>';
        }

        $this->view('enclos', $data);
    }

       
}

