<?php
class Employes extends Controller
{
    public function __construct()
    {
        $this->employeModel = $this->model('Employe');
    }

    public function addEmployes()
    {
        $data = [
            'cin' => '',
            'nom' => '',
            'prenom' => '',
            'dateNaissance' => '',
            'salaire' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'cin' => trim($_POST['cin']),
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'dateNaissance' => trim($_POST['dateNaissance']),
                'salaire' => trim($_POST['salaire']),
                'errorAdd' => ''
            ];

            $nameValidation = "/^[a-z ,.'-]+$/i";


            //Validate cin on numbers
            if (empty($data['cin'])) {
                $data['errorAdd'] = 'Please enter cin.';
            } elseif (!is_numeric($data['cin'])) {
                $data['errorAdd'] = 'Cin can only contain numbers.';
            } else {
                if ($this->employeModel->findUserByCin($data['cin'])) {
                    $data['errorAdd'] = 'Cin is already taken.';
                }
            }

            //Validate nom
            if (empty($data['nom'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter your name.';
            } elseif (!preg_match($nameValidation, $data['nom'])) { //check name regex
                $data['errorAdd'] = 'Please enter your real name.';
            }

            if (empty($data['prenom'])) {
                $data['errorAdd'] = 'Please enter your surname.';
            } elseif (!preg_match($nameValidation, $data['prenom'])) {
                $data['errorAdd'] = 'Please enter your real surname.';
            }

            if (empty($data['salaire'])) {
                $data['errorAdd'] = 'Please enter a salary.';
            } elseif (!is_numeric($data['salaire'])) {
                $data['errorAdd'] = 'salary can only contain numbers.';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                if (!$this->employeModel->addEmployes($data)) {
                    die('Something went wrong.');
                } else
                    $this->view('employes');
            } else {
                $errorTab = explode(" ", $data['errorAdd']);
                $err = implode("-", $errorTab);
                $this->afficherList("err-" . $err);
            }
        } else
            $this->view('employes');
    }


    public function afficherList($error = '')
    {
        $tab = $this->employeModel->afficher();
        $data = [
            'tab' => '',
            'errorAdd' => '',
            'errorUpdate' => ''
        ];
        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['errorAdd'] = implode(" ", $errorTab);
            } else if ($errorTab[0] == 'errUp') {
                array_shift($errorTab);
                $data['errorUpdate'] = implode(" ", $errorTab);
            } else {
                $data['errorAdd'] = '';
                $data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<li class="table-row">
            <div class="col col-1" data-label="ID">' . $value[0] . '</div>
            <div class="col col-2" data-label="CIN">' . $value[1] . '</div>
            <div class="col col-3" data-label="Nom">' . $value[2] . '</div>
            <div class="col col-4" data-label="Prenom">' . $value[3] . '</div>
            <div class="col col-5" data-label="Date de naissance">' . $value[4] . '</div>
            <div class="col col-6" data-label="Salaire">' . $value[5] . '</div>
            <div class="col col-7">
                <div class="col-buttons">
                    <button class="tab-btn"><i data-feather="edit"></i></button>
                </div>
            </div>
        </li>';
        }

        $this->view('employes', $data);
    }

    public function deleteUpdateTab()
    {
        if (isset($_POST['delete'])) {
            $this->employeModel->deleteEmploye($_POST['id']);
            header('location:' . URLROOT . '/pages/employes');
        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'cin' => '',
                'nom' => '',
                'prenom' => '',
                'dateNaissance' => '',
                'salaire' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'cin' => trim($_POST['cin']),
                    'nom' => trim($_POST['nom']),
                    'prenom' => trim($_POST['prenom']),
                    'dateNaissance' => trim($_POST['dateNaissance']),
                    'salaire' => trim($_POST['salaire']),
                    'errorUpdate' => ''
                ];

                if (empty($data['cin'])) {
                    $data['errorUpdate'] = 'Please enter cin.';
                } elseif (!is_numeric($data['cin'])) {
                    $data['errorUpdate'] = 'Cin can only contain numbers.';
                } else {
                    if ($this->employeModel->findUserByCinUpdate($data['cin'], $data['id'])) {
                        $data['errorUpdate'] = 'Cin is already taken.';
                    }
                }

                //Validate nom
                if (empty($data['nom'])) { //check if name is empty or not
                    $data['errorUpdate'] = 'Please enter your name.';
                } elseif (!ctype_alpha($data['nom'])) { //check name regex
                    $data['errorUpdate'] = 'Please enter your real name.';
                }

                if (empty($data['prenom'])) {
                    $data['errorUpdate'] = 'Please enter your surname.';
                } elseif (!ctype_alpha($data['prenom'])) {
                    $data['errorUpdate'] = 'Please enter your real surname.';
                }

                if (empty($data['salaire'])) {
                    $data['errorUpdate'] = 'Please enter a salary.';
                } elseif (!is_numeric($data['salaire'])) {
                    $data['errorUpdate'] = 'salary can only contain numbers.';
                }

                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {

                    //add employe from model function
                    if (!$this->employeModel->updateP($data)) {
                        die('Something went wrong.');
                    } else
                        $this->view('employes');
                } else {
                    $errorTab = explode(" ", $data['errorUpdate']);
                    $err = implode("-", $errorTab);
                    $this->afficherList("errUp-" . $err);
                }
            } else
                $this->view('employes');
        } else
            $this->view('employes');
    }
}
