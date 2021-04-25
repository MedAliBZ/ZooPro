
<?php
class planteC extends Controller
{
    public function __construct()
    {
        $this->planteModel = $this->model('planteM');
    }

    public function addplanteC()
    {
        $data = [
            'nomP ' => '',
            'longevite ' => '',
            'origine ' => '',
            'taille ' => '',
            'famille ' => '',
            'image ' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nomP' => trim($_POST['nomP']),
                'longevite' => trim($_POST['longevite']),
                'origine' => trim($_POST['origine']),
                'taille' => trim($_POST['taille']),
                'famille' => trim($_POST['famille']),
                'image' => trim($_POST['image']),
                'errorAdd' => ''
            ];

            //Validate nom_plante
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomP'])) { //check name regex
                $data['errorAdd'] = 'entrer un nom.';
            }

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'entrer la longevite du plante.';
            } elseif (!is_numeric($data['longevite'])) {
                $data['errorAdd'] = 'la longevite doit etre un numero.';
            }

            if (empty($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine du plante.';
            } elseif (!is_numeric($data['origine'])) {
                $data['errorAdd'] = 'l origine doit etre un numero.';
            }

            if (empty($data['taille'])) {
                $data['errorAdd'] = 'entrer une taille.';
            } elseif (!is_numeric($data['taille'])) {
                $data['errorAdd'] = 'la taille doit etre un numero.';
            }

            if (empty($data['famille'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer la famille de la plante.';
            } elseif (!ctype_alpha($data['famille'])) { //check name regex
                $data['errorAdd'] = 'entrer une famille .';
            }

            if (empty($data['image'])) { //check if name is empty or not
                $data['errorAdd'] = 'entrer l image de la plante.';
            } elseif (!ctype_alpha($data['image'])) { //check name regex
                $data['errorAdd'] = 'entrer une image .';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                 if (!$this->planteModel->addplanteC($data)) {
                     die('erreur.');
                }
           }
        }
        $this->view('plante', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->planteModel->afficherplante();
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5]."-".$value[6].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td>'. $value[6] .'</td>
            <td> <i class="fas fa-edit updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $idespece = $this->planteModel->listespeceID();
        foreach ($idespece as $key => $value)
        {
            $data['idespece'] .= '<option value="'.$value[0].'">'.$value[0].'</option>';
        }


        $this->view('plante', $data);
    }

     public function deleteUpdateTabplante()
    {
        if (isset($_POST['delete'])) {
            $this->planteModel->deleteplante($_POST['idP']);
            header('location:' . URLROOT . '/pages/plante');

        } elseif (isset($_POST['update'])) {
            $data = [
                'idP',
                'nomP' => '',
                'longevite' => '',
                'origine' => '',
                'taille' => '',
                'famille' => '',
                'image' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'idP' => trim($_POST['idP']),
                    'nomP' => trim($_POST['nomP']),
                    'longevite' => trim($_POST['longevite']),
                    'origine' => trim($_POST['origine']),
                    'taille' => trim($_POST['taille']),
                    'famille' => trim($_POST['famille']),
                    'image' => trim($_POST['image']),
                    'errorUpdate' => ''
                ];

                //Validate nom_regime
            if (empty($data['nomP'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomP'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['longevite'])) {
                $data['errorAdd'] = 'enter la longevite.';
            } elseif (!is_numeric($data['longevite '])) {
                $data['errorAdd'] = 'entrer la longevite.';
            }

            if (empty($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine geographique.';
            } elseif (!ctype_alpha($data['origine'])) {
                $data['errorAdd'] = 'entrer l origine.';
            }

            if (empty($data['taille'])) {
                $data['errorAdd'] = ' entrer la taille du plante.';
            } elseif (!is_numeric($data['taille'])) {
                $data['errorAdd'] = 'entrer une taille.';
            }

            if (empty($data['famille'])) {
                $data['errorAdd'] = ' entrer la famille de la plante.';
            } elseif (!ctype_alpha($data['famille'])) {
                $data['errorAdd'] = 'entrer la famille.';
            }

            if (empty($data['image'])) {
                $data['errorAdd'] = ' entrer l image de la plante.';
            } elseif (!ctype_alpha($data['image'])) {
                $data['errorAdd'] = 'entrer l image.';
            }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add plante from model function
                    if (!$this->planteModel->updateplante($data)) {
                        die('erreur.');
                    }
                }
            }
            $this->view('plante', $data);
        }
    }


    //afficher forign key
   



}