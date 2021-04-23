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
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

             //Validate appellation
                if (empty($data['appellation'])) { //check if name is empty or not
                    $data['errorAdd'] = 'Please enter the name.';
                } elseif (!ctype_alpha($data['appellation'])) { //check name regex
                    $data['errorAdd'] = 'Please enter the real name.';
                }

             //Validate localisation
                if (empty($data['localisation'])) { //check if location is empty or not
                    $data['errorAdd'] = 'Please enter the location.';
                } elseif (!ctype_alpha($data['localisation'])) { //check location regex
                    $data['errorAdd'] = 'Please enter the real location.';
                }
              //Validate taille
                 if (empty($data['taille'])) {
                    $data['errorAdd'] = 'Please enter the size.';
                } elseif (!is_numeric($data['taille'])) {
                    $data['errorAdd'] = 'size can only contain numbers.';
                }
              //Validate capacite
                 if (empty($data['capaciteMaximale'])) {
                    $data['errorAdd'] = 'Please enter the capacity.';
                } elseif (!is_numeric($data['capaciteMaximale'])) {
                    $data['errorAdd'] = 'capacity can only contain numbers.';
                }

              //Validate photo
                 if (empty($data['photo'])) {
                    $data['errorAdd'] = 'Please enter the picture.';
                } 

             //Validate typeEnclos
                  if (empty($data['typeEnclos'])) {
                    $data['errorUpdate'] = 'Please enter type.';
                } elseif (!preg_match($nameValidation, $data['typeEnclos'])) {
                    $data['errorUpdate'] = 'type can only contain letters and numbers.';
                } 
                

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
                
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

             //Validate appellation
                if (empty($data['appellation'])) { //check if name is empty or not
                    $data['errorUpdate'] = 'Please enter the name.';
                } elseif (!ctype_alpha($data['appellation'])) { //check name regex
                    $data['errorUpdate'] = 'Please enter the real name.';
                }

             //Validate localisation
                if (empty($data['localisation'])) { //check if location is empty or not
                    $data['errorUpdate'] = 'Please enter the location.';
                } elseif (!ctype_alpha($data['localisation'])) { //check location regex
                    $data['errorUpdate'] = 'Please enter the real location.';
                }
              //Validate taille
                 if (empty($data['taille'])) {
                    $data['errorUpdate'] = 'Please enter the size.';
                } elseif (!is_numeric($data['taille'])) {
                    $data['errorUpdate'] = 'size can only contain numbers.';
                }


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

