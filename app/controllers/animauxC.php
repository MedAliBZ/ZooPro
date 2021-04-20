<?php
class animauxC extends Controller
{
    public function __construct()
    {
        $this->animauxModel = $this->model('animauxM');
    }

    public function addAnimauxC()
    {
        $data = [
            'nomAnimal' => '',
            'race' => '',
            'age' => '',
            'pays' => '',
            'genre' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nomAnimal' => trim($_POST['nomAnimal']),
                'race' => trim($_POST['race']),
                'age' => trim($_POST['age']),
                'pays' => trim($_POST['pays']),
                'genre' => trim($_POST['genre']),
                'errorAdd' => ''
            ];

            //Validate nomAnimal
            if (empty($data['nomAnimal'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomAnimal'])) { //check name regex
                $data['errorAdd'] = 'Please enter just letters for the name.';
            }

            if (empty($data['race'])) {
                $data['errorAdd'] = 'Please enter the race.';
            } elseif (!ctype_alpha($data['race'])) {
                $data['errorAdd'] = 'Please enter the correct race';
            }

            if (empty($data['pays'])) {
                $data['errorAdd'] = 'Please enter the country name.';
            } elseif (!ctype_alpha($data['pays'])) {
                $data['errorAdd'] = 'country name can only contain letters.';
            }

            if (empty($data['age'])) {
                $data['errorAdd'] = 'Please enter age.';
            } elseif (!is_numeric($data['age'])) {
                $data['errorAdd'] = 'age can only contain numbers.';
            }
            if (empty($data['genre'])) {
                $data['errorAdd'] = 'Please enter the gender.';
            } elseif (!ctype_alpha($data['genre'])) {
                $data['errorAdd'] = 'the gender can only contain letters.';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add animal from model function
                 if (!$this->animauxModel->addanimauxM($data)) {
                     die('Something went wrong.');
                }
           }
        }
        $this->view('animaux', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->animauxModel->afficherAnimaux();
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4]."-".$value[5].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td>'. $value[5] .'</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('animaux', $data);
    }

    public function deleteUpdateTabAnimal()
    {
        if (isset($_POST['delete'])) {
            $this->animauxModel->deleteAnimal($_POST['id']);
            header('location:' . URLROOT . '/pages/animaux');

        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'nomAnimal' => '',
                'race' => '',
                'age' => '',
                'pays' => '',
                'genre' => '',
                'errorAdd' => ''
            ];
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'nomAnimal' => trim($_POST['nomAnimal']),
                    'race' => trim($_POST['race']),
                    'age' => trim($_POST['age']),
                    'pays' => trim($_POST['pays']),
                    'genre' => trim($_POST['genre']),
                    'errorAdd' => ''
                ];
    
            //Validate nomAnimal
            if (empty($data['nomAnimal'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nomAnimal'])) { //check name regex
                $data['errorAdd'] = 'Please enter just letters for the name.';
            }

            if (empty($data['race'])) {
                $data['errorAdd'] = 'Please enter the race.';
            } elseif (!ctype_alpha($data['race'])) {
                $data['errorAdd'] = 'Please enter the correct race';
            }

            if (empty($data['pays'])) {
                $data['errorAdd'] = 'Please enter the country name.';
            } elseif (!ctype_alpha($data['pays'])) {
                $data['errorAdd'] = 'country name can only contain letters.';
            }

            if (empty($data['age'])) {
                $data['errorAdd'] = 'Please enter age.';
            } elseif (!is_numeric($data['age'])) {
                $data['errorAdd'] = 'age can only contain numbers.';
            }
            if (empty($data['genre'])) {
                $data['errorAdd'] = 'Please enter the gender.';
            } elseif (!ctype_alpha($data['genre'])) {
                $data['errorAdd'] = 'the gender can only contain letters.';
            }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add employe from model function
                    if (!$this->animauxModel->updateAnimal($data)) {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('animaux', $data);
        }
    }


}









