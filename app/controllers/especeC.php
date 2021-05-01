
<?php
class especeC extends Controller
{
    public function __construct()
    {
        $this->especeModel = $this->model('especeM');
    }

    public function addespeceC()
    {
        $data = [
            'nomE ' => '',
            'hauteur ' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nomE' => trim($_POST['nomE']),
                'hauteur' => trim($_POST['hauteur']),
                
                'errorAdd' => ''
            ];

            //Validate nom_espece
            if (empty($data['nomE'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer un nom.';
            } elseif (!ctype_alpha($data['nomE'])) { //check name regex
                $data['errorAdd'] = 'entrer un nom.';
            }

            if (empty($data['hauteur'])) {
                $data['errorAdd'] = 'entrer l hauteur potentiel d une espece.';
            } elseif (!is_numeric($data['hauteur'])) {
                $data['errorAdd'] = 'l hauteur doit etre un numero.';
            }

            

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                 if (!$this->especeModel->addespeceC($data)) {
                     die('erreur.');
                }
           }
        }
        $this->view('espece', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->especeModel->afficherespece();
        $data = [
            'tab' => '',
            'errorAffiche' => ''
        ];
        if (isset($error)) {
            $errorTab = explode("-", $error);
            if ($errorTab[0] == 'err') {
                array_shift($errorTab);
                $data['errorAdd'] = implode(" ", $errorTab);
            }
            else if ($errorTab[0] == 'errUp') {
                array_shift($errorTab);
                $data['errorUpdate'] = implode(" ", $errorTab);
            } 
            else {
                $data['errorAdd'] = '';
                $data['errorUpdate'] = '';
            }
        }


        foreach ($tab as $key => $value) {
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
           
            <td> <i class="fas fa-edit updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('espece', $data);
    }

     public function deleteUpdateTabespece()
    {
        if (isset($_POST['delete'])) {
            $this->especeModel->deleteespece($_POST['idE']);
            header('location:' . URLROOT . '/pages/espece');

        } elseif (isset($_POST['update'])) {
            $data = [
                'idE',
                'nomE' => '',
                'hauteur' => '',
               
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'idE' => trim($_POST['idE']),
                    'nomE' => trim($_POST['nomE']),
                    'hauteur' => trim($_POST['hauteur']),
                    
                    'errorUpdate' => ''
                ];

                //Validate nom_espece
            if (empty($data['nomE'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomE'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['hauteur'])) {
                $data['errorAdd'] = 'enter l hauteur.';
            } elseif (!is_numeric($data['hauteur '])) {
                $data['errorAdd'] = 'entrer l hauteur.';
            }

          
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add espece from model function
                    if (!$this->especeModel->updateespece($data)) {
                        die('erreur.');
                    }
                }
            }
            $this->view('espece', $data);
        }
    }


        










}