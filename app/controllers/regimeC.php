<?php
class regimeC extends Controller
{
    public function __construct()
    {
        $this->regimeModel = $this->model('regimeM');
    }

    public function addRegimeC()
    {
        $data = [
            'nom_regime ' => '',
            'type_nourriture ' => '',
            'quantite_par_repas ' => '',
            'nombre_de_repas ' => '',
            'errorAdd' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom_regime' => trim($_POST['nom_regime']),
                'type_nourriture' => trim($_POST['type_nourriture']),
                'quantite_par_repas' => trim($_POST['quantite_par_repas']),
                'nombre_de_repas' => trim($_POST['nombre_de_repas']),
                'errorAdd' => ''
            ];

            //Validate nom_regime
            if (empty($data['nom_regime'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nom_regime'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['type_nourriture'])) {
                $data['errorAdd'] = 'Please enter the type of food.';
            } elseif (!ctype_alpha($data['type_nourriture'])) {
                $data['errorAdd'] = 'Please enter the type.';
            }

            if (empty($data['nombre_de_repas'])) {
                $data['errorAdd'] = 'Please enter a number of meals.';
            } elseif (!is_numeric($data['nombre_de_repas'])) {
                $data['errorAdd'] = 'number of meals can only contain numbers.';
            }

            if (empty($data['quantite_par_repas'])) {
                $data['errorAdd'] = 'Please enter the quantity.';
            } elseif (!is_numeric($data['quantite_par_repas'])) {
                $data['errorAdd'] = 'the quantity can only contain numbers.';
            }

            // Make sure that errors are empty
            if (empty($data['errorAdd'])) {

                //add employe from model function
                 if (!$this->regimeModel->addRegimeC($data)) {
                     die('Something went wrong.');
                }
           }
        }
        $this->view('regime', $data);
    }


    public function afficherList($error = '')
    {
        $tab = $this->regimeModel->afficherRegime();
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
            $data['tab'] .= '<tr class="tblRows" data='.$value[0]."-".$value[1]."-".$value[2]."-".$value[3]."-".$value[4].'>
            <td >'. $value[0] .'</td>
            <td>'. $value[1] .'</td>
            <td>'. $value[2] .'</td>
            <td>'. $value[3] .'</td>
            <td>'. $value[4] .'</td>
            <td> <i class="fas fa-pencil-alt updateButton" onclick="openFormModifier()">
        </tr>';
        }

        $this->view('regime', $data);
    }

    public function deleteUpdateTabRegime()
    {
        if (isset($_POST['delete'])) {
            $this->regimeModel->deleteRegime($_POST['id']);
            header('location:' . URLROOT . '/pages/regime');

        } elseif (isset($_POST['update'])) {
            $data = [
                'id',
                'nom_regime' => '',
                'type_nourriture' => '',
                'quantite_par_repas' => '',
                'nombre_de_repas' => '',
                'errorUpdate' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_POST['id']),
                    'nom_regime' => trim($_POST['nom_regime']),
                    'type_nourriture' => trim($_POST['type_nourriture']),
                    'quantite_par_repas' => trim($_POST['quantite_par_repas']),
                    'nombre_de_repas' => trim($_POST['nombre_de_repas']),
                    'errorUpdate' => ''
                ];

                //Validate nom_regime
            if (empty($data['nom_regime'])) { //check if name is empty or not
                $data['errorAdd'] = 'Please enter name.';
            } elseif (!ctype_alpha($data['nom'])) { //check name regex
                $data['errorAdd'] = 'Please enter the real name.';
            }

            if (empty($data['type_nourriture '])) {
                $data['errorAdd'] = 'Please enter the type of food.';
            } elseif (!ctype_alpha($data['type_nourriture '])) {
                $data['errorAdd'] = 'Please enter the type.';
            }

            if (empty($data['nombre_de_repas '])) {
                $data['errorAdd'] = 'Please enter a number of meals.';
            } elseif (!is_numeric($data['nombre_de_repas '])) {
                $data['errorAdd'] = 'number of meals can only contain numbers.';
            }

            if (empty($data['quantite_par_repas '])) {
                $data['errorAdd'] = 'Please enter the quantity.';
            } elseif (!is_numeric($data['quantite_par_repas'])) {
                $data['errorAdd'] = 'the quantity can only contain numbers.';
            }
    
                // Make sure that errors are empty
                if (empty($data['errorUpdate'])) {
    
                    //add employe from model function
                    if (!$this->regimeModel->updateRegime($data)) {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('regime', $data);
        }
    }














    public function login()
    {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'error' => ''
        ];

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'error' => ''
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['error'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['error'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['error'])) {
                $loggedInUser = $this->employeModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['error'] = 'Mot de passe ou nom d\'utilisateur est incorrect. Veuillez réessayer.';

                    $this->view('index', $data);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'error' => ''
            ];
        }
        $this->view('index', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/usersV');
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }

    public function deleteUpdate()
    {
        if (isset($_POST['delete'])) {
            $this->employeModel->deleteAccount($_SESSION['id']);
            $this->logout();
        } elseif (isset($_POST['update'])) {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'error' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'error' => ''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                //Validate username on letters/numbers
                if (empty($data['username'])) {
                    $data['error'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['error'] = 'Name can only contain letters and numbers.';
                } else {
                    if ($this->employeModel->findUserByUsernameUpdate($data['username'], $_SESSION['id'])) {
                        $data['error'] = 'Username is already taken.';
                    }
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['error'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = 'Please enter the correct format.';
                } else {
                    if ($this->employeModel->findUserByEmailUpdate($data['email'], $_SESSION['id'])) {
                        $data['error'] = 'Email is already taken.';
                    }
                }
                // Validate password on length, numeric values,
                if (empty($data['password'])) {
                    $data['error'] = 'Please enter password.';
                } elseif (strlen($data['password']) < 6) {
                    $data['error'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['error'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['error'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['error'] = 'Passwords do not match, please try again.';
                    }
                }


                // Make sure that errors are empty
                if (empty($data['error'])) {
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //update user from model function
                    if ($this->employeModel->update($data)) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['email'] = $data['email'];
                        //Redirect to the same page
                        header('location: ' . URLROOT . '/pages/usersV');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }
            $this->view('usersV', $data);
        }
    }
}
